<?php
include('dbcon.php'); ?>
<?php
session_start();
if (!isset($_SESSION['fname'])) {
    echo "you are logout";
    //   header('location:index.php');
}
?>
<?php
include('navbar.php');
include('header.php');
?>
</head>

<body>
 <!-- Modal -->
 <?php
    if (isset($_REQUEST['msg1'])) {
        $msg = $_REQUEST['msg1'];
        if ($msg > 0)
            echo "<script>alert('Your payment success')</script>";
        else
            echo "<script>alert('message not send')</script>";
    }
    ?>
    <!-- navigation bar -->
    <!-- slide image -->
    <section>
        <div class="slideback">

            <div class="swiper">

                <div class="swiper-wrapper">

                    <div class="swiper-slide"><img class="bgimg" src="assets/black couple.jpg">
                    </div>
                    <div class="swiper-slide"><img class="bgimg" src="assets/fire couple.jpg"></div>
                    <div class="swiper-slide"><img class="bgimg" src="assets/p1.jpg"></div>
                    <div class="swiper-slide"><img class="bgimg" src="assets/wedding3.jpg"></div>
                    <div class="swiper-slide"><img class="bgimg" src="assets/slide_376472_4431440_free.jpg"></div>
                </div>

                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
    </section>
    <!-- done-->

    <a type="button" class="btn_desing" href="gallery.php">View Gallery</a>
    <section class="space p-3 pt-5">
        <div class="h1_title">
            <h1>Our Facility</h1>
            <hr>
        </div>
    </section>

    <!-- our services -->
    <!-- <section class="service p-4 pb-3">
        <div class="h1_title">
            <h1>Our services</h1>
        </div>
        <div class="service_content p-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <h1>part1</h1>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <h1>part2</h1>
                </div>
            </div>
          
            
        </div>

        <div class="col-lg-">

        </div>
    </section> -->
    <section class="service p-4 pb-3">

        <div class="service_content p-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-12 col-sm-12">

                    <h2>NO. 1 Event Management </h2>
                    <h3>Ensuring a smooth and successful event </h3> 
                   <p> Primary goal of our company is to ensure that the event runs smoothly and successfully, with all logistics and details managed seamlessly. They work tirelessly behind the scenes to ensure that everything is executed according to plan, and any issues or challenges that arise are handled quickly and effectively.
                    </p> 
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12" id="p3">
                    <div class="row g-5">
                        <div class="col-lg-4" id="p2">
                            <p href="" id="icn"><i class="fa-solid fa-handshake"></i></p>
                            <h3>Friendly Team</h3>
                            <p>More than 200 teams</p>
                        </div>
                        <div class="col-lg-4" id="p2">
                            <p href="" id="icn"><i class="fa-sharp fa-solid fa-holly-berry"></i></p>
                            <h3>Glorious Decoration</h3>
                            <p>Perfect Venue</p>
                        </div>
                        <div class="col-lg-4" id="p2">
                            <p href="" id="icn"><i class="fa-solid fa-champagne-glasses"></i></p>
                            <h3>Unique Scenario</h3>
                            <p>We thinking out of the box</p>
                        </div>
                    </div>
                    <div class="row g-5">
                        <div class="col-lg-4" id="p2">
                            <p href="" id="icn"><i class="fa-solid fa-clock"></i></p>
                            <h3>Unforgettable Time</h3>
                            <p>We make you perfect event</p>
                        </div>
                        <div class="col-lg-4" id="p2">
                            <p href="" id="icn"><i class="fa-solid fa-phone-volume"></i></p>
                            <h3>24/7 Hours Support</h3>
                            <p>Anytime anywhere</p>
                        </div>
                        <div class="col-lg-4" id="p2">
                            <p href="" id="icn"><i class="fa-duotone fa-solid fa-camera"></i></p>
                            <h3>Briliant Photography</h3>
                            <p>We have best photography</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-">

        </div>
    </section>
    <!-- feedback -->
    <section class="space p-3 pt-5">
        <div class="h1_title">
            <h1>What our clients says</h1>
            <hr>
        </div>
    </section>
    <!-- START TESTIMONIAL -->
    <section id="testimonial_area" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="testmonial_slider_area text-center owl-carousel">
                        <?php
                        $query = "SELECT * from feedback LIMIT 5";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $row) {

                        ?>
                                <div class="box-area">

                                    <h5><?php echo $row['fname']; ?></h5>
                                    <span><?php echo $row['date'];?></span>
                                            <?php
                                            // echo $row['star'];
                                            if ($row['star'] == 1) {
                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i> ";
                                            } else if ($row['star'] == 2) {
                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                            } else if ($row['star'] == 3) {
                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                            } else if ($row['star'] == 4) {
                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                            } else {
                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                                echo " <i class='fas fa-star' style='color:#FFD93D; font-size:20px'></i>";
                                            }
                                            ?>
                                       
                                  
                                    
                                    <p class="content">
                                        <?php echo $row['fb'];?>
                                    </p>
                                </div> <!-- END SINGLE TESTIMONIALS -->
                        <?php
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END TESTIMONIAL -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
    <script>
        $(".testmonial_slider_area").owlCarousel({
            autoplay: true,
            slideSpeed: 1000,
            items: 3,
            loop: true,
            nav: true,
            navText: ['<i class="fas fa-angle-left" id="arrow"></i>', '<i class="fas fa-angle-right" id="arrow"></i>'],
            margin: 30,
            dots: true,
            responsive: {
                320: {
                    items: 1
                },
                767: {
                    items: 2
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3                }
            }

        });
    </script>



    <?php
    // include('footer.php')
    ?>
    <?php
    include('footer.php');
    ?>
    <!------------------------- javascript--------------- -->
    <!-- slide image -->
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
    <!-- ----------------------------- -->

    <!-- ----------------------------------------------------------------------------- -->
</body>

</html>