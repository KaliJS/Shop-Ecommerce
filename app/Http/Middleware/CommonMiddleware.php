<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Offers;
use Auth;

class CommonMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $top_categories = Category::orderBy('id')->offset(0)->limit(7)->get();
        $offers = Offers::orderBy('id')->get();
        
        $cart = [];
        $total_price = 0;
         
        if(session()->has('cart')){
            $cart = session()->get('cart');
        }
        
        foreach($cart as $key=>$value){
            $total_price += $value['subtotal'];
        }

        view()->share('cart', $cart);
        view()->share('top_categories', $top_categories);
        view()->share('offers', $offers);
        view()->share('total_price', $total_price);

        return $next($request);
    }
   

}
