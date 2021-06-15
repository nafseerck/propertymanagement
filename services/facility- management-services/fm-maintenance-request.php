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

    $propertyname = $_SESSION['fmmaintenancerequest']['propertyname'];
    $purpose = $_SESSION['fmmaintenancerequest']['purpose'];
    $description = $_SESSION['fmmaintenancerequest']['description'];
    $dateandtime = $_SESSION['fmmaintenancerequest']['dateandtime'];
    $applicationtype = $_SESSION['fmmaintenancerequest']['applicationtype'];



    $sql = "INSERT INTO `fmmaintenancerequest`(`id`, `propertyname`, `purpose`, `description`,`dateandtime`,`applicationtype`,`created_at`,`created_by`) VALUES ('','$propertyname','$purpose','$description','$dateandtime','$applicationtype','$created_date','$usID')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con);
    }
    mysqli_close($con);

    unset($_SESSION['fmmaintenancerequest']);

    header('location:fm-maintenance-request.php?final=true#step-4');
}

if (isset($_POST['submit'])) {


    $propertyname = mysqli_real_escape_string($con, $_POST['propertyname']);
    $purpose = mysqli_real_escape_string($con, $_POST['purpose']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $dateandtime = mysqli_real_escape_string($con, $_POST['dateandtime']);
    $applicationtype = mysqli_real_escape_string($con, $_POST['applicationtype']);




    $save_to_data = array('propertyname' => $propertyname, 'purpose' => $purpose, 'description' => $description, 'dateandtime' => $dateandtime, 'applicationtype' => $applicationtype,);
    $_SESSION['fmmaintenancerequest'] = $save_to_data;
    header('location:fm-maintenance-request.php?step_new=3');
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
                                    <h3 class="panel-title">Request Submission - FM Maintenance Request</h3>
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
                                                                                        <b><strong>FM - Maintenance Request

                                                                                            </strong></b>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <h3> Service Requirements</h3>
                                                                            <div class="form-group">
                                                                                <div class="col">
                                                                                    <ul>
                                                                                        <li>
                                                                                            Please submit your application to report maintenance issue, during the Defect Liability Period (DLP).
                                                                                        </li>
                                                                                        <li>
                                                                                            Please schedule a visit by selecting the preferred date and time.
                                                                                        </li>
                                                                                        <li>
                                                                                            You will be contacted by our Facilities Management Representative to confirm the appointment.

                                                                                        </li>
                                                                                    </ul>
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
                                                                                        <b>FM - Maintenace Requests</b>
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
                                                                                        <label class="col-sm-2 control-label "> Purpose
                                                                                            <span class="red">*</span>
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <select class="form-control" alt="" id="purpose" maxlength="" name="purpose">
                                                                                                <option value="">--None--</option>
                                                                                                <option value="Lighting">Lighting</option>
                                                                                                <option value="Electrical">Electrical</option>
                                                                                                <option value="AC">AC</option>
                                                                                                <option value="Plumbing">Plumbing</option>
                                                                                                <option value="Landscaping">Landscaping</option>
                                                                                                <option value="Other">Other</option>
                                                                                            </select>
                                                                                        </div>

                                                                                        <label class="col-sm-2 control-label "> Application Type
                                                                                            <span class="red">*</span>
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <select class="form-control" alt="" id="applicationtype" maxlength="" name="applicationtype">
                                                                                                <option value="FM - Maintenance Request ">Fm Maintenance Request</option>

                                                                                            </select>
                                                                                        </div>
                                                                                        <label class="col-sm-2 control-label "> Description
                                                                                            <span class="red">*</span>
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" id="description" name="description">
                                                                                            </input>
                                                                                        </div>

                                                                                        <label class="col-sm-2 control-label "> Preferred Visit Date & Time
                                                                                            <span class="red">*</span>
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" type="datetime-local" name="dateandtime" id="dateandtime">
                                                                                            </input>
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
                                                                                        <b>General Enquiry</b>
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
                                                                                                                                                    <strong>Property Name :</strong> <?php echo $_SESSION['fmmaintenancerequest']['propertyname']; ?>
                                                                                                                                                </span>
                                                                                                                                            </td>
                                                                                                                                        </tr>

                                                                                                                                        <tr>
                                                                                                                                            <td class="attributes_item">
                                                                                                                                                <span class="f-fallback">
                                                                                                                                                    <strong>Application Type</strong> <?php echo $_SESSION['fmmaintenancerequest']['applicationtype']; ?>
                                                                                                                                                </span>
                                                                                                                                            </td>
                                                                                                                                        </tr>

                                                                                                                                        <tr>
                                                                                                                                            <td class="attributes_item">
                                                                                                                                                <span class="f-fallback">
                                                                                                                                                    <strong>Purpose</strong> <?php echo $_SESSION['fmmaintenancerequest']['purpose']; ?>
                                                                                                                                                </span>
                                                                                                                                            </td>
                                                                                                                                        </tr>

                                                                                                                                        <tr>
                                                                                                                                            <td class="attributes_item">
                                                                                                                                                <span class="f-fallback">
                                                                                                                                                    <strong>Description</strong> <?php echo $_SESSION['fmmaintenancerequest']['description']; ?>
                                                                                                                                                </span>
                                                                                                                                            </td>
                                                                                                                                        </tr>


                                                                                                                                        <tr>
                                                                                                                                            <td class="attributes_item">
                                                                                                                                                <span class="f-fallback">
                                                                                                                                                    <strong>Date & Time</strong> <?php echo $_SESSION['fmmaintenancerequest']['dateandtime']; ?>
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
                                                                                            <b>FM - Maintenance Request</b>
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