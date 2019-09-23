<?php
require_once("php/getPatients.php");
require_once("php/getDoctors.php");
require_once("php/getStaff.php");
require_once("php/getDailyIncome.php");
require_once("php/loginDataFetching.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Kenway | Admin</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="../favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet"/>

    <!-- Dashboard Css -->
    <link href="css/custom/dashboard.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Stalemate" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Coda" rel="stylesheet">

    <!-- Doctor Css -->
    <link href="css/custom/doctor.css" rel="stylesheet">

    <!-- Staff Css -->
    <link href="css/custom/staff.css" rel="stylesheet">

    <!-- Admin Css -->
    <link href="css/custom/admin.css" rel="stylesheet">

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
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $loginResponse[0]['fname']." ".$loginResponse[0]['sname'] ?></div>
                <div class="email"><?php echo $loginResponse[0]['email'] ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);" onclick="viewProfile()"><i class="material-icons">person</i>Profile</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="javascript:void(0);" onclick="logOut()"><i class="material-icons">input</i>Sign Out</a></li>
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
                <li id="doctor">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">perm_identity</i>
                        <span>Doctors</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);" onclick="addDoctors('#doctor')">
                                <span>Add Doctors</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" onclick="viewDoctors('#doctor')">
                                <span>View Doctors</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li id="staff">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">perm_identity</i>
                        <span>Staff Members</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);" onclick="addStaff('#staff')">
                                <span>Add Staff Members</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" onclick="viewStaff('#staff')">
                                <span>View Staff Members</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li id="patient" onclick="viewPatient('#patient')">
                    <a href="#">
                        <i class="material-icons">accessible</i>
                        <span>View Patients</span>
                    </a>
                </li>
                <li id="schedule">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">schedule</i>
                        <span>Schedules & Appointments</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);" onclick="viewScheduleAdmin('#schedule')">
                                <span>View Schedules</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li id="payment">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">attach_money</i>
                        <span>Financial</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);" onclick="viewPayment('#payment')">
                                <span>View Daily income</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" onclick="viewReports('#payment')">
                                <span>Download Reports</span>
                            </a>
                        </li>
                    </ul>
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
                            <p class="page text-center">Admin Page</p>
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

<!-- Patient data model -->
<div class="modal fade" id="patientDataModel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-teal" style="padding: 15px;">
                <h2 class="modal-title text-center" id="patientDataModelLabel">Patient Details</h2>
            </div>
            <div class="modal-body" style="padding-bottom: 0;">
                <div class="body table-responsive">
                    <table class="table text-center">
                        <tbody>
                        <tr>
                            <td>Full name</td>
                            <td id="view-patient-name"></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td id="view-patient-gender"></td>
                        </tr>
                        <tr>
                            <td>Birthday(age)</td>
                            <td id="view-patient-bday"></td>
                        </tr>
                        <tr>
                            <td>Blood Group</td>
                            <td id="view-patient-bloodType"></td>
                        </tr>
                        <tr>
                            <td>Weight(kg)</td>
                            <td id="view-patient-weight"></td>
                        </tr>
                        <tr>
                            <td>Height(cm)</td>
                            <td id="view-patient-height"></td>
                        </tr>
                        <tr>
                            <td>NIC/Passport</td>
                            <td id="view-patient-nic"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="view-patient-email"></td>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <td id="view-patient-telephone"></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td id="view-patient-address"></td>
                        </tr>
                        <tr style="display: none;">
                            <td id="view-patient-id"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer" style="padding-top: 0;">
                <button type="button" class="btn btn-success waves-effect" onclick="editPatient($('#view-patient-id').text())">Edit</button>
                <button type="button" class="btn btn-danger waves-effect" onclick="deleteOther($('#view-patient-id').text(), 'patient')">Delete</button>
                <button type="button" class="btn bg-teal waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Patient details data model -->
<div class="modal fade" id="editPatientDetailsDataModel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-teal" style="padding: 15px;">
                <h2 class="modal-title text-center" id="editPatientDetailsDataModelLabel">Patient Details</h2>
            </div>
            <div class="modal-body" style="padding-bottom: 0;">

                <form class="form-horizontal">

                    <div class="form-group">
                        <label for="edit-patient-fname" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-4">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-patient-fname"
                                       placeholder="First name">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-patient-sname"
                                       placeholder="Surname">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit-patient-street" class="col-sm-3 control-label">Street/ZipCode</label>
                        <div class="col-sm-5">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-patient-street"
                                       placeholder="Street">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-patient-zipcode"
                                       placeholder="ZipCode">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit-patient-city" class="col-sm-3 control-label">City/Country</label>
                        <div class="col-sm-5">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-patient-city"
                                       placeholder="City">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-patient-country"
                                       placeholder="Country">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit-patient-height" class="col-sm-3 control-label">Height</label>
                        <div class="col-sm-9">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-patient-height"
                                       name="edit-patient-height" placeholder="Height (cm)">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit-patient-weight" class="col-sm-3 control-label">Weight</label>
                        <div class="col-sm-9">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-patient-weight"
                                       name="edit-patient-weight" placeholder="Weight (kg)">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit-patient-telephone" class="col-sm-3 control-label">Mobile Number</label>
                        <div class="col-sm-9">
                            <div class="form-line">
                                <input type="tel" class="form-control"
                                       id="edit-patient-telephone"
                                       name="edit-patient-telephone" placeholder="Telephone Number">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit-patient-email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <div class="form-line" id="email-error-line">
                                <input type="email" class="form-control details "
                                       id="edit-patient-email"
                                       name="edit-patient-email" placeholder="Email" oninput="emailVerify(this.value)">
                            </div>
                            <label id="email-error" style="display: none;" class="error error-msg" for="edit-patient-email">Email Already Exists!</label>
                        </div>
                    </div>

                    <input id="edit-patient-id" type="hidden">
                </form>
            </div>
            <div class="modal-footer" style="padding-top: 0; margin-top: 20px; margin-right: 40px;">
                <button type="button" class="btn btn-success waves-effect" onclick="updatePatient()">Update</button>
                <button type="button" class="btn bg-teal waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Doctor data model -->
<div class="modal fade" id="doctorDataModel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-teal" style="padding: 15px;">
                <h2 class="modal-title text-center" id="doctorDataModelLabel">Doctor Details</h2>
            </div>
            <div class="modal-body" style="padding-bottom: 0;">
                <div class="body table-responsive">
                    <table class="table text-center">
                        <tbody>
                        <tr>
                            <td>Full name</td>
                            <td id="view-doctor-name"></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td id="view-doctor-gender"></td>
                        </tr>
                        <tr>
                            <td>Birthday(age)</td>
                            <td id="view-doctor-bday"></td>
                        </tr>
                        <tr>
                            <td>Medical Licence NO</td>
                            <td id="view-doctor-medLicenceNo"></td>
                        </tr>
                        <tr>
                            <td>Speciality</td>
                            <td id="view-doctor-speciality"></td>
                        </tr>
                        <tr>
                            <td>NIC/Passport</td>
                            <td id="view-doctor-nic"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="view-doctor-email"></td>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <td id="view-doctor-telephone"></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td id="view-doctor-address"></td>
                        </tr>
                        <tr style="display: none;">
                            <td id="view-doctor-id"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer" style="padding-top: 0;">
                <button type="button" class="btn btn-success waves-effect" onclick="editDoctor($('#view-doctor-id').text())">Edit</button>
                <button type="button" class="btn btn-danger waves-effect" onclick="deleteOther($('#view-doctor-id').text(), 'doctor')">Delete</button>
                <button type="button" class="btn bg-teal waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Doctor details data model -->
<div class="modal fade" id="editDoctorDetailsDataModel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-teal" style="padding: 15px;">
                <h2 class="modal-title text-center" id="editDoctorDetailsDataModelLabel">Doctor Details</h2>
            </div>
            <div class="modal-body" style="padding-bottom: 0;">

                <form class="form-horizontal">

                    <div class="form-group">
                        <label for="edit-doctor-fname" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-4">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-doctor-fname"
                                       placeholder="First name">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-doctor-sname"
                                       placeholder="Surname">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit-doctor-street" class="col-sm-3 control-label">Street/ZipCode</label>
                        <div class="col-sm-5">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-doctor-street"
                                       placeholder="Street">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-doctor-zipcode"
                                       placeholder="ZipCode">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit-doctor-city" class="col-sm-3 control-label">City/Country</label>
                        <div class="col-sm-5">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-doctor-city"
                                       placeholder="City">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-doctor-country"
                                       placeholder="Country">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit-doctor-medLicenceNo" class="col-sm-3 control-label">Med. Licence No</label>
                        <div class="col-sm-9">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-doctor-medLicenceNo"
                                       name="edit-doctor-medLicenceNo" placeholder="Medical Licence No">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit-doctor-speciality" class="col-sm-3 control-label">Speciality</label>
                        <div class="col-sm-9">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-doctor-speciality"
                                       name="edit-doctor-speciality" placeholder="Speciality)">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit-doctor-telephone" class="col-sm-3 control-label">Mobile Number</label>
                        <div class="col-sm-9">
                            <div class="form-line">
                                <input type="tel" class="form-control"
                                       id="edit-doctor-telephone"
                                       name="edit-doctor-telephone" placeholder="Telephone Number">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit-doctor-email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <div class="form-line" id="doctor-email-error-line">
                                <input type="email" class="form-control details "
                                       id="edit-doctor-email"
                                       name="edit-doctor-email" placeholder="Email" oninput="doctorEmailVerify(this.value)">
                            </div>
                            <label id="doctor-email-error" style="display: none;" class="error error-msg" for="edit-doctor-email">Email Already Exists!</label>
                        </div>
                    </div>

                    <input id="edit-doctor-id" type="hidden">
                </form>
            </div>
            <div class="modal-footer" style="padding-top: 0; margin-top: 20px; margin-right: 40px;">
                <button type="button" class="btn btn-success waves-effect" onclick="updateDoctor()">Update</button>
                <button type="button" class="btn bg-teal waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<section class="content" id="viewPatients">
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="font-bold col-teal">
                            View Patient Details
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead class="col-teal">
                                <tr>
                                    <th>Full Name</th>
                                    <th>Gender</th>
                                    <th>B'day (m/d/y)</th>
                                    <th>Blood group</th>
                                    <th>Weight(kg)</th>
                                    <th>Height(cm)</th>
                                    <th>Telephone</th>
                                </tr>
                                </thead>
                                <tfoot class="col-teal">
                                <tr>
                                    <th>Full Name</th>
                                    <th>Gender</th>
                                    <th>B'day (m/d/y)</th>
                                    <th>Blood group</th>
                                    <th>Weight(kg)</th>
                                    <th>Height(cm)</th>
                                    <th>Telephone</th>
                                </tr>
                                </tfoot>
                                <tbody id="viewPatients-table-body">
                                <?php
                                foreach ($dbResponse as $temp) {
                                    $temp_html = "<tr onclick='showPatient(" . $temp['id'] . ");' id='patient-row-".$temp['id']."'>" .
                                        "<td>" . $temp['fname'] . " " . $temp['sname'] . "</td>" .
                                        "<td>" . $temp['gender'] . "</td>" .
                                        "<td>" . $temp['bday'] . "</td>" .
                                        "<td>" . $temp['bloodType'] . "</td>" .
                                        "<td>" . $temp['weight'] . "</td>" .
                                        "<td>" . $temp['height'] . "</td>" .
                                        "<td>" . $temp['telephone'] . "</td>" .
                                        "</tr>";
                                    echo $temp_html;
                                }
                                ?>
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

<section class="content" id="addDoctor">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="header">
                        <h2 class="font-bold col-teal">
                            Add Doctor
                        </h2>
                    </div>
                    <div class="body">
                        <div>
                            <div class="tab-content">
                                    <form class="form-horizontal">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                            <li id = "personal_tab_ind" role="presentation" class="active col-md-4 text-center" style="margin-bottom: 0;"><a href="#personal" data-toggle="tab">Personal</a></li>
                                            <li id = "contact_tab_ind" role="presentation" class="col-md-4 text-center"  style="margin-bottom: 0;"><a href="#contact" data-toggle="tab">Contact</a></li>
                                            <li id = "professional_tab_ind" role="presentation" class="col-md-4 text-center"  style="margin-bottom: 0;"><a href="#professional" data-toggle="tab">Professional</a></li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="personal">
                                                <div class="form-group">
                                                    <label for="firstName" class="col-sm-2 control-label">First Name</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-line" id="add-doctor-fname-line">
                                                            <input type="text" class="form-control"
                                                                   id="firstName"
                                                                   name="firstName" placeholder="First Name">
                                                        </div>
                                                        <label class="error" style='display:none;' id="add-doctor-fname-error">This field is required.</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lastName" class="col-sm-2 control-label">Last Name</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-line" id="add-doctor-lname-line">
                                                            <input type="text" class="form-control"
                                                                   id="lastName"
                                                                   name="lastName" placeholder="Last Name">
                                                        </div>
                                                        <label class="error" style='display:none;' style='display:none;' id="add-doctor-lname-error">This field is required.</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gender" class="col-sm-2 control-label">Gender</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-control">
                                                            <input name="gender" type="radio" id="male" class="radio-col-teal" value="Male" checked/>
                                                            <label for="male">Male</label>
                                                            <input name="gender" type="radio" id="female" class="radio-col-teal" value="Female"/>
                                                            <label for="female">Female</label>
                                                        </div>
                                                        <label class="error" style='display:none;'>This field is required.</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="bday" class="col-sm-2 control-label">Birth Day</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-line" id="add-doctor-bday-line">
                                                            <input id="bday"
                                                                   class="datepicker form-control"
                                                                   placeholder="Birth Day">
                                                        </div>
                                                        <label class="error" style='display:none;' id="add-doctor-bday-error">This field is required.</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nic" class="col-sm-2 control-label">NIC</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-line" id="add-doctor-nic-line">
                                                            <input type="text" class="form-control"
                                                                   id="nic"
                                                                   name="nic" placeholder="NIC">
                                                        </div>
                                                        <label class="error" style='display:none;' id="add-doctor-nic-error">This field is required.</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-6">
                                                        <a href="#contact" class="btn btn-success" data-toggle="tab" onclick="doctorTabShift('#contact')">Continue</a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="contact">
                                                <div class="form-group">
                                                    <label for="street" class="col-sm-2 control-label">Street</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-line" id="add-doctor-street-line">
                                                            <input type="text" class="form-control"
                                                                   id="street"
                                                                   name="street" placeholder="Street">
                                                        </div>
                                                        <label class="error" style='display:none;' id="add-doctor-street-error">This field is required.</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ZipCode" class="col-sm-2 control-label">Zip Code</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-line" id="add-doctor-zipcode-line">
                                                            <input type="text" class="form-control"
                                                                   id="ZipCode"
                                                                   name="zipCode" placeholder="Zip Code">
                                                        </div>
                                                        <label class="error" style='display:none;' id="add-doctor-zipcode-error">This field is required.</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="city" class="col-sm-2 control-label">City</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-line" id="add-doctor-city-line">
                                                            <input type="text" class="form-control"
                                                                   id="city"
                                                                   name="city" placeholder="City">
                                                        </div>
                                                        <label class="error" style='display:none;' id="add-doctor-city-error">This field is required.</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ZipCode" class="col-sm-2 control-label">Country</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-line" id="add-doctor-country-line">
                                                            <input type="text" class="form-control"
                                                                   id="country"
                                                                   name="country" placeholder="Country">
                                                        </div>
                                                        <label class="error" style='display:none;' id="add-doctor-country-error">This field is required.</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-line" id="add-doctor-email-line">
                                                            <input type="email" class="form-control"
                                                                   id="email"
                                                                   name="email" placeholder="Email" oninput="emailValidation(this.value)">
                                                        </div>
                                                        <label class="error" style='display:none;' id="add-doctor-email-error">This field is required.</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tele" class="col-sm-2 control-label">Mobile Number</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-line" id="add-doctor-tele-line">
                                                            <input type="tel" class="form-control"
                                                                   id="tele"
                                                                   name="tele" placeholder="Telephone Number">
                                                        </div>
                                                        <label class="error" style='display:none;' id="add-doctor-tele-error">This field is required.</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2">
                                                        <a href="#personal" class="btn bg-teal" data-toggle="tab" onclick="doctorTabShift('#personal')">Back</a>
                                                        <a href="#professional" class="btn bg-green" data-toggle="tab" onclick="doctorTabShift('#professional')">Continue</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="professional">
                                                <div class="form-group">
                                                    <label for="licence" class="col-sm-4 control-label">Medical Licence NO.</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-line" id="add-doctor-medLicenceNo-line">
                                                            <input type="text" class="form-control"
                                                                   id="licence"
                                                                   name="licence" placeholder="Medical Licence NO.">
                                                        </div>
                                                        <label class="error" style='display:none;' id="add-doctor-medLicenceNo-error">This field is required.</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="speciality" class="col-sm-4 control-label">Speciality</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-line" id="add-doctor-speciality-line">
                                                            <input type="text" class="form-control"
                                                                   id="speciality"
                                                                   name="speciality" placeholder="Speciality">
                                                        </div>
                                                        <label class="error" style='display:none;' id="add-doctor-speciality-error">This field is required.</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-4">
                                                        <a href="#contact" class="btn bg-teal" data-toggle="tab" onclick="doctorTabShift('#contact')">Back</a>
                                                        <a href="#" class="btn bg-green waves-effect" data-toggle="tab" onclick="confirmRegister()">Save</a>
                                                        <label class="error" style='display:none;' id="add-doctor-valid">Some field data are invalid. Please complete all fields before submit.</label>
                                                    </div>
                                                </div>
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
</section>

<section class="content" id="viewDoctors">
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="font-bold col-teal">
                            View Doctor Details
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead class="col-teal">
                                <tr>
                                    <th>Full Name</th>
                                    <th>Gender</th>
                                    <th>B'day (m/d/y)</th>
                                    <th>Email</th>
                                    <th>Medical Licence NO.</th>
                                    <th>Speciality</th>
                                    <th>Telephone</th>
                                </tr>
                                </thead>
                                <tfoot class="col-teal">
                                <tr>
                                    <th>Full Name</th>
                                    <th>Gender</th>
                                    <th>B'day (m/d/y)</th>
                                    <th>Email</th>
                                    <th>Medical Licence NO.</th>
                                    <th>Speciality</th>
                                    <th>Telephone</th>
                                </tr>
                                </tfoot>
                                <tbody id="viewPatients-table-body">
                                <?php
                                foreach ($allDoctors as $temp) {
                                    $temp_html = "<tr onclick='showDoctor(" . $temp['id'] . ");' . id='doctor-row-".$temp['id']."'>" .
                                        "<td>" . $temp['fname'] . " " . $temp['sname'] . "</td>" .
                                        "<td>" . $temp['gender'] . "</td>" .
                                        "<td>" . $temp['bday'] . "</td>" .
                                        "<td>" . $temp['email'] . "</td>" .
                                        "<td>" . $temp['medLicenceNo'] . "</td>" .
                                        "<td>" . $temp['speciality'] . "</td>" .
                                        "<td>" . $temp['telephone'] . "</td>" .

                                        "</tr>";
                                    echo $temp_html;
                                }
                                ?>
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

<section class="content" id="viewSchedule">

    <!-- schedules data model -->
    <div class="modal fade" id="viewScheduleModel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-teal" style="padding: 15px;">
                    <h2 class="modal-title text-center" id="viewSchedulesModelLabel">Appointments on this Schedule</h2>
                </div>
                <div class="modal-body" style="padding-bottom: 0;min-height: 70vh;">
                    <div class="body table-responsive">
                        <div class="panel-group" id="schedule-appointments" role="tablist" aria-multiselectable="true">

                        </div>
                    </div>
                </div>

                <div class="modal-footer" style="padding-top: 0;">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" style="min-height: 80vh;">
                    <div class="header">
                        <h2 class="font-bold col-teal">
                            View Schedules
                        </h2>
                    </div>
                    <div class="body row">
                        <div class="body table-responsive">
                            <table class="table table-hover text-center">
                                <thead class="text-center">
                                <tr>
                                    <th class="text-center col-teal">Doctor</th>
                                    <th class="text-center col-teal">Start Date</th>
                                    <th class="text-center col-teal">Start Time</th>
                                    <th class="text-center col-teal">End Date</th>
                                    <th class="text-center col-teal">End Time</th>
                                    <th class="text-center col-teal">Status</th>
                                    <th class="text-center col-teal">Appointments Allowed</span></th>
                                    <th class="text-center col-teal">Created Date | Time</th>
                                </tr>
                                </thead>
                                <tbody id="view-schedule-body">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content" id="addStaff">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="header">
                        <h2 class="font-bold col-teal">
                            Add Staff
                        </h2>
                    </div>
                    <div class="body">
                        <div>
                            <div class="tab-content">
                                <form class="form-horizontal">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                        <li id = "staff-personal_tab_ind" role="presentation" class="active col-md-6 text-center" style="margin-bottom: 0;"><a href="#staff-personal" data-toggle="tab">Personal</a></li>
                                        <li id = "staff-contact_tab_ind" role="presentation" class="col-md-6 text-center"  style="margin-bottom: 0;"><a href="#staff-contact" data-toggle="tab">Contact</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="staff-personal">
                                            <div class="form-group">
                                                <label for="firstName" class="col-sm-2 control-label">First Name</label>
                                                <div class="col-sm-8">
                                                    <div class="form-line" id="add-staff-fname-line">
                                                        <input type="text" class="form-control"
                                                               id="staff-firstName"
                                                               name="firstName" placeholder="First Name">
                                                    </div>
                                                    <label class="error" style='display:none;' id="add-staff-fname-error">This field is required.</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="lastName" class="col-sm-2 control-label">Last Name</label>
                                                <div class="col-sm-8">
                                                    <div class="form-line" id="add-staff-lname-line">
                                                        <input type="text" class="form-control"
                                                               id="staff-lastName"
                                                               name="lastName" placeholder="Last Name">
                                                    </div>
                                                    <label class="error" style='display:none;' style='display:none;' id="add-staff-lname-error">This field is required.</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="staff-gender" class="col-sm-2 control-label">Gender</label>
                                                <div class="col-sm-8">
                                                    <div class="form-control">
                                                        <input name="staff-gender" type="radio" id="staff-male" class="radio-col-teal" value="Male" checked/>
                                                        <label for="staff-male">Male</label>
                                                        <input name="staff-gender" type="radio" id="staff-female" class="radio-col-teal" value="Female"/>
                                                        <label for="staff-female">Female</label>
                                                    </div>
                                                    <label class="error" style='display:none;'>This field is required.</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="bday" class="col-sm-2 control-label">Birth Day</label>
                                                <div class="col-sm-8">
                                                    <div class="form-line" id="add-staff-bday-line">
                                                        <input id="staff-bday"
                                                               class="datepicker form-control"
                                                               placeholder="Birth Day">
                                                    </div>
                                                    <label class="error" style='display:none;' id="add-staff-bday-error">This field is required.</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nic" class="col-sm-2 control-label">NIC</label>
                                                <div class="col-sm-8">
                                                    <div class="form-line" id="add-staff-nic-line">
                                                        <input type="text" class="form-control"
                                                               id="staff-nic"
                                                               name="nic" placeholder="NIC">
                                                    </div>
                                                    <label class="error" style='display:none;' id="add-staff-nic-error">This field is required.</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-6">
                                                    <a href="#staff-contact" class="btn btn-success" data-toggle="tab" onclick="staffTabShift('#staff-contact')">Continue</a>
                                                </div>
                                            </div>

                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="staff-contact">
                                            <div class="form-group">
                                                <label for="street" class="col-sm-2 control-label">Street</label>
                                                <div class="col-sm-8">
                                                    <div class="form-line" id="add-staff-street-line">
                                                        <input type="text" class="form-control"
                                                               id="staff-street"
                                                               name="street" placeholder="Street">
                                                    </div>
                                                    <label class="error" style='display:none;' id="add-staff-street-error">This field is required.</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="ZipCode" class="col-sm-2 control-label">Zip Code</label>
                                                <div class="col-sm-8">
                                                    <div class="form-line" id="add-staff-zipcode-line">
                                                        <input type="text" class="form-control"
                                                               id="staff-ZipCode"
                                                               name="zipCode" placeholder="Zip Code">
                                                    </div>
                                                    <label class="error" style='display:none;' id="add-staff-zipcode-error">This field is required.</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="city" class="col-sm-2 control-label">City</label>
                                                <div class="col-sm-8">
                                                    <div class="form-line" id="add-staff-city-line">
                                                        <input type="text" class="form-control"
                                                               id="staff-city"
                                                               name="city" placeholder="City">
                                                    </div>
                                                    <label class="error" style='display:none;' id="add-staff-city-error">This field is required.</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="ZipCode" class="col-sm-2 control-label">Country</label>
                                                <div class="col-sm-8">
                                                    <div class="form-line" id="add-staff-country-line">
                                                        <input type="text" class="form-control"
                                                               id="staff-country"
                                                               name="country" placeholder="Country">
                                                    </div>
                                                    <label class="error" style='display:none;' id="add-staff-country-error">This field is required.</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-8">
                                                    <div class="form-line" id="add-staff-email-line">
                                                        <input type="email" class="form-control"
                                                               id="staff-email"
                                                               name="email" placeholder="Email" oninput="emailValidation(this.value)">
                                                    </div>
                                                    <label class="error" style='display:none;' id="add-staff-email-error">This field is required.</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tele" class="col-sm-2 control-label">Mobile Number</label>
                                                <div class="col-sm-8">
                                                    <div class="form-line" id="add-staff-tele-line">
                                                        <input type="tel" class="form-control"
                                                               id="staff-tele"
                                                               name="tele" placeholder="Telephone Number">
                                                    </div>
                                                    <label class="error" style='display:none;' id="add-staff-tele-error">This field is required.</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-4">
                                                    <a href="#staff-personal" class="btn bg-teal" data-toggle="tab" onclick="staffTabShift('#staff-personal')">Back</a>
                                                    <a href="#" class="btn bg-green waves-effect" data-toggle="tab" onclick="confirmRegisterStaff()">Save</a>
                                                    <label class="error" style='display:none;' id="add-staff-valid">Some field data are invalid. Please complete all fields before submit.</label>
                                                </div>
                                            </div>
                                        </div></div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Staff data model -->
<div class="modal fade" id="staffDataModel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-teal" style="padding: 15px;">
                <h2 class="modal-title text-center" id="staffDataModelLabel">Staff Member Details</h2>
            </div>
            <div class="modal-body" style="padding-bottom: 0;">
                <div class="body table-responsive">
                    <table class="table text-center">
                        <tbody>
                        <tr>
                            <td>Full name</td>
                            <td id="view-staff-name"></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td id="view-staff-gender"></td>
                        </tr>
                        <tr>
                            <td>Birthday(age)</td>
                            <td id="view-staff-bday"></td>
                        </tr>

                        <tr>
                            <td>NIC/Passport</td>
                            <td id="view-staff-nic"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="view-staff-email"></td>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <td id="view-staff-telephone"></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td id="view-staff-address"></td>
                        </tr>
                        <tr style="display: none;">
                            <td id="view-staff-id"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer" style="padding-top: 0;">
                <button type="button" class="btn btn-success waves-effect" onclick="editStaff($('#view-staff-id').text())">Edit</button>
                <button type="button" class="btn btn-danger waves-effect" onclick="deleteOther($('#view-staff-id').text(), 'staff')">Delete</button>
                <button type="button" class="btn bg-teal waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Staff details data model -->
<div class="modal fade" id="editStaffDetailsDataModel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-teal" style="padding: 15px;">
                <h2 class="modal-title text-center" id="editStaffDetailsDataModelLabel">Staff Details</h2>
            </div>
            <div class="modal-body" style="padding-bottom: 0;">

                <form class="form-horizontal">

                    <div class="form-group">
                        <label for="edit-staff-fname" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-4">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-staff-fname"
                                       placeholder="First name">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-staff-sname"
                                       placeholder="Surname">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit-staff-street" class="col-sm-3 control-label">Street/ZipCode</label>
                        <div class="col-sm-5">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-staff-street"
                                       placeholder="Street">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-staff-zipcode"
                                       placeholder="ZipCode">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit-staff-city" class="col-sm-3 control-label">City/Country</label>
                        <div class="col-sm-5">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-staff-city"
                                       placeholder="City">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                       id="edit-staff-country"
                                       placeholder="Country">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit-staff-telephone" class="col-sm-3 control-label">Mobile Number</label>
                        <div class="col-sm-9">
                            <div class="form-line">
                                <input type="tel" class="form-control"
                                       id="edit-staff-telephone"
                                       name="edit-staff-telephone" placeholder="Telephone Number">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit-staff-email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <div class="form-line" id="staff-email-error-line">
                                <input type="email" class="form-control details "
                                       id="edit-staff-email"
                                       name="edit-staff-email" placeholder="Email" oninput="staffEmailVerify(this.value)">
                            </div>
                            <label id="staff-email-error" style="display: none;" class="error error-msg" for="edit-staff-email">Email Already Exists!</label>
                        </div>
                    </div>

                    <input id="edit-staff-id" type="hidden">
                </form>
            </div>
            <div class="modal-footer" style="padding-top: 0; margin-top: 20px; margin-right: 40px;">
                <button type="button" class="btn btn-success waves-effect" onclick="updateStaff()">Update</button>
                <button type="button" class="btn bg-teal waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<section class="content" id="viewStaff">
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="font-bold col-teal">
                            View Staff Member Details
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead class="col-teal">
                                <tr>
                                    <th>Full Name</th>
                                    <th>Gender</th>
                                    <th>B'day (m/d/y)</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                </tr>
                                </thead>
                                <tfoot class="col-teal">
                                <tr>
                                    <th>Full Name</th>
                                    <th>Gender</th>
                                    <th>B'day (m/d/y)</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                foreach ($allStaff as $temp) {
                                    $temp_html = "<tr onclick='showStaff(" . $temp['id'] . ");' . id='staff-row-".$temp['id']."'>" .
                                        "<td>" . $temp['fname'] . " " . $temp['sname'] . "</td>" .
                                        "<td>" . $temp['gender'] . "</td>" .
                                        "<td>" . $temp['bday'] . "</td>" .
                                        "<td>" . $temp['email'] . "</td>" .
                                        "<td>" . $temp['telephone'] . "</td>" .
                                        "</tr>";
                                    echo $temp_html;
                                }
                                ?>
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

<section class="content" id="viewPayment">
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="font-bold col-teal">
                            View Income Details
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead class="col-teal">
                                <tr class="text-center">
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Total Income(USD)</th>
                                </tr>
                                </thead>
                                <tfoot class="col-teal text-center">
                                <tr>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Total Income (USD)</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                foreach ($paymentResponse as $temp) {
                                    $temp_html = "<tr>" .
                                        "<td class='text-center'>" . $temp['date']."</td>" .
                                        "<td class='text-center'>" . $temp['income'] . "</td>" .
                                        "</tr>";
                                    echo $temp_html;
                                }
                                ?>
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

<section class="content" id="viewReports">
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="font-bold col-teal">
                            Download Reports
                        </h2>
                    </div>
                    <div class="body" style="min-height: 70vh; padding-top: 10%;">
                        <div class="col-md-2">
                            <center><img src="images/pdf-icon.png" style="width: 100px;height: 100px;"></center>
                            <h6 class="text-center" style="margin-top: 0;">Daily Income Report (pdf)</h6>
                            <a href="reportsTemplates/dailyReport.html" target="_blank" class="btn btn-success waves-effect">Download As pdf</a>
                        </div>
                        <div class="col-md-2">
                            <center><img src="images/pdf-icon.png" style="width: 100px;height: 100px;"></center>
                            <h6 class="text-center" style="margin-top: 0;">Monthly Income Report (pdf)</h6>
                            <a href="reportsTemplates/dailyReport.html" target="_blank" class="btn btn-success waves-effect">Download As pdf</a>
                        </div>
                        <div class="col-md-2">
                            <center><img src="images/pdf-icon.png" style="width: 100px;height: 100px;"></center>
                            <h6 class="text-center" style="margin-top: 0;">Daily Income Report (pdf)</h6>
                            <a href="reportsTemplates/dailyReport.html" target="_blank" class="btn btn-success waves-effect">Download As pdf</a>
                        </div>
                        <div class="col-md-2">
                            <center><img src="images/pdf-icon.png" style="width: 100px;height: 100px;"></center>
                            <h6 class="text-center" style="margin-top: 0;">Daily Income Report (pdf)</h6>
                            <a href="reportsTemplates/dailyReport.html" target="_blank" class="btn btn-success waves-effect">Download As pdf</a>
                        </div>
                        <div class="col-md-2">
                            <center><img src="images/pdf-icon.png" style="width: 100px;height: 100px;"></center>
                            <h6 class="text-center" style="margin-top: 0;">Daily Income Report (pdf)</h6>
                            <a href="reportsTemplates/dailyReport.html" target="_blank" class="btn btn-success waves-effect">Download As pdf</a>
                        </div>
                        <div class="col-md-2">
                            <center><img src="images/pdf-icon.png" style="width: 100px;height: 100px;"></center>
                            <h6 class="text-center" style="margin-top: 0;">Daily Income Report (pdf)</h6>
                            <a href="reportsTemplates/dailyReport.html" target="_blank" class="btn btn-success waves-effect">Download As pdf</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>


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
                            <h3><?php echo $loginResponse[0]['fname']." ".$loginResponse[0]['sname'] ?></h3>
                            <p>Admin Member</p>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <ul>
                            <li>
                                <span>Admin Id</span>
                                <span><?php echo $loginResponse[0]['id'] ?></span>
                            </li>
                        </ul>
                        <button class="btn bg-teal btn-sm waves-effect btn-block" onclick="editDetails()" value="Edit"
                                id="editBtn">Edit
                        </button>
                        <button class="btn btn-danger btn-sm waves-effect btn-block" onclick="deleteUser(<?php echo $loginResponse[0]['id'] ?>)">Delete</button>
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
                                                           value="<?php echo $loginResponse[0]['fname']?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-line view-mode profile-line">
                                                    <input type="text" class="form-control details profile-control"
                                                           id="profile-sname"
                                                           placeholder="Surname"
                                                           value="<?php echo $loginResponse[0]['sname']?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="profile-street" class="col-sm-2 control-label">Street/ZipCode</label>
                                            <div class="col-sm-7">
                                                <div class="form-line view-mode profile-line">
                                                    <input type="text" class="form-control details profile-control"
                                                           id="profile-street"
                                                           placeholder="Street"
                                                           value="<?php echo $loginResponse[0]['street']?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-line view-mode profile-line">
                                                    <input type="text" class="form-control details profile-control"
                                                           id="profile-zipcode"
                                                           placeholder="ZipCode"
                                                           value="<?php echo $loginResponse[0]['zipCode']?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="profile-city" class="col-sm-2 control-label">City/Country</label>
                                            <div class="col-sm-5">
                                                <div class="form-line view-mode profile-line">
                                                    <input type="text" class="form-control details profile-control"
                                                           id="profile-city"
                                                           placeholder="City"
                                                           value="<?php echo $loginResponse[0]['city']?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-line view-mode profile-line">
                                                    <input type="text" class="form-control details profile-control"
                                                           id="profile-country"
                                                           placeholder="Country"
                                                           value="<?php echo $loginResponse[0]['country']?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="profile-telephone" class="col-sm-2 control-label">Mobile Number</label>
                                            <div class="col-sm-10">
                                                <div class="form-line view-mode profile-line">
                                                    <input type="tel" class="form-control details profile-control"
                                                           id="profile-telephone"
                                                           name="profile-telephone" placeholder="Telephone Number"
                                                           value="<?php echo $loginResponse[0]['telephone']?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="profile-email" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <div class="form-line view-mode">
                                                    <input type="email" class="form-control details "
                                                           id="profile-email"
                                                           name="profile-email" placeholder="Email" value="<?php echo $loginResponse[0]['email']?>"
                                                           disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button class="btn bg-teal waves-effect" id="submitBtn" onclick="updateUser()">
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

<!-- Doctor js -->
<script src="js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- Demo Js -->
<script src="js/custom/doctor.js"></script>
<script src="js/custom/staff.js"></script>
<script src="js/custom/admin.js"></script>
<script src="js/custom/dashboard.js"></script>
<script src="js/pages/forms/basic-form-elements.js"></script>

</body>

</html>
