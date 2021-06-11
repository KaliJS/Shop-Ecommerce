<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Redirect;
use DB;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $wishlists = Wishlist::orderBy('created_at','desc')->get();
            return view('admin.wishlists.index',compact('wishlists'));
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
        $users = User::orderBy('first_name')->get();
        $products = Product::orderBy('name')->get();
        return view('admin.wishlists.create',compact('products','users'));
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
            'user_id' => 'required',
            'product_id' => 'required'
        ]);
       
        try{
            $data=[];
            foreach($request->product_id as $product){
                $data[]=array('product_id'=>$product,'user_id'=>$request->user_id,'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s"));
            }
            Wishlist::insert($data);
            
            return redirect()->back()
                ->with('success', 'wishlist created successfully.');

        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        $products = Product::orderBy('name')->get(['id','name']);
        $users = User::orderBy('first_name')->get(['id','first_name','last_name']);
        $selected_products=Wishlist::where('product_id',$wishlist->product_id)->pluck('product_id')->toArray();
            
        return view('admin.wishlists.edit',compact('wishlist','users','selected_products','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required'
        ]);
        \DB::beginTransaction();
        try{

            $deleted_wishlist = Wishlist::where('id',$wishlist->id)->delete();
            foreach($request->product_id as $product){
                $data[]=array('product_id'=>$product,'user_id'=>$request->user_id,'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s"));
            }
            Wishlist::insert($data);           
            \Db::commit();
            
            $wishlists = Wishlist::orderBy('created_at','desc')->get();
            return view('admin.wishlists.index',compact('wishlists'));

        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        try{
            $wishlist->delete();
            return redirect()->back()
                ->with('success', 'wishlist Deleted successfully.');
        }catch(\Exception $e){
            DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }
}
