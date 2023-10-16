<?php
/**
 * @var $this \luya\cms\base\PhpBlockView
 */
$hideForm = false;
?>
<?php if ($this->varValue('emailAddress')): ?>
    <?php if (!$hideForm): ?>
        <section class=" content-editor ">
            <div class="product-crmform inventorybackground">
                <div class="row">
                    <div class="col-md-12">
                        <div class=" product-form-h2c"><h2>Ready to get started? or Would you like to learn more?</h2>
                        </div>
                        <div class="product-form-pc"><p>Try our free 14 day trail and see if our product is right for your business. No credit card, no hassle!</p><br></div>
                        <div class="clearfix"></div>
                        <div class="class_price"><a class=" btn btn-default" href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=inv")?>">Start a FREE Trial Now</a><p class="inv_features_ptext">No Credit Card needed</p></div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif;?>
<?php endif;?>
