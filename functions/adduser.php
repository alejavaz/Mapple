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

    $getuser = (isset($_POST['getuser'])) ? $_POST['getuser'] : "";
    $newuser = (isset($_POST['getnewuser'])) ? $_POST['getnewuser'] : "";
    $getpass = (isset($_POST['getpass'])) ? $_POST['getpass'] : "";
    $addu = (isset($_POST['addu'])) ? $_POST['addu'] : "";


    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {

        if ($getuser == NULL) {
    ?>
            <script>
                boxfail("Blank 'User' information")
            </script>
            <?php
        } else {
            if ($newuser == NULL) {
                $resultf = mysqli_query($conn, "SELECT email from users where email = '$getuser' AND status >= 0");
                if (mysqli_num_rows($resultf) < 1) {
                    mysqli_query($conn, "INSERT INTO users (email, pass, rol, status) VALUES ('$getuser','$getpass','$addu',1)");
            ?>
                    <script>
                        boxsuccess("User added")
                    </script>
                    <?php
                } else {

                    $resultu = mysqli_query($conn, "SELECT email from users where email = '$getuser' AND status = 0");
                    if (mysqli_num_rows($resultu) == 1) {
                        $st = 1;
                        $upd1 = ("UPDATE users SET pass = '$getpass', rol = '$addu', status = '$st' WHERE email = '$getuser'");
                        mysqli_query($conn, $upd1);
                    ?>
                        <script>
                            boxsuccess("User restored")
                        </script>
                    <?php
                    } else {
                        $st = 1;
                        $upd2 = ("UPDATE users SET pass = '$getpass', rol = '$addu', status = '$st' WHERE email = '$getuser'");
                        mysqli_query($conn, $upd2);
                    ?>
                        <script>
                            boxsuccess("User updated")
                        </script>



                    <?php
                    }
                }
            } else {

                $notfound = mysqli_query($conn, "SELECT email from users where email = '$getuser'");
                $duplicate = mysqli_query($conn, "SELECT email from users where email = '$getuser' AND '$getuser' = '$newuser'");
                $unregistered = mysqli_query($conn, "SELECT email from users where email = '$getuser' AND '$getuser' <> '$newuser' AND email <> '$newuser'");
                $registered = mysqli_query($conn, "SELECT email from users where email = '$newuser'");

                if (mysqli_num_rows($notfound) == 0) {
                    ?>
                    <script>
                        boxfail("User not found")
                    </script>
                <?php
                } elseif (mysqli_num_rows($duplicate) > 0) {
                    $upd3 = ("UPDATE users SET pass = '$getpass', rol = '$addu', status = status WHERE email = '$getuser'");
                    mysqli_query($conn, $upd3);
                ?>
                    <script>
                        boxsuccess("User updated")
                    </script>
                <?php
                } elseif (mysqli_num_rows($registered) > 0) {
                ?>
                    <script>
                        boxfail("Edited user on database")
                    </script>
                <?php
                } elseif (mysqli_num_rows($unregistered) > 0) {
                    $upd4 = ("UPDATE users SET email = '$newuser', pass = '$getpass', rol = '$addu', status = status  WHERE email = '$getuser'");
                    mysqli_query($conn, $upd4);
                ?>
                    <script>
                        boxsuccess("User was updated")
                    </script>
    <?php

                }
            }
        }
    }
    ?>
</body>

</html>