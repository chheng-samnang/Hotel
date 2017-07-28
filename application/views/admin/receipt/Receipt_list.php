<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Form Receipt</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row"><!--add and search-->
            <div class="col-lg-2" style="margin-bottom:10px">
            <!-- <a href="<?php echo base_url("admin/Receipt/trash");?>" class="btn btn-success">Trash</a> -->
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
                            <th>Receipt Number</th>
                            <th>Guest Name</th>
                            <th>Room Name</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>Action</th>
                        ​​​​​​​​​​  </tr>
                        </thead>
                        <tbody>
                              <?php $i=1; if(isset($receipt_list)){
                                foreach ($receipt_list as $value){ 
                               ?>
                                <tr>
                                 <td><?php echo $i; ?></td>  
                                 <td><?php echo $value->receipt_num; ?></td>
                                 <td><?php echo $value->guest_name; ?></td>
                                 <td><?php echo $value->room_name; ?></td>
                                 <td><?php echo $value->check_in; ?></td>
                                 <td><?php echo $value->check_out; ?></td>
                                  <td>
                                     <a href="<?php echo base_url("admin/Receipt/view/$value->pay_id");?>" class="btn btn-success btn-sm">View Receipt</a>
                                     <!-- <a href="<?php echo base_url("admin/Check_in/trash/$value->pay_id");?>" class="btn btn-danger btn-sm">Trash</a>  -->
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

