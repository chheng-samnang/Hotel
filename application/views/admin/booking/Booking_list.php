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
              <a href="<?php echo base_url("admin/Booking/add");?>" class="btn btn-success">New Booking</a>
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
                            <th>Booking Code</th>
                            <th>Guest Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                              <?php $i=1; if(isset($booking_list)){
                                foreach ($booking_list as $value) { 
                               ?>
                                <tr>
                                 <td><?php echo $i; ?></td>  
                                 <td><a href="<?php echo base_url("admin/Booking/booking_detail/$value->book_id");?>"><?php echo $value->booking_code; ?></a></td>
                                 <td><?php echo $value->guest_name; ?></td>
                                 <td><?php echo $value->phone; ?></td>
                                 <td><?php echo $value->email; ?></td>
                                 <td><?php echo $value->check_in; ?></td>
                                 <td><?php echo $value->check_out; ?></td>
                                 <td><a href="<?php echo base_url("admin/Check_in/check_booking/$value->book_id");?>" class="btn btn-success">To Check-In</a></td>
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

