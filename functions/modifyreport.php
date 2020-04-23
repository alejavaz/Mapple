<?php include("../functions/db.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modify Report</title>
    <link rel="shortcut icon" href="../imgs/Mapple.png">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="body2">

    <section>
        <div class="log_out_container">
            <br>
            <form action="../views/admin.php">
                <button type="input">Exit</button>
            </form>
        </div>
        <br>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modify Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../functions/updatedata.php" method="post">

                    <div class="modal-body">

                        <div class="form-group">
                            <label>Id</label>
                            <input type="hidden" readonly name="update_id" id="update_id" class="form-control" min="0.0" max="5" step="0.5" placeholder="Proyect">
                            <input type="text" readonly name="proyect" id="proyect" class="form-control" min="0.0" max="5" step="0.5" placeholder="Proyect">
                        </div>

                        <div class="form-group">
                            <label>Reported Dev hours</label>
                            <input type="text" readonly name="hours2" id="hours2" class="form-control" min="0.0" max="5" step="0.5" placeholder="Modify Dev hours">
                        </div>

                        <div class="form-group">
                            <label>Dev hours</label>
                            <input type="number" name="hours" id="hours" class="form-control" min="0.0" max="5" step="0.5" placeholder="Modify Dev hours">
                        </div>
                        
                        <div class="form-group">
                            <label>Reported Lead hours</label>
                            <input type="text" readonly name="approved_hrs2" id="approved_hrs2" class="form-control" min="0.0" max="5" step="0.5" placeholder="Modify Lead hours">
                        </div>

                        <div class="form-group">
                            <label>Lead hours</label>
                            <input type="number" name="approved_hrs" id="approved_hrs" class="form-control" min="0.0" max="5" step="0.5" placeholder="Modify Lead hours">
                        </div>

                        <div class="form-group">
                            <label>Lead comments</label>
                            <input type="text" name="l_comments" id="l_comments" class="form-control" placeholder="Modify Lead comments">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary hover2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary hover2">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="cardbody">

        <?php
        $show = mysqli_query($conn, "SELECT g.id_g, p.name_p, p.url, d.email as dev, g.gentry_date, 
                            g.start, g.end, g.hours, g.u_comment, g.lead, g.approved_hrs, g.l_comments 
                            FROM gituser g  
                            
                            JOIN users d ON d.id_u = g.git_user_email 
                            JOIN proyect p ON p.id = g.git_proyect 
                            ORDER BY id_g ASC");

        ?>



        <table class="tablecontent" id="editable_table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Proyect</th>
                    <th>Url</th>
                    <th>Developer</th>
                    <th>Entry Date</th>
                    <th>Start hour</th>
                    <th>End hour</th>
                    <th>Dev hours</th>
                    <th>Dev Comments</th>
                    <th>Reviewer</th>
                    <th>Lead hours</th>
                    <th>Lead comments</th>
                    <th>Dev Total hours</th>
                </tr>
            </thead>

            <?php
            if ($show) {
                foreach ($show as $row) {
            ?>
                    <tbody>
                        <tr>
                            <td> <?php echo $row['id_g']; ?></td>
                            <td> <?php echo $row['name_p']; ?></td>
                            <td> <?php echo $row['url']; ?></td>
                            <td> <?php echo $row['dev']; ?></td>
                            <td> <?php echo $row['gentry_date']; ?></td>
                            <td> <?php echo $row['start']; ?></td>
                            <td> <?php echo $row['end']; ?></td>
                            <td> <?php echo $row['hours']; ?></td>
                            <td> <?php echo $row['u_comment']; ?></td>
                            <td> <?php echo $row['lead']; ?></td>
                            <td> <?php echo $row['approved_hrs']; ?></td>
                            <td> <?php echo $row['l_comments']; ?></td>
                            <td>
                                <button type="button" class="btn btn-edit editbtn hover2">Edit</button>
                            </td>
                        </tr>
                    </tbody>

            <?php
                }
            } else {
                echo "No records Found";
            }
            ?>
        </table>

    </div>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#proyect').val(data[1]);
                $('#hours2').val(data[7]);
                $('#hours').val(data[7]);
                $('#approved_hrs2').val(data[10]);
                $('#approved_hrs').val(data[10]);
                $('#l_comments').val(data[11]);

            });
        });

        $("#myModal").draggable({
            handle: ".modal-header"
        });
    </script>
</body>

</html>