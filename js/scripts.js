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

function taskboxsuccess(message) {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '<b class="warning">Transaction Success: </b>',
        html: '<b class="popup"> ' + message + '</b>',
        background: '#FFCC70',
        confirmButtonColor: '#880000'
    }).then(okay => {
        if (okay) {
            window.location.href = "../views/task_register.php";
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

function taskboxfail(message) {
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: '<b class="warning">Transaction Fail: </b>',
        html: '<b class="popup">' + message + '</b>',
        background: '#FFCC70',
        confirmButtonColor: '#880000'
    }).then(okay => {
        if (okay) {
            window.location.href = "../views/task_register.php";
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

function highlight_input(x) {
    x.style.background = "#ffcc80";
}

function white_input(x) {
    x.style.background = "white";
}

function setStartTime(){
    document.getElementById('start_time').value = new Date().toLocaleTimeString();
//  document.getElementById('start_time').value = new Date().toLocaleString();
}

function setEndTime(){
    document.getElementById('end_time').value = new Date().toLocaleTimeString();
//  document.getElementById('end_time').value = new Date().toLocaleString();
}

function selected_report(message) {
    Swal.fire({
        position: 'center',
        icon: 'warning',
        title: '<b class="warning">Hey... </b>',
        html: '<b class="popup">' + message + '</b>',
        background: '#FFCC70',
        confirmButtonColor: '#880000'
    });
}

function clickinner(logout) { 
    location.href='general_login.php';
};

$(document).ready(function() {
    $("#git_proyect2").change(function() {
        $("#git_proyect2 option:selected").each(function() {
            idProyect = $(this).attr('id'); //almacena variable
            $.post("../functions/obtenerURL.php", { idProyect: idProyect }, function(data){
                $("#spURL").html(data);
               });
       });
    })
});

