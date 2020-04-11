<?php
include("../db/db.php");



$input = filter_input_array(INPUT_POST);

$name_p = mysqli_real_escape_string($conn,$input)["name_p"];
$url = mysqli_real_escape_string($conn,$input)["url"];
$email = mysqli_real_escape_string($conn,$input)["email"];
$gentry_date = mysqli_real_escape_string($conn,$input)["gentry_date"];
$start = mysqli_real_escape_string($conn,$input)["start"];
$end = mysqli_real_escape_string($conn,$input)["end"];
$hours = mysqli_real_escape_string($conn,$input)["hours"];
$u_comment = mysqli_real_escape_string($conn,$input)["u_comment"];
$email = mysqli_real_escape_string($conn,$input)["email"];
$approved_hrs = mysqli_real_escape_string($conn,$input)["approved_hrs"];
$l_comments = mysqli_real_escape_string($conn,$input)["l_comments"];

if($input["action"] == 'edit')
{
    $query = "UPDATE tbl_gituser SET name_p = '".$name_p."', url = '".$url."', email = '".$email."', gentry_date = '".$gentry_date."',
    start = '".$start."', end = '".$end."', hours = '".$hours."', u_comment = '".$u_comment."', email = '".$email."', 
    approved_hrs  = '".$approved_hrs."', l_comments = '".$l_comments."' WHERE id_g = '".$input["id_g"]."'";
    die(var_dump($query));

    mysqli_query($conn,$query);
}

if($input["action"] === 'delete') 
{
    $query = "
    DELETE from tbl_gituser
    WHERE id = '".$input["id_g"]."'
    ";
    mysqli_query($conn,$query);
}

echo json_encode($input);

?>
