<?php

namespace app\modules\site\frontend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "{{%amc_ims_addons}}".
 *
 * @property int $ims_addonid
 * @property string $name
 * @property string $description
 * @property string $country
 * @property string $addon_type
 * @property string $limit
 * @property string $priced_monthly
 * @property int $planid
 * @property string $stripe_product_id
 * @property string $stripe_plan_id
 * @property int $ims_product_id
 * @property string $type
 * @property string $status '1' => 'Enable', '0' => 'Disable'
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property string $deletestatus
 *
 * @property AmcPlan $plan
 */
class ImsAddons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'amc_addons';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'country', 'addon_type', 'type', 'status', 'deletestatus'], 'string'],
            [['limit', 'priced_monthly'], 'number'],
            [['planid', 'ims_product_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['stripe_product_id', 'stripe_plan_id'], 'string', 'max' => 50],
            [['planid'], 'exist', 'skipOnError' => true, 'targetClass' => AmcPlan::className(), 'targetAttribute' => ['planid' => 'planid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ims_addonid' => 'Ims Addonid',
            'name' => 'Name',
            'description' => 'Description',
            'country' => 'Country',
            'addon_type' => 'Addon Type',
            'limit' => 'Limit',
            'priced_monthly' => 'Priced Monthly',
            'planid' => 'Planid',
            'stripe_product_id' => 'Stripe Product ID',
            'stripe_plan_id' => 'Stripe Plan ID',
            'ims_product_id' => 'Ims Product ID',
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
        return $this->hasOne(AmcPlan::className(), ['planid' => 'planid']);
    }
}
