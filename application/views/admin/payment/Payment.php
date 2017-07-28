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
	            				 		<div class="page-header"><b><h3>Guest Information</h3></b></div>
	            				 		<div class="row">
	            				 			<?php
	            				 				if(isset($exchang_rate->value)){
	            				 					$riels=$exchang_rate->value;
	            				 				}else{$riels=4000;}
	            				 				if(isset($receipt->receipt_num)){
	            				 					$receipt=$receipt->receipt_num+1;
	            				 				}else{
	            				 					$receipt=date('YmdHis');
	            				 				}
	            				 			?>
	            				 			<div class="col-lg-4"><label>Name</label></div>
	            				 			<div class="col-lg-6">: <?php if(isset($guest_info->guest_name)){ echo $guest_info->guest_name; } ?></div>
	            				 			<input type="hidden" value="<?php echo $receipt; ?>" name="txtReceipt" id="txtReceipt">
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
	            				 		<div class="page-header"><b><h3>payment Information</h3></b></div>
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
				            					<div style="display:none; ;">
												    <div id="receipt">
												    	<style>
															div.contin{
															    width:300mm;
															    margin: auto;
															    border: 3px solid hidden  dotted #73AD21;
															}
															* { margin: 0; padding: 0; }
															body { }
															#page-wrap { width: 800px; margin: 0 auto; }

															textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
															table { border-collapse: collapse; }
															table td, table th { border: 1px solid black; padding: 5px; }

															#header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; }

															#address { width: 250px; height: 150px; float: left; }
															#customer { overflow: hidden; }

															#logo { text-align: right; float: right; position: relative; margin-top: 25px; border: 1px solid #fff; max-width: 540px; max-height: 100px; overflow: hidden; }
															#logo:hover, #logo.edit { border: 1px solid #000; margin-top: 0px; max-height: 125px; }
															#logoctr { display: none; }
															#logo:hover #logoctr, #logo.edit #logoctr { display: block; text-align: right; line-height: 25px; background: #eee; padding: 0 5px; }
															#logohelp { text-align: left; display: none; font-style: italic; padding: 10px 5px;}
															#logohelp input { margin-bottom: 5px; }
															.edit #logohelp { display: block; }
															.edit #save-logo, .edit #cancel-logo { display: inline; }
															.edit #image, #save-logo, #cancel-logo, .edit #change-logo, .edit #delete-logo { display: none; }
															#customer-title { font-size: 20px; font-weight: bold; float: left; }

															#meta { margin-top: 1px; width: 300px; float: right; }
															#meta td { text-align: right;  }
															#meta td.meta-head { text-align: left; background: #eee; }
															#meta td textarea { width: 100%; height: 20px; text-align: right; }

															#items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
															#items th { background: #eee; }
															#items textarea { width: 80px; height: 50px; }
															#items tr.item-row td { border: 0; vertical-align: top; }
															#items td.description { width: 300px; }
															#items td.item-name { width: 175px; }
															#items td.description textarea, #items td.item-name textarea { width: 100%; }
															#items td.total-line { border-right: 0; text-align: right; }
															#items td.total-value { border-left: 0; padding: 10px; }
															#items td.total-value textarea { height: 20px; background: none; }
															#items td.balance { background: #eee; }
															#items td.blank { border: 0; }

															#terms { text-align: center; margin: 20px 0 0 0; }
															#terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
															#terms textarea { width: 100%; text-align: center;}

															textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }
															.delete-wpr { position: relative; }
															.delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
														</style>
												    	<body>
												    		<link href="style.css" rel="style">
															<div class="contin">
																<div class="page-header">
																	<div style="text-align:center;">
																		<h4>Receipt</h4>
																	</div>
																</div>
																<div class="container-fluid">
																	<div id="page-wrap">
																		<div id="identity">
																            <textarea id="address">
																			123 Appleseed Street
																			Appleville, WI 53719

																			Phone: (555) 70 834 493</textarea>
																            <div id="logo">
																              <div id="logohelp">
																                <input id="imageloc" type="text" size="50" value="" /><br />
																                (max width: 540px, max height: 100px)
																              </div>
																              <img id="image" width="auto" height="100px" src="http://localhost:8888/Hotel/assets/uploads/logo-invert.png" alt="logo" />
																            </div>
																		</div>
																		<div style="clear:both"></div>
																		<div id="customer">
																            <table id="meta">
																                <tr>
																                    <td class="meta-head">Receipt No </td>
																                    <td><span>#<?php echo $receipt;?></span></td>
																                </tr>
																                <tr>
																                    <td class="meta-head">Date</td>
																                    <td><span id="date"><?php echo date("Y-m-d/h:i-A"); ?></span></td>
																                </tr>
																            </table>
																		</div>
																		<table id="items">
																		  <tr>
																		      <th>Room</th>
																		      <th>Guest Name</th>
																		      <th>Price</th>
																		      <th>Check-In</th>
																		      <th>Check_out</th>
																		  </tr>
																		  <tr>
																		  	  <td class="description"><span><?php if(isset($value->room_name)){echo $value->room_name;} ?></span></td>
																		  	  <td><span class="cost"><?php if(isset($guest_info->guest_name)){ echo $guest_info->guest_name; } ?></span></td>
																		      <td><span class="cost"><?php if(isset($value->price)){echo $sub_total+= $value->price;}?> $</span></td>
																		      <td><span class="price"><?php if(isset($value->check_in)){echo $value->check_in;}  ?></span></td>
																		      <td><span class="price"><?php if(isset($value->check_out)){ echo $value->check_out;} ?></span></td>
																		  </tr>
																		  <tr>
																		      <td colspan="2" class="blank"></td>	
																		      <td colspan="2" class="total-line">Grand Total</td>
																		      <td class="total-value"><div id="subtotal">{{txtSublotal}} $</div></td>
																		  </tr>
																		  <tr>
																		      <td colspan="2" class="blank"> </td>
																		      <td colspan="2" class="total-line">Cash In(KH)</td>
																		      <td class="total-value"><div id="total">{{txtCash_riels}} ៛</div></td>
																		  </tr>
																		  <tr>
																		      <td colspan="2" class="blank"> </td>
																		      <td colspan="2" class="total-line">Cash In(US)</td>
																		      <td class="total-value"><div id="total">{{txtCash_dollar}} $</div></td>
																		  </tr>
																		  <tr>
																		      <td colspan="2" class="blank"> </td>
																		      <td colspan="2" class="total-line">Exchange (KH)</td>
																		      <td class="total-value"><span id="paid">{{exchange_riels}}</span></td>
																		  </tr>
																		  <tr>
																		      <td colspan="2" class="blank"> </td>
																		      <td colspan="2" class="total-line">Exchange (US)</td>
																		      <td class="total-value"><span id="paid">{{exchange_dollar}}</span></td>
																		  </tr>
																		</table>
																		<div id="terms">
																		  <h5>Terms</h5>
																		  <span>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</span>
																		</div>
																	</div>
																</div>
															</div>
														</body>
													</div>
												</div> <!-- form print receipt -->
				            					<div class="row">
				            						<div class="col-lg-12" >
				            							<div class="pull-right" style="margin-right:13px; margin-top:10px">
				            								<input class="btn btn-warning btn-lg" type="button" value="Pay" id="pay" ng-click="pay()" name="pay">
				            								<a href="" class="btn btn-success btn-lg" onclick="printContent('receipt')"><i class="fa fa-print"></i> Print</a>
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
<script>	
	function printContent(el){
	  var restorepage = document.body.innerHTML;
	  var printcontent = document.getElementById(el).innerHTML;
	  document.body.innerHTML = printcontent;
	  window.print();
	  document.body.innerHTML = restorepage;
	}
</script>
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