<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ims_subscribed_addons".
 *
 * @property int $id
 * @property string $addon_name
 * @property string $plan_name
 * @property string $period_time
 * @property string $country
 * @property string $addon_type
 * @property string $quantity
 * @property string $limit
 * @property string $priced_monthly
 * @property string $start_date
 * @property string $end_date
 * @property string $stripe_customer_id
 * @property string $stripe_product_id
 * @property string $stripe_plan_id
 * @property string $stripe_subscription_id
 * @property string $stripe_subscription_itemid
 * @property string $stripe_invoice_id
 * @property string $type
 * @property string $removed '0'=>'No','1'=>'Yes'
 * @property string $created_date
 * @property string $updated_date
 * @property int $companyid
 */
class ImsSubscribedAddons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ims_subscribed_addons';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('posdb');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['addon_type', 'type', 'removed'], 'string'],
            [['quantity', 'limit', 'priced_monthly'], 'number'],
            [['start_date', 'end_date', 'created_date', 'updated_date'], 'safe'],
            [['companyid'], 'required'],
            [['companyid'], 'integer'],
            [['addon_name', 'plan_name'], 'string', 'max' => 200],
            [['period_time'], 'string', 'max' => 10],
            [['country', 'stripe_customer_id', 'stripe_product_id', 'stripe_plan_id', 'stripe_subscription_id', 'stripe_subscription_itemid', 'stripe_invoice_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'addon_name' => 'Addon Name',
            'plan_name' => 'Plan Name',
            'period_time' => 'Period Time',
            'country' => 'Country',
            'addon_type' => 'Addon Type',
            'quantity' => 'Quantity',
            'limit' => 'Limit',
            'priced_monthly' => 'Priced Monthly',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'stripe_customer_id' => 'Stripe Customer ID',
            'stripe_product_id' => 'Stripe Product ID',
            'stripe_plan_id' => 'Stripe Plan ID',
            'stripe_subscription_id' => 'Stripe Subscription ID',
            'stripe_subscription_itemid' => 'Stripe Subscription Itemid',
            'type' => 'Type',
            'removed' => 'Removed',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
            'companyid' => 'Companyid',
        ];
    }
}
