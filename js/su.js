function validateNameSignup() {

    var name2 = document.getElementById('SignupUsername');
    var el = name2.nextSibling;
    var re = /^[0-9a-zA-Z]+(?:[ _.-][0-9a-zA-Z]+)*$/;

    if (!re.test(String(name2.value).toLowerCase())) {
        name2.style.borderColor = 'red';
        name2.style.borderStyle = 'solid';
        name2.style.borderWidth = '3px';

        el.style.color = 'red';
        el.textContent = ' use only letters, numbers and underscores';
    } else {
        name2.style.borderColor = '';
        name2.style.borderStyle = '';
        name2.style.borderWidth = '';

        el.textContent = '';
    }
    return re.test(String(name2.value).toLowerCase());
}

function validateEmailSignup() {
    var email = document.getElementById('signupEmail');
    var el = email.nextSibling;
    var re = /(^$)|^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(String(email.value).toLowerCase())) {
        email.style.borderColor = 'red';
        email.style.borderStyle = 'solid';
        email.style.borderWidth = '3px';

        el.style.color = 'red';
        el.textContent = ' not a valid email address';
    } else {
        email.style.borderColor = '';
        email.style.borderStyle = '';
        email.style.borderWidth = '';

        el.textContent = '';
    }
    return re.test(String(email.value).toLowerCase());
}


function checkPassword(pwd) {
    var error = "";
    var el = document.getElementById(pwd);
    var isok = true;
    var re = /[0-9]+/;
    var re1 = /[a-zA-Z]+/;
    if ((el.value).length < 8) {
        isok = false;
        error = " Password too short!";
    } else if (!re.test(String(el.value).toLowerCase())) {
        isok = false;
        error = " Password must include at least one number!";
    } else if (!re1.test(String(el.value).toLowerCase())) {
        isok = false;
        error = " Password must include at least one letter!";
    }

    if (error != "") {

        el.style.borderColor = 'red';
        el.style.borderStyle = 'solid';
        el.style.borderWidth = '3px';
        el = el.nextSibling;
        el.textContent = error;
    } else {

        el.style.borderColor = '';
        el.style.borderStyle = '';
        el.style.borderWidth = '';

        el = el.nextSibling;
        el.textContent = '';
    }
    return isok;
}

function matchingPasswords() {
    if (document.getElementById("SignupRepeatPwd").value != document.getElementById("SignupPwd").value) {
        document.getElementById("SignupRepeatPwd").style.borderColor = 'red';
        document.getElementById("SignupRepeatPwd").style.borderStyle = 'solid';
        document.getElementById("SignupRepeatPwd").style.borderWidth = '3px';
        document.getElementById("SignupRepeatPwd").nextSibling.textContent = " Passwords don't match";
        return false;
    }
    return true;
}

/*
JS validators just to notify immediatly the user to correct his input.
real validation is implemented through Server-side validators
*/
function validateFields() {
    return (validateEmailSignup() && checkPassword() && validateNameSignup()) && matchingPasswords();
}