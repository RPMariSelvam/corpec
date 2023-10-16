<?php
namespace app\modules\site\frontend\controllers;

use app\jobs\AMCJob;
use app\jobs\SomeJob;
use app\models\Clients;
use app\models\Partners;
use app\models\SalesClients;
use luya\web\Controller;
use app\models\Country;

use Yii;
use yii\db\Query;
use yii\web\Response;

class SignupController extends Controller
{
    public function actionIndex(){
        $this->layout = "@app/views/layouts/signup";
        $model = new Clients();
        //$getproduct = yii::$app->request->get('product');
        $geo_reader = new \GeoIp2\Database\Reader(Yii::$app->basePath . '/resources/geoip2/GeoLite2-Country.mmdb');
        $geo_reader_city = new \GeoIp2\Database\Reader(Yii::$app->basePath . '/resources/geoip2/GeoLite2-City.mmdb');

        $user_ip = Yii::$app->request->getUserIP();
        if ($user_ip == "127.0.0.1" || $user_ip == "::1") {
            $user_ip = "171.49.190.43";//Local IP
        }
        $geo_result = $geo_reader->country($user_ip);
        $geo_result_city = $geo_reader_city->city($user_ip);
        $current_city = $geo_result_city->city->name;
        $current_state = $geo_result_city->mostSpecificSubdivision->name;

        $country_isoCode = $geo_result->country->isoCode;
        $country_name = $geo_result->country->name;
        $country_timeZone = $geo_result_city->location->timeZone;  // using IP
        $timezone = \DateTimeZone::listIdentifiers(\DateTimeZone::PER_COUNTRY, $country_isoCode);

        $country = Country::find()->where(['iso_code_2'=> $country_isoCode])->asArray()->one();
        if(!empty($country)){
            $model->country = $country['name'];
            $model->country_code = $country['country_code'];
            $model->timezone = $timezone[0];
        }
        $amcAccount = (new \yii\db\Query())
            ->from('amc_setting')
            ->where(['amc_setting.settingid' => 1])
            ->one(\Yii::$app->hrmdb);

        $packagename = '';

        if ($model->load(Yii::$app->request->post())) {
            $secret= Yii::$app->params["GOOGLE_RECAPTCHA_SECRET"];
            $response=$_POST["g-recaptcha-response"];
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => [
                    'secret' => $secret,
                    'response' => $response,
                    'remoteip' => $_SERVER['REMOTE_ADDR']
                ],
                CURLOPT_RETURNTRANSFER => true
            ]);
            $output = curl_exec($ch);
            curl_close($ch);
            $captcha_success=json_decode($output);
            if ($captcha_success->success==true) {
                $model->account_status = 'd';
                $model->source_link =  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'];
                $model->signup_ip = Yii::$app->getRequest()->getUserIP();
                $model->platform = $_SERVER['HTTP_USER_AGENT'];
                $model->device_location = $current_city.', '. $current_state;
                if($model->industry == 'Others'){
                    $model->industry = $model->otherindustry;
                }
                $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | Retail - Sign up for a free 14 day trial via Asalta Website";
                if(empty($model->product)){
                    $packagename = 'retailPackage';
                    $model->product = 'retail';
                    $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | Retail - Sign up for a free 14 day trial via Asalta Website";
                }else{
                    if($model->product == 'inv-on-premises' || $model->product == 'crm-on-premises' || $model->product == 'hrm-on-premises' || $model->product == 'pos-on-premises' || $model->product == 'retail-on-premises' || $model->product == 'ecom-on-premises'){
                        if($model->product == 'inv-on-premises'){
                            $model->product = 'inv';
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | Inventory - Need On Premises or Private Cloud Setup for business";
                        }elseif($model->product == 'crm-on-premises'){
                            $model->product = 'crm';
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | CRM - Need On Premises or Private Cloud Setup for business";
                        }elseif($model->product == 'hrm-on-premises'){
                            $model->product = 'hrm';
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | HRM & Payroll - Need On Premises or Private Cloud Setup for business";
                        }elseif($model->product == 'pos-on-premises'){
                            $model->product = 'pos';
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | POS - Need On Premises or Private Cloud Setup for business";
                        }elseif($model->product == 'retail-on-premises'){
                            $model->product = 'retail';
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | Retail Suite- Need On Premises or Private Cloud Setup for business";
                        }elseif($model->product == 'ecom-on-premises'){
                            $model->product = 'ecommerce';
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | E-Commerce - Need On Premises or Private Cloud Setup for business";
                        }
                    }elseif($model->product == 'inv-tailormade' || $model->product == 'crm-tailormade' || $model->product == 'hrm-tailormade' || $model->product == 'pos-tailormade' || $model->product == 'retail-tailormade' || $model->product == 'ecom-tailormade' ){
                        if($model->product == 'inv-tailormade'){
                            $model->product = 'inv';
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | Inventory - Need Tailormade plan for for business";
                        }elseif($model->product == 'crm-tailormade'){
                            $model->product = 'crm';
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | CRM - Need Tailormade plan for for business";
                        }elseif($model->product == 'hrm-tailormade'){
                            $model->product = 'hrm';
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | HRM & Payroll - Need Tailormade plan for for business";
                        }elseif($model->product == 'pos-tailormade'){
                            $model->product = 'pos';
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | POS - Need Tailormade plan for for business";
                        }elseif($model->product == 'retail-tailormade'){
                            $model->product = 'retail';
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | Retail Suite - Need Tailormade plan for for business";
                        }elseif($model->product == 'ecom-tailormade'){
                            $model->product = 'ecommerce';
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | E-Commerce - Need Tailormade plan for for business";
                        }
                    }else{
                        if($model->product == 'inv'){
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | Inventory - Sign up for a free 14 day trial via Asalta Website";
                        }elseif($model->product == 'crm'){
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | CRM - Sign up for a free 14 day trial via Asalta Website";
                        }elseif($model->product == 'hrm'){
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | HRM & Payroll - Sign up for a free 14 day trial via Asalta Website";
                        }elseif($model->product == 'pos'){
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | POS - Sign up for a free 14 day trial via Asalta Website";
                        }elseif($model->product == 'ecommerce'){
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | E-Commerce - Sign up for a free 14 day trial via Asalta Website";
                        }elseif($model->product == 'retail-demo'){
                            $model->product = 'retail';
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | Request for demo";
                        }else{
                            $enquiryTitle = "Enquiry: " .$model->first_name." ".$model->last_name." | Retail Suite - Sign up for a free 14 day trial via Asalta Website";
                        }
                    }
                }

                $packageid = '';
                if(!empty($amcAccount)){
                    if($model->product == 'inv'){
                        $packagename = 'inventoryPackage';
                        $packageid = $amcAccount['inventory_trial_package'];
                    }elseif($model->product == 'pos'){
                        $packagename = 'posPackage';
                        $packageid = $amcAccount['pos_trial_package'];
                    }elseif($model->product == 'hrm'){
                        $packagename = 'hrmPackage';
                        $packageid = $amcAccount['hrm_trial_package'];
                    }elseif($model->product == 'crm'){
                        $packagename = 'crmPackage';
                        $packageid = $amcAccount['crm_trial_package'];
                    }elseif($model->product == 'retail'){
                        $packagename = 'retailPackage';
                        $packageid = $amcAccount['retail_trial_package'];
                    }else{
                        $packagename = 'retailPackage';
                        $packageid = $amcAccount['retail_trial_package'];
                    }

                }

                $company_details =  [
                    "firstname" => $model->first_name,
                    "lastname" => $model->last_name,
                    "email" => $model->email,
                    "company_name" => $model->companyname,
                    "industry_type" => $model->industry,
                    "address" => "",
                    "password" => $model->password,
                    "is_random_password" => false,//send false from website
                    "country" => $model->country,
                    "country_code" => $model->country_code,
                    "phone" => $model->mobile,
                    "timezone" => $model->timezone,
                    'enquiryTitle' => $enquiryTitle,
                    'current_city' => $current_city,
                    'current_state' => $current_state,
                    'description' => $model->description,
                    'product' => $model->product,
                ];
                $cookies = Yii::$app->request->cookies;
                if ($cookies->has('partner_code')){
                    $partner_code = $cookies->getValue('partner_code');
                    $model->partner_code = $partner_code;
                }

                $model->created_date = date("Y-m-d H:i:s");
                if ($model->save()) {

                    /*$AMCJobObj = new AMCJob([
                        "company_details"=> $company_details,
                        "selected_package_type"=> $packagename, //"inventoryPackage", "hrmPackage" for HRM, "crmPackage" for CRM
                        "selected_package"=> "Trial Package",
                        'package_id'=> $packageid,
                        'is_trial'=> true,
                    ]);

                    $data = [
                        "channel" => "default",
                        "job" => serialize($AMCJobObj),
                        "pushed_at" => time(),
                        "ttr" => 1000,
                        "delay" => 10,
                        "priority" => 1024
                    ];

                    Yii::$app->hrmdb->createCommand()->insert('hrm_queue', $data)->execute();*/

                    $this->sendEnquiryMailtoClient($company_details);
                    $this->sendEnquiryMailtoSalesteam($company_details);
                    $this->sendEnquiryMailtoArun($company_details);

                    return $this->render('thankyou_support', ['package' => $packagename]);
                }
            }elseif($captcha_success->success==false){
                return $this->render('index', [
                    'model' => $model,
                ]);
            }


        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionSales(){
        $this->layout = "@app/views/layouts/signup";
        $model = new SalesClients();

        $geo_reader = new \GeoIp2\Database\Reader(Yii::$app->basePath . '/resources/geoip2/GeoLite2-Country.mmdb');
        $geo_reader_city = new \GeoIp2\Database\Reader(Yii::$app->basePath . '/resources/geoip2/GeoLite2-City.mmdb');

        $user_ip = Yii::$app->request->getUserIP();
        if ($user_ip == "127.0.0.1" || $user_ip == "::1") {
            $user_ip = "171.78.187.134";//Local IP
        }
        $geo_result = $geo_reader->country($user_ip);
        $geo_result_city = $geo_reader_city->city($user_ip);
        $current_city = $geo_result_city->city->name;
        $current_state = $geo_result_city->mostSpecificSubdivision->name;

        $country_isoCode = $geo_result->country->isoCode;
        $country_name = $geo_result->country->name;
        $country_timeZone = $geo_result_city->location->timeZone;  // using IP
        $timezone = \DateTimeZone::listIdentifiers(\DateTimeZone::PER_COUNTRY, $country_isoCode);

        $country = Country::find()->where(['iso_code_2'=> $country_isoCode])->asArray()->one();
        if(!empty($country)){
            $model->country = $country['name'];
            $model->country_code = $country['country_code'];
            $model->timezone = $timezone[0];
        }

        /*$amcAccount = (new \yii\db\Query())
            ->from('amc_setting')
            ->where(['amc_setting.settingid' => 1])
            ->one(\Yii::$app->hrmdb);

        $packagename = '';*/

        if ($model->load(Yii::$app->request->post())) {
            $secret= Yii::$app->params["GOOGLE_RECAPTCHA_SECRET"];
            $response=$_POST["g-recaptcha-response"];
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => [
                    'secret' => $secret,
                    'response' => $response,
                    'remoteip' => $_SERVER['REMOTE_ADDR']
                ],
                CURLOPT_RETURNTRANSFER => true
            ]);
            $output = curl_exec($ch);
            curl_close($ch);
            $captcha_success=json_decode($output);
            if ($captcha_success->success==true) {
                $model->account_status = 'd';
                if($model->industry == 'Others'){
                    $model->industry = $model->otherindustry;
                }
                $enquiryTitle = "Enquiry From Asalta Website";

                if(empty($model->product)){
                    $model->product = 'enq-support';
                    $enquiryTitle = "Enquiry From Asalta Website";

                }else{

                    if($model->product == 'inv-on-premises' || $model->product == 'crm-on-premises' || $model->product == 'hrm-on-premises' || $model->product == 'pos-on-premises' || $model->product == 'retail-on-premises' || $model->product == 'ecom-on-premises'){
                        if($model->product == 'inv-on-premises'){
                            $enquiryTitle = "" .$model->first_name." ".$model->last_name." | Inventory - Need On Premises or Private Cloud Setup for business";
                        }elseif($model->product == 'crm-on-premises'){
                            $enquiryTitle = "" .$model->first_name." ".$model->last_name." | CRM - Need On Premises or Private Cloud Setup for business";
                        }elseif($model->product == 'hrm-on-premises'){
                            $enquiryTitle = "" .$model->first_name." ".$model->last_name." | HRM & Payroll - Need On Premises or Private Cloud Setup for business";
                        }elseif($model->product == 'pos-on-premises'){
                            $enquiryTitle = "" .$model->first_name." ".$model->last_name." | POS - Need On Premises or Private Cloud Setup for business";
                        }elseif($model->product == 'retail-on-premises'){
                            $enquiryTitle = "" .$model->first_name." ".$model->last_name." | Retail Suite- Need On Premises or Private Cloud Setup for business";
                        }elseif($model->product == 'ecom-on-premises'){
                            $enquiryTitle = "" .$model->first_name." ".$model->last_name." | E-Commerce - Need On Premises or Private Cloud Setup for business";
                        }
                    }elseif($model->product == 'inv-tailormade' || $model->product == 'crm-tailormade' || $model->product == 'hrm-tailormade' || $model->product == 'pos-tailormade' || $model->product == 'retail-tailormade' || $model->product == 'ecom-tailormade' ){
                        if($model->product == 'inv-tailormade'){
                            $enquiryTitle = "" .$model->first_name." ".$model->last_name." | Inventory - Need Tailormade plan for for business";
                        }elseif($model->product == 'crm-tailormade'){
                            $enquiryTitle = "" .$model->first_name." ".$model->last_name." | CRM - Need Tailormade plan for for business";
                        }elseif($model->product == 'hrm-tailormade'){
                            $enquiryTitle = "" .$model->first_name." ".$model->last_name." | HRM & Payroll - Need Tailormade plan for for business";
                        }elseif($model->product == 'pos-tailormade'){
                            $enquiryTitle = "" .$model->first_name." ".$model->last_name." | POS - Need Tailormade plan for for business";
                        }elseif($model->product == 'retail-tailormade'){
                            $enquiryTitle = "" .$model->first_name." ".$model->last_name." | Retail Suite- Need Tailormade plan for for business";
                        }elseif($model->product == 'ecom-tailormade'){
                            $enquiryTitle = "" .$model->first_name." ".$model->last_name." | E-Commerce - Need Tailormade plan for for business";
                        }
                    }elseif($model->product == 'partner'){
                        $enquiryTitle = "Be a Asalta Advisor";
                    }elseif($model->product == 'enq-support'){
                        $enquiryTitle = "Enquiry From Asalta Website";
                    }else{
                        $enquiryTitle = "Enquiry From Asalta Website";
                    }
                }

                /*$packageid = '';
                if(!empty($amcAccount)){
                    if($model->product == 'inv'){
                        $packagename = 'inventoryPackage';
                        $packageid = $amcAccount['inventory_trial_package'];
                    }elseif($model->product == 'pos'){
                        $packagename = 'posPackage';
                        $packageid = $amcAccount['pos_trial_package'];
                    }elseif($model->product == 'hrm'){
                        $packagename = 'hrmPackage';
                        $packageid = $amcAccount['hrm_trial_package'];
                    }elseif($model->product == 'crm'){
                        $packagename = 'crmPackage';
                        $packageid = $amcAccount['crm_trial_package'];
                    }elseif($model->product == 'retail'){
                        $packagename = 'retailPackage';
                        $packageid = $amcAccount['retail_trial_package'];
                    }else{
                        $packagename = 'inventoryPackage';
                        $packageid = $amcAccount['inventory_trial_package'];
                    }

                }*/

                $company_details =  [
                    "name" => $model->name,
                    "email" => $model->email,
                    "company_name" => $model->companyname,
                    "industry_type" => $model->industry,
                    "address" => "",
                    "password" => $model->password,
                    "is_random_password" => false,//send false from website
                    "country" => $model->country,
                    "country_code" => $model->country_code,
                    "phone" => $model->mobile,
                    "timezone" => $model->timezone,
                    'enquiryTitle' => $enquiryTitle,
                    'current_city' => $current_city,
                    'current_state' => $current_state,
                    'description' => $model->description,
                ];
                $model->created_date = date("Y-m-d H:i:s");

                //var_dump($company_details['name']); die;
                if ($model->save()) {
                    $this->sendEnquiryMailtoSalesteam($company_details);
                    return $this->render('thankyou_support');
                }
            }elseif($captcha_success->success==false){
                return $this->render('sales_team', [
                    'model' => $model,
                ]);
            }


        }

        return $this->render('sales_team', [
            'model' => $model,
        ]);
    }

    public function sendEnquiryMailtoClient($data)
    {
        if(empty($data['product'])){
            $data['product'] = 'enq-support';
            $Title = 'Equiry ';
        }else{
            if($data['product'] == 'inv'){
                $Title = " Inventory ";
            }elseif($data['product'] == 'crm'){
                $Title = " CRM ";
            }elseif($data['product'] == 'hrm'){
                $Title = " HRM & Payroll ";
            }elseif($data['product'] == 'pos'){
                $Title = " POS ";
            }elseif($data['product'] == 'retail'){
                $Title = " Retail Suite";
            }elseif($data['product'] == 'ecom'){
                $Title = " E-Commerce ";
            }else{
                $Title = " Advisor";
            }
        }
        $data['product'] = $Title;
        $to = $data['email'];
        $subject =  $data['firstname'] . " " . $data['lastname'] . " - Asalta " . $Title . " next step";
        $ipaddress=Yii::$app->getRequest()->getUserIP();
        $message = \Yii::$app->view->renderFile('@app/resources/email_template/enquirer_email_template.php', ['email' => $data['email'], 'firstname' => $data['firstname'], 'lastname' => $data['lastname'],'ipaddress' => $ipaddress,'company_name' => $data['company_name'], 'industry_type' => $data['industry_type'], 'country' => $data['country'], 'phone' => $data['phone'], 'country_code' => $data['country_code'], 'enquiryTitle' => $data['enquiryTitle'],'current_city' => $data['current_city'], 'current_state' => $data['current_state'], 'description' => $data['description'], 'product' => $data['product']]);
        $email = \Yii::$app->mail;
        $email->compose($subject, $message);
        $email->address($to, $data['firstname']." ".$data['lastname']);
        $email->mailer->From = \Yii::$app->params["adminEmail"];
        $email->addReplyTo($to);
        $email->mailer->FromName = 'Enquiry - Asalta Website';
        $email->send();
    
    }
    public function sendEnquiryMailtoSalesteam($data)
    {
        $to = $data['email'];
        $subject = $data['enquiryTitle'];
        $ipaddress=Yii::$app->getRequest()->getUserIP();
        $message = \Yii::$app->view->renderFile('@app/resources/email_template/enquiry_email_template.php', ['email' => $data['email'], 'firstname' => $data['firstname'], 'lastname' => $data['lastname'],'ipaddress' => $ipaddress,'company_name' => $data['company_name'], 'industry_type' => $data['industry_type'], 'country' => $data['country'], 'phone' => $data['phone'], 'country_code' => $data['country_code'], 'enquiryTitle' => $data['enquiryTitle'],'current_city' => $data['current_city'], 'current_state' => $data['current_state'], 'description' => $data['description'] ]);
        $email = \Yii::$app->mail;
        $email->compose($subject, $message);
        $email->address(\Yii::$app->params["salesEmail"], 'Support');
        $email->mailer->From = \Yii::$app->params["adminEmail"];
        $email->addReplyTo($to);
        $email->mailer->FromName = 'Enquiry - Asalta Website';
        $email->send();

    }
    public function sendEnquiryMailtoArun($data)
    {
        $to = $data['email'];
        $subject = $data['enquiryTitle'];
        $ipaddress=Yii::$app->getRequest()->getUserIP();
        $message = \Yii::$app->view->renderFile('@app/resources/email_template/enquiry_email_template.php', ['email' => $data['email'], 'firstname' => $data['firstname'], 'lastname' => $data['lastname'],'ipaddress' => $ipaddress,'company_name' => $data['company_name'], 'industry_type' => $data['industry_type'], 'country' => $data['country'], 'phone' => $data['phone'], 'country_code' => $data['country_code'], 'enquiryTitle' => $data['enquiryTitle'],'current_city' => $data['current_city'], 'current_state' => $data['current_state'], 'description' => $data['description'] ]);
        $email = \Yii::$app->mail;
        $email->compose($subject, $message);
        $email->address('arun@asalta.com', 'Arun');
        $email->mailer->From = \Yii::$app->params["adminEmail"];
        $email->mailer->addReplyTo($to);
        $email->mailer->FromName = 'Enquiry - Asalta Website';
        $email->send();
    }

    public function actionThankyou(){
        $this->layout = "@app/views/layouts/signup";
        return $this->render('thankyou_support');
    }
    public function actionGetcustomermail(){
        $cust_email = yii::$app->request->post('cust_email');
        if(!empty($cust_email)){

            $ClientsModel = Clients::find()->select(['email'])->where(['email'=>$cust_email])->count();
            if($ClientsModel > 0){
                return true;
            }
            $imsAccount = (new \yii\db\Query())
                ->select(['ims_users.email'])
                ->from('ims_users')
                ->where(['ims_users.email' => $cust_email])
                ->one(\Yii::$app->posdb);
            if(count($imsAccount['email']) > 0){
                return true;
            }

            $hrmAccount = (new \yii\db\Query())
                ->select(['hrm_users.email'])
                ->from('hrm_users')
                ->where(['hrm_users.email' => $cust_email])
                ->one(\Yii::$app->hrmdb);
            if(count($hrmAccount['email']) > 0){
                return true;
            }

            $crmAccount = (new \yii\db\Query())
                ->select(['crm_users.email'])
                ->from('crm_users')
                ->where(['crm_users.email' => $cust_email])
                ->one(\Yii::$app->crmdb);
            if(count($crmAccount['email']) > 0){
                return true;
            }

            return false;

        }
    }
    public function actionGetcountrycode(){
        $country_name = yii::$app->request->post('countryname');
        Yii::$app->response->format = Response::FORMAT_JSON;
        $country = Country::find()->where(['name'=> $country_name])->asArray()->all();
        $timezone = \DateTimeZone::listIdentifiers(\DateTimeZone::PER_COUNTRY, $country[0]['iso_code_2']);
        return ['country' => $country, 'timezone' => $timezone[0]];
    }

    public function actionPartner()
    {
        $this->layout = "@app/views/layouts/signup";
        $model = new Partners();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $message = "<html>
                        <head>
                        <title>New Partner Signup</title>
                        </head>
                        <body>
                        Hi Team !<br> 
                        New Partner signup has been maded by " . $model->first_name . "<br>
                        <br><br>
                        Thank you.
                        <br><br><br>
                        </body>
                        </html>";
                $subject = "Partner Signup";
                $Replyto = $model->email;
                $email = \Yii::$app->mail;
                $email->compose($subject, $message);
                $email->address('support@asalta.com', 'Support');
                $email->address('sales@asalta.com', 'Sales');
                $email->mailer->From = \Yii::$app->params["adminEmail"];
                $email->mailer->addReplyTo($Replyto);
                $email->mailer->FromName = 'Partner - Asalta Website';
                $email->send();
                return $this->render('thankyou_partner');
            }
        }
        return $this->render('partner', [
            'model' => $model,
        ]);
    }

    public function actionCheckuniqueid($uid){
        $AlreadyExisit = false;
        $Partners = Partners::find()->where(['partner_code'=>$uid])->count();
        if($Partners > 0){
            $AlreadyExisit = true;
        }
        return $AlreadyExisit;
    }

    public function actionTest()
    {
        /*var_dump(\Yii::$app->crmdb);
        var_dump(\Yii::$app->posdb);
        var_dump(\Yii::$app->hrmdb);
        */
        /*$jobObj = new SomeJob([
            "toEmail" => "toEmail",
            "message" => "message",
            "subject" => "subject",
        ]);

        $data = [
            "channel" => "default",
            "job" => serialize($jobObj), "pushed_at" => time(), "ttr" => 1000, "delay" => 10, "priority" => 1024];

        Yii::$app->hrmdb->createCommand()->insert('hrm_queue', $data)->execute();*/
    }
}