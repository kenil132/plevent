<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Document</title>
    <style>
        .list-group {
            text-align: center;
        }

        .list-group-item {
            width: 300px;
        }

        @media (max-width: 420px) {
            .list-group-item {
                width: auto;
            }
            h3{
                font-size: 15px;
            }
        }
    </style>
    <script>
        // $(document).ready(function() {
        //     $(".list-group a").on("click", function() {
        //         $(".list-group a").removeClass("active");
        //         $(this).addClass("active");
        //     });
        // });
        // $(document).ready(function() {
        //     $("#order").on("click", function() {
        //         $("#myprofile").removeClass("active");
        //         $(this).addClass("active");
        //     });
        // });
        // $(function() {
        //     $('.nav a').filter(function() {
        //         return this.href == location.href
        //     }).parent().addClass('active').siblings().removeClass('active');

        //     $('.nav a').click(function() {
        //         $(this).parent().addClass('active').siblings().removeClass('active')
        //     });
        // });
    </script>
</head>

<body>
    <h3> Name : <?php echo $_SESSION['fname'];
                ?></h3><br>
    <!-- <img src="../assets/black couple.jpg" alt="" width="100%" height="100%"> -->
    <div class="list-group">
        <a href="./myprofile.php" class="list-group-item list-group-item-action" id="myprofile" href="#list-home" role="tab">Edit Account</a><br>
        <a href="./myorder.php" class="list-group-item list-group-item-action" id="order" href="#list-profile" role="tab">My Order</a><br>
        <a href="./changepwd.php" class="list-group-item list-group-item-action" href="#list-messages" role="tab">Change Password</a><br>
        <a href="../logout.php" class="list-group-item list-group-item-action" href="#list-settings" role="tab">Logout</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
</body>

</html>