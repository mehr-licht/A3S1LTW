var defaultText = 'Click me and enter some text';

var open = '../res/glyphicons-eye-open.svg';
var close = '../res/glyphicons-eye-close.svg';
var ele = document.getElementsByClassName('password');


var elems = ['avatarEdit', 'profileEdit', 'passEdit'];

function toggleEdit(elem) {
    var x = document.getElementById(elems[elem]);
    x.style.display = ((x.style.display != 'block') ? 'block' : 'none');

}


function toggleInput() {
    var y = document.getElementsByClassName('editable');
    for (var i = 0; i < y.length; i++) {
        y[i].style.display = ((y[i].style.display != 'block') ? 'block' : 'none');
    }
    /*  y.foreach((elemt) =>
        elemt.style.display = ((elemt.style.display != 'block') ? 'block' : 'none')
    )
*/
}


document.getElementsByClassName("toggler-ico").onclick = function() {
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