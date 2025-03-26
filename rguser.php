<?php
session_start();
include('dbcon.php');
if (isset($_POST['adduser'])) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $pwd = $_POST['pwd'];
    $bdate=$_POST['bdate'];
    $city=$_POST['city'];
    $question=$_POST['question'];
    $ans=$_POST['ans'];
    
    if ($pwd == $pwd) {
        $checkemail = "SELECT email FROM register WHERE email='$email'";
        $checkemail_run = mysqli_query($con, $checkemail);
        if (mysqli_num_rows($checkemail_run) > 0) {
            $_SESSION['status']="<script>alert('email alredy tacken')</script>";
            header("Location: index.php");
            exit;
        } else {
            $sql = "INSERT INTO register (fname,email,phoneno,pwd,bdate,city,question,ans) VALUES ('$fname','$email','$phoneno','$pwd','$bdate','$city','$question','$ans')";
            $sql_run = mysqli_query($con, $sql);
            header("location:index.php?msg=$sql_run");
           
        }
    }
}
