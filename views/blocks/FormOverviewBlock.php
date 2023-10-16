<?php
/**
 * @var $this \luya\cms\base\PhpBlockView
 */
$hideForm = false;
?>
<?php if ($this->varValue('emailAddress')): ?>
    <hr id="arrange_a_free_demo" >
    <section class="content-editor">
        <div class="homepageform1">
            <div class='container'>
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1 ">
                        <div class="headingform1" ><b>ARRANGE A FREE DEMO </b> – NO OBLIGATIONS</div>
                        <div class="class_price"><a class=" btn btn-default" href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=retail")?>">Start a FREE Trial Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>