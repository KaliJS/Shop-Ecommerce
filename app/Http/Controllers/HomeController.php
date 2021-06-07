<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Offers;
use App\Models\Category;
use Redirect;

class HomeController extends Controller
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
            $banners = Banner::orderBy('id')->get();
            
            $new_products = Product::where('product_type','new')->orderBy('updated_at','desc')->offset(0)->limit(4)->get();
            $top_products = Product::where('product_type','top')->orderBy('updated_at','desc')->offset(0)->limit(4)->get();
            $trend_products = Product::where('product_type','trend')->orderBy('updated_at','desc')->offset(0)->limit(4)->get();
            
            $popular_brands = Brand::where('popularity','1')->offset(0)->limit(8)->get();

            $complete_data = Category::with('subcategories','subcategories.product')->get();

            return view('shopping.index',compact('complete_data','popular_brands','banners','new_products','top_products','trend_products'));
        }catch(\Exception $e){
            return Redirect::back()->with('error',$e->getMessage());
        }
    }
    
}
