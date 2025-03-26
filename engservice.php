<?php
include('dbcon.php');
include('navbar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css file -->
    <!-- <link rel="stylesheet" href="mainstyle.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"> -->
    <!--carousel-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

    <!-- --------SCROL ANIMATION-------------->

    <title>webservices</title>
</head>
<style>
    /* slide image css */
    .slideback {
        width: 100%;
        height: 80vh;
        background: #222;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .swiper {
        width: 100%;
        height: fit-content;
    }

    .swiper-slide img {
        width: 1005;

    }

    .swiper .swiper-button-prev,
    .swiper .swiper-button-next {
        color: #fff;
    }

    .swiper .swiper-pagination-bullet-active {
        background: #fff;
    }

    .bgimg {
        height: 80vh;
        width: 100%;
        background-size: cover;
        background-position: center;
        -webkit- filter: blur(5px);
        filter: blur(5px);

    }

    #p22 {
        border: 13px solid #e3e2df;
        background-color: #EE4C7C;
        width: 360px;
        margin-left: 50px;
    }

    .service1 {
        background-color: #e3e2df;
        margin: auto;
    }

    .pcg {
        align-items: center;
        justify-content: center;
    }

    /* #p3{
        border: 2px solid black;
    } */
    h1 {
        background-color: #5D001E;
        color: white;
        text-align: center;
    }

    h2 {
        text-align: center;
        color: #E3E2DF;
    }

    p {
        text-align: center;
        color: #E3E2DF;
    }


    .heading {
        text-align: center;

    }

    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 80px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;

    }

    .cont {
        position: relative;
        text-align: center;
        color:#EE4C7C;
        font-weight: bolder;
    }


    /* Style the buttons */
    .checkout {
        border: none;
        outline: none;
        padding: 12px 16px;
        background-color: #5D001E;
        cursor: pointer;
        color: #e3e2df;
    }

    .checkout:hover {
        background-color: #E3e2df;
        color: #5D001E;
        border:2px solid #ed001e;
    }

    .checkout.active {
        background-color: rgb(248, 179, 50);
        color: black;
    }

    .sp {
        font-size: 40px;
        color: #5D001E;
        /* background-color: white; */
    }
</style>


<body style="background-color: #e3e2df;">
    <?php
    $query = "SELECT * FROM events WHERE id=4";
    $query_run = mysqli_query($con, $query);
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $rows) {
    ?>

            <div class="cont">
                <div class="slideback">

                    <div class="swiper">

                        <div class="swiper-wrapper">

                            <div class="swiper-slide"><img class="bgimg" id="blur" src="assets/black couple.jpg">
                                <div class="centered"><?php echo $rows['ename']; ?></div>
                            </div>
                            <div class="swiper-slide"><img class="bgimg" id="blur" src="assets/e3.jpg">
                                <div class="centered"><?php echo $rows['ename']; ?></div>
                            </div>
                            <div class="swiper-slide"><img class="bgimg" id="blur" src="assets/p1.jpg">
                                <div class="centered"><?php echo $rows['ename']; ?></div>
                            </div>
                            <div class="swiper-slide"><img class="bgimg" id="blur" src="assets/e1.jpg">
                                <div class="centered"><?php echo $rows['ename']; ?></div>
                            </div>
                            <div class="swiper-slide"><img class="bgimg" id="blur" src="assets/e2.webp">
                                <div class="centered"><?php echo $rows['ename']; ?></div>
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
            <?php
        }
    }
            ?>
                </div>
                <br><br>
                <div>
                    <p class="sp">Select Packages</p>
                </div>
                </section>
                <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
                <script>
                    const swiper = new Swiper('.swiper', {
                        autoplay: {
                            delay: 3000,
                            disableOnInteraction: false,
                        },
                        loop: true,

                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },

                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                    });
                </script>
                <?php
                $query = "SELECT * FROM events WHERE id=4";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $rows) {

                ?>


                        <div class="container">
                            <section class="service1 p-4 pb-4">

                                <div class="row g-4">
                                    <!-- <div class="col-lg-3 col-md-6 col-sm-12" id="p3"></div> -->
                                    <div class="col-lg-3 col-md-6" id="p22">

                                        <br>
                                        <h1><?php echo $rows['pname']; ?></h1><br>
                                        <h2>₹<?php echo $rows['price']; ?></h2><br>
                                        <?php
                                        $query = "SELECT * FROM packages WHERE pname='silver'";
                                        $query_run = mysqli_query($con, $query);
                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $row) {
                                        
                                        ?>
                                        <p><?php echo $row['services']; ?></p>
                                        <?php 
                                        }
                                    }?> <br> <br> <br> <br><br>
                                        <div class="btc">
                                            <a href="payment.php?bk_id=<?php echo $rows['id']; ?>" type="submit" class="checkout btn btn">Check Out</a>
                                        </div><br>
                                    </div>
                            <?php
                        }
                    }

                            ?>
                            <div class="col-lg-3 col-md-6" id="p22">
                                <?php
                                $query = "SELECT * FROM events WHERE id=5";
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $rows) {
                                ?>


                                        <br>
                                        <h1><?php echo $rows['pname']; ?></h1><br>
                                        <h2>₹<?php echo $rows['price']; ?></h2><br>
                                        <?php
                                        $query = "SELECT * FROM packages WHERE pname='gold'";
                                        $query_run = mysqli_query($con, $query);
                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $row) {
                                        
                                        ?>
                                        <p><?php echo $row['services']; ?></p>
                                        <?php 
                                        }
                                    }?>
                                    
                                        <div class="btc" style="padding-top: 40px;">
                                            <a href="payment.php?bk_id=<?php echo $rows['id']; ?>" type="submit" class="checkout btn btn">Check
                                                Out</a>
                                        </div><br>
                            </div>
                    <?php
                                    }
                                }
                    ?>
                    <div class="col-lg-3 col-md-6" id="p22">
                        <?php
                        $query = "SELECT * FROM events WHERE id=6";
                        $query_run = mysqli_query($con, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $rows) {
                        ?>
                                <br>
                                <h1><?php echo $rows['pname']; ?></h1><br>
                                <h2>₹<?php echo $rows['price']; ?></h2><br>
                                <?php
                                        $query = "SELECT * FROM packages WHERE pname='platinum'";
                                        $query_run = mysqli_query($con, $query);
                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $row) {
                                        
                                        ?>
                                        <p><?php echo $row['services']; ?></p>
                                        <?php 
                                        }
                                    }?>
                               
                                <div class="btc">
                                    <a href="payment.php?bk_id=<?php echo $rows['id']; ?>" type="button" class="checkout btn btn">Check Out</a>
                                </div><br>
                    </div>
            <?php
                            }
                        }
            ?>

                            </section>
                        </div>

                        <a href="custom.php" type="button" class="checkout btn btn">Customize Your Event ?</a href="custom.php" type="button">
                        <br><br>
</body>

</html>
<?php
include('footer.php');
?>