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