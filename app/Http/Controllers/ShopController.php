<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\SubCategories;
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
    public function index( Request $request )
    {
        //return $request;
        try{
            
            $price_range = array(
                array('min' => '0','max' =>  '100'),
                array('min' => '100','max' =>  '200'),
                array('min' => '200','max' =>  '500'),
                array('min' => '500','max' =>  '1000'),
                array('min' => '1000','max' =>  '2000'),
                array('min' => '2000','max' =>  '5000'),
                array('min' => '5000','max' =>  '10000'),
                array('min' => '10000','max' =>  'beyond'),
            );
            $brands = Brand::orderBy('title')->get();
            $categories = Category::orderBy('name')->get();
            $subcategories = SubCategories::orderBy('name')->get();
            $products = Product::with('subcategory','subcategory.category',
                'brand','variants','reviews')
                ->where('status','1')
                ->offset(0)->limit(12)->get();
            
            return view('shopping.shop',compact('products','brands','categories','subcategories','price_range'));
            
        }catch(\Exception $e){
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    public function getFilterData(Request $request)
    {
        try{
            
            $bconditions = array();
            $vconditions = array();
            $cconditions = array();
            $status = true;
            if($request->has('filter') && $request->get('filter') == 'filter'){

                if(!empty($request->category_id)){
                    array_push($cconditions,['id',$request->category_id]);
                }
                if(!empty($request->brand_id)){
                    array_push($bconditions,['id',$request->brand_id]);
                }
                if(!empty($request->min_price) && !empty($request->max_price)){
                    if($request->max_price == 'beyond'){
                        array_push($vconditions,['selling_price','>',$request->min_price]);
                    }else{
                        array_push($vconditions,['selling_price','>=',$request->min_price]);
                        array_push($vconditions,['selling_price','<=',$request->max_price]);
                    }
                    
                }

               $products = Product::where('status','1')
                ->where(function($mainQuery) use($request,$bconditions,$vconditions,$cconditions){
                    if($request->has('filter') && $request->get('filter') == 'filter'){
                        if(!empty($request->brand_id)){
                            $mainQuery->whereHas('brand',function($bquery) use($bconditions){
                                $bquery->where($bconditions);
                            });
                        }
                        if(!empty($request->category_id)){
                            $mainQuery->whereHas('subcategory',function($squery) use($cconditions){
                                $squery->whereHas('category',function($cquery) use($cconditions){
                                    $cquery->where($cconditions);
                                });
                            });
                        }
                        if(!empty($request->min_price) && !empty($request->max_price)){
                            $mainQuery->whereHas('variants',function($vquery) use($vconditions){
                                $vquery->where($vconditions);
                            });
                        }
                    }
                })
                ->with(['subcategory','subcategory.category',
                'brand','variants'=>function($withQuery) use($vconditions){
                    $withQuery->where($vconditions);
                },'reviews'])
                ->orderBy('updated_at','desc')
                ->offset(0)->limit(12)->get();

                $view=view('shopping.fetch_products',compact('products'));
                return $view->render();

            }else{

                $products = Product::with('subcategory','subcategory.category',
                'brand','variants','reviews')
                ->where('status','1')
                ->offset(0)->limit(12)->get();

                $view=view('shopping.fetch_products',compact('products'));
                return $view->render();
            }
            
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function getSearchData(Request $request)
    {
        try{            
            $products = Product::where('name', 'like', '%' .$request->search . '%')->offset(0)->limit(8)->get();
            $view=view('shopping.fetch_search_products',compact('products'));
            return $view->render();
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    
    public function getQuickView(Request $request)
    {
        try{            
            $product = Product::with('reviews')->where('id',$request->product_id)->first();
            $img_array = explode(",", $product->images);
            $view=view('shopping.show_quick_view',compact('product','img_array'));
            return $view->render();
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
