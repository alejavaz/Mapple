<?php

include("../db/db.php");

if (isset($_POST['save_evaluation'])) {
  
    $id_evaluation = $_POST['id_evaluation'];
    $approved_hours = $_POST['approved_hours'];
    $project_comments = $_POST['project_comments'];
    
    if ($approved_hours < 0.5) {
        $approved_hours = 0.5;
    }
    elseif ($approved_hours > 5) {
        $approved_hours = 5;
    }

    $query = "UPDATE gituser SET approved_hrs = '$approved_hours', l_comments =  '$project_comments' WHERE id_g = $id_evaluation";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
     }

    header('Location: ../views/team_lead_page.php'); 
    
}

?>
