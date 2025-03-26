<?php
session_start();
include('config/dbcon.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>
<!-- Content Wrapper. Contains page content -->

<body>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="p-1 my-container active-cont">
                        <!-- Top Nav -->

                        <!--End Top Nav -->
                    </div>
                    <h1 class="m-0">Pleasant Event</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                         <!-- ./col -->
                         <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php $item = $con->query("SELECT * FROM register")->num_rows;
                                    echo number_format($item); ?></h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="registered.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">

                                <h3><?php $item = $con->query("SELECT * FROM booking")->num_rows + $item = $con->query("SELECT * FROM custom_event")->num_rows;
                                    echo number_format($item); ?></h3>
                                <p>Total Order</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="booking.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php $item = $con->query("SELECT * FROM booking WHERE  `order_status` ='0'")->num_rows + $item = $con->query("SELECT * FROM custom_event WHERE  `order_status` ='0'")->num_rows;
                                    echo number_format($item); ?></h3>
                                <p>Panding Projects</p>
                            </div>
                            <div class="icon">
                            <i class="fas fa-clock"></i>
                            </div>
                            <a href="booking.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php $item = $con->query("SELECT * FROM booking WHERE  `order_status` ='1'")->num_rows + $item = $con->query("SELECT * FROM custom_event WHERE  `order_status` ='1'")->num_rows;
                                    echo number_format($item); ?></h3>
                                <p>Aprroved Projects</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <a href="booking.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                     <!-- ./col -->
                     <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3><?php $item = $con->query("SELECT * FROM booking WHERE  `order_status` ='2'")->num_rows + $item = $con->query("SELECT * FROM custom_event WHERE  `order_status` ='1'")->num_rows;
                                    echo number_format($item); ?></h3>
                                <p>Working Projects</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-spinner"></i>
                            </div>
                            <a href="booking.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php $item = $con->query("SELECT * FROM booking WHERE  `order_status` ='3'")->num_rows +  $item = $con->query("SELECT * FROM custom_event WHERE  `order_status` ='3'")->num_rows;
                                    echo number_format($item); ?></h3>
                                <p>Total Completed Projects</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="booking.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
               
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <?php include('includes/script.php'); ?>
    <?php include('includes/footer.php'); ?>
</body>