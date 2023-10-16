<?php
namespace app\modules\site\frontend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "amc_crm_package".
 *
 * @property integer $crm_packageid
 * @property integer $planid
 * @property string $name
 * @property string $description
 * @property string $priced_monthly
 * @property string $discount
 * @property integer $numof_user
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
 * @property string $numberof_items
 * @property string $project
 * @property string $customer_login_view_project
 * @property string $gantt
 * @property string $event_management
 * @property integer $numof_integration
 * @property string $knowledge_base
 * @property string $case_management
 * @property string $featured
 * @property string $country
 * @property string $stripe_product_id
 * @property string $stripe_plan_id
 * @property int $ims_product_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deletestatus
 */
class CrmPackageModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'amc_crm_package';
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
            [['crm_packageid', 'planid', 'numof_user', 'numof_contact', 'numof_dnamic_pipeline', 'numof_smart_webform', 'numof_quotes', 'numof_invoices', 'numof_integration', 'numberof_items', 'created_by', 'updated_by'], 'integer'],
            [['description', 'deal_management', 'calendar', 'task_management', 'reminders', 'smart_notifications', 'online_invoice_payment', 'receivables_outstanding', 'marketing', 'document_signing', 'project', 'customer_login_view_project', 'gantt', 'event_management', 'knowledge_base', 'case_management', 'featured', 'status', 'deletestatus'], 'string'],
            [['created_at', 'updated_at','priced_monthly', 'ims_product_id'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['discount', 'country', 'stripe_product_id', 'stripe_plan_id'], 'string', 'max' => 50],
            [['planid'], 'exist', 'skipOnError' => true, 'targetClass' => PlanModel::className(), 'targetAttribute' => ['planid' => 'planid']],
            [['planid', 'name','country'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'crm_packageid' => 'Crm Packageid',
            'planid' => 'Planid',
            'name' => 'Name',
            'description' => 'Description',
            'priced_monthly' => 'Priced Monthly',
            'discount' => 'Discount',
            'numof_user' => 'Numof User',
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
            'numberof_items' => 'Item List',
            'project' => 'Project',
            'customer_login_view_project' => 'Customer Login View Project',
            'gantt' => 'Gantt',
            'event_management' => 'Event Management',
            'numof_integration' => 'Numof Integration',
            'knowledge_base' => 'Knowledge Base',
            'case_management' => 'Case Management',
            'featured' => 'Featured',
            'country' => 'Country',
            'stripe_product_id' => 'Stripe Product ID',
            'stripe_plan_id' => 'Stripe Plan ID',
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
       $discountPercent = isset(Yii::$app->params["asaltacrmdiscount"])? Yii::$app->params["asaltacrmdiscount"] :0;
       $discountedAmount = round($this->priced_monthly - ($this->priced_monthly * $discountPercent / 100), 2);
       //return Yii::$app->formatter->asDecimal((int)$discountedAmount + 0.98, 2);
       return Yii::$app->formatter->asDecimal($discountedAmount, 2);

    }
}
