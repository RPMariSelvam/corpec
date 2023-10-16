<?php
use app\models\CommonModel;
use yii\helpers\Html;

/** @var string $name */
/** @var string $email */
/** @var string $amount */
/** @var string $currency_symbol */
/** @var string $product */
/** @var string $timezone */

$this->title = 'Thank You';

$this->registerCss('
.thankYouMessage svg {
    width: 100%;
    display: block;
}
.thankYouMessage .success{
    color: #17881b
}
.path {
    stroke-dasharray: 1000;
    stroke-dashoffset: 0;
}
.path.circle {
    -webkit-animation: dash 0.9s ease-in-out;
    animation: dash 0.9s ease-in-out;
}
.path.line {
    stroke-dashoffset: 1000;
    -webkit-animation: dash 0.9s 0.35s ease-in-out forwards;
    animation: dash 0.9s 0.35s ease-in-out forwards;
}
.path.check {
    stroke-dashoffset: -100;
    -webkit-animation: dash-check 0.9s 0.35s ease-in-out forwards;
    animation: dash-check 0.9s 0.35s ease-in-out forwards;
}
@-webkit-keyframes dash {
    0% {
        stroke-dashoffset: 1000;
    }
    100% {
        stroke-dashoffset: 0;
    }
}
@keyframes dash {
    0% {
        stroke-dashoffset: 1000;
    }
    100% {
        stroke-dashoffset: 0;
    }
}
@-webkit-keyframes dash-check {
    0% {
        stroke-dashoffset: -100;
    }
    100% {
        stroke-dashoffset: 900;
    }
}
@keyframes dash-check {
    0% {
        stroke-dashoffset: -100;
    }
    100% {
        stroke-dashoffset: 900;
    }
}
')
?>
<!--[if lte IE 9]>
<style>
    .path {stroke-dasharray: 0 !important;}
</style>
<![endif]-->

<div class="form-wrapper">
    <div class="panel lock-box">
        <?php
        if(Yii::$app->session->getFlash('error')){
            ?>
            <div class="alert alert-danger">
                <strong><?=Yii::$app->session->getFlash('error')?></strong>
            </div>
        <?php
        }
        ?>
        <div class="container">
            <p class="spacing-block spacing-block--1"><br><br><br><br><br><br></p>
            <div class="row thankYouMessage">
                <div class="col-md-5">
                    <div class="col-md-4 col-sm-2 col-xs-3">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                            <circle class="path circle" fill="none" stroke="#17881b" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                            <polyline class="path check" fill="none" stroke="#17881b" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
                        </svg>
                    </div>
                    <div class="col-md-8 col-sm-10 col-xs-9">&nbsp;</div>
                    <div class="col-md-12">
                        <h1 class="success" style="font-size: 45px;">Thank You!</h1>
                        <h2><strong>Checkout complete</strong></h2>
                    </div>
                </div>
                <div class="col-md-7">
                    <section class="panel panel-default">
                        <div class="panel-heading">
                            <strong>
                                Payment Summary
                            </strong>
                        </div>
                        <div class="panel-body">
                            <strong>
                                Your payment of <?= CommonModel::CurrencyFormat($amount, trim($currency_symbol) . " ") ?> for Asalta <?= ($product == "Retail")? $product." Suite":$product ?> is successful.
                            </strong>
                            <br/><?= date("dS M Y ")."(".$timezone.")"?>
                            <br/><br/>
                            <p>
                                Your Order Confirmation will be emailed to: <a href="mailto:<?= $email ?>"><?= $email ?></a>
                            </p>
                            <p>
                                Your Subscription has started
                            </p>
                            <p>
                                You will receive an email from <a href="mailto:no.reply@AsaltaTechnologies.com">no.reply@AsaltaTechnologies.com</a> with your login credentials and Invoice for your payment shortly
                            </p>
                            <p>
                                If you have any questions contact our <a href="https://www.asalta.com/support" target="_blank">support</a>.
                            </p>
                        </div>
                    </section>
                </div>
            </div>
            <p class="spacing-block spacing-block--1"><br><br><br><br><br><br></p>
        </div>
    </div>
</div>
<?php

if(!empty($product)){
    $package = $product."Package";

    $this->registerJs("
    var orderid = '".$package."';
    var orderValue = '".$amount."';
    var tagdata = {event:'subscription payment success',order_id: 'retailPackage',order_value: 0 };
    tagdata.order_id = orderid ;
    tagdata.order_value = orderValue ;
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push(tagdata)

",$this::POS_READY);
}
?>