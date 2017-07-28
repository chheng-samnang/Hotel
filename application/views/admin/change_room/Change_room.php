<style>
/* Style The Dropdown Button */
.dropbtn {
    background-color: #eee;
    
    font-size: 12px;
    padding:7px !Information
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #eee}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #a3ada4;
}
</style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	            	</div><!-- /.col-lg-12 -->
	        	</div>
	        	<?php echo form_open("admin/Change_room/change_room" ,"id='form' name='form'");?>
	        		<div class="row">
		            <div class="col-lg-12">
		                <h1 class="page-header">Form Change Room</h1>
		            </div>
		            <div class="col-lg-12">
		            	<div class="panel panel-primary">
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
		            			</div>
		            		</div>
		            		<?php
				 				if(isset($exchang_rate->value)){
				 					 $riels=$exchang_rate->value;
				 				}else{$riels=4000;}
				 			?>
		            		<div class="row">
		            			<div class="col-lg-5">
	            				 	<div class="panel panel-body">
	            				 		<div class="page-header"><b><h3>Guest Information</h3></b></div>
	            				 		<div class="row">
	            				 			<div class="col-lg-5"><h5>Guest Name</h5></div>
	            				 			<div class="col-lg-6"><h5>: <?php if($guest_info->guest_name){ echo $guest_info->guest_name; } ?></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<input type="hidden" value="<?php if(isset($guest_info->guest_code)){ echo $guest_info->guest_code;} ?>" id="guest_code" name="guest_code">
	            				 			<div class="col-lg-5"><h5>Gender</h5></div>
	            				 			<div class="col-lg-6"><h5>: <?php if(isset($guest_info->gender)){ echo $guest_info->gender==1 ? 'Male' : 'Female';} ?></h5></div>
	            				 		</div>	            				 		
	            				 		<div class="row">
	            				 			<div class="col-lg-5"><h5>Age</h5></div>
	            				 			<div class="col-lg-6"><h5>: <?php if($guest_info->age){ echo $guest_info->age; } ?></h5></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-5"><h5>Phone</h5></div>
	            				 			<div class="col-lg-6"><h5>: <?php if($guest_info->phone){ echo $guest_info->phone; } ?></h5></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-5"><h5>Email</h5></div>
	            				 			<div class="col-lg-6"><h5>: <?php if($guest_info->email){ echo $guest_info->email; } ?></h5></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-5"><h5>Visa Card</div>
	            				 			<div class="col-lg-6"><h5>: <?php if($guest_info->visa_num){ echo $guest_info->visa_num; } ?></h5></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-5"><h5>National Number</h5></div>
	            				 			<div class="col-lg-6"><h5>: <?php if($guest_info->national_num){ echo $guest_info->national_num; } ?></h5></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-5"><h5>Passport Number</h5></div>
	            				 			<div class="col-lg-6"><h5>: <?php if($guest_info->passport_num){ echo $guest_info->passport_num; } ?></h5></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-5"><h5>Country</h5></div>
	            				 			<div class="col-lg-6"><h5>: <?php if($guest_info->country){ echo $guest_info->country; } ?></h5></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-5"><h5>Location</h5></div>
	            				 			<div class="col-lg-6"><h5>: <?php if($guest_info->location){ echo $guest_info->location; } ?></h5></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-5"><h5>Address</h5></div>
	            				 			<div class="col-lg-6"><h5>: <?php if($guest_info->address){ echo $guest_info->address; } ?></h5></div>
	            				 		</div>
	            				 	</div>
		            			</div>
		            			<div class="col-lg-7">
		            				<div class="panel panel-body">
	            				 		<div class="page-header"><b><h3>Check-In Information</h3></b></div>
		            				 		<div class="table table-striped table-bordered">
		            				 			<div class="form-inline">
		            				 				<div class="row">
	            				 						<div class="col-lg-6">
		            				 						<div class="form-group" ng-repeat="x in get_room">
		            				 							<div class="row">
		            				 								<div class="col-lg-6">
		            				 									<label for="txtRoom">Room Name</label>
			            				 							</div>
		            				 								<div class="col-lg-6">
		            				 									<div class="input-group">
							            									<input type="hidden" value="{{x.Id}}" name="new_room_id" id="new_room_id">
							            									<input type="hidden" value="{{x.Price}}" name="new_room_price" id="new_room_price">
																			<div class="dropdown" style="margin-left:1px;">
																				<div class="dropbtn btn btn-sm ">{{x.Room_name}}<span class="caret" style="margin-left:110px"></span></div>
																			    <div class="dropdown-content">
																			  		<a href="" ng-repeat="a in get_all_room" ng-click="chenge_room(a.Id,a.Price)">{{a.Room_name}} /{{a.Room_type_name}}</a>
																			    </div>
																			</div>
																	    </div>
																	</div>
		            				 							</div>
		            				 							<div class="row" style="margin-top:10px">
		            				 								<div class="col-lg-6">
		            				 									<label for="txtNewprice">Price</label>
		            				 								</div>
		            				 								<div class="col-lg-6">
		            				 									<input type="text" value="{{x.Price}} $" readonly class="form-control input-sm" id="txtNewprice" name="txtNewprice">
		            				 								</div>
		            				 							</div>
		            				 							<div class="row" style="margin-top:10px">
		            				 								<div class="col-lg-6">
		            				 									<label for="check-in">Check-In</label> 
		            				 								</div>
		            				 								<div class="col-lg-6">
			            				 								<input type="hidden" value="<?php if(isset($check_in_id)){ echo $check_in_id; } ?>" name="check_in_id" id="check_in_id">
			            				 								<input type="hidden" value="<?php if(isset($room_info->room_id)){echo $room_info->room_id;} ?>" name="old_room_id">
			            				 								<input type="text" readonly value="<?php if(isset($room_info->check_in)){echo $room_info->check_in;} ?>" class="form-control input-sm" id="check_in" name="check_in">
		            				 								</div>
		            				 							</div>
		            				 							<div class="row" style="margin-top:10px">
		            				 								<div class="col-lg-6">
		            				 									<label for="check_out">Check-Out</label>
		            				 								</div>
		            				 								<div class="col-lg-6">
		            				 									<input type="text" readonly value="<?php if(isset($room_info->check_out)){echo $room_info->check_out;} ?>" class="form-control input-sm" id="check_out" name="check_out">
		            				 								</div>
		            				 							</div>
														 	</div>
	            				 						</div>
		            				 				</div>
		            				 			</div>
			            					</div>
		            					<div ng-repeat="z in ge"></div>
		            					<div class="panel panel-default" style="margin-top:20px">
											<div class="panel-body">
												<div class="row">
													<div class="col-lg-12">
														<label>Remark</label>
														<?php echo Form_textarea( Array("name"=>"txtRemark","id"=>"txtRemark","class"=>"form-control ","placeholder"=>"Enter your note","style"=>"height:50px;"));?>
													</div>	
												</div>
				            					<div class="row" style="margin-top:5px">
				            						<div class="col-lg-4">
				            							<label>Extra money</label>
				            							<div class="panel">
				            							<input type="hidden" value="<?php if(isset($room_info->price)){ echo $old_price = $room_info->price; } ?>" name="txtOldprice" id="txtOldprice">
				            							<input type="hidden" value="{{extra}}" name="txtTotal" id="txtTotal">
														  <h5>Dollar ($) : {{extra}}</h5><hr>
														  <h5>Riels (៛)  : {{extra*riels}}</h5>
														</div>
				            							<input type="hidden" value="<?// echo $sub_total;?>" ng-init="txtSublotal='<?php// echo $sub_total;?>'" ng-model="txtSublotal" name="txtSublotal">
				            						</div>
				            						<div class="col-lg-8">
				            							<div clas="row">
				            								<div class="col-lg-6">
						            							<label>Cash​ Dollar ($)</label>
						            							<input type="number" placeholder="Enter Cash" ng-model="txtCash_dollar" ng-init="txtCash_dollar" class="form-control input-sm" ng-change="exchange_d()" name="txtCash_dollar" id="txtCash_dollar" ng-disabled="dis_d">
						            							<input type="hidden" value="{{txtSublotal}}" id="sub_total" name="sub_total">
						            						</div>
						            						<div class="col-lg-6">
						            							<label>Exchange Dollar($)</label>
						            							<input type="text" readonly="readonly" value="{{echangeDollar}}" class="form-control input-sm disabled" name="txtExchangeDollar">
						            						</div>
				            							</div> <!-- <dollar> -->
				            							<div clas="row">
				            								<div class="col-lg-6">
						            							<label>Cash​ Riels (​៛)</label>
						            							<input type="number" placeholder="Enter Cash" ng-model="txtCashRiels" ng-init="txtCashRiels" class="form-control input-sm" ng-change="exchange_r()" name="txtCashRiels" id="txtCashRiels" ng-disabled="dis_r">
						            						</div>
						            						<div class="col-lg-6">
						            							<label>Exchange​ Riels(​៛)</label>
						            							<input type="text" readonly="readonly" value="{{echangeRiels}}" class="form-control input-sm" name="txtExchangeRiels" id="txtExchangeRiels">
						            						</div>
				            							</div><!-- <rials> -->
				            						</div>
				            					</div>	
				            					<div class="row">
				            						<div class="col-lg-12" style="margin-top:15px">
				            							<div class="pull-right">
				            								<input class="btn btn-warning btn-sm" type="button" ng-repeat="x in get_room" value="Change" id="change" ng-click="change(x.Price)" name="change">
				            								<a href="<?php echo base_url("admin/Check_in"); ?>" class="btn btn-default btn-sm">Cancel</a>
				            							</div>
				            						</div>
				            					</div>
										  	</div>
										</div>
	            				 	</div>
		            				</div>
		            			</div>
		            		</div>
		            	</div>
		            </div><!-- /.col-lg-12 -->
		        </div><!-- /.row -->
	        	<?php echo form_close(); ?>
	        	<!-- Single button -->
	  		</div>
    	</div><!-- /.container-fluid -->
	</div>
</div> <!-- row -->
</div> <!-- container-fluid -->
<script type="text/javascript" src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script type="text/javascript">
	var app = angular.module('myApp',[]);
	app.controller('myCtrl',function($scope,$http){
		$scope.check_id="<?php echo $check_in_id; ?>";
		$http.get("<?php echo base_url()?>ng/change_room.php?id="+$scope.check_id)
		.then(function (response) {$scope.get_room = response.data.records;});
		$scope.exchange_d=function()
		{	
			$scope.riels="<?php echo $riels;?>";
			var Total = document.getElementById("txtTotal").value;	
			if(!$scope.txtCash_dollar==undefined || !$scope.txtCash_dollar=="")
			{	$scope.dis_r=true;
				$scope.echangeDollar= $scope.txtCash_dollar-Total;
			}else{$scope.dis_r=false;}
		}  

		$scope.exchange_r=function()
		{	
			/*if(x=="Bundle"){$scope.dis_du=true;$scope.dis_bp=false;}
			else{$scope.dis_bp=true;$scope.dis_du=false;}*/

			$scope.riels ="<?php echo $riels; ?>";
			var Total = document.getElementById("txtTotal").value;	
			if(!$scope.txtCashRiels==undefined || !$scope.txtCashRiels=="")
			{	$scope.dis_d=true;
				$scope.echangeRiels= $scope.txtCashRiels-Total*$scope.riels;
			}else{$scope.dis_d=false;}
		}  

		$http.get("<?php echo base_url()?>ng/check_in_status.php")
			 .then(function (response) {$scope.get_all_room = response.data.records;});

		$scope.chenge_room=function(room_id,room_price)
		{	$scope.riels ="<?php echo $riels; ?>";
			$scope.room_id=room_id;
			$scope.new_price=room_price;
			$http.get("<?php echo base_url()?>ng/get_room_to_change.php?id="+$scope.room_id)
			.then(function (response) {$scope.get_room = response.data.records;});
			$scope.old_price = "<?php if(isset($room_info->price)){ echo $old_price = $room_info->price; } ?>";

			if((parseInt($scope.old_price)) < (parseInt($scope.new_price))){
			$scope.extra=(parseInt($scope.new_price))-(parseInt($scope.old_price));
			}

			if((parseInt($scope.old_price)) >= (parseInt($scope.new_price))){
			$scope.extra=0;
			} 
		}/*---------click to change room--------*/

		$scope.change=function(new_price)
		{		
				$scope.riels ="<?php echo $riels; ?>";
				if((parseInt($scope.old_price)) < (parseInt($scope.new_price)))
				{
					var extra = document.getElementById("txtTotal").value;
					var cashDolar = document.getElementById("txtCash_dollar").value;
					var cashRiels = document.getElementById("txtCashRiels").value;
					if((cashDolar=="" || cashDolar==undefined)&&
						(cashRiels=="" || cashRiels==undefined)
					  )
					{
						$scope.msg_error=true; $scope.msg="Enter your cash!"
					}else{
						document.getElementById("form").submit();
					}
				}else{ 
					document.getElementById("form").submit(); 
				}		

				if((parseInt($scope.old_price)) >= (parseInt($scope.new_price))){
					document.getElementById("form").submit();
				} /*------========= if old room_price  > new room_price ======--------*/
			
		}

	});
</script>
