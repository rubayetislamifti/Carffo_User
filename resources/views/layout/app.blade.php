<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Carffo')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('resources/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('resources/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('resources/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('resources/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('resources/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('resources/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('resources/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('resources/css/style.css')}}" type="text/css">

    {!! htmlScriptTagJsApi() !!}
    <style>

        .size-options {
            display: flex;
            gap: 10px;
            margin-top: 8px;
        }

        .size-label {
            position: relative;
            padding: 8px 12px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .size-label input[type="radio"] {
            display: none;
        }

        .size-label span {
            font-size: 14px;
            font-weight: bold;
        }

        .size-label:hover {
            background-color: #e0e0e0;
        }

        .size-label input[type="radio"]:checked + span {
            background-color: #007bff;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            display: inline-block;
        }


        .color-options {
            display: flex;
            gap: 10px;
        }

        .color-label {
            position: relative;
            display: inline-block;
            width: 30px;
            height: 30px;
            border: 2px solid #ddd;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
        }

        .color-label input[type="radio"] {
            display: none;
        }

        .color-label .checkmark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 16px;
            color: black; /* Default for visibility */
            display: none;
        }

        .color-label input[type="radio"]:checked + .checkmark {
            display: block;
            color: white; /* Fallback for better contrast */
            text-shadow: 0px 0px 3px black; /* Visibility improvement for white colors */
        }

        .color-display {
            display: inline-block;
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            border-radius: 50%;
            vertical-align: middle;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }

        .quantity-label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .quantity-input-wrapper {
            position: relative;
            max-width: 120px;
        }

        .quantity-input {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-align: center;
            font-size: 1rem;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
        }

        .quantity-input:focus {
            outline: none;
            border-color: #4A90E2;
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
        }




        .discount-label {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: transparent;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
            font-weight: bold;
            border-radius: 3px;
            z-index: 100;
        }

        .color-label {
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            position: relative;
            cursor: pointer;
            border: 1px solid #ccc;
        }

        .color-label input[type="radio"] {
            display: none;
        }

        .color-label .checkmark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 16px;
            color: white;
            display: none;
        }

        .color-label input[type="radio"]:checked + .checkmark {
            display: block;
        }

        .no-hover {
            color: blue;
            text-decoration: none;
        }

        .no-hover:hover {
            color: black;
            text-decoration: underline;
            cursor: pointer;
        }
        .table-hover tbody tr:hover {
            background-color: #f0f8ff;
        }

    </style>
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
        <div class="offcanvas__links">
            <a href="{{route('login')}}">Sign in</a>
            <a href="#">FAQs</a>
        </div>
        <div class="offcanvas__top__hover">
            <span>USD <i class="arrow_carrot-down"></i></span>
            <ul>
                <li>USD</li>
                <li>EUR</li>
                <li>USD</li>
            </ul>
        </div>
    </div>
    <div class="offcanvas__nav__option">
        <a href="#" class="search-switch"><img src="{{asset('resources/img/icon/search.png')}}" alt=""></a>
        <a href="#"><img src="{{asset('resources/img/icon/heart.png')}}" alt=""></a>
        <a href="#"><img src="{{asset('resources/img/icon/cart.png')}}" alt=""> <span>0</span></a>
        <div class="price">$0.00</div>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
        <p>Free shipping, 30-day return or refund guarantee.</p>
    </div>
</div>
<!-- Offcanvas Menu End -->

<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Free shipping, 30-day return or refund guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            @if(Auth::check())
                                <a href="{{route('profile')}}">{{Auth::user()->name}}</a>
                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <a href="{{route('purchaseHistory')}}">Purchase History</a>
                            @else
                            <a href="{{route('login')}}">Sign in</a>
                            @endif
                            <a href="#">FAQs</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{route('home')}}"><img src="{{asset('resources/img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <x-nav-link route="home">Home</x-nav-link>
                        <x-nav-link route="shop">Shop</x-nav-link>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./about.html">About Us</a></li>
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contacts</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="#" class="search-switch"><img src="{{asset('resources/img/icon/search.png')}}" alt=""></a>
                    <a href="#"><img src="{{asset('resources/img/icon/heart.png')}}" alt=""></a>
                    <a href="{{route('cart.index')}}"><img src="{{asset('resources/img/icon/cart.png')}}" alt="">
                        <span>{{ session('cart') ? count(session('cart')) : 0 }}</span></a>
                    <div class="price">৳{{ number_format($cartTotalPrice, 2) }}</div>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif
@yield('content')

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="{{route('home')}}"><img src="{{asset('resources/img/footer-logo.png')}}" alt=""></a>
                    </div>
                    <p>The customer is at the heart of our unique business model, which includes design.</p>
                    <a href="#"><img src="{{asset('resources/img/payment.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Shopping</h6>
                    <ul>
                        <li><a href="#">Clothing Store</a></li>
                        <li><a href="#">Trending Shoes</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Sale</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Shopping</h6>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Payment Methods</a></li>
                        <li><a href="#">Delivary</a></li>
                        <li><a href="#">Return & Exchanges</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6>NewLetter</h6>
                    <div class="footer__newslatter">
                        <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                        <form action="#">
                            <input type="text" placeholder="Your email">
                            <button type="submit"><span class="icon_mail_alt"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="footer__copyright__text">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <p>Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        All rights reserved | This template is made with <i class="fa fa-heart-o"
                                                                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    </p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="{{asset('resources/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('resources/js/bootstrap.min.js')}}"></script>
<script src="{{asset('resources/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('resources/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('resources/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('resources/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('resources/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('resources/js/mixitup.min.js')}}"></script>
<script src="{{asset('resources/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('resources/js/main.js')}}"></script>
</body>

</html>
