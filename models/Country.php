<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cms_country}}".
 *
 * @property int $countryid
 * @property string $name
 * @property string $iso_code_2
 * @property string $iso_code_3
 * @property int $status
 * @property string $country_code
 * @property string $currency_code
 * @property string $currency_symbol
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cms_country}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countryid', 'status'], 'integer'],
            [['name'], 'string', 'max' => 384],
            [['iso_code_2'], 'string', 'max' => 6],
            [['iso_code_3'], 'string', 'max' => 9],
            [['country_code', 'currency_code'], 'string', 'max' => 15],
            [['currency_symbol'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'countryid' => 'Countryid',
            'name' => 'Name',
            'iso_code_2' => 'Iso Code 2',
            'iso_code_3' => 'Iso Code 3',
            'status' => 'Status',
            'country_code' => 'Country Code',
            'currency_code' => 'Currency Code',
            'currency_symbol' => 'Currency Symbol',
        ];
    }
}
