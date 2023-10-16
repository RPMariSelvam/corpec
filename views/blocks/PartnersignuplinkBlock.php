<?php
/**
 * View file for block: PartnersignuplinkBlock 
 *
 * File has been created with `block/create` command. 
 *
 *
 * @var $this \luya\cms\base\PhpBlockView
 */
$this->registerCss("
    #addpartnerIframe{ 
        min-height:322px !important;
        width: 100% !important;
        border: 0px;
    }
    @media screen and (-webkit-min-device-pixel-ratio:0) {
       #addpartnerIframe{ min-height:608px !important; }
    }
    .modal-open .modal.addpartnerModal{
        overflow: hidden !important;
    }
", [], "addPartnerModalCss");
?>
<div class="modal fade bd-example-modal-md addpartnerModal" id="" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" style="margin-top:0px">
    <div class="modal-content" style="background: white;">
        <div class="modal-body">
        </div>
    </div>
  </div>
</div>
<div class="partner_apply_signup" style="text-align: center;">
    <a class="btn btn-default addnewpartner" href="#">Become our Partner</a>
</div>
<?php
$this->registerJs("
    $('div.addpartnerModal').eq(0).remove();
    $('div.addpartnerModal').appendTo('body');
    $('a.addnewpartner').click(function(e){
        e.preventDefault();
        $('div.addpartnerModal').modal('show');
        var partnerurl = '" . \Yii::$app->urlManager->createAbsoluteUrl("/bepartner") ."';
        var eventiframe = '<iframe id=\'addpartnerIframe\' src='+partnerurl+'></iframe>';
        $('div.addpartnerModal .modal-body').html(eventiframe).css({width: '100%', display: 'block'});
        return false;
    })
", $this::POS_READY, "addPartnerModalJs");
?>