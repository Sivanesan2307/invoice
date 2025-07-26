<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your Invoice</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            color: #212529;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 30px;
        }

        h1 {
            font-size: 24px;
            color: #343a40;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td {
            padding: 8px 0;
        }

        .label {
            font-weight: bold;
            width: 50%;
        }

        .total {
            font-weight: bold;
            font-size: 16px;
            color: #000;
            border-top: 1px solid #dee2e6;
            padding-top: 10px;
        }

        .footer {
            font-size: 14px;
            color: #6c757d;
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Hello {{ $invoice->client_name }},</h1>

        <p>Here are your invoice detailss:</p>

        <table>
            <tr>
                <td class="label">Item</td>
                <td>{{ $invoice->item_description }}</td>
            </tr>
            <tr>
                <td class="label">Quantity</td>
                <td>{{ $invoice->quantity }}</td>
            </tr>
            <tr>
                <td class="label">Price per Item</td>
                <td>${{ number_format($invoice->price_per_item, 2) }}</td>
            </tr>
            <tr>
                <td class="label">Subtotal</td>
                <td>${{ number_format($invoice->subtotal, 2) }}</td>
            </tr>
            <tr>
                <td class="label">Tax</td>
                <td>${{ number_format($invoice->tax_amount, 2) }}</td>
            </tr>
            <tr>
                <td class="label total">Total</td>
                <td class="total">${{ number_format($invoice->total, 2) }}</td>
            </tr>
        </table>

        <p>Thanks for your business!</p>

        <div class="footer">
            &copy; {{ date('Y') }} Invoice Generator | This is an automated message.
        </div>
    </div>

</body>
</html>

