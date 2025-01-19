<?php
include('C:\xampp_pro\htdocs\shop\admin\config\db.php');
function getAll($table)
{
        global $con;
        $sel="SELECT * FROM $table";
         return $con->query($sel);
}

function getByID($table ,$id)
{
        global $con;
        $sel="SELECT * FROM $table WHERE id='$id'";
         return $con->query($sel);
}

function redirect($url,$message)
{
        $_SESSION['message'] = $message;
        header('location:'.$url);
        exit(0);
}

function getAllOrders()
{
        global $con;
        $sel="SELECT * FROM orders WHERE status = '0'";
        return $con->query($sel);
}

function checkTrackingNoValid($trackingNo)
{
        global $con; 
        $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo'";
        return mysqli_query($con, $query);
}
?>