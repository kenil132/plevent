<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/profilestyle1.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a2a10e501a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./navbar2.css">
    <script src="
https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <script src="
https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    </script>
    <title>myprofile</title>
    <style>
        #fttext {
            color: white;
        }

        #fttext:hover {
            color: #ffc300;
        }

        .list-group-item:hover {
            text-decoration: none;
        }

        /* .list-group { */
        /* text-align: center; */
        /* } */

        .list-group-item {
            width: 250px;
        }

        @media (max-width: 420px) {
            .list-group-item {
                width: auto;
            }

            h3 {
                font-size: 15px;
            }
        }

        #pending {
            color: white;
            text-align: center;
            background-color: #E21818;
            font-weight: 20px;
            padding-left: 30px;
            border-radius: 5px;
            padding: 3px;

        }

        #Approved {
            color: black;
            text-align: center;
            background-color: #F9D923;
            font-weight: 20px;
            padding-left: 30px;
            border-radius: 5px;
            padding: 3px;
        }

        #Working {
            color: white;
            text-align: center;
            background-color: #113F67;
            font-weight: 20px;
            padding-left: 30px;
            border-radius: 5px;
            padding: 3px;
        }

        #Done {
            color: white;
            text-align: center;
            background-color: #367E18;
            font-weight: 20px;
            padding-left: 30px;
            border-radius: 5px;
            padding: 3px;
        }

        .btn_desing {
            background: transparent;
            border: 2px solid #5d001e;
            /* border-radius: 15px; */
            color: #5d001e;
            text-transform: uppercase;
            font-size: 16px;
            letter-spacing: 2px;
            cursor: pointer;
            padding: 10px 20px;
            position: relative;
            transition: 0.2s ease-in-out;
            text-decoration: none;

        }

        .btn_desing::before {
            content: '';
            position: absolute;
            /* border-radius: 13px; */
            inset: 0;
            background: #5d001e;
            z-index: -1;
            clip-path: circle(0% at 50% 50%);
            transition: 0.7s ease-in-out;
        }

        .list-group-item.active {
            z-index: 2;
            color: #fff;
            background-color: #5d001e;
            border-color: #5d001e;
        }

        .btn_desing:hover {
            color: white;

        }
        
  .container1{
    padding-left:250px;
  }
 
        .btn_desing:hover::before {
            clip-path: circle(100% at 50% 50%);
        }

        #btn_inlog {
            background-color: #EE4C7C;
            color: white;
            font-style: bold;
            border: 2px solid #Ee4c7c;
        }

        #btn_inlog:hover {
            background-color: white;
            color: #EE4C7C;
            font-style: bold;
            border: 2px solid #Ee4c7c;
        }

        .submitbtn {
            background-color: #EE4C7C;
            color: white;
            font-style: bold;
            border: 2px solid #Ee4c7c;
        }

        .submitbtn:hover {
            background-color: white;
            color: #EE4C7C;
            font-style: bold;
            border: 2px solid #Ee4c7c;
        }
    </style>