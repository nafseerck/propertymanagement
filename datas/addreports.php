<?php
session_start();
include('../connection.php');



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



if (isset($_POST['submit'])) {
    // General Enquiry 


    $name = mysqli_real_escape_string($con, $_POST['name']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $propertyname = mysqli_real_escape_string($con, $_POST['propertyname']);
    $reference = mysqli_real_escape_string($con, $_POST['reference']);
    $issuedate = mysqli_real_escape_string($con, $_POST['dateandtime']);
    $outstandingamount = mysqli_real_escape_string($con, $_POST['outstandingamount']);
    $applicationtype = mysqli_real_escape_string($con, $_POST['applicationtype']);





    $sql = "INSERT INTO `reports`(`id`, `name`,`type`,`propertyname`,`reference`,`dateandtime`,`outstandingamount`,`applicationtype`,`created_by`) VALUES ('','$name','$type','$propertyname','$reference','$issuedate','$outstandingamount','$applicationtype','$usID')";



    if (mysqli_query($con, $sql)) {
        $query_id = mysqli_insert_id($con);
        if ($query_id != '') {
            echo '<script>alert("Thank you for adding the Report. Your Report has been successfully Added")</script>';
        }

        echo "Entries are added";
    } else {
        echo "Error : Something unexpected Happened " . mysqli_error($con);
    }
    mysqli_close($con);
    header('location:../index.php');

}





// General Enquiry 



?>



<!DOCTYPE HTML>

<head>



    <meta charset="utf-8" />
    <title>PROPERTY MANAGEMENT | INDUS REAL ESTATE LLC</title>

    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="../assets/js/fa.js"></script>
    <!-- <link href="style.css" rel="stylesheet" /> -->
    <link href="../assets/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">



    <link href="../assets/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/bootstrapdatetimepicker.css" rel="stylesheet" />
    <link href="../assets/css/style1.css" rel="stylesheet" />
    <link href="../assets/css/newstyle.css" rel="stylesheet" />
    <link href="../assets/css/newstyle1.css" rel="stylesheet" />


    <script src="../assets/js/fbox.js"></script>
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
            height: 400px;
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
    </style>
    </span>

</head>

<body>
    <!-- <form> -->



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
                                            <li><a href="change-customer-information.php"> Change Customer Information </a></li>
                                            <li><a href="general-enquiry.php"> General Inquiry </a></li>
                                            <li><a href="make-a-payment.php"> Make a Payment </a></li>
                                            <li><a href="name-amendment.php"> Name amendment / Reprint SPA / Lost SPA </a></li>
                                            <li><a href="noc-for-mortgage.php"> NOC for Mortgage </a></li>
                                            <li><a href="noc-for-sell-post-handover.php"> NOC for Sell - Post Handover </a></li>
                                            <li><a href="noc-for-sell-pre-handover.php"> NOC for Sell - Pre Handover </a></li>
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
                                    <h3 class="panel-title">Add A Report</h3>
                                </div>
                                <div class="panel-body np">
                                    <span>
                                        <div id="">
                                            <ul class="nav">

                                            </ul>
                                            <div class="tab-content">

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
                                                                                    <b>Add Reports</b>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <h3> </h3>
                                                                        <form method="POST">
                                                                            <div>
                                                                                <div class="form-group">

                                                                                    <label class="col-sm-2 control-label "> Name
                                                                                        <span class="red">*</span>
                                                                                    </label>
                                                                                    <div class="col-sm-4">
                                                                                        <input class="form-control" type="text" name="name" id="name">
                                                                                        </input>
                                                                                    </div>

                                                                                    <label class="col-sm-2 control-label "> Type
                                                                                        <span class="red">*</span>
                                                                                    </label>
                                                                                    <div class="col-sm-4">
                                                                                        <select class="form-control" alt="" id="type" maxlength="" name="type">
                                                                                            <option value="Invoice">Invoice</option>

                                                                                        </select>
                                                                                    </div>


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

                                                                                    <label class="col-sm-2 control-label "> Description
                                                                                        <span class="red">*</span>
                                                                                    </label>
                                                                                    <div class="col-sm-4">
                                                                                        <input class="form-control" type="text" name="reference" id="reference">
                                                                                        </input>
                                                                                    </div>

                                                                                    <label class="col-sm-2 control-label "> Issue Date
                                                                                            <span class="red">*</span>
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" type="datetime-local" name="dateandtime" id="dateandtime">
                                                                                            </input>
                                                                                        </div>

                                                                                    <label class="col-sm-2 control-label"> Outstanding Amount
                                                                                        <span class="red">*</span>
                                                                                    </label>
                                                                                    <div class="col-sm-4">
                                                                                        <input class="form-control" type="text" name="outstandingamount" id="outstandingamount">
                                                                                        </input>
                                                                                    </div>

                                                                                    <label class="col-sm-2 control-label "> Application Type
                                                                                        <span class="red">*</span>
                                                                                    </label>
                                                                                    <div class="col-sm-4">
                                                                                        <select class="form-control" alt="" id="applicationtype" maxlength="" name="applicationtype">
                                                                                            <option value="Service Fees">Service Fees</option>

                                                                                        </select>
                                                                                    </div>


                                                                                </div>
                                                                                <button type="sumbit" name="submit" class="btn btn-primary" style="margin-top: 15px;margin-bottom: 18px;text-align: right">Submit</button>
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


        <?php include('../lib/header.php'); ?>
        <script src="js/" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                $('#smartwizard').smartWizard();

            });
        </script>


</body>



</html>