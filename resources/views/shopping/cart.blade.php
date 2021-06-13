@extends('layouts.index')

@section('content')


<div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="{{url('/')}}">Home</a></li>
			<li>Shopping Cart</li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder">SHOPPING CART</h1>
			<div class="row">
				<div class="col-sm-12 col-xl-8">
					<div class="tt-shopcart-table">
						<table>
							<tbody class="shopping_basket_container">

                @foreach($cart as $key => $c)
                  <tr>
                    <td>
                      <a href="#" id="{{$key}}" class="tt-btn-close product-remove"></a>
                    </td>
                    <td>
                      <div class="tt-product-img">
                        <img src="images/loader.svg" data-src="{{asset('/uploads/products/'.$c['image'])}}" alt="">
                      </div>
                    </td>
                    <td>
                      <h2 class="tt-title">
                        <a href="#">{{$c['product_name']}}</a>
                      </h2>
                      <ul class="tt-list-parameters">
                        <li>
                          <div class="tt-price">
                          {{$c['variant_price']}}
                          </div>
                        </li>
                        <li>
                          <div class="detach-quantity-mobile">
                            <div class="detach-quantity-desctope">
                              <div class="tt-input-counter style-01">
                                <span class="minus-btn" id="{{$key}}" data-type="minus"></span>
                                <input type="text" id="quantity-{{$key}}" value="{{$c['quantity']}}" size="5">
                                <span class="plus-btn" id="{{$key}}" data-type="plus"></span>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="tt-price subtotal total-{{$key}}">
                          {{$c['subtotal']}}
                          </div>
                        </li>
                      </ul>
                    </td>
                    <td>
                      <div class="tt-price">
                      {{$c['variant_price']}}
                      </div>
                    </td>
                    <td>
                      <div class="detach-quantity-desctope">
                        <div class="tt-input-counter style-01">
                          <span class="minus-btn" id="{{$key}}" data-type="minus"></span>
                          <input type="text" id="quantity-{{$key}}" value="{{$c['quantity']}}" size="5">
                          <span class="plus-btn" id="{{$key}}" data-type="plus"></span>
                        </div>
                      </div>
                    </td>
                    
                    <td>
                      <div class="tt-price subtotal total-{{$key}}">
                      {{$c['subtotal']}}
                      </div>
                    </td>
                  </tr>
                @endforeach

                @if(count($cart) < 1)
                  <tr>
                    <td class="empty_shopping_cart">Your Shopping Basket is empty!</td>
                  </tr>                   
                @endif
							</tbody>
						</table>
						<div class="tt-shopcart-btn">
							<div class="col-left">
								<a class="btn-link" href="{{url('shop/')}}"><i class="icon-e-19"></i>CONTINUE SHOPPING</a>
							</div>
              @if(count($cart) > 0)
							<div class="col-right">
								<a class="btn-link" id="clear_shopping_cart" href="#"><i class="icon-h-02"></i>CLEAR SHOPPING CART</a>
							</div>
              @endif
						</div>
					</div>


        @if (Auth::user() != null)
          <div id="tt-pageContent">
            <div class="container-indent">
              <div class="container">
                <h3 class="tt-title-subpages noborder">SHIPPING DETAILS</h3>
                <div class="tt-login-form">
                  <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-12">
                      <div class="tt-item">
                        <h2 class="tt-title">PERSONAL INFORMATION</h2>
                        
                        <div class="tt-required">* Required Fields</div>
                      
                        <div class="form-default">
          
                          <form id="place_order" class="billing-form" method="POST" action="{{url('/placeOrder')}}" id="contactform" novalidate="novalidate">    
                            @csrf
                            <div class="row align-items-end">
                              
                              <input type="hidden" class="" name="amount" value={{$total_price}}>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="firstname">First Name</label>
                                  <input type="text" value="{{Auth::user()->first_name}}" name="first_name" class="form-control" readonly placeholder="First Name" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="lastname">Last Name</label>
                                  <input type="text" value="{{Auth::user()->last_name}}" name="last_name" class="form-control" readonly placeholder="Last Name" required>
                                </div>
                              </div>
          
                              <div class="w-100"></div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="firstname">Email Address</label>
                                  <input type="email" value="{{Auth::user()->email}}" name="email" class="form-control" placeholder="Email" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="phone">Phone</label>
                                  <input type="number" value="{{Auth::user()->phone}}" name="phone" class="form-control" placeholder="Phone" required>
                                </div>
                              </div>                             
                              <div class="w-100"></div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="streetaddress">Street Address</label>
                                  <input type="text" value="{{Auth::user()->address}}" class="form-control" name="address" placeholder="Address" required>
                                </div>
                              </div>
                              <div class="w-100"></div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="towncity">Town / City</label>
                                  <input type="text" value="{{Auth::user()->city}}" name="city" class="form-control" placeholder="Town / City" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="postcodezip">Postcode / ZIP *</label>
                                  <input type="number" value="{{Auth::user()->pincode}}" name="pincode" class="form-control" placeholder="Postcode" required>
                                </div>
                              </div>
                              
                              <hr class="w-100 m-2"/>
                              <div class="w-100"></div>
                              <div class="shipping-checkbox">
                                <h2 class="tt-title mt-2">SHIPPING ADDRESS</h2>
                                <label class="shipping-label" for="chkPassport">
                                  <input type="checkbox" name="shipping_check" value="0" id="shippingCheck" onclick="ShowHideDiv(this)" />
                                  Is same as above address?
                                </label>
                              </div>
                              

                                <div class="col-md-12 diffShipping">
                                  <div class="form-group">
                                    <label for="streetaddress">Name</label>
                                    <input type="text" value="" class="form-control" name="shipping_user_name" placeholder="Name" required>
                                  </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-12 diffShipping">
                                  <div class="form-group">
                                    <label for="streetaddress">Address</label>
                                    <input type="text" value="" class="form-control" name="shipping_address" placeholder="Address" required>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group diffShipping">
                                    <label for="postcodezip">Postcode / ZIP *</label>
                                    <input type="number" value="" name="shipping_pincode" class="form-control" placeholder="Postcode" required>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group diffShipping">
                                    <label for="phone">Phone</label>
                                    <input type="number" value="" name="shipping_phone" class="form-control" placeholder="Phone" required>
                                  </div>
                                </div>
                            
                            </div>
                          </form><!-- END -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif




				</div>
				<div class="col-sm-12 col-xl-4">
					<div class="tt-shopcart-wrapper">
						<div class="tt-shopcart-box">
							<h4 class="tt-title">
                PLACE YOU ORDER
							</h4>
							<p>Enter your destination to get a shipping estimate.</p>
							
						</div>
						
						<div class="tt-shopcart-box tt-boredr-large">
							<table class="tt-shopcart-table01">
								
								<tfoot>
									<tr>
										<th>GRAND TOTAL</th>
										<td id="final_price">{{$total_price}}</td>
									</tr>
								</tfoot>
							</table>
              @if(count($cart)>0)
                @if (Auth::user() != null)
                  <button form="place_order" type="submit" name="payment_type" value="cash_on_delivery" class="btn btn-border mb-3">CASH ON DELIVERY</button>
                  <button form="place_order" type="submit" name="payment_type" value="pay_now" class="btn btn-border mb-3">PAY NOW</button>
                @else
                  <a href="{{url('/checkout')}}" class="btn btn-lg"><span class="icon icon-check_circle"></span>CHECKOUT</a>
                @endif
              @endif
            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal  fade" id="cartRemovedSuccessMessage" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-s">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
      </div>
      <div class="modal-body">
        <div class="tt-modal-subsribe-good">
          <i class="icon-f-68"></i> Cart item removed successfully.
        </div>
      </div>
    </div>
  </div>
</div>
  

@stop


@section('js')

<script type="text/javascript">


    function ShowHideDiv(shippingCheck) {

        var diffShipping = $(".diffShipping");

        for (i = 0; i < diffShipping.length; i++) {
            diffShipping[i].classList.toggle('d-none');
        }

    }

  let checkout_total_price = 0;

	$(document).on("click",".plus-btn",function(){
      
      const selected_variant_id = this.id;
      let quantity = $(this).parent().find('#quantity-'+selected_variant_id).val();
          
      const todo = 'update';

      $.ajax({
            method:'POST',
            url:`/cart/updateCart`,
            data:{selected_variant_id,todo,quantity,"_token":"{{csrf_token()}}"},
            encode  : true
        }).then(response=>{
          
            if(response){
	              $('.total-'+selected_variant_id).text(response[1]);
                $('#final_price').text(response[0]);
            }else{
                alert('! Something went wrong, Please Try again later..');
            }  

        }).fail(error=>{
            console.log('error',error);
        });
      
    });

    $(document).on("click",".minus-btn",function(){
      const selected_variant_id = this.id;
      let quantity = $(this).parent().find('#quantity-'+selected_variant_id).val();

      if(quantity<1){
        return;
      }

      $('#quantity-'+selected_variant_id).val(quantity);
      const todo = 'update';
      $.ajax({
            method:'POST',
            url:`/cart/updateCart`,
            data:{selected_variant_id,todo,quantity,"_token":"{{csrf_token()}}"},
            encode  : true
        }).then(response=>{
          
            if(response){
                $('.total-'+selected_variant_id).text(response[1]);
                $('#final_price').text(response[0]);
              }else{
                alert('! Something went wrong, Please Try again later..');
              }           
            
        }).fail(error=>{
            console.log('error',error);
        });
    });

	$(document).on("click",".product-remove",function(){

	  const el = this;
      const selected_variant_id = this.id;
      
      const todo = 'delete';
      $.ajax({
            method:'POST',
            url:`/cart/updateCart`,
            data:{selected_variant_id,todo,"_token":"{{csrf_token()}}"},
            encode  : true
        }).then(response=>{
          
            if(response.length>0){
              
	             $(el).parent().parent().fadeOut(function(){
	                $(this).remove();
	             }); 
               getHeaderCartList();
              // $('#cartRemovedSuccessMessage').modal('show');
	             $('#final_price').text(response[0]);
	             $('.tt-badge-cart').text(response[1]);

              }else{
                alert('! Something went wrong, Please Try again later..');
              }          
            
        }).fail(error=>{
            console.log('error',error);
        });
      
    });

    $(document).on("click","#clear_shopping_cart",function(){

     
        const selected_variant_id = 0;
        
        const todo = 'clear_all';
        $.ajax({
              method:'POST',
              url:`/cart/updateCart`,
              data:{selected_variant_id,todo,"_token":"{{csrf_token()}}"},
              encode  : true
          }).then(response=>{
            
              if(response){
                
                $('.shopping_basket_container').fadeOut(function(){
                    $(this).remove();
                }); 
                getHeaderCartList();
                $('.tt-shopcart-table').html(`<tr><td class="empty_shopping_cart">Your Shopping Wishlist is empty!</td></tr>`);

                // $('#cartRemovedSuccessMessage').modal('show');
                $('#final_price').text(0);
                $('.tt-badge-cart').text(0);

                }else{
                  alert('! Something went wrong, Please Try again later..');
                }          
              
          }).fail(error=>{
              console.log('error',error);
          });
        
      });

  


   
    
</script>

@stop