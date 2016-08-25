<!shutdown -h nowctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>HTML Email Template</title>

    <!--[if gte mso 9]><xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml><![endif]-->

    <style>
        html {
            width: 100%;
        }
        body {
            margin-top: 0;
            margin-right: 0;
            margin-bottom: 0;
            margin-left: 0;
            padding-top: 0;
            padding-right: 0;
            padding-bottom: 0;
            padding-left: 0;
            width: 100% !important;
            background-color: #e1e6e9;
            font-family: Arial, Helvetica, sans-serif;
        }
        /* Mail Client Fixes */
        div, a, td {
            -webkit-text-size-adjust: 100%;
            -moz-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        img {
            border: 0;
            -ms-interpolation-mode: bicubic;
        }
        table {
            border: none;
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        .ExternalClass {
            width: 100%;
        }
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
            line-height: 100%;
        }
        #outlook a {
            padding: 0;
        }

        /* Minus 600 (Tablet/Mobile view) */
        @media only screen and (max-width: 600px) {
            body {
                width: auto!important;
            }
            table[class="wrapper"] {
                width: 100% !important;
            }
            table[class="inner"] {
                width: 90%!important;
            }
            img[class="responsive"] {
                width: 100% !important;
            }
            table[class="houdini"] {
                display: none !important;
                visibility: hidden !important;
            }
            table[class="column-inner"], table[class="column-1-2"], table[class="column-1-3"] {
                width: 100% !important;
            }
        }
    </style>
</head>

<body>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#375a7f">
    <tbody>
    <tr>
        <td><!-- Wrapper -->

            <table width="600" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#222222" class="wrapper">
                <tbody>
                <!-- Header Image -->
                <tr>
                    <td><img src="{{$message->embed($mainImg)}}" alt="" class="responsive" border="0" style="display: block; max-width:600px"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <!-- Content -->
                <tr>
                    <td align="center"><table bgcolor="#222222" color=#ffffff" class="inner" border="0" cellspacing="0" cellpadding="0" width="90%">
                            <tbody>
                            <tr>
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <!-- Intro Text -->
                                        <tr>
                                            <td style="font-family: Arial, sans-serif; color:#707070; font-size:12px; line-height: 16px;">Dear <span style="color: #50C2C8;">{!! $user !!}</span>,
                                                <br><br>

                                                {!! $content !!}
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <!-- 2/2 Column -->
                                        <tr>
                                            <td><!-- Left Column -->


                                                <!--[if mso]></td><td><![endif]-->
                                                <!-- Right Column -->

                                        </tr>
                                        </tbody>
                                    </table></td>
                            </tr>
                            </tbody>
                        </table></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                </tbody>
            </table></td>
    </tr>
    </tbody>
</table>
</body>
</html>
