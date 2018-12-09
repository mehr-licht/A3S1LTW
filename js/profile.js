var elems = ['avatarEdit', 'profileEdit', 'passEdit']; //,

function toggleEdit(elem) {
    var x = document.getElementById(elems[elem]);
    x.style.display = ((x.style.display != 'block') ? 'block' : 'none');
}


/*
JS validators just to notify immediatly the user to correct his input.
real validation is implemented through Server-side validators
*/
function validateInputs() {
    return (validateEmail() && validateDate() && validateZip() && validatePhone() && validateNames());
}

function validateNames() {
    var country = document.getElementById('input-country');
    var city = document.getElementById('input-city');
    var name = document.getElementById('input-name');
    var re = /(^$)|^([a-zA-Z\u0080-\u024F]+(?:(\.) |-| |'))*[a-zA-Z\u0080-\u024F]*$/;
    var isok = true;
    if (!re.test(String(country.value).toLowerCase())) {
        isok = false;
        country.style.borderColor = 'red';
        country.style.borderStyle = 'thick';

        var el = country.nextSibling;
        el.style.color = 'red';
        el.textContent = ' not a valid country name';
    } else if (!re.test(String(city.value).toLowerCase())) {
        isok = false;
        city.style.borderColor = 'red';
        city.style.borderStyle = 'thick';

        var el2 = city.nextSibling;
        el2.style.color = 'red';
        el2.textContent = ' not a valid city name';
    } else if (!re.test(String(name.value).toLowerCase())) {
        isok = false;
        name.style.borderColor = 'red';
        name.style.borderStyle = 'thick';

        var el3 = name.nextSibling;
        el3.style.color = 'red';
        el3.textContent = ' not a valid name';
    }
    return isok;
}

function validatePhone() {
    var phone = document.getElementById('input-phone');
    var re = /(^$)|(^\d{9})|(^\+{1}\d{12})$/;
    if (!re.test(String(phone.value).toLowerCase())) {
        phone.style.borderColor = 'red';
        phone.style.borderStyle = 'thick';

        var el = phone.nextSibling;
        el.style.color = 'red';
        el.textContent = ' not a valid phone number';
    }
    return re.test(String(phone.value).toLowerCase());
}

function validateZip() {
    var zip = document.getElementById('input-zip');
    var re = /(^$)|^\d+\-\d+$/;
    if (!re.test(String(zip.value).toLowerCase())) {
        zip.style.borderColor = 'red';
        zip.style.borderStyle = 'thick';

        var el = zip.nextSibling;
        el.style.color = 'red';
        el.textContent = ' not a valid zipcode';
    }
    return re.test(String(zip.value).toLowerCase());
}

function validateEmail() {
    var email = document.getElementById('input-email');
    var re = /(^$)|^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(String(email.value).toLowerCase())) {
        email.style.borderColor = 'red';
        email.style.borderStyle = 'thick';

        var el = email.nextSibling;
        el.style.color = 'red';
        el.textContent = ' not a valid email address';
    }
    return re.test(String(email.value).toLowerCase());
}

function validateDate() {
    var birthday = document.getElementById('input-birthday');
    if (birthday.value != "") {
        var re = /((^$)|^([0-2][0-9]|(3)[0-1])(\-)(((0)[0-9])|((1)[0-2]))(\-)\d{4}$)|((^$)|^\d{4}(\-)(((0)[0-9])|((1)[0-2]))(\-)([0-2][0-9]|(3)[0-1])$)/;
        if (!re.test(String(birthday.value).toLowerCase())) {
            birthday.style.borderColor = 'red';
            birthday.style.borderStyle = 'thick';

            var el = birthday.nextSibling;
            el.style.color = 'red';
            el.textContent = ' not a valid date';
        }
        return (re.test(String(birthday.value).toLowerCase()));
    }
    return true;
}

function clearInputError(elem) {
    if ((el = document.getElementById(elem)).style.borderColor == 'red') {
        el.style.borderColor = '';
        el.style.borderStyle = '';

        el = el.nextSibling;
        el.textContent = '';
    }
}

/*
function toggleInput() {
    var y = document.getElementsByClassName('editable');

    for (var i = 0; i < y.length; i++) {
        y[i].style.display = ((y[i].style.display != 'block') ? 'block' : 'none');
    }
}
*/

/*
function editable() {
    alert(document.getElementById('profile-name').innerText);
}*/