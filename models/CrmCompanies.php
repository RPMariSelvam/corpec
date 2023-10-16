<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "crm_companies".
 *
 * @property integer $companyid
 * @property string $name
 * @property integer $users_limit
 * @property string $domain
 * @property string $business_reg_no
 * @property string $licence
 * @property integer $status
 * @property string $country
 * @property string $timezone
 * @property string $createddate
 * @property string $updateddate
 * @property integer $createdby
 * @property integer $updatedby
 *
 * @property CrmCampaigns[] $crmCampaigns
 * @property CrmCasemanagement[] $crmCasemanagements
 * @property CrmCompaniesbusinessinfo[] $crmCompaniesbusinessinfos
 * @property CrmContactlistAccess[] $crmContactlistAccesses
 * @property CrmContacts[] $crmContacts
 * @property CrmContactsList[] $crmContactsLists
 * @property CrmDeliveryorderitems[] $crmDeliveryorderitems
 * @property CrmDeliveryorders[] $crmDeliveryorders
 * @property CrmEmailAttachment[] $crmEmailAttachments
 * @property CrmEmailBccaddress[] $crmEmailBccaddresses
 * @property CrmEmailCcaddress[] $crmEmailCcaddresses
 * @property CrmEmailMails[] $crmEmailMails
 * @property CrmEmailSetting[] $crmEmailSettings
 * @property CrmEmailTemplate[] $crmEmailTemplates
 * @property CrmEmailToaddress[] $crmEmailToaddresses
 * @property CrmEmailUsers[] $crmEmailUsers
 * @property CrmIndustry[] $crmIndustries
 * @property CrmIndustry[] $crmIndustries0
 * @property CrmInvoice[] $crmInvoices
 * @property CrmInvoiceitem[] $crmInvoiceitems
 * @property CrmInvoicepayments[] $crmInvoicepayments
 * @property CrmInvoiceremainder[] $crmInvoiceremainders
 * @property CrmKnowledgebase[] $crmKnowledgebases
 * @property CrmKnowledgebaseCategory[] $crmKnowledgebaseCategories
 * @property CrmOrganization[] $crmOrganizations
 * @property CrmProductandservicetemplates[] $crmProductandservicetemplates
 * @property CrmProjects[] $crmProjects
 * @property CrmProjecttask[] $crmProjecttasks
 * @property CrmProspect[] $crmProspects
 * @property CrmProspectservice[] $crmProspectservices
 * @property CrmPurchaseorderitems[] $crmPurchaseorderitems
 * @property CrmPurchaseorders[] $crmPurchaseorders
 * @property CrmQuote[] $crmQuotes
 * @property CrmQuoteitem[] $crmQuoteitems
 * @property CrmQuotetemplateitems[] $crmQuotetemplateitems
 * @property CrmQuotetemplates[] $crmQuotetemplates
 * @property CrmReminder[] $crmReminders
 * @property CrmRfq[] $crmRfqs
 * @property CrmRfqitems[] $crmRfqitems
 * @property CrmSalesorderitems[] $crmSalesorderitems
 * @property CrmSalesorders[] $crmSalesorders
 * @property CrmSetting[] $crmSettings
 * @property CrmUsers[] $crmUsers
 */
class CrmCompanies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
      public static function getDb()
    {
        return \Yii::$app->crmdb; // CRM DB
    }

    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'createddate',
                'updatedAtAttribute' => 'updateddate',
                'value' => new Expression('NOW()'),
            ]
        ];
    }

    public static function tableName()
    {
        return 'crm_companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['users_limit', 'status', 'createdby', 'updatedby'], 'integer'],
            [['createddate', 'updateddate','source','crm_app','crm_mobile_app','asalta_user_application','country','timezone'], 'safe'],
            [['name'], 'string', 'max' => 80],
            [['domain','email', 'business_reg_no','source'], 'string', 'max' => 100],
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
            'users_limit' => 'Users Limit',
            'domain' => 'Domain',
            'email' => 'Email',
            'business_reg_no' => 'Business Reg No',
            'licence' => 'Licence',
            'status' => 'Status',
            'createddate' => 'Createddate',
            'updateddate' => 'Updateddate',
            'createdby' => 'Createdby',
            'updatedby' => 'Updatedby',
        ];
    }

   /* 
    public function getCrmCampaigns()
    {
        return $this->hasMany(CrmCampaigns::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmCasemanagements()
    {
        return $this->hasMany(CrmCasemanagement::className(), ['companyid' => 'companyid']);
    }

  
    public function getCrmCompaniesbusinessinfos()
    {
        return $this->hasMany(CrmCompaniesbusinessinfo::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmContactlistAccesses()
    {
        return $this->hasMany(CrmContactlistAccess::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmContacts()
    {
        return $this->hasMany(CrmContacts::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmContactsLists()
    {
        return $this->hasMany(CrmContactsList::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmDeliveryorderitems()
    {
        return $this->hasMany(CrmDeliveryorderitems::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmDeliveryorders()
    {
        return $this->hasMany(CrmDeliveryorders::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmEmailAttachments()
    {
        return $this->hasMany(CrmEmailAttachment::className(), ['companyid' => 'companyid']);
    }

  
    public function getCrmEmailBccaddresses()
    {
        return $this->hasMany(CrmEmailBccaddress::className(), ['companyid' => 'companyid']);
    }

  
    public function getCrmEmailCcaddresses()
    {
        return $this->hasMany(CrmEmailCcaddress::className(), ['companyid' => 'companyid']);
    }

  
    public function getCrmEmailMails()
    {
        return $this->hasMany(CrmEmailMails::className(), ['companyid' => 'companyid']);
    }

  
    public function getCrmEmailSettings()
    {
        return $this->hasMany(CrmEmailSetting::className(), ['companyid' => 'companyid']);
    }

  
    public function getCrmEmailTemplates()
    {
        return $this->hasMany(CrmEmailTemplate::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmEmailToaddresses()
    {
        return $this->hasMany(CrmEmailToaddress::className(), ['companyid' => 'companyid']);
    }

  
    public function getCrmEmailUsers()
    {
        return $this->hasMany(CrmEmailUsers::className(), ['companyid' => 'companyid']);
    }

  
    public function getCrmIndustries()
    {
        return $this->hasMany(CrmIndustry::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmIndustries0()
    {
        return $this->hasMany(CrmIndustry::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmInvoices()
    {
        return $this->hasMany(CrmInvoice::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmInvoiceitems()
    {
        return $this->hasMany(CrmInvoiceitem::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmInvoicepayments()
    {
        return $this->hasMany(CrmInvoicepayments::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmInvoiceremainders()
    {
        return $this->hasMany(CrmInvoiceremainder::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmKnowledgebases()
    {
        return $this->hasMany(CrmKnowledgebase::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmKnowledgebaseCategories()
    {
        return $this->hasMany(CrmKnowledgebaseCategory::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmOrganizations()
    {
        return $this->hasMany(CrmOrganization::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmProductandservicetemplates()
    {
        return $this->hasMany(CrmProductandservicetemplates::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmProjects()
    {
        return $this->hasMany(CrmProjects::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmProjecttasks()
    {
        return $this->hasMany(CrmProjecttask::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmProspects()
    {
        return $this->hasMany(CrmProspect::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmProspectservices()
    {
        return $this->hasMany(CrmProspectservice::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmPurchaseorderitems()
    {
        return $this->hasMany(CrmPurchaseorderitems::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmPurchaseorders()
    {
        return $this->hasMany(CrmPurchaseorders::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmQuotes()
    {
        return $this->hasMany(CrmQuote::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmQuoteitems()
    {
        return $this->hasMany(CrmQuoteitem::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmQuotetemplateitems()
    {
        return $this->hasMany(CrmQuotetemplateitems::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmQuotetemplates()
    {
        return $this->hasMany(CrmQuotetemplates::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmReminders()
    {
        return $this->hasMany(CrmReminder::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmRfqs()
    {
        return $this->hasMany(CrmRfq::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmRfqitems()
    {
        return $this->hasMany(CrmRfqitems::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmSalesorderitems()
    {
        return $this->hasMany(CrmSalesorderitems::className(), ['company_id' => 'companyid']);
    }

    public function getCrmSalesorders()
    {
        return $this->hasMany(CrmSalesorders::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmSettings()
    {
        return $this->hasMany(CrmSetting::className(), ['company_id' => 'companyid']);
    }

  
    public function getCrmUsers()
    {
        return $this->hasMany(CrmUsers::className(), ['company_id' => 'companyid']);
    }*/
}
