<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategories;
use Illuminate\Http\Request;
use Redirect;
use Str;
use DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $subcategories = SubCategories::with('category')->orderBy('name')->get();
            return view('admin.categories.subcategories.index',compact('subcategories'));
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
        $categories = Category::orderBy('name')->get();
        return view('admin.categories.subcategories.create',compact('categories'));
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
            'name' => 'required|unique:sub_categories',
            'category_id' => 'required'
        ]);

        
        try{

            $input=$request->all();
            $name = $input['name'];
            $input['slug']=Str::slug($name);

            SubCategories::create($input);
            
            return redirect()->back()
                ->with('success', 'Sub Category created successfully.');

        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategories $sub_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategories $sub_category)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.categories.subcategories.edit',compact('sub_category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategories $sub_category)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);

        
        try{

            $input=$request->all();
            unset($input['_method']);
            unset($input['_token']);
            
            $name = $input['name'];
            $input['slug']=Str::slug($name);

            
            SubCategories::where('id',$sub_category->id)->update($input);
            
            return redirect()->back()
                ->with('success', 'Sub Category Updated successfully.');

        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategories $sub_category)
    {     
        
        DB::beginTransaction();
        try{

            $sub_category->delete();
            DB::table('products')->where('sub_category_id',$sub_category->id)->delete();
            DB::commit();
            return Redirect::back()->with('success','Sub Category Deleted Successfully!');
    
        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }

    }

}
