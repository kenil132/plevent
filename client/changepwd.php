<?php
// include('navbar.php');
session_start();
include('config/dbcon.php');
include('includes/header.php');
// include('../navbar.php');
?>
</head>

<body>
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
            <h1 class="con_h1">My Account</h1>
        </div>
    </section>
    <section class="space p-3 pt-5">
        <div class="h1">
            <h1>Change Password</h1>
            <hr>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <?php include('includes/sidebar.php'); ?>
            </div>
            <div class="col-8">

                <div class="modal-body">
                    <div class="modal-body">
                        <form action="" method="post"><!-- form Starts -->
                            <div class="modal-body">
                                <div class="form-group"><!-- form-group Starts -->

                                    <label>Enter Your Current Password</label>

                                    <input type="password" name="old_pass" class="form-control" placeholder="Old Password" required>

                                </div><!-- form-group Ends -->


                                <div class="form-group"><!-- form-group Starts -->

                                    <label>Enter Your New Password</label>

                                    <input type="password" name="new_pass" class="form-control" placeholder="Enter New password" required>

                                </div><!-- form-group Ends -->


                                <div class="form-group"><!-- form-group Starts -->

                                    <label>Enter Your New Password Again</label>

                                    <input type="password" name="new_pass_again" class="form-control" placeholder="Confirm Password" required>

                                </div><!-- form-group Ends -->
                            </div><br>
                            <div class=" modal-footer">
                                <div class="text-center"><!-- text-center Starts -->

                                    <button type="submit" name="submit" class="btn btn-primary">

                                        <i class="fa fa-user-md"> </i> Change Password

                                    </button>

                                </div><!-- text-center Ends -->
                            </div>
                        </form><!-- form Ends -->
                    </div>
                </div> <?php

                        if (isset($_POST['submit'])) {

                            $fname = $_SESSION['fname'];

                            $old_pass = $_POST['old_pass'];

                            $new_pass = $_POST['new_pass'];

                            $new_pass_again = $_POST['new_pass_again'];

                            $sel_old_pass = "select * from register where pwd='$old_pass'";

                            $run_old_pass = mysqli_query($con, $sel_old_pass);

                            $check_old_pass = mysqli_num_rows($run_old_pass);

                            if ($check_old_pass == 0) {

                                echo "<script>alert('Your Current Password is not valid try again')</script>";

                                exit();
                            }

                            if ($new_pass != $new_pass_again) {

                                echo "<script>alert('Your New Password dose not match')</script>";

                                exit();
                            }

                            $update_pass = "update register set pwd='$new_pass' where fname='$fname'";

                            $run_pass = mysqli_query($con, $update_pass);

                            if ($run_pass) {

                                echo "<script>alert('your Password Has been Changed Successfully')</script>";

                                echo "<script>window.open('changepwd.php','_self')</script>";
                            }
                        }



                        ?>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

</body>

</html>