</nav>
<div class="container-fluid" style="margin-top:85px;" ng-app="myApp" ng-controller="myCtrl" ng-cloak>	
	<form action="<?php echo base_url("admin/Check_in/add_check_in")?>" name="form" id="form" method="post">
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
	    			<div class="row">
	    				<div class="col-lg-12">
			    			
			    		</div> <!-- col-lg-12 -->
	    			</div>	<!-- row -->						
	    		</div> <!-- col-lg-2 -->
	    		<div class="col-lg-10">
					<div class="row">
						<div class="col-lg-6">
							<div class="panel panel-primary">
								 <div class="panel-heading">
								    <h3 class="panel-title fa fa-users"> <b>Guest Information</b> >  Step 1: you enter guest information</h3>
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
								    	<div class="col-lg-3"> 
								    		<label>Gender</label>
								    		<select class="form-control input-sm" ng-model="gender" name="gender">
								    			<option value="">Choose One</option>
								    			<option value="1">Male</option>
								    			<option value="0">Female</option>
								    		</select>
								    	</div>
								    	<div class="col-lg-3">
								    		<label>Qty People</label>
								    		<input type="number" name="QtyPeople" placeholder="Quantity People" class="form-control input-sm" ng-model="QtyPeople">
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
									    	<input type="number" name="txtAge" id="txtAge" placeholder="Guest Age" class="form-control input-sm">
								    	</div>
								    </div>
								    <div class="row">
								    	<div class="col-lg-6"> 
									    	<label>location</label>
									    	<select class="form-control input-sm" name="location">
								    			<option value="">Choose One</option>
								    			<?php if(isset($loc_info)){
								    				foreach ($loc_info as $value) {
												?>

								    			<option value="<?php echo $value->loc_name;?>"><?php echo $value->loc_name; ?></option>
								    			<?php }}?>
								    		</select>
								    	</div>
								    	<div class="col-lg-6"> 
								    		<label>Country</label>
								    		<select ng-model="country" class="form-control input-sm" name="country">
								    			<option value="">Choose One</option>>
								    			<?php if(isset($coun_info)){
								    				foreach ($coun_info as $value) {?>
								    				<option value="<?php echo $value->coun_name; ?>"><?php echo $value->coun_name; ?></option>
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
						      					<?php echo form_input(array("name"=>"txtCheckIn","id"=>"txtCheckIn","value"=>set_value("txtEndDate"),"ng-click"=>"load_room()","class"=>"form-control datetimepicker input-sm","placeholder"=>"check-in"));?>		      											      					                                         		                                          
		                                        <span class="input-group-addon">
		                                            <span class="glyphicon glyphicon-calendar"></span>
		                                        </span>                                
                                    		</div>			        					        						        						        	
							        	</div>
								    	<div class="col-md-6">
								    		<label class="control-label">Check Out</label>
						      				<div class="input-group datetimepicker">
						      					<?php echo form_input(array("name"=>"txtCheckOut","id"=>"txtCheckOut","ng-click"=>"load_room()","value"=>set_value("txtEndDate"),"class"=>"form-control datetimepicker input-sm","placeholder"=>"check-out date"));?>		      											      					                                         		                                          
		                                        <span class="input-group-addon">
		                                            <span class="glyphicon glyphicon-calendar"></span>
		                                        </span>                                
                                    		</div>			        					        						        						        	
							        	</div>
								    </div>
								    <div class="row">
								    	<div class="col-lg-12"> 
									    	<label>Address</label>
									    	<textarea class="form-control input-sm" name="addr" ng-model="addr" placeholder="Enter Address .." style="height:50px"></textarea>
								    	</div>
								    </div>
							  	</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="panel panel-primary">
							  <div class="panel-heading">
							  	<h3 class="panel-title fa fa-list-ul"> <b>Room Listing </b>> Step 2: you clike to choose room</h3>
							  </div>
							   <div class="panel-body" style="overflow: scroll; height:419px">
							    <div class="row">
							    	<div class="col-lg-4" ng-repeat="x in get_room" ng-click="ckeck_in(x.Id,x.Room_name,x.Price,x.Room_type_name)">
							    		<a href="">
							    			<h6>
								    			<div class="panel panel-primary text-center" style="height:150px">
													{{x.Room_name}}<i style="color:#d67e02">{{x.Status}}</i>
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
							    <h3 class="panel-title"><b>Booking Listing</b> > Step3: you click booking to book room</h3>
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
											    				</tr>
											    			</thead>
											    			<tbody>
											    				<tr ng-repeat="x in room_booking track by $index">
											    					<input type="hidden" value="{{x[1]}}" name="room_id" id="room_id">
											    					<td>{{$index+1}}</td>
											    					<td>{{x[2]}}</td>
											    					<td>{{x[3]}}</td>
											    					<td>{{x[5]}}</td>
											    					<td>{{x[4]}} $</td>
											    					<td>{{x[6]}} </td>
											    					<td>{{x[7]}} </td>
											    				</tr>
											    			</tbody>
											    			<input ng-repeat="x in room_booking" type="hidden" value="{{x[0]}}" name="txtRoom_id">
											    		</table>
												    </div>
												</div>
											</div>
								    		<div class="pull-right">
								    			<input type="hidden" id="str" name="str" value="">
								    			<button class="btn btn-success btn-sm " type="button" ng-click="add_booking()" id="btnPrint" name="btnCheck-In"><i class="fa fa-address-book" aria-hidden="true"></i>Check-In</button>									    			
								    			<a href="<?php echo base_url()?>admin/Check_in" class="btn btn-default btn-sm"><i class="fa fa-close"></i> Cancel</a>
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
		var i=0,j=0,total = 0,discountRate = 0;
		var txt = "";
		$scope.room_type = function(value)
		{	
		$http.get("<?php echo base_url()?>ng/load_room_type.php?id="+value)
		.then(function (response) {$scope.get_room =response.data.records;});	
		}
		$scope.validation=function()
		{	var c_in = document.getElementById("txtCheckIn").value;
			var c_out = document.getElementById("txtCheckOut").value;
			if(
				($scope.txtGuestName==undefined || $scope.txtGuestName=="")||
	    		($scope.gender==undefined || $scope.gender=="")||
	    		($scope.txtEmail==undefined || $scope.txtEmail=="")||
	    		($scope.txtPhone==undefined || $scope.txtPhone=="")||
	    		(c_in==undefined || c_in=="") ||
	    		(c_out==undefined || c_out=="")
			){ return false;}else{ return true;}
		}
		$scope.load_room=function()
		{	
			var c_in = document.getElementById("txtCheckIn").value;
			var c_out = document.getElementById("txtCheckOut").value;
			if(c_in!="" & c_out!=""){	
				$http.get("<?php echo base_url()?>ng/check_in_status.php?check_in="+c_in+"&check_out="+c_out)
				.then(function (response) {$scope.get_room =response.data.records;});	
			}
		}

		$scope.all_room=function()
		{
			$http.get("<?php echo base_url()?>ng/get_room.php")
			.then(function (response) {$scope.get_room = response.data.records;});	
		}
	    $scope.ckeck_in = function(room_id,room_name,price,room_type_name)
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
	    		){$scope.msg_error=true; $scope.msg="Enter guest information.....!"
	    	}else{	
				$http.get("<?php echo base_url()?>ng/check_room_status.php?check_in="+c_in+"&check_out="+c_out+"&room_id="+room_id)
				.then(function (response)
				{	var check_room = response.data.records;
					if(check_room==false)
					{
				   		arr[i] = [];
				    	arr[i][1] = room_id;
				    	arr[i][2] = $scope.txtGuestName;
				    	arr[i][3] = room_name;
				    	arr[i][4] = price;
				    	arr[i][5] = room_type_name;
				    	arr[i][6] = c_in ;
				    	arr[i][7] = c_out ;
				    	arr[i][8] = $scope.QtyPeople;
			    		$scope.room_booking = arr;
			    	}else{$scope.msg_error=true; $scope.msg=" This room check-in aldready"}
			    	
				});
	    	}
	    }

	    $scope.removeItem = function(index,val,type)
	    {	alert("0");
	    	if(index!==undefined)
	    	{
	    		alert("1");
	    		if(type=="remove")
	    		{
	    			alert("2");
	    			$scope.menuDetail.splice(index,1);
	    			i = i-1;
	    			total = total - val;
	    			$scope.Total = total;
	    		}else
	    		{
	    			alert("3");
	    			var xmlhttp = new XMLHttpRequest();
			        xmlhttp.open("GET", "../../<?php echo base_url()?>ng/cancelOrdered.php?id=" + val, true);
			        xmlhttp.send();
	    			$scope.ordered.splice(index,1);	
	    		}
	    	}
	    }
	    
	    $scope.viewComment = function(comment)
	    {
	    	$scope.selectedComment = comment;
	    }

	   $scope.add_booking = function()
        {
          if($scope.validation()==true){
	          	$('#str').val(JSON.stringify(arr));
	            document.getElementById("form").submit();
	        }else{ $scope.msg_error=true; $scope.msg="Enter guest informatiocccn";}
        }
	});
</script>