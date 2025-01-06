@extends('layout.admin')

@section('title','Add Category')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Categories & Subcategories </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category List</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category Table</h4>
{{--                        <p class="card-description"> Add class <code>.table-bordered</code>--}}
{{--                        </p>--}}
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> Name </th>
                                <th> Related Products </th>
                                <th> Show </th>
                                <th> Edit </th>
                                <th> Delete </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td> {{$category->id}} </td>
                                <td> {{$category->category_name}} </td>
                                <td> TBA </td>
                                <td> <a href="{{route('category.show',['category'=>$category->id])}}" class="btn btn-gradient-info me-2">Show Products</a> </td>
                                <td> <a href="{{ route('category.edit', ['category' => $category->id])}}" class="btn btn-gradient-primary me-2">Edit</a> </td>
                                <td> <button class="btn btn-danger me-2">Delete</button> </td>
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
