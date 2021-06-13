<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductVariants;
use App\Models\SubCategories;
use App\Models\Category;
use Illuminate\Http\Request;
use Redirect;
use Str;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $products = Product::with('variants')->orderBy('name')->get();
            return view('admin.products.index',compact('products'));
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
        $brands = Brand::orderBy('title')->get(['id','title']);
        $categories = Category::orderBy('name')->get(['id','name']);
        return view('admin.products.create',compact('categories','brands'));
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
            'name' => 'required|unique:products',
            'description' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'quantity' => 'required',
            'variant' => 'required',
            'max_delivery_days' => 'required'
        ]);
        DB::beginTransaction();
        try{
            $input = [];
            $quantity = $request->quantity;
            $mrp_price = $request->mrp_price;
            $selling_price = $request->selling_price;
            $variant = $request->variant;
            $max_delivery_days = $request->max_delivery_days;
            $input['name'] = $request->name;
            $input['description'] = $request->description;
            $input['additional_info'] = $request->additional_info;
            $input['sku'] = $request->sku;
            $input['images'] = $request->images;
            $input['sub_category_id'] = $request->sub_category_id;
            $input['brand_id'] = $request->brand_id;
            $input['sku'] = $request->sku;
            $input['slug'] = Str::slug($input['name']);
            
            
            $images_name = [];
            if($files=$request->file('images')){
                foreach($files as $file){
                    $file_name=time().$file->getClientOriginalName();
                    $file->move('uploads/products',$file_name); 
                    array_push($images_name,$file_name); 
                }
            }
            $input['images'] =implode(',',$images_name);
            $product=Product::create($input);

            $data=[];

            $rows = count($variant);
            for ($i = 0; $i < $rows; $i++) {
                $data[]=array('product_id'=>$product->id
                        ,'quantity'=>$quantity[$i],'variant'=>$variant[$i],'max_delivery_days'=>$max_delivery_days[$i]
                        ,'mrp_price'=>$mrp_price[$i],'selling_price'=>$selling_price[$i]
                    );
            }

            $insert_product_variant=DB::table('product_variants')->insert($data);

            DB::commit();
            return redirect()->back()
                ->with('success', 'Product created successfully.');

        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        try{
            $brands = Brand::orderBy('title')->get(['id','title']);
            $categories = Category::orderBy('name')->get();
            return view('admin.products.edit',compact('categories','product','brands'));
        }catch(\Exception $e){
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'quantity' => 'required',
            'variant' => 'required',
            'max_delivery_days' => 'required',
            'in_stock' => 'required'
        ]);
        DB::beginTransaction();
        try{
            $input = [];
            $quantity = $request->quantity;
            $mrp_price = $request->mrp_price;
            $selling_price = $request->selling_price;
            $variant = $request->variant;
            $max_delivery_days = $request->max_delivery_days;
            $in_stock=$request->in_stock;
            $input['name']=$request->name;
            $input['description']=$request->description;
            $input['additional_info'] = $request->additional_info;
            $input['sku'] = $request->sku;
            $input['images'] = $request->images;
            $input['sub_category_id'] = $request->sub_category_id;
            $input['brand_id'] = $request->brand_id;
            $input['sku'] = $request->sku;
            $input['status'] = $request->status;
            $input['slug']=Str::slug($input['name']);
            
            $images_name = [];
            $new_images = '';
            $pre_product = Product::where('id',$product->id)->first();
            
            if($files=$request->file('images')){
                foreach($files as $file){
                    $file_name=time().$file->getClientOriginalName();
                    $file->move('uploads/products',$file_name); 
                    array_push($images_name,$file_name); 
                }
                $new_images =implode(',',$images_name);
                $input['images'] = $new_images.','.$pre_product->images;

            }else{
                $input['images'] = $pre_product->images;
            }
            
            $updated_product=Product::where('id',$product->id)->update($input);

            DB::table('product_variants')->where('product_id',$product->id)->delete();

            $data=[];
            
            $rows = count($variant);

            for ($i = 0; $i < $rows; $i++) {
                $data[]=array('product_id'=>$product->id
                        ,'quantity'=>$quantity[$i],'variant'=>$variant[$i],'max_delivery_days'=>$max_delivery_days[$i]
                        ,'mrp_price'=>$mrp_price[$i],'selling_price'=>$selling_price[$i],'in_stock'=>$in_stock[$i]
                    );
            }
            $insert_product_variant=DB::table('product_variants')->insert($data);

            DB::commit();
            return redirect()->back()
                ->with('success', 'Product updated successfully.');

        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        DB::beginTransaction();
        try{

            foreach(explode(',',$product->images) as $image){
                if(file_exists(public_path().'/uploads/products/'.$image)){ 
                    unlink(public_path().'/uploads/products/'.$image);
                }
            }

            $product->delete();
            DB::table('product_variants')->where('product_id',$product->id)->delete();
            DB::commit();
            return Redirect::back()->with('success','Product Deleted Successfully!');
    
        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    public function getDeleteSelectedImages(Request $request){
        
        try{
            $image_name = $request->image_name;
            $product_id = $request->product_id;
            $product = Product::where('id',$product_id)->first();

            $images_array = explode(',',$product->images);

            $pos = array_search($image_name, $images_array);

            unset($images_array[$pos]);

            $new_images =implode(',',$images_array);

            Product::where('id', $product_id)->update(array('images' => $new_images));
            
            if(file_exists(public_path().'/uploads/products/'.$image_name)){ 
                unlink(public_path().'/uploads/products/'.$image_name);
            }
            
            return 'success';
       
        }catch(Exception $e){
            return $e->getMessage();
        }
                
    }

    public function getCategoryData(Request $request){
        try{
            $category_id=$request->category_id;
            $sub_category_id = '';
            $brand_id = '';
            $subcategories = SubCategories::where('category_id',$category_id)->get();
            $category = Category::with('brands')->where('id',$category_id)->first();
            $brands = $category->brands;
            if($request->has('sub_category_id')){
                $sub_category_id = $request->sub_category_id;
            }
            if($request->has('brand_id')){
                $brand_id = $request->brand_id;
            }
            $view=view('admin.products.get_subcategory_data',compact('subcategories','sub_category_id','brands','brand_id'));
                return $view->render();
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function setProductType(Request $request){
        try{
            $product_id=$request->product_id;
            $product_type=$request->type;
            $product = Product::find($product_id);
            $product->product_type = $product_type;
            $product->save();
            return 'success';
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

}
