<?php

use app\assets\ResourcesAsset;
use app\models\CommonModel;
use components\helper\PricingHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\site\frontend\models\InventoryPackageModel;


/* @var $this yii\web\View */
/* @var $MonthlyPlan app\modules\site\frontend\models\PlanModel */
/* @var $YearlyPlan app\modules\site\frontend\models\PlanModel */
/* @var $InvMonthlyPackages app\modules\site\frontend\models\InventoryPackageModel[] */
/* @var $InvYearlyPackages app\modules\site\frontend\models\InventoryPackageModel[] */
/* @var $AddonsModels app\modules\site\frontend\models\ImsAddons[] */
/* @var $country string */
/* @var $countryShortCode string */
/* @var $currencyName string */
/* @var $currencyCode string */
/* @var $currencySymbol string */

$this->registerCss('
    .monthlyPlanInput,
    .price-value-monthly {
        display: none;
    }
    
    .pricing_padding {
        padding: 9px;
    }
    
    .pricingTable.disabled {
        opacity: 0.5;
    }

    .sales-orders {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100px;
    }
    
    @media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 2) {
        .table-scroll th,
        .table-scroll td {
            padding: 8px 13px !important;
        }
        .sales-orders {
            display: flex;
            justify-content: space-around;
            height: 100px;
            flex-direction: column;
            align-items: center;
        }
    }
    
    @media screen and (device-width: 320px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 3) {
        .table-scroll th,
        .table-scroll td {
            padding: 8px 20px !important;
        }
        .sales-orders {
            display: flex;
            justify-content: space-around;
            height: 100px;
            flex-direction: column;
            align-items: center;
        }
    }
    
    @media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 4) {
        .table-scroll th,
        .table-scroll td {
            padding: 8px 20px !important;
        }
        .sales-orders {
            display: flex;
            justify-content: space-around;
            height: 100px;
            flex-direction: column;
            align-items: center;
        }

    }
    
    @media only screen and (min-device-width: 320px) and (max-device-width: 568px) and (-webkit-min-device-pixel-ratio: 2) {
        .table-scroll th,
        .table-scroll td {
            padding: 8px 20px !important;
        }
        .sales-orders {
            display: flex;
            justify-content: space-around;
            height: 100px;
            flex-direction: column;
            align-items: center;
        }
    }
    
    @media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) {
        .table-scroll th,
        .table-scroll td {
            padding: 8px 13px !important;
        }
        .sales-orders {
            display: flex;
            justify-content: space-around;
            height: 100px;
            flex-direction: column;
            align-items: center;
        }
    }
    
    @media only screen and (min-device-width: 414px) and (max-device-width: 736px) and (-webkit-min-device-pixel-ratio: 3) {
        .table-scroll th,
        .table-scroll td {
            padding: 8px 18px !important;
        }
        .sales-orders {
            display: flex;
            justify-content: space-around;
            height: 100px;
            flex-direction: column;
            align-items: center;
        }
    }
    
    @media only screen and (min-width: 1200px) and (max-width:1331px) {
        .pricing_padding {
            padding: 0px 0px;
        }
    }
    
    .table-scroll {
        position: relative;
        max-width: 90%;
        margin: auto;
        overflow: hidden;
        border: 1px solid #ddd;
    }
    
    .table-wrap {
        width: 100%;
        overflow: auto;
    }
    
    .table-scroll table {
        width: 100%;
        margin: auto;
        border-spacing: 0;
    }
    
    .table-scroll th,
    .table-scroll td {
        padding: 8px 17px;
        border: 1px solid #ddd;
        background: #fff;
        vertical-align: top;
        text-align: center;
    }
    
    .table-scroll thead,
    .table-scroll tfoot {
        background: #f9f9f9;
    }
    
    .clone {
        position: absolute;
        top: 0;
        left: 0;
        pointer-events: none;
    }
    
    .clone th,
    .clone td {
        visibility: hidden
    }
    
    .clone td,
    .clone th {
        border-color: transparent
    }
    
    .clone tbody th {
        visibility: visible;
        color: #000;
    }
    
    .strikethrough {
        color: #a9a9a9 !important;
    }
    
    .strikethrough_monthly {
        color: #a9a9a9 !important;
    }
    
    .clone .fixed-side {
        border: 1px solid #ddd;
        background: #eee;
        visibility: visible;
    }
    
    table {
        border: 1px solid #ddd;
    }
    
    .clone thead,
    .clone tfoot {
        background: transparent;
    }
    
    .dropdown:hover .dropdown-menu {
        display: block;
    }
    
    .dropdown-menu {
        margin-top: 0;
    }
    
    .sales-orders li.dropdown {
        list-style-type: none;
    }
    
    .sales-orders .dropdown-menu>.active>a,
    .sales-orders .dropdown-menu>.active>a:hover,
    .sales-orders .dropdown-menu>.active>a:focus {
        color: #000;
        text-decoration: none;
        background-color: #f3f3f3;
        outline: 0;
    }
    
    .sales-orders-types {
        padding-right: 10px
    }
    
    .FeaturesContent .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 5px;
        bottom: 2px;
        background-color: #808080;
        -webkit-transition: .4s;
        transition: .4s;
    }
    
    .FeaturesContent .slider.active:before {
        background-color: #c02434;
    }
    
    .FeaturesContent .slider.round {
        border-radius: 34px;
        border: 2px solid #808080;
    }
    
    .FeaturesContent .slider.round.active {
        border-radius: 34px;
        border: 2px solid #c02434;
    }
    
    .toggle-wrapper {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        max-width: 180px;
        margin: 0 10% 0 auto;
    }
    
    .panel {
        margin-bottom: 0px;
    }
    
    .FeaturesContent .switch {
        float: left;
        width: 45px;
        height: 20px;
        margin-right: 5px;
    }
    
    .FeaturesContent .slider:before {
        height: 12px;
        width: 12px;
        left: 2px;
    }
    
    .panel-heading a {
        color: #000;
        text-decoration: none;
        padding: 5px;
        width: 100%;
        display: table-cell;
        vertical-align: middle;
    }
    
    .panel-heading {
        padding: 10px 5px;
    }
    
    #tier2,
    #tier3, #tier4 {
        display: none;
    }
    
    #tier1,
    #tier2,
    #tier3, #tier4	{
        list-style: none;
    }
    
    .collapse.in {
        display: block;
    }
    /* Icon when the collapsible content is shown */
    
    /*.sublink:after {
        font-family: "Glyphicons Halflings";
        content: "\e114";
        float: right;
        margin-left: 15px;
        font-weight: 100;
      }*/
    
    
    /* Icon when the collapsible content is hidden */
    
    
    /*.sublink.collapsed:after {
        content: "\e114";
      }*/
    
    .sublink {
        width: 100%;
        font-size: 16px;
        font-weight: 600;
        padding: 5px;
    }
    
    .sales-orders .asalta-black {
        background-color: #fff;
        border: 1px solid #2989d8;
        padding: 8px 15px;
    }
    
    .sales-orders .dropdown-menu {
        background-color: #fff;
        border: 1px solid #2989d8;
        margin-top: -1px;
    }
    
    .FeaturesContent .panel {
        border-bottom: 3px solid transparent;
    }
    
    .FeaturesContent .panel-default>.panel-heading {
        min-height: 50px;
        /*display: flex;
            align-items: center;*/
    }
    
    .asalta-black span {
        margin-right: 10px;
    }
    
    .subplans .panel-body {
        padding-left: 0px;
    }
    
    .pricing-info--stick {
        /* Translate back to 0%; */
        position: fixed;
        z-index: 1;
        background-color: #fff;
        border: 1px solid #cacaca;
        -webkit-transform: translateY(0%);
        -ms-transform: translateY(0%);
        transform: translateY(0%);
        top: 55px;
        /*word-wrap:break-word;*/
        box-shadow: 0px 20px 20px -15px #b31b1d;
        transition-property: all;
	    transition-duration: 2s;
	    transition-timing-function: cubic-bezier(0, 1, 0.5, 1);

    }
    
    .pricing-info--stick .price-value{
        padding:0px;
        margin-bottom:0px;
    }
    
    span.green-tick {
        font-size: 10px;
        color: green;
    }
    
    input.numof_employees{
        width:100%;
    }
');
$SalesFunnelsAddonPrice = CommonModel::CurrencyFormat($AddonsModels['Sales Funnels']->priced_monthly, $currencySymbol, 0);
$EmailMarketingAddonPrice = CommonModel::CurrencyFormat($AddonsModels['Email Marketing']->priced_monthly, $currencySymbol, 0);
$StorageAddonPrice = CommonModel::CurrencyFormat($AddonsModels['Storage']->priced_monthly, $currencySymbol, 0);
?>
<div class="wrapper" style="background-color: #fff;">
    <div class="row">
        &nbsp;
    </div>
    <?php $form = ActiveForm::begin(['options' => ['role'=> "form", 'autocomplete' => "off"],]); ?>
    <section >
        <div class="panel-body">
            <div class="row pricingSection inventory_pricing_plan ">
            <div class="row">
                <div class="col-md-12">
                   <!-- <div class="sales-orders">
                        <span class="sales-orders-types">Show pricing for business with monthly sales orders </span>
                        <li class="dropdown">
                            <span>Show pricing for business with monthly sales orders </span>
                            <button class="dropdown-toggle asalta-button asalta-black" data-toggle="dropdown"><span>less than 4,000 month</span> <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                            <ul class="dropdown-menu">
                                <li class="orders-item asalta-button active"><a href="#" data-tier="#tier1">less than 4,000 month </a></li>
                                <li class="orders-item asalta-button"><a href="#" data-tier="#tier2">4,000 to 30,000 month </a></li>
                                <li class="orders-item asalta-button"><a href="#" data-tier="#tier3">more than 30,000 month </a></li>
                            </ul>
                        </li>

                    </div>-->
                    <div class="planTypes">
                        <label class="annuallyLabel">
                            <span class="pricing-label-Annually">Annually <br>Get 2 months FREE </span>
                        </label>
                        <label class="switch">
                            <input type="checkbox" id="yearly_monthly_switch" data-plan-id="<?= $MonthlyPlan->planid ?>">
                            <span class="slider round"></span>
                        </label>
                        <label class="monthlyLabel">
                            <span class="pricing-label-monthly">Monthly</span>
                        </label>
                        <input id="plan_id" type="hidden" name="plan_id" value="<?= $MonthlyPlan->planid ?>"/>
                    </div>
                </div>
            </div>
            <div id="multichannel_pricing_table">
            <ul>
                <?php
                $tier = 1;
                while($tier <= 4):
                ?>
                <li id="tier<?= $tier ?>" class="salesOrderPlan">
                    <div class="col-md-12">
                        <?php
                        $rows = 0;
                        ?>
                        <div class="inven_pricing_restable">

                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <?php
                                    if(isset($InvMonthlyPackages[$tier][$rows]) && $InvYearlyPackages[$tier][$rows]){
                                        $InvPackageName = str_replace(' ', '', $InvMonthlyPackages[$tier][$rows]->name);
                                        ?>
                                        <div class="col-md-3 col-sm-6 inven_pricing_table_div col_md_sm_2_5 " >
                                            <div class="pricingTable ">
                                                <div class="pricingTable-heading-wrapper">
                                                    <div class="pricingTable-header"><h3><?= $InvMonthlyPackages[$tier][$rows]->name ?></h3>
                                                        <p class="prising-table-text">Right package for getting started on Inventory</p>
                                                    </div>
                                                    <?php
                                                    if(!in_array($InvMonthlyPackages[$tier][$rows]->name, ['Large', 'Extra Large', 'Huge']) || $currencyCode == "USD"){
                                                        ?>
                                                        <div class="price-value price-value-monthly">
                                                            <?= PricingHelper::getMonthlyPricingText($InvMonthlyPackages[$tier][$rows], $country, $currencySymbol) ?>
                                                            <span class="subtitle">per month</span>
                                                            <span class="subtitle">billed monthly</span><br>
                                                        </div>
                                                        <div class="price-value price-value-yearly">
                                                            <?= PricingHelper::getYearlyPricingText($InvYearlyPackages[$tier][$rows], $country, $currencySymbol) ?>
                                                            <span class="subtitle">per month</span>
                                                            <span class="subtitle">billed annually</span><br>
                                                        </div>
                                                        <div class="price-value-monthly">
                                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/multichannel-payment"), [
                                                                'data' => [
                                                                    'method' => 'post',
                                                                    'params' => [
                                                                        'items' => json_encode([[
                                                                            'id' => $InvMonthlyPackages[$tier][$rows]->inventory_packageid,
                                                                            'product' => 'Inventory',
                                                                        ]])
                                                                    ],
                                                                    'packageid' => $InvMonthlyPackages[$tier][$rows]->inventory_packageid,
                                                                    'actualpackageprice' => $InvMonthlyPackages[$tier][$rows]->priced_monthly,
                                                                    'productname' => 'Inventory'
                                                                ],
                                                                'class' => "hrm_signup_btn btn-success",
                                                                'style' => "padding: 10px 47px;",
                                                            ]); ?>
                                                        </div>
                                                        <div class="price-value-yearly">
                                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/multichannel-payment"), [
                                                                'data' => [
                                                                    'method' => 'post',
                                                                    'params' => [
                                                                        'items' => json_encode([[
                                                                            'id' => $InvYearlyPackages[$tier][$rows]->inventory_packageid,
                                                                            'product' => 'Inventory',
                                                                        ]])
                                                                    ],
                                                                    'packageid' => $InvYearlyPackages[$tier][$rows]->inventory_packageid,
                                                                    'actualpackageprice' => $InvYearlyPackages[$tier][$rows]->priced_monthly,
                                                                    'productname' => 'Inventory'
                                                                ],
                                                                'class' => "hrm_signup_btn btn-success",
                                                                'style' => "padding: 10px 47px;",
                                                            ]); ?>
                                                        </div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="price-value price-value-monthly">
                                                            <h3>Get your Quote</h3>
                                                            <span class="subtitle">&nbsp;</span>
                                                            <span class="subtitle">&nbsp;</span>
                                                            <span class="subtitle">&nbsp;</span>
                                                        </div>
                                                        <div class="price-value price-value-yearly">
                                                            <h3>Get your Quote</h3>
                                                            <span class="subtitle">&nbsp;</span>
                                                            <span class="subtitle">&nbsp;</span>
                                                            <span class="subtitle">&nbsp;</span>
                                                        </div>
                                                        <div style="margin-top: 2px;">
                                                            <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("contact-us?enquiry=Sales_Enquiry") ?>" class="hrm_signup_btn btn-success" style="padding: 10px 47px;">Enquire</a>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>

                                                <div class="pricingContent">
                                                    <ul class="monthlyPlanInput">
                                                        <li data-original-title="Additional users can be added at <?= $SalesFunnelsAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($InvMonthlyPackages[$tier][$rows]->numof_user == 0) ? "Unlimited Clients (Entities)" : (($InvMonthlyPackages[$tier][$rows]->numof_user > 0)?$InvMonthlyPackages[$tier][$rows]->numof_user . " Clients (Entities)": " Unlimited Clients (Entities) ") ?></li>
                                                        
														</ul>
                                                    <ul class="yearlyPlanInput">
                                                        <li data-original-title="Additional users can be added at <?= $SalesFunnelsAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($InvYearlyPackages[$tier][$rows]->numof_user == 0) ? " Unlimited Clients (Entities)" : (($InvYearlyPackages[$tier][$rows]->numof_user > 0)?$InvYearlyPackages[$tier][$rows]->numof_user . " Clients (Entities)": " Unlimited Clients (Entities) ") ?></li>
                                                    </ul>
                                                    <?=
                                                        $this->render('blocks/multichannelOtherProducts',
                                                            [
                                                                "InvPackageName" => $InvPackageName,
                                                                "currencySymbol" => $currencySymbol,
                                                                "currencyCode" => $currencyCode,
                                                                "country"=>$country,
                                                                "countryShortCode"=>$countryShortCode,
                                                            ]
                                                        );
                                                    ?>
                                                </div>

                                            </div>
                                        </div>
                                        <?php
                                        $rows++;
                                    }

                                    if(isset($InvMonthlyPackages[$tier][$rows]) && $InvYearlyPackages[$tier][$rows]) {
                                        $InvPackageName = str_replace(' ', '', $InvMonthlyPackages[$tier][$rows]->name);
                                        ?>
                                        <div class="col-md-3 col-sm-6 inven_pricing_table_div col_md_sm_2_5">
                                            <div class="ribbon_pricing"><span>POPULAR</span></div>
                                            <div class="pricingTable smallbudiness-popular ">
                                                <div class="pricingTable-heading-wrapper">
                                                    <div class="pricingTable-header"><h3><?= $InvMonthlyPackages[$tier][$rows]->name ?></h3>
                                                        <p class="prising-table-text">Best fit for growing business</p>
                                                    </div>
                                                    <div style="padding:9px 0px; "></div>
                                                    <?php
                                                    if(!in_array($InvMonthlyPackages[$tier][$rows]->name, ['Large', 'Extra Large', 'Huge']) || $currencyCode == "USD"){
                                                        ?>
                                                        <div class="price-value price-value-monthly">
                                                            <?= PricingHelper::getMonthlyPricingText($InvMonthlyPackages[$tier][$rows], $country, $currencySymbol) ?>
                                                            <span class="subtitle">per month</span>
                                                            <span class="subtitle">billed monthly</span><br>
                                                        </div>
                                                        <div class="price-value price-value-yearly">
                                                            <?= PricingHelper::getYearlyPricingText($InvYearlyPackages[$tier][$rows], $country, $currencySymbol) ?>
                                                            <span class="subtitle">per month</span>
                                                            <span class="subtitle">billed annually</span><br>
                                                        </div>
                                                        <div class="price-value-monthly">
                                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/multichannel-payment"), [
                                                                'data' => [
                                                                    'method' => 'post',
                                                                    'params' => [
                                                                        'items' => json_encode([[
                                                                            'id' => $InvMonthlyPackages[$tier][$rows]->inventory_packageid,
                                                                            'product' => 'Inventory',
                                                                        ]])
                                                                    ],
                                                                    'packageid' => $InvMonthlyPackages[$tier][$rows]->inventory_packageid,
                                                                    'actualpackageprice' => $InvMonthlyPackages[$tier][$rows]->priced_monthly,
                                                                    'productname' => 'Inventory'
                                                                ],
                                                                'class' => "hrm_signup_btn btn-success",
                                                                'style' => "padding: 10px 47px;",
                                                            ]); ?>
                                                        </div>
                                                        <div class="price-value-yearly">
                                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/multichannel-payment"), [
                                                                'data' => [
                                                                    'method' => 'post',
                                                                    'params' => [
                                                                        'items' => json_encode([[
                                                                            'id' => $InvYearlyPackages[$tier][$rows]->inventory_packageid,
                                                                            'product' => 'Inventory',
                                                                        ]])
                                                                    ],
                                                                    'packageid' => $InvYearlyPackages[$tier][$rows]->inventory_packageid,
                                                                    'actualpackageprice' => $InvYearlyPackages[$tier][$rows]->priced_monthly,
                                                                    'productname' => 'Inventory'
                                                                ],
                                                                'class' => "hrm_signup_btn btn-success",
                                                                'style' => "padding: 10px 47px;",
                                                            ]); ?>
                                                        </div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="price-value price-value-monthly">
                                                            <h3>Get your Quote</h3>
                                                            <span class="subtitle">&nbsp;</span>
                                                            <span class="subtitle">&nbsp;</span>
                                                            <span class="subtitle">&nbsp;</span>
                                                        </div>
                                                        <div class="price-value price-value-yearly">
                                                            <h3>Get your Quote</h3>
                                                            <span class="subtitle">&nbsp;</span>
                                                            <span class="subtitle">&nbsp;</span>
                                                            <span class="subtitle">&nbsp;</span>
                                                        </div>
                                                        <div style="margin-top: 2px;">
                                                            <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("contact-us?enquiry=Sales_Enquiry") ?>" class="hrm_signup_btn btn-success" style="padding: 10px 47px;">Enquire</a>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>

                                                <div class="pricingContent">
                                                    <ul class="monthlyPlanInput">
                                                        <li data-original-title="Additional users can be added at <?= $SalesFunnelsAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($InvMonthlyPackages[$tier][$rows]->numof_user == 0) ? "Unlimited Clients (Entities)" : (($InvMonthlyPackages[$tier][$rows]->numof_user > 0)?$InvMonthlyPackages[$tier][$rows]->numof_user . " Clients (Entities)": " Unlimited Clients (Entities) ") ?></li>
                                                        </ul>
                                                    <ul class="yearlyPlanInput">
                                                        <li data-original-title="Additional users can be added at <?= $SalesFunnelsAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($InvYearlyPackages[$tier][$rows]->numof_user == 0) ? "Unlimited Clients (Entities)" : (($InvYearlyPackages[$tier][$rows]->numof_user > 0)?$InvYearlyPackages[$tier][$rows]->numof_user . " Clients (Entities)": " Unlimited Clients (Entities) ") ?></li>
                                                        </ul>
                                                    <?=
                                                    $this->render('blocks/multichannelOtherProducts',
                                                        [
                                                            "InvPackageName" => $InvPackageName,
                                                            "currencySymbol" => $currencySymbol,
                                                            "currencyCode" => $currencyCode,
                                                            "country"=>$country,
                                                            "countryShortCode"=>$countryShortCode,
                                                        ]
                                                    );
                                                    ?>
                                                </div>

                                            </div>
                                        </div>
                                        <?php
                                        $rows++;
                                    }

                                    if(isset($InvMonthlyPackages[$tier][$rows]) && $InvYearlyPackages[$tier][$rows]) {
                                        $InvPackageName = str_replace(' ', '', $InvMonthlyPackages[$tier][$rows]->name);
                                        ?>
                                        <div class="col-md-3 col-sm-6 inven_pricing_table_div col_md_sm_2_5">
                                            <div class="pricingTable ">
                                                <div class="pricingTable-heading-wrapper">
                                                    <div class="pricingTable-header"><h3><?= $InvMonthlyPackages[$tier][$rows]->name ?></h3>

                                                        <p class="prising-table-text">All you need for a growing business</p>
                                                    </div>
                                                    <div class="pricing_padding"></div>
                                                    <?php
                                                    if(!in_array($InvMonthlyPackages[$tier][$rows]->name, ['Large', 'Extra Large', 'Huge']) || $currencyCode == "USD"){
                                                        ?>
                                                        <div class="price-value price-value-monthly">
                                                            <?= PricingHelper::getMonthlyPricingText($InvMonthlyPackages[$tier][$rows], $country, $currencySymbol) ?>
                                                            <span class="subtitle">per month</span>
                                                            <span class="subtitle">billed monthly</span><br>
                                                        </div>
                                                        <div class="price-value price-value-yearly">
                                                            <?= PricingHelper::getYearlyPricingText($InvYearlyPackages[$tier][$rows], $country, $currencySymbol) ?>
                                                            <span class="subtitle">per month</span>
                                                            <span class="subtitle">billed annually</span><br>
                                                        </div>
                                                        <div class="price-value-monthly">
                                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/multichannel-payment"), [
                                                                'data' => [
                                                                    'method' => 'post',
                                                                    'params' => [
                                                                        'items' => json_encode([[
                                                                            'id' => $InvMonthlyPackages[$tier][$rows]->inventory_packageid,
                                                                            'product' => 'Inventory',
                                                                        ]])
                                                                    ],
                                                                    'packageid' => $InvMonthlyPackages[$tier][$rows]->inventory_packageid,
                                                                    'actualpackageprice' => $InvMonthlyPackages[$tier][$rows]->priced_monthly,
                                                                    'productname' => 'Inventory'
                                                                ],
                                                                'class' => "hrm_signup_btn btn-success",
                                                                'style' => "padding: 10px 47px;",
                                                            ]); ?>
                                                        </div>
                                                        <div class="price-value-yearly">
                                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/multichannel-payment"), [
                                                                'data' => [
                                                                    'method' => 'post',
                                                                    'params' => [
                                                                        'items' => json_encode([[
                                                                            'id' => $InvYearlyPackages[$tier][$rows]->inventory_packageid,
                                                                            'product' => 'Inventory',
                                                                        ]])
                                                                    ],
                                                                    'packageid' => $InvYearlyPackages[$tier][$rows]->inventory_packageid,
                                                                    'actualpackageprice' => $InvYearlyPackages[$tier][$rows]->priced_monthly,
                                                                    'productname' => 'Inventory'
                                                                ],
                                                                'class' => "hrm_signup_btn btn-success",
                                                                'style' => "padding: 10px 47px;",
                                                            ]); ?>
                                                        </div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="price-value price-value-monthly">
                                                            <h3>Get your Quote</h3>
                                                            <span class="subtitle">&nbsp;</span>
                                                            <span class="subtitle">&nbsp;</span>
                                                            <span class="subtitle">&nbsp;</span>
                                                        </div>
                                                        <div class="price-value price-value-yearly">
                                                            <h3>Get your Quote</h3>
                                                            <span class="subtitle">&nbsp;</span>
                                                            <span class="subtitle">&nbsp;</span>
                                                            <span class="subtitle">&nbsp;</span>
                                                        </div>
                                                        <div style="margin-top: -6px;">
                                                            <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("contact-us?enquiry=Sales_Enquiry") ?>" class="hrm_signup_btn btn-success" style="padding: 10px 47px;">Enquire</a>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>

                                                <div class="pricingContent">
                                                    <ul class="monthlyPlanInput">
                                                        <li data-original-title="Additional users can be added at <?= $SalesFunnelsAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($InvMonthlyPackages[$tier][$rows]->numof_user == 0) ? "Unlimited Clients (Entities)" : (($InvMonthlyPackages[$tier][$rows]->numof_user > 0)?$InvMonthlyPackages[$tier][$rows]->numof_user . " Clients (Entities)": " Unlimited Clients (Entities) ") ?></li>
                                                        </ul>
                                                    <ul class="yearlyPlanInput">
                                                        <li data-original-title="Additional users can be added at <?= $SalesFunnelsAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($InvYearlyPackages[$tier][$rows]->numof_user == 0) ? "Unlimited Clients (Entities)" : (($InvYearlyPackages[$tier][$rows]->numof_user > 0)?$InvYearlyPackages[$tier][$rows]->numof_user . " Clients (Entities)": " Unlimited Clients (Entities) ") ?></li>
                                                        </ul>
                                                    <?=
                                                    $this->render('blocks/multichannelOtherProducts',
                                                        [
                                                            "InvPackageName" => $InvPackageName,
                                                            "currencySymbol" => $currencySymbol,
                                                            "currencyCode" => $currencyCode,
                                                            "country"=>$country,
                                                            "countryShortCode"=>$countryShortCode,
                                                        ]
                                                    );
                                                    ?>
                                                </div>

                                            </div>
                                        </div>
                                        <?php
                                        $rows++;
                                    }

                                    if(isset($InvMonthlyPackages[$tier][$rows]) && $InvYearlyPackages[$tier][$rows]) {
                                        $InvPackageName = str_replace(' ', '', $InvMonthlyPackages[$tier][$rows]->name);
                                        ?>
                                        <div class="col-md-3 col-sm-6 inven_pricing_table_div col_md_sm_2_5" >
                                            <div class="pricingTable ">
                                                <div class="pricingTable-heading-wrapper">
                                                    <div class="pricingTable-header">
                                                        <h3><?= $InvMonthlyPackages[$tier][$rows]->name ?></h3>
                                                        <p class="prising-table-text">Go to package for Small business with higher order volumes</p>
                                                    </div>
                                                    <?php
                                                    if(!in_array($InvMonthlyPackages[$tier][$rows]->name, ['Large', 'Extra Large', 'Huge']) || $currencyCode == "USD"){
                                                        ?>
                                                        <div class="price-value price-value-monthly">
                                                            <?= PricingHelper::getMonthlyPricingText($InvMonthlyPackages[$tier][$rows], $country, $currencySymbol) ?>
                                                            <span class="subtitle">per month</span>
                                                            <span class="subtitle">billed monthly</span><br>
                                                        </div>
                                                        <div class="price-value price-value-yearly">
                                                            <?= PricingHelper::getYearlyPricingText($InvYearlyPackages[$tier][$rows], $country, $currencySymbol) ?>
                                                            <span class="subtitle">per month</span>
                                                            <span class="subtitle">billed annually</span><br>
                                                        </div>
                                                        <div class="price-value-monthly">
                                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/multichannel-payment"), [
                                                                'data' => [
                                                                    'method' => 'post',
                                                                    'params' => [
                                                                        'items' => json_encode([[
                                                                            'id' => $InvMonthlyPackages[$tier][$rows]->inventory_packageid,
                                                                            'product' => 'Inventory',
                                                                        ]])
                                                                    ],
                                                                    'packageid' => $InvMonthlyPackages[$tier][$rows]->inventory_packageid,
                                                                    'actualpackageprice' => $InvMonthlyPackages[$tier][$rows]->priced_monthly,
                                                                    'productname' => 'Inventory'
                                                                ],
                                                                'class' => "hrm_signup_btn btn-success",
                                                                'style' => "padding: 10px 47px;",
                                                            ]); ?>
                                                        </div>
                                                        <div class="price-value-yearly">
                                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/multichannel-payment"), [
                                                                'data' => [
                                                                    'method' => 'post',
                                                                    'params' => [
                                                                        'items' => json_encode([[
                                                                            'id' => $InvYearlyPackages[$tier][$rows]->inventory_packageid,
                                                                            'product' => 'Inventory',
                                                                        ]])
                                                                    ],
                                                                    'packageid' => $InvYearlyPackages[$tier][$rows]->inventory_packageid,
                                                                    'actualpackageprice' => $InvYearlyPackages[$tier][$rows]->priced_monthly,
                                                                    'productname' => 'Inventory'
                                                                ],
                                                                'class' => "hrm_signup_btn btn-success",
                                                                'style' => "padding: 10px 47px;",
                                                            ]); ?>
                                                        </div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="price-value price-value-monthly">
                                                            <h3 style="margin-top: 21px;">Get your Quote</h3>
                                                            <span class="subtitle">&nbsp;</span>
                                                            <span class="subtitle">&nbsp;</span>
                                                            <span class="subtitle">&nbsp;</span>
                                                        </div>
                                                        <div class="price-value price-value-yearly">
                                                            <h3 style="margin-top: 21px;">Get your Quote</h3>
                                                            <span class="subtitle">&nbsp;</span>
                                                            <span class="subtitle">&nbsp;</span>
                                                            <span class="subtitle">&nbsp;</span>
                                                        </div>
                                                        <div style="margin-top: -5px;">
                                                            <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("contact-us?enquiry=Sales_Enquiry") ?>" class="hrm_signup_btn btn-success" style="padding: 10px 47px;">Enquire</a>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>

                                                <div class="pricingContent">
                                                    <ul class="monthlyPlanInput">
                                                        <li data-original-title="Additional users can be added at <?= $SalesFunnelsAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($InvMonthlyPackages[$tier][$rows]->numof_user == 0) ? "Unlimited Clients (Entities)" : (($InvMonthlyPackages[$tier][$rows]->numof_user > 0)?$InvMonthlyPackages[$tier][$rows]->numof_user . " Clients (Entities)": " Unlimited Clients (Entities) ") ?></li>
                                                        </ul>
                                                    <ul class="yearlyPlanInput">
                                                        <li data-original-title="Additional users can be added at <?= $SalesFunnelsAddonPrice ?>  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($InvYearlyPackages[$tier][$rows]->numof_user == 0) ? "Unlimited Clients (Entities)" : (($InvYearlyPackages[$tier][$rows]->numof_user > 0)?$InvYearlyPackages[$tier][$rows]->numof_user . " Clients (Entities)": " Unlimited Clients (Entities) ") ?></li>
                                                        </ul>
                                                    <?=
                                                    $this->render('blocks/multichannelOtherProducts',
                                                        [
                                                            "InvPackageName" => $InvPackageName,
                                                            "currencySymbol" => $currencySymbol,
                                                            "currencyCode" => $currencyCode,
                                                            "country"=>$country,
                                                            "countryShortCode"=>$countryShortCode,
                                                        ]
                                                    );
                                                    ?>
                                                </div>

                                            </div>
                                        </div>
                                        <?php
										$rows++;
                                    }

                                    //if($tier == 4){
                                        ?>
                                        <div class="col-md-3 col-sm-6 inven_pricing_table_div col_md_sm_2_5" >
                                            <div class="pricingTable ">
                                                <div class="pricingTable-heading-wrapper">
                                                    <div class="pricingTable-header">
                                                        <h3>Small</h3>
                                                        <p class="prising-table-text">Get your custom package</p>
														</br>
                                                    </div>
                                                    <div class="price-value price-value-monthly">
														<span style="font-size:24px !important">$</span>
														<span class="price-monthly">997</span>

                                                        <span class="subtitle">per month</span>
                                                        <span class="subtitle">billed monthly</span>
                                                        <span class="subtitle">&nbsp;</span>
													</div>
                                                    <div class="price-value price-value-yearly">
														<span style="font-size:24px !important">$</span>
														<span class="price-monthly">9,970</span>
                                                        <span class="subtitle">per month</span>
                                                        <span class="subtitle">billed annually</span>
                                                        <span class="subtitle">&nbsp;</span>
													</div>
                                                    <div>
														<?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/multichannel-payment"), [
                                                                'data' => [
                                                                    'method' => 'post',
                                                                    'params' => [
                                                                        'items' => json_encode([[
                                                                            'id' => $InvYearlyPackages[1][$rows]->inventory_packageid,
                                                                            'product' => 'Inventory',
                                                                        ]])
                                                                    ],
                                                                    'packageid' => $InvYearlyPackages[1][$rows]->inventory_packageid,
                                                                    'actualpackageprice' => $InvYearlyPackages[1][$rows]->priced_monthly,
                                                                    'productname' => 'Inventory'
                                                                ],
                                                                'class' => "hrm_signup_btn btn-success",
                                                                'style' => "padding: 10px 47px;",
                                                            ]); ?>
                                                </div>
</div>
                                                <div class="pricingContent">
                                                    <ul class="monthlyPlanInput">
                                                        <li data-original-title="Additional users can be added at 300  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title="">300 Clients (Entities)</li>
                                                       </ul>
                                                    <ul class="yearlyPlanInput">
                                                        <li data-original-title="Additional users can be added at 300  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title="">300 Clients (Entities)</li>
                                                    </ul>
                                                    <?=
                                                    $this->render('blocks/multichannelOtherProducts',
                                                        [
                                                            "InvPackageName" => $InvPackageName,
                                                            "currencySymbol" => $currencySymbol,
                                                            "currencyCode" => $currencyCode,
                                                            "country"=>$country,
                                                            "countryShortCode"=>$countryShortCode,
                                                        ]
                                                    );
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    //}
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php /*ActiveForm::end(); */ ?>
                        <div class="col-sm-12 col-md-offset-1" style="padding:24px 17px;">
                            <p class="pricing_text_scale">  All Prices in <?= $currencyCode ?></p>
                        </div>
                    </div>
                </li>
                <?php
                $tier++;
                endwhile;
                ?>
            </ul>
            </div>


            </div>

            <div class="col-sm-12" style="background-color: #fafafa;padding-bottom:55px;">
                <div class="container add_on_div">
                    <h2 class="add_on_pricing_head" style="padding-top: 25px;">Add Ons</h2>
                    <p class="each_add_ons">You can buy multiples of each add-ons</p>

                   
                    <div class="col-md-12 addOnsPricing">
                        <br>
                        <p class="add_on_text" >20% discount applicable for all Add Ons when bought for a year.</p>
                    </div>
                </div>
                <!-- <div class="container">
                    <p class="each_add_ons_discount" style="padding: 0 12.3%">20% discount applicable for all Add Ons when bought for a year.</p>
                </div> -->
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
                                <p>If you think 14 days are not enough to fully explore the system, we’re more than happy to extend your trial. Once your trial expires, Clients (Entities) our sales team by emailing them  at <a href="<?=$this->publicHtml;?>/support"> support@asalta.com</a>
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
                                <p>Asalta Inventory is cloud-based inventory management software with complex automation, high security, and 24/7 support. To get started with Asalta Inventory Enterprise Package, Clients (Entities) Sales send us an email at <a href="<?=$this->publicHtml;?>/support"> support@asalta.com</a></p>
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
                                <p>For any queries, feel free to get in touch with us anytime. We’d love to hear from you! Clients (Entities) support at <a
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
                                    <li>Connect easily with your customers and vendors with Clients (Entities)s.</li>
                                    <li>Record and manage your stock with Items and Category.</li>
                                    <li>Create bundles with Item combination.</li>
                                    <li>Document sales and send Storage.</li>
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
                                <p>Creating and tracking the inventory (stock flow) of Items and Categories. Composite Items -Bundling of items. Serial Number Tracking - For tracking individual units of an item. Customize your item prices by creating price lists and assign them to your favorite customers, sales orders and Storage. FIFO, LIFO and Average cost method can be Selected, stock reports, sales, purchase and activity logs.
                                </p>
                                <p><strong>Customer and vendor management:</strong></p>
                                <p>Recording customer and vendor information for communication, monitoring and transaction. Smart interactive dashboard for a quick look at the Big Picture.  </p>

                               
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
                                <p>You have to key in the bar code of the item as the Storage of said item in Asalta Inventory manually or using a barcode scanner.</p>
                                <p>Open a new transaction like an Storage.</p>
                                <p>Place your cursor on the Item Details field.</p>
                                <p>Scan the barcode of the item. You’ll see that the line item is automatically added.</p>
                                <p>Follow the above step to scan more items, which will be added consecutively</p>

                                <p><strong>For Serial Numbers:</strong></p>
                                <p>Barcode scanning feature can also be used on serial numbers In Storage.</p>

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
                                <p>Physical Stock: In this mode, your stock will increase when a Purchase Receive is made, and the stock will decrease when an Storage is made to the customer.</p>
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
                                <p>Products and Clients (Entities)s can be added through spreadsheet imports. </p>
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

                </div>
            </div>
        </div>
    </section>
    <?php ActiveForm::end();  ?>
</div>
<?php
$this->registerJs("
console.log(sessionStorage.getItem('plan_id'))
    if(!(sessionStorage.getItem('plan_id'))){
        sessionStorage.setItem('plan_id','2')
    }
", $this::POS_END, ''); 
$this->registerJsFile(Yii::$app->urlManager->createAbsoluteUrl("dist/accounting.min.js"), ['depends' => [ResourcesAsset::className()], 'position' => \yii\web\View::POS_END]);
$this->registerJsFile(Yii::$app->urlManager->createAbsoluteUrl("dist/multichannelPricing.js"), ['depends' => [ResourcesAsset::className()], 'position' => \yii\web\View::POS_END]);