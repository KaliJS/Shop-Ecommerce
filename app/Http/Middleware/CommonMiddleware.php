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
        $complete_data = Category::with('subcategories','subcategories.product')->get();
        $cart = array();
        if(session()->has('cart')){
            $cart = session()->get('cart');
        }
        
        view()->share('count', count($cart));
        view()->share('complete_data', $complete_data);
        view()->share('top_categories', $top_categories);
        view()->share('offers', $offers);

        return $next($request);
    }
   

}
