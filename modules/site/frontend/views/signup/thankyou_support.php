<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;

?>
<style>
    .form-signup h3 {
        line-height: 1.42857143;
        /*font-size: 28px;*/
    }
</style>

<div class="form-signup">
    <div class="form-wrapper">
        <div class="panel lock-box">
            <h2 class="text-center" style="padding: 10px">Thank you for your request.<br/></h2>
            <h3 class="text-center" style="padding: 10px">Our Sales team will contact you to know your Preferred Date and Time for the demo soon.</h3>
            <div class="row">
                <div class="row">
                    <div class="">
                        <section class="">
                            <div class="text-center">
                                <i class="fa fa-thumbs-up" aria-hidden="true" style="font-size:200px;margin: 8% 0;"></i>
                            </div>
                            <div class="panel-body">
                                <div class="form">
                                    <div class="form-group text-center">



                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
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
 

