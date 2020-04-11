// -------------------- ADMIN PAGE ------------------- //

function boxsuccess(message) {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '<b class="warning">Transaction Success: </b>',
        html: '<b class="popup"> ' + message + '</b>',
        background: '#FFCC70',
        confirmButtonColor: '#880000'
    }).then(okay => {
        if (okay) {
            window.location.href = "../views/admin.php";
        }
    });
}

function boxwarning(message) {
    Swal.fire({
        position: 'center',
        icon: 'info',
        title: '<b class="warning">Warning: </b>',
        html: '<b class="popup"> ' + message + '</b>',
        background: '#FFCC70',
        confirmButtonColor: '#880000'
    }).then(okay => {
        if (okay) {
            window.location.href = "../views/admin.php";
        }
    });
}

function boxfail(message) {
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: '<b class="warning">Transaction Fail: </b>',
        html: '<b class="popup">' + message + '</b>',
        background: '#FFCC70',
        confirmButtonColor: '#880000'
    }).then(okay => {
        if (okay) {
            window.location.href = "../views/admin.php";
        }
    });
}

function confirm_delete(deletebox) {
    if (deletebox) {
        document.getElementById("delete").disabled = false;
    } else {
        document.getElementById("delete").disabled = true;
    }
}

function change_button(checkbx,button_id) {
    var btn = document.getElementById(button_id);
    if (checkbx.checked == true) {
        btn.disabled = "";
    } else {
        btn.disabled = "disabled";
    }
}

