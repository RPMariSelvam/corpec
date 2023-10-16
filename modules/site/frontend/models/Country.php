<?php
namespace app\modules\site\frontend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "hrm_country".
 *
 * @property int $countryid
 * @property string $name
 * @property string $iso_code_2
 * @property string $iso_code_3
 * @property int $status
 * @property string $country_code
 * @property string $currency_code
 * @property string $symbol
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_country';
    }
    public static function getDb()
    {
        return Yii::$app->get("hrmdb");
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 384],
            [['iso_code_2'], 'string', 'max' => 6],
            [['iso_code_3'], 'string', 'max' => 9],
            [['country_code', 'currency_code'], 'string', 'max' => 15],
            [['symbol'], 'string', 'max' => 10],
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
            'symbol' => 'Symbol',
        ];
    }
}
