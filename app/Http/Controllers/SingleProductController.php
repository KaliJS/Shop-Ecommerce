<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariants;
use App\Models\Category;
use Redirect;

class SingleProductController extends Controller
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
        
    }

    

    public function getProductDetails($data)
    {
        try{
           
            // session()->put('name', 'khalid');
            // $value = session()->get('name');
            // $_SESSION['cart'][$i]['qty']=$qty;$_SESSION['cart'][$i]['price']=$price;

            $price = '';

            $product = Product::with('reviews')->where('slug',$data)->first();

            $img_array = explode(",", $product->images);
            $first_image = $img_array[0];

            $relatedProducts = Product::where('sub_category_id',$product->sub_category_id)->orderBy('updated_at','desc')->offset(0)->limit(10)->get();
            
            return view('shopping.single-product',compact('relatedProducts','product','first_image','price','img_array'));
        }catch(\Exception $e){
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    
}
