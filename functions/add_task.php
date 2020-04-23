<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrator</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="../js/scripts.js"></script>

</head>

<style>
    body {
        background-color: #800000;
        background-image: url('../imgs/Mapple.png');
        background-repeat: no-repeat;
    }
</style>

<body>

    <?php

    include("../functions/db.php");

    if (isset($_POST['record_task_btn'])) {

        $git_u_email   = $_POST['user_email'];
        $git_proyect   = $_POST['git_proyect2'];
        $git_status    = $_POST['adds'];
        $git_url       = ("https://github.com/mapplepii/"."$git_proyect".".git");
        $git_comments  = $_POST['comments'];
        $git_S_time    = $_POST['start_time'];
        $git_E_time    = $_POST['end_time'];
        $git_T_hour    = $_POST['total_hours'];


        $result_user = mysqli_query($conn, "SELECT id_u FROM users WHERE email = '$git_u_email'");
        $result_proyect = mysqli_query($conn, "SELECT id FROM proyect WHERE name_p = '$git_proyect'");
        while ($uservalue = mysqli_fetch_array($result_user)) {
            $userval = $uservalue['id_u'];
        };
        while ($proyectvalue = mysqli_fetch_array($result_proyect)) {
            $proyectval = $proyectvalue['id'];
        };

        //$gentry_date = date('d/m/Y');
        $sqlquerytask = ("INSERT INTO gituser (git_proyect, git_branch, start, end, hours, 
        u_comment, git_user_email) 
        VALUES ('$proyectval', '$git_url', '$git_S_time', '$git_E_time', '$git_T_hour', 
            '$git_comments', '$userval')");

        $updst = mysqli_query($conn, "UPDATE proyect SET status = '$git_status' WHERE id = '$proyectval'");

        $result = mysqli_query($conn, $sqlquerytask);
        if (!$result) {
    ?>
            <script>
                taskboxfail('Failed to insert Record')
            </script>
        <?php
            die("Insert failed - ");
        }
        ?>
        <script>
            taskboxsuccess('Record added succesfully')
        </script>
    <?php
    }
    ?>

</body>

</html>