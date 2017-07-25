            <style type="text/css">
              .tage-i{
                font-size:25px; padding:1px; margin-top:-3px;
                color: #988e8e;
              }
              .td{
                padding-right:70px;
              }
            </style>
            <div class="col-md-3"><!--=====side bar button ======-->
              <div class="list-group">
                <a href="<?php echo base_url("user_account/account_info");?>" class="list-group-item active1">Account Information</a>
                <a href="<?php echo base_url("job_c/post_job");?>" class="list-group-item">Post Job</a>
                <a href="<?php echo base_url("cv_c/post_cv");?>" class="list-group-item">Post CV</a>
                <a href="<?php echo base_url('skill_c/post_skill')?>" class="list-group-item">Post Skill</a>
                <a href="<?php echo base_url("ads_c/post_ads");?>" class="list-group-item">Advertisement</a>
                <a href="<?php echo base_url("bundle_package_c/index");?>" class="list-group-item">Purchase Bundle Package</a>
                <a href="<?php echo base_url("cv_paid_search_c/index");?>" class="list-group-item">Purchase CV Paid Search</a>
              </div>
            </div><!--=====end side bar button ======-->
            <div class="col-md-9">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-body">
                              <div class="row">
                                <div class="col-md-9">
                                 <img src="<?php if(isset($acc_info->acc_photo)){ echo base_url('assets/uploads/'.$acc_info->acc_photo);}?>" class="img-thumbnail img-responsive" style="width:159px">
                                 <div class="row" style="margin-top:5px">
                                   <div class="col-md-4">
                                     <div class="panel panel-default text-center">
                                    <h5>Account ID:<?php echo $acc_info->acc_code; ?></h5>
                                  </div>
                                   </div>
                                 </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                  <h4><b>Your Profile</b></h4>
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                      <div class="row">
                                        <div class="col-lg-2">Name:</div>
                                        <div class="col-lg-10"><?php if(isset($acc_info->acc_name)){echo $acc_info->acc_name;}?></div>
                                      </div>
                                      <div class="row">
                                        <div class="col-lg-2">Email:</div>
                                        <div class="col-lg-10"><?php if(isset($acc_info->acc_email)){echo $acc_info->acc_email;} ?></div>
                                      </div>
                                      <div class="row">
                                        <div class="col-lg-2">Tel:</div>
                                        <div class="col-lg-10"><?php if(isset($acc_info->acc_phone)){ echo $acc_info->acc_phone;}?></div>
                                      </div>
                                      <div class="row">
                                        <div class="col-lg-2">Addrss:</div>
                                        <div class="col-lg-10"><?php if(isset($acc_info->acc_addr)){ echo $acc_info->acc_addr;}?></div>
                                      </div>                                       
                                      <div class="row">
                                        <div class="col-lg-2">Website:</div>
                                        <div class="col-lg-10"><?php if(isset($acc_info->acc_website)){echo $acc_info->acc_website;}?></div>
                                      </div>
                                      <div class="row">
                                        <div class="col-lg-2">About Me:</div>
                                        <div class="col-lg-10"><?php if(isset($acc_info->acc_desc)){echo $acc_info->acc_desc;}?></div>
                                      </div>                                      
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                    <a href="<?php echo base_url("user_account/get_acc/"/*.$acc_info->acc_id*/)?>" class="btn btn-default">Edit Your Profile</a>
                                </div>

                                <div class="col-md-12" style="margin-top:10px">
                                  Free Rewards
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                      <div class="row">
                                        <div class="col-md-12">
                                            CV Paid Search: <?php if($free_cps){echo $free_cps." Hour";}?>
                                        </div>
                                      </div>
                                      <div class="row">
                                         <div class="col-md-12">
                                            Primium Job Posting: <?php if($free_premium){echo $free_premium." Times";}?> 
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-12" style="margin-top:10px">
                                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="pull-right" style="margin-top:10px">
                                                 <a role="tab" id="a1" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#div1" aria-expanded="false" aria-controls="div1" style="height:10px"><i class="fa fa-plus-square tage-i"></i></a>
                                              </div>
                                           <div class="panel-heading">
                                            Job Posting Histories
                                            </div>
                                              <div id="div1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="a1">
                                                <div class="panel-body">
                                                  <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                      <thead>
                                                        <tr>
                                                          <th>Job ID</th>
                                                          <th>Function</th>
                                                          <th>Post Date</th>
                                                          <th>End Date</th>
                                                          <th>Status</th>
                                                          <th>Priorty</th>
                                                          <th>Action</th>
                                                        </tr>
                                                      <tbody>
                                                      <?php if($job){foreach($job as $job1){?>
                                                        <tr>
                                                          <td><?php echo $job1->job_code;?></td>
                                                          <td><?php echo $job1->job_title;?></td>
                                                          <td><?php echo $job1->posting_date;?></td>
                                                          <td><?php echo $job1->end_date;?></td>
                                                          <td><?php echo $job1->post_job_status;?></td>
                                                          <td><?php echo $job1->rate_det_type;?></td>
                                                          <td><?php echo $job1->post_job_action;?></td>
                                                        </tr>
                                                      <?php }}?>
                                                      </tbody>                                                                                                        
                                                      </thead>
                                                    </table>
                                                  </div>
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                </div><!--======= job posting history======= -->
                                <div class="col-md-12" style="margin-top:10px">
                                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="pull-right" style="margin-top:10px">
                                                 <a role="tab" id="a2" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#div2" aria-expanded="false" aria-controls="div2" style="color:#056f05;"><i class="fa fa-plus-square tage-i"></i></a>
                                              </div>
                                           <div class="panel-heading">
                                            CV Posting Information
                                            </div>
                                              <div id="div2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="a2">
                                                <div class="panel-body">
                                                  <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                      <thead>
                                                        <tr>
                                                          <th>CV ID</th>                                                                                                                 
                                                          <th>Status</th>
                                                          <th>Action</th>
                                                          <th>Priority</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php if($cv){foreach($cv as $cv1){?>
                                                        <tr>
                                                          <td><?php echo $cv1->cv_code;?></td>                                                                                                                                                                                                    
                                                          <td><?php echo $cv1->post_cv_status;?></td>                        
                                                          <td><?php echo $cv1->cv_status=='1'?'Showed':'Hide';?></td>
                                                          <td><?php echo $cv1->rate_det_type;?></td>
                                                        </tr>
                                                      <?php }}?>
                                                      <tbody>  
                                                    </table>
                                                  </div>
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                </div><!--======= CV posting information======= -->
                                <div class="col-md-12" style="margin-top:10px">
                                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="pull-right" style="margin-top:10px">
                                                 <a role="tab" id="a3" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#div3" aria-expanded="false" aria-controls="div3" style="color:#056f05;" style="height:10px"><i class="fa fa-plus-square tage-i"></i></a>
                                              </div>
                                           <div class="panel-heading">
                                            Skill Posting Information
                                            </div>
                                              <div id="div3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="a3">
                                                <div class="panel-body">
                                                  <div class="table-responsive">
                                                     <table class="table table-bordered">
                                                        <thead>
                                                          <tr>
                                                            <th>Skill ID</th>
                                                            <th>Post Date</th>
                                                            <th>End Date</th>
                                                            <th>Duration</th>
                                                            <th>Status</th>                                                            
                                                            <th>Priority</th>
                                                          </tr>
                                                        </thead>
                                                          <tbody>
                                                            <?php if($skill){foreach($skill as $sk){?>
                                                            <tr>
                                                              <td><?php echo $sk->skill_code;?></td>                                                                                                                                                                                                                                                                  
                                                              <td><?php echo $sk->date_crea;?></td>                        
                                                              <td><?php echo date("Y-m-d",strtotime("+$sk->duration  days",strtotime($sk->date_crea)))?></td>                                             
                                                              <td><?php echo $sk->duration.' days';?></td>
                                                              <td><?php echo $sk->post_skill_status;?></td>
                                                              <td><?php echo $sk->rate_det_type;?></td>                                                                                      
                                                            </tr>
                                                          <?php }}?>
                                                          <tbody>
                                                      </table>
                                                  </div>
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                </div><!--======= Skill posting information======= -->
                                <div class="col-md-12" style="margin-top:10px">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="pull-right" style="margin-top:10px">
                                                 <a role="tab" id="a4" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#div4" aria-expanded="false" aria-controls="div4" style="color:#056f05;" style="height:10px"><i class="fa fa-plus-square tage-i"></i></a>
                                            </div>
                                           <div class="panel-heading">
                                            Advertise Posting Information
                                            </div>
                                              <div id="div4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="a4">
                                                <div class="panel-body">
                                                  <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                      <thead>
                                                        <tr>
                                                          <th>Ads ID</th>
                                                          <th>Type</th>
                                                          <th>Post Date</th>
                                                          <th>End Date</th>
                                                          <th>Duration</th>
                                                          <th>Status</th>
                                                          <th>Action</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php if($ads){foreach($ads as $ads1){?>
                                                        <tr>
                                                          <td><?php echo $ads1->ads_code;?></td>
                                                          <td><?php echo $ads1->rate_det_type;?></td>
                                                          <td><?php echo $ads1->post_ads_date;?></td>                        
                                                          <td><?php echo date("Y-m-d",strtotime("+$ads1->duration days",strtotime($ads1->post_ads_date)))?></td>                                             
                                                          <td><?php echo $ads1->duration.' days';?></td>
                                                          <td><?php echo $ads1->post_ads_status;?></td>                        
                                                          <td><?php echo $ads1->post_ads_action;?></td>
                                                        </tr>
                                                      <?php }}?>
                                                      </tbody>                                                                                                        
                                                    </table>
                                                  </div>
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                </div><!--======= ADS posting hostory======= -->
                                <div class="col-md-12" style="margin-top:10px">
                                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="pull-right" style="margin-top:10px">
                                                 <a role="tab" id="a5" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#div5" aria-expanded="false" aria-controls="div5" style="color:#056f05;" style="height:10px"><i class="fa fa-plus-square tage-i"></i></a>
                                              </div>
                                           <div class="panel-heading">
                                            Purchased Bundle Package Histories
                                            </div>
                                              <div id="div5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="a5">
                                                <div class="panel-body">
                                                  <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                      <thead>
                                                        <tr>
                                                          <th>PD ID</th>
                                                          <th>Duration</th>
                                                          <th>Purchase Date</th>
                                                          <th>Expired Date</th>
                                                          <th>Status</th>
                                                          <th>Action</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                      <?php if($bp){foreach($bp as $bp1){?>
                                                        <tr>
                                                            <td><?php echo $bp1->bp_code;?></td>
                                                            <td><?php echo $bp1->key_code.' days';?></td>                                                                   
                                                            <td><?php echo $bp1->date_from;?></td>
                                                            <td><?php echo date("Y-m-d",strtotime("+$bp1->key_code  days",strtotime($bp1->date_from)))?></td>                         
                                                            <td><?php echo $bp1->bp_status;?></td>                        
                                                            <td><?php echo $bp1->bp_action;?></td>
                                                        </tr>
                                                      <?php }}?>
                                                      </tbody>                                                     
                                                    </table>
                                                  </div>
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                </div><!--======= Purchased Bundle Package history======= -->
                                <div class="col-md-12" style="margin-top:10px">
                                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="pull-right" style="margin-top:10px">
                                                 <a role="tab" id="a6" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#div6" aria-expanded="false" aria-controls="div6" style="color:#056f05;" style="height:10px"><i class="fa fa-plus-square tage-i"></i></a>
                                              </div>
                                           <div class="panel-heading">
                                            Purchased CV Paid Search Histories
                                            </div>
                                              <div id="div6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="a6">
                                                <div class="panel-body">
                                                  <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                      <thead>
                                                        <tr>
                                                          <th>CPS ID</th>
                                                          <th>Duation</th>
                                                          <th>Purchased Date</th>
                                                          <th>Status</th>
                                                          <th>Action</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                         <tbody>
                                                      <?php if($cps){foreach($cps as $cps1){?>
                                                        <tr>
                                                          <td><?php echo $cps1->cps_code;?></td>
                                                          <td><?php echo $cps1->hour.' hours';?></td>                                                                    
                                                          <td><?php echo $cps1->date_from;?></td>                        
                                                          <td><?php echo $cps1->cps_status;?></td>                       
                                                          <td><?php echo $cps1->cps_action;?></td>
                                                        </tr>
                                                      <?php }}?>
                                                      </tbody>                                                                                                         
                                                    </table>
                                                  </div>
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                </div><!--======= Purchased CV Paid Search History======= -->
                              </div>
                        </div>
                    </div>
                </div>
            </div>