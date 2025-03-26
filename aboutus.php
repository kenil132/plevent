<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>About us</title>
</head>
<!-- #5b6a79
#425465
#292e33 -->
<style>
    .sec1_contact {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 1, 0.7)), url(assets/wedding3.jpg);
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
        color: #EE4C7C;
    }

    #home {
        width: 100%;
        padding: 3rem;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-around;

    }

    .home-left {
        height: 300px;
        position: relative;
    }

    .home-left img {
        height: 110%;
        width: 100%;
        /* border-radius: 10px; */
        border-radius: 95%;
    }

    .home-right {
        width: 50%;
    }

    .home-heading {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .home-para {
        margin-bottom: 20px;
    }

    @keyframes width {
        0% {
            width: 0%;
        }

        100% {
            width: 100%;
        }
    }

    #goal {
        width: 80%;
        margin: 2rem auto;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        align-items: center;
        padding: 30px;

    }

    .g {
        background-color: #E3E2DF;
        /* border-radius: 40px; */
        /* width: 90%; */
        color: black;        /* display:flex; */
        /* margin: 2rem auto; */

    }

    .goal-left {
        width: 60%;
        line-height: 2rem;
    }

    .goal-left h2 {
        font-size: 2.4rem;
    }

    .goal-left p {
        line-height: 1.5rem;
        margin: 1rem 0;
    }

    .goal-left ul {
        list-style: none;
        margin-bottom: 1rem;
    }

    .goal-left ul li::before {
        line-height: 1.5rem;
        content: '✓';
        color: red;
    }

    .goal-right {
        position: relative;
        width: 35%;
    }

    .goal-right img {
        width: 100%;
        cursor: pointer;
        border-radius: 10px;
        filter: drop-shadow(3px 4px 5px black);
        transition: all 0.2s linear;
    }

    .goal-right img:hover {
        transform: translateY(-5px);
        filter: drop-shadow(5px 6px 7px black);
    }

    #our-Team {
        width: 80%;
        margin: 4rem auto 1rem;
    }

    #our-Team h2 {
        text-align: center;
        margin: 1rem auto 4rem;
        position: relative;

    }

    #our-Team h2::after {
        content: '';
        height: 4px;
        margin: 0 auto;
        text-align: center;
        width: 15%;
        background-color: aqua;
        position: absolute;
        left: 50%;
        bottom: -10px;
        border-radius: 5px;
        transform: translate(-50%);
    }

    .teamContainer {
        width: 100%;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .team-item {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 0.3rem;
        background-color: #ee4c7c;
        width: 300px;
        height: 200px;
        border-radius: 100px 00px 100px 00px; 

    }

    .team-item h3 {
        margin-top: 1rem;
        font-size: 1.1rem;
        color: black;

    }

    .team-item span {
        margin-top: .4rem;
        font-weight: bold;
        text-transform: uppercase;
        color:#5D001E;
        /* color:#425465; */
    }

    .team-item img {
        width: 100px;
        height: 100px;
        border-radius: 60%;
        /* border-radius: 200px 00px 200px 00px;  */
    }
</style>

<body>
    <?php
    include('navbar.php')
    ?>
    <section class="sec1_contact">
        <div class="container">
            <h1 class="con_h1">About Us</h1>
        </div>
    </section>

    <section id="home">
        <div class="home-left">
            <img src="assets/wedding3.jpg" alt="">
        </div>
        <div class="home-right">
            <h2 class="home-heading"> Who we are ?</h2>
            <p class="home-para" style="font-size:20px;">Pleasant events management company is a business that specializes in planning, organizing, and coordinating events of various types and sizes with budget friendly rates.
            </p>
        </div>
    </section>

    <section class="g">
        <section id="goal">
            <div class="goal-left">
                <h2>Our Goal</h2>
                <p>The main goal of our company is to provide a memorable experience to the clients and guests, along with minimizing stress of client.
                    The company works closely with the client to understand their goals and objectives for the event and deliver an event that meets these objectives and achieves the desired outcomes to the client.
                </p>
                <ul>
                    <li > Meeting the client's objectives</li>
                    <li> Provide enjoyeble events</li>
                    <li>  Creating memorable experiences</li>
                </ul>

            </div>
            <div class="goal-right">
                <img src="assets/landing_event.png" alt="">
            </div>
        </section>
    </section>
    <section id="our-Team">
        <h2>Our Team Member</h2>
        <div class="teamContainer">
            <div class="team-item">
                <img src="assets/k1.jpg" alt="">
                <h3 class="member-name">Kenil Lathiya</h3>
               
            </div>
            <div class="team-item">
                <img src="assets/g1.jpg" alt="">
                <h3 class="member-name">Gautam Lathiya</h3>
               
            </div>
        </div>
    </section>
    <?php
    include('footer.php');
    ?>
</body>

</html>