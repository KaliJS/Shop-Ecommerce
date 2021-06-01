<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\User;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id == User::DELIVERY_BOY_ROLE_ID){
            
            $orders = Orders::where('delivery_boy_id',Auth::user()->id)->orderBy('id','desc')->get();
            $delivery_boys = User::where('role_id',User::DELIVERY_BOY_ROLE_ID)->get(['id','name']);
            return view('admin.orders.index',compact('orders','delivery_boys'));
        }
        $users = User::get();
        $users = count($users);
        $products = Product::get();
        $products = count($products);
        $orders = Orders::get();
        $orders = count($orders);
        $remaining_orders = Orders::where('order_status','!=','completed')->get();
        $remaining_orders = count($remaining_orders);
        $completed_orders = Orders::where('order_status','completed')->get();
        $completed_orders = count($completed_orders);
        return view('admin.dashboard.index',compact('users','products','orders','remaining_orders','completed_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }

    public function completed_orders()
    {
       try{
            $orders = Orders::where('order_status','completed')->orderBy('id','desc')->get();
            $delivery_boys = User::where('role_id',User::DELIVERY_BOY_ROLE_ID)->get(['id','name']);
            return view('admin.orders.index',compact('orders','delivery_boys'));
        }catch(\Exception $e){
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    public function remaining_orders()
    {
       try{
            $orders = Orders::where('order_status','!=','completed')->orderBy('id','desc')->get();
            $delivery_boys = User::where('role_id',User::DELIVERY_BOY_ROLE_ID)->get(['id','name']);
            return view('admin.orders.index',compact('orders','delivery_boys'));
        }catch(\Exception $e){
            return Redirect::back()->with('error',$e->getMessage());
        }
    }
}
