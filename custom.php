<?php
session_start();
include('dbcon.php');
?>
<?php
$apikey = "rzp_test_U86j45xdTP60Tz";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css file -->
    <link rel="stylesheet" href="lending.css">

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <!-- carousel -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!--carousel-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <style>
        button {
            background-color: green;
        }

        #rzp-button1 {
            background-color: green;
            color: white;
            font-style: bold;
            opacity: 100%;
            width: 130px;
        }

        #rzp-button1:hover, 
        #rzp-button1:focus {
            background-color: darkgreen;
            color: white;
            font-style: bold;
            opacity: 100%;
           
        }

        #btn_login {
            background-color: #292e33;
            color: white;
            width: 200px;
            font-size: 18px;
            padding-bottom: 10px;
            border-radius: 15px;
        }

        #btn_login:hover {
            background-color: #a8bfd8;
            color: black;
            font-style: bold;
        }

        /* .modal-dialog {
            width: 850px;
            max-width: 1000px;
        } */
        .card {
            width: 700px;
            margin-left: 25%;
            margin-top: 2%;
            box-shadow: 1px 5px 10px rgb(160, 155, 155);
            opacity: 95%;
            background: linear-gradient(rgb(154, 23, 80, 0.7), rgba(238, 76, 124, 0.1));
            color: white;
        }

        @media(max-width:900px) {
            .card {
                width: 400px;
                margin-left: 0%;
                margin-top: 2%;
                box-shadow: 1px 2px 2px 2px #292e33;
            }
        }

        .custom_form {
            background-image: linear-gradient(rgb(255, 204, 255, 0.8), rgba(0, 56, 101,0.8)), url(assets/fire\ couple.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            /* padding: 340px 0; */
        }

        .inp {
            color: black;
            opacity: 75%;
            font-weight: 450;
        }
        .lbl{
            font-weight: 600;
        }
        /* validation */
    </style>
</head>

<body class="custom_form">
    <!-- Modal -->
    <?php
    if (isset($_REQUEST['msg'])) {
        $msg = $_REQUEST['msg'];
        if ($msg > 0)
            echo "<script>alert('Your payment success')</script>";
        else
            echo "<script>alert('message not send')</script>";
    }
    ?>
    <!-- Card -->

    <div class="card">

        <!-- Card content -->
        <div class="card-content py-2">
            <h2 style="text-align:center;font-weight:bolder;">Customize Your Event</h2>
        </div>

        <!-- Card content -->
        <div class="card-body">

            <form id="form" action="razorpay/pay.php" method="POST">
                <div class="modal-body">
                    <!-- <div class="form-group">
                    id
                    <input type="text" name="id" class="form-control inp">
                  </div> -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-control">
                                    <span class="lbl">
                                    First Name
                                    </span>
                                    <input type="text" id="cname" name="cname" value="<?php echo $_SESSION['fname']; ?>" class="form-control inp" placeholder="Enter Name" required>
                                    <div class="error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-control">
                                    <span class="lbl">
                                    Event Name
                                    </span>
                                    <select name="ename" id="ename" class="browser-default custom-select form-control inp" required>
                                        <option value="">Select An Event</option>
                                        <option value="Wedding">Wedding</option>
                                        <option value="Engagement">Engagement</option>
                                        <option value="Birthday Party">Birthday Party</option>
                                        <option value="Music Concert">Music Concert</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-lg-12">
                            <div class="input-control">
                                <span class="lbl">
                                Event Date
                                </span>
                                <input type="date" id="inputdate" name="date" class="form-control inp" placeholder="Enter Date" required>
                                <!-- <input type="date" id="pdate" name="pdate" class="form-control inp" placeholder="Enter Date"> -->
                                <div class="error"></div>
                            </div>
                        </div>
                    </div>

                    <div class="input-control py-1">
                        <span class="lbl">
                        Select Your Sevices
                        </span>
                        <div class="row py-2">
                            <div class="col-lg-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="service[]" value="Decoration" data-price="50000" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>Decoration (50,000)
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="service[]" value="Catering" data-price="30000" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>Catering (30,000)
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="service[]" value="Chairs & Sofa" data-price="10000" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>Chairs & Sofa (10,000)
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="service[]" value="Lighting" data-price="5000" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>Lighting (5000)
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="service[]" value="Children Playing Area" data-price="6000" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>Children Playing Area (6000)
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="service[]" value="Firework" data-price="3000" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>Firework (3000)
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="service[]" value="Sound System" data-price="15000" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>Sound System (15,000)
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="service[]" value="Photography" data-price="25000" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>Photography (25,000)
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="service[]" value="Host" data-price="30000" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>Host (30,000)
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="service[]" value="Manager(2) & Staff(15)" data-price="60000" type="checkbox" id="flexSwitchCheckDefaultDisabled" checked disabled>
                                    <label class="form-check-label" for="flexSwitchCheckDefaultDisabled">Manager(2) & Staff(15)</label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-control">
                                    <span class="lbl">
                                    Total Amount
                                    </span>
                                    <input type="text" id="price" name="price" class="form-control inp" value="60000" placeholder="Total " readonly required>
                                    <div class="error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-control">
                                    <span class="lbl">
                                    Phone Number
                                    </span>
                                    <input type="text" id="phoneno" name="phoneno" class="form-control inp" placeholder="Enter Phone Number" required>
                                    <div class="error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group py-2">

                        <label for="exampleFormControlTextarea1">Enter Venue :</label>
                        <textarea class="form-control inp" name="venue" id="venue" style="resize:none;" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    </div>

                </div>
                <div class="modal-footer">

                    <a href="home.php" type="button" class="btn btn-danger" data-dismiss="modal" style="width:130px;">Back</a>
                    <button type="submit" name="custom_pay" id="rzp-button1" class="btn btn-success">Pay</button><br><br>
                </div>
            </form>

        </div>

    </div>
    <!-- Card -->
    <?php
    // $query = "SELECT * FROM wed WHERE id=1";
    // $query_run = mysqli_query($con, $query);
    // if (mysqli_num_rows($query_run) > 0) {
    //     foreach ($query_run as $rows) {
    ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Customize Your Event</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
    <?php // }
    // }
    ?>


    <script>
        // Listen for checkbox changes
        const checkboxes = document.querySelectorAll('input[type="checkbox"][name="service[]"]');
        const totalAmountField = document.getElementById('price');

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', () => {
                let price = 0;
                checkboxes.forEach((checkbox) => {
                    if (checkbox.checked) {
                        price += parseInt(checkbox.getAttribute('data-price'));
                    }
                });
                totalAmountField.value = price;
            });
        });
    </script>
    <script>
$(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    // alert(maxDate);
    $('#inputdate').attr('min', maxDate);
});
</script>
</body>

</html>