<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  $this->registerCss("
  .section {
    padding-top:1rem;
    padding-bottom:1rem
  }
  .section.no-pad {
    padding:0
  }
  .section.no-pad-bot {
    padding-bottom:0
  }
  .section.no-pad-top {
    padding-top:0
  }
  @media only screen and (max-width: 600px) {
     .hide-on-small-only,
     .tabs-wrapper,
     .hide-on-small-and-down {
      display:none !important
    }
  }
 ul.table-of-contents {
   
     position: fixed;
  }
  ul:not(.browser-default) {
    padding-left: 0;
    list-style-type: none;
  }
  a {
    text-decoration: none;
  }
  a:hover, a:focus {
    color: #23527c;
    text-decoration:none;
  }
  ul:not(.browser-default) > li {
    list-style-type: none;
  }
  .table-of-contents li {
    padding:8px 0;
  }
  .table-of-contents li a:hover {
    color: #a8a8a8;
    padding-left: 15px;
    border-left: 1px solid #ee6e73;
  }
  .table-of-contents a {
    display:inline-block;
    font-weight:300;
    color:#757575;
    padding-left:16px;
    height: 1.5rem;
    line-height: 0.5rem;
    display:inline-block
  }
  .nav-pills > li > a{
    border-radius:0px;
  }
  .nav > li > a:hover{
    background-color: #fff!important;

  }
  ul .table-of-contents.nav > li > a:hover{
    background-color: #fff!important;
    color: #a8a8a8;
    padding-left: 15px;
    border-left: 1px solid #ee6e73;
  }
  .table-of-contents a:hover {
    color: #a8a8a8;
    padding-left: 15px;
    border-left: 1px solid #ee6e73;
}
ul.table-of-contents a {
    color: rgba(0,0,0,0.55);
    font-weight: 400;
}
  ul.table-of-contents a.active {
    color: rgba(0,0,0,0.8);
  }
  .table-of-contents a.active {
    font-weight: 500;
    padding-left: 14px;
    border-left: 2px solid #b31b1d;
  }
  .table-of-contents li.active > a{
    font-weight: 500;
    padding-left: 14px;
    border-left: 2px solid #b31b1d;
  }
  body {
    position: relative;
  }
  .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
    color: #111010;
    background-color:#fff;
  }

  .nav-pills {

    opacity: 3;
  }
  .crm-features-h2{
    color: #333 !important; 
    font-weight: 700;
    font-size: 40px;
    font-family: Poppins,sans-serif;
  }
  .crm-features-h4{
    color: #333 !important; 
    font-weight: 700;
    font-size: 22px;
    font-family: Poppins,sans-serif;
  }
  #myScrollspy{
  position:relative;
  overflow:hidden;
}
.navPillsPosition{
  top:-120%;
}
");
?>
  <div class="container">
    <div class="row ">
      <div class="col-sm-3" id="myScrollspy">
        <ul class="table-of-contents nav nav-pills nav-stacked">
          <li class="active"><a href="#Pointofsales">Point of sales </a>
          </li>
          <li><a href="#SalesManagement">Sales Management</a>
          </li>
          <li><a href="#InventoryManagement">Inventory Management</a>
          </li>
          <li><a href="#OutletManagement">Outlet Management </a>
          </li>
          <li><a href="#CustomerManagement">Customer Management</a>
          </li>
          <li><a href="#PurchaseManagement">Purchase Management</a>
          </li>
          <li><a href="#LoyaltyManagement">Loyalty Management</a>
          </li>
          <li><a href="#ContactManagement">Contact Management</a>
          </li>
          <li><a href="#EmployeeManagement">Employee Management</a>
          </li>
          <li><a href="#Integrations">Integrations</a>
          </li>
          <li><a href="#Reports">Reports</a>
          </li>

        </ul>
      </div>
      <div class=" col-sm-9 ecommerce_section">
        <div id="Pointofsales" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
          <h2 class="crm-features-h2">Point of sales </h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Device Adaptability </h4>
              <p>Sell from a tablet or PC. Asalta POS can be managed across multiple devices such as Ipad, Android tabs and Windows PC.</p>
              <h4 class="crm-features-h4">Cash Register</h4>
              <p>Helps in managing your cash flow by, Opening the  register at the beginning of shift and closing the register at the end of shift. And print the cash flow report for the Shift.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Barcode Scanning</h4>
              <p>You can easily integrate with most of the barcode scanners.The process of adding products to the checkout is made easier and simpler. By eliminating the process of typing the Product SKUs manually, by which the check out process is made easier and run your business smoothly.</p>
            </div>
          </div>
        </div>
        <div id="SalesManagement" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
          <h2 class="crm-features-h2">Sales Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Sales Management</h4>
              <p>Asalta helps to manage all your POS sales efficiently and effortlessly. You can sell your products easily on POS. By easily adding products to cart  by scanning them the barcode, receiving payments and checkout by printing the receipt.</p>
              <h4 class="crm-features-h4">Receipts</h4>
              <p>Provide the receipt to customers,  in the way they prefer either by printed recipy or sent receipt to an email.</p>
              <h4 class="crm-features-h4">Price Book </h4>
              <p>You can assign price lists with special discount rates for your best customers and customer groups.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Return Sales</h4>
              <p>Easy Return and Refund of past sales. Provide refunds for individual items or for the entire order.</p>
              <h4 class="crm-features-h4">Discounts</h4>
              <p>Increase customer retention by providing discounts. Provide discounts based on dollar amount or based on percentage. Can provide discount for a single item or whole order.</p>
            </div>
          </div>
        </div>
        <div id="InventoryManagement" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
          <h2 class="crm-features-h2">Inventory Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Inventory List</h4>
              <p>Keep all your inventory organized with details such as prices, costs, and availability of products.</p>
              <h4 class="crm-features-h4">Stock Notification</h4>
              <p>Receive notifications about the low stock Items, to make the purchase of the necessary item in time.</p>
              <h4 class="crm-features-h4">Import Items</h4>
              <p>Add thousands of products to inventory quickly by importing, your products using CSV-spreadsheets.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Bundles (Composite Products)</h4>
              <p>Define a group of Items that are sold as a single packaged unit. </p>
              <h4 class="crm-features-h4">Inventory history</h4>
              <p>Track the flow of your inventory by viewing adjustment log.</p>
            </div>
          </div>
        </div>
        <div id="OutletManagement" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
          <h2 class="crm-features-h2">Outlet Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Transfers</h4>
              <p>Transfer items by creating documents and shift stock between your Outlets.This way will help you keep track on the movement of each item without any hassles.Stock.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Adjustment</h4>
              <p>Asalta Inventory allows to increase and decrease the stock level of the products, which are Damaged and returned.</p>
            </div>
          </div>
        </div>
        <div id="CustomerManagement" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
          <h2 class="crm-features-h2">Customer Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Customer profile</h4>
              <p>Managed your customer profiles Centrally, whether they buy and what they buy you in-store in on Online or Outlet.</p>
              <h4 class="crm-features-h4">Bulk import </h4>
              <p>Bring your existing customers to Asalta by easy CSV import.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Purchase history</h4>
              <p>Know your customers better by tracking their purchase history linked to their profile.</p>
            </div>
          </div>
        </div>
        <div id="PurchaseManagement" class="section scrollspy" style="margin-top: -300px;padding-top: 300px;">
          <h2 class="crm-features-h2">Purchase Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Purchase Order</h4>
              <p>Asalta puts all the necessary information on the supplier and product details at your front when creating a purchase order.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Auto-Reorder</h4>
              <p>Asalta allows you to create an auto purchase order when the item quantity hits a particular level. and the purchase order is sent for Approval to be sent before to the supplier. Which helps you to maintain the stock level hazel free.</p>
            </div>
          </div>
        </div>
        <div id="LoyaltyManagement" class="section scrollspy" style="margin-top: -400px;padding-top: 400px;">
          <h2 class="crm-features-h2">Loyalty Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Reward Points</h4>
              <p>Motivate customers by awarding loyalty points, to make recurring purchases.</p>
            </div>
            <div class="col-sm-6"></div>
            <h4 class="crm-features-h4">Customers database</h4>
            <p>Analyze your customers by the number of visits and the customer purchases amount, to identify your loyal customers.</p>
          </div>
        </div>
        <div id="ContactManagement" class="section scrollspy" style="margin-top: -400px;padding-top: 400px;">
          <h2 class="crm-features-h2">Contact Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Record Customer information</h4>
              <p>Automatically Record all your customer information details and status made by every customer in the database.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="crm-features-h4">User Management</h4>
              <p>Create N number of users, and assign them different roles that they can perform in the system.</p>
            </div>
          </div>
        </div>
        <div id="EmployeeManagement" class="section scrollspy" style="margin-top: -400px;padding-top: 400px;">
          <h2 class="crm-features-h2">Employee Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Employees Sales</h4>
              <p>Track each and every employee's performance and make informed business decisions.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Access rights</h4>
              <p>Manage user credentials provided to the employee. Restrict access of your employees to sensitive information and functions.</p>
            </div>
          </div>
        </div>
        <div id="Integrations" class="section scrollspy" style=" margin-top: -400px;padding-top: 400px;" >
          <h2 class="crm-features-h2" >Integrations</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Apps</h4>
              <p>Asalta Allows integration with different systems such as Accounting Software, eCommerce platform, marketplaces, and payment gateway. and<a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/integration") ?>">more</a> are fully integrated with Asalta crm so you can manage your business with just one system.</p>
            </div>
          </div>
        </div>
        <div id="Reports" class="section scrollspy" style="margin-top: -450px;padding-top: 450px;">
          <h2 class="crm-features-h2">Reports</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Dashboard</h4>
              <p>Get visibility into your business at a glance on the Asalta dashboard. Get details of important notifications, and the overall health of your business on Asalta Dashboard.</p>
              <h4 class="crm-features-h4">Purchase Report</h4>
              <p>Get notified when items that are running low on stock and that need to be restocked. Know when items will be received from the supplier.</p>
              <h4 class="crm-features-h4">Inventory Transaction Report</h4>
              <p>Find inventory transactions details reports of items one location.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Sales Report </h4>
              <p>Know your overall best selling product and your best customer .</p>
              <h4 class="crm-features-h4">Store Balance Report</h4>
              <p>Monitor stock balance availability of items in a single click.</p>
              <h4 class="crm-features-h4">Export Reports</h4>
              <p>Export your report as CSV and PDF at a click.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>      
<?php
$this->registerJs("
  if($(window).scrollTop() + $(window).height() > $(document).height() -270) {
        $('.nav-pills').addClass('navPillsPosition');
    }
    else{
      $('.nav-pills').removeClass('navPillsPosition');
    }
 $(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() > $(document).height() -480) {
        $('.nav-pills').addClass('navPillsPosition');
    }
    else{
      $('.nav-pills').removeClass('navPillsPosition');
    }
 });
 var md = new MobileDetect(window.navigator.userAgent);
    if(md.mobile() || md.tablet() || md.phone()){
      $('#myScrollspy').hide();
      if($(window).scrollTop() + $(window).height() > $(document).height() -1200) {
        $('.nav-pills').addClass('navPillsPosition');
    }
    else{
      $('.nav-pills').removeClass('navPillsPosition');
    }
 $(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() > $(document).height() -1200) {
        $('.nav-pills').addClass('navPillsPosition');
    }
    else{
      $('.nav-pills').removeClass('navPillsPosition');
    }
 });
    }
$('body').scrollspy({ target: '#myScrollspy' })
");