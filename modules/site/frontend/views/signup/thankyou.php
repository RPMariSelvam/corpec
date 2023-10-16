<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;

?>
<style>
    .form-signup h2 {
        line-height: 1.42857143;
        font-size: 28px;
    }
</style>

<div class="form-signup">
    <div class="form-wrapper">
        <div class="panel lock-box">
            <h2 class="text-center" style="padding: 10px">Thank you for signing up, <br/> you will receive a confirmation email shortly.</h2>
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

if(!empty($product)){
    $package = $product."Package";

$this->registerJs("
    var orderid = '".$package."';
    var tagdata = {event:'trial signup success',order_id: 'retailPackage',order_value:'trial'};
    tagdata.order_id = orderid ;
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push(tagdata)

",$this::POS_READY);
}
?>
 

