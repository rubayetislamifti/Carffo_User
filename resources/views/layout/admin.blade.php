<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title',config('app.name'))</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('adminresources/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminresources/assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('adminresources/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('adminresources/assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('adminresources/assets/vendors/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('adminresources/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('adminresources/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('adminresources/assets/images/favicon.png')}}" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="container-scroller">

    @include('layout.navbar')

    <div class="container-fluid page-body-wrapper">
        @include('layout.sidebar')
        <div class="main-panel">
        @yield('content')
            @include('layout.footer')
        </div>
    </div>
</div>

<script src="{{asset('adminresources/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('adminresources/assets/vendors/chart.js/chart.umd.js')}}"></script>
<script src="{{asset('adminresources/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('adminresources/assets/js/off-canvas.js')}}"></script>
<script src="{{asset('adminresources/assets/js/misc.js')}}"></script>
<script src="{{asset('adminresources/assets/js/settings.js')}}"></script>
<script src="{{asset('adminresources/assets/js/todolist.js')}}"></script>
<script src="{{asset('adminresources/assets/js/jquery.cookie.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('adminresources/assets/js/dashboard.js')}}"></script>
</body>
</html>
