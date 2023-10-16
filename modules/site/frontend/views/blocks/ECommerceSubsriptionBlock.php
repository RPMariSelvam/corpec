<?php
/**
 * View file for block: ECommerceSubsriptionBlock 
 *
 * File has been created with `block/create` command. 
 *
 * @param $this->varValue('eCommerceSubsription');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */
?><div class="ecommerceSubsriptionBlock" style="text-align: right;">
    <a class="btn" href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/signup?product=inv")?>">Available with Subscription of Inventory Package</a>
</div>