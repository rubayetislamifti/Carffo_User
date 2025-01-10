@extends('layout.admin')

@section('title','List of Categories')

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
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
{{--                        <p class="card-description"> Add class <code>.table-bordered</code>--}}
{{--                        </p>--}}
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> Name </th>
                                <th> Show Products </th>
                                <th> Edit </th>
                                <th> Delete </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td> {{$category->id}} </td>
                                <td> {{$category->category_name}} </td>
                                <td> <a href="{{route('category.show',['category'=>$category->id])}}" class="btn btn-gradient-info me-2">Show Products</a> </td>
                                <td> <a href="{{ route('category.edit', ['category' => $category->id])}}" class="btn btn-gradient-primary me-2">Edit</a> </td>
                                <td> <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$category->id}}">Delete</button> </td>
                            </tr>
                            <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Delete Category: {{$category->category_name}}</h5>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this category? All its subcategories and products will be deleted too.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <!-- Form to delete product -->
                                            <form id="deleteForm" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
