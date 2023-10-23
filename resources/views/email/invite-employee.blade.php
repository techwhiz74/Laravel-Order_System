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
        .button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        text-align: center;
        text-decoration: none;
        background-color: #c4ae79 ;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        }

        .button:hover {
        background-color: gray;
        }
    </style>
</head>
<body>

    <div class="container-data">
    <div class="logo">
<a class="logo_img" href="https://erp.lionwerbung.de/"><img src="{{asset('asset/images/lion_werbe_gmbh_logo.webp')}}" alt="empty" style="background-color: black;padding: 10px;"></a>
</div>
<div class="email-content">
            <p>Hi <b>{{$data['email']}}</b>,</p>
            <p>We are excited to inform you that you have got an invitation from <b>{{$customer->name}}</b> </p>

            <p>Click here to register to join our team</p>
            <a href="{{$inviteLink}}" class="button">Register now</a>

        </div>

       <div class="email-content">

        <p>Thank you !</p>

        <p>Best regards,<br>
        Lion Werbung</p>
       </div>
    </div>
</body>
</html>
