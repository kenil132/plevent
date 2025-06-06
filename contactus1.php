<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <link rel="stylesheet" href="mainstyle.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <!-- --------SCROL ANIMATION-------------->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!---google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <style>
        .sec1_contact {
            background: linear-gradient(rgba(0, 56, 101, 0.7), rgba(0, 56, 101, 0.7)), url(assets/wedding1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            /* background-attachment: fixed; */
            background-position: center;
            padding: 150px 100px;

        }

        .con_h1 {
            text-align: left;
            font-size: 60px;
            color: white;
            font-weight: bold;
            bottom: 60%;
            left: 5%;
        }

        .con_h1:hover {
            color: #ffc300;
        }

        .sec2_contact {
            padding: 100px;
        }

        #form_contact {
            height: 50px;
            border-style: 2px ridge gray;
        }

        #form_contact_msg {
            height: 130px;
            border-style: 2px ridge gray;
            content: none;
        }

        #submit_contact {
            background-color: #ffc300;
            padding: 15px;
            color: white;
            font-size: 20px;
            color: #131e94;
            font-weight: bold;
            width: 200px;
        }

        #submit_contact:hover {
            background-color: #131e94;
            color: #ffc300;
        }

        .map-container {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }

        .map-container iframe {
            left: 0;
            top: 0;
            height: 480px;
            width: 600px;
            position: absolute;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_REQUEST['msg'])) {
        $msg = $_REQUEST['msg'];
        if ($msg > 0)
            echo "<script>alert('massege send')</script>";
        else
            echo "<script>alert('message not send')</script>";
    }
    ?>

    <?php
    include('navbar.php')
    ?>
    <section class="sec1_contact">
        <div class="container">
            <h1 class="con_h1">Contact Us</h1>
        </div>
    </section>
    <section class="sec2_contact">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 col-md-12 col-sm-12 p-3">
                    <div class="z-depth-1-half map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.6545740880797!2d72.88598731488716!3d21.24554198588137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f51f20db5a1%3A0x9965e2b7af9efc62!2sTapi%20Arcade!5e0!3m2!1sen!2sin!4v1661192628597!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="con_form">
                        <form action="contact_tab.php" method="POST">
                            <div class="row g-5 py-5">
                                <div class="col-md-6 p-3">
                                    <input class="form-control" id="form_contact" type="text" id="fname" name="fname" placeholder="NAME">
                                </div>
                                <div class="col-md-6 p-3">
                                    <input class="form-control" id="form_contact" type="email" id="email" name="email" placeholder="ENTER EMAIL" required>
                                </div>
                                <div class="col-md-12 p-3">
                                    <input class="form-control" id="form_contact" type="text" id="tele" name="tele" placeholder="PHONE NUMBER" required>
                                </div>

                                <div class="col-md-12 p-3">
                                    <textarea class="form-control" name="msg" id="msg" cols="30" rows="5" placeholder="MESSAGE"></textarea>
                                </div>
                                <div class="text-right">
                                    <input type="submit" name="submit" value="SUBMIT" class="btn form-control ms-3" id="submit_contact">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
<?php 
include('footer.php');
?>
    <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
</body>

</html>