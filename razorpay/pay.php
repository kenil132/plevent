<?php
include('../dbcon.php');
error_reporting(0);
require('config.php');
require('razorpay-php/Razorpay.php');
session_start();

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);



$srv = $_POST['service'];
$service = implode(",", $srv);
$cname = $_POST['cname'];
$ename = $_POST['ename'];
$pname = "Customed";
$date = $_POST['date'];
$venue = $_POST['venue'];
$phoneno = $_POST['phoneno'];
$price = $_POST['price'];
$status = "Complete";
$payment_date = date('Y-m-d');
$rg_id = $_SESSION['fname'];
// echo $rg_id;
$email_search = "select id from register WHERE fname='$rg_id' ";
$query = mysqli_query($con, $email_search);
$e_count = mysqli_num_rows($query);
if ($e_count) {
    $e_pass = mysqli_fetch_assoc($query);
    $db_pass = $e_pass['id'];
}
// echo $db_pass;
$id =$db_pass;
// echo $id;
$_SESSION['service']= $service;
$_SESSION['cname']= $cname;
$_SESSION['ename']= $ename;
$_SESSION['pname']= $pname;
$_SESSION['date']= $date;
$_SESSION['venue']= $venue;
$_SESSION['phoneno']= $phoneno;
$_SESSION['price']= $price;
$_SESSION['status']= $status;
$_SESSION['payment_date']= $payment_date;
$_SESSION['customerid']= $id;

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 3456,
    'amount'          => $price * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'manual';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $price,
    "name"              => "Pleasant Event",
    "description"       => "get experiance with us",
    "image"             => "P",
    "prefill"           => [
    "name"              => $cname,
    "email"             => $id,
    "contact"           => $phoneno,
    ],
    "notes"             => [
    "address"           => "opera bussiness",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#3595ea"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("checkout/{$checkout}.php");
?>