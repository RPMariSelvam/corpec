<?php

namespace app\modules\site\frontend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "amc_ims_package".
 *
 * @property integer $inventory_packageid
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
 * @property string $featured
 * @property string $country
 * @property string $stripe_product_id
 * @property string $stripe_plan_id
 * @property int $ims_product_id
 * @property string $type
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deletestatus
 *
 */
class InventoryPackageModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'amc_package';
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
            [['planid', 'numof_user', 'numof_outlet', 'numof_offline_order', 'numof_online_order', 'numof_integration', 'numof_channels', 'numberof_items', 'created_by', 'updated_by','discount', 'numof_pos_receipts'], 'number'],
            [['description', 'deletestatus', 'stripe_product_id', 'stripe_plan_id', 'type'], 'string'],
            [['planid','name','country'], 'required'],
            [['featured', 'country','status','discount','name','priced_monthly','numof_offline_order','numof_online_order','created_at', 'updated_at', 'ims_product_id'], 'safe'],
            [['planid'], 'exist', 'skipOnError' => true, 'targetClass' => PlanModel::className(), 'targetAttribute' => ['planid' => 'planid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'inventory_packageid' => 'Inventory Packageid',
            'planid' => 'Planid',
            'name' => 'Name',
            'description' => 'Description',
            'priced_monthly' => 'Priced Monthly',
            'discount' => 'Discount',
            'numof_user' => 'Numof User',
            'numof_outlet' => 'Numof Outlet',
            'numof_offline_order' => 'Numof Offline Order',
            'numof_online_order' => 'Numof Online Order',
            'numof_integration' => 'Numof Integration',
            'numof_channels' => 'Numof Channels',
            'numof_pos_receipts' => 'Numof Pos Receipts',
            'numberof_items' => 'Numberof Items',
            'featured' => 'Featured',
            'country' => 'Country',
            'stripe_product_id' => 'Stripe Product ID',
            'stripe_plan_id' => 'Stripe Plan ID',
            'type' => 'Type',
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
        if ($this->type == "IMS"){
           $discountPercent = isset(Yii::$app->params["asaltainventorydiscount"])? Yii::$app->params["asaltainventorydiscount"] :0;
           $discountedAmount = round($this->priced_monthly - ($this->priced_monthly * $discountPercent / 100), 2);
           return Yii::$app->formatter->asDecimal((int)$discountedAmount + 0.98, 2);

        } else {
            $discountPercent = isset(Yii::$app->params["asaltaposdiscount"])? Yii::$app->params["asaltaposdiscount"] :0;
            $discountedAmount = round($this->priced_monthly - ($this->priced_monthly * $discountPercent / 100), 2);
            return Yii::$app->formatter->asDecimal((int)$discountedAmount + 0.98, 2);
        }
       
    }
}