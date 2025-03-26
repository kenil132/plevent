<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: #e3afbc;
      overflow: hidden;
    }

    ::selection {
      background: rgba(26, 188, 156, 0.3);
    }

    .container {
      max-width: 1300px;
      padding: 0 20px;
      margin: 40px auto;
    }

    .wrapper {
      width: 100%;
      background: #fff;
      border-radius: 5px;
      box-shadow: 0px 5px 6px 8px rgba(48, 57, 66, 0.897);
    }

    .wrapper .title {
      height: 90px;
      background: #5d001e;
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
      margin-bottom: 10px;
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
      border-color: #425465;
      box-shadow: inset 0px 0px 2px 2px #a8bfd8;
    }

    form .row input::placeholder {
      color: #999;
    }

    form .row label {
      font-size: 20px;
    }

    .wrapper form .row i {
      position: absolute;
      width: 47px;
      height: 100%;
      color: #fff;
      font-size: 18px;
      background: #425465;
      border: 1px solid #425465;
      border-radius: 5px 0 0 5px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .wrapper form .pass {
      margin: -8px 0 20px 0;
    }

    /* .wrapper form .pass a {
      color: #226597;
      font-size: 17px;
      text-decoration: none;
    }

    .wrapper form .pass a:hover {
      text-decoration: underline;
    } */

    .wrapper form .button input {
      color: #fff;
      font-size: 20px;
      font-weight: 500;
      padding-left: 0px;
      background: #425465;
      border: 1px solid #425465;
      cursor: pointer;
    }

    .btn_back {
      color: #fff;
      font-size: 20px;
      font-weight: 500;
      padding-left: 0px;
      background: #425465;
      border: 1px solid #425465;
      cursor: pointer;
    }



    form .button input:hover {
      background: #5b6a79;
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

    .view_pwd {
      font-size: 20px;
    }
    #btns{
      background-color:#5d001e;
      opacity:95%;
    }
    #btns:hover{
      opacity:100%;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="wrapper">
      <div class="title"><span>Forget Password</span></div>
      <?php
      include 'dbcon.php';

      // check if form is submitted
      if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $question = mysqli_real_escape_string($con, $_POST['question']);
        $ans = mysqli_real_escape_string($con, $_POST['ans']);

        // check if the username exists in the database
        $query = "SELECT * FROM register WHERE email = '$email'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 0) {
          echo "<p class='view_pwd bg-danger large'>Username not found.</p>";
        } else {
          $row = mysqli_fetch_assoc($result);
          // check if the security question and answer match the ones stored in the database
          if ($question == $row['question'] && $ans == $row['ans']) {
            $password = $row['pwd'];
            echo " <p class='view_pwd bg-success large'> Your password is:. $password </p> ";
          } else {
            echo "  <p class='view_pwd bg-danger large'>Invalid security question or answer. </p>";
          }
        }
      }
      ?>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <br>
        <div class="row">
          <label>enter your registered email:</label>
          <input type="text" name="email" required>
        </div><br><br>
        <div class="row">
          <label>Security Question:-</label>
          <select name="question" class="form-control" required>
            <option value="">Select a question</option>
            <option value="What is your mothers maiden name?">your mother's maiden name?</option>
            <!-- <option value="What is the name of your first pet?">What is the name of your first pet?</option> -->
            <option value="What is your favorite color?">What is your favorite teacher name?</option>
            <option value="What is your favorite god?">What is your favorite GOD?</option>f
          </select>
        </div><br>
        <div class="row">
          <label>Answer:</label>
          <input type="text" name="ans" required>
        </div><br><br>
        <div class="row button">
          <input type="submit" name="submit" value="SUBMIT" id="btns"> <br> <br> <br>
        </div><br>
        <div class="row button">
          <a href="index.php">
            <button type="button" class="btn btn-danger">Back</button>
          </a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>