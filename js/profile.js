var elems = ['avatarEdit', 'passEdit']; //'profileEdit',

function toggleEdit(elem) {
    alert(elems[elem]);
    var x = document.getElementById(elems[elem]);
    x.style.display = ((x.style.display != 'block') ? 'block' : 'none');
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