<div class="wrap-icon-section minicart">
    <a href="{{route('product.cart')}}" class="link-direction">
    {{-- <a href="#" class="link-direction"> --}}
        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
        <div class="left-info">
            @if(Cart::instance('cart')->count()>0)
                <span class="index">{{Cart::instance('cart')->count()}} items</span>
            @else
                <span class="index">0 item</span>
            @endif
            <span class="title">CART</span>
        </div>
    </a>
</div>