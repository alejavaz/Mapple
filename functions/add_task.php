<?php

include ("../functions/db.php");

if (isset($_GET['record_task_btn'])){
    $git_u_email   = $_GET['user_email'];
    $git_proyect   = $_GET['git_proyect'];
    $git_branch    = $_GET['git_branch'];
    $git_status    = $_GET['status'];	
	$git_comments  = $_GET['comments'];
    $git_S_time	   = $_GET['start_time'];
    $git_E_time	   = $_GET['end_time'];
    $git_T_hour	   = $_GET['total_hours'];

    //$gentry_date = date('d/m/Y');

    $sqlquery = "INSERT INTO gituser (`git_proyect`, `git_user_email`, `git_branch`, `status`, `start`, `end`, `hours`, `u_comment`, `lead`, `approved_hrs`, `l_comments`) 
    VALUES ('$git_proyect', '$git_u_email', '$git_branch', '$git_status', '$git_S_time', '$git_E_time', '$git_T_hour', '$git_comments', NULL, NULL, NULL)";
    $result = mysqli_query($conn, $sqlquery);
    if(!$result) {
    die ("Insert failed - ");
    }

    echo ("Successfully inserted !!! - ");
    echo" <a href='http://localhost/PIIFINAL/Mapple/Views/task_register.php'> 
    - Back to Developer's Module - </a>";
}


?>
