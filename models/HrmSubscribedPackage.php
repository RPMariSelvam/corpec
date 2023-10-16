<?php

namespace app\models;

use app\models\AmcCompanies;
use Yii;

/**
 * This is the model class for table "{{%subscribed_package}}".
 *
 * @property integer $id
 * @property string $package_name
 * @property string $plan_name
 * @property integer $trial_days
 * @property integer $free_period
 * @property string $period_time
 * @property string $priced_monthly
 * @property string $discount
 * @property string $country
 * @property string $is_retail
 * @property integer $numof_employees
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
 * @property string $start_date
 * @property string $end_date
 * @property string $stripe_customer_id
 * @property string $stripe_plan_id
 * @property string $stripe_subscription_id
 * @property string $stripe_invoice_id
 * @property integer $companyid
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Companies $company
 */
class HrmSubscribedPackage extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return \Yii::$app->hrmdb; // HRM DB
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%subscribed_package}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trial_days', 'free_period', 'numof_employees', 'companyid'], 'integer'],
            [['priced_monthly'], 'number'],
            [['basic_hris', 'emp_self_service', 'leave_management', 'mobile_application', 'timesheet', 'claims_management', 'third_party_integrations', 'shift_roster', 'progression', 'report_integration', 'time_in_out', 'commission_management', 'gps_location_tracking', 'feedback_form', 'performance_review', 'multi_organization', 'recruitment', 'corparate_training', 'face_id', 'payroll_processing'], 'string'],
            [['start_date', 'end_date', 'created_at', 'updated_at', 'period_time'], 'safe'],
            [['companyid'], 'required'],
            [['package_name', 'plan_name'], 'string', 'max' => 200],
            [['discount', 'country', 'is_retail', 'stripe_customer_id', 'stripe_plan_id', 'stripe_subscription_id', 'stripe_invoice_id'], 'string', 'max' => 255],
            [['companyid'], 'exist', 'skipOnError' => true, 'targetClass' => AmcCompanies::className(), 'targetAttribute' => ['companyid' => 'companyid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'package_name' => 'Package Name',
            'plan_name' => 'Plan Name',
            'trial_days' => 'Trial Days',
            'free_period' => 'Free Period',
            'period_time' => 'Period Time',
            'priced_monthly' => 'Priced Monthly',
            'discount' => 'Discount',
            'country' => 'Country',
            'is_retail' => 'Is Retail',
            'numof_employees' => 'Numof Employees',
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
            'feedback_form' => 'Feedback Form',
            'performance_review' => 'Performance Review',
            'multi_organization' => 'Multi Organization',
            'recruitment' => 'Recruitment',
            'corparate_training' => 'Corparate Training',
            'face_id' => 'Face ID',
            'payroll_processing' => 'Payroll Processing',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'stripe_customer_id' => 'Stripe Customer ID',
            'stripe_plan_id' => 'Stripe Plan ID',
            'stripe_subscription_id' => 'Stripe Subscription ID',
            'companyid' => 'Companyid',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(AmcCompanies::className(), ['companyid' => 'companyid']);
    }
}
