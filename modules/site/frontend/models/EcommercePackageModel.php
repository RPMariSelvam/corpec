<?php
namespace app\modules\site\frontend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "amc_ecommerce_package".
 *
 * @property int $ecommerce_packageid
 * @property int $planid
 * @property string $name
 * @property string $description
 * @property string $priced_monthly
 * @property string $discount
 * @property int $numof_user -1 - Represents Unlimited count
 * @property int $numof_outlet -1 - Represents Unlimited count
 * @property int $numof_online_order -1 - Represents Unlimited count
 * @property string $online_sales_revenue -1 - Represents Unlimited count
 * @property int $numberof_items -1 - Represents Unlimited count
 * @property int $numof_integration -1 - Represents Unlimited count
 * @property string $country
 * @property string $stripe_product_id
 * @property string $stripe_plan_id
 * @property string $status '1' => 'Enable', '0' => 'Disable'
 * @property string $ims_product_id
 * @property string $featured
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property string $deletestatus
 */
class EcommercePackageModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'amc_ecommerce_package';
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
            [['planid', 'numof_user', 'numof_outlet', 'numberof_items', 'numof_integration', 'numof_online_order', 'created_by', 'updated_by'], 'integer'],
            [['description', 'status', 'deletestatus'], 'string'],
            [['featured', 'priced_monthly', 'online_sales_revenue', 'created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['discount', 'country', 'stripe_product_id', 'stripe_plan_id'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ecommerce_packageid' => 'Ecommerce Packageid',
            'planid' => 'Planid',
            'name' => 'Name',
            'description' => 'Description',
            'priced_monthly' => 'Priced Monthly',
            'discount' => 'Discount',
            'numof_user' => 'Numof User',
            'numof_outlet' => 'Numof Outlet',
            'online_sales_revenue' => 'Online Sales Revenue',
            'numof_online_order' => 'Numof Sales Orders',
            'numberof_items' => 'Numberof Items',
            'numof_integration' => 'Numof Integration',
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
       $discountPercent = isset(Yii::$app->params["asaltahecommercediscount"])? Yii::$app->params["asaltahecommercediscount"] :0;
       $discountedAmount = round($this->priced_monthly - ($this->priced_monthly * $discountPercent / 100), 2);
        return Yii::$app->formatter->asDecimal((int)$discountedAmount + 0.98, 2);  
    }
}
