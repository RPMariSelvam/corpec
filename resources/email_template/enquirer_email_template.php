<?php
use luya\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST']; ?>

<table align="center" bgcolor="#F2F2F2" border="0" cellpadding="0" cellspacing="0" height="100%" id="export_email_table" width="100%">
    <tbody>
        <tr>
            <td align="center" id="export_email_table_cell" style="padding:10px" valign="top">
                <table align="center" border="0" cellpadding="0" cellspacing="0" style="max-width:640px" width="100%">
                    <tbody>
                        <tr>
                            <td align="center" valign="top">
                                <table align="center" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" style="background-color:#ffffff;border-bottom:2px solid #e5e5e5;border-radius:4px" width="100%">
                                    <tbody>
                                        <tr>
                                            <td align="center" style="padding-right:20px;padding-left:20px" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top">
                                                                <p neue",helvetica,arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding-top:0;margin-top:0;text-align:left"="" open="" sans","helvetica="" style="color:#606060;font-family:">
                                                                    Hi <?= ($firstname) ? $firstname.' '.$lastname : '' ?>,
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="top">
                                                                <p style="margin-left: 20px;">

                                                                    Thank you for your enquiry on  <?= !empty($product) ? "Asalta's" . $product : "Asalta"?>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="top">
                                                                <p style="margin-left: 20px;">

                                                                    This is Arun and I will be assisting you with onboarding to Asalta.
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="top">
                                                                <p style="margin-left: 20px;">

                                                                    Can we schedule a discovery call Via Google Meet at your availability? So, I can understand more about your business and show you a demo of the product. Let me know your availability by choosing your slot here
                                                                    <a href="https://tidycal.com/arunkar" target="_blank">click to appointment </a>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                       <tr>
                                                            <td align="top">
                                                                <p style="margin-left: 20px;">

                                                                    Since you are in a different time zone, if you have a different time, let me know and I will see if I can fit that into my schedule.
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="top">
                                                                <p style="margin-left: 20px;">Have a good day!</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="top">
                                                                <p style="margin-left: 20px;"> Warm Regards  </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="top">
                                                                <p style="margin-left: 20px;font-weight: bold;"> Arun Karthikeyan  </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="top">
                                                                <p style="margin-left: 20px;">

                                                                    Solutions Manager <br/>
                                                                    Asalta Technologies Pte Ltd<br/>
                                                                    M: (+65) 9665 5094 | O:  (+65) 6816 0280 | Support: (+65) 8284 8659  |  Skype: asaltatech<br/>
                                                                    E: <a href="arun@asalta.com" target="_blank">arun@asalta.com </a> / W: <a href="www.asalta.com" target="_blank">www.asalta.com </a><br/>
                                                                    A: 55C Lavender Street, #04-00, Singapore 338713<br/>
                                                                    <img width="200" height="51" src="<?= $actual_link?>/images/AT_Logo_640x165.jpg">
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="top">
                                                                <p style="margin-left: 20px;font-weight: bold;"> <br>CONNECT WITH US!  </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="top">
                                                                <p style="margin-left: 20px;">

                                                                    Facebook: <a href="https://www.facebook.com/Asalta.Technologies?utm_source=arun_email&utm_medium=email&utm_campaign=email_signature" target="_blank"> Asalta.Technologies</a>  |
                                                                    Instagram: <a href="https://www.instagram.com/asaltatech?utm_source=arun_email&utm_medium=email&utm_campaign=email_signature" target="_blank"> asaltatech</a>  |
                                                                    Twitter: <a href="https://twitter.com/AsaltaTech?utm_source=arun_email&utm_medium=email&utm_campaign=email_signature" target="_blank"> @AsaltaTech</a>  |
                                                                    LinkedIn: <a href="https://www.linkedin.com/company/asalta-tech?utm_source=arun_email&utm_medium=email&utm_campaign=email_signature" target="_blank"> asalta-tech </a> |
                                                                    YouTube: <a href="https://www.youtube.com/watch?v=C3aN_J7POYM" target="_blank"> Asalta Retail Suite </a>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="top">
                                                                <p style="margin-left: 20px;">
                                                                    <small>The contents of this email are confidential and/or subject to legal professional privilege. If you are not the intended recipient or if you have received this email in error, please notify us immediately and delete it from your system. Unless it relates to the official business of Asalta Technologies Pte Ltd, any opinion, views and other information expressed in this email is the individual sender's only.</small>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="top">
                                                                <p style="margin-left: 20px;">

                                                                    <img src="<?= $actual_link?>/images/unnamed.png"/><small> Please consider your environmental responsibility. Before printing this e-mail message, ask yourself whether you really need a hard copy.</small>
                                                                </p>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <p>
                                                    <i style="font-size: 12px;margin-left: 20px;color: gray;">

                                                        This is a system generated email. Please do not reply to this email.
                                                    </i>
                                                </p>
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