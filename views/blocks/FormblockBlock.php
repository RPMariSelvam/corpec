<?php
/**
 * @var $this \luya\cms\base\PhpBlockView
*/
$hideForm = false;
?>
<?php if ($this->varValue('emailAddress')): ?>
    <section class=" content-editor ">
        <div class="homepageform1">
            <div class='container'>
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1">
                        <div class="headingform1"><b>START A 14 DAY FREE TRIAL</b> – NO PESKY CREDIT CARD REQUIRED</div>
                        <div class="class_price"><a class=" btn btn-default" href="<?=$this->publicHtml;?>/signup?product=retail">Start a FREE Trial Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
