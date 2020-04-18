<?php include("../db/db.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../imgs/Mapple.png">

    <title>Administrator</title>

    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="../js/scripts.js"></script>
    <script src="../js/jquery.tabledit.js"></script>
    <script src="../js/jquery.tabledit.min.js"></script>


</head>

<body>
    <style>
        body {
            background-color: #800000;
            background-image: url('../imgs/Mapple.png');
            background-repeat: no-repeat;
        }
    </style>

    <section>
        <div class="active_user">
            <h6>User: <?php echo $_SESSION['var'] ?></h6>
        </div>
        <br>
        <br>
        <div class="log_out_container">
            <br>
            <form action="../general_login.php">
                <button type="input">Log out</button>
            </form>
        </div>
        <br>
    </section>

    <section class="paddmenu" style="margin-left: 42%" ;>
        <div>
            <input type="image" class="modbotton modbotton1" src="../imgs/comb.png" data-toggle="modal" data-target="#modaladd">
            <h3 class="modalactionbut">Add / Modify user</h3>
            <div id="modaladd" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div>
                        <div class="modalstyle">
                            <form id="adduser" for autocomplete="off" action="../functions/adduser.php" method="post">
                                <p><label for="">User: </label></p>
                                <p><input type="email" name="getuser" id="" size="30" onfocus="highlight_input(this)" onblur="white_input(this)"> </p>
                                <p><label for="">Edit user name: </label>
                                    <input type="checkbox" id="modusr" onfocus="highlight_input(this)" onblur="white_input(this)" onclick="change_button(this,'sub3')" /></P>
                                <p><input type="email" name="getnewuser" id="sub3" size="30" disabled="disabled"> </p>
                                <p><label for="">Set password: </label></p>
                                <p> <input type="text" name="getpass" id="" size="30" onfocus="highlight_input(this)" onblur="white_input(this)"> </p>
                                <p><label for="">Select role: </label></p>
                                <P></P><label class="container">Developer
                                    <input type="radio" checked="checked" name="addu" value="1">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Team Lead
                                    <input type="radio" name="addu" value="2">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Admin
                                    <input type="radio" name="addu" value="3">
                                    <span class="checkmark"></span>
                                </label></P>
                                <p><input class="hover" type="submit" value="Add / Update user" name="enviar" /></p>
                                <p>
                                    <p>
                                        <H1 style="font-size: 25px; font-weight: bold">Active users:</H1>
                                        <div>
                                            <?php
                                            $connect = new MySqli('localhost', 'root', '', 'mapple');
                                            $resultSet = mysqli_query($connect, "SELECT u.id_u, u.pass, u.email, r.rol FROM users u JOIN roles r ON id_r = u.rol WHERE status = 1 ORDER BY u.email");
                                            ?>
                                            <select size='3' name='email'>
                                                <?php
                                                while ($rows = $resultSet->fetch_assoc()) {
                                                    $user_name = $rows['email'];
                                                    $user_pass = $rows['pass'];
                                                    $user_id = $rows['id_u'];
                                                    $user_rol = $rows['rol'];
                                                    echo "<option value='$user_id'>$user_name - $user_pass - $user$user_rol</option>";
                                                }
                                                ?></select>
                                        </div>
                                        <p>
                                            <H1 style="font-size: 25px; font-weight: bold">Inactive users:</H1>
                                            <div>
                                                <?php
                                                $connect = new MySqli('localhost', 'root', '', 'mapple');
                                                $resultSet = mysqli_query($connect, "SELECT u.id_u, u.email, r.rol FROM users u JOIN roles r ON id_r = u.rol WHERE status = 0 ORDER BY u.email");
                                                ?>
                                                <select size='3' name='email'>
                                                    <?php
                                                    while ($rows = $resultSet->fetch_assoc()) {
                                                        $user_name = $rows['email'];
                                                        $user_id = $rows['id_u'];
                                                        $user_rol = $rows['rol'];
                                                        echo "<option value='$user_id'>$user_name - $user_rol</option>";
                                                    }
                                                    ?></select>
                                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="paddmenu" style="margin-left: 38%" ;>

        <div>
            <input type="image" class="modbotton modbotton1" src="../imgs/comb.png" data-toggle="modal" data-target="#modaldelete">
            <h3 class="modalactionbut">Delete user</h3>
            <div id="modaldelete" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div>
                        <div class="modalstyle" style="width: 450px;">
                            <form id="deleteuser" for autocomplete="off" action="../functions/deleteuser.php" method="post">
                                <p><label for="">User: </label>
                                    <input type="email" name="delusuario" id="" size="30" onfocus="highlight_input(this)" onblur="white_input(this)"></p>
                                <p><label class="container">Confirm Delete
                                        <input type="checkbox" id="confirmdelete" value="1" onclick="confirm_delete(this)" /></P>
                                <P><button class="hover" type="submit" id="delete" disabled>Delete </button></p>
                                <p>
                                    <H1 style="font-size: 25px; font-weight: bold">Active users:</H1>
                                </p>
                                <div>
                                    <?php
                                    $connect = new MySqli('localhost', 'root', '', 'mapple');
                                    $resultSet = mysqli_query($connect, "SELECT u.id_u, u.email, r.rol FROM users u JOIN roles r ON id_r = u.rol WHERE status = 1 ORDER BY u.email");
                                    ?>
                                    <select size='5' name='email'>
                                        <?php
                                        while ($rows = $resultSet->fetch_assoc()) {
                                            $user_name = $rows['email'];
                                            $user_id = $rows['id_u'];
                                            $user_rol = $rows['rol'];
                                            echo "<option value='$user_id'>$user_name - $user_rol</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="paddmenu" style="margin-left: 42%" ;>

        <div>
            <input type="image" class="modbotton modbotton1" src="../imgs/comb.png" data-toggle="modal" data-target="#modaladdgit">
            <h3 class="modalactionbut">Add GIT proyect</h3>
            <div id="modaladdgit" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div>
                        <div class="modalstylegit">
                            <form id="addgit" for autocomplete="off" action="../functions/git.php" method="post">
                                <section>
                                    <div class=git1>
                                        <p><label for="">GIT proyect: </label></p>
                                        <p><input type="text" name="gitname" id="" size="30" onfocus="highlight_input(this)" onblur="white_input(this)"> </p>
                                        <label class="container">Open
                                            <input type="radio" checked="checked" name="radio1" value="1">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">In Progress
                                            <input type="radio" name="radio1" value="2">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">Closed
                                            <input type="radio" name="radio1" value="3">
                                            <span class="checkmark"></span>
                                        </label>
                                        <p><label class="container">Confirm GIT Proyect

                                                <input type="checkbox" id="addgit" onclick="change_button(this,'sub1')" /></P>
                                        <p><input class="hover2" type="submit" name="submit" value="Add" id="sub1" disabled="disabled" /></p>
                                        </label>
                                        <div class=git3>
                                            <H1 style="font-size: 25px; font-weight: bold; float:left">GIT Proyects: </H1>
                                            <div>
                                                <?php
                                                $connect = new MySqli('localhost', 'root', '', 'mapple');
                                                $resultSet = mysqli_query($connect, "SELECT p.id, p.name_p, s.status FROM proyect p JOIN status s on s.id_s = p.status");
                                                ?>
                                                <select size='3' name='proyect'>
                                                    <?php
                                                    while ($rows = $resultSet->fetch_assoc()) {
                                                        $user_proyect = $rows['name_p'];
                                                        $user_status = $rows['status'];
                                                        echo "<option value='$user_url'>$user_proyect - $user_status</option>";
                                                    }
                                                    ?></select>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="paddmenu" style="margin-left: 47%" ;>
        <div>
            <input type="image" class="modbotton modbotton1" src="../imgs/comb.png" data-toggle="modal" data-target="#modalmodgit">
            <h3 class="modalactionbut">Modify GIT proyect</h3>
            <div id="modalmodgit" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div>
                        <div class="modalstylegit">
                            <form id="modgit" for autocomplete="off" action="../functions/modifygit.php" method="post">
                                <section>
                                    <div class=git1>
                                        <p><label for="">Current GIT proyect: </label></p>
                                        <p><input type="text" name="gitname" id="" size="30" onfocus="highlight_input(this)" onblur="white_input(this)"> </p>
                                        <p><label for="">Update GIT proyect properties to: </label></p>
                                        <p><input type="text" name="gitnew" id="" size="30" onfocus="highlight_input(this)" onblur="white_input(this)"> </p>
                                        <label class="container">Open
                                            <input type="radio" checked="checked" name="radio1" value="1">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">In Progress
                                            <input type="radio" name="radio1" value="2">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">Closed
                                            <input type="radio" name="radio1" value="3">
                                            <span class="checkmark"></span>
                                        </label>
                                        <p><label class="container">Confirm modification -
                                                <input type="checkbox" id="addgit" onclick="change_button(this,'sub2')" />
                                                <p><input class="hover2" type="submit" name="submit" value="Modify" id="sub2" disabled="disabled" /></p>
                                            </label></p>
                                        <div class=git3>
                                            <H1 style="font-size: 25px; font-weight: bold; float:left">GIT Proyects: </H1>
                                            <div>
                                                <?php
                                                $connect = new MySqli('localhost', 'root', '', 'mapple');
                                                $resultSet = mysqli_query($connect, "SELECT p.id, p.name_p, s.status FROM proyect p JOIN status s on s.id_s = p.status");
                                                ?>
                                                <select size='3' name='proyect'>
                                                    <?php
                                                    while ($rows = $resultSet->fetch_assoc()) {
                                                        $user_proyect = $rows['name_p'];
                                                        $user_url = $rows['url'];
                                                        $user_status = $rows['status'];
                                                        echo "<option value='$user_url'>$user_proyect - $user_status</option>";
                                                    }
                                                    ?></select>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="paddmenu" style="margin-left: 47%" ;>
        <div>
            <a href="../functions/modifyreport.php">
                <img class="modbotton modbotton1" src="../imgs/comb.png">
                <h3 class="modalactionbut">Modify Report</h3>
            </a>
        </div>

    </section>

    <section class="paddmenu" style="margin-left: 42%" ;>

        <div>
            <input type="image" class="modbotton modbotton1" src="../imgs/comb.png" data-toggle="modal" data-target="#modaldev">
            <h3 class="modalactionbut">Report by Developer</h3>
            <div id="modaldev" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div>
                        <div class="modalstyle2">
                            <?php
                            $showdev = mysqli_query($conn, "SELECT u.email, sum(g.hours) as 'dv', sum(g.approved_hrs) as 'tl'
                                FROM users u  
                                JOIN gituser g 
                                WHERE u.id_u = g.git_user_email
                                GROUP BY u.email
                                ORDER BY u.email ASC");
                            ?>

                            <table class="tablecontent" id="editable_table">
                                <thead>
                                    <tr>
                                        <th>Developer</th>
                                        <th>Reported Hours</th>
                                        <th>Approved Hours</th>
                                    </tr>
                                </thead>
                                <?php
                                if ($showdev) {
                                    foreach ($showdev as $row) {
                                ?>
                                        <tbody>
                                            <td> <?php echo $row['email']; ?></td>
                                            <td> <?php echo $row['dv']; ?></td>
                                            <td> <?php echo $row['tl']; ?></td>
                                        </tbody>
                                <?php
                                    }
                                } else {
                                    echo "No records Found";
                                }
                                ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>