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
                                            <tr>
                                                <td>
                                                    <table
                                                        style="background:url({{ asset('asset/images/header_neutral_portal.jpg') }}); background-size:cover; width:800px; height:300px;">
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
                                                                                            style="width: 20px;" alt="email_icon">
                                                                                    </a>
                                                                                </td>
                                                                                <td class="contact_item">
                                                                                    <a
                                                                                        href="https://www.facebook.com/lionwerbung">
                                                                                        <img src="{{ asset('asset/images/facebook.png') }}"
                                                                                            style="width: 25px;" alt="email_icon">
                                                                                    </a>
                                                                                </td>
                                                                                <td class="contact_item">
                                                                                    <a
                                                                                        href="https://api.whatsapp.com/send?phone=+4980369099894">
                                                                                        <img src="{{ asset('asset/images/whatsapp.png') }}"
                                                                                            style="width: 20px;" alt="email_icon">
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
                                                    Sehr geehrte Damen und Herren,
                                                    <br><br>mit dieser E-Mail senden wir Ihnen Ihre gewünschte Vektordatei. Die Anlagen enthalten Ihre gewünschten Dateiformate.
                                                    <br><br>Die Rechnung wird automatisch erstellt und Ihnen in den nächsten Tagen per E-Mail zugesandt.
                                                    <br>Der Umwelt zuliebe wird keine zusätzliche Rechnung mehr auf dem Postweg verschickt.
                                                    <br><br>Mit dieser Datei haben Sie als der Auftraggeber die letzte Möglichkeit, Korrekturen – gleich welcher Art – vorzunehmen. Stellen Sie keine Fehler mehr fest, erklären Sie die Daten für freigegeben und für alle nicht monierten Fehler, haften Sie als Auftragsgeber.
                                                    <br><br>Ist der Auftragnehmer verpflichtet, den Liefergegenstand nach Vorgaben des Auftraggebers (Zeichnungen, Modelle, Muster, Skizzen, Entwürfen, etc.) zu liefern, so steht der Auftraggeber dafür ein, dass Schutzrechte Dritter hierdurch nicht verletzt werden. Im Falle der schuldhaften Pflichtverletzung ist der Auftraggeber verpflichtet, den Auftragnehmer von etwaigen Ansprüchen Dritter auf erstes Anfordern freizustellen.
                                                    <br><br>Für Änderungswünsche antworten Sie einfach auf diese Nachricht.
                                                    <br><br>Wir bedanken uns für Ihren geschätzten Auftrag.
                                                    <br><br>Kennen Sie schon unseren neuen WhatsApp-Service: Wir sind für Fragen auch unter +49(8036) 9099894 per WhatsApp erreichbar!
                                                    <br><br>Für weitere Fragen stehen wir Ihnen jederzeit gerne zur Verfügung.
                                                    <br><br>Mit freundlichen Grüßen
                                                    <br><br>Lion Werbe GmbH
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
                                                    <table style="width: 600px;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="height: 20px;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content_font_left">Bestellnummer</td>
                                                                <td class="content_font_right">
                                                                    {{ $customer->customer_number }}-{{ $order->order_number }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content_font_left">Projektname</td>
                                                                <td class="content_font_right">
                                                                    {{ $order->project_name }}</td>
                                                            </tr>
                                                            @if ($order->size != '')
                                                                <tr>
                                                                    <td class="content_font_left">Gewünschte Größe (in
                                                                        mm)
                                                                    </td>
                                                                    <td class="content_font_right">{{ $order->size }} {{ $order->width_height }}
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
                                                    <table style="width: 600px;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="height: 20px;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content_font_left">Kundennummer</td>
                                                                <td class="content_font_right">
                                                                    {{ $customer->customer_number }}-{{ $order->order_number }}
                                                                </td>
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
