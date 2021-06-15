<?php
session_start();
date_default_timezone_set("Asia/Dubai");
include('../../connection.php');
$created_date=date('Y-m-d H :i');



if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
$usID='';
if (isset($_SESSION['username'])) {
   $usID = $_SESSION['id'];
}

if (isset($_POST['step_3_submit'])) {

    $propertyname = $_SESSION['alterationrequest']['propertyname'];
    $residentpass = $_SESSION['alterationrequest']['residentpass'];
    


    $sql = "INSERT INTO `residentpass`(`id`, `propertyname`, `residentpass`,`created_at`,`created_by`) VALUES ('','$propertyname','$residentpass','$created_date','$usID')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con);
    }
    mysqli_close($con);

    unset($_SESSION['alterationrequest']);

    header('location:resident-services.php?final=true#step-4');
}

if (isset($_POST['submit'])) {


    $propertyname = mysqli_real_escape_string($con, $_POST['propertyname']);
    $residentpass = mysqli_real_escape_string($con, $_POST['residentpass']);

    $save_to_data = array('propertyname' => $propertyname, 'residentpass' => $residentpass);
    $_SESSION['alterationrequest'] = $save_to_data;
    header('location:resident-services.php?step_new=3');
}
?>




<!DOCTYPE HTML>

<head>



    <meta charset="utf-8" />
    <title>PROPERTY MANAGEMENT | INDUS REAL ESTATE LLC</title>

    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="../../assets/js/fa.js"></script>
    <!-- <link href="style.css" rel="stylesheet" /> -->

    <link href="../../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../../assets/css/bootstrapdatetimepicker.css" rel="stylesheet" />
    <link href="../../assets/css/style1.css" rel="stylesheet" />
    <link href="../../assets/css/newstyle.css" rel="stylesheet" />
    <link href="../../assets/css/newstyle1.css" rel="stylesheet" />
    <link href="../../assets/css/newstyle2.css" rel="stylesheet" />

    <link href="../../assets/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />

    <script src="../../assets/js/fbox.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
    <style>
        .select {
            display: block;
            width: 100% !important;
            height: auto; //auto;//34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }

        .dot {
            height: 75px;
            width: 75px;
            background-color: #000000;
            border-radius: 50%;
            display: inline-block;
        }

        * {
            box-sizing: border-box;
            /* outline:1px solid ;*/
        }

        .wrapper-1 {
            width: 100%;
            height: auto;
            display: flex;
            flex-direction: column;
        }

        .wrapper-2 {
            padding: 30px;
            text-align: center;
        }



        .wrapper-2 p {
            margin: 0;
            font-size: 1.3em;
            color: #000000;
            font-family: 'Source Sans Pro', sans-serif;
            letter-spacing: 1px;
        }

        .go-home {
            color: #fff;
            background: #5892FF;
            border: none;
            padding: 10px 50px;
            margin: 30px 0;
            border-radius: 30px;
            text-transform: capitalize;
            box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1);
        }

        .footer-like {
            margin-top: auto;
            background: #D7E6FE;
            padding: 6px;
            text-align: center;
        }

        .footer-like p {
            margin: 0;
            padding: 4px;
            color: #5892FF;
            font-family: 'Source Sans Pro', sans-serif;
            letter-spacing: 1px;
        }

        .footer-like p a {
            text-decoration: none;
            color: #5892FF;
            font-weight: 600;
        }



        ::-webkit-input-placeholder {
            /* Chrome/Opera/Safari */
            color: #748194;
        }

        ::-moz-placeholder {
            /* Firefox 19+ */
            color: #748194;
        }

        :-ms-input-placeholder {
            /* IE 10+ */
            color: #748194;
        }

        :-moz-placeholder {
            /* Firefox 18- */
            color: #748194;
        }

        .containerx {
            display: none;
            position: absolute;
            width: auto;
            height: auto;
            top: calc(50% - 240px);
            left: calc(40% - 160px);
            border-radius: 15px 15px 15px 15px;
        }

        .c1 {
            box-shadow: 0 0 10px grey;
            background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, rgba(253, 187, 45, 1) 100%);
            width: 300px;
            height: auto;
            display: inline-block;
            border-radius: 15px 15px 15px 15px;
        }


        #left,
        #right {
            color: white;
            display: inline-block;
            width: 146px;
            height: 500px;
            background-color: white;
            cursor: pointer;
        }

        #left {
            border-radius: 15px 0px 0px 15px;
        }

        #right {
            border-radius: 15px 15px 15px 0px;
        }

        .left_hover {
            color: #EE9BA3;
            box-shadow: 5px 0 18px -10px #333;
            z-index: 1;
            position: absolute;
        }

        .right_hover {
            box-shadow: -5px 0 15px -10px #333;
            z-index: 1;
            position: absolute;
        }

        .s1class {
            color: #748194;
            position: absolute;
            bottom: 0;
            left: 63%;
            margin-left: -50%;
        }

        .s1class span,
        .s2class span {
            display: block;
        }

        .su {
            font-size: 20px;
        }

        .s2class {
            color: #748194;
            position: absolute;
            bottom: 0;
            right: 63%;
            margin-right: -50%;
        }

        .mainhead {
            color: black;
            font-size: 24px;
            text-align: center;
            margin-top: 50px;
        }

        .mainp {
            color: black;
            font-size: 15px;
            text-align: center;
            margin-top: 10px;
        }

        .c2 {
            background-color: white;
            width: 300px;
            height: 500px;
            border-radius: 15px;
            position: absolute;
            left: 370px;
            display: inline-block;
        }


        .btnx {
            font-weight: bold;
            width: 230px;
            margin: 0 35px 20px;
            height: 45px;
            padding: 6px 15px;
            border-radius: 5px;
            outline: none;
            border: none;
            background: #EE9BA3;
            color: white;
            font-size: 14px;
        }

        .signup1 {
            color: #748194;
            font-size: 30px;
            text-align: center;
        }

        a {
            text-decoration: none;
        }

        .signup2 {
            color: #748194;
            font-size: 20px;
            text-align: center;
        }

        .signup {
            display: initial;
        }

        .signin {
            display: initial;
        }


        body {
            margin-top: 20px;
            background: #eee;
        }

        .invoice {
            padding: 30px;
        }

        .invoice h2 {
            margin-top: 0px;
            line-height: 0.8em;
        }

        .invoice .small {
            font-weight: 300;
        }

        .invoice hr {
            margin-top: 10px;
            border-color: #ddd;
        }

        .invoice .table tr.line {
            border-bottom: 1px solid #ccc;
        }

        .invoice .table td {
            border: none;
        }

        .invoice .identity {
            margin-top: 10px;
            font-size: 1.1em;
            font-weight: 300;
        }

        .invoice .identity strong {
            font-weight: 600;
        }


        .grid {
            position: relative;
            width: 100%;
            background: #fff;
            color: #666666;
            border-radius: 2px;
            margin-bottom: 25px;
            box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
    </span>

</head>

<body>



    <div class="new-container">
        <header id="navbar">
            <div class="boxed" id="navbar-container">
                <div class=" clearfix ">
                    <a class="navbar-brand site-logo" href="../../index.php">
                        <span>PROPERTY MANAGEMENT</span>
                    </a>
                    <div class="navbar-content clearfix">
                        <ul class="nav navbar-top-links pull-right">

                            <li class="hidden-xs" id="toggleFullscreen">
                                <a class="fa fa-bell" data-toggle="fullscreen" href="#" role="button">
                                    <span class="sr-only">Toggle fullscreen</span>
                                </a>
                            </li>
                            <li class="hidden-xs" id="toggleFullscreen">
                                <a class="fa fa-envelope" data-toggle="fullscreen" href="#" role="button">
                                    <span class="sr-only">Toggle fullscreen</span>
                                </a>
                            </li>
                            <li class="hidden-xs" id="toggleFullscreen">
                                <a class="fa fa-expand" data-toggle="fullscreen" href="#" role="button">
                                    <span class="sr-only">Toggle fullscreen</span>
                                </a>
                            </li>
                            <li class="dropdown" id="dropdown-user">
                                <a class="dropdown-toggle text-right" data-toggle="dropdown" href="#">
                                    <span class="pull-right"><img src="../../assets/imgs/profiles/user.png" alt="Profile" class="img-circle img-user media-object" />
                                    </span>
                                    <?php if (isset($_SESSION['username'])) : ?>
                                        <div class="username hidden-xs"><?php echo $_SESSION['username']; ?></div>
                                    <?php endif ?>
                                    <?php if (isset($_SESSION['username'])) : ?>
                                        <a href="index.php?logout='1'"> <i class="fa fa-sign-out fa-fw"></i> Logout </a>
                                    <?php endif ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right with-arrow">

                                    <ul class="head-list">
                                        <li>
                                            <a href="myProfile"> <i class="fa fa-user fa-fw"></i> Profile </a>
                                        </li>
                                        <li>
                                            <?php if (isset($_SESSION['username'])) : ?>
                                                <a href="index.php?logout='1'"> <i class="fa fa-sign-out fa-fw"></i> Logout </a>
                                            <?php endif ?>

                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <ul class="nav navbar-top-links pull-right">
                            <li>
                                <div class="mobile">
                                    <i class="fa fa-mobile fa-2x"></i> <a href="tel:800-674262" style="color:white">800-674262</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <nav class="navbar navbar-default megamenu">
                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#defaultmenu" data-toggle="collapse" type="button">
                            <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse" id="defaultmenu">
                        <ul class="nav navbar-nav">
                            <li class="current"><a href="../../index.php"><i aria-hidden="true" class="fa fa-home"></i> Home</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i aria-hidden="true" class="fa fa-exchange"></i> Services<b class="caret"></b></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="dropdown-submenu">
                                        <a href="#">Customer Care Services
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="../customer-care-services/change-customer-information.php"> Change Customer Information </a></li>
                                            <li><a href="../customer-care-services/general-enquiry.php"> General Inquiry </a></li>
                                            <li><a href="../customer-care-services/make-a-payment.php"> Make a Payment </a></li>
                                            <li><a href="../customer-care-services/name-amendment.php"> Name amendment / Reprint SPA / Lost SPA </a></li>
                                            <li><a href="../customer-care-services/noc-for-mortgage.php"> NOC for Mortgage </a></li>
                                            <li><a href="../customer-care-services/noc-for-sell-post-handover.php"> NOC for Sell - Post Handover </a></li>
                                            <li><a href="../customer-care-services/noc-for-sell-pre-handover.php"> NOC for Sell - Pre Handover </a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#">Facility Management Services
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="../facility- management-services/alteration-request.php"> Alteration Request </a></li>
                                            <li><a href="../facility- management-services/approve-alteration-make-a-payment.php"> Approve Alteration - Make a Payment </a></li>
                                            <li><a href="../facility- management-services/fm-access-card-related.php"> FM - Access Card related </a></li>
                                            <li><a href="../facility- management-services/fm-generic-issues.php"> FM - Generic issues </a></li>
                                            <li><a href="../facility- management-services/fm-maintenance-request.php"> FM - Maintenance Request </a></li>
                                            <li><a href="../facility- management-services/owner-move-in-request.php"> Owner Move-in Request </a></li>
                                            <li><a href="../facility- management-services/owner-move-out-request.php"> Owner Move-Out Request </a></li>
                                            <li><a href="../facility- management-services/tenant-move-in-request.php"> Tenant Move-in Request </a></li>
                                            <li><a href="../facility- management-services/tenant-registration.php"> Tenant Registration </a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#">Resident Services
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="../residentservices/nominations.php"> Nomination </a></li>
                                            <li><a href="../residentservices/resident-entertainment-pass.php"> Resident Entertainment Pass </a></li>
                                            <li><a href="../residentservices/shuttle-bus-card.php"> Shuttle Bus Card </a></li>

                                        </ul>
                                    </li>

                                </ul>

                            </li>
                            <li class=""><a href="../../myrequests.php"><i aria-hidden="true" class="fa fa-list-ol"></i> My Requests </a></li>
                            <li class=""><a href="../../reports.php"><i aria-hidden="true" class="fa fa-bar-chart"></i> Reports </a></li>
                            <li class=""><a href="../../appointment/calender.php"><i aria-hidden="true" class="fa fa-calendar"></i> Appointments </a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i aria-hidden="true" class="fa fa-file-text-o"></i> My Documents<b class="caret"></b></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class=""><a href="../../ud.php"><i aria-hidden="true" class="fa fa-file-text-o"></i> Uploaded Documents </a></li>
                                    <li class=""><a href="../../templates.php"><i aria-hidden="true" class="fa fa-file-text-o"></i> Templates </a></li>
                                </ul>
                            </li>
                            <li class=""><a href="../../registerinterest.php"><i aria-hidden="true" class="fa fa-check-square-o"></i> Register Interest </a></li>
                            <li class=""><a href="CustomerCareServices?eServiceId=a3Q36000000FQPeEAO"><i aria-hidden="true" class="fa fa-credit-card"></i> Make a Payment </a></li>





                        </ul>

                    </div>

                </nav>

            </div>
        </header>
    </div>
    </span>

    <div class="new-container">
        <div class="boxed">
            <div id="content-container">

                <div id="page-content">

                    <div class="row">
                        <div class="col-md-12">
                            <section class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Request Submission - Alteration Request</h3>
                                </div>
                                <div class="panel-body np">
                                    <span>
                                        <div id="smartwizard">

                                            <ul class="nav">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#step-1">
                                                        <span class="dot">
                                                            <div class="text-center newcircle1">
                                                                <i class="fa fa-pencil"></i>
                                                                <br>STEP 1
                                                            </div>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#step-2">
                                                        <span class="dot">
                                                            <div class="text-center newcircle1">
                                                                <i class="fa fa-pencil"></i>
                                                                <br>STEP 2
                                                            </div>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#step-3">
                                                        <span class="dot">
                                                            <div class="text-center newcircle1">
                                                                <i class="fa fa-pencil"></i>
                                                                <br>STEP 3
                                                            </div>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#step-4">
                                                        <span class="dot">
                                                            <div class="text-center newcircle1">
                                                                <i class="fa fa-pencil"></i>
                                                                <br>STEP 4
                                                            </div>
                                                        </span>
                                                    </a>
                                                </li>


                                            </ul>

                                            <div class="tab-content">
                                                <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                                    <div class="panel-body np">
                                                        <span>
                                                            <div action="#" class="form-horizontal form-bordered form-wizard clearfix" role="application">
                                                                <div class="content clearfix">
                                                                    <p style="color:red;"></p><span></span><span></span>
                                                                    <div class="wizard-title title current" tabindex="-1">
                                                                        Introduction
                                                                    </div>
                                                                    <div class="wizard-container body current" id="" role="tabpanel" aria-labelledby="" aria-hidden="false" style="display: block;">
                                                                        <span>
                                                                            <h3> Request Information</h3>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-2 control-label"> Account Name </label>
                                                                                <div class="col-sm-4">
                                                                                    <p class="info-form">
                                                                                        <?php if (isset($_SESSION['username'])) : ?>
                                                                                            <b><?php echo $_SESSION['username']; ?></b>
                                                                                        <?php endif ?>

                                                                                    </p>
                                                                                </div>

                                                                                <label class="col-sm-2 control-label"> Request Type </label>
                                                                                <div class="col-sm-4">
                                                                                    <p class="info-form">
                                                                                        <b><strong>Resident Entertainment Pass</strong></b>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <h3> Service Requirements</h3>
                                                                            <div class="form-group">
                                                                                <div class="col">
                                                                                    <p>
                                                                                        <strong>
                                                                                            The Residents card allows residents to avail discounted rates across all Townsquare Entertainment Facilities.

                                                                                        </strong>
                                                                                    </p>
                                                                                    <p>
                                                                                        <strong>
                                                                                            The card can be availed only by active residents (units where move-in has been registered).

                                                                                        </strong>
                                                                                    </p>

                                                                                    <p>

                                                                                        By applying for this service, I acknowledge that I have read and understand the Terms and Conditions provided below.

                                                                                    </p>

                                                                                    <p>
                                                                                    <h4>General Terms and Conditions</h4>
                                                                                    </p>


                                                                                    <p>
                                                                                    <h4>
                                                                                        RELEASE OF LIABILITY, WAIVER OF CLAIMS, AND ASSUMPTION OF RISK AGAINST NSHAMA ENTERTAINMENT LLC (“Nshama”)
                                                                                    </h4>
                                                                                    </p>

                                                                                    <p>

                                                                                        In order to participate in the activities that are offered at Town Square Dubai, you must understand and be aware of the risks involved and agree to accept responsibility for you and your dependents subsequent, informed and voluntary participation.
                                                                                        <br>
                                                                                        Use of any of the activities at Town Square Dubai can result in injury.
                                                                                        <br>
                                                                                        Your use and/or dependents’ use of the Town Square Dubai facilities is undertaken in accordance with the applicable rules and conditions displayed on signboards available throughout Town Square Dubai.
                                                                                        <br>
                                                                                        Town Square Dubai has implemented all reasonably necessary safety measures without removing the inherent nature of the activities. As such, Nshama requires your agreement, confirmation, approval, undertaking, consent and waiver (as may apply), as per the following, only if you fully agree to the following:
                                                                                        <br>1. A charge of AED (105) hundred and five including VAT for residents’ card which will entail them for specific number of free rides and also discounts on the rides on games in Town Square Dubai in addition to discounts on games.

                                                                                        <br>2. The resident’s card will have an expiry date which will be 1 year from date of issue or expiry of their tenancy, whichever is earlier. And Access will be issued at the sole discretion of Nshama management

                                                                                        <br> 3. Loss and theft of card, If the card is lost or stolen the cardholder shall immediately report the same to Nshama. Nshama at its sole discretion replace the card for a charge of AED (50) fifty. The cardholder will be responsible if Nshama caught any unauthorized person using the card without Nshama prior approval or awareness. Any misuse of the card including allowing third party to use the card will result in immediate deactivation of the card and the balance being forfeited. The card is not transferable to any third party.


                                                                                        <br>4. I understand that during my or my dependents’ participation, I or we may be exposed to a variety of hazards and risks, both seen and unforeseen. I am fully aware of the services, equipment and/or other facilities that are offered at Town Square Dubai and I have inspected the same to my satisfaction. I am also fully aware of my physical limitations and those of my dependents.

                                                                                        <br> 5. I individually and/or for any/all of my dependents, understand and accept that the activities that I or we will engage in at Town Square Dubai involve inherent and other risks. These risks can result in varying degrees of physical harm, personal injury, disfigurement and potentially death, and I, for myself and on behalf of my dependents, fully waive off any liability or claim I and/or my dependents may have against Nshama its shareholders, officers, managers, employees, staffs, agents or assigns due to any mishap, injury, loss, trauma or death.

                                                                                        <br>6. I understand and accept that these activities are strenuous and can be dangerous and require a higher degree of physical ability, maturity and skill. I understand that Nshama will make neither evaluation nor recommendation regarding my sufficient physical fitness for engaging in the activities provided.
                                                                                        <br>
                                                                                        7. I acknowledge that it is my sole discretion to use and allow my dependents to engage in the activities provided and will assume all risks, both inherent and other risks and accept full responsibility for any personal property damage and loss and for any degree of physical harm I and/or my dependents may suffer.
                                                                                        <br>
                                                                                        8. I understand that failure, deliberate or otherwise, to adhere to the rules and regulations, going into out of bounds areas, or misuse of any equipment will result in full liability being assumed by the participant, my dependents and me.
                                                                                        <br>
                                                                                        9. Nshama may use any of my photographs, video footage, or those of my dependents, or other minors in my care who use Town Square Dubai’s facilities, collected during our use of Town Square Dubai’s facilities for publication and for use in advertising or promotional material. Such photographs or video footage may appear (whether on their own or in conjunction with other photographs, video footage and/or text graphics) on social media platforms such as Facebook; Instagram; Twitter; YouTube; and/or Snapchat, etc. I hereby grant Nshama the unfettered right to use all such photographs and/or video footage in such manner and hereby grant us permission to record, store, transmit, reproduce, replicate, modify, advertise and generally exploit all such photographs and video footages for its benefit and in such manner as Nshama in its independent discretion deem appropriate. I also note also that Nshama operates closed circuit television cameras on-site which may be recording my footages, and of my dependents, or other minors in my care while using Town Square Dubai’s facilities. I fully consent to Nshama use of all such footage in the manner described above and agree that the purpose for using such photos and/or video footage is for advertising, marketing and promotional purposes only and is not intended to insult, defame or slander any person.
                                                                                        I fully acknowledge and agree that the above has been done with my fully understanding and satisfaction as well as on behalf any dependents or other minors in my care while using Town Square Dubai’s facilities.
                                                                                        I also agree not to take photos for any commercial use without the advance written express consent of Nshama.
                                                                                        <br> 10. Nshama management will not accept responsibility for the loss or damage to any personal belongings left unattended.
                                                                                        <br>
                                                                                        11. <strong>WAIVER AND RELEASE</strong> To the fullest extent allowed by law,
                                                                                        <br>
                                                                                        I the undersigned, hereby forever waive, release from liability and discharge claims against Nshama its employees, directors, owners and its subsidiaries and affiliates from, and agree not to pursue any form of legal action for any and all liabilities or claims connected to or arising out of mine or any of my dependents’ participation in the activities and use of any and all equipment and facilities at Town Square Dubai . This release refers to all claim types, including breach of contract fraud, or any other suit and includes losses alleged to be caused by the negligence of Nshama to the fullest extent permitted by the law. I also agree I am responsible for any and all medical costs, including, but not limited to ambulance, hospital, pharmacy, physiotherapy, psychological, rehabilitation or other medical costs that may be incurred by me or my dependents or persons under my care, as well as any person claiming against me or my dependents or persons under my care.
                                                                                        <br>
                                                                                        12. <strong>MEDICAL RELEASE</strong>
                                                                                        I am aware that it is advisable to consult a doctor or physician before undertaking any physical activity at Town Square Dubai. I warrant that I, and/or my dependents do not suffer from any medical condition and/or incapacity which may impair my and/or my dependents’ ability to use and participate in the activities and services and further, that I, and/or my dependents do not suffer from any heart condition, epilepsy, allergies, skeletal conditions, spinal, history of sport injury or any other medical condition which may result in me and/or my dependents potentially placing myself and/or my dependents or others in a position of risk by participating in the activities/services.
                                                                                        <br>
                                                                                        I am aware that pregnant individuals are not permitted to take part in any of the activities at Town Square Dubai and I declare and confirm that I, my dependents or any person under my care participating in any activity at Town Square Dubai is not pregnant at the time of participating.
                                                                                        <br>
                                                                                        <strong>
                                                                                            I hereby declare my legal responsibility for myself and/or my dependent(s). On behalf of myself and/or my dependent(s) I agree to all of the above terms stated in this document and agree to indemnify Nshama from any and all claims that may be brought by or on behalf of the dependent(s) arising out of or in connection with mine or/and my dependents’ participation in the activities at Town Square Dubai.
                                                                                            <br>
                                                                                            I agree not to bring any claim or lawsuit suit against Nshama.
                                                                                            <br>
                                                                                            I agree to indemnify Nshama against any and all legal costs incurred by Nshama in defense of any lawsuit brought against it.
                                                                                            <br>
                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="containertab2 .d-md-none .d-lg-block ">
                                                                                <a href="#step-2" class="btn btn-primary">Next</a>

                                                                            </div>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                                    <div class="panel-body np">
                                                        <span>
                                                            <div action="#" class="form-horizontal form-bordered form-wizard clearfix" role="application">
                                                                <div class="content clearfix">
                                                                    <p style="color:red;"></p><span></span><span></span>
                                                                    <div class="wizard-title title current" tabindex="-1">
                                                                        Introduction
                                                                    </div>
                                                                    <div class="wizard-container body current" id="" role="tabpanel" aria-labelledby="" aria-hidden="false" style="display: block;">
                                                                        <span>
                                                                            <h3> Request Information</h3>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-2 control-label"> Account Name </label>
                                                                                <div class="col-sm-4">
                                                                                    <p class="info-form">
                                                                                        <?php if (isset($_SESSION['username'])) : ?>
                                                                                            <b><?php echo $_SESSION['username']; ?></b>
                                                                                        <?php endif ?>
                                                                                    </p>
                                                                                </div>
                                                                                <label class="col-sm-2 control-label"> Request Type </label>
                                                                                <div class="col-sm-4">
                                                                                    <p class="info-form">
                                                                                        <b>Resident Entertainment Pass</b>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <h3> Request Details</h3>
                                                                            <form method="POST">
                                                                                <div>
                                                                                    <div class="form-group">
                                                                                        <label class="col-sm-2 control-label "> Property Name
                                                                                            <span class="red">*</span>
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <select class="form-control" alt="" id="propertyname" maxlength="" name="propertyname">
                                                                                                <?php
                                                                                                // $propertydata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM propertydata where id=$qqID"), MYSQLI_BOTH);
                                                                                                $propertydata = mysqli_query($con, 'SELECT * FROM `propertydata`');

                                                                                                while ($row = mysqli_fetch_array($propertydata)) {
                                                                                                    $propertyname = array($row['propertyname']);
                                                                                                    foreach ($propertyname as $values); {
                                                                                                ?>

                                                                                                        <option <?php if (isset($_SESSION['asifeeveedinteaishwaryam']['propertyname'])) {
                                                                                                                    echo ($_SESSION['asifeeveedinteaishwaryam']['propertyname'] == $values) ? 'selected=true' : '';
                                                                                                                } ?> value="<?= $values; ?>"><?= $values ?>


                                                                                                        </option>
                                                                                                <?php }
                                                                                                } ?>
                                                                                            </select>
                                                                                        </div>
                                                                                        <label class="col-sm-2 control-label "> No of Resident Pass
                                                                                            <span class="red">*</span>
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <select class="form-control" alt="" id="residentpass" maxlength="" name="residentpass">
                                                                                                <option value="">--None--</option>
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                </div>

                                                                                <div class="containertab1 .d-md-none .d-lg-block ">
                                                                                    <a href="#step-2" class="btn btn-primary">Previous</a>
                                                                                    <button type="submit" class="btn btn-primary" name="submit" onclick="window.location.href='#step-3'">Next</button>
                                                                                </div>
                                                                            </form>

                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>


                                                <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                                    <div class="panel-body np">
                                                        <span>
                                                            <div action="#" class="form-horizontal form-bordered form-wizard clearfix" role="application">
                                                                <div class="content clearfix">
                                                                    <p style="color:red;"></p><span></span><span></span>
                                                                    <div class="wizard-title title current" tabindex="-1">
                                                                        Introduction
                                                                    </div>
                                                                    <div class="wizard-container body current" id="" role="tabpanel" aria-labelledby="" aria-hidden="false" style="display: block;">
                                                                        <span>
                                                                            <h3> Request Information</h3>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-2 control-label"> Account Name </label>
                                                                                <div class="col-sm-4">
                                                                                    <p class="info-form">
                                                                                        <?php if (isset($_SESSION['username'])) : ?>
                                                                                            <b><?php echo $_SESSION['username']; ?></b>
                                                                                        <?php endif ?>
                                                                                    </p>
                                                                                </div>
                                                                                <label class="col-sm-2 control-label"> Request Type </label>
                                                                                <div class="col-sm-4">
                                                                                    <p class="info-form">
                                                                                        <b>Resident Pass</b>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                            if (isset($_GET['step_new'])) {
                                                                                // $qqID = mysqli_real_escape_string($con, $_GET['data']);
                                                                                // $result = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM generalenquiry WHERE id=$qqID"), MYSQLI_BOTH);

                                                                                $usermail = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM register"));



                                                                            ?>


                                                                                <span class="preheader">Thanks for filling out PROPERTY MANAGEMENT. We’ve pulled together some information and resources according to your selection</span>

                                                                                <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                                <tr>
                                                                                                    <td class="email-masthead">
                                                                                                        <a href="https://indusre.com" class="f-fallback email-masthead_name">
                                                                                                            PROPERTY MANAGEMENT
                                                                                                        </a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <!-- Email Body -->
                                                                                                <tr>
                                                                                                    <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                                                                                                        <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                                                                                            <!-- Body content -->
                                                                                                            <tr>
                                                                                                                <td class="content-cell">
                                                                                                                    <div class="f-fallback">
                                                                                                                        <h1>Welcome <?php if (isset($_SESSION['username'])) : ?>
                                                                                                                                <b><?php echo $_SESSION['username']; ?></b>
                                                                                                                            <?php endif ?>
                                                                                                                        </h1>
                                                                                                                        <p>Thanks for filling out the form. We’re thrilled to have you on board. To get the most out of this, do this primary next step:</p>
                                                                                                                        <!-- Action -->
                                                                                                                        <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                                                            <tr>
                                                                                                                                <td align="center">

                                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                                                                                                                                        <tr>
                                                                                                                                            <td align="center">
                                                                                                                                                <form method="POST">
                                                                                                                                                    <button type="submit" name="step_3_submit" class="f-fallback button">Confirm Your Details</button>
                                                                                                                                                </form>

                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                    </table>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </table>
                                                                                                                        <p>For reference, here's your login information:</p>
                                                                                                                        <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                                                            <tr>
                                                                                                                                <td class="attributes_content">
                                                                                                                                    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                                                                        <tr>
                                                                                                                                            <td class="attributes_item">
                                                                                                                                                <span class="f-fallback">
                                                                                                                                                    <strong>Username:</strong> <?php if (isset($_SESSION['username'])) : ?>
                                                                                                                                                        <b><?php echo $_SESSION['username']; ?></b>
                                                                                                                                                    <?php endif ?>
                                                                                                                                                </span>
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                        <tr>
                                                                                                                                            <td class="attributes_item">
                                                                                                                                                <span class="f-fallback">
                                                                                                                                                    <strong>Email:</strong>
                                                                                                                                                    <b><?php echo $usermail['email']; ?></b>

                                                                                                                                                </span>
                                                                                                                                            </td>
                                                                                                                                        </tr>

                                                                                                                                    </table>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </table>
                                                                                                                        <p>You've selected these options. If you want to edit these information you can go back by clicking the update button. Once the next button is clicked you cant change your selection any more</p>
                                                                                                                        <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                                                            <tr>
                                                                                                                                <td align="center">

                                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                                                                                                                                        <tr>
                                                                                                                                            <td align="center">
                                                                                                                                                <a href="#step-2" class="f-fallback button">Update</a>
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                    </table>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </table>

                                                                                                                        <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                                                            <tr>
                                                                                                                                <td class="attributes_content">
                                                                                                                                    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                                                                        <tr>
                                                                                                                                            <td class="attributes_item">
                                                                                                                                                <span class="f-fallback">
                                                                                                                                                    <strong>Property Name:</strong> <?php echo $_SESSION['residentpass']['propertyname']; ?>
                                                                                                                                                </span>
                                                                                                                                            </td>
                                                                                                                                        </tr>

                                                                                                                                        <tr>
                                                                                                                                            <td class="attributes_item">
                                                                                                                                                <span class="f-fallback">
                                                                                                                                                    <strong>No of Resident Pass </strong> <?php echo $_SESSION['residentpass']['residentpass']; ?>
                                                                                                                                                </span>
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                        


                                                                                                                                    </table>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </table>
                                                                                                                        <p>If you have any questions, feel free to <a href="mailto:{{support_email}}">email our customer success team</a>. (We're lightning quick at replying.) We also offer <a href="mailto:admin@indsure.ae">Quick email reply</a> during business hours.</p>
                                                                                                                        <p>Thanks,
                                                                                                                            <br>Admin , Property Management Team
                                                                                                                        </p>
                                                                                                                        <p><strong>P.S.</strong> Need immediate help getting started? Check out our <a href="#help">help documentation</a>. Or, just send a email to this <a href="mailto:admin@indusre.com">address</a>, Our support team is always ready to help!</p>
                                                                                                                        <!-- Sub copy -->
                                                                                                                        <table class="body-sub" role="presentation">
                                                                                                                            <tr>
                                                                                                                                <td>
                                                                                                                                    <p class="f-fallback sub">PROPERTY MANAGEMENT 2021</p>

                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </table>
                                                                                                                    </div>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            <?php } ?>
                                                                            <br>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>

                                                <?php if (isset($_GET['final'])) { ?>
                                                    <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                                                        <div class="panel-body np">
                                                            <span>
                                                                <div action="#" class="form-horizontal form-bordered form-wizard clearfix" role="application">
                                                                    <div class="content clearfix">
                                                                        <p style="color:red;"></p><span></span><span></span>
                                                                        <div class="wizard-title title current" tabindex="-1">
                                                                            Introduction
                                                                        </div>
                                                                        <div class="wizard-container body current" id="" role="tabpanel" aria-labelledby="" aria-hidden="false" style="display: block;">
                                                                            <span>
                                                                                <h3> Request Information</h3>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-2 control-label"> Account Name </label>
                                                                                    <div class="col-sm-4">
                                                                                        <p class="info-form">
                                                                                            <?php if (isset($_SESSION['username'])) : ?>
                                                                                                <b><?php echo $_SESSION['username']; ?></b>
                                                                                            <?php endif ?>
                                                                                        </p>
                                                                                    </div>
                                                                                    <label class="col-sm-2 control-label"> Request Type </label>
                                                                                    <div class="col-sm-4">
                                                                                        <p class="info-form">
                                                                                            <b>Noc - For Pre Sell Handover</b>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <h3> Service Requirements</h3>
                                                                                <?php include('../../lib/thankyouform.php'); ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                        </div>
                                    </span>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <button class="btn" id="scroll-top">
        <i class="fa fa-chevron-up"></i>
    </button><span>
        <div class="new-container">
            <footer id="footer">
                <div class="container-fluid">
                    <div class="col-sm-4 col-md-4 col-lg-4">


                        <ul class="footermenu-left">
                            <li><a href="" target="_blank">CAREERS</a></li>
                            <li><a href="" target="_blank">CONTACT US</a></li>
                            <li><a href="" target="_blank">Media Center</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2 text-center">

                        <a href="" target="_blank">
                            <i class="fa fa-facebook "></i>
                        </a>

                        <a href="" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="" target="_blank">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a class="social-icon youtube" href="" target="_blank">
                            <i class="fa fa-youtube-play "></i>
                        </a>

                        <a class="social-icon linkedin" href="" target="_blank">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <ul class="footermenu-right">
                            <li><a href="#" target="_blank">Privacy Policy</a></li>
                            <li><a href="#" target="_blank">Terms &amp; Conditions</a></li>
                            <li>Copyright &copy; 2021 Indus Real Estate</li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>


        <?php include('../../lib/header.php'); ?>
        <script src="../../assets/js/smartwizard.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                $('#smartwizard').smartWizard();

            });
        </script>

</body>

</html>