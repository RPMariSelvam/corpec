<?php
namespace app\jobs;

class AMCJob extends \yii\base\BaseObject {

    public $company_details, $selected_package, $invoice_model, $selected_package_type, $numof_employees, $no_of_locations, $pos_package_id,$ecommerce_package_id,$retail_package_id,$ims_package_id,$hrm_package_id,$crm_package_id,$AMCModel,$is_random_password,$is_trial,$hrm_subscribed_package_id,$crm_subscribed_package_id,$ims_subscribed_package_id,$ims_addons_subscribed_package_ids,$subscribed_system,$sent_mail_count;

    /**
     * @param Queue $queue which pushed and is handling the job
     */
    public function execute($queue)
    {
        //Dummy Class
    }
}