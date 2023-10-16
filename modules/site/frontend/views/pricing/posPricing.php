<?php

use app\models\CommonModel;
use components\helper\PricingHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $MonthlyPlan app\modules\site\frontend\models\PlanModel */
/* @var $YearlyPlan app\modules\site\frontend\models\PlanModel */
/* @var $TrialPlan app\modules\site\frontend\models\PlanModel */
/* @var $MonthlyPackages app\modules\site\frontend\models\InventoryPackageModel */
/* @var $YearlyPackages app\modules\site\frontend\models\InventoryPackageModel */
/* @var $AddonsModels \app\models\ImsAddons */
/* @var $TrialPackage app\modules\site\frontend\models\InventoryPackageModel */
/* @var $country string */
/* @var $countryShortCode string */
/* @var $currencyName string */
/* @var $currencyCode string */
/* @var $currencySymbol string */

//$this->title = "POS Pricing - My Asalta";
//$this->registerCssFile(Yii::$app->urlManager->createAbsoluteUrl("css/inventory_pricing.css"));
//$this->registerJsFile(Yii::$app->urlManager->createAbsoluteUrl("js/pricing.js"), ['depends' => [\yii\web\JqueryAsset::className()], 'position' => \yii\web\View::POS_END]);

$this->registerCss("
    .monthlyPlanInput, .price-value-monthly{
        display:none;
    }
    .pricingTable.disabled{
        opacity:0.5;
    }
    @media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 4) {
        .table-scroll th, .table-scroll td {
            padding: 8px 13px !important;
        }
    }
    @media only screen and (min-device-width: 320px) and (max-device-width: 568px) and (-webkit-min-device-pixel-ratio: 2) {
        .table-scroll th, .table-scroll td {
        padding:8px 28px !important;
        }
    }
    @media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) { 
        .table-scroll th, .table-scroll td {
        padding:8px 17px !important;
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
        padding:8px 15px;
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
     .strikethrough{
        color:#a9a9a9 !important;
    }
    .strikethrough_monthly{
        color:#a9a9a9 !important; 
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
        <section>
            <div class="panel-body" id="pricingPlanDiv">
                <div class="row pricingSection pos_pricing_plan">
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
                                <button id="twelve_monthly-plan" style="width:41%;" type="button" class="pricebutton pricebutton_act btn-text-1" data-plan-id="<?/*= $YearlyPlan->planid */?>">
                                    Annual <br>
                                    <?php /*if($country == 'Global'){ */?>
                                        <span class="button-text-1" data-plan-id="10">SAVE up to 30% </span>
                                    <?php /*}else { */?>
                                    <span class="button-text-1" data-plan-id="10">SAVE up to 30% </span>
                                <?php /*} */?>
                                </button>
                            </div>
                            <div class="col-sm-6 monthly-plan" id="mbutt" style="padding-bottom: 2%; padding-top: 14px;">
                                <button id="monthly-plan" style="width:41%; " type="button" class="pricebutton  btn-text-2" data-plan-id="<?/*= $MonthlyPlan->planid */?>">
                                    Monthly <br> <span class="button-text-2">pay as you use</span></button>
                                <input type="hidden" name="plan_id" value="<?/*= $YearlyPlan->planid */?>"/>
                            </div>-->
                        </div>
                        <div class="pos_pricing_restable crm_pricing_plan ">
                            <div class="row">
                                <?php
                                if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows] && false) {
                                    ?>
                                    <div class="col-md-2 col-sm-6 pos_pricing_table_div col_md_sm_2_5">
                                        <div class="pricingTable ">
                                            <div class="pricingTable-header"><h3>Start Up</h3>
                                            </div>
                                            <div class="price-value">
                                                <span>FREE <br/> Forever</span>
                                                <span class="subtitle" style="padding: 10px 0px 0px">per month</span>
                                                <span class="subtitle">billed annually</span>
                                            </div>
                                            <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=pos")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                            <div class="pricingContent">
                                                <ul class="monthlyPlanInput">
                                                    <li><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0) ? $MonthlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                                    <li><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0) ? $MonthlyPackages[$rows]->numof_outlet . "  Outlet" : " Multiple  Outlet") ?></li>
                                                    <li><?= ($MonthlyPackages[$rows]->numof_pos_receipts == 0) ? " - " : (($MonthlyPackages[$rows]->numof_pos_receipts > 0) ? Yii::$app->formatter->asInteger ($MonthlyPackages[$rows]->numof_pos_receipts) . "  Sales a month" : " Multiple  Sales a month ") ?></li>
                                                    <li><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0) ? $MonthlyPackages[$rows]->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li>
                                                    <li><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger ($MonthlyPackages[$rows]->numberof_items) . " SKU" : " Multiple SKU ") ?></li>
                                                </ul>
                                                <ul class="yearlyPlanInput">
                                                    <li><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0) ? $YearlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                                    <li><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . "  Outlet" : " Multiple  Outlet") ?></li>
                                                    <li><?= ($YearlyPackages[$rows]->numof_pos_receipts == 0) ? " - " : (($YearlyPackages[$rows]->numof_pos_receipts > 0) ? Yii::$app->formatter->asInteger ($YearlyPackages[$rows]->numof_pos_receipts) . "  Sales a month" : " Multiple  Sales a month ") ?></li>
                                                    <li><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li>
                                                    <li><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger( $YearlyPackages[$rows]->numberof_items) . " SKU" : " Multiple SKU ") ?></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="monthlyPlanInput planPackageInputs col-md-12" style="margin-top: 25px;">
                                            <div class="square-blue single-row">
                                                <div class="col-md-offset-5 col-md-5 radio">
                                                    <input type="radio" name="package_id"
                                                           value="<?= $MonthlyPackages[$rows]->inventory_packageid ?>"
                                                           class="icheck" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="yearlyPlanInput planPackageInputs col-md-12" style="margin-top: 25px;">
                                            <div class="square-blue single-row">
                                                <div class="col-md-offset-5 col-md-5 radio">
                                                    <input type="radio" name="package_id"
                                                           value="<?= $YearlyPackages[$rows]->inventory_packageid ?>"
                                                           class="icheck" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    $rows++;
                                } else {
                                    echo "<div class='col-md-2'></div>";
                                    (count($MonthlyPackages) == 4) ? $rows++ : false;
                                }

                                if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]) {
                                    ?>
                                    <div class="col-md-2 col-sm-6 pos_pricing_table_div col_md_sm_2_5">
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
                                                            'id' => $MonthlyPackages[$rows]->inventory_packageid,
                                                            'product' => 'POS',
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
                                                            'product' => 'POS',
                                                        ],
                                                    ],
                                                    'class' => "hrm_signup_btn btn-success",
                                                    'style' => "padding: 10px 47px;",
                                                ]); ?>
                                            </div>
                                            <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=pos")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                            <div class="pricingContent">
                                                <ul class="monthlyPlanInput">
                                                    <li data-original-title="inclusive of 2 users Additional users will be charged at $xxx.xx" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0) ? $MonthlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                                    <li><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0) ? $MonthlyPackages[$rows]->numof_outlet . "  Outlet" : " Multiple  Outlet") ?></li>
                                                    <li><?= ($MonthlyPackages[$rows]->numof_pos_receipts == 0) ? " - " : (($MonthlyPackages[$rows]->numof_pos_receipts > 0) ?Yii::$app->formatter->asInteger( $MonthlyPackages[$rows]->numof_pos_receipts) . "  Sales a month" : " Multiple  Sales a month ") ?></li>
                                             <!--        <li><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0) ? $MonthlyPackages[$rows]->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li> -->
                                             <li>Advanced Promotions & <br> Gift Cards </li>
                                                    <li><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items)  . " SKU" : " Multiple SKU ") ?></li>
                                                    <li>
                                                        <br>
                                                    </li>
                                                </ul>
                                                <ul class="yearlyPlanInput">
                                                    <li data-original-title="inclusive of 2 users Additional users will be charged at $xxx.xx" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0) ? $YearlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                                    <li><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . "  Outlet" : " Multiple  Outlet") ?></li>
                                                    <li><?= ($YearlyPackages[$rows]->numof_pos_receipts == 0) ? " - " : (($YearlyPackages[$rows]->numof_pos_receipts > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_pos_receipts) . "  Sales a month" : " Multiple  Sales a month ") ?></li>
                                                 <!--    <li><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li> -->
                                                    <li>Promotions & Gift Cards </li>
                                                    <li><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items) . " SKU" : " Multiple SKU ") ?></li>
                                                    <li>
                                                        <br>
                                                        <br>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $rows++;
                                }
                                if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]) {
                                    ?>
                                    <div class="col-md-2 col-sm-6 pos_pricing_table_div col_md_sm_2_5">
                                        <div class="pricingTable ">
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
                                                            'id' => $MonthlyPackages[$rows]->inventory_packageid,
                                                            'product' => 'POS',
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
                                                            'product' => 'POS',
                                                        ],
                                                    ],
                                                    'class' => "hrm_signup_btn btn-success",
                                                    'style' => "padding: 10px 47px;",
                                                ]); ?>
                                            </div>
                                            <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=pos")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                            <div class="pricingContent">
                                                <ul class="monthlyPlanInput">
                                                    <li data-original-title="inclusive of 2 users Additional users will be charged at $xxx.xx" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0) ? $MonthlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                                    <li><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0) ? $MonthlyPackages[$rows]->numof_outlet . "  Outlet" : " Multiple  Outlet") ?></li>
                                                    <li><?= ($MonthlyPackages[$rows]->numof_pos_receipts == 0) ? " - " : (($MonthlyPackages[$rows]->numof_pos_receipts > 0) ?Yii::$app->formatter->asInteger( $MonthlyPackages[$rows]->numof_pos_receipts) . "  Sales a month" : " Multiple  Sales a month ") ?></li>
                                             <!--        <li><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0) ? $MonthlyPackages[$rows]->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li> -->
                                             <li>Advanced Promotions & <br> Gift Cards </li>
                                                    <li><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items)  . " SKU" : " Multiple SKU ") ?></li>
                                                    <li>
                                                        <br>
                                                        
                                                    </li>
                                                </ul>
                                                <ul class="yearlyPlanInput">
                                                    <li data-original-title="inclusive of 2 users Additional users will be charged at $xxx.xx" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0) ? $YearlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                                    <li><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . "  Outlet" : " Multiple  Outlet") ?></li>
                                                    <li><?= ($YearlyPackages[$rows]->numof_pos_receipts == 0) ? " - " : (($YearlyPackages[$rows]->numof_pos_receipts > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_pos_receipts) . "  Sales a month" : " Multiple  Sales a month ") ?></li>
                                                 <!--    <li><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li> -->
                                                    <li>Advanced Promotions & <br> Gift Cards </li>
                                                    <li><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items) . " SKU" : " Multiple SKU ") ?></li>
                                                    <li>
                                                        <br>
                                                        
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $rows++;
                                }
                                if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]) {
                                    ?>
                                    <div class="col-md-2 col-sm-6 pos_pricing_table_div col_md_sm_2_5">
                                        <div class="ribbon_pricing"><span>POPULAR</span></div>
                                        <div class="pricingTable smallbudiness-popular ">
                                            <div class="pricingTable-header"><h3>Large</h3>
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
                                                            'product' => 'POS',
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
                                                            'product' => 'POS',
                                                        ],
                                                    ],
                                                    'class' => "hrm_signup_btn btn-success",
                                                    'style' => "padding: 10px 47px;",
                                                ]); ?>
                                            </div>
                                            <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=pos")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                            <div class="pricingContent">
                                                <ul class="monthlyPlanInput">
                                                    <li data-original-title="inclusive of 2 users Additional users will be charged at $xxx.xx" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0) ? $MonthlyPackages[$rows]->numof_user   . " Users" : " Multiple Users ") ?></li>
                                                    <li><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0) ? $MonthlyPackages[$rows]->numof_outlet . "  Outlet" : " Multiple  Outlet") ?></li>
                                                    <li><?= ($MonthlyPackages[$rows]->numof_pos_receipts == 0) ? " - " : (($MonthlyPackages[$rows]->numof_pos_receipts > 0) ? Yii::$app->formatter->asInteger ($MonthlyPackages[$rows]->numof_pos_receipts) . "  Sales a month" : " Multiple  Sales a month ") ?></li>
                                                  <!--   <li><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0) ? $MonthlyPackages[$rows]->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li> -->
                                                    <li>Accounting Integration</li>
                                                    <li>Advanced Promotions & <br> Gift Cards </li>
                                                    <li><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items)  . " SKU" : " Multiple SKU ") ?></li>
                                                </ul>
                                                <ul class="yearlyPlanInput">
                                                    <li data-original-title="inclusive of 2 users Additional users will be charged at $xxx.xx" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0) ? $YearlyPackages[$rows]->numof_user . " Users" : " Multiple Users ") ?></li>
                                                    <li><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . "  Outlet" : " Multiple  Outlet") ?></li>
                                                    <li><?= ($YearlyPackages[$rows]->numof_pos_receipts == 0) ? " - " : (($YearlyPackages[$rows]->numof_pos_receipts > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_pos_receipts) . "  Sales a month" : " Multiple  Sales a month ") ?></li>
                                                    <li>Accounting Integration</li>
                                                   <!--  <li><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li> -->
                                                    <li>Advanced Promotions & <br> Gift Cards </li>
                                                    <li><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . " SKU" : " Multiple SKU ") ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-offset-1" style="padding: 10px 11%;">
                            <p class="pricing_text_scale">  All Prices in <?= $currencyCode ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="buttons" style="text-align: center;padding-bottom:45px;"><a href="#pos_compareplane" class="hrm_enter_btn hrm_blue_btn" id="hrm_comberplane">Compare Plans</a></div>
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
            <div class="col-sm-12 pos_comperplan">
                <div id="pos_compareplane" >
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
                                            <th class="fixed-side" scope="col" style="text-align:center;border-bottom-width: 1px!important;background-color:#fafafa">Features</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;background-color:#fafafa">Small</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;background-color:#fafafa">Medium</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;background-color:#fafafa">Large</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Billed Annually</th>
                                            <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>

                                                <?php
                                                    $rows++;
                                                    }
                                                    else {
                                                        (count($MonthlyPackages) == 4) ? $rows++ : false;
                                                    }
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                <td style="text-align: center;"><?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:14px;"><?= $currencySymbol. $tempValue[0];?></span> per month billed annually
                                                </td>
                                                    <?php
                                                        $rows++;
                                                    }
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td style="text-align: center;"><?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:14px;"><?= $currencySymbol. $tempValue[0];?></span> per month billed annually
                                                </td>
                                                    <?php
                                                        $rows++;
                                                    }
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td style="text-align: center;"><?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:14px;"><?= $currencySymbol. $tempValue[0];?></span> per month billed annually
                                                </td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side"  style="background-color:#fafafa">Billed Monthly</th>
                                            <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $MonthlyPackages[$rows]) && false ) {
                                                ?>

                                                <?php
                                                    $rows++;
                                                    } else {
                                                        (count($MonthlyPackages) == 4) ? $rows++ : false;
                                                    }

                                                        if(isset( $MonthlyPackages[$rows])) {
                                                    ?>
                                                <td style="text-align: center;"><?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:14px;"><?= $currencySymbol. $tempValue[0];?></span> billed monthly
                                                </td>
                                                <?php
                                                        $rows++;
                                                    }
                                                        if(isset( $MonthlyPackages[$rows])) {
                                                ?>
                                                <td style="text-align: center;"><?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:14px;"><?= $currencySymbol. $tempValue[0];?></span> billed monthly
                                                </td>
                                                    <?php
                                                        $rows++;
                                                    }
                                                        if(isset( $MonthlyPackages[$rows])) {
                                                    ?>
                                                <td style="text-align: center;"><?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:14px;"><?= $currencySymbol. $tempValue[0];?></span> billed monthly
                                                </td>
                                                    <?php
                                                        $rows++;
                                                    }
                                                        if(isset( $MonthlyPackages[$rows])) {
                                                    ?>
                                                <td style="text-align: center;"><?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:14px;"><?= $currencySymbol. $tempValue[0];?></span> billed monthly
                                                </td>
                                                <?php
                                                }
                                            ?>
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
                                        </tr>
                                        <tr>
                                            <th class="fixed-side"  style="background-color:#fafafa">Outlet</th>
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
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . "" : " Multiple") ?>
                                            </td>
                                            <?php
                                                 $rows++;
                                            }
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . "" : " Multiple") ?>
                                            </td>
                                            <?php
                                                $rows++;
                                            }
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . "" : " Multiple") ?>
                                            </td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side"  style="background-color:#fafafa">Sales a month</th>
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
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_pos_receipts == 0) ? " - " : (($YearlyPackages[$rows]->numof_pos_receipts > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_pos_receipts) . "  " : " Multiple") ?></td>
                                            <?php
                                                    $rows++;
                                                }
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_pos_receipts == 0) ? " - " : (($YearlyPackages[$rows]->numof_pos_receipts > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_pos_receipts) . "  " : " Multiple") ?></td>
                                            <?php
                                                    $rows++;
                                                }
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_pos_receipts == 0) ? " - " : (($YearlyPackages[$rows]->numof_pos_receipts > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_pos_receipts) . "  " : " Multiple") ?></td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Advanced Promotions & Gift Cards</th>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Accounting Integration</th>
                                            <td style="text-align: center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align: center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
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
            <div class="panel-body">
                <div class="col-sm-12 pos_plans_for_businesses">
                    <div class="row">
                        <div class="inventory_pricing_table_div"><h2 class="require_more_business">
                            Plans for businesses that require more
                        </h2></div>
                        <div class="row ">
                            <div class="col-sm-12 col-md-offset-1" style="padding-right: 24px;">
                                <div class="col-md-5 col-sm-5">
                                    <div><a href="<?=$this->publicHtml;?>/signup?product=pos-on-premises"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-clouds-text.png" class="priceing_image_en" alt="Inventory Management Software"></a></div>
                                    <div>
                                        <h4 class="entpricing_text_h">Need On Premises or Private Cloud</h4> <h4 class="entpricing_text_h" style="padding: 0 0px;">Setup for your business?</h4>
                                        <div class="buttons" style="text-align: center;padding: 18px 0 0px 0px;">
                                            <a class="enter_btn  blue_btn" href="<?=$this->publicHtml;?>/signup?product=pos-on-premises">CONTACT SALES TEAM</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <div><a href="<?=$this->publicHtml;?>/signup?product=pos-tailormade"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta_tailor.png" class="priceing_image_eng" alt="Inventory Management Software"></a></div>
                                    <div>
                                        <h4 class="entpricing_text_h">Need Tailormade plan for your business?</h4>
                                        <p class="entpricing_text_para">Get our custom made Enterprice plan to manage more and<br> more orders for bigger businesses!</p>
                                        <div class="buttons" style="text-align: center;">
                                            <a class="enter_btn  blue_btn" href="<?=$this->publicHtml;?>/signup?product=pos-tailormade">CONTACT SALES TEAM</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="asalta-faq" id="frequently_asked_questions">
                    <h3>Frequently asked questions</h3>
                </div>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default" style="border-top: 1px solid #ddd !important">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    How long do I get to try Asalta POS?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>You can sign up and try Asalta POS for its full capability for 14 days after which, you can to subscribe to a suitable pricing plan that fits your business needs.</p>
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
                                <p>If you think 14 days are not enough to fully explore the system, we’re more than happy to extend your trial. Once your trial expires, contact our sales team by emailing them  at <a href="#">sales@asalta.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                     Can I sign up for Asalta Enterprise ?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Asalta POS is cloud-based POS management software with complex automation, high security, and 24/7 support. To get started with Asalta Inventory Enterprise Package, Contact Sales send us an email at <a href="#">sales@asalta.com</a></p>
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
                                     Is my data secure with Asalta POS?
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
                                <p>To help you get started with Asalta POS we provide an extensive knowledge base that consists of useful help articles and video tutorials. <a href="#"> Check it out here </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                  What are the modules in Asalta POS?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseEight" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Asalta  Inventory has different modules to cater to different areas of managing your stock.</p>
                                <ul>
                                    <li>Get the whole picture of your business with our smart Dashboard.</li>
                                    <li>Connect easily with your customers and vendors with Contacts.</li>
                                    <li>Record your sales with Point of sales system and send receipts to customers.</li>
                                    <li>Record and manage your stock with Items and Category.</li>
                                    <li>Create bundles with Item combination.</li>
                                    <li>Manage return sales made by customers. </li>
                                    <li>Restock your inventory with Purchase Orders.</li>
                                    <li>Generate real time and multi-perspective Reports.</li>
                                    <li>Expand your reach to new markets with Integrations, which connects your organization with popular online sales channels, providers, online payment gateways, accounting and CRM software.</li>
                                    <li>Tailor your organization to suit your needs and preferences with Settings.</li>
                                    <li>And much more… Start a FREE Trial to try out for yourself.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                     Is there a way to get the current status of my business at a glance?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseTen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Get the complete overview of your organization at a glance with our Asalta smart dashboard, that gives you the synopsis of your items, sales and purchases. To further aid you with getting the bigger picture, most of the numerical data displayed in the dashboard is hot-wired with the associated module.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    What are the features available in Asalta POS?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseEleven" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Asalta POS supports the following features:</p>
                                <p><strong>Stock management:</strong></p>
                                <p>Creating and tracking the inventory (stock flow) of Items and Categories. Composite Items -Bundling of items. Serial Number Tracking - For tracking individual units of an item. Customize your item prices by creating price lists and assign them to your favorite customers, sales orders and invoices. FIFO, LIFO and Average cost method can be Selected, stock reports, sales, purchase and activity logs.</p>
                                <p><strong>Customer and vendor management:</strong></p>
                                <p> Recording customer and vendor information for communication, monitoring and transaction. Smart interactive dashboard for a quick look at the Big Picture.</p>
                                <p>Cash Management Reduce errors, theft and discrepancies by recording all changes from cash float to register closures. Handle cash withdrawals with ease.</p>
                                <p><strong>Register closure reports</strong></p>
                                <p> Get a printable record of your daily totals. Add notes about the day and check your totals by payment type</p>
                                <p><strong>Return sales</strong></p>
                                <p>Tracks the return sales made and also tracks the return goods inventory </p>
                                <p><strong>Integrations:</strong></p><p> Integrate with popular e-commerce platforms and monitor your stock flow across multiple sales channels. Secure your money by integrating with time tested online payment gateways. Seamlessly integrate with our accounting platform.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    What are the different editions of Asalta POS?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseTwelve" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>As of now we have 3 editions which are based on the country chosen by the user during the quick setup of the organization. The taxes are handled differently across different editions.</p>
                                <p>Global edition - Tuned for the ever-changing conditions of the world, this edition will be applied to all users whose country is not the  Singapore or India.</p>
                                <p>Indian edition - available to users who have chosen their country as India during the quick setup of their organization.</p>
                                <p>Singapore  edition - available to users who have chosen their country as Singapore while signing up.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThirteen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                     What are the different pricing plans?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseThirteen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Each industry has its own needs and the volume of their needs is directly proportional to the scale of their business. To cater to your specific needs, we have an array of pricing plans. No hidden costs! No strings attached!</p>
                                <p>You can take a look at our pricing plans by  <a href="#pricingPlanDiv"> clicking on this Link </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwentytwo" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Does Asalta POS support barcode scanning?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseTwentytwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Yes. Asalta POS supports barcode scanning in the web app.</p>
                                <p><strong>For Items:</strong></p>
                                <p>You have to key in the bar code of the item as the SKU of said item in Asalta POS manually or using a barcode scanner.</p>
                                <p>Open a new transaction like an Invoice.</p>
                                <p>Place your cursor on the Item Details field.</p>
                                <p>Scan the barcode of the item. You’ll see that the line item is automatically added.</p>
                                <p>Follow the above step to scan more items, which will be added consecutively</p>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFourteen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                   I have thousands of existing printed barcodes from my old POS, can I use these with Asalta POS?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseFourteen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Yes. Existing barcodes can be scanned into the SKU field in the product page, so you won’t have to generate new ones from scratch.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFifteen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    How is stock tracking done in Asalta POS?

                                </h4>
                            </div>
                        </a>
                        <div id="collapseFifteen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Physical Stock: In this mode, your stock will increase when a Purchase Receive is made, and the stock will decrease when an Invoice is made to the customer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSixteen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Does Asalta POS support expiry dates?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseSixteen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Yes. we do track Expiry Tracking.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeventeen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    How user friendly is Asalta POS ? Do we need any prior technical expertise?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseSeventeen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>You don't need to be tech person in order to use Asalta POS. Our system is very simple and does not require technical training. Our simple dashboard allows you to handle all your business operations from a single place.</p>
                                <p>Products and contacts can be added through spreadsheet imports. </p>
                                <p>Furthermore, your sales and purchase orders populate automatically with your data.</p>
                                <p>Moreover, we also allow you to easily track and update your order status with a visual overview or generate reports depending on your needs.</p>
                                <p>Onboard Training videos and help manual is available for you to get started and to guide you if you need help anytime.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEighteen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                   I love our accounting software, does it integrate with Asalta POS?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseEighteen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Asalta POS works great with Xero and Quickbooks online accounting. Data flows seamlessly between your POS and accounting software giving you greater insights into your business performance and eliminating the need for manual data entry. The integration is simple to set up and free to use, check out more information here.  If you need further integration with any other accounting software that allows integration do contact our <a href="<?=$this->publicHtml;?>/support"> support@asalta.com.</a> we are happy to help.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseNineteen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Does Asalta POS handle returns?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseNineteen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Yes. You can return any order and Asalta POS will handle Returns and  synchronize it with Xero, Quickbooks accounting system</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwenty" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Does Asalta POS support consignment?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseTwenty" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Yes. Because we allow for multiple locations, you can assign stocks to each location and sell as consignment.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwentythree" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Will I get the same discount every time?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseTwentythree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>No. Your discount is applied only for one time purchase. If you choose to upgrade or downgrade your account you will not be eligible for anymore further discounts.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwentyone" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Any other Questions?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseTwentyone" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>If there’s anything else you’d like to know, please read our full <a href="#frequently_asked_questions">please read our full FAQs</a> or <a href="#">talk to us</a> or Send us an email. Our team of specialists are available to discuss your business needs and answer any questions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12 pos_plans_for_businesses">
                    <div class="row">
                        <div class="inventory_pricing_table_div"><h2 class="require_more_business">
                            Plans for businesses that require more
                        </h2></div>
                        <div class="row ">
                            <div class="col-sm-12 col-md-offset-1" style="padding-right: 24px;">
                                <div class="col-md-5 col-sm-5">
                                    <div><a href="<?=$this->publicHtml;?>/signup?product=pos-on-premises"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-clouds-text.png" class="priceing_image_en" alt="Inventory Management Software"></a></div>
                                    <div>
                                        <h4 class="entpricing_text_h">Need On Premises or Private Cloud</h4> <h4 class="entpricing_text_h" style="padding: 0 0px;">Setup for your business?</h4>
                                        <div class="buttons" style="text-align: center;padding: 18px 0 0px 0px;">
                                            <a class="enter_btn  blue_btn" href="<?=$this->publicHtml;?>/signup?product=pos-on-premises">CONTACT SALES TEAM</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <div><a href="<?=$this->publicHtml;?>/signup?product=pos-tailormade"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta_tailor.png" class="priceing_image_eng" alt="Inventory Management Software"></a></div>
                                    <div>
                                        <h4 class="entpricing_text_h">Need Tailormade plan for your business?</h4>
                                        <p class="entpricing_text_para">Get our custom made Enterprice plan to manage more and<br> more orders for bigger businesses!</p>
                                        <div class="buttons" style="text-align: center;">
                                            <a class="enter_btn  blue_btn" href="<?=$this->publicHtml;?>/signup?product=pos-tailormade">CONTACT SALES TEAM</a>
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
 });
");

