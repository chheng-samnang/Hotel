</nav>
<div class="container-fluid" style="margin-top:15px;" ng-app="myApp" ng-controller="myCtrl" ng-cloak>	
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1>Form Booking</h1>
			</div>
		</div>
	</div>
	<form action="<?php echo base_url("admin/Booking/add_value")?>" name="form" id="form" method="post">
	<div class="row">
		<div class="col-lg-12">
			<div class="row" >
	    		<div class="col-lg-2">
	    			<div class="row">
	    				<div class="col-lg-12">
	    					<div class="list-group">
								  <a href="#" class="list-group-item active" >
									<b>Room Type</b>
								  </a>
								  <a href="#" class="list-group-item" ng-click="all_room()">
									All
								  </a>	
								  <?php 
								  if(isset($room_type)){foreach ($room_type as $value){?>
								  <a href="" class="list-group-item" ng-click="room_type(<?php echo $value->room_type_id;?>)"><?php echo $value->room_type_name; ?></a>
								 <?php }}?>
							</div>
	    				</div>
	    			</div> <!-- row -->
	    		</div> <!-- col-lg-2 -->
	    		<div class="col-lg-10">
					<div class="row">
						<div class="col-lg-6">
							<div class="panel panel-primary">
								 <div class="panel-heading">
								    <h3 class="panel-title fa fa-users"><b> Guest Information</b> >  Step 1 you enter guest information</h3>
								</div>
							  	<div class="panel-body">
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
							  		<div class="row">
							  			<div class="col-lg-12">
		                                  <span ng-show="msg_error"> 
		                                    <div class="alert alert-warning" role="alert">
		                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                                        <span aria-hidden="true">&times;</span>
		                                        </button>
		                                        <strong>Warning!</strong>{{msg}}
		                                    </div>
		                                  </span>
		                                </div><!--====End error msg ===-->
							  		</div>
								    <div class="row">
								    	<div class="col-lg-6"> 
									    	<label>Guest Name</label>
									    	<input type="text" placeholder="Guest Name" ng-model="txtGuestName" class="form-control input-sm" name="txtGuestName">
								    	</div>
								    	<div class="col-lg-6"> 
								    		<label>Gender</label>
								    		<select class="form-control input-sm" ng-model="gender" name="gender">
								    			<option value="">Choose One</option>
								    			<option value="1">Male</option>
								    			<option value="0">Female</option>
								    		</select>
								    	</div>
								    </div>
								    <div class="row">
								    	<div class="col-lg-6"> 
									    	<label>location</label>
									    	<select class="form-control input-sm" name="location">
								    			<?php if(isset($loc_info)){
								    				foreach ($loc_info as $value) {
												?>
								    			<option value="<?php echo $value->loc_id;?>"><?php echo $value->loc_name; ?></option>
								    			<?php }}?>
								    		</select>
								    	</div>
								    	<div class="col-lg-6"> 
								    		<label>Country</label>
								    		<select ng-model="country" class="form-control input-sm" name="country">
								    			<option value="">Choose One</option>>
								    			<?php if(isset($coun_info)){
								    				foreach ($coun_info as $value) {?>
								    				<option value="<?php echo $value->coun_id; ?>"><?php echo $value->coun_name; ?></option>
								    			<?php }} ?>
								    		</select>
								    	</div>
								    </div>
								    <div class="row">
								    	<div class="col-lg-6"> 
									    	<label>Phone</label>
									    	<input type="number" class="form-control input-sm" placeholder="phone number..." ng-model="txtPhone" name="txtPhone">
								    	</div>
								    	<div class="col-lg-6"> 
								    		<label>Email</label>
								    		<input type="text" class="form-control input-sm" placeholder="email..." ng-model="txtEmail" name="txtEmail">
								    	</div>
								    </div>
								    <div class="row">
								    	<div class="col-md-6">
								    		<label class="control-label">Check In</label>
						      				<div class="input-group datetimepicker"> 
						      					<?php echo form_input(array("name"=>"txtCheckIn","id"=>"txtCheckIn","ng-model"=>"txtCheckIn","ng-click"=>"check_room()","class"=>"form-control datetimepicker input-sm","placeholder"=>"check-in"));?>		      											      					                                         		                                          
		                                        <span class="input-group-addon">
		                                            <span class="glyphicon glyphicon-calendar"></span>
		                                        </span>                                
                                    		</div>			        					        						        						        	
							        	</div>
								    	<div class="col-md-6">
								    		<label class="control-label">Check Out</label>
						      				<div class="input-group datetimepicker">
						      					<?php echo form_input(array("name"=>"txtCheckOut","id"=>"txtCheckOut","ng-model"=>"txtCheckOut","class"=>"form-control datetimepicker input-sm","ng-click"=>"check_room(2)","placeholder"=>"check-out date"));?>		      											      					                                         		                                          
		                                        <span class="input-group-addon">
		                                            <span class="glyphicon glyphicon-calendar"></span>
		                                        </span>                                
                                    		</div>			        					        						        						        	
							        	</div>
								    </div>
								    <div class="row">
								    	<div class="col-lg-6">
								    		<label>Quantity People</label>
								    		<input type="text" name="QtyPeople" placeholder="Quantity People" class="form-control input-sm" ng-model="QtyPeople">
								    	</div>
								    	<div class="col-lg-6"> 
									    	<label>Address</label>
									    	<textarea class="form-control input-sm" name="addr" ng-model="addr" placeholder="Enter Address .." style="height:100px"></textarea>
								    	</div>
								    </div>
							  	</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="panel panel-primary">
							  <div class="panel-heading">
							  	<h3 class="panel-title fa fa-list-ul"> <b>Room Listing</b> > Step 2 you clike to choose room</h3>
							  </div>
							  <div class="panel-body">
							    <div class="row">
							    	<div class="col-lg-4" ng-repeat="x in get_room" ng-click="book(x.Id,x.Room_name,x.Price,x.Room_type_name)">
							    		<a href="">
							    			<h6>
								    			<div class="panel panel-primary text-center" style="height:144px">
													{{x.Room_name}}   <i style="color:#d67e02"></i>
									    			<img style="height:80%;" class="img-responsive img-thumbnail" src="<?php echo base_url()?>assets/uploads/{{x.Photo}}">
									    			{{x.Price}}$
									    		</div>
							    			</h6>
							    		</a>
							    	</div>
							    </div>
							  </div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-primary">
							  <div class="panel-heading">
							    <h3 class="panel-title fa fa-tasks"> <b>Booking Listing</b>> Step 3: you click button booking to book room</h3>
							  </div>
								  <div class="panel-body">
								    <div class="row">
								    	<div class="col-lg-12">
								    		<div>
											  <!-- Nav tabs -->
											  <!-- Tab panes -->
											  <div ng-repeat="x in check_room">{{x.Booking_code}}</div>
												<div class="tab-content">
												    <div role="tabpanel" class="tab-pane active" id="home">
												    	<table class="table table-striped">
											    			<thead>
											    				<tr>
											    					<th>No.</th>
											    					<th>Guest Name</th>
											    					<th>Room Name</th>
											    					<th>Room Type</th>
											    					<th>Price</th>
											    					<th>Check In</th>
											    					<th>Check Out</th>
											    					<th>Action</th>
											    				</tr>
											    			</thead>
											    			<tbody>
											    				<tr ng-repeat="x in room_booking track by $index">
											    					<td>{{$index+1}}</td>
											    					<td>{{x[1]}}</td>
											    					<td>{{x[2]}}</td>
											    					<td>{{x[4]}}</td>
											    					<td>{{x[3]}} $</td>
											    					<td>{{x[5]}} </td>
											    					<td>{{x[6]}} </td>
											    					<td><a ng-click="remove($index,x[1],x[2])" style="cursor:pointer;">Remove</a></td>							    	
											    				</tr>
											    			</tbody>
											    		</table>
												    </div>
												</div>
											</div>
								    		<div class="pull-right">
								    			<input type="hidden" id="str" name="str" value="">
								    			<input type="button" value="Booking" class="btn btn-success btn-sm" ng-click="add_booking()" name="btnCheck-In">
								    			<a href="<?php echo base_url("admin/Booking")?>" class="btn btn-default btn-sm"><i class="fa fa-close"></i> Cancel</a>
								    		</div>
							    		</div> <!-- col-lg-12 -->
							    	</div>
							  	</div> <!-- panel-body -->
							</div> <!-- panel panel-primary -->
						</div> <!-- col-lg-10 col-lg-offset-2 -->
					  </form>
					</div> <!-- row -->
	    		</div> <!-- col-lg-10 -->
			</div> <!-- row -->
		</div> <!-- col-lg-12 -->
	</div> <!-- row -->
</div> <!-- container-fluid -->
<script type="text/javascript" src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script type="text/javascript">
	var app = angular.module('myApp',[]);
	app.controller('myCtrl',function($scope,$http){

		$http.get("<?php echo base_url()?>ng/get_room.php")
		.then(function (response) {$scope.get_room = response.data.records;});
		var arr = [];
		var arr1 =[];
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

		$scope.validation=function()
		{
			var c_in = document.getElementById("txtCheckIn").value;
			var c_out = document.getElementById("txtCheckOut").value;
			if(
				($scope.txtGuestName==undefined || $scope.txtGuestName=="")||
				($scope.gender==undefined || $scope.gender=="")||
				($scope.txtEmail==undefined || $scope.txtEmail=="")||
				($scope.txtPhone==undefined || $scope.txtPhone=="")||
				(c_in==undefined || c_in=="") ||
				(c_out==undefined || c_out=="")
			)
			{return false;}else{ return true;}
		}

	    $scope.book = function(room_id,room_name,price,room_type_name)
	    {		
	    	$scope.room_name=room_name;
    		var c_in = document.getElementById("txtCheckIn").value;
			var c_out = document.getElementById("txtCheckOut").value;
	    	if(	$scope.validation()==false){$scope.msg_error=true; $scope.msg="Enter guest information"}
    		else
    		{	
				$http.get("<?php echo base_url()?>ng/room_status.php?check_in="+c_in+"&check_out="+c_out+"&room_id="+room_id)
				.then(function (response)
				{	
				    var check_room = response.data.records;
					if(check_room==false)
					{
						var result = arr1.indexOf(room_id);
			            arr1[i] = room_id;
			            if(result==-1)
			            {	
				    		arr[i] = [];
					    	arr[i][0] = room_id;
					    	arr[i][1] = $scope.txtGuestName;
					    	arr[i][2] = room_name;
					    	arr[i][3] = price;
					    	arr[i][4] = room_type_name ;
					    	arr[i][5] = c_in ;
					    	arr[i][6] = c_out ;
					    	arr[i][7] = $scope.QtyPeople;
					    	total = total + ((price*$scope.Qty)-arr[i][4]);	
				    		$scope.Total = total;	
				    		i = i+1;
				    		$scope.room_booking = arr;
			    		}else{$scope.msg_error=true; $scope.msg=" This room select aldready"}
					}else{$scope.msg_error=true; $scope.msg=" This room booking aldready"}
				});
	    	}
	    }

	    $scope.remove=function(index,des_add){
            if(index!==undefined)
            {
                $scope.room_booking.splice(index,1);
                i = i-1;
            }
        }

	   $scope.add_booking = function()
        {
          if($scope.validation()==true){
          	$('#str').val(JSON.stringify(arr));
           	document.getElementById("form").submit();
          }else{$scope.msg_error=true; $scope.msg="Enter guest information"}
        }
	});
</script>