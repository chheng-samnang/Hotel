<div class="row">
	<div class="col-md-12">		
		<div style="float:right; margin-bottom: 10px; width: 15%;border:1px solid #eee">
			<p style="text-align: center;">Welcom to <?php if(isset($account)){echo $account->acc_name;}?></p>
			<div style="text-align: center;margin-bottom: 10px;"><img src="<?php if(isset($account)){echo base_url("assets/uploads/".$account->acc_photo);}?>" style="width:60px;"></div>			
		</div>		
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div style="float:right; margin-bottom: 10px; width: 15%;">
			<a href="<?php echo base_url("user_account/account_info");?>" style="float:left;" class="btn btn-default btn-sm">Your Account</a>
			<a href="<?php if(isset($logout_url)){echo base_url($logout_url);}?>" style="float:right;" class="btn btn-default btn-sm">Logout</a>
		</div>							
	</div>
</div>