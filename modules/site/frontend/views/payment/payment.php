<?php
use app\models\CommonModel;
use app\models\Country;
use app\models\Industry;
use kartik\icons\Icon;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $PackageModel \yii\db\ActiveRecord */
/* @var $PlanModel \app\modules\site\frontend\models\PlanModel */
/* @var $product string */
/* @var $StripeCoupons array */
/* @var $country string */
/* @var $countryShortCode string */
/* @var $currencyName string */
/* @var $currencyCode string */
/* @var $currencySymbol string */
/* @var $TotalCost float */
/* @var $numof_employees int */

$this->registerCss("
fieldset.scheduler-border {
    border: 1px solid #dbdee0!important;
    padding: 1.4em!important;
    margin: 0 0 1.5em!important;
    box-shadow: 0 0 0 0 #000;
}
legend.scheduler-border {
    font-size: 14px!important;
    font-weight: 700!important;
    text-align: left!important;
    width: auto;
    color: #353f4f;
    padding: 5px 15px;
    border: 1px solid #dbdee0!important;
    margin: 0;
}
.field-clients-website i {
    position: absolute;
    padding: 15px 10px;
    color: #09d57e;
    z-index: 4;
}
.input-group.s2-input-group {
    margin-top : -15px !important;
}
#payment-form .form-control{
    padding: 0 0 0px 30px;
}
.stripeCardElement {
    color: #555;
    background-color: #fff;
    background-image: none;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    padding: 12px 24px;
    border: 1px solid #ccc;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    border-radius: 4px;
}
.processingMessage {
    display: flex;
    align-items: center;
    height: 350px;
}
");
$PlanType = 'monthly';
$title = '';
$package_id = 0;
if($product == 'Retail'){
    $title = 'Asalta Retail Suite';
    $package_id = $PackageModel->retail_packageid;
} else {
    if($product == 'Inventory'){
        $package_id = $PackageModel->inventory_packageid;
        $title = 'Inventory Control';
    } else if($product == 'POS'){
        $package_id = $PackageModel->inventory_packageid;
        $title = 'Retail POS';
    } else if($product == 'CRM'){
        $package_id = $PackageModel->crm_packageid;
        $title = 'Customer Relation Management';
    } else if($product == 'HRM'){
        $package_id = $PackageModel->hrm_packageid;
        $title = 'Human Resource';
    }else if($product == 'ecommerce'){
        $package_id = $PackageModel->ecommerce_packageid;
        $title = 'Asalta Omni Channel eCommerce';
    }

}

?>

<div class="wrapper" style="background-color: #fff;">
    <section>
        <div class="panel-body paymentWrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="inventory_pricing_table_div">
                        <h2>Subscription Payment</h2>
                        <p style="color: #2989d8;">You have chosen package <b><?= $title." - ".$PackageModel->name?></b></p>
                    </div>
                </div>
            </div>
            <div class="row paymentdetails">
                <?php $form = ActiveForm::begin([
                    //'action' => 'payment',
                    'id' => 'payment-form',
                    'options' => ['enctype' => 'multipart/form-data',
                        'class' => 'form-horizontal adminex-form'],
                ]); ?>
                <div class="col-md-12">
                    <div >
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Package Details</legend>
                            <div class="pricingContent row">
                                <div class="col-md-8">
                                    <ul class="monthlyPlanInput">
                                        <?php if($product != 'HRM' && $product != 'ecommerce'){ ?>
                                            <li><?= ($PackageModel->numof_user == 0) ? " - " : (($PackageModel->numof_user > 0)?$PackageModel->numof_user . " Users": " Multiple Users ") ?></li>
                                        <?php }
                                        if($product == 'Retail'){
                                            if($PlanType != 'monthly'){?>
                                                <li> Asalta eCommerce
                                            <?php }
                                            ?>
                                            <li><?= ($PackageModel->numof_channels == 0) ? " - " : (($PackageModel->numof_channels > 0)?$PackageModel->numof_channels . "  Integration channels": " Multiple  Integration channels ") ?></li>
                                            <li><?= ($PackageModel->numof_online_order == 0) ? " - " : (($PackageModel->numof_online_order > 0)? Yii::$app->formatter->asInteger($PackageModel->numof_online_order)  . " Sales Orders / month": " Multiple Sales Orders ") ?></li>
                                            <?php /*<li><?= ($PackageModel->numof_offline_order == 0) ? " - " : (($PackageModel->numof_offline_order > 0)? Yii::$app->formatter->asInteger($PackageModel->numof_offline_order)  . " Offline sales orders /   month": " Multiple Offline sales orders ") ?></li>*/ ?>
                                            <li><?= ($PackageModel->numof_outlet == 0) ? " - " : (($PackageModel->numof_outlet > 0)?$PackageModel->numof_outlet . " Warehouse": " Multiple Warehouse ") ?></li>
                                            <li><?= ($PackageModel->numberof_items == 0) ? " - " : (($PackageModel->numberof_items > 0)? Yii::$app->formatter->asInteger($PackageModel->numberof_items)  . " SKU": " Multiple SKU ") ?></li>
                                            <li>Asalta HRM</li>
                                            <li>Asalta CRM</li>
                                        <?php }
                                        if($product == 'Inventory' || $product == 'POS') {
                                            if ($product == 'Inventory') {
                                                ?>
                                                <li><?= ($PackageModel->numof_channels == 0) ? " - " : (($PackageModel->numof_channels > 0) ? $PackageModel->numof_channels . "  Integration channels" : " Multiple  Integration channels ") ?></li>
                                                <li><?= ($PackageModel->numof_online_order == 0) ? " - " : (($PackageModel->numof_online_order > 0) ? Yii::$app->formatter->asInteger($PackageModel->numof_online_order) . " Sales Orders / month" : " Multiple Sales Orders ") ?></li>
                                                <?php /* <li><?= ($PackageModel->numof_offline_order == 0) ? " - " : (($PackageModel->numof_offline_order > 0) ? Yii::$app->formatter->asInteger($PackageModel->numof_offline_order) . " Offline sales orders / month" : " Multiple Offline sales orders ") ?></li> */?>
                                            <?php } ?>
                                            <li><?= ($PackageModel->numof_outlet == 0) ? " - " : (($PackageModel->numof_outlet > 0) ? $PackageModel->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li>
                                            <li><?= ($PackageModel->numberof_items == 0) ? " - " : (($PackageModel->numberof_items > 0) ? Yii::$app->formatter->asInteger($PackageModel->numberof_items) . " SKU" : " Multiple SKU ") ?></li>
                                            <?php if ($product == 'POS') { ?>
                                                <li><?= ($PackageModel->numof_pos_receipts == 0) ? " - " : (($PackageModel->numof_pos_receipts > 0) ? Yii::$app->formatter->asInteger($PackageModel->numof_pos_receipts) . "  Sales a month" : " Multiple  Sales a month ") ?></li>
                                            <?php
                                            }
                                        }
                                        if($product == 'HRM'){
                                            ?>
                                            <li>Basic HRIS</li>
                                            <li>Employee Self Service</li>
                                            <li>leave Management</li>
                                            <li>Mobile Application</li>
                                            <?php
                                            if($PackageModel->name == "Small" || $PackageModel->name == "Medium" || $PackageModel->name == "Large") {?>
                                                <li>Timesheets</li>
                                                <li>Claims Management</li>
                                                <?php if($country == 'Singapore'){ ?>
                                                    <li>Payroll Management</li>
                                                <?php } ?>
                                                <li>3<sup style="top: -0.8em;font-size: 45%;">rd</sup> Party Integrations</li>
                                            <?php }
                                            if($PackageModel->name == "Medium" || $PackageModel->name == "Large") {?>
                                                <li>Shift Roster (Scheduling)</li>
                                                <li>Performance </li>
                                                <!--<li>Reports Integration</li>-->
                                                <li>Time In/Out -ID Scan</li>
                                                <li>Approval Groups</li>
                                                <li>Commission Management</li>
                                                <li>GPS Location Tracking*</li>
                                            <?php }
                                            if($PackageModel->name == "Large") {?>
                                                <li>360 Feedback</li>
                                                <li>Multiple Organizations</li>
                                                <li>Plus 10 hrs Training</li>
                                                <li>Recruitment</li>
                                                <li>Face Recognition (Face ID)*</li>
                                            <?php }
                                            if($PackageModel->name == "Medium" || $PackageModel->name == "Large") {?>
                                                <li style="list-style: none; margin-top: 5px;">* Coming Soon</li>
                                            <?php }
                                        }
                                        if($product == 'CRM'){?>
                                            <li><?= ($PackageModel->numof_integration == 0) ? " - " : (($PackageModel->numof_integration > 0) ? $PackageModel->numof_integration . " Integrations" : " Multiple Integrations ") ?></li>
                                            <li style="display: none;"><?= ($PackageModel->numof_quotes == 0) ? " - " : (($PackageModel->numof_quotes > 0) ? Yii::$app->formatter->asInteger($PackageModel->numof_quotes)  . " Monthly Quotes /  month" : " Multiple Monthly Quotes ") ?></li>
                                            <li style="display: none;"><?= ($PackageModel->numof_invoices == 0) ? " - " : (($PackageModel->numof_invoices > 0) ? Yii::$app->formatter->asInteger($PackageModel->numof_invoices)  . " Monthly Invoices /  month" : " Multiple Monthly Invoices ") ?></li>
                                            <li><?= ($PackageModel->numof_contact == 0) ? " - " : (($PackageModel->numof_contact > 0) ? Yii::$app->formatter->asInteger ($PackageModel->numof_contact) . " Contacts" : " Multiple Contacts ") ?></li>
                                        <?php }
                                        if($product == 'ecommerce'){?>
                                            <?php
                                            if($PackageModel->name == "Small"){
                                                ?>
                                                <li>Asalta Subdomain (yourbrand.Asalta.com)</li>
                                                <li>No branded domain</li>
                                                <li>Powered by Asalta Branding</li>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if($PackageModel->name == "Medium"){
                                                ?>
                                                <li>Branded domain</li>
                                                <li>Powered by Asalta Branding</li>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if($PackageModel->name == "Large"){
                                                ?>
                                                <li>Branded domain</li>
                                                <li>No Asalta Branding</li>
                                                <?php
                                            }
                                            ?>
                                            <li><?= ($PackageModel->numof_integration == 0) ? " - " : (($PackageModel->numof_integration > 0) ? $PackageModel->numof_integration . " Integrations" : " Multiple Integrations ") ?></li>
                                            <?php
                                            /*<li><?= ($PackageModel->numberof_items == 0) ? " - " : (($PackageModel->numberof_items > 0) ? Yii::$app->formatter->asInteger($PackageModel->numberof_items)  . " SKU" : " Multiple SKU ") ?></li>
                                            <li><?= ($PackageModel->numof_online_order == 0) ? " - " : (($PackageModel->numof_online_order > 0) ? Yii::$app->formatter->asInteger($PackageModel->numof_online_order) . " Sales Orders / month" : " Multiple Sales Orders ") ?></li>*/
                                            ?>
                                            <?php /*<li>
                                                    $<?= ($PackageModel->online_sales_revenue == 0) ? " - " : (($PackageModel->online_sales_revenue > 0) ? Yii::$app->formatter->asInteger($PackageModel->online_sales_revenue) . " Online Sales revenue" : " Multiple Online Sales revenue ") ?> </li> */ ?>
                                            <?php
                                            /*<li><?= ($PackageModel->numof_outlet == 0) ? " - " : (($PackageModel->numof_outlet > 0) ? $PackageModel->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li>*/
                                            ?>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="col-md-4 text-right" style="padding-right: 36px;">
                                    <?php
                                        $country_code = strtolower((isset($_SERVER["HTTP_CF_IPCOUNTRY"]) ? $_SERVER["HTTP_CF_IPCOUNTRY"] : 'in'));
                                        if($country_code != "sg" && $country_code != "in"){
                                            $country_code = "";
                                        }
                                        $packageUrl = \yii\helpers\Url::to("/" . $country_code . "/asalta-retail-suite/pricing");
                                        if($product == 'Retail') {
                                            $packageUrl = \yii\helpers\Url::to("/" . $country_code . "/asalta-retail-suite/pricing");
                                        } else if($product == 'CRM'){
                                            $packageUrl = \yii\helpers\Url::to("/" . $country_code . "/crm/pricing");
                                        } else if($product == 'HRM'){
                                            $packageUrl = \yii\helpers\Url::to("/" . $country_code . "/hrm/pricing");
                                        } else if($product == 'Inventory'){
                                            $packageUrl = \yii\helpers\Url::to("/" . $country_code . "/inventory/pricing");
                                        } else if($product == 'POS'){
                                            $packageUrl = \yii\helpers\Url::to("/" . $country_code . "/pos/pricing");
                                        } else if($product == 'ecommerce'){
                                            $packageUrl = \yii\helpers\Url::to("/" . $country_code . "/ecommerce/pricing");
                                        }
                                    ?>
                                    <a href="<?= $packageUrl?>" class="btn btn-default btn-md" style="border-radius: 0px;">Change Package</a>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-12">
                    <div >
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Your Particulars</legend>
                            <div class="login-wrap">

                                <div class="col-md-6" id="signupmail_div">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <?= $form->field($model, 'cname', ['template' => "<i class='fa fa-user'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                                                ->textInput(['class' => 'form-control stepforminput','style' => 'width:100%','placeholder'=>'First Name']) ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <?= $form->field($model, 'clname', ['template' => "<i class='fa fa-user'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                                                ->textInput(['class' => 'form-control stepforminput','style' => 'width:100%','placeholder'=>'Last Name']) ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <?= $form->field($model, 'cemail', ['template' => "<i class='fa fa-envelope'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                                            ->textInput(['class' => 'form-control stepforminput','style' => 'width:100%','placeholder'=>'Email']) ?>
                                        <span id="email_status"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <?php

                                            if($country != 'Global') {
                                                $code = Country::find()->where(['name' => $country])->one();
                                                $model->country_code = ($code) ? $code->country_code:'';
                                            }
                                            $countryCodeData = ArrayHelper::map(Country::find()->select(['countryid','country_code', "CONCAT('+',country_code) as name"])->asArray()->all(), 'country_code', 'name');
                                            echo $form->field($model, 'country_code')->widget(Select2::classname(), [
                                                'data' => $countryCodeData,
                                                'language' => 'en',
                                                'options' => ['placeholder' => 'Country Code', 'class' => 'form-control'],
                                                'pluginOptions' => [
                                                    //'allowClear' => true
                                                ],
                                            ])->label('');

                                            ?>
                                        </div>
                                        <div class="col-md-8">
                                            <?= $form->field($model, 'mobile', ['template' => "<i class='fa fa-mobile-phone'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                                                ->textInput(['class' => 'form-control','style' => 'margin-top: 15px;width:100%','placeholder'=>'Mobile']) ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <?= $form->field($model, 'website', ['template' => "<i class='fa fa-globe'></i>{input}\n{error}", 'options' => ['class' => '']])
                                            ->textInput(['class' => 'form-control','style' => 'width:100%','placeholder'=>'Website']) ?>
                                    </div>
                                </div>
                                <div class="col-md-6" id="signup_pesonaldetail_div">
                                    <div class="form-group">
                                        <div class="col-md-9" style="margin-left: -15px;">
                                            <?= $form->field($model, 'companyname', ['template' => "<i class='fa fa-building'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                                                ->textInput(['class' => 'form-control','style' => 'width:100%','placeholder'=>'Company Name']) ?>
                                        </div>
                                        <div class="col-md-3">
                                            <?= $form->field($model, 'emp_size', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                                                ->textInput(['class' => 'form-control','style' => 'width:120%','placeholder'=>'Size']) ?>
                                        </div>
                                    </div>

                                    <div class="form-group" id="uen">
                                        <?= $form->field($model, 'uen', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                                            ->textInput(['class' => 'form-control','style' => 'width:100%','placeholder'=>'Unique Entity Number (UEN)']) ?>
                                    </div>

                                    <?php
                                    $industryData = ArrayHelper::map(Industry::find()->select(['industryid', 'industry_name'])->orderBy(['industry_name'=> SORT_ASC])->asArray()->all(), 'industry_name', 'industry_name');
                                    echo $form->field($model, 'industry')->widget(Select2::classname(), [
                                        'data' => $industryData,
                                        'language' => 'en',
                                        'options' => ['placeholder' => 'Industry', 'class' => 'form-control'],
                                        'addon' => [
                                            'prepend' => [
                                                'content' => Icon::show('industry', ['class'=>'fa fa-industry', 'framework' => Icon::FAS])
                                            ],
                                        ]
                                    ])->label('');

                                    ?>
                                    <div class="form-group" id="otherindustrydiv">
                                        <?= $form->field($model, 'otherindustry', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                                            ->textInput(['class' => 'form-control','style' => 'width:100%','placeholder'=>'Enter your industry']) ?>
                                    </div>
                                    <?php
                                    $model->country = ($country != 'Global') ? $country : '';
                                    $countryData = ArrayHelper::map(Country::find()->select(['countryid', 'name'])->asArray()->all(), 'name', 'name');
                                    echo $form->field($model, 'country')->widget(Select2::classname(), [
                                        'data' => $countryData,
                                        'language' => 'en',
                                        'options' => ['placeholder' => 'Country', 'class' => 'form-control'],
                                        'addon' => [
                                            'prepend' => [
                                                'content' => Icon::show('globe', ['class'=>'fa fa-globe', 'framework' => Icon::FAS])
                                            ],
                                        ]
                                    ])->label('');

                                    ?>

                                </div>
                                <span style="display: none;">
                                    <?= $form->field($model, 'first_name', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                                        ->hiddenInput(['class' => 'form-control']) ?>
                                    <?= $form->field($model, 'last_name', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                                        ->hiddenInput(['class' => 'form-control']) ?>
                                    <?= $form->field($model, 'email', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                                        ->hiddenInput(['class' => 'form-control']) ?>

                                    <?= $form->field($model, 'timezone', ['template'=>"{input}\n{error}" , 'options' => ['class' => '']])
                                        ->hiddenInput(['class' => 'form-control']) ?>
                                    <?= $form->field($model, 'product', ['template'=>"{input}\n{error}" , 'options' => ['class' => '']])
                                        ->hiddenInput(['class' => 'form-control']) ?>
                                </span>
                            </div>
                        </fieldset>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-12">
                    <div >
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Payment Info</legend>
                            <div class="col-md-6">
                                <?php
                                if(Yii::$app->params["EnableStripeDiscounts"]){
                                    ?>
                                    <?php if($product == "HRM") { ?>
                                    <div class="row" style="font-weight: bold; margin-bottom: 10px;">
                                        <div class="col-md-6">
                                            Number of Users
                                        </div>
                                        <div class="col-md-6">
                                            <div style="text-align: right;">
                                                <?= Html::input("number", "numof_employees", 1, ["class"=> "form-control text-right","required"=>true,  "style" => "width:100%"])?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php  } ?>
                                    <div class="row" style="font-weight: bold; margin-bottom: 10px;">
                                        <div class="col-md-6">
                                            <p id="have_promo_code"><b>Have promo code?</b></p>
                                        </div>
                                        <div class="col-md-6" id="have_promo_code_input" style="display: none">
                                            <?php if(is_array($StripeCoupons) && count($StripeCoupons) > 0){ ?>
                                                <select name="discount_id" class="form-control apply_discount" style="width:100%; float: right;">
                                                    <option value="">Select</option>
                                                    <?php
                                                    foreach($StripeCoupons as $StripeCoupon){
                                                        ?>
                                                        <option value="<?= $StripeCoupon->id ?>"><?= $StripeCoupon->title ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                    <option value="enter_promo_code">I have promo code.</option>
                                                </select>
                                                <div class="input-group promo_code_inputs" style="display:none;">
                                                    <input type="text" class="form-control promo_code" name="promo_code" style="width:100%" placeholder="Promo Code" />
                                                            <span class="input-group-btn">
                                                                <button type="button" class="close_promo_code btn btn-danger btn-lg" style="height: 45px;"><i class="fa fa-times"></i></button>
                                                            </span>
                                                </div>
                                            <?php
                                            } else {
                                                ?>
                                                <div class="promo_code_inputs">
                                                    <input type="text" class="form-control promo_code" name="promo_code" style="width:100%" placeholder="Promo Code" />
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="row" style="margin-bottom: 10px; font-weight: bold;">
                                    <div class="col-md-6">Description</div>
                                    <div class="col-md-6 text-right">
                                        Amount
                                    </div>
                                </div>
                                <div class="row" style="font-weight: bold;">
                                    <div class="col-md-6">Total</div>
                                    <div class="col-md-6 text-right p_price">
                                        <?php
                                        echo CommonModel::CurrencyFormat($TotalCost, $currencySymbol." ");
                                        ?>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 15px;">
                                        <input type="hidden" name="plan_id" value="<?= $PlanModel->planid ?>"/>
                                        <input type="hidden" name="id" value="<?= $package_id ?>"/>
                                        <input type="hidden" name="product" value="<?= $product?>"/>
                                        <input type="hidden" name="country" value="<?= $country?>"/>

                                        <div class="form-row ">
                                            <label for="card-element">
                                                Enter your Credit or Debit card
                                            </label>
                                            <div id="card-element" class="stripeCardElement">
                                                <!-- A Stripe Element will be auto inserted here. -->
                                            </div>
                                            <!-- Used to display form errors. -->
                                            <div id="card-errors" role="alert"></div>
                                        </div>
                                        <br/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                Your plan starts immediately. You'll be billed <strong class="p_price"><?= CommonModel::CurrencyFormat(($PlanModel->period_time * $PackageModel->priced_monthly), $currencySymbol." ") ?></strong> on <strong><?= date("d M Y")?></strong>.
                                <br/><br/>
                                Asalta subscriptions auto-renew periodically until cancelled from My Asalta. <br/>
                                Contact <a href="https://www.asalta.com/support">Support</a> if you need help.
                                <hr/>
                            </div>
                        </fieldset>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-12">
                    <?= Html::submitButton('<i class="fa fa-lock" aria-hidden="true"></i> Pay Now', ['class'=> 'btn btn-primary btn-lg col-md-6','id' => "payBtn"]); ?>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <div class="col-md-2">
                            <?= Html::img('@web/images/secured_payment.png', ['class' => 'pull-left','style' =>'height:30px;']); ?>
                        </div>
                        <div class="col-md-2">
                            <?= Html::img('@web/images/credit-card.png', ['class' => 'pull-left','style' =>'height:30px;']); ?>
                        </div>
                        <div class="col-md-2">
                            <?= Html::img('@web/images/secured _payment_text.png', ['class' => 'pull-left','style' =>'height:30px;']); ?>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <div class="processingMessage" style="display:none;">
            <div class="col-md-12">
                <div class="alert alert-light">
                    <strong style="padding-bottom: 5px; font-size: 30px;">Your Payment is being processed now.
                        Please Wait. </strong><br/>Do not Close your browser or navigate to another page while we
                    are processing your payment.
                </div>
            </div>
        </div>
    </section>
</div>
<?php
$this->registerJs("
    window.stripeKey = '".Yii::$app->params['stripe_publishable_key'] ."';
    window.currencySymbol  =  '" . $currencySymbol . " ';
    window.country  =  '" . $country . "';
    window.countryShortCode  =  '" . $countryShortCode . "';
    window.currencyName  =  '" . $currencyName . "';
    window.currencyCode  =  '" . $currencyCode . "';
", \yii\web\View::POS_HEAD);
$this->registerAssetBundle('\app\assets\PaymentAsset');
if (Yii::$app->session->hasFlash('error')){
$this->registerJs("
    alert('".Yii::$app->session->getFlash('error')."');
    window.focusCard = true;
", \yii\web\View::POS_END);
}