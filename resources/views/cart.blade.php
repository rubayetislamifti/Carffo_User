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
                            <th>Update Order</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $carts)
                            <tr>
                            <td class="product__cart__item">
                                <div class="product__cart__item__text">
                                    <h6>{{$carts['product']->product_name}}</h6>
                                    <h5>৳{{number_format($carts['product']->price,2)}}</h5>
                                </div>
                            </td>
                                <td>
                                    @php
                                        $productID = $carts['product']->id;
                                        $selectedSize = session('cart')[$carts['product']->id]['size'] ?? null;
                                        $sizesArray = explode(',', str_replace(' ', '', $carts['product']->size));
                                    @endphp

                                    <strong>{{ strtoupper($selectedSize) }}</strong>
                                </td>
                                <td>
                                    @php
                                        $productID = $carts['product']->id;
                                            $selectedColor = session('cart')[$carts['product']->id]['color'] ?? null;
                                                $colorsArray = explode(',', str_replace(' ', '', $carts['product']->color));
                                    @endphp

                                    <span class="color-display" style="background-color: {{ strtolower($selectedColor) }};"></span>
                                </td>
                            <td class="quantity__item">
                                <span>{{ $carts['quantity'] }}</span>
                            </td>

                            <td class="cart__price">৳ {{number_format($carts['total_price'],2)}}</td>
                                <td>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#updateCartModal-{{ $carts['product']->id }}">Update Order</a>
                                </td>
                                <!-- Modal Structure -->
                                <div class="modal fade" id="updateCartModal-{{ $carts['product']->id }}" tabindex="-1" role="dialog" aria-labelledby="updateCartModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateCartModalLabel">Update Cart for {{$carts['product']->product_name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" id="cart-update-form-{{ $carts['product']->id }}" action="{{ route('cart.update', ['id' => $carts['product']->id]) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="product_id" value="{{ $carts['product']->id }}">
                                                    <div class="form-group">
                                                        <label for="quantity" class="quantity-label">Quantity:</label>
                                                        <div class="quantity-input-wrapper">
                                                            <input type="number" class="quantity-input" value="{{ $carts['quantity'] }}" name="quantity" min="1">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="size">Size:</label>
                                                        <div class="size-options">
                                                            @foreach(explode(',', str_replace(' ', '', $carts['product']->size)) as $size)
                                                                <label class="size-label">
                                                                    <input type="radio" name="size" value="{{ strtolower($size) }}" {{ strtolower($size) == ($cart[$carts['product']->id]['size'] ?? '') ? 'checked' : '' }}>
                                                                    <span>{{ strtoupper($size) }}</span>
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="color">Color:</label>
                                                        <div class="color-options">
                                                            @foreach(explode(',', str_replace(' ', '', $carts['product']->color)) as $index => $color)
                                                                <label class="color-label" style="background-color: {{ strtolower($color) }}">
                                                                    <input type="radio" name="color" value="{{ strtolower($color) }}" {{ strtolower($color) == ($cart[$carts['product']->id]['color'] ?? '') ? 'checked' : '' }}>
                                                                    <span class="checkmark">&#10003;</span>
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" onclick="event.preventDefault(); document.getElementById('cart-update-form-{{ $carts['product']->id }}').submit();" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <td class="cart__close">
                                    <form id="cart-delete-form-{{ $carts['product']->id }}" action="{{ route('cart.destroy', $carts['product']->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <i onclick="event.preventDefault(); document.getElementById('cart-delete-form-{{ $carts['product']->id }}').submit();" class="fa fa-close"></i>
                                </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <p>Your cart is empty.</p>
                    @endif
                </div>
                @if (!empty($cartItems))
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="{{route('shop')}}">Continue Shopping</a>
                        </div>
                    </div>
                </div>
                @else
                    <p>Your cart is empty.</p>
                @endif
            </div>
            @if($total_price)
            <div class="col-lg-6">
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>৳ {{number_format($total_price,2)}}</span></li>
                        <li>Total <span>৳ {{number_format($total_price,2)}}</span></li>
                    </ul>
                    <a href="{{route('checkout')}}" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
            @else
                <div class="col-lg-6">
                    <div class="cart__total">
                        <h6>Your Cart is empty</h6>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection
