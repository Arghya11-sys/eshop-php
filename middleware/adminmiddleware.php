<?php
include('../function/myfunctions.php');
if(isset($_SESSION['auth']))
{
    if($_SESSION['role_as'] != 1)
    { 
        redirect("../index.php","not authorized this page");
    }
}else{
         
            redirect("../login.php","Login to continue");
}
?>