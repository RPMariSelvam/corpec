<?php

use app\models\CommonModel;
use components\helper\PricingHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\site\frontend\models\InventoryPackageModel;


/* @var $this yii\web\View */
/* @var $MonthlyPlan app\modules\site\frontend\models\PlanModel */
/* @var $YearlyPlan app\modules\site\frontend\models\PlanModel */
/* @var $MonthlyPackages app\modules\site\frontend\models\InventoryPackageModel */
/* @var $YearlyPackages app\modules\site\frontend\models\InventoryPackageModel */
/* @var $AddonsModels \app\models\ImsAddons */
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
        .pricing_padding {
        padding:9px;
    }
    .pricingTable.disabled{
        opacity:0.5;
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
    @media only screen and (min-width : 1200px) and (max-width:1331px) {
      .pricing_padding {
        padding:0px 0px;
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
    .strikethrough{
        color:#a9a9a9 !important;
    }
    .strikethrough_monthly{
        color:#a9a9a9 !important; 
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

$UsersAddonPrice = CommonModel::CurrencyFormat($AddonsModels['Users']->priced_monthly, $currencySymbol, 0);
$OutletsAddonPrice = CommonModel::CurrencyFormat($AddonsModels['Outlets/Locations']->priced_monthly, $currencySymbol, 0);
$SalesOrdersAddonPrice = CommonModel::CurrencyFormat($AddonsModels['Sales Orders']->priced_monthly, $currencySymbol, 0);
$SalesChannelsAddonPrice = CommonModel::CurrencyFormat($AddonsModels['Sales Channels']->priced_monthly, $currencySymbol, 0);
$SKUsAddonPrice = CommonModel::CurrencyFormat($AddonsModels['SKUs']->priced_monthly, $currencySymbol, 0);
?>

<div class="wrapper" style="background-color: #fff;">
    <div class="row">
        &nbsp;
    </div>
    <?php $form = ActiveForm::begin(['options' => ['role'=> "form"],]); ?>
    <section >
        <div class="panel-body">
            <div class="row pricingSection inventory_pricing_plan ">
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
                    <div class=" inven_pricing_restable">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                            <?php
                            if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows] && false) {
                                ?>
                                <div class="col-md-3 col-sm-6 inven_pricing_table_div col_md_sm_2_5">
                                    <div class="pricingTable ">
                                        <div class="pricingTable-header"><h3><?= $MonthlyPackages[$rows]->name ?></h3>

                                            <p class="prising-table-text">Our entry level plan for new businesses</p>
                                        </div>
                                        <div class="price-value">
                                            <span>FREE Forever</span>
                                            <span class="subtitle" style="padding: 10px 0px 0px">per month</span>
                                            <span class="subtitle">billed annually</span>
                                        </div>
                                        <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=inv")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                        <div class="pricingContent">
                                            <ul class="monthlyPlanInput">
                                                <li data-original-title="Additional users can be added at <?= $UsersAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0)?$MonthlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at <?= $SalesChannelsAddonPrice ?> per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_channels == 0) ? " - " : (($MonthlyPackages[$rows]->numof_channels > 0)?$MonthlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <li data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?> for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_online_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_online_order)  . " Sales orders /".'<br>'."month": " Multiple Sales orders ") ?></li>
                                                <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at <?= $OutletsAddonPrice ?> per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0)?$MonthlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <li data-original-title="Additional blocks of 100 SKU” can be added @ <?= $SKUsAddonPrice ?> per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                            </ul>
                                            <ul class="yearlyPlanInput">
                                                <li data-original-title="Additional users can be added at <?= $UsersAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0)?$YearlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at <?= $SalesChannelsAddonPrice ?> per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0)?$YearlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <li data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?> for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . " Sales orders /".'<br>'."month": " Multiple Sales orders ") ?></li>
                                                <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at <?= $OutletsAddonPrice ?> per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)?$YearlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <li data-original-title="Additional blocks of 100 SKU” can be added @ <?= $SKUsAddonPrice ?> per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $rows++;
                            } else {
                                //echo "<div class='col-md-1'></div>";
                                (count($MonthlyPackages) == 5) ? $rows++ : false;
                            }

                            if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]){
                                ?>
                                <div class="col-md-3 col-sm-6 inven_pricing_table_div col_md_sm_2_5 " >
                                    <div class="pricingTable ">
                                        <div class="pricingTable-header"><h3><?= $MonthlyPackages[$rows]->name ?></h3>
                                            <p class="prising-table-text">Right package for getting started on Inventory</p>
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
                                                        'id' => $MonthlyPackages[$rows]->inventory_packageid,
                                                        'product' => 'Inventory',
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
                                                        'id' => $YearlyPackages[$rows]->inventory_packageid,
                                                        'product' => 'Inventory',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=inv")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                        <div class="pricingContent">
                                            <ul class="monthlyPlanInput">
                                                <li data-original-title="Additional users can be added at <?= $UsersAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0)?$MonthlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at <?= $SalesChannelsAddonPrice ?> per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_channels == 0) ? " - " : (($MonthlyPackages[$rows]->numof_channels > 0)?$MonthlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <li data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?> for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_online_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_online_order)  . " Sales orders /".'<br>'."month": " Multiple Sales orders ") ?></li>
                                                <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at <?= $OutletsAddonPrice ?> per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0)?$MonthlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <li data-original-title="Additional blocks of 100 SKU” can be added @ <?= $SKUsAddonPrice ?> per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                            </ul>
                                            <ul class="yearlyPlanInput">
                                                <li data-original-title="Additional users can be added at <?= $UsersAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0)?$YearlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at <?= $SalesChannelsAddonPrice ?> per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0)?$YearlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <li data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?> for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . " Sales orders /".'<br>'."month": " Multiple Sales orders ") ?></li>
                                                <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at <?= $OutletsAddonPrice ?> per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)?$YearlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <li data-original-title="Additional blocks of 100 SKU” can be added @ <?= $SKUsAddonPrice ?> per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $rows++;
                            }

                            if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]) {
                                ?>
                                <div class="col-md-3 col-sm-6 inven_pricing_table_div col_md_sm_2_5">
                                    <div class="ribbon_pricing"><span>POPULAR</span></div>
                                    <div class="pricingTable smallbudiness-popular ">
                                        <div class="pricingTable-header"><h3><?= $MonthlyPackages[$rows]->name ?></h3>
                                            <p class="prising-table-text">Best fit for growing business</p>
                                        </div>
                                        <div style="padding:9px 0px; "></div>
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
                                                        'id' => $MonthlyPackages[$rows]->inventory_packageid,
                                                        'product' => 'Inventory',
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
                                                        'id' => $YearlyPackages[$rows]->inventory_packageid,
                                                        'product' => 'Inventory',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=inv")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                        <div class="pricingContent">
                                            <ul class="monthlyPlanInput">
                                                <li data-original-title="Additional users can be added at <?= $UsersAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0)?$MonthlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at <?= $SalesChannelsAddonPrice ?> per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_channels == 0) ? " - " : (($MonthlyPackages[$rows]->numof_channels > 0)?$MonthlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <li data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?> for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_online_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_online_order)  . " Sales orders /".'<br>'."month": " Multiple Sales orders ") ?></li>
                                                <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at <?= $OutletsAddonPrice ?> per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0)?$MonthlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <li data-original-title="Additional blocks of 100 SKU” can be added @ <?= $SKUsAddonPrice ?> per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                            </ul>
                                            <ul class="yearlyPlanInput">
                                                <li data-original-title="Additional users can be added at <?= $UsersAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0)?$YearlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at <?= $SalesChannelsAddonPrice ?> per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0)?$YearlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <li data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?> for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . " Sales orders /".'<br>'."month": " Multiple Sales orders ") ?></li>
                                                <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at <?= $OutletsAddonPrice ?> per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)?$YearlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <li data-original-title="Additional blocks of 100 SKU” can be added @ <?= $SKUsAddonPrice ?> per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $rows++;
                            }
                            if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]) {
                                ?>
                                <div class="col-md-3 col-sm-6 inven_pricing_table_div col_md_sm_2_5">
                                    <div class="pricingTable ">
                                        <div class="pricingTable-header"><h3><?= $MonthlyPackages[$rows]->name ?></h3>

                                            <p class="prising-table-text">All you need for a growing business</p>
                                        </div>
                                        <div class="pricing_padding"></div>
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
                                                        'id' => $MonthlyPackages[$rows]->inventory_packageid,
                                                        'product' => 'Inventory',
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
                                                        'id' => $YearlyPackages[$rows]->inventory_packageid,
                                                        'product' => 'Inventory',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=inv")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                        <div class="pricingContent">
                                            <ul class="monthlyPlanInput">
                                                <li data-original-title="Additional users can be added at <?= $UsersAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0)?$MonthlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at <?= $SalesChannelsAddonPrice ?> per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_channels == 0) ? " - " : (($MonthlyPackages[$rows]->numof_channels > 0)?$MonthlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <li data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?> for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_online_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_online_order)  . " Sales orders /".'<br>'."month": " Multiple Sales orders ") ?></li>
                                                <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at <?= $OutletsAddonPrice ?> per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0)?$MonthlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <li data-original-title="Additional blocks of 100 SKU” can be added @ <?= $SKUsAddonPrice ?> per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                            </ul>
                                            <ul class="yearlyPlanInput">
                                                <li data-original-title="Additional users can be added at <?= $UsersAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0)?$YearlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at <?= $SalesChannelsAddonPrice ?> per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0)?$YearlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <li data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?> for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . " Sales orders /".'<br>'."month": " Multiple Sales orders ") ?></li>
                                                <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at <?= $OutletsAddonPrice ?> per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)?$YearlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <li data-original-title="Additional blocks of 100 SKU” can be added @ <?= $SKUsAddonPrice ?> per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $rows++;
                            }
                            if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]) {
                            ?>
                                <div class="col-md-3 col-sm-6 inven_pricing_table_div col_md_sm_2_5" >
                                    <div class="pricingTable ">
                                        <div class="pricingTable-header"><h3><?= $MonthlyPackages[$rows]->name ?></h3>
                                            <p class="prising-table-text">Go to package for Large business with higher order volumes</p></div>
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
                                                        'id' => $MonthlyPackages[$rows]->inventory_packageid,
                                                        'product' => 'Inventory',
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
                                                        'id' => $YearlyPackages[$rows]->inventory_packageid,
                                                        'product' => 'Inventory',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=inv")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                        <div class="pricingContent">
                                            <ul class="monthlyPlanInput">
                                                <li data-original-title="Additional users can be added at <?= $UsersAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0)?$MonthlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at <?= $SalesChannelsAddonPrice ?> per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_channels == 0) ? " - " : (($MonthlyPackages[$rows]->numof_channels > 0)?$MonthlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <li data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?> for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_online_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_online_order)  . " Sales orders /".'<br>'."month": " Multiple Sales orders ") ?></li>
                                                <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at <?= $OutletsAddonPrice ?> per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0)?$MonthlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <li data-original-title="Additional blocks of 100 SKU” can be added @ <?= $SKUsAddonPrice ?> per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                            </ul>
                                            <ul class="yearlyPlanInput">
                                                <li data-original-title="Additional users can be added at <?= $UsersAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0)?$YearlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at <?= $SalesChannelsAddonPrice ?> per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0)?$YearlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <li data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?> for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . " Sales orders /".'<br>'."month": " Multiple Sales orders ") ?></li>
                                                <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at <?= $OutletsAddonPrice ?> per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)?$YearlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <li data-original-title="Additional blocks of 100 SKU” can be added @ <?= $SKUsAddonPrice ?> per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                    <?php /*ActiveForm::end(); */ ?>
                    <div class="col-sm-12 col-md-offset-1" style="padding:24px 17px;">
                        <p class="pricing_text_scale">  All Prices in <?= $currencyCode ?></p>
                    </div>
                </div>
            </div>
            <div class="buttons"style="text-align: center;padding-bottom:45px;"><a class="hrm_enter_btn hrm_blue_btn" href="#inventory_compareplane" id="hrm_comberplane">Compare Plans</a></div>
            <div class="col-sm-12" style="background-color: #fafafa;padding-bottom:55px;">
                <div class="container add_on_div">
                    <h2 class="add_on_pricing_head" style="padding-top: 25px;">Add Ons</h2>
                    <p class="each_add_ons">You can buy multiples of each add-ons</p>
                    <div class="col-md-6 addOnsPricing">
                        <h4 class="add_on_pricing_head_h4">Sales Channels</h4>
                        <p class="add_on_text"><span style="font-size:14px;font-family: Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;"><?= $SalesChannelsAddonPrice ?></span> per sales channel/ per month.</p>
                    </div>
                    <div class="col-md-6 addOnsPricing">
                        <h4 class="add_on_pricing_head_h4">Sales Orders</h4>
                        <p class="add_on_text" ><span style="font-size:14px;font-family: Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;"><?= $SalesOrdersAddonPrice ?></span> for every 100 sales order/ per month.</p>
                    </div>
                    <div class="col-md-6 addOnsPricing">
                        <h4 class="add_on_pricing_head_h4">No. of users</h4>
                        <p class="add_on_text" ><span style="font-size:14px;font-family: Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;"><?= $UsersAddonPrice ?></span> per user/ per month.</p>
                    </div>
                    <div class="col-md-6 addOnsPricing">
                        <h4 class="add_on_pricing_head_h4">Warehouse</h4>
                        <p class="add_on_text" ><span style="font-size:14px;font-family: Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;"><?= $OutletsAddonPrice ?></span> per warehouse/ per month.</p>
                    </div>
                    <div class="col-md-6 addOnsPricing">
                        <h4 class="add_on_pricing_head_h4">SKU</h4>
                        <p class="add_on_text" >“Blocks of 100 SKU” @ <span style="font-size:14px;font-family: Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;"><?= $SKUsAddonPrice ?></span> per SKU Block/ per month.<br> SKU can be bought only in multiples of 100.</p>
                    </div>
                    <div class="col-md-12 addOnsPricing">
                        <br>
                        <p class="add_on_text" >20% discount applicable for all Add Ons when bought for a year.</p>
                    </div>
                </div>
                <!-- <div class="container">
                    <p class="each_add_ons_discount" style="padding: 0 12.3%">20% discount applicable for all Add Ons when bought for a year.</p>
                </div> -->
            </div>
            <div class="col-sm-12">
                <div id="inventory_compareplane" >
                    <div class="col-md-12">
                        <P class="hrm_compertable_h_text">Feature Comparison Plans</P>
                    </div>
                    <div class="col-md-12 prising_tanle_div">
                        <div id="table-scroll" class="table-scroll">
                            <div class="table-wrap">
                                <table class="main-table">
                                    <thead>
                                        <tr>
                                            <?php $rows = 1 ?>
                                            <th class="fixed-side" scope="col" style="text-align:center;border-bottom-width: 1px!important;">Features</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;"><?= $YearlyPackages[$rows++]->name ?></th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;"><?= $YearlyPackages[$rows++]->name ?></th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;"><?= $YearlyPackages[$rows++]->name ?></th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;"><?= $YearlyPackages[$rows++]->name ?></th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;">Enterprise</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                                    (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                }

                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                                <td style="text-align: center;" data-original-title="Additional users can be added at <?= $UsersAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?php   echo ($YearlyPackages[$rows]->numof_user); ?></td>

                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                <td style="text-align: center;" data-original-title="Additional users can be added at <?= $UsersAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?php   echo ($YearlyPackages[$rows]->numof_user); ?></td>
                                            <?php
                                                    $rows++;
                                                }
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                <td style="text-align: center;" data-original-title="Additional users can be added at <?= $UsersAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?php   echo ($YearlyPackages[$rows]->numof_user); ?></td>
                                            <?php
                                                    $rows++;
                                                }
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                <td style="text-align: center;" data-original-title="Additional users can be added at <?= $UsersAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?php   echo ($YearlyPackages[$rows]->numof_user); ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td style="background-color:#dff4f9;text-align:center">Multiple</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;" >Sales Integration channels</th>
                                            <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>  
                                            <td style="text-align: center;">1</td>
                                            <?php
                                                $rows++;
                                                } else {
                                                    (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                }

                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                             
                                            <?php if($country =="India"){?>
                                                    <td style="text-align: center;"  data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at <?= $SalesChannelsAddonPrice ?> per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?=  ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0) ? $YearlyPackages[$rows]->numof_channels . " " : "Multiple") ?></td>
                                                <?php }else{?>
                                                    <td style="text-align: center;"  data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $10.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?=  ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0) ? $YearlyPackages[$rows]->numof_channels . " " : "Multiple") ?></td>
                                                <?php } ?>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;"  data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at <?= $SalesChannelsAddonPrice ?> per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?=  ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0) ? $YearlyPackages[$rows]->numof_channels . " " : "Multiple") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;"  data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at <?= $SalesChannelsAddonPrice ?> per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?=  ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0) ? $YearlyPackages[$rows]->numof_channels . " " : "Multiple") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;"  data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at <?= $SalesChannelsAddonPrice ?> per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?=  ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0) ? $YearlyPackages[$rows]->numof_channels . " " : "Multiple") ?></td>
                                             <?php
                                            }
                                            ?>
                                            <td style="background-color:#dff4f9;text-align: center;">Multiple</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;" >Sales Orders per month</th>
                                             <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>  
                                             <?php
                                                $rows++;
                                                } else {
                                                    (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                }

                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                                <td style="text-align: center;" data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?>  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;" data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?>  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;" data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?>  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;" data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?>  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . "": " Multiple ") ?></td>
                                             <?php
                                            }
                                            ?>
                                            <td style="background-color:#dff4f9;text-align:center">Multiple</td>
                                        </tr>
                                        <tr style="display: none;">
                                            <th class="fixed-side" style="background-color:#fafafa;" >Offline sales orders per month</th>
                                                <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>
                                            <td style="text-align: center;">10</td>
                                             <?php
                                                $rows++;
                                                } else {
                                                    (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                }

                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                                    <td style="text-align: center;" data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?>  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_offline_order)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;" data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?>  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_offline_order)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;" data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?>  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_offline_order)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;" data-original-title="Additional Orders can be added at <?= $SalesOrdersAddonPrice ?>  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_offline_order)  . "": " Multiple ") ?></td>
                                             <?php
                                            }
                                            ?>
                                            <td style="background-color:#dff4f9;text-align:center">Multiple</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;" >No.of Inventory items (SKU)</th>
                                            <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>  
                                            <?php
                                                $rows++;
                                                } else {
                                                    (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                }

                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                           
                                                    <td style="text-align: center;" data-original-title="Additional blocks of 100 SKU” can be added @ <?= $SKUsAddonPrice ?> per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;" data-original-title="Additional blocks of 100 SKU” can be added @ <?= $SKUsAddonPrice ?> per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;" data-original-title="Additional blocks of 100 SKU” can be added @ <?= $SKUsAddonPrice ?> per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;" data-original-title="Additional blocks of 100 SKU” can be added @ <?= $SKUsAddonPrice ?> per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . "": " Multiple ") ?></td>
                                             <?php
                                            }
                                            ?>
                                            <td style="background-color:#dff4f9;text-align:center">Multiple</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;" >Integrations</th>
                                            <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>  
                                            <?php
                                                $rows++;
                                                } else {
                                                    (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                }

                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td  style="text-align:center;"><?= ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_integration)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td  style="text-align:center;"><?= ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_integration)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td  style="text-align:center;"><?= ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_integration)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td  style="text-align:center;"><?= ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_integration)  . "": " Multiple ") ?></td>
                                             <?php
                                            }
                                            ?>
                                            <td  style="background-color:#dff4f9;text-align:center">Multiple</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;" >Payments</th>
                                            <td  style="text-align:center;">
                                                <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                            <td  style="text-align:center;">
                                                <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                            <td  style="text-align:center;">
                                                <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                            <td  style="text-align:center;">
                                                <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                            <td  style="background-color:#dff4f9;text-align:center">
                                                <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;" >B2B eCommerce Store*</th>
                                            <td data-original-title="Sell wholesale online with a B2B store customizable to each customer" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">
                                                <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                            <td data-original-title="Sell wholesale online with a B2B store customizable to each customer" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">
                                                <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                            <td data-original-title="Sell wholesale online with a B2B store customizable to each customer" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">
                                                <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                            <td data-original-title="Sell wholesale online with a B2B store customizable to each customer" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">
                                                <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                            <td data-original-title="Sell wholesale online with a B2B store customizable to each customer" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="background-color:#dff4f9;text-align:center">
                                                <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;" >Currencies</th>
                                            <td style="text-align:center;">Multiple</td>
                                            <td style="text-align:center;">Multiple</td>
                                            <td style="text-align:center;">Multiple</td>
                                            <td style="text-align:center;">Multiple</td>
                                            <td style="background-color:#dff4f9;text-align:center">Multiple</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;" >Warehouses</th>
                                            <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>  
                                            <?php
                                                $rows++;
                                                } else {
                                                    (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                }

                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            
                                                    <td  style="text-align:center;" data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at <?= $OutletsAddonPrice ?> per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_outlet)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td  style="text-align:center;" data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at <?= $OutletsAddonPrice ?> per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_outlet)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td  style="text-align:center;" data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at <?= $OutletsAddonPrice ?> per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_outlet)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td  style="text-align:center;" data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at <?= $OutletsAddonPrice ?> per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_outlet)  . "": " Multiple ") ?></td>
                                             <?php
                                            }
                                            ?>
                                            <td  style="background-color:#dff4f9;text-align:center">Multiple</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;" >Support Offering</th>
                                            <td data-original-title="Get in touch with our super awesome support team 24 hours a day, 7 days a week" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">24/7 Email</td>
                                            <td data-original-title="Get in touch with our super awesome support team 24 hours a day, 7 days a week" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">24/7 Email</td>
                                            <td data-original-title="Get in touch with our super awesome support team 24 hours a day, 7 days a week" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">24/7 Email</td>
                                            <td data-original-title="Get in touch with our super awesome support team 24 hours a day, 7 days a week" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">24/7 Email</td>
                                            <td data-original-title="Get in touch with our super awesome support team 24 hours a day, 7 days a week" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="background-color:#dff4f9;text-align:center">Multiple</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding: 7px 6.6%;">
                    *Coming soon
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-sm-12 inventory_plans_for_businesses">
                <div class="row">
                    <div class="inventory_pricing_table_div"><h2 class="require_more_business">
                        Plans for businesses that require more</h2>
                    </div>
                    <div class="row ">
                        <div class="col-sm-12 col-md-offset-1" style="padding-right: 24px;">
                            <div class="col-md-5 col-sm-5">
                                <div><a href="<?=$this->publicHtml;?>/signup?product=inv-on-premises"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-clouds-text.png" class="priceing_image_en" alt="Inventory Management Software"></a></div>
                                <div>
                                    <h4 class="entpricing_text_h">Need On Premises or Private Cloud</h4> <h4 class="entpricing_text_h" style="padding: 0 0px;">Setup for your business?</h4>
                                    <div class="buttons" style="text-align: center;padding: 18px 0 0px 0px;">
                                        <a class="enter_btn  blue_btn" href="<?=$this->publicHtml;?>/signup?product=inv-on-premises">CONTACT SALES TEAM</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div><a href="<?=$this->publicHtml;?>/signup?product=inv-tailormade"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta_tailor.png" class="priceing_image_eng" alt="Inventory Management Software"></a></div>
                                <div>
                                    <h4 class="entpricing_text_h">Need Tailormade plan for your business?</h4>
                                    <p class="entpricing_text_para">Get our custom made Enterprice plan to manage more and<br> more orders for bigger businesses!</p>
                                    <div class="buttons" style="text-align: center;">
                                        <a class="enter_btn  blue_btn" href="<?=$this->publicHtml;?>/signup?product=inv-tailormade">CONTACT SALES TEAM</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    How long do I get to try Asalta Inventory?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>You can sign up and try Asalta Inventory for its full capability for 14 days after which, you can
                                    to subscribe to a suitable pricing plan that fits your business needs.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Can I extend my 14-day free trial period?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>If you think 14 days are not enough to fully explore the system, we’re more than happy to extend your trial. Once your trial expires, contact our sales team by emailing them  at <a href="<?=$this->publicHtml;?>/support"> support@asalta.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Can I sign up for Asalta Enterprise?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Asalta Inventory is cloud-based inventory management software with complex automation, high security, and 24/7 support. To get started with Asalta Inventory Enterprise Package, Contact Sales send us an email at <a href="<?=$this->publicHtml;?>/support"> support@asalta.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Can I cancel my subscription?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Absolutely, while we’d hate to see you go, you can cancel the subscription at anytime.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Is my data secure with Asalta Inventory?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>100%. All your data is completely secure and we protect your account with high level of security in place. Our technical team constantly run security vulnerability scans and tests to make sure everything is safe and secure.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false">
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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Does Asalta Technologies offer a knowledge base?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseSeven" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>To help you get started with Asalta Inventory we provide an extensive knowledge base that consists of useful help articles and video tutorials.<a href="#"> Check it out here.</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    What are the modules in Asalta Inventory?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseEight" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Asalta  Inventory has different modules to cater to different areas of managing your stock.</p>
                                <ul>
                                    <li>Get the whole picture of your business with our smart Dashboard.</li>
                                    <li>Connect easily with your customers and vendors with Contacts.</li>
                                    <li>Record and manage your stock with Items and Category.</li>
                                    <li>Create bundles with Item combination.</li>
                                    <li>Document sales and send invoices.</li>
                                    <li>Restock your inventory with Purchase Orders.</li>
                                    <li>Generate real time and multi-perspective Reports.</li>
                                    <li>Expand your reach to new markets with Integrations, which connects your organization with popular online sales channels, providers, online payment gateways, accounting and CRM software.</li>
                                    <li>Tailor your organization to suit your needs and preferences with Settings.</li>
                                    <li>And much more… Start a FREE Trial to try out for yourself</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Is there a way to get the current status of my business at a glance?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseNine" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Get the complete overview of your organization at a glance with our Asalta smart dashboard, that gives you the synopsis of your items, sales and purchases. To further aid you with getting the bigger picture, most of the numerical data displayed in the dashboard is hot-wired with the associated module.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    What are the features available in Asalta Inventory?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseTen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Asalta Inventory supports the following features:</p>
                                <p><strong>Stock management:</strong></p>
                                <p>Creating and tracking the inventory (stock flow) of Items and Categories. Composite Items -Bundling of items. Serial Number Tracking - For tracking individual units of an item. Customize your item prices by creating price lists and assign them to your favorite customers, sales orders and invoices. FIFO, LIFO and Average cost method can be Selected, stock reports, sales, purchase and activity logs.
                                </p>
                                <p><strong>Customer and vendor management:</strong></p>
                                <p>Recording customer and vendor information for communication, monitoring and transaction. Smart interactive dashboard for a quick look at the Big Picture.  </p>

                                <p><strong>Order management:</strong></p>
                                <p>Create sales orders, raise invoices, get paid instantly by integrating a payment gateway, Manage reorders, create purchase orders, record deliveries to your warehouse using purchase receives.
                                </p>

                                <p><strong>Integrations:</strong></p>
                                <p>Integrate with popular e-commerce platforms and monitor your stock flow across multiple sales channels. Secure your money by integrating with time tested online payment gateways. Seamlessly integrate with our accounting platform.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    What are the different editions of Asalta Inventory?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseEleven" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>As of now we have 3 editions which are based on the country chosen by the user during the quick setup of the organization. The taxes are handled differently across different editions.
                                </p>
                                <p> Global edition - Tuned for the ever-changing conditions of the world, this edition will be applied to all users whose country is not the  Singapore or India.</p>
                                <p>Indian edition - available to users who have chosen their country as India during the quick setup of their organization.
                                    </p>
                                <p>Singapore  edition - available to users who have chosen their country as Singapore while signing up.</p>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    What are the different pricing plans?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseTwelve" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Each industry has its own needs and the volume of their needs is directly proportional to the scale of their business. To cater to your specific needs, we have an array of pricing plans. No hidden costs! No strings attached!
                                    You can take a look at our pricing plans by clicking on this <a href="https://www.asalta.com/sg/inventory/pricing"> Link</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThirteen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Does Asalta Inventory support barcode scanning?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseThirteen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Yes. Asalta Inventory supports barcode scanning in the web app.</p>

                                <p><strong>For Items:</strong></p>
                                <p>You have to key in the bar code of the item as the SKU of said item in Asalta Inventory manually or using a barcode scanner.</p>
                                <p>Open a new transaction like an Invoice.</p>
                                <p>Place your cursor on the Item Details field.</p>
                                <p>Scan the barcode of the item. You’ll see that the line item is automatically added.</p>
                                <p>Follow the above step to scan more items, which will be added consecutively</p>

                                <p><strong>For Serial Numbers:</strong></p>
                                <p>Barcode scanning feature can also be used on serial numbers In Invoices.</p>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFourteen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    How is stock tracking done in Asalta Inventory?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseFourteen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Physical Stock: In this mode, your stock will increase when a Purchase Receive is made, and the stock will decrease when an Invoice is made to the customer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFifteen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Does Asalta Inventory support expiry dates?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseFifteen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Yes. we do track Expiry Tracking.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSixteen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    How user friendly is Asalta Inventory ? Do we need any prior technical expertise?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseSixteen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>You don't need to be tech person in order to use Asalta Inventory. Our system is very simple and does not require technical training. Our simple dashboard allows you to handle all your business operations from a single place.
                                </p>
                                <p>Products and contacts can be added through spreadsheet imports. </p>
                                <p>Furthermore, your sales and purchase orders populate automatically with your data.
                                </p>
                                <p>Moreover, we also allow you to easily track and update your order status with a visual overview or generate reports depending on your needs.</p>
                                <p>Onboard Training videos and help manual is available for you to get started and to guide you if you need help anytime.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEightteen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Will I get the same discount every time?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseEightteen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>No. Your discount is applied only for one time purchase. If you choose to upgrade or downgrade your account you will not be eligible for anymore further discounts.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeventeen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Any other Questions?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseSeventeen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>If there’s anything else you’d like to know, <a href="#frequently_asked_questions"> please read our full FAQs</a> or <a href="#">talk to us</a> or Send us an email. Our team of specialists are available to discuss your business needs and answer any questions.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEighteen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    What are the Outlets (Warehouse)? Can I confirm that this is for Warehouse (stock locations)? and how about the "transfer to" locations?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseEighteen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Warehouse, Outlets are locations where inventory items (stocks) are physically kept and or sales activities are carried out. Each pricing plan comes with X number of locations. You can perform any number of transfers within the inventory limit of your plan. If you need additional locations you can buy those locations as add-ons. You will only be charged for active locations.</p>
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
