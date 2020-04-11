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

    $useremail = (isset($_POST['delusuario'])) ? $_POST['delusuario'] : "";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$useremail' AND status=1");
        if (mysqli_num_rows($result) < 1) {
    ?>
            <script>
                boxfail('User not found')
            </script>
        <?php
        } else {
            $sqldelete = "UPDATE users SET status = '0' WHERE email = '$useremail'";
            $sqldelexec = mysqli_query($conn, $sqldelete);
        ?>
            <script>
                boxsuccess('User deleted')
            </script>
    <?php
        }
    }
    ?>

</body>

</html>