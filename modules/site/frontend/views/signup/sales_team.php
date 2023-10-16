<?php
use app\models\Country;
use app\models\Industry;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/*
 * @var $this luya\web\View
*/
$getenquiry = yii::$app->request->get('enquiry');
$enquiryTitle = "Contact Our Sales Team";
if(empty($getenquiry)){
    $enquiryTitle = "Contact Our Sales Team";
}else{
    if($getenquiry == 'inv-on-premises' || $getenquiry == 'crm-on-premises' || $getenquiry == 'hrm-on-premises' || $getenquiry == 'pos-on-premises' || $getenquiry == 'retail-on-premises' || $getenquiry == 'ecom-on-premises'){
        $enquiryTitle = "Need On Premises or Private Cloud Setup for your business?";
    }elseif($getenquiry == 'inv-tailormade' || $getenquiry == 'crm-tailormade' || $getenquiry == 'hrm-tailormade' || $getenquiry == 'pos-tailormade' || $getenquiry == 'retail-tailormade' || $getenquiry == 'ecom-tailormade' ){
        $enquiryTitle = "Need Tailormade plan for your business?<br/> <span style='font-size: 12px;'>Get our custom made Enterprice plan to manage more and more orders for bigger businesses!</span>";
    }elseif($getenquiry == 'partner'){
        $enquiryTitle = "Be a Asalta Advisor";
    }elseif($getenquiry == 'enq-support'){
        $enquiryTitle = "Contact Our Sales Team";
    }else{
        $enquiryTitle = "Contact Our Sales Team";
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
    </style>
    <div class="form-signup">
        <div class="form-signup-heading text-center">
            <h1 class="sign-title"></h1>
            <a href="<?= $this->publicHtml; ?>">
                <img src="<?= $this->publicHtml; ?>/images/asalta-logo.png" >
            </a>

        </div>
        <div class="login-wrap">
            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data',
                    'class' => 'form-horizontal adminex-form'],
            ]); ?>
            <div id="signupmail_div">
                <p><?= $enquiryTitle ?></p>

                <?= $form->field($model, 'cname', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                    ->textInput(['class' => 'form-control stepforminput','placeholder'=>'Name']) ?>

                <div id="customeremail">
                    <?= $form->field($model, 'cemail', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                        ->textInput(['class' => 'form-control stepforminput','placeholder'=>'Email']) ?>
                    <span id="email_status"></span>
                </div>
                <?= $form->field($model, 'cpassword', ['template'=>"{input}\n{error}" , 'options' => ['class' => '']])
                    ->passwordInput(['class' => 'form-control stepforminput','placeholder'=>'Password']) ?>

            </div>

            <div id="signup_pesonaldetail_div" style="display: none">
                <p> <?= $enquiryTitle ?></p>

                <?= $form->field($model, 'name', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                    ->hiddenInput(['class' => 'form-control']) ?>
                <?= $form->field($model, 'email', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                    ->hiddenInput(['class' => 'form-control']) ?>
                <?= $form->field($model, 'password', ['template'=>"{input}\n{error}" , 'options' => ['class' => '']])
                    ->hiddenInput(['class' => 'form-control']) ?>
                <?= $form->field($model, 'timezone', ['template'=>"{input}\n{error}" , 'options' => ['class' => '']])
                    ->hiddenInput(['class' => 'form-control']) ?>
                <?= $form->field($model, 'product', ['template'=>"{input}\n{error}" , 'options' => ['class' => '']])
                    ->hiddenInput(['class' => 'form-control']) ?>



                <div class="form-group" style="width: 100%;    margin-bottom: -20px !important;">
                    <div style="width: 63%;float: left;margin-right: 2%;margin-bottom: 5px;">
                        <?= $form->field($model, 'companyname', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                            ->textInput(['class' => 'form-control','placeholder'=>'Company Name']) ?>
                    </div>
                    <div style="width: 35%;float: left;margin-bottom: 5px;">
                        <?= $form->field($model, 'emp_size', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                            ->textInput(['class' => 'form-control','placeholder'=>'Size']) ?>

                    </div>
                </div>
                <div id="uen">
                    <?= $form->field($model, 'uen', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                        ->textInput(['class' => 'form-control','placeholder'=>'Unique Entity Number (UEN)']) ?>
                </div>

                <?php
                $industryData = ArrayHelper::map(Industry::find()->select(['industryid', 'industry_name'])->orderBy(['industry_name'=> SORT_ASC])->asArray()->all(), 'industry_name', 'industry_name');
                //var_dump($industryData);die;
                echo $form->field($model, 'industry')->widget(Select2::classname(), [
                    'data' => $industryData,
                    'language' => 'en',
                    'options' => ['placeholder' => 'Industry', 'class' => 'form-control'],

                ])->label('');

                ?>
                <div class="form-group" id="otherindustrydiv" style="display: none">
                    <?= $form->field($model, 'otherindustry', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                        ->textInput(['class' => 'form-control','placeholder'=>'Enter your industry','style' => 'margin-top:0px']) ?>
                </div>
                <?php
                $countryData = ArrayHelper::map(Country::find()->select(['countryid', 'name'])->asArray()->all(), 'name', 'name');
                //var_dump($data);die;
                echo $form->field($model, 'country')->widget(Select2::classname(), [
                    'data' => $countryData,
                    'language' => 'en',
                    'options' => ['placeholder' => 'Country', 'class' => 'form-control'],
                    'pluginOptions' => [
                        //'allowClear' => true
                    ],
                ])->label('');

                ?>
                <div class="form-group" style="width: 100%;">
                    <div style="width: 35%;float: left">
                        <?php
                        $countryCodeData = ArrayHelper::map(Country::find()->select(['countryid','country_code', "CONCAT('+',country_code) as name"])->asArray()->all(), 'country_code', 'name');
                        //var_dump($data);die;
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
                    <div style="width: 63%;float: left;margin-left: 2%;">
                        <?= $form->field($model, 'mobile', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                            ->textInput(['class' => 'form-control','style' => 'margin-top:7px','placeholder'=>'Mobile']) ?>
                    </div>
                </div>
                <?= $form->field($model, 'description', ['template' => "{input}\n{error}", 'options' => ['class' => '']])
                    ->textArea(['rows' => '2','class' => 'form-control','placeholder'=>'Tell Us More...','style' => 'height: auto !important;']) ?>

            </div>
            <div class="form-group">
                <div id="recaptcha" class="g-recaptcha" data-sitekey="<?= Yii::$app->params["GOOGLE_RECAPTCHA_SITEKEY"] ; ?>"></div>
                <div id="html_element"></div>

            </div>
            <button id="checkAccount" class="btn btn-lg btn-login btn-block">  Next </button>
            <div class="form-group" style="display: none;" id="getstarted">
                <button id="submitbtn" class="btn btn-lg btn-login btn-block">  Submit </button>

            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
<?php
$this->registerJs("
$('#checkAccount').attr('disabled', true);
$('#getstarted').hide();
$('#checkAccount').on('click', function(e) {
    e.preventDefault();
    var urlParams = new URLSearchParams(window.location.search);
    var product_val = urlParams.get('enquiry');
    $('#salesclients-product').val(product_val);
    var name = $('#salesclients-cname').val();
    var email = $('#salesclients-cemail').val();
    var password = $('#salesclients-cpassword').val();
    if(password.length >= 8){
        if (name.length > 0 && email.length > 0) {

            var googleResponse = jQuery('#g-recaptcha-response').val();
            if (googleResponse.length == 0) {
                $( '.error-captcha' ).remove();
                $('<p style=\"color:#a94442 !important;font-size: 13px;text-align: left;\" class=\"error-captcha\"> Please fill up the captcha.</p>\" ').insertAfter(\"#html_element\");
                return false;
            } else {
                $('#salesclients-name').val(name);
                $('#salesclients-email').val(email);
                $('#salesclients-password').val(password);
                $('#getstarted').show();
                $('#signup_pesonaldetail_div').show();
                $('#signupmail_div').hide();
                $('#checkAccount').hide();
                $( '.error-captcha' ).remove();
            }

        }else{
            return false;
        }
    }
});
$('#submitbtn').click(function() {
    var googleResponse = jQuery('#g-recaptcha-response').val();
    if (googleResponse.length == 0) {
        $( '.error-captcha' ).remove();
        $('<p style=\"color:#a94442 !important;font-size: 13px;text-align: left;\" class=\"error-captcha\"> Please fill up the captcha.</p>\" ').insertAfter(\"#html_element\");
        return false;
    } else {
        $('#submitbtn').submit();
        //grecaptcha.reset();
    }
});


$('.stepforminput').blur(function () {
  var email = $('#salesclients-cemail').val();
  var name = $('#salesclients-cname').val();
  var password = $('#salesclients-cpassword').val();
    if (ValidateEmail($('#salesclients-cemail').val())) {
        $('#email_status').html(email + ' is valid');
        $('#email_status').css('color', 'green');

        if(email !='' && name !='' && password !='')
        {
            $('#checkAccount').attr('disabled', false);
            return true;
        }
        else
        {
            $('#checkAccount').attr('disabled', true);
            return false;
        }
    }else{
        var helpblockError = $('#customeremail .help-block').html();
        if(email != ''){
        setTimeout( function(){
            if(helpblockError != ''){
                $('#email_status').html(email + ' is not valid');
                $('#email_status').css('color', '#a94442');
            }
          }  , 1000 );


        }
    }


});
findcountryname();
$(document).on('change', '#salesclients-country', function () {
    findcountryname();
});


//called when key is pressed in textbox
$('#salesclients-emp_size').keypress(function (e) {
 //if the letter is not digit then display error and don't type anything
 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
     //display error message
     //$('#errmsg').html('Digits Only').show().fadeOut('slow');
     return false;
 }
});

$(document).on('change', '#salesclients-industry',function(){
    var industry = $('#salesclients-industry').val();
    if(industry != '' && industry == 'Others'){
        $('#otherindustrydiv').show();
    }else{
        $('#otherindustrydiv').hide();
    }

});

function findcountryname(){
    var countryname = $('#salesclients-country').val();
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
                $('select#salesclients-country_code').html(countrycodeitems);
                $('#salesclients-country_code').val(countryValue).change();

                if(response['timezone']){
                    $('#salesclients-timezone').val(response['timezone']);
                    $('#salesclients-timezone').html(response['timezone']);
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

