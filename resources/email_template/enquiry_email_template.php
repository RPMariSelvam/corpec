<?php
use luya\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
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
                                                                    Hello Sales Team,
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="top">
                                                                <p style="margin-left: 20px;">
                                                                    You have received an enquiry for Asalta - An End-to-End Business Automation Software from URL: <?=Url::base(true) ?>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="top">
                                                                <p style="margin-left: 20px;">
                                                                Kindly find the customer details,
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="top">
                                                                <p style="margin-left: 20px;">
                                                                    <strong>
                                                                        <?php echo $enquiryTitle; ?>
                                                                    </strong>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-bottom:20px" valign="top">
                                                                <p neue",helvetica,arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding-top:0;margin-top:0;text-align:left"="" open="" sans","helvetica="" style="color:#606060;font-family:">
                                                                    <strong>
                                                                    </strong>
                                                                </p>

                                                                <p style="margin-left: 20px;">
                                                                    <strong>Name :</strong> <?= ($firstname) ? $firstname.' '.$lastname : '' ?> <br/>
                                                                    <strong>Email :</strong> <?= ($email) ? $email : '' ?> <br/>
                                                                    <strong>Mobile :</strong> <?= ($phone) ? $country_code.' '.$phone : '' ?> <br/>
                                                                    <strong>Company Name :</strong> <?= ($company_name) ? $company_name : '' ?> <br/>
                                                                    <strong>Industry :</strong> <?= ($industry_type) ? $industry_type : '' ?> <br/>
                                                                    <strong>Country :</strong> <?= ($country) ? $country : '' ?> <br/><br/>
                                                                    <?= ($description) ? $description : '' ?>
                                                                </p>
                                                                <p></p>
                                                                <ul><?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI']; ?>
                                                                    <li>This message is sent from URL: <?= $actual_link ?></li>
                                                                    <li>IP : <a href="https://whatismyipaddress.com/ip/<?= $ipaddress ?>"><?= $ipaddress ?></a> </li>
                                                                    <li>Platform : <?= ($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '' ?></li>
                                                                    <li>Device location : <?= ($current_city) ? $current_city.', '. $current_state: '' ?></li>
                                                                    <li>Time : <?=date("d-m-Y H:i:s")?></li>
                                                                </ul>
                                                                <p style="margin-left: 20px;">
                                                                </p>
                                                                <p style="margin-left: 20px;">
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