@extends('layout.admin')

@section('title','Category | '. $categories->category_name)

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Categories & Subcategories </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Categories</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('category.index')}}">Category List</a> </li>
                    <li class="breadcrumb-item active" aria-current="page">{{$categories->category_name}}</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List of Products in the <em>{{$categories->category_name}}</em> Category</h4>
                        <p class="card-description"> This category contains <strong>{{$total_products}}</strong> product(s).
                        </p>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> Products </th>
                                <th> Sub-Category </th>
                                <th> Image </th>
                                <th> Price </th>
                                <th> View Product </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $category)
                                <tr>
                                    <td> {{$category->product_id}} </td>
                                    <td> {{$category->product_name}} </td>
                                    <td> {{$category->subcategory_name}} </td>
                                    <td> <img src="{{asset('products/'.$category->image)}}"> </td>
                                    <td> {{$category->price}} </td>
                                    <td> <a href="{{route('product.show',['product'=>$category->product_id])}}" class="btn btn-gradient-primary"> View Product </a> </td>
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
