<?php

?>
<div class="row home_integration_image_div">
    <div  class="col-sm-12">
        <div ><a href="<?=$this->publicHtml;?>/integration" ><h3 class="home_integration_text">We integrate seamlessly with many best apps</h3></a></div>
    </div>
    <div class="col-md-12 integration_imageDiv" >
        <?php if(!is_null($this->extraValue("image"))){
          foreach($this->extraValue("image") as $homeimage): ?>
          	<div class="intergationIcon">
          		<a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/integration")?>"> <img class="homepage_intergation" src="<?= $homeimage->source ?>" alt="<?= $homeimage->caption ?>" /></a>
          	</div>

        <?php endforeach;}?>
    <br>
<br>
  	</div>
    <a  href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/integration")?>">
      <b>  <p style="text-align: center">Learn more about integrations</p> </b>
    </a>
</div>