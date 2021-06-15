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



if (isset($_POST['update'])) {

    $propertyname = $_POST['propertyname'];
    $applicationtype = $_POST['applicationtype'];
    $alterationduration = $_POST['alterationduration'];
    $alterationpurpose = $_POST['alterationpurpose'];
    $description = $_POST['description'];




    $sql = " UPDATE `alterationrequest` SET  `propertyname`='$propertyname', `applicationtype`='$applicationtype', `alterationduration`='$alterationduration', `alterationpurpose`='$alterationpurpose', `description`='$description'  WHERE `id`='$id_incoming' ";

    //  ,'$applicationtype','$alterationduration','$alterationpurpose','$description')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con); 
    }
    mysqli_close($con);

    unset($_SESSION['alterationrequest']);

    // header('location:update.php?');
}



if (isset($_POST['update1'])) {

    $propertyname = $_POST['propertyname'];
    $applicationtype = $_POST['applicationtype'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];




    $sql = " UPDATE `changecustomerinformation` SET  `propertyname`='$propertyname', `applicationtype`='$applicationtype', `subject`='$subject', `description`='$description'  WHERE `id`='$id_incoming' ";

    //  ,'$applicationtype','$alterationduration','$alterationpurpose','$description')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con); exit;
    }
    mysqli_close($con);

    unset($_SESSION['changecustomerinformation']);

    header('location:update.php');
}



if (isset($_POST['update2'])) {

    $propertyname = $_POST['propertyname'];
    $applicationtype = $_POST['applicationtype'];
  




    $sql = " UPDATE `makeapayment` SET  `propertyname`='$propertyname', `applicationtype`='$applicationtype' WHERE `id`='$id_incoming' ";

    //  ,'$applicationtype','$alterationduration','$alterationpurpose','$description')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con); exit;
    }
    mysqli_close($con);

    unset($_SESSION['makeapayment']);

    header('location:update.php');
}



if (isset($_POST['update3'])) {

    $propertyname = $_POST['propertyname'];
    $applicationtype = $_POST['applicationtype'];
    $deliverymethod = $_POST['deliverymethod'];
  




    $sql = " UPDATE `nameamendment` SET  `propertyname`='$propertyname',`deliverymethod`='$deliverymethod' , `applicationtype`='$applicationtype' WHERE `id`='$id_incoming' ";

    //  ,'$applicationtype','$alterationduration','$alterationpurpose','$description')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con); exit;
    }
    mysqli_close($con);

    unset($_SESSION['nameamendment']);

    header('location:update.php');
}


if (isset($_POST['update4'])) {

    $propertyname = $_POST['propertyname'];
    $applicationtype = $_POST['applicationtype'];
    $applicationreason = $_POST['applicationreason'];
  




    $sql = " UPDATE `fmaccesscard` SET  `propertyname`='$propertyname',`applicationreason`='$applicationreason' , `applicationtype`='$applicationtype' WHERE `id`='$id_incoming' ";

    //  ,'$applicationtype','$alterationduration','$alterationpurpose','$description')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con); exit;
    }
    mysqli_close($con);

    unset($_SESSION['fmaccesscard']);

    header('location:update.php');
}

if (isset($_POST['update5'])) {

    $propertyname = $_POST['propertyname'];
    $applicationtype = $_POST['applicationtype'];
    $firstname = $_POST['tenantfirstname'];
    $lastname = $_POST['tenantlastname'];
    $emailid = $_POST['tenantemailid'];
    $ejarinumber = $_POST['tenantejarinumber'];
    $ejarissuedate = $_POST['tenantejariissuedate'];    
    $ejariexpirydate = $_POST['tenantejariexpirydate'];
    $contractamount = $_POST['contractamount'];





  




    $sql = " UPDATE `tenantregistration` SET  `propertyname`='$propertyname',`tenantfirstname`='$firstname' ,`tenantlastname`='$lastname' , `tenantemailid`='$emailid' , `tenantejarinumber`='$ejarinumber' , `tenantejariissuedate`='$ejarissuedate',`contractamount`='$contractamount',`applicationtype`='$applicationtype' WHERE `id`='$id_incoming' ";

    //  ,'$applicationtype','$alterationduration','$alterationpurpose','$description')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con); exit;
    }
    mysqli_close($con);

    unset($_SESSION['fmaccesscard']);

    header('location:update.php');
}

if (isset($_POST['update6'])) {

    $propertyname = $_POST['propertyname'];
    $applicationtype = $_POST['applicationtype'];
    $description = $_POST['description'];
    $dateandtime = $_POST['dateandtime'];
    $purpose = $_POST['purpose'];
  




    $sql = " UPDATE `fmmaintenancerequest` SET  `propertyname`='$propertyname',`description`='$description' , `dateandtime` = '$dateandtime',`purpose`='$purpose',`applicationtype`='$applicationtype' WHERE `id`='$id_incoming' ";

    //  ,'$applicationtype','$alterationduration','$alterationpurpose','$description')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con); exit;
    }
    mysqli_close($con);

    unset($_SESSION['fmmaintenancerequest']);

    header('location:update.php');
}



if (isset($_POST['update7'])) {

    $propertyname = $_POST['propertyname'];
    $applicationtype = $_POST['applicationtype'];
    $description = $_POST['desctription'];
    $subject = $_POST['subject'];
  




    $sql = " UPDATE `generalenquiry` SET  `propertyname`='$propertyname',`desctription`='$description' , `subject` = '$subject',`applicationtype`='$applicationtype' WHERE `id`='$id_incoming' ";

    //  ,'$applicationtype','$alterationduration','$alterationpurpose','$description')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con); exit;
    }
    mysqli_close($con);

    unset($_SESSION['generalenquiry']);

    header('location:update.php');
}


if (isset($_POST['update8'])) {

    $propertyname = $_POST['propertyname'];
    $applicationtype = $_POST['applicationtype'];
    $mortgagestatus = $_POST['currentlymortgaged'];
    $sellingprice = $_POST['newsellingprice'];
    $buyertype = $_POST['buyertype'];
    $buyermortgagestatus = $_POST['buyermortgagestatus'];

  




    $sql = " UPDATE `nocforpostsell` SET  `propertyname`='$propertyname',`currentlymortgaged`='$mortgagestatus' , `newsellingprice` = '$sellingprice',`buyertype`='$buyertype',`buyermortgagestatus`='$buyermortgagestatus' WHERE `id`='$id_incoming' ";

    //  ,'$applicationtype','$alterationduration','$alterationpurpose','$description')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con); exit;
    }
    mysqli_close($con);

    unset($_SESSION['nocforpostsell']);

    header('location:update.php');
}

if (isset($_POST['update9'])) {

    $propertyname = $_POST['propertyname'];
    $applicationtype = $_POST['applicationtype'];
    $mortgagestatus = $_POST['mortgagestatus'];
    $sellingprice = $_POST['newsellingprice'];
    $buyertype = $_POST['buyertype'];
    $buyermortgagestatus = $_POST['buyermortgagerequired'];

  




    $sql = " UPDATE `nocforpresell` SET  `propertyname`='$propertyname',`mortgagestatus`='$mortgagestatus' , `newsellingprice` = '$sellingprice',`buyertype`='$buyertype',`buyermortgagerequired`='$buyermortgagestatus' WHERE `id`='$id_incoming' ";

    //  ,'$applicationtype','$alterationduration','$alterationpurpose','$description')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con); exit;
    }
    mysqli_close($con);

    unset($_SESSION['nocforpresell']);

    header('location:update.php');
}

if (isset($_POST['update10'])) {

    $propertyname = $_POST['propertyname'];
    $moveindate = $_POST['moveindate'];
    $occupants = $_POST['occupants'];
    $householdhelper = $_POST['householdhelper'];
    $accesscard1 = $_POST['accesscard1'];
    $accesscard2 = $_POST['accesscard2'];
    $accesscard3 = $_POST['accesscard3'];
    $accesscard4 = $_POST['accesscard4'];
    $parkingcard1 = $_POST['parkingcard1'];
    $parkingcard2 = $_POST['parkingcard2'];
    $parkingcard3 = $_POST['parkingcard3'];
    $parkingcard4 = $_POST['parkingcard4'];
    $vehicleplatenumber1 = $_POST['vehicleplatenumber1'];
    $vehicleplatenumber2 = $_POST['vehicleplatenumber2'];
    $vehicleplatenumber3 = $_POST['vehicleplatenumber3'];
    $vehicleplatenumber4 = $_POST['vehicleplatenumber4'];
    $applicationtype = $_POST['applicationtype'];

  




    $sql = " UPDATE `ownermoveinrequest` SET  `propertyname`='$propertyname',`moveindate`='$moveindate' , `occupants` = '$occupants',`accesscard1`='$accesscard1',`accesscard2`='$accesscard2',`accesscard3`='$accesscard3',`accesscard4`='$accesscard4',`parkingcard1`='$parkingcard1',`parkingcard2`='$parkingcard2',`parkingcard3`='$parkingcard3',`parkingcard4`='$parkingcard4',`vehicleplatenumber1`='$vehicleplatenumber1',`vehicleplatenumber2`='$vehicleplatenumber2',`vehicleplatenumber3`='$vehicleplatenumber3',`vehicleplatenumber4`='$vehicleplatenumber4',`applicationtype`='$applicationtype' WHERE `id`='$id_incoming' ";

    //  ,'$applicationtype','$alterationduration','$alterationpurpose','$description')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con); exit;
    }
    mysqli_close($con);

    unset($_SESSION['ownermoveinrequest']);

    header('location:update.php');
}

if (isset($_POST['update11'])) {

    $propertyname = $_POST['propertyname'];
    $applicationtype = $_POST['applicationtype'];
    $moveoutdate = $_POST['moveoutdate'];
    $moveoutcompany = $_POST['moveoutcompany'];
    $moveoutcompanycontact = $_POST['moveoutcompanycontact'];

  




    $sql = " UPDATE `ownermoveoutrequest` SET  `propertyname`='$propertyname',`applicationtype`='$applicationtype' , `moveoutdate` = '$moveoutdate',`moveoutcompany`='$moveoutcompany',`moveoutcompanycontact`='$moveoutcompanycontact' WHERE `id`='$id_incoming' ";

    //  ,'$applicationtype','$alterationduration','$alterationpurpose','$description')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con); exit;
    }
    mysqli_close($con);

    unset($_SESSION['ownermoveoutrequest']);

    header('location:update.php');
} 

if (isset($_POST['update12'])) {

    $propertyname = $_POST['propertyname'];
    $applicationtype = $_POST['applicationtype'];
    $residentpass = $_POST['residentpass'];
  


    $sql = " UPDATE `residentpass` SET  `propertyname`='$propertyname',`applicationtype`='$applicationtype' ,`residentpass`='$residentpass' WHERE `id`='$id_incoming' ";

    //  ,'$applicationtype','$alterationduration','$alterationpurpose','$description')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con); exit;
    }
    mysqli_close($con);

    unset($_SESSION['residentpass']);

    header('location:update.php');
}


if (isset($_POST['update13'])) {

    $propertyname = $_POST['propertyname'];
    $applicationtype = $_POST['applicationtype'];
    $shuttlebuscard = $_POST['shuttlebuscard'];
  


    $sql = " UPDATE `shuttlebuscard` SET  `propertyname`='$propertyname',`applicationtype`='$applicationtype' ,`shuttlebuscard`='$shuttlebuscard' WHERE `id`='$id_incoming' ";

    //  ,'$applicationtype','$alterationduration','$alterationpurpose','$description')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con); exit;
    }
    mysqli_close($con);

    unset($_SESSION['shuttlebuscard']);

    header('location:update.php');
}


if (isset($_POST['update14'])) {

    $propertyname = $_POST['propertyname'];
    $applicationtype = $_POST['applicationtype'];
    $description = $_POST['description'];
    $subject = $_POST['subject'];
    
  


    $sql = " UPDATE `fmgenericissue` SET  `propertyname`='$propertyname',`applicationtype`='$applicationtype' ,`description`='$description',`subject`='$subject' WHERE `id`='$id_incoming' ";

    //  ,'$applicationtype','$alterationduration','$alterationpurpose','$description')";



    if (mysqli_query($con, $sql)) {


        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con); exit;
    }
    mysqli_close($con);

    unset($_SESSION['fmgenericissue']);

    header('location:update.php');
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
                            <li class=""><a href="appointments.php"><i aria-hidden="true" class="fa fa-calendar"></i> Appointments </a></li>
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


    <?php if ($mod == 'alteration') {


        $details = mysqli_query($con, "SELECT * FROM alterationrequest WHERE `id`='$id_incoming' ");
        $details_row = mysqli_fetch_assoc($details);

    ?>
        <div class="new-container">
            <div class="boxed">
                <div id="content-container">
                    <div class="pageheader">
                        <h3>
                            <i class="fa fa-home"></i>
                            Update Page
                        </h3>
                    </div>
                    <div id="page-content">
                        <div class="row intro-block">
                            <div class="col-lg-12 col-md-6">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            Update </h3>
                                    </div>
                                    <div class="panel-body">
                                        <span>
                                            <div class="media">
                                                <div class="media-body">
                                                    <div id="update" class="tab-pane" role="tabpanel" aria-labelledby="update">
                                                        <div class="panel-body np">
                                                            <span>
                                                                <div action="#" class="form-horizontal form-bordered form-wizard clearfix" role="application">
                                                                    <div class="content clearfix">
                                                                        <p style="color:red;"></p>
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
                                                                                            <b>FM - Generic Issues</b>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <h3> Request Details</h3>



                                                                                <form method="POST">
                                                                                    <div class="form-group">
                                                                                        <label class="col-sm-2 control-label "> Application Type
                                                                                            <span class="red">*</span>
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <select class="form-control" alt="" id="applicationtype" maxlength="" name="applicationtype">
                                                                                                <option value="<?php echo $details_row['applicationtype']; ?>"><?php echo $details_row['applicationtype']; ?></option>
                                                                                                <option value="Home Improvement">Home Improvement</option>
                                                                                                <option value="Installation of Additional Storage Shelves">Installation of additional storage shelves</option>
                                                                                                <option value="Installation Of CCTV Cameras">Installation of cctv cameras</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <label class="col-sm-2 control-label "> Property Data
                                                                                            <span class="red">*</span>
                                                                                        </label>

                                                                                        <div class="col-sm-4">
                                                                                            <select class="form-control" alt="" id="<?php echo $details_row['propertyname']; ?>" maxlength="" name="propertyname">
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

                                                                                    </div>


                                                                                    <div class="form-group">
                                                                                        <label class="col-sm-2 control-label "> Description
                                                                                            <span class="red">*</span>
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" id="description" name="description" value="<?php echo $details_row['description']; ?>">
                                                                                            </input>
                                                                                        </div>

                                                                                        <label class="col-sm-2 control-label "> Alteration Purpose
                                                                                            <span class="red">*</span>
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <select class="form-control" alt="" id="alterationpurpose" maxlength="" name="alterationpurpose">
                                                                                                <option value="<?php echo $details_row['alterationpurpose']; ?>"><?php echo $details_row['alterationpurpose']; ?></option>
                                                                                            </select>
                                                                                        </div>


                                                                                        <label class="col-sm-2 control-label "> Alteration Duration
                                                                                            <span class="red">*</span>
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <select class="form-control" alt="" id="alterationduration" maxlength="" name="alterationduration">
                                                                                                <option value="<?php echo $details_row['alterationduration']; ?>"><?php echo $details_row['alterationduration']; ?></option>
                                                                                            </select>
                                                                                        </div>



                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="containertab1 .d-md-none .d-lg-block ">
                                                                                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>


                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </span>
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
    <?php } ?>


<?php include('updatemodule/customerup.php');    ?>


<?php include('updatemodule/makeapaymentup.php');    ?>

<?php include('updatemodule/nameamendmentup.php');    ?>

<?php include('updatemodule/accesscardup.php');    ?>

<?php include('updatemodule/tenantregup.php');    ?>

<?php include('updatemodule/maintenanceup.php');    ?>

<?php include('updatemodule/generalenquiryup.php');    ?>

<?php include('updatemodule/nocforpostsellup.php');    ?>

<?php include('updatemodule/nocforpresellup.php');    ?>

<?php include('updatemodule/moveinrequestup.php');    ?>

<?php include('updatemodule/moveoutrequestup.php');    ?>

<?php include('updatemodule/residentpassup.php');    ?>

<?php include('updatemodule/shuttlebuscardup.php');    ?>

<?php include('updatemodule/genericissueup.php');    ?>



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