<?php
include("../db/db.php");


    $id2 = (isset($_POST['update_id'])) ? $_POST['update_id'] : "";
    $proyect = (isset($_POST['proyect'])) ? $_POST['proyect'] : "";
    $hours = (isset($_POST['hours'])) ? $_POST['hours'] : "";
    $leadhours = (isset($_POST['approved_hrs'])) ? $_POST['approved_hrs'] : "";
    $lcomments = (isset($_POST['l_comments'])) ? $_POST['l_comments'] : "";

    $query = "UPDATE gituser SET hours = '$hours', approved_hrs = '$leadhours', l_comments = '$lcomments' WHERE id_g = '$id2'";
    $apply = mysqli_query($conn,$query);

    if($apply){
        header("Location: modifyreport.php");
    }
?>