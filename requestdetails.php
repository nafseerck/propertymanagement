<?php
session_start();
include('connection.php');


if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}



if (isset($_GET['id']) and isset($_GET['mod'])) {
    $id_incoming = mysqli_real_escape_string($con, $_GET['id']);
    $mod = mysqli_real_escape_string($con, $_GET['mod']);

    if ($id_incoming != '' and $mod != '') {
    } else {
        header("location:myrequests.php");
    }
} else {
    header("location:myrequests.php");
}





$usermail = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM register"));


?>



<!DOCTYPE HTML>

<head>



    <meta charset="utf-8" />
    <title>PROPERTY MANAGEMENT | INDUS REAL ESTATE LLC</title>

    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="assets/js/fa.js"></script>
    <!-- <link href="style.css" rel="stylesheet" /> -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/bootstrapdatetimepicker.css" rel="stylesheet" />
    <link href="assets/css/style1.css" rel="stylesheet" />
    <link href="assets/css/newstyle.css" rel="stylesheet" />
    <link href="assets/css/newstyle1.css" rel="stylesheet" />
    <link href="assets/css/newstyle2.css" rel="stylesheet" />



    <?php include('lib/header.php'); ?>
    <script src="assets/js/fbox.js"></script>

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
    <div class="new-container">
        <header id="navbar">
            <div class="boxed" id="navbar-container">
                <div class=" clearfix ">
                    <a class="navbar-brand site-logo" href="index.php">
                        <span>PROPERTY MANAGEMENT</span>
                    </a>
                    <div class="navbar-content clearfix">
                        <ul class="nav navbar-top-links pull-right">
                            <li class="" id="toggleFullscreen">
                                <a class="fa fa-bell" data-toggle="fullscreen" id="opener" role="button">
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
                                    <span class="pull-right"><img src="assets/imgs/profiles/user.png" alt="Profile" class="img-circle img-user media-object" />
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
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse" id="defaultmenu">
                        <ul class="nav navbar-nav">
                            <li class="current"><a href="index.php"><i aria-hidden="true" class="fa fa-home"></i> Home</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i aria-hidden="true" class="fa fa-exchange"></i> Services<b class="caret"></b></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="dropdown-submenu">
                                        <a href="#">Customer Care Services
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="services/customer-care-services/change-customer-information.php"> Change Customer Information </a></li>
                                            <li><a href="services/customer-care-services/general-enquiry.php"> General Inquiry </a></li>
                                            <li><a href="services/customer-care-services/make-a-payment.php"> Make a Payment </a></li>
                                            <li><a href="services/customer-care-services/name-amendment.php"> Name amendment / Reprint SPA / Lost SPA </a></li>
                                            <li><a href="services/customer-care-services/noc-for-mortgage.php"> NOC for Mortgage </a></li>
                                            <li><a href="services/customer-care-services/noc-for-sell-post-handover.php"> NOC for Sell - Post Handover </a></li>
                                            <li><a href="services/customer-care-services/noc-for-sell-pre-handover.php"> NOC for Sell - Pre Handover </a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#">Facility Management Services
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="services/facility- management-services/alteration-request.php"> Alteration Request </a></li>
                                            <li><a href="services/facility- management-services/approve-alteration-make-a-payment.php"> Approve Alteration - Make a Payment </a></li>
                                            <li><a href="services/facility- management-services/fm-access-card-related.php"> FM - Access Card related </a></li>
                                            <li><a href="services/facility- management-services/fm-generic-issues.php"> FM - Generic issues </a></li>
                                            <li><a href="services/facility- management-services/fm-maintenance-request.php"> FM - Maintenance Request </a></li>
                                            <li><a href="services/facility- management-services/owner-move-in-request.php"> Owner Move-in Request </a></li>
                                            <li><a href="services/facility- management-services/owner-move-out-request.php"> Owner Move-Out Request </a></li>
                                            <li><a href="services/facility- management-services/tenant-move-in-request.php"> Tenant Move-in Request </a></li>
                                            <li><a href="services/facility- management-services/tenant-registration.php"> Tenant Registration </a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#">Resident Services
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="services/residentservices/nominations.php"> Nomination </a></li>
                                            <li><a href="services/residentservices/resident-entertainment-pass.php"> Resident Entertainment Pass </a></li>
                                            <li><a href="services/residentservices/shuttle-bus-card.php"> Shuttle Bus Card </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class=""><a href="myrequests.php"><i aria-hidden="true" class="fa fa-list-ol"></i> My Requests </a></li>
                            <li class=""><a href="reports.php"><i aria-hidden="true" class="fa fa-bar-chart"></i> Reports </a></li>
                            <li class=""><a href="appointment/calender.php"><i aria-hidden="true" class="fa fa-calendar"></i> Appointments </a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i aria-hidden="true" class="fa fa-file-text-o"></i> My Documents<b class="caret"></b></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class=""><a href="ud.php"><i aria-hidden="true" class="fa fa-file-text-o"></i> Uploaded Documents </a></li>
                                    <li class=""><a href="templates.php"><i aria-hidden="true" class="fa fa-file-text-o"></i> Templates </a></li>
                                </ul>
                            </li>
                            <li class=""><a href="registerinterest.php"><i aria-hidden="true" class="fa fa-check-square-o"></i> Register Interest </a></li>
                            <li class=""><a href="CustomerCareServices?eServiceId=a3Q36000000FQPeEAO"><i aria-hidden="true" class="fa fa-credit-card"></i> Make a Payment </a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
    </div>



    <div class="new-container">
        <div class="boxed">
            <div id="content-container">
                <div class="pageheader">
                    <h3>
                        <i class="fa fa-home"></i>
                        Details Page
                    </h3>
                </div>
                <div id="page-content">
                    <div class="row intro-block">
                        <div class="col-lg-12 col-md-6">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        Details </h3>
                                </div>
                                <div class="panel-body">
                                    <span">
                                        <div class="media">
                                            <div class="media-body">

                                                <div class="container">

                                                    <div class="col-lg-12">

                                                        <p class="text-center">For reference, here's your login information:</p>
                                                        <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                            <tr>
                                                                <td class="attributes_content">
                                                                    <table width="100%" cellpadding="0" cellspacing="0" role="presentation" class="text-center">
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









                                                        <!-- <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                            <tr>
                                                                <td class="attributes_content">
                                                                    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                        <tr>
                                                                            <td class="attributes_item">
                                                                                <span class="f-fallback">
                                                                                    <strong style="font-size: 17px;">Case Number :</strong> <a style="font-weight: 300;font-size: 19px;"><?php echo $_SESSION['username']; ?></a>
                                                                                </span>
                                                                            </td>
                                                                            <td class="attributes_item">
                                                                                <span class="f-fallback">
                                                                                    <strong style="font-size: 17px;">Request Type :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $_SESSION['username']; ?></a>
                                                                                </span>
                                                                            </td>

                                                                        </tr>

                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table> -->

                                                        <?php if ($mod == 'alteration') {


                                                            $details = mysqli_query($con, "SELECT * FROM alterationrequest WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>

                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td class="attributes_content">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Alteration Duration : <span style="font-size:15px;"><?php echo $details_row['alterationduration']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Alteration Purpose :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['alterationpurpose']; ?></a>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Description :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['description']; ?></a>
                                                                                    </span>
                                                                                </td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        <?php } ?>





                                                        <?php if ($mod == 'customerinformation') {


                                                            $details = mysqli_query($con, "SELECT * FROM changecustomerinformation WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>

                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td class="attributes_content">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Application Type : <span style="font-size:15px;"><?php echo $details_row['applicationtype']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Subject :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['subject']; ?></a>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Description :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['description']; ?></a>
                                                                                    </span>
                                                                                </td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        <?php } ?>

                                                        <?php if ($mod == 'approvealteration') {


                                                            $details = mysqli_query($con, "SELECT * FROM changecustomerinformation WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>

                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td class="attributes_content">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Application Type : <span style="font-size:15px;"><?php echo $details_row['applicationtype']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Subject :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['subject']; ?></a>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Description :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['description']; ?></a>
                                                                                    </span>
                                                                                </td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        <?php } ?>


                                                        <?php if ($mod == 'genericissue') {


                                                            $details = mysqli_query($con, "SELECT * FROM fmgenericissue WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>

                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td class="attributes_content">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Application Type : <span style="font-size:15px;"><?php echo $details_row['applicationtype']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Subject :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['subject']; ?></a>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Description :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['description']; ?></a>
                                                                                    </span>
                                                                                </td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        <?php } ?>


                                                        <?php if ($mod == 'fmaccesscard') {


                                                            $details = mysqli_query($con, "SELECT * FROM fmaccesscard WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>

                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td class="attributes_content">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Application Type : <span style="font-size:15px;"><?php echo $details_row['applicationtype']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Application Reason :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['applicationreason']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        <?php } ?>



                                                        <?php if ($mod == 'tenantregistration') {


                                                            $details = mysqli_query($con, "SELECT * FROM fmaccesscard WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>

                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td class="attributes_content">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Application Type : <span style="font-size:15px;"><?php echo $details_row['applicationtype']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Tenant First Name :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['tenantfirstname']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Tenant Last Name :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['tenantlastname']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                            </tr>


                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Tenant Email Id:</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['tenantemailid']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Contract Amount :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['contractamount']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                            </tr>


                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Ejari Issue Date:</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['tenantejariissuedate']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Ejari Expiry Date :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['tenantejariexpirydate']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                            </tr>

                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Tenant Ejari Number:</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['tenantejarunumber']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        <?php } ?>



                                                        <?php if ($mod == 'makeapayment') {


                                                            $details = mysqli_query($con, "SELECT * FROM makeapayment WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>

                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td class="attributes_content">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Application Type : <span style="font-size:15px;"><?php echo $details_row['applicationtype']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Application Reason :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['applicationreason']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        <?php } ?>

                                                        <?php if ($mod == 'fmgenericissue') {


                                                            $details = mysqli_query($con, "SELECT * FROM fmgenericissue WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>

                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td class="attributes_content">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Application Type : <span style="font-size:15px;"><?php echo $details_row['applicationtype']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Application Reason :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['applicationreason']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        <?php } ?>


                                                        <?php if ($mod == 'fmmaintenancerequest') {


                                                            $details = mysqli_query($con, "SELECT * FROM fmmaintenancerequest WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>

                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td class="attributes_content">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Application Type : <span style="font-size:15px;"><?php echo $details_row['applicationtype']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Purpose :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['purpose']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Description :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['description']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                            </tr>


                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Date and Time :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['dateandtime']; ?></a>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        <?php } ?>


                                                        <?php if ($mod == 'generalenquiry') {


                                                            $details = mysqli_query($con, "SELECT * FROM generalenquiry WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>

                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td class="attributes_content">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Application Type : <span style="font-size:15px;"><?php echo $details_row['applicationtype']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Subject :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['subject']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Description :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['desctription']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                            </tr>


                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Date and Time :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['dateandtime']; ?></a>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        <?php } ?>



                                                        <?php if ($mod == 'nameamendment') {


                                                            $details = mysqli_query($con, "SELECT * FROM nameamendment WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>

                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td class="attributes_content">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Application Type : <span style="font-size:15px;"><?php echo $details_row['applicationtype']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Delivery Method :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['deliverymethod']; ?></a>
                                                                                    </span>
                                                                                </td>



                                                                            </tr>




                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        <?php } ?>



                                                        <?php if ($mod == 'nocforpostsell') {


                                                            $details = mysqli_query($con, "SELECT * FROM nocforpostsell WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>

                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td class="attributes_content">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Application Type : <span style="font-size:15px;"><?php echo $details_row['applicationtype']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">New Selling Price :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['newsellingprice']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Buyer Type :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['buyertype']; ?></a>
                                                                                    </span>
                                                                                </td>




                                                                            </tr>


                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Buyer Mortgage Status :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['buyermortgagestatus']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Currently Mortgaged ? :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['currentlymortgaged']; ?></a>
                                                                                    </span>
                                                                                </td>




                                                                            </tr>




                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        <?php } ?>


                                                        <?php if ($mod == 'nocforpresell') {


                                                            $details = mysqli_query($con, "SELECT * FROM nocforpostsell WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>

                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td class="attributes_content">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Application Type : <span style="font-size:15px;"><?php echo $details_row['applicationtype']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">New Selling Price :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['newsellingprice']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Buyer Type :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['buyertype']; ?></a>
                                                                                    </span>
                                                                                </td>




                                                                            </tr>


                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Mortgage Status :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['mortgagestatus']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Buyer Mortgage Required :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['buyermortgagerequired']; ?></a>
                                                                                    </span>
                                                                                </td>




                                                                            </tr>




                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        <?php } ?>



                                                        <?php if ($mod == 'ownermoveinrequest') {


                                                            $details = mysqli_query($con, "SELECT * FROM ownermoveinrequest WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>

                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td class="attributes_content">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Application Type : <span style="font-size:15px;"><?php echo $details_row['applicationtype']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Move In Date :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['jmoveindate']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Occupants :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['occupants']; ?></a>
                                                                                    </span>
                                                                                </td>




                                                                            </tr>


                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">House Hold Helper Required ? :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['householdhelper']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Access Card 1 :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['accesscard1']; ?></a>
                                                                                    </span>
                                                                                </td>




                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Access Card 2:</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['accesscard2']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Access Card 3 :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['accesscard3']; ?></a>
                                                                                    </span>
                                                                                </td>




                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Access Card 4:</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['accesscard4']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Parking Card 1 :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['parkingcard1']; ?></a>
                                                                                    </span>
                                                                                </td>




                                                                            </tr>`


                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Parking Card 2:</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['parkingcard2']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Parking Card 3 :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['parkingcard3']; ?></a>
                                                                                    </span>
                                                                                </td>




                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Parking Card 4:</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['parkingcard4']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Vehicle Plate Number 1 :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['vehicleplatenumber1']; ?></a>
                                                                                    </span>
                                                                                </td>




                                                                            </tr>



                                                                            <tr>


                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Vehicle Plate Number 2 :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['vehicleplatenumber2']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Vehicle Plate Number 3 :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['vehicleplatenumber3']; ?></a>
                                                                                    </span>
                                                                                </td>




                                                                            </tr>

                                                                            <tr>


                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Vehicle Plate Number 4 :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['vehicleplatenumber4']; ?></a>
                                                                                    </span>
                                                                                </td>






                                                                            </tr>





                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        <?php } ?>




                                                        <?php if ($mod == 'ownermoveoutrequest') {


                                                            $details = mysqli_query($con, "SELECT * FROM ownermoveoutrequest WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>

                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td class="attributes_content">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Application Type : <span style="font-size:15px;"><?php echo $details_row['applicationtype']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Move Out Date :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['moveoutdate']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Move Out Company:</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['moveoutcompany']; ?></a>
                                                                                    </span>
                                                                                </td>




                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Move Out Company Contact :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['moveoutcompanycontact']; ?></a>
                                                                                    </span>
                                                                                </td>

                                                                            </tr>





                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        <?php } ?>


                                                        <?php if ($mod == 'residentpass') {


                                                            $details = mysqli_query($con, "SELECT * FROM residentpass WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>

                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td class="attributes_content">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">
                                                                                            Application Type : <span style="font-size:15px;"><?php echo $details_row['applicationtype']; ?></span>
                                                                                        </strong>
                                                                                    </span>
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <td class="attributes_item">
                                                                                    <span class="f-fallback">
                                                                                        <strong style="font-size: 17px;">Resident Pass :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['residentpass']; ?></a>
                                                                                    </span>
                                                                                </td>






                                                                            </tr>




                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        <?php } ?>


                                                        <?php if ($mod == 'shuttlebuscard') {


                                                            $details = mysqli_query($con, "SELECT * FROM shuttlebuscard WHERE `id`='$id_incoming' ");
                                                            $details_row = mysqli_fetch_assoc($details);

                                                        ?>
                                                            <div class="text-center">
                                                                <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                    <tr>
                                                                        <td class="attributes_content">
                                                                            <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                <tr>
                                                                                    <td class="attributes_item">
                                                                                        <span class="f-fallback">
                                                                                            <strong style="font-size: 17px;">
                                                                                                Property Name : <span style="font-size:15px;"><?php echo $details_row['propertyname']; ?></span>
                                                                                            </strong>
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="attributes_item">
                                                                                        <span class="f-fallback">
                                                                                            <strong style="font-size: 17px;">
                                                                                                Application Type : <span style="font-size:15px;"><?php echo $details_row['applicationtype']; ?></span>
                                                                                            </strong>
                                                                                        </span>
                                                                                    </td>


                                                                                </tr>

                                                                                <tr>

                                                                                    <td class="attributes_item">
                                                                                        <span class="f-fallback">
                                                                                            <strong style="font-size: 17px;">Shuttle Bus Card :</strong> <a style="font-weight: 300;font-size: 19px;color:black"><?php echo $details_row['shuttlebuscard']; ?></a>
                                                                                        </span>
                                                                                    </td>

                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                            </div>

                                                        <?php } ?>


                                                        <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                            <tr>
                                                                <td align="center">

                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                                                                        <tr>
                                                                            <td align="center">
                                                                                <a href="update.php" class="f-fallback button">Update</a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <button class="btn" id="scroll-top">
        <i class="fa fa-chevron-up"></i>
    </button><span id="j_id0:myForm:j_id89">
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

    </span>





</body>