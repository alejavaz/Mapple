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
                    Git Proyect: <input type="text" name="git_proyect" /><p></p>  
                    Git Branch: <textarea name="git_branch" ></textarea><p></p>
                    <p></p>   
                    Task Status: <input type="status" name="task_status" /><p></p>
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
                                Total Hours: <input type="number" name="total_hours" /><p></p>
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