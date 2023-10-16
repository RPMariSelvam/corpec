<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\site\frontend\models\RetailPackageModel;

/* @var $this yii\web\View */
/* @var $MonthlyPlan app\modules\site\frontend\models\PlanModel */
/* @var $YearlyPlan app\modules\site\frontend\models\PlanModel */
/* @var $MonthlyPackages app\modules\site\frontend\models\InventoryPackageModel */
/* @var $YearlyPackages app\modules\site\frontend\models\InventoryPackageModel */

//$this->title = "Inventory Pricing - My Asalta";
//$this->registerCssFile(Yii::$app->urlManager->createAbsoluteUrl("css/inventory_pricing.css"));
//$this->registerJsFile(Yii::$app->urlManager->createAbsoluteUrl("js/pricing.js"), ['depends' => [\yii\web\JqueryAsset::className()], 'position' => \yii\web\View::POS_END]);

$this->registerCss("
   .monthlyPlanInput, .price-value-monthly{
        display:none;
    }
    .pricing_padding {
        padding:16px;
    }
    .pricingTable.disabled{
        opacity:0.5;
    }
    .priceing_image_eng{
        width:100%;
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
        padding:8px 10px !important;
        }
    }
    @media only screen and (min-device-width: 414px) and (max-device-width: 736px) and (-webkit-min-device-pixel-ratio: 3) { 
        .table-scroll th, .table-scroll td {
        padding: 8px 18px !important;
        }
   
    }
    @media only screen and (min-width : 1200px) and (max-width:1339px) {
      .pricing_padding {
        padding:9px;
      }
    }
    @media only screen and (min-width :1345px) and (max-width:1400px){
      .pricing_padding {
        padding:16px;
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
    .strikethrough{
        color:#a9a9a9 !important;
    }
    .strikethrough_monthly{
        color:#a9a9a9 !important; 
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
    .clone thead, .clone tfoot{
        background:transparent;
    }

");
//$CurrentPackage = Yii::$app->MyAsaltaComponent->getIMSPOSSubscribedPackageDetails();
?>

<div class="wrapper" style="background-color: #fff;">
    <div class="row">
        &nbsp;
    </div>
    <section >
    <?php $form = ActiveForm::begin(['options' => ['role'=> "form"],]); ?>
        <div class="panel-body">
            <div class="row pricingSection inventory_pricing_plan ">
                <div class="col-md-12">
                    <?php
                    $rows = 0;
                    ?>
                    <div class="row">
                        <div class="col-sm-6 twelve_monthly-plan" id="mbutt_1" style="padding-bottom: 2%; padding-top: 14px;text-align: right;">
                            <button id="twelve_monthly-plan" style="width:35%;" type="button" class="pricebutton pricebutton_act btn-text-1" data-plan-id="<?= $YearlyPlan->planid ?>">
                                Annual <br>
                                 <?php if($country == 'Global'){ ?>
                                    <span class="button-text-1" data-plan-id="10">SAVE up to 30% </span>
                                <?php }else { ?>
                                    <span class="button-text-1" data-plan-id="10">SAVE up to 30% <!-- <span class=" strikethrough_button">30%</span> --></span>
                            <?php } ?>
                            </button>
                        </div>
                        <div class="col-sm-6 monthly-plan" id="mbutt" style="padding-bottom: 2%; padding-top: 14px;">
                            <button id="monthly-plan" style="width:35%; " type="button" class="pricebutton  btn-text-2" data-plan-id="<?= $MonthlyPlan->planid ?>">
                                Monthly <br> <span class="button-text-2">pay as you use</span></button>
                            <input type="hidden" name="plan_id" value="<?= $YearlyPlan->planid ?>"/>
                        </div>
                    </div>

                    <div class=" inven_pricing_restable">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                            <?php
                            if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]){
                                ?>
                                <div class="col-md-3 col-sm-6 inven_pricing_table_div col_md_sm_2_5 " >
                                    <div class="pricingTable ">
                                        <div class="pricingTable-header"><h3>Micro</h3>
                                            <p class="prising-table-text"><?php   echo ($YearlyPackages[$rows]->description); ?> </p>
                                        </div>
                                        <div style="padding: 9px;"></div>
                                        <div class="price-value price-value-monthly">
                                            <?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?><span style="font-size:24px !important">$</span>
                                            <span ><?= $tempValue[0];?></span><span>
                                                <sup style="top: -0.8em;font-size: 45%;">
                                                    <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                </sup>
                                            </span>
                                            <span class="subtitle">per month</span>
                                            <span class="subtitle">billed monthly</span><br><br><span class="subtitle">or
                                                <?php if($country == 'Global'){ ?>
                                                    <?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:12px !important">$</span>
                                                    <span style="font-size:14px;font-weight: 700;color: black;"><?= $tempValue[0];?></span><span>
                                                        <sup style=" top: -4.8px;font-size:10px;font-weight: 700;color: black;">
                                                            <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                        </sup>
                                                    </span>
                                                   billed annually
                                                </span>
                                                <?php }else { ?>
                                                <?php $discount_asalta = explode(".",($YearlyPackages[$rows]->getDiscountedPrice()));?>
                                                <span style="font-size:12px !important;font-weight: 700">$</span><span style="font-size:14px;font-weight: 700;color: black;"><?= $discount_asalta[0];?></span><span><sup style=" top: -4.8px;font-size:10px;font-weight: 700;color: black;"><?= isset($discount_asalta[1]) ? '.'. $discount_asalta[1] :'.00';?></sup></span>
                                            <?php if(Yii::$app->params["EnableProductPricingDiscounts"]){ ?>
                                            <span class="strikethrough_monthly">
                                                <?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                              <span style="font-size:10px !important;color:#a9a9a9;">$</span>
                                                <span style="font-size:12px;font-weight: 200;color:#a9a9a9;"><?= $tempValue[0];?></span><span>
                                                   <sup style=" top: -4.8px;font-size:8px;font-weight: 200;color:#a9a9a9;">
                                                        <?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?>
                                                    </sup>
                                                </span>
                                            </span>
                                            <?php } ?>
                                            billed annually
                                            </span>
                                            <?php } ?>
                                        </div>
                                        <div class="price-value price-value-yearly">
                                            <?php if($country == 'Global'){ ?>
                                                <?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?><span style="font-size:24px !important">$</span>
                                                <span ><?= $tempValue[0];?></span><span>
                                                    <sup style="top: -0.8em;font-size: 45%;">
                                                        <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                    </sup>
                                                </span>
                                                <span class="subtitle">per month</span>
                                            <span class="subtitle">billed monthly</span><br><br><span class="subtitle">or <?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:12px !important">$</span>
                                                    <span style="font-size:14px;font-weight: 700;color: black;"><?= $tempValue[0];?></span><span>
                                                        <sup style=" top: -4.8px;font-size:10px;font-weight: 700;color: black;">
                                                            <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                        </sup>
                                                    </span>
                                                    billed month
                                                </span>
                                            <?php }else { ?>
                                                <?php $discount_asalta = explode (".",($YearlyPackages[$rows]->getDiscountedPrice())); ?><span style="font-size:24px !important;font-weight:700">$</span>
                                                <span style="font-weight:700"><?= $discount_asalta[0];?></span>
                                                <span>
                                                    <sup style="top: -0.8em;font-size: 45%;font-weight:700">
                                                        <?= isset($discount_asalta[1]) ? '.' . $discount_asalta[1] : '.00';?>
                                                    </sup>
                                                </span>
                                                <?php if(Yii::$app->params["EnableProductPricingDiscounts"]){ ?>
                                                <span class="strikethrough">
                                                    <?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?><span style="font-size:18px !important;color:#a9a9a9;">$</span>
                                                    <span style="font-size: 34px;color:#a9a9a9;"><?= $tempValue[0];?></span>
                                                    <span>
                                                        <sup style="top: -0.8em;font-size: 40%;color:#a9a9a9;">
                                                            <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                        </sup>
                                                    </span>
                                                </span>
                                                <?php } ?>
                                                <span class="subtitle">per month</span>
                                                <span class="subtitle">billed annually</span><br><br><span class="subtitle">or <?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:12px !important">$</span>
                                                    <span style="font-size:14px;font-weight: 700;color: black;"><?= $tempValue[0];?></span><span>
                                                        <sup style=" top: -4.8px;font-size:10px;font-weight: 700;color: black;">
                                                            <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                        </sup>
                                                    </span>
                                                    billed monthly
                                                </span>
                                             <?php } ?>
                                        </div>
                                        <div class="price-value-monthly">
                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/payment"), [
                                                'data' => [
                                                    'method' => 'post',
                                                    'params' => [
                                                        'id' => $MonthlyPackages[$rows]->retail_packageid,
                                                        'product' => 'Retail',
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
                                                        'id' => $YearlyPackages[$rows]->retail_packageid,
                                                        'product' => 'Retail',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=retail")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                        <div class="pricingContent">
                                            <ul class="monthlyPlanInput">
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional users can be added at $8.88  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0)?$MonthlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <?php }else { ?>
                                                    <li data-original-title="Additional users can be added at $10.88 per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0)?$MonthlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <?php } ?>
                                                <?php if($country =="India"){?>
                                                    <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $8.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_channels == 0) ? " - " : (($MonthlyPackages[$rows]->numof_channels > 0)?$MonthlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <?php }else{?>
                                                    <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $10.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_channels == 0) ? " - " : (($MonthlyPackages[$rows]->numof_channels > 0)?$MonthlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <?php } ?>
                                                <li> - </li>
                                                <li> - </li>
                                                <?php if($country =='India'){ ?>
                                                    <li data-original-title="Additional Orders can be added at $4.88  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_online_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_online_order)  . " Sales Orders/".'<br>'."month": " Multiple Sales Orders ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional Orders can be added at $10.88 for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_online_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_online_order)  . " Sales Orders/".'<br>'."month": " Multiple Sales Orders ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional Orders can be added at $4.88  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_offline_order)  . " Offline sales orders /".'<br>'."  month": " Multiple Offline sales orders ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional Orders can be added at $10.88 for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_offline_order)  . " Offline sales orders /".'<br>'."  month": " Multiple Offline sales orders ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?><li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at $8.88 per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0)?$MonthlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <?php } else { ?><li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at $50.88 per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0)?$MonthlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional blocks of 100 SKU” can be added @ $8.88 per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional blocks of 100 SKU” can be added @ $10.88 per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                                <?php } ?>
                                                <li data-original-title="25% features of Asalta Inventory system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta Inventory<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-Quarter-empty.png"alt="Asalta quarter-empty"></span></li>
                                                
                                                <li data-original-title="25% features of Asalta eCommerce system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta eCommerce<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-Quarter-empty.png"alt="Asalta quarter-empty"></span></li>
                                                <li data-original-title="25% features of Asalta Human Resource Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta HRM<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-Quarter-empty.png"alt="Asalta quarter-empty"></span></li>
                                                <li data-original-title="25% features of Asalta Customer Relation Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta CRM<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-Quarter-empty.png"alt="Asalta quarter-empty"></span></li>
                                                <li><br></li>
                                            </ul>
                                            <ul class="yearlyPlanInput">
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional users can be added at $8.88  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0)?$YearlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <?php }else { ?>
                                                    <li data-original-title="Additional users can be added at $10.88 per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0)?$YearlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <?php } ?>  
                                                <?php if($country =="India"){?>
                                                    <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $8.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0)?$YearlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <?php }else{?>
                                                    <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $10.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0)?$YearlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <?php } ?>
                                                <li> Asalta eCommerce </li>
                                                <li> - </li>
                                                <?php if($country =='India'){ ?>
                                                    <li data-original-title="Additional Orders can be added at $4.88  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . " Sales Orders/".'<br>'."month": " Multiple Sales Orders ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional Orders can be added at $10.88 for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . " Sales Orders/".'<br>'."month": " Multiple Sales Orders ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional Orders can be added at $4.88  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_offline_order)  . " Offline sales orders /".'<br>'."  month": " Multiple Offline sales orders ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional Orders can be added at $10.88 for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_offline_order)  . " Offline sales orders /".'<br>'."  month": " Multiple Offline sales orders ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at $8.88 per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)?$YearlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at $50.88 per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)?$YearlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional blocks of 100 SKU” can be added @ $8.88 per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional blocks of 100 SKU” can be added @ $10.88 per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                                <?php } ?>
                                                <li data-original-title="25% features of Asalta Inventory system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta Inventory<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-Quarter-empty.png"alt="Asalta quarter-empty"></span></li>
                                                
                                                <li data-original-title="25% features of Asalta eCommerce system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta eCommerce<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-Quarter-empty.png"alt="Asalta quarter-empty"></span></li>
                                                <li data-original-title="25% features of Asalta Human Resource Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta HRM<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-Quarter-empty.png"alt="Asalta quarter-empty"></span></li>
                                                <li data-original-title="25% features of Asalta Customer Relation Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta CRM<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-Quarter-empty.png"alt="Asalta quarter-empty"></span></li>
                                                <li><br></li>
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
                                        <div class="pricingTable-header"><h3>Small</h3>
                                            <p class="prising-table-text"><?php   echo ($YearlyPackages[$rows]->description); ?></p>
                                        </div>
                                        <div class="pricing_padding"></div>
                                       <div class="price-value price-value-monthly">
                                            <?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?><span style="font-size:24px !important">$</span>
                                            <span ><?= $tempValue[0];?></span><span>
                                                <sup style="top: -0.8em;font-size: 45%;">
                                                    <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                </sup>
                                            </span>
                                            <span class="subtitle">per month</span>
                                            <span class="subtitle">billed monthly</span><br><br><span class="subtitle">or
                                                <?php if($country == 'Global'){ ?>
                                                    <?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:12px !important">$</span>
                                                    <span style="font-size:14px;font-weight: 700;color: black;"><?= $tempValue[0];?></span><span>
                                                        <sup style=" top: -4.8px;font-size:10px;font-weight: 700;color: black;">
                                                            <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                        </sup>
                                                    </span>
                                                   billed annually
                                                </span>
                                                <?php }else { ?>
                                                <?php $discount_asalta = explode(".",($YearlyPackages[$rows]->getDiscountedPrice()));?>
                                                <span style="font-size:12px !important;font-weight: 700">$</span><span style="font-size:14px;font-weight: 700;color: black;"><?= $discount_asalta[0];?></span><span><sup style=" top: -4.8px;font-size:10px;font-weight: 700;color: black;"><?= isset($discount_asalta[1]) ? '.'. $discount_asalta[1] :'.00';?></sup></span>
                                            <?php if(Yii::$app->params["EnableProductPricingDiscounts"]){ ?>
                                            <span class="strikethrough_monthly">
                                                <?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                              <span style="font-size:10px !important;color:#a9a9a9;">$</span>
                                                <span style="font-size:12px;font-weight: 200;color:#a9a9a9;"><?= $tempValue[0];?></span><span>
                                                   <sup style=" top: -4.8px;font-size:8px;font-weight: 200;color:#a9a9a9;">
                                                        <?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?>
                                                    </sup>
                                                </span>
                                            </span>
                                            <?php } ?>
                                            billed annually
                                            </span>
                                            <?php } ?>
                                        </div>
                                        <div class="price-value price-value-yearly">
                                            <?php if($country == 'Global'){ ?>
                                                <?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?><span style="font-size:24px !important">$</span>
                                                <span ><?= $tempValue[0];?></span><span>
                                                    <sup style="top: -0.8em;font-size: 45%;">
                                                        <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                    </sup>
                                                </span>
                                                <span class="subtitle">per month</span>
                                            <span class="subtitle">billed monthly</span><br><br><span class="subtitle">or <?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:12px !important">$</span>
                                                    <span style="font-size:14px;font-weight: 700;color: black;"><?= $tempValue[0];?></span><span>
                                                        <sup style=" top: -4.8px;font-size:10px;font-weight: 700;color: black;">
                                                            <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                        </sup>
                                                    </span>
                                                    billed month
                                                </span>
                                            <?php }else { ?>
                                                <?php $discount_asalta = explode (".",($YearlyPackages[$rows]->getDiscountedPrice())); ?><span style="font-size:24px !important;font-weight:700">$</span>
                                                <span style="font-weight:700"><?= $discount_asalta[0];?></span>
                                                <span>
                                                    <sup style="top: -0.8em;font-size: 45%;font-weight:700">
                                                        <?= isset($discount_asalta[1]) ? '.' . $discount_asalta[1] : '.00';?>
                                                    </sup>
                                                </span>
                                                <?php if(Yii::$app->params["EnableProductPricingDiscounts"]){ ?>
                                                <span class="strikethrough">
                                                    <?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?><span style="font-size:18px !important;color:#a9a9a9;">$</span>
                                                    <span style="font-size: 34px;color:#a9a9a9;"><?= $tempValue[0];?></span>
                                                    <span>
                                                        <sup style="top: -0.8em;font-size: 40%;color:#a9a9a9;">
                                                            <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                        </sup>
                                                    </span>
                                                </span>
                                                <?php } ?>
                                                <span class="subtitle">per month</span>
                                                <span class="subtitle">billed annually</span><br><br><span class="subtitle">or <?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:12px !important">$</span>
                                                    <span style="font-size:14px;font-weight: 700;color: black;"><?= $tempValue[0];?></span><span>
                                                        <sup style=" top: -4.8px;font-size:10px;font-weight: 700;color: black;">
                                                            <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                        </sup>
                                                    </span>
                                                    billed monthly
                                                </span>
                                             <?php } ?>
                                        </div>
                                        <div class="price-value-monthly">
                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/payment"), [
                                                'data' => [
                                                    'method' => 'post',
                                                    'params' => [
                                                        'id' => $MonthlyPackages[$rows]->retail_packageid,
                                                        'product' => 'Retail',
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
                                                        'id' => $YearlyPackages[$rows]->retail_packageid,
                                                        'product' => 'Retail',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=retail")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                        <div class="pricingContent">
                                            <ul class="monthlyPlanInput">
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional users can be added at $8.88  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0)?$MonthlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <?php }else { ?>
                                                    <li data-original-title="Additional users can be added at $10.88 per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0)?$MonthlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <?php } ?>
                                                <?php if($country =="India"){?>
                                                    <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $8.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_channels == 0) ? " - " : (($MonthlyPackages[$rows]->numof_channels > 0)?$MonthlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <?php }else{?>
                                                    <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $10.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_channels == 0) ? " - " : (($MonthlyPackages[$rows]->numof_channels > 0)?$MonthlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <?php } ?>
                                                <li>Asalta eCommerce</li>
                                                <li>Asalta POS</li>
                                                <?php if($country =='India'){ ?>
                                                    <li data-original-title="Additional Orders can be added at $4.88  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_online_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_online_order)  . " Sales Orders/".'<br>'."month": " Multiple Sales Orders ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional Orders can be added at $10.88 for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_online_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_online_order)  . " Sales Orders/".'<br>'."month": " Multiple Sales Orders ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional Orders can be added at $4.88  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_offline_order)  . " Offline sales orders /".'<br>'."  month": " Multiple Offline sales orders ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional Orders can be added at $10.88 for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_offline_order)  . " Offline sales orders /".'<br>'."  month": " Multiple Offline sales orders ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?><li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at $8.88 per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0)?$MonthlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <?php } else { ?><li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at $50.88 per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0)?$MonthlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional blocks of 100 SKU” can be added @ $8.88 per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional blocks of 100 SKU” can be added @ $10.88 per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                                <?php } ?>
                                                <li data-original-title="50% features of Asalta Inventory system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta Inventory<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-half-full.png"alt="Asalta half-full"></span></li>
                                                <li data-original-title="100% features of Asalta Point of Sale Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta POS<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="50% features of Asalta eCommerce system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta eCommerce<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-half-full.png"alt="Asalta half-full"></span></li>
                                                <li data-original-title="50% features of Asalta Human Resource Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta HRM<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-half-full.png"alt="Asalta half-full"></span></li>
                                                <li data-original-title="50% features of Asalta Customer Relation Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta CRM<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-half-full.png"alt="Asalta half-full"></span></li>
                                            </ul>
                                            <ul class="yearlyPlanInput">
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional users can be added at $8.88  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0)?$YearlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <?php }else { ?>
                                                    <li data-original-title="Additional users can be added at $10.88 per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0)?$YearlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <?php } ?>  
                                                <?php if($country =="India"){?>
                                                    <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $8.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0)?$YearlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <?php }else{?>
                                                    <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $10.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0)?$YearlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <?php } ?>
                                                <li>Asalta eCommerce</li>
                                                <li>Asalta POS</li>
                                                <?php if($country =='India'){ ?>
                                                    <li data-original-title="Additional Orders can be added at $4.88  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . " Sales Orders/".'<br>'."month": " Multiple Sales Orders ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional Orders can be added at $10.88 for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . " Sales Orders/".'<br>'."month": " Multiple Sales Orders ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional Orders can be added at $4.88  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_offline_order)  . " Offline sales orders /".'<br>'."  month": " Multiple Offline sales orders ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional Orders can be added at $10.88 for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_offline_order)  . " Offline sales orders /".'<br>'."  month": " Multiple Offline sales orders ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at $8.88 per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)?$YearlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at $50.88 per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)?$YearlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional blocks of 100 SKU” can be added @ $8.88 per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional blocks of 100 SKU” can be added @ $10.88 per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                                <?php } ?>
                                                <li data-original-title="50% features of Asalta Inventory system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta Inventory<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-half-full.png"alt="Asalta half-full"></span></li>
                                                <li data-original-title="100% features of Asalta Point of Sale Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta POS<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="50% features of Asalta eCommerce system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta eCommerce<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-half-full.png"alt="Asalta half-full"></span></li>
                                                <li data-original-title="50% features of Asalta Human Resource Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta HRM<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-half-full.png"alt="Asalta half-full"></span></li>
                                                <li data-original-title="50% features of Asalta Customer Relation Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta CRM<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-half-full.png"alt="Asalta half-full"></span></li>
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
                                        <div class="pricingTable-header"><h3>Medium</h3>

                                            <p class="prising-table-text"><?php   echo ($YearlyPackages[$rows]->description); ?></p>
                                        </div>
                                        <div style="padding: 9px;"></div>
                                        <div class="price-value price-value-monthly">
                                            <?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?><span style="font-size:24px !important">$</span>
                                            <span ><?= $tempValue[0];?></span><span>
                                                <sup style="top: -0.8em;font-size: 45%;">
                                                    <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                </sup>
                                            </span>
                                            <span class="subtitle">per month</span>
                                            <span class="subtitle">billed monthly</span><br><br><span class="subtitle">or
                                                <?php if($country == 'Global'){ ?>
                                                    <?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:12px !important">$</span>
                                                    <span style="font-size:14px;font-weight: 700;color: black;"><?= $tempValue[0];?></span><span>
                                                        <sup style=" top: -4.8px;font-size:10px;font-weight: 700;color: black;">
                                                            <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                        </sup>
                                                    </span>
                                                   billed annually
                                                </span>
                                                <?php }else { ?>
                                                <?php $discount_asalta = explode(".",($YearlyPackages[$rows]->getDiscountedPrice()));?>
                                                <span style="font-size:12px !important;font-weight: 700">$</span><span style="font-size:14px;font-weight: 700;color: black;"><?= $discount_asalta[0];?></span><span><sup style=" top: -4.8px;font-size:10px;font-weight: 700;color: black;"><?= isset($discount_asalta[1]) ? '.'. $discount_asalta[1] :'.00';?></sup></span>
                                            <?php if(Yii::$app->params["EnableProductPricingDiscounts"]){ ?>
                                            <span class="strikethrough_monthly">
                                                <?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                              <span style="font-size:10px !important;color:#a9a9a9;">$</span>
                                                <span style="font-size:12px;font-weight: 200;color:#a9a9a9;"><?= $tempValue[0];?></span><span>
                                                   <sup style=" top: -4.8px;font-size:8px;font-weight: 200;color:#a9a9a9;">
                                                        <?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?>
                                                    </sup>
                                                </span>
                                            </span>
                                            <?php } ?>
                                            billed annually
                                            </span>
                                            <?php } ?>
                                        </div>
                                        <div class="price-value price-value-yearly">
                                            <?php if($country == 'Global'){ ?>
                                                <?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?><span style="font-size:24px !important">$</span>
                                                <span ><?= $tempValue[0];?></span><span>
                                                    <sup style="top: -0.8em;font-size: 45%;">
                                                        <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                    </sup>
                                                </span>
                                                <span class="subtitle">per month</span>
                                            <span class="subtitle">billed monthly</span><br><br><span class="subtitle">or <?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:12px !important">$</span>
                                                    <span style="font-size:14px;font-weight: 700;color: black;"><?= $tempValue[0];?></span><span>
                                                        <sup style=" top: -4.8px;font-size:10px;font-weight: 700;color: black;">
                                                            <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                        </sup>
                                                    </span>
                                                    billed month
                                                </span>
                                            <?php }else { ?>
                                                <?php $discount_asalta = explode (".",($YearlyPackages[$rows]->getDiscountedPrice())); ?><span style="font-size:24px !important;font-weight:700">$</span>
                                                <span style="font-weight:700"><?= $discount_asalta[0];?></span>
                                                <span>
                                                    <sup style="top: -0.8em;font-size: 45%;font-weight:700">
                                                        <?= isset($discount_asalta[1]) ? '.' . $discount_asalta[1] : '.00';?>
                                                    </sup>
                                                </span>
                                                <?php if(Yii::$app->params["EnableProductPricingDiscounts"]){ ?>
                                                <span class="strikethrough">
                                                    <?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?><span style="font-size:18px !important;color:#a9a9a9;">$</span>
                                                    <span style="font-size: 34px;color:#a9a9a9;"><?= $tempValue[0];?></span>
                                                    <span>
                                                        <sup style="top: -0.8em;font-size: 40%;color:#a9a9a9;">
                                                            <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                        </sup>
                                                    </span>
                                                </span>
                                                <?php } ?>
                                                <span class="subtitle">per month</span>
                                                <span class="subtitle">billed annually</span><br><br><span class="subtitle">or <?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:12px !important">$</span>
                                                    <span style="font-size:14px;font-weight: 700;color: black;"><?= $tempValue[0];?></span><span>
                                                        <sup style=" top: -4.8px;font-size:10px;font-weight: 700;color: black;">
                                                            <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                        </sup>
                                                    </span>
                                                    billed monthly
                                                </span>
                                             <?php } ?>
                                        </div>
                                        <div class="price-value-monthly">
                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/payment"), [
                                                'data' => [
                                                    'method' => 'post',
                                                    'params' => [
                                                        'id' => $MonthlyPackages[$rows]->retail_packageid,
                                                        'product' => 'Retail',
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
                                                        'id' => $YearlyPackages[$rows]->retail_packageid,
                                                        'product' => 'Retail',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=retail")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                        <div class="pricingContent">
                                            <ul class="monthlyPlanInput">
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional users can be added at $8.88  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0)?$MonthlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <?php }else { ?>
                                                    <li data-original-title="Additional users can be added at $10.88 per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0)?$MonthlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <?php } ?>
                                                <?php if($country =="India"){?>
                                                    <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $8.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_channels == 0) ? " - " : (($MonthlyPackages[$rows]->numof_channels > 0)?$MonthlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <?php }else{?>
                                                    <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $10.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_channels == 0) ? " - " : (($MonthlyPackages[$rows]->numof_channels > 0)?$MonthlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <?php } ?>
                                                <li>Asalta eCommerce</li>
                                                <li>Asalta POS</li>
                                                <?php if($country =='India'){ ?>
                                                    <li data-original-title="Additional Orders can be added at $4.88  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_online_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_online_order)  . " Sales Orders/".'<br>'."month": " Multiple Sales Orders ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional Orders can be added at $10.88 for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_online_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_online_order)  . " Sales Orders/".'<br>'."month": " Multiple Sales Orders ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional Orders can be added at $4.88  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_offline_order)  . " Offline sales orders /".'<br>'."  month": " Multiple Offline sales orders ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional Orders can be added at $10.88 for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_offline_order)  . " Offline sales orders /".'<br>'."  month": " Multiple Offline sales orders ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?><li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at $8.88 per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0)?$MonthlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <?php } else { ?><li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at $50.88 per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0)?$MonthlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional blocks of 100 SKU” can be added @ $8.88 per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional blocks of 100 SKU” can be added @ $10.88 per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                                <?php } ?>
                                                <li data-original-title="100% features of Asalta Inventory system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta Inventory<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="100% features of Asalta Point of Sale Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta POS<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="100% features of Asalta eCommerce system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta eCommerce<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="100% features of Asalta Human Resource Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta HRM<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="100% features of Asalta Customer Relation Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta CRM<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                            </ul>
                                            <ul class="yearlyPlanInput">
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional users can be added at $8.88  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0)?$YearlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <?php }else { ?>
                                                    <li data-original-title="Additional users can be added at $10.88 per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0)?$YearlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <?php } ?>  
                                                <?php if($country =="India"){?>
                                                    <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $8.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0)?$YearlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <?php }else{?>
                                                    <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $10.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0)?$YearlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <?php } ?>
                                                <li>Asalta eCommerce</li>
                                                <li>Asalta POS</li>
                                                <?php if($country =='India'){ ?>
                                                    <li data-original-title="Additional Orders can be added at $4.88  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . " Sales Orders/".'<br>'."month": " Multiple Sales Orders ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional Orders can be added at $10.88 for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . " Sales Orders/".'<br>'."month": " Multiple Sales Orders ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional Orders can be added at $4.88  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_offline_order)  . " Offline sales orders /".'<br>'."  month": " Multiple Offline sales orders ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional Orders can be added at $10.88 for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_offline_order)  . " Offline sales orders /".'<br>'."  month": " Multiple Offline sales orders ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at $8.88 per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)?$YearlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at $50.88 per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)?$YearlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional blocks of 100 SKU” can be added @ $8.88 per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional blocks of 100 SKU” can be added @ $10.88 per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                                <?php } ?>
                                                <li data-original-title="100% features of Asalta Inventory system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta Inventory<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="100% features of Asalta Point of Sale Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta POS<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="100% features of Asalta eCommerce system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta eCommerce<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="100% features of Asalta Human Resource Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta HRM<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="100% features of Asalta Customer Relation Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta CRM<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
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
                                        <div class="pricingTable-header"><h3>Large</h3>
                                            <p class="prising-table-text"><?php   echo ($YearlyPackages[$rows]->description); ?></p></div>
                                            <div class="price-value price-value-monthly">
                                            <?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?><span style="font-size:24px !important">$</span>
                                            <span ><?= $tempValue[0];?></span><span>
                                                <sup style="top: -0.8em;font-size: 45%;">
                                                    <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                </sup>
                                            </span>
                                            <span class="subtitle">per month</span>
                                            <span class="subtitle">billed monthly</span><br><br><span class="subtitle">or
                                                <?php if($country == 'Global'){ ?>
                                                    <?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:12px !important">$</span>
                                                    <span style="font-size:14px;font-weight: 700;color: black;"><?= $tempValue[0];?></span><span>
                                                        <sup style=" top: -4.8px;font-size:10px;font-weight: 700;color: black;">
                                                            <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                        </sup>
                                                    </span>
                                                   billed annually
                                                </span>
                                                <?php }else { ?>
                                                <?php $discount_asalta = explode(".",($YearlyPackages[$rows]->getDiscountedPrice()));?>
                                                <span style="font-size:12px !important;font-weight: 700">$</span><span style="font-size:14px;font-weight: 700;color: black;"><?= $discount_asalta[0];?></span><span><sup style=" top: -4.8px;font-size:10px;font-weight: 700;color: black;"><?= isset($discount_asalta[1]) ? '.'. $discount_asalta[1] :'.00';?></sup></span>
                                            <?php if(Yii::$app->params["EnableProductPricingDiscounts"]){ ?>
                                            <span class="strikethrough_monthly">
                                                <?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                              <span style="font-size:10px !important;color:#a9a9a9;">$</span>
                                                <span style="font-size:12px;font-weight: 200;color:#a9a9a9;"><?= $tempValue[0];?></span><span>
                                                   <sup style=" top: -4.8px;font-size:8px;font-weight: 200;color:#a9a9a9;">
                                                        <?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?>
                                                    </sup>
                                                </span>
                                            </span>
                                            <?php } ?>
                                            billed annually
                                            </span>
                                            <?php } ?>
                                        </div>
                                        <div class="price-value price-value-yearly">
                                            <?php if($country == 'Global'){ ?>
                                                <?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?><span style="font-size:24px !important">$</span>
                                                <span ><?= $tempValue[0];?></span><span>
                                                    <sup style="top: -0.8em;font-size: 45%;">
                                                        <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                    </sup>
                                                </span>
                                                <span class="subtitle">per month</span>
                                            <span class="subtitle">billed monthly</span><br><br><span class="subtitle">or <?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:12px !important">$</span>
                                                    <span style="font-size:14px;font-weight: 700;color: black;"><?= $tempValue[0];?></span><span>
                                                        <sup style=" top: -4.8px;font-size:10px;font-weight: 700;color: black;">
                                                            <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                        </sup>
                                                    </span>
                                                    billed month
                                                </span>
                                            <?php }else { ?>
                                                <?php $discount_asalta = explode (".",($YearlyPackages[$rows]->getDiscountedPrice())); ?><span style="font-size:24px !important;font-weight:700">$</span>
                                                <span style="font-weight:700"><?= $discount_asalta[0];?></span>
                                                <span>
                                                    <sup style="top: -0.8em;font-size: 45%;font-weight:700">
                                                        <?= isset($discount_asalta[1]) ? '.' . $discount_asalta[1] : '.00';?>
                                                    </sup>
                                                </span>
                                                <?php if(Yii::$app->params["EnableProductPricingDiscounts"]){ ?>
                                                <span class="strikethrough">
                                                    <?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?><span style="font-size:18px !important;color:#a9a9a9;">$</span>
                                                    <span style="font-size: 34px;color:#a9a9a9;"><?= $tempValue[0];?></span>
                                                    <span>
                                                        <sup style="top: -0.8em;font-size: 40%;color:#a9a9a9;">
                                                            <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                        </sup>
                                                    </span>
                                                </span>
                                                <?php } ?>
                                                <span class="subtitle">per month</span>
                                                <span class="subtitle">billed annually</span><br><br><span class="subtitle">or <?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:12px !important">$</span>
                                                    <span style="font-size:14px;font-weight: 700;color: black;"><?= $tempValue[0];?></span><span>
                                                        <sup style=" top: -4.8px;font-size:10px;font-weight: 700;color: black;">
                                                            <?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                        </sup>
                                                    </span>
                                                    billed monthly
                                                </span>
                                             <?php } ?>
                                        </div>
                                        <div class="price-value-monthly">
                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/payment"), [
                                                'data' => [
                                                    'method' => 'post',
                                                    'params' => [
                                                        'id' => $MonthlyPackages[$rows]->retail_packageid,
                                                        'product' => 'Retail',
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
                                                        'id' => $YearlyPackages[$rows]->retail_packageid,
                                                        'product' => 'Retail',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=retail")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a></div>
                                        <div class="pricingContent">
                                            <ul class="monthlyPlanInput">
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional users can be added at $8.88  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0)?$MonthlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <?php }else { ?>
                                                    <li data-original-title="Additional users can be added at $10.88 per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_user == 0) ? " - " : (($MonthlyPackages[$rows]->numof_user > 0)?$MonthlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <?php } ?>
                                                <?php if($country =="India"){?>
                                                    <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $8.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_channels == 0) ? " - " : (($MonthlyPackages[$rows]->numof_channels > 0)?$MonthlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <?php }else{?>
                                                    <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $10.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_channels == 0) ? " - " : (($MonthlyPackages[$rows]->numof_channels > 0)?$MonthlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <?php } ?>
                                                <li>Asalta eCommerce</li>
                                                <li>Asalta POS</li>
                                                <?php if($country =='India'){ ?>
                                                    <li data-original-title="Additional Orders can be added at $4.88  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_online_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_online_order)  . " Sales Orders/".'<br>'."month": " Multiple Sales Orders ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional Orders can be added at $10.88 for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_online_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_online_order)  . " Sales Orders/".'<br>'."month": " Multiple Sales Orders ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional Orders can be added at $4.88  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_offline_order)  . " Offline sales orders /".'<br>'."  month": " Multiple Offline sales orders ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional Orders can be added at $10.88 for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($MonthlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numof_offline_order)  . " Offline sales orders /".'<br>'."  month": " Multiple Offline sales orders ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?><li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at $8.88 per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0)?$MonthlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <?php } else { ?><li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at $50.88 per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numof_outlet == 0) ? " - " : (($MonthlyPackages[$rows]->numof_outlet > 0)?$MonthlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional blocks of 100 SKU” can be added @ $8.88 per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional blocks of 100 SKU” can be added @ $10.88 per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($MonthlyPackages[$rows]->numberof_items == 0) ? " - " : (($MonthlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                                <?php } ?>
                                                <li data-original-title="100% features of Asalta Inventory system system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta Inventory<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="100% features of Asalta Point of Sale Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta POS<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="100% features of Asalta Human Resource Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta eCommerce<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="100% features of Asalta Human Resource Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta HRM<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="100% features of Asalta Customer Relation Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta CRM<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                            </ul>
                                            <ul class="yearlyPlanInput">
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional users can be added at $8.88  per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0)?$YearlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <?php }else { ?>
                                                    <li data-original-title="Additional users can be added at $10.88 per user/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_user == 0) ? " - " : (($YearlyPackages[$rows]->numof_user > 0)?$YearlyPackages[$rows]->numof_user . " Users": " Multiple Users ") ?></li>
                                                <?php } ?>  
                                                <?php if($country =="India"){?>
                                                    <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $8.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0)?$YearlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <?php }else{?>
                                                    <li data-original-title="Integration Channels Include, integration with third party eCommerce, Accounting softwares like XERO, Quickbooks and many other Integration choices provided. Check out the integrations page from the link provided at the bottom of this page.Additional Integration channels can be added at $10.88 per sales channel/ per month. 20% discount apply for annual payments" data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0)?$YearlyPackages[$rows]->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                                <?php } ?>
                                                <li>Asalta eCommerce</li>
                                                <li>Asalta POS</li>
                                                <?php if($country =='India'){ ?>
                                                    <li data-original-title="Additional Orders can be added at $4.88  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . " Sales Orders/".'<br>'."month": " Multiple Sales Orders ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional Orders can be added at $10.88 for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . " Sales Orders/".'<br>'."month": " Multiple Sales Orders ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional Orders can be added at $4.88  for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_offline_order)  . " Offline sales orders /".'<br>'."  month": " Multiple Offline sales orders ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional Orders can be added at $10.88 for every 100 sales order/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_offline_order)  . " Offline sales orders /".'<br>'."  month": " Multiple Offline sales orders ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at $8.88 per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)?$YearlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Warehouse is also treated as different locations or outlets. You can change the naming as per your usage in the system. Additional Warehouse can be added at $50.88 per warehouse/ per month. 20% discount apply for annual payments. " data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)?$YearlyPackages[$rows]->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                                <?php } ?>
                                                <?php if($country == 'India'){ ?>
                                                    <li data-original-title="Additional blocks of 100 SKU” can be added @ $8.88 per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                                <?php } else { ?>
                                                    <li data-original-title="Additional blocks of 100 SKU” can be added @ $10.88 per SKU Block/ per month. 20% discount apply for annual payments." data-container="body" data-toggle="tooltip" data-placement="top" title=""><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                                <?php } ?>
                                                <li data-original-title="100% features of Asalta Inventory system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta Inventory<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="100% features of Asalta Point of Sale Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta POS<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="100% features of Asalta eCommerce system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta eCommerce<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="100% features of Asalta Human Resource Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta HRM<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
                                                <li data-original-title="100% features of Asalta Customer Relation Management system. See comparison table below for more details." data-container="body" data-toggle="tooltip" data-placement="top" title="">Asalta CRM<span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-full.png"alt="Asalta full"></span></li>
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
                    <div class="col-sm-12 col-md-offset-1" style="padding: 10px 17px;">
                        <p class="pricing_text_scale">  All Prices in USD</p>
                    </div>
                </div>
            </div>
            <div class="buttons" style="text-align: center;padding-bottom:45px;"><a class="hrm_enter_btn hrm_blue_btn" id="hrm_comberplane" href="#retail-suite_compareplane">Compare Plans</a></div>
            <div class="col-sm-12" style="background-color: #fafafa;padding-bottom:55px;">
                <div class="container add_on_div">
                    <h2 class="add_on_pricing_head" style="padding-top: 25px;">Add Ons</h2>   
                    <p class="each_add_ons">You can buy multiples of each add-ons</p> 
                    <?php if($country == 'India'){ ?>
                        <div class="col-md-6 addOnsPricing">
                          <h4 class="add_on_pricing_head_h4">Sales Channels</h4>
                            <p class="add_on_text"><span style="font-size:14px;font-family: Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;">$8<sup style=" top: -4.8px;font-size:10px;">.88</sup></span> per sales channel/ per month.</p>  
                        </div>
                        <div class="col-md-6 addOnsPricing">
                            <h4 class="add_on_pricing_head_h4">Sales Orders</h4>
                            <p class="add_on_text" ><span style="font-size:14px;font-family: Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;">$4<sup style=" top: -4.3px;font-size:10px;">.88</sup></span> for every 100 sales order/ per month.</p>
                        </div>
                        <div class="col-md-6 addOnsPricing">
                            <h4 class="add_on_pricing_head_h4">No. of users</h4>
                            <p class="add_on_text" ><span style="font-size:14px;font-family: Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;">$8<sup style=" top: -4.8px;font-size:10px;">.88</sup></span> per user/ per month.</p> 
                        </div>
                        <div class="col-md-6 addOnsPricing">
                            <h4 class="add_on_pricing_head_h4">Warehouse</h4>
                            <p class="add_on_text" ><span style="font-size:14px;font-family: Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;">$8<sup style=" top: -4.8px;font-size:10px;">.88</sup></span> per warehouse/ per month.</p>
                        </div>
                        <div class="col-md-6 addOnsPricing">
                            <h4 class="add_on_pricing_head_h4">SKU</h4>
                            <p class="add_on_text" >“Blocks of 100 SKU” @ <span style="font-size:14px;font-family: Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;">$8<sup style=" top: -4.8px;font-size:10px;">.88</sup></span> per SKU Block/ per month.<br> SKU can be bought only in multiples of 100.</p>
                        </div>
                        <?php }else { ?>
                            <div class="col-md-6 addOnsPricing">
                          <h4 class="add_on_pricing_head_h4">Sales Channels</h4>
                            <p class="add_on_text"><span style="font-size:14px;font-family: Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;">$10<sup style=" top: -4.8px;font-size:10px;">.88</sup></span> per sales channel/ per month.</p>  
                        </div>
                        <div class="col-md-6 addOnsPricing">
                            <h4 class="add_on_pricing_head_h4">Sales Orders</h4>
                            <p class="add_on_text" ><span style="font-size:14px;font-family: Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;">$10<sup style=" top: -4.8px;font-size:10px;">.88</sup></span> for every 100 sales order/ per month.</p>
                        </div>
                        <div class="col-md-6 addOnsPricing">
                            <h4 class="add_on_pricing_head_h4">No. of users</h4>
                            <p class="add_on_text" ><span style="font-size:14px;font-family: Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;">$10<sup style=" top: -4.8px;font-size:10px;">.88</sup></span> per user/ per month.</p> 
                        </div>
                        <div class="col-md-6 addOnsPricing">
                            <h4 class="add_on_pricing_head_h4">Warehouse</h4>
                            <p class="add_on_text" ><span style="font-size:14px;font-family: Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;">$50<sup style=" top: -4.8px;font-size:10px;">.88</sup></span> per warehouse/ per month.</p>
                        </div>
                        <div class="col-md-6 addOnsPricing">
                            <h4 class="add_on_pricing_head_h4">SKU</h4>
                            <p class="add_on_text" >“Blocks of 100 SKU” @ <span style="font-size:14px;font-family: Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;">$10<sup style=" top: -4.8px;font-size:10px;">.88</sup></span> per SKU Block/ per month.<br> SKU can be bought only in multiples of 100.</p>
                        </div>
                    <?php } ?>           
                </div>
                <div class="container">
                    <p class="each_add_ons_discount" style="padding: 0 12.3%">20% discount applicable for all Add Ons when bought for a year.</p>
                </div>
            </div>
            <div class="col-md-12">
                <div id="retail-suite_compareplane" class="retail_comberplane" >
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
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;background-color:#fafafa">Micro</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;background-color:#fafafa">Small</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;background-color:#fafafa">Medium</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;background-color:#fafafa">Large</th>
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
                                                        (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                    }
                                            if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                <td style="text-align: center;"><?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:14px;"><?= '$'. $tempValue[0];?><sup style=" top: -4.8px;font-size:10px;"><?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?></sup></span> per month billed annually</td>
                                                <?php
                                                    $rows++;
                                                }  
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                <td style="text-align: center;"><?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:14px;"><?= '$'. $tempValue[0];?><sup style=" top: -4.8px;font-size:10px;"><?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?></sup></span> per month billed annually</td>
                                                <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;"><?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:14px;"><?= '$'. $tempValue[0];?><sup style=" top: -4.8px;font-size:10px;"><?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?></sup></span> per month billed annually</td>
                                                    <?php
                                                    $rows++;
                                                }  
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                <td style="text-align: center;"><?php $tempValue = explode(".",($YearlyPackages[$rows]->priced_monthly));?>
                                                    <span style="font-size:14px;"><?= '$'. $tempValue[0];?><sup style=" top: -4.8px;font-size:10px;"><?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?></sup></span> per month billed annually</td>
                                                <?php
                                                }
                                                ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Billed Monthly</th>
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
                                                    (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                }

                                                if(isset( $MonthlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                <span style="font-size:14px;"><?= '$'. $tempValue[0];?><sup style=" top: -4.8px;font-size:10px;"><?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?></sup></span> billed monthly</td>
                                            <?php
                                                $rows++;
                                            }   
                                                if(isset( $MonthlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                <span style="font-size:14px;"><?= '$'. $tempValue[0];?><sup style=" top: -4.8px;font-size:10px;"><?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?></sup></span> billed monthly</td>
                                            <?php
                                                $rows++;
                                            }   
                                                if(isset( $MonthlyPackages[$rows])) {
                                            ?>
                                                <td style="text-align: center;"><?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                <span style="font-size:14px;"><?= '$'.$tempValue[0];?><sup style=" top: -4.8px;font-size:10px;"><?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?></sup></span> billed monthly</td>
                                                 <?php
                                                $rows++;
                                            }   
                                                if(isset( $MonthlyPackages[$rows])) {
                                            ?>
                                                <td style="text-align: center;"><?php $tempValue = explode(".",($MonthlyPackages[$rows]->priced_monthly));?>
                                                <span style="font-size:14px;"><?= '$'.$tempValue[0];?><sup style=" top: -4.8px;font-size:10px;"><?= isset($tempValue[1]) ? '.'. $tempValue[1] :'.00';?></sup></span> billed monthly</td>    
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Users</th>
                                            <?php
                                                    $rows = 0;
                                                ?>
                                            <?php
                                                if(isset( $YearlyPackages[$rows]) && false ) {
                                            ?>
                                            <td style="text-align: center;"></td>
                                            <?php
                                                $rows++;
                                                } else {
                                                    (count($MonthlyPackages) == 5) ? $rows++ : false;
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
                                            <td class="fixed-side active"  colspan="5" style="text-align:center;font-weight: bold;">Asalta Inventory</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa"> Integration channels</th>
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
                                            <td style="text-align: center;"><?=  ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0) ? $YearlyPackages[$rows]->numof_channels . " " : "Multiple") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?=  ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0) ? $YearlyPackages[$rows]->numof_channels . " " : "Multiple") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?=  ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0) ? $YearlyPackages[$rows]->numof_channels . " " : "Multiple") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?=  ($YearlyPackages[$rows]->numof_channels == 0) ? " - " : (($YearlyPackages[$rows]->numof_channels > 0) ? $YearlyPackages[$rows]->numof_channels . " " : "Multiple") ?></td>
                                             <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Sales Orders per month</th>
                                             <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>  
                                            <td style="text-align: center;display:none;">10</td>
                                             <?php
                                                $rows++;
                                                } else {
                                                    (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                }

                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?= ($YearlyPackages[$rows]->numof_online_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_online_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_online_order)  . "": "Multiple  ") ?></td>
                                             <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr style="display: none;">
                                            <th class="fixed-side" style="background-color:#fafafa">Offline sales orders per month</th>
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
                                            <td style="text-align: center;"><?= ($YearlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_offline_order)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?= ($YearlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_offline_order)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?= ($YearlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_offline_order)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?= ($YearlyPackages[$rows]->numof_offline_order == 0) ? " - " : (($YearlyPackages[$rows]->numof_offline_order > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_offline_order)  . "": "Multiple  ") ?></td>
                                             <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">No.of Inventory items (SKU)</th>
                                            <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>  
                                            <td style="text-align: center;display:none;">10</td>
                                             <?php
                                                $rows++;
                                                } else {
                                                    (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                }

                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td style="text-align: center;"><?= ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)  . "": "Multiple  ") ?></td>
                                             <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Integrations</th>
                                             <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>  
                                            <td data-original-title="Easily integrate with Xero or QuickBooks Online" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;display:none;"> <span style="color: #6f6e6e;" class="glyphicon glyphicon-minus"></span>
                                            </td>
                                             <?php
                                                $rows++;
                                                } else {
                                                    (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                }

                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td data-original-title="Easily integrate with Xero or QuickBooks Online" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;"><?= ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_integration)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td data-original-title="Easily integrate with Xero or QuickBooks Online" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;"><?= ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_integration)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td data-original-title="Easily integrate with Xero or QuickBooks Online" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;"><?= ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_integration)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td data-original-title="Easily integrate with Xero or QuickBooks Online" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;"><?= ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_integration)  . "": " Multiple ") ?></td>
                                             <?php
                                            }
                                            ?>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Payments</th>
                                            <td data-original-title="Fast and secure credit card payments for wholesale invoices" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;display:none;">
                                                <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                            <td data-original-title="Fast and secure credit card payments for wholesale invoices" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">
                                                <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                            <td data-original-title="Fast and secure credit card payments for wholesale invoices" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">
                                                <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                            <td data-original-title="Fast and secure credit card payments for wholesale invoices" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">
                                                <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                            <td data-original-title="Fast and secure credit card payments for wholesale invoices" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">
                                                <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">B2B eCommerce Store*</th>
                                            <td data-original-title="Sell wholesale online with a B2B store customizable to each customer" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;display:none;"> <span style="color: #6f6e6e;" class="glyphicon glyphicon-minus"></span>
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
                                            <td data-original-title="Sell wholesale online with a B2B store customizable to each customer" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">
                                                <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Currencies</th>
                                            <td style="text-align:center;display:none;">Multiple</td>
                                            <td style="text-align:center;">Multiple</td>
                                            <td style="text-align:center;">Multiple</td>
                                            <td style="text-align:center;">Multiple</td>
                                            <td style="text-align:center;">Multiple</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Warehouses</th>
                                                <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>  
                                            <td data-original-title="Manage stock in multiple locations" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;display:none;"> <span style="color: #6f6e6e;" class="glyphicon glyphicon-minus"></span>
                                            </td>
                                             <?php
                                                $rows++;
                                                } else {
                                                    (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                }

                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td data-original-title="Manage stock in multiple locations" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;"><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_outlet)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td data-original-title="Manage stock in multiple locations" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;"><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_outlet)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td data-original-title="Manage stock in multiple locations" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;"><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_outlet)  . "": " Multiple ") ?></td>
                                            <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                            <td data-original-title="Manage stock in multiple locations" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;"><?= ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0)? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_outlet)  . "": " Multiple ") ?></td>
                                             <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Support Offering</th>
                                            <td data-original-title="Get in touch with our super awesome support team 24 hours a day, 7 days a week" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;display:none;">24/7 Email</td>
                                            <td data-original-title="Get in touch with our super awesome support team 24 hours a day, 7 days a week" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">24/7 Email</td>
                                            <td data-original-title="Get in touch with our super awesome support team 24 hours a day, 7 days a week" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">24/7 Email</td>
                                            <td data-original-title="Get in touch with our super awesome support team 24 hours a day, 7 days a week" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">24/7 Email</td>
                                            <td data-original-title="Get in touch with our super awesome support team 24 hours a day, 7 days a week" data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align:center;">24/7 Email</td>
                                        </tr>
                                        <tr>
                                            <td class="fixed-side active"  colspan="5" style="text-align:center;font-weight: bold;">Asalta POS</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Outlet</th>
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
                                                <td  style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . "" : " Multiple") ?></td>
                                                <?php
                                                        $rows++;
                                                    }   
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td  style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . "" : " Multiple") ?> </td>
                                                 <?php
                                                        $rows++;
                                                    }   
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td  style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . "" : " Multiple") ?> </td>
                                                 <?php
                                                        $rows++;
                                                    }   
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td  style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_outlet == 0) ? " - " : (($YearlyPackages[$rows]->numof_outlet > 0) ? $YearlyPackages[$rows]->numof_outlet . "" : " Multiple") ?> </td>
                                                <?php
                                                }
                                                ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Sales a month</th>
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
                                                <td  style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_pos_receipts == 0) ? " - " : (($YearlyPackages[$rows]->numof_pos_receipts > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_pos_receipts) . "  " : " Multiple") ?></td>
                                                <?php
                                                        $rows++;
                                                    }   
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td  style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_pos_receipts == 0) ? " - " : (($YearlyPackages[$rows]->numof_pos_receipts > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_pos_receipts) . "  " : " Multiple") ?></td>
                                                <?php
                                                        $rows++;
                                                    }   
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td  style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_pos_receipts == 0) ? " - " : (($YearlyPackages[$rows]->numof_pos_receipts > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_pos_receipts) . "  " : " Multiple") ?></td>
                                                <?php
                                                        $rows++;
                                                    }   
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td  style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numof_pos_receipts == 0) ? " - " : (($YearlyPackages[$rows]->numof_pos_receipts > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_pos_receipts) . "  " : " Multiple") ?></td>
                                                <?php
                                                }
                                                ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Advanced Promotions & Gift Cards</th>
                                            <td  style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td  style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td  style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td  style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Accounting Integration</th>
                                            <td  style="text-align: center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td  style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td  style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td  style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
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
                                                        (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                    }

                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                <td  style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items) . " " : " Multiple  ")  ?></td>
                                                <?php
                                                        $rows++;
                                                    }   
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>

                                                <td  style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items) . " " : " Multiple  ")  ?></td>
                                                    <?php
                                                        $rows++;
                                                    }   
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                    
                                                <td  style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items) . " " : " Multiple  ")  ?></td>
                                                 <?php
                                                        $rows++;
                                                    }   
                                                        if(isset( $YearlyPackages[$rows])) {
                                                    ?>
                                                    
                                                <td  style="text-align: center;"><?php   echo ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0) ? Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items) . " " : " Multiple  ")  ?></td>
                                                <?php
                                                }
                                                ?>
                                        </tr>
                                        <tr>
                                            <td class="fixed-side active"  colspan="5" style="text-align:center;font-weight: bold;">Asalta HRM</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Basic HRIS</th>
                                            <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">Employee Self Service</th>
                                                <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">leave Management</th>
                                                <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">Mobile Application</th>
                                                <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">Timesheets</th>
                                                <td style="text-align: center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align: center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">Claims Management</th>
                                                <td style="text-align: center;">
                                                    <span style="color: #6f6e6e;" class=" glyphicon-minus"></span>
                                                </td>
                                                <td style="text-align: center;">
                                                     <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok
                                                "></span></td>
                                                <td style="text-align: center;">
                                                     <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok
                                                "></span></td>
                                                <td style="text-align: center;">
                                                    <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok
                                                "></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">3<sup style="top: -0.8em;font-size: 45%;">rd</sup> Party Integrations</th>
                                                <td style="text-align:center;">
                                                    <span style="color: #6f6e6e;" class=" glyphicon-minus"></span>
                                                </td>
                                                <td style="text-align:center;">
                                                     <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok
                                                "></span></td>
                                                <td style="text-align:center;">
                                                     <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok
                                                "></span></td>
                                                <td style="text-align:center;">
                                                     <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok
                                                "></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">Shift Roster (Scheduling)</th>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">Performance </th>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">Reports Integration</th>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">Time In/Out -ID Scan</th>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">Approval Groups</th>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">Commission Management</th>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>  
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">GPS Location Tracking*</th>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">360 Feedback</th>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">Multiple Organizations</th>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">Plus 10 hrs Training</th>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">Recruitment</th>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="fixed-side" style="background-color:#fafafa;">Face Recognition (Face ID)*</th>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                                <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                        <tr>
                                            <td class="fixed-side active"  colspan="5" style="text-align:center;font-weight: bold;">Asalta CRM</td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Contact Management</th>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Contacts</th>
                                            <?php
                                                    $rows = 0;
                                                ?>
                                            <?php
                                                if(isset( $YearlyPackages[$rows]) && false ) {
                                            ?>
                                            <td style="text-align: center;"></td>
                                            <?php
                                                $rows++;
                                                } else {
                                                    (count($MonthlyPackages) == 5) ? $rows++ : false;
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
                                                $rows++;
                                            }   
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                                <td style="text-align: center;"><?php echo  ($YearlyPackages[$rows]->numof_contact == 0) ? " - " : (($YearlyPackages[$rows]->numof_contact > 0)?Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_contact) . " ": " Multiple ") ?></td>
                                            <?php
                                            }
                                            ?>      
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Leads</th>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Default pipeline Lead and Sales</th>
                                            <td style="text-align: center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Dynamic Pipeline Management</th>
                                            <?php
                                                    $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>
                                                <td style="text-align: center;"></td>
                                                <?php
                                                    $rows++;
                                                    } else {
                                                        (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                    }

                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                <td style="text-align: center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <?php
                                                    $rows++;
                                                }  
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                <td style="text-align: center;"><?php echo ( Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_dnamic_pipeline)); ?></td>
                                                <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;"><?php echo ( Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_dnamic_pipeline)); ?></td>
                                                    <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;"><?php echo  ($YearlyPackages[$rows]->numof_dnamic_pipeline == 0) ? " - " : (($YearlyPackages[$rows]->numof_dnamic_pipeline > 0)?Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_dnamic_pipeline) . " ": " Multiple ") ?></td>
                                                <?php
                                                }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Smart Webforms</th>
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
                                                <td style="text-align: center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                                <?php
                                                    $rows++;
                                                }  
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                <td style="text-align: center;"><?php echo ( Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_smart_webform)); ?></td>
                                                <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;"><?php echo ( Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_smart_webform)); ?></td>
                                                    <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;"><?php echo  ($YearlyPackages[$rows]->numof_smart_webform == 0) ? " - " : (($YearlyPackages[$rows]->numof_smart_webform > 0)?Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_smart_webform) . " ": " Multiple ") ?></td>
                                                <?php
                                                }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Calendar</th>
                                            <td style="text-align: center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Task management</th>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Reminders</th>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Smart Notifications</th>
                                            <td style="text-align: center;"></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Receivables & Outstanding</th>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Marketing</th>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Document Signing*</th>
                                            <td style="text-align: center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align: center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Item List</th>
                                            <?php
                                                    $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>
                                                <td style="text-align: center;"></td>
                                                <?php
                                                    $rows++;
                                                    } else {
                                                        (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                    }

                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                <td style="text-align: center;"><?php echo ( Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)); ?></td>
                                                <?php
                                                    $rows++;
                                                }  
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                <td style="text-align: center;"><?php  echo ( Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)); ?></td>
                                                <?php
                                                    $rows++;
                                                }   
                                                if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                 <td style="text-align: center;"><?php  echo ( Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items)); ?></td>
                                                <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;"><?php echo  ($YearlyPackages[$rows]->numberof_items == 0) ? " - " : (($YearlyPackages[$rows]->numberof_items > 0)?Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numberof_items) . " ": " Multiple ") ?></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Event Management</th>
                                            <td style="text-align: center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align: center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align: center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align: center;"><span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Integration</th>
                                            <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>
                                                <td style="text-align: center;"></td>
                                                <?php
                                                    $rows++;
                                                    } else {
                                                        (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                    }

                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                <td style="text-align: center;"><?php echo ( Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_integration)); ?></td>
                                                <?php
                                                    $rows++;
                                                }  
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                <td style="text-align: center;"><?php  echo ( Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_integration)); ?></td>
                                                <?php
                                                    $rows++;
                                                }   
                                                if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                 <td style="text-align: center;"><?php  echo ( Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_integration)); ?></td>
                                                <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td style="text-align: center;"><?php echo  ($YearlyPackages[$rows]->numof_integration == 0) ? " - " : (($YearlyPackages[$rows]->numof_integration > 0)?Yii::$app->formatter->asInteger($YearlyPackages[$rows]->numof_integration) . " ": " Multiple ") ?></td>
                                                <?php
                                                }
                                            ?>
                                        </tr>
                                        <tr>
                                            <td class="fixed-side active"  colspan="5" style="text-align: center;font-weight: bold;" >Asalta eCommerce
                                            </td>
                                        </tr>
                                        <tr>
                                            <th  class="fixed-side" style="background-color:#fafafa">Yearly Online Sales revenue</th>
                                            <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>
                                                <td data-original-title="Sales revenue for 12 months. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption." data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align: center;"></td>
                                                <?php
                                                    $rows++;
                                                    } else {
                                                        (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                    }

                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                <td data-original-title="Sales revenue for 12 months. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption." data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align: center;">$<?php echo ( Yii::$app->formatter->asInteger($YearlyPackages[$rows]->online_sales_revenue)); ?></td>
                                                <?php
                                                    $rows++;
                                                }  
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                <td data-original-title="Sales revenue for 12 months. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption." data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align: center;">$<?php  echo ( Yii::$app->formatter->asInteger($YearlyPackages[$rows]->online_sales_revenue)); ?></td>
                                                <?php
                                                    $rows++;
                                                }   
                                                if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                 <td data-original-title="Sales revenue for 12 months. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption." data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align: center;">$<?php  echo ( Yii::$app->formatter->asInteger($YearlyPackages[$rows]->online_sales_revenue)); ?></td>
                                                <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $YearlyPackages[$rows])) {
                                                ?>
                                                    <td data-original-title="Sales revenue for 12 months. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption." data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align: center;">$<?php echo  ($YearlyPackages[$rows]->online_sales_revenue == 0) ? " - " : (($YearlyPackages[$rows]->online_sales_revenue > 0)?Yii::$app->formatter->asInteger($YearlyPackages[$rows]->online_sales_revenue) . " ": " Multiple ") ?></td>
                                                <?php
                                                }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Monthly Online Sales revenue</th>
                                            <?php
                                                $rows = 0;
                                                ?>
                                                <?php
                                                    if(isset( $YearlyPackages[$rows]) && false ) {
                                                ?>
                                                <td data-original-title="Sales revenue for one month. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption." data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align: center;"></td>
                                                <?php
                                                    $rows++;
                                                    } else {
                                                        (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                    }

                                                    if(isset( $MonthlyPackages[$rows])) {
                                                ?>
                                                <td data-original-title="Sales revenue for one month. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption." data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align: center;">$<?php echo ( Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->online_sales_revenue)); ?></td>
                                                <?php
                                                    $rows++;
                                                }  
                                                    if(isset( $MonthlyPackages[$rows])) {
                                                ?>
                                                <td data-original-title="Sales revenue for one month. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption." data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align: center;">$<?php  echo ( Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->online_sales_revenue)); ?></td>
                                                <?php
                                                    $rows++;
                                                }   
                                                if(isset( $MonthlyPackages[$rows])) {
                                                ?>
                                                 <td data-original-title="Sales revenue for one month. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption." data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align: center;">$<?php  echo ( Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->online_sales_revenue)); ?></td>
                                                <?php
                                                    $rows++;
                                                }   
                                                    if(isset( $MonthlyPackages[$rows])) {
                                                ?>
                                                    <td data-original-title="Sales revenue for one month. When Sales revenue reaches the package limit, you will be auto upgraded to next package, without any interruption." data-container="body" data-toggle="tooltip" data-placement="top" title="" style="text-align: center;">$<?php echo  ($MonthlyPackages[$rows]->online_sales_revenue == 0) ? " - " : (($MonthlyPackages[$rows]->online_sales_revenue > 0)?Yii::$app->formatter->asInteger($MonthlyPackages[$rows]->online_sales_revenue) . " ": " Multiple ") ?></td>
                                                <?php
                                                }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">No.of Inventory items (SKU)</th>
                                            <td style="text-align: center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align: center;">100 </td>
                                            <td style="text-align: center;">2,000 </td>
                                            <td style="text-align: center;">5,000 </td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Integration</th>
                                            <td style="text-align: center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align: center;">1</td>
                                            <td style="text-align: center;">10 </td>
                                            <td style="text-align: center;">Multiple </td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa">Warehouses</th>
                                            <td style="text-align: center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align: center;">1</td>
                                            <td style="text-align: center;">3 </td>
                                            <td style="text-align: center;">5</td>
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
                <div class="col-sm-12 inventory_plans_for_businesses">
                    <div class="row">
                        <div class="inventory_pricing_table_div"><h2 class="require_more_business">
                            Plans for businesses that require more</h2>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12 col-md-offset-1"style="padding-right: 24px;">
                                <div class="col-md-5 col-sm-5">
                                    <div><a href="<?=$this->publicHtml;?>/signup?product=retail-on-premises"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-clouds-text.png" class="priceing_image_en" alt="Inventory Management Software"></a></div>
                                    <div>
                                        <h4 class="entpricing_text_h">Need On Premises or Private Cloud</h4> <h4 class="entpricing_text_h" style="padding: 0 0px;">Setup for your business?</h4>
                                        <div class="buttons" style="text-align: center;padding: 18px 0 0px 0px;">
                                            <a class="enter_btn  blue_btn" href="<?=$this->publicHtml;?>/signup?product=retail-on-premises">CONTACT SALES TEAM</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <div><a href="<?=$this->publicHtml;?>/signup?product=retail-tailormade"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta_tailor.png" class="priceing_image_eng" alt="Inventory Management Software"></a></div>
                                    <div>
                                        <h4 class="entpricing_text_h">Need Tailormade plan for your business?</h4>
                                        <p class="entpricing_text_para">Get our custom made Enterprice plan to manage more and<br> more orders for bigger businesses!</p>
                                        <div class="buttons" style="text-align: center;">
                                            <a class="enter_btn  blue_btn" href="<?=$this->publicHtml;?>/signup?product=retail-tailormade">CONTACT SALES TEAM</a>
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
                                    How long do I get to try Asalta Retail Suite ?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>You can sign up and try Asalta Retail for its full capability for 14 days after which, you can to subscribe to a suiteable pricing plan that fits your business needs.
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
                                <p>If you think 14 days are not enough to fully explore the system, we’re more than happy to extend your trial. Once your trial expires, contact our sales team by emailing them at <a href="<?=$this->publicHtml;?>/support"> support@asalta.com</a>
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
                                <p>Asalta Retail suite is cloud-based inventory management software with complex automation, high security, and 24/7 support. To get started with Asalta Retail Suite Enterprise Package, Contact Sales send us an email at <a href="<?=$this->publicHtml;?>/support"> support@asalta.com</a></p>
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
                                    Is my data secure with Asalta Retail suite?
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
                                <p>To help you get started with Asalta Retail suite we provide an extensive knowledge base that consists of useful help articles and video tutorials.<a href="#"> Check it out here.</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    What are the modules in Asalta Retail Suite?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseEight" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Asalta Retail suite has different modules to cater to different areas of managing your stock, Employees and custmers .</p>
                                <ul>
                                    <li>Get the whole picture of your business with our smart Dashboard.</li>
                                    <li>Connect easily with your customers and vendors with Contacts.</li>
                                    <li>Record and manage your stock with Items and Category.</li>
                                    <li>Create bundles with Item combination.</li>
                                    <li>Document sales and send invoices.</li>
                                    <li>Restock your inventory with Purchase Orders.</li>
                                    <li>Leaves Management</li>
                                    <li>Timesheet Management</li>
                                    <li>Clock In/Out Management</li>
                                    <li>Claims Management</li>
                                    <li>Commissions Management</li>
                                    <li>Performance Appraisal Management</li>
                                    <li>Roster Management</li>
                                    <li>Holiday Management</li>
                                    <li>Announcement</li>
                                    <li>Payroll Management</li>
                                    <li>Dynamic forms for Survey</li>
                                    <li>Recruitment</li>
                                    <li>Projet Management</li> 
                                    <li>Loyalty Management </li>
                                    <li>Generate real time and multi-perspective Reports.</li>
                                    <li>Expand your reach to new markets with Integrations, which connects your organization with popular online sales channels, providers, online payment gateways, accounting and CRM software.</li>
                                    <li>Tailor your organization to suite your needs and preferences with Settings.</li>
                                    <li>And much more… Start a FREE Trial to try out for yourself</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Can I use Asalta Retail Suite to process payroll for my part time workers?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseNine" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Yes. Asalta Retail suite allows process payroll for your part time workers who are paid monthly or Hourly.</p>
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
                                <p>Get the complete overview of your organization at a glance with our Asalta smart dashboard, that gives you the synopsis of your items, sales, purchases, employee Activities and Contacts . To further aid you with getting the bigger picture, most of the numerical data displayed in the dashboard is hot-wired with the associated module.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    What are the different editions of Asalta Retail Suite?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseEleven" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>As of now we have 3 editions which are based on the country chosen by the user during the quick setup of the organization. The taxes are handled differently across different editions.</p>
                                <p>Global edition - Tuned for the ever-changing conditions of the world, this edition will be applied to all users whose country is not the Singapore or India.</p>
                                <p>Indian edition - available to users who have chosen their country as India during the quick setup of their organization.
                                </p>
                                <p>Singapore edition - available to users who have chosen their country as Singapore while signing up.</p>
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
                                <p>Each industry has its own needs and the volume of their needs is directly proportional to the scale of their business. To cater to your specific needs, we have an array of pricing plans. No hidden costs! No strings attached! You can take a look at our pricing plans by clicking on this<a href="https://www.asalta.com/sg/asalta-retail-suite/pricing"> Link</a>
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThirteen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    How user friendly is Asalta Retail suite? Do we need any prior technical expertise?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseThirteen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>You don't need to be tech person in order to use Asalta Retails suite. Our system is very simple and does not require technical training. Our simple dashboard allows you to handle all your business operations from a single place.</p>
                                <p>Products , contacts and Employees  can be added through spreadsheet imports.</p>
                                <p>Furthermore, your sales and purchase orders populate automatically with your data.</p>
                                <p>Moreover, we also allow you to easily track and update your order status with a visual overview or generate reports depending on your needs.</p>
                                <p>Onboard Training videos and help manual is available for you to get started and to guide you if you need help anytime.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFourteen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Will I get the same discount every time?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseFourteen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>No. Your discount is applied only for one time purchase. If you choose to upgrade or downgrade your account you will not be eligible for anymore further discounts.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFifteen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Any other Questions?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseFifteen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>If there’s anything else you’d like to know,  <a href="#frequently_asked_questions"> please read our full FAQs</a> or <a href="#">talk to us</a> or Send us an email. Our team of specialists are available to discuss your business needs and answer any questions.</p>
                            </div>
                        </div>
                    </div>
                     <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSixteen" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    What are the Outlets (Warehouse)? Can I confirm that this is for Warehouse (stock locations)? and how about the "transfer to" locations?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseSixteen" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Warehouse, Outlets are locations where inventory items (stocks) are physically kept and or sales activities are carried out. Each pricing plan comes with X number of locations. You can perform any number of transfers within the inventory limit of your plan. If you need additional locations you can buy those locations as add-ons. You will only be charged for active locations.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?php ActiveForm::end();  ?>
    </section>
</div>
<?php
$this->registerJs("
jQuery(document).ready(function() {
    $('.main-table').clone(true).appendTo('#table-scroll').addClass('clone'); 
   
});
    
");
