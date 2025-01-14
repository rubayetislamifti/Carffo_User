@extends('layout.app')

@section('title',config('app.name'))

@section('content')
    <!-- Purchase History Section Begin -->
    <section class="purchase-history mt-5">
        <div class="container">
            <h3 class="text-center mb-4">Purchase History</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Purchase Date</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Wireless Earbuds</td>
                        <td>2025-01-10</td>
                        <td>2</td>
                        <td>$30.00</td>
                        <td>$60.00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Smart Watch</td>
                        <td>2025-01-08</td>
                        <td>1</td>
                        <td>$120.00</td>
                        <td>$120.00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Bluetooth Speaker</td>
                        <td>2025-01-05</td>
                        <td>1</td>
                        <td>$50.00</td>
                        <td>$50.00</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Purchase History Section End -->

@endsection
