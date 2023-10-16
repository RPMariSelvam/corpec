<?php

use app\models\CommonModel;
use app\models\Country;
use app\models\Industry;
use kartik\icons\Icon;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\ResourcesAsset;

/* @var $this yii\web\View */
/* @var $PlanModel \app\modules\site\frontend\models\PlanModel */
/* @var $AddonsModel \app\modules\site\frontend\models\ImsAddons */
/* @var $StripeCoupons array */
/* @var $country string */
/* @var $countryShortCode string */
/* @var $currencyName string */
/* @var $currencyCode string */
/* @var $currencySymbol string */
/* @var $numof_employees int */
$ecommercePackage = [];
$hrmPackage = [];
$inventoryPackage = [];
$posPackage = [];
$crmPackage = [];
if (!empty($PackageModel['hrmPackage'])) {
    $hrmPackage = (object)$PackageModel['hrmPackage'];
}
if (!empty($PackageModel['inventoryPackage'])) {
    $inventoryPackage = (object)$PackageModel['inventoryPackage'];
}
if (!empty($PackageModel['posPackage'])) {
    $posPackage = (object)$PackageModel['posPackage'];
}
if (!empty($PackageModel['crmPackage'])) {
    $crmPackage = (object)$PackageModel['crmPackage'];
}
if (!empty($PackageModel['ecommercePackage'])) {
    $ecommercePackage = (object)$PackageModel['ecommercePackage'];
}
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
/* Add ons started*/
.product-add-ons-items article {
    background: #fff !important;
    border: 0 none;
    border-radius: 10px;
    box-shadow: 0 0 8px 0 rgb(0 0 0 / 10%);
    padding: 8px 12px;
}
.product-add-ons-items article.add-ons-item {
    cursor: pointer;
}
.product-add-ons-items article {
    align-items: center;
    display: flex;
}
.product-add-ons-items article {
    max-width: none;
}

.product-add-ons-items article::before {
    background: transparent no-repeat center;
    background-size: 22px;
    border-radius: 20px;
    content: '';
    display: inline-block;
    flex-shrink: 0;
    height: 40px;
    margin-right: 12px;
    vertical-align: middle;
    width: 40px;
}
.product-add-ons-items article .product-info {
    align-items: center;
    display: flex;
    flex-wrap: wrap;
}
.product-add-ons-items article h2 {
    font-size: 16px;
    font-weight: 700;
    line-height: 24px;
    margin: 0;
    /*white-space: nowrap;*/
    width: 100%;
}
.product-add-ons-items article h2 {
    color: #4d4a48;
    flex-shrink: 2;
    letter-spacing: 0.09px;
    word-break: break-all;
}
.product-add-ons-items article p {
    font-size: 12px;
    margin-right: 0;
    display: block;
}
.product-add-ons-items article p {
    color: #4d4a48;
    font-weight: 300;
    margin: 0;
}

.product-add-ons-items article .price {
    margin-left: auto;
    padding-left: 8px;
}

.product-add-ons-items article .price strong {
    font-size: 14px;
    white-space: nowrap;
}
@media screen and (min-width: 920px){
    .product-add-ons-items article .price strong {
        font-size: 16px;
    }
}

.product-add-ons-items article .price strong {
    color: #4d4a48;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: -0.02px;
    line-height: 16px;
    padding-top: 3px;
}
.product-add-ons-items article .price strong, article .price small {
    display: block;
    text-align: right;
}
@media screen and (min-width: 920px){
    .product-add-ons-items article button {
        background-size: 32px;
        line-height: 48px;
        margin-left: 16px;
        width: 48px;
    }
}

.product-add-ons-items article button {
    background-size: 23px;
    font-size: 28px;
    line-height: 40px;
    margin-left: 8px;
    padding: 0;
    width: 40px;
}
@media screen and (min-width: 920px){
    .product-add-ons-items article button {
        font-size: 16px;
        margin-left: 32px;
        padding: 0 8px 0 36px;
        width: 132px;
    }
}
.product-add-ons-items article button {
    background-size: 23px;
    border-radius: 4px;
    color: #b31b1d;
    border: 1px solid #b31b1d;
    background: #fff;
    flex-shrink: 0;
    font-size: 28px;
    line-height: 38px;
    margin-left: 16px;
    padding: 0;
    text-align: center;
    width: 40px;
}
.product-add-ons-items article button:hover {
    background: #b31b1d;
    color: #fff;
}
.product-add-ons-items .row{
    margin-top: 10px;
    margin-bottom: 10px;
}
#checkoutpackagedetails{
    margin-bottom:20px;
}
.product-add-ons-items-view table, td, th {
    border: none;
}
.product-add-ons-items-view .quantity, .product-add-ons-items-view .addons-item-price, .product-add-ons-items-view .trash-item{
    font-size: 18px;
}
.trash-item{
    cursor:pointer;
}
.processingMessage {
    display: flex;
    align-items: center;
    height: 350px;
}
.package_price, .package_price small{
    color: #2989d8;font-size: 24px;text-align: right;
}
.package_price small{
    font-size: 85%;
}
");

$package_ids = [];
if (!empty($inventoryPackage)) {
    $package_ids['Inventory'] = $inventoryPackage->inventory_packageid;
}
if (!empty($posPackage)) {
    $package_ids['POS'] = $posPackage->inventory_packageid;
}
if (!empty($crmPackage)) {
    $package_ids['CRM'] = $crmPackage->crm_packageid;
}
if (!empty($hrmPackage)) {
    $package_ids['HRM'] = $hrmPackage->hrm_packageid;
}
if (!empty($ecommercePackage)) {
    $package_ids['ecommerce'] = $ecommercePackage->ecommerce_packageid;
}
?>

    <div class="wrapper" style="background-color: #fff;">
        <div class="row">
            &nbsp;
        </div>
        <section>
            <div class="panel-body paymentWrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-md-9 inventory_pricing_table_div">
                            <h2>Subscription Payment</h2>
                        </div>
                        <div class="col-md-3 text-right" style="padding-top: 25px;">
                            <?php
                            $packageUrl = \yii\helpers\Url::to("/pricing");
                            if (!empty($countryShortCode)) {
                                $packageUrl = \yii\helpers\Url::to("/" . $countryShortCode . "/pricing");
                            }
                            ?>
                            <a href="<?= $packageUrl ?>" class="btn btn-default btn-md change-package" style="border-radius: 0px; ">Change Package</a>
                            <a href="#" class="btn btn-default btn-md change-addons" style="border-radius: 0px; display: none;">Change Addons</a>
                        </div>

                    </div>
                </div>
                <div class="row selectedpackagedetails">
                    <div class="col-md-12">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Package Details</legend>
                            <div class="pricingContent row">
                                <div class="col-md-12">
                                    <?php $package_amount = 0; ?>
                                    <?php if (!empty($inventoryPackage)) {
                                        $package_amount += $inventoryPackage->priced_monthly * $PlanModel->period_time;
                                        ?>
                                        <div class="col-md-8">
                                            <h2 style="font-size: 20px;font-weight: 700;">Inventory Control</h2>
                                            <ul class="monthlyPlanInput">
                                                <?php if (isset($inventoryPackage->numof_user)) { ?>
                                                    <li><?= ($inventoryPackage->numof_user == 0) ? " - " : (($inventoryPackage->numof_user > 0) ? $inventoryPackage->numof_user . " Users" : " Multiple Users ") ?></li>
                                                <?php } ?>
                                                <li><?= ($inventoryPackage->numof_channels == 0) ? " - " : (($inventoryPackage->numof_channels > 0) ? $inventoryPackage->numof_channels . "  Integration channels" : " Multiple  Integration channels ") ?></li>
                                                <li><?= ($inventoryPackage->numof_online_order == 0) ? " - " : (($inventoryPackage->numof_online_order > 0) ? Yii::$app->formatter->asInteger($inventoryPackage->numof_online_order) . " Sales Orders / month" : " Multiple Sales Orders ") ?></li>
                                                <?php /*<li><?= ($inventoryPackage->numof_offline_order == 0) ? " - " : (($inventoryPackage->numof_offline_order > 0) ? Yii::$app->formatter->asInteger($inventoryPackage->numof_offline_order) . " Offline sales orders / month" : " Multiple Offline sales orders ") ?></li>*/ ?>
                                                <li><?= ($inventoryPackage->numof_outlet == 0) ? " - " : (($inventoryPackage->numof_outlet > 0) ? $inventoryPackage->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li>
                                                <li><?= ($inventoryPackage->numberof_items == 0) ? " - " : (($inventoryPackage->numberof_items > 0) ? Yii::$app->formatter->asInteger($inventoryPackage->numberof_items) . " SKU" : " Multiple SKU ") ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 package_price">
                                            <h3>
                                            <?= CommonModel::CurrencyFormat($inventoryPackage->priced_monthly * $PlanModel->period_time, $currencySymbol. " "); ?>
                                            <small><?= $PlanModel->period_time == 1 ? " /mo" : " /yr"?></small>
                                            </h3>
                                        </div>
                                    <?php } ?>
                                    <?php if (!empty($posPackage)) {
                                        $package_amount += $posPackage->priced_monthly * $PlanModel->period_time;
                                        ?>
                                        <div class="col-md-8">
                                            <h2 style="font-size: 20px;font-weight: 700;">Retail POS</h2>
                                            <ul class="monthlyPlanInput">
                                                <?php if (isset($posPackage->numof_user)) { ?>
                                                    <li><?= ($posPackage->numof_user == 0) ? " - " : (($posPackage->numof_user > 0) ? $posPackage->numof_user . " Users" : " Multiple Users ") ?></li>
                                                <?php } ?>
                                                <?php if (empty($inventoryPackage) && !empty($posPackage)) { ?>
                                                    <li><?= ($posPackage->numof_outlet == 0) ? " - " : (($posPackage->numof_outlet > 0) ? $posPackage->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li>
                                                    <li><?= ($posPackage->numberof_items == 0) ? " - " : (($posPackage->numberof_items > 0) ? Yii::$app->formatter->asInteger($posPackage->numberof_items) . " SKU" : " Multiple SKU ") ?></li>
                                                <?php } ?>
                                                <li><?= ($posPackage->numof_pos_receipts == 0) ? " - " : (($posPackage->numof_pos_receipts > 0) ? Yii::$app->formatter->asInteger($posPackage->numof_pos_receipts) . "  Sales a month" : " Multiple  Sales a month ") ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 package_price">
                                            <h3>
                                            <?= CommonModel::CurrencyFormat($posPackage->priced_monthly * $PlanModel->period_time, $currencySymbol. " "); ?>
                                            <small><?= $PlanModel->period_time == 1 ? " /mo" : " /yr"?></small>
                                            </h3>
                                        </div>
                                    <?php } ?>
                                    <?php if (!empty($hrmPackage)) {
                                        $package_amount += $hrmPackage->priced_monthly * $PlanModel->period_time * $numof_employees;
                                        ?>
                                        <div class="col-md-8">
                                            <h2 style="font-size: 20px;font-weight: 700;">Human Resource</h2>
                                            <ul class="monthlyPlanInput">
                                                <li>
                                                    No.of Staffs <?= $numof_employees ?>
                                                </li>
                                                <?php if (isset($hrmPackage->numof_user)) { ?>
                                                    <li><?= ($hrmPackage->numof_user == 0) ? " - " : (($hrmPackage->numof_user > 0) ? $hrmPackage->numof_user . " Users" : " Multiple Users ") ?></li>
                                                <?php } ?>
                                                <li>Basic HRIS</li>
                                                <li>Employee Self Service</li>
                                                <li>leave Management</li>
                                                <li>Mobile Application</li>
                                                <?php
                                                if ($hrmPackage->name == "Small" || $hrmPackage->name == "Medium" || $hrmPackage->name == "Large") { ?>
                                                    <li>Timesheets</li>
                                                    <li>Claims Management</li>
                                                    <?php if ($country == 'Singapore') { ?>
                                                        <li>Payroll Management</li>
                                                    <?php } ?>
                                                    <li>3<sup style="top: -0.8em;font-size: 45%;">rd</sup> Party
                                                        Integrations
                                                    </li>
                                                <?php }
                                                if ($hrmPackage->name == "Medium" || $hrmPackage->name == "Large") { ?>
                                                    <li>Shift Roster (Scheduling)</li>
                                                    <li>Performance</li>
                                                    <!--<li>Reports Integration</li>-->
                                                    <li>Time In/Out -ID Scan</li>
                                                    <li>Approval Groups</li>
                                                    <li>Commission Management</li>
                                                    <li>GPS Location Tracking*</li>
                                                <?php }
                                                if ($hrmPackage->name == "Large") { ?>
                                                    <li>360 Feedback</li>
                                                    <li>Multiple Organizations</li>
                                                    <li>Plus 10 hrs Training</li>
                                                    <li>Recruitment</li>
                                                    <li>Face Recognition (Face ID)*</li>
                                                <?php }
                                                if ($hrmPackage->name == "Medium" || $hrmPackage->name == "Large") { ?>
                                                    <li style="list-style: none; margin-top: 5px;">* Coming Soon
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 package_price">
                                            <h3>
                                            <?= CommonModel::CurrencyFormat($hrmPackage->priced_monthly * $PlanModel->period_time * $numof_employees, $currencySymbol. " "); ?>
                                            <small><?= $PlanModel->period_time == 1 ? " /mo" : " /yr"?></small>
                                            </h3>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (!empty($crmPackage)) {
                                        $package_amount += $crmPackage->priced_monthly * $PlanModel->period_time;
                                        ?>
                                        <div class="col-md-8">
                                            <h2 style="font-size: 20px;font-weight: 700;">Customer Relation
                                                Management</h2>
                                            <ul class="monthlyPlanInput">
                                                <li><?= ($crmPackage->numof_integration == 0) ? " - " : (($crmPackage->numof_integration > 0) ? $crmPackage->numof_integration . " Integrations" : " Multiple Integrations ") ?></li>
                                                <li style="display: none;"><?= ($crmPackage->numof_quotes == 0) ? " - " : (($crmPackage->numof_quotes > 0) ? Yii::$app->formatter->asInteger($crmPackage->numof_quotes) . " Monthly Quotes /  month" : " Multiple Monthly Quotes ") ?></li>
                                                <li style="display: none;"><?= ($crmPackage->numof_invoices == 0) ? " - " : (($crmPackage->numof_invoices > 0) ? Yii::$app->formatter->asInteger($crmPackage->numof_invoices) . " Monthly Invoices /  month" : " Multiple Monthly Invoices ") ?></li>
                                                <li><?= ($crmPackage->numof_contact == 0) ? " - " : (($crmPackage->numof_contact > 0) ? Yii::$app->formatter->asInteger($crmPackage->numof_contact) . " Contacts" : " Multiple Contacts ") ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 package_price">
                                            <h3>
                                            <?= CommonModel::CurrencyFormat($crmPackage->priced_monthly * $PlanModel->period_time, $currencySymbol. " "); ?>
                                            <small><?= $PlanModel->period_time == 1 ? " /mo" : " /yr"?></small>
                                            </h3>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (!empty($ecommercePackage)) {
                                        $package_amount += $ecommercePackage->priced_monthly * $PlanModel->period_time;
                                        ?>
                                        <div class="col-md-8">
                                            <h2 style="font-size: 20px;font-weight: 700;">eCommerce</h2>
                                            <ul class="monthlyPlanInput">
                                                <?php
                                                if($ecommercePackage->name == "Small"){
                                                    ?>
                                                    <li>Asalta Subdomain (yourbrand.Asalta.com)</li>
                                                    <li>No branded domain</li>
                                                    <li>Powered by Asalta Branding</li>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if($ecommercePackage->name == "Medium"){
                                                    ?>
                                                    <li>Branded domain</li>
                                                    <li>Powered by Asalta Branding</li>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if($ecommercePackage->name == "Large"){
                                                    ?>
                                                    <li>Branded domain</li>
                                                    <li>No Asalta Branding</li>
                                                    <?php
                                                }
                                                ?>
                                                <?php /*if (isset($ecommercePackage->numof_user)) { ?>
                                                    <li><?= ($ecommercePackage->numof_user == 0) ? " - " : (($ecommercePackage->numof_user > 0) ? $ecommercePackage->numof_user . " Users" : " Multiple Users ") ?></li>
                                                <?php }*/ ?>
                                                <li><?= ($ecommercePackage->numof_integration == 0) ? " - " : (($ecommercePackage->numof_integration > 0) ? $ecommercePackage->numof_integration . " Integrations" : " Multiple Integrations ") ?></li>
                                                <?php
                                                /*<li><?= ($ecommercePackage->numberof_items == 0) ? " - " : (($ecommercePackage->numberof_items > 0) ? Yii::$app->formatter->asInteger($ecommercePackage->numberof_items) . " SKU" : " Multiple SKU ") ?></li>
                                                <li><?= ($ecommercePackage->numof_online_order == 0) ? " - " : (($ecommercePackage->numof_online_order > 0) ? Yii::$app->formatter->asInteger($ecommercePackage->numof_online_order) . " Sales Orders / month" : " Multiple Sales Orders ") ?></li>*/
                                                ?>
                                                <?php /*<li>
                                                    $<?= ($ecommercePackage->online_sales_revenue == 0) ? " - " : (($ecommercePackage->online_sales_revenue > 0) ? Yii::$app->formatter->asInteger($ecommercePackage->online_sales_revenue) . " Online Sales revenue" : " Multiple Online Sales revenue ") ?> </li> */ ?>
                                                <?php
                                                /*<li><?= ($ecommercePackage->numof_outlet == 0) ? " - " : (($ecommercePackage->numof_outlet > 0) ? $ecommercePackage->numof_outlet . " Warehouse" : " Multiple Warehouse ") ?></li>*/
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 package_price">
                                            <h3>
                                            <?= CommonModel::CurrencyFormat($ecommercePackage->priced_monthly * $PlanModel->period_time, $currencySymbol. " "); ?>
                                            <small><?= $PlanModel->period_time == 1 ? " /mo" : " /yr"?></small>
                                            </h3>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Add Ons</legend>
                                <?php if ($AddonsModel) { ?>
                                    <div class="product-add-ons-items">
                                        <div class="row">
                                            <?php foreach ($AddonsModel as $Addonskey => $Addons) { ?>
                                                <div class="col-md-6 col-xl-12">
                                                    <div style="min-height: auto;">
                                                        <article class="product-stellar">
                                                            <div class="product-info">
                                                                <div style="float: left;width: 55%;">
                                                                    <h2><?= $Addons->name ?></h2>
                                                                    <p style="width: 130px">
                                                                        <?= '(1 pack = ' . $Addons->limit . ' Quantity)' ?>
                                                                    </p>
                                                                </div>
                                                                <div style="width: 45%;">
                                                                    <input class="qty" style="width: 55%;" min="1"
                                                                           type="number" value=""
                                                                           name="<?= preg_replace('/[^A-Za-z0-9\-]/', '_', $Addons->name) ?>"
                                                                           data-name="<?= $Addons->name ?>"/><span style="color: #4d4a48;"> / pack</span>
                                                                </div>
                                                            </div>
                                                            <div class="price">
                                                                <strong><?= CommonModel::CurrencyFormat($Addons->priced_monthly, $currencySymbol. " "); ?>
                                                                    /mo</strong></div>
                                                            <div class="add-ons-item">
                                                                <input type="checkbox"
                                                                       class="addons-input <?= preg_replace('/[^A-Za-z0-9\-]/', '_', $Addons->name) ?>"
                                                                       data-addonspackagename='<?= preg_replace('/[^A-Za-z0-9\-]/', '_', $Addons->name) ?>'
                                                                       data-addonspackageprice='<?= $Addons->priced_monthly * $PlanModel->period_time ?>'
                                                                       data-addonspackageid="<?= $Addons->ims_addonid ?>"
                                                                       style="opacity: 0; position: absolute;left:9999px;" tabindex="-1">
                                                                <button type="button"><i class="fa fa-cart-plus"
                                                                                         aria-hidden="true"></i>
                                                                </button>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="product-add-ons-items-view">
                                    <table class="table table-hover" id="add_ons">
                                        <thead>
                                        <tr class="add-ons-items-view-th" style="display: none;">
                                            <th>Add Ons</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Price</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </fieldset>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="row selectedpackagedetails">
                    <div class="col-md-12">
                        <div class="col-md-6"></div>
                        <div class="col-md-6 text-right" id="checkoutpackagedetails">
                            <div class="col-md-8 p_price" style="color: #2989d8;  font-size: 24px;">
                                <?= CommonModel::CurrencyFormat($package_amount, $currencySymbol. " "); ?>
                                <small><?= $PlanModel->period_time == 1 ? " /mo" : " /yr"?></small>
                            </div>
                            <div class="col-md-2">
                                <a href="javascript:void(0)" class="btn btn-primary btn-md checkoutpackage" style="border-radius: 0px;">
                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Proceed to Payment
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $form = ActiveForm::begin([
                    //'action' => 'payment',
                    'id' => 'payment-form',
                    'options' => ['enctype' => 'multipart/form-data',
                        'class' => 'form-horizontal adminex-form'],
                ]); ?>
                <div class="paymentdetails row" style="display: none">
                    <div class="col-md-12">
                        <div>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Your Particulars</legend>
                                <div class="col-md-12">
                                    <div class="col-md-6" id="signupmail_div">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <?= $form->field($model, 'cname', ['template' => "<i class='fa fa-user'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                                                    ->textInput(['class' => 'form-control stepforminput', 'style' => 'width:100%', 'placeholder' => 'First Name']) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <?= $form->field($model, 'clname', ['template' => "<i class='fa fa-user'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                                                    ->textInput(['class' => 'form-control stepforminput', 'style' => 'width:100%', 'placeholder' => 'Last Name']) ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <?= $form->field($model, 'cemail', ['template' => "<i class='fa fa-envelope'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                                                ->textInput(['class' => 'form-control stepforminput', 'style' => 'width:100%', 'placeholder' => 'Email']) ?>
                                            <span id="email_status"></span>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <?php
                                                if ($country != 'Global') {
                                                    $code = Country::find()->where(['name' => $country])->one();
                                                    $model->country_code = ($code) ? $code->country_code : '';
                                                }
                                                $countryCodeData = ArrayHelper::map(Country::find()->select(['countryid', 'country_code', "CONCAT('+',country_code) as name"])->asArray()->all(), 'country_code', 'name');
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
                                                    ->textInput(['class' => 'form-control', 'style' => 'margin-top: 15px;width:100%', 'placeholder' => 'Mobile']) ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <?= $form->field($model, 'website', ['template' => "<i class='fa fa-globe'></i>{input}\n{error}", 'options' => ['class' => '']])
                                                ->textInput(['class' => 'form-control', 'style' => 'width:100%', 'placeholder' => 'Website']) ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="signup_pesonaldetail_div">
                                        <div class="form-group">
                                            <div class="col-md-9" style="margin-left: -15px;">
                                                <?= $form->field($model, 'companyname', ['template' => "<i class='fa fa-building'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                                                    ->textInput(['class' => 'form-control', 'style' => 'width:100%', 'placeholder' => 'Company Name']) ?>
                                            </div>
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'emp_size', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                                                    ->textInput(['class' => 'form-control', 'style' => 'width:120%', 'placeholder' => 'Size']) ?>
                                            </div>
                                        </div>

                                        <div class="form-group" id="uen">
                                            <?= $form->field($model, 'uen', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                                                ->textInput(['class' => 'form-control', 'style' => 'width:100%', 'placeholder' => 'Unique Entity Number (UEN)']) ?>
                                        </div>

                                        <?php
                                        $industryData = ArrayHelper::map(Industry::find()->select(['industryid', 'industry_name'])->orderBy(['industry_name' => SORT_ASC])->asArray()->all(), 'industry_name', 'industry_name');
                                        echo $form->field($model, 'industry')->widget(Select2::classname(), [
                                            'data' => $industryData,
                                            'language' => 'en',
                                            'options' => ['placeholder' => 'Industry', 'class' => 'form-control'],
                                            'addon' => [
                                                'prepend' => [
                                                    'content' => Icon::show('industry', ['class' => 'fa fa-industry', 'framework' => Icon::FAS])
                                                ],
                                            ]
                                        ])->label('');

                                        ?>
                                        <div class="form-group" id="otherindustrydiv">
                                            <?= $form->field($model, 'otherindustry', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                                                ->textInput(['class' => 'form-control', 'style' => 'width:100%', 'placeholder' => 'Enter your industry']) ?>
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
                                                    'content' => Icon::show('globe', ['class' => 'fa fa-globe', 'framework' => Icon::FAS])
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
                                </span>
                                </div>
                            </fieldset>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Payment Info</legend>
                                <div class="col-md-6">
                                    <?php
                                    if (Yii::$app->params["EnableStripeDiscounts"]) {
                                        ?>
                                        <div class="row" style="font-weight: bold; margin-bottom: 10px;">
                                            <div class="col-md-6">
                                                <p id="have_promo_code"><b>Have promo code?</b></p>
                                            </div>
                                            <div class="col-md-6" id="have_promo_code_input" style="display: none">
                                                <?php if (is_array($StripeCoupons) && count($StripeCoupons) > 0) { ?>
                                                    <select name="discount_id" class="form-control apply_discount"
                                                            style="width:100%; float: right;">
                                                        <option value="">Select</option>
                                                        <?php
                                                        foreach ($StripeCoupons as $StripeCoupon) {
                                                            ?>
                                                            <option value="<?= $StripeCoupon->id ?>"><?= $StripeCoupon->title ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                        <option value="enter_promo_code">I have promo code.</option>
                                                    </select>
                                                    <div class="input-group promo_code_inputs" style="display:none;">
                                                        <input type="text" class="form-control promo_code"
                                                               name="promo_code" style="width:100%"
                                                               placeholder="Promo Code"/>
                                                        <span class="input-group-btn">
                                                            <button type="button"
                                                                    class="close_promo_code btn btn-danger btn-lg"
                                                                    style="height: 45px;"><i
                                                                        class="fa fa-times"></i></button>
                                                        </span>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="promo_code_inputs">
                                                        <input type="text" class="form-control promo_code"
                                                               name="promo_code" style="width:100%"
                                                               placeholder="Promo Code"/>
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
                                            <?= CommonModel::CurrencyFormat($package_amount, $currencySymbol. " ") ?>
                                        </div>
                                        <div class="col-md-12" style="margin-top: 15px;">
                                            <input type="hidden" name="plan_id" value="<?= $PlanModel->planid ?>"/>
                                            <?php foreach ($package_ids as $packagekey => $package_id) { ?>
                                                <input type="hidden" name="products[]" value="<?= $packagekey ?>"/>
                                                <input type="hidden" name="product_ids[<?= $packagekey ?>]" value="<?= $package_id ?>"/>
                                            <?php } ?>
                                            <?php if (!empty($hrmPackage)) { ?>
                                                <input type="hidden" name="numof_employees"
                                                       value="<?= $numof_employees ?>"/>
                                            <?php } ?>
                                            <input type="hidden" name="add_ons" value="[]"/>
                                            <input type="hidden" name="country" value="<?= $country ?>"/>

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
                                    Your plan starts immediately. You'll be billed
                                    <strong class="p_price"><?= CommonModel::CurrencyFormat($package_amount, $currencySymbol. " ") ?></strong>
                                    on <strong><?= date("d M Y") ?></strong>.
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
                        <?= Html::submitButton('<i class="fa fa-lock" aria-hidden="true"></i> Pay Now', ['class' => 'btn btn-primary btn-lg col-md-6', 'id' => "payBtn"]); ?>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="col-md-2">
                                <?= Html::img('@web/images/secured_payment.png', ['class' => 'pull-left', 'style' => 'height:30px;']); ?>
                            </div>
                            <div class="col-md-2">
                                <?= Html::img('@web/images/credit-card.png', ['class' => 'pull-left', 'style' => 'height:30px;']); ?>
                            </div>
                            <div class="col-md-2">
                                <?= Html::img('@web/images/secured _payment_text.png', ['class' => 'pull-left', 'style' => 'height:30px;']); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
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
$this->registerAssetBundle('\app\assets\MultiItemsPaymentAsset');
$this->registerJs("
    window.stripeKey = '" . Yii::$app->params['stripe_publishable_key'] . "';
    window.currencySymbol  =  '" . $currencySymbol . " ';
    window.country  =  '" . $country . "';
    window.plan_period_time  =  '" . ($PlanModel->period_time == 1 ? " /mo" : " /yr") . "';
    window.countryShortCode  =  '" . $countryShortCode . "';
    window.currencyName  =  '" . $currencyName . "';
    window.currencyCode  =  '" . $currencyCode . "';
    window.totalPriceWithoutAddons  =  $package_amount;
    window.totalPrice  =  $package_amount;
    window.selectedItems  =  ".json_encode($package_ids).";
    window.selectedAddons = [];
", \yii\web\View::POS_HEAD);
if (Yii::$app->session->hasFlash('error')) {
    $this->registerJs("
        alert('" . Yii::$app->session->getFlash('error') . "');
        window.focusCard = true;
    ", \yii\web\View::POS_END);
}
?>