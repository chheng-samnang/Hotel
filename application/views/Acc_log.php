
<!--Pulling Awesome Font -->
<script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular-route.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/css/style1.css">
<link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3 log">
           <form name="form" id="form" action="<?php echo base_url();?>home/acc_log" method="POST">
                <div class="form-login">
                    <h4 class="text-center">Login</h4>
                    <div class="row">
                      <div class="col-lg-12">
                      <?php
                        if(!empty($error) OR validation_errors())
                        {
                      ?>
                        <div class="alert alert-danger" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <?php if(!empty($error)){echo $error;}if(validation_errors()){echo validation_errors();}?>
                        </div>
                      <?php }?>
                    </div>
                    </div>
                    <span style="font-weight:bold;color:red;"><?php if(!empty($msg)){echo $msg;}?></span>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fa fa-envelope" aria-hidden="true" style="width: auto"></i>
                            </span>
                            <input name="txtEmail" id="txtEmail" runat="server" type="text" ng-model="txtEmail" class="form-control" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" id="txtEmail"  placeholder="email"/>
                        </div>
                        <!-- <span style="color:Red" ng-show="form.txtEmail.$dirty&&form.txtEmail.$error.pattern">Please enter valid email</span> -->
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock" style="width: auto"></i>
                            </span>
                            <input id="txtPassword" runat="server" type="password" class="form-control" name="txtPassword" placeholder="password"/>
                        </div>
                    </div>
                    <div class="wrapper">
                        <span class="group-btn">
                            <input type="submit" name="btn_log" class="btn btn-primary btn-md" value="Login">
                        </span>
                        <span class="group-btn">
                            <a class="btn btn-default btn-md" href="<?php echo base_url( $this->session->cancel); ?>">Canel<i></i></a>
                        </span>
                    </div>
                     <span class="group-btn " style="margin-left:200px">     
                            <a href="<?php echo base_url();?>registerControl">Register<i class=""  aria-hidden="true"></i></a>
                        </span>
                </div>
           </form>        
        </div>
    </div>
</div>
<script type="text/javascript">
     var app = angular.module('myApp',[]);
        app.controller('myCtrl',function($scope,$http)
        {   
            $scope.validation = function()
            {   
              if( 
                  ($scope.txtAccName==undefined || $scope.txtAccName=="")
                  /*($scope.txtAccPass==undefined || $scope.txtAccPass=="")||*/
                  /*(txtAddr==undefined || txtAddr=="")||*/
                 /* (txtWebsite==undefined || $scope.txtWebsite=="")||
                  ($scope.txtConPasswd==undefined || $scope.txtConPasswd=="") ||*/
                 /* (txtdescr==undefined || txtdescr=="") ||*/
                 /*($scope.txtPhone==undefined || $scope.txtPhone=="") ||
                  ($scope.ddlGender==undefined || $scope.ddlGender=="") ||
                  ($scope.txtDOB==undefined || $scope.txtDOB=="")||
                 ($scope.txtEmail==undefined || $scope.txtEmail=="")*/
                )
                {
                  $scope.msg_error=true;}
                else
                {
                  passwd_c = $scope.txtConPasswd;
                  passwd = $scope.txtAccPass;
                  if(passwd==passwd_c){
                    document.getElementById("form").submit();
                  }
                }
            }                
        });  
</script>