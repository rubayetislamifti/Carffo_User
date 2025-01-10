@extends('layout.admin')

@section('title', 'View Product ' . $product->product_name)

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> View Product: <em>{{ $product->product_name }}</em> </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">List of Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->product_name }}</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('products/' . $product->image) }}" class="card-img-top img-fluid" alt="{{ $product->product_name }}">
                </div>
            </div>

            <div class="col-md-8">
                <div class="card p-3">
                    <h4 class="card-title">Product Details</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Name:</strong> {{ $product->product_name }}</li>
                        <li class="list-group-item"><strong>Description:</strong> {{ $product->description }}</li>
                        <li class="list-group-item"><strong>Price:</strong> ৳{{ number_format($product->price, 2) }}</li>
                        <li class="list-group-item"><strong>Stock:</strong> {{ $product->stock }}</li>
                        <li class="list-group-item"><strong>Category:</strong> {{ $product->category_name }}</li>
                        <li class="list-group-item"><strong>Sub-Category:</strong> {{ $product->sub_category_name }}</li>
                    @if ($product->discount)
                            <li class="list-group-item"><strong>Discount:</strong> {{ $product->discount }}%</li>
                        @endif
                        <li class="list-group-item"><strong>Sizes:</strong> {{ is_array($product->size) ? implode(', ', $product->size) : $product->size }}</li>
                        <li class="list-group-item"><strong>Colors:</strong> {{ is_array($product->color) ? implode(', ', $product->color) : $product->color }}</li>

                        <li class="list-group-item"><strong>Daily Sales:</strong> </li>
                        <li class="list-group-item"><strong>Monthly Sales:</strong> </li>
                        <li class="list-group-item"><strong>Yearly Sales:</strong> </li>
                        <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('product.edit', $product->product_id) }}" class="btn btn-info">Discount/Edit</a>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
                        </div>
                    </ul>

                </div>

            </div>
            <div class="d-flex justify-content-between mt-3">
                @if ($previousProduct)
                    <a href="{{ route('product.show', $previousProduct->id) }}" class="btn btn-secondary">Previous Product</a>
                @endif
                @if ($nextProduct)
                    <a href="{{ route('product.show', $nextProduct->id) }}" class="btn btn-secondary">Next Product</a>
                @endif
            </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Product</h5>
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this product? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <!-- Form to delete product -->
                        <form id="deleteForm" action="{{ route('product.destroy', $product->product_id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection
