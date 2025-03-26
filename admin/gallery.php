<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
<?php
if (isset($_REQUEST['msg'])) {
    $msg = $_REQUEST['msg'];
    if ($msg > 0)
        echo "<script>alert('update sucesssfull')</script>";
    else
        echo "<script>alert('update unsucesssfull')</script>";
}

if (isset($_REQUEST['delete'])) {
    $delete = $_REQUEST['delete'];
    if ($delete > 0)
        echo "<script>alert('delete sucesssfull')</script>";
    else
        echo "<script>alert('delete unsucesssfull')</script>";
}
?>
<div class="content-header">
    <!-- Modal -->
    <div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <form action="rguser.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            id
                            <input type="text" name="id" class="form-control">
                        </div>
                        <div class="form-group">
                            first name
                            <input type="text" name="fname" class="form-control">
                            email
                            <input type="email" name="email" class="form-control">
                            phone number
                            <input type="text" name="phoneno" class="form-control">
                            password
                            <input type="password" name="pwd" class="form-control"><br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                        <button type="submit" name="adduser" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete modal -->
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">delete photo</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <form action="rguser.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" class="delete_user_id">
                        <p>are you sure to delete this data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                        <button type="submit" name="deleteimg" class="btn btn-primary">confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    // error_reporting(0);

    // $msg = "";

    // // If upload button is clicked ...
    // if (isset($_POST['upload'])) {

    //     $filename = $_FILES["uploadfile"]["name"];
    //     $event = $_POST['event'];
    //     $tempname = $_FILES["uploadfile"]["tmp_name"];
    //     $folder = "./image/" . $filename;

    //     $db = mysqli_connect("localhost", "root", "", "event");

    //     // Get all the submitted data from the form
    //     $sql = "INSERT INTO gallery (event,filename) VALUES ('$event','$filename')";

    //     // Execute query
    //     mysqli_query($db, $sql);

    //     // Now let's move the uploaded image into the folder: image
    //     if (move_uploaded_file($tempname, $folder)) {
    //         echo "<h3>  Image uploaded successfully!</h3>";
    //     } else {
    //         echo "<h3>  Failed to upload image!</h3>";
    //     }
    // }
    ?>

    <!-- content header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <h1 style="text-align:center;font-size:45px;">Gallery</H1><br>
    <?php
    // if (isset($_SESSION['status'])) {
    //     echo "<h4>" . $_SESSION['status'] . "</h4>";
    //     unset($_SESSION['status']);
    // }
    ?>

    <div class="card container-fluid">
        <div class="card-header">
            <h2 class="card-title">Add images</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="content">
                <form method="POST" action="upload.php" enctype="multipart/form-data">
                    <?php if (!empty($_SESSION['error'])) { ?>
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> enter image<br><br>
                            <ul>
                                <li><?php echo $_SESSION['error']; ?></li>
                            </ul>
                        </div>
                    <?php unset($_SESSION['error']);
                    } ?>

                    <?php if (!empty($_SESSION['error'])) { ?>
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                <li><?php echo $_SESSION['error']; ?></li>
                            </ul>
                        </div>
                    <?php unset($_SESSION['error']);
                    } ?>

                    <!-- code to show success message  -->
                    <?php if (!empty($_SESSION['success'])) { ?>
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong><?php echo $_SESSION['success']; ?></strong>
                        </div>
                    <?php unset($_SESSION['success']);
                    } ?>
                    <div class="form-group">
                                <div class="input-control">
                                    <span class="lbl">
                                    Event Name
                                    </span>
                                    <select name="event" id="ename" class="browser-default custom-select form-control inp" required>
                                        <option value="">Select An Event</option>
                                        <option value="Wedding">Wedding</option>
                                        <option value="Engagement">Engagement</option>
                                        <option value="Birthday Party">Birthday Party</option>
                                        <option value="Music Concert">Music Concert</option>
                                    </select>
                                </div>
                            </div>
                    <div class="form-group">
                        <input class="form-control" type="file" name="uploadfile" value="" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card container-fluid">
        <div class="card-header">
            <h2 class="card-title">Wedding images</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class='list-group gallery' style="width:100%;">
                    <?php
                    $query = " select * from gallery where event='wedding'";
                    $result = mysqli_query($con, $query);
                    while ($data = mysqli_fetch_assoc($result)) {
                        $id = $data['id'];
                        $filename = $data['filename'];
                    ?>
                        <div class='col-sm-3' style="float: left;">
                            <a class="thumbnail fancybox" rel="ligthbox" href="image/<?php echo $data['filename']; ?>">
                                <img alt="" src="image/<?php echo $data['filename']; ?>" class="img_size" />
                                <div class='text-center'>
                                    <small class='text-muted'><?php // echo $image['title'] 
                                                                ?></small>
                                </div> <!-- text-center / end -->

                            </a>
                            <form action="rguser.php" method="POST">
                                <input type="hidden" name="deleteid" value=" <?php echo $id; ?>">
                                <input type="hidden" name="imgfile" value=" <?php echo $filename; ?>">
                                <button type="submit" title="delete" name="deleteimg" class="close-icon btn btn-danger">X<i class="glyphicon glyphicon-remove"></i></button>
                            </form>
                            <!-- form to delete image -->

                            <!-- <button type="submit" title="delete" class="close-icon btn btn-danger deletebtn" value="<?php echo $row['id']; ?>">X<i class="fas fa-x"></i></button> -->

                        </div> <!-- col-6 / end -->
                    <?php } ?>

                </div> <!-- list-group / end -->
            </div>
        </div>
    </div>

    <div class="card container-fluid">
        <div class="card-header">
            <h2 class="card-title">Engagement images</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class='list-group gallery' style="width:100%;">
                    <?php
                    $query = " select * from gallery where event='engagement'";
                    $result = mysqli_query($con, $query);
                    while ($data = mysqli_fetch_assoc($result)) {
                        $id = $data['id'];
                        $filename = $data['filename'];
                    ?>
                        <div class='col-sm-3' style="float: left;">
                            <a class="thumbnail fancybox" rel="ligthbox" href="image/<?php echo $data['filename']; ?>">
                                <img alt="" src="image/<?php echo $data['filename']; ?>" class="img_size" />
                                <div class='text-center'>
                                    <small class='text-muted'><?php // echo $image['title'] 
                                                                ?></small>
                                </div> <!-- text-center / end -->

                            </a>
                            <form action="rguser.php" method="POST">
                                <input type="hidden" name="deleteid" value=" <?php echo $id; ?>">
                                <input type="hidden" name="imgfile" value=" <?php echo $filename; ?>">
                                <button type="submit" title="delete" name="deleteimg" class="close-icon btn btn-danger">X<i class="glyphicon glyphicon-remove"></i></button>
                            </form>
                            <!-- form to delete image -->

                            <!-- <button type="submit" title="delete" class="close-icon btn btn-danger deletebtn" value="<?php echo $row['id']; ?>">X<i class="fas fa-x"></i></button> -->

                        </div> <!-- col-6 / end -->
                    <?php } ?>

                </div> <!-- list-group / end -->
            </div>
        </div>
    </div>



    <div class="card container-fluid">
        <div class="card-header">
            <h2 class="card-title">Birthday Party</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class='list-group gallery' style="width:100%;">
                    <?php
                    $query = " select * from gallery where event='birthday party'";
                    $result = mysqli_query($con, $query);
                    while ($data = mysqli_fetch_assoc($result)) {
                        $id = $data['id'];
                        $filename = $data['filename'];
                    ?>
                        <div class='col-sm-3' style="float: left;">
                            <a class="thumbnail fancybox" rel="ligthbox" href="image/<?php echo $data['filename']; ?>">
                                <img alt="" src="image/<?php echo $data['filename']; ?>" class="img_size" />
                                <div class='text-center'>
                                    <small class='text-muted'><?php // echo $image['title'] 
                                                                ?></small>
                                </div> <!-- text-center / end -->

                            </a>
                            <form action="rguser.php" method="POST">
                                <input type="hidden" name="deleteid" value=" <?php echo $id; ?>">
                                <input type="hidden" name="imgfile" value=" <?php echo $filename; ?>">
                                <button type="submit" title="delete" name="deleteimg" class="close-icon btn btn-danger">X<i class="glyphicon glyphicon-remove"></i></button>
                            </form>
                            <!-- form to delete image -->

                            <!-- <button type="submit" title="delete" class="close-icon btn btn-danger deletebtn" value="<?php echo $row['id']; ?>">X<i class="fas fa-x"></i></button> -->

                        </div> <!-- col-6 / end -->
                    <?php } ?>

                </div> <!-- list-group / end -->
            </div>
        </div>
    </div>

    <div class="card container-fluid">
        <div class="card-header">
            <h2 class="card-title">Music Party</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class='list-group gallery' style="width:100%;">
                    <?php
                    $query = " select * from gallery where event='music concert'";
                    $result = mysqli_query($con, $query);
                    while ($data = mysqli_fetch_assoc($result)) {
                        $id = $data['id'];
                        $filename = $data['filename'];
                    ?>
                        <div class='col-sm-3' style="float: left;">
                            <a class="thumbnail fancybox" rel="ligthbox" href="image/<?php echo $data['filename']; ?>">
                                <img alt="" src="image/<?php echo $data['filename']; ?>" class="img_size" /><br>
                                <div class='text-center'>
                                    <small class='text-muted'><?php // echo $image['title'] 
                                                                ?></small>
                                </div> <!-- text-center / end -->

                            </a>
                            <form action="rguser.php" method="POST">
                                <input type="hidden" name="deleteid" value=" <?php echo $id; ?>">
                                <input type="hidden" name="imgfile" value=" <?php echo $filename; ?>">
                                <button type="submit" title="delete" name="deleteimg" class="close-icon btn btn-danger">X<i class="glyphicon glyphicon-remove"></i></button>
                            </form>
                            <!-- form to delete image -->

                            <!-- <button type="submit" title="delete" class="close-icon btn btn-danger deletebtn" value="<?php echo $row['id']; ?>">X<i class="fas fa-x"></i></button> -->

                        </div> <!-- col-6 / end -->
                    <?php } ?>

                </div> <!-- list-group / end -->
            </div>
        </div>
    </div>
</div> <!-- container / end -->

</div>

<?php include('includes/script.php'); ?>
<script>
    $(document).ready(function() {
        $('.deletebtn').hover(function(e) {
            $('.deleteimg').show(100);

        });
    });
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
<script>
    $(document).ready(function() {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>
<?php include('includes/footer.php'); ?>