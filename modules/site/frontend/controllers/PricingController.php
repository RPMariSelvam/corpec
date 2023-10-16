<?php
namespace app\modules\site\frontend\controllers;

use app\modules\site\frontend\models\CrmPackageModel;
use app\modules\site\frontend\models\HrmPackageModel;
use app\modules\site\frontend\models\ImsAddons;
use app\modules\site\frontend\models\InventoryPackageModel;
use app\modules\site\frontend\models\PlanModel;
use app\modules\site\frontend\models\RetailPackageModel;
use app\modules\site\frontend\models\EcommercePackageModel;
use luya\web\Controller;
use Yii;

class PricingController extends Controller{

    const MonthlyPlanID = 2;
    const YearlyPlanID = 1;

    public function actionMultichannel()
    {
        $MonthlyPlan = PlanModel::findOne(self::MonthlyPlanID);
        $YearlyPlan = PlanModel::findOne(self::YearlyPlanID);

        $countryShortCode = strtolower(Yii::$app->composition->language);
        $countryShortCode = ($countryShortCode == "en" ? "" : $countryShortCode);
        $country = Yii::$app->params["countries"][$countryShortCode]["name"];
        $currencyName = Yii::$app->params["countries"][$countryShortCode]["currency_name"];
        $currencyCode = Yii::$app->params["countries"][$countryShortCode]["currency_code"];
        $currencySymbol = Yii::$app->params["countries"][$countryShortCode]["currency_symbol"];

        $Tier1InvPlans = ['Startup', 'Tiny', 'Enterprise Plan','Small'];
        $InvMonthlyPackages[1] = InventoryPackageModel::find()->where(["planid"=>self::MonthlyPlanID, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='IMS'")->andWhere(["name" => $Tier1InvPlans])->orderBy(["priced_monthly" => SORT_ASC])->limit(4)->all();

        $InvYearlyPackages[1] = InventoryPackageModel::find()->where(["planid"=>self::YearlyPlanID, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='IMS'")->andWhere(["name" => $Tier1InvPlans])->orderBy(["priced_monthly" =>SORT_ASC])->limit(4)->all();

        $Tier2InvPlans = ['Startup', 'Tiny', 'Enterprise Plan','Small'];
        $InvMonthlyPackages[2] = InventoryPackageModel::find()->where(["planid"=>self::MonthlyPlanID, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='IMS'")->andWhere(["name" => $Tier2InvPlans])->orderBy(["priced_monthly" =>SORT_ASC])->limit(4)->all();

        $InvYearlyPackages[2] = InventoryPackageModel::find()->where(["planid"=>self::YearlyPlanID, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='IMS'")->andWhere(["name" => $Tier2InvPlans])->orderBy(["priced_monthly" =>SORT_ASC])->limit(4)->all();

        $Tier3InvPlans = ['Huge'];
        $InvMonthlyPackages[3] = InventoryPackageModel::find()->where(["planid"=>self::MonthlyPlanID, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='IMS'")->andWhere(["name" => $Tier3InvPlans])->orderBy(["priced_monthly" =>SORT_ASC])->limit(1)->all();

        $InvYearlyPackages[3] = InventoryPackageModel::find()->where(["planid"=>self::YearlyPlanID, "country"=>$country, "status"=> '1', "deletestatus" => "No"])->andWhere("stripe_product_id IS NOT NULL AND stripe_plan_id IS NOT NULL AND `type`='IMS'")->andWhere(["name" => $Tier3InvPlans])->orderBy(["priced_monthly" =>SORT_ASC])->limit(1)->all();


        $AddonsModels = ImsAddons::find()->where(["planid"=>self::MonthlyPlanID,  "country"=>$country, "status"=> '1', "deletestatus" => "No"])->indexBy('name')->all();


        return $this->renderPartial('multichannelPricing', [
            "MonthlyPlan" => $MonthlyPlan,
            "YearlyPlan" => $YearlyPlan,

            "InvMonthlyPackages" => $InvMonthlyPackages,
            "InvYearlyPackages" => $InvYearlyPackages,

            "AddonsModels" => $AddonsModels,
            "country"=>$country,
            "countryShortCode"=>$countryShortCode,
            "currencyName"=>$currencyName,
            "currencyCode"=>$currencyCode,
            "currencySymbol"=>$currencySymbol,
        ]);
    }

    public function actionFeaturesecommerce(){
        return $this->renderPartial('ecommerceFeatures');
    }

    public function actionFeaturesinventory(){
        return $this->renderPartial('inventoryFeatures');
    }

    public function actionFeaturescrm(){
        return $this->renderPartial('crmFeatures');
    }

    public function actionFeatureshrm(){
        $countryShortCode = strtolower(Yii::$app->composition->language);
        $countryShortCode = ($countryShortCode == "en" ? "" : $countryShortCode);
        $country = Yii::$app->params["countries"][$countryShortCode]["name"];
        return $this->renderPartial('hrmFeatures', [
            "country"=>$country,
            "countryShortCode"=>$countryShortCode,
        ]);
    }

    public function actionFeaturespos(){
        return $this->renderPartial('posFeatures');
    }

    public function actionFaq(){
        return $this->renderPartial('frequentlyaskedQuestions');
    }
    /*Velan*/
    public function actionQiscus(){
        return $this->renderPartial('qiscusasalta');
    }
}