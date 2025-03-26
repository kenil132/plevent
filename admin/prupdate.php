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
                <h1 class="m-0">Package pricing</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">edit price</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Package price</h3>
            <a href="event.php" class="btn btn-danger float-right">back</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="rguser.php" method="POST">
                        <div class="modal-body">
                            <?php
                            if (isset($_GET['rg_id'])) {
                                $rg_id = $_GET['rg_id'];
                                // echo $rg_id;
                                $query = "SELECT * FROM events WHERE id='$rg_id' LIMIT 1";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                            ?>
                                        <div class="form-group">

                                            <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                                        </div>
                                        <div class="form-group">
                                            Event name
                                            <input type="text" name="ename" class="form-control" value="<?php echo $row['ename']; ?>" readonly>
                                            Package Name
                                            <input type="email" name="pname" class="form-control" value="<?php echo $row['pname']; ?>" readonly>
                                            Package amount
                                            <input type="text" name="price" class="form-control" value="<?php echo $row['price']; ?>">
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

            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button> -->
                <button type="submit" name="updateprice" class="btn btn-primary">Update</button>
            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>