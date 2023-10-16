<?php
/**
 * View file for block: HrmIntegrationBlock 
 *
 * File has been created with `block/create` command. 
 *
 * @param $this->extraValue('hrmimage');
 * @param $this->varValue('hrmimage');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */
?>
<div class="row intergation_inventory_features_b">
  <h2 class="inventory_intergation_img">Connect with the best online tools</h2>
  <div  class="col-sm-12  indegration_hrm_div">
    <?php if(!is_null($this->extraValue("hrmimage"))){
      foreach($this->extraValue("hrmimage") as $image): ?>
      <div class="intergationIcon"><a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/integration")?>"><img class="indegration_hrm slick-tr1ck-trusted-by-brands" src="<?= $image->source ?>"alt="<?= $image->caption ?>"  /></a>
      </div>
    <?php endforeach;}?>  
  </div>
</div>