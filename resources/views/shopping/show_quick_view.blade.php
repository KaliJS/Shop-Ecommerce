

<!-- modal (quickViewModal) -->
<div class="modal  fade"  id="ModalquickView" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
			</div>
			<div class="modal-body">
				<div class="tt-modal-quickview desctope">
					<div class="row">
						<div class="col-12 col-md-5 col-lg-6">
							<div class="tt-mobile-product-slider arrow-location-center">

							@foreach($img_array as $image)
								<div><img src="{{asset('/uploads/products/'.$image)}}" alt=""></div>
							@endforeach	
								
							</div>
						</div>
						<div class="col-12 col-md-7 col-lg-6">
							<div class="tt-product-single-info">
								<div class="tt-add-info">
									<ul>
										<li><span>SKU:</span> {{$product->sku}}</li>
										<li><span>Availability:</span><span id="quick_detail_in_stock"> </span> in Stock</li>
									</ul>
								</div>
								<h2 class="tt-title">{{$product->name}}</h2>
								<div class="tt-price">
                                    <span class="new-price new_price_value" id="quick_detail_selling_price"></span> 
              				        <span class="old-price old_price_value" id="quick_detail_mrp_price"></span>
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
								<div class="quick_choose_variant">

                                    @foreach($product->variants as $v)
                                   
                                        <div class="choose_variant_content">
                                            <input {{$loop->first?'checked':''}}
                                            type="radio" id="{{$v->id}}"
                                            class="choose_variant"
                                            data-selling_price="{{$v->selling_price}}" 
                                            data-mrp_price="{{$v->mrp_price}}" 
                                            data-in_stock="{{$v->quantity}}" 
                                            name="quick_variant" value="{{$v->id}}">
                                            <label for="{{$v->id}}">
                                            <span class="choose_variant_type">{{$v->variant}}</span>
                                            <span class="choose_variant_price">₹{{$v->selling_price}}</span>
                                            </label>
                                        </div>
                                    
                                    @endforeach
                                </div>
								<div class="tt-wrapper">
                                    <div class="tt-row-custom-01">
                                        <div class="col-item">
                                            <div class="tt-input-counter style-01">
                                                <span class="minus-btn"></span>
                                                <input id="quick_detail_quantity" type="text" value="1" size="5">
                                                <span class="plus-btn"></span>
                                            </div>
                                        </div>
                                        <div class="col-item">
                                            <a href="#" id="{{ $product->id }}" data-slug_name='{{$product->slug}}' data-quick_view="true" class="btn btn-lg add_to_cart"><i class="icon-f-39"></i>ADD TO CART</a>
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
</div>
  