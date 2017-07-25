<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- MetisMenu CSS -->
    <!-- Custom Fonts -->
        <div class="container_fluid" style="margin:0px 25px 0px 25px;" ng-app="myApp" ng-controller="myCtrl">
            <div class="row">     
                    <?php  echo form_open($action,array('id'=>'form','name'=>'form','method'=>'post'))?>
                    <div class="row">
                      <div class="col-lg-12"><!--==== start col-lg-8 =====--> 
                        <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title">Form member information</h3>
                              </div>
                            <div class="panel-body">
                              <div class="row"  ><!--====Error msg ===-->
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
                                  <?php } ?>
                                  </div>
                                <div class="col-lg-3">
                                    <h5>Name</h5>
                                    <?php echo form_input(array("name"=>"txtAccName","class"=>"form-control input-sm","value"=>$acc_info->acc_name,"phone-input","id"=>"txtAccName"));?>                                          
                                </div>
                                <div class="col-lg-3">
                                  <h5>Gender</h5>                                        
                                   <select class="form-control input-sm" ng-model="ddlGender" name="ddlGender" id="ddlGender">
                                      <option value="">Choose one</option>
                                        <option value="m" <?php if($acc_info->acc_gender=="m"){echo "selected";}?>>Male</option>
                                        <option value="f" <?php if($acc_info->acc_gender=="f"){echo "selected";}?>>Female</option>
                                        <option value="o" <?php if($acc_info->acc_gender=="o"){echo "selected";}?>>Other</option>
                                    </select>  
                                </div>
                                <div class="col-lg-3">
                                  <h5>Phone Number</h5>
                                  <?php echo form_input(array("name"=>"txtPhone","value"=>$acc_info->acc_phone,"class"=>"form-control input-sm"));?>                                          
                                </div>
                                <div class="col-lg-3">
                                  <h5>Email</h5>
                                  <?php echo form_input(array("name"=>"txtEmail","value"=>$acc_info->acc_email,"class"=>"form-control input-sm"));?>                                          
                                </div> 
                              </div>
                              <div class="row">
                                <div class="col-lg-3">
                                  <h5>Website</h5>
                                  <?php echo form_input(array("name"=>"txtWebsite","value"=>$acc_info->acc_website,"class"=>"form-control input-sm","id"=>"txtWebsite"));?>                                          
                                </div>
                                <div class="col-lg-3">
                                  <h5>Old Password</h5>
                                    <?php echo form_password("acc_pass1","",array("class"=>"form-control input-sm","ng-minlength= 3","ng-maxlength='8'","placeholder"=>"Password","ng-model"=>"txtAccPass","id"=>"txtAccPass"));?>                                          
                                </div>
                                <div class="col-lg-3">
                                  <h5>New Password</h5>
                                    <?php echo form_password("txtAccPass","",array("class"=>"form-control input-sm","ng-minlength= 3","ng-maxlength='8'","placeholder"=>" New password","ng-model"=>"txtAccPass","id"=>"txtAccPass"));?>                                          
                                </div>
                                <div class="col-lg-3">
                                      <h5>Confirm Password</h5>
                                        <?php echo form_password("txtConPasswd","",array("class"=>"form-control","placeholder"=>"Confirm password","ng-model"=>"txtConPasswd","valid-txtConPasswd","id"=>"txtConPasswd"));?>                                          
                                      <input type="hidden" value="<?php echo $acc_info->acc_pass;?>" name="acc_pass" id="acc_pass" >
                                </div>                                
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                 <img src="<?php echo base_url('assets/uploads/'.$acc_info->acc_photo);?>" class="img-thumbnail img-responsive" style="width:100px">
                                </div>
                                <div class="col-lg-3">
                                  Image
                                  <div class="form-group">
                                    <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">
                                    Upload Image
                                    </button>
                                  </div>
                                </div>
                                <div class="col-lg-8">
                                    <h5>I am \ We are</h5> <br>
                                    <label class="radio-inline"><input type="radio" <?php if($acc_info->acc_company=="individual"){echo "checked='checked'";} ?> value="individual" id="raIM" name="raIM">Individual</label>
                                    <label class="radio-inline"><input type="radio" <?php if($acc_info->acc_company=="company"){echo "checked='checked'";} ?> value="company" id="raIM" name="raIM">Company</label>
                                    <label class="radio-inline"><input type="radio" <?php if($acc_info->acc_company=="recruitment_agency"){echo "checked='checked'";} ?> value="recruitment_agency" id="raIM" name="raIM">Recruitment Agency</label>
                                    <label class="radio-inline"><input type="radio" <?php if($acc_info->acc_company=="government"){echo "checked='checked'";} ?> value="government" id="raIM" name="raIM">Government</label>
                                </div>  
                              </div>
                              <div class="row">
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  <h5>Description</h5>
                                  <?php echo form_textarea(array("name"=>"txtDesc","class"=>"form-control input-sm textarea","value"=>$acc_info->acc_desc,"id"=>"txtDesc"));?>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  <h5>Address</h5>
                                  <?php echo form_textarea(array("name"=>"txtAddr","class"=>"form-control input-sm textarea","value"=>$acc_info->acc_addr,"id"=>"txtAddr"));?>                                
                                </div>
                              </div>
                              <div class="row pull-right">
                                  <div class="col-lg-5" style="margin-top:50px;">
                                    <?php echo form_submit("btn_updat","Update",array("class"=>"btn btn-success btn-sm","onclick"=>"action()","id"=>"btn_register"));?>                                   
                                  </div>
                                  <div class="col-lg-5" style="margin-top:50px;">                                    
                                    <a class="btn btn-default btn-sm" href="<?php echo base_url("user_account/account_info");?>">Cancel</a>
                                  </div>
                              </div>
                               <div class="row">
                                  <div class="col-lg-12">
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Browse Image</h4>
                                            </div>
                                            <div class="modal-body">
                                            <input  type="file" name="txtUpload"/>
                                            <input type="hidden" id="txtImgName" name="txtImgName" />
                                            <div id="response" style="margin-top:10px;color:green;font-weight:bold;"></div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="uploadFile()">Upload</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                      </div><!--====end col-lg-8 ====--> 
                    </div>
                  <?php echo form_close()?>
            </div>
        </div>
         <script src="<?php echo base_url()?>assets/tinymce/tinymce.min.js"></script>
        <script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular.min.js"></script>
        <script>  
          function uploadFile() {
              var formData = new FormData();
              formData.append('image', $('input[type=file]')[0].files[0]); 
              $.ajax({
              url: '<?php echo base_url()?>ng/upload.php',
              data: formData,
              type: 'POST',
              // THIS MUST BE DONE FOR FILE UPLOADING
              contentType: false,
              processData: false,
              // ... Other options like success and etc
              success: function(data) {
                document.getElementById("response").innerText = "Upload Complete!"; 
                document.getElementById("txtImgName").value = data;
              }     
            });
          }//file upload img 
        </script>