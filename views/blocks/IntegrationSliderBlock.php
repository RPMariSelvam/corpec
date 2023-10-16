<?php
?>
<div class="row intergation_inventory_features_b">
  <h2 class="inventory_intergation_img">Connect with the best online tools</h2>
  <div  class="col-sm-12 integration_imageDiv">
    <?php if(!is_null($this->extraValue("imagearray"))){
      foreach($this->extraValue("imagearray") as $image): ?>
        <div class="intergationIcon"><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/integration")?>"><img class="indegration_inv" src="<?= $image->source ?>" alt="<?= $image->caption ?>" /></a></div>
    <?php endforeach;}?>  
  </div>
</div>