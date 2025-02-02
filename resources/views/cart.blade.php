@extends('layout.app')

@section('title',config('app.name'))

@section('content')

<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shopping__cart__table">
                    @if (!empty($cartItems))
                    <table>
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $carts)
                            <tr>
                            <td class="product__cart__item">
                                <div class="product__cart__item__text">
                                    <h6>{{$carts['product']->product_name}}</h6>
                                    <h5>৳{{$carts['product']->price}}</h5>
                                </div>
                            </td>
                                <td>
{{--                                    {{[$carts['product']->id]['size']}}--}}
                                    @php
                                        $selectedSize = session('cart')[$carts['product']->id]['size'] ?? null;
//                                        dd($selectedSize);
                                           $sizesArray = explode(',', str_replace(' ', '', $carts['product']->size));
                                           //$selectedSize = session('cart')[$carts['product']->product_id]['size'] ?? null;
                                    @endphp

                                    @foreach($sizesArray as $size)
                                        <label for="{{ strtolower($size) }}">{{ strtoupper($size) }}
                                            <input type="radio" name="size" value="{{ strtolower($size) }}" id="{{ strtolower($size) }}"
                                                   @if($selectedSize && $selectedSize == strtolower($size)) checked @endif>
                                        </label>
                                    @endforeach
                                </td>
                                <td>
                                    @php
                                        $colorsArray = explode(',', str_replace(' ', '', $carts['product']->color));
                                    @endphp

                                    @foreach($colorsArray as $index => $color)
                                        <label class="color-label" for="color-{{ $index + 1 }}" style="background-color: {{ strtolower($color) }};">
                                            <input type="radio" name="color" value="{{ strtolower($color) }}" id="color-{{ $index + 1 }}">
                                            <span class="checkmark">&#10003;</span>
                                        </label>
                                    @endforeach
                                </td>
                            <td class="quantity__item">
                                <div class="quantity">
                                    <div class="pro-qty-2">
                                        <input type="text" value="{{$carts['quantity']}}">
                                    </div>
                                </div>
                            </td>
                            <td class="cart__price">৳ {{$carts['total_price']}}</td>
                            <td class="cart__close"><i class="fa fa-close"></i></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <p>Your cart is empty.</p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="#">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>৳ {{number_format($total_price,2)}}</span></li>
                        <li>Total <span>৳ {{number_format($total_price,2)}}</span></li>
                    </ul>
                    <a href="#" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
