<?php

namespace app\models;

use app\models\Companies;
use Yii;

/**
 * This is the model class for table "amc_invoices".
 *
 * @property integer $id
 * @property integer $sale_id
 * @property integer $company_id
 *
 * @property Companies $company
 */
class AmcInvoices extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return \Yii::$app->hrmdb; // HRM DB
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'amc_invoices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sale_id', 'company_id'], 'required'],
            [['sale_id', 'company_id'], 'integer'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'companyid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sale_id' => 'Sale ID',
            'company_id' => 'Company ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['companyid' => 'company_id']);
    }
}
