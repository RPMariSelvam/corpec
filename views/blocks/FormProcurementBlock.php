<?php
/**
 * @var $this \luya\cms\base\PhpBlockView
 */
$hideForm = false;
?>
<?php if ($this->varValue('emailAddress')): ?>
    <?php if (!$hideForm): ?>
        <section class="content-editor">
            <div class="product-crmform">
                <div class='container'>
                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-1">
                            <div class="product-form-h2"><h2>Ready to get started? or Would you like to learn more?</h2>
                            </div>
                            <div class="product-form-p"><p>Try our free 14 day trail and see if our product is right for your business. No credit card, no hassle!</p><br></div>
                            <div class="col-xs-10 col-xs-offset-2">
                                <?=$this->varValue('headline', null, '<h3>{{headline}}</h3>');?>
                                    <?php if ($this->extraValue('mailerResponse') == 'success'){
                                        $this->registerJs('$("#procurocurement").focus();');
                                        $hideForm = false;
                                    ?>
                                        <div class="alert alert-success alertcheck ">
                                            <?=$this->extraValue('sendSuccess');?>
                                        </div>
                                    <?php }else if(!empty($this->extraValue('mailerResponse'))){ ?>
                                        <div class="alert alert-danger alertcheck">
                                            <?=$this->extraValue('sendError');?>
                                        </div>
                                    <?php }else if(!empty($_POST)){
                                    $this->registerJs('$("#procurocurement").focus();'); ?> 
                                    <div class="alert alert-danger alertcheck">There was a problem with your submission. Errors are marked below.</div>
                                <?php } ?> 
                            </div>
                            <div class="clearfix"></div>
                            <form class="form-horizontal" method="post">
                                <input type="hidden" name="_csrf" value="<?=$this->extraValue('csrf');?>" />
                                <div class="row">
                                    <div class="simple-conversion products-form-div ">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                    <input type="text" id="procurocurement" class="form-control  <?= (!$this->extraValue('nameErrorFlag')) ? 'red' : '' ?>" id="name" name="name" placeholder="Name" value="<?= isset($_POST['name']) ? $_POST['name'] : '';?>">
                                                    <?php if (!$this->extraValue('nameErrorFlag')): ?>
                                                        <p class="text-danger">Enter Your Name</p>
                                                    <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <input type="email" class="form-control  <?= (!$this->extraValue('emailErrorFlag')) ? 'red' : '' ?>" id="email" name="email" placeholder="Email Address" value="<?= isset($_POST['email']) ? $_POST['email'] : '';?>">
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
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                    <input type="text" class="form-control  <?= (!$this->extraValue('messageErrorFlag')) ? 'red' : '' ?>" id="message" name="message" placeholder="Company Name" value="<?= isset($_POST['message']) ? $_POST['message'] : '';?>">
                                                    <?php if (!$this->extraValue('messageErrorFlag')): ?>
                                                    <p class="text-danger">Enter Your Company Name</p>
                                                    <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                    <input type="text" class="form-control  <?= (!$this->extraValue('contactnumberErrorFlag')) ? 'red' : '' ?>" id="contactnumber" name="contactnumber" placeholder="Contact Number" value="<?= isset($_POST['contactnumber']) ? $_POST['contactnumber'] : '';?>">
                                                    <?php if (!$this->extraValue('contactnumberErrorFlag')): ?>
                                                    <p class="text-danger">Enter Your Contact Number</p>
                                                    <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="row recaptcha">
                                            <div class="col-md-3 col-sm-3"></div>
                                            <div class="col-sm-12 col-md-4 form-recaptcha">
                                                <div id="re_captcha" class="g-recaptcha <?= (!$this->extraValue('recaptchaErrorFlag')) ? 'error' : '' ?>" data-sitekey="6LeydXkUAAAAAJxT0vWZLdX9u1V57MNqcUgiIn_z"></div>
                                                <span class="msg-error error"></span>
                                                <input type="hidden" name="recaptcha" id="recaptcha" value="0" />
                                                <?php if (!$this->extraValue('recaptchaErrorFlag')): ?>
                                                    <p class="text-danger">The reCAPTCHA was not entered correctly<?= $this->extraValue('recaptchaError'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-submit-button">
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
