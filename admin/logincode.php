<?php
session_start();
include('config/dbcon.php');
if (isset($_POST['login_btn'])) {
    $adminid = $_POST['adminid'];
    $pwd = $_POST['pwd'];
    $loginquery = "SELECT * FROM admin WHERE adminid='adminid' AND pwd='pwd' LIMIT 1";
    $loginquery_run = mysqli_query($con,$loginquery);

    if(mysqli_num_rows($loginquery_run) > 0)
    {
    foreach($loginquery_run as $row){
        $id=$row['id'];
        $adminname=$row['adminname'];
        $adminid=$row['adminid'];
    }
    $_SESSION['auth']=true;
    $_SESSION['auth_user']= [
        'id'=>$id,
        'adminname'=>$adminname,
        'adminid'=>$adminid
    ];
    $_SESSION['satus'] = "<script>alert('login successfully')</script>";
    header('Location:index.php');
    }else{
        $_SESSION['satus'] = "<script>alert('invalied email or password')</script>";
        header('Location:adminlogin.php');
    }
} else {
    $_SESSION['satus'] = "<script>alert('access denied')</script>";
    header('Location:adminlogin.php');
}
