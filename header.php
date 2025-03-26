<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css file -->
    <link rel="stylesheet" href="homemain2.css">
    <link rel="stylesheet" href="navbar1.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <!--carousel-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- --------SCROL ANIMATION-------------->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://kit.fontawesome.com/a2a10e501a.js" crossorigin="anonymous"></script>
    <!-- css file -->

    <!--carousel-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- icon script -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>PLEASANT EVENTS</title>
    <style>
    .btn_desing{
            background: transparent;
            border: 2px solid #EE4C7C;
            border-radius: 15px;
            color: black;
            text-transform: uppercase;
            font-size: 16px;
            letter-spacing: 2px;
            cursor: pointer;
            padding: 10px 20px;
            position: relative;
            transition: 0.2s ease-in-out;
            left:45% ;
            text-decoration: none;
            top:20px;
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
            color: white;
            font-weight:bold;
           
        }
        .btn_desing:hover::before{
            clip-path: circle(100% at 50% 50%);
        }
    </style>