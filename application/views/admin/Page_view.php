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
            <div class="col-lg-2">
                <a href="<?php if(isset($action_url)){echo base_url($action_url[0]);}?>" class="btn btn-success" style="margin-bottom:5px;">Add <?php if(isset($page_header)){echo $page_header;}?></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12"><!--table-->                        
                <div class="panel panel-primary"><!--panel-->
                    <div class="panel-heading"><?php if(isset($pageHeader)){echo $pageHeader;}?> Information</div>
                    <div class="panel-body table-responsive">
                        <table class="table table-hover" id="mydata">
                        <thead>
                            <tr>
                                <?php if(isset($tbl_hdr))
                                {
                                    echo "<th>No.</th>";
                                    foreach($tbl_hdr as $th){echo "<th>".$th."</th>";}
                                    echo "<th>Action</th>";
                                }?>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;if(!empty($tbl_body[0])){foreach($tbl_body as $body)
                            {
                                echo "<tr>";                                    
                                    echo "<td>".$i."</td>";
                                    $j=0;
                                    foreach($tbl_hdr as $th)
                                    {
                                        echo "<td>".$body[$j]."</td>";
                                        $j++;
                                    }
                                    echo "<td>";
                            ?>
                                        <?php if(isset($action_url[3])){ ?><a href="<?php if(isset($action_url)){echo base_url($action_url[3]).'/'.$body[$j];}?>" class="btn btn-warning" style="margin-right:5px">Change Password</a><?php }?>
                                        <a href="<?php if(isset($action_url)){echo base_url($action_url[1]).'/'.$body[$j];}?>" class="btn btn-primary" style="margin-right:5px"> <i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="<?php if(isset($action_url)){echo base_url($action_url[2]).'/'.$body[$j];}?>" class="btn btn-danger btn-large confirModal del" data-confirm-title="Confirm Delete !" data-confirm-message="Are you sure you want to Delete this ?"> <i class="glyphicon glyphicon-trash"></i></a>
                            <?php
                                    echo "</td>";                                    
                                echo "</tr>";
                            $i++;}}?>                            
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

