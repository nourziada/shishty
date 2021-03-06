<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <!-- Web Font / @font-face : BEGIN -->
    <!-- NOTE: If web fonts are not required, lines 10 - 27 can be safely removed. -->

    <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
    <!--[if mso]>
        <style>
            * {
                font-family: sans-serif !important;
            }
        </style>
    <![endif]-->

    <!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
    <!--[if !mso]><!-->
    <!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
    <!--<![endif]-->

    <!-- Web Font / @font-face : END -->

    <!-- CSS Reset : BEGIN -->
    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }

        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode:bicubic;
        }

        /* What it does: A work-around for email clients meddling in triggered links. */
        *[x-apple-data-detectors],  /* iOS */
        .x-gmail-data-detectors,    /* Gmail */
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* What it does: Prevents Gmail from displaying an download button on large, non-linked images. */
        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }
        /* If the above doesn't work, add a .g-img class to any image in question. */
        img.g-img + div {
            display: none !important;
        }

        /* What it does: Prevents underlining the button text in Windows 10 */
        .button-link {
            text-decoration: none !important;
        }

        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */
        /* Thanks to Eric Lepetit (@ericlepetitsf) for help troubleshooting */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */
            .email-container {
                min-width: 375px !important;
            }
        }

        @media screen and (max-width: 480px) {
            /* What it does: Forces Gmail app to display email full width */
            u ~ div .email-container {
                min-width: 100vw;
            }
        }

    </style>
    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

    /* What it does: Hover styles for buttons */
    .button-td,
    .button-a {
        transition: all 100ms ease-in;
    }
    .button-td:hover,
    .button-a:hover {
        background: #555555 !important;
        border-color: #555555 !important;
    }

    /* Media Queries */
    @media screen and (max-width: 600px) {

        /* What it does: Adjust typography on small screens to improve readability */
        .email-container p {
            font-size: 17px !important;
        }

    }

    </style>
    <!-- Progressive Enhancements : END -->

    <!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->

</head>
<body width="100%" bgcolor="#222222" style="margin: 0; mso-line-height-rule: exactly;">
    <center style="width: 100%; background: #222222; text-align: left;">

        

        <!--
            Set the email width. Defined in two places:
            1. max-width for all clients except Desktop Windows Outlook, allowing the email to squish on narrow but never go wider than 600px.
            2. MSO tags for Desktop Windows Outlook enforce a 600px width.
        -->
        <div style="max-width: 600px; margin: auto;" class="email-container">
            <!--[if mso]>
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" align="center">
            <tr>
            <td>
            <![endif]-->

            <!-- Email Header : BEGIN -->
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;">
                <tr>
                    <td style="padding: 20px 0; text-align: center">
                        
                    </td>
                </tr>
            </table>
            <!-- Email Header : END -->

            <!-- Email Body : BEGIN -->
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;">

                <!-- Hero Image, Flush : BEGIN -->
                <tr>
                    <td bgcolor="#ffffff" align="center">
                        
                    </td>
                </tr>
                <!-- Hero Image, Flush : END -->

                <!-- 1 Column Text + Button : BEGIN -->
                <tr>
                    <td bgcolor="#ffffff">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td  style="text-align: center; padding: 40px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <h1 style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 24px; line-height: 125%; color: #333333; font-weight: normal;">طلبية جديدة من تطبيق شيشتي</h1>
                                    <p style="margin: 0;">عزيزي المسؤول ، هناك طلبية جديدة من تطبيق شيشتي بالتفاصيل التالية </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0 40px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <!-- Button : BEGIN -->
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto;">
                                        <tr>
                                            <td style="border-radius: 3px; background: #222222; text-align: center;" class="button-td">
                                                
                                                    <span style="color:#ffffff;" class="button-link">&nbsp;&nbsp;&nbsp;&nbsp;التفاصيل&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- Button : END -->
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;padding-right: 40px; padding-bottom: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <span style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: bold;">اسم طالب الطلبية : </span>
                                    <span style="margin: 0;">{{$name}}</span>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: right;padding-right: 40px; padding-bottom: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <span style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: bold;">البريد الالكتروني : </span>
                                    <span style="margin: 0;">{{$email}}</span>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: right;padding-right: 40px; padding-bottom: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <span style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: bold;">رقم الهاتف : </span>
                                    <span style="margin: 0;">{{$mobile}}</span>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: right;padding-right: 40px; padding-bottom: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <span style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: bold;">العنوان : </span>
                                    <span style="margin: 0;">{{$address}}</span>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: right;padding-right: 40px; padding-bottom: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <span style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: bold;">المدينة : </span>
                                    <span style="margin: 0;">{{$city}}</span>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: right;padding-right: 40px; padding-bottom: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <span style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: bold;">الولاية : </span>
                                    <span style="margin: 0;">{{$state}}</span>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: right;padding-right: 40px; padding-bottom: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <span style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: bold;">الرمز البريدي : </span>
                                    <span style="margin: 0;">{{$zip_code}}</span>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: right;padding-right: 40px; padding-bottom: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <span style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: bold;">الرمز البريدي : </span>
                                    <span style="margin: 0;">{{$zip_code}}</span>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: right;padding-right: 40px; padding-bottom: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <span style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: bold;">الدولة : </span>
                                    <span style="margin: 0;">{{$country}}</span>
                                </td>
                            </tr>


                            <tr>
                                <td style="padding: 0 40px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <!-- Button : BEGIN -->
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto;">
                                        <tr>
                                            <td style="border-radius: 3px; background: #222222; text-align: center;" class="button-td">
                                                
                                                    <span style="color:#ffffff;" class="button-link">&nbsp;&nbsp;&nbsp;&nbsp;تفاصيل المنتجات المختارة&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- Button : END -->
                                </td>
                            </tr>


                            <?php $no = 1; ?>
                            <tr>
                            @foreach($products as $product)
                            <tr>
                                <td style="text-align: right;padding-right: 40px; padding-bottom: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <span style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: bold;">المنتج {{$no++}} </span>
                                </td>
                            </tr>    

                            <tr>
                                <td style="text-align: right;padding-right: 40px; padding-bottom: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <span style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: bold;">اسم المنتج : </span>
                                    <span style="margin: 0;">{{\App\Product::find($product->product_id)->title}}</span>
                                </td>
                             </tr>  

                                 <tr>
                                <td style="text-align: right;padding-right: 40px; padding-bottom: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <span style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: bold;">اسم المنتج : </span>
                                    <span style="margin: 0;">{{\App\Product::find($product->product_id)->title}}</span>
                                </td>
                                </tr> 

                                 <tr>
                                <td style="text-align: right;padding-right: 40px; padding-bottom: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <span style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: bold;">تفاصيل المنتج : </span>
                                    <span style="margin: 0;">{{\App\Product::find($product->product_id)->description}}</span>
                                </td>
                                </tr> 

                                <tr>
                                <td style="text-align: right;padding-right: 40px; padding-bottom: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <span style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: bold;">سعر المنتج : </span>
                                    <span style="margin: 0;">{{\App\Product::find($product->product_id)->price}}</span>
                                </td>
                                </tr> 

                                <tr>
                                <td style="text-align: right;padding-right: 40px; padding-bottom: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <span style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: bold;">الكمية المطلوبة : </span>
                                    <span style="margin: 0;">{{$product->quantity}}</span>
                                </td>
                                </tr> 

                               <tr>
                                <td style="text-align: right;padding-right: 40px; padding-bottom: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <span style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: bold;"> </span>
                                    <span style="margin: 0;"> </span>
                                </td>
                                </tr>  
                            
                            @endforeach
                            </tr>


                        </table>
                    </td>
                </tr>
                <!-- 1 Column Text + Button : END -->

                <!-- 2 Even Columns : BEGIN -->
                
                <!-- Two Even Columns : END -->

                <!-- Clear Spacer : BEGIN -->
                <tr>
                    <td aria-hidden="true" height="40" style="font-size: 0; line-height: 0;">
                        &nbsp;
                    </td>
                </tr>
                <!-- Clear Spacer : END -->

              
            </table>
            <!-- Email Body : END -->

            <!-- Email Footer : BEGIN -->
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px; font-family: sans-serif; color: #888888; font-size: 12px; line-height: 140%;">
               
            </table>
            <!-- Email Footer : END -->

            <!--[if mso]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </div>

        <!-- Full Bleed Background Section : BEGIN -->
        <table role="presentation" bgcolor="#709f2b" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
            <tr>
                <td valign="top" align="center">
                    <div style="max-width: 600px; margin: auto;" class="email-container">
                        <!--[if mso]>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" align="center">
                        <tr>
                        <td>
                        <![endif]-->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="padding: 40px; text-align: center; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #ffffff;">
                                    <p style="margin: 0;">This message is automatic from the site TAT of our contact section, please reply to the email owner, in accordance with your policy</p>
                                </td>
                            </tr>
                        </table>
                        <!--[if mso]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                    </div>
                </td>
            </tr>
        </table>
        <!-- Full Bleed Background Section : END -->

    </center>
</body>
</html>