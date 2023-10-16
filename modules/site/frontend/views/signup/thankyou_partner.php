<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;

?>
<style>
    .form-signup h3 {
        line-height: 1.42857143;
    }
    .form-signup {
        max-width: 420px;
    }
</style>

<div class="form-signup" style="max-width: 480px;">
    <div class="form-wrapper">
        <div class="panel lock-box">
            <!-- <h2 class="text-center" style="padding: 10px">Thank you for Become Partner.<br/></h2> -->
            <div class="row">
                <section class="">
                    <div class="text-center" style="padding-top: 10px">
                        <i class="fa fa-thumbs-up" aria-hidden="true" style="font-size:50px;"></i>
                    </div>
                    <div class="panel-body">
                        <h3 class="text-center" style="padding: 10px">Thank you for signing up for Asalta's partner program.</h3>
                        <h3 class="text-center" style="padding: 10px">Our partner manager will be in touch with you within the next 5 working days.</h3>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<?php
if(!empty($package)){

$this->registerJs("
    var orderid = '".$package."';
    var tagdata = {event:'trial signup success',order_id: 'retailPackage',order_value:0};
    tagdata.order_id = orderid ;
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push(tagdata)

",$this::POS_READY);
}
?>
 

