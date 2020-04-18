<?php 

	include("../db/db.php"); 

	if (isset($_POST['getting_report'])) {

		$obtained_id_report = $_POST["id_report"];

		$query = $conn->query("SELECT 
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
								gu.approved_hrs,
								gu.u_comment,
								gu.l_comments,
								gu.lead,
								gu.git_user_email,
								st.id_s,
								st.status,
								usr.id_u,
								usr.email 
							FROM proyect pr
							LEFT JOIN gituser gu ON pr.id = gu.id_g
							LEFT JOIN status st ON pr.status = st.id_s
							LEFT JOIN users usr ON gu.git_user_email = usr.id_u
							WHERE gu.id_g = " . $obtained_id_report); 
		$project_user = "";
		while ($values = mysqli_fetch_array($query)) {
			$id_report = $values['id_g']; 
			$project_user = $values['email'];
			$lead_evaluator = $values['lead'];
			$project_git = $values['git_proyect'];
			$url = $values['git_branch'];
			$status = $values['status'];
			$approved_hours = $values['approved_hrs'];
			$start_hour = $values['start'];
			$end_hour = $values['end'];
			$registered_hours = $values['hours'];
			$dev_comments = $values['u_comment'];
			$lead_comments = $values['l_comments'];
		}

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Report #<?=$id_report  ?></title>
    <link rel="shortcut icon" href="../imgs/Mapple.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="../js/scripts.js"></script>
</head>
<body class="general_report_body">
    <div class="content">
        <div class="active_user">
            <h6>User: <?php echo $_SESSION['var']?></h6>
        </div>
        <br>
        <br>
        <div class="log_out_container">
            <br>
            <form action="../general_login.php">
                <button type="input">Log out</button>
            </form>
        </div>
        <h2 class="leads_page_title">INDIVIDUAL REPORT</h2> 
               
        <!-- <img class="leads_page_logo" src="../imgs/Mapple.png" alt="mapple_logo" width="200px" height="200px"> -->
        <button class="go_back_btn_gral" id="go_back_btn" type="button" onClick="javascript:clickinner(this);">Go back</button>
        &nbsp;
        &nbsp;
        <div class="reports_container">
            <div class="report_card">
                <br>
                <h2>REPORT #<?=$id_report  ?></h2>
                <br>
                &nbsp;
                <label for="user_worked">User: </label>
                <input type="text" size="35%" name="user_worked" id="user_worked" value="<?=$project_user?>" onselect="selected_report('You can only read this!')" readonly>
                &nbsp;
                <label for="responsible_lead">Lead: </label>
                <input type="text" size="36%" name="responsible_lead" id="responsible_lead" value="<?=$lead_evaluator ?>" onselect="selected_report('You can only read this!')" readonly>
                <br>
                <br>
                &nbsp;
                <label for="git_project">Git project: </label>
                <input type="text" size="27%" name="git_project" id="git_project" value="<?=$project_git ?>" onselect="selected_report('You can only read this!')" readonly>
                &nbsp;
                <label for="project_url">Url: </label>
                <input type="text" size="38%" name="project_url" id="project_url" value="<?=$url ?>" onselect="selected_report('You can only read this!')" readonly>
                <br>
                <br>
                <label for="project_status">Status: </label>
                <input type="text" size="33%" name="project_status" id="project_status" value="<?=$status ?>" onselect="selected_report('You can only read this!')" readonly>
                <br>
                <br>
                &nbsp;
                <label for="start_time">Start time: </label>
                <input type="text" size="19%" name="start_time" id="start_time" value="<?=$start_hour ?>" onselect="selected_report('You can only read this!')" readonly>
                &nbsp;
                <label for="end_time">End time: </label>
                <input type="text" size="19%" name="end_time" id="end_time" value="<?=$end_hour ?>" onselect="selected_report('You can only read this!')" readonly>
                &nbsp;
                <label for="project_hours">Hours: </label>
                <input type="text" size="5" name="project_hours" id="project_hours" value="<?=$registered_hours ?>" onselect="selected_report('You can only read this!')" readonly>
                <br>
                <br>
                &nbsp;
                <label for="approved_hours">Approved hours: </label>
                <input type="text" size="5" name="approved_hours" id="approved_hours" value="<?=$approved_hours ?>" onselect="selected_report('You can only read this!')" readonly>
				<br>
                <br>
                <label for="developers_comments">Developer's comments: </label>
                <br>
                <textarea rows="4" cols="80" name="developers_comments" id="developers_comments" onselect="selected_report('You can only read this!')" readonly><?=$dev_comments ?></textarea>
                <br>
                <br>
                <label for="team_leads_comments">Team lead's comments: </label>
                <br>
                <textarea rows="4" cols="80" name="team_leads_comments" id="team_leads_comments" onselect="selected_report('You can only read this!')" readonly><?=$lead_comments ?></textarea>
                <br>
                <br>
            </div>
        </div>
        <br>
        <br>
    </div>
</body>
</html>