<?php
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
    </style>
    </span>

</head>

<body>
    <span>
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
                                    <h3 class="panel-title">Request Submission - Tenant Move-in Request
                                    </h3>
                                </div>
                                <div class="panel-body np">
                                    <span>
                                        <div action="#" class="form-horizontal form-bordered form-wizard clearfix" role="application">
                                            <div class="steps clearfix">
                                                <ul role="tablist">
                                                    <li role="tab" class="first current" aria-disabled="false" aria-selected="true"><a id="" href="#" aria-controls="wizard-p-0"><span class="current-info audible">current step: </span><span class="number">1.</span><span class="title">
                                                                Introduction
                                                            </span></a></li>
                                                    <li role="tab" class="disabled" aria-disabled="true"><a id="" href="#" aria-controls=""><span class="number">2.</span><span class="title">
                                                                Request Details Page 1
                                                            </span></a></li>
                                                    <li role="tab" class="disabled" aria-disabled="true"><a id="" href="#" aria-controls=""><span class="number">3.</span><span class="title">
                                                                Request Details Page 2
                                                            </span></a></li>
                                                    <li role="tab" class="disabled" aria-disabled="true"><a id="" href="#" aria-controls=""><span class="number">4.</span><span class="title"> Attachments </span></a></li>
                                                    <li role="tab" class="disabled" aria-disabled="true"><a id="" href="#" aria-controls=""><span class="number">5.</span><span class="title"> Preview and Submit </span></a></li>
                                                    <li role="tab" class="disabled last" aria-disabled="true"><a id="" href="#" aria-controls=""><span class="number">6.</span><span class="title"> Confirmation</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="content clearfix">
                                                <p style="color:red;"></p>
                                                <div class="wizard-title title current" tabindex="-1">
                                                    Introduction
                                                </div>
                                                <div class="wizard-container body current" id="" role="tabpanel" aria-labelledby="" aria-hidden="false" style="display: block;">
                                                    <div class="actions steps-bar  steps-bar-top clearfix">
                                                        <ul>
                                                            <li></li>
                                                            <li><input class="btn btn-default pull-right" id="" name="" onclick="" value="Next" type="submit"></li>
                                                        </ul>
                                                    </div>
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
                                                                    <b><strong>Tenant Move-in Request
                                                                        </strong></b>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <h3> Service Requirements</h3>
                                                        <div class="form-group">
                                                            <div class="col">
                                                                <p>
                                                                    Please submit your application to obtain approvals for Move-in ProcessThe request for Move-in will be reviewed and an approval / decline letter will be issued thereafter.
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="actions steps-bar  steps-bar-top clearfix">
                                                            <ul>
                                                                <li></li>
                                                                <li><input class="btn btn-default pull-right" id="" name="" onclick="" value="Next" type="submit"></li>
                                                            </ul>
                                                        </div>
                                                    </span>
                                                </div>
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

</body>

</html>