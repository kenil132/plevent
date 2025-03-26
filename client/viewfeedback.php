<?php include 'config.php';

if(isset($_SESSION['userid']))
{
  include 'header.php';
  $sql="select * from customer where id=".$_SESSION['userid']." ";
  $result=$conn->query($sql);
  $data1=mysqli_fetch_assoc($result);

$error="";
       if(isset($_POST['submit']))
       {
           $uid = $_SESSION['userid'];
           $firstname=$_POST['firstname'];
           $contactno=$_POST['contactno'];
           $message=$_POST['message'];
           $email=$_POST['email'];
           $star = $_POST['star'];
           $date=date('Y-m-d');

           $sql="insert into feedback(uid,firstname,pno,email,message,star,date) values('".$uid."','".$firstname."','".$contactno."','".$email."','".$message."','".$star."','".$date."') ";
           // echo $sql;
           // exit();
           $result=$conn->query($sql);
         }

 ?>

 <style media="screen">
 @import url(https://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);
*{
margin: 0;
padding: 0;
font-family: roboto;
}

body{
background: #000;
}

hr{
margin: 20px;
border: none;
border-bottom: thin solid rgba(255,255,255,.1);
}

div.title{
font-size: 2em;
}

h1 span{
font-weight: 300;
color: #Fd4;
}

div.stars{
width: 285px;
display: inline-block;
}

input.star{
display: none;
}

label.star {
float: right;
padding: 10px;
font-size: 36px;
color: #444;
transition: all .2s;
}

input.star:checked ~ label.star:before {
content:'\f005';
color: #FD4;
transition: all .25s;
}


input.star-5:checked ~ label.star:before {
color:#FE7;
text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before {
color: #F62;
}

label.star:hover{
transform: rotate(-15deg) scale(1.3);
}

label.star:before{
content:'\f006';
font-family: FontAwesome;
}

.rev-box{
overflow: hidden;
height: 0;
width: 100%;
transition: all .25s;
}

textarea.review{
background: #222;
border: none;
width: 100%;
max-width: 100%;
height: 100px;
padding: 10px;
box-sizing: border-box;
color: #EEE;
}

label.review{
display: block;
transition:opacity .25s;
}



input.star:checked ~ .rev-box{
height: 125px;
overflow: visible;
}






 </style>
      <!-- Breadcrumbs-->
      <section class="breadcrumbs-custom bg-image overlay" >
        <div class="shell" >
          <h2 class="breadcrumbs-custom__title">Feedback</h2>
          <ul class="breadcrumbs-custom__path">
            <li><a href="index.php">Home</a></li>
            <li class="active">Feedback</li>
          </ul>
        </div>
      </section>

      <!-- Get in Touch-->
      <section class="section section-md bg-white text-center" style="background-image: url(images/bg8.jpg);">
        <div class="shell">
          <div class="range range-50 range-sm-center">

          <div class="range range-sm-center">
            <div class="cell-sm-10 cell-md-7 cell-lg-6">
                <h3>Give Feedback</h3>
                <!-- <p>We are available 24/7 by fax, e-mail or by phone. You can also use our quick contact form to ask a question about our services and projects.</p> -->
                <!-- RD Mailform-->
                <form method="post" action="" onsubmit="myFunction()">
                  <div class="range range-sm-bottom range-20">
                    <div class="cell-sm-6">
                      <div class="form-wrap">
                        <input class="form-input" id="contact-firstname" type="text" name="firstname" value="<?php echo $data1['firstname'];  ?>" required readonly>
                        <label class="form-label" for="contact-firstname">First name</label>
                      </div>
                    </div>
                    <div class="cell-sm-6">
                      <div class="form-wrap">
                        <input class="form-input" id="contactno" type="text" name="contactno" value="<?php echo $data1['contectno'];  ?>" required readonly>
                        <label class="form-label" for="contactno">Phone</label>
                      </div>
                    </div>
                    <div class="cell-xs-12">
                      <div class="form-wrap">
                        <label class="form-label"  for="contact-message">Your Message</label>
                        <textarea class="form-input" id="contact-message" name="message" required></textarea>
                      </div>
                    </div>
                    <div class="cell-sm-6">
                      <div class="form-wrap">
                        <input class="form-input" id="email" type="email" name="email" value="<?php echo $data1['email'];  ?>" required readonly>
                        <label class="form-label" for="email">E-mail</label>
                      </div>
                    </div>
                    <div class="cell-sm-6">
                      <div class="form-wrap">
<div class="stars">
  <input class="star star-5" id="star-5" type="radio" value="5" name="star"/>
  <label class="star star-5" for="star-5"></label>
  <input class="star star-4" id="star-4" type="radio" value="4" name="star"/>
  <label class="star star-4" for="star-4"></label>
  <input class="star star-3" id="star-3" type="radio" value="3" name="star"/>
  <label class="star star-3" for="star-3"></label>
  <input class="star star-2" id="star-2" type="radio" value="2" name="star"/>
  <label class="star star-2" for="star-2"></label>
  <input class="star star-1" id="star-1" type="radio" value="1" name="star"/>
  <label class="star star-1" for="star-1"></label>
</div></div>
</div>


                    <div class="cell-sm-6">
                      <button class="button button-primary" name="submit" type="submit">Send Message</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>


      <?php include 'footer.php';
      }
      else {
        header("location:login.php");
      }
      ?>      <script>
      function myFunction() {
        alert("Thanks For Give Feedback Us");
      }
      </script>

  </body>
</html>
