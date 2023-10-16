<?php

namespace app\models;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

use Yii;

/**
 * This is the model class for table "amc_partners".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $company
 * @property int $phone_no
 * @property string $website
 * @property string $address
 * @property string $country
 * @property string $no_of_employees
 * @property string $hear_about_us
 * @property string $partner_type
 * @property string $created_at
 * @property string $updated_at
 */
class Partners extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return \Yii::$app->hrmdb; // HRM DB
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'amc_partners';
    }

    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name','last_name','email','company','phone_no','country','no_of_employees','partner_type','partner_code'], 'required'],
            [['email'], 'email'],
            [['phone_no'], 'integer'],
            [['address', 'created_at', 'updated_at','partner_code','status'], 'safe'],
            [['first_name', 'last_name', 'email'], 'string', 'max' => 100],
            [['company'], 'string', 'max' => 200],
            [['website'], 'string', 'max' => 150],
            [['country', 'hear_about_us', 'partner_type'], 'string', 'max' => 50],
            [['no_of_employees'], 'string', 'max' => 10],
            [['partner_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'company' => 'Company Name',
            'phone_no' => 'Phone No',
            'website' => 'Website',
            'address' => 'Address',
            'country' => 'Country',
            'no_of_employees' => 'No Of Employees',
            'hear_about_us' => 'Hear About Us',
            'partner_type' => 'Partner Type',
            'partner_code' => 'Unique Identifier',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
