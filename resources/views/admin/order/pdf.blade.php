<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 20px;
            line-height: 1.5;
            color: #333;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-header h1 {
            margin: 0;
            font-size: 24px;
            color: #444;
        }

        .invoice-header p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }

        .section-title {
            font-size: 18px;
            margin-bottom: 10px;
            color: #444;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }

        .info {
            margin-bottom: 20px;
        }

        .info p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 14px;
        }

        table thead {
            background-color: #f4f4f4;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        tfoot td {
            font-weight: bold;
            text-align: right;
        }

        .total-row td {
            background-color: #f8f9fa;
            font-size: 16px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="invoice-header">
        <h1>HÓA ĐƠN BÁN HÀNG</h1>
        <p>VALOR Fashion Shop - Địa chỉ: 195 Lê Duẩn, Thành phố Vinh, Nghệ An</p>
        <p>Điện thoại: 0123 456 789 | Email: valorshop@gmail.com</p>
    </div>

    <div class="info">
        <h2 class="section-title">Thông tin khách hàng</h2>
        <p><b>Họ và tên:</b> {{ $order->fullname }}</p>
        <p><b>Số điện thoại:</b> {{ $order->phone }}</p>
        <p><b>Địa chỉ:</b> {{ $order->address }}</p>
        <p><b>Ghi chú:</b> {{ $order->message }}</p>
    </div>

    <div>
        <h2 class="section-title">Chi tiết đơn hàng</h2>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderDetail as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ number_format($product->price) }} VND</td>
                        <td>{{ number_format($product->quantity * $product->price) }} VND</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="4" style="text-align: right;">Tổng cộng:</td>
                    <td style="text-align: center;">{{ number_format($order->total) }} VND</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="footer">
        <p>Cảm ơn bạn đã mua hàng! Hẹn gặp lại.</p>
    </div>
</body>

</html>
