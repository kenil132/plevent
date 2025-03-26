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
        echo "<script>alert('added sucesssfull')</script>";
    else
        echo "<script>alert('added unsucesssfull')</script>";
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
    <div class="modal fade" id="AddadminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add admin</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <form action="rguser.php" method="POST">
                    <div class="modal-body">

                        <div class="form-group">
                            Admin name
                            <input type="text" id="adminname"name="adminname" class="form-control">
                            Adminid
                            <input type="email" name="adminid" id="adminid" class="form-control">
                            password
                            <input type="password" name="pwd" id="pwd"class="form-control"><br>
                            <div id="pwd-error" class="invalid-feedback" style="color: red;"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                        <button type="submit" name="addadmin" class="btn btn-primary">Add</button>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">delete User</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <form action="rguser.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" class="delete_user_id">
                        <p>are you sure to delete this data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                        <button type="submit" name="deleteadmintbtn" class="btn btn-primary">confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete custom modal -->
    <div class="modal fade" id="deletemodal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">delete User</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <form action="rguser.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" class="delete_user_id">
                        <p>are you sure to delete this data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                        <button type="submit" name="deleteclientbtn1" class="btn btn-primary">confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- content header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <h1 style="text-align:center;font-size:45px;">ADMIN DATA</H1><br>
    <?php
    if (isset($_SESSION['status'])) {
        echo "<h4>" . $_SESSION['status'] . "</h4>";
        unset($_SESSION['status']);
    }
    ?>
    <?php
    ?>

    <div class="card container-fluid">
        <div class="card-header">
            <h2 class="card-title">Admin</h2>
            <a href="#" data-toggle="modal" data-target="#AddadminModal" class="btn btn-primary float-right">Add Admin</a>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <span class="counter pull-right"></span>
            <table id="dtBasicExample" class="table table-striped table-bordered table-responsive-sm table-responsive-md table-responsive-lg results table-sm" cellspacing="0" width="100%">
            <!-- <table class="table table-hover table-bordered table-responsive-sm table-responsive-md table-responsive-lg results"> -->
                <thead>
                    <tr>
                        <!-- <th>id</th> -->

                        <th>Admin name</th>
                        <th>Admin id</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                        <tbody>
                        <?php
                $query = "SELECT * FROM admin";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {
                ?>
                            <tr>
                                <!-- <th scope="row"><?php // echo $row['id']; 
                                                        ?></th> -->
                                <td><?php echo $row['adminname']; ?></td>
                                <td><?php echo $row['adminid']; ?></td>
                                <td><?php echo $row['pwd']; ?></td>
                                <td>

                                    <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-danger deletebtn">
                                        <i class="fas fa-trash"> delete</i>
                                    </button>

                                </td>
                            </tr>
                    <?php
                    }
                }
                    ?>
                        </tbody>
            </table>
        </div>
    </div>

</div>
<?php include('includes/script.php'); ?>
<script>
		// Document is ready
		$(document).ready(function() {
			// adminid validation
			const adminid = document.getElementById("adminid");
			adminid.addEventListener("blur", () => {
				let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
				let s = adminid.value;
				if (regex.test(s)) {
					adminid.classList.remove("is-invalid");
					adminidError = true;
				} else {
					adminid.classList.add("is-invalid");
					adminidError = false;
				}
			});

			// first name 
			$('#adminname').on('input', function() {
				var adminname = $(this).val();
				var length = adminname.length;
				 if (length < 3 || length > 10) {
					$('#adminname-error').html('length of adminname must be between 3 and 10');
					$('#adminname').addClass('is-invalid');
				} else {
					$('#adminname-error').html('');
					$('#adminname').removeClass('is-invalid');
				}
			});

			// password 
			$('#pwd').on('input', function() {
				var pwd = $(this).val();
				var length = pwd.length;
				var hasUpperCase = /[A-Z]/.test(pwd);
				var hasLowerCase = /[a-z]/.test(pwd);
				var hasNumbers = /\d/.test(pwd);
				var hasSpecialChars = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(pwd);

				if (length < 8 || !hasUpperCase || !hasLowerCase || !hasNumbers || !hasSpecialChars) {
					$('#pwd-error').html('pwd must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.');
					$('#pwd').addClass('is-invalid');
				} else {
					$('#pwd-error').html('');
					$('#pwd').removeClass('is-invalid');
				}
			});

			// Submit button
			$("#submitbtn").click(function() {
				validateadminname();
				validatepwd();
				validateadminid();
				if (
					adminnameError == true &&
					pwdError == true &&
					adminidError == true

				) {
					return true;
				} else {
					return false;
				}
			});
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
        $('.deletebtn1').click(function(e) {
            e.preventDefault();
            var rg_id = $(this).val();
            // console.log(rg_id);
            $('.delete_user_id').val(rg_id);
            $('#deletemodal1').modal('show');
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