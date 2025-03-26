<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Confirm your order</title>
    <style>
        .card {
            padding: 20px;
        }

        .card-title {
            text-align: center;
        }
       .btn_confirm{
        text-align: center;
       }
    </style>
</head>

<body>
    
    <div class="sec_confirm">
        <div class="card container">
            <div class="card-header">
                <h2 class="card-title">Bookings for event</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <span class="counter pull-right"></span>
                <table class="table table-striped" width="200px">
                    <tr>
                        <td> your name :</td>
                        <td> <?php echo $_SESSION['cname']; ?> </td>
                    </tr>
                    <tr>
                        <td>your event name :</td>
                        <td> <?php echo $_SESSION['ename']; ?></td>
                    </tr>
                    <tr>
                        <td> your event held on :</td>
                        <td>  <?php echo $_SESSION['date']; ?></td>
                    </tr>
                    <tr>
                        <td> your services :</td>
                        <td> <?php echo $_SESSION['service']; ?> </td>
                    </tr>
                    <tr>
                        <td> your destination : </td>
                        <td> <?php echo  $_SESSION['venue']; ?></td>
                    </tr>
                    <tr>
                        <td> your phone number :</td>
                        <td> <?php echo   $_SESSION['phoneno']; ?></td>
                    </tr>
                    <tr>
                        <td> Total amount :</td>
                        <td> <?php echo  $_SESSION['price']; ?> </td>
                    </tr>
                 
                </table>
                <div class="btn_confirm">
                <a href="./../custom.php">  <button class="btn btn-danger">Back</button></a>
                <button id="rzp-button1" class="btn btn-primary">confirm</button>
                </div>
             
            </div>
        </div>
    </div>
</body>

</html>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="verify.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
</form>
<script>
    // Checkout details as a json
    var options = <?php echo $json ?>;

    /**
     * The entire list of Checkout fields is available at
     * https://docs.razorpay.com/docs/checkout-form#checkout-fields
     */
    options.handler = function(response) {
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        document.razorpayform.submit();
    };

    // Boolean whether to show image inside a white frame. (default: true)
    options.theme.image_padding = false;

    options.modal = {
        ondismiss: function() {
            console.log("This code runs when the popup is closed");
        },
        // Boolean indicating whether pressing escape key 
        // should close the checkout form. (default: true)
        escape: true,
        // Boolean indicating whether clicking translucent blank
        // space outside checkout form should close the form. (default: false)
        backdropclose: false
    };

    var rzp = new Razorpay(options);

    document.getElementById('rzp-button1').onclick = function(e) {
        rzp.open();
        e.preventDefault();
    }
</script>