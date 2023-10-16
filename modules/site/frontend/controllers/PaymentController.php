<?php
namespace app\modules\site\frontend\controllers;

use app\jobs\AMCJob;
use app\models\AmcCompanies;
use app\models\AmcStripeCoupons;
use app\models\Clients;
use app\models\CommonModel;
use app\models\CrmSubscribedPackage;
use app\models\HrmSubscribedPackage;
use app\models\ImsSubscribedAddons;
use app\models\ImsSubscribedPackage;
use app\models\PosQueue;
use app\modules\site\frontend\models\CrmPackageModel;
use app\modules\site\frontend\models\HrmPackageModel;
use app\modules\site\frontend\models\InventoryPackageModel;
use app\modules\site\frontend\models\PlanModel;
use app\modules\site\frontend\models\RetailPackageModel;
use app\modules\site\frontend\models\ImsAddons;
use app\modules\site\frontend\models\Country;
use app\modules\site\frontend\models\EcommercePackageModel;
use GeoIp2\Database\Reader as GeoIpReader;
use luya\web\Controller;
use Qutee\Task;
use Stripe\Stripe;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Response;

class PaymentController extends Controller{

    const MonthlyPlanID = 3;
    const YearlyPlanID = 1;

    public function actionPayment()
    {
        $countryShortCode = strtolower(Yii::$app->composition->language);
        $countryShortCode = ($countryShortCode == "en" ? "" : $countryShortCode);
        $country = Yii::$app->params["countries"][$countryShortCode]["name"];
        $currencyName = Yii::$app->params["countries"][$countryShortCode]["currency_name"];
        $currencyCode = Yii::$app->params["countries"][$countryShortCode]["currency_code"];
        $currencySymbol = Yii::$app->params["countries"][$countryShortCode]["currency_symbol"];

        $id = (Yii::$app->request->post('id') ? Yii::$app->request->post('id') : Yii::$app->request->get('id'));
        $product = (Yii::$app->request->post('product') ? Yii::$app->request->post('product') : Yii::$app->request->get('product'));

        $model = new Clients();
        $StripeCustomerId = NULL;
        $PackageModel = [];
        if($product == 'Retail'){
            $currencyName = Yii::$app->params["countries"][""]["currency_name"];
            $currencyCode = Yii::$app->params["countries"][""]["currency_code"];
            $currencySymbol = Yii::$app->params["countries"][""]["currency_symbol"];
            $PackageModel = RetailPackageModel::find()->where(["retail_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
        } else if($product == 'Inventory'){
            $PackageModel = InventoryPackageModel::find()->where(["inventory_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='IMS'")->one();
        } else if($product == 'POS'){
            $PackageModel = InventoryPackageModel::find()->where(["inventory_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='POS'")->one();
        } else if($product == 'CRM'){
            $PackageModel = CrmPackageModel::find()->where(["crm_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
        } else if($product == 'HRM'){
            $PackageModel = HrmPackageModel::find()->where(["hrm_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
        } else if($product == 'ecommerce'){
            $PackageModel = EcommercePackageModel::find()->where(["ecommerce_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
        }

        if(empty($PackageModel)) {
            return $this->redirect(Yii::$app->homeUrl);
        }
        $PlanModel = PlanModel::findOne($PackageModel->planid);
        if($PlanModel->period_time == 12 && in_array($country, \Yii::$app->params["discountApplicableCountries"])){
            if($product == 'Retail'){
                $StripeCoupons = AmcStripeCoupons::find()
                ->where(["status"=> "1", 'retail' => 1])
                ->andWhere("(`retail_product_ids` IS NULL OR FIND_IN_SET('".$PackageModel->retail_packageid."', `retail_product_ids`))")
                ->all();
            } else if($product == 'Inventory'){
                $StripeCoupons = AmcStripeCoupons::find()->where(["status"=> "1", 'inv' => 1])
                ->andWhere("(`inv_product_ids` IS NULL OR FIND_IN_SET('".$PackageModel->inventory_packageid."', `inv_product_ids`))")
                ->all();
            }  else if($product == 'POS'){
                $StripeCoupons = AmcStripeCoupons::find()->where(["status"=> "1", 'pos' => 1])
                ->andWhere("(`pos_product_ids` IS NULL OR FIND_IN_SET('".$PackageModel->inventory_packageid."', `pos_product_ids`))")
                ->all();
            } else if($product == 'CRM'){
                $StripeCoupons = AmcStripeCoupons::find()->where(["status"=> "1", 'crm' => 1])
                ->andWhere("(`crm_product_ids` IS NULL OR FIND_IN_SET('".$PackageModel->crm_packageid."', `crm_product_ids`))")
                ->all();
            } else if($product == 'HRM'){
                $StripeCoupons = AmcStripeCoupons::find()->where(["status"=> "1", 'hrm' => 1])
                ->andWhere("(`hrm_product_ids` IS NULL OR FIND_IN_SET('".$PackageModel->hrm_packageid."', `hrm_product_ids`))")
                ->all();
            } else if($product == 'ecommerce'){
                $StripeCoupons = AmcStripeCoupons::find()->where(["status"=> "1", 'ecommerce' => 1])
                ->andWhere("(`ecommerce_product_ids` IS NULL OR FIND_IN_SET('".$PackageModel->ecommerce_packageid."', `ecommerce_product_ids`))")
                ->all();
            }
        }

        return $this->render('payment', [
            "PlanModel" => $PlanModel,
            "PackageModel" => $PackageModel,
            "TotalCost" => ($PlanModel->period_time * $PackageModel->priced_monthly),
            "StripeCoupons" => (isset($StripeCoupons) ? $StripeCoupons : []),
            "model" => $model,
            "product" => $product,
            "country"=>$country,
            "countryShortCode"=>$countryShortCode,
            "currencyName"=>$currencyName,
            "currencyCode"=>$currencyCode,
            "currencySymbol"=>$currencySymbol,
        ]);
    }

    public function actionProcessing()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $country = Yii::$app->request->post("country");
        $id = (Yii::$app->request->post('id') ? Yii::$app->request->post('id') : Yii::$app->request->get('id'));
        $product = (Yii::$app->request->post('product') ? Yii::$app->request->post('product') : Yii::$app->request->get('product'));

        $model = new Clients();
        $StripeCustomerId = NULL;
        $PackageModel = [];
        if($product == 'Retail'){
            $PackageModel = RetailPackageModel::find()->where(["retail_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
        } else if($product == 'Inventory'){
            $PackageModel = InventoryPackageModel::find()->where(["inventory_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='IMS'")->one();
        } else if($product == 'POS'){
            $PackageModel = InventoryPackageModel::find()->where(["inventory_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='POS'")->one();
        } else if($product == 'CRM'){
            $PackageModel = CrmPackageModel::find()->where(["crm_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
        } else if($product == 'HRM'){
            $PackageModel = HrmPackageModel::find()->where(["hrm_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
        } else if($product == 'ecommerce'){
            $PackageModel = EcommercePackageModel::find()->where(["ecommerce_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
        }

        if(empty($PackageModel)) {
            return [
                'success' => false,
                'message' => 'No Package Selected!'
            ];
        }

        $PlanModel = PlanModel::findOne($PackageModel->planid);
        $AmcStripeCouponsPackageColumn = 'retail_product_ids';
        if($PlanModel->period_time == 12 && in_array($country, \Yii::$app->params["discountApplicableCountries"])){
            if($product == 'Retail'){
                $AmcStripeCouponsPackageColumn = 'retail_product_ids';
            } else if($product == 'Inventory'){
                $AmcStripeCouponsPackageColumn = 'inv_product_ids';
            }  else if($product == 'POS'){
                $AmcStripeCouponsPackageColumn = 'pos_product_ids';
            } else if($product == 'CRM'){
                $AmcStripeCouponsPackageColumn = 'crm_product_ids';
            } else if($product == 'HRM'){
                $AmcStripeCouponsPackageColumn = 'hrm_product_ids';
            } else if($product == 'ecommerce'){
                $AmcStripeCouponsPackageColumn = 'ecommerce_product_ids';
            }
        }

        try{
            if($PlanModel && $PackageModel){
                Stripe::setApiKey(Yii::$app->params["stripe_secret_key"]);
                $model->load(Yii::$app->request->post());
                if($model->validate()){
                    if(Yii::$app->session->get('StripeCustomerId')){
                        $StripeCustomer = \Stripe\Customer::retrieve(Yii::$app->session->get('StripeCustomerId'));
                        $StripeCustomer->email = $model->email;
                        $StripeCustomer->description = $model->cname;
                        $StripeCustomer->save();
                    } else {
                        $StripeCustomer = \Stripe\Customer::create([
                            "email" => $model->email,
                            "description" => $model->cname,
                        ]);
                        Yii::$app->session->set('StripeCustomerId', $StripeCustomer->id);
                    }
                    if(Yii::$app->session->get('StripeSubscriptionId')){
                        try{
                            $FailedSubscriptionId = Yii::$app->session->get('StripeSubscriptionId');
                            $FailedSubscription = \Stripe\Subscription::retrieve($FailedSubscriptionId);
                            if($FailedSubscription){
                                $FailedSubscription->cancel();
                            }
                        } catch (\Exception $e){
                            //Do Nothing
                        }
                    }
                    if($StripeCustomer)
                    {
                        $StripeCustomerId = $StripeCustomer->id;
                        $paymentMethodId = Yii::$app->request->post("paymentMethodId");
                        if(!isset($StripeCustomer->invoice_settings->default_payment_method) ||  $StripeCustomer->invoice_settings->default_payment_method != $paymentMethodId){
                            $StripePaymentMethod = \Stripe\PaymentMethod::retrieve($paymentMethodId);
                            $StripePaymentMethod->attach(['customer' => $StripeCustomerId]);
                            \Stripe\Customer::update($StripeCustomerId, [
                                'invoice_settings' => [
                                    'default_payment_method' => $paymentMethodId
                                ]
                            ]);
                        }
                        $stripeNewSubscription = [
                            'customer' => $StripeCustomerId,
                            'items' => [[
                                'price' => $PackageModel->stripe_plan_id,
                            ]],
                            'payment_behavior' => 'default_incomplete',
                            'expand' => ['latest_invoice.payment_intent'],
                        ];
                        if($product == 'HRM') {
                            $stripeNewSubscription['items'][0]['quantity'] = (isset($_POST['numof_employees']) ? $_POST['numof_employees'] : 1);
                        }
                        $discount_id = Yii::$app->request->post("discount_id");
                        $AmcStripeCoupons = null;
                        if($discount_id > 0 && $discount_id != "enter_promo_code"){
                            $AmcStripeCoupons = AmcStripeCoupons::findOne($discount_id);
                        }
                        if(Yii::$app->params["EnableStripeDiscounts"]){
                            if($AmcStripeCoupons) {
                                $stripeNewSubscription["coupon"] = $AmcStripeCoupons->stripe_coupon_id;
                            } else if(Yii::$app->request->post("promo_code")) {
                                $AmcStripeCoupons = AmcStripeCoupons::find()
                                    ->where(['title' => Yii::$app->request->post("promo_code"), 'status' => '2'])
                                    ->andWhere("(FIND_IN_SET('".$id."', `".$AmcStripeCouponsPackageColumn."`))")
                                    ->one();
                                if($AmcStripeCoupons){
                                    $stripeNewSubscription["coupon"] = $AmcStripeCoupons->stripe_coupon_id;
                                } else {
                                    $stripeNewSubscription["coupon"] = Yii::$app->request->post("promo_code");
                                }
                            }
                        }
                        $StripeSubscription = \Stripe\Subscription::create($stripeNewSubscription);
                        Yii::$app->session->set('StripeSubscriptionId', $StripeSubscription->id);
                        return [
                            'success' => true,
                            'payment_intent' => (!empty($StripeSubscription->latest_invoice->payment_intent)?$StripeSubscription->latest_invoice->payment_intent->toArray() : null),
                            'payment_intent_client_secret' => (!empty($StripeSubscription->latest_invoice->payment_intent)?$StripeSubscription->latest_invoice->payment_intent->client_secret : null),
                            'subscription_id' => $StripeSubscription->id
                        ];
                    } else {
                        return [
                            'success' => false,
                            'message' => 'Stripe Could not add you as customer! No Payment detected Kindly try again'
                        ];
                    }
                } else {
                    //Send Form Validation Error Message
                    return [
                        'success' => false,
                        'message' => 'Validation Errors!',
                        'messages' => array_values($model->getErrors())
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'No Package Selected!'
                ];
            }
        } catch (\Exception $e){
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function actionCompletingprocess()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $currencySymbol = Yii::$app->request->post("currencySymbol");
        $country = Yii::$app->request->post("country");
        $currencyCode = Yii::$app->request->post("currencyCode");

        $id = (Yii::$app->request->post('id') ? Yii::$app->request->post('id') : Yii::$app->request->get('id'));
        $product = (Yii::$app->request->post('product') ? Yii::$app->request->post('product') : Yii::$app->request->get('product'));
        $subscriptionId = Yii::$app->request->post("subscriptionId");
        $paymentIntent = Yii::$app->request->post("paymentIntent");
        if(!empty($paymentIntent)){
            $paymentIntent = json_decode($paymentIntent, true);
        }

        if (!empty($_SERVER["HTTP_CF_IPCOUNTRY"])) {
            $country_iso_code = $_SERVER["HTTP_CF_IPCOUNTRY"];
        } else {
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
            if(!empty($geo_result)){
                $country_iso_code = $geo_result->country->isoCode;
            } else {
                $country_iso_code = 'SG';
            }
        }
        $timezone = \DateTimeZone::listIdentifiers(\DateTimeZone::PER_COUNTRY, $country_iso_code)[0];

        $packageType = [];
        $PackageModel = [];
        if($product == 'Retail'){
            $currencyCode = Yii::$app->params["countries"][""]["currency_code"];
            $currencySymbol = Yii::$app->params["countries"][""]["currency_symbol"];
            $packageType = ["retailPackage"];
            $PackageModel = RetailPackageModel::find()->where(["retail_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
        } else if($product == 'Inventory'){
            $packageType = ["inventoryPackage"];
            $PackageModel = InventoryPackageModel::find()->where(["inventory_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='IMS'")->one();
        } else if($product == 'POS'){
            $packageType = ["posPackage"];
            $PackageModel = InventoryPackageModel::find()->where(["inventory_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='POS'")->one();
        } else if($product == 'CRM'){
            $packageType = ["crmPackage"];
            $PackageModel = CrmPackageModel::find()->where(["crm_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
        } else if($product == 'HRM'){
            $packageType = ["hrmPackage"];
            $PackageModel = HrmPackageModel::find()->where(["hrm_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
        } else if($product == 'ecommerce'){
            $packageType = ["ecommercePackage"];
            $PackageModel = EcommercePackageModel::find()->where(["ecommerce_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
        }

        $PlanModel = PlanModel::findOne($PackageModel->planid);

        try{
            if($PlanModel && $PackageModel && $subscriptionId){
                Stripe::setApiKey(Yii::$app->params["stripe_secret_key"]);
                $model = new Clients();
                $model->load(Yii::$app->request->post());
                if($model->validate())
                {
                    $StripeSubscription = \Stripe\Subscription::retrieve($subscriptionId);

                    $StripeCustomerId = $StripeSubscription->customer;
                    $StripeCustomer = \Stripe\Customer::retrieve($StripeCustomerId);
                    if(!empty($paymentIntent)) {
                        $StripeCustomer->update($StripeCustomerId, [
                            'invoice_settings' => [
                                'default_payment_method' => $paymentIntent['payment_method']
                            ]
                        ]);
                        $StripeSubscription->update($subscriptionId, ['default_payment_method' => $paymentIntent['payment_method']]);
                    }

                    $StripeInvoice = \Stripe\Invoice::retrieve($StripeSubscription->latest_invoice);
                    $StripeInvoiceId = $StripeSubscription->latest_invoice;

                    $AMCCompanyModel = new AmcCompanies();
                    $AMCCompanyModel->name = $model->companyname;
                    $AMCCompanyModel->contactperson_name = $model->first_name." ".$model->last_name;
                    $AMCCompanyModel->email_address = $model->cemail;
                    $AMCCompanyModel->phone_number = $model->mobile;
                    $AMCCompanyModel->user_limit = $model->emp_size;
                    $AMCCompanyModel->employeelimit = (isset($_POST['numof_employees']) ? $_POST['numof_employees'] : 1);
                    $AMCCompanyModel->roc = $model->uen;
                    $AMCCompanyModel->country = $model->country;
                    $AMCCompanyModel->timezone = $timezone;
                    $cookies = Yii::$app->request->cookies;
                    if ($cookies->has('partner_code')){
                        $partner_code = $cookies->getValue('partner_code');
                        $AMCCompanyModel->partner_code = $partner_code;
                    }
                    $AMCCompanyModel->save();

                    $hrm_subscribed_package_id = null;
                    $crm_subscribed_package_id = null;
                    $ims_subscribed_package_id = null;
                    $this->addInvoiceToAsaltaAccount($StripeInvoice, $AMCCompanyModel, strtolower(($product == 'Inventory') ? 'ims' :$product));
                    $isRetail = '0';
                    if($product == 'Retail') {
                        $isRetail = '1';
                        $hrm_subscribed_package_id = $this->hrmSubscribedPackage($PackageModel, $PlanModel, $AMCCompanyModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $country, $isRetail);
                        $crm_subscribed_package_id = $this->crmSubscribedPackage($PackageModel, $PlanModel, $AMCCompanyModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $country, $isRetail);
                        $ims_subscribed_package_id = $this->retailImsPosEcommerceSubscribedPackage($PackageModel, $PlanModel, $AMCCompanyModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $country, $isRetail);
                    }else if($product == 'Inventory' || $product == 'POS'){
                        $ims_subscribed_package_id = $this->imsPosSubscribedPackage($PackageModel, $PlanModel, $AMCCompanyModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $country, $isRetail);
                    } else if($product == 'CRM'){
                        $crm_subscribed_package_id = $this->crmSubscribedPackage($PackageModel, $PlanModel, $AMCCompanyModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $country, $isRetail);
                    } else if($product == 'HRM'){
                        $hrm_subscribed_package_id = $this->hrmSubscribedPackage($PackageModel, $PlanModel, $AMCCompanyModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $country, $isRetail);
                    }else if($product == 'ecommerce'){
                        $ims_subscribed_package_id = $this->ecommerceSubscribedPackage($PackageModel, $PlanModel, $AMCCompanyModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $country);
                    }

                    /* It is New Signup Trigger AMC Job */
                    $company_details =  [
                        "name" => $AMCCompanyModel->contactperson_name,
                        "email" => $AMCCompanyModel->email_address,
                        "company_name" => $AMCCompanyModel->name,
                        "industry_type" => "",
                        "address" => $AMCCompanyModel->address,
                        "password" => Yii::$app->security->generateRandomString(8),
                        "is_random_password" => false,//send false from website
                        "country" => $AMCCompanyModel->country,
                        "phone" => $AMCCompanyModel->phone_number,
                        "timezone" => $AMCCompanyModel->timezone,
                        "amc_companyid" => $AMCCompanyModel->companyid,
                    ];

                    $amcVar = [
                        "company_details"=> $company_details,
                        "selected_package_type"=> $packageType, //"inventoryPackage", "hrmPackage" for HRM, "crmPackage" for CRM
                        "selected_package" => $PackageModel->name,
                        "hrm_subscribed_package_id" => $hrm_subscribed_package_id,
                        "crm_subscribed_package_id" => $crm_subscribed_package_id,
                        "ims_subscribed_package_id" => $ims_subscribed_package_id,
                        "is_trial" => false,
                        "subscribed_system" => [],
                        'numof_employees' => (isset($PackageModel->numof_user) ? $PackageModel->numof_user : $AMCCompanyModel->employeelimit),
                    ];
                    if($product == 'Retail'){
                        $amcVar["retail_package_id"] = $PackageModel->retail_packageid;
                    } else if($product == 'Inventory'){
                        $amcVar["ims_package_id"] = $PackageModel->inventory_packageid;
                    }  else if($product == 'POS'){
                        $amcVar["pos_package_id"] = $PackageModel->inventory_packageid;
                    } else if($product == 'CRM'){
                        $amcVar["crm_package_id"] = $PackageModel->crm_packageid;
                    } else if($product == 'HRM'){
                        $amcVar["hrm_package_id"] = $PackageModel->hrm_packageid;
                    } else if($product == 'ecommerce'){
                        $amcVar["ecommerce_package_id"] = $PackageModel->ecommerce_packageid;
                    }

                    $AMCJobObj = new AMCJob($amcVar);

                    $data = [
                        "channel" => "default",
                        "job" => serialize($AMCJobObj),
                        "pushed_at" => time(),
                        "ttr" => 1000,
                        "delay" => 10,
                        "priority" => 1024
                    ];

                    Yii::$app->hrmdb->createCommand()->insert('hrm_queue', $data)->execute();

                    Yii::$app->session->set("tq_name", $AMCCompanyModel->contactperson_name);
                    Yii::$app->session->set("tq_email", $AMCCompanyModel->email_address);
                    if($currencyCode == 'VND') {
                        Yii::$app->session->set("tq_amount", ($StripeInvoice["amount_paid"]));
                    } else {
                        Yii::$app->session->set("tq_amount", ($StripeInvoice["amount_paid"] / 100));
                    }
                    Yii::$app->session->set("tq_currency_symbol", $currencySymbol);
                    Yii::$app->session->set("tq_product", $product);
                    Yii::$app->session->set("tq_timezone", $AMCCompanyModel->timezone);

                    Yii::$app->session->remove('StripeCustomerId');
                    Yii::$app->session->remove('StripeSubscriptionId');

                    return ['success' => true, 'redirect_to' => Yii::$app->urlManager->createAbsoluteUrl('thankyou')];
                } else {
                    return [
                        'success' => false,
                        'message' => 'Validation Errors!',
                        'messages' => array_values($model->getErrors())
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'Something went wrong!, Subscription ID and Payment Intent is not available',
                ];
            }
        } catch (\Exception $e){
            return ['success' => false, 'message' => $e->getMessage()];
        }

    }

    public function actionThankyou(){

        $this->layout = "@app/views/layouts/signup";

        return $this->renderPartial('thankyou', [
            'name' => Yii::$app->session->get("tq_name", "xxxx"),
            'email' => Yii::$app->session->get("tq_email", "xxxx@xxxxxx.com"),
            'amount' => Yii::$app->session->get("tq_amount", 0),
            'currency_symbol' => Yii::$app->session->get("tq_currency_symbol", "$ "),
            'product' => Yii::$app->session->get("tq_product", "Retail"),
            'timezone' => Yii::$app->session->get("tq_timezone", "Asia/Singapore"),
        ]);
    }

    public function actionCalculateprice()
    {
        if(!Yii::$app->request->post("package_id")){
            return $this->redirect(Yii::$app->request->baseUrl);
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        Stripe::setApiKey(Yii::$app->params["stripe_secret_key"]);
        $package_id = Yii::$app->request->post("package_id");
        $discount_id = Yii::$app->request->post("discount");
        $product = Yii::$app->request->post("product");
        $numofEmployees = Yii::$app->request->post("numof_employees");
        $discountPercent = 0;
        $discountAmount = 0;
        $invalidCoupon = false;
        $AmcStripeCoupons = null;
        $AmcStripeCouponsPackageColumn = "retail_product_ids";
        if($product == 'Retail'){
            $PackageModel = RetailPackageModel::findOne($package_id);
            $AmcStripeCouponsPackageColumn = "retail_product_ids";
        } else if($product == 'Inventory' || $product == 'POS'){
            $PackageModel = InventoryPackageModel::findOne($package_id);
            $AmcStripeCouponsPackageColumn = ($product == 'POS' ? "pos_product_ids":"inv_product_ids");
        } else if($product == 'CRM'){
            $PackageModel = CrmPackageModel::findOne($package_id);
            $AmcStripeCouponsPackageColumn = "crm_product_ids";
        } else if($product == 'HRM'){
            $PackageModel = HrmPackageModel::findOne($package_id);
            $AmcStripeCouponsPackageColumn = "hrm_product_ids";
        } else if($product == 'ecommerce'){
            $PackageModel = EcommercePackageModel::findOne($package_id);
            $AmcStripeCouponsPackageColumn = "ecommerce_product_ids";
        }

        if(empty($PackageModel)){
            return [
                "invalidCoupon" => true
            ];
        }

        $PlanModel = PlanModel::findOne($PackageModel->planid);

        if($discount_id > 0 && $discount_id != "enter_promo_code"){
            $AmcStripeCoupons = AmcStripeCoupons::findOne($discount_id);
            $promo_code = $AmcStripeCoupons->stripe_coupon_id;
        } else {
            $AmcStripeCoupons = AmcStripeCoupons::find()
                ->where(['title' => Yii::$app->request->post("promo_code"), 'status' => '2'])
                ->andWhere("(FIND_IN_SET('".$package_id."', `".$AmcStripeCouponsPackageColumn."`))")
                ->one();
            if($AmcStripeCoupons){
                $promo_code = $AmcStripeCoupons->stripe_coupon_id;
            } else {
                $promo_code = Yii::$app->request->post("promo_code", "");
            }
        }
        try{
            if(!empty($promo_code)){
                $stripeCoupon = \Stripe\Coupon::retrieve($promo_code);
                if($stripeCoupon->valid == true){
                    if($stripeCoupon->percent_off > 0){
                        $discountPercent = $stripeCoupon->percent_off;
                    } else if($stripeCoupon->amount_off > 0){
                        $discountAmount = $stripeCoupon->amount_off / 100;
                    }
                }
            }
        } catch (\Exception $e){
            $invalidCoupon = true;
        }
        

        $price = ($PlanModel->period_time * $PackageModel->priced_monthly);
        if($discountPercent > 0){
            $totalPrice = $price - ($price * $discountPercent / 100);
        } else {
            $totalPrice = $price - $discountAmount;
        }
        return [
            "totalPrice" => ($totalPrice * $numofEmployees),
            "invalidCoupon" => $invalidCoupon
        ];
    }

    /**
     * @param $StripeInvoice
     * @param $AMCCompanyModel
     * @param $product
     */
    private function addInvoiceToAsaltaAccount($StripeInvoice, $AMCCompanyModel, $product)
    {
        if($AMCCompanyModel){
            $task = new Task();
            $StripeInvoiceArr = json_decode(json_encode($StripeInvoice), true);
            $AMCCompanyModelArr = ArrayHelper::toArray($AMCCompanyModel);
            $tempData= $task->setData(array('amc_companyid'=> $AMCCompanyModel->companyid, 'StripeInvoice' => $StripeInvoiceArr,  'AMCCompanyModel' => $AMCCompanyModelArr, 'date_time'=> date("Y-m-d H:i:s", $StripeInvoiceArr["created"]), 'product' => $product))
                ->setName('Jobs/AMCInvoiceJob')
                ->setPriority(2)
                ->setMethodName('addInvoiceInAsaltaAccount');
            $PosQueue = new PosQueue();
            $PosQueue->name = 'Jobs/AMCInvoiceJob';
            $PosQueue->method_name = 'addInvoiceInAsaltaAccount';
            $PosQueue->data = serialize($tempData);
            $PosQueue->priority = 2;
            $PosQueue->unique_id = null;
            $PosQueue->created_at = date("Y-m-d H:i:s");
            $PosQueue->is_taken = 0;
            $PosQueue->save();
            sleep(2);
            $imsWorkerUrl = Yii::$app->params['POS_BASE_URL']."imsWorker/run";
            $handle = curl_init();
            curl_setopt($handle, CURLOPT_URL, $imsWorkerUrl);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_exec($handle);
            curl_close($handle);
        }
    }

    private function hrmSubscribedPackage($PackageModel, PlanModel $PlanModel, AmcCompanies $AMCCompanyModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $SubscribedCountry, $isRetail)
    {
        $NewHrmSubscribedPackage = new HrmSubscribedPackage();
        $NewHrmSubscribedPackage->package_name = $PackageModel->name;
        $NewHrmSubscribedPackage->plan_name = $PlanModel->name;
        $NewHrmSubscribedPackage->free_period = $PlanModel->free_period;
        $NewHrmSubscribedPackage->period_time = $PlanModel->period_time;
        $NewHrmSubscribedPackage->priced_monthly = $PackageModel->priced_monthly;
        $NewHrmSubscribedPackage->discount = $PackageModel->discount;

        $NewHrmSubscribedPackage->numof_employees = $AMCCompanyModel->employeelimit;
        $NewHrmSubscribedPackage->basic_hris = $PackageModel->basic_hris;
        $NewHrmSubscribedPackage->emp_self_service = $PackageModel->emp_self_service;
        $NewHrmSubscribedPackage->leave_management = $PackageModel->leave_management;
        $NewHrmSubscribedPackage->mobile_application = $PackageModel->mobile_application;
        $NewHrmSubscribedPackage->timesheet = $PackageModel->timesheet;
        $NewHrmSubscribedPackage->claims_management = $PackageModel->claims_management;
        $NewHrmSubscribedPackage->third_party_integrations = $PackageModel->third_party_integrations;
        $NewHrmSubscribedPackage->shift_roster = $PackageModel->shift_roster;
        $NewHrmSubscribedPackage->progression = $PackageModel->progression;
        $NewHrmSubscribedPackage->report_integration = $PackageModel->report_integration;
        $NewHrmSubscribedPackage->time_in_out = $PackageModel->time_in_out;
        $NewHrmSubscribedPackage->commission_management = $PackageModel->commission_management;
        $NewHrmSubscribedPackage->gps_location_tracking = $PackageModel->gps_location_tracking;
        $NewHrmSubscribedPackage->feedback_form = $PackageModel->feedback_form;
        $NewHrmSubscribedPackage->performance_review = $PackageModel->performance_review;
        $NewHrmSubscribedPackage->multi_organization = $PackageModel->multi_organization;
        $NewHrmSubscribedPackage->recruitment = $PackageModel->recruitment;
        $NewHrmSubscribedPackage->corparate_training = $PackageModel->corparate_training;
        $NewHrmSubscribedPackage->face_id = $PackageModel->face_id;
        if($AMCCompanyModel->country == "Singapore"){
            $NewHrmSubscribedPackage->payroll_processing = $PackageModel->payroll_processing;
        }else{
            $NewHrmSubscribedPackage->payroll_processing = "0";
        }

        $current_period_start = $StripeSubscription->current_period_start;
        $NewHrmSubscribedPackage->start_date = date("Y-m-d H:i:s", $current_period_start);

        $end_date = $StripeSubscription->current_period_end;
        $NewHrmSubscribedPackage->end_date = date("Y-m-d H:i:s", $end_date);
        $NewHrmSubscribedPackage->stripe_subscription_id = $StripeSubscription->id;
        $NewHrmSubscribedPackage->stripe_invoice_id = $StripeInvoiceId;
        $NewHrmSubscribedPackage->stripe_customer_id = $StripeCustomerId;
        $NewHrmSubscribedPackage->stripe_plan_id = $PackageModel->stripe_plan_id;

        $NewHrmSubscribedPackage->companyid = $AMCCompanyModel->companyid;
        $NewHrmSubscribedPackage->created_at = date("Y-m-d H:i:s");
        $NewHrmSubscribedPackage->updated_at = date("Y-m-d H:i:s");
        $NewHrmSubscribedPackage->country = $SubscribedCountry;
        $NewHrmSubscribedPackage->is_retail = $isRetail;
        $NewHrmSubscribedPackage->save(false);

        return $NewHrmSubscribedPackage->id;
    }

    private function crmSubscribedPackage($PackageModel, PlanModel $PlanModel, AmcCompanies $AMCCompanyModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $SubscribedCountry, $isRetail)
    {
        $NewCrmSubscribedPackage = new CrmSubscribedPackage();
        $NewCrmSubscribedPackage->package_name = $PackageModel->name;
        $NewCrmSubscribedPackage->plan_name = $PlanModel->name;
        $NewCrmSubscribedPackage->free_period = $PlanModel->free_period;
        $NewCrmSubscribedPackage->period_time = $PlanModel->period_time;
        $NewCrmSubscribedPackage->priced_monthly = $PackageModel->priced_monthly;
        $NewCrmSubscribedPackage->discount = $PackageModel->discount;

        $NewCrmSubscribedPackage->numof_user = $PackageModel->numof_user;
        $NewCrmSubscribedPackage->numof_contact = $PackageModel->numof_contact;
        $NewCrmSubscribedPackage->deal_management = $PackageModel->deal_management;
        $NewCrmSubscribedPackage->numof_dnamic_pipeline = $PackageModel->numof_dnamic_pipeline;
        $NewCrmSubscribedPackage->numof_smart_webform = $PackageModel->numof_smart_webform;
        $NewCrmSubscribedPackage->calendar = $PackageModel->calendar;
        $NewCrmSubscribedPackage->task_management = $PackageModel->task_management;
        $NewCrmSubscribedPackage->reminders = $PackageModel->reminders;
        $NewCrmSubscribedPackage->smart_notifications = $PackageModel->smart_notifications;
        $NewCrmSubscribedPackage->numof_quotes = $PackageModel->numof_quotes;
        $NewCrmSubscribedPackage->numof_invoices = $PackageModel->numof_invoices;
        $NewCrmSubscribedPackage->online_invoice_payment = $PackageModel->online_invoice_payment;
        $NewCrmSubscribedPackage->receivables_outstanding = $PackageModel->receivables_outstanding;
        $NewCrmSubscribedPackage->marketing = $PackageModel->marketing;
        $NewCrmSubscribedPackage->document_signing = $PackageModel->document_signing;
        $NewCrmSubscribedPackage->numberof_items = $PackageModel->numberof_items;
        $NewCrmSubscribedPackage->project = $PackageModel->project;
        $NewCrmSubscribedPackage->customer_login_view_project = $PackageModel->customer_login_view_project;
        $NewCrmSubscribedPackage->gantt = $PackageModel->gantt;
        $NewCrmSubscribedPackage->event_management = $PackageModel->event_management;
        $NewCrmSubscribedPackage->numof_integration = $PackageModel->numof_integration;
        $NewCrmSubscribedPackage->knowledge_base = $PackageModel->knowledge_base;
        $NewCrmSubscribedPackage->case_management = $PackageModel->case_management;

        $current_period_start = $StripeSubscription->current_period_start;
        $NewCrmSubscribedPackage->start_date = date("Y-m-d H:i:s", $current_period_start);

        $end_date = $StripeSubscription->current_period_end;
        $NewCrmSubscribedPackage->end_date = date("Y-m-d H:i:s", $end_date);
        $NewCrmSubscribedPackage->stripe_subscription_id = $StripeSubscription->id;
        $NewCrmSubscribedPackage->stripe_invoice_id = $StripeInvoiceId;
        $NewCrmSubscribedPackage->stripe_customer_id = $StripeCustomerId;
        $NewCrmSubscribedPackage->stripe_plan_id = $PackageModel->stripe_plan_id;

        $NewCrmSubscribedPackage->companyid = NULL;
        $NewCrmSubscribedPackage->created_at = date("Y-m-d H:i:s");
        $NewCrmSubscribedPackage->updated_at = date("Y-m-d H:i:s");
        $NewCrmSubscribedPackage->country = $SubscribedCountry;
        $NewCrmSubscribedPackage->is_retail = $isRetail;
        $NewCrmSubscribedPackage->save(false);

        return $NewCrmSubscribedPackage->id;

    }

    private function retailImsPosEcommerceSubscribedPackage(RetailPackageModel $PackageModel, PlanModel $PlanModel, $AMCCompanyModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $SubscribedCountry, $isRetail)
    {
        $NewIMSPOSSubscribedPackage = new ImsSubscribedPackage();
        $NewIMSPOSSubscribedPackage->package_name = $PackageModel->name;
        $NewIMSPOSSubscribedPackage->plan_name = $PlanModel->name;
        $NewIMSPOSSubscribedPackage->trial_days = $PlanModel->trial_days;
        $NewIMSPOSSubscribedPackage->free_period = $PlanModel->free_period;
        $NewIMSPOSSubscribedPackage->period_time = $PlanModel->period_time;
        $NewIMSPOSSubscribedPackage->priced_monthly = $PackageModel->priced_monthly;
        $NewIMSPOSSubscribedPackage->discount = $PackageModel->discount;

        $NewIMSPOSSubscribedPackage->numof_user = $PackageModel->numof_user;
        $NewIMSPOSSubscribedPackage->numof_outlet = $PackageModel->numof_outlet;
        $NewIMSPOSSubscribedPackage->numof_offline_order = $PackageModel->numof_offline_order;
        $NewIMSPOSSubscribedPackage->numof_online_order = $PackageModel->numof_online_order;
        $NewIMSPOSSubscribedPackage->numof_integration = $PackageModel->numof_integration;
        $NewIMSPOSSubscribedPackage->numof_channels = $PackageModel->numof_channels;
        $NewIMSPOSSubscribedPackage->numberof_items = $PackageModel->numberof_items;

        $current_period_start = $StripeSubscription->current_period_start;
        $NewIMSPOSSubscribedPackage->ims_start_date = date("Y-m-d H:i:s", $current_period_start);

        $end_date = $StripeSubscription->current_period_end;
        $NewIMSPOSSubscribedPackage->ims_end_date = date("Y-m-d H:i:s", $end_date);
        $NewIMSPOSSubscribedPackage->ims_stripe_subscription_id = $StripeSubscription->id;
        $NewIMSPOSSubscribedPackage->ims_stripe_invoice_id = $StripeInvoiceId;
        $NewIMSPOSSubscribedPackage->ims_stripe_customer_id = $StripeCustomerId;
        $NewIMSPOSSubscribedPackage->ims_stripe_plan_id = $PackageModel->stripe_plan_id;
        $NewIMSPOSSubscribedPackage->ims_stripe_product_id = $PackageModel->stripe_product_id;

        if($PackageModel->pos == 1){
            $NewIMSPOSSubscribedPackage->pos_package_name = $PackageModel->name;
            $NewIMSPOSSubscribedPackage->pos_plan_name =  $PlanModel->name;
            $NewIMSPOSSubscribedPackage->pos_free_period =  $PlanModel->free_period;
            $NewIMSPOSSubscribedPackage->pos_period_time =  $PlanModel->period_time;
            $NewIMSPOSSubscribedPackage->pos_priced_monthly =  $PackageModel->priced_monthly;
            $NewIMSPOSSubscribedPackage->pos_discount =  $PackageModel->discount;
            $NewIMSPOSSubscribedPackage->pos_start_date = date("Y-m-d H:i:s", $current_period_start);
            $NewIMSPOSSubscribedPackage->pos_end_date = date("Y-m-d H:i:s", $end_date);
            $NewIMSPOSSubscribedPackage->pos_stripe_subscription_id = $StripeSubscription->id;
            $NewIMSPOSSubscribedPackage->pos_stripe_invoice_id = $StripeInvoiceId;
            $NewIMSPOSSubscribedPackage->pos_stripe_customer_id = $StripeCustomerId;
            $NewIMSPOSSubscribedPackage->pos_stripe_plan_id = $PackageModel->stripe_plan_id;
            $NewIMSPOSSubscribedPackage->pos_stripe_product_id = $PackageModel->stripe_product_id;
            $NewIMSPOSSubscribedPackage->numof_pos_receipts = $PackageModel->numof_offline_order;
        }

        if($PackageModel->ecommerce == 1){
            $NewIMSPOSSubscribedPackage->ecommerce_package_name = $PackageModel->name;
            $NewIMSPOSSubscribedPackage->ecommerce_plan_name =  $PlanModel->name;
            $NewIMSPOSSubscribedPackage->ecommerce_free_period =  $PlanModel->free_period;
            $NewIMSPOSSubscribedPackage->ecommerce_period_time =  $PlanModel->period_time;
            $NewIMSPOSSubscribedPackage->ecommerce_priced_monthly =  $PackageModel->priced_monthly;
            $NewIMSPOSSubscribedPackage->ecommerce_discount =  $PackageModel->discount;
            $NewIMSPOSSubscribedPackage->ecommerce_start_date = date("Y-m-d H:i:s", $current_period_start);
            $NewIMSPOSSubscribedPackage->ecommerce_end_date = date("Y-m-d H:i:s", $end_date);
            $NewIMSPOSSubscribedPackage->ecommerce_stripe_subscription_id = $StripeSubscription->id;
            $NewIMSPOSSubscribedPackage->ecommerce_stripe_invoice_id = $StripeInvoiceId;
            $NewIMSPOSSubscribedPackage->ecommerce_stripe_customer_id = $StripeCustomerId;
            $NewIMSPOSSubscribedPackage->ecommerce_stripe_plan_id = $PackageModel->stripe_plan_id;
            $NewIMSPOSSubscribedPackage->ecommerce_stripe_product_id = $PackageModel->stripe_product_id;
            $NewIMSPOSSubscribedPackage->online_sales_revenue = $PackageModel->online_sales_revenue;
        }

        $NewIMSPOSSubscribedPackage->ims = $PackageModel->ims;
        $NewIMSPOSSubscribedPackage->pos = $PackageModel->pos;
        $NewIMSPOSSubscribedPackage->ecommerce = $PackageModel->ecommerce;

        //If the User is directly Signing Up to a Package Or Trial Package then pass pos_companyid as null
        $NewIMSPOSSubscribedPackage->pos_companyid = 0;

        $NewIMSPOSSubscribedPackage->created_date = date("Y-m-d H:i:s");
        $NewIMSPOSSubscribedPackage->updated_date = date("Y-m-d H:i:s");
        $NewIMSPOSSubscribedPackage->country = $SubscribedCountry;
        $NewIMSPOSSubscribedPackage->is_retail = $isRetail;
        $NewIMSPOSSubscribedPackage->save(false);

        return $NewIMSPOSSubscribedPackage->id;

    }

    private function imsPosSubscribedPackage(InventoryPackageModel $PackageModel, PlanModel $PlanModel, $AMCCompanyModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $SubscribedCountry, $isRetail)
    {
        $NewIMSPOSSubscribedPackage = new ImsSubscribedPackage();

        $NewIMSPOSSubscribedPackage->numof_user = $PackageModel->numof_user;
        $NewIMSPOSSubscribedPackage->numof_outlet = $PackageModel->numof_outlet;
        $NewIMSPOSSubscribedPackage->numof_offline_order = $PackageModel->numof_offline_order;
        $NewIMSPOSSubscribedPackage->numof_online_order = $PackageModel->numof_online_order;
        $NewIMSPOSSubscribedPackage->numof_integration = $PackageModel->numof_integration;
        $NewIMSPOSSubscribedPackage->numof_channels = $PackageModel->numof_channels;
        $NewIMSPOSSubscribedPackage->numberof_items = $PackageModel->numberof_items;


        $current_period_start = $StripeSubscription->current_period_start;
        $end_date = $StripeSubscription->current_period_end;

        if($PackageModel->type == "IMS"){

            $NewIMSPOSSubscribedPackage->package_name = $PackageModel->name;
            $NewIMSPOSSubscribedPackage->plan_name = $PlanModel->name;
            $NewIMSPOSSubscribedPackage->trial_days = $PlanModel->trial_days;
            $NewIMSPOSSubscribedPackage->free_period = $PlanModel->free_period;
            $NewIMSPOSSubscribedPackage->period_time = $PlanModel->period_time;
            $NewIMSPOSSubscribedPackage->priced_monthly = $PackageModel->priced_monthly;
            $NewIMSPOSSubscribedPackage->discount = $PackageModel->discount;
            $NewIMSPOSSubscribedPackage->ims_start_date = date("Y-m-d H:i:s", $current_period_start);
            $NewIMSPOSSubscribedPackage->ims_end_date = date("Y-m-d H:i:s", $end_date);
            $NewIMSPOSSubscribedPackage->ims_stripe_subscription_id = $StripeSubscription->id;
            $NewIMSPOSSubscribedPackage->ims_stripe_invoice_id = $StripeInvoiceId;
            $NewIMSPOSSubscribedPackage->ims_stripe_customer_id = $StripeCustomerId;
            $NewIMSPOSSubscribedPackage->ims_stripe_plan_id = $PackageModel->stripe_plan_id;
            $NewIMSPOSSubscribedPackage->ims_stripe_product_id = $PackageModel->stripe_product_id;
            $NewIMSPOSSubscribedPackage->ims = 1;

        }

        if($PackageModel->type == "POS"){

            $NewIMSPOSSubscribedPackage->pos_package_name = $PackageModel->name;
            $NewIMSPOSSubscribedPackage->pos_plan_name =  $PlanModel->name;
            $NewIMSPOSSubscribedPackage->pos_free_period =  $PlanModel->free_period;
            $NewIMSPOSSubscribedPackage->pos_period_time =  $PlanModel->period_time;
            $NewIMSPOSSubscribedPackage->pos_priced_monthly =  $PackageModel->priced_monthly;
            $NewIMSPOSSubscribedPackage->pos_discount =  $PackageModel->discount;
            $NewIMSPOSSubscribedPackage->pos_start_date = date("Y-m-d H:i:s", $current_period_start);
            $NewIMSPOSSubscribedPackage->pos_end_date = date("Y-m-d H:i:s", $end_date);
            $NewIMSPOSSubscribedPackage->pos_stripe_subscription_id = $StripeSubscription->id;
            $NewIMSPOSSubscribedPackage->pos_stripe_invoice_id = $StripeInvoiceId;
            $NewIMSPOSSubscribedPackage->pos_stripe_customer_id = $StripeCustomerId;
            $NewIMSPOSSubscribedPackage->pos_stripe_plan_id = $PackageModel->stripe_plan_id;
            $NewIMSPOSSubscribedPackage->pos_stripe_product_id = $PackageModel->stripe_product_id;
            $NewIMSPOSSubscribedPackage->numof_pos_receipts = $PackageModel->numof_pos_receipts;
            $NewIMSPOSSubscribedPackage->pos = 1;

        }

        $NewIMSPOSSubscribedPackage->ecommerce = 0;

        //If the User is directly Signing Up to a Package Or Trial Package then pass pos_companyid as null
        $NewIMSPOSSubscribedPackage->pos_companyid = 0;

        $NewIMSPOSSubscribedPackage->created_date = date("Y-m-d H:i:s");
        $NewIMSPOSSubscribedPackage->updated_date = date("Y-m-d H:i:s");
        $NewIMSPOSSubscribedPackage->country = $SubscribedCountry;
        $NewIMSPOSSubscribedPackage->is_retail = $isRetail;
        $NewIMSPOSSubscribedPackage->save(false);

        return $NewIMSPOSSubscribedPackage->id;

    }

    private function ecommerceSubscribedPackage($PackageModel, PlanModel $PlanModel, AmcCompanies $AMCCompanyModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $SubscribedCountry)
    {

        $NewIMSPOSSubscribedPackage = new ImsSubscribedPackage();
        $NewIMSPOSSubscribedPackage->ecommerce_package_name = $PackageModel->name;
        $NewIMSPOSSubscribedPackage->ecommerce_plan_name = $PlanModel->name;
        $NewIMSPOSSubscribedPackage->ecommerce_free_period = $PlanModel->free_period;
        $NewIMSPOSSubscribedPackage->ecommerce_period_time = $PlanModel->period_time;
        $NewIMSPOSSubscribedPackage->ecommerce_priced_monthly = $PackageModel->priced_monthly;
        $NewIMSPOSSubscribedPackage->ecommerce_discount = $PackageModel->discount;
        $numof_user = $PackageModel->numof_user;
        $numof_outlet = $PackageModel->numof_outlet;
        $numof_integration = $PackageModel->numof_integration;
        $online_sales_revenue = $PackageModel->online_sales_revenue;
        $numof_online_order = $PackageModel->numof_online_order;
        $numberof_items = $PackageModel->numberof_items;

        //New Subscription
        $NewIMSPOSSubscribedPackage->numof_offline_order = $numof_online_order;
        $NewIMSPOSSubscribedPackage->numof_online_order = $numof_online_order;
        $NewIMSPOSSubscribedPackage->numof_channels = 0;
        $NewIMSPOSSubscribedPackage->numof_pos_receipts = 0;

        $NewIMSPOSSubscribedPackage->numof_user = $numof_user;
        $NewIMSPOSSubscribedPackage->numof_outlet = $numof_outlet;
        $NewIMSPOSSubscribedPackage->numof_integration = $numof_integration;
        $NewIMSPOSSubscribedPackage->numberof_items = $numberof_items;
        $NewIMSPOSSubscribedPackage->online_sales_revenue = $online_sales_revenue;

        $current_period_start = $StripeSubscription->current_period_start;
        $NewIMSPOSSubscribedPackage->ecommerce_start_date = date("Y-m-d H:i:s", $current_period_start);

        $end_date = $StripeSubscription->current_period_end;
        $NewIMSPOSSubscribedPackage->ecommerce_end_date = date("Y-m-d H:i:s", $end_date);
        $NewIMSPOSSubscribedPackage->ecommerce_stripe_subscription_id = $StripeSubscription->id;
        $NewIMSPOSSubscribedPackage->ecommerce_stripe_invoice_id = $StripeInvoiceId;
        $NewIMSPOSSubscribedPackage->ecommerce_stripe_customer_id = $StripeCustomerId;
        $NewIMSPOSSubscribedPackage->ecommerce_stripe_plan_id = $PackageModel->stripe_plan_id;
        $NewIMSPOSSubscribedPackage->ecommerce_stripe_product_id = $PackageModel->stripe_product_id;

        $NewIMSPOSSubscribedPackage->ecommerce = 1;
        $NewIMSPOSSubscribedPackage->ims = 0;
        $NewIMSPOSSubscribedPackage->pos = 0;

        //If the User is directly Signing Up to a Package Or Trial Package then pass pos_companyid as null
        $NewIMSPOSSubscribedPackage->pos_companyid = 0;

        $NewIMSPOSSubscribedPackage->created_date = date("Y-m-d H:i:s");
        $NewIMSPOSSubscribedPackage->updated_date = date("Y-m-d H:i:s");
        $NewIMSPOSSubscribedPackage->country = $SubscribedCountry;
        $NewIMSPOSSubscribedPackage->is_retail = '0';
        $NewIMSPOSSubscribedPackage->save(false);
        return $NewIMSPOSSubscribedPackage->id;

    }

//    public function actionCreatecompany()
//    {
//        $packageType = ["crmPackage"];
//        $product = "CRM";
//        $id = 15;
//        $country = "Singapore";
//        $isRetail = '0';
//        $company_id = 80;
//        $stripeSubId = "sub_GXoNIqsXsr3yIS";
//        $hrm_subscribed_package_id = null;
//        $crm_subscribed_package_id = null;
//        $ims_subscribed_package_id = null;
//
//        $PackageModel = CrmPackageModel::find()->where(["crm_packageid"=>$id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
//
//        $PlanModel = PlanModel::findOne($PackageModel->planid);
//        $AMCCompanyModel = AmcCompanies::findOne($company_id);//Mr.
//        Stripe::setApiKey(Yii::$app->params["stripe_secret_key"]);
//        $StripeSubscription = \Stripe\Subscription::retrieve($stripeSubId);
//        $StripeCustomerId = $StripeSubscription->customer;
//        $StripeInvoice = \Stripe\Invoice::retrieve($StripeSubscription->latest_invoice);
//        $StripeInvoiceId = $StripeSubscription->latest_invoice;
//        //var_dump($StripeSubscription, $StripeCustomerId);exit;
//        $crm_subscribed_package_id = $this->crmSubscribedPackage($PackageModel, $PlanModel, $AMCCompanyModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $country, $isRetail);
//        var_dump($crm_subscribed_package_id);
//
//
//        /* It is New Signup Trigger AMC Job */
//        $company_details =  [
//            "name" => $AMCCompanyModel->contactperson_name,
//            "email" => $AMCCompanyModel->email_address,
//            "company_name" => $AMCCompanyModel->name,
//            "industry_type" => "",
//            "address" => $AMCCompanyModel->address,
//            "password" => Yii::$app->security->generateRandomString(8),
//            "is_random_password" => false,//send false from website
//            "country" => $AMCCompanyModel->country,
//            "phone" => $AMCCompanyModel->phone_number,
//            "timezone" => $AMCCompanyModel->timezone,
//            "amc_companyid" => $AMCCompanyModel->companyid,
//        ];
//
//        $amcVar = [
//            "company_details"=> $company_details,
//            "selected_package_type"=> $packageType, //"inventoryPackage", "hrmPackage" for HRM, "crmPackage" for CRM
//            "selected_package" => $PackageModel->name,
//            "hrm_subscribed_package_id" => $hrm_subscribed_package_id,
//            "crm_subscribed_package_id" => $crm_subscribed_package_id,
//            "ims_subscribed_package_id" => $ims_subscribed_package_id,
//            "is_trial" => false,
//            "subscribed_system" => [],
//            'numof_employees' => (isset($PackageModel->numof_user) ? $PackageModel->numof_user : $AMCCompanyModel->employeelimit),
//        ];
//        if($product == 'Retail'){
//            $amcVar["retail_package_id"] = $PackageModel->retail_packageid;
//        } else if($product == 'Inventory'){
//            $amcVar["ims_package_id"] = $PackageModel->inventory_packageid;
//        }  else if($product == 'POS'){
//            $amcVar["pos_package_id"] = $PackageModel->inventory_packageid;
//        } else if($product == 'CRM'){
//            $amcVar["crm_package_id"] = $PackageModel->crm_packageid;
//        } else if($product == 'HRM'){
//            $amcVar["hrm_package_id"] = $PackageModel->hrm_packageid;
//        } else if($product == 'ecommerce'){
//            $amcVar["ecommerce_package_id"] = $PackageModel->ecommerce_packageid;
//        }
//
//        $AMCJobObj = new AMCJob($amcVar);
//
//        $data = [
//            "channel" => "default",
//            "job" => serialize($AMCJobObj),
//            "pushed_at" => time(),
//            "ttr" => 1000,
//            "delay" => 10,
//            "priority" => 1024
//        ];
//
//        Yii::$app->hrmdb->createCommand()->insert('hrm_queue', $data)->execute();
//    }

    public function actionMultichannelpayment()
    {
        $countryShortCode = strtolower(Yii::$app->composition->language);
        $countryShortCode = ($countryShortCode == "en" ? "" : $countryShortCode);
        $country = Yii::$app->params["countries"][$countryShortCode]["name"];
        $currencyName = Yii::$app->params["countries"][$countryShortCode]["currency_name"];
        $currencyCode = Yii::$app->params["countries"][$countryShortCode]["currency_code"];
        $currencySymbol = Yii::$app->params["countries"][$countryShortCode]["currency_symbol"];

        $plan_id = (Yii::$app->request->post('plan_id') ? Yii::$app->request->post('plan_id') : Yii::$app->request->get('plan_id'));
        $items = (Yii::$app->request->post('items') ? Yii::$app->request->post('items') : Yii::$app->request->get('items'));
        $selecteditems = json_decode($items, true);

        $AddonsModel = ImsAddons::find()->where(["planid"=>$plan_id, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->all();
        $model = new Clients();
        $StripeCustomerId = NULL;
        $PackageModel = [];
        $numof_employees = 1;
        if($selecteditems) {
            foreach($selecteditems as $itemkey => $item) {
                if($item['product'] == 'Inventory'){
                    $PackageModel["inventoryPackage"] = InventoryPackageModel::find()->where(["inventory_packageid"=>$item['id'], "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='IMS'")->asArray()->one();
                } else if($item['product'] == 'POS'){
                    $PackageModel["posPackage"] = InventoryPackageModel::find()->where(["inventory_packageid"=>$item['id'], "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='POS'")->asArray()->one();
                } else if($item['product'] == 'CRM'){
                    $PackageModel["crmPackage"] = CrmPackageModel::find()->where(["crm_packageid"=>$item['id'], "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->asArray()->one();
                } else if($item['product'] == 'HRM'){
                    $PackageModel["hrmPackage"] = HrmPackageModel::find()->where(["hrm_packageid"=>$item['id'], "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->asArray()->one();
                    $numof_employees = (isset($item['numof_employees']) ? $item['numof_employees'] : 1);
                } else if($item['product'] == 'ecommerce'){
                    $PackageModel["ecommercePackage"] = EcommercePackageModel::find()->where(["ecommerce_packageid"=>$item['id'], "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->asArray()->one();
                }
            }
        }

        if(empty($PackageModel)) {
            return $this->redirect(Yii::$app->homeUrl);
        }
        $PlanModel = PlanModel::findOne($plan_id);
        //$AmcStripeCouponsPackageColumn = 'retail_product_ids';
        /*if($PlanModel->period_time == 12 && in_array($country, \Yii::$app->params["discountApplicableCountries"])){
            foreach($product_ids as $product => $item) {
                if($product == 'Inventory'){
                    $StripeCoupons = AmcStripeCoupons::find()->where(["status"=> "1", 'inv' => 1])
                        ->andWhere("(`inv_product_ids` IS NULL OR FIND_IN_SET('".$PackageModel["inventoryPackage"]->inventory_packageid."', `inv_product_ids`))")
                        ->all();
                    $AmcStripeCouponsPackageColumn = 'inv_product_ids';
                }
                if($product == 'POS'){
                    $StripeCoupons = AmcStripeCoupons::find()->where(["status"=> "1", 'pos' => 1])
                        ->andWhere("(`pos_product_ids` IS NULL OR FIND_IN_SET('".$PackageModel["posPackage"]->inventory_packageid."', `pos_product_ids`))")
                        ->all();
                    $AmcStripeCouponsPackageColumn = 'pos_product_ids';
                }
                if($product == 'CRM'){
                    $StripeCoupons = AmcStripeCoupons::find()->where(["status"=> "1", 'crm' => 1])
                        ->andWhere("(`crm_product_ids` IS NULL OR FIND_IN_SET('".$PackageModel["crmPackage"]->crm_packageid."', `crm_product_ids`))")
                        ->all();
                    $AmcStripeCouponsPackageColumn = 'crm_product_ids';
                }
                if($product == 'HRM'){
                    $StripeCoupons = AmcStripeCoupons::find()->where(["status"=> "1", 'hrm' => 1])
                        ->andWhere("(`hrm_product_ids` IS NULL OR FIND_IN_SET('".$PackageModel["hrmPackage"]->hrm_packageid."', `hrm_product_ids`))")
                        ->all();
                    $AmcStripeCouponsPackageColumn = 'hrm_product_ids';
                }
                if($product == 'ecommerce'){
                    $StripeCoupons = AmcStripeCoupons::find()->where(["status"=> "1", 'ecommerce' => 1])
                        ->andWhere("(`ecommerce_product_ids` IS NULL OR FIND_IN_SET('".$PackageModel["ecommercePackage"]->ecommerce_packageid."', `ecommerce_product_ids`))")
                        ->all();
                    $AmcStripeCouponsPackageColumn = 'ecommerce_product_ids';
                }
            }
        }*/

        return $this->render('multichannelpayment', [
            "AddonsModel" => $AddonsModel,
            "PlanModel" => $PlanModel,
            "PackageModel" => $PackageModel,
            "numof_employees" => $numof_employees,
            "StripeCoupons" => (isset($StripeCoupons) ? $StripeCoupons : []),
            "model" => $model,
            "items" => $items,
            "country"=>$country,
            "currencyName" => $currencyName,
            "currencySymbol"=>$currencySymbol,
            "currencyCode"=>$currencyCode,
            "countryShortCode"=>$countryShortCode,
        ]);
    }

    public function actionMultiitemscalculateprice()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        Stripe::setApiKey(Yii::$app->params["stripe_secret_key"]);
        $plan_id = Yii::$app->request->post("plan_id");
        $product_ids = Yii::$app->request->post("product_ids", []);
        $addons = Yii::$app->request->post("addons", []);

        $discount_id = Yii::$app->request->post("discount");
        $discountPercent = 0;
        $discountAmount = 0;
        $invalidCoupon = false;
        $AmcStripeCoupons = null;

        $price = 0;
        $PlanModel = PlanModel::findOne($plan_id);
        if(empty($PlanModel)){
            return [
                "invalidCoupon" => true
            ];
        }

        foreach($product_ids as $itemkey => $item) {
            if($itemkey == 'Inventory'){
                $PackageModel["inventoryPackage"] = InventoryPackageModel::find()->where(["inventory_packageid"=>$item, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='IMS'")->one();
                if($PackageModel["inventoryPackage"]){
                    $price += $PackageModel["inventoryPackage"]->priced_monthly * $PlanModel->period_time;
                }
            } else if($itemkey == 'POS'){
                $PackageModel["posPackage"] = InventoryPackageModel::find()->where(["inventory_packageid"=>$item, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='POS'")->one();
                if($PackageModel["posPackage"]){
                    $price += $PackageModel["posPackage"]->priced_monthly * $PlanModel->period_time;
                }
            } else if($itemkey == 'CRM'){
                $PackageModel["crmPackage"] = CrmPackageModel::find()->where(["crm_packageid"=>$item, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
                if($PackageModel["crmPackage"]){
                    $price += $PackageModel["crmPackage"]->priced_monthly * $PlanModel->period_time;
                }
            } else if($itemkey == 'HRM'){
                $numof_employees = Yii::$app->request->post('numof_employees', 1);
                $PackageModel["hrmPackage"] = HrmPackageModel::find()->where(["hrm_packageid"=>$item, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
                if($PackageModel["hrmPackage"]){
                    $price += $PackageModel["hrmPackage"]->priced_monthly * $numof_employees * $PlanModel->period_time;
                }
            } else if($itemkey == 'ecommerce'){
                $PackageModel["ecommercePackage"] = EcommercePackageModel::find()->where(["ecommerce_packageid"=>$item, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
                if($PackageModel["ecommercePackage"]){
                    $price += $PackageModel["ecommercePackage"]->priced_monthly * $PlanModel->period_time;
                }
            }
        }

        foreach($addons as $addon) {
            $AddonsModel = ImsAddons::find()->where(["ims_addonid"=>$addon['addons_id'], "status"=> '1', "deletestatus" => "No"])->one();
            if($AddonsModel){
                $price += $AddonsModel->priced_monthly * $addon['addons_qty'] * $PlanModel->period_time;
            }
        }

        if(empty($PackageModel)){
            return [
                "invalidCoupon" => true
            ];
        }

        if($discount_id > 0 && $discount_id != "enter_promo_code"){
            $AmcStripeCoupons = AmcStripeCoupons::findOne($discount_id);
            $promo_code = $AmcStripeCoupons->stripe_coupon_id;
        } else {
            $AmcStripeCoupons = AmcStripeCoupons::find()
                ->where(['title' => Yii::$app->request->post("promo_code"), 'status' => '2'])
                ->one();
            if($AmcStripeCoupons){
                $promo_code = $AmcStripeCoupons->stripe_coupon_id;
            } else {
                $promo_code = Yii::$app->request->post("promo_code", "");
            }
        }
        try{
            if(!empty($promo_code)){
                $stripeCoupon = \Stripe\Coupon::retrieve($promo_code);
                if($stripeCoupon->valid == true){
                    if($stripeCoupon->percent_off > 0){
                        $discountPercent = $stripeCoupon->percent_off;
                    } else if($stripeCoupon->amount_off > 0){
                        $discountAmount = $stripeCoupon->amount_off / 100;
                    }
                }
            }
        } catch (\Exception $e){
            $invalidCoupon = true;
        }

        if($discountPercent > 0){
            $totalPrice = $price - ($price * $discountPercent / 100);
        } else {
            $totalPrice = $price - $discountAmount;
        }
        return [
            "totalPrice" => $totalPrice,
            "invalidCoupon" => $invalidCoupon
        ];
    }

    public function actionMultiitemspaymentprocess()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        try{
            $plan_id = Yii::$app->request->post("plan_id");
            $product_ids = Yii::$app->request->post("product_ids", []);
            $addons = Yii::$app->request->post("add_ons", "[]");
            $addons = json_decode($addons, true);
            $PlanModel = PlanModel::findOne($plan_id);
            $selectedStripePlans = [];
            foreach($product_ids as $itemkey => $item) {
                if($itemkey == 'Inventory'){
                    $PackageModel["inventoryPackage"] = InventoryPackageModel::find()->where(["inventory_packageid"=>$item, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='IMS'")->one();
                    if($PackageModel["inventoryPackage"]){
                        $selectedStripePlans[] = ['price' => $PackageModel["inventoryPackage"]->stripe_plan_id];
                    }
                } else if($itemkey == 'POS'){
                    $PackageModel["posPackage"] = InventoryPackageModel::find()->where(["inventory_packageid"=>$item, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='POS'")->one();
                    if($PackageModel["posPackage"]){
                        $selectedStripePlans[] = ['price' => $PackageModel["posPackage"]->stripe_plan_id];
                    }
                } else if($itemkey == 'CRM'){
                    $PackageModel["crmPackage"] = CrmPackageModel::find()->where(["crm_packageid"=>$item, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
                    if($PackageModel["crmPackage"]){
                        $selectedStripePlans[] = ['price' => $PackageModel["crmPackage"]->stripe_plan_id];
                    }
                } else if($itemkey == 'HRM'){
                    $numof_employees = Yii::$app->request->post('numof_employees', 1);
                    $PackageModel["hrmPackage"] = HrmPackageModel::find()->where(["hrm_packageid"=>$item, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
                    if($PackageModel["hrmPackage"]){
                        $selectedStripePlans[] = ['price' => $PackageModel["hrmPackage"]->stripe_plan_id,'quantity' => $numof_employees];
                    }
                } else if($itemkey == 'ecommerce'){
                    $PackageModel["ecommercePackage"] = EcommercePackageModel::find()->where(["ecommerce_packageid"=>$item, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
                    if($PackageModel["ecommercePackage"]){
                        $selectedStripePlans[] = ['price' => $PackageModel["ecommercePackage"]->stripe_plan_id];
                    }
                }
            }

            foreach($addons as $addon) {
                $AddonsModel = ImsAddons::find()->where(["ims_addonid"=>$addon['addons_id'], "status"=> '1', "deletestatus" => "No"])->one();
                if($AddonsModel){
                    $selectedStripePlans[] = ['price' => $AddonsModel->stripe_plan_id,'quantity' => $addon['addons_qty']];
                }
            }

            if($PlanModel && !empty($selectedStripePlans)){
                Stripe::setApiKey(Yii::$app->params["stripe_secret_key"]);
                $model = new Clients();
                $model->load(Yii::$app->request->post());
                if($model->validate()){
                    if(Yii::$app->session->get('StripeCustomerId')){
                        $StripeCustomer = \Stripe\Customer::retrieve(Yii::$app->session->get('StripeCustomerId'));
                        $StripeCustomer->email = $model->email;
                        $StripeCustomer->description = $model->cname;
                        $StripeCustomer->save();
                    } else {
                        $StripeCustomer = \Stripe\Customer::create([
                            "email" => $model->email,
                            "description" => $model->cname,
                        ]);
                        Yii::$app->session->set('StripeCustomerId', $StripeCustomer->id);
                    }
                    if(Yii::$app->session->get('StripeSubscriptionId')){
                        try{
                            $FailedSubscriptionId = Yii::$app->session->get('StripeSubscriptionId');
                            $FailedSubscription = \Stripe\Subscription::retrieve($FailedSubscriptionId);
                            if($FailedSubscription){
                                $FailedSubscription->cancel();
                            }
                        } catch (\Exception $e){
                            //Do Nothing
                        }
                    }

                    if($StripeCustomer)
                    {
                        $StripeCustomerId = $StripeCustomer->id;
                        $paymentMethodId = Yii::$app->request->post("paymentMethodId");
                        if(!isset($StripeCustomer->invoice_settings->default_payment_method) ||  $StripeCustomer->invoice_settings->default_payment_method != $paymentMethodId){
                            $StripePaymentMethod = \Stripe\PaymentMethod::retrieve($paymentMethodId);
                            $StripePaymentMethod->attach(['customer' => $StripeCustomerId]);
                            \Stripe\Customer::update($StripeCustomerId, [
                                'invoice_settings' => [
                                    'default_payment_method' => $paymentMethodId
                                ]
                            ]);
                        }
                        $stripeNewSubscription = [
                            'customer' => $StripeCustomerId,
                            'items' => $selectedStripePlans,
                            'payment_behavior' => 'default_incomplete',
                            'expand' => ['latest_invoice.payment_intent'],
                        ];

                        $discount_id = Yii::$app->request->post("discount_id");
                        $AmcStripeCoupons = null;
                        if($discount_id > 0 && $discount_id != "enter_promo_code"){
                            $AmcStripeCoupons = AmcStripeCoupons::findOne($discount_id);
                        }
                        if(Yii::$app->params["EnableStripeDiscounts"]){
                            if($AmcStripeCoupons) {
                                $stripeNewSubscription["coupon"] = $AmcStripeCoupons->stripe_coupon_id;
                            } else if(Yii::$app->request->post("promo_code")) {
                                $AmcStripeCoupons = AmcStripeCoupons::find()
                                    ->where(['title' => Yii::$app->request->post("promo_code"), 'status' => '2'])
                                    ->one();
                                if($AmcStripeCoupons){
                                    $stripeNewSubscription["coupon"] = $AmcStripeCoupons->stripe_coupon_id;
                                } else {
                                    $stripeNewSubscription["coupon"] = Yii::$app->request->post("promo_code");
                                }
                            }
                        }

                        $StripeSubscription = \Stripe\Subscription::create($stripeNewSubscription);
                        Yii::$app->session->set('StripeSubscriptionId', $StripeSubscription->id);
                        return [
                            'success' => true,
                            'payment_intent' => (!empty($StripeSubscription->latest_invoice->payment_intent)?$StripeSubscription->latest_invoice->payment_intent->toArray() : null),
                            'payment_intent_client_secret' => (!empty($StripeSubscription->latest_invoice->payment_intent)?$StripeSubscription->latest_invoice->payment_intent->client_secret : null),
                            'subscription_id' => $StripeSubscription->id
                        ];
                    } else {
                        return [
                            'success' => false,
                            'message' => 'Stripe Could not add you as customer! No Payment detected Kindly try again'
                        ];
                    }
                } else {
                    //Send Form Validation Error Message
                    return [
                        'success' => false,
                        'message' => 'Validation Errors!',
                        'messages' => array_values($model->getErrors())
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'No Packages Selected!'
                ];
            }
        } catch (\Exception $e){
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function actionMultiitemscompletingpaymentprocess()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        try{
            $countryShortCode = Yii::$app->request->post("countryShortCode");
            $currencySymbol = Yii::$app->request->post("currencySymbol");
            $country = Yii::$app->request->post("country");
            $currencyName = Yii::$app->request->post("currencyName");
            $currencyCode = Yii::$app->request->post("currencyCode");

            $plan_id = Yii::$app->request->post("plan_id");
            $product_ids = Yii::$app->request->post("product_ids", []);
            $numof_employees = Yii::$app->request->post("numof_employees", 1);
            $addons = Yii::$app->request->post("add_ons", "[]");
            $addons = json_decode($addons, true);
            $subscriptionId = Yii::$app->request->post("subscriptionId");
            $paymentIntent = Yii::$app->request->post("paymentIntent");
            if(!empty($paymentIntent)){
                $paymentIntent = json_decode($paymentIntent, true);
            }
            $PlanModel = PlanModel::findOne($plan_id);
            $PackageModel = [];

            if (!empty($_SERVER["HTTP_CF_IPCOUNTRY"])) {
                $country_iso_code = $_SERVER["HTTP_CF_IPCOUNTRY"];
            } else {
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
                if(!empty($geo_result)){
                    $country_iso_code = $geo_result->country->isoCode;
                } else {
                    $country_iso_code = 'SG';
                }
            }
            $timezone = \DateTimeZone::listIdentifiers(\DateTimeZone::PER_COUNTRY, $country_iso_code)[0];

            foreach($product_ids as $itemkey => $item) {
                if($itemkey == 'Inventory'){
                    $PackageModel['inventoryPackage'] = InventoryPackageModel::find()->where(["inventory_packageid"=>$item, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='IMS'")->one();
                } else if($itemkey == 'POS'){
                    $PackageModel['posPackage'] = InventoryPackageModel::find()->where(["inventory_packageid"=>$item, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='POS'")->one();
                } else if($itemkey == 'CRM'){
                    $PackageModel['crmPackage'] = CrmPackageModel::find()->where(["crm_packageid"=>$item, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
                } else if($itemkey == 'HRM'){
                    $numof_employees = Yii::$app->request->post('numof_employees', 1);
                    $PackageModel['hrmPackage'] = HrmPackageModel::find()->where(["hrm_packageid"=>$item, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
                } else if($itemkey == 'ecommerce'){
                    $PackageModel['ecommercePackage'] = EcommercePackageModel::find()->where(["ecommerce_packageid"=>$item, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL")->one();
                }
            }

            foreach($addons as $addon) {
                $AddonsModel = ImsAddons::find()->where(["ims_addonid"=>$addon['addons_id'], "status"=> '1', "deletestatus" => "No"])->one();
                if($AddonsModel){
                    $PackageModel['ImsAddonsModels'][] = ['ImsAddonsModel' => $AddonsModel,'quantity' => $addon['addons_qty']];
                }
            }

            if($PlanModel && !empty($PackageModel) && $subscriptionId) {
                Stripe::setApiKey(Yii::$app->params["stripe_secret_key"]);
                $model = new Clients();
                $model->load(Yii::$app->request->post());
                if($model->validate()){

                    $StripeSubscription = \Stripe\Subscription::retrieve($subscriptionId);

                    $StripeCustomerId = $StripeSubscription->customer;
                    $StripeCustomer = \Stripe\Customer::retrieve($StripeCustomerId);
                    if(!empty($paymentIntent)) {
                        $StripeCustomer->update($StripeCustomerId, [
                            'invoice_settings' => [
                                'default_payment_method' => $paymentIntent['payment_method']
                            ]
                        ]);
                        $StripeSubscription->update($subscriptionId, ['default_payment_method' => $paymentIntent['payment_method']]);
                    }

                    $StripeInvoice = \Stripe\Invoice::retrieve($StripeSubscription->latest_invoice);
                    $StripeInvoiceId = $StripeSubscription->latest_invoice;

                    /*AMC Process Starts*/
                    $AMCCompanyModel = new AmcCompanies();
                    $AMCCompanyModel->name = $model->companyname;
                    $AMCCompanyModel->contactperson_name = $model->first_name." ".$model->last_name;
                    $AMCCompanyModel->email_address = $model->cemail;
                    $AMCCompanyModel->phone_number = $model->mobile;
                    $AMCCompanyModel->user_limit = $model->emp_size;
                    $AMCCompanyModel->employeelimit = $numof_employees;
                    $AMCCompanyModel->roc = $model->uen;
                    $AMCCompanyModel->country = $model->country;
                    $AMCCompanyModel->timezone = $timezone;
                    $cookies = Yii::$app->request->cookies;
                    if ($cookies->has('partner_code')){
                        $partner_code = $cookies->getValue('partner_code');
                        $AMCCompanyModel->partner_code = $partner_code;
                    }
                    $AMCCompanyModel->save();

                    $hrm_subscribed_package_id = null;
                    $crm_subscribed_package_id = null;
                    $ims_subscribed_package_id = null;
                    $ims_addons_subscribed_package_ids = [];
                    $isRetail = '0';
                    $selected_package_type = [];
                    if (!empty($PackageModel['inventoryPackage']) || !empty($PackageModel['posPackage']) || !empty($PackageModel['ecommercePackage'])) {
                        $posPackage = !empty($PackageModel['posPackage']) ? $PackageModel['posPackage'] : null;
                        $ecommercePackage = !empty($PackageModel['ecommercePackage']) ? $PackageModel['ecommercePackage'] : null;
                        $ims_subscribed_package_id = $this->imsPosEcommerceSubscribedPackage($PackageModel['inventoryPackage'], $posPackage, $ecommercePackage, $PlanModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $country, $isRetail);
                        $selected_package_type[] = 'inventoryPackage';
                        if (!empty($PackageModel['posPackage'])) {
                            $selected_package_type[] = 'posPackage';
                        }
                        if (!empty($PackageModel['ecommercePackage'])) {
                            $selected_package_type[] = 'ecommercePackage';
                        }
                    }
                    if (!empty($PackageModel['crmPackage'])) {
                        $crm_subscribed_package_id = $this->crmSubscribedPackage($PackageModel['crmPackage'], $PlanModel, $AMCCompanyModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $country, $isRetail);
                        $selected_package_type[] = 'crmPackage';
                    }
                    if (!empty($PackageModel['hrmPackage'])) {
                        $hrm_subscribed_package_id = $this->hrmSubscribedPackage($PackageModel['hrmPackage'], $PlanModel, $AMCCompanyModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $country, $isRetail);
                        $selected_package_type[] = 'hrmPackage';
                    }
                    if(!empty($PackageModel['ImsAddonsModels'])){
                        $ims_addons_subscribed_package_ids = $this->imsAddonsSubscribedPackage($PackageModel['ImsAddonsModels'], $PlanModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $country);
                    }
                    /* It is New Signup Trigger AMC Job */
                    $company_details =  [
                        "name" => $AMCCompanyModel->contactperson_name,
                        "email" => $AMCCompanyModel->email_address,
                        "company_name" => $AMCCompanyModel->name,
                        "industry_type" => "",
                        "address" => $AMCCompanyModel->address,
                        "password" => Yii::$app->security->generateRandomString(8),
                        "is_random_password" => false,//send false from website
                        "country" => $AMCCompanyModel->country,
                        "phone" => $AMCCompanyModel->phone_number,
                        "timezone" => $AMCCompanyModel->timezone,
                        "amc_companyid" => $AMCCompanyModel->companyid,
                    ];

                    $amcVar = [
                        "company_details"=> $company_details,
                        "selected_package_type"=> $selected_package_type, //"inventoryPackage", "hrmPackage" for HRM, "crmPackage" for CRM
                        "hrm_subscribed_package_id" => $hrm_subscribed_package_id,
                        "crm_subscribed_package_id" => $crm_subscribed_package_id,
                        "ims_subscribed_package_id" => $ims_subscribed_package_id,
                        "ims_addons_subscribed_package_ids" => $ims_addons_subscribed_package_ids,
                        "is_trial" => false,
                        "subscribed_system" => [],
                        'numof_employees' => $AMCCompanyModel->employeelimit,
                    ];

                    $product_name = "ims";
                    $product_names = [];
                    if(!empty($PackageModel['inventoryPackage'])){
                        $amcVar["ims_package_id"] = $PackageModel['inventoryPackage']->inventory_packageid;
                        $product_names[] = "Inventory";
                    }
                    if(!empty($PackageModel['posPackage'])){
                        $amcVar["pos_package_id"] = $PackageModel['posPackage']->inventory_packageid;
                        $product_name = "ims_pos";
                        $product_names[] = "POS";
                    }
                    if(!empty($PackageModel['ecommercePackage'])){
                        $amcVar["ecommerce_package_id"] = $PackageModel['ecommercePackage']->ecommerce_packageid;
                        $product_name = "multi_items";
                        $product_names[] = "eCommerce";
                    }
                    if(!empty($PackageModel['crmPackage'])){
                        $amcVar["crm_package_id"] = $PackageModel['crmPackage']->crm_packageid;
                        $product_name = "multi_items";
                        $product_names[] = "CRM";
                    }
                    if(!empty($PackageModel['hrmPackage'])){
                        $amcVar["hrm_package_id"] = $PackageModel['hrmPackage']->hrm_packageid;
                        $product_name = "multi_items";
                        $product_names[] = "HRM";
                    }

                    $AMCJobObj = new AMCJob($amcVar);

                    $data = [
                        "channel" => "default",
                        "job" => serialize($AMCJobObj),
                        "pushed_at" => time(),
                        "ttr" => 1000,
                        "delay" => 10,
                        "priority" => 1024
                    ];

                    Yii::$app->hrmdb->createCommand()->insert('hrm_queue', $data)->execute();
                    $this->addInvoiceToAsaltaAccount($StripeInvoice, $AMCCompanyModel, $product_name);
                    /*AMC Process Ends*/

                    Yii::$app->session->set("tq_name", $AMCCompanyModel->contactperson_name);
                    Yii::$app->session->set("tq_email", $AMCCompanyModel->email_address);
                    if($currencyCode == 'VND') {
                        Yii::$app->session->set("tq_amount", ($StripeInvoice["amount_paid"]));
                    } else {
                        Yii::$app->session->set("tq_amount", ($StripeInvoice["amount_paid"] / 100));
                    }
                    Yii::$app->session->set("tq_currency_symbol", $currencySymbol);
                    Yii::$app->session->set("tq_product", implode(", ", $product_names));
                    Yii::$app->session->set("tq_timezone", $AMCCompanyModel->timezone);

                    Yii::$app->session->remove('StripeCustomerId');
                    Yii::$app->session->remove('StripeSubscriptionId');

                    return ['success' => true, 'redirect_to' => Yii::$app->urlManager->createAbsoluteUrl('thankyou')];
                } else {
                    return [
                        'success' => false,
                        'message' => 'Validation Errors!',
                        'messages' => array_values($model->getErrors())
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'Something went wrong!, Subscription ID and Payment Intent is not available',
                ];
            }
        } catch (\Exception $e){
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    private function imsPosEcommerceSubscribedPackage($inventoryPackage, $posPackage, $ecommercePackage, PlanModel $PlanModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $SubscribedCountry, $isRetail)
    {
        $NewIMSPOSSubscribedPackage = new ImsSubscribedPackage();

        $current_period_start = $StripeSubscription->current_period_start;
        $end_date = $StripeSubscription->current_period_end;
        $numof_user = 0;
        $numof_outlet = 0;
        $numof_offline_order = 0;
        $numof_online_order = 0;
        $numof_integration = 0;
        $numof_channels = 0;
        $numberof_items = 0;
        if(!empty($inventoryPackage)){
            $NewIMSPOSSubscribedPackage->package_name = $inventoryPackage->name;
            $NewIMSPOSSubscribedPackage->plan_name = $PlanModel->name;
            $NewIMSPOSSubscribedPackage->trial_days = $PlanModel->trial_days;
            $NewIMSPOSSubscribedPackage->free_period = $PlanModel->free_period;
            $NewIMSPOSSubscribedPackage->period_time = $PlanModel->period_time;
            $NewIMSPOSSubscribedPackage->priced_monthly = $inventoryPackage->priced_monthly;
            $NewIMSPOSSubscribedPackage->discount = $inventoryPackage->discount;

            $numof_user = $inventoryPackage->numof_user;
            $numof_outlet = $inventoryPackage->numof_outlet;
            $numof_offline_order = $inventoryPackage->numof_offline_order;
            $numof_online_order = $inventoryPackage->numof_online_order;
            $numof_integration = $inventoryPackage->numof_integration;
            $numof_channels = $inventoryPackage->numof_channels;
            $numberof_items = $inventoryPackage->numberof_items;

            $NewIMSPOSSubscribedPackage->ims_start_date = date("Y-m-d H:i:s", $current_period_start);
            $NewIMSPOSSubscribedPackage->ims_end_date = date("Y-m-d H:i:s", $end_date);
            $NewIMSPOSSubscribedPackage->ims_stripe_subscription_id = $StripeSubscription->id;
            $NewIMSPOSSubscribedPackage->ims_stripe_invoice_id = $StripeInvoiceId;
            $NewIMSPOSSubscribedPackage->ims_stripe_customer_id = $StripeCustomerId;
            $NewIMSPOSSubscribedPackage->ims_stripe_plan_id = $inventoryPackage->stripe_plan_id;
            $NewIMSPOSSubscribedPackage->ims_stripe_product_id = $inventoryPackage->stripe_product_id;

            $NewIMSPOSSubscribedPackage->ims = 1;
        } else {
            $NewIMSPOSSubscribedPackage->ims = 0;
        }

        if(!empty($posPackage)){
            $NewIMSPOSSubscribedPackage->pos_package_name = $posPackage->name;
            $NewIMSPOSSubscribedPackage->pos_plan_name =  $PlanModel->name;
            $NewIMSPOSSubscribedPackage->pos_free_period =  $PlanModel->free_period;
            $NewIMSPOSSubscribedPackage->pos_period_time =  $PlanModel->period_time;
            $NewIMSPOSSubscribedPackage->pos_priced_monthly =  $posPackage->priced_monthly;
            $NewIMSPOSSubscribedPackage->pos_discount =  $posPackage->discount;
            $NewIMSPOSSubscribedPackage->pos_start_date = date("Y-m-d H:i:s", $current_period_start);
            $NewIMSPOSSubscribedPackage->pos_end_date = date("Y-m-d H:i:s", $end_date);
            $NewIMSPOSSubscribedPackage->pos_stripe_subscription_id = $StripeSubscription->id;
            $NewIMSPOSSubscribedPackage->pos_stripe_invoice_id = $StripeInvoiceId;
            $NewIMSPOSSubscribedPackage->pos_stripe_customer_id = $StripeCustomerId;
            $NewIMSPOSSubscribedPackage->pos_stripe_plan_id = $posPackage->stripe_plan_id;
            $NewIMSPOSSubscribedPackage->pos_stripe_product_id = $posPackage->stripe_product_id;
            $NewIMSPOSSubscribedPackage->numof_pos_receipts = $posPackage->numof_pos_receipts;

            $numof_user = ($numof_user == -1) ? -1 : (int)$numof_user + (int)$posPackage->numof_user;
            $numof_outlet = ($numof_outlet == -1) ? -1 : (int)$numof_outlet + (int)$posPackage->numof_outlet;
            $numof_offline_order = ($numof_offline_order == -1) ? -1 : (int)$numof_offline_order + (int)$posPackage->numof_offline_order;
            $numof_online_order = ($numof_online_order == -1) ? -1 : (int)$numof_online_order + (int)$posPackage->numof_online_order;
            $numof_integration = ($numof_integration == -1) ? -1 : (int)$numof_integration + (int)$posPackage->numof_integration;
            $numof_channels = ($numof_channels == -1) ? -1 : (int)$numof_channels + (int)$posPackage->numof_channels;
            $numberof_items = ($numberof_items == -1) ? -1 : (int)$numberof_items + (int)$posPackage->numberof_items;

            $NewIMSPOSSubscribedPackage->pos = 1;
        } else {
            $NewIMSPOSSubscribedPackage->pos = 0;
        }

        if(!empty($ecommercePackage)){
            $NewIMSPOSSubscribedPackage->ecommerce_package_name = $ecommercePackage->name;
            $NewIMSPOSSubscribedPackage->ecommerce_plan_name =  $PlanModel->name;
            $NewIMSPOSSubscribedPackage->ecommerce_free_period =  $PlanModel->free_period;
            $NewIMSPOSSubscribedPackage->ecommerce_period_time =  $PlanModel->period_time;
            $NewIMSPOSSubscribedPackage->ecommerce_priced_monthly =  $ecommercePackage->priced_monthly;
            $NewIMSPOSSubscribedPackage->ecommerce_discount =  $ecommercePackage->discount;
            $NewIMSPOSSubscribedPackage->ecommerce_start_date = date("Y-m-d H:i:s", $current_period_start);
            $NewIMSPOSSubscribedPackage->ecommerce_end_date = date("Y-m-d H:i:s", $end_date);
            $NewIMSPOSSubscribedPackage->ecommerce_stripe_subscription_id = $StripeSubscription->id;
            $NewIMSPOSSubscribedPackage->ecommerce_stripe_invoice_id = $StripeInvoiceId;
            $NewIMSPOSSubscribedPackage->ecommerce_stripe_customer_id = $StripeCustomerId;
            $NewIMSPOSSubscribedPackage->ecommerce_stripe_plan_id = $ecommercePackage->stripe_plan_id;
            $NewIMSPOSSubscribedPackage->ecommerce_stripe_product_id = $ecommercePackage->stripe_product_id;

            $NewIMSPOSSubscribedPackage->online_sales_revenue = $ecommercePackage->online_sales_revenue;

            $numof_user = ($numof_user == -1) ? -1 : (int)$numof_user + (int)$ecommercePackage->numof_user;
            $numof_outlet = ($numof_outlet == -1) ? -1 : (int)$numof_outlet + (int)$ecommercePackage->numof_outlet;
            $numof_offline_order = ($numof_offline_order == -1) ? -1 : (int)$numof_offline_order + (int)$ecommercePackage->numof_online_order;
            $numof_online_order = ($numof_online_order == -1) ? -1 : (int)$numof_online_order + (int)$ecommercePackage->numof_online_order;
            $numof_integration = ($numof_integration == -1) ? -1 : (int)$numof_integration + (int)$ecommercePackage->numof_integration;
            //$numof_channels = ($numof_channels == -1) ? -1 : (int)$numof_channels + (int)$ecommercePackage->numof_channels;
            $numberof_items = ($numberof_items == -1) ? -1 : (int)$numberof_items + (int)$ecommercePackage->numberof_items;

            $NewIMSPOSSubscribedPackage->ecommerce = 1;
        } else {
            $NewIMSPOSSubscribedPackage->ecommerce = 0;
        }

        $NewIMSPOSSubscribedPackage->numof_user = $numof_user;
        $NewIMSPOSSubscribedPackage->numof_outlet = $numof_outlet;
        $NewIMSPOSSubscribedPackage->numof_offline_order = $numof_offline_order;
        $NewIMSPOSSubscribedPackage->numof_online_order = $numof_online_order;
        $NewIMSPOSSubscribedPackage->numof_integration = $numof_integration;
        $NewIMSPOSSubscribedPackage->numof_channels = $numof_channels;
        $NewIMSPOSSubscribedPackage->numberof_items = $numberof_items;

        //If the User is directly Signing Up to a Package Or Trial Package then pass pos_companyid as null
        $NewIMSPOSSubscribedPackage->pos_companyid = 0;

        $NewIMSPOSSubscribedPackage->created_date = date("Y-m-d H:i:s");
        $NewIMSPOSSubscribedPackage->updated_date = date("Y-m-d H:i:s");
        $NewIMSPOSSubscribedPackage->country = $SubscribedCountry;
        $NewIMSPOSSubscribedPackage->is_retail = $isRetail;
        $NewIMSPOSSubscribedPackage->save(false);

        return $NewIMSPOSSubscribedPackage->id;

    }

    private function imsAddonsSubscribedPackage($ImsAddonsModels, PlanModel $PlanModel, $StripeSubscription, $StripeCustomerId, $StripeInvoiceId, $country)
    {
        $current_period_start = $StripeSubscription->current_period_start;
        $end_date = $StripeSubscription->current_period_end;
        $ims_addons_subscribed_package_ids = [];
        if (!empty($ImsAddonsModels)) {
            foreach ($ImsAddonsModels as $_ImsAddonsModel){

                $ImsAddonsModel = $_ImsAddonsModel['ImsAddonsModel'];
                $quantity = $_ImsAddonsModel['quantity'];
                $limit = $ImsAddonsModel->limit * $quantity;
                $NewIMSSubscribedAddons = new ImsSubscribedAddons();
                $NewIMSSubscribedAddons->addon_name = $ImsAddonsModel->name;
                $NewIMSSubscribedAddons->plan_name = $PlanModel->name;
                $NewIMSSubscribedAddons->period_time = $PlanModel->period_time;
                $NewIMSSubscribedAddons->country = $country;
                $NewIMSSubscribedAddons->addon_type = $ImsAddonsModel->addon_type;
                $NewIMSSubscribedAddons->quantity = $quantity;
                $NewIMSSubscribedAddons->limit = $limit;
                $NewIMSSubscribedAddons->priced_monthly = $ImsAddonsModel->priced_monthly;
                $NewIMSSubscribedAddons->start_date = date("Y-m-d H:i:s", $current_period_start);
                $NewIMSSubscribedAddons->end_date = date("Y-m-d H:i:s", $end_date);
                $NewIMSSubscribedAddons->stripe_customer_id = $StripeCustomerId;
                $NewIMSSubscribedAddons->stripe_product_id = $ImsAddonsModel->stripe_product_id;
                $NewIMSSubscribedAddons->stripe_plan_id = $ImsAddonsModel->stripe_plan_id;
                $NewIMSSubscribedAddons->stripe_subscription_id = $StripeSubscription->id;
                $NewIMSSubscribedAddons->stripe_invoice_id = $StripeInvoiceId;
                foreach ($StripeSubscription->items->data as $SubscriptionItem){
                    if($SubscriptionItem->price->id == $ImsAddonsModel->stripe_plan_id && $SubscriptionItem->price->product == $ImsAddonsModel->stripe_product_id){
                        $NewIMSSubscribedAddons->stripe_subscription_itemid = $SubscriptionItem->id;
                    }
                }
                $NewIMSSubscribedAddons->type = $ImsAddonsModel->type;
                $NewIMSSubscribedAddons->removed = '0';
                $NewIMSSubscribedAddons->created_date = date("Y-m-d H:i:s");
                $NewIMSSubscribedAddons->companyid = 0;
                $NewIMSSubscribedAddons->save(false);

                $ims_addons_subscribed_package_ids[] = $NewIMSSubscribedAddons->id;
            }
        }

        return $ims_addons_subscribed_package_ids;
    }

}