@extends('layouts.index')
@section('css')
<style type="text/css">

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  margin: auto;
}
.modal-content {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 40% !important;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 0.3rem;
    outline: 0;
    }

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    padding: 10px;
    border: 1px solid #888;
    width: 80%;
    margin-right: 16px;
    margin-left: auto;
    margin-top: -80px !important;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  margin-left: 95%;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
a:not([href]):not([tabindex]) {
    color: white;
    text-decoration: none;
}
a:not([href]):not([tabindex]):hover {
    color: #82ae46;
    text-decoration: none;
}


@media(max-width: 400px){
	.modal-content{
		width: 90% !important;
		margin: auto;
	}
}

</style>

@stop


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
								<a class="btn-link" href="#"><i class="icon-e-19"></i>CONTINUE SHOPPING</a>
							</div>
              @if(count($cart) > 0)
							<div class="col-right">
								<a class="btn-link" id="clear_shopping_cart" href="#"><i class="icon-h-02"></i>CLEAR SHOPPING CART</a>
							</div>
              @endif
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-xl-4">
					<div class="tt-shopcart-wrapper">
						<div class="tt-shopcart-box">
							<h4 class="tt-title">
								ESTIMATE SHIPPING AND TAX
							</h4>
							<p>Enter your destination to get a shipping estimate.</p>
							<form class="form-default">
								<div class="form-group">
									<label for="address_country">COUNTRY <sup>*</sup></label>
									<select id="address_country" class="form-control">
										<option>Austria</option>
										<option>Belgium</option>
										<option>Cyprus</option>
									
									</select>
								</div>
								<div class="form-group">
									<label for="address_province">STATE/PROVINCE <sup>*</sup></label>
									<select id="address_province" class="form-control">
										<option>State/Province</option>
									</select>
								</div>
								<div class="form-group">
									<label for="address_zip">ZIP/POSTAL CODE <sup>*</sup></label>
									<input type="text" name="name" class="form-control" id="address_zip" placeholder="Zip/Postal Code">
								</div>
								<a href="#" class="btn btn-border">CALCULATE SHIPPING</a>
								<p>
									There is one shipping rate available for Alabama, Tanzania, United Republic Of.
								</p>
								<ul class="tt-list-dot list-dot-large">
									<li><a href="#">International Shipping at $20.00</a></li>
								</ul>
							</form>
						</div>
						<div class="tt-shopcart-box">
							<h4 class="tt-title">
								NOTE
							</h4>
							<p>Add special instructions for your order...</p>
							<form class="form-default">
								<textarea class="form-control" rows="7"></textarea>
							</form>
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
							<a href="{{url('/checkout')}}" class="btn btn-lg"><span class="icon icon-check_circle"></span>PROCEED TO CHECKOUT</a>
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


  let checkout_total_price = 0;

	$(document).on("click",".plus-btn",function(){
      
      const selected_variant_id = this.id;
      let quantity = $('#quantity-'+selected_variant_id).val();

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
      let quantity = $('#quantity-'+selected_variant_id).val();

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
          
            if(response){
              
	             $(el).parent().parent().fadeOut(function(){
	                $(this).remove();
	             }); 
              // $('#cartRemovedSuccessMessage').modal('show');
	             $('#final_price').text(response);

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

                $('.tt-shopcart-table').html(`<tr><td class="empty_shopping_cart">Your Shopping Wishlist is empty!</td></tr>`);

                // $('#cartRemovedSuccessMessage').modal('show');
                $('#final_price').text(0);

                }else{
                  alert('! Something went wrong, Please Try again later..');
                }          
              
          }).fail(error=>{
              console.log('error',error);
          });
        
      });

  


   
    
</script>

@stop