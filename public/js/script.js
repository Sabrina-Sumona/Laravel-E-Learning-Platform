function checkUsername(val) {
    var check = /^[_a-z]+$/g;
    if (!check.test(val)) {
        $('#checktext').html('Only lower case latin letters and \'_\' are allowed!');
        $('#checktext').css('color', 'red');
    } else {
        $('#checktext').html('');
    }
}

function checkUserID(val) {
    var check = /^(?=.*[0-9])(?=.{9,})/g;
    if (!check.test(val)) {
        $('#checkID').html('ID must contain 9 digits!');
        $('#checkID').css('color', 'red');
    } else {
        $('#checkID').html('');
    }
}

function checkUserNo(val) {
    var check = /^(\+)?(88)?(0088)?01[0-9]{9}$/;
    if (!check.test(val)) {
        $('#checkNo').html('Please enter a valid mobile number!');
        $('#checkNo').css('color', 'red');
    } else {
        $('#checkNo').html('');
    }
}

function checkUsermail(val) {
    var check = /^([a-zA-Z0-9]\.?)+[^\.]@([a-zA-Z0-9]\.?)+[^\.]$/g;
    if (!check.test(val)) {
        $('#checkmail').html('Please enter a valid email address!');
        $('#checkmail').css('color', 'red');
        $('#email').val('');
    } else {
        $('#checkmail').html('');
    }
}

function checkUserpass(val) {
    var check = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[_!@#\$%\^&\*])(?=.{8,})/g;
    if (!check.test(val)) {
        $('#checkpass').html('Password must contain 8 characters and at least 1 lowercase letter, 1 uppercase letter, 1 number & 1 special character!');
        $('#checkpass').css('color', 'red');
        $('#email').val('');
    } else {
        $('#checkpass').html('');
    }
}
