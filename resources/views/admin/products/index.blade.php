@extends('layout.admin')

@section('title','List of Products')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> List of Products </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List of Products</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List of Products</h4>
                    <p class="card-description"> Total <strong>{{$total_products}}</strong> Product(s).
                    </p>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Product Name </th>
                            <th> Description </th>
                            <th> Image </th>
                            <th> Price </th>
                            <th> View Details </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td> {{$product->id}} </td>
                                <td> {{$product->product_name}} </td>
                                <td>
                                    {{$product->description}}
                                </td>
                                <td> <a href="{{ asset('products/' . $product->image) }}" target="_blank">
                                    <img src="{{ asset('products/' . $product->image) }}" alt="{{$product->product_name}}"></a>
                                </td>
                                <td> {{$product->price}} </td>
                                <td> <a href="{{route('product.show',['product'=>$product->id])}}" class="btn btn-gradient-primary">View Details</a> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
