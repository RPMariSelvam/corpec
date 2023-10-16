<?php
/**
 * View file for block: ImageVideosBlockBlock 
 *
 * File has been created with `block/create` command. 
 *
 * @param $this->extraValue('image');
 * @param $this->placeholderValue('image');
 * @param $this->varValue('image');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */
$this->registerJs("$('#helper-video').click(function(){
       $.fancybox.open([
           {
             href : 'https://www.youtube.com/embed/C3aN_J7POYM',
             type : 'iframe',
           }, 
         ], {
             openEffect : 'none',
             closeEffect : 'none',
             prevEffect : 'none',
             nextEffect : 'none',

             arrows : false,
             helpers : {
           }
       });
   });"); 
?>
<div class="row">
	<?php if(!is_null($this->extraValue("image"))){
      foreach($this->extraValue("image") as $image): ?>
      <img id="helper-video"  src="<?= $image->source ?>" alt="<?= $image->caption ?>" class="img-responsive inv_features_image_1" />
    <?php endforeach;}?>  
</div>

<!-- <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog asalta_retail_suite">
        <div class="modal-content">
            <div class="modal-body">
              <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
               
                <div>
                    <iframe width="100%" height="400" src=""></iframe>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-body">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" data-video-src=""  src="https://www.youtube.com/embed/PNaOzQPPCv0?autoplay=1" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
            </div>
          </div>
        </div>
    </div>
</div> -->