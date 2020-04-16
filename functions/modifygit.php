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
    include("../db/db.php");
    $getgit = (isset($_POST['gitname'])) ? $_POST['gitname'] : "";
    $gitnew = (isset($_POST['gitnew'])) ? $_POST['gitnew'] : "";
    $getst = (isset($_POST['radio1'])) ? $_POST['radio1'] : "";
    $giturl = ("https://github.com/mapplepii/");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $resultm = mysqli_query($conn, "SELECT name_p from proyect where name_p = '$getgit'");
        $resultdiff = mysqli_query($conn, "SELECT name_p from proyect where name_p = '$gitnew' and '$getgit' <> '$gitnew'");
        $resultupd = mysqli_query($conn, "SELECT name_p from proyect where name_p = '$getgit' and name_p <> '$gitnew'");
        $resultupd2 = mysqli_query($conn, "SELECT name_p from proyect where name_p = '$getgit' and '$getgit' = '$gitnew'");

        if (mysqli_num_rows($resultm) == 0) {
    ?>
            <script>
                boxfail("'Current GIT Proyect' not in Database")
            </script>
        <?php

        } elseif (mysqli_num_rows($resultdiff) > 0) {

        ?>
            <script>
                boxfail("'New GIT Proyect' in Database")
            </script>
            <?php
        } elseif ((mysqli_num_rows($resultupd) > 0)) {
            $gitupd = ("UPDATE proyect SET name_p = '$gitnew', url = '$giturl$gitnew', status = '$getst' WHERE name_p = '$getgit'");
            mysqli_query($conn, $gitupd);
            if ($getst == 3) {
                mysqli_query($conn, "UPDATE proyect SET active=0 WHERE name_p = '$gitnew'");
            ?>
                <script>
                    boxwarning("GIT Proyect modified with status: Finished a")
                </script>
            <?php
            } else {
                mysqli_query($conn, "UPDATE proyect SET active=1 WHERE name_p = '$gitnew'");
            ?>
                <script>
                    boxsuccess("GIT Proyect modified successfully a")
                </script>
            <?php
            }
        } elseif ((mysqli_num_rows($resultupd2) > 0)) {
            $gitupd2 = ("UPDATE proyect SET status = '$getst' WHERE name_p = '$getgit'");
            mysqli_query($conn, $gitupd2);
            if ($getst == 3) {

                mysqli_query($conn, "UPDATE proyect SET active=0 WHERE name_p = '$gitnew'");
            ?>
                <script>
                    boxwarning("GIT Proyect modified with status: Finished")
                </script>
            <?php
            } else {
                mysqli_query($conn, "UPDATE proyect SET active=1 WHERE name_p = '$gitnew'");

            ?>
                <script>
                    boxsuccess("GIT Proyect modified successfully")
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                boxerror("Verify entered information")
            </script>
    <?php
        }
    } // conexion exitosa
    ?>
</body>

</html>