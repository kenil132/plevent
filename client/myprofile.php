<?php
// include('navbar.php');

session_start();
include('includes/header.php');
include('config/dbcon.php');
// include('../navbar.php');
?>
</head>

<body>
    <!-- delete modal -->
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">delete User</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <form action="userquery.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" class="delete_user_id">
                        <p>are you sure to delete your feedback ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                        <button type="submit" name="deletefeedback" class="btn btn-primary">confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include('navbar.php');
    ?>
    <?php
    if (isset($_REQUEST['msg'])) {
        $msg = $_REQUEST['msg'];
        if ($msg > 0)
            echo "<script>alert('update sucesssfull')</script>";
        else
            echo "<script>alert('update unsucesssfull')</script>";
    }
    ?>
    <section class="sec1_contact">
        <div class="container">
            <h1 class="con_h1">My Account
                <p style="font-size:40px;"><?php echo $_SESSION['fname'];
                                            ?></p>
            </h1>

        </div>
    </section>
    <section class="space p-3 pt-5">

    </section>

    <!-- <div class="divider"></div> -->
    <!-- Vertical Tabs-->
    <div class="container">
        <section class="section section-lg">
            <div class="shell">
                <div class="range range-lg-center">
                    <div class="cell-lg-11">
                        <!-- <h4>Vertical Tabs</h4> -->
                        <!-- Bootstrap tabs-->
                        <div class="tabs-custom tabs-vertical tabs-corporate" id="tabs-2">
                            <!-- Nav tabs-->

                            <div class="row">
                                <div class="col-lg-3 col-sm-12">
                                    <ul class="nav nav-tabs list-group text-center">
                                        <li class="active"><a href="#tabs-2-1" class="btn_desing list-group-item active" data-toggle="tab">Edit Account</a></li><br>
                                        <li><a href="#tabs-2-2" class="btn_desing list-group-item" data-toggle="tab">My Order</a></li><br>
                                        <li><a href="#tabs-2-3" class="btn_desing list-group-item" data-toggle="tab">Change Password</a></li><br>
                                        <li><a href="#fdbk" class="btn_desing list-group-item" data-toggle="tab">Your Feedback</a></li><br>
                                        <li><a href="../logout.php" type="button" class="btn_desing list-group-item">Log out</a></li>
                                        <!-- <li><a href="#tabs-2-5" class="list-group-item" data-toggle="tab">Tab 5</a></li> --> <br>
                                    </ul>
                                </div>
                                <!-- Tab panes-->
                                <div class="col-lg-9 col-sm-12">
                                    <div class="tab-content">
                                        <!-- my profile -->
                                        <div class="tab-pane fade show active" id="tabs-2-1">
                                            <form action="userquery.php" method="POST">

                                                <?php
                                                $rg_id = $_SESSION['fname'];
                                                //     $rg_id = $_GET['rg_id'];
                                                $query = "SELECT * FROM register WHERE fname='$rg_id' LIMIT 1";
                                                $query_run = mysqli_query($con, $query);

                                                if (mysqli_num_rows($query_run) > 0) {
                                                    foreach ($query_run as $row) {
                                                ?>

                                                        <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">

                                                        <div class="form-group">
                                                            First name
                                                            <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>">
                                                            Email
                                                            <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                                                            Phone number
                                                            <input type="text" name="phoneno" class="form-control" value="<?php echo $row['phoneno']; ?>">
                                                            Birth date
                                                            <input type="date" name="bdate" id="txtDate" class="form-control" value="<?php echo $row['bdate']; ?>">
                                                            City
                                                            <input type="text" name="city" class="form-control" value="<?php echo $row['city']; ?>"><br>
                                                            <button type="submit" name="updateuser" class="btn btn-primary" id="btn_inlog">Update</button>
                                                        </div>

                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td> no record found</td>
                                                    </tr>
                                                <?php
                                                }

                                                ?>

                                                <!-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                                                    <button type="submit" name="updateuser" class="btn btn-primary">Update</button>
                                                </div> -->
                                            </form>
                                        </div>
                                        <!-- feedback -->
                                        <div class="tab-pane fade" id="fdbk">

                                            <div class="row">
                                                <div class="col-lg-6 col-md-4 col-sm-12">
                                                    <div class="card shadow feedback_card" style="width:380px;">
                                                        <div class="card-body">
                                                            <h5 class="card-title">
                                                                <?php
                                                                $rg_id = $_SESSION['fname'];
                                                                // echo $rg_id;
                                                                $email_search = "select id from register WHERE fname='$rg_id' ";
                                                                $query = mysqli_query($con, $email_search);
                                                                $e_count = mysqli_num_rows($query);
                                                                if ($e_count) {
                                                                    $e_pass = mysqli_fetch_assoc($query);
                                                                    $db_pass = $e_pass['id'];

                                                                    $_SESSION['id'] = $e_pass['id'];

                                                                    $id = $_SESSION['id'];
                                                                }


                                                                $query = "SELECT * from feedback WHERE customerid='$db_pass'";
                                                                $query_run = mysqli_query($con, $query);

                                                                if (mysqli_num_rows($query_run) > 0) {
                                                                    foreach ($query_run as $row) {

                                                                ?>
                                                                        <?php echo $row['fname']; ?>
                                                                        <p style="font-size:15px" class="card-text">
                                                                            <?php echo $row['date']; ?>
                                                                        </p>
                                                                        <div class="star_show py-1">
                                                                            <?php
                                                                            // echo $row['star'];
                                                                            if ($row['star'] == 1) {
                                                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i> ";
                                                                            } else if ($row['star'] == 2) {
                                                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                                            } else if ($row['star'] == 3) {
                                                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                                            } else if ($row['star'] == 4) {
                                                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                                            } else {
                                                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                                            }
                                                                            ?>
                                                                        </div>
                                                            </h5>


                                                            <p class="card-text">
                                                                <?php echo $row['fb']; ?>
                                                            </p>
                                                            <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-danger deletebtn">
                                                                <i class="fas fa-trash"> </i> delete</button>
                                                    <?php
                                                                    }
                                                                } else {
                                                                    echo "no feedback found";
                                                                }
                                                    ?>

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                        <!-- MY ORDER -->
                                        <div class="tab-pane fade" id="tabs-2-2">
                                            <div>
                                                <a href="feedback.php" class="btn btn-success float-right" id="btn_inlog">Feedback</a> <br><br>
                                                <table id="example1" class="table table-responsive-sm table-responsive-md table-responsive-lg table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Your name</th>
                                                            <th>Your event</th>
                                                            <th>Your package</th>
                                                            <th>Booking date</th>
                                                            <th>Venue</th>
                                                            <th>Payment_date</th>
                                                            <!-- <th>Delete</th> -->
                                                            <th>Order status</th>
                                                            <th>Download invoice</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $rg_id = $_SESSION['fname'];
                                                        // echo $rg_id;
                                                        $email_search = "select id from register WHERE fname='$rg_id' ";
                                                        $query = mysqli_query($con, $email_search);
                                                        $e_count = mysqli_num_rows($query);
                                                        if ($e_count) {
                                                            $e_pass = mysqli_fetch_assoc($query);
                                                            $db_pass = $e_pass['id'];
                                                            // echo $db_pass;
                                                            // echo $db_pass;
                                                            // echo $db_pass;
                                                            // echo $e_pass['id'];
                                                            // $_SESSION['id'] = $e_pass['id'];
                                                            $_SESSION['id'] = $e_pass['id'];
                                                            // echo  $_SESSION['id'];
                                                            $id = $_SESSION['id'];
                                                        }

                                                        // echo $db_pass;

                                                        // include('config/dbcon.php');
                                                        // $rg_id = $_SESSION['fname'];
                                                        $query = "SELECT * from booking WHERE customerid='$db_pass'";
                                                        $query_run = mysqli_query($con, $query);

                                                        if (mysqli_num_rows($query_run) > 0) {
                                                            foreach ($query_run as $row) {
                                                        ?>
                                                                <?php
                                                                // echo $row['cname'];
                                                                // echo $row['ename'];
                                                                // echo $row['pname'];
                                                                // echo $row['date'];
                                                                // echo $row['venue'];
                                                                // echo $row['payment_date'];
                                                                // echo $row['cname'];

                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $row['cname']; ?></td>
                                                                    <td><?php echo $row['ename']; ?></td>
                                                                    <td><?php echo $row['pname']; ?></td>
                                                                    <td><?php echo $row['date']; ?></td>
                                                                    <td><?php echo $row['venue']; ?></td>
                                                                    <td><?php echo $row['payment_date']; ?></td>
                                                                    <td><?php
                                                                        if ($row['order_status'] == 0) {
                                                                            echo "<p id='pending'>Pending</p>";
                                                                        } else if ($row['order_status'] == 1) {
                                                                            echo "<p id='Approved'>Approved</p>";
                                                                        } else if ($row['order_status'] == 2) {
                                                                            echo "<p id='Working'>Working</p>";
                                                                        } else {
                                                                            echo "<p id='Done'>Done</p>";
                                                                        }
                                                                        ?></td>
                                                                    <td>
                                                                        <a href="bill.php?rg_id=<?php echo $row['id']; ?>" class="btn btn-success">invoice</a>
                                                                    </td>

                                                                </tr>
                                                            <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <h2> no record found</h2>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        $rg_id = $_SESSION['fname'];
                                                        // echo $rg_id;
                                                        $email_search = "select id from register WHERE fname='$rg_id' ";
                                                        $query = mysqli_query($con, $email_search);
                                                        $e_count = mysqli_num_rows($query);
                                                        if ($e_count) {
                                                            $e_pass = mysqli_fetch_assoc($query);
                                                            $db_pass = $e_pass['id'];
                                                            // echo $db_pass;
                                                            // echo $db_pass;
                                                            // echo $db_pass;
                                                            // echo $e_pass['id'];
                                                            // $_SESSION['id'] = $e_pass['id'];
                                                            $_SESSION['id'] = $e_pass['id'];
                                                            // echo  $_SESSION['id'];
                                                            $id = $_SESSION['id'];
                                                        }

                                                        // echo $db_pass;

                                                        // include('config/dbcon.php');
                                                        // $rg_id = $_SESSION['fname'];
                                                        $query = "SELECT * from custom_event WHERE customerid='$db_pass'";
                                                        $query_run = mysqli_query($con, $query);

                                                        if (mysqli_num_rows($query_run) > 0) {
                                                            foreach ($query_run as $row) {
                                                        ?>
                                                                <?php
                                                                // echo $row['cname'];
                                                                // echo $row['ename'];
                                                                // echo $row['pname'];
                                                                // echo $row['date'];
                                                                // echo $row['venue'];
                                                                // echo $row['payment_date'];
                                                                // echo $row['cname'];

                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $row['cname']; ?></td>
                                                                    <td><?php echo $row['ename']; ?></td>
                                                                    <td><?php echo $row['pname']; ?></td>
                                                                    <td><?php echo $row['date']; ?></td>
                                                                    <td><?php echo $row['venue']; ?></td>
                                                                    <td><?php echo $row['payment_date']; ?></td>
                                                                    <td><?php
                                                                        if ($row['order_status'] == 0) {
                                                                            echo "<p id='pending'>Pending</p>";
                                                                        } else if ($row['order_status'] == 1) {
                                                                            echo "<p id='Approved'>Approved</p>";
                                                                        } else if ($row['order_status'] == 2) {
                                                                            echo "<p id='Working'>Working</p>";
                                                                        } else {
                                                                            echo "<p id='Done'>Done</p>";
                                                                        }
                                                                        ?></td>
                                                                    <td>
                                                                        <a href="custombill.php?rg_id=<?php echo $row['id']; ?>" class="btn btn-success">invoice</a>
                                                                    </td>

                                                                </tr>
                                                            <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <h2></h2>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- CHANGE PASSWORD -->
                                        <div class="tab-pane fade" id="tabs-2-3">
                                            <!-- <div class="modal-body"> -->
                                            <!-- <div class="modal-body"> -->
                                            <form action="" method="post"><!-- form Starts -->
                                                <!-- <div class="modal-body"> -->
                                                <!-- <div class="form-group">form-group Starts -->

                                                <label>Enter Your Current Password</label>

                                                <input type="password" name="old_pass" class="form-control" required>

                                                <!-- </div>form-group Ends -->


                                                <!-- <div class="form-group">form-group Starts -->

                                                <label>Enter Your New Password</label>

                                                <!-- <input type="password" name="password" class="form-control" required> -->
                                                <input type="password" id="password" name="password"  class="form-control" required>
                                                
                                                    <h6 id="pass1"></h6>
                                               
                                                <!-- </div>form-group Ends -->


                                                <!-- <div class="form-group">form-group Starts -->

                                                <label>Confim New Password</label>

                                                <input type="password" name="password_again" class="form-control" required>

                                                <!-- </div>form-group Ends -->
                                                <!-- </div><br> -->
                                                <!-- <div class=" modal-footer"> -->
                                                <div class="text-center"><!-- text-center Starts -->
                                                    <br>
                                                    <button type="submit" name="submit" class="btn btn submitbtn" id="submitbtn">

                                                        <i class="fa fa-user-md"> </i> Change Password

                                                    </button>

                                                    <!-- </div>text-center Ends -->
                                                </div>
                                            </form><!-- form Ends -->

                                        </div> <?php

                                                if (isset($_POST['submit'])) {

                                                    $fname = $_SESSION['fname'];

                                                    $old_pass = $_POST['old_pass'];

                                                    $password = $_POST['password'];

                                                    $password_again = $_POST['password_again'];

                                                    $sel_old_pass = "select * from register where pwd='$old_pass'";

                                                    $run_old_pass = mysqli_query($con, $sel_old_pass);

                                                    $check_old_pass = mysqli_num_rows($run_old_pass);

                                                    if ($check_old_pass == 0) {

                                                        echo "<script>alert('Your Current Password is not valid try again')</script>";

                                                        exit();
                                                    }

                                                    if ($password != $password_again) {

                                                        echo "<script>alert('Your New Password dose not match')</script>";

                                                        exit();
                                                    }

                                                    $update_pass = "update register set pwd='$password' where fname='$fname'";

                                                    $run_pass = mysqli_query($con, $update_pass);

                                                    if ($run_pass) {

                                                        echo "<script>alert('your Password Has been Changed Successfully')</script>";

                                                        echo "<script>window.open('myprofile.php','_self')</script>";
                                                    }
                                                }



                                                ?>
                                    </div>

                                    <!-- 
                                    <div class="tab-pane fade" id="tabs-2-4">
                                        <p>Our site design and navigation has been thoroughly thought out. The layout is
                                            aesthetically appealing, contains concise texts in order not to take your
                                            precious time. Text styling allows scanning the pages quickly. Site
                                            navigation is extremely intuitive and user-friendly. </p>
                                        <p>You will always know where you are now and will be able to skip from one page
                                            to another with a single mouse click. We use only trusted, verified content,
                                            so you can believe every word we are saying. We are always happy to greet
                                            the new visitors on our site. With advanced features of activating account
                                            and new login widgets, you will definitely have a great experience of using
                                            our web page. It will tell you lots of interesting things about our company,
                                            its products and services, highly professional staff and happy customers.
                                            You will always know where you are now and will be able to skip from one
                                            page to another with a single mouse click. We use only trusted, verified
                                            content, so you can believe every word we are saying. We are always happy to
                                            greet the new visitors on our site.</p>
                                    </div>
                                <div class="tab-pane fade" id="tabs-2-5">
                                            <p>The layout is aesthetically appealing, contains concise texts in order not to
                                                take your precious time. Text styling allows scanning the pages quickly.
                                                Site navigation is extremely intuitive and user-friendly. You will always
                                                know where you are now and will be able to skip from one page to another
                                                with a single mouse click. </p>
                                            <p>We use only trusted, verified content, so you can believe every word we are
                                                saying. We are always happy to greet the new visitors on our site. Our blog
                                                and social media accounts are available to encourage communication and
                                                connection between clients and personnel and tell you more about us in the
                                                informal environments where we can have a dialogue instead of just a
                                                narrative like that. With advanced features of activating account and new
                                                login widgets, you will definitely have a great experience of using our web
                                                page. It will tell you lots of interesting things about our company, its
                                                products and services, highly professional staff and happy customers.</p>
                                        </div> 
                                </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    include('footer.php');
    ?>
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
    $('#txtDate').attr('max', maxDate);
});
    </script>
    <script>
        $(document).ready(function() {
            $('.deletebtn').click(function(e) {
                e.preventDefault();
                var rg_id = $(this).val();
                // console.log(rg_id);
                $('.delete_user_id').val(rg_id);
                $('#deletemodal').modal('show');
            });
        });

        $(document).ready(function() {
                    $('#first').hide();
                    $('#last').hide();
                    $('#emailid').hide();
                    $('#mobileno').hide();
                    $('#ad').hide();
                    $('#pass1').hide();
                    $('#pass2').hide();
                    $('#ans').hide();
                    $('#mobileno').hide();
                    $('#comments').hide();


                    var password_err = true;

                    var letters = /^[a-zA-Z]+$/;
                    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    var pattern = /^[6-9]\d{9}$/;


                    var minMaxLength = /^[\s\S]{8,}$/;
                    var upper = /[A-Z]/;
                    var lower = /[a-z]/;
                    var number = /[0-9]/;
                    var special = /[!"#$%&'()*+,-./:;<=>?@[\\\]^_`{|}~]/;


                    $('#password').keyup(function() {
                        password_check();
                    });

                    function password_check() {
                        var password_val = $('#password').val();
                        if (password_val.length == '') {
                            $('#pass1').show();
                            $('#pass1').html("** please fill password ");
                            $('#pass1').focus();
                            $('#pass1').css("color", "red");
                            password_err = false;
                            return false;
                        } else {
                            $('#pass1').hide();
                        }
                        if (!password_val.match(minMaxLength)) {
                            $('#pass1').show();
                            $('#pass1').html("** Password must be at least 8 characters long. ");
                            $('#pass1').focus();
                            $('#pass1').css("color", "red");
                            password_err = false;
                            return false;
                        } else {
                            $('#pass1').hide();
                        }
                        if (!password_val.match(upper)) {
                            $('#pass1').show();
                            $('#pass1').html("** Password must be at least one uppercase letter. ");
                            $('#pass1').focus();
                            $('#pass1').css("color", "red");
                            password_err = false;
                            return false;
                        } else {
                            $('#pass1').hide();
                        }
                        if (!password_val.match(lower)) {
                            $('#pass1').show();
                            $('#pass1').html("** Password must be at least one lowercase letter. ");
                            $('#pass1').focus();
                            $('#pass1').css("color", "red");
                            password_err = false;
                            return false;
                        } else {
                            $('#pass1').hide();
                        }
                        if (!password_val.match(number)) {
                            $('#pass1').show();
                            $('#pass1').html("** Password must be at least one number. ");
                            $('#pass1').focus();
                            $('#pass1').css("color", "red");
                            password_err = false;
                            return false;
                        } else {
                            $('#pass1').hide();
                        }
                        if (!password_val.match(special)) {
                            $('#pass1').show();
                            $('#pass1').html("** Password must be at least one special character. ");
                            $('#pass1').focus();
                            $('#pass1').css("color", "red");
                            password_err = false;
                            return false;
                        } else {
                            $('#pass1').hide();
                        }
                    }
                    $('#submitbtn').click(function() {


                        password_err = true;



                        password_check();
                    });
                });
    </script>
</body>

</html>