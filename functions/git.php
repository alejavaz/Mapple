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
    }
</style>

<body>

    <?php

    include("../db/db.php");
    $getgit = (isset($_POST['gitname'])) ? $_POST['gitname'] : "";
    $getst = (isset($_POST['radio1'])) ? $_POST['radio1'] : "";
    $giturl = ("https://github.com/mapplepii/");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $resultg = mysqli_query($conn, "SELECT name_p from proyect where name_p = '$getgit'");
        if (mysqli_num_rows($resultg) > 0) {
    ?>
            <script>
                boxfail("GIT Proyect on Database")
            </script>
            <?php
        } else {

            if ($getst == 3) {
                $gitadd = ("INSERT INTO proyect (name_p, url, status, active) VALUES ('$getgit','$giturl$getgit.git','$getst',0)");
                mysqli_query($conn, $gitadd);
            ?>
                <script>
                    boxwarning("GIT Proyect added with status: Closed")
                </script>
            <?php
            } else {
                $gitadd = ("INSERT INTO proyect (name_p, url, status, active) VALUES ('$getgit','$giturl$getgit.git','$getst',1)");
                mysqli_query($conn, $gitadd);
            ?>
                <script>
                    boxsuccess("GIT Proyect added")
                </script>
    <?php
            }
        }
    }
    ?>

</body>

</html>