<?php

include("../db/db.php");

if (isset($_POST['logear'])) {
  
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $access = 0;
    $user_role = 0;

    $query = "SELECT * FROM users";
    $result_tb_users = mysqli_query($conn, $query); 
        
        while($row = mysqli_fetch_assoc($result_tb_users)) {

            if ($user_email == $row["email"] && $user_password == $row["pass"] && $row["status"]){
                $access = 1;
                $user_role = $row["rol"];
            break;
            }
        }

        if ($access == 1) {
            if ($user_role == 1) {
                header('Location: ../views/task_register.php'); //developer
                $_SESSION['var'] = $user_email;
            }
            elseif ($user_role == 2) {
                header('Location: ../views/team_lead_page.php'); //team leader
                $_SESSION['var'] = $user_email;
            }
            else {
                header('Location: ../views/admin.php'); //admin
                $_SESSION['var'] = $user_email;
            }

        }  
        else {
            header('Location: ../views/access_denied.php');
        }    
}

?>
