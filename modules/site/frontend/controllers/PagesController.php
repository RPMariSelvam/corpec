<?php


namespace app\modules\site\frontend\controllers;


use luya\web\Controller;

class PagesController extends Controller {

    public function actionIntegrations()
    {
        return $this->renderPartial('integrations', []);
    }

    public function actionCorefeatures()
    {
        return $this->renderPartial('corefeatures', []);
    }

    public function actionInventoryshop()
    {
        return $this->renderPartial('inventory-shop', []);
    }
    public function actionFaq()
    {
        return $this->renderPartial('faq', []);
    }

    public function actionSolutions()
    {
        return $this->renderPartial('solutions', []);
    }

}