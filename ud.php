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

$usID='';
if (isset($_SESSION['id'])) {
   $usID = $_SESSION['id'];
}



if (isset($_POST['save'])) {
    // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploaded_files/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx', 'jpg'])) {
        echo "You file extension must be .jpg, .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO `files` (`id`,`name`, `size`, `created_by`,`downloads`) VALUES ('','$filename', '$size','$usID', 0)";
            if (mysqli_query($con, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}

// if (isset($_POST["submit"])) {

//     $query_id = '';

//     #retrieve file title
//     $title = $_POST["title"];

//     #file name with a random number so that similar dont get replaced
//     $pname = rand(1000, 10000) . "-" . $_FILES["file"]["name"];

//     #temporary file name to store file
//     $tname = $_FILES["file"]["tmp_name"];

//     #upload directory path
//     $uploads_dir = 'uploaded_files';
//     #TO move the uploaded file to specific location
//     move_uploaded_file($tname, $uploads_dir . '/' . $pname);

//     #sql query to insert into database
//     $sql = "INSERT into `fileup`(`id`,`title`,`image`) VALUES('','$title','$pname')";

//     if (mysqli_query($con, $sql)) {
//         $query_id = mysqli_insert_id($con);
//         if ($query_id != '') {
//             header("location:ud.php");
//         }
//         echo "Entries are added";
//     } else {
//         echo "Error : Something unexpected Happened " . mysqli_error($con);
//     }
// }
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
    <div class="new-container">
        <header id="navbar">
            <div class="boxed" id="navbar-container">
                <div class=" clearfix ">
                    <a class="navbar-brand site-logo" href="index.php">
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
                            <span class="icon-bar"></span>
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

    </span>


    <div class="new-container">
        <div class="boxed">
            <div id="content-container">
                <div class="pageheader">
                    <h3>
                        <i class="fa fa-file-text-o"></i>
                        MyDocuments
                    </h3>
                </div>




                <div id="page-content">
                    <div class="row intro-block">
                        <div class="col-lg-12 col-md-4 col-sm-4">
                            <div class="panel" style="height: auto;">
                                <div class="panel-heading">

                                    <h3 class="panel-title">
                                        Documents
                                    </h3>
                                </div>
                                <?php

                                $sql = "SELECT * FROM files WHERE `created_by`='$usID'";
                                $result = mysqli_query($con, $sql);

                                $files = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                // $sql = "SELECT * FROM files";
                                // $result = mysqli_query($con, $sql);

                                // $files = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                // // $result = mysqli_query($con, "SELECT * FROM fileup");

                                // while ($queryToWhile_f[] = mysqli_fetch_array($result)) {
                                // }



                                ?>

                                <div class="panel-body">
                                    <table class="table">
                                        <thead class="thead-dark">

                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">File Name</th>
                                                <th scope="col">File Size</th>
                                                <th scope="col">File Downloads</th>
                                                <th scope="col">Actions</th>




                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($files as $file) : ?>
                                                <tr>
                                                    <td><?php echo $file['id']; ?></td>
                                                    <td><?php echo $file['name']; ?></td>
                                                    <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
                                                    <td><?php echo $file['downloads']; ?></td>
                                                    <td><a href="uploaded_files/<?php echo $file['name'] ?>">Download</a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>

                                        <div class="row">
                                            <div>
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <h3>Upload File</h3>
                                                        <!-- <label class="col-sm-2 control-label "> Title
                                                            <span class="red">*</span>
                                                        </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" name="title" id="title" class="form-control">

                                                        </div> -->
                                                        <label class="col-sm-2 control-label "> File Upload
                                                            <span class="red">*</span>
                                                        </label>
                                                        <div class="col-sm-4">
                                                            <input type="file" name="myfile" id="myfile" class="form-control">
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary" name="save" style="margin-top: 15px;">Upload</button>
                                                </form>
                                            </div>
                                        </div>
                                    </table>


                                    <div class="row">
                                        <div class="col-lg-6">
                                            Showing 1 to 9 of 9 Entries
                                        </div>
                                        <div class="col-lg-6" style="text-align: right;">
                                            <nav aria-label="...">
                                                <ul class="pagination">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item active">
                                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">Next</a>
                                                    </li>
                                                </ul>
                                            </nav>
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
        </button>
        <span>
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