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
  .inventory-features-h2{
    color: #333 !important; 
    font-weight: 700;
    font-size: 40px;
    font-family: Poppins,sans-serif;
  }
  .inventory-features-h4{
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
          <li class="active"><a href="#InventoryManagement">Inventory Management</a>
          </li>
          <li><a href="#WarehouseManagement">Warehouse Management</a>
          </li>
          <li><a href="#SalesManagement">Sales Management</a>
          </li>
          <li><a href="#LoyaltyManagement">Loyalty Management</a>
          </li>
          <li><a href="#PurchaseManagement">Purchase Management</a>
          </li>
          <li><a href="#ContactManagement">Contact Management</a>
          </li>
          <li><a href="#Integrations">Integrations</a>
          </li>
          <li><a href="#Reports">Reports</a>
          </li>
        </ul>
      </div>
      <div class=" col-sm-9 ecommerce_section">
        <div id="InventoryManagement" class="section scrollspy" style="margin-top: -200px; padding-top: 200px;">
          <h2 class="inventory-features-h2" >Inventory Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">Inventory List</h4>
              <p>Keep all your inventory organized with details such as  prices, costs and availability of products.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">Variants </h4>
              <p>Create variants for the item based on custom attributes and keep them organized.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">Bundles (Composite Products)</h4>
              <p>Define group of Items that are sold as a single package unit.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">Price Book</h4>
              <p>You can assign price lists with special discount rates for your best customers and customer groups.</p>
            </div>
          </div>
        </div>
        <div id="WarehouseManagement" class="section scrollspy" style="margin-top:-200px;padding-top:200px;">
          <h2 class="inventory-features-h2" >Warehouse Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">Transfers</h4>
              <p>Transfer an item from one warehouse to another warehouse. This way will help you keep a track on the movement of each item without any hassles.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">Stock Adjustment</h4>
              <p>Asalta Inventory allows to increase and decrease the stock level of the products, which are Damaged and returned.</p>
            </div>
          </div>
        </div>
        <div id="SalesManagement" class="section scrollspy" style="margin-top:-200px;padding-top:200px;">
          <h2 class="inventory-features-h2" >Sales Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">Order Management</h4>
              <p>Asalta Inventory helps to manage all your  sales  and orders efficiently and effortlessly. You can sell your products  on different marketplaces such as  POS, B2B and eCommerce platforms.</p>
            </div>
            <div class="col-sm-6">
               <h4 class="inventory-features-h4">Return Sales</h4>
              <p>Easy Return and Refund of past sales.</p>
            </div>
          </div>
        </div>
        <div id="LoyaltyManagement" class="section scrollspy" style="margin-top:-200px;padding-top:200px;">
          <h2 class="inventory-features-h2" >Loyalty Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">Sales data analytics</h4>
              <p>Highlight the best product in terms of quantity sold. Find the best customer in terms of revenue. Display a graph with your monthly sales per product and add it to your Dashboard. Group your Sales by Partner and display the products in the column header.</p>
            </div>
          </div>
        </div>
        <div id="PurchaseManagement" class="section scrollspy" style="margin-top:-200px;padding-top:200px;">
          <h2 class="inventory-features-h2" >Purchase Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">Purchase Order</h4>
              <p>Asalta puts all the necessary information of the supplier and product details at your front when creating a purchase order.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">Auto Reorder</h4>
              <p>Asalta allows you to create auto purchase order, when the item quantity hits particular level. and the purchase order are sent for Approval to be sent before to supplier.Which helps you to maintain the stock level hazel free. </p>
            </div>
          </div>
        </div>
        <div id="ContactManagement" class="section scrollspy" style="margin-top:-200px;padding-top:200px;">
          <h2 class="inventory-features-h2" >Contact Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">Record Customer information</h4>
              <p>Automatically Record all your customer information details and status made by every customer in the database.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">User Management</h4>
              <p>Create N number of users, and assign them different roles that they can perform in the system.</p>
            </div>
          </div>
        </div>
        <div id="Integrations" class="section scrollspy" style="margin-top:-200px;padding-top:200px;">
          <h2 class="inventory-features-h2" >Integrations</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">Apps</h4>
              <p>Asalta Allows integration with different systems such as Accounting Software,eCommerce platform, Xero, Quick books, woo commerce, marketplaces, payment gateway and <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/integration") ?>">more</a> are fully integrated with Asalta inventory system..</p>
            </div>
          </div>
        </div>
        <div id="Reports" class="section scrollspy" style="margin-top:-200px;padding-top:200px;">
          <h2 class="inventory-features-h2" >Reports</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">Dashboard</h4>
              <p>Get visibility into your business at a glance on the Asalta dashboard. Get details of important notifications, and the overall health of your business on Asalta Dashboard.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">Sales Report</h4>
              <p>Know your overall best selling product and your best customer.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">Purchase Report</h4>
              <p>Get notified when items that are running low on stock and that needed  to be restocked. Know when items will be received from the supplier.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="inventory-features-h4">Export Reports</h4>
              <p>Export your repost as CSV and PDF at a click.</p>
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
    if($(window).scrollTop() + $(window).height() > $(document).height() -270) {
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