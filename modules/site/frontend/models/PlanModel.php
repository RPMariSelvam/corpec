<?php

namespace app\modules\site\frontend\models;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "amc_plan".
 *
 * @property integer $planid
 * @property string $name
 * @property string $description
 * @property integer $period_time
 * @property integer $trial_days
 * @property integer $free_period
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deletestatus
 *
 */
class PlanModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'amc_plan';
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
            [['description', 'deletestatus'], 'string'],
            [['free_period', 'created_by', 'updated_by','trial_days'], 'integer'],
            [['created_at', 'updated_at','status','period_time'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['name','period_time'], 'required'],

            ['trial_days', 'required', 'when' => function ($model) {
                return $model->period_time == 'trial';
            }, 'whenClient' => "function (attribute, value) {
                return $('#planmodel-period_time').val() == 'trial';
            }"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'planid' => 'Planid',
            'name' => 'Name',
            'description' => 'Description',
            'period_time' => 'Period',
            'free_period' => 'Free Period',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'deletestatus' => 'Deletestatus',
        ];
    }
}
