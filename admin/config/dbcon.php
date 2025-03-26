<?php
$con=mysqli_connect('localhost','root','','event');
if(!$con){
    header("Location: ../errors/db.php");
    die();

}else{
    // echo "database connected";
}
?>