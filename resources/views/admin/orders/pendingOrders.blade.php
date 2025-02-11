@extends('layout.admin')

@section('title','Pending Orders')

@section('content')
    <div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Orders </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Orders</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pending Orders</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pending Order Table</h4>
                {{--                        <p class="card-description"> Add class <code>.table-bordered</code>--}}
                {{--                        </p>--}}
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th> Product Name </th>
                        <th> Quantity </th>
                        <th> Size </th>
                        <th> Color </th>
                        <th> Details </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $carts)
                        <tr>
                            <td> {{$carts->product_id}} </td>
                            <td>
                                {{$carts->quantity}}
                            </td>
                            <td> {{$carts->size}} </td>
                            <td>
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: {{$carts->color}}; border-radius: 50%;"></span>
                            </td>

                            <td> <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#detailsModal">
                                    Details ->
                                </button>
                            </td>

                            <!-- Modal -->
                            <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailsModalLabel">Order Details #{{$carts->order_no}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="mb-3">
                                                    <label for="paymentDetails" class="form-label">Payment Details</label>
                                                    <input type="text" value="{{$carts->payment}}" class="form-control" id="paymentDetails" placeholder="Enter payment details" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="paymentDetails" class="form-label">Transaction Id</label>
                                                    <input type="text" value="{{$carts->transaction_id}}" class="form-control" id="paymentDetails" placeholder="Enter payment details" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="shippingAddress" class="form-label">Shipping Address</label>
                                                    <input type="text" class="form-control" value="{{$carts->shipping_address}}" id="shippingAddress" placeholder="Enter shipping address" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="shippingAddress" class="form-label">City</label>
                                                    <input type="text" class="form-control" value="{{$carts->city}}" id="shippingAddress" placeholder="Enter shipping address" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="shippingAddress" class="form-label">Phone</label>
                                                    <input type="text" class="form-control" value="{{$carts->phone}}" id="shippingAddress" placeholder="Enter shipping address" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="userInfo" class="form-label">User Info</label>
                                                    <input type="text" class="form-control" id="userInfo" placeholder="Enter user information" readonly>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
