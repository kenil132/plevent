<?php
include('../dbcon.php');
require('config.php');

session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $id=$_SESSION['customerid'];
    $cname =$_SESSION['cname'];
    $ename = $_SESSION['ename'];
    $pname = $_SESSION['pname'];
    $service =$_SESSION['service'];
    $pdate = $_SESSION['date'];
    $venue = $_SESSION['venue'];
    $phoneno = $_SESSION['phoneno'];
    $price = $_SESSION['price'];
    $status = "complete";
    date_default_timezone_set("Asia/mumbai");
    $payment_date = date('Y-m-d');
    $payment_id=$_POST['razorpay_payment_id'];
    $orderid=$_SESSION['razorpay_order_id']; 
    $query="insert into custom_event (customerid,cname,ename,pname,date,selected_service,venue,phoneno,status,payment_id,payment_date,price,order_status) values('$id','$cname','$ename','$pname','$pdate','$service','$venue','$phoneno','$status','$payment_id','$payment_date','$price','$orderid')";
    $result=mysqli_query($con, $query);
    if ($result) {
      header("location:../home.php?msg1=$result");
    }else{
        echo mysqli_error($con);
    }
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
