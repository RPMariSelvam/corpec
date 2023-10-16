<?php
namespace app\modules\site\frontend\controllers;

use app\modules\site\frontend\models\EmailBlacklistModel;
use Yii;
use yii\filters\VerbFilter;
use yii\rest\Controller;
use yii\web\Response;

class AwssesController extends Controller{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['post'],
                ],
            ]
        ];
    }


    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->getRequest()->getRawBody();
        $data = json_decode($data, true);
        $headers = Yii::$app->getRequest()->getHeaders();

        //Yii::warning($data);
        //Yii::warning($headers);

        if(isset($headers['x-amz-sns-message-type']) && $headers['x-amz-sns-message-type'] == 'SubscriptionConfirmation'){
            //Yii::warning("SubscriptionConfirmation came!");
            if(!empty($data["SubscribeURL"])){
                //Yii::warning("Subscribed!");
                file_get_contents($data["SubscribeURL"]);
            } else {
                //Yii::warning("Not Subscribed!");
            }
        }

        if(isset($headers['x-amz-sns-message-type']) && $headers['x-amz-sns-message-type'] == 'Notification'){
            switch($data['notificationType']){
                case 'Bounce':
                    $bounce = $data['bounce'];
                    foreach ($bounce['bouncedRecipients'] as $bouncedRecipient){
                        $emailAddress = $bouncedRecipient['emailAddress'];
                        $EmailBlacklistModel = EmailBlacklistModel::find()->where(['email' => $emailAddress])->one();
                        if($EmailBlacklistModel){
                            $EmailBlacklistModel->attempts += 1;
                            $EmailBlacklistModel->type = "Bounce";
                            $EmailBlacklistModel->save(false);
                        } else {
                            $EmailBlacklistModel = new EmailBlacklistModel();
                            $EmailBlacklistModel->email = $emailAddress;
                            $EmailBlacklistModel->attempts = 1;
                            $EmailBlacklistModel->type = "Bounce";
                            $EmailBlacklistModel->save(false);
                        }
                    }
                    break;
                case 'Complaint':
                    $complaint = $data['complaint'];
                    foreach($complaint['complainedRecipients'] as $complainedRecipient){
                        $emailAddress = $complainedRecipient['emailAddress'];
                        $EmailBlacklistModel = EmailBlacklistModel::find()->where(['email' => $emailAddress])->one();
                        if($EmailBlacklistModel){
                            $EmailBlacklistModel->attempts += 1;
                            $EmailBlacklistModel->type = "Complaint";
                            $EmailBlacklistModel->save(false);
                        } else {
                            $EmailBlacklistModel = new EmailBlacklistModel();
                            $EmailBlacklistModel->email = $emailAddress;
                            $EmailBlacklistModel->attempts = 1;
                            $EmailBlacklistModel->type = "Complaint";
                            $EmailBlacklistModel->save(false);
                        }
                    }
                    break;
                default:
                    // Do Nothing
                    break;
            }
        }

        return ['status' => 200, "message" => 'success'];


    }
}