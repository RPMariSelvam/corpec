<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ims_queue}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $method_name
 * @property string $data
 * @property integer $priority
 * @property string $unique_id
 * @property string $created_at
 * @property integer $is_taken
 */
class PosQueue extends \yii\db\ActiveRecord
{
     public static function getDb()
    {
        return \Yii::$app->posdb; // POS DB
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ims_queue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data'], 'safe'],
            [['priority', 'created_at'], 'required'],
            [['priority', 'is_taken'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'method_name'], 'string', 'max' => 255],
            [['unique_id'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'method_name' => 'Method Name',
            'data' => 'Data',
            'priority' => 'Priority',
            'unique_id' => 'Unique ID',
            'created_at' => 'Created At',
            'is_taken' => 'Is Taken',
        ];
    }
}
