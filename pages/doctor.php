<?php
require_once("php/getPatientsWithApp.php");
require_once("php/loginDataFetching.php");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Kenway | Doctor</title>
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

    <!-- Dashboard Css -->
    <link href="css/custom/dashboard.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Stalemate" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Coda" rel="stylesheet">

    <!-- Doctor Css -->
    <link href="css/custom/doctor.css" rel="stylesheet">

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
                            <a href="javascript:void(0);" onclick="addSchedules('#schedule')">
                                <span>Add Schedules</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" onclick="viewSchedule('#schedule')">
                                <span>View Schedules</span>
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
                                    <p class="page text-center">Doctor Page</p>
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
                        <tr hidden>
                            <td>Patient id</td>
                            <td id="view-patient-id"></td>
                        </tr>
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
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer" style="padding-top: 0;">
                <button type="button" class="btn btn-success waves-effect" onclick="showDiagnosis();">Add diagnosis
                </button>
                <button type="button" class="btn btn-primary waves-effect"
                        onclick="showPreviousDiagnisis($('#view-patient-id').text())">Previous diagnosis
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Patiaent diagnosis model -->
<div class="modal fade" id="patientDiagnosisModel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-teal" style="padding: 15px;">
                <h2 class="modal-title text-center" id="patientDiagnosisModelLabel">Create Diagnosis Report</h2>
            </div>
            <div class="modal-body" style="padding-bottom: 0;">
                <div class="body row table-responsive">
                    <div class="col-md-12">
                        <form class="form-horizontal">
                            <input id="diagnosis-patient-id" type="text"
                                   disabled hidden>
                            <div class="row clearfix m-b-10">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="diagnosis-patient-name">Patient name</label>
                                </div>
                                <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="diagnosis-patient-name" type="text"
                                                   class="form-control" disabled style="cursor: default;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix m-b-10">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="diagnosis-patient-age">Patient b'day(age)</label>
                                </div>
                                <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="diagnosis-patient-age" type="text"
                                                   class="form-control" disabled style="cursor: default;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix m-b-10">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="diagnosis-patient-gender">Patient gender</label>
                                </div>
                                <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="diagnosis-patient-gender" type="text"
                                                   class="form-control" disabled style="cursor: default;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix m-b-30">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="diagnosis-patient-name">Diagnosis description</label>
                                </div>
                                <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line" id="patient-diagnosis-description-error-line">
                                            <textarea rows="8" placeholder="Type diagnosis here..." class="form-control"
                                                      id="patient-diagnosis-description" autofocus></textarea>
                                        </div>
                                        <label id="patient-diagnosis-description-error" class="error error-msg"
                                               style="display: none;" for="patient-diagnosis-description">This field is
                                            required.</label>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer" style="padding-top: 0;">
                <button type="button" class="btn btn-success waves-effect" onclick="addDiagnosis();">Save Diagnosis
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Previous diagnosis model -->
<div class="modal fade" id="previousDiagnosisModel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-teal" style="padding: 15px;">
                <h2 class="modal-title text-center" id="previousDiagnosisModelLabel">Previous Diagnosis Reports</h2>
            </div>
            <div class="modal-body" style="padding-bottom: 0;height: 75vh;overflow-y: scroll;">
                <div class="panel-group" id="pre-diagnosis-data" role="tablist" aria-multiselectable="true">

                </div>
            </div>

            <div class="modal-footer" style="padding-top: 0;">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
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
                            View Patients for schedules
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
                                    <!--<th>Email</th>
                                    <th>Address</th>-->
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
                                    <!--<th>Email</th>
                                    <th>Address</th>-->
                                </tr>
                                </tfoot>
                                <tbody id="viewPatients-table-body">
                                <?php
                                foreach ($dbResponse as $temp) {
                                    $temp_html = "<tr onclick='showPatient(" . $temp['id'] . ");'>" .
                                        "<td>" . $temp['fname'] . " " . $temp['sname'] . "</td>" .
                                        "<td>" . $temp['gender'] . "</td>" .
                                        "<td>" . $temp['bday'] . "</td>" .
                                        "<td>" . $temp['bloodType'] . "</td>" .
                                        "<td>" . $temp['weight'] . "</td>" .
                                        "<td>" . $temp['height'] . "</td>" .
                                        "<td>" . $temp['telephone'] . "</td>" .
                                        /*"<td>".$temp['email']."</td>".
                                        "<td>".$temp['street'].", ".$temp['city'].", ".$temp['country'].", ".$temp['zipCode'].".</td>".*/

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

<section class="content" id="addSchedules">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" style="min-height: 80vh;">
                    <div class="header">
                        <h2 class="font-bold col-teal">
                            Add Schedules
                        </h2>
                    </div>
                    <div class="body row">
                        <div class="col-md-10 col-md-offset-1">
                            <form class="form-horizontal">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="schedule_start_date">Start date</label>
                                    </div>
                                    <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input id="schedule_start_date" type="text"
                                                       class="datepicker form-control"
                                                       placeholder="Please choose start date...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="schedule_start_time">Start time</label>
                                    </div>
                                    <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="schedule_start_time"
                                                       class="timepicker form-control"
                                                       placeholder="Please choose start time...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="schedule_end_date">End date</label>
                                    </div>
                                    <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input id="schedule_end_date" type="text"
                                                       class="datepicker form-control"
                                                       placeholder="Please choose end date...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="schedule_end_time">End time</label>
                                    </div>
                                    <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="schedule_end_time"
                                                       class="timepicker form-control"
                                                       placeholder="Please choose end time...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="schedule_appointments">No. of Appointments</label>
                                    </div>
                                    <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input id="schedule_appointments" type="number"
                                                       class="form-control"
                                                       placeholder="Enter max appointments count">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="button" class="btn btn-lg bg-teal m-t-15 waves-effect"
                                                onclick="saveSchedule();">Add
                                            Schedule
                                        </button>
                                    </div>
                                    <label id="add-schedule-error"
                                           class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5 error error-msg text-danger"
                                           style="display: none;font-size: 12px;font-weight: normal;">Please fill all
                                        fields before submitting!</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                            <p><?php echo $loginResponse[0]['medLicenceNo'] ?></p>
                            <p>Speciality: <?php echo $loginResponse[0]['speciality'] ?></p>
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
<script src="js/custom/doctor.js"></script>
<script src="js/custom/dashboard.js"></script>
<script src="js/pages/forms/basic-form-elements.js"></script>

</body>

</html>
