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
  .hrm-features-h2{
    color: #333 !important; 
    font-weight: 700;
    font-size: 40px;
    font-family: Poppins,sans-serif;
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
  <div class="container">
    <div class="row ">
      <div class="col-sm-3" id="myScrollspy">
        <ul class="table-of-contents nav nav-pills nav-stacked">
          <li class="active"><a href="#Employeemanagement">Employee Management</a></li>
          <li><a href="#Timesheetmanagement">Timesheet Management </a></li>
          <li><a href="#ClaimsManagement">Claims Management</a></li>
          <li><a href="#CommissionsManagement">Commissions Management</a></li>
          <li><a href="#LeaveManagement">Leave Management</a></li>
            <?php if($countryShortCode == "sg"){ ?>
          <li><a href="#PayrollManagement">Payroll Management</a></li>
            <?php } ?>
          <li><a href="#AccessManagement">Access Management</a></li>
          <li><a href="#Announcement">Announcement</a></li>
          <li><a href="#Selfservice">Self service</a></li>
          <li><a href="#Rostering ">Rostering </a></li>
        </ul>
      </div>
      <div class=" col-sm-9 ecommerce_section">
        <div id="Employeemanagement" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
          <h2 class="hrm-features-h2">Employee Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="hrm-features-h4">Personal Information </h4>
              <p>Simplify, and centralizing all your employee data in one central location. The system will navigate the user through a step by step by directing them.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="hrm-features-h4">Employee Self-service</h4>
              <p>The self-service feature makes employees can submit their personal details, apply to leave, log Timesheet, apply commissions, apply claims and perform other actions. With Asalta HRM self-service feature employees can view messages shared by HR or company management. Which helps to keep the information centralized and up to date.</p>
            </div>
          </div>
        </div>
        <div id="Timesheetmanagement" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
          <h2 class="hrm-features-h2">Timesheet Management </h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="hrm-features-h4">Timesheet</h4>
              <p>Timesheet is used to record the amount of time an employee has spent in a job for a day. Using Asalta HRM’s timesheets management employee attendance can be Tracked. Timesheet Supports the daily hourly pay and overtime pay rule. Can export timesheet data.</p>
              <h4 class="hrm-features-h4">Timesheet Rounding Off</h4>
              <p>The employee’s timesheet can be rounded either up or down to the nearest minute upon clock in and clock out.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="hrm-features-h4">Timesheet Approval</h4>
              <p>Timesheet management comes with approval function which allows managers to approve Timesheet submissions. The Timesheet approved will be processed in the payroll.</p>
            </div>
          </div>
        </div>
        <div id="ClaimsManagement" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
          <h2 class="hrm-features-h2">Claims Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="hrm-features-h4">Claims</h4>
              <p>Asalta HRM claims module manages employee claims requests quickly and easily. With our claims management module, you can free your employees from tedious claim submission processes.</p>
              <h4 class="hrm-features-h4">Claims Approval</h4>
              <p>Claims management comes with approval function which allows managers to approve claim submissions.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="hrm-features-h4">Reimbursement Claims</h4>
              <p>The claims management module can save your administrators from unnecessary backlog and reimbursement inaccuracies by effective claims management.</p>
            </div>
          </div>
        </div>
        <div id="CommissionsManagement" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
          <h2 class="hrm-features-h2">Commissions Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="hrm-features-h4">Commissions</h4>
              <p>Want to stop spending hours working out the commission for your sales team use Asalta HRM. Reduce errors, administrator time, in sales commissions.</p>
               <h4 class="hrm-features-h4">Commission Plan </h4>
              <p>Set the commission against product sales revenue and assign and calculate different plans for each and every individual Employee.</p>
               <h4 class="hrm-features-h4">Commission Approval </h4>
              <p>Commission management comes with approval function which allows managers to approve commissions submissions.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="hrm-features-h4">Commissions</h4>
              <p>Want to stop spending hours working out the commission for your sales team use Asalta HRM. Reduce errors, administrator time, in sales commissions.</p>
              <h4 class="hrm-features-h4">Split Commissions</h4>
              <p>With Asalta HRM you can add and adjust sales splits for any sales made. To credit team members who are directly responsible for revenue.</p>
            </div>
          </div>
        </div>
        <div id="LeaveManagement" class="section scrollspy" style="margin-top: -200px;padding-top: 200px;">
          <h2 class="hrm-features-h2">Leave Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="hrm-features-h4">Leave</h4>
              <p>Create and manage multiple types of leave across your organization. Can setup carryforward and leave Increment annually. Can Check the available leave balances, requests and approvals at the click of a button.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="hrm-features-h4">Leave Approval </h4>
              <p>Leave management comes with multi level approval function, which allows managers to approve leave submissions. Asalta allows you to approve multiple leave requests and manage applications with an effective leave management system.</p>
            </div>
          </div>
        </div>
          <?php if($countryShortCode == "sg"){ ?>
        <div id="PayrollManagement" class="section scrollspy" style="margin-top: -300px;padding-top: 300px;">
          <h2 class="hrm-features-h2">Payroll Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="hrm-features-h4">Payroll</h4>
              <p>To make a smooth payment for employee Asalta HRM has payroll option, where employee payment management will be done very easily and hassle free. Asalta HRM ensures that you run your payroll in few clicks and pay accurate salaries. Process bonuses and Ad Hoc payment. Process Commissions, Claims and No pay leave.</p>
               <h4 class="hrm-features-h4">Ad Hoc Payment</h4>
              <p>Process bonuses and Ad Hoc payment.</p>
               <h4 class="hrm-features-h4">Auto generate payslip</h4>
              <p>Once you confirm payroll, salary slips are automatically generated and employees can view them from mobile app and web app.</p>
            </div>
            <div class="col-sm-6">
              <h4 class="hrm-features-h4">Payitems</h4>
              <p>Define multiple payitems and they can be assigned to employees. The pay items can be calculated in different form.</p>
               <h4 class="hrm-features-h4">Salary Adjustment</h4>
              <p>Make changes in the salary during the payroll process for the employee, the Adjustment made in the salary will be recorded and will be available for future audit.</p>
               <h4 class="hrm-features-h4">loan management</h4>
              <p>Provide Loans and track the loan payment and loan repayments.</p>
            </div>
          </div>
        </div>
        <?php } ?>
        <div id="AccessManagement" class="section scrollspy" style="margin-top: -400px;padding-top: 400px;">
          <h2 class="hrm-features-h2">Access Management</h2>
          <div class="row">
            <div class="col-sm-6">
              <p>Create role based group logins in Asalta HRM for your HR, managers, and other employees etc. and let them view only data that’s important to them. Set profile permissions so that employees can access.</p>
            </div>
            <div class="col-sm-6"></div>
          </div>
        </div>
        <div id="Announcement" class="section scrollspy" style="margin-top: -400px;padding-top: 400px;">
          <h2 class="hrm-features-h2">Announcement</h2>
          <div class="row">
            <div class="col-sm-6">
              <p>You can make an Announcement in a group where you are as an Administrator</p>
            </div>
          </div>
        </div>
        <div id="Selfservice" class="section scrollspy" style="margin-top: -400px;padding-top: 400px;">
          <h2 class="hrm-features-h2">Self service</h2>
          <div class="row">
            <div class="col-sm-6">
              <p>With Asalta Self-Service, employees can submit their , apply leave, log time, Timesheet, Sales Commissions, claims and do a whole host of other actions.</p>
            </div>
          </div>
        </div>
        <div id="Rostering" class="section scrollspy" style="margin-top: -450px;padding-top: 450px;">
          <h2 class="hrm-features-h2">Rostering </h2>
          <div class="row">
            <div class="col-sm-6">
              <p>Asalta provides you with most powerful staff rostering tools. Which helps you by saving your money and time, and provides a solution by eliminating your paperwork and communicate with your staff better on their shift schedules.</p>
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