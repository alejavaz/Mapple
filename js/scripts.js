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