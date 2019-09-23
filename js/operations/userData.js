// Validations
let isEmailValid = false;
let isPassValid = false;
let isFirstFormValid = false;
let isSecondFormValid = false;

let isEmail = false;

let isForgotPasswordEmail = true;

// email validations
function email(email, id) {
    removeError(id);
    $.get("../../php/common/getData.php?table=user&column=email&value=" + email, function (data, status) {
        if (data != 'false') {
            isEmailValid = false;
            errorToggle(id, "Email already exits!", true);
        } else {
            isEmailValid = true;
            errorToggle(id, "Looks Good!", false);
        }
        let regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if(!regex.test(email)) {
            errorToggle(id, "Invalid Email!", true);
            isEmail = false;
        }else{
            isEmail = true;
        }
    });
}

// forgot password email validations
function validateForgotPasswordEmail(email, id) {
    removeError(id);
    $.get("../../php/common/getData.php?table=user&column=email&value=" + email, function (data, status) {
        if (data === 'false') {
            isForgotPasswordEmail = false;
            errorToggle(id, "Email not exits!", true);
        } else {
            isForgotPasswordEmail = true;
            errorToggle(id, "Looks Good!", false);
        }
        let regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if(!regex.test(email)) {
            errorToggle(id, "Invalid Email!", true);
            isForgotPasswordEmail = false;
        }else{
            isForgotPasswordEmail = true;
        }
    });
}

function sendNewPasswordToEmail() {
    $("#forgotBtn").hide();
    $("#forgot-spinner").show();

    let email = $("#forgot-password-email-input").val();

    if(email === '') {
        errorToggle("#email", "Required Field!", true);
        isForgotPasswordEmail = false;
    }
    if(isForgotPasswordEmail) {

        let newPassword = makePassword();

        $.post("/pages/php/updatePassword.php",
            {
                email: email,
                newPassword: newPassword
            },
            function (result) {
                if (result.trim() === '1') {
                    $.post("/php/phpemail/phpmail.php",
                        {
                            email: email,
                            newPassword: newPassword
                        },
                        function (result) {
                            $.confirm({
                                theme: 'modern',
                                icon: 'fa fa-check-circle',
                                title: 'Success!',
                                content: "Successfully sent new password to your email!",
                                draggable: true,
                                animationBounce: 2.5,
                                type: 'green',
                                typeAnimated: true,
                                buttons: {
                                    Delete: {
                                        text: 'Okay',
                                        btnClass: 'btn-success',
                                        action: function () {
                                            $("#forgotPasswordDataModel").modal('hide');
                                            $("#forgotBtn").show();
                                            $("#forgot-spinner").hide();
                                        }
                                    },

                                }
                            });

                        })
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
}

function makePassword() {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@";

    for (var i = 0; i < 8; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    console.log(text);
    return text;
}

// Password validation
function cmf_password(id) {
    if ($('#cmf-password-input').val()) {
        if ($('#cmf-password-input').val() != $("#password-input").val()) {
            isPassValid = false;
            errorToggle(id, "Password mismatched!", true);
        } else {
            isPassValid = true;
            errorToggle(id, "Looks Good!", false);
        }
    }
    if($('#password-input').val().length < 8){
        isPassValid = false;
        errorToggle("#password", "Password must be at least 8 characters!", true);
    }else {
        isPassValid = true;
        errorToggle("#password", "Looks Good!", false);
    }
}

// Error display function
function errorToggle(id, text_input, isError) {
    var element = $(id);
    var input_element = $(id + "-input");
    var err_element = $(id + "-input-error");
    if (isError) {
        err_element.text(text_input);
        err_element.show();
        input_element.removeClass('input-type-1');
        input_element.addClass('input-type-1-error');
        element.removeClass('bg-color-type-1 border-type-1');
        element.addClass("bg-color-type-1-error border-type-1-error");
    } else {
        err_element.hide();
        input_element.removeClass('input-type-1-error');
        input_element.addClass('input-type-1');
        element.removeClass('bg-color-type-1-error border-type-1-error');
        element.addClass("bg-color-type-1 border-type-1");

    }
}

// add user
function reg_user() {

    if($("#password-input").val() === "Required Field!"){
        removeError("#password");
    }
    if($("#cmf-password-input").val() === "Required Field!"){
        removeError("#cmf-password");
    }

    let Password = $("#password-input").val();
    let ConfirmPassword = $("#cmf-password-input").val();

    if(Password === ''){
        errorToggle("#password", "Required Field!", true);
    }if(ConfirmPassword === ''){
        errorToggle("#cmf-password", "Required Field!", true);
    }

    if (isEmailValid && isPassValid && isFirstFormValid && isSecondFormValid) {
        $("#register-btn").removeClass("btn-type-1-error");
        $("#register-btn").addClass("btn-type-1");
        $("#register-btn-input-error").hide();
        $('#final-button-section').fadeOut('fast', 'linear', function () {
            $('#register-spinner').fadeIn();
        });

        var fname = $('#fname-input').val();
        var sname = $('#sname-input').val();
        var gender =  $("input[name='gender']:checked").val();
        var bday = $('#birthday').val();
        var nic = $('#nic-input').val();
        var street = $('#street-address-input').val();
        var zipCode = $('#zipcode-input').val();
        var city = $('#city-input').val();
        var country = $('#country-input').val();
        var email = $('#email-input').val();
        var telephone = $('#telephone-input').val();

        var bloodType = $( "#blood-type" ).val();
        var weight = $( "#weight-input" ).val();
        var height = $( "#height-input" ).val();

        var password = $('#password-input').val();

        /*console.log(fname+" | "+sname+" | "+gender+" | "+bday+" | "+nic+" | "+street+" | "+zipCode+" | "+city+" | "+country+" | "+email+" | "+telephone+" | "+
        bloodType+" | "+weight+" | "+height+" | "+password);*/

        $.post("../../php/users/patientRegistration.php",
            {
                fname: fname,
                sname: sname,
                gender: gender,
                bday:bday,
                nic: nic,
                street: street,
                zipCode: zipCode,
                city: city,
                country: country,
                email: email,
                telephone: telephone,

                bloodType: bloodType,
                weight: weight,
                height: height,

                password: password,
            },

            function (result) {
                if (result == 1) {
                        $.confirm({
                            theme: 'modern',
                            icon: 'fa fa-check-circle',
                            title: 'Registration done!',
                            content: "Please login your account with credentials!",
                            draggable: true,
                            animationBounce: 2.5,
                            type: 'green',
                            typeAnimated: true,
                            buttons: {
                                Delete: {
                                    text: 'Login',
                                    btnClass: 'btn-success',
                                    action: function () {
                                        $("#fname-input").val("");
                                        $("#sname-input").val("");
                                        $("#birthday").val("");
                                        $("#nic-input").val("");
                                        $("#street-address-input").val("");
                                        $("#zipcode-input").val("");
                                        $("#city-input").val("");
                                        $("#country-input").val("");
                                        $("#email-input").val("");
                                        $("#telephone-input").val("");
                                        $("#blood-type").val("");
                                        $("#weight-input").val("");
                                        $("#height-input").val("");
                                        $('#cmf-password-input').val("");
                                        $("#password-input").val("");

                                        $('#register-model').modal('hide');
                                        $('#login-model').modal('show');
                                        $('#register-spinner').hide();
                                            $('#final-button-section').show();
                                    }
                                },
                                later: {
                                    text: 'Later',
                                    action: function () {
                                        $('#register-model').modal('hide');
                                        $('#register-spinner').hide();
                                        $('#final-button-section').show();
                                    }
                                }
                            }
                        });
                    // ************************** redirect to dashboard here ***************************
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
                                action: function () {
                                    $('#register-spinner').fadeOut('fast', 'linear', function () {
                                        $('#final-button-section').fadeIn();
                                    });
                                }
                            }
                        }
                    });
                }
            });

    } else {
        $("#register-btn-input-error").show();
        $("#register-btn").removeClass("btn-type-1");
        $("#register-btn").addClass("btn-type-1-error");
    }

}

function loginUser() {
    let email = $("#login-email-input").val();
    let password = $("#login-password-input").val();

    $.get("../../php/users/login.php/?email="+email+"&password="+password, function (data, status) {
        if (data.length!=0 && data != 'false') {
            $("#invalid-cred-error").hide();
            $("#login-btn").addClass("btn-type-1");
            $("#login-btn").removeClass("btn-type-1-error");
            $("#login-email-input").removeClass('input-type-1-error');
            $("#login-email-input").addClass('input-type-1');
            $("#login-password-input").removeClass('input-type-1-error');
            $("#login-password-input").addClass('input-type-1');
            $("#login-password").removeClass('bg-color-type-1-error border-type-1-error');
            $("#login-password").addClass("bg-color-type-1 border-type-1");
            $("#login-email").removeClass('bg-color-type-1-error border-type-1-error');
            $("#login-email").addClass("bg-color-type-1 border-type-1");
            let responseData = JSON.parse(data);
            switch(parseInt(responseData.type)) {
                case 1:
                    window.location.replace("/pages/patient.php");
                    break;
                case 2:
                    window.location.replace("/pages/doctor.php");
                    break;
                case 3:
                    window.location.replace("/pages/staff.php");
                    break;
                case 4:
                    window.location.replace("/pages/admin.php");
                    break;
                default:
                    window.location.replace("index.php");
            }
        }
        else {
            $("#invalid-cred-error").show();
            $("#login-btn").addClass("btn-type-1-error");
            $("#login-btn").removeClass("btn-type-1");
            $("#login-email-input").addClass('input-type-1-error');
            $("#login-email-input").removeClass('input-type-1');
            $("#login-password-input").addClass('input-type-1-error');
            $("#login-password-input").removeClass('input-type-1');
            $("#login-password").addClass('bg-color-type-1-error border-type-1-error');
            $("#login-password").removeClass("bg-color-type-1 border-type-1");
            $("#login-email").addClass('bg-color-type-1-error border-type-1-error');
            $("#login-email").removeClass("bg-color-type-1 border-type-1");
        }
    });
}

function showForgotPasswordModal() {
    $("#login-model").modal('hide');
    $("#forgotPasswordDataModel").modal('show');
}

function validateFirstStep(){
    let isValid = true;

    let fname = $("#fname-input").val();
    let sname = $("#sname-input").val();
    let bday = $("#birthday").val();
    let nic = $("#nic-input").val();
    let street = $("#street-address-input").val();
    let zipcode = $("#zipcode-input").val();
    let city = $("#city-input").val();
    let country = $("#country-input").val();
    let email = $("#email-input").val();
    let telephone = $("#telephone-input").val();

    if(fname === ''){
        errorToggle("#fname", "Required Field!", true);
        isValid = false;
    }if(sname === ''){
        errorToggle("#sname", "Required Field!", true);
        isValid = false;
    }if(bday === ''){
        $("#birthday-input-error").text("Required Field!");
        $("#birthday-input-error").show();
        isValid = false;
    }if(nic === ''){
        errorToggle("#nic", "Required Field!", true);
        isValid = false;
    }if(street === ''){
        errorToggle("#street-address", "Required Field!", true);
        isValid = false;
    }if(zipcode === ''){
        errorToggle("#zipcode", "Required Field!", true);
        isValid = false;
    }if(country === ''){
        errorToggle("#country", "Required Field!", true);
        isValid = false;
    }if(city === ''){
        errorToggle("#city", "Required Field!", true);
        isValid = false;
    }if(email === ''){
        errorToggle("#email", "Required Field!", true);
        isValid = false;
    }if(telephone === ''){
            errorToggle("#telephone", "Required Field!", true);
            isValid = false;
    }else if(!/^[0-9]+$/.test(telephone) || telephone.length !== 10){
            errorToggle("#telephone", "Invalid Contact", true);
            isValid = false;
    }
    if(!isValid){
        $("#firstContinueBtn").addClass("btn-type-1-error");
        $("#tab1-input-errors").show();
    }
    if(isValid && isEmail && isEmailValid){
        isFirstFormValid = true;
        $("#firstContinueBtn").removeClass("btn-type-1-error");
        $("#tab1-input-errors").hide();
        $("#medical").tab('show');
    }
}

function validateSecondStep(){
    let isVal = true;

    let bloodType = $("#blood-type").val();
    let weight = $("#weight-input").val();
    let height = $("#height-input").val();

    if(weight === ''){
        errorToggle("#weight", "Required Field!", true);
        isVal = false;
    }else if(weight<1 || weight>200 || !/^[0-9]+$/.test(weight)){
        errorToggle("#weight", "Invalid Weight!", true);
        isVal = false;
    }

    if(height === ''){
        errorToggle("#height", "Required Field!", true);
        isVal = false;
    }else if((height<1 || height>250) || !/^[0-9]+$/.test(height)){
        errorToggle("#height", "Invalid Height!", true);
        isVal = false;
    }

    if(bloodType === ''){
        $("#blood-type-input-error").text("Required Field!");
        $("#blood-type-input-error").show();
        isVal = false;
    }if(!isVal){
        $("#secondContinueBtn").addClass("btn-type-1-error");
        $("#tab2-input-errors").show();
    }
    if(isVal){
        isSecondFormValid = true;
        $("#secondContinueBtn").removeClass("btn-type-1-error");
        $("#tab2-input-errors").hide();
        $("#security").tab('show');
    }

}

function removeError(id){
    errorToggle(id, '', false);
}

function removeErrorInput(id){
    $(id).hide();
}

function checkTelephone(telephone, id){
    if(!/^[0-9]+$/.test(telephone) || telephone.length !== 10){
        errorToggle(id, "Invalid Contact", true);
    }else{
        removeError(id);
    }
}

function checkWeight(weight, id) {
    if(weight>1 && weight<200){
        removeError(id);
    }else{
        errorToggle(id, "Invalid Weight", true);
    }
}

function checkHeight(height, id) {
    if(height>1 && height<250){
        removeError(id);
    }else{
        errorToggle(id, "Invalid Height", true);
    }
}

