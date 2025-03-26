<?php
include('config/dbcon.php');
if (isset($_POST['addadmin']))
 {
    // $id=$_POST['id'];
    $fname=$_POST['adminname'];
    $email=$_POST['adminid'];
    $pwd=$_POST['pwd'];

    $sql="INSERT INTO admin (adminname,adminid,pwd) VALUES ('$fname','$email','$pwd')"; 
    $sql_run=mysqli_query($con,$sql);
    header("Location:admin.php?msg=$sql_run");
 }
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
    // $pwd = $_POST['pwd'];

    $sql = "UPDATE register SET fname='$fname',email='$email',phoneno='$phoneno',bdate='$bdate',city='$city' WHERE id='$id'";
    $sql_run = mysqli_query($con, $sql);
    header("location:registered.php?msg=$sql_run");
}
// package price update

if (isset($_POST['updateprice'])) {
    $id = $_POST['id'];
    $ename = $_POST['ename'];
    $price = $_POST['price'];
    $pname = $_POST['pname'];

    $sql = "UPDATE events SET price='$price' WHERE id='$id'";
    $sql_run = mysqli_query($con, $sql);
    header("location:event.php?msg=$sql_run");
}
if (isset($_POST['updateorderstatus'])) {
    $id = $_POST['id'];
    $order_status = $_POST['order_status'];
    $sql = "UPDATE booking SET order_status='$order_status' WHERE id='$id'";
    $sql_run = mysqli_query($con, $sql);
    header("location:booking.php?msg=$sql_run");
}
if (isset($_POST['updateorderstatus1'])) {
    $id = $_POST['id'];
    $order_status = $_POST['order_status'];
    $sql = "UPDATE custom_event SET order_status='$order_status' WHERE id='$id'";
    $sql_run = mysqli_query($con, $sql);
    header("location:booking.php?msg=$sql_run");
}
// services update
if (isset($_POST['addservice'])) {
    $id = $_POST['id'];
    $pname = $_POST['pname'];
    $services = $_POST['services'];
    $sql = "INSERT INTO packages (pname,services) VALUES ('$pname','$services') ";
    $sql_run = mysqli_query($con, $sql);
    header("location:event.php?msg=$sql_run");
}

// delete registerd user
if (isset($_POST['deleteuserbtn'])) {
    $id = $_POST['delete_id'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $pwd = $_POST['pwd'];

    $sql = "DELETE FROM register WHERE id='$id'";
    $sql_run = mysqli_query($con, $sql);
    header("location:registered.php?delete=$sql_run");
}

// delete contacts
if (isset($_POST['contactdelete'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM contact WHERE id='$id'";
    $sql_run = mysqli_query($con, $sql);
    header("location:contactus.php?delete=$sql_run");
}
// delete feedback
if (isset($_POST['feedbackdelete'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM feedback WHERE id='$id'";
    $sql_run = mysqli_query($con, $sql);
    header("location:feedback.php?delete=$sql_run");
}

// delete admin
if (isset($_POST['deleteadmintbtn'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM admin WHERE id='$id'";
    $sql_run = mysqli_query($con, $sql);
    header("location:admin.php?delete=$sql_run");
}

// image delete
if (isset($_POST['deleteimg'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM gallery WHERE id='$id'";
    $sql_run = mysqli_query($con, $sql);
    header("location:event.php?delete=$sql_run");
}


// delete packages

if (isset($_POST['packagedelete'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM packages WHERE id='$id'";
    $sql_run = mysqli_query($con, $sql);
    header("location:event.php?delete=$sql_run");
}
// delete client

if (isset($_POST['deleteclientbtn'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM booking WHERE id='$id'";
    $sql_run = mysqli_query($con, $sql);
    header("location:booking.php?delete=$sql_run");
}
// delete custom client

if (isset($_POST['deleteclientbtn1'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM custom_event WHERE id='$id'";
    $sql_run = mysqli_query($con, $sql);
    header("location:booking.php?delete=$sql_run");
}

// delete image
if (isset($_POST['deleteimg'])) {
    $id = $_POST['deleteid'];
    $imgfile = $_POST['imgfile'];
    $query = "DELETE FROM gallery WHERE id='$id'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        unlink("images/".$imgfile);
        $_SESSION['success'] = 'Image Deleted successfully.';
        header("Location: gallery.php");
    } else {
        $_SESSION['error'] = 'Please Select Image or Write title';
        header("Location: gallery.php");
    }
}
?>