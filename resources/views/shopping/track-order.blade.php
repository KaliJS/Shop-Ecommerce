@extends('layouts.index')

@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('/vendors/styles/core.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/vendors/styles/icon-font.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/vendors/styles/style.css')}}">
<style>
  .tt-shopcart-table table td:nth-child(n+4) {
    display: table-cell;
  }

  .tt-shopcart-table table td:nth-child(1){
    padding-left: 20px;
  }
  table.dataTable.nowrap th, table.dataTable.nowrap td{
    text-align: center;
  }

  @media (max-width: 800px){
    #orderItemsModal .modal-dialog{
      width: 80%;
    } 
    #orderItemsModal .modal-header {
      padding: 10px 10px 0px 10px;
      justify-content: center;
    } 
    #orderItemsModal h6{
      font-size: 13px;
      padding-bottom: 6px;
      margin: 11px 0 0 0;
    } 
    #orderItemsModal .modal-body {
    padding: 8px;
    } 
    #orderItemsModal thead th {
    font-weight: 600;
    font-size: 12px;
    border-bottom: 0;
    padding-left: 0rem;
    padding: 0.35em;
    } 
    #orderItemsModal td {
    font-size: 12px;
    font-weight: 500;
    padding: 0.5rem;
    } 
    .dtr-details{
      widows: 100%;
    }
  }
</style>

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
                   <th>items</th>
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
                        <a class="btn-block orderItemsButton" data-order_id="{{$order->id}}" type="button">
                            <i class="dw dw-eye"></i> View
                         </a>
                      </td>
                      
                      <td><div class="tt-price">{{$order->final_price}}</div></td>

                      <td><div class="tt-price track_shiprocket_order" id="{{$order->shiprocket_shipment_id}}">{{$order->order_status}}</div></td>
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


<!-- modal (show items info) -->
<div class="modal fade" id="orderItemsModal" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content ">
			<div class="modal-header">
        <h6 class="modal-title" id="myLargeModalLabel">Order Items</h6>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
			</div>
			<div class="modal-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Payable Price</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
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

  https://apiv2.shiprocket.in/v1/external/courier/track/shipment/16104408' \

  $(document).on("click",".orderItemsButton",function(){
        const order_id = $(this).data('order_id');
        $.ajax({
            url:"{{url('order/getOrderItems')}}"+`/${order_id}`
        })
        .then(response=>{
            $("#orderItemsModal tbody").html(response);
            $("#orderItemsModal").modal("show");
        }).fail(err=>console.log('error',err));
    });

    $(document).on("click",".track_shiprocket_order",function(){
        const shipment_id = this.id
        $.ajax({
            url:"{{url('order/trackOrderStatus')}}"+`/${shipment_id}`
        })
        .then(response=>{
            $("#orderItemsModal tbody").html(response);
            $("#orderItemsModal").modal("show");
        }).fail(err=>console.log('error',err));
    });
    
</script>

@stop