<?php
include('dbcon.php');

$fname = $_POST['fname'];
$email = $_POST['email'];
$msg = $_POST['msg'];
$sql = "INSERT INTO contact (fname,email,msg) VALUES ('$fname','$email','$msg')";
$Result = mysqli_query($con, $sql);
header("Location:contactus.php?msg=$Result");
?>