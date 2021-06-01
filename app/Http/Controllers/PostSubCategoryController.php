<?php

namespace App\Http\Controllers;

use App\Models\SubCategories;
use App\Models\PostSubCategories;
use Illuminate\Http\Request;
use Redirect;
use Str;
use DB;

class PostSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $postsubcategories = PostSubCategories::with('subcategory')->orderBy('name')->get();
            return view('admin.categories.subcategories.postsubcategories.index',compact('postsubcategories'));
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
        $sub_categories = SubCategories::orderBy('name')->get();
        return view('admin.categories.subcategories.postsubcategories.create',compact('sub_categories'));
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
            'name' => 'required|unique:post_sub_categories',
            'sub_category_id' => 'required'
        ]);

        
        try{

            $input=$request->all();
            $name = $input['name'];
            $input['slug']=Str::slug($name);

            PostSubCategories::create($input);
            
            return redirect()->back()
                ->with('success', 'Post Sub Category created successfully.');

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
    public function show(PostSubCategories $post_sub_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(PostSubCategories $post_sub_category)
    {
        $subcategories = SubCategories::orderBy('name')->get();
        return view('admin.categories.subcategories.postsubcategories.edit',compact('post_sub_category','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostSubCategories $post_sub_category)
    {
        $request->validate([
            'name' => 'required',
            'sub_category_id' => 'required',
        ]);

        
        try{

            $input=$request->all();
            unset($input['_method']);
            unset($input['_token']);
            
            $name = $input['name'];
            $input['slug']=Str::slug($name);

            
            PostSubCategories::where('id',$post_sub_category->id)->update($input);
            
            return redirect()->back()
                ->with('success', 'Post Sub Category Updated successfully.');

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
    public function destroy(PostSubCategories $post_sub_category)
    {     
        
        DB::beginTransaction();
        try{

            $post_sub_category->delete();
            DB::table('products')->where('post_sub_category_id',$post_sub_category->id)->delete();
            DB::commit();
            return Redirect::back()->with('success','Post Sub Category Deleted Successfully!');
    
        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }

    }

}
