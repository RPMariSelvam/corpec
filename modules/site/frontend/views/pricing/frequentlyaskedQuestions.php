<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  $this->registerCss("
  .faq_h1{
    font-weight: 700;
    padding-bottom: 15px;
   padding-top: 15px;
   text-align: center;
    font-family: Raleway,Helvetica Neue,Helvetica,Arial,sans-serif;
  }
  #faqscrch.form-control{
  width: 100%;
  font-size: 20px;
  padding: 6px 50px;
  }
  .fa.fa-search{
    font-size:30px;
  }
  .input-container i {
    position: absolute;
    padding: 8px 15px;
    color: #000;
  }
  .faq_h3{
    font-size: 35px!important;
    font-weight: 500;
    color: #b31b1d;
    font-family: Raleway,Helvetica Neue,Helvetica,Arial,sans-serif;
  }
  .highlight { 
    background:green;
  }
  .btnwidth .btn-faqlink{
    width:100px;
  }
  .btn-faqlink {
    color: #b31b1d;
    background-color: transparent;
    background-image: none;
    border-color: #b31b1d
}
.btn-faqlink:hover {
    color: #fff;
    background-color: #b31b1d;
    border-color: #b31b1d
}
.btn-faqlink.focus,
.btn-faqlink:focus {
    box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
}
.btn-faqlink.disabled,
.btn-faqlink:disabled {
    color: #b31b1d;
    background-color: transparent
}
.btn-faqlink:not(:disabled):not(.disabled).active,
.btn-faqlink:not(:disabled):not(.disabled):active,
.show>.btn-faqlink.dropdown-toggle {
    color: #fff;
    background-color: #b31b1d;
    border-color: #b31b1d
}
.btn-faqlink:not(:disabled):not(.disabled).active:focus,
.btn-faqlink:not(:disabled):not(.disabled):active:focus,
.show>.btn-faqlink.dropdown-toggle:focus {
    box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
}
  ");
?>
<div class="container">
  <h1 class="faq_h1">Frequently asked questions</h1>
  <br><br>
    <div class="form-group input-container">
        <div class="col-sm-8 col-xs-offset-2">
          <i class="fa fa-search"></i>
          <input id="faqscrch" class="form-control" type="text" placeholder="Search our FAQs"><br><br>
        </div>
    </div>
    <div class="col-md-12 form-group">
        <div class="col-sm-2">
            <a class="btn btn-faqlink" href="#Overview"> Overview</a>
        </div>
        <div class="col-sm-2"> 
           <a class="btn btn-faqlink"  href="#RetailSuite">Retail Suite</a>
        </div>
        <div class="col-sm-2">  
            <a class="btn btn-faqlink" href="#eCommerce">
                eCommerce </a>
            </div>
        <div class="col-sm-2"> 
            <a class="btn btn-faqlink" href="#Inventory">Inventory</a>
        </div>
        <div class="col-sm-2 btnwidth">
            <a class="btn btn-faqlink" href="#POS">POS</a>
        </div>
        <div class="col-sm-2 btnwidth">
           <a class="btn btn-faqlink"  href="#HRM">HRM</a>
        </div>
    </div>
     <div id="Overview" ></div>
    <div class="col-md-12">
        <div id="faqcontent">
          <div class="panel-group" id="accordion">
           
            <div><h3 class="faq_h3">Overview</h3></div>
            <div class="panel panel-default" style="border-top: 1px solid #ddd !important">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseoverviewOne" aria-expanded="true">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Can I extend my 14-day free trial period?
                        </h4>
                    </div>
                </a>
                <div id="collapseoverviewOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>If you think 14 days are not enough to fully explore the system, we’re more than happy to extend your trial. Once your trial expires, contact our sales team by emailing them at <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/support") ?>"> support@asalta.com</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseoverviewTwo" aria-expanded="false">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      Will I get the same discount every time?
                    </h4>
                  </div>
              </a>
              <div id="collapseoverviewTwo" class="panel-collapse collapse">
                  <div class="panel-body">
                      <p>No. Your discount is applied only for one time purchase. If you choose to upgrade or downgrade your account you will not be eligible for anymore further discounts.
                        </p>
                  </div>
              </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseoverviewThree" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Can I sign up for Asalta Enterprise?
                        </h4>
                    </div>
                </a>
                <div id="collapseoverviewThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Asalta Inventory is cloud-based inventory management software with complex automation, high security, and 24/7 support. To get started with Asalta eCommerce Enterprise Package, Contact Sales send us an email at <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/support") ?>"> support@asalta.com</a></p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseoverviewFour" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Can I cancel my subscription?
                        </h4>
                    </div>
                </a>
                <div id="collapseoverviewFour" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Absolutely, while we’d hate to see you go, you can cancel the subscription at anytime.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseoverviewFive" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            What time is your support open?
                        </h4>
                    </div>
                </a>
                <div id="collapseoverviewFive" class="panel-collapse collapse">
                    <div class="panel-body">
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
                                support@asalta.com</a></p>
                    </div>
                </div>
            </div>
            <div id="RetailSuite" ></div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseoverviewSix" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Is there a way to get the current status of my business at a glance?
                        </h4>
                    </div>
                </a>
                <div id="collapseoverviewSix" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Get the complete overview of your organization at a glance with our Asalta smart dashboard, that gives you the synopsis of your items, sales, purchases, employee Activities and Contacts . To further aid you with getting the bigger picture, most of the numerical data displayed in the dashboard is hot-wired with the associated module.</p>
                    </div>
                </div>
            </div>
            
            <div ><h3 class="faq_h3">Retail Suite</h3></div>
            <div class="panel panel-default" style="border-top: 1px solid #ddd !important">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseretailOne" aria-expanded="true">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            How long do I get to try Asalta Retail Suite ?
                        </h4>
                    </div>
                </a>
                <div id="collapseretailOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>You can sign up and try Asalta Retail for its full capability for 14 days after which, you can to subscribe to a suiteable pricing plan that fits your business needs.
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseretailFive" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Is my data secure with Asalta Retail suite?
                        </h4>
                    </div>
                </a>
                <div id="collapseretailFive" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>100%. All your data is completely secure and we protect your account with high level of security in place. Our technical team constantly run security vulnerability scans and tests to make sure everything is safe and secure.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseretailSeven" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Does Asalta Technologies offer a knowledge base?
                        </h4>
                    </div>
                </a>
                <div id="collapseretailSeven" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>To help you get started with Asalta Retail suite we provide an extensive knowledge base that consists of useful help articles and video tutorials.<a href="#"> Check it out here.</a></p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseretailEight" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            What are the modules in Asalta Retail Suite?
                        </h4>
                    </div>
                </a>
                <div id="collapseretailEight" class="panel-collapse collapse">
                    <div class="panel-body">
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
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseretailNine" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Can I use Asalta Retail Suite to process payroll for my part time workers?
                        </h4>
                    </div>
                </a>
                <div id="collapseretailNine" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Yes. Asalta Retail suite allows process payroll for your part time workers who are paid monthly or Hourly.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseretailEleven" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            What are the different editions of Asalta Retail Suite?
                        </h4>
                    </div>
                </a>
                <div id="collapseretailEleven" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>As of now we have 3 editions which are based on the country chosen by the user during the quick setup of the organization. The taxes are handled differently across different editions.</p>
                        <p>Global edition - Tuned for the ever-changing conditions of the world, this edition will be applied to all users whose country is not the Singapore or India.</p>
                        <p>Indian edition - available to users who have chosen their country as India during the quick setup of their organization.
                        </p>
                        <p>Singapore edition - available to users who have chosen their country as Singapore while signing up.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseretailThirteen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            How user friendly is Asalta Retail suite? Do we need any prior technical expertise?
                        </h4>
                    </div>
                </a>
                <div id="collapseretailThirteen" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>You don't need to be tech person in order to use Asalta Retails suite. Our system is very simple and does not require technical training. Our simple dashboard allows you to handle all your business operations from a single place.</p>
                        <p>Products , contacts and Employees  can be added through spreadsheet imports.</p>
                        <p>Furthermore, your sales and purchase orders populate automatically with your data.</p>
                        <p>Moreover, we also allow you to easily track and update your order status with a visual overview or generate reports depending on your needs.</p>
                        <p>Onboard Training videos and help manual is available for you to get started and to guide you if you need help anytime.</p>
                    </div>
                </div>
            </div>
              <div id="eCommerce"></div>
            <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseretailSixteen" aria-expanded="false">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          What are the Outlets (Warehouse)? Can I confirm that this is for Warehouse (stock locations)? and how about the "transfer to" locations?
                      </h4>
                  </div>
              </a>
              <div id="collapseretailSixteen" class="panel-collapse collapse">
                  <div class="panel-body">
                      <p>Warehouse, Outlets are locations where inventory items (stocks) are physically kept and or sales activities are carried out. Each pricing plan comes with X number of locations. You can perform any number of transfers within the inventory limit of your plan. If you need additional locations you can buy those locations as add-ons. You will only be charged for active locations.</p>
                  </div>
              </div>
            </div>
          
            <div><h3 class="faq_h3">eCommerce</h3></div>
            <div class="panel panel-default" style="border-top: 1px solid #ddd !important">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseecommerceOne" aria-expanded="true">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            How long do I get to try Asalta eCommerce?
                        </h4>
                    </div>
                </a>
                <div id="collapseecommerceOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>You can sign up and try Asalta eCommerce for its full capability for 14 days after which, you can to subscribe to a suitable pricing plan that fits your business needs.
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseecommerceFive" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                           Is my data secure with Asalta eCommerce?
                        </h4>
                    </div>
                </a>
                <div id="collapseecommerceFive" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>100%. All your data is completely secure and we protect your account with high level of security in place. Our technical team constantly run security vulnerability scans and tests to make sure everything is safe and secure.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseecommerceNine" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                           How is stock tracking done in Asalta eCommerce?
                        </h4>
                    </div>
                </a>
                <div id="collapseecommerceNine" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Physical Stock: In this mode, your stock will increase when a Purchase Receive is made, and the stock will decrease when an Invoice is made to the customer.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseecommerceEleven" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            When I have eCommerce signup and I purchase POS Newly what will be my user limits?
                        </h4>
                    </div>
                </a>
                <div id="collapseecommerceEleven" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>We won’t merge the user counts and warehouse and Order counts the highest limits will be taken in the count and will be upgraded for the new purchase made.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseecommerceTwelve" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            How often can i change my eCommerce Theme?
                        </h4>
                    </div>
                </a>
                <div id="collapseecommerceTwelve" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Theme can be changed when ever required by you. 
                        </p>
                    </div>
                </div>
            </div>
             <div id="Inventory"></div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseecommerceThirteen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                           When I have purchased N as Revenue plan and the revenue limit exits what happen?
                        </h4>
                    </div>
                </a>
                <div id="collapseecommerceThirteen" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>The plan will be automatically updated to the higher plan.  </p>
                    </div>
                </div>
            </div>
           
            <div><h3 class="faq_h3">Inventory</h3></div>
            <div class="panel panel-default" style="border-top: 1px solid #ddd !important">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseinventoryOne" aria-expanded="true">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            How long do I get to try Asalta Inventory?
                        </h4>
                    </div>
                </a>
                <div id="collapseinventoryOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>You can sign up and try Asalta Inventory for its full capability for 14 days after which, you can
                            to subscribe to a suitable pricing plan that fits your business needs.
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseinventoryFive" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Is my data secure with Asalta Inventory?
                        </h4>
                    </div>
                </a>
                <div id="collapseinventoryFive" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>100%. All your data is completely secure and we protect your account with high level of security in place. Our technical team constantly run security vulnerability scans and tests to make sure everything is safe and secure.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseinventorySeven" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Does Asalta Technologies offer a knowledge base?
                        </h4>
                    </div>
                </a>
                <div id="collapseinventorySeven" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>To help you get started with Asalta Inventory we provide an extensive knowledge base that consists of useful help articles and video tutorials.<a href="#"> Check it out here.</a></p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseinventoryEight" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            What are the modules in Asalta Inventory?
                        </h4>
                    </div>
                </a>
                <div id="collapseinventoryEight" class="panel-collapse collapse">
                    <div class="panel-body">
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
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseinventoryTen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            What are the features available in Asalta Inventory?
                        </h4>
                    </div>
                </a>
                <div id="collapseinventoryTen" class="panel-collapse collapse">
                    <div class="panel-body">
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
                        <p>Integrate with popular eCommerce platforms and monitor your stock flow across multiple sales channels. Secure your money by integrating with time tested online payment gateways. Seamlessly integrate with our accounting platform.
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseinventoryEleven" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            What are the different editions of Asalta Inventory?
                        </h4>
                    </div>
                </a>
                <div id="collapseinventoryEleven" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>As of now we have 3 editions which are based on the country chosen by the user during the quick setup of the organization. The taxes are handled differently across different editions.
                        </p>
                        <p> Global edition - Tuned for the ever-changing conditions of the world, this edition will be applied to all users whose country is not the  Singapore or India.</p>
                        <p>Indian edition - available to users who have chosen their country as India during the quick setup of their organization.
                            </p>
                        <p>Singapore  edition - available to users who have chosen their country as Singapore while signing up.</p>

                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseinventoryTwelve" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            What are the different pricing plans?
                        </h4>
                    </div>
                </a>
                <div id="collapseinventoryTwelve" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Each industry has its own needs and the volume of their needs is directly proportional to the scale of their business. To cater to your specific needs, we have an array of pricing plans. No hidden costs! No strings attached!
                            You can take a look at our pricing plans by clicking on this <a href="https://www.asalta.com/sg/inventory/pricing"> Link</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseinventoryThirteen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Does Asalta Inventory support barcode scanning?
                        </h4>
                    </div>
                </a>
                <div id="collapseinventoryThirteen" class="panel-collapse collapse">
                    <div class="panel-body">
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
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseinventoryFourteen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            How is stock tracking done in Asalta Inventory?
                        </h4>
                    </div>
                </a>
                <div id="collapseinventoryFourteen" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Physical Stock: In this mode, your stock will increase when a Purchase Receive is made, and the stock will decrease when an Invoice is made to the customer.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseinventoryFifteen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Does Asalta Inventory support expiry dates?
                        </h4>
                    </div>
                </a>
                <div id="collapseinventoryFifteen" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Yes. we do track Expiry Tracking.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseinventorySixteen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            How user friendly is Asalta Inventory ? Do we need any prior technical expertise?
                        </h4>
                    </div>
                </a>
                <div id="collapseinventorySixteen" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>You don't need to be tech person in order to use Asalta Inventory. Our system is very simple and does not require technical training. Our simple dashboard allows you to handle all your business operations from a single place.
                        </p>
                        <p>Products and contacts can be added through spreadsheet imports. </p>
                        <p>Furthermore, your sales and purchase orders populate automatically with your data.
                        </p>
                        <p>Moreover, we also allow you to easily track and update your order status with a visual overview or generate reports depending on your needs.</p>
                        <p>Onboard Training videos and help manual is available for you to get started and to guide you if you need help anytime.</p>
                    </div>
                </div>
            </div>
            <div id="POS" ></div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseinventoryEighteen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            What are the Outlets (Warehouse)? Can I confirm that this is for Warehouse (stock locations)? and how about the "transfer to" locations?
                        </h4>
                    </div>
                </a>
                <div id="collapseinventoryEighteen" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Warehouse, Outlets are locations where inventory items (stocks) are physically kept and or sales activities are carried out. Each pricing plan comes with X number of locations. You can perform any number of transfers within the inventory limit of your plan. If you need additional locations you can buy those locations as add-ons. You will only be charged for active locations.</p>
                    </div>
                </div>
            </div>
            
            <div><h3 class="faq_h3">POS</h3></div>
            <div class="panel panel-default" style="border-top: 1px solid #ddd !important">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseposOne" aria-expanded="true">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          How long do I get to try Asalta POS?
                      </h4>
                  </div>
              </a>
              <div id="collapseposOne" class="panel-collapse collapse in">
                  <div class="panel-body">
                      <p>You can sign up and try Asalta POS for its full capability for 14 days after which, you can to subscribe to a suitable pricing plan that fits your business needs.</p>
                  </div>
              </div>
            </div>
            <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseposThree" aria-expanded="false">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                           Can I sign up for Asalta Enterprise ?
                      </h4>
                  </div>
              </a>
              <div id="collapseposThree" class="panel-collapse collapse">
                  <div class="panel-body">
                      <p>Asalta POS is cloud-based POS management software with complex automation, high security, and 24/7 support. To get started with Asalta Inventory Enterprise Package, Contact Sales send us an email at <a href="#">sales@asalta.com</a></p>
                  </div>
              </div>
            </div>
            <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseposFive" aria-expanded="false">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                           Is my data secure with Asalta POS?
                      </h4>
                  </div>
              </a>
              <div id="collapseposFive" class="panel-collapse collapse">
                  <div class="panel-body">
                      <p>100%. All your data is completely secure and we protect your account with high level of security in place. Our technical team constantly run security vulnerability scans and tests to make sure everything is safe and secure.</p>
                  </div>
              </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseposSeven" aria-expanded="false">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          Does Asalta Technologies offer a knowledge base?
                      </h4>
                  </div>
                </a>
                <div id="collapseposSeven" class="panel-collapse collapse">
                  <div class="panel-body">
                      <p>To help you get started with Asalta POS we provide an extensive knowledge base that consists of useful help articles and video tutorials. <a href="#"> Check it out here </a></p>
                  </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseposEight" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                          What are the modules in Asalta POS?
                        </h4>
                    </div>
                </a>
                <div id="collapseposEight" class="panel-collapse collapse">
                    <div class="panel-body">
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
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseposEleven" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            What are the features available in Asalta POS?
                        </h4>
                    </div>
                </a>
                <div id="collapseposEleven" class="panel-collapse collapse">
                    <div class="panel-body">
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
                        <p><strong>Integrations:</strong></p><p> Integrate with popular eCommerce platforms and monitor your stock flow across multiple sales channels. Secure your money by integrating with time tested online payment gateways. Seamlessly integrate with our accounting platform.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseposTwelve" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            What are the different editions of Asalta POS?
                        </h4>
                    </div>
                </a>
                <div id="collapseposTwelve" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>As of now we have 3 editions which are based on the country chosen by the user during the quick setup of the organization. The taxes are handled differently across different editions.</p>
                        <p>Global edition - Tuned for the ever-changing conditions of the world, this edition will be applied to all users whose country is not the  Singapore or India.</p>
                        <p>Indian edition - available to users who have chosen their country as India during the quick setup of their organization.</p>
                        <p>Singapore  edition - available to users who have chosen their country as Singapore while signing up.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseposTwentytwo" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Does Asalta POS support barcode scanning?
                        </h4>
                    </div>
                </a>
                <div id="collapseposTwentytwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Yes. Asalta POS supports barcode scanning in the web app.</p>
                        <p><strong>For Items:</strong></p>
                        <p>You have to key in the bar code of the item as the SKU of said item in Asalta POS manually or using a barcode scanner.</p>
                        <p>Open a new transaction like an Invoice.</p>
                        <p>Place your cursor on the Item Details field.</p>
                        <p>Scan the barcode of the item. You’ll see that the line item is automatically added.</p>
                        <p>Follow the above step to scan more items, which will be added consecutively</p>

                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseposFourteen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                           I have thousands of existing printed barcodes from my old POS, can I use these with Asalta POS?
                        </h4>
                    </div>
                </a>
                <div id="collapseposFourteen" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Yes. Existing barcodes can be scanned into the SKU field in the product page, so you won’t have to generate new ones from scratch.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseposFifteen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            How is stock tracking done in Asalta POS?

                        </h4>
                    </div>
                </a>
                <div id="collapseposFifteen" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Physical Stock: In this mode, your stock will increase when a Purchase Receive is made, and the stock will decrease when an Invoice is made to the customer.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseposSixteen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Does Asalta POS support expiry dates?
                        </h4>
                    </div>
                </a>
                <div id="collapseposSixteen" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Yes. we do track Expiry Tracking.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseposSeventeen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            How user friendly is Asalta POS ? Do we need any prior technical expertise?
                        </h4>
                    </div>
                </a>
                <div id="collapseposSeventeen" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>You don't need to be tech person in order to use Asalta POS. Our system is very simple and does not require technical training. Our simple dashboard allows you to handle all your business operations from a single place.</p>
                        <p>Products and contacts can be added through spreadsheet imports. </p>
                        <p>Furthermore, your sales and purchase orders populate automatically with your data.</p>
                        <p>Moreover, we also allow you to easily track and update your order status with a visual overview or generate reports depending on your needs.</p>
                        <p>Onboard Training videos and help manual is available for you to get started and to guide you if you need help anytime.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseposEighteen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                           I love our accounting software, does it integrate with Asalta POS?
                        </h4>
                    </div>
                </a>
                <div id="collapseposEighteen" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Asalta POS works great with Xero and Quickbooks online accounting. Data flows seamlessly between your POS and accounting software giving you greater insights into your business performance and eliminating the need for manual data entry. The integration is simple to set up and free to use, check out more information here.  If you need further integration with any other accounting software that allows integration do contact our <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/support") ?>"> support@asalta.com.</a> we are happy to help.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseposNineteen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Does Asalta POS handle returns?
                        </h4>
                    </div>
                </a>
                <div id="collapseposNineteen" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Yes. You can return any order and Asalta POS will handle Returns and  synchronize it with Xero, Quickbooks accounting system</p>
                    </div>
                </div>
            </div>
            <div id="HRM" ></div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseposTwenty" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Does Asalta POS support consignment?
                        </h4>
                    </div>
                </a>
                <div id="collapseposTwenty" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Yes. Because we allow for multiple locations, you can assign stocks to each location and sell as consignment.</p>
                    </div>
                </div>
            </div>
            
            <div><h3 class="faq_h3">HRM</h3></div>
            <div class="panel panel-default" style="border-top: 1px solid #ddd !important">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapsehrmOne" aria-expanded="true">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            How long do I get to try Asalta HRM?
                        </h4>
                    </div>
                </a>
                <div id="collapsehrmOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>You can sign up and try Asalta HRM for its full capability for 14 days after which, you can
                            to subscribe to a suitable pricing plan that fits your business needs.
                        </p>
                    </div>
                </div>
            </div>
            
            <!--<div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapsehrmThree" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                             How much does it cost to use Asalta HRM ?
                        </h4>
                    </div>
                </a>
                <div id="collapsehrmThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Asalta HRM pricing is based on monthly and yearly subscription and the packages are as follows: click
                            <a href="<?/*=$this->publicHtml;*/?>/sg/hrm/pricing">here</a></p>
                    </div>
                </div>
            </div>-->
            <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapsehrmFive" aria-expanded="false">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                           Is my data secure with Asalta HRM?
                      </h4>
                  </div>
              </a>
              <div id="collapsehrmFive" class="panel-collapse collapse">
                  <div class="panel-body">
                      <p>100%. All your data is completely secure and we protect your account with high level of security in place. Our technical team constantly run security vulnerability scans and tests to make sure everything is safe and secure.</p>
                  </div>
              </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapsehrmSeven" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                             Does Asalta HRM offer a knowledge base?
                        </h4>
                    </div>
                </a>
                <div id="collapsehrmSeven" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>To help you get started with Asalta HRM we provide an extensive knowledge base that consists of useful help articles and video tutorials.<a href="#"> Check it out here.</a></p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapsehrmEight" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                           Is there a minimum subscription period?
                        </h4>
                    </div>
                </a>
                <div id="collapsehrmEight" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>No. there is no minimum subscription period or contractual obligation. Asalta HRM! pricing is based on monthly and yearly subscription.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapsehrmNine" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            What is Asalta HRM?
                        </h4>
                    </div>
                </a>
                <div id="collapsehrmNine" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Asalta HRM is an easy-to-use and 100% web-based HRM application. It also removes the hassle and tediousness of computing salary payment and CPF contributions manually, preparing and distributing payslips, and manual leave, claims, commission, Timesheet, Rostering and management.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapsehrmTen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                             Why should I use Asalta HRM?
                        </h4>
                    </div>
                </a>
                <div id="collapsehrmTen" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Absolutely, while we’d hate to see you go, you can cancel the subscription at anytime.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapsehrmEleven" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            What are the modules in Asalta HRM?
                        </h4>
                    </div>
                </a>
                <div id="collapsehrmEleven" class="panel-collapse collapse">
                    <div class="panel-body">
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
                            <li>Payroll Management </li>
                            <li>Dynamic forms for Survey</li>
                            <li>Recruitment</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapsehrmTwelve" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                             Do you have Mobile App for HRM?
                        </h4>
                    </div>
                </a>
                <div id="collapsehrmTwelve" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Yes. There is a FREE Mobile App available to download from App store and Google Play for Asalta HRM.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapsehrmThirteen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                             Can I view other employee’s payslip via the Asalta HRM mobile app?
                        </h4>
                    </div>
                </a>
                <div id="collapsehrmThirteen" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>No. you can only view your own payslip on Asalta HRM mobile app. Only Administrator has such privileges.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapsehrmFourteen" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Can I use Asalta HRM to process payroll for my part time workers?
                        </h4>
                    </div>
                </a>
                <div id="collapsehrmFourteen" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Yes. Asalta HRM can process payroll for your part time workers who are paid monthly or Hourly.</p>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
  


<?php
$this->registerJs("
  $(document).ready(function(){
    $('#faqscrch').on('keyup', function() {
      var value = $(this).val().toLowerCase();
      $('#faqcontent .panel').filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
");