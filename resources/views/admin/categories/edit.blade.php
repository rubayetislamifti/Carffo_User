@extends('layout.admin')

@section('title','Category | '.$categories->category_name)

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Categories & Subcategories </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Categories</a></li>
                <li class="breadcrumb-item" aria-current="page">{{$categories->category_name}}</li>
                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
            </ol>
        </nav>
    </div>
    <div class="row">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Category</h4>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form class="forms-sample" action="{{route('insertCategory')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Category Name</label>
                            <input type="text" name="categoryName" class="form-control" value="{{$categories->category_name}}" id="exampleInputName1" placeholder="Name">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
