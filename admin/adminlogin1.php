<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <title>Login Form | CodingLab</title> -->
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: #F3F9FB;
      overflow: hidden;
    }

    ::selection {
      background: rgba(26, 188, 156, 0.3);
    }

    .container {
      max-width: 440px;
      padding: 0 20px;
      margin: 170px auto;
    }

    .wrapper {
      width: 100%;
      background: #fff;
      border-radius: 5px;
      box-shadow: 0px 4px 10px 1px rgba(0, 0, 0, 0.1);
    }

    .wrapper .title {
      height: 90px;
      background: #226597;
      border-radius: 5px 5px 0 0;
      color: #fff;
      font-size: 30px;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .wrapper form {
      padding: 30px 25px 25px 25px;
    }

    .wrapper form .row {
      height: 45px;
      margin-bottom: 15px;
      position: relative;
    }

    .wrapper form .row input {
      height: 100%;
      width: 100%;
      outline: none;
      padding-left: 60px;
      border-radius: 5px;
      border: 1px solid lightgrey;
      font-size: 16px;
      transition: all 0.3s ease;
    }

    form .row input:focus {
      border-color: #226597;
      box-shadow: inset 0px 0px 2px 2px rgba(26, 188, 156, 0.25);
    }

    form .row input::placeholder {
      color: #999;
    }

    .wrapper form .row i {
      position: absolute;
      width: 47px;
      height: 100%;
      color: #fff;
      font-size: 18px;
      background: #226597;
      border: 1px solid #226597;
      border-radius: 5px 0 0 5px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .wrapper form .pass {
      margin: -8px 0 20px 0;
    }

    .wrapper form .pass a {
      color: #226597;
      font-size: 17px;
      text-decoration: none;
    }

    .wrapper form .pass a:hover {
      text-decoration: underline;
    }

    .wrapper form .button input {
      color: #fff;
      font-size: 20px;
      font-weight: 500;
      padding-left: 0px;
      background: #226597;
      border: 1px solid #226597;
      cursor: pointer;
    }

    form .button input:hover {
      background: #113F67;
    }

    .wrapper form .signup-link {
      text-align: center;
      margin-top: 20px;
      font-size: 17px;
    }

    .wrapper form .signup-link a {
      color: #226597;
      text-decoration: none;
    }

    form .signup-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <?php
  // $rand = rand(9999, 1000);
  // if (isset($_REQUEST['msg'])) {
  //   $msg = $_REQUEST['msg'];
  //   if ($msg > 0)
  //     echo "<script>alert('register sucesssfull')</script>";
  //   else
  //     echo "<script>alert('register unsucesssfull')</script>";
  // }
  // if (isset($_REQUEST['cm'])) {
  //   $cm = $_REQUEST['cm'];
  //   if ($cm > 0)
  //       echo "<script>alert('email alredy tacken')</script>";
  //   else
  //       echo "<script>alert('availabele')</script>";
  // }

  // if (isset($_SESSION['status'])) {
  //   echo "<h4>" . $_SESSION['status'] . "</h4>";
  //   unset($_SESSION['status']);
  // }

  include('config/dbcon.php');
  if (isset($_POST['log'])) {
    $adminid = $_POST['adminid'];
    $pwd = $_POST['pwd'];
    $adminid_search = "select * from admin where adminid='$adminid' ";
    $query = mysqli_query($con, $adminid_search);
    $e_count = mysqli_num_rows($query);
    if ($e_count) {
      $e_pass = mysqli_fetch_assoc($query);
      $db_pass = $e_pass['pwd'];

      $_SESSION['adminname'] = $e_pass['adminname'];
      $_SESSION['adminid'] = $e_pass['adminid'];
      // $pass_decode = password_verify($ppwd,$db_pass);
      if ($pwd == $db_pass) {
        echo "Login Successfully.";
  ?>
        <script>
          location.replace('index.php');
        </script>
      <?php
      } else {
        //echo "Password Incorrect";
      ?>
        <script>
          alert("Password Incorrect");
        </script>
      <?php
      }
    } else {
      //echo "Invalid adminid";
      ?>
      <script>
        alert("Invalid adminid");
      </script>
  <?php
    }
  }
  ?>
  <div class="container">
    <div class="wrapper">
      <div class="title"><span>Admin Login</span></div>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="text" name="adminid" placeholder="adminid or Phone" required>
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" name="pwd" placeholder="Password" required>
        </div>
        <!-- <div class="pass"><a href="#">Forgot password?</a></div> -->
        <div class="row button">
          <input type="submit" name="log" value="Login">
        </div>
        <div class="row button">
          <a type="button" href="../index.php" name="back" value="Back">back</a>
        </div>
        <!-- <div class="signup-link">Not a member? <a href="#">Signup
                            now</a></div> -->
      </form>
    </div>
  </div>

</body>

</html>