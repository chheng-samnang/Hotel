<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="refresh" content="600">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hotel</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url()?>assets/bower_components/dist/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/style.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/navs.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/owl.carousel.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/dist/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/moment-with-locals.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/angular.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/angular-route.js"></script>
</head>
<body>
  <!-- main wrapper -->
  <div class="wrapper">
    <!-- header -->
    <header class="header">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
              <div class="header-location"><i class="fa fa-home"></i> <a href="#">455 Martinson, Los Angeles</a></div>
              <div class="header-email"><i class="fa fa-envelope-o"></i> <a href="mailto:support@email.com">nharboy99@email.com</a></div>
              <div class="header-phone"><i class="fa fa-phone"></i> <a href="#">+(885) 708 - 344 - 93</a></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <div class="header-social pull-right">
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-bottom">
        <nav class="navbar navbar-universal navbar-custom">
          <div class="container">
            <div class="row">
              <div class="col-lg-3">
                <div class="logo"><a href="<?php echo base_url("Home");?>" class="navbar-brand page-scroll"><img src="<?php echo base_url();?>assets/uploads/logo/logo.png" alt="logo"/></a></div>
              </div>
              <div class="col-lg-9">
                <div class="navbar-header">
                  <button type="button" data-toggle="collapse" data-target=".navbar-main-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse navbar-main-collapse">
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url("Home"); ?>">Home</a></li>
                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Room <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url("Home"); ?>">all rooms</a></li>
                        <?php
                        if(isset($room_type)){
                          foreach ($room_type as $value) {
                        ?>
                        <li><a href="<?php echo base_url("Home/search_room/$value->room_type_id");?>"><?php echo $value->room_type_name; ?></a></li>
                        <?php }} ?>
                      </ul>
                    </li>
                    <li><a href="<?php echo base_url("Home/about");?>">About As</a></li>
                    <li><a href="<?php echo base_url("Home/contact_us"); ?>">Contact As</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>