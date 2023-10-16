<?php
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$hideForm = false;
?>
<?php if ($this->varValue('emailAddress')): ?>
    <?php if (!$hideForm): ?>
        <section class=" content-editor ">
            <div class="support-form ">
                <div class='container'>
                    <div class="row">
                        <div class="col-xs-12 col-sm-10">
                            <div class="support-form-h2"><h2>Welcome to Asalta Support!</h2>
                            </div>
                            <div class="support-form-h4"><p>Enter your queries below. Give us as many details as possible <br>on your query so we can resolve it as soon as possible.</p><br></div>
                            <div class="col-sm-2"></div><div class="col-sm-10">
                               
                                <?=$this->varValue('headline', null, '<h3>{{headline}}</h3>');?>
                                 
                                    <?php if ($this->extraValue('mailerResponse') == 'success'){
                                        $this->registerJs('$("#supportform").focus();');
                                        $hideForm = false;
                                    ?>

                                        <div class="alert alert-success alertcheck ">
                                            <p><strong>Thank you for contacting us!</strong><br>We have received your request. Our friendly support team will get back to you within 48 working hours. Thank you for your kind patience</p>
                                        </div>
                                    <?php }else if(!empty($this->extraValue('mailerResponse'))){ ?>
                                        <div class="alert alert-danger alertcheck">
                                            <?=$this->extraValue('sendError');?>
                                        </div>
                                    <?php }else if(!empty($_POST)){
                                        $this->registerJs('$("#supportform").focus();'); 
                                    ?> 
                                    <div class="alert alert-danger alertcheck">There was a problem with your submission. Errors are marked below.</div>
                                <?php } ?> 
                            </div>
                            <form class="form-horizontal" role="form" method="post">
                                <input type="hidden" name="_csrf" value="<?=$this->extraValue('csrf');?>" />
                                <div class="row">
                                    <div class="simple-conversion support-form-row">
                                        <div class="col-sm-12">
                                            <div class="form-group input-container">
                                                
                                                <div class="col-sm-7 "> <i class="fa fa-user"></i>
                                                    <input type="text"id="supportform" class="form-control  <?= (!$this->extraValue('nameErrorFlag')) ? 'red' : '' ?>"  name="name" placeholder="Name" value="<?= isset($_POST['name']) ? $_POST['name'] : '';?>">
                                                    <?php if (!$this->extraValue('nameErrorFlag')): ?>
                                                        <p class="text-danger">Enter Your Name</p>
                                                    <?php endif;?> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group input-container">
                                                <div class="col-sm-7">
                                                     <i class="fa fa-envelope "></i>
                                                    <input type="email" class="form-control  <?= (!$this->extraValue('emailErrorFlag')) ? 'red' : '' ?>" id="email" name="email" placeholder="Customer Login Email" value="<?= isset($_POST['email']) ? $_POST['email'] : '';?>">
                                                    <?php
                                                    $emailErr ="";
                                                    $email="";
                                                    if (empty($_POST["email"])) {
                                                        $emailErr = "Email is required";
                                                    } 
                                                    else {
                                                        $email =$_POST["email"];
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
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group input-container">
                                                <div class="col-sm-7">
                                                    <i class="fa fa-building-o"></i>
                                                    <input type="text" class="form-control <?= (!$this->extraValue('organisationnameErrorFlag')) ? 'red' : '' ?>" id="organisationname" name="organisationname" placeholder="Organisation Name" value="<?= isset($_POST['organisationname']) ? $_POST['organisationname'] : '';?>">
                                                    <?php 
                                                        if (!$this->extraValue('organisationnameErrorFlag')): ?>
                                                        <p class="text-danger"> Enter Your Organisation Name </p>
                                                    <?php endif;?> 
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-sm-12">
                                            <div class="form-group input-container">
                                                <div class="col-sm-7  contactnumber_phone"><i class="fa fa-mobile"></i>
                                                    <input type="text" class="form-control <?= (!$this->extraValue('contactnumberErrorFlag')) ? 'red' : '' ?>" id="contactnumber" name="contactnumber" placeholder="Contact Number" value="<?= isset($_POST['contactnumber']) ? $_POST['contactnumber'] : '';?>">
                                                    <?php if (!$this->extraValue('contactnumberErrorFlag')): ?>
                                                    <p class="text-danger">Enter Your Contact Number</p>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-sm-12">
                                            <div class="form-group input-container">
                                                <div class="col-sm-7">
                                                   <i class="fa fa-life-bouy"></i>
                                                    <input type="text" class="form-control <?= (!$this->extraValue('projecttitleErrorFlag')) ? 'red' : '' ?>" id="projecttitle" name="projecttitle" placeholder="Support Title" value="<?= isset($_POST['projecttitle']) ? $_POST['projecttitle'] : '';?>">
                                                    <?php 
                                                        if (!$this->extraValue('projecttitleErrorFlag')): ?>
                                                        <p class="text-danger"> Enter Your Support Title</p>
                                                    <?php endif;?> 
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-sm-12">
                                            <div class="form-group input-container">
                                                <div class="col-sm-7">
                                                    <i class="fa fa-user-secret"></i>
                                                    <select  class="form-control <?= (!$this->extraValue('priorityErrorFlag')) ? 'red' : '' ?> " id="priority" name="priority"  >
                                                        <option  disabled selected value="<?= isset($_POST['priority']) ? $_POST['priority'] : '';?>"> Select Your Priority</option>
                                                        <option  value="Low" >Low</option>
                                                        <option  value="Medium" >Medium</option>
                                                        <option  value="High" >High</option>
                                                        <option  value="Urgent" >Urgent</option>
                                                    </select>
                                                    <?php if (!$this->extraValue('priorityErrorFlag')): ?>
                                                    <p class="text-danger">Select Your Priority </p>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 ">
                                            <div class="form-group input-container">
                                                <div class="col-sm-7 message_contact"> <i class="fa fa-comments"></i>
                                                    <textarea rows="4" class="form-control <?= (!$this->extraValue('projecttitleErrorFlag')) ? 'red' : '' ?>" id="message" name="message" placeholder="Description"></textarea>
                                                     <?php  if (!$this->extraValue('messageErrorFlag')): ?>
                                                    <p class="text-danger">Enter Your Description</p>
                                                    <?php endif;?> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row recaptcha">
                                            <div class="col-sm-12 ">
                                                <div class="form-group input-container">
                                                    <div  class="col-sm-7">
                                                       <div id="re_captcha" class="g-recaptcha <?= (!$this->extraValue('recaptchaErrorFlag')) ? 'error' : '' ?>" data-sitekey="<?= Yii::$app->params["GOOGLE_RECAPTCHA_SITEKEY"] ; ?>"></div>
                                                        <span class="msg-error error"></span>
                                                        <input type="hidden" name="recaptcha" id="recaptcha" value="0" />
                                                        <?php if (!$this->extraValue('recaptchaErrorFlag')): ?>
                                                            <p class="light-text">The reCAPTCHA was not entered correctly<?= $this->extraValue('recaptchaError'); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group" style="text-align: center;">
                                                <div class="col-sm-12">
                                                    <input id="submit" name="submit" type="submit" value="<?=$this->extraValue('sendLabel');?>" class="btn btn-primary sendbutton">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif;?>
<?php endif;?>
<script src="//www.google.com/recaptcha/api.js"></script>
