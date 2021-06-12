<!-- modal (AddToCartProduct) -->
<div class="modal  fade"  id="modalAddToCartProduct" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
			</div>
			<div class="modal-body">
				<div class="tt-modal-addtocart mobile">
					<div class="tt-modal-messages">
						<i class="icon-f-68"></i> Added to cart successfully!
					</div>
					<a href="{{url('/shop')}}" class="btn-link btn-close-popup">CONTINUE SHOPPING</a>
			        <a href="{{url('/cart')}}" class="btn-link">VIEW CART</a>
			        <a href="{{url('/checkout')}}" class="btn-link">PROCEED TO CHECKOUT</a>
				</div>
				<div class="tt-modal-addtocart desctope">
					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="tt-modal-messages">
								<i class="icon-f-68"></i> Added to cart successfully!
							</div>
							<div class="tt-modal-product">
								<div class="tt-img">
									<img src="{{asset('images/loader.svg')}}" id="cart_product_image" data-src="images/product/product-01.jpg" alt="">
								</div>
								<h2 class="tt-title"><a href="" id="cart_product_name"></a></h2>
								<div class="tt-qty">
									QTY: <span id="cart_product_quantity"></span>
								</div>
							</div>
							<div class="tt-product-total">
								<div class="tt-total">
									TOTAL: <span class="tt-price" id="cart_product_price"></span>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<a href="#" class="tt-cart-total">
								<div id="cart_product_count"></div>
								<div class="tt-total">
									TOTAL: <span class="tt-price" id="cart_products_total_price"></span>
								</div>
							</a>
							<a href="{{url('/shop')}}" class="btn btn-border btn-close-popup">CONTINUE SHOPPING</a>
							<a href="{{url('/cart')}}" class="btn btn-border">VIEW CART</a>
							<a href="{{url('/checkout')}}" class="btn">PROCEED TO CHECKOUT</a>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- modal (quickViewModal) -->

<div class="pop_up_quick_modal"></div>




@section('footer_js')

<script type="text/javascript">

	var options = {
		dots: true,
		arrows: false,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		adaptiveHeight: true,
		lazyLoad: 'progressive'
	}

	function ttInputCounter() {
		$('.tt-input-counter').find('.minus-btn, .plus-btn').on('click',function(e) {
				var $input = $(this).parent().find('input');
				var count = parseInt($input.val(), 10) + parseInt(e.currentTarget.className === 'plus-btn' ? 1 : -1, 10);
				$input.val(count).change();
		});
		$('.tt-input-counter').find("input").change(function() {
				var _ = $(this);
				var min = 1;
				var val = parseInt(_.val(), 10);
				var max = parseInt(_.attr('size'), 10);
				val = Math.min(val, max);
				val = Math.max(val, min);
				_.val(val);
		})
		.on("keypress", function( e ) {
				if (e.keyCode === 13) {
						e.preventDefault();
				}
		});
	};
	
	$(document).on("click",".quick_view_product",function(){

		var product_id = $(this).data('product_id');

		if(product_id){
			$.ajax({
			method:'POST',
			url:`{{url('/search/getQuickView')}}`,
			data:{product_id,"_token":"{{csrf_token()}}"},
			encode  : true
			}).then(response=>{
				if(response){
					$('.pop_up_quick_modal').html(response);
					setTimeout(function () {
						$('.tt-mobile-product-slider').not('.slick-initialized').slick(options);
					}, 500); 
					$('#ModalquickView').modal('show');
					// inputCounter
					if ($('.tt-input-counter').length) {
						ttInputCounter();
					};
					$('.choose_variant').trigger('change');
								
				}
			}).fail(error=>{
				console.log('error',error);
			});
		}else{
			$('#displayErrorMessage').modal('show');
		}   
	});

	let selling_price,variant_id,selectedOption,mrp_price,quantity,in_stock;
	
	$(document).on('change','.choose_variant', function() {

		selectedOption = $(this).find(":checked");
		selling_price = selectedOption.data("selling_price");
		mrp_price = selectedOption.data("mrp_price");
		in_stock = selectedOption.data("in_stock");    
		$('#detail_mrp_price').text('₹'+mrp_price);
		$('#detail_selling_price').text('₹'+selling_price);
		$('#detail_in_stock').text(in_stock);

	});
	
	$('.choose_variant').trigger('change');

	$(document).on('change','.quick_choose_variant', function() {

		selectedOption = $(this).find(":checked");
		selling_price = selectedOption.data("selling_price");
		mrp_price = selectedOption.data("mrp_price");
		in_stock = selectedOption.data("in_stock");    
		$('#quick_detail_mrp_price').text('₹'+mrp_price);
		$('#quick_detail_selling_price').text('₹'+selling_price);
		$('#quick_detail_selling_price_value').val(selling_price);
		$('#quick_detail_in_stock').text(in_stock);

	});
	
	$('.quick_choose_variant').trigger('change');

	$(document).on("click",".add_to_cart",function(){
		
		let cart_type,selected_variant_id,selected_product_id,selected_selling_price,selected_product_slug,selected_quantity,todo;
		var attr = $(this).attr('data-has_variant_id');
		var quick_view = $(this).attr('data-quick_view');
		console.log({attr});
		if(typeof quick_view !== 'undefined' && quick_view !== false){
			console.log('0');
			cart_type = 'quick_view_cart';
			selected_variant_id = $("input:radio[name='quick_variant']:checked").val();
			selected_product_id = this.id;
			selected_product_slug = $(this).data('slug_name');
			selected_quantity=$('#quick_detail_quantity').val();
			selected_selling_price = $('#quick_detail_selling_price_value').val();
		}
		else if (typeof attr !== 'undefined' && attr !== false) {
			console.log('1')
			cart_type = 'direct_cart';
			selected_variant_id = false;
			selected_product_slug = $(this).data('slug_name');
			selected_quantity = 1;
			selected_product_id = this.id;
			selected_selling_price = false;
		}
		else{
			console.log('2');
			cart_type = 'detail_cart';
			selected_variant_id = $("input:radio[name='variant']:checked").val();
			selected_product_id = this.id;
			selected_product_slug = $(this).data('slug_name');
			selected_quantity=$('#detail_quantity').val();
			selected_selling_price = selling_price;

		}	
		todo = 'add';         
		$.ajax({
			method:'POST',
			url:`{{url('product/updateCart')}}`, 
			data:{selected_product_id,selected_variant_id,selected_quantity,todo,selected_selling_price,"_token":"{{csrf_token()}}"},
			encode: true
		}).then(response=>{                
			
				if(response && response.length == 2){
				console.log(response);
				let total_price = 0;
				const cart_data = response[1];
				const variant_id = response[0];

				for(let i in cart_data){
					total_price += cart_data[i]['subtotal'];
				}

				const count = Object.keys(cart_data).length;
				const data = cart_data[variant_id];
				const img = data["image"];

				getHeaderCartList();

				$('.tt-badge-cart').text(count);
				$('#cart_product_count').text(`There are ${count} items in your cart`);
				$('#cart_product_image').attr("data-src",`{{URL::asset('/uploads/products/${img}')}}`);
				$('#cart_product_image').attr("src",`{{URL::asset('/uploads/products/${img}')}}`);
				$('#cart_product_price').text('₹'+data['variant_price']*data['quantity']);
				$('#cart_product_quantity').text(data['quantity']);
				$('#cart_products_total_price').text('₹'+total_price);
				$('#cart_product_name').text(data['product_name']);
				$('#cart_product_name').href = `url('/product/${selected_product_slug}')`;

				$('#ModalquickView').fadeOut('slow');
				$('.modal-backdrop').css('display', 'none');
				$("#modalAddToCartProduct").modal("show");
				}else{
				$("#displayErrorMessage").modal("show");
				}      
			
		}).fail(error=>{
			console.log('error',error);
		});
		
	});


  $(document).on('keyup','#search_1',function(){

	var search = $('#search_1').val();
	//if(search.trim.len())
	if(search.trim().length<=0){
		$('#search_hint_1').html('');
	}else{
		if($(this).val()){
			$.ajax({
		method:'POST',
		url:`{{url('/search/getSearchData')}}`,
		data:{search,"_token":"{{csrf_token()}}"},
		encode  : true
		}).then(response=>{
			if(response){
				$('#search_hint_1').html(response);            
			}
		}).fail(error=>{
			console.log('error',error);
		});
		}
	}          
	
  });

  $(document).on('keyup','#search_2',function(){

	var search = $('#search_2').val();

	if(search.trim().length<=0){
		$('#search_hint_2').html('');
	}else{
		if($(this).val()){
			$.ajax({
		method:'POST',
		url:`{{url('/search/getSearchData')}}`,
		data:{search,"_token":"{{csrf_token()}}"},
		encode  : true
		}).then(response=>{
			if(response){
				$('#search_hint_2').html(response);            
			}
		}).fail(error=>{
			console.log('error',error);
		});
		}      
	}
  });


  function getHeaderCartList(){
	$.ajax({
	  method:'GET',
	  url:`{{url('/cart/getHeaderCartList')}}`
	  }).then(response=>{
		  if(response){
			   $('#header_cart_list').html(response);            
		  }
	  }).fail(error=>{
		  console.log('error',error);
	  });
  }

  getHeaderCartList();


  $(document).on("click",".header-product-remove",function(){

	const el = this;
	const selected_variant_id = this.id;

	const todo = 'delete';
	$.ajax({
		method:'POST',
		url:`{{url('/cart/updateCart')}}`,
		data:{selected_variant_id,todo,"_token":"{{csrf_token()}}"},
		encode  : true
	}).then(response=>{
		
		if(response){
			
			$(el).parent().parent().fadeOut(function(){
				$(this).remove();
			}); 
			//getHeaderCartList();
			//$('#cartRemovedSuccessMessage').modal('show');
			$('#final_price').text(response);
			$('.tt-cart-total-price').text(response);

			}else{
			alert('! Something went wrong, Please Try again later..');
			}          
		
	}).fail(error=>{
		console.log('error',error);
	});

  });



  
</script>


@stop




<footer id="tt-footer">
	<div class="tt-footer-default tt-color-scheme-02">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-9">
					<div class="tt-newsletter-layout-01">
						<div class="tt-newsletter">
							<div class="tt-mobile-collapse">
								<h4 class="tt-collapse-title">
									BE IN TOUCH WITH US:
								</h4>
								<div class="tt-collapse-content">
									<form id="newsletterform" class="form-inline form-default" method="post" novalidate="novalidate" action="#">
										<div class="form-group">
											<input type="text" name="email" class="form-control" placeholder="Enter your e-mail">
											<button type="submit" class="btn">JOIN US</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-auto">
					<ul class="tt-social-icon">
						<li><a class="icon-g-64" target="_blank" href="http://www.facebook.com/"></a></li>
						<li><a class="icon-h-58" target="_blank" href="http://www.facebook.com/"></a></li>
						<li><a class="icon-g-66" target="_blank" href="http://www.twitter.com/"></a></li>
						<li><a class="icon-g-67" target="_blank" href="http://www.google.com/"></a></li>
						<li><a class="icon-g-70" target="_blank" href="https://instagram.com/"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="tt-footer-col tt-color-scheme-01">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-2 col-xl-3">
					<div class="tt-mobile-collapse">
						<h4 class="tt-collapse-title">
							CATEGORIES
						</h4>
						<div class="tt-collapse-content">
							<ul class="tt-list">
							@foreach($complete_data as $key => $d)
								<li><a href="{{url('/shop?category='.$d->id)}}">{{$d->name}}</a></li>
								
							@endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-2 col-xl-3">
					<div class="tt-mobile-collapse">
						<h4 class="tt-collapse-title">
							MY ACCOUNT
						</h4>
						<div class="tt-collapse-content">
							<ul class="tt-list">
							@if (Auth::user() != null)
								<li><a href="{{url('/profile')}}">Orders</a></li>
								<li><a href="{{url('/wishlist')}}">Wishlist</a></li>
							@else
								<li><a href="{{url('/login')}}">Log In</a></li>
								<li><a href="{{url('/register')}}">Register</a></li>
							@endif
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="tt-mobile-collapse">
						<h4 class="tt-collapse-title">
							ABOUT
						</h4>
						<div class="tt-collapse-content">
							<p>
								Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, seddo eiusmod tempor incididunt ut labore etdolore.
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="tt-newsletter">
						<div class="tt-mobile-collapse">
							<h4 class="tt-collapse-title">
								CONTACTS
							</h4>
							<div class="tt-collapse-content">
								<address>
									<p><span>Address:</span> 2548 Broaddus Maple Court Avenue, Madisonville KY 4783, United States of America</p>
									<p><span>Phone:</span> +777 2345 7885;  +777 2345 7886</p>
									<p><span>Hours:</span> 7 Days a week from 10 am to 6 pm</p>
									<p><span>E-mail:</span> <a href="mailto:info@mydomain.com">info@mydomain.com</a></p>
								</address>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tt-footer-custom">
		<div class="container">
			<div class="tt-row">
				<div class="tt-col-left">
					<div class="tt-col-item tt-logo-col">
						<!-- logo -->
						<a class="tt-logo tt-logo-alignment" href="index.html">
							<img  src="images/loader.svg"  data-src="images/custom/logo.png" alt="">
						</a>
						<!-- /logo -->
					</div>
					<div class="tt-col-item">
						<!-- copyright -->
						<div class="tt-box-copyright">
							&copy; Wokiee 2020. All Rights Reserved
						</div>
						<!-- /copyright -->
					</div>
				</div>
				<div class="tt-col-right">
					<div class="tt-col-item">
						<!-- payment-list -->
						<ul class="tt-payment-list">
							<li><a href="javascript:void(0)"><span class="icon-Stripe"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span>
			                </span></a></li>
							<li><a href="javascript:void(0)"> <span class="icon-paypal-2">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span>
			                </span></a></li>
							<li><a href="javascript:void(0)"><span class="icon-visa">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
			                </span></a></li>
							<li><a href="javascript:void(0)"><span class="icon-mastercard">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span>
			                </span></a></li>
							<li><a href="javascript:void(0)"><span class="icon-discover">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span>
			                </span></a></li>
							<li><a href="javascript:void(0)"><span class="icon-american-express">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span>
			                </span></a></li>
						</ul>
						<!-- /payment-list -->
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>