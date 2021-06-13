@foreach($products as $p)
    <div class="col-6 col-md-4 tt-col-item">
        <div class="tt-product thumbprod-center">
            <div class="tt-image-box">
                <a href="javascript:void(0)" class="tt-btn-quickview quick_view_product" data-product_id="{{$p->id}}" data-tooltip="Quick View" data-tposition="left"></a>
                <a href="javascript:void(0)" class="tt-btn-wishlist add_product_to_wishlist" data-product_id="{{$p->id}}" data-token={{csrf_token()}} data-tooltip="Add to Wishlist" data-tposition="left"></a>
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
                    <div class="tt-rating">
                        @if($p->reviews->count()>0)
                            @for ($i = 0; $i < 5; $i++)
                                @if (floor($p->reviews->avg('ratings')) - $i >= 1)
                                    <i class="icon-star"></i>
                                @elseif ($p->reviews->avg('ratings') - $i > 0)
                                    <i class="icon-star-half"></i>
                                @else
                                    <i class="icon-star-empty"></i>
                                @endif
                            @endfor
                        @endif
                    </div>
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
                        <a href="javascript:void(0)" class="tt-btn-quickview quick_view_product" data-product_id="{{$p->id}}"></a>
						<a href="javascript:void(0)" class="tt-btn-wishlist add_product_to_wishlist" data-token={{csrf_token()}} data-product_id="{{$p->id}}"></a>
									
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@if(count($products) < 1)
    <tr class="no_filter_products">
        <td class="empty_shopping_cart">Sorry no products found for you search!</td>
    </tr>                   
@endif