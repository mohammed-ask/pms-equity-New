<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'main/PHPMailer/src/Exception.php';
require 'main/PHPMailer/src/PHPMailer.php';
require 'main/PHPMailer/src/SMTP.php';

include "main/session.php";
$obj->saveactivity("Customer Approved/Reject", "", $_GET["hakuna"], $_GET["hakuna"], "User", "Customer Approved/Reject");
$id = $_GET['hakuna'];
$email = $obj->selectfieldwhere("users", "email", "id=" . $id . "");
$password = $obj->selectfieldwhere("users", "password", "id=" . $id . "");

if ($_GET['what'] === 'Approve') {
    $xx['status'] = 1;
    $xx["approveon"] = date('Y-m-d H:i:s');
    $xx['approveby'] = $employeeid;
    $obj->update("users", $xx, $id);

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = $host;
    $mail->SMTPAuth = true;
    $mail->Username = "$sendmailfrom";
    $mail->Password = "$sendemailpassword";
    $mail->isSendmail();
    $mail->SMTPSecure = 'ssl';
    $mail->Port = $port;
    $mail->setFrom("$sendmailfrom", 'Eagle Eye Tradings Team');;
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Eagle Eye Tradings account has been approved & Login Id & Password is here';
?>
    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Email Confirmation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
            /**
   * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
   */
            @media screen {
                @font-face {
                    font-family: 'Source Sans Pro';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
                }

                @font-face {
                    font-family: 'Poppins', sans-serif;
                    font-style: normal;
                    font-weight: 700;
                    src: local('Poppins Bold'), local('Poppins-Bold'), url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLCz7Z11lFQ.woff2) format('woff2');
                }
            }

            /**
   * Avoid browser level font resizing.
   * 1. Windows Mobile
   * 2. iOS / OSX
   */
            body,
            table,
            td,
            a {
                -ms-text-size-adjust: 100%;
                /* 1 */
                -webkit-text-size-adjust: 100%;
                /* 2 */
            }

            /**
   * Remove extra space added to tables and cells in Outlook.
   */


            /**
   * Better fluid images in Internet Explorer.
   */
            img {
                -ms-interpolation-mode: bicubic;
            }

            /**
   * Remove blue links for iOS devices.
   */
            a[x-apple-data-detectors] {
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                color: inherit !important;
                text-decoration: none !important;
            }

            /**
   * Fix centering issues in Android 4.4.
   */
            div[style*="margin: 16px 0;"] {
                margin: 0 !important;
            }

            body {
                width: 100% !important;
                height: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            /**
   * Collapse table borders to avoid space between cells.
   */
            table {
                border-collapse: collapse !important;
            }

            a {
                color: #ff6100;
                font-weight: 600;
            }

            img {
                height: auto;
                line-height: 100%;
                text-decoration: none;
                border: 0;
                outline: none;
            }

            p {
                font-family: 'Poppins', sans-serif;
                font-size: 14px !important;
            }
        </style>

    </head>

    <body style="background-color: #e9ecef;">

        <!-- start preheader -->
        <div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
            Welcome to Eagle Eye Tradings- Access Your Account with Your New Login and Password...
        </div>
        <!-- end preheader -->

        <!-- start body -->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 5%; margin-bottom: 5%;">


            <!-- start hero -->
            <tr>
                <td align="center" bgcolor="#e9ecef">
                    <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                            <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
                                <h1 style="margin: 0; font-size: 22px; font-weight: 700; letter-spacing: -1px; line-height: 30px; word-spacing: 2px;">Welcome to Eagle Eye Tradings,</h1><br>
                                <h2 style="margin: 0; font-size: 17px; font-weight: 700; letter-spacing: -1px; word-spacing: 2px;">Your Account has been approved: Your Login ID & Password is here </h2>
                            </td>
                        </tr>
                    </table>
                    <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
                </td>
            </tr>
            <!-- end hero -->

            <!-- start copy block -->
            <tr>
                <td align="center" bgcolor="#e9ecef">
                    <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

                        <!-- start copy -->
                        <tr>
                            <td align="left" bgcolor="#ffffff" style="padding: 24px 24px 5px 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                <p>Congratulations! Your account has been created successfully.</p>
                                <p style="margin: 0;">Welcome to <b>Eagle Eye Tradings!</b> We are excited to have you as a new member of our community.</p>
                                <p>Your login information is given below:
                                    <br><br>
                                    <b>Email:</b><?= $email ?>
                                    <br><b><span style="margin-top: 10px;">Password:</b> <?= $password ?> </span>
                                </p>
                            </td>
                        </tr>
                        <!-- end copy -->

                        <!-- start button -->
                        <tr>
                            <td align="left" bgcolor="#ffffff">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td align="left" bgcolor="#ffffff" style="padding: 12px; margin-left:12px; float:left;">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <p style="margin-top:0;">Click button to login ↓</p>
                                                    <td align="center" bgcolor="#1a82e2" style="border-radius: 6px;">
                                                        <a href="https://www.eagleeyetradings.com/login" style="display: block; padding: 7px 10px; font-family: 'Poppins', Helvetica, Arial, sans-serif; font-size: 14px; color: #ffffff; text-decoration: none; border-radius: 6px; font-weight:bold; letter-spacing:2px; margin:0; background-color: #696cff;">Login</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- end button -->

                        <!-- start copy -->
                        <tr>
                            <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Poppins', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                <p style="margin: 0;">We encourage you to explore our platform and take advantage of all the features we have to offer. If you have any questions or need assistance, our support team is available 24/7 to help at <a href="mailto:support@eagleeyetradings.com">support@eagleeyetradings.com</a>


                                </p>
                                <p>
                                    Thank you for choosing Eagle Eye Tradings. We look forward to helping you achieve your investment goals.
                                </p>
                            </td>
                        </tr>
                        <!-- end copy -->

                        <!-- start copy -->
                        <tr>
                            <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf">
                                <p style="margin: 0;">Best regards,<br>Eagle Eye Team</p><img width="145px" style=" margin-top: 20px;" src="https://eagleeyetradings.com/main/dist/landingassets/img/eagle-eye.svg">
                            </td>
                        </tr>
                        <!-- end copy -->

                    </table>
                    <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
                </td>
            </tr>
            <!-- end copy block -->

    </body>

    </html>
<?php
    $templatedata = ob_get_contents();
    ob_end_clean();
    $mail->Body = $templatedata;
    $mail->send();
} elseif ($_GET['what'] === 'Reject') {
    $yy['status'] = 91;
    $yy["approveon"] = date('Y-m-d H:i:s');
    $yy['approveby'] = $employeeid;
    $obj->update("users", $yy, $id);
}
