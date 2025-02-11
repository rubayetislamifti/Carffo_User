@extends('layout.admin')

@section('title',config('app.name'))

@section('content')


    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(isset($error))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pending Order Table</h4>
{{--                        <p class="card-description"> Add class <code>.table-bordered</code>--}}
{{--                        </p>--}}
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> Product Name </th>
                                <th> Quantity </th>
                                <th> Size </th>
                                <th> Color </th>
                                <th> Details </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $carts)
                                <tr>
                                    <td> {{$carts->product_id}} </td>
                                    <td>
                                        {{$carts->quantity}}
                                    </td>
                                    <td> {{$carts->size}} </td>
                                    <td>
                                        <span style="display: inline-block; width: 20px; height: 20px; background-color: {{$carts->color}}; border-radius: 50%;"></span>
                                    </td>

                                    <td> <a href="#" class="btn btn-primary">Details -></a> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>




@endsection
