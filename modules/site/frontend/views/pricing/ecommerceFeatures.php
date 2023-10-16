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
  .e-commerce-features-h2{
    color: #333 !important; 
    font-weight: 700;
    font-size: 40px;
    font-family: Poppins,sans-serif;
  }
  .e-commerce-features-h4{
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
          <li class="active"><a href="#Design-configure">Design & configure</a>
          </li>
          <li><a href="#Payment">Payment</a>
          </li>
          <li><a href="#Shoppingexperience">Shopping experience</a>
          </li>
          <li><a href="#Reporting">Reporting</a>
          </li>
          <li><a href="#Integrations">Integrations</a>
          </li>
        </ul>
      </div>
      <div class="col-sm-9 ecommerce_section">
        <div id="Design-configure" class="section scrollspy" style=" margin-top: -200px;padding-top: 200px;">
          <h2 class="e-commerce-features-h2" >Design & configure</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="e-commerce-features-h4">Professional Themes</h4>
              <p>Change theme in a few clicks, and browse through Asaltas's catalog of ready-to-use themes available in our app store</p>
            </div>
            <div class="col-sm-6">
              <h4 class="e-commerce-features-h4">Product variants</h4>
              <p>Create a product available in several variants like size, colors or other attributes.</p>
            </div>
          </div>
        </div>
        <div id="Payment" class="section scrollspy" style=" margin-top: -200px;padding-top: 200px;" >
          <h2 class="e-commerce-features-h2" >Payment</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="e-commerce-features-h4">Payment Method</h4>
              <p>Allow customers to pay with <strong>Paypal</strong>, <strong>Stripe</strong> and <strong>Skrill</strong> payment. Online payment methods redirect customers to a 'Thank you' page on your website.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="e-commerce-features-h4">Shipping rules</h4>
              <p>Define rules to calculate the costs of a delivery Based on the Order cost.</p>
            </div>
          </div>
        </div>
        <div id="Shoppingexperience" class="section scrollspy" style=" margin-top: -200px;padding-top: 200px;" >
          <h2 class="e-commerce-features-h2" >Shopping experience</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="e-commerce-features-h4">Easy search system</h4>
              <p>Make finding products easier by setting attributes on products</p>
              <h4 class="e-commerce-features-h4">Customer portal</h4>
              <p>Access tracking of orders, advanced shipping rules and return management through the customer portal.</p>
              <h4 class="e-commerce-features-h4">Wishlist</h4>
              <p>Shoppers can add products to a wishlist. Returning customers will use it to buy their favorite items faster.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="e-commerce-features-h4">Easy checkout process</h4>
              <p>Simple checkout to avoid losing clients.</p>
              <h4 class="e-commerce-features-h4">Order review</h4>
              <p>See details of your order at the end of the process.</p>
            </div>
          </div>
        </div>
        <div id="Reporting" class="section scrollspy" style=" margin-top: -200px;padding-top: 200px;" >
          <h2 class="e-commerce-features-h2" >Reporting</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="e-commerce-features-h4">Sales data analytics</h4>
              <p>Highlight the best product in terms of quantity sold. Find the best customer in terms of revenue. Display a graph with your monthly sales per product and add it to your Dashboard. Group your Sales by Partner and display the products in the column header.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="e-commerce-features-h4">Dashboard</h4>
              <p>The next actions to do are available on the dashboard: orders to invoice, payments to receive, shoppers to revive, etc.</p>
            </div>
          </div>
        </div>
        <div id="Integrations" class="section scrollspy" style=" margin-top: -200px;padding-top: 200px;" >
          <h2 class="e-commerce-features-h2" >Integrations</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="e-commerce-features-h4">Apps</h4>
              <p>Asalta Inventory, Asalta CRM, Xero and Quick books Accounting and <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/integration") ?>">more</a> are fully integrated with Asalta eCommerce so you can manage your business with just one system.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>      
<?php
$this->registerJs("
  if($(window).scrollTop() + $(window).height() > $(document).height() -169) {
        $('.nav-pills').addClass('navPillsPosition');
    }
    else{
      $('.nav-pills').removeClass('navPillsPosition');
    }
 $(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() > $(document).height() -169) {
        $('.nav-pills').addClass('navPillsPosition');
    }
    else{
      $('.nav-pills').removeClass('navPillsPosition');
    }
 });
 var md = new MobileDetect(window.navigator.userAgent);
    if(md.mobile() || md.tablet() || md.phone()){
      $('#myScrollspy').hide();
      if($(window).scrollTop() + $(window).height() > $(document).height() -1350) {
        $('.nav-pills').addClass('.navPillsPosition');
        
    }
    else{
      $('.nav-pills').removeClass('navPillsPosition');
       
    }
 $(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() > $(document).height() -1350) {
        $('.nav-pills').addClass('navPillsPosition');
    }
    else{
      $('.nav-pills').removeClass('navPillsPosition');
    }
 });
    }
$('body').scrollspy({ target: '#myScrollspy' })
");