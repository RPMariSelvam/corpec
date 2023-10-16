<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "ims_pos_companies".
 *
 * @property integer $companyid
 * @property string $name
 * @property string $company_email
 * @property string $company_address
 * @property integer $phone_no
 * @property integer $users_limit
 * @property string $domain
 * @property string $business_reg_no
 * @property string $licence
 * @property integer $status
 * @property string $createddate
 * @property string $updateddate
 * @property integer $createdby
 * @property integer $updatedby
 * @property integer $location_limit
 * @property integer $mobile_app_limit
 */
class PosCompanies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function getDb()
    {
        return \Yii::$app->posdb; // CRM DB
    }

    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'createddate',
                'updatedAtAttribute' => 'updateddate',
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'createdby',
                'updatedByAttribute' => 'updatedby',
            ],
        ];
    }

    public static function tableName()
    {
        return 'ims_pos_companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'createddate', 'updateddate'], 'required'],
            [['company_address','source','pos_app','pos_mobile_app','asalta_user_application'], 'string'],
            [['phone_no', 'users_limit', 'status', 'createdby', 'updatedby', 'location_limit', 'mobile_app_limit'], 'integer'],
            [['createddate', 'updateddate','pos_status','source','asalta_user_application','GST_number','postal_code'], 'safe'],
            [['name'], 'string', 'max' => 80],
            [['company_email', 'domain', 'business_reg_no'], 'string', 'max' => 100],
            [['licence'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'companyid' => 'Companyid',
            'name' => 'Name',
            'company_email' => 'Company Email',
            'company_address' => 'Company Address',
            'phone_no' => 'Phone No',
            'users_limit' => 'Users Limit',
            'domain' => 'Domain',
            'business_reg_no' => 'Business Reg No',
            'licence' => 'Licence',
            'status' => 'Status',
            'pos_status' => 'POS Status',
            'createddate' => 'Createddate',
            'updateddate' => 'Updateddate',
            'createdby' => 'Createdby',
            'updatedby' => 'Updatedby',
            'location_limit' => 'Location Limit',
            'mobile_app_limit' => 'Mobile App Limit',
        ];
    }
}
