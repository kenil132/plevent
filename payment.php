<?php
include('dbcon.php');
session_start(); ?>

<?php
$apikey = "rzp_test_U86j45xdTP60Tz";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Payment</title>
</head>
<style>
    body{
        background-image: linear-gradient(rgb(255, 204, 255, 0.8), rgba(0, 56, 101,0.8)),url('assets/wedding1.jpg');
        /* background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('assets/wedding1.jpg'); */
	    background-size:cover;
	    background-position:center;
        background-repeat: no-repeat;
        height: 700px;
    }
    .book {
        text-align:center;
    }
    #booking-form{
        background: linear-gradient(rgb(154, 23, 80, 0.7), rgba(238, 76, 124, 0.1));
        opacity: 95%;
        max-width:450px;
	    border:1px solid #ced4da;
	    margin:3% auto 0;
       
    }
    label{
        margin-bottom:5px;
        margin-top:10px;
	    font-size:15px;
	    color:white;
        
    }
    input[type=text],
    input[type=date]
    {
        width: 70%;
        padding: 10px;
        border: 1px solid;
        border-radius: 5px;
        text-align: center;
        /* opacity:90%; */
        
    }

    button {
        background-color:green;
        color: white;
        width: 100px;
        height: 35px;
        opacity: 95%;
        border-radius: 5px;
        /* border:2px solid black; */
        cursor: pointer;
    }

    button:hover {
        opacity: 100%;
        
        /* border:2px solid black; */
    }

    #rzp-button2 {
        background-color:RED;
        color: white;
        width: 100px;
        height: 35px;
        opacity: 95%;
        border-radius: 5px;
        /* border:2px solid black; */
        cursor: pointer;
    }

    #rzp-button2:hover {
        opacity: 100%;

        /* border:2px solid black; */
    }
    .grp{
        display:inline-block;
        width:185px;
    }
    textarea{
        width: 70%;
        padding: 10px;
        border: 1px solid;
        border-radius: 5px;
        text-align: center;
        /* opacity:75%; */

    }
</style>

<body>
    <form id="booking-form" action="" method="POST">
        <?php
        if (isset($_GET['bk_id'])) {
            $bk_id = $_GET['bk_id'];

            $query = "SELECT * FROM events WHERE id='$bk_id' LIMIT 1";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $row) {
        ?>

                    <div class="book">
                        <h1 style="color:white;text-align:center;">Book Your Event</h1>
                        <a href=""><i class=""></i></a>
                        <br><br>
                        <div class="box">
                            <label for="cname">Your Name</label><br>
                            <input type="text" name="cname" id="cname" value="<?php  echo $_SESSION['fname'];?>" required><br><br>
                        </div>
                        <div class="grp">
                            <label for="ename">Event Name</label><br>
                            <input type="text" class="grp" name="ename" id="ename"  value="<?php echo $row['ename']; ?>" required readonly ><br><br>
                        </div>
                        <div class="grp">
                            <label for="pname">Package Name</label><br>
                            <input type="text" class="grp" name="pname" id="pname"  value="<?php echo $row['pname']; ?>" required readonly ><br><br>
                        </div>
                        <div class="box">
                            <label for="date">Select Date</label><br>
                            <input type="date" name="date" id="pdate" required><br><br>
                        </div>

                        <div class="box">
                            <label for="price">Amount</label><br>
                            <input type="text" name="price" id="price" value="<?php echo $row['price']; ?>" required readonly><br><br>
                        </div>

                        <div class="box">
                            <label for="venue">Venue Address</label><br>
                            <textarea rows="3" cols="60" type="text"  name="venue" id="venue" style="resize:none;" required></textarea><br><br>
                        </div>
                        <div class="box">
                            <label for="phoneno">Phone No</label><br>
                            <input type="text" name="phoneno" id="phoneno" value=""  required><br><br>
                        </div>
                        <!-- <button name="submit" id="rzp-button1">Book</button>    -->
                       <a href="home.php">

                       <button type="button" name="btn" id="rzp-button2">Home</button>
                       </a>
                        <button type="button" name="btn" id="rzp-button1" onclick="pay_now()" class="btn btn">Pay</button><br><br><!-- <button name="submit" class="btn"></button><br><br>  -->
                    </div>
        <?php
                }
            }
        }
        ?>
    </form>


    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        function pay_now() {
            var cname = jQuery('#cname').val();
            var ename = jQuery('#ename').val();
            var pname = jQuery('#pname').val();
            var pdate = jQuery('#pdate').val();
            var venue = jQuery('#venue').val();
            var phoneno = jQuery('#phoneno').val();
            var price = jQuery('#price').val();
            jQuery.ajax({
                type: 'post',
                url: 'payment_process.php',
                data: "cname=" + cname + "&ename=" + ename + "&pname=" + pname + "&pdate=" + pdate + "&venue=" + venue + "&phoneno=" + phoneno+ "&price=" + price,
                success: function(result) {
                    var options = {
                        "key": "<?php echo $apikey; ?>", // Enter the Key ID generated from the Dashboard
                        "amount": "<?php echo $row['price'] * 100; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": "Pleasent Event",
                        "description": "Test Transaction",
                        "image": "https://example.com/your_logo",
                        // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        "handler": function(response) {
                            // alert(response.razorpay_payment_id);
                            // alert(response.razorpay_order_id);
                            // alert(response.razorpay_signature)
                            // alert("thank you,your payment is accepted");
                            jQuery.ajax({
                                type: 'post',
                                url: 'payment_process.php',
                                data: "payment_id=" + response.razorpay_payment_id,
                                success: function(result) {
                                    alert("payment successfully done");
                                    window.open("home.php", "_self");
                                }
                            });
                        },
                        "prefill": {
                            "name": "<?php echo $_SESSION['fname']; ?>",
                            // "email": "gautam.lakhani@example.com",
                            "contact": phoneno
                        },
                        "notes": {
                            "address": "Razorpay Corporate Office"
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.on('payment.failed', function(response) {
                        alert(response.error.code);
                        alert(response.error.description);
                        alert(response.error.source);
                        alert(response.error.step);
                        alert(response.error.reason);
                        alert(response.error.metadata.order_id);
                        alert(response.error.metadata.payment_id);
                    });
                    document.getElementById('rzp-button1').onclick = function(e) {
                        rzp1.open();
                        e.preventDefault();
                    }
                }
            });
        }
    </script>
    <script type="text/javascript">
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("date")[0].setAttribute('min', today);
    </script>
</body>

</html>