<?php

namespace app\modules\site\frontend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "amc_hrm_package".
 *
 * @property integer $hrm_packageid
 * @property integer $planid
 * @property string $name
 * @property string $description
 * @property integer $parent_packageid
 * @property string $priced_monthly
 * @property string $stripe_product_id
 * @property string $stripe_plan_id
 * @property int $ims_product_id
 * @property string $basic_hris
 * @property string $emp_self_service
 * @property string $leave_management
 * @property string $mobile_application
 * @property string $timesheet
 * @property string $claims_management
 * @property string $third_party_integrations
 * @property string $shift_roster
 * @property string $progression
 * @property string $report_integration
 * @property string $time_in_out
 * @property string $commission_management
 * @property string $gps_location_tracking
 * @property string $feedback_form
 * @property string $performance_review
 * @property string $multi_organization
 * @property string $recruitment
 * @property string $corparate_training
 * @property string $face_id
 * @property string $payroll_processing
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deletestatus
 *
 * @property PlanModel $plan
 */
class HrmPackageModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'amc_hrm_package';
    }

    public static function getDb()
    {
        return Yii::$app->get("hrmdb");
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['planid','name','country'], 'required'],
            [['hrm_packageid', 'planid', 'parent_packageid', 'created_by', 'updated_by'], 'integer'],
            [['description', 'basic_hris', 'emp_self_service', 'leave_management', 'mobile_application', 'timesheet', 'claims_management', 'third_party_integrations', 'shift_roster', 'progression', 'report_integration', 'time_in_out', 'commission_management', 'gps_location_tracking', 'feedback_form', 'performance_review', 'multi_organization', 'recruitment', 'corparate_training', 'face_id', 'payroll_processing', 'status', 'deletestatus','priced_monthly','stripe_product_id', 'stripe_plan_id'], 'string'],
            [['discount'], 'number'],
            [['created_at', 'updated_at','discount','country', 'ims_product_id'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['planid'], 'exist', 'skipOnError' => true, 'targetClass' => PlanModel::className(), 'targetAttribute' => ['planid' => 'planid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hrm_packageid' => 'Hrm Packageid',
            'planid' => 'Planid',
            'name' => 'Name',
            'description' => 'Description',
            'parent_packageid' => 'Parent Packageid',
            'priced_monthly' => 'Priced Monthly',
            'basic_hris' => 'Basic Hris',
            'emp_self_service' => 'Emp Self Service',
            'leave_management' => 'Leave Management',
            'mobile_application' => 'Mobile Application',
            'timesheet' => 'Timesheet',
            'claims_management' => 'Claims Management',
            'third_party_integrations' => 'Third Party Integrations',
            'shift_roster' => 'Shift Roster',
            'progression' => 'Progression',
            'report_integration' => 'Report Integration',
            'time_in_out' => 'Time In Out',
            'commission_management' => 'Commission Management',
            'gps_location_tracking' => 'Gps Location Tracking',
            'feedback_form' => '360 Feedback',
            'performance_review' => 'Performance Review',
            'multi_organization' => 'Multi Organization',
            'recruitment' => 'Recruitment',
            'corparate_training' => 'Corparate Training',
            'face_id' => 'Face ID',
            'payroll_processing' => 'Payroll Processing',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'deletestatus' => 'Deletestatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(PlanModel::className(), ['planid' => 'planid']);
    }

    public function getDiscountedPrice(){
        $discountPercent = isset(Yii::$app->params["asaltahrmdiscount"])? Yii::$app->params["asaltahrmdiscount"] :0;
        $discountedAmount = round($this->priced_monthly - ($this->priced_monthly * $discountPercent / 100), 2);
        if($discountedAmount < 0.98){
           return Yii::$app->formatter->asDecimal(0.48 ,2);
        }
        if(floor($discountedAmount) == floor($this->priced_monthly)){
           return Yii::$app->formatter->asDecimal((int)$discountedAmount + 0.48 ,2);
        }
        return Yii::$app->formatter->asDecimal((int)$discountedAmount + 0.98, 2);    
    }
}
