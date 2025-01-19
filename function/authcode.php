<?php
session_start();
include('C:\xampp_pro\htdocs\shop\admin\config\db.php');
include('myfunctions.php');

if(isset($_POST['signup']))
{
    $n=$con->real_escape_string($_POST['name']);
    $e=$_POST['email'];
    $p=$_POST['phno'];
    $pa=$_POST['password'];
    $cp=$_POST['cpassword'];

    if($pa == $cp)
    {
        $ins="INSERT INTO user SET name='$n',email='$e',phno='$p',password='$pa'";
        $con->query($ins);
        if($con)
        {
            $_SESSION['message'] = "Registered Successfully";
            header('location:../login.php');
        }
        else{
            $_SESSION['message'] = "Something Went to Wrong";
            header('location: ../singup.php');
        }
    }
    else
    {
        $_SESSION['message'] = " Password Do Not Match";
        header('location: ../singup.php');
    }
}

else if(isset($_POST['login']))
{
    $e = $con->real_escape_string($_POST['email']);
    $p = $con->real_escape_string($_POST['password']);
    $sel = "SELECT * FROM user WHERE email = '$e' AND password = '$p'";
    $rs=$con->query($sel);
    if($rs->num_rows > 0 ){
        $_SESSION['auth'] = true;
        $userdata = mysqli_fetch_array($rs);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];
        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username ,
            'email' => $useremail
        ];
        $_SESSION['role_as'] = $role_as;
        if($role_as == 1){
            redirect("../admin/index.php","Welcome To Dashboard");  
            }else{
               
                redirect("../index.php","Logged in Succesfully");
        }

    }else{
        redirect("../login.php","Invalid credentials");
    }


}
?>