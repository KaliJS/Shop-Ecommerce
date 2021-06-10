@if(count($cart)<=0)
    <a href="empty-cart.html" class="tt-cart-empty">
        <i class="icon-f-39"></i>
        <p>No Products in the Cart</p>
    </a>
    @else
    <div class="tt-cart-content">
        <div class="tt-cart-list">

        @foreach($cart as $c)
            <div class="tt-item">
                
                <div class="tt-item-img">
                    <img src="images/loader-03.svg" data-src="{{asset('/uploads/products/'.$c['image'])}}" alt="">
                </div>
                <div class="tt-item-descriptions">
                <h2 class="tt-title">{{$c['product_name']}}</h2>
                    
                    <div class="tt-quantity">{{$c['quantity']}} X</div> <div class="tt-price">{{$c['variant_price']}}</div>
                </div>
                
                <div class="tt-item-close">
                    <a href="#" class="tt-btn-close"></a>
                </div>
            </div>
        @endforeach
            

        </div>
        <div class="tt-cart-total-row">
            <div class="tt-cart-total-title">Subtotal:</div>
            <div class="tt-cart-total-price">{{$total_price}}</div>
        </div>
        <div class="tt-cart-btn">
            <div class="tt-item">
                <a href="#" class="btn">Proceed To Checkout</a>
            </div>
            <div class="tt-item">
                <a href="{{url('/cart')}}" class="btn-link-02 tt-hidden-mobile">View Cart</a>
                <a href="{{url('/cart')}}" class="btn btn-border tt-hidden-desctope">View Cart</a>
            </div>
        </div>
    </div>
@endif