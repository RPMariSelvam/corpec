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
          <li class="active"><a href="#ContactManagement">Contact Management</a>
          </li>
          <li><a href="#Pipeline">Pipeline</a>
          </li>
          <li><a href="#WebForms">WebForms</a>
          </li>
          <!-- <li><a href="#ProjectsManagement">Projects Management </a>
          </li>
          <li><a href="#AccountsManagement">Accounts Management</a>
          </li> -->
          <li><a href="#CalendarManagement">Calendar Management</a>
          </li>
          <li><a href="#MarketingManagement">Marketing Management</a>
          </li>
          <!-- <li><a href="#Loyaltymanagement">Loyalty management</a>
          </li> -->
          <li><a href="#Notification">Notification</a>
          </li>
          <!-- <li><a href="#KnowledgeBase">Knowledge Base</a>
          </li>
          <li><a href="#CaseManagement">Case Management</a>
          </li> -->
          <li><a href="#Integrations">Integrations</a>
          </li>
          <li><a href="#Reports">Reports</a>
          </li>

        </ul>
      </div>
      <div class=" col-sm-9 ecommerce_section">
        <div id="ContactManagement" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
          <h2 class="crm-features-h2">Contact management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Customer 360 Degree View</h4>
              <p>Asalta CRM gives you the 360 degree views of your customer. Which provides you with outstanding customer experience.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Leads Management</h4>
              <p>Effective Lead management starts with knowing your leads. Asalta CRM tells you everything that needs to be known about your lead.</p>
            </div>
          </div>
        </div>
        <div id="Pipeline" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
          <h2 class="crm-features-h2">Pipeline</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Sales Pipeline</h4>
              <p>Asalta gives you  the clear view into your sales pipelines, by quickly looking at the number of deals in each stage. Know where each and every prospect in your pipeline, and what needs to be done to move them forward. Easily move your deals in the sales pipeline, by dragging and dropping the deal from one stage to another stage.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Customized Pipeline</h4>
              <p>Create multiple pipelines customized pipeline,with the required deal stages. You can accurately capture the progress of the deals.Know where each and every deal is in your pipeline accurately on a glance.</p>
            </div>
          </div>
        </div>
        <div id="WebForms" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
          <h2 class="crm-features-h2">WebForms</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Forms</h4>
              <p>Create and publish Web forms with Asalta CRM,that requires no coding or scripting. Web forms give you multiple options to generate quality leads and the form responses are traceable. Web forms are  fully customizable.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Trigger Action</h4>
              <p>You can setup the action trigger for the forms and their responses.The action Response to the form can be tracked and refined. </p>
            </div>
          </div>
        </div>
        <!-- <div id="ProjectsManagement" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
          <h2 class="crm-features-h2">Projects Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Projects </h4>
              <p>Project management is the key to any successful business. One project with many views can view your projects as Gantt view, Card View and Timeline view. Manage project completion stages of different across your company.  Asalta Projects keeps you aware of your critical tasks and immediately shows any deviations between your planned and actual progress.</p>
               <h4 class="crm-features-h4">Gantt charts</h4>
              <p>By Asalta Project management, Use Gantt charts to build your project plan.See all your projects in one screen and plan your task more easily by choosing to see all your projects in a single gantt chart.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Project Task</h4>
              <p>Dive into your projects by adding Project Task. attach project Document, Setup due dates, and dive into details the project Task by adding comments. Collaborate on projects from beginning to end.</p>
              <h4 class="crm-features-h4">Task Priority Management</h4>
              <p>Set the priority for each task, so never miss where you should keep an eye on.</p>
            </div>
          </div>
        </div>
        <div id="AccountsManagement" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
          <h2 class="crm-features-h2">Accounts Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Invoice</h4>
              <p>Capture and manage every billable event across your business. Report and monitor account payments. Manage recurring billing with automatic invoice creation. Integrate your invoices directly with popular payment gateways and with your accounting software for simple, real-time updates.</p>
              <h4 class="crm-features-h4">Signature</h4>
              <p>Users can Approve the Quotations and invoice prepared by subordinates, by inserting their signature and can be sent to clients.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Quotations</h4>
              <p>Generate quotes, Insert customer details and services offered all at the click of a mouse. Insert signature and send it to the customer.</p>
            </div>
          </div>
        </div> -->
        <div id="CalendarManagement" class="section scrollspy" style="margin-top: -300px;padding-top: 300px;">
          <h2 class="crm-features-h2">Calendar Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Calendar</h4>
              <p>Planning and scheduling are important when it comes to all business events. Calendars are the right choice that shows you the list of events by day, week and month. Asalta CRM calendar helps you track the upcoming events, Todo task and calls that are scheduled.</p>
               <h4 class="crm-features-h4">Events</h4>
              <p>Easily add and edit the status of your event by adding and inviting people to the Event. Events are reflected in the calendar.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="crm-features-h4">To Do Task </h4>
              <p>Asalta CRM helps your team stay organized. Track team's progress and get immediate notifications on tasks and updates. Track everything you or your team does and track their status.</p>
               <h4 class="crm-features-h4">Reminder</h4>
              <p>Users will be notified through calendars of approaching deadlines on tasks assigned to them. Get activity reminders via email.</p>
            </div>
          </div>
        </div>
        <div id="MarketingManagement" class="section scrollspy" style="margin-top: -400px;padding-top: 400px;">
          <h2 class="crm-features-h2">Marketing management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Marketing</h4>
              <p>Create role based group logins in Asalta HRM for your HR, managers, and other employees etc. and let them view only data that’s important to them. Set profile permissions so that employees can access.</p>
            </div>
            <div class="col-sm-6"></div>
            <h4 class="crm-features-h4">Campaign Management</h4>
            <p>Create, send, and track email campaigns, that help you build a strong customer database. Build your audience, run targeted email, SMS and call campaigns, and increase your reach.</p>
          </div>
        </div>
        <!-- <div id="Loyaltymanagement" class="section scrollspy" style="margin-top: -400px;padding-top: 400px;">
          <h2 class="crm-features-h2">Loyalty management</h2>
          <div class="row">
            <div class="col-sm-6">
              <p>A large portion of revenue can come from recurring customers.Asalta allows the customer to purchase items on account and reward customers with loyalty points to keep them coming back again and again.</p>
            </div>
            <div class="col-sm-6"></div>
          </div>
        </div> -->
        <div id="Notification" class="section scrollspy" style="margin-top: -400px;padding-top: 400px;">
          <h2 class="crm-features-h2">Notification</h2>
          <div class="row">
            <div class="col-sm-6">
              <p>Get notification of all the events in the Asalta CRM in one place.</p>
            </div>
          </div>
        </div>
        <!-- <div id="KnowledgeBase" class="section scrollspy" style="margin-top: -400px;padding-top: 400px;">
          <h2 class="crm-features-h2">Knowledge Base</h2>
          <div class="row">
            <div class="col-sm-6">
              <p>Can create knowledge articles and Organize the articles under configurable topics. And let the users Team easily browse and access.</p>
            </div>
          </div>
        </div>
        <div id="CaseManagement" class="section scrollspy" style="margin-top: -400px;padding-top: 400px;">
          <h2 class="crm-features-h2">Case Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <p>Accumulate all cases from your customer in one section. Manage various types of cases, track their statuses. Assign cases to your team and manage communications during case resolution.</p>
            </div>
            <div class="col-sm-6"></div>
          </div>
        </div> -->
        <div id="Integrations" class="section scrollspy" style=" margin-top: -400px;padding-top: 400px;" >
          <h2 class="crm-features-h2" >Integrations</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="crm-features-h4">Apps</h4>
              <p>Asalta Allows integration with different systems such as Accounting Software, Payment Services, Marketing Services and Google Calendars. and <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl("/integration") ?>">more</a> are fully integrated with Asalta crm so you can manage your business with just one system.</p>
            </div>
          </div>
        </div>
        <div id="Reports" class="section scrollspy" style="margin-top: -450px;padding-top: 450px;">
          <h2 class="crm-features-h2">Reports</h2>
          <div class="row">
            <div class="col-sm-6">
              <p>Get visibility into your business at a glance on the Asalta dashboard.  Charts and dashboards quickly show how your business is doing to take the stress out of reporting. Print, download and export reports on various business activities.</p>
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