
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Khmer Job</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dist/css/bootstrap-datetimepicker.css">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/jquery-select7.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/service_style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular-route.js"></script>

   <style type="text/css">
    li.page:hover{
        background: rgba(24, 24, 25, 0.32);
    }
    li.activepage{
        background: rgba(24, 24, 25, 0.32);
    }
    .activepage{
        background: rgba(24, 24, 25, 0.32);
    }
    .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .active > a{
            background-image: linear-gradient(to bottom, rgba(219, 219, 219, 0) 0%, rgba(226, 226, 226, 0) 100%);
    }
    .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover{
        background-color: rgba(231, 231, 231, 0) !important;
    }
    .navbar-nav>li{
        border-right: 1px solid #798e79;
    }
    .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {  
    background-color:#088708 !important;    
    } 
    .select7__option_current::before {display: none;}
  
    .badge1[data-badge]:after {
       content:attr(data-badge);
       position:absolute;
       top:-10px;
       right:-10px;
       font-size:.9em;
       background:red;
       color:white;
       width:18px;height:18px;
       text-align:center;
       line-height:18px;
       border-radius:50%;   
    }   

</style>
</head>
<body >
<?php 
    $process_payment= "page";
    $bundle_package_edit= "page";
    $bundle_package= "page";
    $cv_paid_search= "page";
    $cv_paid_search_edit= "page";
    $home = "page";
    $about = "page";
    $service = "page";
    $p_cv = "page";
    $s_cv ="page";
    $p_job = "page";
    $s_job ="page";
    $p_skill = "page";
    $s_skill ="page";
    $advertise_rate = "page";
    $payment = "page";
    $promotion = "page";
    $payment = "page";
    $contact_us = "page";
    $FAQ = "page";
    $advertise_rate="page";
    $p_ads="page";

    $menuLinkid=basename($_SERVER['PHP_SELF'],".php");
    if($menuLinkid=="home")
    {
        $home = "activepage";
    }
    elseif($menuLinkid=="about") 
    {
       $about = "activepage";

    }
    elseif($menuLinkid=="payment")
    {
        $payment ="activepage";

    }elseif ($menuLinkid=="promotion") 
    {
      $promotion ="activepage";

    }elseif ($menuLinkid=="contact_us") 
    {
        $contact_us = "activepage";
    }
    elseif ($menuLinkid=="FAQ") 
    {
        $FAQ = "activepage";
    }elseif ($menuLinkid=="p_cv") 
    {
        $p_cv = "activepage";
    }
    elseif ($menuLinkid=="s_cv") 
    {
        $s_cv = "activepage";
    }
    elseif ($menuLinkid=="p_job") 
    {
        $p_job = "activepage";
    }
    elseif ($menuLinkid=="s_job") 
    {
        $s_job = "activepage";
    }
    elseif ($menuLinkid=="p_skill") 
    {
        $p_skill = "activepage";
    }elseif ($menuLinkid=="s_skill") 
    {
         $s_skill = "activepage";
    }elseif($menuLinkid=="process_payment_c") {
        $process_payment_c="activepage";
    }
    elseif($menuLinkid=="bundle_package_edit") {
        $bundle_package_edit="activepage";
    }
    elseif($menuLinkid=="cv_paid_search_edit"){
        $cv_paid_search_edit="activepage";
    }
    elseif($menuLinkid=="cv_paid_search_c") {
        $cv_paid_search_c="activepage";
    }
    elseif($menuLinkid=="p_ads"){
        $p_ads="activepage";
    }elseif($menuLinkid=="advertise_rate"){
        $advertise_rate="activepage";}
?>

    <div class="container" style="background: #fff">

    <!-- === End Header ====-->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-12">                
                <!-- ===End Logo ====-->
                    <div class="col-sm-3 col-md-2">
                        <a href="<?php echo base_url('home');?>">
                          <img src="<?php echo base_url('assets/khmer-job-logo.jpg');?>" style="width: 100%;margin-top:30px">  
                        </a>
                    </div>
                <!-- ===End Logo ====-->
                <!-- ===Top Advertising ====-->
                    <div class="col-sm-7 col-md-9">
                        <a href="<?php if($ads_top){echo $ads_top->ads_url;}?>" title="<?php if($ads_top){echo $ads_top->ads_url;}?>" target="_blank">
                            <img src="<?php if($ads_top){echo base_url('assets/uploads/'.$ads_top->ads_img);}?>" style="width: 900px;height:90px;" class="img-responsive">
                        </a>
                    </div>
                <!-- ===End Top Advertising ====-->
                
                <!-- ===Languages && Login logout ====-->
                    <div class="col-sm-4 col-md-1" style="margin-top: 6px;">
                            <div class="col-sm-2 col-md-1">
                                    <div class="row">
                                        <a href="<?php echo base_url('LanguageSwitcher/switchLang/khmer');?>" class="btn btn-default btn-xs"><img  src="<?php echo base_url('assets/leng/Cambodia.png/');?>" style='margin-right:1px'>​Khmer</a>
                                    </div>
                                    <div class="row" style="margin-top: 5px;">
                                        <a href="<?php echo base_url('LanguageSwitcher/switchLang/english');?>" class="btn btn-default btn-xs"><img src="<?php echo base_url('assets/leng/en.png');?>">English</a>
                                    </div>
                            </div>
                            <div style="clear:both;"></div>
                            <div class="row" style="margin-top: 5px;"><a href="<?php if(isset($this->session->acc_log1)){ echo base_url("user_account/account_info");}else{ echo base_url("registerControl");}?>" style="float: right;"><?php if(isset($this->session->acc_log1)){ echo "Your account";}else{ echo "Register";} ?><i class="fa fa-user" aria-hidden="true"></i></a></div>
                            <div class="row">
                                <a href="<?php if($this->session->acc_log1){ echo base_url("home/log_out");}else{ echo base_url("home/form_log");}?>" style="float: right;"> <?php if($this->session->acc_log1){echo"Log out";}else{echo "log in";}?> <i class="fa fa-lock" aria-hidden="true"></i></a>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 col-md-1">
                                   <?php if(isset($acc_head->acc_photo)){ $acc_photo = $acc_head->acc_photo; }else{$acc_photo="user.jpg";}?>
                                   <img style="margin-left:20px" class="img img-circle" width="30px" src="<?php echo base_url("assets/uploads/$acc_photo");?>">
                                    <h5><?php if(isset($acc_head->acc_name)){ echo "welcome:".$acc_head->acc_name;} ?></h5>
                                </div>
                            </div>
                    </div>
                <!-- ===Languages && Login logout ====-->                
            </div>
        </div>
    <!-- === End Header ====-->


    <!-- === Navigation ====-->
        <div class="row">
            <div class="col-md-12">
                <nav id="" class="navbar navbar-default" style="margin-bottom: 11px !important;">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav" style="background-color:screen">
                            <li class="<?php echo $home?>"><a href="<?php echo base_url('home');?>"><?php echo $this->lang->line('menu0')?></a></li>
                            <li class="<?php echo $about?>" ><a href="<?php echo base_url('home/about');?>"><?php echo $this->lang->line('menu1')?></a></li>
                            <li class="<?php
                                if($p_cv){echo $p_cv;}
                                elseif($s_cv){echo $s_cv;}
                                ?>">
                                <a href="#"><?php echo $this->lang->line('menu2')?>&#9662;</a>
                                <ul class="dropdown">
                                    <li class="<?php echo $p_cv?>"><a href="<?php echo base_url("home/service/".$value='p_cv');?>"><?php echo $this->lang->line('menu2a')?></a></li>
                                    <li class="<?php echo $s_cv?>"><a href="<?php echo base_url('home/service/'.$value='s_cv');?>"><?php echo $this->lang->line('menu2b')?></a></li>
                                    <li class="<?php echo $p_job?>"><a href="<?php echo base_url('home/service/'.$value='p_job');?>"><?php echo $this->lang->line('menu2c')?></a></li>
                                    <li class="<?php echo $s_job?>"><a href="<?php echo base_url('home/service/'.$value='s_job');?>"><?php echo $this->lang->line('menu2d')?></a></li>
                                    <li class="<?php echo $p_skill?>"><a href="<?php echo base_url('home/service/'.$value='p_skill');?>"><?php echo $this->lang->line('menu2e')?></a></li>
                                    <li class="<?php echo $s_skill?>"><a href="<?php echo base_url('home/service/'.$value='s_skill');?>"><?php echo $this->lang->line('menu2f')?></a></li>
                                </ul>
                            </li><!-- service -->
                            <li class="<?php
                                if($advertise_rate){ echo $advertise_rate;}
                                elseif($p_ads){echo $p_ads;}
                                ?>">
                                <a href="#"><?php echo $this->lang->line('menu3')?>&#9662;</a>
                                <ul class="dropdown" style="width:200px">
                                    <li class="<?php echo $advertise_rate;?>"><a href="<?php echo base_url('home/advertise_rate');?>"><?php echo $this->lang->line('menu3a')?></a></li>
                                    <li class="<?php echo $p_ads;?>"><a href="<?php echo base_url("ads_c/post_ads"); ?>"><?php echo $this->lang->line('menu3b')?></a></li>
                                </ul>
                            </li><!-- adverties -->
                             <li class="<?php​​ echo $bundle_package_edit='bundle_package_edit'?$bundle_package_edit:$bundle_package;?>">
                                <a href="#"><?php echo $this->lang->line('menu4')?>&#9662;</a>
                                <ul class="dropdown" style="width:220px">
                                    <li class="<?php echo $process_payment; ?>"><a href="<?php echo base_url("process_payment_c/way_to_payment");?>"><?php echo $this->lang->line('menu4a')?></a></li>
                                    <li class="<?php echo $bundle_package_edit="bundle_package_edit"?$bundle_package_edit:$bundle_package;?>"><a href="<?php echo base_url("bundle_package_c"); ?>"><?php echo $this->lang->line('menu4b')?></a></li>
                                    <li class="<?php echo $cv_paid_search_edit="cv_paid_search_edit"?$cv_paid_search_edit:$cv_paid_search; ?>"><a href="<?php echo base_url("cv_paid_search_c"); ?>"><?php echo $this->lang->line('menu4c')?></a></li>
                                </ul><!-- payment -->
                            </li>
                            <li class="<?php echo $promotion?>"><a href="<?php echo base_url('home/promotion');?>"><?php echo $this->lang->line('menu5')?></a></li>
                            <li class="<?php echo $contact_us?>"><a href="<?php echo base_url('home/contact_us');?>"><?php echo $this->lang->line('menu6')?></a></li>
                            <li class="<?php echo $FAQ?>"><a href="<?php echo base_url('home/FAQ'); ?>"><?php echo $this->lang->line('menu7')?></a></li>
                            <li>
                            </li>                           
                        </ul>

                <!--== Notification ==-->
                <?php 
                    include("ng/db.php");
                    if($this->session->acc_log1)
                    {
                       //get cv to know first
                        $result = $conn->query("SELECT cat.cat_id FROM tbl_post_cv AS cv 
                                INNER JOIN tbl_category AS cat ON cv.cat_id=cat.cat_id
                                WHERE (cv.acc_id='{$this->session->acc_log1}' AND cv.post_cv_status='Published') AND notify=1");
                                if($result->num_rows>0)
                                {
                                    while($rs = $result->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $cat_id=$rs["cat_id"];                                
                                        $result = $conn->query("SELECT job.post_job_id,acc_photo,acc_name,job_title,job_desc FROM tbl_post_job AS job
                                        INNER JOIN tbl_account AS acc ON job.acc_id=acc.acc_id                            
                                        WHERE (job.acc_id='{$this->session->acc_log1}' AND job.post_job_status='Published') AND (notify=1 AND job.cat_id='$cat_id')");

                ?>


                        <ul class="nav navbar-top-links navbar-right" style="margin-top: 13px">
                            <a href="#" rel="popover" data-trigger="focus" data-popover-content="#popover" data-placement="bottom">                               
                                <span style="color:#fff">Notication</span>
                                <span class="badge1" <?php if($result->num_rows!=0){echo 'data-badge='."$result->num_rows";}?> style="color:#fff;margin-right:5px;"><i class="fa fa-globe fa-lg"></i></span>

                                 <div id="popover" class="hide">
                                    <ul class="nav nav-pills nav-stacked">
                                    <?php 
                                       if($result->num_rows>0){ while($rs = $result->fetch_array(MYSQLI_ASSOC)){?>                                                                                                                       
                                        <a href="<?php echo base_url("job_c/job_detail/".$rs["post_job_id"]);?>">
                                            <div class="row">
                                                <div class="col-lg-4"><img src="<?php echo base_url('assets/uploads/'.$rs["acc_photo"]);?>" class="img-responsive"></div>
                                                <div class="col-lg-8" style="padding-left:0px;">
                                                     <div class="row">
                                                        <div class="col-lg-12"><strong>Company: </strong><?php echo $rs["acc_name"];?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12"><strong>Position: </strong><?php echo $rs["job_title"];?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12"><strong>Job Description: </strong><div><?php echo substr($rs["job_desc"],0,45)."...";?></div></div>
                                                    </div>
                                                    
                                                </div>
                                            </div><hr>                                                                                       
                                        </a>                                       
                                    <?php }}?>
                
                                    </ul>
                                 </div>

                            </a>                                                                                                                                                                                                               
                        </ul>
                    <?php 

                                    }
                                }                       
                    }
                    
                ?>                                               
                        
                
                <!--== End Notification ==-->


              
                <!-- /.dropdown -->
            </li></ul>                                                                                                          
                    </div>
                </nav>
            </div>
        </div>
    <!-- ===End Navigation ====-->