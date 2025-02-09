<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
            color: #000000;
            padding: 20px;
        }

        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #000;
            border-radius: 8px;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .company-info {
            font-size: 14px;
        }

        .invoice-title {
            font-size: 24px;
            font-weight: bold;
            text-align: right;
        }

        .company-logo {
            max-width: 100px;
        }

        .invoice-details {
            margin-bottom: 20px;
            font-size: 14px;
        }

        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-details th, .invoice-details td {
            padding: 10px;
            text-align: left;
            border: 1px solid #000;
        }

        .invoice-summary {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
        }

        .summary-table {
            border-collapse: collapse;
            width: 300px;
        }

        .summary-table th, .summary-table td {
            padding: 10px;
            text-align: right;
            border: 1px solid #000;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
        }

        .payment-info {
            margin-top: 20px;
            border-top: 1px solid #000;
            padding-top: 10px;
        }

        .payment-info h3 {
            margin-bottom: 10px;
        }

        .payment-info table {
            width: 100%;
            border-collapse: collapse;
        }

        .payment-info th, .payment-info td {
            padding: 10px;
            text-align: left;
            border: 1px solid #000;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 40px;
            color: #333;
        }

        .buttons-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        button {
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        .back-home {
            background-color: #888;
        }
    </style>
    <script>
        function printInvoice() {
            window.print();
        }
    </script>
</head>
<body>
<div class="invoice-container">
    <div class="invoice-header">
        <img src="company-logo.png" alt="Company Logo" class="company-logo">
        <div class="company-info">
            <h2>Your Company Name</h2>
            <p>123 Street, City, Country</p>
            <p>Email: support@example.com</p>
            <p>Phone: +123 456 789</p>
        </div>
        <div class="invoice-title">
            <h1>INVOICE</h1>
            <p>#{{$orderDetails['order_no']}}</p>
        </div>
    </div>

    <div class="invoice-details">
        <h3>Billing Information</h3>
        <table>
            <tr>
                <th>Name</th>
                <td>{{Auth::user()->userInfo->fname}} {{Auth::user()->userInfo->lname}}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{$orderDetails['shipping_address']}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{Auth::user()->email}}</td>
            </tr>
        </table>
    </div>

    <div class="invoice-details">
        <h3>Items</h3>
        <table>
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Color</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orderDetails['items'] as $order)
                <tr>
                    <td>{{$order['product_name']}}</td>
                    <td>৳ {{$order['product_price']}}</td>
                    <td>{{$order['quantity']}}</td>
                    <td>{{$order['size']}}</td>
                    <td>{{$order['color']}}</td>
                    <td>৳ {{$order['price']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="invoice-summary">
        <table class="summary-table">
            <tr>
                <th>Subtotal:</th>
                <td>৳ {{$orderDetails['sub_total']}}</td>
            </tr>
            <tr>
                <th>Delivery Charge:</th>
                <td>৳ {{$orderDetails['delivery_charge']}}</td>
            </tr>
            <tr>
                <th>Total:</th>
                <td class="total">৳ {{$orderDetails['total_amount']}}</td>
            </tr>
        </table>
    </div>

    <div class="payment-info">
        <h3>Payment Information</h3>
        <table>
            <tr>
                <th>Payment Method:</th>
                <td>Credit Card</td>
            </tr>
            <tr>
                <th>Payment Status:</th>
                <td>Paid</td>
            </tr>
            <tr>
                <th>Transaction ID:</th>
                <td>TXN1234567890</td>
            </tr>
            <tr>
                <th>Payment Date:</th>
                <td>August 28, 2024</td>
            </tr>
        </table>
    </div>

    <div class="buttons-container">
        <button class="back-home" onclick="window.location.href='/';">Back to Home</button>
        <button onclick="printInvoice();">Print Invoice</button>
    </div>

    <div class="footer">
        <p>Thank you for your business!</p>
    </div>
</div>
</body>
</html>
