<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Redirect;

class ShopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try{
            $products = Product::select("*")
            ->addSelect(\DB::raw("
                (select (CASE WHEN min(selling_price)=max(selling_price) THEN CONCAT('$',CAST(min(selling_price) as INTEGER)) 
                ELSE CONCAT('$',CAST(min(selling_price) as INTEGER),' - $',CAST(max(selling_price) as INTEGER))
                END) as price_range from product_variants where product_id=products.id) as price_range
                "
            ))
            ->orderBy('id')->paginate(20); 

            return view('shopping.shop',compact('products'));
        }catch(\Exception $e){
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    public function getCategoryProducts($data)
    {
        try{
           
            $category = Category::where('slug',$data)->first();
            $products = Product::where('category_id',$category->id)->select("*")
            ->addSelect(\DB::raw("
                (select (CASE WHEN min(selling_price)=max(selling_price) THEN CONCAT('$',CAST(min(selling_price) as INTEGER)) 
                ELSE CONCAT('$',CAST(min(selling_price) as INTEGER),' - $',CAST(max(selling_price) as INTEGER))
                END) as price_range from product_variants where product_id=products.id) as price_range
                "
            ))
            ->orderBy('id')->paginate(20);
            return view('shopping.shop',compact('products','category'));
        }catch(\Exception $e){
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    public function getAllCategories()
    {
        try{
            
            $categories = Category::orderBy('id')->get();
            return view('shopping.category',compact('categories'));
        }catch(\Exception $e){
            return Redirect::back()->with('error',$e->getMessage());
        }
    }
}
