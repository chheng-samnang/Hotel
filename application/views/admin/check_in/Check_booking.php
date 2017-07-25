</nav>
<div class="container-fluid" style="margin-top:85px;" ng-app="myApp" ng-controller="myCtrl" ng-cloak>	
	<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
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
								<strong>Attention!</strong><?php if(!empty($error)){echo $error;}if(validation_errors()){echo validation_errors();}?>
							</div>
						<?php }?>
					</div>
				</div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Form Check-In</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <form action="<?php echo base_url("admin/Check_in/add_check_in_booking")?>" name="form" id="form" method="post">
	        <div class="row">
	            <div class="col-lg-12"><!--table-->                        
	               <div class="panel panel-primary">
					  	<div class="panel-body">
					  		<div class="col-lg-6">
							    <div class="row">
							    	<div class="panel page-header">
					  				<h2 class="panel-title fa fa-users"><b> Guest Information</b></h2>
					  				</div>
							    	<div class="col-lg-6"> 
								    	<label>Guest Name</label>
								    	<input type="text" name="txtGuestName" id="txtGuestName"  value="<?php if(isset($guest_detail->guest_name)){echo $guest_detail->guest_name;} ?>" placeholder="Guest Name" class="form-control input-sm">
							    	</div>
							    	<div class="col-lg-6"> 
							    		<label>Gender</label>
							    		<?php foreach ($booking_detail as $value){
							    			$gender=$value->gender;
							    			$location=$value->loc_id;
							    			$country=$value->coun_id;
							    		} ?>
							    		<select class="form-control input-sm" name="gender">
							    			<option value="">Choose One</option>
							    			<option <?php if($gender=="1"){ echo "selected";}?> value="1">Male</option>
							    			<option <?php if($gender=="0"){ echo "selected";}?> value="o">Female</option>
							    		</select>
							    	</div>
							    </div>
							    <div class="row">
							    	<div class="col-md-6">

							    		<label>National</label>
								    	<input type="text" name="txtNational" id="txtNational" placeholder="National" class="form-control input-sm">
							    	</div>
							    	<div class="col-md-6">
							    		<label>Visa</label>
								    	<input type="text" name="txtVisa" id="txtVisa" placeholder="Visa Card" class="form-control input-sm">
							    	</div>
							    </div>
							    <div class="row">
							    	<div class="col-md-6">
							    		<label>Passport</label>
								    	<input type="text" name="txtPassport" id="txtPassport" placeholder="Passport" class="form-control input-sm">
							    	</div>
							    	<div class="col-md-6">
							    		<label>Age</label>
								    	<input type="text" ng-model="txtAge" ng_inet="txtAge" name="txtAge" id="txtAge" placeholder="Guest Age" class="form-control input-sm">
							    	</div>
							    </div>
							    <div class="row">
							    	<div class="col-lg-6"> 
								    	<label>location</label>
								    	<select class="form-control input-sm" name="location">
								    	<?php var_dump($loc_info); ?>
								    		<option value="">Chose One</option>
							    			<?php if(isset($loc_info)){ 
							    				foreach ($loc_info as $value){ ?>
							    				<option value="<?php echo $value->loc_name;?>" <?php echo $location==$value->loc_id?"selected":"";?> ><?php echo $value->loc_name; ?></option>
							    			<?php }}?>
							    		</select>
							    	</div>
							    	<div class="col-lg-6"> 
							    		<label>Country</label>
							    		<select class="form-control input-sm" name="country">
							    				<option value="">Choose One</option>
							    			<?php if(isset($coun_info)){
							    				foreach ($coun_info as $value) {?>
							    				<option value="<?php echo $value->coun_name; ?>" <?php echo $country==$value->coun_id?"selected":"";?> ><?php echo $value->coun_name; ?></option>
							    			<?php }} ?>
							    		</select>
							    	</div>
							    </div>
							    <div class="row">
							    	<div class="col-lg-6"> 
								    	<label>Phone</label>
								    	<input type="number" value="<?php if(isset($guest_detail->phone)){ echo $guest_detail->phone; } ?>" class="form-control input-sm" placeholder="phone number..." name="txtPhone">
							    	</div>
							    	<div class="col-lg-6"> 
							    		<label>Email</label>
							    		<input type="text" value="<?php if(isset($guest_detail->email)){ echo $guest_detail->email; } ?>" class="form-control input-sm" placeholder="email..." name="txtEmail">
							    	</div>
							    </div>
							   
							    <div class="row">
							    	<div class="col-lg-12"> 
								    	<label>Address</label>
								    	<textarea class="form-control input-sm" name="addr"  placeholder="Enter Address .." style="height:81px"><?php if(isset($guest_detail->address)){ echo $guest_detail->address;} ?></textarea>
							    	</div>
							    </div>
					  		</div>
					  		<div class="col-lg-6">
					  			<div class="panel page-header">
					  				<h2 class="panel-title fa fa-users"><b> Booking Information</b></h2>
					  			</div>
					  			<div>
						  			<div class="row">
							  			<div class="col-lg-12" style="overflow:scroll; height:309px;width:102.5%;">
							  			<?php  foreach ($booking_detail as $value) {?>
							  				<div class="row">
							  					<div class="col-lg-6">
							  						<b>Room Name</b>
							  						<input type="hidden" name="book_id" value="<?php if(isset($value->book_id)){ echo $value->book_id;} ?>">
							  					</div>
							  					<div class="col-lg-6">
							  						<?php if(isset($value->room_name)){echo $value->room_name;} ?>
							  					</div>
							  				</div>
							  				<div class="row">
							  					<div class="col-lg-6">
							  						<b>Room Type</b>
							  					</div>
							  					<div class="col-lg-6">
							  						<?php if(isset($value->room_type_name)){echo $value->room_type_name;} ?>
							  					</div>
							  				</div>
							  				<div class="row">
							  					<div class="col-lg-6">
							  						<b>Price</b>
							  					</div>
							  					<div class="col-lg-6">
							  						<?php if(isset($value->price)){echo $value->price;}?> $
							  					</div>
							  				</div>
							  				<div class="row">
							  					<div class="col-lg-6">
							  						<b>Quanitity People</b>
							  					</div>
							  					<div class="col-lg-6">
							  						<?php if(isset($value->quantity_people)){ echo $value->quantity_people;}?>
							  					</div>
							  				</div>
							  				<div class="row">
							  					<div class="col-lg-6">
							  						<b>Check-In</b>
							  					</div>
							  					<div class="col-lg-6">
							  						<?php if(isset($value->check_in)){ echo $value->check_in; } ?>
							  					</div>
							  				</div>
							  				<div class="row">
							  					<div class="col-lg-6">
							  						<b>Check-Out</b>
							  					</div>
							  					<div class="col-lg-6">
							  						<input type="hidden" value="<?php if(isset($value->book_id)){echo $value->book_id;} ?>" name="txtBookId">
							  						<?php if(isset($value->check_out)){ echo $value->check_out; } ?>
							  					</div>
							  				</div><hr>
							  				<?php }?>
							  			</div>
							  			<div class="col-lg-12" style="margin-top:10px">
							  				<div class="pull-right">
							  					<button class="btn btn-default" ng-click="add_check_in">Check-In</button>
							  				<a href="<?php echo base_url("admin/Check_in");?>" class="btn btn-default">Cancel</a>
							  				</div>
							  			</div>
						  			</div>
					  			</div>
					  		</div>
						</div>  
	            	</div><!--end guet info -->
	            </div>
	        </div>    
	    </form>    
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
	</div>
</div> <!-- row -->
</div> <!-- container-fluid -->
<script type="text/javascript" src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script type="text/javascript">
	var app = angular.module('myApp',[]);
	app.controller('myCtrl',function($scope,$http){

		$http.get("<?php echo base_url()?>ng/get_room.php")
		.then(function (response) {$scope.get_room = response.data.records;});

		var arr = [];
		var i=0,j=0,total = 0,discountRate = 0;
		var txt = "";
		$scope.room_type = function(value)
		{	
		$http.get("<?php echo base_url()?>ng/load_room_type.php?id="+value)
		.then(function (response) {$scope.get_room =response.data.records;});	
		}
		$scope.all_room=function()
		{
			$http.get("<?php echo base_url()?>ng/get_room.php")
			.then(function (response) {$scope.get_room = response.data.records;});	
		}
		$scope.check_room=function()
		{
			var c_in = document.getElementById("txtCheckIn").value;
			var c_out = document.getElementById("txtCheckOut").value;
			$http.get("ng/room_status.php?check_in="+c_in+"&check_out="+c_out)
			.then(function (response) {$scope.order_hdr = response.data.records;});
		}		
	    $scope.add_check_in = function()
        {
           document.getElementById("form").submit();
        }

	});
</script>