<?php
namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\Product;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use DB;
use Carbon\Carbon;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
           $offers = Offers::with('products')->orderBy('id')->get();
           return view('admin.offers.index',compact('offers'));

        }catch(\Exception $e){
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $products = Product::orderBy('name')->get(['id','name']);
            return view('admin.offers.create',compact('products'));

        }catch(\Exception $e){
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:offers',
            'start_date' => 'required',
            'image' => 'required',
            'end_date' => 'required',
            'discount_type' => 'required',
            'discount' => 'required',
            'max_discount' => 'required',
            'products' => 'required'
        ]);

        DB::beginTransaction();
        try{
            $products=$request->products;
            $input=$request->all();
            unset($input['products']);

            // $start_date = Carbon::createFromFormat('m/d/Y H:i:s', $input['start_date'].'00:00:00');
            // $end_date = Carbon::createFromFormat('m/d/Y H:i:s', $input['end_date'].'00:00:00');
            // if($start_date->gt($end_date)){
            //     return redirect()->back()
            //     ->with('error', 'start date can not be greater than end date.');
            // }
            if(Carbon::parse($input['end_date'])->isAfter(Carbon::parse($input['start_date'])->addHour(1))){
                return redirect()->back()->with('error', 'start date can not be greater than end date.');
            }

            if($file=$request->file('image')){

                $file_name=time().$file->getClientOriginalName();
                $file->move('uploads/offers',$file_name);
                $input['image'] = $file_name;
            }

            $inserted_offer=Offers::create($input);
            $data=[];
            foreach($products as $product){
                $data[]=array('product_id'=>$product,'offer_id'=>$inserted_offer->id,'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s"));
            }
            $inserted_offer=DB::table('product_offers')->insert($data);

            DB::commit();

            return redirect()->back()
                ->with('success', 'Offers created successfully.');

        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function show(Offers $offers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function edit(Offers $offer)
    {
        try{

            $products = Product::orderBy('name')->get(['id','name']);
            $selected_products=DB::table('product_offers')->where('offer_id',$offer->id)->pluck('product_id')->toArray();
            return view('admin.offers.edit',compact('offer','products','selected_products'));

        }catch(Exception $e){
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offers $offer)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'discount_type' => 'required',
            'discount' => 'required',
            'max_discount' => 'required',
            'status' => 'required',
            'products' => 'required',
        ]);

        DB::beginTransaction();
        try{

            $products=$request->products;
            $input=$request->all();
            unset($input['products']);
            unset($input['_method']);
            unset($input['_token']);

            if($file=$request->file('image')){

                unlink(public_path().'/uploads/offers/'.$offer->image);
                $file_name=time().$file->getClientOriginalName();
                $file->move('uploads/offers',$file_name);
           
                $input['image'] = $file_name;

            }else{
                $input['image'] = $offer->image;
            }

            $updated_offers=offers::where('id',$offer->id)->update($input);
            $deleted_product=DB::table('product_offers')->where('offer_id',$offer->id)->delete();
            foreach($products as $product){
                $data[]=array('product_id'=>$product,'offer_id'=>$offer->id,'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s"));
            }
            $inserted_product=DB::table('product_offers')->insert($data);           

            DB::commit();

            return redirect()->back()
                ->with('success', 'offer updated successfully.');

        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offers $offer)
    {
        DB::beginTransaction();
        try{
            unlink(public_path().'/uploads/reviews/'.$offer->image);   
            DB::table('product_offers')->where('offer_id',$offer->id)->delete();
            $offer->delete();
            DB::commit();
            return redirect()->back()
                ->with('success', 'offer deleted successfully.');
        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }
}
