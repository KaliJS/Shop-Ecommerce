@extends('layouts.index')

@section('css')

<style>

	td{
		width: 30%;
		padding: 20px 3px;
	}
	tr{
		text-align: center;
	}

</style>

@stop

@section('content')


<div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="{{url('/')}}">Home</a></li>
			<li>Shopping Wishlist</li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder">SHOPPING WISHLIST</h1>
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<div class="tt-shopcart-table">
						<table>
							<tbody class="shopping_basket_container">

								@foreach($wishlists as $key => $c)
								<tr>
									
									<td>
									<div class="tt-product-img">
										@foreach(explode(',',$c->product->images) as $image)
											@if ($loop->first)
												<img src="images/loader.svg" data-src="{{asset('/uploads/products/'.$image)}}" alt="">
											@endif
										@endforeach
									</div>
									</td>
									<td>
									<h2 class="tt-title">
										<a href="{{url('/product/'.$c->product->slug)}}">{{$c->product->name}}</a>
									</h2>
									</td>
									<td>
										<div class="col-left">
											<a class="btn-link" href="{{url('/product/'.$c->product->slug)}}">VIEW AND ADD TO CART<i class="icon-e-20"></i></a>
										</div>
									</td>
									
								</tr>
								@endforeach

								@if(count($wishlists) < 1)
								<tr>
									<td class="empty_shopping_cart">Your Shopping Wishlist is empty!</td>
								</tr>                   
								@endif
							</tbody>
						</table>

						<div class="tt-shopcart-btn">
							<div class="col-left">
								<a class="btn-link" href="{{url('/shop')}}"><i class="icon-e-19"></i>CONTINUE SHOPPING</a>
							</div>
							@if(count($wishlists) > 0)
							<div class="col-right">
								<a class="btn-link" id="clear_shopping_wishlist" href="#"><i class="icon-h-02"></i>CLEAR SHOPPING WISHLIST</a>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal  fade" id="wishlistRemovedSuccessMessage" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-s">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
      </div>
      <div class="modal-body">
        <div class="tt-modal-subsribe-good">
          <i class="icon-f-68"></i> Wishlist item removed successfully.
        </div>
      </div>
    </div>
  </div>
</div>
  

@stop


@section('js')

<script type="text/javascript">

    $(document).on("click","#clear_shopping_wishlist",function(){

        $.ajax({
              method:'POST',
              url:`/removeWishlist`,
              data:{"_token":"{{csrf_token()}}"}
          }).then(response=>{
            
              if(response == 'success'){
                
                $('.shopping_basket_container').fadeOut(function(){
                    $(this).remove();
                });

				$('.tt-shopcart-table').html(`<tr><td class="empty_shopping_cart">Your Shopping Wishlist is empty!</td></tr>`);

                $('#wishlistRemovedSuccessMessage').modal('show');

                }else{
                  alert('! Something went wrong, Please Try again later...');
              }          
              
          }).fail(error=>{
              console.log('error',error);
          });
        
      });

  


   
    
</script>

@stop