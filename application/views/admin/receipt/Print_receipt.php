<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
 <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
	/*
	 CSS-Tricks Example
	 by Chris Coyier
	 http://css-tricks.com
*/

* { margin: 0; padding: 0; }
body {}
#page-wrap { width: 800px; margin: 0 auto; }

textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
table { border-collapse: collapse; }
table td, table th { border: 1px solid black; padding: 5px; }

#header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 0px 0px; }

#address { width: 174px; height: 150px; float: left; }
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
#items td.total-$receipt_list { border-left: 0; padding: 10px; }
#items td.total-$receipt_list textarea { height: 20px; background: none; }
#items td.balance { background: #eee; }
#items td.blank { border: 0; }

#terms { text-align: center; margin: 20px 0 0 0; }
#terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
#terms textarea { width: 100%; text-align: center;}

textarea:hover, textarea:focus, #items td.total-$receipt_list textarea:hover, #items td.total-$receipt_list textarea:focus, .delete:hover { background-color:#EEFF88; }

.delete-wpr { position: relative; }
.delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
</style>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	<link rel='stylesheet' type='text/css' href='style.css' />
</head>
<body>
	<div id="receipt">
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
			                <input id="imageloc" type="text" size="50" $receipt_list="" /><br />
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
			                    <td><span>#<?php if(isset($receipt_list->receipt_num)){echo $receipt_list->receipt_num;}?></span></td>
			                </tr>
			                <tr>
			                    <td class="meta-head">Guest Name </td>
			                    <td><span><?php if(isset($receipt_list->guest_name)){ echo $receipt_list->guest_name; } ?></span></td>
			                </tr>
			                <tr>
			                    <td class="meta-head">Date</td>
			                    <td><span id="date"><?php echo date("Y-m-d/h:i-A"); ?></span></td>
			                </tr>
			            </table>
					</div>
					  <?php 

					      	if(isset($receipt_list->cash_currency)){
					      		if($receipt_list->cash_currency=="r"){
					      			$cash_riels=$receipt_list->cash;
					      			$grand_total=$receipt_list->grand_total."៛";
					      			$exchange_riels=$receipt_list->exchange;
					      		}else{
					      			$cash_dollar=$receipt_list->cash;
					      			$grand_total=$receipt_list->grand_total."$";
					      			$exchange_dollar=$receipt_list->exchange;
					      			$cash_dollar=$receipt_list->cash;
					      		}					      		
					      	}
					      ?>
					<table id="items">
					  <tr>
					      <th>Room</th>
					      <th>Description</th>
					      <th>Price</th>
					      <th>Check-In</th>
					      <th>Check_out</th>
					  </tr>
					  <tr>
					  	  <td class="cost"><span><?php if(isset($receipt_list->room_name)){echo $receipt_list->room_name;} ?></span></td>
					  	  <td><span class="description"><?php if(isset($receipt_list->check_in_remark)){ echo $receipt_list->check_in_remark; } ?></span></td>
					      <td><span class="cost"><?php if(isset($receipt_list->price)){echo $receipt_list->price;}?> $</span></td>
					      <td><span class="price"><?php if(isset($receipt_list->check_in)){echo $receipt_list->check_in;}  ?></span></td>
					      <td><span class="price"><?php if(isset($receipt_list->check_out)){ echo $receipt_list->check_out;} ?></span></td>
					  </tr>
					  <tr>
					      <td colspan="2" class="blank"></td>	
					      <td colspan="2" class="total-line">Grand Total</td>
					      <td class="total-$receipt_list"><div id="subtotal"><?php if(isset($grand_total)){echo $grand_total;} ?></div></td>
					  </tr>
					  <tr>
					      <td colspan="2" class="blank"> </td>
					      <td colspan="2" class="total-line">Cash In(KH)</td>
					      <td class="total-$receipt_list"><div id="total"><?php if(isset($cash_riels)){echo $cash_riels."៛";} ?>​</div></td>
					  </tr>
					  <tr>
					      <td colspan="2" class="blank"> </td>
					      <td colspan="2" class="total-line">Cash In(US)</td>
					      <td class="total-$receipt_list"><div id="total"><?php if(isset($cash_dollar)){echo $cash_dollar."$"; } ?></div></td>
					  </tr>
					  <tr>
					      <td colspan="2" class="blank"> </td>
					      <td colspan="2" class="total-line">Exchange (KH)</td>
					      <td class="total-$receipt_list"><span id="paid"><?php if(isset($exchange_riels)){echo  $exchange_riels."៛"; } ?></span></td>
					  </tr>
					  <tr>
					      <td colspan="2" class="blank"> </td>
					      <td colspan="2" class="total-line">Exchange (US)</td>
					      <td class="total-$receipt_list"><span id="paid"><?php if(isset($exchange_dollar)){echo $exchange_dollar."$"; } ?></span></td>
					  </tr>
					</table>
					<div id="terms">
					  <h5>Terms</h5>
					  <span>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-10" >
			<div class="pull-right" style="margin-right:3px; margin:10px">
				<a href="" class="btn btn-success btn-lg" onclick="printContent('receipt')"><i class="fa fa-print"></i> Print</a>
				<a href="<?php echo base_url("admin/Receipt"); ?>" class="btn btn-default btn-lg" ><i></i>Cancel</a>
			</div>
		</div>
	</div>
</body>
</html>
<script>	
	function printContent(el){
	  var restorepage = document.body.innerHTML;
	  var printcontent = document.getElementById(el).innerHTML;
	  document.body.innerHTML = printcontent;
	  window.print();
	  document.body.innerHTML = restorepage;
	}
</script>