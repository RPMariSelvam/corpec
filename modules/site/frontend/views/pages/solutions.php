<style>

    .solutionsContainer .tab-content{

        padding-left: 0px;
        padding-right: 0px;
        padding-top: 10px;
    }
    @media (min-width:961px)  {
        .solutionsContainer .tab-content{
            min-height: 500px;
            /*background-color: #f4f4f5;*/
        }
        .solutionsContainer .col-lg-3{
            width: 33.3%;
        }
    }
    @media (max-width:641px){
        .solutionsContainer .solutionsContainer{
            background-color: #f4f4f5;
        }
        .solutionsContainer .tabbable .nav{
            background: #FFF;
        }
    }
    .solutions_h1tage-heading, .solutions_h2tage-heading {
        text-align: center;
        font-family: Raleway,Helvetica Neue,Helvetica,Arial,sans-serif;
    }
    .solutions_h1tage-heading {
        font-weight: 800;
    }
    .solutionsContainer .solutions_content{
        margin-top: 25px;
        margin-bottom: 50px;
    }
    .solutionsContainer .tabbable li a:before {
        content: '';
        margin-right: 5px;
    }
    .tabbable li a.active:before {
        content: '▶';
        margin-right: 5px;
    }
    .solutionsContainer .tabbable>ul.nav>li>a.active:after {
        background-color: #b31b1d !important;
        left: 16%;
    }
    .solutionsContainer .rd-gird-row .rd-org-img-wrapper .rdorgin-ho-eff-wrapper .btn {
        display: inline-block !important
    }
    .solutionsContainer .rdorgin-ho-eff-wrapper p {
        text-align: justify;
    }
    .tabbable li a.active {
        font-weight: bold;
    }
    .rd-gird-row .col-lg-3{
        background-color: #f4f4f5;
    }
    .rd-gird-row .col-lg-3, .rd-gird-row .col-md-3, .rd-gird-row .col-sm-6, .rd-gird-row .col-xs-12 {
        padding: 10px !important;
    }

</style>
<?php
$country_code = strtolower((isset($_SERVER["HTTP_CF_IPCOUNTRY"]) ? $_SERVER["HTTP_CF_IPCOUNTRY"] : 'in'));
if($country_code !="sg" && $country_code !="in"){
    $country_code ="";
}
?>
<div class="container solutionsContainer" style="padding-bottom: 100px;">
    <div class="row">
        <div class="col-md-12">
            <!-- tabs left -->
            <div class="tabbable">
                <ul class="nav nav-stacked col-md-3">
                    <h3>Productivity &  Efficiency</h3>
                    <li class="active"><a href="#crm" data-toggle="tab" class="active">CRM</a></li>
                    <li><a href="#entity" data-toggle="tab">Entity Management</a></li>
                    <li><a href="#kyc" data-toggle="tab">KYC (Know Your Customer)</a></li>
                    <li><a href="#eletter" data-toggle="tab">eLetter Box</a></li>
                    <li><a href="#documents" data-toggle="tab">Documents </a></li>
                    <li><a href="#ocr" data-toggle="tab">Scan to Doc (OCR)</a></li>
                    <li><a href="#esignature" data-toggle="tab">eSignature</a></li>
                    <li><a href="#work_space" data-toggle="tab">Workspace </a></li>
                    <li><a href="#pipeline" data-toggle="tab">Pipeline </a></li>
                    <li><a href="#projects" data-toggle="tab">Projects</a></li>
                    <li><a href="#calendar" data-toggle="tab">Calendar</a></li>
                    <li><a href="#todotask" data-toggle="tab">To-Do Tasks</a></li>
                    <li><a href="#reminders" data-toggle="tab">Reminders</a></li>
                    <li><a href="#emailclient" data-toggle="tab">Email Client</a></li>
                    <li><a href="#smartemailer" data-toggle="tab">Smart Emailer</a></li>
                    <li><a href="#clientportal" data-toggle="tab">Client Portal</a></li>
                    <li><a href="#clientenquirychat" data-toggle="tab">Client Enquiry Chat</a></li>
                    <h3 >Accounts</h3>
                    <li><a href="#quotation" data-toggle="tab">Quotation</a></li>
                    <li><a href="#invoice" data-toggle="tab">Invoice</a></li>
                    <li><a href="#payments" data-toggle="tab">Payments</a></li>
                    <li><a href="#receipts" data-toggle="tab">Receipts</a></li>
                    <li><a href="#soa" data-toggle="tab">SOA</a></li>
                    <li><a href="#multiplecurrencies" data-toggle="tab">Multiple Currencies</a></li>
                </ul>
                <div class="tab-content col-md-9" >
                    <h2 style="margin-left: 3%;">Productivity & Efficiency</h2>
                    <div class="active solution-list"  id="crm">
                        <div id="wrapper_6" class="orgin-css-hov">
                            <div id="image-effects-section_5">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;text-align: center;margin-bottom: 2%;"> Client Relationship Management (CRM)</h5>
                                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                                    <img src="https://ezcosec.com/storage/0_corpsec-home-page-banner-img-1500x928_9454ea4d.png" width="280px" height="280px" style="margin-top: 10%;"/>
                                                </div>
                                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                    <p style="font-size: 16px;text-align: justify;">
                                                        Effortlessly manage and access contact information for contacts, leads, clients, and stakeholders, fostering seamless communication and relationship building. Streamline lead tracking and conversion processes by capturing, categorizing, and nurturing potential clients, ensuring no business opportunity slips through the cracks. Using tagging, labeling etc…
                                                    </p>
                                                    <p style="font-size: 16px;text-align: justify;">
                                                        Centralize client data for quick retrieval, enhancing client relationship management. Maintain a comprehensive record of interactions and transactions, enabling personalized service delivery and strengthening client relationships. Our integrated solution empowers you to build stronger connections, nurture leads, and provide exceptional service to your clients.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="active solution-list"  id="leads">
                        <div id="wrapper_6" class="orgin-css-hov">
                            <div id="image-effects-section_5">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                
                                                <h5 style="color:black;"> Leads </h5>
                                                <p>
                                                    Streamline lead tracking and conversion processes. Capture, categorize, and nurture potential clients, ensuring that no business opportunity goes unnoticed
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="clients">
                        <div id="wrapper_1" class="orgin-css-hov">
                            <div id="image-effects-section_11">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> Clients</h5>
                                            <p>
                                                        Centralize client data, allowing for quick retrieval and enhancing client relationship management. Keep a comprehensive record of interactions and transactions to provide personalized service.
                                                        <Learn more>
                                                    </p>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="solution-list active" id="entity">
                        <div id="wrapper_2" class="orgin-css-hov">
                            <div id="image-effects-section_1">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> Entity Management </h5>
                                                <p>
                                                    Simplify the management of corporate entities, including subsidiaries, partners, and affiliates. Ensure compliance with regulatory requirements and maintain a clear governance structure.
                                                </p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="kyc">
                        <div id="wrapper_2" class="orgin-css-hov">
                            <div id="image-effects-section_1">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> KYC (Know Your Customer) </h5>
                                                <p>
                                                    Stay compliant with legal and regulatory obligations by collecting and verifying customer identity information. Easily access and update KYC data as needed
                                                </p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="eletter">
                        <div id="wrapper_2" class="orgin-css-hov">
                            <div id="image-effects-section_1">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> eLetter Box </h5>
                                                <p>
                                                    Efficiently manage incoming and outgoing correspondence, maintaining an organized record of all communications. Quickly access important emails, letters, and messages.

                                                </p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="documents">
                        <div id="wrapper_2" class="orgin-css-hov">
                            <div id="image-effects-section_1">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> Documents </h5>
                                                <p>
                                                    Streamline document management by storing, categorizing, and retrieving files within the software. Reduce paper-based processes, leading to improved document organization and accessibility.
                                                </p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="ocr">
                        <div id="wrapper_3" class="orgin-css-hov">
                            <div id="image-effects-section_2">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> Scan to Doc (OCR)</h5>
                                                <p>
                                                        Digitize physical documents with Optical Character Recognition (OCR) technology. Make scanned documents searchable and editable, saving time on manual data entry.
                                                    </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="esignature">
                        <div id="wrapper_3" class="orgin-css-hov">
                            <div id="image-effects-section_2">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> eSignature </h5>
                                                <p>
                                                        Accelerate approval processes with electronic signatures. Easily sign and send documents for signature, eliminating the need for physical paperwork and expediting workflows.
                                                    </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="work_space">
                        <div id="wrapper_4" class="orgin-css-hov">
                            <div id="image-effects-section_3">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> Workspace</h5>
                                                <p>Collaborate efficiently within a dedicated workspace. Share documents, tasks, and information with team members, enhancing project coordination and team productivity.
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="pipeline">
                        <div id="wrapper_4" class="orgin-css-hov">
                            <div id="image-effects-section_3">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> Pipeline </h5>
                                                <p>Visualize and manage sales opportunities within a pipeline view. Monitor the progress of deals, make informed decisions, and forecast sales with greater accuracy.
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="projects">
                        <div id="wrapper_5" class="orgin-css-hov">
                            <div id="image-effects-section_4">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> Projects </h5>
                                                    <p>Effectively plan, track, and collaborate on projects. Assign tasks, set milestones, and monitor project progress, ensuring timely completion and successful outcomes.</p>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="calendar">
                        <div id="wrapper_7" class="orgin-css-hov">
                            <div id="image-effects-section_6">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 abcd">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> Calendar</h5>
                                                    <p>Keep organized with a shared calendar. Schedule meetings, appointments, and events, and synchronize important dates across your organization for improved time management.

                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="todotask">
                        <div id="wrapper_8" class="orgin-css-hov">
                            <div id="image-effects-section_7">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;">To-Do Tasks</h5>
                                                    <p>
                                                        Create and manage tasks with ease, ensuring that important assignments are completed on time. Prioritize tasks, set deadlines, and track progress effortlessly.
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="reminders">
                        <div id="wrapper_9" class="orgin-css-hov">
                            <div id="image-effects-section_8">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> Reminders</h5>
                                                    <p>
                                                        Set reminders for critical dates and tasks, reducing the risk of missing deadlines or overlooking essential responsibilities.
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="emailclient">
                        <div id="wrapper_10" class="orgin-css-hov">
                            <div id="image-effects-section_9">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 abcd">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> Email Client</h5>
                                                <p>Access and manage your email directly within the software. Stay connected and organized with integrated email tools, enhancing communication efficiency.</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="smartemailer">
                        <div id="wrapper_11" class="orgin-css-hov">
                            <div id="image-effects-section_10">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding: 10px;">
                                                <h5 style="color:black;"> Smart Emailer</h5>
                                                    <p>Automate email campaigns and personalize communications with clients and leads. Save time and increase engagement with targeted email marketing.</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="clientportal">
                        <div id="wrapper_11" class="orgin-css-hov">
                            <div id="image-effects-section_10">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding: 10px;">
                                                <h5 style="color:black;"> Client Portal</h5>
                                                    <p>Stay ahead of the game and provide one stop access for your clients. Provide clients with secure access to their information. Enhance transparency by allowing clients to review documents, check invoices, and communicate within a dedicated portal.</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="clientenquirychat">
                        <div id="wrapper_11" class="orgin-css-hov">
                            <div id="image-effects-section_10">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding: 10px;">
                                                <h5 style="color:black;"> Client Enquiry Chat</h5>
                                                    <p>Enable real-time chat for client inquiries. Offer instant support and responses, improving customer service and client satisfaction.</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 style="margin-left: 3%;">Account</h2>
                    <div class="active solution-list"  id="quotation">
                        <div id="wrapper_6" class="orgin-css-hov">
                            <div id="image-effects-section_5">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> Quotation</h5>
                                                <p>
                                                    Generate and send professional quotes to clients swiftly. Customize quotes, include pricing details, and streamline the sales process.
                                                    </p>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="active solution-list"  id="invoice">
                        <div id="wrapper_6" class="orgin-css-hov">
                            <div id="image-effects-section_5">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                
                                                <h5 style="color:black;"> Invoice</h5>
                                                <p>
                                                    Create, send, and track invoices seamlessly. Manage billing efficiently, reduce administrative overhead, and maintain accurate records of financial transactions.

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="payments">
                        <div id="wrapper_1" class="orgin-css-hov">
                            <div id="image-effects-section_11">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> Payments</h5>
                                            <p>
                                                Offer multiple payment options for client convenience. Simplify the payment process, accelerate cash flow, and enhance client experience.
                                                    </p>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="receipts">
                        <div id="wrapper_2" class="orgin-css-hov">
                            <div id="image-effects-section_1">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> Receipts</h5>
                                                <p>
                                                    Issue receipts to all customers as and when needed digitally, They are securely stored in one central location. This eliminates the need for physical receipt storage, reducing clutter and ensuring that important financial documentation is easily accessible when needed.
                                                </p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="soa">
                        <div id="wrapper_3" class="orgin-css-hov">
                            <div id="image-effects-section_2">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> SOA (Statement of Account)</h5>
                                                <p>
                                                    Provide clients with clear and detailed statements of their account activity. Enhance transparency by summarizing financial transactions and balances.
                                                    </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solution-list active" id="multiplecurrencies">
                        <div id="wrapper_3" class="orgin-css-hov">
                            <div id="image-effects-section_2">
                                <div class="org_wrapper">
                                    <div class="rd-gird-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="rd-org-img-wrapper rd-org-img-wrapper-sweep-1" style="padding:20px">
                                                <h5 style="color:black;"> Multiple Currencies</h5>
                                                <p>
                                                        Conduct international business seamlessly by supporting multiple currencies. Simplify currency exchange and financial reporting for global operations.
                                                    </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /tabs -->
        </div>
    </div>
    <!-- /row -->
</div>
<?php
$this->registerJs("
$(document).ready(function() {
    $('.tabbable a').click(function() {
        var get_href = $(this).attr('href');
        $('.tabbable a').removeClass('active');
        $(this).addClass('active');
        window.location.href = get_href;
    });

    var solutionName = window.location.hash.substr(1);

    $('.nav-stacked a').each(function() {
        var get_href = $(this).attr('href');
        if(solutionName){
            if(get_href == '#'+solutionName){
                $('#'+solutionName).addClass('active');
            }else{
                $(this).removeClass('active');
            }
        }

    });

    $('.solution-list').each(function() {
        var get_id = $(this).attr('id');
        if(solutionName){
            if(get_id == solutionName){
                $('#'+solutionName).addClass('active');
            }else{
                $('#'+get_id).removeClass('active');
            }
        }

    });

});
");