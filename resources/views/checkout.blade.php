@extends('layout.app')

@section('title',config('app.name'))

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Check Out</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="{{route('checkout.post')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="checkout__title">Billing Details</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>First Name<span>*</span></p>
                                    <input type="text" value="{{Auth::user()->userInfo->fname}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" value="{{Auth::user()->userInfo->lname}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <input type="text" value="{{Auth::user()->userInfo->country}}" readonly>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" name="address" placeholder="Apartment, suite, unite ect (optinal)" value="{{Auth::user()->userInfo->shipaddress}}">
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text" name="city" value="{{Auth::user()->userInfo->city}}" readonly>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="phone" value="{{Auth::user()->userInfo->phone}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" value="{{Auth::user()->userInfo->email}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes</p>
                            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery." name="notes">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <div class="checkout__order__products">Product <span>Total</span></div>
                            <ul class="checkout__total__products">
                                @foreach($cart as $item)
                                    <input type="hidden" value="{{$item['product']->id}}" name="product_id[]">
                                    <input type="hidden" value="{{$item['quantity']}}" name="quantity[]">
                                    <input type="hidden" value="{{$item['total_price']}}" name="total[]">
                                    <input type="hidden" value="{{$item['size']}}" name="size[]">
                                    <input type="hidden" value="{{$item['color']}}" name="color[]">
                                <li>{{$item['product']->product_name}} (x{{ $item['quantity'] }}) <span>৳ {{number_format($item['total_price'],2)}}</span></li>
                                @endforeach
                            </ul>
                            <ul class="checkout__total__all">
                                <li>Subtotal <span>৳ {{number_format($total,2)}}</span></li>
                                <li>Delivery Charge <span>৳ {{number_format($deliveryCharge,2)}}</span></li>
                                <li>Total <span>৳ {{number_format($totalAmount,2)}}</span></li>
                            </ul>

                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection
