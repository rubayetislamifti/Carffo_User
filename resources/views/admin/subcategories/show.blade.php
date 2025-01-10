@extends('layout.admin')

@section('title','Sub Category | '. $subcategories->sub_category)

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Categories & Subcategories </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Sub Categories</a></li>
                    <li class="breadcrumb-item" aria-current="page">Sub Categories List</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$subcategories->sub_category}}</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List of Products in the <em>{{$subcategories->sub_category}}</em> Sub Categories</h4>
                        <p class="card-description"> This subcategories contains <strong>{{$total_products}}</strong> product(s).
                        </p>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> Products </th>
                                <th> Category </th>
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
                                    <td> {{$category->category_name}} </td>
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
