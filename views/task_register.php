<?php
    include("../db/db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Register Page</title>
    <link rel="shortcut icon" href="../imgs/Mapple.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>

</head>

<body class="task_register_body">

<style>
        body {
            background-color: #800000;
            background-image: url('../imgs/Mapple.png');
            background-repeat: no-repeat;
        }
    </style>

    <header>

        <h1>Developer´s Module </h1>
        <div class="active_user">
        <h6>User: <?php echo $_SESSION['var']?></h6>
        </div>
        <br>
        <br>
        <div class="log_out_container">
            <form action="../general_login.php">
                <button type="input">Log out</button>
            </form>
        </div>

    </header>

    <form id="addtask" action="../functions/add_task.php" method="post">

        <section class="fieldset">

            <section class="header">
                <label for="user_email">User email: </label>
                <input type="text" size="auto" name="user_email" id="user_email" value="<?php echo $_SESSION['var']?>" onselect="selected_report('You can only read this!')" readonly>
            </section>

            <section class="submenu">
                <div class="a">

                    <p>Proyect:
                        <select name="git_proyect2" id="git_proyect2" method="post">
                            <!-- Opciones de la lista -->
                            <option id="0">Select...</option>
                            <?php
                            $query = $conn->query("SELECT * FROM proyect");
                            while ($valores = mysqli_fetch_array($query)) {
                                echo '<option id="' . $valores['id'] . '">' . $valores['name_p'] . '</option>';
                            }

                            ?>
                        </select>

                    </p>
                    <p>Current Status:</p>
                    <p></p>


                    <p>Url:</p>
                    <span class="auto_stamp" id="spURL"></span>

                    <br></br>

                    <p style="text-align:center">Task Status</p>
                    <label style="text-align:center" class="container">Open
                        <input type="radio" checked="checked" name="adds" value="1">
                        <span class="checkmark"></span>
                    </label>
                    <label style="text-align:center" class="container">In Progress
                        <input type="radio" name="adds" value="2">
                        <span class="checkmark"></span>
                    </label>
                    <label style="text-align:center" class="container">Closed
                        <input type="radio" name="adds" value="3">
                        <span class="checkmark"></span>
                    </label>
                    <p></p>
                    <p></p>
                    <p></p>
                </div>

                <div class="b">
                    Start Time: <p><input type="text" size='9' id="start_time" oninvalid="alert('You must fill out the form!');" name="start_time" value="" required /></p>
                    End Time: <p><input type="text" size='9' id="end_time" oninvalid="alert('You must fill out the form!');" name="end_time" value="" required /></p>
                    Total Hours: <p><input type="number" size='3' oninvalid="alert('You must fill out the form!');" name="total_hours" min="0.0" max="5" step="0.5" required /></p>

                </div>

                <div class="c">

                    <p><button class="hover" type="button" id="start_time_btn" name="start_time_btn" data-loading-text="Loading..." autocomplete="off" onclick="setStartTime()"> Start Task</button></p>
                    &nbsp;
                    <p><button class="hover" type="button" id="end_time_btn" name="end_time_btn" data-loading-text="Loading..." autocomplete="off" onclick="setEndTime()"> Finalize Task</button></p>
                    &nbsp;
                    <p><button class="hover" type="submit" id="record_task_btn" name="record_task_btn" data-loading-text="Loading..." autocomplete="off">Record Task</p>

                </div>

            </section>

            <section class="d">
                <p>Comments: </p>
                <p><textarea resize="none" rows="1" oninvalid="alert('You must fill out the form!');" name="comments" row="2" required></textarea></p>
            </section>



        </section>

    </form>


</body>

</html>