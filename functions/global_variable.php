<?php
function report()
{
    if(isset($_SESSION['var']))
        echo "Value = ". $_SESSION['var']; 
}
?>