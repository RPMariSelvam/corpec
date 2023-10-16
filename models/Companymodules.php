<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%company_modules}}".
 *
 * @property integer $modules_id
 * @property integer $companyid
 * @property string $payrollmanagement
 * @property string $leavemanagement
 * @property string $claimmanagement
 * @property string $timesheetmanagement
 * @property string $clockinoutmanagement
 * @property string $rosteringmanagement
 * @property string $commissionmanagement
 * @property string $quickbooks
 * @property string $created_at
 * @property string $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property Companies $company
 */
class Companymodules extends \yii\db\ActiveRecord
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
        return '{{%company_modules}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['companyid', 'updated_at', 'updated_by'], 'integer'],
            [['commissionmanagement','payrollmanagement', 'leavemanagement', 'claimmanagement', 'timesheetmanagement', 'clockinoutmanagement', 'rosteringmanagement', 'quickbooks','xero'], 'string'],
            [['created_at', 'created_by'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'modules_id' => 'Modules ID',
            'companyid' => 'Companyid',
            'payrollmanagement' => 'Payroll Management',
            'leavemanagement' => 'Leave Management',
            'claimmanagement' => 'Claim Management',
            'timesheetmanagement' => 'Timesheet Management',
            'clockinoutmanagement' => 'Clockinout Management',
            'rosteringmanagement' => 'Rostering Management',
            'commissionmanagement' => 'Commission Management',
            'quickbooks' => 'QuickBooks Integration',
            'xero' => 'Xero Integration',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['companyid' => 'companyid']);
    }
}
