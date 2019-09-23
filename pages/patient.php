<?php
require_once("php/loginDataFetching.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Kenway | Patient</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="../favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet"/>



    <!-- Doctor Css -->
    <link href="css/custom/doctor.css" rel="stylesheet">
    <link href="css/custom/patient.css" rel="stylesheet">

    <!-- Dashboard Css -->
    <link href="css/custom/dashboard.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Stalemate" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Coda" rel="stylesheet">

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet"/>

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet"/>


    <!-- JQuery DataTable Css -->
    <link href="./plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="./plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
          rel="stylesheet"/>

    <!-- Bootstrap DatePicker Css -->
    <link href="./plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet"/>

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet"/>

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <link href="css/theme.css" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="theme-teal">
<input id="logged-user-id" value="<?php echo $loginResponse[0]['id'] ?>" hidden>
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-teal">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
               data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="#"><img src="images/nav_logo.png" class="navbar-logo"></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <!-- #END# Call Search -->
                <!-- logout -->
                <li class="dropdown" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Logout">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" onclick="logOut();">
                        <i class="material-icons">input</i>
                    </a>
                </li>
                <!-- #END# logout -->
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info doctor-info">
            <div class="image">
                <img src="images/doctor_profile_img.png" data-toggle="tooltip" data-placement="right" title=""
                     data-original-title="View Profile" width="48" height="48" alt="User" onclick="viewProfile();"/>
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false"><?php echo $loginResponse[0]['fname'] . " " . $loginResponse[0]['sname'] ?></div>
                <div class="email"><?php echo $loginResponse[0]['email'] ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);" onclick="viewProfile()"><i class="material-icons">person</i>Profile</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="javascript:void(0);" onclick="logOut();"><i class="material-icons">input</i>Sign
                                Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active" id="home" onclick="viewHome('#home')">
                    <a href="#">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li id="schedule" onclick="viewSchedule('#schedule')">
                    <a href="#">
                        <i class="material-icons">schedule</i>
                        <span>View Doctor Schedule</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2019 <a href="#">Kenway Medicals (pvt) Ltd</a>.
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->

</section>

<section class="content" id="dashboard">
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body row large-header" id="large-header">
                        <canvas id="demo-canvas"></canvas>
                        <div style="z-index: 99999; position: relative;top:-95%;">
                            <div class="col-md-4 col-md-offset-1 text-center greeting-wrapper">
                                <img class="greeting-img" src="images/dashboard/greeting/morning.png">
                                <div class="greeting"></div>
                            </div>
                            <div class="col-md-6 col-md-offset-1">
                                <div class="welcome-wrapper text-center">
                                    <i class="material-icons welcome-icon">supervised_user_circle</i>
                                    <p class="welcome text-center">Welcome to <br><b class="name">Kenway Medicals</b></p>
                                    <p class="page text-center">Patient Page</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>

<section class="content" id="viewSchedule">
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="font-bold col-teal">
                            View Doctor Schedule
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="searchInput"><i class="material-icons">search</i></label>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="searchInput" class="form-control" onkeyup="search()" placeholder="Enter doctor name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover text-center" id="scheduleTable">
                                <thead class="col-teal">
                                <tr>
                                    <th class="text-center col-teal">Doctor</th>
                                    <th class="text-center col-teal">Start Date</th>
                                    <th class="text-center col-teal">Start Time</th>
                                    <th class="text-center col-teal">End Date</th>
                                    <th class="text-center col-teal">End Time</th>
                                    <th class="text-center col-teal">Status</th>
                                    <th class="text-center col-teal">Appointments<br>(Remaining)</span></th>
                                    <th class="text-center col-teal">Action</th>
                                </tr>
                                </thead>
                                <tfoot class="col-teal">
                                <tr>
                                    <th class="text-center col-teal">Doctor</th>
                                    <th class="text-center col-teal">Start Date</th>
                                    <th class="text-center col-teal">Start Time</th>
                                    <th class="text-center col-teal">End Date</th>
                                    <th class="text-center col-teal">End Time</th>
                                    <th class="text-center col-teal">Status</th>
                                    <th class="text-center col-teal">Appointments<br>(Remaining)</th>
                                    <th class="text-center col-teal">Action</th>
                                </tr>
                                </tfoot>
                                <tbody id="view-schedule-body">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>

<!-- Make payment modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-teal" style="padding: 15px;">
                <h2 class="modal-title text-center" id="patientDiagnosisModelLabel">Payment Process</h2>
            </div>
            <div class="modal-body" style="padding-bottom: 0;">
                <div class="body row table-responsive">
                    <div class="col-md-12">
                        <form class="form-horizontal">
                            <input type="hidden" id="schedule-id">
                            <div class="row clearfix m-b-10">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="app-no">Appointment Number</label>
                                </div>
                                <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="app-no" type="text"
                                                   class="form-control" disabled style="cursor: default;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix m-b-10">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="diagnosis-patient-age">Payment Value (USD)</label>
                                </div>
                                <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="app-payment" type="text" value="10"
                                                   class="form-control" disabled style="cursor: default;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        </form>
                    </div>
                </div>
            <div class="modal-footer m-t-15" style="padding-top: 0;">
                <div class="row">
                <div id="paypal-button" class="col-lg-4 col-lg-offset-5"></div>
                <button type="button" class="btn btn-sm bg-teal waves-effect col-lg-2" data-dismiss="modal" style="border-radius: 30px; margin-top: -3px">Close</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<section class="content" id="profile">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-3">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body col-teal">
                        <div class="image-area">
                            <img src="./images/doctor_profile_img.png" alt="AdminBSB - Profile Image"/>
                        </div>
                        <div class="content-area">
                            <h3><?php echo $loginResponse[0]['fname'] . " " . $loginResponse[0]['sname'] ?></h3>
                            <p><?php echo $loginResponse[0]['bloodType'] ?></p>
                            <p>Speciality: <?php echo $loginResponse[0]['weight'] ?></p>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <ul>
                            <li>
                                <span>Doctor Id</span>
                                <span><?php echo $loginResponse[0]['id'] ?></span>
                            </li>
                            <li>
                                <span>Patients</span>
                                <span>1.201</span>
                            </li>
                        </ul>
                        <button class="btn bg-teal btn-sm waves-effect btn-block" onclick="editDetails()" value="Edit"
                                id="editBtn">Edit
                        </button>
                        <button class="btn btn-danger btn-sm waves-effect btn-block"
                                onclick="deleteUser(<?php echo $loginResponse[0]['id'] ?>)">Delete
                        </button>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#profile_settings"
                                                                          aria-controls="settings" role="tab"
                                                                          data-toggle="tab">Profile Settings</a></li>
                                <li role="presentation"><a href="#change_password_settings" aria-controls="settings"
                                                           role="tab" data-toggle="tab">Change Password</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                    <form class="form-horizontal">

                                        <div class="form-group">
                                            <label for="profile-fname" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-5">
                                                <div class="form-line view-mode profile-line">
                                                    <input type="text" class="form-control details profile-control"
                                                           id="profile-fname"
                                                           placeholder="First name"
                                                           value="<?php echo $loginResponse[0]['fname'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-line view-mode profile-line">
                                                    <input type="text" class="form-control details profile-control"
                                                           id="profile-sname"
                                                           placeholder="Surname"
                                                           value="<?php echo $loginResponse[0]['sname'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="profile-street"
                                                   class="col-sm-2 control-label">Street/ZipCode</label>
                                            <div class="col-sm-7">
                                                <div class="form-line view-mode profile-line">
                                                    <input type="text" class="form-control details profile-control"
                                                           id="profile-street"
                                                           placeholder="Street"
                                                           value="<?php echo $loginResponse[0]['street'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-line view-mode profile-line">
                                                    <input type="text" class="form-control details profile-control"
                                                           id="profile-zipcode"
                                                           placeholder="ZipCode"
                                                           value="<?php echo $loginResponse[0]['zipCode'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="profile-city"
                                                   class="col-sm-2 control-label">City/Country</label>
                                            <div class="col-sm-5">
                                                <div class="form-line view-mode profile-line">
                                                    <input type="text" class="form-control details profile-control"
                                                           id="profile-city"
                                                           placeholder="City"
                                                           value="<?php echo $loginResponse[0]['city'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-line view-mode profile-line">
                                                    <input type="text" class="form-control details profile-control"
                                                           id="profile-country"
                                                           placeholder="Country"
                                                           value="<?php echo $loginResponse[0]['country'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="profile-telephone" class="col-sm-2 control-label">Mobile
                                                Number</label>
                                            <div class="col-sm-10">
                                                <div class="form-line view-mode profile-line">
                                                    <input type="tel" class="form-control details profile-control"
                                                           id="profile-telephone"
                                                           name="profile-telephone" placeholder="Telephone Number"
                                                           value="<?php echo $loginResponse[0]['telephone'] ?>"
                                                           disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="profile-email" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <div class="form-line view-mode">
                                                    <input type="email" class="form-control details "
                                                           id="profile-email"
                                                           name="profile-email" placeholder="Email"
                                                           value="<?php echo $loginResponse[0]['email'] ?>"
                                                           disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button class="btn bg-teal waves-effect" id="submitBtn"
                                                        onclick="updateUser()">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line" id="old-pass-error-line">
                                                    <input type="password" class="form-control" id="OldPassword"
                                                           name="OldPassword" placeholder="Old Password" oninput="oldPassVerify(this.value)" required>
                                                </div>
                                                <label id="old-pass-error" style="display: none;" class="error error-msg" for="OldPassword">Password mismatched!</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line" id="profile-pass-1">
                                                    <input type="password" class="form-control" id="profile-new-pass"
                                                           name="profile-new-pass" placeholder="New Password" required oninput="passwordCharVerify(this.value)">
                                                </div>
                                                <label id="profile-pass-1-error"  style="display: none;" class="error error-msg" for="profile-new-pass"></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password
                                                (Confirm)</label>
                                            <div class="col-sm-9">
                                                <div class="form-line" id="profile-pass-2">
                                                    <input type="password" class="form-control" id="profile-new-pass-cmf"
                                                           name="profile-new-pass-cmf"
                                                           placeholder="New Password (Confirm)" required oninput="cmfPassCmpare(this.value);">
                                                </div>
                                                <label id="profile-pass-2-error"  style="display: none;" class="error error-msg" for="profile-new-pass">Password mismatched with entered new password!</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <a class="btn bg-teal waves-effect" onclick="updatePassword()">Change Password
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Paypal Gateway -->
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="plugins/jquery-countto/jquery.countTo.js"></script>


<!-- Sparkline Chart Plugin Js -->
<script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="./plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="./plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="./plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="./plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="./plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="./plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="./plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="./plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="./plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="./js/pages/tables/jquery-datatable.js"></script>
<script src="./js/pages/examples/profile.js"></script>

<!-- Validation Plugin Js -->
<script src="./plugins/jquery-validation/jquery.validate.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Autosize Plugin Js -->
<script src="plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Bootstrap Datepicker Plugin Js -->
<script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script src="js/pages/ui/tooltips-popovers.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<!-- Doctor js -->
<script src="js/demo.js"></script>

<!-- Demo Js -->
<script src="js/custom/patient.js"></script>
<script src="js/custom/dashboard.js"></script>
<script src="js/pages/forms/basic-form-elements.js"></script>

</body>

</html>
