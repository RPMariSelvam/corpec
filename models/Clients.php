<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "{{%cms_clients}}".
 *
 * @property int $client_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $companyname
 * @property int $emp_size
 * @property string $industry
 * @property string $country
 * @property string $country_code
 * @property string $mobile
 * @property string $created_date
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $cname,$clname,$cemail, $cpassword, $password, $otherindustry;
    public static function tableName()
    {
        return '{{%cms_clients}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cemail','cname','clname','email', 'first_name','last_name','companyname','industry','country','mobile' ], 'required'],
            [['emp_size'], 'integer'],
            [['cemail'], 'email'],
            [['email'], 'email'],
            [['first_name','last_name', 'email', 'password', 'companyname', 'industry', 'country'], 'string', 'max' => 100],
            [['country_code'], 'string', 'max' => 10],
            [['mobile'], 'string', 'max' => 50],
            //[['email'], 'unique' ,'message'=>'This Email is already in use'],
            [['cpassword'], 'string', 'min' => 8],
            [['cemail','cname','cpassword','email', 'first_name', 'last_name', 'password', 'companyname', 'industry', 'country', 'country_code', 'mobile', 'emp_size', 'created_date','timezone','uen','product','otherindustry', 'description','source_link',
                'account_status', 'signup_ip', 'platform', 'device_location', 'website', 'partner_code'], 'safe'],
            ['otherindustry', 'required', 'when' => function ($model) {
                return $model->industry == 'Others';
            }, 'whenClient' => "function (attribute, value) {
                return $('#clients-industry').val() == 'Others';
            }"],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'Client ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'website' => 'Website',
            'password' => 'Password',
            'cname' => 'First Name',
            'clname' => 'Last Name',
            'cemail' => 'Email',
            'cpassword' => 'Password',
            'companyname' => 'Company Name',
            'uen' => 'UEN',
            'product' => 'Product',
            'emp_size' => 'Size',
            'industry' => 'Industry',
            'otherindustry' => 'Industry Name',
            'country' => 'Country',
            'country_code' => 'Country Code',
            'mobile' => 'Mobile',
            'timezone' => 'Time Zone',
            'created_date' => 'Created Date',
        ];
    }
}
