$('#bday').bootstrapMaterialDatePicker({ format : 'MM/DD/YYYY' , time: false, maxDate: new Date()});

let patientUserEmail = '';
let isPatientUserEmailValid = true;

let doctorUserEmail = '';
let isDoctorUserEmailValid = true;

function addDoctors(id){
    addRemoveClass(id);
    removeSection();
    showSection("addDoctor");
}

function viewDoctors(id){
    addRemoveClass(id);
    removeSection();
    showSection("viewDoctors");
}

function addRemoveClass(x) {
    $("#home").removeClass("active");
    $("#patient").removeClass("active");
    $("#schedule").removeClass("active");
    $("#doctor").removeClass("active");
    $(x).addClass("active");
}

function removeSection(){
    const dashboard = document.getElementById("dashboard");
    const schedule = document.getElementById("viewSchedule");
    const patients = document.getElementById("viewPatients");
    const profile = document.getElementById("profile");
    const viewDoctors = document.getElementById("viewDoctors");
    const addDoctors = document.getElementById("addDoctor");

    dashboard.style.display = "none";
    schedule.style.display = "none";
    patients.style.display = "none";
    profile.style.display = "none";
    viewDoctors.style.display = "none";
    addDoctors.style.display = "none";
}

function showSection(section){
    const x = document.getElementById(section);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function tabShift(id){
    $("#personal_tab_ind").removeClass("active");
    $("#contact_tab_ind").removeClass("active");
    $("#professional_tab_ind").removeClass("active");
    $(id+"_tab_ind").addClass("active");
}

function showDoctor(id) {
    $('#doctorDataModel').modal('show');
    getDoctorById(id);
}

function patientEmailVerify(email) {
    isPatientUserEmailValid = true;

    $.get("../../php/common/getData.php?table=user&column=email&value=" + email, function (data, status) {
        if (data != 'false' && patientUserEmail != email) {
            isPatientUserEmailValid = false;
            $("#patient-email-error").show();
            $("#patient-email-error-line").addClass('error');
        } else {
            $("#patient-email-error").hide();
            $("#patient-email-error-line").removeClass('error');
        }
    });
}

function doctorEmailVerify(email) {
    isDoctorUserEmailValid = true;

    $.get("../../php/common/getData.php?table=user&column=email&value=" + email, function (data, status) {
        if (data != 'false' && doctorUserEmail != email) {
            isDoctorUserEmailValid = false;
            $("#doctor-email-error").show();
            $("#doctor-email-error-line").addClass('error');
        } else {
            $("#doctor-email-error").hide();
            $("#doctor-email-error-line").removeClass('error');
        }
    });
}

function getDoctorById(id){
    $.get("../../../php/common/getData.php?table=doctor&column=id&value="+id, function (data, status) {
        if (data != 'false') {
            $("#view-doctor-id").value = id;
            let temp = jQuery.parseJSON(data);
            let splited = temp[0].bday.split("/");
            let yrs = new Date(new Date() - new Date(splited[2],splited[0],splited[1]))/1000/60/60/24/365;
            let age_y = Math.round(yrs);
            $("#view-doctor-name").text(temp[0].fname+" "+temp[0].sname);
            $("#view-doctor-gender").text(temp[0].gender);
            $("#view-doctor-bday").text(temp[0].bday +"  ("+age_y+" yrs)");
            $("#view-doctor-medLicenceNo").text(temp[0].medLicenceNo);
            $("#view-doctor-speciality").text(temp[0].speciality);
            $("#view-doctor-email").text(temp[0].email);
            $("#view-doctor-nic").text(temp[0].nic);
            $("#view-doctor-telephone").text(temp[0].telephone);
            $("#view-doctor-address").text(temp[0].street+", "+temp[0].city+", "+temp[0].country+", "+temp[0].zipCode);
            $("#view-doctor-id").text(id);
        } else {
            console.log("Error");
        }
    });
}

let isEmailValid = false;

function confirmRegister(){
    $("#add-doctor-fname-line").removeClass("error");
    $("#add-doctor-fname-error").hide();
    $("#add-doctor-lname-line").removeClass("error");
    $("#add-doctor-lname-error").hide();
    $("#add-doctor-bday-line").removeClass("error");
    $("#add-doctor-bday-error").hide();
    $("#add-doctor-nic-line").removeClass("error");
    $("#add-doctor-nic-error").hide();
    $("#add-doctor-street-line").removeClass("error");
    $("#add-doctor-street-error").hide();
    $("#add-doctor-zipcode-line").removeClass("error");
    $("#add-doctor-zipcode-error").hide();
    $("#add-doctor-city-line").removeClass("error");
    $("#add-doctor-city-error").hide();
    $("#add-doctor-country-line").removeClass("error");
    $("#add-doctor-country-error").hide();
    $("#add-doctor-email-line").removeClass("error");
    $("#add-doctor-email-error").hide();
    $("#add-doctor-tele-line").removeClass("error");
    $("#add-doctor-tele-error").hide();
    $("#add-doctor-medLicenceNo-line").removeClass("error");
    $("#add-doctor-medLicenceNo-error").hide();
    $("#add-doctor-speciality-line").removeClass("error");
    $("#add-doctor-speciality-error").hide();
    $("#add-doctor-valid").hide();
    let isValid = true;
    if($("#firstName").val() == ''){
        $("#add-doctor-fname-line").addClass("error");
        $("#add-doctor-fname-error").show();
        isValid = false;
    }if($("#lastName").val() == ''){
        $("#add-doctor-lname-line").addClass("error");
        $("#add-doctor-lname-error").show();
        isValid = false;
    }if($("#bday").val() == ''){
        $("#add-doctor-bday-line").addClass("error");
        $("#add-doctor-bday-error").show();
        isValid = false;
    }if($("#nic").val() == ''){
        $("#add-doctor-nic-line").addClass("error");
        $("#add-doctor-nic-error").show();
        isValid = false;
    }if($("#street").val() == ''){
        $("#add-doctor-street-line").addClass("error");
        $("#add-doctor-street-error").show();
        isValid = false;
    }if($("#ZipCode").val() == ''){
        $("#add-doctor-zipcode-line").addClass("error");
        $("#add-doctor-zipcode-error").show();
        isValid = false;
    }if($("#city").val() == ''){
        $("#add-doctor-city-line").addClass("error");
        $("#add-doctor-city-error").show();
        isValid = false;
    }if($("#country").val() == ''){
        $("#add-doctor-country-line").addClass("error");
        $("#add-doctor-country-error").show();
        isValid = false;
    }if($("#email").val() == ''){
        $("#add-doctor-email-line").addClass("error");
        $("#add-doctor-email-error").show();
        isValid = false;
    }if($("#tele").val() == ''){
        $("#add-doctor-tele-line").addClass("error");
        $("#add-doctor-tele-error").show();
        isValid = false;
    }if($("#licence").val() == ''){
        $("#add-doctor-medLicenceNo-line").addClass("error");
        $("#add-doctor-medLicenceNo-error").show();
        isValid = false;
    }if($("#speciality").val() == ''){
        $("#add-doctor-speciality-line").addClass("error");
        $("#add-doctor-speciality-error").show();
        isValid = false;
    }
    if(isValid && isEmailValid) {
        console.log("Valid");
        let firstName = $("#firstName").val();
        let lastName = $("#lastName").val();
        let gender = $("input[name='gender']:checked").val();
        let bday = $("#bday").val();
        let nic = $("#nic").val();
        let street = $("#street").val();
        let zipCode = $("#ZipCode").val();
        let city = $("#city").val();
        let country = $("#country").val();
        let email = $("#email").val();
        let tel = $("#tele").val();
        let medLicenceNo = $("#licence").val();
        let speciality = $("#speciality").val();

        $.confirm({
            theme: 'modern',
            icon: 'fa fa-question-circle-o',
            title: 'Confirm!',
            content: "Do you want to add this record!",
            draggable: true,
            animationBounce: 2.5,
            type: 'blue',
            typeAnimated: true,
            buttons: {
                Delete: {
                    text: 'Yes',
                    btnClass: 'btn-primary',
                    action: function () {

                        $.post("php/doctorRegistration.php",
                            {
                                fName: firstName,
                                sName: lastName,
                                gender: gender,
                                bday:bday,
                                nic: nic,
                                street: street,
                                zipCode: zipCode,
                                city: city,
                                country: country,
                                email: email,
                                telephone: tel,

                                medLicenceNo: medLicenceNo,
                                speciality: speciality,

                                password: "doctor@kenway",

                            },

                            function (result) {
                                if (result == 1) {
                                    $.confirm({
                                        theme: 'modern',
                                        icon: 'fa fa-check-circle',
                                        title: 'Success!',
                                        content: "<p>Record added succssfully!<br> Temporary pass: <b> doctor@kenway</b></p>",
                                        draggable: true,
                                        animationBounce: 2.5,
                                        type: 'green',
                                        typeAnimated: true,
                                        buttons: {
                                            Delete: {
                                                text: 'Okay',
                                                btnClass: 'btn-success',
                                                action: function () {

                                                }
                                            },

                                        }
                                    });
                                } else {
                                    $.confirm({
                                        theme: 'modern',
                                        icon: 'fa fa-exclamation-circle',
                                        title: 'Error !',
                                        content: "Error happened. Please try again!",
                                        draggable: true,
                                        animationBounce: 2.5,
                                        type: 'red',
                                        typeAnimated: true,
                                        buttons: {
                                            Delete: {
                                                text: 'Try Again',
                                                btnClass: 'btn-danger',
                                            }
                                        }
                                    });
                                }
                            });

                    }
                },
                later: {
                    text: 'No',
                    action: function () {

                    }
                }
            }
        });
    }
    else{
        $("#add-doctor-valid").show();
    }
}

// email validations
function emailValidation(email) {
    $.get("../php/common/getData.php?table=user&column=email&value=" + email, function (data, status) {
        if (data != 'false') {
            isEmailValid = false;
            $("#add-doctor-email-line").addClass("error");
            $("#add-doctor-email-error").text("Email already exists!");
            $("#add-doctor-email-error").show();
        } else {
            isEmailValid = true;
            $("#add-doctor-email-line").removeClass("error");
            $("#add-doctor-email-error").hide();
        }
    });
}

function editPatient(id) {
    $('#patientDataModel').modal('hide');
    $('#editPatientDetailsDataModel').modal('show');
    getPatientDetailsById(id);
}

function editDoctor(id) {
    $('#doctorDataModel').modal('hide');
    $('#editDoctorDetailsDataModel').modal('show');
    getDoctorDetailsById(id);
}

function getDoctorDetailsById(id) {

    isDoctorUserEmailValid = true;
    $("#doctor-email-error").hide();
    $("#doctor-email-error-line").removeClass('error');

    $.get("../../../php/common/getData.php?table=doctor&column=id&value=" + id, function (data, status) {
        if (data != 'false') {
            let temp = jQuery.parseJSON(data);
            $("#edit-doctor-id").val(temp[0].id);
            $("#edit-doctor-fname").val(temp[0].fname);
            $("#edit-doctor-sname").val(temp[0].sname);
            $("#edit-doctor-street").val(temp[0].street);
            $("#edit-doctor-zipcode").val(temp[0].zipCode);
            $("#edit-doctor-city").val(temp[0].city);
            $("#edit-doctor-country").val(temp[0].country);
            $("#edit-doctor-medLicenceNo").val(temp[0].medLicenceNo);
            $("#edit-doctor-speciality").val(temp[0].speciality);
            $("#edit-doctor-email").val(temp[0].email);
            $("#edit-doctor-telephone").val(temp[0].telephone);
            doctorUserEmail = temp[0].email;
        } else {
            console.log("Error");
        }
    });
}

function getPatientDetailsById(id) {

    isPatientUserEmailValid = true;
    $("#patient-email-error").hide();
    $("#patient-email-error-line").removeClass('error');

    $.get("../../../php/common/getData.php?table=patient&column=id&value=" + id, function (data, status) {
        if (data != 'false') {
            let temp = jQuery.parseJSON(data);
            $("#edit-patient-id").val(temp[0].id);
            $("#edit-patient-fname").val(temp[0].fname);
            $("#edit-patient-sname").val(temp[0].sname);
            $("#edit-patient-street").val(temp[0].street);
            $("#edit-patient-zipcode").val(temp[0].zipCode);
            $("#edit-patient-city").val(temp[0].city);
            $("#edit-patient-country").val(temp[0].country);
            $("#edit-patient-height").val(temp[0].height);
            $("#edit-patient-weight").val(temp[0].weight);
            $("#edit-patient-email").val(temp[0].email);
            $("#edit-patient-telephone").val(temp[0].telephone);
            patientUserEmail = temp[0].email;
        } else {
            console.log("Error");
        }
    });
}

function updateDoctor() {

    let id = $("#edit-doctor-id").val();
    let fname = $("#edit-doctor-fname").val();
    let sname = $("#edit-doctor-sname").val();
    let street = $("#edit-doctor-street").val();
    let zipcode = $("#edit-doctor-zipcode").val();
    let city = $("#edit-doctor-city").val();
    let country = $("#edit-doctor-country").val();
    let medLicenceNo = $("#edit-doctor-medLicenceNo").val();
    let speciality = $("#edit-doctor-speciality").val();
    let telephone = $("#edit-doctor-telephone").val();
    let email = $("#edit-doctor-email").val();

    $.confirm({
        theme: 'modern',
        icon: 'fa fa-question',
        title: 'Update!',
        content: "Do you want to update this record?",
        draggable: true,
        animationBounce: 2.5,
        type: 'blue',
        typeAnimated: true,
        buttons: {
            Delete: {
                text: 'Update',
                btnClass: 'btn-primary',
                action: function () {
                    if(isDoctorUserEmailValid) {
                        $.post("php/updateUser.php",
                            {
                                id: id,
                                fname: fname,
                                sname: sname,
                                street: street,
                                zipCode: zipcode,
                                city: city,
                                country: country,
                                email: email,
                                telephone: telephone
                            },

                            function (result) {
                                if (result == 1) {
                                    $.post("php/updateDoctor.php",
                                        {
                                            id: id,
                                            medLicenceNo: medLicenceNo,
                                            speciality: speciality
                                        },
                                        function (result) {
                                            if (result == 1) {
                                                $.confirm({
                                                    theme: 'modern',
                                                    icon: 'fa fa-check-circle',
                                                    title: 'Success!',
                                                    content: "Your data successfully updated!",
                                                    draggable: true,
                                                    animationBounce: 2.5,
                                                    type: 'green',
                                                    typeAnimated: true,
                                                    buttons: {
                                                        Delete: {
                                                            text: 'Okay',
                                                            btnClass: 'btn-success',
                                                            action: function () {
                                                            }
                                                        },

                                                    }
                                                });

                                            } else {
                                                $.confirm({
                                                    theme: 'modern',
                                                    icon: 'fa fa-exclamation-circle',
                                                    title: 'Error !',
                                                    content: "Error happened. Please try again!",
                                                    draggable: true,
                                                    animationBounce: 2.5,
                                                    type: 'red',
                                                    typeAnimated: true,
                                                    buttons: {
                                                        Delete: {
                                                            text: 'Try Again',
                                                            btnClass: 'btn-danger',
                                                        }
                                                    }
                                                });
                                            }
                                        });

                                }
                            });
                    }else{
                        $.confirm({
                            theme: 'modern',
                            icon: 'fa fa-exclamation-circle',
                            title: 'Error !',
                            content: "Please enter valid inputs!",
                            draggable: true,
                            animationBounce: 2.5,
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                                Delete: {
                                    text: 'Try Again',
                                    btnClass: 'btn-danger',
                                }
                            }
                        });
                    }
                }
            },
            later: {
                text: 'cancel',
                action: function () {

                }
            }
        }
    });
}

function updatePatient() {

    let id = $("#edit-patient-id").val();
    let fname = $("#edit-patient-fname").val();
    let sname = $("#edit-patient-sname").val();
    let street = $("#edit-patient-street").val();
    let zipcode = $("#edit-patient-zipcode").val();
    let city = $("#edit-patient-city").val();
    let country = $("#edit-patient-country").val();
    let height = $("#edit-patient-height").val();
    let weight = $("#edit-patient-weight").val();
    let telephone = $("#edit-patient-telephone").val();
    let email = $("#edit-patient-email").val();

    $.confirm({
        theme: 'modern',
        icon: 'fa fa-question',
        title: 'Update!',
        content: "Do you want to update this record?",
        draggable: true,
        animationBounce: 2.5,
        type: 'blue',
        typeAnimated: true,
        buttons: {
            Delete: {
                text: 'Update',
                btnClass: 'btn-primary',
                action: function () {
                    if(isPatientUserEmailValid) {
                        $.post("php/updateUser.php",
                            {
                                id: id,
                                fname: fname,
                                sname: sname,
                                street: street,
                                zipCode: zipcode,
                                city: city,
                                country: country,
                                email: email,
                                telephone: telephone
                            },

                            function (result) {
                                if (result == 1) {
                                    $.post("php/updatePatient.php",
                                        {
                                            id: id,
                                            height: height,
                                            weight: weight
                                        },
                                        function (result) {
                                            if (result == 1) {
                                                $.confirm({
                                                    theme: 'modern',
                                                    icon: 'fa fa-check-circle',
                                                    title: 'Success!',
                                                    content: "Your data successfully updated!",
                                                    draggable: true,
                                                    animationBounce: 2.5,
                                                    type: 'green',
                                                    typeAnimated: true,
                                                    buttons: {
                                                        Delete: {
                                                            text: 'Okay',
                                                            btnClass: 'btn-success',
                                                            action: function () {
                                                            }
                                                        },

                                                    }
                                                });

                                            } else {
                                                $.confirm({
                                                    theme: 'modern',
                                                    icon: 'fa fa-exclamation-circle',
                                                    title: 'Error !',
                                                    content: "Error happened. Please try again!",
                                                    draggable: true,
                                                    animationBounce: 2.5,
                                                    type: 'red',
                                                    typeAnimated: true,
                                                    buttons: {
                                                        Delete: {
                                                            text: 'Try Again',
                                                            btnClass: 'btn-danger',
                                                        }
                                                    }
                                                });
                                            }
                                        });

                                }
                            });
                    }else{
                        $.confirm({
                            theme: 'modern',
                            icon: 'fa fa-exclamation-circle',
                            title: 'Error !',
                            content: "Please enter valid inputs!",
                            draggable: true,
                            animationBounce: 2.5,
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                                Delete: {
                                    text: 'Try Again',
                                    btnClass: 'btn-danger',
                                }
                            }
                        });
                    }
                }
                },
            later: {
                text: 'cancel',
                action: function () {

                }
            }
        }
    });
}

function deleteOther(id, type){

    $.confirm({
        theme: 'modern',
        icon: 'fa fa-trash-o',
        title: 'Delete!',
        content: "Do you want to delete this record?",
        draggable: true,
        animationBounce: 2.5,
        type: 'red',
        typeAnimated: true,
        buttons: {
            Delete: {
                text: 'Delete',
                btnClass: 'btn-danger',
                action: function () {
                    $.get("php/deleteUser.php?id="+id, function (data, status) {
                        if(data==1){
                            $.confirm({
                                theme: 'modern',
                                icon: 'fa fa-check-circle',
                                title: 'Success !',
                                content: "Successfully deleted this record!",
                                draggable: true,
                                animationBounce: 2.5,
                                type: 'green',
                                typeAnimated: true,
                                buttons: {
                                    Delete: {
                                        text: 'Done',
                                        btnClass: 'btn-success',
                                        action: function () {
                                            $('#'+type+'-row-'+id).hide();
                                            $("#patientDataModel").modal('hide');
                                            $("#staffDataModel").modal('hide');
                                            $("#doctorDataModel").modal('hide');

                                        }
                                    }
                                }
                            });
                            // $.get("php/logout.php", function (data, status) {
                            //     window.location.replace('../index.php');
                            // });
                        }else{
                            $.confirm({
                                theme: 'modern',
                                icon: 'fa fa-exclamation-circle',
                                title: 'Error !',
                                content: "Error happened. Please try again!",
                                draggable: true,
                                animationBounce: 2.5,
                                type: 'red',
                                typeAnimated: true,
                                buttons: {
                                    Delete: {
                                        text: 'Try Again',
                                        btnClass: 'btn-danger',
                                    }
                                }
                            });
                        }
                    });
                }
            },
            later: {
                text: 'cancel',
                action: function () {

                }
            }
        }
    });
}