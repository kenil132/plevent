<?php 
function getOrders(){
    include('config/dbcon.php');
    $rg_id = $_SESSION['fname'];
    $query="SELECT cname,ename,pname,date,venue,payment_date from booking WHERE cname='$rg_id'";
    $query_run=mysqli_query($con,$query);
}

?>