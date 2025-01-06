@extends('layout.admin')

@section('title','Create New Product')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Create New Products </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create New Products</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create New Product</h4>
                        <form class="forms-sample" method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="productName">Product Name</label>
                                <input type="text" name="product_name" class="form-control" id="productName" placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                <label for="productDescription">Description</label>
                                <textarea name="description" class="form-control" id="productDescription" rows="4" placeholder="Product Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Price</label>
                                <input type="number" name="price" class="form-control" id="productPrice" placeholder="Product Price">
                            </div>
                            <div class="form-group">
                                <label for="previousPrice">Previous Price</label>
                                <input type="number" name="previous_price" class="form-control" id="previousPrice" placeholder="Previous Price">
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" name="stock" class="form-control" id="stock" placeholder="Stock Quantity">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" class="form-select" id="category">
                                    <option value="Men">Men</option>
                                    <option value="Women">Women</option>
                                    <option value="Kids">Kids</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subCategory">Sub-Category</label>
                                <input type="text" name="sub_category" class="form-control" id="subCategory" placeholder="Sub-Category">
                            </div>
                            <div class="form-group">
                                <label for="sizes">Sizes</label>
                                <select name="sizes[]" class="form-select" id="sizes" multiple>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                    <option value="XXXL">XXXL</option>
                                </select>
                                <small class="text-muted">Hold down the Ctrl (Windows) or Command (Mac) key to select multiple sizes.</small>
                            </div>

                            <div class="form-group">
                                <label for="colors">Available Colors</label>
                                <select name="colors[]" class="form-select" id="colors" multiple>
                                    <option value="Red">Red</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Green">Green</option>
                                    <option value="Black">Black</option>
                                    <option value="White">White</option>
                                    <option value="Yellow">Yellow</option>
                                    <option value="Pink">Pink</option>
                                    <option value="Gray">Gray</option>
                                </select>
                                <small class="text-muted">Hold down the Ctrl (Windows) or Command (Mac) key to select multiple colors.</small>
                            </div>

                            <div class="form-group">
                                <label for="material">Material</label>
                                <input type="text" name="material" class="form-control" id="material" placeholder="Material (e.g., Cotton, Polyester)">
                            </div>
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                            </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="discount">Discount (%)</label>
                                <input type="number" name="discount" class="form-control" id="discount" placeholder="Discount Percentage">
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-light" type="reset">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
