<?php include("../db/db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General report</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
    <div class="content">
        <div class="active_user">
            <h6>User: <?php echo $_SESSION['var']?></h6>
        </div>
        <br>
        <br>
        <div class="log_out_container">
            <br>
            <form action="general_login.php">
                <button type="input">Log out</button>
            </form>
        </div>
        <br>
        <h2 class="leads_page_title">GENERAL REPORT</h2> 
        <br>        
        <br>        
        <!-- <img class="leads_page_logo" src="../imgs/Mapple.png" alt="mapple_logo" width="200px" height="200px"> -->
        <button class="go_back_btn_gral" id="go_back_btn" type="button" onClick="javascript:clickinner(this);">Go back</button>
        &nbsp;
        &nbsp;
        <?php
        $query = "SELECT 
                    pr.id,
                    pr.name_p,
                    pr.url,
                    pr.status,
                    gu.id_g,
                    gu.git_proyect,
                    gu.git_branch,
                    gu.start,
                    gu.end,
                    gu.hours,
                    gu.u_comment,
                    gu.lead,
                    gu.dev,
                    st.id_s,
                    st.status,
                    usr.id_u,
                    usr.email 
                FROM proyect pr
                LEFT JOIN gituser gu ON pr.id = gu.id_g
                LEFT JOIN status st ON pr.status = st.id_s
                LEFT JOIN users usr ON gu.dev = usr.id_u";
        $result_tb_projects = mysqli_query($conn, $query);    

        while($row = mysqli_fetch_assoc($result_tb_projects)) { ?>
        <div class="reports_container">
            <div class="card_divider"></div>
            <div class="report_card">
                <br>
                <h2>REPORT #<?php echo $row['id']; ?></h2>
                <br>
                &nbsp;
                <label for="user_worked">User: </label>
                <input type="text" size="35%" name="user_worked" id="user_worked" value="<?php echo $row['email']; ?>" onselect="selected_report('You can only read this!')" readonly>
                &nbsp;
                <label for="responsible_lead">Lead: </label>
                <input type="text" size="36%" name="responsible_lead" id="responsible_lead" value="<?php echo $row['id']; ?>" onselect="selected_report('You can only read this!')" readonly>
                <br>
                <br>
                &nbsp;
                <label for="git_project">Git project: </label>
                <input type="text" size="27%" name="git_project" id="git_project" value="<?php echo $row['name_p']; ?>" onselect="selected_report('You can only read this!')" readonly>
                &nbsp;
                <label for="project_url">Url: </label>
                <input type="text" size="38%" name="project_url" id="project_url" value="<?php echo $row['url']; ?>" onselect="selected_report('You can only read this!')" readonly>
                <br>
                <br>
                &nbsp;
                <label for="project_branch">Branch: </label>
                <input type="text" size="32%" name="project_branch" id="project_branch" value="<?php echo $row['git_branch']; ?>" onselect="selected_report('You can only read this!')" readonly>
                &nbsp;
                <label for="project_status">Status: </label>
                <input type="text" size="33%" name="project_status" id="project_status" value="<?php echo $row['status']; ?>" onselect="selected_report('You can only read this!')" readonly>
                <br>
                <br>
                &nbsp;
                <label for="start_time">Start time: </label>
                <input type="text" size="19%" name="start_time" id="start_time" value="<?php echo $row['start']; ?>" onselect="selected_report('You can only read this!')" readonly>
                &nbsp;
                <label for="end_time">End time: </label>
                <input type="text" size="19%" name="end_time" id="end_time" value="<?php echo $row['end']; ?>" onselect="selected_report('You can only read this!')" readonly>
                &nbsp;
                <label for="project_hours">Hours: </label>
                <input type="text" size="5" name="project_hours" id="project_hours" value="<?php echo $row['hours']; ?>" onselect="selected_report('You can only read this!')" readonly>
                <br>
                <br>
                &nbsp;
                <label for="developers_comments">Developer's comments: </label>
                <br>
                <textarea rows="4" cols="80" name="developers_comments" id="developers_comments" onselect="selected_report('You can only read this!')" readonly><?php echo $row['u_comment']; ?></textarea>
                <br>
                <br>
                <label for="team_leads_comments">Team lead's comments: </label>
                <br>
                <textarea rows="4" cols="80" name="team_leads_comments" id="team_leads_comments" onselect="selected_report('You can only read this!')" readonly><?php echo $row['id']; ?></textarea>
                <br>
                <br>
            </div>
        </div>
        <?php } ?>
        <br>
        <br>
    </div>

    <script>
        function clickinner(go_back_btn_gral) { 
            location.href='team_lead_page.php';
        };
    </script>
</body>
</html>