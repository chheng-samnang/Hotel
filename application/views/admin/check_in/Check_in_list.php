<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Form <?php if(isset($pageHeader)){echo $pageHeader;}?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row"><!--add and search-->
            <div class="col-lg-2" style="margin-bottom:10px">
              <a href="<?php echo base_url("admin/Check_in/check_in");?>" class="btn btn-success">New Check-In</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12"><!--table-->                        
                <div class="panel panel-primary"><!--panel-->
                    <div class="panel-body table-responsive">
                        <table class="table table-hover" id="mydata">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Guest Name</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>Action</th>
                        ​​​​​​​​​​  </tr>
                        </thead>
                        <tbody>
                              <?php $i=1; if(isset($check_list)){
                                foreach ($check_list as $value){ 
                               ?>
                                <tr>
                                 <td><?php echo $i; ?></td>  
                                 <td><a href="<?php echo base_url("admin/Check_in/check_in_detail/$value->guest_id"); ?>"><?php echo $value->guest_name; ?></a></td>
                                 <td><?php echo $value->gender=="0"?"Female":"Male"; ?></td>
                                 
                                 <td><?php echo $value->phone; ?></td>
                                 <td><?php echo $value->email; ?></td>
                                 <td><?php echo $value->check_in; ?></td>
                                 <td><?php echo $value->check_out; ?></td>
                                 <td>
                                     <a href="<?php echo base_url("admin/Change_room/index/$value->check_in_id");?>" class="btn btn-success btn-sm">Change Room</a>
                                     <a href="<?php echo base_url("admin/Check_in/check_out/$value->guest_code");?>" class="btn btn-warning btn-sm">Check-Out </a> 
                                 </td>
                                </tr>
                               <?php  $i++; }} ?> 
                        </tbody>                         
                      </table>
                    </div>
                </div><!--end panel-->    
            </div><!--end table -->
        </div>        
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<script>
    $(document).ready(function(){
        //data table
        $('#mydata').DataTable();
        //comfirm delete
        $('.del').confirmModal(); 
    });
</script>  
</body>
</html>

