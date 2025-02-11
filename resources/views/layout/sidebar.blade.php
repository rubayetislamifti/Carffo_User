<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{asset('adminresources/assets/images/faces/face1.jpg')}}" alt="profile" />
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{config('app.name')}}</span>
{{--                    <span class="text-secondary text-small">Project Manager</span>--}}
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product.create')}}">Add Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product.index')}}">Products List</a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="../pages/ui-features/typography.html">Typography</a>--}}
{{--                    </li>--}}
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <span class="menu-title">Orders</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('pendingOrders')}}">Pending Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/icons/font-awesome.html">Shipped Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/icons/font-awesome.html">Delivered Orders</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
                <span class="menu-title">Categories & Subcategories</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="forms">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('category.index')}}">All Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('category.create')}}">Add Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('subcategory.index')}}">All Sub-Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('subcategory.create')}}">Add Sub-Categories</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <span class="menu-title">Performance</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/charts/chartjs.html">Most Selling</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/charts/chartjs.html">Less Selling</a>
                    </li>
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">--}}
{{--                <span class="menu-title">Tables</span>--}}
{{--                <i class="mdi mdi-table-large menu-icon"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="tables">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="../pages/tables/basic-table.html">Basic table</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">--}}
{{--                <span class="menu-title">User Pages</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--                <i class="mdi mdi-lock menu-icon"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="auth">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="../pages/samples/blank-page.html"> Blank Page </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="../pages/samples/login.html"> Login </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="../pages/samples/register.html"> Register </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="../pages/samples/error-404.html"> 404 </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="../pages/samples/error-500.html"> 500 </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="../docs/documentation.html" target="_blank">--}}
{{--                <span class="menu-title">Documentation</span>--}}
{{--                <i class="mdi mdi-file-document-box menu-icon"></i>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</nav>
