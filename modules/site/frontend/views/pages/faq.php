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
   .faq-features-h2{
     color: #333 !important; 
     font-weight: 700;
     font-size: 40px;
     font-family: Poppins,sans-serif;
     margin-left: -20px;
   }
   .hrm-features-h4{
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
<?php
$country_code = strtolower((isset($_SERVER["HTTP_CF_IPCOUNTRY"]) ? $_SERVER["HTTP_CF_IPCOUNTRY"] : 'in'));
$country = "Global";
if($country_code == "sg"){
    $country = "Singapore";
}elseif($country_code == "in"){
    $country = "India";
}else{
    $country = "Global";
}
?>
    <div class="container">
    <div class="row ">
    <div class="col-sm-3" id="myScrollspy">
        <ul class="table-of-contents nav nav-pills nav-stacked">
            <li class="active"><a href="#AsaltaRetailSuite">Asalta Retail Suite</a></li>
            <li><a href="#eCommerce">eCommerce  </a></li>
            <li><a href="#Inventory">Inventory</a></li>
            <li><a href="#PointOfSale">POS - Point Of Sale</a></li>
            <li><a href="#hrm">HRM</a></li>
        </ul>
    </div>
    <div class=" col-sm-9 ecommerce_section">
    <div id="AsaltaRetailSuite" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
        <h2 class="faq-features-h2">Asalta Retail Suite</h2>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">How long do I get to try Asalta Retail Suite ? </h4>
                <p>You can sign up and try Asalta Retail for its full capability for 14 days after which, you can to subscribe to a suiteable pricing plan that fits your business needs.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">Can I extend my 14-day free trial period? </h4>
                <p>If you think 14 days are not enough to fully explore the system, we’re more than happy to extend your trial. Once your trial expires, contact our sales team by emailing them at <a href="<?=$this->publicHtml;?>/support"> support@asalta.com</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4"> Can I sign up for Asalta Enterprise? </h4>
                <p>Asalta Retail suite is cloud-based inventory management software with complex automation, high security, and 24/7 support. To get started with Asalta Retail Suite Enterprise Package, Contact Sales send us an email at <a href="<?=$this->publicHtml;?>/support"> support@asalta.com</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">Can I cancel my subscription?</h4>
                <p>Absolutely, while we’d hate to see you go, you can cancel the subscription at anytime.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Is my data secure with Asalta Retail suite?
                </h4>
                <p>100%. All your data is completely secure and we protect your account with high level of security in place. Our technical team constantly run security vulnerability scans and tests to make sure everything is safe and secure.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    What time is your support open?
                </h4>
                <p>Asalta offers support 12 hours a day.<br>
                    Support availability:<br>
                    Monday - Friday:<br>
                    <?php if ($country_code == 'Singapore') { ?>
                        Singapore Time Zone (SGT) 9:30AM to 9:30PM<br>
                    <?php } if ($country_code == 'Global') { ?>
                        Greenwich Mean Time (GMT) 1:30AM to 1:30PM<br>
                    <?php } if ($country_code == 'India') { ?>
                        Indian Standard Time (IST) 7:00AM to 7:00PM<br>
                    <?php } ?>
                    CLOSED on Weekends & Public Holidays.<br>
                    Support is provided via email and support ticket.
                </p>
                <p>For any queries, feel free to get in touch with us anytime. We’d love to hear from you! Contact support at <a
                        href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/support") ?>">
                        support@asalta.com</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Does Asalta Technologies offer a knowledge base?
                </h4>
                <p>To help you get started with Asalta Retail suite we provide an extensive knowledge base that consists of useful help articles and video tutorials.<a href="#"> Check it out here.</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    What are the modules in Asalta Retail Suite?
                </h4>
                <p>Asalta Retail suite has different modules to cater to different areas of managing your stock, Employees and custmers .</p>
                <ul>
                    <li>Get the whole picture of your business with our smart Dashboard.</li>
                    <li>Connect easily with your customers and vendors with Contacts.</li>
                    <li>Record and manage your stock with Items and Category.</li>
                    <li>Create bundles with Item combination.</li>
                    <li>Document sales and send invoices.</li>
                    <li>Restock your inventory with Purchase Orders.</li>
                    <li>Leaves Management</li>
                    <li>Timesheet Management</li>
                    <li>Clock In/Out Management</li>
                    <li>Claims Management</li>
                    <li>Commissions Management</li>
                    <li>Performance Appraisal Management</li>
                    <li>Roster Management</li>
                    <li>Holiday Management</li>
                    <li>Announcement</li>
                    <li>Payroll Management</li>
                    <li>Dynamic forms for Survey</li>
                    <li>Recruitment</li>
                    <li>Projet Management</li>
                    <li>Loyalty Management </li>
                    <li>Generate real time and multi-perspective Reports.</li>
                    <li>Expand your reach to new markets with Integrations, which connects your organization with popular online sales channels, providers, online payment gateways, accounting and CRM software.</li>
                    <li>Tailor your organization to suite your needs and preferences with Settings.</li>
                    <li>And much more… Start a FREE Trial to try out for yourself</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Can I use Asalta Retail Suite to process payroll for my part time workers?
                </h4>
                <p>Yes. Asalta Retail suite allows process payroll for your part time workers who are paid monthly or Hourly.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Is there a way to get the current status of my business at a glance?
                </h4>
                <p>Get the complete overview of your organization at a glance with our Asalta smart dashboard, that gives you the synopsis of your items, sales, purchases, employee Activities and Contacts . To further aid you with getting the bigger picture, most of the numerical data displayed in the dashboard is hot-wired with the associated module.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    What are the different editions of Asalta Retail Suite?
                </h4>
                <p>As of now we have 3 editions which are based on the country chosen by the user during the quick setup of the organization. The taxes are handled differently across different editions.</p>
                <p>Global edition - Tuned for the ever-changing conditions of the world, this edition will be applied to all users whose country is not the Singapore or India.</p>
                <p>Indian edition - available to users who have chosen their country as India during the quick setup of their organization.
                </p>
                <p>Singapore edition - available to users who have chosen their country as Singapore while signing up.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    What are the different pricing plans?
                </h4>
                <p>Each industry has its own needs and the volume of their needs is directly proportional to the scale of their business. To cater to your specific needs, we have an array of pricing plans. No hidden costs! No strings attached! You can take a look at our pricing plans by clicking on this<a href="https://www.asalta.com/sg/asalta-retail-suite/pricing"> Link</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    How user friendly is Asalta Retail suite? Do we need any prior technical expertise?
                </h4>
                <p>You don't need to be tech person in order to use Asalta Retails suite. Our system is very simple and does not require technical training. Our simple dashboard allows you to handle all your business operations from a single place.</p>
                <p>Products , contacts and Employees  can be added through spreadsheet imports.</p>
                <p>Furthermore, your sales and purchase orders populate automatically with your data.</p>
                <p>Moreover, we also allow you to easily track and update your order status with a visual overview or generate reports depending on your needs.</p>
                <p>Onboard Training videos and help manual is available for you to get started and to guide you if you need help anytime.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Will I get the same discount every time?
                </h4>
                <p>No. Your discount is applied only for one time purchase. If you choose to upgrade or downgrade your account you will not be eligible for anymore further discounts.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Any other Questions?
                </h4>
                <p>If there’s anything else you’d like to know,  <a href="#frequently_asked_questions"> please read our full FAQs</a> or <a href="#">talk to us</a> or Send us an email. Our team of specialists are available to discuss your business needs and answer any questions.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    What are the Outlets (Warehouse)? Can I confirm that this is for Warehouse (stock locations)? and how about the "transfer to" locations?
                </h4>
                <p>Warehouse, Outlets are locations where inventory items (stocks) are physically kept and or sales activities are carried out. Each pricing plan comes with X number of locations. You can perform any number of transfers within the inventory limit of your plan. If you need additional locations you can buy those locations as add-ons. You will only be charged for active locations.</p>
            </div>
        </div>
    </div>
    <div id="eCommerce" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
        <h2 class="faq-features-h2">eCommerce  </h2>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    How long do I get to try Asalta eCommerce?
                </h4>
                <p>You can sign up and try Asalta eCommerce for its full capability for 14 days
                    after which, you can to subscribe to a suitable pricing plan that fits your
                    business needs.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Can I extend my 14-day free trial period?
                </h4>
                <p>If you think 14 days are not enough to fully explore the system, we’re more
                    than happy to extend your trial. Once your trial expires, contact our sales
                    team by emailing them at <a
                        href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/support") ?>">
                        support@asalta.com</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Can I sign up for Asalta Enterprise?
                </h4>
                <p>Asalta Inventory is cloud-based inventory management software with complex
                    automation, high security, and 24/7 support. To get started with Asalta
                    eCommerce Enterprise Package, Contact Sales send us an email at <a
                        href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/support") ?>">
                        support@asalta.com</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Can I cancel my subscription?
                </h4>
                <p>Absolutely, while we’d hate to see you go, you can cancel the subscription at
                    anytime.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Is my data secure with Asalta eCommerce?
                </h4>
                <p>100%. All your data is completely secure and we protect your account with
                    high level of security in place. Our technical team constantly run security
                    vulnerability scans and tests to make sure everything is safe and
                    secure.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    What time is your support open?
                </h4>
                <p>Asalta offers support 12 hours a day.<br>
                    Support availability:<br>
                    Monday - Friday:<br>
                    <?php if ($country == 'Singapore') { ?>
                        Singapore Time Zone (SGT) 9:30AM to 9:30PM<br>
                    <?php } if ($country == 'Global') { ?>
                        Greenwich Mean Time (GMT) 1:30AM to 1:30PM<br>
                    <?php } if ($country == 'India') { ?>
                        Indian Standard Time (IST) 7:00AM to 7:00PM<br>
                    <?php } ?>
                    CLOSED on Weekends & Public Holidays.<br>
                    Support is provided via email and support ticket.
                </p>
                <p>For any queries, feel free to get in touch with us anytime. We’d love to hear from you! Contact support at <a
                        href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/support") ?>">
                        support@asalta.com</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Is there a way to get the current status of my business at a glance?
                </h4>
                <p>Get the complete overview of your organization at a glance with our Asalta
                    smart dashboard that gives you the synopsis of your items, sales and
                    purchases. To further aid you with getting the bigger picture, most of the
                    numerical data displayed in the dashboard is hot-wired with the associated
                    module.<a href="#"> Check it out here.</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    What are the different pricing plans?
                </h4>
                <p>Each industry has its own needs and the volume of their needs is directly
                    proportional to the scale of their business. To cater to your specific
                    needs, we have an array of pricing plans. No hidden costs! No strings
                    attached! You can take a look at our pricing plans by clicking on this <a
                        href="#"> Check it out here.</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    How is stock tracking done in Asalta eCommerce?
                </h4>
                <p>Physical Stock: In this mode, your stock will increase when a Purchase
                    Receive is made, and the stock will decrease when an Invoice is made to the
                    customer.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Will I get the same discount every time?
                </h4>
                <p>No. Your discount is applied only for one time purchase. If you choose to
                    upgrade or downgrade your account you will not be eligible for anymore
                    further discounts.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    When I have eCommerce signup and I purchase POS Newly what will be my user
                    limits?
                </h4>
                <p>We won’t merge the user counts and warehouse and Order counts the highest
                    limits will be taken in the count and will be upgraded for the new purchase
                    made.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    How often can i change my eCommerce Theme?
                </h4>
                <p>Theme can be changed when ever required by you.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    When I have purchased N as Revenue plan and the revenue limit exits what
                    happen?
                </h4>
                <p>The plan will be automatically updated to the higher plan. </p>
            </div>
        </div>
    </div>
    <div id="Inventory" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
    <h2 class="faq-features-h2">Inventory</h2>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                How long do I get to try Asalta Inventory?
            </h4>
            <p>You can sign up and try Asalta Inventory for its full capability for 14 days after which, you can
                to subscribe to a suitable pricing plan that fits your business needs.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Can I extend my 14-day free trial period?
            </h4>
            <p>If you think 14 days are not enough to fully explore the system, we’re more than happy to extend your trial. Once your trial expires, contact our sales team by emailing them  at <a href="<?=$this->publicHtml;?>/support"> support@asalta.com</a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Can I sign up for Asalta Enterprise?
            </h4>
            <p>Asalta Inventory is cloud-based inventory management software with complex automation, high security, and 24/7 support. To get started with Asalta Inventory Enterprise Package, Contact Sales send us an email at <a href="<?=$this->publicHtml;?>/support"> support@asalta.com</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Can I cancel my subscription?
            </h4>
            <p>Absolutely, while we’d hate to see you go, you can cancel the subscription at anytime.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Is my data secure with Asalta Inventory?
            </h4>
            <p>100%. All your data is completely secure and we protect your account with high level of security in place. Our technical team constantly run security vulnerability scans and tests to make sure everything is safe and secure.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                What time is your support open?
            </h4>
            <p>Asalta offers support 12 hours a day.<br>
                Support availability:<br>
                Monday - Friday:<br>
                <?php if ($country == 'Singapore') { ?>
                    Singapore Time Zone (SGT) 9:30AM to 9:30PM<br>
                <?php } if ($country == 'Global') { ?>
                    Greenwich Mean Time (GMT) 1:30AM to 1:30PM<br>
                <?php } if ($country == 'India') { ?>
                    Indian Standard Time (IST) 7:00AM to 7:00PM<br>
                <?php } ?>
                CLOSED on Weekends & Public Holidays.<br>
                Support is provided via email and support ticket.
            </p>
            <p>For any queries, feel free to get in touch with us anytime. We’d love to hear from you! Contact support at <a
                    href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/support") ?>">
                    support@asalta.com</a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Does Asalta Technologies offer a knowledge base?
            </h4>
            <p>To help you get started with Asalta Inventory we provide an extensive knowledge base that consists of useful help articles and video tutorials.<a href="#"> Check it out here.</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                What are the modules in Asalta Inventory?
            </h4>
            <p>Asalta  Inventory has different modules to cater to different areas of managing your stock.</p>
            <ul>
                <li>Get the whole picture of your business with our smart Dashboard.</li>
                <li>Connect easily with your customers and vendors with Contacts.</li>
                <li>Record and manage your stock with Items and Category.</li>
                <li>Create bundles with Item combination.</li>
                <li>Document sales and send invoices.</li>
                <li>Restock your inventory with Purchase Orders.</li>
                <li>Generate real time and multi-perspective Reports.</li>
                <li>Expand your reach to new markets with Integrations, which connects your organization with popular online sales channels, providers, online payment gateways, accounting and CRM software.</li>
                <li>Tailor your organization to suit your needs and preferences with Settings.</li>
                <li>And much more… Start a FREE Trial to try out for yourself</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Is there a way to get the current status of my business at a glance?
            </h4>
            <p>Get the complete overview of your organization at a glance with our Asalta smart dashboard, that gives you the synopsis of your items, sales and purchases. To further aid you with getting the bigger picture, most of the numerical data displayed in the dashboard is hot-wired with the associated module.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                What are the features available in Asalta Inventory?
            </h4>
            <p>Asalta Inventory supports the following features:</p>
            <p><strong>Stock management:</strong></p>
            <p>Creating and tracking the inventory (stock flow) of Items and Categories. Composite Items -Bundling of items. Serial Number Tracking - For tracking individual units of an item. Customize your item prices by creating price lists and assign them to your favorite customers, sales orders and invoices. FIFO, LIFO and Average cost method can be Selected, stock reports, sales, purchase and activity logs.
            </p>
            <p><strong>Customer and vendor management:</strong></p>
            <p>Recording customer and vendor information for communication, monitoring and transaction. Smart interactive dashboard for a quick look at the Big Picture.  </p>
            <p><strong>Order management:</strong></p>
            <p>Create sales orders, raise invoices, get paid instantly by integrating a payment gateway, Manage reorders, create purchase orders, record deliveries to your warehouse using purchase receives.
            </p>
            <p><strong>Integrations:</strong></p>
            <p>Integrate with popular e-commerce platforms and monitor your stock flow across multiple sales channels. Secure your money by integrating with time tested online payment gateways. Seamlessly integrate with our accounting platform.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                What are the different editions of Asalta Inventory?
            </h4>
            <p>As of now we have 3 editions which are based on the country chosen by the user during the quick setup of the organization. The taxes are handled differently across different editions.
            </p>
            <p> Global edition - Tuned for the ever-changing conditions of the world, this edition will be applied to all users whose country is not the  Singapore or India.</p>
            <p>Indian edition - available to users who have chosen their country as India during the quick setup of their organization.
            </p>
            <p>Singapore  edition - available to users who have chosen their country as Singapore while signing up.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                What are the different pricing plans?
            </h4>
            <p>Each industry has its own needs and the volume of their needs is directly proportional to the scale of their business. To cater to your specific needs, we have an array of pricing plans. No hidden costs! No strings attached!
                You can take a look at our pricing plans by clicking on this <a href="https://www.asalta.com/sg/inventory/pricing"> Link</a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Does Asalta Inventory support barcode scanning?
            </h4>
            <p>Yes. Asalta Inventory supports barcode scanning in the web app.</p>
            <p><strong>For Items:</strong></p>
            <p>You have to key in the bar code of the item as the SKU of said item in Asalta Inventory manually or using a barcode scanner.</p>
            <p>Open a new transaction like an Invoice.</p>
            <p>Place your cursor on the Item Details field.</p>
            <p>Scan the barcode of the item. You’ll see that the line item is automatically added.</p>
            <p>Follow the above step to scan more items, which will be added consecutively</p>
            <p><strong>For Serial Numbers:</strong></p>
            <p>Barcode scanning feature can also be used on serial numbers In Invoices.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                How is stock tracking done in Asalta Inventory?
            </h4>
            <p>Physical Stock: In this mode, your stock will increase when a Purchase Receive is made, and the stock will decrease when an Invoice is made to the customer.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Does Asalta Inventory support expiry dates?
            </h4>
            <p>Yes. we do track Expiry Tracking.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                How user friendly is Asalta Inventory ? Do we need any prior technical expertise?
            </h4>
            <p>You don't need to be tech person in order to use Asalta Inventory. Our system is very simple and does not require technical training. Our simple dashboard allows you to handle all your business operations from a single place.
            </p>
            <p>Products and contacts can be added through spreadsheet imports. </p>
            <p>Furthermore, your sales and purchase orders populate automatically with your data.
            </p>
            <p>Moreover, we also allow you to easily track and update your order status with a visual overview or generate reports depending on your needs.</p>
            <p>Onboard Training videos and help manual is available for you to get started and to guide you if you need help anytime.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Will I get the same discount every time?
            </h4>
            <p>No. Your discount is applied only for one time purchase. If you choose to upgrade or downgrade your account you will not be eligible for anymore further discounts.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Any other Questions?
            </h4>
            <p>If there’s anything else you’d like to know, <a href="#frequently_asked_questions"> please read our full FAQs</a> or <a href="#">talk to us</a> or Send us an email. Our team of specialists are available to discuss your business needs and answer any questions.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                What are the Outlets (Warehouse)? Can I confirm that this is for Warehouse (stock locations)? and how about the "transfer to" locations?
            </h4>
            <p>Warehouse, Outlets are locations where inventory items (stocks) are physically kept and or sales activities are carried out. Each pricing plan comes with X number of locations. You can perform any number of transfers within the inventory limit of your plan. If you need additional locations you can buy those locations as add-ons. You will only be charged for active locations.</p>
        </div>
    </div>
    </div>
    <div id="PointOfSale" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
    <h2 class="faq-features-h2">POS - Point Of Sale</h2>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                How long do I get to try Asalta POS?
            </h4>
            <p>You can sign up and try Asalta POS for its full capability for 14 days after which, you can to subscribe to a suitable pricing plan that fits your business needs.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Can I extend my 14-day free trial period?
            </h4>
            <p>If you think 14 days are not enough to fully explore the system, we’re more than happy to extend your trial. Once your trial expires, contact our sales team by emailing them  at <a href="#">sales@asalta.com</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Can I sign up for Asalta Enterprise ?
            </h4>
            <p>Asalta POS is cloud-based POS management software with complex automation, high security, and 24/7 support. To get started with Asalta Inventory Enterprise Package, Contact Sales send us an email at <a href="#">sales@asalta.com</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Can I cancel my subscription?
            </h4>
            <p>Absolutely, while we’d hate to see you go, you can cancel the subscription at anytime.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Is my data secure with Asalta POS?
            </h4>
            <p>100%. All your data is completely secure and we protect your account with high level of security in place. Our technical team constantly run security vulnerability scans and tests to make sure everything is safe and secure.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                What time is your support open?
            </h4>
            <p>Asalta offers support 12 hours a day.<br>
                Support availability:<br>
                Monday - Friday:<br>
                <?php if ($country == 'Singapore') { ?>
                    Singapore Time Zone (SGT) 9:30AM to 9:30PM<br>
                <?php } if ($country == 'Global') { ?>
                    Greenwich Mean Time (GMT) 1:30AM to 1:30PM<br>
                <?php } if ($country == 'India') { ?>
                    Indian Standard Time (IST) 7:00AM to 7:00PM<br>
                <?php } ?>
                CLOSED on Weekends & Public Holidays.<br>
                Support is provided via email and support ticket.
            </p>
            <p>For any queries, feel free to get in touch with us anytime. We’d love to hear from you! Contact support at <a
                    href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/support") ?>">
                    support@asalta.com</a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Does Asalta Technologies offer a knowledge base?
            </h4>
            <p>To help you get started with Asalta POS we provide an extensive knowledge base that consists of useful help articles and video tutorials. <a href="#"> Check it out here </a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                What are the modules in Asalta POS?
            </h4>
            <p>Asalta  Inventory has different modules to cater to different areas of managing your stock.</p>
            <ul>
                <li>Get the whole picture of your business with our smart Dashboard.</li>
                <li>Connect easily with your customers and vendors with Contacts.</li>
                <li>Record your sales with Point of sales system and send receipts to customers.</li>
                <li>Record and manage your stock with Items and Category.</li>
                <li>Create bundles with Item combination.</li>
                <li>Manage return sales made by customers. </li>
                <li>Restock your inventory with Purchase Orders.</li>
                <li>Generate real time and multi-perspective Reports.</li>
                <li>Expand your reach to new markets with Integrations, which connects your organization with popular online sales channels, providers, online payment gateways, accounting and CRM software.</li>
                <li>Tailor your organization to suit your needs and preferences with Settings.</li>
                <li>And much more… Start a FREE Trial to try out for yourself.</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Is there a way to get the current status of my business at a glance?
            </h4>
            <p>Get the complete overview of your organization at a glance with our Asalta smart dashboard, that gives you the synopsis of your items, sales and purchases. To further aid you with getting the bigger picture, most of the numerical data displayed in the dashboard is hot-wired with the associated module.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                What are the features available in Asalta POS?
            </h4>
            <p>Asalta POS supports the following features:</p>
            <p><strong>Stock management:</strong></p>
            <p>Creating and tracking the inventory (stock flow) of Items and Categories. Composite Items -Bundling of items. Serial Number Tracking - For tracking individual units of an item. Customize your item prices by creating price lists and assign them to your favorite customers, sales orders and invoices. FIFO, LIFO and Average cost method can be Selected, stock reports, sales, purchase and activity logs.</p>
            <p><strong>Customer and vendor management:</strong></p>
            <p> Recording customer and vendor information for communication, monitoring and transaction. Smart interactive dashboard for a quick look at the Big Picture.</p>
            <p>Cash Management Reduce errors, theft and discrepancies by recording all changes from cash float to register closures. Handle cash withdrawals with ease.</p>
            <p><strong>Register closure reports</strong></p>
            <p> Get a printable record of your daily totals. Add notes about the day and check your totals by payment type</p>
            <p><strong>Return sales</strong></p>
            <p>Tracks the return sales made and also tracks the return goods inventory </p>
            <p><strong>Integrations:</strong></p>
            <p> Integrate with popular e-commerce platforms and monitor your stock flow across multiple sales channels. Secure your money by integrating with time tested online payment gateways. Seamlessly integrate with our accounting platform.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                What are the different editions of Asalta POS?
            </h4>
            <p>As of now we have 3 editions which are based on the country chosen by the user during the quick setup of the organization. The taxes are handled differently across different editions.</p>
            <p>Global edition - Tuned for the ever-changing conditions of the world, this edition will be applied to all users whose country is not the  Singapore or India.</p>
            <p>Indian edition - available to users who have chosen their country as India during the quick setup of their organization.</p>
            <p>Singapore  edition - available to users who have chosen their country as Singapore while signing up.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                What are the different pricing plans?
            </h4>
            <p>Each industry has its own needs and the volume of their needs is directly proportional to the scale of their business. To cater to your specific needs, we have an array of pricing plans. No hidden costs! No strings attached!</p>
            <p>You can take a look at our pricing plans by  <a href="#pricingPlanDiv"> clicking on this Link </a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Does Asalta POS support barcode scanning?
            </h4>
            <p>Yes. Asalta POS supports barcode scanning in the web app.</p>
            <p><strong>For Items:</strong></p>
            <p>You have to key in the bar code of the item as the SKU of said item in Asalta POS manually or using a barcode scanner.</p>
            <p>Open a new transaction like an Invoice.</p>
            <p>Place your cursor on the Item Details field.</p>
            <p>Scan the barcode of the item. You’ll see that the line item is automatically added.</p>
            <p>Follow the above step to scan more items, which will be added consecutively</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                I have thousands of existing printed barcodes from my old POS, can I use these with Asalta POS?
            </h4>
            <p>Yes. Existing barcodes can be scanned into the SKU field in the product page, so you won’t have to generate new ones from scratch.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                How is stock tracking done in Asalta POS?
            </h4>
            <p>Physical Stock: In this mode, your stock will increase when a Purchase Receive is made, and the stock will decrease when an Invoice is made to the customer.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Does Asalta POS support expiry dates?
            </h4>
            <p>Yes. we do track Expiry Tracking.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                How user friendly is Asalta POS ? Do we need any prior technical expertise?
            </h4>
            <p>You don't need to be tech person in order to use Asalta POS. Our system is very simple and does not require technical training. Our simple dashboard allows you to handle all your business operations from a single place.</p>
            <p>Products and contacts can be added through spreadsheet imports. </p>
            <p>Furthermore, your sales and purchase orders populate automatically with your data.</p>
            <p>Moreover, we also allow you to easily track and update your order status with a visual overview or generate reports depending on your needs.</p>
            <p>Onboard Training videos and help manual is available for you to get started and to guide you if you need help anytime.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                I love our accounting software, does it integrate with Asalta POS?
            </h4>
            <p>Asalta POS works great with Xero and Quickbooks online accounting. Data flows seamlessly between your POS and accounting software giving you greater insights into your business performance and eliminating the need for manual data entry. The integration is simple to set up and free to use, check out more information here.  If you need further integration with any other accounting software that allows integration do contact our <a href="<?=$this->publicHtml;?>/support"> support@asalta.com.</a> we are happy to help.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Does Asalta POS handle returns?
            </h4>
            <p>Yes. You can return any order and Asalta POS will handle Returns and  synchronize it with Xero, Quickbooks accounting system</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Does Asalta POS support consignment?
            </h4>
            <p>Yes. Because we allow for multiple locations, you can assign stocks to each location and sell as consignment.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Will I get the same discount every time?
            </h4>
            <p>No. Your discount is applied only for one time purchase. If you choose to upgrade or downgrade your account you will not be eligible for anymore further discounts.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Any other Questions?
            </h4>
            <p>If there’s anything else you’d like to know, please read our full <a href="#frequently_asked_questions">please read our full FAQs</a> or <a href="#">talk to us</a> or Send us an email. Our team of specialists are available to discuss your business needs and answer any questions.</p>
        </div>
    </div>
    </div>
    <div id="hrm" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
        <h2 class="faq-features-h2">HRM</h2>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    How long do I get to try Asalta HRM?
                </h4>
                <p>You can sign up and try Asalta HRM for its full capability for 14 days after which, you can
                    to subscribe to a suitable pricing plan that fits your business needs.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Can I extend my 14-day free trial period?
                </h4>
                <p>If you think 14 days are not enough to fully explore the system, we’re more than happy to extend your trial. Once your trial expires, contact our sales team by emailing them at <a href="#">sales@asalta.com</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Can I cancel my subscription?
                </h4>
                <p>Absolutely, while we’d hate to see you go, you can cancel the subscription at anytime.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Is my data secure with Asalta HRM?
                </h4>
                <p>100%. All your data is completely secure and we protect your account with high level of security in place. Our technical team constantly run security vulnerability scans and tests to make sure everything is safe and secure.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    What time is your support open?
                </h4>
                <p>Asalta offers support 12 hours a day.<br>
                    Support availability:<br>
                    Monday - Friday:<br>
                    <?php if ($country == 'Singapore') { ?>
                        Singapore Time Zone (SGT) 9:30AM to 9:30PM<br>
                    <?php } if ($country == 'Global') { ?>
                        Greenwich Mean Time (GMT) 1:30AM to 1:30PM<br>
                    <?php } if ($country == 'India') { ?>
                        Indian Standard Time (IST) 7:00AM to 7:00PM<br>
                    <?php } ?>
                    CLOSED on Weekends & Public Holidays.<br>
                    Support is provided via email and support ticket.
                </p>
                <p>For any queries, feel free to get in touch with us anytime. We’d love to hear from you! Contact support at <a
                        href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/support") ?>">
                        support@asalta.com</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Does Asalta HRM offer a knowledge base?
                </h4>
            <p>To help you get started with Asalta HRM we provide an extensive knowledge base that consists of useful help articles and video tutorials.<a href="#"> Check it out here.</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Is there a minimum subscription period?
            </h4>
            <p>No. there is no minimum subscription period or contractual obligation. Asalta HRM! pricing is based on monthly and yearly subscription.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                What is Asalta HRM?
            </h4>
            <p>Asalta HRM is an easy-to-use and 100% web-based HRM application. It also removes the hassle and tediousness of computing salary payment and CPF contributions manually, preparing and distributing payslips, and manual leave, claims, commission, Timesheet, Rostering and management.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Why should I use Asalta HRM?
            </h4>
            <p>Absolutely, while we’d hate to see you go, you can cancel the subscription at anytime.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                What are the modules in Asalta HRM?
            </h4>
            <p>Asalta HRM has different modules to cater to different areas of managing your Information.</p>
            <ul>
                <li>Get the whole picture of your Employee management with our smart Dashboard.</li>
                <li>Leaves Management </li>
                <li>Timesheet  Management</li>
                <li>Clock In/Out Management</li>
                <li>Claims  Management</li>
                <li>Commissions  Management</li>
                <li>Performance Appraisal  Management</li>
                <li>Roster  Management</li>
                <li>Holiday Management</li>
                <li>Announcement</li>
                <?php if($country == 'Singapore'){ ?>
                    <li>Payroll Management </li>
                <?php } ?>
                <li>Dynamic forms for Survey</li>
                <li>Recruitment</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Do you have Mobile App for HRM?
            </h4>
            <p>Yes. There is a FREE Mobile App available to download from App store and Google Play for Asalta HRM.</p>
        </div>
    </div>
    <?php if($country == 'Singapore'){ ?>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Can I view other employee’s payslip via the Asalta HRM mobile app?
                </h4>
                <p>No. you can only view your own payslip on Asalta HRM mobile app. Only Administrator has such privileges.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="hrm-features-h4">
                    Can I use Asalta HRM to process payroll for my part time workers?
                </h4>
                <p>Yes. Asalta HRM can process payroll for your part time workers who are paid monthly or Hourly.</p>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Will I get the same discount every time?
            </h4>
            <p>No. Your discount is applied only for one time purchase. If you choose to upgrade or downgrade your account you will not be eligible for anymore further discounts.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="hrm-features-h4">
                Any other Questions?
            </h4>
            <p>If there’s anything else you’d like to know, <a href="#frequently_asked_questions"> please read our full FAQs</a> or <a href="#">talk to us</a> or Send us an email. Our team of specialists are available to discuss your business needs and answer any questions.</p>
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
if($(window).scrollTop() + $(window).height() > $(document).height() -420) {
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