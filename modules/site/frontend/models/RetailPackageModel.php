<?php
namespace app\modules\site\frontend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "amc_retail_package".
 *
 * @property integer $retail_packageid
 * @property integer $planid
 * @property string $name
 * @property string $description
 * @property string $priced_monthly
 * @property string $discount
 * @property integer $numof_user
 * @property integer $numof_outlet
 * @property integer $numof_offline_order
 * @property integer $numof_online_order
 * @property integer $numof_integration
 * @property integer $numof_channels
 * @property integer $numof_pos_receipts
 * @property integer $numberof_items
 * @property string $online_sales_revenue
 * @property integer $parent_packageid
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
 * @property integer $numof_contact
 * @property string $deal_management
 * @property integer $numof_dnamic_pipeline
 * @property integer $numof_smart_webform
 * @property string $calendar
 * @property string $task_management
 * @property string $reminders
 * @property string $smart_notifications
 * @property integer $numof_quotes
 * @property integer $numof_invoices
 * @property string $online_invoice_payment
 * @property string $receivables_outstanding
 * @property string $marketing
 * @property string $document_signing
 * @property string $project
 * @property string $customer_login_view_project
 * @property string $gantt
 * @property string $event_management
 * @property string $knowledge_base
 * @property string $case_management
 * @property string $featured
 * @property string $country
 * @property string $stripe_product_id
 * @property string $stripe_plan_id
 * @property int $ims_product_id
 * @property int $ims
 * @property int $pos
 * @property int $ecommerce
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deletestatus
 */
class RetailPackageModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'amc_retail_package';
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
            [['retail_packageid', 'planid', 'numof_user', 'numof_outlet', 'numof_offline_order', 'numof_online_order', 'numof_integration', 'numof_channels', 'numof_pos_receipts', 'numberof_items', 'parent_packageid','numof_contact', 'numof_dnamic_pipeline', 'numof_smart_webform', 'numof_quotes', 'numof_invoices', 'created_by', 'updated_by', 'ims', 'pos', 'ecommerce'], 'integer'],
            [['description', 'basic_hris', 'emp_self_service', 'leave_management', 'mobile_application', 'timesheet', 'claims_management', 'third_party_integrations', 'shift_roster', 'progression', 'report_integration', 'time_in_out', 'commission_management', 'gps_location_tracking', 'feedback_form', 'performance_review', 'multi_organization', 'recruitment', 'corparate_training', 'face_id', 'payroll_processing', 'deal_management', 'calendar', 'task_management', 'reminders', 'smart_notifications', 'online_invoice_payment', 'receivables_outstanding', 'marketing', 'document_signing', 'project', 'customer_login_view_project', 'gantt', 'event_management', 'knowledge_base', 'case_management', 'featured', 'status', 'deletestatus', 'online_sales_revenue'], 'string'],
            //[['priced_monthly'], 'number'],
            [['created_at', 'updated_at','priced_monthly', 'ims_product_id'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['discount', 'country', 'stripe_product_id', 'stripe_plan_id'], 'string', 'max' => 50],
            [['planid', 'name','country'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'retail_packageid' => 'Retail Packageid',
            'planid' => 'Plan',
            'name' => 'Name',
            'description' => 'Description',
            'priced_monthly' => 'Priced Monthly',
            'discount' => 'Discount',
            'numof_user' => 'Pos Numof User',
            'numof_outlet' => 'Numof Outlet',
            'numof_offline_order' => 'Numof Offline Order',
            'numof_online_order' => 'Numof Online Order',
            'numof_integration' => 'Pos Numof Integration',
            'numof_channels' => 'Numof Channels',
            'numof_pos_receipts' => 'Numof Pos Receipts',
            'numberof_items' => 'Numberof Items',
            'online_sales_revenue' => 'Online Sales Revenue',
            'parent_packageid' => 'Parent Packageid',
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
            'numof_contact' => 'Numof Contact',
            'deal_management' => 'Deal Management',
            'numof_dnamic_pipeline' => 'Numof Dnamic Pipeline',
            'numof_smart_webform' => 'Numof Smart Webform',
            'calendar' => 'Calendar',
            'task_management' => 'Task Management',
            'reminders' => 'Reminders',
            'smart_notifications' => 'Smart Notifications',
            'numof_quotes' => 'Numof Quotes',
            'numof_invoices' => 'Numof Invoices',
            'online_invoice_payment' => 'Online Invoice Payment',
            'receivables_outstanding' => 'Receivables Outstanding',
            'marketing' => 'Marketing',
            'document_signing' => 'Document Signing',
            'project' => 'Project',
            'customer_login_view_project' => 'Customer Login View Project',
            'gantt' => 'Gantt',
            'event_management' => 'Event Management',
            'knowledge_base' => 'Knowledge Base',
            'case_management' => 'Case Management',
            'featured' => 'Featured',
            'country' => 'Country',
            'stripe_product_id' => 'Stripe Product ID',
            'stripe_plan_id' => 'Stripe Plan ID',
            'ims' => 'IMS',
            'pos' => 'POS',
            'ecommerce' => 'ecommerce',
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
       $discountPercent = isset(Yii::$app->params["asaltaretaildiscount"])? Yii::$app->params["asaltaretaildiscount"] :0;
       $discountedAmount = round($this->priced_monthly - ($this->priced_monthly * $discountPercent / 100), 2);
        return Yii::$app->formatter->asDecimal((int)$discountedAmount + 0.98, 2);   
    }
}
