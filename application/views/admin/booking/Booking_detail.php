<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</nav>
	<div id="page-wrapper">
		<div class="container_fluid" style="margin-top:40px;">
		<div class="row">
			<div class="col-lg-12">				
				<h1 class="page-header">Form Booking Detail</h1>				
				<div class="panel panel-primary">
					<div class="panel panel-body">
							 <div class="col-lg-5">
							 	<div class="row">
							 		<div class="panel panel-heading">
									    <h3 class="panel-title">Guest Information</h3>
								    </div>
							 	</div>
									<div class="row">
										<div class="col-lg-6"><b>Guest Name</b></div>
										<div class="col-lg-6"><?php if(isset($guest_detail->guest_name)){echo $guest_detail->guest_name;} ?></div>
									</div>
									<div class="row">
										<div class="col-lg-6"><b>Gender</b></div>
										<div class="col-lg-6"><?php if(isset($guest_detail->gender)){ echo $guest_detail->gender='0'?'Mele':'Female';} ?></div>
									</div>
									<div class="row">
										<div class="col-lg-6"><b>Phone</b></div>
										<div class="col-lg-6"><?php if(isset($guest_detail->phone)){echo $guest_detail->phone;} ?></div>
									</div>
									<div class="row">
										<div class="col-lg-6"><b>Email</b></div>
										<div class="col-lg-6"><?php if(isset($guest_detail->email)){echo $guest_detail->email;} ?></div>
									</div>
									<div class="row">
										<div class="col-lg-6"><b>Location</b></div>
										<div class="col-lg-6"><?php if(isset($guest_detail->loc_name)){echo $guest_detail->loc_name;} ?></div>
									</div>
									<div class="row">
										<div class="col-lg-6"><b>Country</b></div>
										<div class="col-lg-6"><?php if(isset($guest_detail->coun_name)){echo $guest_detail->coun_name;} ?></div>
									</div>
									<div class="row">
										<div class="col-lg-6"><b>Address</b></div>
										<div class="col-lg-6"><?php if(isset($guest_detail->address)){echo $guest_detail->address;} ?></div>
									</div>
								<hr>
                            </div>
							<div class="col-lg-7">
								<div class="row">
									<div class="panel panel-heading">
										<h3 class="panel-title">Booking Information</h3>
									</div>
								</div>
								<?php 
								foreach ($detail as $value) {
								?>
								<div class="row">
									<div class="col-lg-3"><b>Room Name:</b></div>
									<div class="col-lg-2"><?php if(isset($value->room_name)){ echo $value->room_name;}?></div>
								</div>
								<div class="row">
								 	<div class="col-lg-6">
								 		<img style="width:400px" class="img-responsive img-thumbnail" src="<?php if(isset($value->photo)){echo base_url('assets/uploads/'.$value->photo);}?>"/>
								 	</div>
								</div>
								<div class="row">
									<div class="col-lg-3"><b>Room Type:</b></div>
									<div class="col-lg-6"><?php if(isset($value->room_type_name)){ echo $value->room_type_name;}?></div>
								</div>
								<div class="row">
									<div class="col-lg-3"><b>Price / Night:</b></div>
									<div class="col-lg-6"><?php if(isset($value->price)){ echo $value->price;}?> $</div>
								</div>
								<div class="row">
									<div class="col-lg-3"><b>Qty People:</b></div>
									<div class="col-lg-6"><?php if(isset($value->quantity_people)){ echo $value->quantity_people;}?></div>
								</div>
								<div class="row">
									<div class="col-lg-3"><b>Check-In:</b></div>
									<div class="col-lg-6"><?php if(isset($value->check_in)){ echo $value->check_in;}?></div>
								</div>
								
								<div class="row">
									<div class="col-lg-3"><b>Check-Out:</b></div>
									<div class="col-lg-6"><?php if(isset($value->check_out)){ echo $value->check_out;}?></div>
								</div>
								<div class="row">
									<div class="col-lg-3"><b>Remark</b></div>
									<div class="col-lg-6"><?php if(isset($value->remark)){ echo $value->remark;}?></div>
								</div><hr>
							<?php } ?>
                            </div>
                               <a href="<?php echo site_url("admin/Booking");?>" class="btn btn-default fa fa-close"> Close</a>											
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
