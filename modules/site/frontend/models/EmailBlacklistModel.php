<?php
namespace app\modules\site\frontend\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/*
 * @property string $email
 * @property string $type
 * @property integer $attempts
 * @property string $created_at
 * @property integer $updated_at
*/
class EmailBlacklistModel extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'amc_email_blacklist';
    }

    public static function getDb()
    {
        return \Yii::$app->get("hrmdb");
    }


    public static function primaryKey()
    {
        return ['email'];
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'email'], 'string'],
            [['attempts'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['email','type', 'attempts'], 'required'],
        ];
    }
}