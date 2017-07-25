
<?php
    
    include("/../../../ng/db.php");

    $sql="SELECT room_id,date_check_out FROM tbl_room WHERE status='prepea'";

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result))
    {  
        if(isset($row["room_id"]))
        {
            $date_now=date("YmdHi");
            $date_check_out = $row["date_check_out"]+40;
            if($date_now>=$date_check_out)
            {    $id=$row["room_id"];
                $sql = "UPDATE tbl_room SET status='free' WHERE room_id={$id} LIMIT 1";
                mysqli_query($conn,$sql);
            }
        }
    }/*======== update room status after check_out for 40 minute==========*/


    $date_check_in=date("Y-m-d");

    $sql1="SELECT * FROM tbl_booking_detail AS bd INNER JOIN tbl_booking AS b ON bd.booking_code=b.booking_code  WHERE  check_in = '$date_check_in'";

    $result1 = mysqli_query($conn, $sql1);

    while($row1 = mysqli_fetch_assoc($result1))
    {  
        if(isset($row1["room_id"]))
        {   
            $id=$row1["room_id"];
            $sql = "UPDATE tbl_room SET status='booking' WHERE room_id={$id} AND status='free' LIMIT 1";
            mysqli_query($conn,$sql);
        }
    }
    /*===============update room status to booking=======*/

    $sql1="SELECT * FROM tbl_booking_detail AS bd INNER JOIN tbl_room AS r ON bd.room_id=r.room_id  WHERE status='booking' ";
    $result1 = mysqli_query($conn, $sql1);
    while($row1 = mysqli_fetch_assoc($result1))
    {   $row1["check_in"]-$date_check_in;
        if(isset($row1["room_id"]))
        {   if(($row1["check_in"])-($date_check_in)<0){
                $id=$row1["room_id"];
                $sql = "UPDATE tbl_room SET status='free' WHERE room_id={$id} AND status='booking' LIMIT 1";
                mysqli_query($conn,$sql);
            }
        }
    }

    /* update room status to free if not check-in for long time */



    if(!isset($this->session->userLogin))
    {
        redirect("logout");
    }
?>
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
    <link href="<?php echo base_url()?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    
    <link href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dist/css/bootstrap-datetimepicker.css">
    <script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/moment-with-locals.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular-route.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
        .border:hover{border:solid 1px blue;}
        .borders{border:solid 1px blue;}
        #page-wrapper{background-color:#fbfbfb;}
        .panel-default{box-shadow: 2px 5px 5px #888888;}
        .panel-primary{box-shadow: 2px 5px 5px #888888;}
    </style>       
	
</head>
<body>

    <div id="wrapper" style="margin-top: 40px;">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>               
                <a class="navbar-brand" href="<?php echo base_url('main');?>"><i class="fa fa-home"></i>Hotel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li><strong>Welcome <?php echo strtoupper($this->session->userLogin)?></strong></li>
                <li><a href="<?php echo base_url()?>home/" target="_blank"><i class="fa fa-eye"></i> Preview</a>
                <li><a href="<?php echo base_url()?>logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>                
              
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            
