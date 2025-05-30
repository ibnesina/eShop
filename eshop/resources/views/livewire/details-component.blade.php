<div>
<main id="main" class="main-site">
    <style>
        .regprice{
            font-weight: 300;
            font-size: 13px !important;
            color: #aaaaaa !important;
            text-decoration: line-through;
            padding-left: 10px;
        }
    </style>

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>detail</span></li>
            </ul>
        </div>
        
        <style>
            .product-wish{
                position: absolute;
                top: 10%;
                left: 0;
                z-index: 99;
                right: 30px;
                text-align: right;
                padding-top: 0;
            }
            .product-wish .fa{
                color: #cbcbcb;
                font-size: 24px;
            }

            .product-wish .fa:hover{
                color: #1A2C4D;
            }

            .fill-heart{
                color: #1A2C4D !important;
            }

        </style>

        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery">
                          <ul class="slides">

                            <li data-thumb="{{ asset('asset/product_image')}}/{{$product->image}}">
                                <img src="{{ asset('asset/product_image')}}/{{$product->image}}" alt="{{$product->name}}" />
                            </li>

                          </ul>
                        </div>
                    </div>
                    <div class="detail-info">
                        <div class="product-rating">
                            <style>
                                .color-gray{
                                    color: #e6e6e6 !important;
                                }
                            </style>
                            @php
                                $avgrating = 0;
                                $cou = 0;   
                            @endphp
                            
                            @foreach($product->orderItems->where('rstatus', 1) as $orderItem)
                                @php
                                    $avgrating = $avgrating + $orderItem->review->rating;
                                    $cou++;
                                @endphp
                            @endforeach

                            @php
                                if ($cou != 0) {
                                    $avgrating = $avgrating / $cou;
                                }
                                
                            @endphp
                        
                        
                            @for($i=1; $i<=5; $i++)
                                @if($i<=$avgrating)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                @endif
                            @endfor
                            {{-- <a href="#" class="count-review">{{$product->orderItems->where('rstatus',1)->count()}} reviews</a> --}}
                        </div>
                        <h2 class="product-name">{{$product->name}}</h2>
                        <div class="short-desc">
                            {{$product->short_description}}
                        </div>
                        <div class="wrap-social">
                            <a class="link-socail" href="#"><img src="{{ asset('assets/images/social-list.png')}}" alt=""></a>
                        </div>
                        @if($product->sale_price>0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                            <div class="wrap-price">
                                <span class="product-price">৳{{$product->sale_price}}</span>
                                <del><span class="product-price regprice">৳{{$product->regular_price}}</span></del>
                            </div>
                        @else
                            <div class="wrap-price"><span class="product-price">৳{{$product->regular_price}}</span></div>
                        @endif
                        <div class="stock-info in-stock">
                            <p class="availability">Availability: <b>{{$product->stock_status}}</b></p>
                        </div>
                        <div class="quantity">
                            <span>Quantity:</span>
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" >
                                <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity"></a>
                                <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity"></a>
                            </div>
                        </div>
                        <div class="wrap-butons">
                            @if($product->sale_price>0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->sale_price}})">Add to Cart</a>
                            @else
                                <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})">Add to Cart</a>
                            @endif

                            <div class="wrap-btn">
                                <a href="#" class="btn btn-compare">Add Compare</a>
                                <a href="#" class="btn btn-wishlist">Add Wishlist</a>
                            </div>
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">Description</a>
                            <a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
                            <a href="#review" class="tab-control-item">Reviews</a>
                        </div>

                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                <table class="shop_attributes">
                                    <tbody>

                                        <tr>
                                            <th>Code :</th><td class="product_weight">{{$product->SKU}}</td>
                                        </tr>
                                        <tr>
                                            <th>Name :</th><td class="product_weight">{{$product->name}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Category :</th><td class="product_weight">{{$product->category_id}}</td>
                                        </tr>
                                        <tr>
                                            <th>Stock :</th><td class="product_weight">{{$product->quantity}}</td>
                                        </tr>
                                        <tr>
                                            <th>Speciality :</th><td class="product_weight">{{$product->short_description}}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-content-item active" id="add_infomation" style="text-align: justify;">
                                {{$product->description}}
                            </div>


                            <div class="tab-content-item " id="review">
                                
                                <div class="wrap-review-form">
                                    <style>
                                        .width-0-percent{
                                            width: 0%;
                                        }
                                        .width-20-percent{
                                            width: 20%;
                                        }
                                        .width-40-percent{
                                            width: 40%;
                                        }
                                        .width-60-percent{
                                            width: 60%;
                                        }
                                        .width-80-percent{
                                            width: 80%;
                                        }
                                        .width-100-percent{
                                            width: 100%;
                                        }
                                    </style>
                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">{{$product->orderItems->where('rstatus', 1)->count()}} review for <span>{{$product->name}}</span></h2>
                                        <ol class="commentlist">
                                            @foreach($product->orderItems->where('rstatus', 1) as $orderItem)
                                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                                    <div id="comment-20" class="comment_container"> 
                                                        <img alt="" src="{{ asset('asset/profile.png')}}" height="80" width="80">
                                                        <div class="comment-text">
                                                            <div class="star-rating">
                                                                <span class="width-{{$orderItem->review->rating * 20}}-percent">Rated <strong class="rating">{{$orderItem->review->rating}}</strong> out of 5</span>
                                                            </div>
                                                            <p class="meta"> 
                                                                <strong class="woocommerce-review__author">{{$orderItem->order->user->name}}</strong> 
                                                                <span class="woocommerce-review__dash">–</span>
                                                                <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y g:i A')}}</time>
                                                            </p>
                                                            <div class="description">
                                                                <p>{{$orderItem->review->comment}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div><!-- #comments -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget widget-our-services ">
                    <div class="widget-content">
                        <ul class="our-services">

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Free Shipping</b>
                                        <span class="subtitle">On Oder Over ৳1000</span>
                                        <p class="desc">Full free shipping just over ৳1000 order</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Special Gifts</b>
                                        <span class="subtitle">Get a gift!</span>
                                        <p class="desc">Get special gifts over ৳3000 order</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Order Return</b>
                                        <span class="subtitle">Return within 7 days</span>
                                        <p class="desc">You can return the order within 7 days</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach ($popular_products as $p_product)
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="{{route('product.details', ['slug'=>$p_product->slug])}}" title="{{$p_product->name}}">
                                                <figure><img src="{{ asset('asset/product_image')}}/{{$p_product->image}}" alt="{{$p_product->name}}"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{route('product.details', ['slug'=>$p_product->slug])}}" class="product-name"><span>{{$p_product->name}}</span></a>
                                            <div class="wrap-price"><span class="product-price">৳{{$p_product->regular_price}}</span></div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div><!--end sitebar-->

            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Related Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"4"},"768":{"items":"4"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                            
                            @foreach ($related_products as $r_product)
                                <div class="product product-style-2 equal-elem">
                                    <div class="product-thumnail">
                                        <a href="{{route('product.details', ['slug'=>$r_product->slug])}}" title="{{$r_product->name}}">
                                            <figure><img src="{{ asset('asset/product_image')}}/{{$r_product->image}}" style="height: 214px; width:214px;"  alt="{{$r_product->name}}"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('product.details', ['slug'=>$r_product->slug])}}" class="product-name"><span>{{$r_product->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">৳{{$r_product->regular_price}}</span></div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div><!--End wrap-products-->
                </div>
            </div>

        </div><!--end row-->

    </div><!--end container-->

</main>
</div>