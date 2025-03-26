<?php
// session_start();
// include('config/dbcon.php');
// if (isset($_POST['adduser']))
//  {
//     $id=$_POST['id'];
//     $fname=$_POST['fname'];
//     $email=$_POST['email'];
//     $phoneno=$_POST['phoneno'];
//     $pwd=$_POST['pwd'];

//     $sql="INSERT INTO register (id,fname,email,phoneno,pwd) VALUES ('$id','$fname','$email','$phoneno','$pwd')"; 
//     $sql_run=mysqli_query($con,$sql);

// if($sql_run){
//     $_SESSION['status']="sucess";
//     header("location:registered.php");
// }else{
//     $_SESSION['status']="unsucess";
//     header("location:registered.php");
// }
//  }
?>
<?php
session_start();
include('config/dbcon.php');
if (isset($_POST['updateuser'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $bdate = $_POST['bdate'];
    $city = $_POST['city'];
    $sql = "UPDATE register SET fname='$fname',email='$email',phoneno='$phoneno',bdate='$bdate',city='$city' WHERE id='$id'";
    $sql_run = mysqli_query($con, $sql);
    header("location:myprofile.php?msg=$sql_run");
    // if($sql_run){
    //     $_SESSION['status']="update sucess";
    //     header("location:registered.php");
    // }else{
    //     $_SESSION['status']="update unsucess";
    //     header("location:registered.php");
    // }
}


if (isset($_POST['deleteuserbtn'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM booking WHERE cname='$id'";
    $sql_run = mysqli_query($con, $sql);
    header("location:myorder.php?delete=$sql_run");
    // if($sql_run){
    //     $_SESSION['status']="update sucess";
    //     header("location:registered.php");
    // }else{
    //     $_SESSION['status']="update unsucess";
    //     header("location:registered.php");
    // }
}
if (isset($_POST['deletefeedback'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM feedback WHERE id='$id'";
    $sql_run = mysqli_query($con, $sql);
    header("location:myprofile.php?delete=$sql_run");
}

?>