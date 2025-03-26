
<?php
session_start();
include('dbcon.php');
$rg_id = $_SESSION['fname'];
$email_search = "select id from register WHERE fname='$rg_id' ";
$query = mysqli_query($con, $email_search);
$e_count = mysqli_num_rows($query);
if ($e_count) {
    $e_pass = mysqli_fetch_assoc($query);
    $db_pass = $e_pass['id'];
    // echo $db_pass;
    // echo $e_pass['id'];
    // $_SESSION['id'] = $e_pass['id'];
    $_SESSION['id'] = $e_pass['id'];
    // echo  $_SESSION['id'];
    $id= $_SESSION['id'];
}

if (isset($_POST['cname']) && isset($_POST['ename']) && isset($_POST['pname']) && isset($_POST['pdate']) && isset($_POST['venue'])  && isset($_POST['phoneno'])  && isset($_POST['price'])) {
    $cname = $_POST['cname'];
    $ename = $_POST['ename'];
    $pname = $_POST['pname'];
    $pdate = $_POST['pdate'];
    $venue = $_POST['venue'];
    $phoneno = $_POST['phoneno'];
    $price = $_POST['price'];
    $status = "complete";
    $payment_date = date('Y-m-d');
    $id= $_SESSION['id'];
    mysqli_query($con, "insert into booking (customerid,cname,ename,pname,date,venue,phoneno,status,payment_date,price) values('$id','$cname','$ename','$pname','$pdate','$venue','$phoneno','$status','$payment_date','$price')");
    $_SESSION['OID'] = mysqli_insert_id($con);
}


if (isset($_POST['payment_id']) && isset($_SESSION['OID'])) {
    $payment_id = $_POST['payment_id'];
    mysqli_query($con, "update booking set status='complete',payment_id='$payment_id' where id='" . $_SESSION['OID'] . "'");
}
?>
