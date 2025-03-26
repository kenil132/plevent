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
            <button type="submit" name="deleteclientbtn" class="btn btn-primary">confirm</button>
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
            <li class="breadcrumb-item active">Bookings</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <h1 style="text-align:center;font-size:45px;">BOOKINGS</H1><br>
  <?php
  // if (isset($_SESSION['status'])) {
  //   echo "<h4>" . $_SESSION['status'] . "</h4>";
  //   unset($_SESSION['status']);
  // }
  ?>
  <?php
  ?>

  <div class="card container-fluid">
    <div class="card-header">
      <h2 class="card-title">Bookings for event</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="dtBasicExample" class="table table-striped table-bordered table-responsive-sm table-responsive-md table-responsive-lg results table-sm" cellspacing="0" width="100%">
  <thead>
  <tr>
            <!-- <th>id</th> -->
            <th>Coustomer id</th>
            <th>Client name</th>
            <th>Event</th>
            <th>Package</th>
            <th>Event date</th>
            <!-- <th class="col-md-3 col-xs-3">Venue</th> -->
            <th>Phone no</th>
            <th>Payment Status</th>
            <!-- <th>Payment id</th> -->
            <!-- <th>Payment date</th> -->
            <th>Price</th>
            <th>Order status</th>
            <th>Action</th>
          </tr>
  </thead>
  <tbody>
  <?php
        $query = "SELECT * FROM booking";
        $query_run = mysqli_query($con, $query);
        if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $row) {
        ?>
          
          <tr>
                <!-- <th scope="row"><?php // echo $row['id']; 
                                      ?></th> -->
                <td><?php echo $row['customerid']; ?></td>
                <td><?php echo $row['cname']; ?></td>
                <td><?php echo $row['ename']; ?></td>
                <td><?php echo $row['pname']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <!-- <td><?php // echo $row['venue']; 
                          ?></td> -->
                <td><?php echo $row['phoneno']; ?></td>
                <td><?php
                    $complete = $row['status'];
                    echo "<p id='complete'>$complete </p>" ?></td>
                <!-- <td><?php // echo // $row['payment_id']; 
                          ?></td> -->
                <!-- <td><?php // echo // $row['payment_date']; 
                          ?></td> -->
                <td><?php echo $row['price']; ?></td>
                <td><?php
                    if ($row['order_status'] == 0) {
                      echo "<p id='pending'>Pending</p>";
                    }else if ($row['order_status'] == 1) {
                      echo "<p id='Approved'>Approved</p>";
                    }else if ($row['order_status'] == 2) {
                      echo "<p id='Working'>Working</p>";
                    }else{
                      echo "<p id='Done'>Done</p>";
                    }
                    ?></td>
                <td>
                  <div class="btn-group">
                    
                    <button type="button" class="btn btn-info">
                    <a href="clientdata.php?rg_id=<?php echo $row['id']; ?>" style="text-decoration:none;color:white"> <i class="fas fa-pen-nib">  Action</i> </a>
                   
                    </button>
                    <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-danger deletebtn">
                    <i class="fas fa-trash"> delete</i> 
                  </button>
                  </div>
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
<h1 style="text-align:center;font-size:50px;">Custom event</H1><br>
<div class="card container-fluid">
    <div class="card-header">
      
      <h2 class="card-title">Custom bookings of event</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="dtBasicExample1" class="table table-striped table-bordered table-responsive-sm table-responsive-md table-responsive-lg results table-sm" cellspacing="0" width="100%">
  <thead>
  <tr>
            <!-- <th>id</th> -->
            <th>Coustomer id</th>
            <th>Client name</th>
            <th>Event</th>
            <th>Package</th>
            <th>Event date</th>
            <!-- <th class="col-md-3 col-xs-3">Venue</th> -->
            <th>Phone no</th>
            <th>Payment Status</th>
            <!-- <th>Payment id</th> -->
            <!-- <th>Payment date</th> -->
            <th>Price</th>
            <th>Order status</th>
            <th>Action</th>
          </tr>
  </thead>
  <tbody>
  <?php
        $query = "SELECT * FROM custom_event";
        $query_run = mysqli_query($con, $query);
        if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $row) {
        ?>
          
          <tr>
                <!-- <th scope="row"><?php // echo $row['id']; 
                                      ?></th> -->
                <td><?php echo $row['customerid']; ?></td>
                <td><?php echo $row['cname']; ?></td>
                <td><?php echo $row['ename']; ?></td>
                <td><?php echo $row['pname']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <!-- <td><?php // echo $row['venue']; 
                          ?></td> -->
                <td><?php echo $row['phoneno']; ?></td>
                <td><?php
                    $complete = $row['status'];
                    echo "<p id='complete'>$complete </p>" ?></td>
                <!-- <td><?php // echo // $row['payment_id']; 
                          ?></td> -->
                <!-- <td><?php // echo // $row['payment_date']; 
                          ?></td> -->
                <td><?php echo $row['price']; ?></td>
                <td><?php
                    if ($row['order_status'] == 0) {
                      echo "<p id='pending'>Pending</p>";
                    }else if ($row['order_status'] == 1) {
                      echo "<p id='Approved'>Approved</p>";
                    }else if ($row['order_status'] == 2) {
                      echo "<p id='Working'>Working</p>";
                    }else{
                      echo "<p id='Done'>Done</p>";
                    }
                    ?></td>
                <td>
                  <div class="btn-group">
                    
                    <button type="button" class="btn btn-info">
                    <a href="customclientdata.php?rg_id=<?php echo $row['id']; ?>" style="text-decoration:none;color:white"> <i class="fas fa-pen-nib">  Action</i> </a>
                   
                    </button>
                    <button type="button" value="<?php echo $row['id'];?>" class="btn btn-danger deletebtn1">
                    <i class="fas fa-trash"> delete</i> 
                  </button>
                  </div>
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
<script>
  $(document).ready(function() {
    $('#dtBasicExample1').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });
</script>
<?php include('includes/footer.php'); ?>