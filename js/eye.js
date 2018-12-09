var open = '../res/glyphicons-eye-open.svg';
var close = '../res/glyphicons-eye-close.svg';
var ele = document.getElementsByClassName('password');


function togglePass(which) {

    var passwords = document.getElementsByClassName('passEdit');
    for (var i = 0; i < passwords.length; i++) {
        if (i == which) {
            passwords[i].type === 'password' ? passwords[i].type = 'text' : passwords[i].type = 'password';
            if (passwords[i].classList.contains('open')) {
                passwords[i].nextElementSibling.children[0].src = "../res/glyphicons-eye-open.svg";
                passwords[i].classList.remove('open');
                passwords[i].className += ' ' + 'close';
            } else {
                passwords[i].nextElementSibling.children[0].src = "../res/glyphicons-eye-close.svg";
                passwords[i].classList.remove('close');
                passwords[i].className += ' ' + 'open';
            }
        }

    }
}