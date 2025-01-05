@extends('layout.admin')

@section('title','List of Sub-Categories')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Categories & Subcategories </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Sub Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List of Sub-Categories</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List of Sub-Categories</h4>
                        {{--                        <p class="card-description"> Add class <code>.table-bordered</code>--}}
                        {{--                        </p>--}}
                        @if(isset($error))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
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
                            @if($subcategories->isEmpty() && !isset($error))
                                <p>No categories found.</p>
                            @else
                                @foreach($subcategories as $subcategory)
                                    <tr>
                                        <td> {{$subcategory->id}} </td>
                                        <td> {{$subcategory->sub_category}} </td>
                                        <td> TBA </td>
                                        <td> <a href="#" class="btn btn-gradient-info me-2">Show Products</a> </td>
                                        <td> <a href="#" class="btn btn-gradient-primary me-2">Edit</a> </td>
                                        <td> <button class="btn btn-danger me-2">Delete</button> </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
