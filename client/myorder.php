<?php
// include('navbar.php');
include('includes/header.php');
session_start();
include('config/dbcon.php');
// include('../navbar.php');
// include('myprofile.php')
?>
</head>
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
            <p>are you sure to delete this data ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
            <button type="submit" name="deleteuserbtn" class="btn btn-primary">confirm</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php

if (isset($_REQUEST['delete'])) {
    $delete = $_REQUEST['delete'];
    if ($delete > 0)
        echo "<script>alert('delete sucesssfull')</script>";
    else
        echo "<script>alert('delete unsucesssfull')</script>";
}

?>

<body>
    <div class="card-body">
        <table id="example1" class="table table-responsive-sm table-responsive-md table-responsive-lg table-bordered table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>fname</th>
                    <th>email</th>
                    <th>phone number</th>
                    <th>password</th>
                    <th>edit</th>
                    <th>delete</th>
                    <th>delete</th>
                    <th>delete</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $rg_id = $_SESSION['fname'];
                echo $rg_id;
                $email_search = "select id from register WHERE fname='$rg_id' ";
                $query = mysqli_query($con, $email_search);
                $e_count = mysqli_num_rows($query);
                if ($e_count) {
                    $e_pass = mysqli_fetch_assoc($query);
                    $db_pass = $e_pass['id'];
                    echo $db_pass;
                    // echo $db_pass;
                    // echo $e_pass['id'];
                    // $_SESSION['id'] = $e_pass['id'];
                    $_SESSION['id'] = $e_pass['id'];    
                    // echo  $_SESSION['id'];
                    $id = $_SESSION['id'];
                }

                ?>
                <?php

                // include('config/dbcon.php');
                $rg_id = $_SESSION['fname'];
                $query = "SELECT * from booking WHERE cname='$rg_id'";
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
                        <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['cname']; ?></td>
                            <td><?php echo $row['ename']; ?></td>
                            <td><?php echo $row['pname']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['venue']; ?></td>
                            <td><?php echo $row['payment_date']; ?></td>
                            <td>
                            <a href="bill.php?rg_id=<?php echo $row['id']; ?>" class="btn btn-success">invoice</a>
                            </td>
                            <td>
                                <button type="button" value="<?php echo $row['cname']; ?>" class="btn btn-danger deletebtn">delete</button>
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
            </tbody>
        </table>
    </div>
    
                                            <div>
                                                <table id="example1" class="table table-responsive-sm table-responsive-md table-responsive-lg table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>your name</th>
                                                            <th>your event</th>
                                                            <th>your package</th>
                                                            <th>booking date</th>
                                                            <th>venue</th>
                                                            <th>payment_date</th>
                                                            <th>delete</th>
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
                                                        $query = "SELECT cname,ename,pname,date,venue,payment_date from booking WHERE customerid='$db_pass'";
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
                                                                    <!-- <td> -->
                                                                    <!-- <a href="rgupdate.php?rg_id=<?php echo $row['id']; ?>" class="btn btn-success">edit</a> -->
                                                                    <!-- </td> -->
                                                                    <td>
                                                                        <button type="button" value="<?php echo $row['cname']; ?>" class="btn btn-danger deletebtn">delete</button>
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
                                                    </tbody>
                                                </table>
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
    </script>
</body>

</html>
<div class="card-body">
    <table id="example1" class="table table-responsive-sm table-responsive-md table-responsive-lg table-bordered table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>fname</th>
                <th>email</th>
                <th>phone number</th>
                <th>password</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM register";
            $query_run = mysqli_query($con, $query);
            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $row) {
            ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phoneno']; ?></td>
                        <td><?php echo $row['pwd']; ?></td>
                        <td>
                            <a href="rgupdate.php?rg_id=<?php echo $row['id']; ?>" class="btn btn-success">edit</a>
                        </td>
                        <td>
                            <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-danger deletebtn">delete</button>
                        </td>
                    </tr>
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
        </tbody>
    </table>