<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pleasant events manage</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <style>
    .content-header {
      padding-left: 100px;
      transition: background-color .5s;
    }
    body {
      background-color: #F3F9FB;
    }
    .img_size{
      width:250px;
      height: 150px;
    }
    .navbar {
      background-color: #F4F4F2;
    }
    #pending{
            color:white;
            text-align:center;
            background-color:#E21818;
            font-weight: 20px;
            padding-left: 30px;
            border-radius: 5px;
            padding:3px;

        }
        #Approved{
            color:black;
            text-align:center;
            background-color:#F9D923;
            font-weight: 20px;
            padding-left: 30px;
            border-radius: 5px;
            padding:3px;
        }
        #Working{
            color:white;
            text-align:center;
            background-color:#113F67;
            font-weight: 20px;
            padding-left: 30px;
            border-radius: 5px;
            padding:3px;
        }
        #Done{
            color:white;
            text-align:center;
            background-color:#367E18;
            font-weight: 20px;
            padding-left: 30px;
            border-radius: 5px;
            padding:3px;
        }
        #complete{
            color:black ;
            text-align:center;
            background-color:#B3FFAE ;
            font-weight: 20px;
            padding-left: 30px;
            padding:3px;
            border-radius: 5px;
        }
        .gallery {
            display: inline-block;
            margin-top: 20px;
        }

        .close-icon {
            border-radius: 50%;
            position: absolute;
            right: 30px;
            top: -10px;
            padding: 5px 8px;
        }

        .form-image-upload {
            background: #e8e8e8 none repeat scroll 0 0;
            padding: 15px;
        }

        .carousel-inner>.item>a>img,
        .carousel-inner>.item>img,
        .img-responsive,
        .thumbnail a>img,
        .thumbnail>img {
            width: 300px !important;
            height: 160px !important;
        }
        .img_size{
          padding: 10px;
        }
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
      bottom: .5em;
    }
  </style>
  
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">