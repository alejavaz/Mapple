<?php include("../functions/db.php"); ?>

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
<style>
    body {
        background-color: #800000;
        background-image: url('imgs/Mapple.png');
        background-repeat: no-repeat;
    }
</style>

<body>
    <header>
        <img src="../imgs/Mapple.png" alt="Mapple_Logo">
        <h1>Developer´s Module </h1>
        <div class = "logout">
            <p><button class = "menubtn btn-lg" id="menubtn" type="button" onClick="javascript:clickinner(this);">Exit</button></p>
        </div>
    </header>

    <fieldset>
        <!--< Task Register Page >-->
        <form action="../functions/add_task.php" methot="GET">
            <div>
            <label for="user_email">User email: </label>
              <input type="text" size="30%" name="user_email" id="user_email" value="" onselect="selected_report('You can only read this!')" >
              &nbsp;
            <!--    User email: <input type="email" name="user_email" />--><p></p>
                <p></p>
                <p></p>            
            </div>
            
            <section>
                <artticle>
                    <form>
                        <!--Lista de selección -->

                        Git Proyect
                        <select name="git_proyect">
                            <!-- Opciones de la lista -->
                            <?php
                            $connect = new MySqli('localhost', 'root', '', 'mapple');
                            $query = $connect -> query ("SELECT * FROM proyect");
                            while ($valores = mysqli_fetch_array($query)) {
                            echo '<option ="'.$valores[id].'">'.$valores[url].'</option>';
                            }
                            ?>
                        </select>   

                        <p></p>
                        <p></p>  
                        <div>
                            Git Branch: <input type="text" oninvalid="alert('You must fill out the form!');" name="git_branch" required/><p></p>
                            <p></p>
                        </div>

                        <article>
                            <form>
                                <!-- Lista de selección -->
                                Task status
                                <select name="status">
                                    <!-- Opciones de la lista -->
                                    <option value="1">Open</option>
                                    <option value="2">Closed</option>
                                    <option value="3" selected>In Progress</option>
                                    <option value="4" selected>Deleted</option>
                                    <!--<option value="Deleted">Deleted</option>-->
                                </select>                                
                                <p></p>
                                <p></p>
                                Comments: <textarea oninvalid="alert('You must fill out the form!');" name="comments" row="2" required></textarea>
                            </form>
                        </article>
                    </form>                                      
                </artticle>
                
                <div>
                    <section>
                    <timer>
    	                Start Time: <input type="text" id="start_time" oninvalid="alert('You must fill out the form!');" name="start_time" value="" required/><p></p>
                        End Time: <input type="text" id="end_time" oninvalid="alert('You must fill out the form!');" name="end_time" value="" required/><p></p>
                        <p></p>
                        <p></p>
    	            </timer>

                        <label for="quantity"></label>  
                        Total Hours: <input type="number" oninvalid="alert('You must fill out the form!');"name="total_hours" min="0.5" max="5" step="0.5" required/> 
                            <p></p>
                        <div class="btns">
                            <button type="button" id="start_time_btn" name = "start_time_btn" class="btn btn-success btn-lg" data-loading-text="Loading..." autocomplete="off" onclick="setStartTime()"> Start Task</button>
                            <button type="button" id="end_time_btn" name = "end_time_btn" class="btn btn-primary btn-lg" data-loading-text="Loading..." autocomplete="off" onclick="setEndTime()"> Finalize Task</button>
                            
                            <div class="record_task_btn">
                                <button type="submit"  name="record_task_btn" onclick="alert('Finished task: Thanck you!')" class="btn btn-danger btn-lg" id="record_task_btn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Record task</button>
                            </div>
                                               
                        </div>
                    
                    </section>                        
                    <script>
                        function setStartTime();

                        function setEndTime();

                        function selected_report(message);

                        function clickinner(logout);
                    </script>
                </div>
            <section>                    
        </form>
    </fieldset>    

</body>
</html>

