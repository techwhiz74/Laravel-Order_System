<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/css/user/email_template.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Inter", "Helvetica", monospace;
            border-spacing: 0;
        }

        table {
            margin: auto;
        }

        .email_template_table {
            border-collapse: collapse !important;
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #efefef;
        }

        .template_div {
            margin: 0;
            padding: 20px;
            height: 100% !important;
            width: 100% !important;
            border-top-width: 4px;
            border-top-style: solid;
            border-top-color: #d3d3d3;
        }

        .email_template {
            width: 800px;
            border-collapse: collapse !important;
            border: 1px solid #cccccc;
            margin: auto;
            background-color: rgb(250, 250, 250);
        }

        .email_contact_header {
            background-image: url('/asset/images/email_template_hearder2.jpg');
            padding-bottom: 50px;
        }

        .contact_item {
            padding: 12px;
        }

        .header_font {
            font-size: 13px;
            color: #303133;
            letter-spacing: 0px;
            line-height: 18px;
            padding: 0 100px;
        }

        .item_font {
            font-size: 24px;
            color: #ffffff;
            letter-spacing: 1px;
            line-height: 28px;
            font-weight: 600;
            text-align: center;
        }

        .content_font_left {
            border: solid 1px #dadada;
            border-width: 0 0 1px 0;
            padding: 10px 0 10px 0;
            font-size: 13px;
            line-height: 20px;
            color: #666666;
            font-weight: 600;
            width: 50%;
        }

        .content_font_right {
            border: solid 1px #dadada;
            border-width: 0 0 1px 0;
            padding: 10px 0 10px 0;
            font-size: 13px;
            line-height: 20px;
            color: #666666;
            font-weight: 400;
            width: 50%;
        }

        .footer {
            background-color: #282828;
        }

        .footer_title_font {
            font-size: 20px;
            font-weight: 600;
            color: #ffffff;
            letter-spacing: 0.5px;
            line-height: 25px;
            text-align: left;
        }

        .footer_bar {
            width: 50px;
            border-bottom: 4px solid #f8d35e;
            border-radius: 2px;
        }

        .footer_content_font {
            font-size: 13px;
            color: #dadada;
            letter-spacing: .5px;
            line-height: 23px;
        }

        .footer_column_table_left {
            margin-top: 0;
            width: 50%;
            padding-right: 13px;
            text-align: left;
        }

        .footer_column_table_right {
            margin-top: 0;
            width: 50%;
            padding-left: 13px;
            text-align: left;
        }
    </style>
</head>

<body>

    <table class="email_template_table">
        <tbody>
            <tr>
                <td class="template_div">
                    <table class="email_template">
                        <tbody>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            @if ($order->type == 'Embroidery')
                                                <tr>
                                                    <td>
                                                        <table
                                                            style="background:url({{ asset('asset/images/header_bestellung_stickprogramm.jpg') }}); background-size:cover; width:800px; height:300px;">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <table
                                                                            style="margin-right:150px; margin-top:180px;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="contact_item">
                                                                                        <a
                                                                                            href="https://www.instagram.com/lionwerbung">
                                                                                            <img src="{{ asset('asset/images/instagram.png') }}"
                                                                                                style="width: 20px;">
                                                                                        </a>
                                                                                    </td>
                                                                                    <td class="contact_item">
                                                                                        <a
                                                                                            href="https://www.facebook.com/lionwerbung">
                                                                                            <img src="{{ asset('asset/images/facebook.png') }}"
                                                                                                style="width: 25px;">
                                                                                        </a>
                                                                                    </td>
                                                                                    <td class="contact_item">
                                                                                        <a
                                                                                            href="https://api.whatsapp.com/send?phone=+4980369099894">
                                                                                            <img src="{{ asset('asset/images/whatsapp.png') }}"
                                                                                                style="width: 20px;">
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>

                                                        </table>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ($order->type == 'Vector')
                                                <tr>
                                                    <td>
                                                        <table
                                                            style="background:url({{ asset('asset/images/header_bestellung_vektordatei.jpg') }}); background-size:cover; width:800px; height:300px;">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <table
                                                                            style="margin-right:150px; margin-top:180px;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="contact_item">
                                                                                        <a
                                                                                            href="https://www.instagram.com/lionwerbung">
                                                                                            <img src="{{ asset('asset/images/instagram.png') }}"
                                                                                                style="width: 20px;">
                                                                                        </a>
                                                                                    </td>
                                                                                    <td class="contact_item">
                                                                                        <a
                                                                                            href="https://www.facebook.com/lionwerbung">
                                                                                            <img src="{{ asset('asset/images/facebook.png') }}"
                                                                                                style="width: 25px;">
                                                                                        </a>
                                                                                    </td>
                                                                                    <td class="contact_item">
                                                                                        <a
                                                                                            href="https://api.whatsapp.com/send?phone=+4980369099894">
                                                                                            <img src="{{ asset('asset/images/whatsapp.png') }}"
                                                                                                style="width: 20px;">
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="width: 800px;">
                                        <tbody>
                                            <tr>
                                                <td style="height: 30px;"></td>
                                            </tr>
                                            <tr>
                                                <td class="header_font">
                                                    Hello, a new order has just been entered and is ready for you to do.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px;"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table
                                                        style="background-color: rgb(6, 6, 23); padding: 5px 0; width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td class="item_font">
                                                                    BASIC INFORMATION
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width: 600px;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="height: 20px;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content_font_left">Order Number</td>
                                                                <td class="content_font_right">
                                                                    {{ $order->order_number }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content_font_left">Project Name</td>
                                                                <td class="content_font_right">
                                                                    {{ $order->project_name }}</td>
                                                            </tr>
                                                            @if ($order->size != '')
                                                                <tr>
                                                                    <td class="content_font_left">Desired Size (in
                                                                        cm)
                                                                    </td>
                                                                    <td class="content_font_right">{{ $order->size }}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            @if ($order->products != '')
                                                                <tr>
                                                                    <td class="content_font_left">Final Product
                                                                        (Material)
                                                                    </td>
                                                                    <td class="content_font_right">
                                                                        {{ $order->products }}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            <tr>
                                                                <td class="content_font_left">Special Instruction</td>
                                                                <td class="content_font_right">
                                                                    {{ $order->special_instructions }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content_font_left">Type</td>
                                                                <td class="content_font_right">
                                                                    {{ $order->type }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content_font_left">Delivery</td>
                                                                <td class="content_font_right">
                                                                    {{ $order->deliver_time }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content_font_left">Ordered From</td>
                                                                <td class="content_font_right">
                                                                    {{ $order->ordered_from }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content_font_left">Status</td>
                                                                <td class="content_font_right">
                                                                    {{ $order->status }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 30px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="footer">
                                    <table style="width: 600px;">
                                        <tbody>
                                            <tr>
                                                <td style="height: 60px;"></td>
                                            </tr>
                                            <tr>
                                                <td style="display: flex;">
                                                    <table class="footer_column_table_left">
                                                        <tbody>
                                                            <tr>
                                                                <td class="footer_title_font">About Us</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 20px;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table style="margin-left: 0;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="footer_bar"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 16px;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="footer_content_font">We are an experienced
                                                                    team of creative minds who are dedicated to creating
                                                                    your corporate identity and designing the associated
                                                                    advertising materials. We have already received
                                                                    several awards for our work.
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table class="footer_column_table_right">
                                                        <tbody>
                                                            <tr>
                                                                <td class="footer_title_font">Contact information</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 20px;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table style="margin-left: 0;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="footer_bar"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 16px;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="footer_content_font">Lion Werbe
                                                                    GmbH<br>Kampenwandstr. 10<br>83134 Prutting</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="footer_content_font">Tel.: +49 (8036) 90 99
                                                                    892</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="footer_content_font">Fax: +49 (8036) 90 99
                                                                    895</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="footer_content_font"><a
                                                                        style="color: #dadada;"
                                                                        href="mailto:info@lionwerbung.de"
                                                                        target="_blank">E-Mail: info@lionwerbung.de</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="footer_content_font">Represented by business
                                                                    executive: Stephan
                                                                    Scheuerer<br>Sales tax identification number in
                                                                    accordance with Section 27 a of the Sales Tax Act
                                                                    DE815830440<br>Register entry: Traunstein HRB 28140
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height: 60px;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
