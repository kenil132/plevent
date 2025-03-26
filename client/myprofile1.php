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
            <h1>My profile</h1>
            <hr>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <?php include('includes/sidebar.php'); ?>
            </div>
            <div class="col-8">
                <form action="userquery.php" method="POST">
                    <div class="modal-body">
                        <?php
                        $rg_id = $_SESSION['fname'];
                        //     $rg_id = $_GET['rg_id'];
                            $query = "SELECT * FROM register WHERE fname='$rg_id' LIMIT 1";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                        ?>
                        <div class="form-group">

                            <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="form-group">
                            first name
                            <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>">
                            email
                            <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                            phone number
                            <input type="text" name="phoneno" class="form-control" value="<?php echo $row['phoneno']; ?>">
                            password
                            <input type="password" name="pwd" class="form-control" value="<?php echo $row['pwd']; ?>"><br>
                        </div>
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

                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button> -->
                        <button type="submit" name="updateuser" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>