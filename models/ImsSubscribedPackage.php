<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ims_subscribed_package".
 *
 * @property int $id
 * @property string $package_name
 * @property string $plan_name
 * @property int $trial_days
 * @property int $free_period
 * @property string $period_time trial - Trial Package, enterprise - Enterprise Package or Month is specified
 * @property string $priced_monthly
 * @property string $discount
 * @property string $country
 * @property string $is_retail is_retail 0 - false, 1 - true
 * @property string $pos_package_name
 * @property string $pos_plan_name
 * @property int $pos_free_period
 * @property string $pos_period_time
 * @property string $pos_priced_monthly
 * @property string $pos_discount
 * @property string $ecommerce_package_name
 * @property string $ecommerce_plan_name
 * @property int $ecommerce_free_period
 * @property string $ecommerce_period_time
 * @property string $ecommerce_priced_monthly
 * @property string $ecommerce_discount
 * @property int $numof_user -1 - Represents Unlimited count
 * @property int $numof_outlet -1 - Represents Unlimited count
 * @property int $numof_offline_order -1 - Represents Unlimited count
 * @property int $numof_online_order -1 - Represents Unlimited count
 * @property int $numof_integration -1 - Represents Unlimited count
 * @property int $numof_channels -1 - Represents Unlimited count
 * @property int $numberof_items -1 - Represents Unlimited count
 * @property int $numof_pos_receipts
 * @property string $online_sales_revenue
 * @property string $ims_start_date
 * @property string $ims_end_date
 * @property string $ims_stripe_customer_id
 * @property string $ims_stripe_plan_id
 * @property string $ims_stripe_product_id
 * @property string $ims_stripe_subscription_id
 * @property string $ims_stripe_invoice_id
 * @property string $pos_start_date
 * @property string $pos_end_date
 * @property string $pos_stripe_customer_id
 * @property string $pos_stripe_product_id
 * @property string $pos_stripe_plan_id
 * @property string $pos_stripe_subscription_id
 * @property string $pos_stripe_invoice_id
 * @property string $ecommerce_start_date
 * @property string $ecommerce_end_date
 * @property string $ecommerce_stripe_customer_id
 * @property string $ecommerce_stripe_product_id
 * @property string $ecommerce_stripe_plan_id
 * @property string $ecommerce_stripe_subscription_id
 * @property string $ecommerce_stripe_invoice_id
 * @property int $ims
 * @property int $pos
 * @property int $ecommerce
 * @property string $updated_date
 * @property string $created_date
 * @property int $pos_companyid
 */
class ImsSubscribedPackage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ims_subscribed_package';
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
            [['trial_days', 'free_period', 'pos_free_period', 'ecommerce_free_period', 'numof_user', 'numof_outlet', 'numof_offline_order', 'numof_online_order', 'numof_integration', 'numof_channels', 'numberof_items', 'numof_pos_receipts', 'ims', 'pos', 'ecommerce', 'pos_companyid'], 'integer'],
            [['priced_monthly', 'pos_priced_monthly', 'ecommerce_priced_monthly'], 'number'],
            [['is_retail', 'online_sales_revenue'], 'string'],
            [['ims_start_date', 'ims_end_date', 'pos_start_date', 'pos_end_date', 'ecommerce_start_date', 'ecommerce_end_date', 'updated_date', 'created_date'], 'safe'],
            [['pos_companyid'], 'required'],
            [['package_name', 'plan_name', 'pos_package_name', 'pos_plan_name', 'ecommerce_package_name', 'ecommerce_plan_name'], 'string', 'max' => 200],
            [['period_time', 'discount', 'pos_period_time', 'pos_discount', 'ecommerce_period_time', 'ecommerce_discount'], 'string', 'max' => 10],
            [['country', 'ims_stripe_customer_id', 'ims_stripe_plan_id', 'ims_stripe_product_id', 'ims_stripe_subscription_id', 'ims_stripe_invoice_id', 'pos_stripe_customer_id', 'pos_stripe_plan_id', 'pos_stripe_product_id', 'pos_stripe_subscription_id', 'pos_stripe_invoice_id', 'ecommerce_stripe_customer_id', 'ecommerce_stripe_plan_id', 'ecommerce_stripe_product_id', 'ecommerce_stripe_subscription_id', 'ecommerce_stripe_invoice_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
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
            'pos_package_name' => 'Pos Package Name',
            'pos_plan_name' => 'Pos Plan Name',
            'pos_free_period' => 'Pos Free Period',
            'pos_period_time' => 'Pos Period Time',
            'pos_priced_monthly' => 'Pos Priced Monthly',
            'pos_discount' => 'Pos Discount',
            'ecommerce_package_name' => 'Ecommerce Package Name',
            'ecommerce_plan_name' => 'Ecommerce Plan Name',
            'ecommerce_free_period' => 'Ecommerce Free Period',
            'ecommerce_period_time' => 'Ecommerce Period Time',
            'ecommerce_priced_monthly' => 'Ecommerce Priced Monthly',
            'ecommerce_discount' => 'Ecommerce Discount',
            'numof_user' => 'Numof User',
            'numof_outlet' => 'Numof Outlet',
            'numof_offline_order' => 'Numof Offline Order',
            'numof_online_order' => 'Numof Online Order',
            'numof_integration' => 'Numof Integration',
            'numof_channels' => 'Numof Channels',
            'numberof_items' => 'Numberof Items',
            'numof_pos_receipts' => 'Numof Pos Receipts',
            'online_sales_revenue' => 'Online Sales Revenue',
            'ims_start_date' => 'Ims Start Date',
            'ims_end_date' => 'Ims End Date',
            'ims_stripe_customer_id' => 'Ims Stripe Customer ID',
            'ims_stripe_plan_id' => 'Ims Stripe Plan ID',
            'ims_stripe_product_id' => 'Ims Stripe Product ID',
            'ims_stripe_subscription_id' => 'Ims Stripe Subscription ID',
            'pos_start_date' => 'Pos Start Date',
            'pos_end_date' => 'Pos End Date',
            'pos_stripe_customer_id' => 'Pos Stripe Customer ID',
            'pos_stripe_plan_id' => 'Pos Stripe Plan ID',
            'pos_stripe_product_id' => 'Pos Stripe Product ID',
            'pos_stripe_subscription_id' => 'Pos Stripe Subscription ID',
            'ecommerce_start_date' => 'Ecommerce Start Date',
            'ecommerce_end_date' => 'Ecommerce End Date',
            'ecommerce_stripe_customer_id' => 'Ecommerce Stripe Customer ID',
            'ecommerce_stripe_plan_id' => 'Ecommerce Stripe Plan ID',
            'ecommerce_stripe_product_id' => 'Ecommerce Stripe Product ID',
            'ecommerce_stripe_subscription_id' => 'Ecommerce Stripe Subscription ID',
            'ims' => 'Ims',
            'pos' => 'Pos',
            'ecommerce' => 'Ecommerce',
            'updated_date' => 'Updated Date',
            'created_date' => 'Created Date',
            'pos_companyid' => 'Pos Companyid',
        ];
    }
}
