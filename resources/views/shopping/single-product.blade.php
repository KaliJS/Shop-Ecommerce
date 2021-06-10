@extends('layouts.index')

@section('css')

<style type="text/css">

.choose_variant{
  display:flex;
  margin-top: 1rem;
}
.choose_variant_content{
  margin-right: 0.5rem;
}

input[name='variant']{
  display:none;
}

input[name='variant']:checked + label {
    background: rgba(19, 68, 241, 0.06);
    border: 2px solid #2879fe;
    color: #2879fe;
}

input[name='variant']:hover + label {
  background: rgba(19, 68, 241, 0.06);
  border: 2px solid #2879fe;
  color: #2879fe;
}
label:hover{
	background: rgba(19, 68, 241, 0.06);
	border: 2px solid #2879fe;
	color: #2879fe;
}
label:checked {
    background: rgba(19, 68, 241, 0.06);
    border: 2px solid #2879fe;
    color: #2879fe;
}

.choose_variant_content label{
  cursor: pointer;
  background: #ffffff;
  border: 1px solid #c4c4c4;
  border-radius: 10px;
  font-size: 14px;
  width: 100px;
  height: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding: 2em 0;
  margin-bottom: .5em;
}
          
.choose_variant_type{
  color: #2879fe;
  font-weight: bold;
  font-size: 14px;
}
.choose_variant_price{
  color: #191919;
  font-weight: bold;
  font-size: 14px;
}

#custom-product-item .slick-arrow {
	position: absolute;
	top: 50%;
	z-index: 2;
	cursor: pointer;
	font-size: 0;
	line-height: 0;
	background: none;
	border: none;
	width: 38px;
	height: 38px;
	background: #f7f8fa;
	color: #191919;
	font-weight: 500;
	border-radius: 50%;
	transition: all 0.2s linear;
	transform: translate(0%, -50%)
}
#custom-product-item{
	opacity: 0;
	transition: opacity 0.2s linear;
}
#custom-product-item.tt-show{
	opacity: 1;
}

#custom-product-item .slick-arrow:hover {
	background: #2879fe;
	color: #ffffff;
}

#custom-product-item .slick-arrow:before {
	font-family: "wokiee";
	font-size: 20px;
	line-height: 1;
}
#custom-product-item .slick-prev{
	left: 10px;
}
#custom-product-item .slick-prev:before {
	content: "\e90d";
}
#custom-product-item .slick-next {
	right: 10px;
}
#custom-product-item .slick-next:before {
	content: "\e90e";
}
#smallGallery .slick-arrow.slick-disabled,
#custom-product-item .slick-arrow.slick-disabled{
	opacity: 0;
	pointer-events: none;
}

</style>

@stop


@section('content')

<div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="{{url('/')}}">Home</a></li>
			<li><a href="{{url('/shop')}}">Shop</a></li>
			<li>{{$product->slug}}</li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<!-- mobile product slider  -->
		<div class="tt-mobile-product-layout visible-xs">
			<div class="tt-mobile-product-slider arrow-location-center" id="zoom-mobile__slider">

				@foreach($img_array as $image)
				<div><img data-lazy="{{asset('/uploads/products/'.$image)}}" alt=""></div>
				@endforeach

			</div>
			<div id="zoom-mobile__layout">
				<a class="zoom-mobile__close btn" href="#">Back</a>
				<div id="tt-fotorama" data-nav="thumbs" data-auto="false" data-allowfullscreen="false" dataa-fit="cover" ></div>
			</div>
		</div>
		<!-- /mobile product slider  -->
		<div class="container container-fluid-mobile">
			<div class="row">
				<div class="col-6 hidden-xs">
					<div class="tt-product-vertical-layout">
						<div class="tt-product-single-img">
							<div>
								<button class="tt-btn-zomm tt-top-right"><i class="icon-f-86"></i></button>
								<img class="zoom-product" src="{{asset('/uploads/products/'.$first_image)}}" data-zoom-image="{{asset('/uploads/products/'.$first_image)}}" alt="">
								<div id="custom-product-item">
										<button type="button" class="slick-arrow slick-prev">Previous</button>
										<button type="button" class="slick-arrow slick-next">Next</button>
									</div>
							</div>
						</div>
						<div class="tt-product-single-carousel-vertical">
							<ul id="smallGallery" class="tt-slick-button-vertical  slick-animated-show-js">
								@foreach($img_array as $image)
									@if ($loop->first)
									<li><a class="zoomGalleryActive" href="#" data-image="{{asset('/uploads/products/'.$image)}}" data-zoom-image="{{asset('/uploads/products/'.$image)}}"><img data-value="1" src="{{asset('/uploads/products/'.$image)}}" alt=""></a></li>
									@else
									<li><a href="#" data-image="{{asset('/uploads/products/'.$image)}}" data-zoom-image="{{asset('/uploads/products/'.$image)}}"><img data-value="2" src="{{asset('/uploads/products/'.$image)}}" alt=""></a></li>
									@endif
								@endforeach
								@foreach($img_array as $image)	
									@if ($loop->first)
									<li><a class="zoomGalleryActive" href="#" data-image="{{asset('/uploads/products/'.$image)}}" data-zoom-image="{{asset('/uploads/products/'.$image)}}"><img data-value="3" src="{{asset('/uploads/products/'.$image)}}" alt=""></a></li>
									@else
									<li><a href="#" data-image="{{asset('/uploads/products/'.$image)}}" data-zoom-image="{{asset('/uploads/products/'.$image)}}"><img data-value="4" src="{{asset('/uploads/products/'.$image)}}" alt=""></a></li>
									@endif
								@endforeach	
							</ul>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="tt-product-single-info">
						<div class="tt-add-info">
							<ul>
								<li><span>SKU:</span> {{$product->sku}}</li>
								<li><span>Availability:</span><span id="detail_in_stock"> </span> in Stock</li>
							</ul>
						</div>
						<h1 class="tt-title">{{$product->name}}</h1>
						<div class="tt-price">
							<span class="new-price new_price_value" id="detail_selling_price"></span> 
              				<span class="old-price old_price_value" id="detail_mrp_price"></span>
						</div>
						<div class="tt-review">
							<div class="tt-rating">
							@if($product->reviews->count()>0)
								@for ($i = 0; $i < 5; $i++)
									@if (floor($product->reviews->avg('ratings')) - $i >= 1)
										<i class="icon-star"></i>
									@elseif ($product->reviews->avg('ratings') - $i > 0)
										<i class="icon-star-half"></i>
									@else
										<i class="icon-star-empty"></i>
									@endif
								@endfor
							@endif
							</div>
						
						</div>
						<div class="tt-wrapper">
							{{$product->description}}
							</div>


						<div class="choose_variant">

							@foreach($product->variants as $v)
							@if ($loop->first)
							<div class="choose_variant_content">
								<input checked="checked"
								type="radio" id="{{$v->id}}"
								class="choose_variant"
								data-selling_price="{{$v->selling_price}}" 
								data-mrp_price="{{$v->mrp_price}}" 
								data-in_stock="{{$v->quantity}}" 
								name="variant" value="{{$v->id}}">
								<label for="{{$v->id}}">
								<span class="choose_variant_type">{{$v->variant}}</span>
								<span class="choose_variant_price">₹{{$v->selling_price}}</span>
								</label>
							</div>
							@else
							<div class="choose_variant_content">
								<input type="radio" id="{{$v->id}}"
								class="choose_variant"
								data-selling_price="{{$v->selling_price}}" 
								data-mrp_price="{{$v->mrp_price}}" 
								data-in_stock="{{$v->quantity}}" 
								name="variant" value="{{$v->id}}" >
								<label for="{{$v->id}}">
								<span class="choose_variant_type">{{$v->variant}}</span>
								<span class="choose_variant_price">₹{{$v->selling_price}}</span>
								</label>
							</div>
							@endif
							@endforeach
						</div>

						<div class="tt-wrapper">
							<div class="tt-countdown_box_02">
								<div class="tt-countdown_inner">
									<div class="tt-countdown"
										data-date="2020-11-01"
										data-year="Yrs"
										data-month="Mths"
										data-week="Wk"
										data-day="Day"
										data-hour="Hrs"
										data-minute="Min"
										data-second="Sec"></div>
								</div>
							</div>
						</div>
						<div class="tt-wrapper">
							<div class="tt-row-custom-01">
								<div class="col-item">
									<div class="tt-input-counter style-01">
										<span class="minus-btn"></span>
										<input id="detail_quantity" type="text" value="1" size="5">
										<span class="plus-btn"></span>
									</div>
								</div>
								<div class="col-item">
									<a href="#" id="{{ $product->id }}" data-slug_name='{{$product->slug}}' class="btn btn-lg add_to_cart"><i class="icon-f-39"></i>ADD TO CART</a>
								</div>
							</div>
						</div>
						<div class="tt-wrapper">
							<ul class="tt-list-btn">
								<li><a class="btn-link" href="#"><i class="icon-n-072"></i>ADD TO WISH LIST</a></li>
							</ul>
						</div>
						<div class="tt-wrapper">
							<div class="tt-add-info">
								<ul>
									<li><span>Product Category:</span> {{$product->subcategory->category->name}}</li>
									<li><span>Product Type:</span> {{$product->subcategory->name}}</li>
									<li><span>Brand:</span> <a href="{{url('/brand/'.$product->brand->id)}}">{{$product->brand->title}}</a></li>
								</ul>
							</div>
						</div>
						<div class="tt-collapse-block">
							<div class="tt-item">
								<div class="tt-collapse-title">DESCRIPTION</div>
								<div class="tt-collapse-content">
									{{$product->description}}
								</div>
							</div>
							<div class="tt-item">
								<div class="tt-collapse-title">ADDITIONAL INFORMATION</div>
								<div class="tt-collapse-content">
									{{$product->additional_info}}
								</div>
							</div>
							<div class="tt-item">
								<div class="tt-collapse-title tt-poin-comments">REVIEWS ({{$product->reviews->count()}})</div>
								<div class="tt-collapse-content">
									<div class="tt-review-block">
										
										<div class="tt-review-comments">

                   						 @foreach($product->reviews as $r)
											<div class="tt-item">
												<div class="tt-avatar">
													<a href="#"><img data-src="{{asset('/uploads/reviews/'.$r->image)}}" alt=""></a>
												</div>
												<div class="tt-content">
													<div class="tt-rating">
														@for ($i = 0; $i < 5; $i++)

															@if ($r->ratings - $i >= 1)
																{{--Full Start--}}
																<i class="icon-star"></i>
															@else
																{{--Empty Start--}}
																<i class="icon-star-empty"></i>
															@endif
																						
														@endfor
													</div>
													<div class="tt-comments-info">
														<span class="username">by <span><b>{{$r->user->first_name}} {{$r->user->last_name}}</b></span></span>
														<span class="time">on {{date("j F Y g:i A",strtotime($r->created_at))}}</span>
													</div>
													<div class="tt-comments-title">{{$r->title}}</div>
													<p>
														{{$r->description}}
													</p>
												</div>
											</div>
                   						 @endforeach
											
										</div>
										<div class="tt-review-form">
                     					 @if($product->reviews->count()<=0)
											<div class="tt-message-info">
												BE THE FIRST TO REVIEW <span>“BLOUSE WITH SHEER &AMP; SOLID PANELS”</span>
											</div>
                     				 	@endif
											<p>Your email address will not be published. Required fields are marked *</p>
											<div class="tt-rating-indicator">
												<div class="tt-title">
													YOUR RATING *
												</div>
												<div class="tt-rating">
													<i class="icon-star"></i>
													<i class="icon-star"></i>
													<i class="icon-star"></i>
													<i class="icon-star-half"></i>
													<i class="icon-star-empty"></i>
												</div>
											</div>
											<form class="form-default">
												<div class="form-group">
													<label for="inputName" class="control-label">YOUR NAME *</label>
													<input type="email" class="form-control" id="inputName" placeholder="Enter your name">
												</div>
												<div class="form-group">
													<label for="inputEmail" class="control-label">COUPONE E-MAIL *</label>
													<input type="password" class="form-control" id="inputEmail" placeholder="Enter your e-mail">
												</div>
												<div class="form-group">
													<label for="textarea" class="control-label">YOUR REVIEW *</label>
													<textarea class="form-control"  id="textarea" placeholder="Enter your review" rows="8"></textarea>
												</div>
												<div class="form-group">
													<button type="submit" class="btn">SUBMIT</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<div class="tt-block-title text-left">
				<h3 class="tt-title-small">RELATED PRODUCT</h3>
			</div>
			<div class="tt-carousel-products row arrow-location-right-top tt-alignment-img tt-layout-product-item slick-animated-show-js">
				
			@foreach($relatedProducts as $p)
				<div class="col-2 col-md-4 col-lg-3">
					<div class="tt-product thumbprod-center">
						<div class="tt-image-box">
							<a href="#" class="tt-btn-quickview quick_view_product" data-product_id="{{$p->id}}" data-tooltip="Quick View"></a>
							<a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
							<a href="{{url('/product/'.$p->slug)}}">

								@foreach(explode(',',$p->images) as $image)
								@if ($loop->first)
									<span class="tt-img"><img src="{{asset('images/shopping/loader.svg')}}"><img data-lazy="{{asset('/uploads/products/'.$image)}}" alt="{{$image}}"></span>								
								@endif
								@if ($loop->last)
									<span class="tt-img-roll-over"><img src="{{asset('images/shopping/loader.svg')}}"><img data-lazy="{{asset('/uploads/products/'.$image)}}" alt="{{$image}}"></span>																
								@endif
								@endforeach
								
							</a>
						</div>
						<div class="tt-description">
							<div class="tt-row">
								<ul class="tt-add-info">
									<li><a href="{{url('/subcategory'.$p->subcategory->slug)}}">{{$p->subcategory->name}}</a></li>
								</ul>
							</div>
							<h2 class="tt-title"><a href="{{url('/product/'.$p->slug)}}">{{$p->name}}</a></h2>
							<div class="tt-price">
								{{$p->variants->min('selling_price')}}
							</div>
							<div class="tt-product-inside-hover">
								<div class="tt-row-btn">
									<a href="#" id="{{$p->id}}"
									   class="tt-btn-addtocart thumbprod-button-bg add_to_cart" 
									   data-slug_name='{{$p->slug}}'
									   data-has_variant_id="yes">ADD TO0 CART</a>
								</div>
								<div class="tt-row-btn">
									<a href="#" class="tt-btn-quickview quick_view_product" data-product_id="{{$p->id}}"></a>
									<a href="#" class="tt-btn-wishlist"></a>
									
								</div>
							</div>
						</div>
					</div>
				</div>
     		 @endforeach

			</div>
		</div>
	</div>
</div>



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


@stop


@section('js')
       
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
					url:`/search/getQuickView`,
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
					selected_selling_price = $('#quick_detail_selling_price').text();
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
                    url:`updateCart`,
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

            
        </script>

@stop