<?php
  $geo_reader = new \GeoIp2\Database\Reader(Yii::$app->basePath . '/resources/geoip2/GeoLite2-Country.mmdb');

  $user_ip = Yii::$app->request->getUserIP();
  //var_dump($user_ip); die;
  if ($user_ip == "127.0.0.1" || $user_ip == "::1") {
    $user_ip = "171.49.190.43";//Local IP
  }
  $geo_result = $geo_reader->country($user_ip);
  //$geo_result = $geo_reader->country("121.6.180.69"); // singapore IP 121.6.180.69  US 72.229.28.185
  $country_isoCode = $geo_result->country->isoCode;
  $country_name = $geo_result->country->name;

  $currenturl = Yii::$app->request->url;

?>
<div class="asalta_retail-suite_image_block">
  <div class="row">
    <div class="col-sm-12">
      <?php if($country_isoCode=='IN' && $country_name=='India' ){ ?>
      <img type="button" src="<?php echo Yii::$app->request->baseUrl; ?>/images/inventory-banner-in-play.png" alt="Asalta_Retail-Suite" class="img-responsive inv_features_image_1" data-toggle="modal" data-target="#myModal">
      <?php }else if($country_isoCode=='SG' && $country_name=='Singapore' ){ ?>
      <img type="button" src="<?php echo Yii::$app->request->baseUrl; ?>/images/inventory-banner-sg-play.png" alt="Asalta_Retail-Suite" class="img-responsive inv_features_image_1" data-toggle="modal" data-target="#myModal">
      <?php }else{ ?>
      <img type="button" src="<?php echo Yii::$app->request->baseUrl; ?>/images/inventory-banner-sg-play.png" alt="Asalta_Retail-Suite" class="img-responsive inv_features_image_1" data-toggle="modal" data-target="#myModal">
      <?php } ?>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" id="iframeYoutube" src="https://www.youtube.com/embed/PNaOzQPPCv0?rel=0" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>