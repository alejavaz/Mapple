<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Register Page</title>
    <link rel="shortcut icon" href="../imgs/Mapple.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

</head>
<body>
    <header>
        <img src="../imgs/Mapple.png" alt="Mapple_Logo">
        <h1>Task Register Module </h1>
    </header>

    <fieldset>
        <!--<legend> Task Register Page</legend>-->
        <form action="" methot="POST">
            <section>
                User email: <input type="email" name="user_email" /><p></p>
                <p></p>
                <p></p>            
            </section>
            <artticle>
                <div>
                <form>
                    <!-- Lista de selección -->
                    GIT Proyect:
                    <select name="git_proyect">
                        <!-- Opciones de la lista -->
                        <option value="GitProyect1">GIT Proyect #1</option>
                        <option value="GitProyect2">GIT Proyect #2</option> <!-- Opción por defecto -->
                        <option value="GitProyect3">GIT Proyect #3</option>
                    </select>
                    </form>
                    <p></p>
                    <p></p>
                    <!--Git Proyect: <input type="text" name="git_proyect" /><p></p>-->  
                    <div>
                    Git Branch: <textarea name="git_branch" ></textarea><p></p>
                    <p></p>
                    </div>
                    <form>
                    <!-- Lista de selección -->
                    Task status:
                    <select name="status">
                        <!-- Opciones de la lista -->
                        <option value="inProgress">InProgress</option>
                        <option value="finished" selected>Finished</option> <!-- Opción por defecto -->
                        <option value="pending">Pending</option>
                    </select>
                    </form>   
                    <!--Task Status: <input type="status" name="task_status" /><p></p>-->
                    <p></p>
                    <p></p>
                    Comments: <textarea name="comments" row="2"></textarea>
                    <p></p>
                </div>
                <artticle>
                    <div>
                        <div>
                            <div>
                                Start Time: <input type="datetime-local" name="start_time" /><p></p>
                            </div>  
                            <div>  
                                End Time: <input type="datetime-local" name="end_time" /><p></p>
                                <p></p>
                                <p></p>
                            </div>
                            <div>
                                <label for="quantity"></lavel>  
                                Total Hours: <input type="number" name="total_hours" 
                                min="0.5" max="5" step="0.5"/><p></p>
                                <p></p>
                                <p></p>
                            </div>
                        </div>    
                        <div class="btn_finalize">    
                            <input type="button" onclick="alert('Finished task: Thanck you!')" 
                            name="finalize" value="Finalize Task"/>                            
                        </div>
                    </div>
                </artticle>
            <artticle>
        </form>

    
</body>
</html>

<?php

?>