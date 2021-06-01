@extends('layouts.admin')

@section('content')

<div class="container-fluid">
   <div class="row">
            <div class="col-xl-3 mb-30">
               <a href="{{ url('/admin/users') }}">
               <div class="card-box height-100-p widget-style1">
                  <div class="d-flex flex-wrap align-items-center">
                     <div class="progress-data">
                        <i class="icon-copy dw dw-id-card2" style="color: aquamarine; font-weight: bold; font-size: xxx-large;"></i>
                     </div>
                     <div class="widget-data">
                        <div class="h4 mb-0">{{$users}}</div>
                        <div class="weight-600 font-14">Total Users</div>
                     </div>
                  </div>
               </div>
            </a>
            </div>
            <div class="col-xl-3 mb-30">
               <a href="{{ url('/admin/orders') }}">
               <div class="card-box height-100-p widget-style1">
                  <div class="d-flex flex-wrap align-items-center">
                     <div class="progress-data">
                        <i class="icon-copy dw dw-shopping-cart1 text-primary" style=" font-size: xxx-large;"></i>
                     </div>
                     <div class="widget-data">
                        <div class="h4 mb-0">{{$orders}}</div>
                        <div class="weight-600 font-14">Total Orders</div>
                     </div>
                  </div>
               </div>
            </a>
            </div>
            <div class="col-xl-3 mb-30">
               <a href="{{ url('/admin/products') }}">
               <div class="card-box height-100-p widget-style1">
                  <div class="d-flex flex-wrap align-items-center">
                     <div class="progress-data">
                        <i class="icon-copy dw dw-pagoda text-warning" style="font-size: xxx-large;"></i>
                     </div>
                     <div class="widget-data">
                        <div class="h4 mb-0">{{$products}}</div>
                        <div class="weight-600 font-14">Total Products</div>
                     </div>
                  </div>
               </div>
            </a>
            </div>
            <div class="col-xl-3 mb-30">
               <a href="{{url('/admin/dashboard/completed_orders')}}">
               <div class="card-box height-100-p widget-style1">
                  <div class="d-flex flex-wrap align-items-center">
                     <div class="progress-data">
                        <i class="icon-copy dw dw-delivery-truck-1 text-success" style="font-weight: bold; font-size: xxx-large;"></i>
                     </div>
                     <div class="widget-data">
                        <div class="h4 mb-0">{{$completed_orders}}</div>
                        <div class="weight-600 font-14">
                        Completed Orders</div>
                     </div>
                  </div>
               </div>
            </a>
            </div>
            <div class="col-xl-3 mb-30">
               <a href="{{url('/admin/dashboard/remaining_orders')}}">
               <div class="card-box height-100-p widget-style1">
                  <div class="d-flex flex-wrap align-items-center" >
                     <div class="progress-data">
                        <i class="icon-copy dw dw-delivery-truck-2 text-danger" style="font-weight: bold; font-size: xxx-large;"></i>
                     </div>
                     <div class="widget-data">
                        <div class="h4 mb-0">{{$remaining_orders}}</div>
                        <div class="weight-600 font-14">Remaining Orders</div>
                     </div>
                  </div>
               </div>
              </a>
            </div>
            
         </div>
         
</div>

@stop