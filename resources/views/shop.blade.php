@extends('layout.app')

@section('title',config('app.name'))

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('home')}}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="row">
                        @foreach($products as $product)

                            <div class="col-lg-4 col-md-6 col-sm-6">

                            <div class="product__item sale">
                                <a href="{{route('shopDetails',['product'=>$product->id,'product_name'=>$product->product_name])}}">
                                    <div class="product__item__pic set-bg" data-setbg="{{asset('products/'.$product->image)}}">
                                        @if($product->discount)
                                            <span class="label">{{$product->discount}}% Off</span>
                                        @endif
                                    </div>
                                </a>
                                <div class="product__item__text">
                                    <h6>{{$product->product_name}}</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                        <h5>{{$product->price}}</h5>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                                <a href="#">21</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
