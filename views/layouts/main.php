<?php

use GeoIp2\Database\Reader as GeoIpReader;
use yii\helpers\Url;
use app\assets\ResourcesAsset;

ResourcesAsset::register($this);

/* @var $this luya\web\View */
/* @var $content string */

$this->beginPage();

try{
    $geo_reader = new GeoIpReader(\Yii::$app->basePath . '/resources/geoip2/GeoLite2-Country.mmdb');
    $user_ip = Yii::$app->request->getUserIP();
    if ($user_ip == "127.0.0.1" || $user_ip == "::1") {
        /*for local testing*/
        //$user_ip = "171.49.190.43";//IN IP // singapore IP 121.6.180.69  US 72.229.28.185
        $user_ip = "121.6.180.69";// singapore IP 121.6.180.69  US 72.229.28.185
        //$user_ip = "72.229.28.185";// US 72.229.28.185
    }
    $geo_result = $geo_reader->country($user_ip);
} catch (\Exception $e) {
    $geo_result = null;
}
if (!empty($_SERVER["HTTP_CF_IPCOUNTRY"])) {
    $country_isoCode = $_SERVER["HTTP_CF_IPCOUNTRY"];
} else if(!empty($geo_result)){
    $country_isoCode = $geo_result->country->isoCode;
} else {
    $country_isoCode = '';
}

if (!isset(Yii::$app->params["countries"][strtolower($country_isoCode)])) {
    /*Country Not Supported So Setting as Global*/
    $country_isoCode = '';
    $country_name = "Global";
} else {
    $country_name = Yii::$app->params["countries"][strtolower($country_isoCode)]["name"];
}

$country_isoCode_lowercase = strtolower($country_isoCode);
/*For Currency JS Variable*/
$countryShortCode = strtolower(Yii::$app->composition->language);
if (!isset(Yii::$app->params["countries"][strtolower($countryShortCode)])) {
    $countryShortCode = '';
}
$currency_name = Yii::$app->params["countries"][strtolower($countryShortCode)]["currency_name"];
$currency_code = Yii::$app->params["countries"][strtolower($countryShortCode)]["currency_code"];
$currency_symbol = Yii::$app->params["countries"][strtolower($countryShortCode)]["currency_symbol"];

$currenturl = Yii::$app->request->url;

?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->composition->language;?>">
    <head>

        <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon.png" type="image/x-icon" />
        <meta charset="UTF-8" />
        <meta property="og:image" content="<?php echo Yii::$app->request->baseUrl; ?>/ezCoSec_logo.png" />
        <meta name="robots" content="index, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title><?=$this->title;?></title>
        <style type="text/css">
            img.sitelogo{
                margin-left:-5% !important;
            }
            .integration_imageDiv {
                transform: translate(17%, 0);
                text-align: center;
            }
        </style>
        <?php $this->head()?>
        <script>
            var AppConfigs = function () {

                this.country_name = "<?= Yii::$app->params["countries"][strtolower($countryShortCode)]["name"] ?>";
                this.currency_name = "<?= $currency_name ?>";
                this.currency_code = "<?= $currency_code ?>";
                this.currency_symbol = "<?= $currency_symbol ?>";

                this.getBaseUrl = function () {
                    return "<?= \Yii::$app->urlManager->createAbsoluteUrl("/") ?>";
                };

            };
        </script>
        <script type="application/ld+json">
            {
               "@context": "http://schema.org",
               "@type": "LocalBusiness",
               "name": "ezCoSec",
               "address": {
                   "@type": "PostalAddress",
                   "streetAddress": "55 Lavender Street",
                   "addressLocality": "Singapore",
                   "addressRegion": "Singapore",
                   "postalCode": "338713"
               },
               "image": "https://www.ezCoSec.app/images/ezCoSec_logo.png",
               "email": "sales@ezCoSec.app",
               "telePhone": " +65 8284 8659 ",
               "url": "https://www.ezCoSec.app/",
               "openingHours": "Mo,Tu,We,Th,Fr,Sa 09:00-07:00",
               "openingHoursSpecification": [ {
                   "@type": "OpeningHoursSpecification",
                   "dayOfWeek": [
                       "Monday",
                       "Tuesday",
                       "Wednesday",
                       "Thursday",
                       "Friday",
                       "Saturday"
                   ],
                   "opens": "09:00",
                   "closes": "07:00"
               } ]
            }
        </script>
        <!-- Facebook Pixel Code -->
        <script defer>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window,document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '277817640182246');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1"
                 src="https://www.facebook.com/tr?id=277817640182246&ev=PageView
        &noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->
    </head>
    <body>
        <?= isset(\yii::$app->params["GOOGLE_TAG_MANAGER_CODE"])?\yii::$app->params["GOOGLE_TAG_MANAGER_CODE"]:""?>


        <?php $this->beginBody()?>
            <!--<div id="nicescrollbar"></div>-->
            <div class="nav-container bg-light m-b-3">
            <?php
            $contentdiv_style = "margin-top:15px;";
            $inventoryimg = "Inventory.png";
            $hrmimg = "HRM.png";
            $posimg = "pos.png";
            $crmimg = "OmniChannelCRM.png";
            $retailimg = "Retail-Suite.png";
            $ecommerceimg = "e-Commercebeta.png";
            if((strstr($currenturl ,'/inventory') !== false) || (strstr($currenturl ,'/hrm') !== false) || (strstr($currenturl ,'/pos') !== false) || (strstr($currenturl ,'/crm') !== false) || (strstr($currenturl ,'/asalta-retail-suite') !== false) || (strstr($currenturl ,'/ecommerce') !== false)){
                $contentdiv_style = "margin-top:15px;";
            ?>
            <header class="banner navbar navbar-default navbar-static-top main-header mainHeader">
                <nav class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?= Url::base(true); ?>">
                            <img class="sitelogo" alt="ezCoSec is a powerful software that centralizes business operations" src="<?php echo Yii::$app->request->baseUrl; ?>/images/ezCoSec_logo.png" style="    margin-left: -2%;">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <!-- mega-menu START -->
                            <!--<li class="nav-item dropdown mega-dropdown megamenuProducts">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Solutions <span class="caret"></span></a>

                                <div class="dropdown-menu mega-menu">
                                    <div class="row">

                                        <div class="col-md-4 col-xl-4 sub-menu">
                                            <ul class="list-unstyled">
                                                <li class="submenu-li">
                                                    <a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl("/omni-channel-for-multi-channel-ecommerce") */?>">
                                                    <img class="imgloadedmultiChannelIcon" imageName="multiChannelIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/multiChannelIcon-grey.png" alt="ezCoSec Heart">
                                                    <span><b>ezCoSec eCommerce Solution</b></span>
                                                    <p class="menu-descriptions">A solution designed for eCommerce, Retail and wholesale to manage business from a single dashboard. Sell on multiple marketplace like Lazada, Shopee, Amazon, Shopify, WooCommerce, etc. connect to many apps like Xero, mailchimp etc.
                                                    <br><br>
                                                    Choose to automate your staff matters, payroll, ezCoSec POS, Vendhq, QuickBooks, sell on ezCoSec eCommerce etc.</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-md-4 col-xl-4 sub-menu middle-sub-menu">
                                            <ul class="list-unstyled">
                                                <li class="product-submenu menu-inventory"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/inventory-management-software") */?>">
                                                        <img class="imgloadedinventoryIcon" imageName="inventoryIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/inventoryIcon-grey.png" alt="ezCoSec Heart">
                                                        <div>
                                                            <span>Inventory Management </span>
                                                            <p class="menu-descriptions">Manage Stocks centrally while selling in multiple channels</p>
                                                        </div>
                                                    </a></li>
                                                <li class="product-submenu menu-ecommerce"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/ecommerce") */?>">
                                                        <img class="imgloadedeCommerceIcon" imageName="eCommerceIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/eCommerceIcon-grey.png" alt="ezCoSec Heart">
                                                        <div>
                                                            <span>eCommerce Store </span>
                                                            <p class="menu-descriptions">Start selling your products on your own branded website</p>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li class="product-submenu menu-ecommerce"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl("/b2b-ecommerce-platform") */?>">
                                                    <img class="imgloadedB2BeCommerceIcon" imageName="B2BeCommerceIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/B2BeCommerceIcon-grey.png" alt="ezCoSec Heart">
                                                    <div>
                                                        <span>B2B Commerce Platform</span>
                                                        <p class="menu-descriptions">A private B2B store for your wholesale business</p>
                                                    </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 col-xl-6 sub-menu">
                                            <ul class="list-unstyled">
                                                <li class="product-submenu menu-pos"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/pos") */?>">

                                                        <img class="imgloadedposIcon" imageName="posIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/posIcon-grey.png" alt="ezCoSec Heart">
                                                        <div>
                                                            <span>Point of Sale (POS)</span>
                                                            <p class="menu-descriptions">Start selling in your brick & mortar stores using ezCoSec POS</p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="product-submenu menu-hrm-payroll"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/hrm") */?>">
                                                        <img class="imgloadedstaffIcon" imageName="staffIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/staffIcon-grey.png" alt="ezCoSec Heart">
                                                        <div>
                                                            <span>Staff Management (HRM)</span>
                                                            <p class="menu-descriptions">Manage all aspects of Staffs in business</p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="product-submenu menu-crm"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/crm") */?>"> <img class="imgloadedcrmIcon" imageName="crmIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/crmIcon-grey.png" alt="ezCoSec Heart">
                                                        <div>
                                                            <span>ezCoSec CRM</span>
                                                            <p class="menu-descriptions">Automate & enhance Customer Relationship to increase sales</p>
                                                        </div>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>-->
                            <!-- mega-menu END -->
                            <li><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("solutions") ?>">Solutions </a></li>
                            <li><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/pricing") ?>">Pricing </a></li>
                            <li><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("integration") ?>">Integrations </a></li>

                            <li><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/contact-us") ?>">Contact</a></li>
                            <li class="btn-default btn-styles preview button arrow menu-login">
                            <a target="_blank" rel="noopener" class="fancybox" href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/login") ?>">Login</a></li>

                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Sub Menu for Inventory Start-->
                <?php
                $style_for_submenu= "";
                if((strstr($currenturl ,'/hrm') !== false)){
                    $style_for_submenu= "background-color: #318ed4 !important;
            background: -webkit-gradient(linear,left top,right top,from(#2b8dd6),to(#65a3d6));
            background: linear-gradient(to right,#66a4d7,#2b8dd6);";
            }
            ?>
            <header class="banner1 navbar navbar-default navbar-static-top sub-header">
                <nav class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php
                        if((strstr($currenturl ,"/crm") !== false)) {
                            ?>
                            <a class="navbar-brand" href="<?= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/crm") ?>">
                                <img id="crmimg" class="sublogo" alt="ezCoSec CRM System Logo" src="<?php echo $this->publicHtml.'/images/'.$crmimg ; ?>"  >
                            </a>
                        <?php
                        }
                         if((strstr($currenturl ,'/ecommerce') !== false) ) {
                            ?>
                             <a class="navbar-brand" href="<?= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/ecommerce") ?>">
                                 <img id="ecommerceimg" class="sublogo" alt="ezCoSec eCommerce System Logo" src="<?php echo $this->publicHtml.'/images/'.$ecommerceimg ; ?>"  >
                             </a>
                        <?php
                        }
                        if((strstr($currenturl ,'/inventory') !== false)) {
                            ?>
                            <a class="navbar-brand" href="<?= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/inventory-management-software") ?>">
                                <img id="inventoryimg" class="sublogo" alt="ezCoSec Inventory System Logo" src="<?php echo $this->publicHtml.'/images/'.$inventoryimg ; ?>"  >
                            </a>

                        <?php
                        }
                        if((strstr($currenturl ,'/hrm') !== false)) {
                            ?>
                            <a class="navbar-brand" href="<?= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/hrm") ?>">
                                <img id="hrmimg" class="sublogo" alt="ezCoSec HRM & PayRoll" src="<?php echo $this->publicHtml.'/images/'.$hrmimg ; ?>"  >
                            </a>
                        <?php
                        }
                        if((strstr($currenturl ,'/pos') !== false)) {
                            ?>
                            <a class="navbar-brand" href="<?= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/pos") ?>">
                                <img id="posimg" class="sublogo" alt="ezCoSec POS - Point Of Sale" src="<?php echo $this->publicHtml.'/images/'.$posimg ; ?>"  >
                            </a>
                        <?php
                        }                        ?>
                    </div>
                    
                </nav>
            </header>
                <!-- Sub Menu for Inventory End-->
            <?php
            }else{
                $contentdiv_style = "margin-top:15px;";
                ?>
                <header class="banner navbar navbar-default navbar-static-top main-header">
                    <nav class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?= Url::base(true); ?>">
                                <img class="sitelogo" alt="ezCoSec is a powerful software that centralizes business operations" src="<?= $this->publicHtml; ?>/images/ezCoSec_logo.png" >
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3">
                            <ul class="nav navbar-nav">
                                <!-- mega-menu START -->
                                <!--<li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Solutions <span class="caret"></span></a>

                                    <div class="dropdown-menu mega-menu" style="">
                                        <div class="row">

                                            <div class="col-md-4 col-xl-4 sub-menu">
                                                <ul class="list-unstyled">
                                                    <li class="submenu-li">
                                                        <a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl("/omni-channel-for-multi-channel-ecommerce") */?>">
                                                            <img class="imgloadedmultiChannelIcon" imageName="multiChannelIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/multiChannelIcon-grey.png" alt="ezCoSec Heart">
                                                            <span><b>ezCoSec eCommerce Solution</b></span>
                                                            <p class="menu-descriptions">A solution designed for eCommerce, Retail and wholesale to manage business from a single dashboard. Sell on multiple marketplace like Lazada, Shopee, Amazon, Shopify, WooCommerce, etc. connect to many apps like Xero, mailchimp etc.
                                                            <br><br>
                                                            Choose to automate your staff matters, payroll, ezCoSec POS, Vendhq, QuickBooks, sell on ezCoSec eCommerce etc.</p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-md-4 col-xl-4 sub-menu middle-sub-menu">
                                                <ul class="list-unstyled">
                                                    <li class="product-submenu menu-inventory"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/inventory-management-software") */?>">
                                                            <img class="imgloadedinventoryIcon" imageName="inventoryIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/inventoryIcon-grey.png" alt="ezCoSec Heart">
                                                            <div>
                                                                <span>Inventory Management </span>
                                                                <p class="menu-descriptions">Manage Stocks centrally while selling in multiple channels</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="product-submenu menu-ecommerce"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/ecommerce") */?>">
                                                            <img class="imgloadedeCommerceIcon" imageName="eCommerceIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/eCommerceIcon-grey.png" alt="ezCoSec Heart">
                                                            <div>
                                                                <span>eCommerce Store </span>
                                                                <p class="menu-descriptions">Start selling your products on your own branded website</p>
                                                            </div>
                                                        </a>
                                                    </li>

                                                    <li class="product-submenu menu-ecommerce"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl("/b2b-ecommerce-platform") */?>">
                                                            <img class="imgloadedB2BeCommerceIcon" imageName="B2BeCommerceIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/B2BeCommerceIcon-grey.png" alt="ezCoSec Heart">
                                                            <div>
                                                                <span>B2B Commerce Platform</span>
                                                                <p class="menu-descriptions">A private B2B store for your wholesale business</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 col-xl-6 sub-menu">
                                                <ul class="list-unstyled">
                                                    <li class="product-submenu menu-pos"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/pos") */?>">

                                                            <img class="imgloadedposIcon" imageName="posIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/posIcon-grey.png" alt="ezCoSec Heart">
                                                            <div>
                                                                <span>Point of Sale (POS)</span>
                                                                <p class="menu-descriptions">Start selling in your brick & mortar stores using ezCoSec POS</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="product-submenu menu-hrm-payroll"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/hrm") */?>">
                                                            <img class="imgloadedstaffIcon" imageName="staffIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/staffIcon-grey.png" alt="ezCoSec Heart">
                                                            <div>
                                                                <span>Staff Management (HRM)</span>
                                                                <p class="menu-descriptions">Manage all aspects of Staffs in business</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="product-submenu menu-crm"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/crm") */?>"> <img class="imgloadedcrmIcon" imageName="crmIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/crmIcon-grey.png" alt="ezCoSec Heart">
                                                            <div>
                                                                <span>ezCoSec CRM</span>
                                                                <p class="menu-descriptions">Automate & enhance Customer Relationship to increase sales</p>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                  </li>-->
                                  <!-- mega-menu END -->
                                <li><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("solutions") ?>">Solutions </a></li>
                                <li><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/pricing") ?>">Pricing </a></li>
                                <li><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("integration") ?>">Integrations </a></li>

                                <li class="dropdown ">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">More <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li class="menu-blog"><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/blog") ?>">Blog</a>
                                        </li>
                                        <li class="menu-support"><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/support") ?>">Support</a>
                                        </li>
                                        <li class="menu-testimonials"><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/testimonials") ?>">Testimonials</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/contact-us") ?>">Contact</a></li>
                                <li class="btn-default btn-styles preview button arrow menu-login">
                                    <a class="fancybox" href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/login") ?>">Login</a>
                                </li>
                                
                            </ul>
                        </div>
                    </nav>
                </header>
                <header class="banner1 navbar navbar-default navbar-static-top sub-header subHeader main-subheader">
                    <nav class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-4" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?= Url::base(true); ?>">
                                <img alt="ezCoSec is a powerful software that centralizes business operations" src="<?= $this->publicHtml; ?>/images/ezCoSec_logo.png" style="height: 40px !important;">
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-4">
                            <ul class="nav navbar-nav">
                                <!-- mega-menu START -->
                                <!--<li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Solutions <span class="caret"></span></a>

                                    <div class="dropdown-menu mega-menu" style="">
                                        <div class="row">

                                            <div class="col-md-4 col-xl-4 sub-menu">
                                                <ul class="list-unstyled">
                                                    <li class="submenu-li">
                                                        <a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl("/omni-channel-for-multi-channel-ecommerce") */?>">
                                                            <img class="imgloadedmultiChannelIcon" imageName="multiChannelIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/multiChannelIcon-grey.png" alt="ezCoSec Heart">
                                                            <span><b>ezCoSec eCommerce Solution</b></span>
                                                            <p class="menu-descriptions">A solution designed for eCommerce, Retail and wholesale to manage business from a single dashboard. Sell on multiple marketplace like Lazada, Shopee, Amazon, Shopify, WooCommerce, etc. connect to many apps like Xero, mailchimp etc.
                                                            <br><br>
                                                            Choose to automate your staff matters, payroll, ezCoSec POS, Vendhq, QuickBooks, sell on ezCoSec eCommerce etc.</p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-md-4 col-xl-4 sub-menu middle-sub-menu">
                                                <ul class="list-unstyled">
                                                    <li class="product-submenu menu-inventory"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/inventory-management-software") */?>">
                                                            <img class="imgloadedinventoryIcon" imageName="inventoryIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/inventoryIcon-grey.png" alt="ezCoSec Heart">
                                                            <div>
                                                                <span>Inventory Management </span>
                                                                <p class="menu-descriptions">Manage Stocks centrally while selling in multiple channels</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="product-submenu menu-ecommerce"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/ecommerce") */?>">
                                                            <img class="imgloadedeCommerceIcon" imageName="eCommerceIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/eCommerceIcon-grey.png" alt="ezCoSec Heart">
                                                            <div>
                                                                <span>eCommerce Store </span>
                                                                <p class="menu-descriptions">Start selling your products on your own branded website</p>
                                                            </div>
                                                        </a>
                                                    </li>

                                                    <li class="product-submenu menu-ecommerce"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl("/b2b-ecommerce-platform") */?>">
                                                            <img class="imgloadedB2BeCommerceIcon" imageName="B2BeCommerceIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/B2BeCommerceIcon-grey.png" alt="ezCoSec Heart">
                                                            <div>
                                                                <span>B2B Commerce Platform</span>
                                                                <p class="menu-descriptions">A private B2B store for your wholesale business</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 col-xl-6 sub-menu">
                                                <ul class="list-unstyled">
                                                    <li class="product-submenu menu-pos"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/pos") */?>">

                                                            <img class="imgloadedposIcon" imageName="posIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/posIcon-grey.png" alt="ezCoSec Heart">
                                                            <div>
                                                                <span>Point of Sale (POS)</span>
                                                                <p class="menu-descriptions">Start selling in your brick & mortar stores using ezCoSec POS</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="product-submenu menu-hrm-payroll"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/hrm") */?>">
                                                            <img class="imgloadedstaffIcon" imageName="staffIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/staffIcon-grey.png" alt="ezCoSec Heart">
                                                            <div>
                                                                <span>Staff Management (HRM)</span>
                                                                <p class="menu-descriptions">Manage all aspects of Staffs in business</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="product-submenu menu-crm"><a href="<?/*= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/crm") */?>"> <img class="imgloadedcrmIcon" imageName="crmIcon" src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/crmIcon-grey.png" alt="ezCoSec Heart">
                                                            <div>
                                                                <span>ezCoSec CRM</span>
                                                                <p class="menu-descriptions">Automate & enhance Customer Relationship to increase sales</p>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>-->
                                <!-- mega-menu END -->
                                <li><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("solutions") ?>">Solutions </a></li>
                                <li><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl($country_isoCode_lowercase."/pricing") ?>">Pricing </a></li>
                                <li><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("integration") ?>">Integrations </a></li>

                                <li class="dropdown ">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">More <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li class="menu-blog"><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/blog") ?>">Blog</a>
                                        </li>
                                        <li class="menu-support"><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/support") ?>">Support</a>
                                        </li>
                                        <li class="menu-testimonials"><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/testimonials") ?>">Testimonials</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/contact-us") ?>">Contact</a></li>
                                <li class="btn-default btn-styles preview button arrow menu-login">
                                    <a  target="_blank" rel="noopener" class="fancybox" href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/login") ?>">Login</a>
                                </li>
                                
                            </ul>
                        </div>
                    </nav>
                </header>
            <?php
            }
            ?>
        </div>
        <div class="row contentdiv">
            <div class="col-xs-12">
                <?=$content;?>
               <!--<script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '34d49962-1496-40ec-869a-7c86dc8bf221', f: true }); done = true; } }; })();</script>-->


                <button onclick="topFunction()" id='scrollUp'></button>
            </div>
        </div>
        <footer class="footer" id="footer-evenmore">
            <div class="container">
                <div class="footer-widgets row">
                   <div class="footer-area-1 col-md-3 col-sm-3 col-xs-12">
                        <section class="widgettext-1 widget_text">
                            <div class="widget-inner">
                                <h3 class="widget-title">Soultions</h3>
                                <div class="textwidget">
                                    <p><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/solutions") ?>">Productivity & Efficiency </a><br>
                                        <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/solutions#quotation") ?>">Marketing outreach</a><br>
                                        
                                    </p>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="footer-area-2 col-md-2 col-sm-3 col-xs-12">
                        <section class="widget text-4 widget_text">
                            <div class="widget-inner">
                                <h3 class="widget-title">RESOURCES</h3>
                                <div class="textwidget">
                                    <p><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/blog") ?>">Blog</a><br>
                                        <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/integration") ?>">Integrations</a><br>
                                         <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/faq") ?>">Frequently Asked Questions</a>
                                    </p>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="footer-area-3 col-md-2 col-sm-3 col-xs-12">
                        <section class="widget text-4 widget_text">
                            <div class="widget-inner">
                                <h3 class="widget-title">COMMUNITY</h3>
                                <div class="textwidget">
                                    <p><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/partner") ?>">Become a Partner</a><br>
                                        <a href="https://developer.ezCoSec.app/docs/#authentication" target="_blank" rel="noopener">Developers</a><br>
                                        <a href="https://www.facebook.com/ezCoSec.Technologies" target="_blank" rel="noopener">Facebook</a><br>
                                        <a href="https://twitter.com/ezCoSec.Technolog" target="_blank" rel="noopener">Twitter</a><br>
                                        <a href="https://www.linkedin.com/company/ezCoSec-technologies-pte-ltd" target="_blank" rel="noopener">LinkedIn</a><br>
                                        <!-- <a href="https://plus.google.com/+ezCoSecTechnologies/posts" target="_blank" rel="noopener">Google +</a> -->
                                    </p>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="footer-area-4 col-md-2 col-sm-3 col-xs-12">
                        <section class="widget text-2 widget_text">
                            <div class="widget-inner">
                                <h3 class="widget-title">ABOUT US</h3>
                                <div class="textwidget">
                                    <p>
                                         <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/why-asalta") ?>">Why ezCoSec?</a><br>
                                        <!-- <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/") ?>about">ezCoSec Story</a><br> -->
                                       <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/about") ?>">About</a><br>
                                        <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/careers") ?>">Careers</a><br>
                                        <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/testimonials") ?>">Testimonials</a>
                                    </p>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="footer-area-5 col-md-2 col-sm-3 col-xs-12">
                        <section class="widget text-2 widget_text">
                            <div class="widget-inner">
                                <h3 class="widget-title">GET IN TOUCH</h3>
                                <div class="textwidget">
                                    <p><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/support") ?>">Support</a><br>
                                        <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/contact-us?enquiry=Sales_Enquiry") ?>">Sales</a><br>
                                        <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/contact-us?enquiry=Press_Media") ?>">Press & Media</a><br>
                                    </p>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="footer-area-6 col-md-1 col-sm-2 col-xs-12">
                        <section class="widget text-2 widget_text">
                            <div class="widget-inner">
                                <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/careers") ?>">
                                    <img src="<?= \Yii::$app->urlManager->createAbsoluteUrl("/images/hiring.png") ?>" width="200" alt="ezCoSec Hiring">
                                </a>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="footer-btm-bar">
                <div class="container">
                    <div class="footer-copyright row">
                        <div class="col-xs-12">
                            <p class="footerLink">
                                <span class="footer_credit footerPrivacyLink">
                                    <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/terms-and-conditions") ?>">Terms &amp; Conditions</a>
                                    <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/service-level-agreement") ?>">SLA</a>
                                    <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/privacy-policy") ?>">Privacy Policy</a>
                                    <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/disclaimer") ?>">Disclaimer</a>
                                </span><br>
                                <span class="footer_credit footerCopyright">© Copyright <?php echo date("Y"); ?>  &nbsp;
                                    <a href="<?= Url::base(true); ?>" target="_blank" rel="noopener">ezCoSec Technologies</a>. All rights reserved.
                                </span>
                            </p>
                            <p class="footerMade">Made with &nbsp;&nbsp;<a href="#" target="_blank"><img src="<?= \Yii::$app->urlManager->createAbsoluteUrl("/images/Heart-Icon.png") ?>" alt="ezCoSec Heart" >&nbsp;&nbsp;for you</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php $this->endBody()?>
        <?= isset(\Yii::$app->params["GOOGLE_ANALYTICS_CODE"])?\Yii::$app->params["GOOGLE_ANALYTICS_CODE"]:"" ?>
        <script >
            (function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
                'https://asalta.ladesk.com/scripts/track.js',
                function(e){ LiveAgent.createButton('75131769', e); });
        </script>
    </body>
</html>
<?php $this->endPage()?>
