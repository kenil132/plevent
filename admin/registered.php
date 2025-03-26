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
            <button type="submit" name="deleteuserbtn" class="btn btn-primary">confirm</button>
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
          <!-- <h1 class="m-0">USER DATA</h1> -->
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Manage user</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <h1 style="text-align:center;font-size:45px;">USER DATA</H1><br>
  <?php
  if (isset($_SESSION['status'])) {
    echo "<h4>" . $_SESSION['status'] . "</h4>";
    unset($_SESSION['status']);
  }
  ?>
  <?php
  //   if (isset($_REQUEST['msg'])) {
  //     $msg = $_REQUEST['msg'];
  //     if ($msg > 0)
  //         echo "<script>alert('register sucesssfull')</script>";
  //     else
  //         echo "<script>alert('register umsucesssfull')</script>";
  // }
  ?>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Registered user</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="dtBasicExample" class="table table-striped table-bordered table-responsive-sm table-responsive-md table-responsive-lg results table-sm" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>id</th>
            <th>fname</th>
            <th>email</th>
            <th>birth date</th>
            <th>city</th>
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
                <td><?php echo $row['bdate']; ?></td>
                <td><?php echo $row['city']; ?></td>
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

    </div>
    <!-- /.card-body -->
  </div>
</div>
<?php include('includes/script.php'); ?>
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
<script>
  $(document).ready(function() {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });
</script>
<?php include('includes/footer.php'); ?>