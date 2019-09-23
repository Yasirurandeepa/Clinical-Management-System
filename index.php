<?php
require_once("php/common/getDoctors.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Kenway Medicals</title>
    <link rel="shortcut icon" href="favicon.ico">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons
    <link href="img/favicon.png" rel="icon">-->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
          rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css"/>

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">

</head>

<body id="body">

<!--==========================
  Top Bar
============================-->
<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
        <div class="contact-info float-left">
            <i class="fa fa-envelope-o"></i> <a href="mailto:contact@kenwaymedicals.com">contact@kenwaymedicals.com</a>
            <i class="fa fa-phone"></i> +94 112 55 55 55
        </div>

        <div class="social-links float-right">
            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
            <a href="#" data-toggle="modal" data-target="#register-model">Register</a>
            <a href="#" data-toggle="modal" data-target="#login-model">Login</a>
        </div>
    </div>
</section>
<!--Register modal-->
<div class="modal fade" id="register-model" tabindex="-1" role="dialog" aria-labelledby="register-model-label"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content reg-modal">
            <div class="modal-header text-center modal-header-type-1">
                <h5 class="modal-title white-text" id="">Kenway Medicals | Register</h5>
                <button type="button" class="close hover-white-text" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pl-5 pr-5" style="min-height: 575px;">
                <form>

                    <nav>
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active col-md-4 text-center" id="personal" data-toggle="tab"
                               href="#personal-tab" role="tab" aria-controls="personal"
                               aria-selected="true">Personal</a>
                            <a class="nav-item nav-link col-md-4 text-center" id="medical" data-toggle="tab"
                               href="#medical-tab" role="tab" aria-controls="medical" aria-selected="false">Medical</a>
                            <a class="nav-item nav-link col-md-4 text-center" id="security" data-toggle="tab"
                               href="#security-tab" role="tab" aria-controls="security"
                               aria-selected="false">Security</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <!--Personal tab-->
                        <div class="tab-pane fade show active" id="personal-tab" role="tabpanel"
                             aria-labelledby="personal">
                            <div class="row">
                                <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                      <span class="input-group-text bg-color-type-1 border-type-1" id="fname"><i
                                  class="fa fa-user-circle-o" aria-hidden="true"></i>
                      </span>
                                    </div>
                                    <input type="text" class="form-control input-type-1" placeholder="First name"
                                           id="fname-input" oninput="removeError('#fname');"
                                           aria-label="First name" aria-describedby="fname" autofocus>
                                    <p class="error text-danger invalid-feedback text-right" id="fname-input-error"></p>
                                    <br>

                                </div>

                                <div class="input-group mb-3 col-md-6">
                                    <input type="text" class="form-control input-type-1" placeholder="Surname"
                                           id="sname-input" oninput="removeError('#sname');"
                                           aria-label="Surname" aria-describedby="sname" autofocus>
                                    <p class="error text-danger invalid-feedback text-right" id="sname-input-error"></p>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                      <span class="input-group-text bg-color-type-1 border-type-1" id="gender"><i
                                  class="fa fa-user-circle-o" aria-hidden="true"></i>
                      </span>
                                </div>
                                <div class="radio-group">
                                    <input type="radio" id="male" name="gender" value="Male" checked>
                                    <label for="male">Male</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio" id="female" value="Female" name="gender">
                                    <label for="female">Female</label>
                                </div>

                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                      <span class="input-group-text bg-color-type-1 border-type-1" id="bday"><i
                                  class="fa fa-user-circle-o" aria-hidden="true"></i>
                      </span>
                                </div>
                                <input class="form-control input-type-1" aria-describedby="bday" onchange="removeErrorInput('#birthday-input-error');"
                                       placeholder="Birthday (mm/dd/yyyy)" id="birthday" width="86%"/>
                                <p class="error text-danger invalid-feedback text-right" id="birthday-input-error"></p>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text bg-color-type-1 border-type-1" id="nic"><i
                                        class="fa fa-user-circle-o" aria-hidden="true"></i>
                            </span>
                                </div>
                                <input type="tel" class="form-control input-type-1" id="nic-input"
                                       placeholder="NIC/Passport" oninput="removeError('#nic');" aria-label="NIC" aria-describedby="nic-area">
                                <p class="error text-danger invalid-feedback text-right" id="nic-input-error"></p>
                            </div>

                            <div class="row">
                                <div class="input-group mb-3 col-md-8" style="padding-right: 0;">
                                    <div class="input-group-prepend">
                              <span class="input-group-text bg-color-type-1 border-type-1" id="street-address"><i
                                          class="fa fa-home" aria-hidden="true"></i>
                              </span>
                                    </div>
                                    <input type="text" class="form-control input-type-1" id="street-address-input"
                                           placeholder="Street Address" oninput="removeError('#street-address');"
                                           aria-label="Address" aria-describedby="address">
                                    <p class="error text-danger invalid-feedback text-right" id="street-address-input-error"></p>
                                </div>
                                <div class="input-group mb-3 col-md-4">
                                    <input type="text" class="form-control input-type-1 ml-0" id="zipcode-input"
                                           placeholder="Zip Code" oninput="removeError('#zipcode');"
                                           aria-label="Address" aria-describedby="address">
                                    <p class="error text-danger invalid-feedback text-right" id="zipcode-input-error"></p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="input-group mb-3 col-md-6" style="padding-right: 0;">
                                    <div class="input-group-prepend">
                              <span class="input-group-text bg-color-type-1 border-type-1" id="city"><i
                                          class="fa fa-home" aria-hidden="true"></i>
                              </span>
                                    </div>
                                    <input type="text" class="form-control input-type-1" id="city-input"
                                           placeholder="City" oninput="removeError('#city');"
                                           aria-label="Address" aria-describedby="address">
                                    <p class="error text-danger invalid-feedback text-right" id="city-input-error"></p>
                                </div>
                                <div class="input-group mb-3 col-md-6">
                                    <input type="text" class="form-control input-type-1 ml-0" id="country-input"
                                           placeholder="Country" oninput="removeError('#country');"
                                           aria-label="Address" aria-describedby="address">
                                    <p class="error text-danger invalid-feedback text-right" id="country-input-error"></p>
                                </div>

                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                          <span class="input-group-text bg-color-type-1 border-type-1" id="email"><i
                                      class="fa fa-envelope" aria-hidden="true"></i>
                          </span>
                                </div>
                                <input type="email" oninput="email(this.value,'#email');"
                                       class="form-control input-type-1"
                                       id="email-input" placeholder="Email" aria-label="Email" aria-describedby="email">
                                <p class="error text-danger invalid-feedback text-right" id="email-input-error">error
                                    msg</p>

                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text bg-color-type-1 border-type-1" id="telephone"><i
                                        class="fa fa-phone" aria-hidden="true"></i>
                            </span>
                                </div>
                                <input type="tel" class="form-control input-type-1" id="telephone-input"
                                       placeholder="Telephone No" aria-label="Telephone No" oninput="checkTelephone(this.value, '#telephone');"
                                       aria-describedby="telephone">
                                <p class="error text-danger invalid-feedback text-right" id="telephone-input-error"></p>
                            </div>

                            <div class="form-group">
                                <center>
                                    <p class="error text-danger invalid-feedback text-center" id="tab1-input-errors">Please
                                        enter all valid inputs!</p>
                                    <button type="button" class="btn btn-type-1" id="firstContinueBtn" onclick="validateFirstStep()">
                                        Continue
                                    </button>
                                </center>

                            </div>

                        </div>

                        <!--Medical tab-->
                        <div class="tab-pane fade" id="medical-tab" role="tabpanel" aria-labelledby="medical">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text bg-color-type-1 border-type-1" id="bllod"><i
                                        class="fa fa-user-circle-o" aria-hidden="true"></i>
                            </span>
                                </div>
                                <select class="custom-select form-control input-type-1" id="blood-type" onchange="removeErrorInput('#blood-type-input-error');">
                                    <option value="" hidden selected>Blood Type</option>
                                    <option value="O+">O+ (O-Positive)</option>
                                    <option value="O-">O- (O-Negative)</option>
                                    <option value="A+">A+ (A-Positive)</option>
                                    <option value="A-">A- (A-Negative)</option>
                                    <option value="B+">B+ (B-Positive)</option>
                                    <option value="B-">B- (B-Negative)</option>
                                    <option value="AB+">AB+ (AB-Positive)</option>
                                    <option value="AB-">AB- (AB-Negative)</option>
                                </select>
                                <p class="error text-danger invalid-feedback text-right" id="blood-type-input-error"></p>
                            </div>


                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text bg-color-type-1 border-type-1" id="weight"><i
                                        class="fa fa-user-circle-o" aria-hidden="true"></i>
                            </span>
                                </div>
                                <input type="tel" class="form-control input-type-1" id="weight-input" oninput="checkWeight(this.value, '#weight')"
                                       placeholder="Weight (kg)" aria-label="Weight" aria-describedby="weight">
                                <p class="error text-danger invalid-feedback text-right" id="weight-input-error"></p>
<!--                                <div class="input-group-append">-->
<!--                                    <span class="input-group-text bg-color-type-1 border-type-1"-->
<!--                                          id="weight-unit">kg</span>-->
<!--                                </div>-->
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text bg-color-type-1 border-type-1" id="height"><i
                                        class="fa fa-user-circle-o" aria-hidden="true"></i>
                            </span>
                                </div>
                                <input type="tel" class="form-control input-type-1" id="height-input" oninput="checkHeight(this.value, '#height')"
                                       placeholder="Height (cm)" aria-label="Weight" aria-describedby="telephone">
                                <p class="error text-danger invalid-feedback text-right" id="height-input-error"></p>
<!--                                <div class="input-group-append">-->
<!--                                    <span class="input-group-text bg-color-type-1 border-type-1"-->
<!--                                          id="height-unit">cm</span>-->
<!--                                </div>-->
                            </div>

                            <div class="form-group">
                                <center>
                                    <p class="error text-danger invalid-feedback text-center" id="tab2-input-errors">Please
                                        enter all valid inputs!</p>
                                    <button type="button" class="btn btn-type-1" onclick="$('#personal').tab('show');">
                                        Previous
                                    </button>
                                    <button type="button" class="btn btn-type-1" onclick="validateSecondStep()" id="secondContinueBtn">
                                        Continue
                                    </button>
                                </center>
                            </div>


                        </div>

                        <!--Security tab-->
                        <div class="tab-pane fade" id="security-tab" role="tabpanel" aria-labelledby="security">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text bg-color-type-1 border-type-1" id="password"><i
                                            class="fa fa-key" aria-hidden="true"></i>
                                </span>
                                </div>
                                <input type="password" class="form-control input-type-1"
                                       oninput="cmf_password('#cmf-password')"
                                       id="password-input" placeholder="Password (8-16 characters)"
                                       aria-label="Password"
                                       aria-describedby="passowrd">
                                <p class="error text-danger invalid-feedback text-right" id="password-input-error"></p>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text bg-color-type-1 border-type-1" id="cmf-password"><i
                                              class="fa fa-key" aria-hidden="true"></i>
                                  </span>
                                </div>
                                <input type="password" class="form-control input-type-1"
                                       oninput="cmf_password('#cmf-password')"
                                       id="cmf-password-input" placeholder="Retype Password (8-16 characters)"
                                       aria-label="Retype Password"
                                       aria-describedby="cmf-passowrd">
                                <p class="error text-danger invalid-feedback text-right" id="cmf-password-input-error">
                                    error
                                    msg</p>
                            </div>

                            <div class="form-group">
                                <center>
                                    <div id="register-spinner"><i class="fa fa-spinner rotating spinner"
                                                                  aria-hidden="true"></i>
                                    </div>
                                </center>
                                <center id="final-button-section">
                                    <p class="error text-danger invalid-feedback text-center" id="register-btn-input-error">Please enter all valid inputs!</p>
                                    <button type="button" class="btn btn-type-1" onclick="$('#medical').tab('show');">
                                        Previous
                                    </button>
                                    <button type="button" class="btn btn-type-1" id="register-btn"
                                            onclick="reg_user();">
                                        Register
                                    </button>
                                </center>
                            </div>
                        </div>

                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
<!--Register model-->
<!--Login model-->
<div class="modal fade" id="login-model" tabindex="-1" role="dialog" aria-labelledby="login-model-label"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content login-modal">
            <div class="modal-header text-center modal-header-type-1">
                <h5 class="modal-title white-text">Kenway Medicals | Login</h5>
                <button type="button" class="close hover-white-text" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pl-5 pr-5">
                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-color-type-1 border-type-1" id="login-email"><i
                                      class="fa fa-envelope" aria-hidden="true"></i>
                          </span>
                        </div>
                        <input type="email" id="login-email-input" class="form-control input-type-1" placeholder="Email"
                               aria-label="Email"
                               aria-describedby="cred-email" autofocus>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text bg-color-type-1 border-type-1" id="login-password"><i
                                            class="fa fa-key" aria-hidden="true"></i>
                                </span>
                        </div>
                        <input type="password" class="form-control input-type-1" placeholder="Password"
                               aria-label="Password" aria-describedby="cred-passowrd" id="login-password-input">
                    </div>

                    <center><p class="error text-danger invalid-feedback text-center" style="font-size:12px;"
                               id="invalid-cred-error">Invalid Credentials. Please try again!</p>
                    </center>

                    <center>
                        <button type="button" id="login-btn" class="btn btn-type-1" onclick="loginUser()">Login</button>
                    </center>
                    <center>
                        <a href="#" class="forgotLink" onclick="showForgotPasswordModal()">Forgot Password</a>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Forgot Password data model -->
<<div class="modal fade" id="forgotPasswordDataModel" tabindex="-1" role="dialog" aria-labelledby="login-model-label"
      aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content login-modal">
            <div class="modal-header text-center modal-header-type-1">
                <h5 class="modal-title white-text">Kenway Medicals | Reset Password</h5>
                <button type="button" class="close hover-white-text" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pl-5 pr-5">
                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-color-type-1 border-type-1" id="forgot-password-email"><i
                                      class="fa fa-envelope" aria-hidden="true"></i>
                          </span>
                        </div>
                        <input type="email" id="forgot-password-email-input" class="form-control input-type-1" placeholder="Email"
                               aria-label="Email" oninput="validateForgotPasswordEmail(this.value,'#forgot-password-email');"
                               aria-describedby="cred-email" autofocus>
                        <p class="error text-danger invalid-feedback text-right" id="forgot-password-email-input-error"></p>

                    </div>
                    <center>
                        <div id="forgot-spinner"><i class="fa fa-spinner rotating spinner"
                                                      aria-hidden="true"></i>
                        </div>
                    </center>
                    <center>
                        <button id="forgotBtn" type="button" class="btn btn-type-1" onclick="sendNewPasswordToEmail()">Send Email</button>
                    </center>

                </form>
            </div>
        </div>
    </div>
</div>

<!--Login model-->
<!--doc model-->
<div class="modal fade" id="all-doc-model" tabindex="-1" role="dialog" aria-labelledby="login-model-label"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content doctor-model">
            <div class="modal-header text-center modal-header-type-1">
                <h5 class="modal-title white-text text-center">Our Doctors</h5>
                <button type="button" class="close hover-white-text" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height:70vh;overflow-y: scroll;">
                <table class="table text-center table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">Speciality</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($allDoctors as $temp) {
                        $temp_html = "<tr>" .
                            "<td>" . $temp['fname'] . " " . $temp['sname'] . "</td>" .
                            "<td>" . $temp['speciality'] . "</td>" .
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
<!--Doc model-->
<!--==========================
  Header
============================-->
<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <a href="#body"><img src="img/nav_logo.png" class="navbar-logo" alt="Kenway" title="Kenway medicals"/></a>
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="#body">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#portfolio">Facilities</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="nav-user-data"><a href="#" data-toggle="modal" data-target="#register-model">Register</a>
                </li>
                <li class="nav-user-data"><a href="#" data-toggle="modal" data-target="#login-model">Login</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->

<!--==========================
  Intro Section
============================-->
<section id="intro">

    <div class="intro-content">
        <h2>WE HERE TO PROVIDE<br><span>SERVICE</span></h2>
        <div>
            <a href="#" class="btn-get-started" data-toggle="modal" data-target="#login-model">Channel A Doctor</a>
            <a href="#" class="btn-projects " data-toggle="modal" data-target="#all-doc-model">View All Doctors</a>
        </div>
    </div>

    <div id="intro-carousel" class="owl-carousel">
        <div class="item" style="background-image: url('img/intro-carousel/1.jpg');"></div>
        <div class="item" style="background-image: url('img/intro-carousel/2.jpg');"></div>
        <div class="item" style="background-image: url('img/intro-carousel/3.jpg');"></div>
        <div class="item" style="background-image: url('img/intro-carousel/4.jpg');"></div>
        <div class="item" style="background-image: url('img/intro-carousel/5.jpg');"></div>
    </div>

</section><!-- #intro -->

<main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 about-img">
                    <img src="img/about-img.jpg" alt="">
                </div>

                <div class="col-lg-6 content">
                    <h2>Kenway Medicals,</h2>
                    <h3>Kenway Medicals (Pvt) Ltd is a company which is operating in Sri Lanka. It is a medical company
                        that has
                        sub-divisions across the country.</h3>
                    <ul>
                        <li><i class="ion-android-checkmark-circle"></i> New technological equipments.</li>
                        <li><i class="ion-android-checkmark-circle"></i> Specialized doctors and good service .</li>
                        <li><i class="ion-android-checkmark-circle"></i> Provide clinical services to patients
                            island-wide.
                        </li>
                        <li><i class="ion-android-checkmark-circle"></i> Channeling department for doctor appointments
                        </li>
                        <li><i class="ion-android-checkmark-circle"></i> medicinal department for issuing of
                            pharmaceutical drugs.
                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
        <div class="container">
            <div class="section-header">
                <h2>Our Services</h2>
                <p>Kenway Medicals is committed to provide compassionate care and excellent service that transcends
                    conventional healthcare.</p>
            </div>

            <div class="row">

                <div class="col-lg-6">
                    <div class="box wow fadeInLeft">
                        <div class="icon"><i class="fa fa-volume-control-phone"></i></div>
                        <h4 class="title"><a>Channeling Service</a></h4>
                        <p class="description">Now you can channel doctor with your want via telephone
                            conversations.</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="box wow fadeInRight">
                        <div class="icon"><i class="fa fa-globe"></i></div>
                        <h4 class="title"><a>E-Channeling</a></h4>
                        <p class="description">If you are a registered patient in our system you can simple make a
                            channel via our web site.</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="box wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="icon"><i class="fa fa-user-md"></i></div>
                        <h4 class="title"><a>Medical Service</a></h4>
                        <p class="description">We have high quality medical resources to provide our medical
                            service. </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="box wow fadeInRight" data-wow-delay="0.2s">
                        <div class="icon"><i class="fa fa-medkit"></i></div>
                        <h4 class="title"><a>Inside Pharmacy Service</a></h4>
                        <p class="description">We have pharmacy service inside hospitals to provide quick service to our
                            patients.</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- #services -->

    <!--==========================
      Our Facilities Section
    ============================-->
    <section id="portfolio" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2>Our Facilities</h2>
                <p>All our faciliteis and services for the helthyness and safetyness of our patients and employees</p>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row no-gutters">

                <div class="col-lg-3 col-md-4">
                    <div class="portfolio-item wow fadeInUp">
                        <a href="img/portfolio/1.jpg" class="portfolio-popup">
                            <img src="img/portfolio/1.jpg" alt="">
                            <div class="portfolio-overlay">
                                <div class="portfolio-info"><h2 class="wow fadeInUp">Facility 1</h2></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="portfolio-item wow fadeInUp">
                        <a href="img/portfolio/2.jpg" class="portfolio-popup">
                            <img src="img/portfolio/2.jpg" alt="">
                            <div class="portfolio-overlay">
                                <div class="portfolio-info"><h2 class="wow fadeInUp">Facility 2</h2></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="portfolio-item wow fadeInUp">
                        <a href="img/portfolio/3.jpg" class="portfolio-popup">
                            <img src="img/portfolio/3.jpg" alt="">
                            <div class="portfolio-overlay">
                                <div class="portfolio-info"><h2 class="wow fadeInUp">Facility 3</h2></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="portfolio-item wow fadeInUp">
                        <a href="img/portfolio/4.jpg" class="portfolio-popup">
                            <img src="img/portfolio/4.jpg" alt="">
                            <div class="portfolio-overlay">
                                <div class="portfolio-info"><h2 class="wow fadeInUp">Facility 4</h2></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="portfolio-item wow fadeInUp">
                        <a href="img/portfolio/5.jpg" class="portfolio-popup">
                            <img src="img/portfolio/5.jpg" alt="">
                            <div class="portfolio-overlay">
                                <div class="portfolio-info"><h2 class="wow fadeInUp">Facility 5</h2></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="portfolio-item wow fadeInUp">
                        <a href="img/portfolio/6.jpg" class="portfolio-popup">
                            <img src="img/portfolio/6.jpg" alt="">
                            <div class="portfolio-overlay">
                                <div class="portfolio-info"><h2 class="wow fadeInUp">Facility 6</h2></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="portfolio-item wow fadeInUp">
                        <a href="img/portfolio/7.jpg" class="portfolio-popup">
                            <img src="img/portfolio/7.jpg" alt="">
                            <div class="portfolio-overlay">
                                <div class="portfolio-info"><h2 class="wow fadeInUp">Facility 7</h2></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="portfolio-item wow fadeInUp">
                        <a href="img/portfolio/8.jpg" class="portfolio-popup">
                            <img src="img/portfolio/8.jpg" alt="">
                            <div class="portfolio-overlay">
                                <div class="portfolio-info"><h2 class="wow fadeInUp">Facility 8</h2></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- #Facilities -->

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 text-center text-lg-left">
                    <h3 class="cta-title">Call To Action</h3>
                    <p class="cta-text"> Now you can quickly contact our emergency service and our ambulance service
                        will reach your location quickly.</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="#">Call To Action</a>
                </div>
            </div>

        </div>
    </section><!-- #call-to-action -->

    <section id="contact" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2>Contact Us</h2>
                <p>Contact us to more information and our customer service center will open 24X7.</p>
            </div>

            <div class="row contact-info">

                <div class="col-md-4">
                    <div class="contact-address">
                        <i class="ion-ios-location-outline"></i>
                        <h3>Address</h3>
                        <address>A108 Adam Street, Ja Ela, Sri Lanka.</address>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-phone">
                        <i class="ion-ios-telephone-outline"></i>
                        <h3>Phone Number</h3>
                        <p><a href="tel:+94112555555">+94 112 55 55 55</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-email">
                        <i class="ion-ios-email-outline"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:info@kenwaymedicals.com">info@kenwaymedicals.com</a></p>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- #contact -->

</main>

<!--==========================
  Footer
============================-->
<footer id="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong> Kenway Medicals (Pvt) Ltd.</strong>. All Rights Reserved
        </div>
    </div>
</footer><!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/superfish/hoverIntent.js"></script>
<script src="lib/superfish/superfish.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/magnific-popup/magnific-popup.min.js"></script>
<script src="lib/sticky/sticky.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>

<script>
    $('#birthday').datepicker({
        uiLibrary: 'bootstrap4',
        maxDate: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate())
    });
</script>

<!-- Template Main Javascript File -->
<script src="js/main.js"></script>
<script src="js/operations/userData.js"></script>

</body>
</html>
