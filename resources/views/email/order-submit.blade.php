<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container-data {
            max-width: 65%;
            margin: 5% auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
            background-color: black;
        }
        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .order-table th, .order-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .order-table th {
            background-color: #f2f2f2;
        }
        .total-row td {
            font-weight: bold;
        }
        .email-content {
            margin-top: 20px;
            padding: 10px;
            /* border: 1px solid #ccc; */
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    <div class="container-data">
    <div class="logo">
<a class="logo_img" href="https://erp.lionwerbung.de/"><img src="{{asset('asset/images/lion_werbe_gmbh_logo.webp')}}" alt="empty" style="background-color: black;padding: 10px;"></a>
</div>
<div class="email-content">
            <p>Hello ,</p>
            <p>We're excited to inform you that a new order has been placed by a customer. Here are the details:</p>
        </div>
        <h5>Order Details</h5>
        <table class="order-table">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Project Name</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Customer Contact</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#{{$data['order_id']}}</td>
                    <td>{{$data['project_name']}}</td>
                    <td>{{$data['user']['name']}}</td>
                    <td>{{$data['user']['email']}}</td>
                    <td>{{$data['user']['contact_no']}}</td>
                    <td>{{date('d M, y')}}</td>
                </tr>
                
                <!-- Add more rows for each product -->
            </tbody>
        </table>
       <div class="email-content">
       <p>Please review the order details and proceed with the delivery of the project files to the customer at your earliest convenience.</p>
        <p>Upload the deliverable files and any necessary documents directly. If you have any questions or encounter any issues, feel free to reach out to our support team for assistance.</p>
        <p>Thank you for your dedication and contribution to our platform!</p>

        <p>Best regards,<br>
        Lion Werbung</p>
       </div>
    </div>
</body>
</html>
