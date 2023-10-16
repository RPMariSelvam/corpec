<?php
use app\models\Country;
use app\models\Industry;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;




/*
 * @var $this luya\web\View
*/
$getenquiry = yii::$app->request->get('product');
$enquiryTitle = "Sign up for a free 14 day trial";
if(empty($getenquiry)){
    $enquiryTitle = "Sign up for a free 14 day trial";
}else{
    if($getenquiry == 'crm'){
        $this->title = 'Asalta CRM Pricing | crm management software';
        $this->registerMetaTag(['name' => 'description', 'content' => 'Sign up for a 14 day free trail, Close more deals, sell more, and grow your business faster with Asalta CRM (customer relationship management).'], 'metaDescription');
    }elseif($getenquiry == 'crm-on-premises'){
        $this->title = 'customer relationship management software | CRM Permises';
        $this->registerMetaTag(['name' => 'description', 'content' => 'Need On Premises or Private Cloud Setup for your business? Click this link and fill in the form for more information.'], 'metaDescription');
    }elseif($getenquiry == 'crm-tailormade'){
        $this->title = 'crm system software | client relationship management system';
        $this->registerMetaTag(['name' => 'description', 'content' => 'Need Tailormade plan for your business? Get our custom made Enterprice plan to manage more and more orders for bigger businesses!'], 'metaDescription');
    }elseif($getenquiry == 'ecommerce'){
        $this->title = 'Asalta ecommerce | Pricing | Get a 14 day free trial';
        $this->registerMetaTag(['name' => 'description', 'content' => 'Sign in to your 14 day free trial asalta ecommerce account and grow your business with Asalta Ecommerce software.'], 'metaDescription');
    }elseif($getenquiry == 'hrm'){
        $this->title = 'Human resource management software | HRM Software Pricing';
        $this->registerMetaTag(['name' => 'description', 'content' => 'A simple and effective Hr system which takes care of your all kinds of Hr process. Signup for 14 day free trial and see what Asalta can do for your business.'], 'metaDescription');
    }elseif($getenquiry == 'inv'){
        $this->title = 'Asalta Inventory | Inventory Plans and Pricing';
        $this->registerMetaTag(['name' => 'description', 'content' => ' Purchase, sell and manage inventory from one application. It takes not exactly a moment to signup for a 14-day free trial.'], 'metaDescription');
    }elseif($getenquiry == 'pos'){
        $this->title = 'POS System Software | Sign up for a free 14 day trial';
        $this->registerMetaTag(['name' => 'description', 'content' => 'Grow your business more faster with Asalta Point of sale (POS) software. Sign up for a 14 day free trail and adore our services.'], 'metaDescription');
    }elseif($getenquiry == 'retail'){
        $this->title = 'Asalta Retail suite | Sign up for a free 14 day trial';
        $this->registerMetaTag(['name' => 'description', 'content' => 'Run your entire retail business with Asalta retail suite. Sign up for a 14 day free trial. Contact us for more information.'], 'metaDescription');
    }elseif($getenquiry == 'retail-demo'){
        $this->title = 'Asalta Demo | Asalta Retail suite | Arrange a demo';
        $this->registerMetaTag(['name' => 'description', 'content' => 'Demo arranged for Asalta retail suite customers. Sign up for a 14 day free trial. Your hunt for right software ends here.'], 'metaDescription');
    }elseif($getenquiry == 'retail-on-premises'){
        $this->title = 'Asalta Retail Suite | Asalta retail Permises';
        $this->registerMetaTag(['name' => 'description', 'content' => 'Asalta retail suite - Increase your sales and keep track of stock, order fulfillment, customers and insights in one place.'], 'metaDescription');
    }elseif($getenquiry == 'retail-tailormade'){
        $this->title = 'Asalta Tailormade Plan | Asalta Retail suite';
        $this->registerMetaTag(['name' => 'description', 'content' => 'Asalta Retail Suite - An End to End Retail Business Automation Software. Track down our unique plan to to manage more and more numbers for immense business.'], 'metaDescription');
    }else{
        $this->title = 'Asalta Retail suite | Sign up for a free 14 day trial';
    }


    if($getenquiry == 'inv-on-premises' || $getenquiry == 'crm-on-premises' || $getenquiry == 'hrm-on-premises' || $getenquiry == 'pos-on-premises' || $getenquiry == 'retail-on-premises' || $getenquiry == 'ecom-on-premises'){
        $enquiryTitle = "Need On Premises or Private Cloud Setup for your business?";
    }elseif($getenquiry == 'inv-tailormade' || $getenquiry == 'crm-tailormade' || $getenquiry == 'hrm-tailormade' || $getenquiry == 'pos-tailormade' || $getenquiry == 'retail-tailormade' || $getenquiry == 'ecom-tailormade' ){
        $enquiryTitle = "Need Tailormade plan for your business?<br/> <span style='font-size: 12px;'>Get our custom made Enterprice plan to manage more and more orders for bigger businesses!</span>";
    }elseif($getenquiry == 'retail-demo'){
        $enquiryTitle = "Arrange a demo";
    }else{
        $enquiryTitle = "Sign up for a free 14 day trial";
    }
}

?>
<style>
    .rc-anchor-error-msg-container{
        top: 15px !important;
    }
    .help-block{
        width: 240px;
    }

    iframe[Attributes Style] {
        border-image-width: 375px !important;
    }
    #signup_pesonaldetail_div{
        display: none;
    }
    .companyDiv{
        width: 100%;
        margin-bottom: 0px !important;
    }
    .leftDiv{
        width: 63%;float: left;margin-right: 2%;/*margin-bottom: 5px;*/
    }
    .rightDiv{
        width: 35%;float: left;/*margin-bottom: 5px;*/
    }
    .mobileDiv{
        width: 100%;
    }
    .mobileDiv .mobileRight{
        width: 63%;float: left;margin-left: 2%;
    }
    .mobileDiv .mobileLeft{
        width: 35%;float: left
    }
    #getstarted {
        display: none;
    }
    .form-signup .form-control{
        padding: 0 0 0px 30px;
    }
    .form-signup input[type="text"], .form-signup input[type="password"], .form-signup input[type="email"], .field-clients-industry, .field-clients-country, .mobileLeft {
        margin-top: 10px !important;
    }
</style>
    <div class="form-signup">
        <div class="form-signup-heading text-center">
            <h1 class="sign-title"></h1>
            <a href="<?= $this->publicHtml; ?>">
                <img alt="Asalta is a powerful software that centralizes business operations" src="<?= $this->publicHtml; ?>/images/asalta-logo.png" >
            </a>

        </div>
        <div class="login-wrap">
            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data',
                    'class' => 'form-horizontal adminex-form'],
            ]); ?>
            <div id="signupmail_div">
                <p><?= $enquiryTitle ?></p>
                <div class="row">

                    <div class="col-sm-12">

                        <?= $form->field($model, 'cname', ['template' => "<i class='fa fa-user'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                            ->textInput(['class' => 'form-control stepforminput','placeholder'=>'First Name']) ?>
                    </div>
                    <div class="col-sm-12">
                        <?= $form->field($model, 'clname', ['template' => "<i class='fa fa-user'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                            ->textInput(['class' => 'form-control stepforminput','placeholder'=>'Last Name']) ?>
                    </div>
                </div>


                <div id="customeremail">
                    <?= $form->field($model, 'cemail', ['template' => "<i class='fa fa-envelope'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                        ->textInput(['class' => 'form-control stepforminput','placeholder'=>'Email']) ?>
                    <span id="email_status"></span>
                </div>
            </div>

            <div id="signup_pesonaldetail_div">
                <p> Understanding your business will help us serve your better.</p>

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



                <div class="form-group companyDiv">
                    <div class="leftDiv">
                        <?= $form->field($model, 'companyname', ['template' => "<i class='fa fa-building'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                            ->textInput(['class' => 'form-control step2forminput','placeholder'=>'Company Name']) ?>
                    </div>
                    <div class="rightDiv">
                        <?= $form->field($model, 'emp_size', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                            ->textInput(['class' => 'form-control step2forminput','placeholder'=>'Size']) ?>

                    </div>
                </div>
                <div class="form-group" id="uen">
                    <?= $form->field($model, 'uen', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                        ->textInput(['class' => 'form-control step2forminput','placeholder'=>'Unique Entity Number (UEN)']) ?>
                </div>

                <?php
                $industryData = ArrayHelper::map(Industry::find()->select(['industryid', 'industry_name'])->orderBy(['industry_name'=> SORT_ASC])->asArray()->all(), 'industry_name', 'industry_name');
                //var_dump($industryData);die;
                echo $form->field($model, 'industry')->widget(Select2::classname(), [
                    'data' => $industryData,
                    'language' => 'en',
                    'options' => ['placeholder' => 'Industry', 'class' => 'form-control step2forminput'],
                    'addon' => [
                        'prepend' => [
                    'content' => Icon::show('industry', ['class'=>'fa fa-industry', 'framework' => Icon::FAS]) 
                        ],  
                        ]
                ])->label('');

                ?>
                <div class="form-group" id="otherindustrydiv">
                    <?= $form->field($model, 'otherindustry', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                        ->textInput(['class' => 'form-control step2forminput','placeholder'=>'Enter your industry']) ?>
                </div>
                <?php
                $countryData = ArrayHelper::map(Country::find()->select(['countryid', 'name'])->asArray()->all(), 'name', 'name');
                //var_dump($data);die;
                echo $form->field($model, 'country')->widget(Select2::classname(), [
                    'data' => $countryData,
                    'language' => 'en',
                    'options' => ['placeholder' => 'Country', 'class' => 'form-control step2forminput'],
                    'addon' => [
                        'prepend' => [
                    'content' => Icon::show('globe', ['class'=>'fa fa-globe', 'framework' => Icon::FAS]) 
                        ],  
                        ]
                ])->label('');

                ?>
                <div class="form-group mobileDiv">
                    <div class="mobileLeft">
                        <?php
                        $countryCodeData = ArrayHelper::map(Country::find()->select(['countryid','country_code', "CONCAT('+',country_code) as name"])->asArray()->all(), 'country_code', 'name');
                        //var_dump($data);die;
                        echo $form->field($model, 'country_code')->widget(Select2::classname(), [
                            'data' => $countryCodeData,
                            'language' => 'en',
                            'options' => ['placeholder' => 'Country Code', 'class' => 'form-control step2forminput'],
                            'pluginOptions' => [
                                //'allowClear' => true
                            ],
                        ])->label('');

                        ?>


                    </div>
                    <div class="mobileRight">
                        <?= $form->field($model, 'mobile', ['template' => "<i class='fa fa-mobile-phone'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                            ->textInput(['class' => 'form-control step2forminput','style' => 'margin-top:0px','placeholder'=>'Mobile']) ?>
                    </div>
                </div>
                <?= $form->field($model, 'description', ['template' => "<i class='fa fa-comments'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                    ->textArea(['rows' => '2','class' => 'form-control step2forminput','placeholder'=>'Tell Us More...','style' => 'height: auto !important;']) ?>

            </div>
            <div class="form-group recaptchaDiv">
                <div id="recaptcha" class="g-recaptcha" data-sitekey="<?= Yii::$app->params["GOOGLE_RECAPTCHA_SITEKEY"] ; ?>"></div>
                <div id="html_element"></div>
                <p style="font-size: 14px;">By creating an account you agree to <a target="_blank" href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/terms-and-conditions") ?>">Terms & Conditions</a></p>
            </div>
            <button id="checkAccount" class="btn btn-lg btn-login btn-block">  Create Account </button>
            <div class="form-group" id="getstarted">
                <button id="submitbtn" class="btn btn-lg btn-login btn-block">  Done, Get started! </button>

                </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
    <script src="//www.google.com/recaptcha/api.js"></script>
<?php

$this->registerJs("
$('#checkAccount').attr('disabled', true);
$('#getstarted').hide();
$('#checkAccount').on('click', function(e) {
    e.preventDefault();
    var urlParams = new URLSearchParams(window.location.search);
    var product_val = urlParams.get('product');
    $('#clients-product').val(product_val);
    var name = $('#clients-cname').val();
    var clname = $('#clients-clname').val();
    var email = $('#clients-cemail').val();
    //var password = $('#clients-cpassword').val();
    //if(password.length >= 8){
        if (name.length > 0 && clname.length > 0 && email.length > 0) {

            var googleResponse = jQuery('#g-recaptcha-response').val();
            if (googleResponse.length == 0) {
                $( '.error-captcha' ).remove();
                $('<p style=\"color:#a94442 !important;font-size: 13px;text-align: left;\" class=\"error-captcha\"> Please fill up the captcha.</p>\" ').insertAfter(\"#html_element\");
                return false;
            } else {
                $('#clients-first_name').val(name);
                $('#clients-last_name').val(clname);
                $('#clients-email').val(email);
                $('#getstarted').show();
                $('#signup_pesonaldetail_div').show();
                $('#signupmail_div').hide();
                $('#checkAccount').hide();
                $( '.error-captcha' ).remove();
            }

        }else{
            return false;
        }
    //}
});
$(document).on('click','#submitbtn',function(){
    var googleResponse = jQuery('#g-recaptcha-response').val();
    if (googleResponse.length == 0) {
        $( '.error-captcha' ).remove();
        $('<p style=\"color:#a94442 !important;font-size: 13px;text-align: left;\" class=\"error-captcha\"> Please fill up the captcha.</p>\" ').insertAfter(\"#html_element\");
        return false;
    } else {
        $('#submitbtn').submit();
        $('#submitbtn').attr('disabled', true);
        //grecaptcha.reset();
    }
});

$('.stepforminput').blur(function () {
  var email = $('#clients-cemail').val();
  var name = $('#clients-cname').val();
    var clname = $('#clients-clname').val();
    if (ValidateEmail($('#clients-cemail').val())) {
        if(email !='')
        {
            $('#email_status').html('');
            if(email !='' && name !='' && clname !='')
            {
                $('#email_status').html('');
                $('#checkAccount').attr('disabled', false);
                return true;
            }
            else
            {
                $('#checkAccount').attr('disabled', true);
                return false;
            }
        }

    }else{

        //var helpblockError = $('#customeremail .help-block').html();
        if(email != ''){
        var emailinvalid = $('#clients-cemail').attr('aria-invalid');
        setTimeout( function(){
        //console.log(emailinvalid)
            if(emailinvalid != 'undefined' &&  emailinvalid != '' && emailinvalid == 'false' ){
                $('#email_status').html(email + ' is not valid');
                $('#email_status').css('color', '#a94442');
            }
          }  , 1000 );
        }
    }


});

$(document).on('change','.step2forminput',function(){
    var ccompanyname = $('#clients-companyname').val();
    var cindustry = $('#clients-industry').val();
    var ccountry = $('#clients-country').val();
    var cmobile = $('#clients-mobile').val();

    if(ccompanyname !='' && cindustry !='' && ccountry !='' && cmobile !='')
    {
        $('#submitbtn').attr('disabled', false);
        return true;
    }
    else
    {
        $('#submitbtn').attr('disabled', true);
        return false;
    }
});

//$('.stepforminput').blur(function () {
//  var email = $('#clients-cemail').val();
//  if (ValidateEmail($('#clients-cemail').val())) {
//        if(email)
//        {
//            $.ajax({
//                type: 'POST',
//                url: 'site/signup/getcustomermail',
//                data: {
//                    cust_email:email
//                },
//                success: function (response) {
//                    $( '#email_status' ).html(response);
//                    if(response=='1')
//                    {
//                        $( '#email_status' ).html('Email already exist');
//                        $('#checkAccount').attr('disabled', true);
//                        return true;
//                    }else
//                    {
//                        $('#checkAccount').attr('disabled', false);
//                        return false;
//                    }
//                }
//            });
//        }
//        else
//        {
//            $( '#email_status' ).html('');
//            return false;
//        }
//    }else{
//        var helpblockError = $('#customeremail .help-block').html();
//        if(email != ''){
//        setTimeout( function(){
//            if(helpblockError != ''){
//                $('#email_status').html(email + ' is not valid');
//                $('#email_status').css('color', '#a94442');
//            }
//          }  , 1000 );
//        }
//    }
//
//
//});

findcountryname();
$(document).on('change', '#clients-country', function () {
    findcountryname();
});


//called when key is pressed in textbox
$('#clients-emp_size').keypress(function (e) {
 //if the letter is not digit then display error and don't type anything
 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
     //display error message
     //$('#errmsg').html('Digits Only').show().fadeOut('slow');
     return false;
 }
});
$('#otherindustrydiv').hide();
$(document).on('change', '#clients-industry',function(){
    var industry = $('#clients-industry').val();
    if(industry != '' && industry == 'Others'){
        $('#otherindustrydiv').show();
    }else{
        $('#otherindustrydiv').hide();
    }

});

function findcountryname(){
    var countryname = $('#clients-country').val();
    if(countryname != ''){
        if(countryname == 'Singapore'){
            $('#uen').show();
        }else{
            $('#uen').hide();
        }
        $.ajax({
            type: 'POST',
            url: 'site/signup/getcountrycode',
            data: {
                    countryname:countryname
                },
            success: function(response){
                var countryValue='';
                var countrycodeitems = [$('<option></option>').val('').text('--- Select ---')];
                $.each(response['country'], function(index, item){
                    var country_codetext = '+'+item.country_code;
                    countrycodeitems.push($('<option></option>').val(item.country_code).text(country_codetext))
                    countryValue=item.country_code;
                });
                $('select#clients-country_code').html(countrycodeitems);
                $('#clients-country_code').val(countryValue).change();

                if(response['timezone']){
                    $('#clients-timezone').val(response['timezone']);
                    $('#clients-timezone').html(response['timezone']);
                }
            }
        });
    }
}
");
$this->registerJs('
function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };
');
