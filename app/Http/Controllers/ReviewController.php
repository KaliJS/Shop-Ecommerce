<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use App\Models\Product;
use Illuminate\Http\Request;
use Redirect;
use Str;
use Auth;
use DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $reviews = Reviews::orderBy('title')->get();
            return view('admin.reviews.index',compact('reviews'));
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
        $products = Product::orderBy('name')->get();
        return view('admin.reviews.create',compact('products'));
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
            'title' => 'required|unique:reviews',
            'description' => 'required',
            'image' => 'required',
            'ratings' => 'required',
            'product_id' => 'required'
        ]);

        try{

            $input=$request->all();
            $input['user_id'] = Auth::user()->id;

            if($file=$request->file('image')){

                $file_name=time().$file->getClientOriginalName();
                $file->move('uploads/reviews',$file_name);
                $input['image'] = $file_name;
            }

            Reviews::create($input);
            
            return redirect()->back()
                ->with('success', 'Reviews created successfully.');

        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reviews  $Reviews
     * @return \Illuminate\Http\Response
     */
    public function show(Reviews $reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reviews  $Reviews
     * @return \Illuminate\Http\Response
     */
    public function edit(Reviews $review)
    {
        $products = Product::orderBy('name')->get();
        return view('admin.reviews.edit',compact('review','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reviews  $Reviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reviews $review)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'ratings' => 'required',
            'product_id' => 'required'
        ]);
      
        try{

            $input=$request->all();
            $input['user_id'] = Auth::user()->id;
            unset($input['_method']);
            unset($input['_token']);
            unset($input['_wysihtml5_mode']);

            if($file=$request->file('image')){

                unlink(public_path().'/uploads/reviews/'.$review->image);
                $file_name=time().$file->getClientOriginalName();
                $file->move('uploads/reviews',$file_name);
           
                $input['image'] = $file_name;

            }else{
                $input['image'] = $review->image;
            }

            Reviews::where('id',$review->id)->update($input);
            
            return redirect()->back()
                ->with('success', 'Reviews Updated successfully.');

        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reviews  $Reviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reviews $review)
    {     
        
        DB::beginTransaction();
        try{

            unlink(public_path().'/uploads/reviews/'.$review->image);          
            $review->delete();
            DB::commit();
            return Redirect::back()->with('success','Reviews Deleted Successfully!');
    
        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }

    }

}
