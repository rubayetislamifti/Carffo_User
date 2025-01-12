@extends('layout.app')

@section('title',config('app.name'))

@section('content')
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="{{route('home')}}">Home</a>
                            <a href="{{route('shop')}}">Shop</a>
                            <span>{{$product->product_name}}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">--}}
{{--                                    <div class="product__thumb__pic set-bg" data-setbg="{{asset('products/'.$product->image)}}">--}}

{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">--}}
{{--                                    <div class="product__thumb__pic set-bg" data-setbg="img/shop-details/thumb-2.png">--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">--}}
{{--                                    <div class="product__thumb__pic set-bg" data-setbg="img/shop-details/thumb-3.png">--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">--}}
{{--                                    <div class="product__thumb__pic set-bg" data-setbg="img/shop-details/thumb-4.png">--}}
{{--                                        <i class="fa fa-play"></i>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content position-relative">
                            @if($product->discount)
                                <span class="discount-label">{{ $product->discount }}% OFF</span>
                            @endif
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{asset('products/'.$product->image)}}" alt="">
                                </div>
                            </div>
{{--                            <div class="tab-pane" id="tabs-2" role="tabpanel">--}}
{{--                                <div class="product__details__pic__item">--}}
{{--                                    <img src="img/shop-details/product-big-3.png" alt="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane" id="tabs-3" role="tabpanel">--}}
{{--                                <div class="product__details__pic__item">--}}
{{--                                    <img src="img/shop-details/product-big.png" alt="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane" id="tabs-4" role="tabpanel">--}}
{{--                                <div class="product__details__pic__item">--}}
{{--                                    <img src="img/shop-details/product-big-4.png" alt="">--}}
{{--                                    <a href="https://www.youtube.com/watch?v=8PJ3_p7VqHw&list=RD8PJ3_p7VqHw&start_radio=1" class="video-popup"><i class="fa fa-play"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{$product->product_name}}</h4>
                            <h3>{{$product->price}}</h3>
                            @php
                                $sizesArray = explode(',', str_replace(' ', '', $product->size));
                            @endphp
                            <div class="product__details__option">
                                <div class="product__details__option__size">
                                    <span>Size:</span>
                                    @foreach($sizesArray as $size)
                                        <label for="{{ strtolower($size) }}">{{ strtoupper($size) }}
                                            <input type="radio" name="size" value="{{ strtolower($size) }}" id="{{ strtolower($size) }}">
                                        </label>
                                    @endforeach
                                </div>
                                @php
                                    $colorsArray = explode(',', str_replace(' ', '', $product->color));
                                @endphp
                                <div class="product__details__option__color">
                                    <span>Color:</span>
                                    @foreach($colorsArray as $index => $color)
                                        <label class="color-label" for="color-{{ $index + 1 }}" style="background-color: {{ strtolower($color) }};">
                                            <input type="radio" name="color" value="{{ strtolower($color) }}" id="color-{{ $index + 1 }}">
                                            <span class="checkmark">&#10003;</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                </div>
                                <a href="#" class="primary-btn">add to cart</a>
                            </div>

                            <div class="product__details__last__option">
                                <h5><span>Cash On Delivery</span></h5>
                                <img src="{{asset('resources/img/shop-details/details-payment.png')}}" alt="">
                                <ul>
                                    <li><span>Categories:</span> {{$product->category}}</li>
                                    <li><span>Sub-Categories:</span> {{$product->subcategory}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                       role="tab">Description</a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">

                                        {{$product->description}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div class="row">
                @foreach($related_product as $related)
                    @if($related->id !== $product->product_id)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item">
                        <a href="{{route('shopDetails',['product'=>$related->id,'product_name'=>$related->product_name])}}">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('products/'.$related->image)}}">
                                @if($related->discount)
                                    <span class="label">{{$related->discount}}% Off</span>
                                @endif
                            </div>
                        </a>
                        <div class="product__item__text">
                            <h6>{{$related->product_name}}</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <h5>{{$related->price}}</h5>
                        </div>
                    </div>
                </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
