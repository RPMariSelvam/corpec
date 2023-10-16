<?php

use components\helper\PricingHelper;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;
use app\modules\site\frontend\models\HrmPackageModel;

/* @var $this yii\web\View */
/* @var $MonthlyPlan app\modules\site\frontend\models\PlanModel */
/* @var $YearlyPlan app\modules\site\frontend\models\PlanModel */
/* @var $MonthlyPackages app\modules\site\frontend\models\HrmPackageModel */
/* @var $YearlyPackages app\modules\site\frontend\models\HrmPackageModel */
/* @var $numof_employees integer */
/* @var $country string */
/* @var $countryShortCode string */
/* @var $currencyName string */
/* @var $currencyCode string */
/* @var $currencySymbol string */


/*$this->title = "HRM Pricing - My Asalta";*/
//$this->registerCssFile(Yii::$app->urlManager->createAbsoluteUrl("css/inventory_pricing.css"));
//$this->registerJsFile(Yii::$app->urlManager->createAbsoluteUrl("js/pricing.js"), ['depends' => [\yii\web\JqueryAsset::className()], 'position' => \yii\web\View::POS_END]);

$this->registerCss("
    .monthlyPlanInput, .price-value-monthly{
        display:none;
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
        padding:8px 11px !important;
        }
    }
    @media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) { 
        .table-scroll th, .table-scroll td {
        padding:8px 23px !important;
        }
    }
    @media only screen and (min-device-width: 414px) and (max-device-width: 736px) and (-webkit-min-device-pixel-ratio: 3) { 
        .table-scroll th, .table-scroll td {
        padding: 8px 8px !important;
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
        padding:8px 7px;
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
?>

<div class="wrapper" style="background-color: #fff;">
    <div class="row">
        &nbsp;
    </div>
    <?php $form = ActiveForm::begin(['options' => ['role'=> "form"],]); ?>
    <section class="">
        <div class="panel-body hrm_pricing">
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
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <?php
                            if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows] && false) {
                                ?>
                                <div class="col-md-3 col-sm-6 hrm_pricing_table_div col_md_sm_2_5" >
                                    <div class="pricingTable ">
                                        <div class="pricingTable-header">
                                            <h3>START UP</h3>
                                        </div>
                                        <div class="price-value price-value-monthly">
                                        <span>
                                            FREE Forever
                                        </span>
                                            <span class="subtitle"style="padding: 10px 0px">For 3 Employees</span>
                                            <span class="subtitle"></span>
                                        </div>
                                        <div class="price-value price-value-yearly">
                                        <span>
                                            FREE Forever
                                        </span>
                                            <span class="subtitle"style="padding: 13px 0px">For 3 Employees</span>
                                            <span class="subtitle"></span>
                                        </div>
                                        <div class="pricingContent">
                                            <ul>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Basic HRIS</li>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Employee Self Service</li>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Leave Management</li>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Mobile Application</li>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Claims Management</li>
                                            </ul>
                                            <div style="background-color: #fff;">
                                                <br>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $rows++;
                            } else {
                                //echo "<div class='col-md-1'></div>";
                                (count($MonthlyPackages) == 5) ? $rows++ : false;
                            }

                            if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]) {
                                ?>
                                <div class="col-md-3 col-sm-6 hrm_pricing_table_div col_md_sm_2_5" >
                                    <div class="pricingTable ">
                                        <div class="pricingTable-header">
                                            <h3>Micro</h3>
                                        </div>
                                        <div class="price-value price-value-monthly">
                                            <?= PricingHelper::getMonthlyPricingText($MonthlyPackages[$rows], $country, $currencySymbol) ?>
                                            <span class="subtitle">per month / user</span>
                                            <span class="subtitle">billed monthly</span><br>
                                        </div>
                                        <div class="price-value price-value-yearly">
                                            <?= PricingHelper::getYearlyPricingText($YearlyPackages[$rows], $country, $currencySymbol) ?>
                                            <span class="subtitle">per month / user</span>
                                            <span class="subtitle">billed annually</span><br>
                                        </div>
                                        <div class="price-value-monthly">
                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/payment"), [
                                                'data' => [
                                                    'method' => 'post',
                                                    'params' => [
                                                        'id' => $MonthlyPackages[$rows]->hrm_packageid,
                                                        'product' => 'HRM',
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
                                                        'id' => $YearlyPackages[$rows]->hrm_packageid,
                                                        'product' => 'HRM',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=hrm")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a>
                                        </div>
                                        <div style="">
                                            <br>
                                            <br>
                                        </div>
                                        <div class="pricingContent">
                                            <ul>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Basic HRIS</li>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Employee Self Service</li>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Leave Management</li>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Mobile Application</li>
                                            </ul>
                                            <div style="background-color: #fff;padding:18px 0px;">
                                                <br>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $rows++;
                            }

                            if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]) {
                                ?>
                                <div class="col-md-3 col-sm-6 hrm_pricing_table_div col_md_sm_2_5" >
                                    <div class="pricingTable ">
                                        <div class="pricingTable-header">
                                            <h3>Small</h3>
                                        </div>
                                        <div class="price-value price-value-monthly">
                                            <?= PricingHelper::getMonthlyPricingText($MonthlyPackages[$rows], $country, $currencySymbol) ?>
                                            <span class="subtitle">per month / user</span>
                                            <span class="subtitle">billed monthly</span><br>
                                        </div>
                                        <div class="price-value price-value-yearly">
                                            <?= PricingHelper::getYearlyPricingText($YearlyPackages[$rows], $country, $currencySymbol) ?>
                                            <span class="subtitle">per month / user</span>
                                            <span class="subtitle">billed annually</span><br>
                                        </div>
                                        <div class="price-value-monthly">
                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/payment"), [
                                                'data' => [
                                                    'method' => 'post',
                                                    'params' => [
                                                        'id' => $MonthlyPackages[$rows]->hrm_packageid,
                                                        'product' => 'HRM',
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
                                                        'id' => $YearlyPackages[$rows]->hrm_packageid,
                                                        'product' => 'HRM',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=hrm")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a>
                                        </div>
                                        <div class="hrm_pricing_text" >Includes Everything in <span class="hrm_pricing_text_p">Micro</span> PLUS</div>

                                        <div class="pricingContent">
                                            <div class="pricingContent">
                                                <ul>
                                                    <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Timesheets</li>
                                                    <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Claims Management</li>
                                                    <?php if($country == 'Singapore'){ ?>
                                                    <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Payroll</li>
                                                    <?php } ?>
                                                    <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>3<sup style="top: -0.8em;font-size: 45%;">rd </sup>Party Integrations</li>
                                                </ul>
                                                <div style="background-color: #fff;padding: 10px 0px;">
                                                    <?php if($country == 'Singapore'){ ?>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    <?php }else{ ?>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $rows++;
                            }

                            if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]) {
                                ?>
                                <div class="col-md-3 col-sm-6 hrm_pricing_table_div col_md_sm_2_5" >
                                    <div class="ribbon_pricing"><span>POPULAR</span></div>
                                    <div class="pricingTable smallbudiness-popular ">
                                        <div class="pricingTable-header">
                                            <h3>Medium</h3>
                                        </div>
                                        <div class="price-value price-value-monthly">
                                            <?= PricingHelper::getMonthlyPricingText($MonthlyPackages[$rows], $country, $currencySymbol) ?>
                                            <span class="subtitle">per month / user</span>
                                            <span class="subtitle">billed monthly</span><br>
                                        </div>
                                        <div class="price-value price-value-yearly">
                                            <?= PricingHelper::getYearlyPricingText($YearlyPackages[$rows], $country, $currencySymbol) ?>
                                            <span class="subtitle">per month / user</span>
                                            <span class="subtitle">billed annually</span><br>
                                        </div>
                                        <div class="price-value-monthly">
                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/payment"), [
                                                'data' => [
                                                    'method' => 'post',
                                                    'params' => [
                                                        'id' => $MonthlyPackages[$rows]->hrm_packageid,
                                                        'product' => 'HRM',
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
                                                        'id' => $YearlyPackages[$rows]->hrm_packageid,
                                                        'product' => 'HRM',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=hrm")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a>
                                        </div>
                                        <div class="hrm_pricing_text">Includes Everything in <span class="hrm_pricing_text_p">Small</span> PLUS</div>
                                        <div class="pricingContent">
                                            <ul>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Shift Roster (Scheduling)</li>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Performance (Basic)</li>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Time In/Out -ID Scan</li>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Approval Groups</li>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Commission Management</li>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>GPS Location Tracking*</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $rows++;
                            }

                            if(isset($MonthlyPackages[$rows]) && $YearlyPackages[$rows]) {
                                ?>
                                <div class="col-md-3 col-sm-6 hrm_pricing_table_div col_md_sm_2_5" >
                                    <div class="pricingTable ">
                                        <div class="pricingTable-header">
                                            <h3>Large</h3>
                                        </div>
                                        <div class="price-value price-value-monthly">
                                            <?= PricingHelper::getMonthlyPricingText($MonthlyPackages[$rows], $country, $currencySymbol) ?>
                                            <span class="subtitle">per month / user</span>
                                            <span class="subtitle">billed monthly</span><br>
                                        </div>
                                        <div class="price-value price-value-yearly">
                                            <?= PricingHelper::getYearlyPricingText($YearlyPackages[$rows], $country, $currencySymbol) ?>
                                            <span class="subtitle">per month / user</span>
                                            <span class="subtitle">billed annually</span><br>
                                        </div>
                                        <div class="price-value-monthly">
                                            <?=  Html::a('Buy Now', \Yii::$app->urlManager->createAbsoluteUrl($countryShortCode."/payment"), [
                                                'data' => [
                                                    'method' => 'post',
                                                    'params' => [
                                                        'id' => $MonthlyPackages[$rows]->hrm_packageid,
                                                        'product' => 'HRM',
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
                                                        'id' => $YearlyPackages[$rows]->hrm_packageid,
                                                        'product' => 'HRM',
                                                    ],
                                                ],
                                                'class' => "hrm_signup_btn btn-success",
                                                'style' => "padding: 10px 47px;",
                                            ]); ?>
                                        </div>
                                        <div><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=hrm")?>" class="hrm_signup_btn hrm_blue_btn">START A FREE TRIAL</a>
                                        </div>
                                        <div class="hrm_pricing_text">Includes Everything in <span class="hrm_pricing_text_p">Medium</span> PLUS</div>
                                        <div class="pricingContent">
                                            <ul>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>360 Feedback</li>
                                                <!-- <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Multi_Rater Feedback</li> -->
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Multiple Organizations</li>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Plus 10 hrs Training</li>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Recruitment</li>
                                                <li><i class=" glyphicon glyphicon-ok" style="font-size:10px;color: green;padding: 0 5px"></i>Face Recognition (Face ID)*</li>
                                            </ul>
                                            <div style="background-color: #fff;padding:11px 0px;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-offset-1" style="padding: 20px 17px 35px;">
                        <p class="pricing_text_scale">  All Prices in <?= $currencyCode ?></p>
                       <span>* <span class="pricing_text_scale">Coming Soon</span></span>
                    </div>
                </div>
            </div>
            <div class="buttons"style="text-align: center;padding-bottom:40px;"><a class="hrm_enter_btn hrm_blue_btn" href="#hrm_compareplane" id="hrm_comberplane_table">Compare Plans</a></div>
            <div class="col-sm-12 hrm_plans_for_businesses">
                <div class="row" style="">
                    <div class="inventory_pricing_table_div"><h2 class="require_more_business">
                        Plans for businesses that require more
                    </h2></div>
                    <div class="row ">
                        <div class="col-sm-12 col-md-offset-1">
                            <div class="col-md-5 col-sm-5">
                                <div><a href="<?=$this->publicHtml;?>/signup?product=hrm-on-premises"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta-clouds-text.png" class="priceing_image_en" alt="Inventory Management Software"></a></div>
                                <div>
                                    <h4 class="entpricing_text_h">Need On Premises or Private Cloud</h4> <h4 class="entpricing_text_h" style="padding: 0 0px;">Setup for your business?</h4>
                                    <div class="buttons" style="text-align: center;padding: 18px 0 0px 0px;">
                                        <a class="enter_btn  blue_btn" href="<?=$this->publicHtml;?>/signup?product=hrm-on-premises">CONTACT SALES TEAM</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div><a href="<?=$this->publicHtml;?>/signup?product=hrm-tailormade"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/asalta_tailor.png" class="priceing_image_eng" alt="Inventory Management Software"></a></div>
                                <div>
                                    <h4 class="entpricing_text_h">Need Tailormade plan for your business?</h4>
                                    <p class="entpricing_text_para">Get our custom made Enterprice plan to manage more and<br> more orders for bigger businesses!</p>
                                    <div class="buttons" style="text-align: center;">
                                        <a class="enter_btn  blue_btn" href="<?=$this->publicHtml;?>/signup?product=hrm-tailormade">CONTACT SALES TEAM</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div id="hrm_compareplane" >
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
                                            <th class="fixed-side" scope="col" style="text-align:center;border-bottom-width: 1px!important;background-color:#fafafa;">Features</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;background-color:#fafafa;">Micro</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;background-color:#fafafa;">Small</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;background-color:#fafafa;">Medium</th>
                                            <th scope="col" style="text-align:center;border-bottom-width: 1px!important;background-color:#fafafa;">Large</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="fixed-side"  style="background-color:#fafafa;">Billed Annually</th>
                                            <?php
                                                $rows = 0;
                                            ?>
                                            <?php
                                                if(isset( $YearlyPackages[$rows]) && false ) {
                                            ?>
                                            <td style="text-align: center;"> month/user</td>
                                            <?php
                                                $rows++;
                                                } else {
                                                 
                                                    (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                }

                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php $tempValue = explode(".", ($YearlyPackages[$rows]->priced_monthly));?>
                                                <span><?= $currencySymbol. $tempValue[0];?><sup style="top: -0.4em;font-size:10px;"><?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                    </sup></span> month/user</td>
                                            <?php
                                                $rows++;
                                            }   
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php $tempValue = explode(".", ($YearlyPackages[$rows]->priced_monthly));?>
                                                <span><?= $currencySymbol. $tempValue[0];?><sup style="top: -0.4em;font-size:10px;"><?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                    </sup></span> month/user</td>
                                            <?php
                                                $rows++;
                                            }   
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php $tempValue = explode(".", ($YearlyPackages[$rows]->priced_monthly));?>
                                                <span><?= $currencySymbol. $tempValue[0];?><sup style="top: -0.4em;font-size:10px;"><?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                    </sup></span> month/user</td>
                                            <?php
                                                $rows++;
                                            }   
                                                if(isset( $YearlyPackages[$rows])) {
                                            ?>
                                                <td style="text-align: center;"><?php $tempValue = explode(".", ($YearlyPackages[$rows]->priced_monthly));?>
                                                <span><?= $currencySymbol. $tempValue[0];?><sup style="top: -0.4em;font-size:10px;"><?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                    </sup></span> month/user</td>
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
                                            <td style="text-align: center;"> per user</td>
                                            <?php
                                                $rows++;
                                                } else {
                                                    (count($MonthlyPackages) == 5) ? $rows++ : false;
                                                }

                                                if(isset( $MonthlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php $tempValue = explode(".", ($MonthlyPackages[$rows]->priced_monthly));?>
                                                <span><?= $currencySymbol. $tempValue[0];?><sup style="top: -0.4em;font-size:10px;"><?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                    </sup></span> per user</td>
                                            <?php
                                                $rows++;
                                            }   
                                                if(isset( $MonthlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php $tempValue = explode(".", ($MonthlyPackages[$rows]->priced_monthly));?>
                                                <span><?= $currencySymbol. $tempValue[0];?><sup style="top: -0.4em;font-size:10px;"><?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                    </sup></span> per user</td>
                                            <?php
                                                $rows++;
                                            }   
                                                if(isset( $MonthlyPackages[$rows])) {
                                            ?>
                                            <td style="text-align: center;"><?php $tempValue = explode(".", ($MonthlyPackages[$rows]->priced_monthly));?>
                                                <span><?= $currencySymbol. $tempValue[0];?><sup style="top: -0.4em;font-size:10px;"><?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                    </sup></span> per user</td>
                                            <?php
                                                $rows++;
                                            }   
                                                if(isset( $MonthlyPackages[$rows])) {
                                            ?>
                                                <td style="text-align: center;"><?php $tempValue = explode(".", ($MonthlyPackages[$rows]->priced_monthly));?>
                                                <span><?= $currencySymbol. $tempValue[0];?><sup style="top: -0.4em;font-size:10px;"><?= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';?>
                                                    </sup></span> per user</td>
                                            <?php
                                            }
                                            ?>
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
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Multiple Organizations</th>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Plus 10 hrs Training</th>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Recruitment</th>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="fixed-side" style="background-color:#fafafa;">Face Recognition (Face ID)*</th>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"><span style="color: #6f6e6e;" class=" glyphicon-minus"></span></td>
                                            <td style="text-align:center;"> <span style="font-size:10px;color: green;" class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div style="padding: 7px 5%;">
                        *Coming soon
                        </div>
                    </div>
                    <p class="hrm_pricingpage-heading-1">FOREVER FREE PLANS</p>
                    <p class="hrm_pricingpage-heading-2">Forever Free for 3  Employees</p>
                </div>
            </div>
        </div>
        <!-- <div class="container add_on_div">
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
        <div class="container">
            <div class="asalta-faq" id="frequently_asked_questions">
                <h3>Frequently asked questions</h3>
            </div>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default" style="border-top: 1px solid #ddd !important">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                How long do I get to try Asalta HRM?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p>You can sign up and try Asalta HRM for its full capability for 14 days after which, you can
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
                            <p>If you think 14 days are not enough to fully explore the system, we’re more than happy to extend your trial. Once your trial expires, contact our sales team by emailing them at <a href="#">sales@asalta.com</a></p>
                        </div>
                    </div>
                </div>
                <!--<div class="panel panel-default">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                 How much does it cost to use Asalta HRM ?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Asalta HRM pricing is based on monthly and yearly subscription and the packages are as follows: click
                                <a href="<?/*=$this->publicHtml;*/?>/sg/hrm/pricing">here</a></p>
                        </div>
                    </div>
                </div>-->
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
                                 Is my data secure with Asalta HRM?
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
                                 Does Asalta HRM offer a knowledge base?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSeven" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>To help you get started with Asalta HRM we provide an extensive knowledge base that consists of useful help articles and video tutorials.<a href="#"> Check it out here.</a></p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                               Is there a minimum subscription period?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseEight" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>No. there is no minimum subscription period or contractual obligation. Asalta HRM! pricing is based on monthly and yearly subscription.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                What is Asalta HRM?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseNine" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Asalta HRM is an easy-to-use and 100% web-based HRM application. It also removes the hassle and tediousness of computing salary payment and CPF contributions manually, preparing and distributing payslips, and manual leave, claims, commission, Timesheet, Rostering and management.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="false">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                 Why should I use Asalta HRM?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTen" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Absolutely, while we’d hate to see you go, you can cancel the subscription at anytime.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" aria-expanded="false">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                What are the modules in Asalta HRM?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseEleven" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Asalta HRM has different modules to cater to different areas of managing your Information.</p>
                            <ul>
                                <li>Get the whole picture of your Employee management with our smart Dashboard.</li>
                                <li>Leaves Management </li>
                                <li>Timesheet  Management</li>
                                <li>Clock In/Out Management</li>
                                <li>Claims  Management</li>
                                <li>Commissions  Management</li>
                                <li>Performance Appraisal  Management</li>
                                <li>Roster  Management</li>
                                <li>Holiday Management</li>
                                <li>Announcement</li>
                                <?php if($country == 'Singapore'){ ?>
                                <li>Payroll Management </li>
                                <?php } ?>
                                <li>Dynamic forms for Survey</li>
                                <li>Recruitment</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve" aria-expanded="false">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                 Do you have Mobile App for HRM?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTwelve" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Yes. There is a FREE Mobile App available to download from App store and Google Play for Asalta HRM.</p>
                        </div>
                    </div>
                </div>
                <?php if($country == 'Singapore'){ ?>
                <div class="panel panel-default">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThirteen" aria-expanded="false">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                 Can I view other employee’s payslip via the Asalta HRM mobile app?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseThirteen" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>No. you can only view your own payslip on Asalta HRM mobile app. Only Administrator has such privileges.</p>
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFourteen" aria-expanded="false">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Can I use Asalta HRM to process payroll for my part time workers?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseFourteen" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Yes. Asalta HRM can process payroll for your part time workers who are paid monthly or Hourly.</p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                 <div class="panel panel-default">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSixteen" aria-expanded="false">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Will I get the same discount every time?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSixteen" class="panel-collapse collapse">
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
                            <p>If there’s anything else you’d like to know, <a href="#frequently_asked_questions"> please read our full FAQs</a> or <a href="#">talk to us</a> or Send us an email. Our team of specialists are available to discuss your business needs and answer any questions.</p>
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
