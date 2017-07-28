<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</nav>
	<div id="page-wrapper">
		<div class="container_fluid" style="margin-top:40px;">
		<div class="row">
			<div class="col-lg-12">				
				<h1 class="page-header">Form Room Detail</h1>				
				<div class="panel panel-primary">
					<div class="panel panel-body">
						<div class="panel-heading">
						<h3 class="panel-title">Room Information</h3>
					</div>	
							 <div class="col-lg-6">
                                <img class="img-responsive img-thumbnail" src="<?php if(isset($detail->photo)){echo base_url('assets/uploads/'.$detail->photo);}?>"/>
                            </div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-6"><b>Room Name:</b></div>
									<div class="col-lg-6"><?php if(isset($detail->room_name)){ echo $detail->room_name;}?></div>
								</div>
								<div class="row">
									<div class="col-lg-6"><b>Price / Night:</b></div>
									<div class="col-lg-6"><?php if(isset($detail->price)){ echo $detail->price;}?></div>
								</div>
								<div class="row">
									<div class="col-lg-6"><b>Room Type:</b></div>
									<div class="col-lg-6"><?php if(isset($detail->room_type_name)){ echo $detail->room_type_name;}?></div>
								</div>
								<div class="row">
									<div class="col-lg-6"><b>Reason Price:</b></div>
									<div class="col-lg-6"><?php if(isset($detail->remark)){ echo $detail->remark;}?></div>
								</div>
								<div class="row">
									<div class="col-lg-6"><b>Room Status:</b></div>
									<div class="col-lg-6"><?php if(isset($detail->status)){ echo $detail->status;}?></div>
								</div>
								<div class="row">
									<div class="col-lg-6"><b>Maximum People:</b></div>
									<div class="col-lg-6"><?php if(isset($detail->maximum_people)){ echo $detail->maximum_people;}?></div>
								</div>
								<div class="row">
									<div class="col-lg-6"><b>Room Desctiption</b></div>
									<div class="col-lg-6"><?php if(isset($detail->desc)){ echo $detail->desc;}?></div>
								</div><hr>
                                <a href="<?php echo site_url($cancel);?>" class="btn btn-default fa fa-close"> Close</a>
                            </div>											
					</div>
					</div>
					
				</div>
				<?php echo form_close()?>
			</div>
		</div>
	</div>
</div>

<script>
	$("#btnCancel").click(function(){
    	window.location.assign("<?php if(isset($cancel)){echo base_url($cancel);}?>");
	});
</script> 
