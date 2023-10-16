<?php
namespace app\modules\site\frontend\controllers;

use luya\web\Controller;
use Yii;
use yii\web\Response;

class PromoController extends Controller
{
    public function actionIndex(){
        $this->layout = "@app/views/layouts/signup";
        return $this->render('index');
    }
}