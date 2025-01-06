@extends('layout.admin')

@section('title','Sub Category | '.$subcategories->sub_category)

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Categories & Subcategories </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Sub Categories</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{$subcategories->sub_category}}</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
                </ol>
            </nav>
        </div>
        <div class="row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Sub Category</h4>
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form class="forms-sample" action="{{route('subcategory.update',['subcategory'=>$subcategories->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Sub Category Name</label>
                                <input type="text" name="categoryName" class="form-control" value="{{$subcategories->sub_category}}" id="exampleInputName1" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="parentCategory">Parent Category</label>
                                <select name="parentCategory" class="form-control" id="parentCategory">
                                    <option value="">Select Parent Category</option>
                                    @if($categories->isEmpty() && !isset($error))
                                        <p>No categories found.</p>
                                    @else
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
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
