<?php

use components\helper\PricingHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\site\frontend\models\EcommercePackageMode;

/* @var $this yii\web\View */
/* @var $MonthlyPlan app\modules\site\frontend\models\PlanModel */
/* @var $YearlyPlan app\modules\site\frontend\models\PlanModel */
/* @var $MonthlyPackages app\modules\site\frontend\models\InventoryPackageModel */
/* @var $YearlyPackages app\modules\site\frontend\models\InventoryPackageModel */
/* @var $country string */
/* @var $countryShortCode string */
/* @var $currencyName string */
/* @var $currencyCode string */
/* @var $currencySymbol string */


//$this->title = "Inventory Pricing - My Asalta";
//$this->registerCssFile(Yii::$app->urlManager->createAbsoluteUrl("css/inventory_pricing.css"));
//$this->registerJsFile(Yii::$app->urlManager->createAbsoluteUrl("js/pricing.js"), ['depends' => [\yii\web\JqueryAsset::className()], 'position' => \yii\web\View::POS_END]);

$this->registerCss("
   .monthlyPlanInput, .price-value-monthly{
        display:none;
    }
    .pricingTable.disabled{
        opacity:0.5;
    }
    @media only screen and (min-width: 1200px) {
        .col_md_sm_2_5{
           width:22%; 
        }
    }
    .eCommerce_expert_ul{
        border: 1px solid #b31b1d; 
        background-color:#fafafa;
    }
    .eCommerce_expert_ul li{
        font-size: 14px;
        text-align: left;
        padding: 10px 0 10px 15px;
        font-family: Raleway,Helvetica Neue,Helvetica,Arial,sans-serif;
        list-style: none;
    }
    .eCommerce_p_text{
        font-size: 14px;
        text-align: center;
        padding: 15px 0 25px 0px;
        font-family: Raleway,Helvetica Neue,Helvetica,Arial,sans-serif;
    }
    .eCommerce_expert_setup{
        padding-top:30px;
        font-size:25px;
        font-weight: 900;
    }
    .eCommerce_store_products{
        padding-top:15px;
        font-size:25px;

    }
    @media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 2){
       .table-scroll th, .table-scroll td {
            padding: 8px 13px !important;
        }  
    }
    @media screen and (device-width: 320px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 3){
       .table-scroll th, .table-scroll td {
            padding: 8px 20px !important;
        }
  
    }
    @media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 4){
         .table-scroll th, .table-scroll td {
            padding: 8px 20px !important;
        } 
    }
    @media only screen and (min-device-width: 320px) and (max-device-width: 568px) and (-webkit-min-device-pixel-ratio: 2) {
        .table-scroll th, .table-scroll td {
        padding:8px 20px !important;
        }
    }
    @media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) { 
        .table-scroll th, .table-scroll td {
        padding:8px 13px !important;
        }
    }
    @media only screen and (min-device-width: 414px) and (max-device-width: 736px) and (-webkit-min-device-pixel-ratio: 3) { 
        .table-scroll th, .table-scroll td {
        padding: 8px 18px !important;
        } 
    }
    .table-scroll {
        position:relative;
        max-width:90%;
        margin:auto;
        overflow:hidden;
        border:1px solid #ddd;
    }
    .table-wrap {
        width:100%;
        overflow:auto;
    }
    .table-scroll table {
        width:100%;
        margin:auto;
        border-spacing:0;
    }
    .table-scroll th, .table-scroll td {
        padding:8px 17px;
        border:1px solid #ddd;
        background:#fff;
        vertical-align:top;
        text-align:center;
    }
    .table-scroll thead, .table-scroll tfoot {
        background:#f9f9f9;
    }
     .strikethrough{
        color:#a9a9a9 !important;
    }
    .strikethrough_monthly{
        color:#a9a9a9 !important; 
    }
    .clone {
        position:absolute;
        top:0;
        left:0;
        pointer-events:none;
    }
    .clone th, .clone td {
        visibility:hidden
    }
    .clone td, .clone th {
        border-color:transparent
    }
    .clone tbody th {
        visibility:visible;
        color:#000;
    }
    .clone .fixed-side {
        border:1px solid #ddd;
        background:#eee;
        visibility:visible;
    }
     table{
        border:1px solid #ddd;
    }
    .clone thead, .clone tfoot{background:transparent;}
");
//$CurrentPackage = Yii::$app->MyAsaltaComponent->getIMSPOSSubscribedPackageDetails();
?>
<div class="wrapper" style="background-color: #fff;">
    <div class="row">
        &nbsp;
    </div>
    <?php $form = ActiveForm::begin(['options' => ['role'=> "form"],]); ?>
    <section class="">
        <div class="panel-body">
            <div class="row pricingSection">
                <div class="col-md-12">
                    <?php
                    $rows = 0;
                    ?>
                    <div class="row">
                        <div class="planTypes">
                            <label class="annuallyLabel">
                                <span class="pricing-label-Annually">Annually <br>SAVE up to 30% </span>
                            </label>
                            <label class="switch">
                                <input type="checkbox" id="yearly_monthly_switch" data-plan-id="<?= $YearlyPlan->planid ?>">
                                <span class="slider round"></span>
                            </label>
                            <label class="monthlyLabel">
                                <span class="pricing-label-monthly">Monthly</span>
                            </label>
                            <input id="plan_id" type="hidden" name="plan_id" value="<?= $YearlyPlan->planid ?>"/>
                        </div>
                        <!--<div class="col-sm-6 twelve_monthly-plan" id="mbutt_1"
                             style="padding-bottom: 2%; padding-top: 14px;text-align: right;">
                            <button id="twelve_monthly-plan" style="width:41%;" type="button"
                                    class="pricebutton pricebutton_act btn-text-1"
                                    data-plan-id="<?/*= $YearlyPlan->planid */?>">
                                Annual <br>
                                <?php /*if ($country == 'Global') { */?>
                                    <span class="button-text-1" data-plan-id="10">SAVE up to 30% </span>
                                <?php /*} else { */?>
                                    <span class="button-text-1" data-plan-id="10">SAVE up to 30% </span>
                                <?php /*} */?>
                            </button>
                        </div>
                        <div class="col-sm-6 monthly-plan" id="mbutt" style="padding-bottom: 2%; padding-top: 14px;">
                            <button id="monthly-plan" style="width:41%; " type="button" class="pricebutton  btn-text-2"
                                    data-plan-id="<?/*= $MonthlyPlan->planid */?>">
                                Monthly <br> <span class="button-text-2">pay as you use</span></button>
                            <input type="hidden" name="plan_id" value="<?/*= $YearlyPlan->planid */?>"/>
                        </div>-->
                    </div>
                    <div class=" crm_pricing_restable crm_pricing_plan">
                        <div class="row">
                            <?php
                            if (isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows] && false) {
                                ?>
                                <div class="col-md-2 col-sm-6 inven_pricing_table_div col_md_sm_2_5">
                                    <div class="pricingTable ">
                                        <div class="pricingTable-header"><h3>Start Up</h3>
                                        </div>
                                        <div class="price-value">
                                            <span>FREE Forever</span>
                                            <span class="subtitle" style="padding: 10px 0px 0px">per month</span>
                                            <span class="subtitle">billed annually</span>
                                        </div>
                                        <div>
                                            <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=ecommerce") ?>"
                                               class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                        <div class="pricingContent">
                                            <ul class="monthlyPlanInput">
                                                <li>Asalta Subdomain (yourbrand.Asalta.com)</li>
                                                <li>No branded domain</li>
                                                <li>Powered by Asalta Branding</li>
                                                <?php
                                                /*<li><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0) ? $MonthlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                                <li><?= ($MonthlyPackages[$rows]->numof_integration == 0) ? " - " : (($MonthlyPackages[$rows]->numof_integration > 0) ? $MonthlyPackages[$rows]->numof_integration . " Integrations" : " Multiple Integrations ") ?></li>
                                                <li><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items) . " SKU" : " Multiple SKU ") ?></li>
                                                <li><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0) ? $MonthlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                                <li data-original-title="Sales revenue for 12 months. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption."
                                                    data-container="body" data-toggle="tooltip" data-placement="top"
                                                    title="">Online Sales revenue = $50,000
                                                </li>*/
                                                ?>
                                                <li><?= ($MonthlyPackages[$rows]->numof_integration == 0) ? " - " : (($MonthlyPackages[$rows]->numof_integration > 0) ? $MonthlyPackages[$rows]->numof_integration . " Integrations" : " Multiple Integrations ") ?></li>
                                                <?php
                                                /*<li><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0) ? $MonthlyPackages[$rows]->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li>*/
                                                ?>
                                            </ul>
                                            <ul class="yearlyPlanInput">
                                                <li>Asalta Subdomain (yourbrand.Asalta.com)</li>
                                                <li>No branded domain</li>
                                                <li>Powered by Asalta Branding</li>
                                                <?php
                                                /*<li><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items) . " SKU" : " Multiple SKU ") ?></li>
                                                <li><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0) ? $YearlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                                <li data-original-title="Sales revenue for 12 months. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption."
                                                    data-container="body" data-toggle="tooltip" data-placement="top"
                                                    title="">Online Sales revenue = $50,000
                                                </li>*/
                                                ?>
                                                <li><?= ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0) ? $YearlyPackages[$rows]->numof_integration . " Integrations" : " Multiple Integrations ") ?></li>
                                                <?php
                                                /*<li><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li>*/
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $rows++;
                            } else {
                                echo "<div class='col-md-2'></div>";
                                (count($MonthlyPackages) == 4) ? $rows++ : false;
                            }
                            if (isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]) {
                                ?>
                                <div class="col-md-2 col-sm-6 inven_pricing_table_div col_md_sm_2_5 ">
                                    <div class="pricingTable ">
                                        <div class="pricingTable-header"><h3>Small</h3>
                                        </div>
                                        <div class="price-value price-value-monthly">
                                            <?= PricingHelper::getMonthlyPricingText($MonthlyPackages[$rows], $country, $currencySymbol) ?>
                                            <span class="subtitle">per month</span>
                                            <span class="subtitle">billed monthly</span><br>
                                        </div>
                                        <div class="price-value price-value-yearly">
                                            <?= PricingHelper::getYearlyPricingText($YearlyPackages[$rows], $country, $currencySymbol) ?>
                                            <span class="subtitle">per month</span>
                                            <span class="subtitle">billed annually</span><br>
                                        </div>
                                        <div class="price-value-monthly">
                                            <?= Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode . "/payment"), [
                                                'data' => [
                                                    'method' => 'post',
                                                    'params' => [
                                                        'id' => $MonthlyPackages[$rows]->ecommerce_packageid,
                                                        'product' => 'ecommerce',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div class="price-value-yearly">
                                            <?= Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode . "/payment"), [
                                                'data' => [
                                                    'method' => 'post',
                                                    'params' => [
                                                        'id' => $YearlyPackages[$rows]->ecommerce_packageid,
                                                        'product' => 'ecommerce',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div>
                                            <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=ecommerce") ?>"
                                               class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                        <div class="pricingContent">
                                            <ul class="monthlyPlanInput">
                                                <li>Asalta Subdomain (yourbrand.Asalta.com)</li>
                                                <li>No branded domain</li>
                                                <li>Powered by Asalta Branding</li>
                                                <?php
                                                /*<li><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items) . " SKU" : " Multiple SKU ") ?></li>
                                                <li><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0) ? $MonthlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                                <li><?= ($MonthlyPackages[$rows]->numof_online_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_online_order > 0) ? $MonthlyPackages[$rows]->numof_online_order . " Sales Orders / month" : " Multiple Sales Orders ") ?></li>*/
                                                ?>
                                                <?php /*<li data-original-title="Sales revenue for one month. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption."
                                                    data-container="body" data-toggle="tooltip" data-placement="top"
                                                    title="">
                                                    $<?= ($MonthlyPackages[$rows]->online_sales_revenue == 0) ? " - " : (($MonthlyPackages[$rows]->online_sales_revenue > 0) ? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->online_sales_revenue) . " Online Sales revenue" : " Multiple Online Sales revenue ") ?></li>*/ ?>
                                                <li><?= ($MonthlyPackages[$rows]->numof_integration == 0) ? " - " : (($MonthlyPackages[$rows]->numof_integration > 0) ? $MonthlyPackages[$rows]->numof_integration . " Integrations" : " Multiple Integrations ") ?></li>
                                                <?php
                                                /*<li><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0) ? $MonthlyPackages[$rows]->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li>
                                                <li>Promotions</li>
                                                <li>Free Website templates</li>*/
                                                ?>
                                                <!--<div style="background-color: #fff;padding: 10px 0px;">
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                </div>-->
                                            </ul>
                                            <ul class="yearlyPlanInput">
                                                <li>Asalta Subdomain (yourbrand.Asalta.com)</li>
                                                <li>No branded domain</li>
                                                <li>Powered by Asalta Branding</li>
                                                <?php
                                                /*<li><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items) . " SKU" : " Multiple SKU ") ?></li>
                                                <li><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0) ? $YearlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                                <li><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0) ? $YearlyPackages[$rows]->numof_online_order . " Sales Orders / month" : " Multiple Sales Orders ") ?></li>*/
                                                ?>
                                                <?php /*<li data-original-title="Sales revenue for 12 months. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption."
                                                    data-container="body" data-toggle="tooltip" data-placement="top"
                                                    title="">
                                                    $<?= ($YearlyPackages[$rows]->online_sales_revenue == 0) ? " - " : (($YearlyPackages[$rows]->online_sales_revenue > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->online_sales_revenue) . " Online Sales revenue" : " Multiple Online Sales revenue ") ?> </li>*/ ?>
                                                <li><?= ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0) ? $YearlyPackages[$rows]->numof_integration . " Integrations" : " Multiple Integrations ") ?></li>
                                                <?php
                                                /*<li><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li>
                                                <li>Promotions</li>
                                                <li>Free Website templates</li>*/
                                                ?>
                                                <!--<div style="background-color: #fff;padding: 10px 0px;">
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                </div>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $rows++;
                            }
                            if (isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]) {
                                ?>
                                <div class="col-md-2 col-sm-6 inven_pricing_table_div col_md_sm_2_5">
                                    <div class="ribbon_pricing"><span>POPULAR</span></div>
                                    <div class="pricingTable smallbudiness-popular ">
                                        <div class="pricingTable-header"><h3>Medium</h3>
                                        </div>
                                        <div class="price-value price-value-monthly">
                                            <?= PricingHelper::getMonthlyPricingText($MonthlyPackages[$rows], $country, $currencySymbol) ?>
                                            <span class="subtitle">per month</span>
                                            <span class="subtitle">billed monthly</span><br>
                                        </div>
                                        <div class="price-value price-value-yearly">
                                            <?= PricingHelper::getYearlyPricingText($YearlyPackages[$rows], $country, $currencySymbol) ?>
                                            <span class="subtitle">per month</span>
                                            <span class="subtitle">billed annually</span><br>
                                        </div>
                                        <div class="price-value-monthly">
                                            <?= Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode . "/payment"), [
                                                'data' => [
                                                    'method' => 'post',
                                                    'params' => [
                                                        'id' => $MonthlyPackages[$rows]->ecommerce_packageid,
                                                        'product' => 'ecommerce',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div class="price-value-yearly">
                                            <?= Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode . "/payment"), [
                                                'data' => [
                                                    'method' => 'post',
                                                    'params' => [
                                                        'id' => $YearlyPackages[$rows]->ecommerce_packageid,
                                                        'product' => 'ecommerce',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div>
                                            <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=ecommerce") ?>"
                                               class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                        <div class="pricingContent">
                                            <ul class="monthlyPlanInput">
                                                <li>Branded domain</li>
                                                <li>Powered by Asalta Branding</li>
                                                <?php
                                                /*<li><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items) . " SKU" : " Multiple SKU ") ?></li>
                                                <li><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0) ? $MonthlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                                <li><?= ($MonthlyPackages[$rows]->numof_online_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_online_order > 0) ? $MonthlyPackages[$rows]->numof_online_order . " Sales Orders / month" : " Multiple Sales Orders ") ?></li>*/
                                                ?>
                                                <?php /*<li data-original-title="Sales revenue for 12 months. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption."
                                                    data-container="body" data-toggle="tooltip" data-placement="top"
                                                    title="">
                                                    $<?= ($MonthlyPackages[$rows]->online_sales_revenue == 0) ? " - " : (($MonthlyPackages[$rows]->online_sales_revenue > 0) ? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->online_sales_revenue) . " Online Sales revenue" : " Multiple Online Sales revenue ") ?> </li>*/ ?>
                                                <li><?= ($MonthlyPackages[$rows]->numof_integration == 0) ? " - " : (($MonthlyPackages[$rows]->numof_integration > 0) ? $MonthlyPackages[$rows]->numof_integration . " Integrations" : " Multiple Integrations ") ?></li>
                                                <?php
                                                /*<li><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0) ? $MonthlyPackages[$rows]->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li>
                                                <li>Promotions</li>
                                                <li>Free Website templates</li>
                                                <li>Combo / Bundles / Kitting</li>
                                                <li>Multiple Languages</li>
                                                <li>Your own branded domain</li>*/
                                                ?>
                                                <li>&nbsp;</li>
                                            </ul>
                                            <ul class="yearlyPlanInput">
                                                <li>Branded domain</li>
                                                <li>Powered by Asalta Branding</li>
                                                <?php
                                                /*<li><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items) . " SKU" : " Multiple SKU ") ?></li>
                                                <li><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0) ? $YearlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                                <li><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0) ? $YearlyPackages[$rows]->numof_online_order . " Sales Orders / month" : " Multiple Sales Orders ") ?></li>*/
                                                ?>
                                                <?php /*<li data-original-title="Sales revenue for 12 months. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption."
                                                    data-container="body" data-toggle="tooltip" data-placement="top"
                                                    title="">
                                                    $<?= ($YearlyPackages[$rows]->online_sales_revenue == 0) ? " - " : (($YearlyPackages[$rows]->online_sales_revenue > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->online_sales_revenue) . " Online Sales revenue" : " Multiple Online Sales revenue ") ?> </li>*/ ?>
                                                <li><?= ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0) ? $YearlyPackages[$rows]->numof_integration . " Integrations" : " Multiple Integrations ") ?></li>
                                                <?php
                                                /*<li><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li>
                                                <li>Promotions</li>
                                                <li>Free Website templates</li>
                                                <li>Combo / Bundles / Kitting</li>
                                                <li>Multiple Languages</li>
                                                <li>Your own branded domain</li>*/
                                                ?>
                                                <li>&nbsp;</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $rows++;
                            }
                            if (isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]) {
                            ?>
                            <div class="col-md-2 col-sm-6 inven_pricing_table_div col_md_sm_2_5">
                                <div class="pricingTable ">
                                    <div class="pricingTable-header"><h3>Large</h3>

                                        <div class="price-value price-value-monthly">
                                            <?= PricingHelper::getMonthlyPricingText($MonthlyPackages[$rows], $country, $currencySymbol) ?>
                                            <span class="subtitle">per month</span>
                                            <span class="subtitle">billed monthly</span><br>
                                        </div>
                                        <div class="price-value price-value-yearly">
                                            <?= PricingHelper::getYearlyPricingText($YearlyPackages[$rows], $country, $currencySymbol) ?>
                                            <span class="subtitle">per month</span>
                                            <span class="subtitle">billed annually</span><br>
                                        </div>
                                        <div class="price-value-monthly">
                                            <?= Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode . "/payment"), [
                                                'data' => [
                                                    'method' => 'post',
                                                    'params' => [
                                                        'id' => $MonthlyPackages[$rows]->ecommerce_packageid,
                                                        'product' => 'ecommerce',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div class="price-value-yearly">
                                            <?= Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode . "/payment"), [
                                                'data' => [
                                                    'method' => 'post',
                                                    'params' => [
                                                        'id' => $YearlyPackages[$rows]->ecommerce_packageid,
                                                        'product' => 'ecommerce',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div>
                                            <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=ecommerce") ?>"
                                               class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                        <div class="pricingContent">
                                            <ul class="monthlyPlanInput">
                                                <li>Branded domain</li>
                                                <li>No Asalta Branding</li>
                                                <?php
                                                /*<li><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items) . " SKU" : " Multiple SKU ") ?></li>
                                                <li><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0) ? $MonthlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                                <li><?= ($MonthlyPackages[$rows]->numof_online_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_online_order > 0) ? $MonthlyPackages[$rows]->numof_online_order . " Sales Orders / month" : " Multiple Sales Orders ") ?></li>*/
                                                ?>
                                                <?php /*<li data-original-title="Sales revenue for 12 months. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption."
                                                    data-container="body" data-toggle="tooltip" data-placement="top"
                                                    title="">
                                                    $<?= ($MonthlyPackages[$rows]->online_sales_revenue == 0) ? " - " : (($MonthlyPackages[$rows]->online_sales_revenue > 0) ? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->online_sales_revenue) . " Online Sales revenue" : " Multiple Online Sales revenue ") ?> </li>*/ ?>
                                                <li><?= ($MonthlyPackages[$rows]->numof_integration == 0) ? " - " : (($MonthlyPackages[$rows]->numof_integration > 0) ? $MonthlyPackages[$rows]->numof_integration . " Integrations" : " Multiple Integrations ") ?></li>
                                                <?php
                                                /*<li><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0) ? $MonthlyPackages[$rows]->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li>
                                                <li>Promotions</li>
                                                <li>Free Website templates</li>
                                                <li>Combo / Bundles / Kitting</li>
                                                <li>Multiple Languages</li>
                                                <li>Your own branded domain</li>*/
                                                ?>
                                                <li>&nbsp;</li>
                                            </ul>
                                            <ul class="yearlyPlanInput">
                                                <li>Branded domain</li>
                                                <li>No Asalta Branding</li>
                                                <?php
                                                /*<li><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items) . " SKU" : " Multiple SKU ") ?></li>
                                                <li><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0) ? $YearlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                                <li><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0) ? $YearlyPackages[$rows]->numof_online_order . " Sales Orders / month" : " Multiple Sales Orders ") ?></li>*/
                                                ?>
                                                <?php /*<li data-original-title="Sales revenue for 12 months. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption."
                                                    data-container="body" data-toggle="tooltip" data-placement="top"
                                                    title="">
                                                    $<?= ($YearlyPackages[$rows]->online_sales_revenue == 0) ? " - " : (($YearlyPackages[$rows]->online_sales_revenue > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->online_sales_revenue) . " Online Sales revenue" : " Multiple Online Sales revenue ") ?> </li>*/ ?>
                                                <li><?= ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0) ? $YearlyPackages[$rows]->numof_integration . " Integrations" : " Multiple Integrations ") ?></li>
                                                <?php
                                                /*<li><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li>
                                                <li>Promotions</li>
                                                <li>Free Website templates</li>
                                                <li>Combo / Bundles / Kitting</li>
                                                <li>Multiple Languages</li>
                                                <li>Your own branded domain</li>*/
                                                ?>
                                                <li>&nbsp;</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-offset-1" style="padding: 20px 9%">
                            <p class="pricing_text_scale"> All Prices in <?= $currencyCode ?></p><br>
                        </div>
                    </div>
                </div>
                <div class="buttons"style="text-align: center;padding-bottom:40px;"><a class="hrm_enter_btn hrm_blue_btn" href="#eCommerce_compareplane" id="hrm_comberplane">Compare Plans</a></div>
                <div class="col-sm-12 crm_plans_for_businesses">
                    <div class="row" style="">
                        <div class="inventory_pricing_table_div"><h2 class="require_more_business">
                                Plans for businesses that require more
                            </h2></div>
                        <div class="row ">
                            <div class="col-sm-12 col-md-offset-1">
                                <div class="col-md-5 col-sm-5">
                                    <div><a href="<?= $this->publicHtml; ?>/signup?product=ecom-on-premises"><img
                                                src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-clouds-text.png"
                                                class="priceing_image_en" alt="Inventory Management Software"></a></div>
                                    <div>
                                        <h4 class="entpricing_text_h">Need On Premises or Private Cloud</h4> <h4
                                            class="entpricing_text_h" style="padding: 0 0px;">Setup for your
                                            business?</h4>

                                        <div class="buttons" style="text-align: center;padding: 18px 0 0px 0px;">
                                            <a class="enter_btn  blue_btn"
                                               href="<?= $this->publicHtml; ?>/signup?product=ecom-on-premises">CONTACT
                                                SALES TEAM</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <div><a href="<?= $this->publicHtml; ?>/signup?product='ecom-tailormade"><img
                                                src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta_tailor.png"
                                                class="priceing_image_eng" alt="Inventory Management Software"></a>
                                    </div>
                                    <div>
                                        <h4 class="entpricing_text_h">Need Tailormade plan for your business?</h4>

                                        <p class="entpricing_text_para">Get our custom made Enterprice plan to manage
                                            more and<br> more orders for bigger businesses!</p>

                                        <div class="buttons" style="text-align: center;">
                                            <a class="enter_btn  blue_btn"
                                               href="<?= $this->publicHtml; ?>/signup?product='ecom-tailormade">CONTACT
                                                SALES TEAM</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container table-responsive">
                    <div class="row ">
                        <h2 class="pricingpage-heading-3" style="padding-top:2%">Additional charge for online sales</h2>
                        <div class="col-md-12 prising_tanle_ecommerce_div">
                            <div class="col-md-3"></div>
                            <div class="col-sm-6">   
                                <p class="pricingpage_ptag" >Calculated on a trailing 12-month basis</p>                         
                                <table class="table table-bordered" style="border: 1px solid #ddd;">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>From 250K Upto 500K</td>
                                            <td>$12 for every $10,000</td>
                                        </tr>
                                        <tr>
                                            <td>From 250K Upto 1M</td>
                                            <td>$5 for every $10,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div id="eCommerce-add-on" class="eCommerce_addons">
                        <div class=""><h2 class="pricingpage-heading-3" style="padding-top:2%">eCommerce Add-On</h2>

                            <p class="eCommerce_p_text" style="text-align: center;">We'll do all the power lifting for
                                you, while you do the best things you love the most.</p>
                        </div>
                        <div class="eCommerce_expert">
                            <p class="eCommerce_expert_setup">Hire an Asalta eCommerce expert, to setup your eCommerce
                                store.</p>
                            <table class="table table-bordered" style="border: 1px solid #ddd;">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-original-title="Setup your eCommerce store with your choice of existing theme. Capped at 1 revision from client"
                                            data-container="body" data-toggle="tooltip" data-placement="top" title="">2
                                            man-days of work @ $999.88
                                        </td>
                                    </tr>
                                    <tr>
                                        <td data-original-title="Setup your eCommerce store with your choice of customised theme, design. Total work done will be capped at 10 days of work effort. with maximum of 2 revisions from client."
                                            data-container="body" data-toggle="tooltip" data-placement="top" title="">10
                                            man-days of work, build a simple customised theme for you @ $2,999.88
                                        </td>
                                    </tr>
                                    <tr>
                                        <td data-original-title="Setup your eCommerce store with your choice of customised theme, design. Total work done will be capped at 30 days of work effort. with maximum of 3 revisions from client."
                                            data-container="body" data-toggle="tooltip" data-placement="top" title="">30
                                            man-days of work, build a customised theme for you @ $7,999.88
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="eCommerce_store_products"><strong>Adding, Uploading of products to your eCommerce
                                    store,</strong> can be purchased in packages:</p>
                            <table class="table table-bordered" style="border: 1px solid #ddd;">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>First 10 products will be added for FREE, with the purchase of any three
                                            eCommerce setup packages.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Upto 50 products @ $200</td>
                                    </tr>
                                    <tr>
                                        <td>Upto 100 products @ $350</td>
                                    </tr>
                                    <tr>
                                        <td>Upto 200 products @ $500</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <p>If you need more you can buy multiples of the above packages</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                <div id="eCommerce_compareplane" >
                    <div class="col-md-12">
                        <P class="hrm_compertable_h_text">Feature Comparison Plans</P>
                    </div>
                    <div class="col-md-12 prising_tanle_div">
                        <div id="table-scroll" class="table-scroll">
                            <div class="table-wrap">
                                <table class="main-table">
                                    <thead>
                                        <tr>
                                            <th class="fixed-side" scope="col" style="text-align:center;border-bottom-width: 1px!important;">Features</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;">Small</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;">Medium</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;">Large</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;">Enterprise</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">No.of Inventory items (SKU)</th>
                                            <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>
                                            <?php
                                                $rows++;
                                                } else {
                                                    (count($MonthlyPackages) == 4) ? $rows++ : false;
                                                }

                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items) . " " : " Multiple  ")  ?></td>
                                            <?php
                                                    $rows++;
                                                }
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items) . " " : " Multiple  ")  ?></td>
                                            <?php
                                                    $rows++;
                                                }
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items) . " " : " Multiple  ")  ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td style="background-color:#dff4f9;text-align:center">Unlimited</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side"  style="background-color:#fafafa">Users</th>
                                            <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>

                                                <?php
                                                    $rows++;
                                                    } else {
                                                        (count($MonthlyPackages) == 4) ? $rows++ : false;
                                                    }

                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_user); ?></td>
                                                <?php
                                                        $rows++;
                                                    }
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_user); ?></td>
                                                <?php
                                                        $rows++;
                                                    }
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_user); ?></td>
                                            <?php
                                                }
                                            ?>
                                            <td style="background-color:#dff4f9;text-align:center">Unlimited</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side"  style="background-color:#fafafa">Number of Integrations</th>
                                            <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>

                                                <?php
                                                    $rows++;
                                                    } else {
                                                        (count($MonthlyPackages) == 4) ? $rows++ : false;
                                                    }

                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_integration); ?></td>
                                                <?php
                                                        $rows++;
                                                    }
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_integration); ?></td>
                                                <?php
                                                        $rows++;
                                                    }
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_integration == "-1" ? "Multiple" : $YearlyPackages[$rows]->numof_integration); ?></td>
                                            <?php
                                                }
                                            ?>
                                            <td style="background-color:#dff4f9;text-align:center">Unlimited</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side"  style="background-color:#fafafa">Warehouse</th>
                                            <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>

                                                <?php
                                                    $rows++;
                                                    } else {
                                                        (count($MonthlyPackages) == 4) ? $rows++ : false;
                                                    }

                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_outlet); ?></td>
                                                <?php
                                                        $rows++;
                                                    }
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_outlet); ?></td>
                                                <?php
                                                        $rows++;
                                                    }
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_outlet); ?></td>
                                            <?php
                                                }
                                            ?>
                                            <td style="background-color:#dff4f9;text-align:center">Unlimited</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;" >Payments</th>
                                            <td style="text-align:center;">Yes</td>
                                            <td style="text-align:center;">Yes</td>
                                            <td style="text-align:center;">Yes</td>
                                            <td style="background-color:#dff4f9;text-align:center">Yes</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;" >Support Offering</th>
                                            <td data-original-title="Get in touch with our super awesome support team 24 hours a day, 7 days a week" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">24/7 Email</td>
                                            <td data-original-title="Get in touch with our super awesome support team 24 hours a day, 7 days a week" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">24/7 Email</td>
                                            <td data-original-title="Get in touch with our super awesome support team 24 hours a day, 7 days a week" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">24/7 Email</td>
                                            <td style="background-color:#dff4f9;text-align:center">24/7 Email and Phone</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>               
                <div class="container">
                    <div class="col-md-12">
                        <div class="asalta-faq" id="frequently_asked_questions">
                            <h3>Frequently asked questions</h3>
                        </div>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default" style="border-top: 1px solid #ddd !important">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                   aria-expanded="true">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            How long do I get to try Asalta eCommerce?
                                        </h4>
                                    </div>
                                </a>

                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>You can sign up and try Asalta eCommerce for its full capability for 14 days
                                            after which, you can to subscribe to a suitable pricing plan that fits your
                                            business needs.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                   aria-expanded="false">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            Can I extend my 14-day free trial period?
                                        </h4>
                                    </div>
                                </a>

                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>If you think 14 days are not enough to fully explore the system, we’re more
                                            than happy to extend your trial. Once your trial expires, contact our sales
                                            team by emailing them at <a
                                                href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/support") ?>">
                                                support@asalta.com</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                                   aria-expanded="false">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            Can I sign up for Asalta Enterprise?
                                        </h4>
                                    </div>
                                </a>

                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Asalta Inventory is cloud-based inventory management software with complex
                                            automation, high security, and 24/7 support. To get started with Asalta
                                            eCommerce Enterprise Package, Contact Sales send us an email at <a
                                                href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/support") ?>">
                                                support@asalta.com</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"
                                   aria-expanded="false">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            Can I cancel my subscription?
                                        </h4>
                                    </div>
                                </a>

                                <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Absolutely, while we’d hate to see you go, you can cancel the subscription at
                                            anytime.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"
                                   aria-expanded="false">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            Is my data secure with Asalta eCommerce?
                                        </h4>
                                    </div>
                                </a>

                                <div id="collapseFive" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>100%. All your data is completely secure and we protect your account with
                                            high level of security in place. Our technical team constantly run security
                                            vulnerability scans and tests to make sure everything is safe and
                                            secure.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"
                                   aria-expanded="false">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            What time is your support open?
                                        </h4>
                                    </div>
                                </a>

                                <div id="collapseSix" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Asalta offers support 12 hours a day.<br>
                                            Support availability:<br>
                                            Monday - Friday:<br>
                                        <?php if ($country == 'Singapore') { ?>
                                            Singapore Time Zone (SGT) 9:30AM to 9:30PM<br>
                                        <?php } if ($country == 'Global') { ?>
                                            Greenwich Mean Time (GMT) 1:30AM to 1:30PM<br>
                                        <?php } if ($country == 'India') { ?>
                                            Indian Standard Time (IST) 7:00AM to 7:00PM<br>
                                        <?php } ?>
                                            CLOSED on Weekends & Public Holidays.<br>
                                            Support is provided via email and support ticket.
                                        </p>
                                        <p>For any queries, feel free to get in touch with us anytime. We’d love to hear from you! Contact support at <a
                                                href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/support") ?>">
                                                support@asalta.com</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven"
                                   aria-expanded="false">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            Is there a way to get the current status of my business at a glance?
                                        </h4>
                                    </div>
                                </a>

                                <div id="collapseSeven" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Get the complete overview of your organization at a glance with our Asalta
                                            smart dashboard that gives you the synopsis of your items, sales and
                                            purchases. To further aid you with getting the bigger picture, most of the
                                            numerical data displayed in the dashboard is hot-wired with the associated
                                            module.<a href="#"> Check it out here.</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight"
                                   aria-expanded="false">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            What are the different pricing plans?
                                        </h4>
                                    </div>
                                </a>

                                <div id="collapseEight" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Each industry has its own needs and the volume of their needs is directly
                                            proportional to the scale of their business. To cater to your specific
                                            needs, we have an array of pricing plans. No hidden costs! No strings
                                            attached! You can take a look at our pricing plans by clicking on this <a
                                                href="#"> Check it out here.</a></p>

                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine"
                                   aria-expanded="false">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            How is stock tracking done in Asalta eCommerce?
                                        </h4>
                                    </div>
                                </a>

                                <div id="collapseNine" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Physical Stock: In this mode, your stock will increase when a Purchase
                                            Receive is made, and the stock will decrease when an Invoice is made to the
                                            customer.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTen"
                                   aria-expanded="false">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            Will I get the same discount every time?
                                        </h4>
                                    </div>
                                </a>

                                <div id="collapseTen" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>No. Your discount is applied only for one time purchase. If you choose to
                                            upgrade or downgrade your account you will not be eligible for anymore
                                            further discounts.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven"
                                   aria-expanded="false">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            When I have eCommerce signup and I purchase POS Newly what will be my user
                                            limits?
                                        </h4>
                                    </div>
                                </a>

                                <div id="collapseEleven" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>We won’t merge the user counts and warehouse and Order counts the highest
                                            limits will be taken in the count and will be upgraded for the new purchase
                                            made.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve"
                                   aria-expanded="false">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            How often can i change my eCommerce Theme?
                                        </h4>
                                    </div>
                                </a>

                                <div id="collapseTwelve" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Theme can be changed when ever required by you.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThirteen"
                                   aria-expanded="false">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            When I have purchased N as Revenue plan and the revenue limit exits what
                                            happen?
                                        </h4>
                                    </div>
                                </a>

                                <div id="collapseThirteen" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>The plan will be automatically updated to the higher plan. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <?php ActiveForm::end();  ?>
</div>
<?php
$this->registerJs("
jQuery(document).ready(function() {
     $('.main-table').clone(true).appendTo('#table-scroll').addClass('clone'); 
     $('.add_on-table').clone(true).appendTo('#add_on_table-scroll').addClass('clone');
 });
");
