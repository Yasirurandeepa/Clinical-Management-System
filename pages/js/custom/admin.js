$('#staff-bday').bootstrapMaterialDatePicker({ format : 'MM/DD/YYYY' , time: false, maxDate: new Date()});

let staffUserEmail = '';
let isStaffUserEmailValid = true;

function addStaff(id){
    addRemoveClass(id);
    removeSection();
    showSection("addStaff");
}

function viewStaff(id){
    addRemoveClass(id);
    removeSection();
    showSection("viewStaff");
}

function viewPayment(id){
    addRemoveClass(id);
    removeSection();
    showSection("viewPayment");
}

function viewReports(id){
    addRemoveClass(id);
    removeSection();
    showSection("viewReports");
}


function addRemoveClass(x) {
    $("#home").removeClass("active");
    $("#patient").removeClass("active");
    $("#schedule").removeClass("active");
    $("#doctor").removeClass("active");
    $("#staff").removeClass("active");
    $("#payment").removeClass("active");
    $(x).addClass("active");
}

function removeSection(){
    const dashboard = document.getElementById("dashboard");
    const schedule = document.getElementById("viewSchedule");
    const patients = document.getElementById("viewPatients");
    const profile = document.getElementById("profile");
    const viewDoctors = document.getElementById("viewDoctors");
    const addDoctors = document.getElementById("addDoctor");
    const addStaff = document.getElementById("addStaff");
    const viewStaff = document.getElementById("viewStaff");
    const viewPayment = document.getElementById("viewPayment");
    const viewReports = document.getElementById("viewReports");



    dashboard.style.display = "none";
    schedule.style.display = "none";
    patients.style.display = "none";
    profile.style.display = "none";
    viewDoctors.style.display = "none";
    addDoctors.style.display = "none";
    addStaff.style.display = "none";
    viewStaff.style.display = "none";
    viewPayment.style.display = "none";
    viewReports.style.display = "none";

}

function staffEmailVerify(email) {
    isStaffUserEmailValid = true;

    $.get("../../php/common/getData.php?table=user&column=email&value=" + email, function (data, status) {
        if (data != 'false' && staffUserEmail != email) {
            isStaffUserEmailValid = false;
            $("#staff-email-error").show();
            $("#staff-email-error-line").addClass('error');
        } else {
            $("#staff-email-error").hide();
            $("#staff-email-error-line").removeClass('error');
        }
    });
}

function staffTabShift(id){
    $("#staff-personal_tab_ind").removeClass("active");
    $("#staff-contact_tab_ind").removeClass("active");
    $(id+"_tab_ind").addClass("active");
}

function doctorTabShift(id){
    $("#personal_tab_ind").removeClass("active");
    $("#contact_tab_ind").removeClass("active");
    $("#professional_tab_ind").removeClass("active");
    $(id+"_tab_ind").addClass("active");
}

// email validations
function emailValidation(email) {
    $.get("../php/common/getData.php?table=user&column=email&value=" + email, function (data, status) {
        if (data != 'false') {
            isEmailValid = false;
            $("#add-staff-email-line").addClass("error");
            $("#add-staff-email-error").text("Email already exists!");
            $("#add-staff-email-error").show();
        } else {
            isEmailValid = true;
            $("#add-staff-email-line").removeClass("error");
            $("#add-staff-email-error").hide();
        }
    });
}

function confirmRegisterStaff(){
    $("#add-staff-fname-line").removeClass("error");
    $("#add-staff-fname-error").hide();
    $("#add-staff-lname-line").removeClass("error");
    $("#add-staff-lname-error").hide();
    $("#add-staff-bday-line").removeClass("error");
    $("#add-staff-bday-error").hide();
    $("#add-staff-nic-line").removeClass("error");
    $("#add-staff-nic-error").hide();
    $("#add-staff-street-line").removeClass("error");
    $("#add-staff-street-error").hide();
    $("#add-staff-zipcode-line").removeClass("error");
    $("#add-staff-zipcode-error").hide();
    $("#add-staff-city-line").removeClass("error");
    $("#add-staff-city-error").hide();
    $("#add-staff-country-line").removeClass("error");
    $("#add-staff-country-error").hide();
    $("#add-staff-email-line").removeClass("error");
    $("#add-staff-email-error").hide();
    $("#add-staff-tele-line").removeClass("error");
    $("#add-staff-tele-error").hide();

    $("#add-staff-valid").hide();
    let staffIsValid = true;
    if($("#staff-firstName").val() == ''){
        $("#add-staff-fname-line").addClass("error");
        $("#add-staff-fname-error").show();
        staffIsValid = false;
    }if($("#staff-lastName").val() == ''){
        $("#add-staff-lname-line").addClass("error");
        $("#add-staff-lname-error").show();
        staffIsValid = false;
    }if($("#staff-bday").val() == ''){
        $("#add-staff-bday-line").addClass("error");
        $("#add-staff-bday-error").show();
        staffIsValid = false;
    }if($("#staff-nic").val() == ''){
        $("#add-staff-nic-line").addClass("error");
        $("#add-staff-nic-error").show();
        staffIsValid = false;
    }if($("#staff-street").val() == ''){
        $("#add-staff-street-line").addClass("error");
        $("#add-staff-street-error").show();
        staffIsValid = false;
    }if($("#staff-ZipCode").val() == ''){
        $("#add-staff-zipcode-line").addClass("error");
        $("#add-staff-zipcode-error").show();
        staffIsValid = false;
    }if($("#staff-city").val() == ''){
        $("#add-staff-city-line").addClass("error");
        $("#add-staff-city-error").show();
        staffIsValid = false;
    }if($("#staff-country").val() == ''){
        $("#add-staff-country-line").addClass("error");
        $("#add-staff-country-error").show();
        staffIsValid = false;
    }if($("#staff-email").val() == ''){
        $("#add-staff-email-line").addClass("error");
        $("#add-staff-email-error").show();
        staffIsValid = false;
    }if($("#staff-tele").val() == '') {
        $("#add-staff-tele-line").addClass("error");
        $("#add-staff-tele-error").show();
        staffIsValid = false;
    }
    if(staffIsValid && isEmailValid) {
        let firstName = $("#staff-firstName").val();
        let lastName = $("#staff-lastName").val();
        let gender = $("input[name='staff-gender']:checked").val();
        let bday = $("#staff-bday").val();
        let nic = $("#staff-nic").val();
        let street = $("#staff-street").val();
        let zipCode = $("#staff-ZipCode").val();
        let city = $("#staff-city").val();
        let country = $("#staff-country").val();
        let email = $("#staff-email").val();
        let tel = $("#staff-tele").val();

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

                        $.post("php/staffRegistration.php",
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

                                password: "staff@kenway",

                            },

                            function (result) {
                                if (result == 1) {
                                    $.confirm({
                                        theme: 'modern',
                                        icon: 'fa fa-check-circle',
                                        title: 'Success!',
                                        content: "<p>Record added succssfully!<br> Temporary pass: <b> staff@kenway</b></p>",
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
        $("#add-staff-valid").show();
    }
}

function viewScheduleAdmin(id) {
    addRemoveClass(id);
    removeSection();
    showSection("viewSchedule");
    getAllSchedules();
    console.log("AAA");
}
function getAllSchedules() {
    let temp_html = '';
    $.get("php/getAllSchedules.php", function (data, status) {
        if (data.length!=0 && data != 'false') {
            data = JSON.parse(data);
            let currentTime = new Date();
            for (let i = 0; i < data.length; i++) {
                let temp = data[i];
                let start = new Date(temp.start_date + ' ' + temp.start_time);
                let end = new Date(temp.end_date + ' ' + temp.end_time);
                let scheduleStatus = '<span class="label label-info">Upcoming</span>';
                if (start > currentTime) {
                    scheduleStatus = '<span class="label label-info">Upcoming</span>';
                } else if (start <= currentTime && end >= currentTime) {
                    scheduleStatus = '<span class="label label-success">Ongoing&nbsp;</span>';
                } else if (end < currentTime) {
                    scheduleStatus = '<span class="label label-warning">&nbsp;Passed&nbsp;</span>';
                }
                    temp_html += '<tr class="schedule-row" onclick="viewScheduleModal(' + temp.schedule_id + ')">' +
                        '<td>' + temp.fname + ' ' + temp.sname + '</td>' +
                        '<td>' + temp.start_date + '</td>' +
                        '<td>' + temp.start_time + '</td>' +
                        '<td>' + temp.end_date + '</td>' +
                        '<td>' + temp.end_time + '</td>' +
                        '<td >' + scheduleStatus + '</td>' +
                        '<td >' + temp.appointments + '</td>' +
                        '<td>' + formatDate(new Date(temp.createdDate)) + '</td>' +
                        '</tr>';

            }
        } else {
            temp_html += '<tr class="schedule-row text-center"><td colspan="8">No schedules found</td></tr>';
        }
        $("#view-schedule-body").html(temp_html);
    });
}


function search() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("scheduleTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function showStaff(id) {
    $('#staffDataModel').modal('show');
    getStaffById(id);
}

function getStaffById(id){
    $.get("../../../php/common/getData.php?table=user&column=id&value="+id, function (data, status) {
        if (data != 'false') {
            $("#view-staff-id").value = id;
            let temp = jQuery.parseJSON(data);
            let splited = temp[0].bday.split("/");
            let yrs = new Date(new Date() - new Date(splited[2],splited[0],splited[1]))/1000/60/60/24/365;
            let age_y = Math.round(yrs);
            $("#view-staff-name").text(temp[0].fname+" "+temp[0].sname);
            $("#view-staff-gender").text(temp[0].gender);
            $("#view-staff-bday").text(temp[0].bday +"  ("+age_y+" yrs)");
            $("#view-staff-email").text(temp[0].email);
            $("#view-staff-nic").text(temp[0].nic);
            $("#view-staff-telephone").text(temp[0].telephone);
            $("#view-staff-address").text(temp[0].street+", "+temp[0].city+", "+temp[0].country+", "+temp[0].zipCode);
            $("#view-staff-id").text(id);
        } else {
            console.log("Error");
        }
    });
}

function editStaff(id) {
    $('#staffDataModel').modal('hide');
    $('#editStaffDetailsDataModel').modal('show');
    getStaffDetailsById(id);
}

function getStaffDetailsById(id) {

    isStaffUserEmailValid = true;
    $("#staff-email-error").hide();
    $("#staff-email-error-line").removeClass('error');

    $.get("../../../php/common/getData.php?table=user&column=id&value=" + id, function (data, status) {
        if (data != 'false') {
            let temp = jQuery.parseJSON(data);
            $("#edit-staff-id").val(temp[0].id);
            $("#edit-staff-fname").val(temp[0].fname);
            $("#edit-staff-sname").val(temp[0].sname);
            $("#edit-staff-street").val(temp[0].street);
            $("#edit-staff-zipcode").val(temp[0].zipCode);
            $("#edit-staff-city").val(temp[0].city);
            $("#edit-staff-country").val(temp[0].country);
            $("#edit-staff-email").val(temp[0].email);
            $("#edit-staff-telephone").val(temp[0].telephone);
            staffUserEmail = temp[0].email;
        } else {
            console.log("Error");
        }
    });
}

function updateStaff() {

    let id = $("#edit-staff-id").val();
    let fname = $("#edit-staff-fname").val();
    let sname = $("#edit-staff-sname").val();
    let street = $("#edit-staff-street").val();
    let zipcode = $("#edit-staff-zipcode").val();
    let city = $("#edit-staff-city").val();
    let country = $("#edit-staff-country").val();
    let telephone = $("#edit-staff-telephone").val();
    let email = $("#edit-staff-email").val();

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
                    if(isStaffUserEmailValid) {
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
