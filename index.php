<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- css file -->
  <link rel="stylesheet" href="lending.css">

  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <!-- carousel -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/
	jquery/3.3.1/jquery.min.js">
	</script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/
	popper.js/1.12.9/umd/popper.min.js">
	</script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/
	4.0.0/js/bootstrap.min.js">
	</script>
  <!--carousel-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .frgtpwd {
      text-decoration: none;
      color: red;
    }

    .input-control {
      display: flex;
      flex-direction: column;
    }

    .input-control input {
      border: 2px solid #f0f0f0;
      border-radius: 4px;
      display: block;
      font-size: 15px;
      padding: 10px;
      width: 100%;
    }

    .input-control input:focus {
      outline: 0;
    }

    .input-control.success input {
      border-color: #09c372;
    }

    .input-control.error input {
      border-color: #ff3860;
    }

    .input-control .error {
      color: #ff3860;
      font-size: 12px;
      height: 13px;
    }

    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      /* font-family:"Open Sans", sans-serif; */
    }

    /* background image */
    .bg_img {
      height: 100vh;
      width: 100%;
      background-image: linear-gradient(rgb(240, 240, 244, 0.5), rgba(238, 243, 246, 0)), url(assets/ldbg.jfif);
      /* background-image: linear-gradient(rgba(42, 40, 96, 0),rgb(49, 105, 96,1) ), url(assets/black\ couple.jpg); */
      /* background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0, 0.6)),url(assets/wedding4.jpg); */
      background-size: cover;

      background-position: center;
    }

    /* navbar */
    nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding-top: 20px;
      padding-left: 7%;
    }

    #logo {
      width: 400px;
      border-radius: 10px;
    }

    /* javascrit font sliding */
    .mb-4 {
      font-size: 80px;
      color: #1e2022;
      font-family: 'Dosis', sans-serif;
      /* font-weight: 700;
    color: transparent;
    background: none;
    -webkit-text-stroke-width: 3px;
    -webkit-text-stroke-color:#1e2022; */
      letter-spacing: 4px;
    }

    #intro {
      color: #1E2022;
      font-family: "Open Sans", sans-serif;
      letter-spacing: 10px;
      font-size: 30px;
      font-weight: 500;
    }

    button {
      background-color: #292e33;
    }

    #btn {
      background-color: #292e33;
      opacity: 95%;
      color: white;
      font-style: bold;
    } 

    #btn:hover {
      opacity:100%;
      color: black;
      font-style: bold;
    } 

    #btn_login {
      background-color: #5d001e;
      border: 2px solid #5d001e;
      color: #e3e2df;
      width: 200px;
      font-size: 18px;
      padding-bottom: 10px;
      border-radius: 15px;
    }

    #btn_login:hover {
      background-color: #e3afbc;
      color: #5d001e;
      font-style: bold;
    }

    .detail {
      font-size: 25px;
      color: #1e2022;
      font-weight: 500;
    }


    /* new login form css */
    .cpcha {
      text-align: center;
    }
    /* validation */
  </style>
</head>

<body>
  <?php
  $rand = rand(9999, 1000);
  if (isset($_REQUEST['msg'])) {
    $msg = $_REQUEST['msg'];
    if ($msg > 0)
      echo "<script>alert('register sucesssfull')</script>";
    else
      echo "<script>alert('register unsucesssfull')</script>";
  }
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

  include('dbcon.php');
  if (isset($_POST['log'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $captcha = $_REQUEST['captcha'];
    $captcharandom = $_REQUEST['captcha-rand'];

    if ($captcha != $captcharandom) {
      echo "<script>alert('Invalid Captcha')</script>";
    } else {
      $email_search = "select * from register where email='$email' ";
      $query = mysqli_query($con, $email_search);
      $e_count = mysqli_num_rows($query);
      if ($e_count) {
        $e_pass = mysqli_fetch_assoc($query);
        $db_pass = $e_pass['pwd'];

        $_SESSION['fname'] = $e_pass['fname'];
        $_SESSION['email'] = $e_pass['email'];
        // $pass_decode = password_verify($ppwd,$db_pass);
        if ($pwd == $db_pass) {
          echo "Login Successfully.";
  ?>
          <script>
            location.replace('home.php');
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
        //echo "Invalid Email";
        ?>
        <script>
          alert("Invalid Email");
        </script>
  <?php
      }
    }
  }
  ?>
  <?php
  if (isset($_POST['adduser'])) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $pwd = $_POST['pwd'];
    $bdate = $_POST['bdate'];
    $city = $_POST['city'];
    $question = $_POST['question'];
    $ans = $_POST['ans'];
    if ($fname != "" && $email != "" && $phoneno != "" && $pwd != "" && $bdate != "" && $city != "" && $question != "" && $ans != "") {
      if ($pwd == $pwd) {
        $checkemail = "SELECT email FROM register WHERE email='$email'";
        $checkemail_run = mysqli_query($con, $checkemail);
        if (mysqli_num_rows($checkemail_run) > 0) {
          $_SESSION['status'] = "<script>alert('email alredy tacken')</script>";
          header("Location: index.php");
          exit;
        } else {
          $sql = "INSERT INTO register (fname,email,phoneno,pwd,bdate,city,question,ans) VALUES ('$fname','$email','$phoneno','$pwd','$bdate','$city','$question','$ans')";
          $sql_run = mysqli_query($con, $sql);
          echo "<p style='color:green'>register success</p>";
      }
      }
    } else {
      echo "<script>alert('fill the form first')</script>";
    }
  }
  ?>
  <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register Your Self</h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>
        <div class="modal-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="modal-body">

					<div class="form-group">
						<div class="input-control">
							First Name

							<input type="text" name="fname" id="fname" class="form-control f_size" placeholder="Enter Name">

							<div id="fname-error" class="invalid-feedback" style="color: red;"></div>
						</div>
						<div class="input-control">
							Email
							<!-- <input type="email" id="email" name="email" class="form-control f_size"> -->
							<input type="email" name="email" id="email" required class="form-control f_size" placeholder="Enter Email">
							<small id="emailvalid" class="form-text
              text-muted invalid-feedback" style="color:red;">
							<p style="color:red;">	Your email must be a valid email</p>
							</small>
						</div>
						<div class="input-control">
							Phone Number
							<input type="text" id="phoneno" name="phoneno" class="form-control f_size" placeholder="015566095682">
							<div id="phoneno-error" class="invalid-feedback" style="color: red;"></div>
						</div>
						<div class="input-control">
							Birthday
							<input type="date" id="bdate" name="bdate" class="form-control f_size" >
							<div id="bdate-error" class="invalid-feedback" style="color: red;"></div>
						</div>
            
						<div class="input-control">
							City
							<input type="text" id="city" name="city" class="form-control f_size" placeholder="Enter City">
							<div id="city-error" class="invalid-feedback" style="color: red;"></div>
						</div>
						<div class="input-control">
							Password
							<input type="password" id="pwd" name="pwd" class="form-control f_size" required placeholder="Enter Password">
							<div id="pwd-error" class="invalid-feedback" style="color: red;"></div>
						</div>
            <div class="input-control">
                 Confirm Password
                  <input type="password" id="conpwd" name="conpwd" class="form-control f_size" required placeholder="Confrim Password" required>
                  <div id="conpwd-error" class="invalid-feedback" style="color: red;"></div>
                </div>
						<div class="input-control">
							<label>Security Question:</label>
							<select name="question" id="question" class="form-control f_size">
								<option value="">Select A Question</option>
								<option value="What is your mothers maiden name?">Your mother's maiden name?</option>
								<!-- <option value="What is the name of your first pet?">What is the name of your first pet?</option> -->
								<option value="What is your favorite color?">What is your favorite teacher name?</option>
								<!-- <option value="What is your favorite god?">What is your favorite GOD?</option> -->
							</select>
							<div id="question-error" class="invalid-feedback" style="color: red;"></div>
						</div>
						<div class="input-control">
							<label>Answer:</label>
							<input type="text" id="ans" name="ans" class="form-control f_size">
							<div id="ans-error" class="invalid-feedback" style="color: red;"></div>
						</div>
						<br>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					<input type="submit" id="submitbtn" name="adduser" value="Submit" class="btn btn-primary">
				</div>
			</form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="LOGIN" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login Your Self</h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->
        </div>
        <!-- login form -->
        <div class="modal-body">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="modal-body">
              <div class="form-group">
                Email
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
              </div>
              <input type="hidden" name="captcha-rand" value="<?php echo $rand; ?>">
             
              Password
              <input type="password" name="pwd" class="form-control" placeholder="Enter Password" required>

              <div> <label for="captcha">Captcha</label>
                <input type="text" name="captcha" id="captcha" class="form-control" placeholder="Enter Captcha" name="captcha"" required><br>
                    

                <label for="captcha-code">
                  
                  <h3 class="cpcha"> Captcha Code : <span style="color:red"> <?php echo $rand; ?></span></h3>
                </label>
                <div class="captcha"></div><br>
              </div>
              <a href="forgot.php" class="frgtpwd">Forgot Password ?</a>
            </div>
        </div>
        <div class="modal-footer">
          <a type="button" href="admin/adminlogin.php" style="color:white" id="btn" class="btn btn">Admin ?</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" name="log" class="btn btn-primary" id="btn_inlog">Log in</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  <div class="bg_img">
    <nav class="logo">
      <img src="assets/logo.png" alt="" id="logo">
    </nav>

    <section id="home" class="w3l-banner pt-5">
      <div class="container pt-lg-5 pt-md-4">
        <div class="row pt-lg-5 pt-4">
          <div class="col-lg-6 banner-info-grid pt-lg-0 pt-5">
            <h1 id="intro">Your event in Trusty hands</h1>
            <h3 class="mb-4"> <span class="typed-text"></span><span class="cursor">&nbsp</span> </h3>
            <p class="detail">As very event is important and special itself, So everyone need their events
              perfect and for that they contact best event management companies.</p>

            <button data-toggle="modal" data-target="#LOGIN" class="btn btn-style mt-5 me-2" id="btn_login">
              Log in
            </button>


            <button data-toggle="modal" data-target="#exampleModal" class="btn btn-style mt-5 me-2" id="btn_login">
              Sing up
            </button>
          </div>
          <div class="col-lg-6 text-lg-end my-image mt-lg-0 mt-4">
            <!-- <img src="assets/wedding1.jpg" class="img-fluid" /> -->
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- /typig-text-->
  <script>
    const typedTextSpan = document.querySelector(".typed-text");
    const cursorSpan = document.querySelector(".cursor");

    const textArray = ["Wedding", "Engagement", "Birthday Party", "Music Concert"];
    const typingDelay = 200;
    const erasingDelay = 10;
    const newTextDelay = 100; // Delay between current and next text
    let textArrayIndex = 0;
    let charIndex = 0;

    function type() {
      if (charIndex < textArray[textArrayIndex].length) {
        if (!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
        typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
        charIndex++;
        setTimeout(type, typingDelay);
      } else {
        cursorSpan.classList.remove("typing");
        setTimeout(erase, newTextDelay);
      }
    }

    function erase() {
      if (charIndex > 0) {
        // add class 'typing' if there's none
        if (!cursorSpan.classList.contains("typing")) {
          cursorSpan.classList.add("typing");
        }
        typedTextSpan.textContent = textArray[textArrayIndex].substring(0, 0);
        charIndex--;
        setTimeout(erase, erasingDelay);
      } else {
        cursorSpan.classList.remove("typing");
        textArrayIndex++;
        if (textArrayIndex >= textArray.length) textArrayIndex = 0;
        setTimeout(type, typingDelay);
      }
    }

    document.addEventListener("DOMContentLoaded", function() { // On DOM Load initiate the effect
      if (textArray.length) setTimeout(type, newTextDelay + 250);
    });
  </script>
  
	<script>
		// Document is ready
		$(document).ready(function() {
			// email validation
			const email = document.getElementById("email");
			email.addEventListener("blur", () => {
				let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
				let s = email.value;
				if (regex.test(s)) {
					email.classList.remove("is-invalid");
					emailError = true;
				} else {
					email.classList.add("is-invalid");
					emailError = false;
				}
			});

			// first name 
			$('#fname').on('input', function() {
				var fname = $(this).val();
				var length = fname.length;
				 if (length < 3 || length > 10) {
					$('#fname-error').html('length of fname must be between 3 and 10');
					$('#fname').addClass('is-invalid');
				} else {
					$('#fname-error').html('');
					$('#fname').removeClass('is-invalid');
				}
			});

			// city
			$('#city').on('input', function() {
				var city = $(this).val();
				var length = city.length;


				if (length == '') {
					$('#city-error').html('City name is required');
					$('#city').addClass('is-invalid');
				} else {
					$('#city-error').html('');
					$('#city').removeClass('is-invalid');
				}
			});

			// question
			$('#question').on('input', function() {
				var question = $(this).val();
				var length = question.length;


				if (length == '') {
					$('#question-error').html('Question is required');
					$('#question').addClass('is-invalid');
				} else {
					$('#question-error').html('');
					$('#question').removeClass('is-invalid');
				}
			});

			// ans
			$('#ans').on('input', function() {
				var ans = $(this).val();
				var length = ans.length;


				if (length == '') {
					$('#ans-error').html('Ans is required');
					$('#ans').addClass('is-invalid');
				} else {
					$('#ans-error').html('');
					$('#ans').removeClass('is-invalid');
				}
			});

			// phone number
			$('#phoneno').on('input', function() {
				var phoneno = $(this).val();
				var length = phoneno.length;


				if (length < 12 || length > 12) {
					$('#phoneno-error').html('length of phoneno must be 12');
					$('#phoneno').addClass('is-invalid');
				} else {
					$('#phoneno-error').html('');
					$('#phoneno').removeClass('is-invalid');
				}
			});

			// birthdate
			$('#bdate').on('input', function() {

				var inputDate = new Date($(this).val());
				var today = new Date();
				today.setHours(0, 0, 0, 0);
				if (inputDate > today) {
					$('#bdate-error').html('Enter valid birthdate');
					$('#bdate').addClass('is-invalid');
				} else {
					$('#bdate-error').html('');
					$('#bdate').removeClass('is-invalid');
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
      // Validate Confirm Password
      $('#conpwd').on('input', function() {
        var pwd = $("#pwd").val();
        let conpwd = $(this).val();
        if (pwd != conpwd) {
          $('#conpwd-error').html('your password is not same');
          $('#conpwd').addClass('is-invalid');
        }else{
          $('#conpwd-error').html('');
          $('#conpwd').removeClass('is-invalid');
        }
      });

			// Submit button
			$("#submitbtn").click(function() {
				validatefname();
				validatePassword();
				validateEmail();
				validatebdate();
				validatephoneno();
				validatecity();
				validatequestion();
				validateans();
				if (
					fnameError == true &&
					passwordError == true &&
					emailError == true &&
					phonenoError == true &&
					bdateError == true &&
					questionError == true &&
					cityError == true &&
					ansError == true

				) {
					return true;
				} else {
					return false;
				}
			});
		});
	</script>
</body>

</html>