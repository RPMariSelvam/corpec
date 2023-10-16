<?php

namespace app\models;
use app\webmodels\UsersModel;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "{{%companies}}".
 *
 * @property integer $companyid
 * @property string $name
 * @property string $roc
 * @property string $address
 * @property string $contactperson_name
 * @property string $phone_number
 * @property integer $employeelimit
 * @property string $deletestatus
 * @property string $quickbook_option
 * @property string $asaltacrm_option
 * @property string $asaltapos_option
 * @property string $email_address
 * @property integer $user_limit
 * @property integer $location_limit
 * @property integer $mobile_app_limit
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $pos_companyid
 * @property integer $crm_companyid
 * @property string $asalta_application
 * @property string $country
 * @property string $timezone
 * @property integer $sub_companies_limit
 * @property integer $parent_company_id
 *
 * @property AdhocPayments[] $adhocPayments
 * @property Announcements[] $announcements
 * @property Branch[] $branches
 * @property Claimtype[] $claimtypes
 * @property Commissionsummaryview[] $commissionsummaryviews
 * @property Companies $parentCompany
 * @property Companies[] $companies
 * @property CompanyBusinessInfo[] $companyBusinessInfos
 * @property CompanyLeavecarryforward[] $companyLeavecarryforwards
 * @property CompanyPayitem[] $companyPayitems
 * @property CompanyPayroll[] $companyPayrolls
 * @property Dbsbankfiles[] $dbsbankfiles
 * @property EmpPaymenthistory[] $empPaymenthistories
 * @property EmpSalaryAdjustments[] $empSalaryAdjustments
 * @property EmpadhocPayment[] $empadhocPayments
 * @property Empclaims[] $empclaims
 * @property Empeducationlist[] $empeducationlists
 * @property EmployeeJoiners[] $employeeJoiners
 * @property EmployeeType[] $employeeTypes
 * @property Employees[] $employees
 * @property Empotherskills[] $empotherskills
 * @property Emppayitems[] $emppayitems
 * @property Empworktimesheet[] $empworktimesheets
 * @property Forms[] $forms
 * @property LeaveMultiapproval[] $leaveMultiapprovals
 * @property Timecard[] $timecards
 */
class AmcCompanies extends \yii\db\ActiveRecord
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
        return '{{%companies}}';
    }
    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            /*[
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],*/
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address', 'deletestatus', 'quickbook_option', 'xero_option', 'asaltacrm_option', 'asaltapos_option','timezone'], 'string'],
            [['phone_number', 'employeelimit', 'user_limit', 'location_limit', 'mobile_app_limit', 'created_by', 'updated_by', 'pos_companyid', 'crm_companyid', 'sub_companies_limit', 'parent_company_id', 'payroll_company_id'], 'integer'],
            [['created_at', 'updated_at','asalta_user_application','partner_code'], 'safe'],
            [['name'], 'string', 'max' => 80],
            [['roc', 'contactperson_name'], 'string', 'max' => 200],
            [['email_address'], 'string', 'max' => 100],
            [['asalta_application'], 'string', 'max' => 50],
            [['parent_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => AmcCompanies::className(), 'targetAttribute' => ['parent_company_id' => 'companyid']],
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
            'roc' => 'Roc',
            'address' => 'Address',
            'contactperson_name' => 'Contactperson Name',
            'phone_number' => 'Phone Number',
            'employeelimit' => 'Employeelimit',
            'deletestatus' => 'Deletestatus',
            'quickbook_option' => 'Quickbook Option',
            'xero_option' => 'Xero Option',
            'asaltacrm_option' => 'Asaltacrm Option',
            'asaltapos_option' => 'Asaltapos Option',
            'email_address' => 'Email Address',
            'user_limit' => 'User Limit',
            'location_limit' => 'Location Limit',
            'mobile_app_limit' => 'Mobile App Limit',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'pos_companyid' => 'Pos Companyid',
            'asalta_application' => 'Asalta Application',
            'sub_companies_limit' => 'Subsidiary Companies Limit',
            'parent_company_id' => 'Parent Company ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdhocPayments()
    {
        return $this->hasMany(AdhocPayments::className(), ['company_id' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnnouncements()
    {
        return $this->hasMany(Announcements::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branch::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClaimtypes()
    {
        return $this->hasMany(Claimtype::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommissionsummaryviews()
    {
        return $this->hasMany(Commissionsummaryview::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentCompany()
    {
        return $this->hasOne(Companies::className(), ['companyid' => 'parent_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubCompany()
    {
        return $this->hasMany(Companies::className(), ['parent_company_id' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Companies::className(), ['parent_company_id' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyBusinessInfos()
    {
        return $this->hasMany(CompanyBusinessInfo::className(), ['company_id' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyLeavecarryforwards()
    {
        return $this->hasMany(CompanyLeavecarryforward::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyPayitems()
    {
        return $this->hasMany(CompanyPayitem::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyPayrolls()
    {
        return $this->hasMany(CompanyPayroll::className(), ['company_id' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDbsbankfiles()
    {
        return $this->hasMany(Dbsbankfiles::className(), ['company_id' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpPaymenthistories()
    {
        return $this->hasMany(EmpPaymenthistory::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpSalaryAdjustments()
    {
        return $this->hasMany(EmpSalaryAdjustments::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpadhocPayments()
    {
        return $this->hasMany(EmpadhocPayment::className(), ['company_id' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpclaims()
    {
        return $this->hasMany(Empclaims::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpeducationlists()
    {
        return $this->hasMany(Empeducationlist::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeJoiners()
    {
        return $this->hasMany(EmployeeJoiners::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeTypes()
    {
        return $this->hasMany(EmployeeType::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employees::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpotherskills()
    {
        return $this->hasMany(Empotherskills::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmppayitems()
    {
        return $this->hasMany(Emppayitems::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpworktimesheets()
    {
        return $this->hasMany(Empworktimesheet::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForms()
    {
        return $this->hasMany(Forms::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeaveMultiapprovals()
    {
        return $this->hasMany(LeaveMultiapproval::className(), ['companyid' => 'companyid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimecards()
    {
        return $this->hasMany(Timecard::className(), ['companyid' => 'companyid']);
    }
    
    public function getUser()
    {
        return $this->hasOne(UsersModel::className(), ['id' => 'created_by']);
    }
}
