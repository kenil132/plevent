<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
<!-- <div class="content-wrapper"> -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Client Data</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Client data</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="card">
        <div class="card-header">
            <!-- <h3 class="card-title">Client data</h3> -->
            <a href="booking.php" class="btn btn-danger float-right">back</a>
        </div>
        <div class="card-body">
            <form action="rguser.php" method="POST">
                <div class="modal-body">
                    <?php
                    if (isset($_GET['rg_id'])) {
                        $rg_id = $_GET['rg_id'];
                        // echo $rg_id;
                        $query = "SELECT * FROM booking WHERE id='$rg_id' LIMIT 1";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $row) {
                    ?>
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>" readonly>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12"><br>
                                        Customer Id
                                        <input type="text" name="customerid" class="form-control" value="<?php echo $row['customerid']; ?>" readonly>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12"><br>
                                        Client Name
                                        <input type="text" name="cname" class="form-control" value="<?php echo $row['cname']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-12"><br>
                                        Event Name
                                        <input type="text" name="ename" class="form-control" value="<?php echo $row['ename']; ?>" readonly>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12"><br>
                                        Package
                                        <input type="text" name="pname" class="form-control" value="<?php echo $row['pname']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12"><br>
                                        Event held on
                                        <input type="text" name="date" class="form-control" value="<?php echo $row['date']; ?>" readonly>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12"><br>
                                        Venue
                                        <input type="text" name="venue" class="form-control" value="<?php echo $row['venue']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12"><br>
                                        Contact No
                                        <input type="text" name="phoneno" class="form-control" value="<?php echo $row['phoneno']; ?>" readonly>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12"><br>
                                        Payment Status
                                        <input type="text" name="status" class="form-control" value="<?php echo $row['status']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12"><br>
                                        Payment ID
                                        <input type="text" name="payment_id" class="form-control" value="<?php echo $row['payment_id']; ?>" readonly>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12"><br>
                                        Payment_date : <?php echo $row['payment_date']; ?>
                                        <input type="text" name="payment_date" class="form-control" value="<?php echo $row['payment_date']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12"><br>
                                        Price
                                        <input type="text" name="price" class="form-control" value="<?php echo $row['price']; ?>" readonly>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12"><br>

                                        Order Status
                                        <select name="order_status" class="form-control" required>
                                            <option value="0" <?php $row['order_status'] == 0 ? "selected" : "" ?>><?php
                                                                                                                    if ($row['order_status'] == 0) {
                                                                                                                        echo "<p id='pending'>Pending</p>";
                                                                                                                    } else if ($row['order_status'] == 1) {
                                                                                                                        echo "<p id='Approved'>Approved</p>";
                                                                                                                    } else if ($row['order_status'] == 2) {
                                                                                                                        echo "<p id='Working'>Working</p>";
                                                                                                                    } else {
                                                                                                                        echo "<p id='Done'>Done</p>";
                                                                                                                    }
                                                                                                                    ?></option>
                                            <option value="0" <?php $row['order_status'] == 0 ? "selected" : "" ?>>Pending</option>
                                            <option value="1" <?php $row['order_status'] == 1 ? "selected" : "" ?>>Approved</option>
                                            <option value="2" <?php $row['order_status'] == 2 ? "selected" : "" ?>>Working</option>
                                            <option value="3" <?php $row['order_status'] == 3 ? "selected" : "" ?>>Done</option>
                                        </select>
                                        <br>
                                        <!-- <div class="modal-footer"> -->
                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button> -->
                                        <button type="submit" name="updateorderstatus" class="btn btn-primary">Update</button>
                                        <!-- </div> -->
                                    </div>
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
                    }
    ?>


            </form>
        </div>
    </div>
</div>
</div>
</div>
<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>