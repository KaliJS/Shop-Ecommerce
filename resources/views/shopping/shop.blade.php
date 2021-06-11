@extends('layouts.index')

@section('css')

<style type="text/css">

input{
  display:none;
}

input:checked + label {
  color: #2879fe;
  font-weight: bold;
}

input:hover + label {
  color: #2879fe;
}

.label:before {
    color: #2879fe;
}

input:checked + label:before {
    content: "\e9b3";
    position: absolute;
    left: -8%;
    top: 7px;
    font-size: 12px;
    line-height: 1;
    font-family: "wokiee";
    color: #191919;
}

label{
  cursor: pointer;
  display: block;
  font-size: 14px;
  line-height: 2;
  position: relative;
}

</style>

@stop

@section('content')

<div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="{{url('/')}}">Home</a></li>
			<li>Products</li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-lg-3 col-xl-3 leftColumn aside" id="js-leftColumn-aside">
					<div class="tt-btn-col-close">
						<a href="#">Close</a>
					</div>
					<div class="tt-collapse open tt-filter-detach-option">
						<div class="tt-collapse-content">
							<div class="filters-mobile">
								<div class="filters-row-select">

								</div>
							</div>
						</div>
					</div>
					<div class="tt-collapse open">
						<h3 class="tt-collapse-title">FILTER BY PRICE</h3>
						<div class="tt-collapse-content">
							<ul class="tt-list-row">

								@foreach($price_range as $key => $r)	
									<input type="radio" id="{{$key}}"
									class="filter_product"
									data-min_price="{{$r['min']}}" 
									data-max_price="{{$r['max']}}"
									data-name="price"  
									name="price" value="{{$key}}">
									<label for="{{$key}}">₹{{$r['min']}} - ₹{{$r['max']}}</label>
								@endforeach
								
							</ul>
						</div>
					</div>
					<div class="tt-collapse open">
						<h3 class="tt-collapse-title">FILTER BY PRODUCT CATEGORIES</h3>
						<div class="tt-collapse-content">
							<ul class="tt-list-row">
                				@foreach($categories as $c)
									<input type="radio" id="category_{{$c->id}}"
									class="filter_product"
									data-name="category"
									data-full_name="{{$c->name}}"
									data-category_id="{{$c->id}}" 
									name="category" value="category_{{$c->id}}">
									<label for="category_{{$c->id}}">{{$c->name}}</label>
								@endforeach
							</ul>
						</div>
					</div>
          
          			<div class="tt-collapse open">
						<h3 class="tt-collapse-title">FILTER BY BRAND</h3>
						<div class="tt-collapse-content">
							<ul class="tt-list-row">
							@foreach($brands as $b)
                				<input type="radio" id="brand_{{$b->id}}"
								class="filter_product"
                				data-brand_id="{{$b->id}}"
								data-full_name="{{$b->name}}"
								data-name="brand" 
								name="brand" value="brand_{{$b->id}}">
								<label for="brand_{{$b->id}}">{{$b->title}}</label>
							@endforeach
							</ul>
						</div>
					</div>

				</div>
				<div class="col-md-12 col-lg-9 col-xl-9">
					<div class="content-indent container-fluid-custom-mobile-padding-02">
						<div class="tt-filters-options"  id="js-tt-filters-options">
							<h1 class="tt-title">
								All PRODUCTS
							</h1>
							<div class="tt-btn-toggle">
								<a href="#">FILTER</a>
							</div>
							
							<div class="tt-quantity">
								<a href="#" class="tt-col-one" data-value="tt-col-one"></a>
								<a href="#" class="tt-col-two" data-value="tt-col-two"></a>
								<a href="#" class="tt-col-three" data-value="tt-col-three"></a>
								<a href="#" class="tt-col-four" data-value="tt-col-four"></a>
								<a href="#" class="tt-col-six" data-value="tt-col-six"></a>
							</div>
						</div>
						<div class="tt-product-listing row" id="filter_products_container">
							
							

							@foreach($products as $p)
								<div class="col-6 col-md-4 tt-col-item">
									<div class="tt-product thumbprod-center">
										<div class="tt-image-box">
											<a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
											<a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
											<a href="{{url('/product/'.$p->slug)}}">

												@foreach(explode(',',$p->images) as $image)
												@if ($loop->first)
													<span class="tt-img"><img src="{{asset('/uploads/products/'.$image)}}" alt="{{$image}}"></span>								
												@endif
												@if ($loop->last)	
													<span class="tt-img-roll-over"><img src="{{asset('/uploads/products/'.$image)}}" alt="{{$image}}"></span>
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
													data-has_variant_id="yes">ADD TO CART</a>
												</div>
												<div class="tt-row-btn">
													<a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
													<a href="#" class="tt-btn-wishlist"></a>
													
												</div>
											</div>
										</div>
									</div>
								</div>
							@endforeach

							
							
							
						</div>

						<img class="filter_page_loader" src="{{asset('shopping/images/loader-01.svg')}}" data-src="{{asset('shopping/images/loader-01.svg')}}">
							
						<div class="text-center tt_product_showmore">
							<a href="#" class="btn btn-border">LOAD MORE</a>
							<div class="tt_item_all_js">
								<a href="#" class="btn btn-border01">NO MORE ITEM TO SHOW</a>
							</div>
						</div>
					</div>
				</div>
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


   

@stop

@section('js')

<script>

var url = new URL(window.location.href);
var category = url.searchParams.get("category");
var brand = url.searchParams.get("brand");

$("#category_"+category).prop("checked", true);
$("#brand_"+brand).prop("checked", true);

if(category){
	var title = $("#category_"+category).next().text();
	$('.tt-title').text(title);
}else if(brand){
	var title = $("#brand_"+brand).next().text();
	$('.tt-title').text(title);
}else{
	$('.tt-title').text('ALL PRODUCTS');
}



  let category_id = '';
  let min_price = ''; 
  let max_price = ''; 
  let brand_id = '';
  let filter = 'filter';

//   $('.filter_product').on('click', function() {
// 	if ($(this).prop("checked")) {
// 		console.log('yes');
// 		$(this).prop("checked", false);
// 	}

// 	else if ($(this).is(":checked")) {
// 		$(this).prop("checked", true);
// 		console.log('no');
// 	}
//   });

	$(document).on('change','.filter_product',function() {
	
		$('.filter_page_loader').css('display','block');
		$('#filter_products_container').html('');
		let type= $(this).data("name");

		switch (type) {
		case "price":
			min_price = $(this).data("min_price");
			max_price = $(this).data("max_price");
			break;
		case "category":
			category_id = $(this).data("category_id");
			break;
		case "brand":
			brand_id = $(this).data("brand_id");
			break;
		default:
			filter = "all";
		}

		$.ajax({
			method:"POST",
			url:`/shop/filter`,
			data:{filter,min_price,max_price,category_id,brand_id,type,"_token":"{{csrf_token()}}"},
			encode  : true
		}).then(response=>{
			$(".filter_page_loader").css("display","none"); 
			$("#filter_products_container").html(response);

		}).fail(error=>{
			alert('! Something went wrong, Please Try again later..');
			console.log('error',error);
		});

  }).filter(':checked').trigger('change');


    //   $(document).on("click",".add_to_cart",function(){
				
	// 	let selected_variant_id,selected_product_id,selected_selling_price,selected_product_slug,selected_quantity,todo;
	// 	var attr = $(this).attr('data-has_variant_id');

	// 		selected_variant_id = false;
	// 		selected_product_slug = $(this).data('slug_name');
	// 		selected_quantity = 1;
	// 		selected_product_id = this.id;
	// 		selected_selling_price = false;
	// 		todo = 'add';         
	// 	$.ajax({
	// 		method:'POST',
	// 		url:`{{url('product/updateCart')}}`,
	// 		data:{selected_product_id,selected_variant_id,selected_quantity,todo,selected_selling_price,"_token":"{{csrf_token()}}"},
	// 		encode: true
	// 	}).then(response=>{                
			
	// 			if(response && response.length == 2){
	// 			console.log(response);
	// 			let total_price = 0;
	// 			const cart_data = response[1];
	// 			const variant_id = response[0];

	// 			for(let i in cart_data){
	// 				total_price += cart_data[i]['subtotal'];
	// 			}

	// 			const count = Object.keys(cart_data).length;
	// 			const data = cart_data[variant_id];
	// 			const img = data["image"];

	// 			getHeaderCartList();

	// 			$('#cart_product_count').text(`There are ${count} items in your cart`);
	// 			$('#cart_product_image').attr("data-src",`{{URL::asset('/uploads/products/${img}')}}`);
	// 			$('#cart_product_image').attr("src",`{{URL::asset('/uploads/products/${img}')}}`);
	// 			$('#cart_product_price').text('₹'+data['variant_price']*data['quantity']);
	// 			$('#cart_product_quantity').text(data['quantity']);
	// 			$('#cart_products_total_price').text('₹'+total_price);
	// 			$('#cart_product_name').text(data['product_name']);
	// 			$('#cart_product_name').href = `url('/product/${selected_product_slug}')`;

	// 			$("#modalAddToCartProduct").modal("show");
	// 			}else{
	// 			$("#displayErrorMessage").modal("show");
	// 			}      
			
	// 	}).fail(error=>{
	// 		console.log('error',error);
	// 	});
		
	//   });

	//to uncheck radio buttons

	// $("input[type='radio']").click(function()
	// {
	// 	var previousValue = $(this).attr('previousValue');
	// 	var name = $(this).attr('name');

	// 	if (previousValue == 'checked')
	// 	{
	// 		$(this).removeAttr('checked');
	// 		$(this).attr('previousValue', false);
	// 	}
	// 	else
	// 	{
	// 		$("input[name="+name+"]:radio").attr('previousValue', false);
	// 		$(this).attr('previousValue', 'checked');
	// 	}
	// });







</script>

@stop