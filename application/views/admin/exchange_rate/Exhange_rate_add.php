<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</nav>
	<div id="page-wrapper">
		<div class="container_fluid" style="margin-top:40px;">
		<div class="row">
			<div class="col-lg-12">		
				<?php echo form_open("admin/Exchange_rate/add_value" ,"id='form' name='form'");?>		
				<h1 class="page-header">Form Exchange Rate</h1>				
				<div class="panel panel-primary">
					<div class="panel-body">
							<div class="col-lg-12">
								<div class="row">
									<div class="panel panel-heading">
										<h3><b>Conterter</b></h3>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="row" style="margin-top:5px">
		            						<div class="col-lg-12">
		            							<div clas="row">
            										<div class="col-lg-3">
            											<label>Amount</label>
				            							<input type="number" placeholder="Enter amount" class="form-control input-sm" name="txtAmount" id="txtAmount">
            										</div>
            										<div class="col-lg-3">
            											<label>From</label>	
				            							<select name="ddlFrom" class="form-control" id="ddlFrom">
				            								<option value="">Select Corrency </option>
				            								<option value="dollar">Dollar</option>
				            								<option value="riels">Riels</option>
				            								<option value="baht">Baht</option>
				            							</select>
		            								</div>
		            								<div class="col-lg-3">
            											<label>To</label>
				            							<select class="form-control" name="ddlTo" id="ddlTo">
				            								<option value="">Select Corrency </option>
				            								<option value="dollar">Dollar</option>
				            								<option value="riels">Riels</option>
				            								<option value="baht">Baht</option>
				            							</select>
            										</div>	
            										<div class="col-lg-3">
            											<label>Value</label>
				            							<input type="number" placeholder="Enter value" class="form-control input-sm" name="txtvalue" id="txtvalue">
		            								</div>
		            							</div> <!-- <dollar> -->
		            						</div>
		            					</div>
									</div>
								</div>
								<div class="col-lg-12" style="margin-top:20px">
									<div class="pull-right">
										<a href="<?php echo site_url("admin/Check_in");?>" class="btn btn-success">Add</a>											
										<a href="<?php echo site_url("admin/Check_in");?>" class="btn btn-default"> Close</a>												
									</div>
								</div>
                            </div>
						</div>
					</div>
				</div>
				<?php echo form_close()?>
		</div>
	</div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script>
	$("#btnCancel").click(function(){
    	window.location.assign("<?php if(isset($cancel)){echo base_url($cancel);}?>");
	});
</script> 
