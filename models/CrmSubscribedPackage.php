<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crm_subscribed_package".
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
 * @property CrmCompanies $company
 */
class CrmSubscribedPackage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'crm_subscribed_package';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('crmdb');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trial_days', 'free_period', 'numof_user', 'numof_contact', 'numof_dnamic_pipeline', 'numof_smart_webform', 'numof_quotes', 'numof_invoices', 'numof_integration', 'numberof_items', 'companyid'], 'integer'],
            [['priced_monthly'], 'number'],
            [['deal_management', 'calendar', 'task_management', 'reminders', 'smart_notifications', 'online_invoice_payment', 'receivables_outstanding', 'marketing', 'document_signing', 'project', 'customer_login_view_project', 'gantt', 'event_management', 'knowledge_base', 'case_management'], 'string'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['companyid'], 'required'],
            [['package_name', 'plan_name', 'period_time'], 'string', 'max' => 200],
            [['discount', 'country', 'is_retail', 'stripe_customer_id', 'stripe_plan_id', 'stripe_subscription_id', 'stripe_invoice_id'], 'string', 'max' => 255],
            [['companyid'], 'exist', 'skipOnError' => true, 'targetClass' => CrmCompanies::className(), 'targetAttribute' => ['companyid' => 'companyid']],
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
        return $this->hasOne(CrmCompanies::className(), ['companyid' => 'companyid']);
    }
}
