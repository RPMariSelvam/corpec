<?php
//$this->registerCssFile('//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css');
$this->registerJs("$('.responsive').slick({
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});"); 
?>
<section id="themo_thumbnail_slider_2" class=" content-editor slider2 col-sm-12">
  <div class='container '>
    <div class="row slidre-trusted-lf">
      <h3 class="slider2text col-sm-12 ">Trusted By Brands</h3>
      <div  class="col-sm-10 col-sm-offset-2 col-xs-10 col-xs-offset-2">
        <div class="responsive col-sm-12 text-centertrusted-by-brands-slider">
          <?php if (!is_null($this->extraValue("image"))) {
            foreach ($this->extraValue("image") as $image): ?>
            <div><img class="slick-tr1ck-trusted-by-brands" src="<?=$image->source?>"  alt="<?= $image->caption ?>"/></div>
          <?php endforeach;}?>
        </div>
      </div>
    </div>
  </div>
</section>