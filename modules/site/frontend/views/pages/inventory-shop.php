<style>
    #inventory_shop{
        padding: 15px;
    }
    .inventory-home {
        text-align: center;
        min-height: 210px;
        background-color: #fff;
        position: relative;
        z-index: 5;
        align-content: stretch;
        justify-content: space-between;
        padding: 20px;
        border-radius: 5px;
    }
    .inventory-home a {
        color: #00142D;
    }
    .inventory-home-img {
        margin-bottom: 30px;
        margin-top: 10px;
        height: 92px;
        position: relative;
    }
    .inventory-home:hover:after {
        background-color: #b31b1d!important;
        position: absolute;
        bottom: 0px;
        content: "";
        width: 100%;
        height: 4px;
        left: 0;
    }
</style>
<?php
$country_code = strtolower((isset($_SERVER["HTTP_CF_IPCOUNTRY"]) ? $_SERVER["HTTP_CF_IPCOUNTRY"] : 'in'));
if($country_code != "sg" && $country_code != "in"){
    $country_code = "";
}
?>
<div class="container" id="inventory_shop">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
                <div class="inventory-home">
                    <a class="lineEffect" href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/ecommerce") ?>">
                        <div class="inventory-home-img">
                            <img class="imgloaded" alt="Create your store - Ready to go digital and take your business online? " data-ll-status="loaded" src="<?php echo Yii::$app->request->baseUrl; ?>/images/img1-white.png" imageName="img1">
                        </div>
                        <p><b>eCommerce</b></p>
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="inventory-home">
                    <a class="lineEffect" href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/inventory-management-software/features") ?>">
                        <div class="inventory-home-img">
                            <img class="imgloaded" alt="Social commerce - Want to generate sales from your social media platform?" data-ll-status="loaded" src="<?php echo Yii::$app->request->baseUrl; ?>/images/img2-white.png" imageName="img2">
                        </div>
                        <p><b>Retail</b></p>
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="inventory-home">
                    <a class="lineEffect" href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/b2b-ecommerce-platform") ?>">
                        <div class="inventory-home-img">
                            <img class="imgloaded" alt="POS System - Need a smarter and faster POS for your retail stores?" data-ll-status="loaded" src="<?php echo Yii::$app->request->baseUrl; ?>/images/img3-white.png" imageName="img3">
                        </div>
                        <p><b>Wholesale</b></p>
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$this->registerJs("
$('.inventory-home').on({
       mouseenter: function(){
        var imageName = $(this).find('img').attr('imageName');
        $(this).find('.imgloaded').css({'transform': 'scale(1.2)'});
        //$(this).find('.imgloaded').css({'transform': 'scale(1.2)', 'box-shadow': '0 30px 45px -15px #b31b1d'});
        //$(this).find('.imgloaded').attr('src','/images/'+imageName+'-color.png');
    },
      mouseleave: function(){
        var imageName = $(this).find('img').attr('imageName');
        $(this).find('.imgloaded').css({'transform': 'none'});
        //$(this).find('.imgloaded').css({'transform': 'none', 'box-shadow': 'none'});
        //$(this).find('.imgloaded').attr('src','/images/'+imageName+'-white.png');
    }
});
");