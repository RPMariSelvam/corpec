<?php

use components\helper\PricingHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\site\frontend\models\EcommercePackageModel;
use app\modules\site\frontend\models\CrmPackageModel;
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
    @media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 4) {
        .table-scroll th, .table-scroll td {
            padding: 8px 13px !important;
        } 
    }
    @media only screen and (min-device-width: 320px) and (max-device-width: 568px) and (-webkit-min-device-pixel-ratio: 2) {
        .table-scroll th, .table-scroll td {
        padding:8px 30px !important;
        }
    }
    @media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) { 
        .table-scroll th, .table-scroll td {
        padding:8px 15px !important;
        }
    }
    @media only screen and (min-device-width: 414px) and (max-device-width: 736px) and (-webkit-min-device-pixel-ratio: 3) { 
        .table-scroll th, .table-scroll td {
        padding: 8px 23px !important;
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
        padding:8px 20px;
        border:1px solid #ddd;
        background:#fff;
        vertical-align:top;
        text-align:center;
    }
    .table-scroll thead, .table-scroll tfoot {
        background:#f9f9f9;
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
    .strikethrough{
        color:#a9a9a9 !important;
    }
    .strikethrough_monthly{
        color:#a9a9a9 !important; 
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
                        <!--<div class="col-sm-6 twelve_monthly-plan" id="mbutt_1" style="padding-bottom: 2%; padding-top: 14px;text-align: right;">
                            <button id="twelve_monthly-plan" style="width:35%;" type="button" class="pricebutton pricebutton_act btn-text-1" data-plan-id="<?/*= $YearlyPlan->planid */?>">
                                Annual <br>
                                 <?php /*if($country == 'Global'){ */?>
                                    <span class="button-text-1" data-plan-id="10">SAVE up to 30% </span>
                                <?php /*}else { */?>
                                     <span class="button-text-1" data-plan-id="10">SAVE up to 30% </span>
                                 <?php /*} */?>
                            </button>
                        </div>
                        <div class="col-sm-6 monthly-plan" id="mbutt" style="padding-bottom: 2%; padding-top: 14px;">
                            <button id="monthly-plan" style="width:35%; " type="button" class="pricebutton  btn-text-2" data-plan-id="<?/*= $MonthlyPlan->planid */?>">
                                Monthly <br> <span class="button-text-2">pay as you use</span></button>
                            <input type="hidden" name="plan_id" value="<?/*= $YearlyPlan->planid */?>"/>
                        </div>-->
                    </div>
                    <div class=" crm_pricing_restable crm_pricing_plan">
                        <div class="row">
                        <?php
                        if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows] && false) {
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
                                    <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=crm")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                    <div class="pricingContent">
                                        <ul class="monthlyPlanInput">
                                            <li><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0) ? $MonthlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                            <li><?= ($MonthlyPackages[$rows]->numof_integration == 0) ? " - " : (($MonthlyPackages[$rows]->numof_integration > 0) ? $MonthlyPackages[$rows]->numof_integration . " Integrations" : " Multiple Integrations ") ?></li>
                                            <li style="display: none;"><?= ($MonthlyPackages[$rows]->numof_quotes == 0) ? " - " : (($MonthlyPackages[$rows]->numof_quotes > 0) ? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_quotes)  . " Monthly Quotes /  month" : " Multiple Monthly Quotes ") ?></li>
                                            <li style="display: none;"><?= ($MonthlyPackages[$rows]->numof_invoices == 0) ? " - " : (($MonthlyPackages[$rows]->numof_invoices > 0) ? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_invoices)  . " Monthly Invoices /  month" : " Multiple Monthly Invoices ") ?></li>
                                            <li><?= ($MonthlyPackages[$rows]->numof_contact == 0) ? " - " : (($MonthlyPackages[$rows]->numof_contact > 0) ? Yii::$app->formatter->asInteger ($MonthlyPackages[$rows]->numof_contact) . " Contacts" : " Multiple Contacts ") ?></li>
                                        </ul>
                                        <ul class="yearlyPlanInput">
                                            <li><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0) ? $YearlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                            <li><?= ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0) ? $YearlyPackages[$rows]->numof_integration . " Integrations" : " Multiple Integrations ") ?></li>
                                            <li style="display: none;"><?= ($YearlyPackages[$rows]->numof_quotes == 0) ? " - " : (($YearlyPackages[$rows]->numof_quotes > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_quotes)  . " Monthly Quotes /  month" : " Multiple Monthly Quotes ") ?></li>
                                            <li style="display: none;"><?= ($YearlyPackages[$rows]->numof_invoices == 0) ? " - " : (($YearlyPackages[$rows]->numof_invoices > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_invoices)  . " Monthly Invoices /  month" : " Multiple Monthly Invoices ") ?></li>
                                            <li><?= ($YearlyPackages[$rows]->numof_contact == 0) ? " - " : (($YearlyPackages[$rows]->numof_contact > 0) ? Yii::$app->formatter->asInteger ($YearlyPackages[$rows]->numof_contact) . " Contacts" : " Multiple Contacts ") ?></li>
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
                        if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]){
                            ?>
                            <div class="col-md-2 col-sm-6 inven_pricing_table_div col_md_sm_2_5 " >
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
                                        <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/payment"), [
                                            'data' => [
                                                'method' => 'post',
                                                'params' => [
                                                    'id' => $MonthlyPackages[$rows]->crm_packageid,
                                                    'product' => 'CRM',
                                                ],
                                            ],
                                            'class' => "hrm_signup_btn btn-success",
                                            'style' => "padding: 10px 47px;",
                                        ]); ?>
                                    </div>
                                    <div class="price-value-yearly">
                                        <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/payment"), [
                                            'data' => [
                                                'method' => 'post',
                                                'params' => [
                                                    'id' => $YearlyPackages[$rows]->crm_packageid,
                                                    'product' => 'CRM',
                                                ],
                                            ],
                                            'class' => "hrm_signup_btn btn-success",
                                            'style' => "padding: 10px 47px;",
                                        ]); ?>
                                    </div>
                                    <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=crm")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                    <div class="pricingContent">
                                        <ul class="monthlyPlanInput">
                                            <li><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0)?$MonthlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                            <li><?= ($MonthlyPackages[$rows]->numof_integration == 0) ? " - " : (($MonthlyPackages[$rows]->numof_integration > 0)?$MonthlyPackages[$rows]->numof_integration . " Integrations": " Multiple Integrations ") ?></li>
                                            <li style="display: none;"><?= ($MonthlyPackages[$rows]->numof_quotes == 0) ? " - " : (($MonthlyPackages[$rows]->numof_quotes > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_quotes)  . " Monthly Quotes / month": " Multiple Monthly Quotes ") ?></li>
                                            <li style="display: none;"><?= ($MonthlyPackages[$rows]->numof_invoices == 0) ? " - " : (($MonthlyPackages[$rows]->numof_invoices > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_invoices)  . " Monthly Invoices /  month": " Multiple Monthly Invoices ") ?></li>
                                            <li><?= ($MonthlyPackages[$rows]->numof_contact == 0) ? " - " : (($MonthlyPackages[$rows]->numof_contact > 0)?Yii::$app->formatter->asInteger ($MonthlyPackages[$rows]->numof_contact) . " Contacts": " Multiple Contacts ") ?></li>
                                        </ul>
                                        <ul class="yearlyPlanInput">
                                            <li><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0)?$YearlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                            <li><?= ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0)?$YearlyPackages[$rows]->numof_integration . " Integrations": " Multiple Integrations ") ?></li>
                                            <li style="display: none;"><?= ($YearlyPackages[$rows]->numof_quotes == 0) ? " - " : (($YearlyPackages[$rows]->numof_quotes > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_quotes)  . " Monthly Quotes /  month": " Multiple Monthly Quotes ") ?></li>
                                            <li style="display: none;"><?= ($YearlyPackages[$rows]->numof_invoices == 0) ? " - " : (($YearlyPackages[$rows]->numof_invoices > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_invoices)  . " Monthly Invoices /  month": " Multiple Monthly Invoices ") ?></li>
                                            <li><?= ($YearlyPackages[$rows]->numof_contact == 0) ? " - " : (($YearlyPackages[$rows]->numof_contact > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_contact) . " Contacts": " Multiple Contacts ") ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $rows++;
                        }
                        if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]) {
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
                                        <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/payment"), [
                                            'data' => [
                                                'method' => 'post',
                                                'params' => [
                                                    'id' => $MonthlyPackages[$rows]->crm_packageid,
                                                    'product' => 'CRM',
                                                ],
                                            ],
                                            'class' => "hrm_signup_btn btn-success",
                                            'style' => "padding: 10px 47px;",
                                        ]); ?>
                                    </div>
                                    <div class="price-value-yearly">
                                        <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/payment"), [
                                            'data' => [
                                                'method' => 'post',
                                                'params' => [
                                                    'id' => $YearlyPackages[$rows]->crm_packageid,
                                                    'product' => 'CRM',
                                                ],
                                            ],
                                            'class' => "hrm_signup_btn btn-success",
                                            'style' => "padding: 10px 47px;",
                                        ]); ?>
                                    </div>
                                    <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=crm")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                    <div class="pricingContent">
                                        <ul class="monthlyPlanInput">
                                            <li><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0)?$MonthlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                            <li><?= ($MonthlyPackages[$rows]->numof_integration == 0) ? " - " : (($MonthlyPackages[$rows]->numof_integration > 0)?$MonthlyPackages[$rows]->numof_integration . " Integrations": " Multiple Integrations ") ?></li>
                                            <li style="display: none;"><?= ($MonthlyPackages[$rows]->numof_quotes == 0) ? " - " : (($MonthlyPackages[$rows]->numof_quotes > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_quotes)  . " Monthly Quotes /  month": " Multiple Monthly Quotes ") ?></li>
                                            <li style="display: none;"><?= ($MonthlyPackages[$rows]->numof_invoices == 0) ? " - " : (($MonthlyPackages[$rows]->numof_invoices > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_invoices)  . " Monthly Invoices /  month": " Multiple Monthly Invoices ") ?></li>
                                            <li><?= ($MonthlyPackages[$rows]->numof_contact == 0) ? " - " : (($MonthlyPackages[$rows]->numof_contact > 0)?Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_contact) . " Contacts": " Multiple Contacts ") ?></li>
                                        </ul>
                                        <ul class="yearlyPlanInput">
                                            <li><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0)?$YearlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                            <li><?= ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0)?$YearlyPackages[$rows]->numof_integration . " Integrations": " Multiple Integrations ") ?></li>
                                            <li style="display: none;"><?= ($YearlyPackages[$rows]->numof_quotes == 0) ? " - " : (($YearlyPackages[$rows]->numof_quotes > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_quotes)  . " Monthly Quotes /  month": " Multiple Monthly Quotes ") ?></li>
                                            <li style="display: none;"><?= ($YearlyPackages[$rows]->numof_invoices == 0) ? " - " : (($YearlyPackages[$rows]->numof_invoices > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_invoices)  . " Monthly Invoices /  month": " Multiple Monthly Invoices ") ?></li>
                                            <li><?= ($YearlyPackages[$rows]->numof_contact == 0) ? " - " : (($YearlyPackages[$rows]->numof_contact > 0)?Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_contact) . " Contacts": " Multiple Contacts ") ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $rows++;
                        }
                        if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]) {
                        ?>
                            <div class="col-md-2 col-sm-6 inven_pricing_table_div col_md_sm_2_5" >
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
                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/payment"), [
                                                'data' => [
                                                    'method' => 'post',
                                                    'params' => [
                                                        'id' => $MonthlyPackages[$rows]->crm_packageid,
                                                        'product' => 'CRM',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div class="price-value-yearly">
                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/payment"), [
                                                'data' => [
                                                    'method' => 'post',
                                                    'params' => [
                                                        'id' => $YearlyPackages[$rows]->crm_packageid,
                                                        'product' => 'CRM',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                    <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=crm")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                    <div class="pricingContent">
                                        <ul class="monthlyPlanInput">
                                            <li><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0)?$MonthlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                            <li><?= ($MonthlyPackages[$rows]->numof_integration == 0) ? " - " : (($MonthlyPackages[$rows]->numof_integration > 0)?$MonthlyPackages[$rows]->numof_integration . " Integrations": " Multiple Integrations ") ?></li>
                                            <li style="display: none;"><?= ($MonthlyPackages[$rows]->numof_quotes == 0) ? " - " : (($MonthlyPackages[$rows]->numof_quotes > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_quotes)  . "Monthly Quotes": " Multiple Monthly Quotes ") ?></li>
                                            <li style="display: none;"><?= ($MonthlyPackages[$rows]->numof_invoices == 0) ? " - " : (($MonthlyPackages[$rows]->numof_invoices > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_invoices)  . " Monthly Invoices": " Multiple Monthly Invoices ") ?></li>
                                            <li><?= ($MonthlyPackages[$rows]->numof_contact == 0) ? " - " : (($MonthlyPackages[$rows]->numof_contact > 0)?Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_contact) . " Contacts": " Multiple Contacts ") ?></li>
                                        </ul>
                                        <ul class="yearlyPlanInput">
                                            <li><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0)?$YearlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                            <li><?= ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0)?$YearlyPackages[$rows]->numof_integration . " Integrations": " Multiple Integrations ") ?></li>
                                            <li style="display: none;"><?= ($YearlyPackages[$rows]->numof_quotes == 0) ? " - " : (($YearlyPackages[$rows]->numof_quotes > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_quotes)  . "Monthly Quotes": " Multiple Monthly Quotes ") ?></li>
                                            <li style="display: none;"><?= ($YearlyPackages[$rows]->numof_invoices == 0) ? " - " : (($YearlyPackages[$rows]->numof_invoices > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_invoices)  . " Monthly Invoices": " Multiple Monthly Invoices ") ?></li>
                                            <li><?= ($YearlyPackages[$rows]->numof_contact == 0) ? " - " : (($YearlyPackages[$rows]->numof_contact > 0)?Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_contact) . " Contacts": " Multiple Contacts ") ?></li>
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
                        <p class="pricing_text_scale">  All Prices in <?= $currencyCode ?></p><br>
                    </div>
                </div>
            </div>
             <div class="buttons"style="text-align: center;padding-bottom:40px;"><a class="hrm_enter_btn hrm_blue_btn" href="#crm_compareplane" id="hrm_comberplane">Compare Plans</a></div>
            <div class="col-sm-12 crm_plans_for_businesses">
                <div class="row" style="">
                    <div class="inventory_pricing_table_div"><h2 class="require_more_business">
                        Plans for businesses that require more
                    </h2></div>
                    <div class="row ">
                        <div class="col-sm-12 col-md-offset-1">
                            <div class="col-md-5 col-sm-5">
                                <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=crm-on-premises")?>"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-clouds-text.png" class="priceing_image_en" alt="Inventory Management Software"></a></div>
                                <div>
                                    <h4 class="entpricing_text_h">Need On Premises or Private Cloud</h4> <h4 class="entpricing_text_h" style="padding: 0 0px;">Setup for your business?</h4>
                                    <div class="buttons" style="text-align: center;padding: 18px 0 0px 0px;">
                                        <a class="enter_btn  blue_btn" href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=crm-on-premises")?>">CONTACT SALES TEAM</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=crm-tailormade")?>"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta_tailor.png" class="priceing_image_eng" alt="Inventory Management Software"></a></div>
                                <div>
                                    <h4 class="entpricing_text_h">Need Tailormade plan for your business?</h4>
                                    <p class="entpricing_text_para">Get our custom made Enterprice plan to manage more and<br> more orders for bigger businesses!</p>
                                    <div class="buttons" style="text-align: center;">
                                        <a class="enter_btn  blue_btn" href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=crm-tailormade")?>">CONTACT SALES TEAM</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
               
                <div id="crm_compareplane" >
                    <div class="col-md-12">
                        <P class="hrm_compertable_h_text">Feature Comparison Plans</P>
                        <P class="hrm_compertable_p_text">Choose a plan that's right for your organization</P>
                    </div>
                    <div class="col-md-12 prising_tanle_div">
                        <div id="table-scroll" class="table-scroll">
                            <div class="table-wrap">
                                <table class="main-table">
                                    <thead>
                                        <tr>
                                            <th class="fixed-side" scope="col" style="text-align:center;border-bottom-width: 1px!important;width: 30%;background-color:#fafafa;">Features</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;background-color:#fafafa;">Small</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;background-color:#fafafa;">Medium</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;background-color:#fafafa;">Large </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Billed Annually</th>
                                            <?php
                                                $rows = 0;
                                            ?>
                                            <?php
                                                if(isset( $YearlyPackages[$rows]) && false ) {
                                            ?>
                                            <td style="text-align: center;"> per month billed annually</td>
                                            <?php
                                                $rows++;
                                                } else {
                                                    (count($MonthlyPackages) == 4) ? $rows++ : false;
                                                }

                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                                <span style="font-size:14px;"><?= $currencySymbol. $tempValue[0];?><sup style=" top: -4.8px;font-size:10px;"><?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?></sup></span> per month billed annually</td>
                                            <?php
                                                $rows++;
                                            }  
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                                <span style="font-size:14px;"><?= $currencySymbol. $tempValue[0];?><sup style=" top: -4.8px;font-size:10px;"><?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?></sup></span> per month billed annually</td>
                                            <?php
                                                $rows++;
                                            }   
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                                <td style="text-align: center;"><?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                                <span style="font-size:14px;"><?= $currencySymbol. $tempValue[0];?><sup style=" top: -4.8px;font-size:10px;"><?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?></sup></span> per month billed annually</td>
                                            <?php
                                            }
                                            ?>
                                        </tr>   
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Billed Monthly</th>
                                               <?php
                                                $rows = 0;
                                            ?>
                                            <?php
                                                if(isset( $MonthlyPackages[$rows]) && false ) {
                                            ?>
                                            <td style="text-align: center;"> billed monthly</td>
                                            <?php
                                                $rows++;
                                                } else {
                                                    (count($MonthlyPackages) == 4) ? $rows++ : false;
                                                }

                                                if(isset( $MonthlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                <span style="font-size:14px;"><?= $currencySymbol. $tempValue[0];?><sup style=" top: -4.8px;font-size:10px;"><?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?></sup></span> billed monthly</td>
                                            <?php
                                                $rows++;
                                            }   
                                                if(isset( $MonthlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                <span style="font-size:14px;"><?= $currencySymbol. $tempValue[0];?><sup style=" top: -4.8px;font-size:10px;"><?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?></sup></span> billed monthly</td>
                                            <?php
                                                $rows++;
                                            }   
                                                if(isset( $MonthlyPackages[$rows])) {
                                            ?>
                                                <td style="text-align: center;"><?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                <span style="font-size:14px;"><?= $currencySymbol.$tempValue[0];?><sup style=" top: -4.8px;font-size:10px;"><?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?></sup></span> billed monthly</td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Users</th>
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
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Contact Management</th>
                                            <td style="text-align:center;display: none;" ></td>
                                            <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Contacts</th>
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
                                            <td style="text-align: center;"><?php echo ( Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_contact)); ?></td>
                                            <?php
                                                $rows++;
                                            }  
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php echo ( Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_contact)); ?></td>
                                            <?php
                                                $rows++;
                                            }   
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                                <td style="text-align: center;"><?php echo ( Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_contact)); ?></td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Leads</th>
                                            <td style="text-align:center;display: none;" ></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Deal Management</th>
                                            <td style="text-align:center;display: none;" ></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Dynamic Pipeline Management</th>
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
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_dnamic_pipeline); ?></td>
                                            <?php
                                                $rows++;
                                            }  
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_dnamic_pipeline); ?></td>
                                            <?php
                                                $rows++;
                                            }   
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                                <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_dnamic_pipeline == 0) ? " - " : (($YearlyPackages[$rows]->numof_dnamic_pipeline > 0)?$YearlyPackages[$rows]->numof_dnamic_pipeline . " ": " Multiple ")  ?></td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Smart Webforms</th>
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
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_smart_webform); ?></td>
                                            <?php
                                                $rows++;
                                            }  
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_smart_webform); ?></td>
                                            <?php
                                                $rows++;
                                            }   
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                                <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_smart_webform == 0) ? " - " : (($YearlyPackages[$rows]->numof_smart_webform > 0)?$YearlyPackages[$rows]->numof_smart_webform . " ": " Multiple ")  ?></td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Calendar </th>
                                            <td style="text-align:center;display:none;" ></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Task management </th>
                                            <td style="text-align:center;display:none;" ></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Reminders</th>
                                            <td style="text-align:center;display:none;" ></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Smart Notifications</th>
                                            <td style="text-align:center;display:none;" ></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr style="display: none;">
                                            <th class="fixed-side" style="background-color:#fafafa;">Monthly Quotes</th>
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
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_quotes); ?></td>
                                            <?php
                                                $rows++;
                                            }  
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_quotes); ?></td>
                                            <?php
                                                $rows++;
                                            }   
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                                <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_quotes == 0) ? " - " : (($YearlyPackages[$rows]->numof_quotes > 0)?$YearlyPackages[$rows]->numof_quotes . " ": " Multiple ")  ?></td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr style="display: none;">
                                            <th class="fixed-side" style="background-color:#fafafa;">Monthly Invoices</th>
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
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_invoices); ?></td>
                                            <?php
                                                $rows++;
                                            }  
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_invoices); ?></td>
                                            <?php
                                                $rows++;
                                            }   
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                                <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_invoices == 0) ? " - " : (($YearlyPackages[$rows]->numof_invoices > 0)?$YearlyPackages[$rows]->numof_invoices . " ": " Multiple ")  ?></td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Online Invoice Payment</th>
                                            <td style="text-align:center;display:none" ></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Receivables & Outstanding</th>
                                            <td style="text-align:center;display:none" ></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Document Signing*</th>
                                            <td style="text-align:center;display:none" ></td>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Marketing</th>
                                            <td style="text-align:center;display:none" ></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Item List</th>
                                            <td style="text-align:center;display:none" ></td>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Project</th>
                                            <td style="text-align:center;display:none" ></td>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Customer Login to view Project</th>
                                            <td style="text-align:center;display:none" ></td>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Gantt</th>
                                            <td style="text-align:center;display:none" ></td>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                            <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Event Management</th>
                                            <td style="text-align:center;display:none" ></td>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Integrations </th>
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
                                                <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0)?$YearlyPackages[$rows]->numof_integration . " ": " Multiple ")  ?></td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div style="padding: 7px 5%;">
                        *Coming soon
                        </div>
                    </div>
                </div>
            </div>
           <!--  <div class="container add_on_div">
                <h2 class="add_on_pricing_head">Add Ons</h2>   
                <p class="each_add_ons">You can buy multiples of each add-ons</p> 
                <?php //if($country == 'India'){ ?>
                    <div class="col-md-6 addOnsPricing">
                      <h4 class="add_on_pricing_head_h4">Sales Channels</h4>
                        <p class="add_on_text"> $8.88 per sales channel/ per month.</p>  
                    </div>
                    <div class="col-md-6 addOnsPricing">
                        <h4 class="add_on_pricing_head_h4">Sales Orders</h4>
                        <p class="add_on_text" > $4.88 for every 100 sales order/ per month.</p>
                    </div>
                    <div class="col-md-6 addOnsPricing">
                        <h4 class="add_on_pricing_head_h4">No. of users</h4>
                        <p class="add_on_text" > $8.88 per user/ per month.</p> 
                    </div>
                    <div class="col-md-6 addOnsPricing">
                        <h4 class="add_on_pricing_head_h4">Warehouse</h4>
                        <p class="add_on_text" >$8.88 per warehouse/ per month.</p>
                    </div>
                    <div class="col-md-6 addOnsPricing">
                        <h4 class="add_on_pricing_head_h4">SKU</h4>
                        <p class="add_on_text" >“Blocks of 100 SKU” @ $8.88 per SKU Block/ per month.<br> SKU can be bought only in multiples of 100.</p>
                    </div>
                    <?php //}else { ?>
                        <div class="col-md-6 addOnsPricing">
                      <h4 class="add_on_pricing_head_h4">Sales Channels</h4>
                        <p class="add_on_text"> $10.88 per sales channel/ per month.</p>  
                    </div>
                    <div class="col-md-6 addOnsPricing">
                        <h4 class="add_on_pricing_head_h4">Sales Orders</h4>
                        <p class="add_on_text" > $10.88 for every 100 sales order/ per month.</p>
                    </div>
                    <div class="col-md-6 addOnsPricing">
                        <h4 class="add_on_pricing_head_h4">No. of users</h4>
                        <p class="add_on_text" > $10.88 per user/ per month.</p> 
                    </div>
                    <div class="col-md-6 addOnsPricing">
                        <h4 class="add_on_pricing_head_h4">Warehouse</h4>
                        <p class="add_on_text" >$50.88 per warehouse/ per month.</p>
                    </div>
                    <div class="col-md-6 addOnsPricing">
                        <h4 class="add_on_pricing_head_h4">SKU</h4>
                        <p class="add_on_text" >“Blocks of 100 SKU” @ $10.88 per SKU Block/ per month.<br> SKU can be bought only in multiples of 100.</p>
                    </div>
                <?php //} ?>           
            </div>
            <div class="container">
                <p class="each_add_ons_discount" style="padding: 0 14%">20% discount applicable for all Add Ons when bought for a year.</p> 
            </div> -->
        </div>
    </div>
    </section>
    <?php ActiveForm::end();  ?>
</div>
<?php
$this->registerJs("
jQuery(document).ready(function() {
     $('.main-table').clone(true).appendTo('#table-scroll').addClass('clone'); 
 });
");