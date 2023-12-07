<style>

    .integrationsContainer .tab-content{

        padding-left: 0px;
        padding-right: 0px;
        padding-top: 10px;
    }
    @media (min-width:961px)  {
        .integrationsContainer .tab-content{
            min-height: 500px;
            background-color: #f4f4f5;
        }
        .integrationsContainer .col-lg-3{
            width: 33.3%;
        }
    }
    @media (max-width:641px){
        .integrationsContainer .integrationsContainer{
            background-color: #f4f4f5;
        }
        .integrationsContainer .tabbable .nav{
            background: #FFF;
        }
    }
    .integrations_h1tage-heading, .integrations_h2tage-heading {
        text-align: center;
        font-family: Raleway,Helvetica Neue,Helvetica,Arial,sans-serif;
    }
    .integrations_h1tage-heading {
        font-weight: 800;
    }
    .integrationsContainer .integrations_content{
        margin-top: 25px;
        margin-bottom: 50px;
    }
    .integrationsContainer .tabbable li a:before {
        content: '';
        margin-right: 5px;
    }
    .tabbable li a.active:before {
        content: '▶';
        margin-right: 5px;
    }
    .integrationsContainer .tabbable>ul.nav>li>a.active:after {
        background-color: #b31b1d !important;
        left: 16%;
    }
    .integrationsContainer .rd-gird-row .rd-org-img-wrapper .rdorgin-ho-eff-wrapper .btn {
        display: inline-block !important
    }
    .integrationsContainer .rdorgin-ho-eff-wrapper p {
        text-align: justify;
    }
    .tabbable li a.active {
        font-weight: bold;
    }
    .rd-gird-row .col-lg-3{
        background-color: #f4f4f5;
    }
    .rd-gird-row .col-lg-3, .rd-gird-row .col-md-3, .rd-gird-row .col-sm-6, .rd-gird-row .col-xs-12 {
        padding: 10px !important;
    }

</style>
<?php
$country_code = strtolower((isset($_SERVER["HTTP_CF_IPCOUNTRY"]) ? $_SERVER["HTTP_CF_IPCOUNTRY"] : 'in'));
if($country_code != "sg" && $country_code != "in"){
    $country_code = "";
}
?>
<div class="container integrationsContainer">
    <div class="row">
        <div class="col-md-12">
            <!-- tabs left -->
            <div class="tabbable">
                <ul class="nav nav-stacked col-md-3">
                    <li class="active"><a class="active" href="#all" data-toggle="tab">All Integrations</a></li>
                    <li><a href="#accounting" data-toggle="tab">Accounting</a></li>
                   
                    <li><a href="#google_apps" data-toggle="tab">Google Apps</a></li>
                    <li><a href="#paymentgateway" data-toggle="tab">Payment Gateway</a></li>
                </ul>
                <div class="tab-content col-md-9">
                    <div class="tab-pane active integration-list" id="all">
                    <div class="abcde">
                    <div id="wrapper" class="orgin-css-hov">
                    <div id="image-effects-section">
                    <div class="org_wrapper">
                    <div class="rd-gird-row">
                    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 abcd">
                        <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                src="storage/quickbooks.png" alt="Asalta Quickbooks Intergation">
                            <div class="rdorgin-ho-eff-wrapper"><h5> Quickbooks</h5>
                                <p>Automatically sync all data between inventory movements and
                                    accountancy.</p> <button
                                    class="btn btn-default btn-small l-float-right" href="#">READ
                                    MORE</button>
                                <div class="image-overlay-horizontal-top-2"></div>
                                <div class="image-overlay-horizontal-bottom-2"></div>
                            </div>
                        </div>
                    </div>
         
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 abcd">
                        <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                src="images/Asalta-google-calendar-lg.png"
                                alt="Asalta Google Calendar Intergation">
                            <div class="rdorgin-ho-eff-wrapper"><h5> Google Calendar</h5>
                                <p>Your Asalta Technologies account comes with Google Calendar
                                    already built in</p> <button
                                    class="btn btn-default btn-small l-float-right" href="#">READ
                                    MORE</button>
                                <div class="image-overlay-horizontal-top-2"></div>
                                <div class="image-overlay-horizontal-bottom-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 abcd">
                        <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                src="images/xero-integration.png"
                                alt="Asalta Xero Accounting Intergation">
                            <div class="rdorgin-ho-eff-wrapper"><h5> Xero Accounting</h5>
                                <p>From the factory to the ledger, Asalta Technologies and Xero is a
                                    match made in (cloud) heaven.</p> <button
                                    class="btn btn-default btn-small l-float-right" href="#">READ
                                    MORE</button>
                                <div class="image-overlay-horizontal-top-2"></div>
                                <div class="image-overlay-horizontal-bottom-2"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 abcd">
                        <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                src="images/Asalta-stripe-integration.png"
                                alt="Asalta Stripe Intergation">
                            <div class="rdorgin-ho-eff-wrapper"><h5> Stripe</h5>
                                <p>Collect Payment from your customers now using Credit card or
                                    debit cards using PayPal Stripe Payment gateway.</p> <button
                                    class="btn btn-default btn-small l-float-right" href="#">READ
                                    MORE</button>
                                <div class="image-overlay-horizontal-top-2"></div>
                                <div class="image-overlay-horizontal-bottom-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 abcd">
                        <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                src="images/Asalta-paypal-integration.png"
                                alt="Asalta Paypal Intergation">
                            <div class="rdorgin-ho-eff-wrapper"><h5> Pay pal</h5>
                                <p>Collect Payment from your customers now using Credit card or
                                    debit cards using PayPal Payment gateway.</p> <button
                                    class="btn btn-default btn-small l-float-right" href="#">READ
                                    MORE</button>
                                <div class="image-overlay-horizontal-top-2"></div>
                                <div class="image-overlay-horizontal-bottom-2"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 abcd">
                        <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                src="storage/3googledrive.png"
                                alt="Asalta Google Drive Intergation">
                            <div class="rdorgin-ho-eff-wrapper"><h5> Google Drive</h5>
                                <p>Your Asalta Technologies account comes with Google Drive already
                                    built in. The integration allows you to save your sales reports
                                    and inventory reports straight into your Google Drive
                                    folders.</p> <button class="btn btn-default btn-small l-float-right" href="#">READ
                                    MORE</button>
                                <div class="image-overlay-horizontal-top-2"></div>
                                <div class="image-overlay-horizontal-bottom-2"></div>
                            </div>
                        </div>
                    </div>
                  
                    <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                src="images/telegram-integration-chat-logo.png"
                                alt="Asalta Telegram Integration">
                            <div class="ribbon blue"><span>Coming Soon</span></div>
                            <div class="rdorgin-ho-eff-wrapper"><h5> Telegram</h5>
                                <p>Telegram integration with ezCoSec enables you to send updates and messaging seamlessly.</p>
                                <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                <div class="image-overlay-horizontal-top-2"></div>
                                <div class="image-overlay-horizontal-bottom-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                src="images/Asalta-multi-chat.png"
                                alt="Asalta Multi-Chat Integration">
                            <div class="ribbon blue"><span>Coming Soon</span></div>
                            <div class="rdorgin-ho-eff-wrapper"><h5> Multi-Chat</h5>
                                <p>Multi-Chat integration with ezCoSec enables you to send updates and messaging seamlessly.</p>
                                <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                <div class="image-overlay-horizontal-top-2"></div>
                                <div class="image-overlay-horizontal-bottom-2"></div>
                            </div>
                        </div>
                    </div> -->
                    <!--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                src="images/telegram-integration-chat-logo.png"
                                alt="Asalta Marketplace Chat Integration">
                            <div class="ribbon blue"><span>Coming Soon</span></div>
                            <div class="rdorgin-ho-eff-wrapper"><h5> Marketplace Chat</h5>
                                <p>Telegram integration with ezCoSec enables you to send updates and messaging seamlessly.</p>
                                <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                <div class="image-overlay-horizontal-top-2"></div>
                                <div class="image-overlay-horizontal-bottom-2"></div>
                            </div>
                        </div>
                    </div>-->

                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="tab-pane integration-list integration_hide" id="ecommerce">
                        <div id="wrapper_2" class="orgin-css-hov">
                            <div id="image-effects-section_1">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="images/eCommercein.png" alt="Asalta eCommerce Intergation">
                                                <a target="_blank" href="<?= \yii\helpers\Url::to("/" . $country_code . "/ecommerce") ?>">
                                                <div class="rdorgin-ho-eff-wrapper"><h5> eCommerce</h5>
                                                    <p>Get your online shop built with eCommerce to automatically sync sales
                                                        with stock levels, invoices and order fulfillment.</p> <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="storage/Woocommerce-1.png" alt="Asalta WooCommerce Intergation"> <a
                                                    href="<?= \yii\helpers\Url::to('integration/woocommerce') ?>">
                                                    <div class="rdorgin-ho-eff-wrapper"><h5> WooCommerce</h5>
                                                        <p>Get your online shop built with WooCommerce to automatically sync
                                                            sales with stock levels, invoices and order fulfillment.</p>
                                                        <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                        <div class="image-overlay-horizontal-top-2"></div>
                                                        <div class="image-overlay-horizontal-bottom-2"></div>
                                                    </div>
                                                </a></div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1">
                                                <img src="storage/amazon-1.png" alt="Asalta Amazon Intergation">
                                                <a target="_blank" href="<?= \yii\helpers\Url::to('integration/amazon-marketplace') ?>">
                                                    <div class="rdorgin-ho-eff-wrapper"><h5> Amazon</h5>
                                                        <p>Sync your Amazon Seller Central sales with your stock levels,
                                                            invoices and order fulfillment.</p>
                                                        <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                        <div class="image-overlay-horizontal-top-2"></div>
                                                        <div class="image-overlay-horizontal-bottom-2"></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="images/Asalta-lazada-integration.png"
                                                    alt="Asalta Lazada Intergation">
                                                <div class="rdorgin-ho-eff-wrapper"><h5>Lazada</h5>
                                                    <p>Get your online shop built with Lazada to automatically sync sales
                                                        with stock levels, invoices and order fulfillment.</p>
                                                    <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="images/Asalta-shopee-integration.png"
                                                    alt="Asalta Shopee Intergation">
                                                <div class="rdorgin-ho-eff-wrapper"><h5> Shopee</h5>
                                                    <p>Get your online shop built with Shopee to automatically sync sales
                                                        with stock levels, invoices and order fulfillment.</p>
                                                    <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="storage/shopify-1.png" alt="Asalta Shopify Intergation">
                                                <div class="rdorgin-ho-eff-wrapper"><h5> Shopify</h5>
                                                    <p>Get your online shop built with Shopify to automatically sync sales
                                                        with stock levels, invoices and order fulfillment.</p>
                                                    <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 abcd">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="storage/q0010.jpg" alt="Asalta Qoo10 Intergation">
                                                <div class="rdorgin-ho-eff-wrapper"><h5> Qoo10</h5>
                                                    <p>Sync your Qoo10 Seller Central sales with your stock levels,
                                                        invoices and order fulfillment.</p>
                                                    <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 abcd">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="images/OpenCart_logo.png"
                                                    alt="Asalta OpenCart Intergation">
                                                <div class="rdorgin-ho-eff-wrapper"><h5> OpenCart</h5>
                                                    <p>OpenCart is an online store management system, Asalta inventory management system, Integrates with OpenCart and helps you to synchronize your eCommerce store.</p>
                                                    <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="storage/magento-1.png" alt="Asalta Magento Intergation">
                                                <div class="ribbon blue"><span>Coming Soon</span></div>
                                                <div class="rdorgin-ho-eff-wrapper"><h5> Magento</h5>
                                                    <p>Get your online shop built with Magento to automatically sync sales
                                                        with stock levels, invoices and order fulfillment.</p>
                                                    <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="images/Asalta-facebook.png" alt="Asalta Facebook Intergation">
                                                <div class="ribbon blue"><span>Coming Soon</span></div>
                                                <div class="rdorgin-ho-eff-wrapper"><h5>Facebook</h5>
                                                    <p>Get your online shop built with Facebook to automatically sync sales
                                                        with stock levels, invoices and order fulfillment.</p>
                                                    <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="storage/zalora1-a.png" alt="Asalta Zalora Intergation">
                                                <div class="ribbon blue"><span>Coming Soon</span></div>
                                                <div class="rdorgin-ho-eff-wrapper"><h5> Zalora</h5>
                                                    <p>Get your online shop built with Zalora to automatically sync sales
                                                        with stock levels, invoices and order fulfillment.</p>
                                                    <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="storage/bigcommerce-1.png" alt="Asalta BigCommerce Intergation">
                                                <div class="ribbon blue"><span>Coming Soon</span></div>
                                                <div class="rdorgin-ho-eff-wrapper"><h5> BigCommerce</h5>
                                                    <p>Streamline your business operations by merging your eCommerce and
                                                        inventory management.</p>
                                                    <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 abcd">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="images/Asalta-zapier-integration.png"
                                                    alt="Asalta Zapier Intergation">
                                                <div class="ribbon blue"><span>Coming Soon</span></div>
                                                <div class="rdorgin-ho-eff-wrapper"><h5> Zapier</h5>
                                                    <p>Connect Your Apps with 1000s of other apps and Automate WorkflowsEasy
                                                        automation for busy people. Zapier moves info between your web apps
                                                        automatically, so you can focus on your most important work.</p>
                                                    <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                   
                    <div class="integration-list integration_hide" id="paymentgateway">
                        <div id="wrapper_5" class="orgin-css-hov">
                            <div id="image-effects-section_4">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="images/Asalta-stripe-integration.png"
                                                    alt="Asalta Stripe Intergation">
                                                <div class="rdorgin-ho-eff-wrapper"><h5> Stripe</h5>
                                                    <p>Collect Payment from your customers now using Credit card or debit
                                                        cards using PayPal Stripe Payment gateway.</p>
                                                    <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="images/Asalta-paypal-integration.png"
                                                    alt="Asalta Paypal Intergation">
                                                <div class="rdorgin-ho-eff-wrapper"><h5> Pay pal</h5>
                                                    <p>Collect Payment from your customers now using Credit card or debit
                                                        cards using PayPal Payment gateway.</p>
                                                    <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="integration-list integration_hide" id="accounting">
                        <div id="wrapper_6" class="orgin-css-hov">
                            <div id="image-effects-section_5">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="storage/quickbooks-1.png" alt="Asalta Quickbooks Intergation">
                                                <div class="rdorgin-ho-eff-wrapper"><h5> Quickbooks</h5>
                                                    <p>Automatically sync all data between inventory movements and
                                                        accountancy.</p>
                                                    <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="storage/xero-1.png" alt="Asalta Xero Accounting Intergation">
                                                <div class="rdorgin-ho-eff-wrapper"><h5> Xero Accounting</h5>
                                                    <p>From the factory to the ledger, Asalta Technologies and Xero is a
                                                        match made in (cloud) heaven.</p>
                                                    <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="integration-list integration_hide" id="google_apps">
                        <div id="wrapper_9" class="orgin-css-hov">
                            <div id="image-effects-section_8">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="images/Asalta-google-calendar-lg.png"
                                                    alt="Asalta Google Calendar Intergation">
                                                <div class="rdorgin-ho-eff-wrapper"><h5> Google Calendar</h5>
                                                    <p>Your Asalta Technologies account comes with Google Calendar already
                                                        built in.</p>
                                                    <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1"><img
                                                    src="storage/3googledrive-1.png" alt="Asalta Google Drive Intergation">
                                                <div class="rdorgin-ho-eff-wrapper"><h5> Google Drive</h5>
                                                    <p>Your Asalta Technologies account comes with Google Drive already
                                                        built in. The integration allows you to save your sales reports and
                                                        inventory reports straight into your Google Drive folders.</p>
                                                    <button class="btn btn-default btn-small l-float-right" href="#">READ MORE</button>
                                                    <div class="image-overlay-horizontal-top-2"></div>
                                                    <div class="image-overlay-horizontal-bottom-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
            <!-- /tabs -->
        </div>
    </div>
    <!-- /row -->
</div>
<?php
$this->registerJs("
$(document).ready(function() {
    $('.tabbable a').click(function() {
        var get_href = $(this).attr('href');
        $('.tabbable a').removeClass('active');
        $(this).addClass('active');
        window.location.href = get_href;
    });

    var integrationName = window.location.hash.substr(1);

    $('.nav-stacked a').each(function() {
        var get_href = $(this).attr('href');
        if(integrationName){
            if(get_href == '#'+integrationName){
                $('#'+integrationName).addClass('active');
            }else{
                $(this).removeClass('active');
            }
        }

    });

    $('.integration-list').each(function() {
        var get_id = $(this).attr('id');
        if(integrationName){
            if(get_id == integrationName){
                $('#'+integrationName).addClass('active');
            }else{
                $('#'+get_id).removeClass('active');
            }
        }

    });

});
");