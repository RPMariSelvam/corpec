<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ims_sales".
 *
 * @property integer $id
 * @property string $slug
 * @property string $date
 * @property string $reference_no
 * @property string $order_reference_no
 * @property integer $customer_id
 * @property string $customer
 * @property integer $biller_id
 * @property string $biller
 * @property integer $warehouse_id
 * @property string $email_ids
 * @property string $billing_address
 * @property string $note
 * @property string $staff_note
 * @property string $total
 * @property string $product_discount
 * @property string $order_discount_id
 * @property string $total_discount
 * @property string $order_discount
 * @property string $product_tax
 * @property integer $order_tax_id
 * @property string $order_tax
 * @property string $total_tax
 * @property string $shipping
 * @property string $exchange
 * @property string $grand_total
 * @property string $sale_status
 * @property string $payment_status
 * @property integer $payment_term
 * @property string $due_date
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $updated_at
 * @property integer $total_items
 * @property integer $pos
 * @property string $channel
 * @property string $paid
 * @property integer $return_id
 * @property integer $quote_id
 * @property integer $sale_order_id
 * @property string $surcharge
 * @property string $attachment
 * @property string $gst
 * @property integer $consignment_sale
 * @property string $show_price_book
 * @property integer $qb_invoice_no
 * @property integer $pos_companyid
 *
 */
class ImsSales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ims_sales';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('posdb');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'due_date', 'updated_at'], 'safe'],
            [['customer_id', 'biller_id', 'total', 'grand_total', 'gst'], 'required'],
            [['customer_id', 'biller_id', 'warehouse_id', 'order_tax_id', 'payment_term', 'created_by', 'updated_by', 'total_items', 'pos', 'return_id', 'quote_id', 'sale_order_id', 'consignment_sale', 'qb_invoice_no', 'pos_companyid'], 'integer'],
            [['email_ids', 'billing_address', 'show_price_book'], 'string'],
            [['total', 'product_discount', 'total_discount', 'order_discount', 'product_tax', 'order_tax', 'total_tax', 'shipping', 'exchange', 'grand_total', 'paid', 'surcharge', 'gst'], 'number'],
            [['slug'], 'string', 'max' => 250],
            [['reference_no', 'order_reference_no', 'customer', 'biller', 'attachment'], 'string', 'max' => 55],
            [['note', 'staff_note'], 'string', 'max' => 1000],
            [['order_discount_id', 'sale_status', 'payment_status'], 'string', 'max' => 20],
            [['channel'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'date' => 'Date',
            'reference_no' => 'Reference No',
            'order_reference_no' => 'Order Reference No',
            'customer_id' => 'Customer ID',
            'customer' => 'Customer',
            'biller_id' => 'Biller ID',
            'biller' => 'Biller',
            'warehouse_id' => 'Warehouse ID',
            'email_ids' => 'Email Ids',
            'billing_address' => 'Billing Address',
            'note' => 'Note',
            'staff_note' => 'Staff Note',
            'total' => 'Total',
            'product_discount' => 'Product Discount',
            'order_discount_id' => 'Order Discount ID',
            'total_discount' => 'Total Discount',
            'order_discount' => 'Order Discount',
            'product_tax' => 'Product Tax',
            'order_tax_id' => 'Order Tax ID',
            'order_tax' => 'Order Tax',
            'total_tax' => 'Total Tax',
            'shipping' => 'Shipping',
            'exchange' => 'Exchange',
            'grand_total' => 'Grand Total',
            'sale_status' => 'Sale Status',
            'payment_status' => 'Payment Status',
            'payment_term' => 'Payment Term',
            'due_date' => 'Due Date',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
            'total_items' => 'Total Items',
            'pos' => 'Pos',
            'channel' => 'Channel',
            'paid' => 'Paid',
            'return_id' => 'Return ID',
            'quote_id' => 'Quote ID',
            'sale_order_id' => 'Sale Order ID',
            'surcharge' => 'Surcharge',
            'attachment' => 'Attachment',
            'gst' => 'Gst',
            'consignment_sale' => 'Consignment Sale',
            'show_price_book' => 'Show Price Book',
            'qb_invoice_no' => 'Qb Invoice No',
            'pos_companyid' => 'Pos Companyid',
        ];
    }

}
