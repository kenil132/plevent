<?php include('config/dbcon.php');
session_start();
if (isset($_SESSION['id'])) {
    include('includes/header.php');
    $sql = "select * from register where id=" . $_SESSION['id'] . " ";
    $result = $con->query($sql);
    $data1 = mysqli_fetch_assoc($result);

    $error = "";
    if (isset($_POST['submit'])) {
        $customerid = $_SESSION['id'];
        $fname = $_POST['fname'];
        $phoneno = $_POST['phoneno'];
        $fb = $_POST['fb'];
        $email = $_POST['email'];
        $star = $_POST['star'];
        $date = date('Y-m-d');

        $sql = "insert into feedback(customerid,fname,phoneno,email,fb,star,date) values('" . $customerid . "','" . $fname . "','" . $phoneno . "','" . $email . "','" . $fb . "','" . $star . "','" . $date . "') ";
        // echo $sql;
        // exit();
        $result = $con->query($sql);
    }

?>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style media="screen">
        @import url(https://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);

        * {
            margin: 0;
            padding: 0;
            font-family: roboto;
        }

        body {
            background: #000;
        }

        hr {
            margin: 20px;
            border: none;
            border-bottom: thin solid rgba(255, 255, 255, .1);
        }

        div.title {
            font-size: 2em;
        }

        h1 span {
            font-weight: 300;
            color: #Fd4;
        }

        div.stars {
            width: 305px;
            display: inline-block;
            padding-top: 10px;
            padding-right: 25px;
        }

        input.star {
            display: none;
        }

        label.star {
            float: right;
            padding: 10px;
            font-size: 30px;
            color: #444;
            transition: all .2s;
        }

        input.star:checked~label.star:before {
            content: '\f005';
            color: #FD4;
            transition: all .25s;
        }


        input.star-5:checked~label.star:before {
            color: #FE7;
            text-shadow: 0 0 20px #952;
        }

        input.star-1:checked~label.star:before {
            color: #F62;
        }

        label.star:hover {
            transform: rotate(-15deg) scale(1.3);
        }

        label.star:before {
            content: '\f006';
            font-family: FontAwesome;
        }

        .rev-box {
            overflow: hidden;
            height: 0;
            width: 100%;
            transition: all .25s;
        }

        textarea.review {
            background: #222;
            border: none;
            width: 100%;
            max-width: 100%;
            height: 100px;
            padding: 10px;
            box-sizing: border-box;
            color: #EEE;
        }

        label.review {
            display: block;
            transition: opacity .25s;
        }



        input.star:checked~.rev-box {
            height: 125px;
            overflow: visible;
        }

        .card {
            border-radius: 10px;
        }

        .card-body {
            padding: 30px;
        }

        .form-group label {
            font-weight: bold;
        }

        body {
            background: linear-gradient(rgba(0, 56, 101, 0.7),rgb(255, 204, 255, 0.7));
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            /* padding: 340px 0; */
            opacity: 90%;

        }
    </style>

    <body>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="card shadow">
                        <h1 style="text-align: center;padding-top: 10px;">Share Your Experiance</h1>
                        <hr>
                        <div class="card-body">
                            <form method="POST"action="" onsubmit="myFunction()">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 py-3">
                                            Enter name
                                            <input class="form-input form-control" id="contact-fname" type="text" name="fname"  required>
                                        </div>
                                        <div class="col-lg-6 py-3">
                                            Enter phone number
                                            <input class="form-input form-control" id="phoneno" type="text" name="phoneno"  required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            Email
                                            <input class="form-input form-control" id="email" type="email" name="email" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-wrap">
                                                <div class="stars">
                                                    <input class="star star-5" id="star-5" type="radio" value="5" name="star" />
                                                    <label class="star star-5" for="star-5"></label>
                                                    <input class="star star-4" id="star-4" type="radio" value="4" name="star" />
                                                    <label class="star star-4" for="star-4"></label>
                                                    <input class="star star-3" id="star-3" type="radio" value="3" name="star" />
                                                    <label class="star star-3" for="star-3"></label>
                                                    <input class="star star-2" id="star-2" type="radio" value="2" name="star" />
                                                    <label class="star star-2" for="star-2"></label>
                                                    <input class="star star-1" id="star-1" type="radio" value="1" name="star" />
                                                    <label class="star star-1" for="star-1"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-lg-12 msg">
                                                Feedback
                                                <textarea style="resize: none;" class="form-control" id="fb" name="fb" rows="3" placeholder="Share Your Experiance"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
<?php // include 'footer.php';
} else {
    // header("location:lending.php");
}
?> <script>
    function myFunction() {
        alert("Thanks For Give Feedback Us");
        window.open("myprofile.php");
    }
</script>

</body>

</html>