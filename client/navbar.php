<?php include('includes/header.php');
include('config/dbcon.php');
?>
<div class="wrapper">
  <nav>
    <input type="checkbox" id="show-search">
    <input type="checkbox" id="show-menu">
    <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
    <div class="content">
      <div class="logo"><a href="../home.php"> <img src="assets/logo.png" alt="" class="logoimage"></a></div>
      <ul class="links">
        <li><a href="../home.php">Home</a></li>
        <li><a href="../aboutus.php">About</a></li>
        <li><a href="../gallery.php">Gallery</a></li>
        <li>
          <a href="#" class="desktop-link">Events</a>
          <input type="checkbox" id="show-features">
          <label for="show-features">Events</label>
          <ul>
            <?php
            $query = "SELECT * FROM eventname WHERE id=1";
            $query_run = mysqli_query($con, $query);
            if (mysqli_num_rows($query_run) > 0) {
              foreach ($query_run as $rows) {
            ?>
                <li><a href="../wedservice.php">
                    <?php echo $rows['events']; ?>
                  </a></li>
            <?php
              }
            }
            ?>
            <?php
            $query = "SELECT * FROM eventname WHERE id=2";
            $query_run = mysqli_query($con, $query);
            if (mysqli_num_rows($query_run) > 0) {
              foreach ($query_run as $rows) {
            ?>
                <li><a href="../wedservice.php">
                    <?php echo $rows['events']; ?>
                  </a></li>
            <?php
              }
            }
            ?>
            <?php
            $query = "SELECT * FROM eventname WHERE id=3";
            $query_run = mysqli_query($con, $query);
            if (mysqli_num_rows($query_run) > 0) {
              foreach ($query_run as $rows) {
            ?>
                <li><a href="../wedservice.php">
                    <?php echo $rows['events']; ?>
                  </a></li>
            <?php
              }
            }
            ?>
            <?php
            $query = "SELECT * FROM eventname WHERE id=4";
            $query_run = mysqli_query($con, $query);
            if (mysqli_num_rows($query_run) > 0) {
              foreach ($query_run as $rows) {
            ?>
                <li><a href="../wedservice.php">
                    <?php echo $rows['events']; ?>
                  </a></li>
            <?php
              }
            }
            ?>

          </ul>
        </li>
        <li><a href="../contactus.php">Contact us</a></li>
        <li><a href="myprofile.php">
            <i class="fa-light fa-solid fa-circle-user"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</div>