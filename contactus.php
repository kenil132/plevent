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
        body {
            background-color: #a8bfd8;
        }
        .sec1_contact {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 1, 0.7)), url(assets/wedding1.jpg);
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
        color: #EE3C7C;
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
            background-color: #5d001e;
            padding-top: 10px;
            color: #e3e2df;
            font-size: 20px;
            color: white;
            font-weight: bold;
            width: 200px;
            height:50px;
            border-radius: 10px;
        }

        #submit_contact:hover {
            background-color: white;
            color: #5d001e;
            border:2px solid #ed001e;
        }

        .map-container {
            overflow: hidden;
            padding-bottom: 95%;
            position: relative;
            height: 0;
        }

        .map-container iframe {
            left: 0;
            top: 0;
            height: 590px;
            position: absolute;

        }

        #maph {
            width: 600px;
            height: 1000px;
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
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="z-depth-1-half map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1060.8494523259678!2d72.88858436684681!3d21.23795742723086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04fa0b44e199f%3A0xb2b2adaf3c125594!2sOpera%20business%20hub!5e0!3m2!1sen!2sin!4v1680279719180!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="maph"></iframe>
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d627.0466821360029!2d72.8889424163805!3d21.238190695611987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04fa0b44e199f%3A0xb2b2adaf3c125594!2sOpera%20business%20hub!5e1!3m2!1sen!2sin!4v1680279549574!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="maph"></iframe> -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="con_form">
                        <form action="contact_bd.php" method="POST">
                            <div class="row g-5 py-1">
                                <div class="col-md-12 ">
                                    <p style="font-size:50px;">Get In Touch</p>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" id="form_contact" type="text" id="fname" name="fname" placeholder="NAME">
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" id="form_contact" type="email" id="email" name="email" placeholder="ENTER EMAIL" required>
                                </div>
                                <!-- <div class="col-md-12 ">
                                    <input class="form-control" id="form_contact" type="text" id="tele" name="tele" placeholder="PHONE NUMBER" required>
                                </div> -->

                                <div class="col-md-12 ">
                                    <textarea style="resize: none;" class="form-control" name="msg" id="msg" cols="30" rows="5" placeholder="MESSAGE"></textarea>
                                </div>
                                <div class="text-right col-md-12">
                                    <input type="submit" name="submit" value="Submit" class="btn form-control ms-3" id="submit_contact">
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