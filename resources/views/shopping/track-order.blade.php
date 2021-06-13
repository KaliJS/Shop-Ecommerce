@extends('layouts.index')

@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('/vendors/styles/core.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/vendors/styles/icon-font.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/vendors/styles/style.css')}}">
@section('css')
<style>
  body{
    background-color: white !important;
  }
</style>
@stop
<div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="{{url('/')}}">Home</a></li>
			<li>My orders</li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder">MY ORDERS</h1>
			<div class="row">
				<div class="col-sm-12 col-xl-12">
					<div class="tt-shopcart-table">
						<table class="data-table table stripe hover nowrap">
              <thead>
                <tr>
                   <th class="table-plus datatable-nosort">S.No.</th>
                   <th>Order Id</th>
                   <th>Product Image</th>
                   <th>Name</th>
                   <th>Amount</th>
                   <th>Order Status</th>
                   <th>Payment Status</th>            
                   <th>Order Place Date</th>
                </tr>
             </thead>
							<tbody class="shopping_basket_container">

                @if($orders)
                  @foreach($orders as $key => $order)
                    <tr>
                      <td><a href="#" class="">{{$key+1}}</a></td>
                      <td><a href="#" class="">{{$order->id}}</a></td>
                      
                      <td>
                        <div class="tt-product-img">
                          {{-- @foreach(explode(',',$order->items->product_variant->product->images) as $image)
                            @if ($loop->first)
                              <img src="images/loader.svg" data-src="{{asset('/uploads/products/'.$image)}}" alt="">
                            @endif
                          @endforeach --}}
                        </div>
                      </td>

                      <td>{{--<a href="{{url('/product/'.$order->items->product_variant->product->slug)}}" class="tt-price">{{$order->items->product_variant->product->name}}</a> --}}</td>
                      
                      <td><div class="tt-price">{{$order->final_price}}</div></td>

                      <td><div class="tt-price">{{$order->order_status}}</div></td>
                      <td><div class="tt-price">{{$order->payment_status}}</div></td>
                      <td><div class="tt-price">{{date("j F Y g:i A",strtotime($order->created_at))}}</div></td>

                    </tr>
                  @endforeach

                @endif
    
                  @if(!$orders)
                    <tr>
                      <td class="empty_shopping_cart">Your Order list is empty!</td>
                    </tr>                   
                  @endif
							</tbody>
						</table>
						<div class="tt-shopcart-btn">
							<div class="col-left">
								<a class="btn-link" href="{{url('shop/')}}"><i class="icon-e-19"></i>CONTINUE SHOPPING</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>


@stop


@section('js')

<script src="{{asset('/src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('/vendors/scripts/dashboard.js')}}"></script>
<script src="{{asset('/vendors/scripts/datatable-setting.js')}}"></script>

<script type="text/javascript">


  // $(document).on("click",".delivery_boy_assign",function(){
  //       const order_id = $(this).data('order_id');

  //       $.ajax({
  //           url:"{{url('order/getDeliveryBoy')}}"+`/${order_id}`
  //       })
  //       .then(response=>{

  //           $("#deliveryBoy").html(response);
  //           $("#deliveryBoyModal").modal("show");
  //       }).fail(err=>console.log('error',err));
  //   });

  // $(document).on("click",".items_model",function(){
  //       const order_id = $(this).data('order_id');
  //       $.ajax({
  //           url:"{{url('order/getAllOrderItems')}}"+`/${order_id}`
  //       })
  //       .then(response=>{

  //           $("#items_modal tbody").html(response);
  //           $("#items_modal").modal("show");
  //       }).fail(err=>console.log('error',err));
  //   });
    
</script>

@stop