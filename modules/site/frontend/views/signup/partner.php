<?php
use app\models\Country;
use app\models\Industry;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;
use yii\helpers\Url;


/*
 * @var $this luya\web\View
*/
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
        display: block;
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
    .step2input {
        display: none;
    }
    .form-signup .form-control{
        padding: 0 0 0px 30px;
    }
    .form-signup input[type="text"], .form-signup input[type="password"], .form-signup input[type="email"], .field-clients-industry, .field-clients-country, .mobileLeft {
        margin-top: 10px !important;
    }
    .form-signup {
        max-width: 550px;
    }
    .signupmail_div i {
        position: absolute;
        padding: 15px 10px;
        color: #09d57e;
        z-index: 4;
    }
    .form-group i{
        color: #09d57e;
    }
    .signupform_login-body{
        background: none;
    }

    .signupform_login-body .container{
        margin: 0px;
        padding: 0px;
        width: 100%;
    }
    .partnerclose{
        font-size: 30px;
        font-weight: bold;
        margin-right: 15px;
        line-height: 1;
        text-shadow: 0 1px 0 #fff;
    }
</style>
    <div class="form-signup" style="width: 100%;max-width: none;margin: 0px;">
        <a href="#" id="btnclosess" class="partnerclose" style="color: red; text-decoration:none; float: right; top: -28px; position: relative;">
            &times;
        </a>
        <div class="form-partner-signup-heading text-center">
            <h1 style="padding-left:36px; color: #000;">Become a Asalta Partner</h1>
        </div>
        <div class="text-center" style="font-size: 16px; color: #000;">
            Please tell us a bit about yourself by filling out the form
        </div>
        <div class="login-wrap">
            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data',
                    'class' => 'form-horizontal adminex-form'],
            ]); ?>

            <div class="signupmail_div step1input">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <?= $form->field($model, 'first_name', ['template' => "<i class='fa fa-user'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                            ->textInput(['class' => 'form-control','placeholder'=>'First Name']) ?>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <?= $form->field($model, 'last_name', ['template' => "<i class='fa fa-user'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                            ->textInput(['class' => 'form-control','placeholder'=>'Last Name']) ?>
                    </div>
                </div>
                <div id="customeremail">
                    <?= $form->field($model, 'email', ['template' => "<i class='fa fa-envelope'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                        ->textInput(['class' => 'form-control','placeholder'=>'Email']) ?>
                    <span id="email_status"></span>
                </div>
                
                <div class="form-group companyDiv">
                    <?= $form->field($model, 'company', ['template' => "<i class='fa fa-building'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                                ->textInput(['class' => 'form-control','placeholder'=>'Company Name']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'phone_no', ['template' => "<i class='fa fa-mobile-phone'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                                ->textInput(['class' => 'form-control','style' => 'margin-top:0px','placeholder'=>'Mobile']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'website', ['template' => "<i class='fa fa-life-ring'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                                ->textInput(['class' => 'form-control','style' => 'margin-top:0px','placeholder'=>'Website']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'address', ['template' => "<i class='fa fa-address-book'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                        ->textArea(['rows' => '3','class' => 'form-control','placeholder'=>'Postal Address','style' => 'height: auto !important;']) ?>
                </div>
            </div>

            <div class="form-group step1input">
                <?php
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

            <div class="signupmail_div step1input">
                <div class="form-group">
                    <?= $form->field($model, 'no_of_employees', ['template' => "<i class='fa fa-male'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                        ->textInput(['class' => 'form-control','placeholder'=>'Number Of Employees']) ?>
                </div>
            </div>

            <div class="form-group step1input">
                <?php
                    $HearAboutData = ['Facebook'=>'Facebook','Instagram'=>'Instagram','Youtube'=>'Youtube','TickTok'=>'TickTok','Twitter'=>'Twitter','Google Search'=>'Google Search','Referral'=>'Referral','Blog'=>'Blog','News'=>'News','Others'=>'Others'];
                    echo $form->field($model, 'hear_about_us')->widget(Select2::classname(), [
                        'data' => $HearAboutData,
                        'language' => 'en',
                        'options' => ['placeholder' => 'How did you hear about us?', 'class' => 'form-control'],
                        'addon' => [
                            'prepend' => [
                        'content' => Icon::show('bullhorn', ['class'=>'fa fa-bullhorn', 'framework' => Icon::FAS]) 
                            ],  
                            ]
                    ])->label('');
                ?>
            </div>

            <div class="form-group step2input">
                <?php
                    $PartnerData = ['Solution Partner'=>'Solution Partner','Affiliate Partner'=>'Affiliate Partner','Agency Partner'=>'Agency Partner'];
                    echo $form->field($model, 'partner_type')->widget(Select2::classname(), [
                        'data' => $PartnerData,
                        'language' => 'en',
                        'options' => ['placeholder' => 'Partner Type', 'class' => 'form-control'],
                        'addon' => [
                            'prepend' => [
                        'content' => Icon::show('globe', ['class'=>'fa fa-handshake-o', 'framework' => Icon::FAS]) 
                            ],  
                            ]
                    ])->label('');
                ?>
            </div>

            <div class="signupmail_div form-group step2input">
                <?= $form->field($model, 'partner_code', ['template' => "<i class='fa fa-shield'></i>\n{input}\n{error}", 'options' => ['class' => '']])
                            ->textInput(['class' => 'form-control','style' => 'margin-top:0px','placeholder'=>'Unique Identifier']) ?>
            </div>

            <!-- <a href="javascript:void(0)" id="partnernxtbtn" class="step1input btn btn-lg btn-login btn-block"> Next </a> -->
            <button id="partnernxtbtn" class="step1input btn btn-lg btn-login btn-block"> Next </button>
            
            <div class="form-group step2input">
                <div class="col-sm-8">
                    <button id="submitbtn" class="btn btn-lg btn-login btn-block">  SUBMIT </button>
                </div>
                <div class="col-sm-4">
                    <a href="javascript:void(0)" id="partnerbackbtn" class="btn btn-default" style="padding: 13px 18px 11px 18px;color: #fff;background-color: #5e5151;text-decoration: none;"> 
                        <i class="fa fa-chevron-left" style="color: #fff;font-size: 18px"></i>
                    </a>
                    <!-- <button id="partnerbackbtn" class="btn btn-lg btn-login btn-block"> Back </button> -->
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
<?php

$this->registerJs("
    $(document).on('click','#partnernxtbtn', function(e) {
        setTimeout(function(){ 
            var first_name_helpblock = $('.field-partners-first_name .help-block').text();
            var last_name_helpblock = $('.field-partners-last_name .help-block').text();
            var email_helpblock = $('.field-partners-email .help-block').text();
            var company_name_helpblock = $('.field-partners-company_name .help-block').text();
            var phone_no_helpblock = $('.field-partners-phone_no .help-block').text();
            var country_helpblock = $('.field-partners-country .help-block').text();
            var no_of_employees_helpblock = $('.field-partners-no_of_employees .help-block').text();
            if(first_name_helpblock == '' && last_name_helpblock == '' && email_helpblock == '' && company_name_helpblock == '' && phone_no_helpblock == '' && country_helpblock == '' && no_of_employees_helpblock == ''){
                $('.step1input').hide();
                $('.step2input').show();
                $('.field-partners-partner_type .help-block').text('');
                $('.field-partners-partner_type').removeClass('has-error');
                $('.field-partners-partner_code .help-block').text('');
                $('.field-partners-partner_code').removeClass('has-error');
            }
        }, 1000);   
    });
    $(document).on('click','#partnerbackbtn', function(e) {
        $('.step2input').hide();
        $('.step1input').show();
        $('#partners-partner_type').val('').change();
        $('#partners-partner_code').val('');
    });

    setTimeout(function(){ 
        $('.nicescroll-rails').hide();
    }, 10);

    $(document).on('change blur','#partners-partner_code', function(){
        var uid = $(this).val();
        var baseUrl = '".Url::base(true)."';
        if(uid != ''){
            $.ajax({
                url:baseUrl+'/site/signup/checkuniqueid?uid='+uid,
                success: function(response){
                    if(response == true){
                        $('#partners-partner_code').val('');
                        var uidtext = uid+' has already been taken.';
                        $('.field-partners-partner_code .help-block').text(uidtext);
                        $('.field-partners-partner_code').addClass('has-error');
                    }else{
                        $('.field-partners-partner_code .help-block').text('');
                        $('.field-partners-partner_code').removeClass('has-error');
                    }
                }
            });
        }
    });
    $(document).on('click','#btnclosess', function(e) {
        parent.window.$('div.addpartnerModal').modal('hide');
    });
");
$this->registerJs('

');

?>