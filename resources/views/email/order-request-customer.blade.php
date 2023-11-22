<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/css/user/email_template.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
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
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('asset/images/email_template_hearder1.jpg') }}"
                                                        alt="logo" width="800px" height="300px"
                                                        style="margin-bottom:-4px">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="email_contact_header">
                                                    <table style="margin: auto;">
                                                        <tbody>
                                                            <tr>
                                                                <td class="contact_item">
                                                                    <a href="https://www.instagram.com/lionwerbung">
                                                                        <i class="fa-brands fa-instagram fa-lg"
                                                                            style="color:#fff"></i>
                                                                    </a>
                                                                </td>
                                                                <td class="contact_item">
                                                                    <a href="https://www.facebook.com/lionwerbung">
                                                                        <i class="fa-brands fa-facebook-f fa-lg"
                                                                            style="color:#fff"></i>
                                                                    </a>
                                                                </td>
                                                                <td class="contact_item">
                                                                    <a
                                                                        href="https://api.whatsapp.com/send?phone=+4980369099894">
                                                                        <i class="fa-brands fa-whatsapp fa-lg"
                                                                            style="color:#fff"></i>
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
                            <tr>
                                <td>
                                    <table style="width: 800px;">
                                        <tbody>
                                            <tr>
                                                <td style="height: 30px;"></td>
                                            </tr>
                                            <tr>
                                                <td class="header_font">
                                                    Sehr geehrte Damen und Herren,<br>wir haben Ihre Anfrage zur
                                                    Änderung erhalten und möchten Ihnen versichern, dass unser Team sich
                                                    umgehend<br>darum kümmern wird.<br><br>Bitte nehmen Sie jedoch zur
                                                    Kenntnis, dass Änderungen, welche eine Größenveränderung von mehr
                                                    als 10%<br>oder grundlegende Änderungen beinhalten, als neue
                                                    Aufträge
                                                    betrachtet werden und separat erfasst werden<br> müssen. In solchen
                                                    Fällen wird die Änderung ohne Rückfrage aus unserem System gelöscht.
                                                    <br><br>Vielen Dank für Ihr Verständnis.
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
                                                                    GRUNDINFORMATIONEN
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width: 660px;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="height: 20px;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content_font_left">Bestellnummer</td>
                                                                <td class="content_font_right">
                                                                    {{ $order->order_number }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content_font_left">Projektname</td>
                                                                <td class="content_font_right">
                                                                    {{ $order->project_name }}</td>
                                                            </tr>
                                                            @if ($order->size != '')
                                                                <tr>
                                                                    <td class="content_font_left">Gewünschte Größe (in
                                                                        cm)
                                                                    </td>
                                                                    <td class="content_font_right">{{ $order->size }}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            @if ($order->products != '')
                                                                <tr>
                                                                    <td class="content_font_left">Endprodukt (Material)
                                                                    </td>
                                                                    <td class="content_font_right">
                                                                        {{ $order->products }}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            <tr>
                                                                <td class="content_font_left">Besondere Anweisungen</td>
                                                                <td class="content_font_right">
                                                                    {{ $order->special_instructions }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td style="height: 30px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table
                                                        style="background-color: rgb(6, 6, 23); padding: 5px 0; width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td class="item_font">
                                                                    ADRESSDATEN
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width: 660px;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="height: 20px;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content_font_left">Kundennr</td>
                                                                <td class="content_font_right">
                                                                    {{ $order->customer_number }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content_font_left">Firma</td>
                                                                <td class="content_font_right">{{ $customer->company }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content_font_left">Name, Vorname</td>
                                                                <td class="content_font_right">{{ $customer->name }},
                                                                    {{ $customer->first_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content_font_left">Straße, Hausnummer</td>
                                                                <td class="content_font_right">
                                                                    {{ $customer->street_number }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content_font_left">Postleitzahl, Ort</td>
                                                                <td class="content_font_right">
                                                                    {{ $customer->postal_code }},
                                                                    {{ $customer->location }}</td>
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
                                                                <td class="footer_title_font">Über Uns</td>
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
                                                                <td class="footer_content_font">Wir sind ein erfahrenes
                                                                    Team kreativer Köpfe, welches sich der Schöpfung
                                                                    Ihrer Unternehmensidentität und der Gestaltung
                                                                    der dazugehörigen Werbemittel widmet.Für unsere
                                                                    Arbeit wurden wir bereits mehrfach ausgezeichnet.
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table class="footer_column_table_right">
                                                        <tbody>
                                                            <tr>
                                                                <td class="footer_title_font">Kontaktinformationen</td>
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
                                                                <td class="footer_content_font">Vertreten durch den
                                                                    Geschäftsführer: Stephan
                                                                    Scheuerer<br>Umsatzsteuer-Identifikationsnummer<br>gemäß
                                                                    § 27 a Umsatzsteuergesetz:
                                                                    DE815830440<br>Registereintrag: Traunstein HRB 28140
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
