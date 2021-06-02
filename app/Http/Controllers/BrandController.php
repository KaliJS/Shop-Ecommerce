<?php

namespace App\Http\Controllers;

use App\Models\Brand;
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
            $brands = Brand::orderBy('id')->get();
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
        return view('admin.brand.create');
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
            'image' => 'required'
        ]);
        
        try{

            $input=$request->all();

            if($file=$request->file('image')){

                $file_name=time().$file->getClientOriginalName();
                $file->move('uploads/brands',$file_name);
                $input['image'] = $file_name;
            }

            Brand::create($input);
            
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
        return view('admin.Brand.edit',compact('brand'));
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
            'description' => 'required'
        ]);
 
        try{

            $input=$request->all();
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

            Brand::where('id',$brand->id)->update($input);
            
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
