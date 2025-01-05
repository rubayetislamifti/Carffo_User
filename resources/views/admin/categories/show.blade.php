@extends('layout.admin')

@section('title','Category | '. $categories->category_name)

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Categories & Subcategories </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Categories</a></li>
                    <li class="breadcrumb-item" aria-current="page">Category List</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$categories->category_name}}</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List of Products in the <em>{{$categories->category_name}}</em> Category</h4>
                        <p class="card-description"> This category contains <strong>0</strong> product(s).
                        </p>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> Products </th>
                                <th> Sub-Category </th>
                                <th> Image </th>
                                <th> Price </th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @foreach($categories as $category)--}}
{{--                                <tr>--}}
{{--                                    <td> {{$category->id}} </td>--}}
{{--                                    <td> {{$category->category_name}} </td>--}}
{{--                                    <td> TBA </td>--}}
{{--                                    <td> <a href="{{route('showCategory',['id'=>$category->id])}}/{{ Str::slug($category->category_name) }}" class="btn btn-gradient-info me-2">Show Products</a> </td>--}}
{{--                                    <td> <a href="#" class="btn btn-gradient-primary me-2">Edit</a> </td>--}}
{{--                                    <td> <button class="btn btn-danger me-2">Delete</button> </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
