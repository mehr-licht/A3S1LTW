var defaultText = 'Click me and enter some text';

var open = '../res/glyphicons-eye-open.svg';
var close = '../res/glyphicons-eye-close.svg';
var ele = document.getElementClassName('password');

document.getElementsByClassName("toggler-ico").onclick = function() {
    alert("aqui");
    alert(document.getElementById('profile-name').innerText);
    if (this.classList.contains(open)) {
        ele.type = "text";
        this.classList.remove(open);
        this.className += ' ' + close;
    } else {
        ele.type = "password";
        this.classList.remove(close);
        this.className += ' ' + open;
    }
}


function editable() {
    alert(document.getElementById('profile-name').innerText);
}



function endEdit(e) {
    var input = $(e.target),
        label = input && input.prev();

    label.text(input.val() === '' ? defaultText : input.val());
    input.hide();
    label.show();
}

$('.editable').hide()
    .focusout(endEdit)
    .keyup(function(e) {
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
            endEdit(e);
            return false;
        } else {
            return true;
        }
    })
    .prev().click(function() {
        $(this).hide();
        $(this).next().show().focus();
    });

*/
    
