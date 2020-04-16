<?php 
      include("../db/db.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team lead page</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="../js/scripts.js"></script>
</head>
<body> 

<div class="w3-container evaluation_modal_view">
  <div id="evaluation_modal" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container modal_header"> 
        <span onclick="document.getElementById('evaluation_modal').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>EVALUATION MODAL</h2>
      </header>
      <div class="w3-container modal_content">
        <form action="../functions/register_evaluation.php" method="POST" id="evaluation_form">
            <br>
            <input type="hidden" id="id_evaluation" name="id_evaluation" value="">
            <br>
            <label for="registered_hours">Registered hours</label>
            <br>
            <input type="text" step="0.5" name="registered_hours" id="registered_hours" value="" onselect="selected_hours('You can\'t change that value!')" readonly>
            <br>
            <br>
            <label for="approved_hours">Approved hours</label>
            <br>
            <input type="number" step="0.5" min="0.5" max="5" name="approved_hours" id="approved_hours" onfocus="highlight_input(this)" onblur="white_input(this)">
            <br>
            <br>
            <label for="project_comments">Comments</label>
            <br>
            <textarea rows="4" cols="80" name="project_comments" id="project_comments" form="evaluation_form" onfocus="highlight_input(this)" onblur="white_input(this)"></textarea>
            <br>
            <br>
        </form>
      </div>
      <footer class="w3-container modal_footer">
          <button class="w3-button w3-green save_btn" type="submit" name="save_evaluation" form="evaluation_form">Save</button>
          <button onclick="document.getElementById('evaluation_modal').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
      </footer>
    </div>
  </div>
</div>

<div class="w3-container report_modal_view">

  <div id="report_modal" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container modal_header"> 
        <span onclick="document.getElementById('report_modal').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>REPORT MODAL</h2>
      </header>
      <div class="w3-container modal_content">
            <br>
            <div class="report_container">
            <input type="hidden" id="report_id" name="report_id" value="">
            
                     
              <label for="user_worked">User: </label>
              <input type="text" size="31%" name="user_worked" id="user_worked" value="" onselect="selected_report('You can only read this!')" readonly>
              &nbsp;
              <label for="responsible_lead">Lead: </label>
              <input type="text" size="33%" name="responsible_lead" id="responsible_lead" value="" onselect="selected_report('You can only read this!')" readonly>
              <br>
              <br>
              <label for="git_project">Git project: </label>
              <input type="text" size="25%" name="git_project" id="git_project" value="" onselect="selected_report('You can only read this!')" readonly>
              &nbsp;
              <label for="project_url">Url: </label>
              <input type="text" size="35%" name="project_url" id="project_url" value="" onselect="selected_report('You can only read this!')" readonly>
              <br>
              <br>
              <label for="project_branch">Branch: </label>
              <input type="text" size="28%" name="project_branch" id="project_branch" value="" onselect="selected_report('You can only read this!')" readonly>
              &nbsp;
              <label for="project_status">Status: </label>
              <input type="text" size="32%" name="project_status" id="project_status" value="" onselect="selected_report('You can only read this!')" readonly>
              <br>
              <br>
              <label for="start_time">Start time: </label>
              <input type="text" size="25%" name="start_time" id="start_time" value="" onselect="selected_report('You can only read this!')" readonly>
              &nbsp;
              <label for="end_time">End time: </label>
              <input type="text" size="30%" name="end_time" id="end_time" value="" onselect="selected_report('You can only read this!')" readonly>
              <br>
              <br>
              <label for="project_registered_hours">Registered hours: </label>
              <input type="text" size="4" name="project_registered_hours" id="project_registered_hours" value="" onselect="selected_report('You can only read this!')" readonly>
              &nbsp;
              <label for="project_approved_hours">Approved hours: </label>
              <input type="text" size="4" name="project_approved_hours" id="project_approved_hours" value="" onselect="selected_report('You can only read this!')" readonly>
              <br>
              <br>
              <label for="developers_comments">Developer's comments: </label>
              <br>
              <textarea rows="4" cols="80" name="developers_comments" id="developers_comments" value="" onselect="selected_report('You can only read this!')" readonly></textarea>
              <br>
              <br>
              <label for="team_leads_comments">Team lead's comments: </label>
              <br>
              <textarea rows="4" cols="80" name="team_leads_comments" id="team_leads_comments" value="" onselect="selected_report('You can only read this!')" readonly></textarea>
              <br>
              <br>
            </div>
      </div>
      <footer class="w3-container modal_footer">
        &nbsp;
      </footer>
    </div>
  </div>
</div>

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
    <br>
    <h2 class="leads_page_title">TEAM LEAD'S PAGE</h2> 
    <br>        
    <br>        
    <!-- <img class="leads_page_logo" src="../imgs/Mapple.png" alt="mapple_logo" width="200px" height="200px"> -->
    &nbsp;
    &nbsp;
    <div class="gral_report_container">
      <form action="general_report.php">
        <button class="report_button" type="input"><span>General report</span></button>
      </form>
    </div>
    <br>
        <table class="leads_table">
            <tbody>
              
                <tr>
                    <th>USER</th>
                    <th>GIT BRANCH</th>
                    <th>GIT PROJECT</th>
                    <th>STATUS</th>
                    <th>START TIME</th>
                    <th>END TIME</th>
                    <th>HOURS</th>
                    <th>COMMENTS</th>
                    <th>LEAD</th>
                    <th><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
                    <th><i class="fa fa-file-text-o" aria-hidden="true"></i></th>
                </tr>
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
                        LEFT JOIN users usr ON gu.dev = usr.id_u
                          ";
                $result_tb_projects = mysqli_query($conn, $query);    

                while($row = mysqli_fetch_assoc($result_tb_projects)) { ?>
                <tr>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['git_branch']; ?></td>
                    <td><?php echo $row['url']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['start']; ?></td>
                    <td><?php echo $row['end']; ?></td>
                    <td><?php echo $row['hours']; ?></td>
                    <td><?php echo $row['u_comment']; ?></td>
                    <td><?php echo $row['lead']; ?></td>
                    <td class="evaluate_button"><button class="evaluate_btn" onclick="document.getElementById('evaluation_modal').style.display='block'; fill_evaluation_data(<?=$row['id']; ?>); fill_evaluation_data2(<?=$row['hours']; ?>)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> 
                    </td>
                    <td class="report_button"><button class="report_btn" onclick="document.getElementById('report_modal').style.display='block'; fill_report_data(<?=$row['id']; ?>)"><i class="fa fa-file-text-o" aria-hidden="true"></i></button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

</div>

</body>
</html>