<?php

    include("db/db.php"); 
    

    $_SESSION['var'] = "0";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="js/scripts.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Mapple</title>
    <link rel="shortcut icon" href="imgs/Mapple.png">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="content">
        <img src="imgs/Mapple.png" alt="maple_logo" width="650px" height="650px" class="log_in_logo">
        <form action="functions/log_in_function.php" method="POST" id="log_in_form">
            <label for="user_email">E-mail: </label>
            <input type="email" name="user_email" id="user_email" autocomplete="off" onfocus="highlight_input(this)" onblur="white_input(this)">
            &nbsp;&nbsp;&nbsp;
            <label for="user_password">Password: </label>
            <input type="password" name="user_password" id="user_password" onfocus="highlight_input(this)" onblur="white_input(this)">
        </form>
        <br>
        <br>
        <button class="log_in_button" type="submit" form="log_in_form" name="logear"><span>Log in </span></button>
        <br>
        <br>
    </div>
</body>
</html>