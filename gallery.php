<?php
include('dbcon.php');
// include('header.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>gallery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="navbar1.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://kit.fontawesome.com/a2a10e501a.js" crossorigin="anonymous"></script>
  <!-- css file -->
  <!--carousel-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- icon script -->
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <style>
    .text-center{
      padding-top: 10px;

    }
    #content {
      width: 50%;
      justify-content: center;
      align-items: center;
      margin: 20px auto;
      border: 1px solid #cbcbcb;
    }

    form {
      width: 50%;
      margin: 20px auto;
    }
h6{
  font-size: 15px;
}
    #display-image {
      width: 100%;
      justify-content: center;
      /* padding-right: 10px; */
      margin: 15px;
    }

    img {
      /* margin: 5px;
    width: 350px;
    height: 250px; */
    }

    .img_size {
      width: 250px;
      height: 200px;
      padding: 15px;
    }
.img_size:hover {
  -ms-transform: scale(1.2); /* IE 9 */
  -webkit-transform: scale(1.2); /* Safari 3-8 */
  transform: scale(1.2); 
  transition: 0.3s;
}
    .img_left {
      padding: 5px;
      width: 250px;
    }

    .sec_space {
      padding: 60px;
    }
    .b_size{
      padding-left:130px ;
     
    }
    .nav-tabs{
      width:900px;
    }
    @media(max-width:950px) {
      .nav-tabs{
      width:500px;
    }
    }
    @media(max-width:450px) {
      .nav-tabs{
      width:300px;
    }
    }
    .btn_desing{
            background: transparent;
            border: 2px solid #EE4C7C;
            border-radius: 15px;
            color: #EE4C7C;
            text-transform: uppercase;
            font-size: 16px;
            letter-spacing: 2px;
            cursor: pointer;
            padding: 10px 20px;
            position: relative;
            transition: 0.5s ease-in-out;
            
        }
        .btn_desing::before{
            content: '';
            position: absolute;
            border-radius: 13px;
            inset: 0;
            background: #EE4C7C;
            z-index: -1;
            clip-path: circle(0% at 50% 50%);
            transition: 0.7s ease-in-out;
        }
        .btn_desing:hover{
            color: black;
           
        }
        .btn_desing:hover::before{
            clip-path: circle(100% at 50% 50%);
        }
        .sec1_contact {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 1, 0.7)), url(assets/wedding3.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        /* background-attachment: fixed; */
        background-position: center;
        padding: 150px 100px;
        height: 200px;
        padding-top: 150px;

    }

    .con_h1 {
        text-align: left;
        font-size: 60px;
        color: white;
        font-weight: bold;
        bottom: 70%;
        text-align: center;

    }

    .con_h1:hover {
        color: #EE4C7C;
    }

  </style>
</head>

<body>
  <div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
        <div class="logo"><a href="home.php"> <img src="assets/logo.png" alt="" class="logoimage"></a></div>
        <ul class="links">
          <li><a href="home.php">Home</a></li>
          <li><a href="aboutus.php">About</a></li>
          <li><a href="gallery.php">Gallery</a></li>
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
                  <li><a href="wedservice.php">
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
                  <li><a href="engservice.php">
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
                  <li><a href="birthservice.php">
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
                  <li><a href="musicservice.php">
                      <?php echo $rows['events']; ?>
                    </a></li>
              <?php
                }
              }
              ?>

            </ul>
          </li>
          <li><a href="contactus.php">Contact us</a></li>
          <li><a href="client/myprofile.php">
              <i class="fa-light fa-solid fa-circle-user"></i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <section class="sec1_contact">
        <div class="container">
            <h1 class="con_h1">Gallery</h1>
        </div>
    </section>
  <div class="container-fluid b_size py-5">
    <ul class="container-fluid nav nav-tabs">
      <li class="active"><a type="button" class="btn_desing" data-toggle="tab" href="#home">All</a></li>
      <li><a type="button" class="btn_desing" data-toggle="tab" href="#menu1">Wedding</a></li>
      <li><a type="button" class="btn_desing" data-toggle="tab" href="#menu2">Engagement</a></li>
      <li><a type="button" class="btn_desing" data-toggle="tab" href="#menu3">Birthday Party</a></li>
      <li><a type="button" class="btn_desing" data-toggle="tab" href="#menu4">Music Concert</a></li>
    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3></h3>
        <div class="card-body">
          <div class="row">
            <!-- <div class='list-group gallery'> -->
            <?php
            $query = " select * from gallery";
            $result = mysqli_query($con, $query);
            while ($data = mysqli_fetch_assoc($result)) {
              $id = $data['id'];
              $filename = $data['filename'];
            ?>
              <div class="col-lg-4 col-md-3 img_left">
                <img alt="" src="admin/image/<?php echo $data['filename']; ?>" class="img_size" />
              </div>


            <?php } ?>

            <!-- </div> list-group / end -->
          </div>
        </div>
      </div>
      <div id="menu1" class="tab-pane fade">
        <h3>Wedding</h3>
        <div class="card-body">
          <div class="row">
            <!-- <div class='list-group gallery'> -->
            <?php
            $query = " select * from gallery where event='wedding'";
            $result = mysqli_query($con, $query);
            while ($data = mysqli_fetch_assoc($result)) {
              $id = $data['id'];
              $filename = $data['filename'];
            ?>
              <div class="col-lg-4 col-md-3 img_left">
                <img alt="" src="admin/image/<?php echo $data['filename']; ?>" class="img_size" />
              </div>


            <?php } ?>

            <!-- </div> list-group / end -->
          </div>
        </div>
      </div>
      <div id="menu2" class="tab-pane fade">

        <h3>Engagement</h3>
        <div class="card-body">
          <div class="row">
            <!-- <div class='list-group gallery'> -->
            <?php
            $query = " select * from gallery where event='engagement'";
            $result = mysqli_query($con, $query);
            while ($data = mysqli_fetch_assoc($result)) {
              $id = $data['id'];
              $filename = $data['filename'];
            ?>
              <div class="col-lg-4 col-md-3 img_left">
                <img alt="" src="admin/image/<?php echo $data['filename']; ?>" class="img_size" />
              </div>


            <?php } ?>

            <!-- </div> list-group / end -->
          </div>
        </div>
      </div>
      <div id="menu3" class="tab-pane fade">
        <h3>Birthday Party</h3>
        <div class="card-body">
          <div class="row">
            <!-- <div class='list-group gallery'> -->
            <?php
            $query = " select * from gallery where event='birthday party'";
            $result = mysqli_query($con, $query);
            while ($data = mysqli_fetch_assoc($result)) {
              $id = $data['id'];
              $filename = $data['filename'];
            ?>
              <div class="col-lg-4 col-md-3 img_left">
                <img alt="" src="admin/image/<?php echo $data['filename']; ?>" class="img_size" />
              </div>


            <?php } ?>

            <!-- </div> list-group / end -->
          </div>
        </div>
      </div>
      <div id="menu4" class="tab-pane fade">
        <h3>Music Concert</h3>
        <div class="card-body">
          <div class="row">
            <!-- <div class='list-group gallery'> -->
            <?php
            $query = " select * from gallery where event='music concert'";
            $result = mysqli_query($con, $query);
            while ($data = mysqli_fetch_assoc($result)) {
              $id = $data['id'];
              $filename = $data['filename'];
            ?>
              <div class="col-lg-4 col-md-3 img_left">
                <img alt="" src="admin/image/<?php echo $data['filename']; ?>" class="img_size" />
              </div>


            <?php } ?>

            <!-- </div> list-group / end -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include('footer.php');
  ?>