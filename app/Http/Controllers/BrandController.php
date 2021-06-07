<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Redirect;
use DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $brands = Brand::with('categories')->orderBy('id')->get();
            return view('admin.brand.index',compact('brands'));
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
        $categories = Category::orderBy('name')->get(['id','name']);
        return view('admin.brand.create',compact('categories'));
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
            'title' => 'required|unique:brands',
            'description' => 'required',
            'image' => 'required',
            'categories' => 'required'
        ]);
        
        DB::beginTransaction();
        try{
            $categories=$request->categories;
            
            $input=$request->all();
            unset($input['categories']);

            if($file=$request->file('image')){

                $file_name=time().$file->getClientOriginalName();
                $file->move('uploads/brands',$file_name);
                $input['image'] = $file_name;
            }

            $inserted_brand = Brand::create($input);

            foreach($categories as $category){
                $data[]=array('category_id'=>$category,'brand_id'=>$inserted_brand->id,'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s"));
            }
            DB::table('category_brands')->insert($data);

            DB::commit();
            return redirect()->back()
                ->with('success', 'Brand created successfully.');

        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $Brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $categories = Category::orderBy('name')->get(['id','name']);
        $selected_categories = DB::table('category_brands')->where('brand_id',$brand->id)->pluck('category_id')->toArray();
        
        return view('admin.Brand.edit',compact('brand','categories','selected_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'categories' => 'required'
        ]);
 
        DB::beginTransaction();
        try{

            $catetories=$request->catetories;
            $input=$request->all();
            unset($input['catetories']);
            unset($input['_method']);
            unset($input['_token']);
            unset($input['_wysihtml5_mode']);

            if($file=$request->file('image')){

                unlink(public_path().'/uploads/brands/'.$brand->image);
                $file_name=time().$file->getClientOriginalName();
                $file->move('uploads/brands',$file_name);
           
                $input['image'] = $file_name;

            }else{

                $input['image'] = $brand->image;
            }

            $updated_brand = Brand::where('id',$brand->id)->update($input);

            $deleted_brand=DB::table('category_brands')->where('brand_id',$brand->id)->delete();
            foreach($categories as $category){
                $data[]=array('category_id'=>$category,'brand_id'=>$brand->id,'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s"));
            }
            $inserted_category=DB::table('category_brands')->insert($data);           

            DB::commit();

            
            return redirect()->back()
                ->with('success', 'Brand Updated successfully.');

        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        DB::beginTransaction();
        try{

            unlink(public_path().'/uploads/brands/'.$brand->image);
            DB::table('category_brands')->where('brand_id',$brand->id)->delete();
            $brand->delete();

            DB::commit();
            return Redirect::back()->with('success','Brand Deleted Successfully!');
    
        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    public function changeBrandPopularity(Request $request,$id){

        try{
            $brand = Brand::where('id',$id)->first();

            if($brand->popularity == '0'){
                $brand->popularity = '1';
            }else{
                $brand->popularity = '0';
            }
            $brand->save();
            return $brand;

        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
