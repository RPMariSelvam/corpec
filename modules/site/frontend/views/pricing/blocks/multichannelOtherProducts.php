<?php

use app\models\CommonModel;
use app\modules\site\frontend\models\HrmPackageModel;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $InvPackageName String */

/* @var $currencySymbol string */
/* @var $currencyCode string */
if($currencyCode == "IDR"){
    $this->registerCss('
        a.sublink {
            font-size: 15px;
            padding-right:0px;
        }
        small.subitem_price{
            font-weight: normal;
            font-size: 0.75em;
        }
    ');
}

?><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="FeaturesContent monthlyPlanInput">
    <div class="panel panel-default" style="border-top: 1px solid #ddd !important">
        <div class="panel-heading">

            <!--<input type="checkbox" class="< ?= $InvPackageName ?> inventoryItem" data-packagename='< ?= $InvPackageName ?>' id="inventory_enabled_disabled_switch" checked disabled style="opacity: 0; position: absolute;left:9999px;">
            <label class="switch">
                <span class="slider round" data-original-title="Integrations (enabled/disabled)" data-container="body" data-toggle="tooltip" data-placement="top" title=""></span>
            </label>-->
            <a href="javascript:void(0);">
                <!--#collapse_F_One-->
                <h4 class="panel-title">
                    Productivity Features
                </h4>
            </a>
        </div>
        <div id="collapse_F_One" class="panel-collapse collapse in collapse_F_One">
            <div class="panel-body">
                <ul>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Contact</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Leads</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Documents</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Calendar / Reminders</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Invoice</li>

                    <li><span class="green-tick glyphicon glyphicon-ok"></span> eSignature</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Enquiry Chat</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Email Box</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Invoicing</li>
                    <li style="display: none;"><span class="green-tick glyphicon glyphicon-ok"></span> Smart Emailer</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Workflow</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Pipeline</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> ToDo</li>

                </ul>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">

            <a href="#collapse_F_Three">
                <h4 class="panel-title">
                    Integrations
                </h4>
            </a>
        </div>
        <div class="panel-collapse collapse_F_Three">
            <div class="panel-body">
                <ul>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> XERO</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Quickbooks</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-windows" aria-hidden="true"></i>
                        MicroSoft ONE Drive</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-google" aria-hidden="true"></i>
                        Google Drive</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-dropbox" aria-hidden="true"></i>
                        DropBox</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-cc-stripe" aria-hidden="true"></i>
                        Stripe</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-paypal" aria-hidden="true"></i>
                        Paypal</li>

                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default" style="display: none;">
        <div class="panel-heading">

            <a href="#collapse_F_Three">
                <h4 class="panel-title">
                    Social Media Scheduler (AI)
                </h4>
            </a>
        </div>
        <div class="panel-collapse collapse_F_Three">
            <div class="panel-body">
                <ul>

                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-facebook-f fa-1x" style="color: #3b5998;"></i>
                        Facebook</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-instagram fa-1x" style="color: #ac2bac;"></i>
                        Instagram</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-twitter fa-1x" style="color: #55acee;"></i>
                        Twitter (X)</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-music fa-1x" style="color: #333333;"></i>
                        TikTok</li>

                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default" style="display: none;">
        <div class="panel-heading">

            <a href="#collapse_F_Three">
                <h4 class="panel-title">
                    Omnichannel Chat
                </h4>
            </a>
        </div>
        <div class="panel-collapse collapse_F_Three">
            <div class="panel-body">
                <ul>

                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-whatsapp fa-1x" style="color: #25d366;"></i>
                        WhatsApp</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-instagram fa-1x" style="color: #ac2bac;"></i> Instagram</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-facebook-f fa-1x" style="color: #3b5998;"></i>
                        Fb Messenger</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-telegram fa-1x" style="color: #0082ca"></i> Telegram</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-weixin fa-1x" style="color: #0082ca"></i>
                        WeChat</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-google fa-1x" style="color: #dd4b39;"></i>
                        Google Business Messanger</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-comment-o fa-1x" style="color: #25d366;"></i>
                        SMS</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-phone-square fa-1x" style="color: #ac2bac"></i>
                        Viber</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="FeaturesContent yearlyPlanInput">
    <div class="panel panel-default" style="border-top: 1px solid #ddd !important">
        <div class="panel-heading">

            <!--<input type="checkbox" class="< ?= $InvPackageName ?> inventoryItem" data-packagename='< ?= $InvPackageName ?>' id="inventory_enabled_disabled_switch" checked disabled style="opacity: 0; position: absolute;left:9999px;">
            <label class="switch">
                <span class="slider round" data-original-title="Integrations (enabled/disabled)" data-container="body" data-toggle="tooltip" data-placement="top" title=""></span>
            </label>-->
            <a href="javascript:void(0);">
                <!--#collapse_F_One-->
                <h4 class="panel-title">
                    Productivity Features
                </h4>
            </a>
        </div>
        <div id="collapse_F_One" class="panel-collapse collapse in collapse_F_One">
            <div class="panel-body">
                <ul>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Contact</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Leads</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Documents</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Calendar / Reminders</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Invoice</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> eSignature</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Enquiry Chat</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Email Box</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Invoicing</li>
                    <li style="display: none;"><span class="green-tick glyphicon glyphicon-ok"></span> Smart Emailer</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Workflow</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Pipeline</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> ToDo</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> 1000 GB Storage</li>

                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">

            <a href="#collapse_F_Three">
                <h4 class="panel-title">
                    Integrations
                </h4>
            </a>
        </div>
        <div class="panel-collapse collapse_F_Three">
            <div class="panel-body">
                <ul>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> XERO</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> Quickbooks</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-windows" aria-hidden="true"></i>
                        MicroSoft ONE Drive</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-google" aria-hidden="true"></i>
                        Google Drive</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-dropbox" aria-hidden="true"></i>
                        DropBox</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-cc-stripe" aria-hidden="true"></i>
                         Stripe</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-paypal" aria-hidden="true"></i>
                         Paypal</li>

                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default" style="display: none;">
        <div class="panel-heading">

            <a href="#collapse_F_Three">
                <h4 class="panel-title">
                    Social Media Scheduler (AI)
                </h4>
            </a>
        </div>
        <div class="panel-collapse collapse_F_Three">
            <div class="panel-body">
                <ul>

                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-facebook-f fa-1x" style="color: #3b5998;"></i>
                         Facebook</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-instagram fa-1x" style="color: #ac2bac;"></i>
                        Instagram</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-twitter fa-1x" style="color: #55acee;"></i>
                        Twitter (X)</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-music fa-1x" style="color: #333333;"></i>
                        TikTok</li>

                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default" style="display: none;">
        <div class="panel-heading">

            <a href="#collapse_F_Three">
                <h4 class="panel-title">
                    Omnichannel Chat
                </h4>
            </a>
        </div>
        <div class="panel-collapse collapse_F_Three">
            <div class="panel-body">
                <ul>

                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-whatsapp fa-1x" style="color: #25d366;"></i>
                        WhatsApp</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-instagram fa-1x" style="color: #ac2bac;"></i> Instagram</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-facebook-f fa-1x" style="color: #3b5998;"></i>
                        Fb Messenger</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-telegram fa-1x" style="color: #0082ca"></i> Telegram</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-weixin fa-1x" style="color: #0082ca"></i>
                        WeChat</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-google fa-1x" style="color: #dd4b39;"></i>
                        Google Business Messanger</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-comment-o fa-1x" style="color: #25d366;"></i>
                        SMS</li>
                    <li><span class="green-tick glyphicon glyphicon-ok"></span> <i class="fa fa-phone-square fa-1x" style="color: #ac2bac"></i>
                        Viber</li>
                </ul>
            </div>
        </div>
    </div>

</div>