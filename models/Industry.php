<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cms_industry}}".
 *
 * @property int $industryid
 * @property string $industry_name
 */
class Industry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cms_industry}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['industry_name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'industryid' => 'Industryid',
            'industry_name' => 'Industry Name',
        ];
    }
}
