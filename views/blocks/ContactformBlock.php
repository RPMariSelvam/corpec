
<?php
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/**
 * @var $this \luya\cms\base\PhpBlockView
*/
$enquirytype = yii::$app->request->get('enquiry');
$hideForm = false;

if($enquirytype == 'Sales_Enquiry'){
    $this->title = 'Sales Enquiry | End to End Business Automation Software - Asalta Contact Us';
    $this->registerMetaTag(['name' => 'description', 'content' => 'Contact Asalta technologies and get our support over telephone or email.  Asalta Technologies team works 24/7 to help you in every step.'], 'metaDescription');
}elseif($enquirytype == 'Press_Media'){
    $this->title = 'Press Media | End to End Business Automation Software - Asalta Contact Us';
    $this->registerMetaTag(['name' => 'description', 'content' => 'Find contact information for Asalta technologies sales enquiries, technical support and contact us through Phone : +65 82848659 Email : info@asalta.com'], 'metaDescription');
}

?>
<?php if ($this->varValue('emailAddress')): ?>
    <div class="col-sm-10 contactform_background" >
        <div class="row">
            <div class="col-sm-12 contactform_h2">  <h2>Get in touch with us</h2></div>   
        </div>
        <?=$this->varValue('headline', null, '<h3>{{headline}}</h3>');?>
            <?php if ($this->extraValue('mailerResponse') == 'success'){
                $this->registerJs('$("#contactformsite").focus();');
                $hideForm = false;
            ?>
           
            <div class="alert alert-success alertcheck ">
                <?=$this->extraValue('sendSuccess');?>
            </div>
            <?php }else if(!empty($this->extraValue('mailerResponse'))){?>           
            <div class="alert alert-danger alertcheck">
                <?=$this->extraValue('sendError');?>
            </div>
            <?php }else if(!empty($_POST)){  $this->registerJs('$("#contactformsite").focus();'); ?> 
            <div class="alert alert-danger alertcheck" >There was a problem with your submission. Errors are marked below.</div>
        <?php } ?>  
        <div class="contactform" >
            <div class="clearfix"></div>
            <form class="form-horizontal" role="form" method="post">
                <input type="hidden" name="_csrf"  value="<?= $this->extraValue('csrf'); ?>" />
                <div class="input-container">
                    <div class="col-sm-12 contactform-textbox">  <i class="fa fa-user"></i>
                        <input type="text" id="contactformsite" class="form-control   <?= (!$this->extraValue('nameErrorFlag')) ? 'red' : '' ?>"  name="name" placeholder="First Name " value="<?= Yii::$app->request->post('name') ? Yii::$app->request->post('name') : Yii::$app->request->get('name', '');?>">
                        <?php if (!$this->extraValue('nameErrorFlag')): ?>
                        <p class="text-danger">Enter Your First Name</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="input-container">
                    <div class="col-sm-12 contactform-textbox"> <i class="fa fa-user"></i>
                        <input type="text"  class="form-control  <?= (!$this->extraValue('nameErrorFlag')) ? 'red' : '' ?>" id="lastname" name="lastname" placeholder="Last Name" value="<?= Yii::$app->request->post('lastname') ? Yii::$app->request->post('lastname') : Yii::$app->request->get('lastname', '');?>">
                        <?php if (!$this->extraValue('nameErrorFlag')): ?>
                            <p class="text-danger">Enter Your Last Name</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="input-container">
                    <div class="col-sm-12 contactform-textbox">
                        <i class="fa fa-envelope "></i>
                        <input type="email" class="form-control <?= (!$this->extraValue('emailErrorFlag')) ? 'red' : '' ?>" id="email" name="email" placeholder="<?= $this->extraValue('emailPlaceholder'); ?>" value="<?= Yii::$app->request->post('email') ? Yii::$app->request->post('email') : Yii::$app->request->get('email', '');?>">
                        <?php
                            $emailErr ="";
                            $email = Yii::$app->request->post('email') ? Yii::$app->request->post('email') : Yii::$app->request->get('email', '');
                            if (empty($_POST["email"])) {
                                $emailErr = "Email is required";
                            } else if (!empty($email)){
                                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                    $emailErr = "Invalid email format"; 
                                }
                            }
                            if (isset($_POST["email"])) {
                        ?>
                        <p class="text-danger"> <?php echo $emailErr;?></p>
                    <?php } ?>
                    </div>
                </div>
                <div class="input-container">
                    <div class="col-sm-12 contactform-textbox">
                        <i class="fa fa-user-secret"></i>
                        <select  class="form-control <?= (!$this->extraValue('typeofqueryErrorFlag')) ? 'red' : '' ?> " id="typeofquery" name="typeofquery"  >
                            <option  value="<?= isset($_POST['typeofquery']) ? $_POST['typeofquery'] : '';?>" disabled selected> Type Of Query</option>
                            <option  value="Sales Enquiry" <?= $enquirytype == 'Sales_Enquiry' ? ' selected="selected"' : '';?>>Sales Enquiry</option>
                            <option  value="Press Media" <?= $enquirytype == 'Press_Media' ? ' selected="selected"' : '';?>>Press & Media</option>
                        </select>
                        <?php if (!$this->extraValue('typeofqueryErrorFlag')): ?>
                        <p class="text-danger">Select Your Query </p>
                        <?php endif;?>
                    </div>
                </div>
                <div class="input-container">
                    <div class="col-sm-12 contactform-textbox contactnumber_phone">
                        <i class="fa fa-mobile"></i>
                        <input type="text"  class="form-control  <?= (!$this->extraValue('contactnumberErrorFlag')) ? 'red' : '' ?>" id="contactnumber" name="contactnumber" placeholder="Phone Number" value="<?= Yii::$app->request->post('contactnumber') ? Yii::$app->request->post('contactnumber') : Yii::$app->request->get('contactnumber', '');?>">
                        <?php if (!$this->extraValue('contactnumberErrorFlag')): ?>
                            <p class="text-danger">Enter Your Phon Number</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 contactform-textbox message_contact">
                        <i class="fa fa-comments"></i>
                        <textarea class="form-control trxt  <?= (!$this->extraValue('messageErrorFlag')) ? 'red' : '' ?>" placeholder="  Message" rows="5" name="message"><?= isset($_POST['message']) ? $_POST['message'] : '';?></textarea>
                        <?php if (!$this->extraValue('messageErrorFlag')): ?>
                            <p class="text-danger"><?= $this->extraValue('messageError'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 contactform-textbox" id="contactrecaptcha">
                       <div id="re_captcha" class="g-recaptcha trxt <?= (!$this->extraValue('recaptchaErrorFlag')) ? 'error' : '' ?>" data-sitekey="<?= Yii::$app->params["GOOGLE_RECAPTCHA_SITEKEY"] ; ?>"></div>
                       <span class="msg-error error"></span>
                        <input type="hidden" name="recaptcha" id="recaptcha"  value="0" />
                        <?php if (!$this->extraValue('recaptchaErrorFlag')): ?>
                            <p class="text-danger">The reCAPTCHA was not entered correctly<?= $this->extraValue('recaptchaError'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 contactform_btn">
                        <input id="submit" name="submit" type="submit"  value="<?= $this->extraValue('sendLabel'); ?>" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>

<script src="//www.google.com/recaptcha/api.js"></script>
