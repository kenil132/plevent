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
  <div class="modal fade" id="AddservicesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Services</h1>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
        </div>
        <form action="rguser.php" method="POST">
          <div class="modal-body">
            <div class="form-group">
              Package name
              <input type="text" name="pname" class="form-control" required>
              Services
              <input type="text" name="services" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
            <button type="submit" name="addservice" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="updateprice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Services</h1>
          <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
        </div>
        <form action="rguser.php" method="POST">
          <div class="modal-body">
            <div class="form-group">
              Package name
              <input type="text" name="pname" class="form-control" required>
              Package Price
              <input type="text" name="price" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
            <button type="submit" name="updateprice" class="btn btn-primary">Save</button>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete package</h1>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
        </div>
        <form action="rguser.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_id" class="delete_user_id">
            <p>Are You Sure To Delete This Data ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
            <button type="submit" name="packagedelete" class="btn btn-primary">confirm</button>
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
            <li class="breadcrumb-item active">event </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <h1 style="text-align:center;font-size:45px;">SERVICES</H1><br>
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
  <!-- services -->
  <div class="card container-fluid">
    <div class="card-header">
      <h1 class="card-title">Packages & Services</h1>
      <a href="#" data-toggle="modal" data-target="#AddservicesModal" class="btn btn-primary float-right">Add Services</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example" class="table table-striped table-bordered table-sm table-responsive-sm table-responsive-md table-responsive-lg " cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>id </th>
            <th>Packages </th>
            <th>Services</th>
            <th>delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM packages";
          $query_run = mysqli_query($con, $query);
          if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $row) {
          ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['pname']; ?></td>
                <td><?php echo $row['services']; ?></td>
                <!-- <td><?php echo $row['phoneno']; ?></td>
                <td><?php echo $row['pwd']; ?></td>
                <td> -->
                <!-- <a href="rgupdate.php?rg_id=<?php echo $row['id']; ?>" class="btn btn-success">edit</a>
                </td> -->
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
  </div>
  <br>
  <h1 style="text-align:center;font-size:50px;">PACKAGES & PRICE</H1><br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h1 class="card-title">Wedding</h1>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm table-responsive-sm table-responsive-md table-responsive-lg " cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>id </th>
                  <th>Event name </th>
                  <th>Packages</th>
                  <th>price</th>
                  <th>price</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM events WHERE e_id='1'";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $row) {
                ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['ename']; ?></td>
                      <td><?php echo $row['pname']; ?></td>
                      <td><?php echo $row['price']; ?></td>

                      <td> <a href="prupdate.php?rg_id=<?php echo $row['id']; ?>" class="btn btn-success">edit</a>
                      </td>
                      <!-- <td>
                  <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-danger deletebtn">delete</button>
                </td> -->
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
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h1 class="card-title">Engagement</h1>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm table-responsive-sm table-responsive-md table-responsive-lg " cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>id </th>
                  <th>Event name </th>
                  <th>Packages</th>
                  <th>price</th>
                  <th>price</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM events WHERE e_id='2'";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $row) {
                ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['ename']; ?></td>
                      <td><?php echo $row['pname']; ?></td>
                      <td><?php echo $row['price']; ?></td>

                      <td> <a href="prupdate.php?rg_id=<?php echo $row['id']; ?>" class="btn btn-success">edit</a>
                      </td>
                      <!-- <td>
                  <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-danger deletebtn">delete</button>
                </td> -->
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
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h1 class="card-title">Birthday Party</h1>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm table-responsive-sm table-responsive-md table-responsive-lg " cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>id </th>
                  <th>Event name </th>
                  <th>Packages</th>
                  <th>price</th>
                  <th>price</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM events WHERE e_id='3'";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $row) {
                ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['ename']; ?></td>
                      <td><?php echo $row['pname']; ?></td>
                      <td><?php echo $row['price']; ?></td>

                      <td> <a href="prupdate.php?rg_id=<?php echo $row['id']; ?>" class="btn btn-success">edit</a>
                      </td>
                      <!-- <td>
                  <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-danger deletebtn">delete</button>
                </td> -->
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
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h1 class="card-title">Music Concert</h1>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm table-responsive-sm table-responsive-md table-responsive-lg " cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>id </th>
                  <th>Event name </th>
                  <th>Packages</th>
                  <th>price</th>
                  <th>price</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM events WHERE e_id='4'";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $row) {
                ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['ename']; ?></td>
                      <td><?php echo $row['pname']; ?></td>
                      <td><?php echo $row['price']; ?></td>

                      <td> <a href="prupdate.php?rg_id=<?php echo $row['id']; ?>" class="btn btn-success">edit</a>
                      </td>
                      <!-- <td>
                  <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-danger deletebtn">delete</button>
                </td> -->
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
        </div>
      </div>
    </div>
    
  </div>
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
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<?php include('includes/footer.php'); ?>