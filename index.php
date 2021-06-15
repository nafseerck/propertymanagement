<?php
session_start();

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
if (isset($_SESSION['id'])) {
   $usID = $_SESSION['id'];
}
else {
  header("location: login.php");

}
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
  <form>






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
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
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
    </span>



    <div class="new-container">
      <div class="boxed">


        <div id="content-container">


          <div class="pageheader">
            <h3>
              <i class="fa fa-home"></i>
              Home
            </h3>

          </div>




          <div id="page-content">
            <div class="row intro-block">
              <div class="col-lg-9 col-md-8">
                <div class="panel">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                      Recent Happenings
                    </h3>
                  </div>
                  <div class="panel-body"><span">


                      <div class="media">
                        <div class="media-body">

                          <br />Your request with reference number 00295158 for Make a Payment is Cancelled.
                        </div>
                      </div>
                      <div class="media">
                        <div class="media-body">

                          <br />Your request with reference number 00295163 for Make a Payment is Closed.
                        </div>
                        <div class="media-right">
                          <div class="start-cont">
                            <select class="stars-new" Id="">
                              <option></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="media">
                        <div class="media-body">

                          <br />Thank you for submitting your Make a Payment request. Your reference number is 00295163. Your request now is Pending for Payment.
                        </div>
                      </div>
                      <div class="media">
                        <div class="media-body">

                          <br />Thank you for submitting your Make a Payment request. Your reference number is 00295158. Your request now is Pending for Payment.
                        </div>
                      </div>

                    </span>




                    <div class="pull-right"><br />For more details please
                      <a href="mynotifications.php" style="color:blue;text-decoration:underline"> Click Here </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-4">
                <div class="panel">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                      Quick Links
                    </h3>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="box-link">
                          <a href="updateprofile.php">
                            <i aria-hidden="true" class="fa fa-pencil-square-o"></i>
                            <span>Update Profile</span>
                          </a>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="box-link">
                          <a href="CustomerCareServices?eServiceId=a3Q360000002AZSEA2">
                            <i aria-hidden="true" class="fa fa-print"></i>
                            <span>Reprint SPA</span>
                          </a>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="box-link">
                          <a href="CustomerCareServices?eServiceId=a3Q36000000FQPeEAO">
                            <i aria-hidden="true" class="fa fa-credit-card"></i>
                            <span>Make a Payment</span>
                          </a>
                        </div>
                      </div>




                    </div>
                  </div>

                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-12">
                <div class="row clearfix" id="megaMenu">
                  <div class="col-xs-6 col-md-3">
                    <div class="box" onclick="window.open('')">
                      <a href="#">
                        <div class="clip-wrap">
                          <div class="div-coverTop">
                            <i class="icon-eligible-claims"></i>
                            <h3>6</h3>
                            <p>My Request</p>
                          </div>
                          <div class="sprite sprite-EligibleClaims"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class=" col-xs-6 col-md-3">
                    <div class="box" id="propertyBox" onclick="">
                      <a href="#">
                        <div class="clip-wrap">
                          <div class="div-coverTop">
                            <i class="icon-property-listing"></i>
                            <h3>1</h3>
                            <p>My Properties</p>
                          </div>
                          <div class="sprite sprite-Property"></div>
                        </div>
                      </a>
                    </div>

                  </div>
                  <div class="col-xs-6 col-md-3">
                    <div class="box" onclick="">
                      <a href="#">
                        <div class="clip-wrap">
                          <div class="div-coverTop">
                            <i class="icon-total-sales"></i>
                            <h3>1139.41 AED</h3>
                            <p>Upcoming payments</p>
                          </div>
                          <div class="sprite sprite-TotalSales"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-xs-6 col-md-3">
                    <div class="box" onclick="">
                      <a href="#">
                        <div class="clip-wrap">
                          <div class="div-coverTop">
                            <i class="icon-approved-claims"></i>
                            <h3>1</h3>
                            <p>Total Appointment</p>
                          </div>
                          <div class="sprite sprite-ApprovedClaims"></div>
                        </div>
                      </a>
                    </div>
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