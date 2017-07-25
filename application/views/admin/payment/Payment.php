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
	        	<?php echo form_open("admin/Check_in/payment","id='form' name='form'"); ?>
	        		<div class="row">
		            <div class="col-lg-12">
		                <h1 class="page-header">Form Payment</h1>
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
		            		<div class="row">
		            			<div class="col-lg-4">
	            				 	<div class="panel panel-body">
	            				 		<div class="page-header"><b><h4>Guest Information</h4></b></div>
	            				 		<div class="row">
	            				 			<?php
	            				 				if(isset($exchang_rate->value)){
	            				 					$riels=$exchang_rate->value;
	            				 				}else{$riels=4000;}
	            				 			?>
	            				 			<div class="col-lg-4"><label>Name</label></div>
	            				 			<div class="col-lg-6">: <?php if(isset($guest_info->guest_name)){ echo $guest_info->guest_name; } ?></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<input type="hidden" value="<?php if(isset($guest_info->guest_code)){ echo $guest_info->guest_code;} ?>" id="guest_code" name="guest_code">
	            				 			<div class="col-lg-4"><label>Gender</label></div>
	            				 			<div class="col-lg-6">: <?php if(isset($guest_info->gender)){ echo $guest_info->gender=="0"?"Female":"Male"; } ?></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-4"><label>Age</label></div>
	            				 			<div class="col-lg-6">: <?php if(isset($guest_info->age)){ echo $guest_info->age; } ?></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-4"><label>Phone</label></div>
	            				 			<div class="col-lg-6">: <?php if(isset($guest_info->phone)){ echo $guest_info->phone; } ?></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-4"><label>Email</label></div>
	            				 			<div class="col-lg-6"> :<?php if(isset($guest_info->email)){ echo $guest_info->email; } ?></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-4"><label>Visa Card</label></div>
	            				 			<div class="col-lg-6">: <?php if(isset($guest_info->visa_num)){ echo $guest_info->visa_num; } ?></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-4"><label>National</label></div>
	            				 			<div class="col-lg-6">: <?php if(isset($guest_info->national_num)){ echo $guest_info->national_num; } ?></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-4"><label>Passport</label></div>
	            				 			<div class="col-lg-6">: <?php if(isset($guest_info->passport_num)){ echo $guest_info->passport_num; } ?></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-4"><label>Country</label></div>
	            				 			<div class="col-lg-6">: <?php if(isset($guest_info->country)){ echo $guest_info->country; } ?></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-4"><label>Location</label></div>
	            				 			<div class="col-lg-6">: <?php if(isset($guest_info->location)){ echo $guest_info->location; } ?></div>
	            				 		</div>
	            				 		<div class="row">
	            				 			<div class="col-lg-4"><label>Address</div>
	            				 			<div class="col-lg-6">: <?php if(isset($guest_info->address)){ echo $guest_info->address; } ?></div>
	            				 		</div>
	            				 	</div>
		            			</div>
		            			<div class="col-lg-8">
		            				<div class="panel panel-body">
	            				 		<div class="page-header"><b><h4>payment Information</h4></b></div>
	            				 		<div class="table table-striped table-bordered">
	            							<table class="table table-striped table-bordered">
			            						<tr>
			            							<th>Room Name</th>
			            							<th>Price</th>
			            							<th>Check-In</th>
			            							<th>Check-Out</th>
			            						</tr>
			            						<?php $sub_total=0; if(isset($check_in_info)){ foreach ($check_in_info as $value) { ?>
			            						<tr>
			            							<td><?php echo $value->room_name; ?></td>
			            							<td><?php echo $value->price." $"; ?></td>
			            							<td><?php echo $value->check_in; ?></td>
			            							<td><?php echo $value->check_out; ?></td>
			            							<?php $sub_total+= $value->price; ?>
			            						</tr>
			            						<?php }}?>
			            						<tr> 
													<td colspan="2" rowspan="5"></td>									
													<th style="text-align: right;">Sub Total :</th>
													<th><?php echo $sub_total." $"; ?></th>
													<input type="hidden" value="<?php echo $sub_total; ?>" name="sub_total" id="sub_total">
												</tr>																		
	            							</table>
		            					</div>
		            					<div class="panel panel-default">
											<div class="panel-body">
												<div class="row">
				            						<div class="col-lg-4">
				            							<label>Total Price</label>
				            							<div class="panel">
														  <h5>Dollar ($) : <?php echo $sub_total;?></h5><hr>
														  <h5>Riels (៛)  : <?php echo $sub_total*$riels;?></h5>
														</div>
				            							<input type="hidden" value="<?php echo $sub_total;?>" ng-init="txtSublotal='<?php echo $sub_total;?>'" ng-model="txtSublotal" name="txtSublotal">
				            						</div>
				            						<div class="col-lg-8">
				            							<div clas="row">
				            								<div class="col-lg-6">
						            							<label>Cash​ Dollar ($)</label>
						            							<input type="number" placeholder="Enter Cash" ng-model="txtCash_dollar" ng-init="txtCash_dollar" class="form-control input-sm" ng-change="exchange_d()" name="txtCash_dollar" ng-disabled="dis_d">
						            							<input type="hidden" value="{{txtSublotal}}" id="sub_total" name="sub_total">
						            						</div>
						            						<div class="col-lg-6">
						            							<label>Exchange Dollar($)</label>
						            							<input type="text" readonly="readonly" value="{{exchange_dollar}}" class="form-control input-sm" name="txtExchangeDollar">
						            						</div>
				            							</div> <!-- <dollar> -->

				            							<div clas="row">
				            								<div class="col-lg-6">
						            							<label>Cash​ Riels (​៛)</label>
						            							<input type="number" placeholder="Enter Cash" ng-model="txtCash_riels" ng-init="txtCash_riels" class="form-control input-sm" ng-change="exchange_r()" name="txtCash_riels" ng-disabled="dis_r">
						            						</div>
						            						<div class="col-lg-6">
						            							<label>Exchange​ Riels(​៛)</label>
						            							<input type="text" readonly="readonly" value="{{exchange_riels}}" class="form-control input-sm" name="txtExchange_riels">
						            						</div>
				            							</div><!-- <rials> -->
				            						</div>
				            					</div>
				            					<div class="row">
				            						<div class="col-lg-12" >
				            							<div class="pull-right">
				            								<input class="btn btn-warning btn-sm" type="button" value="Pay" id="pay" ng-click="pay()" name="pay">
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
	  		</div>
    	</div><!-- /.container-fluid -->
	</div>
</div> <!-- row -->
</div> <!-- container-fluid -->
<script type="text/javascript" src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script type="text/javascript">
	var app = angular.module('myApp',[]);
	app.controller('myCtrl',function($scope,$http){
		$http.get("<?php echo base_url()?>ng/get_room.php")
		.then(function (response) {$scope.get_room = response.data.records;});
		$scope.exchange_d=function()
		{
			$scope.txtSublotal;
			if(!$scope.txtCash_dollar==undefined || !$scope.txtCash_dollar=="")
			{	$scope.dis_r=true;
				$scope.exchange_dollar	= ($scope.txtCash_dollar)-($scope.txtSublotal);
				if($scope.exchange_dollar<0){
					$scope.exchange_dollar=0;
				}
			}else{$scope.dis_r=false;}
		} /*exchage Dollar*/

		$scope.exchange_r=function()
		{	$scope.riels="<?php echo $riels;?>";
			$scope.txtSublotal;
			if(!$scope.txtCash_riels==undefined || !$scope.txtCash_riels=="")
			{	$scope.dis_d=true;
				$scope.exchange_riels = ($scope.txtCash_riels)-($scope.txtSublotal*$scope.riels);
				if($scope.exchange_riels<0){
					$scope.exchange_riels=0;
				}
			}else{$scope.dis_d=false;}
		}/*exchage Riels?*/
		
		$scope.pay=function()
		{	
			$scope.riels="<?php echo $riels;?>";
			if(!$scope.txtCash_dollar==undefined || !$scope.txtCash_dollar=="")
			{	
				if(($scope.txtCash_dollar) < ($scope.txtSublotal)){
					$scope.msg_error=true; $scope.msg="your enter invalid.!"
				}else{document.getElementById("form").submit();}
			}
			if(!$scope.txtCash_riels==undefined || !$scope.txtCash_riels=="")
			{	
				if(($scope.txtCash_riels) < ($scope.txtSublotal*$scope.riels)){
					$scope.msg_error=true; $scope.msg="your enter invalid.!"
				}else{document.getElementById("form").submit();}
			}
		}

	});
</script>