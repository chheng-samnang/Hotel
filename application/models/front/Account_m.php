<?php
class Account_m extends CI_Model
{	var $account_login;					
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("security");	
		$this->account_login=$this->session->acc_log1;	
	}
	public function index($id="")
	{
		if($id=="")
		{						
			$this->db->order_by('acc_id', 'DESC');
			$query=$this->db->get("tbl_account");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$this->db->where("acc_id",$id);
			$query=$this->db->get("tbl_account");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function captcha($cap_id="",$cap_code="")
	{	if($cap_code==""){

			$this->db->where("cap_id",$cap_id);
			$query=$this->db->get("tbl_captcha");
			if($query->num_rows()>0){return $query->row();}

		}else{
			$query=$this->db->query("SELECT cap_code  FROM tbl_captcha WHERE cap_id='$cap_id' AND cap_code='$cap_code'");
			if($query->num_rows()>0){return TRUE;}
		}

	}
	public function acc_head()
	{
		$query=$this->db->query("SELECT acc_id,acc_photo,acc_name FROM tbl_account WHERE acc_id='$this->account_login'");
		if($query->num_rows()>0){return $query->row();}
	}
	public function account_code()
	{
		$query=$this->db->get('tbl_account');
		if($query->num_rows()>0){return $query->last_row();}				
	}
	public function validateemail($email)
	{
		if($email!="")
		{
			$query = $this->db->get_where('tbl_account',array('acc_email'=>$email));
			if($query->num_rows()>0)
			{
				return true;
			}else
			{
				return 0;
			}
		}
	}
	public function validatePassword($pass,$email)
	{
	    $acc_paswd = do_hash($pass);
		if($acc_paswd!="")
		{
			$query = $this->db->get_where('tbl_account',array('acc_pass'=>$acc_paswd));
			if($query->num_rows()>0)
			{
				$query=$this->db->query("SELECT acc_id,acc_photo,acc_name FROM tbl_account WHERE acc_pass='$acc_paswd' AND acc_email='$email'");
				if($query->num_rows()>0){return $query->row();}
			}else
			{
				return 0;
			}
		}
	}

	public function free_cps_ads()
	{
		$query=$this->db->query("SELECT SUM(hour) AS hour FROM tbl_cv_paid_search AS cps 
			INNER JOIN tbl_account AS acc ON cps.acc_id=acc.acc_id 
			INNER JOIN tbl_post_ads AS ads ON cps.ads_id=ads.post_ads_id WHERE cps.acc_id='{$this->account_login}' AND ads.post_ads_status='Published' AND cps_status='Published' AND type='Free'");
		if($query->num_rows()>0){return $query->row()->hour;}
		else{return 0;}
	}
	public function free_cps_bp()
	{
		$query=$this->db->query("SELECT SUM(hour) AS hour FROM tbl_cv_paid_search AS cps 
			INNER JOIN tbl_account AS acc ON cps.acc_id=acc.acc_id 
			INNER JOIN tbl_bundle_package AS bp ON cps.bp_id=bp.bp_id WHERE cps.acc_id='{$this->account_login}' AND bp.bp_status='Published' AND cps_status='Published' AND cps.type='Free'");
		if($query->num_rows()>0){return $query->row()->hour;}
		else{return 0;}
	}
	public function free_premium_bp()
	{
		$query=$this->db->query("SELECT s.key_code FROM tbl_post_ads AS ads
			INNER JOIN tbl_bundle_package AS bp ON ads.post_ads_id=bp.ads_id
			INNER JOIN tbl_rate_detail AS rd ON ads.ads_type=rd.rate_det_id
			INNER JOIN tbl_sysdata AS s ON rd.free_per_month=s.key_id
			INNER JOIN tbl_account AS acc ON bp.acc_id=acc.acc_id 
			WHERE bp.acc_id='{$this->account_login}' AND bp.bp_status='Published' AND post_ads_status='Published' AND bp.type='Free'");
		if($query->num_rows()>0){return $query->row()->key_code/10;}
		else{return 0;}
	}
	public function post_history()
	{
		$query=$this->db->query("SELECT post_cv_id,cv_code,rate_det_type,position,post_cv_status,cv_status FROM tbl_post_cv AS cv INNER JOIN tbl_rate_detail AS rd ON cv.priority=rd.rate_det_id WHERE acc_id='{$this->account_login}' ORDER BY cv_code");		
		if($query->num_rows()>0){return $query->result();}		
	}

	public function add()
	{	$status=1;

		$data= array(	
						"acc_code" => $this->input->post("txtAccCode"),
						"acc_name" => $this->input->post("txtAccName"),
						"acc_company" => $this->input->post("raIM"),
						"acc_pass" => do_hash($this->input->post("txtAccPass")),
						"acc_gender" => $this->input->post("ddlGender"),
						"acc_email" => $this->input->post("txtEmail"),
						"acc_phone" => $this->input->post("txtPhone"),
						"acc_addr" => $this->input->post("txtAddr"),
						"acc_website" => $this->input->post("txtWebsite"),						
						"acc_status" =>1,						
						"acc_photo" =>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",					
						"acc_desc" => $this->input->post("txtDesc"),												
						"user_crea" => "N/A",
						"date_crea" => date('Y-m-d')
					);

		$query=$this->db->insert("tbl_account",$data);		
		if($query){return $query;}
	}
	public function edit($id)
	{
		if($id==TRUE)
		{
			if(!empty($this->input->post('txtImgName')))
			{		
				$row=$this->index($id);			
				unlink("assets/uploads/".$row->acc_photo);	
				$data= array(							
						"acc_name" => $this->input->post("txtAccName"),
						"acc_company" => $this->input->post("raIM"),						
						"acc_gender" => $this->input->post("ddlGender"),
						"acc_pass" => do_hash($this->input->post("txtAccPass")),
						"acc_email" => $this->input->post("txtEmail"),
						"acc_phone" => $this->input->post("txtPhone"),
						"acc_addr" => $this->input->post("txtAddr"),
						"acc_website" => $this->input->post("txtWebsite"),						
						"acc_status" => $this->input->post("ddlStatus"),						
						"acc_photo" =>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",					
						"acc_desc" => $this->input->post("txtDesc"),												
						"user_updt" => "N/A",
						"date_updt" => date('Y-m-d')
						 );	
			}
			else
			{
				$data= array(	
						//"acc_code" => $this->input->post("txtAccCode"),
						"acc_name" => $this->input->post("txtAccName"),
						"acc_company" => $this->input->post("raIM"),						
						"acc_gender" => $this->input->post("ddlGender"),
						"acc_pass" => do_hash($this->input->post("txtAccPass")),
						"acc_email" => $this->input->post("txtEmail"),
						"acc_phone" => $this->input->post("txtPhone"),
						"acc_addr" => $this->input->post("txtAddr"),
						"acc_website" => $this->input->post("txtWebsite"),						
						"acc_status" => $this->input->post("ddlStatus"),											
						"acc_desc" => $this->input->post("txtDesc"),												
						"user_updt" => "N/A",
						"date_updt" => date('Y-m-d')
						 );
			}	
			$this->db->where("acc_id",$id);
			$query=$this->db->update("tbl_account",$data);
			if($query==TRUE){return $query;}
		}				
	}
	public function change_password($id="")
	{
		$row=$this->index($id);
		if($row->acc_pass==do_hash($this->input->post('txtOldAccPass')))
		{		
			$data= array(							
						"acc_pass" =>do_hash($this->input->post("txtAccPass")),
						"user_updt" => "N/A",
						"date_updt" => date('Y-m-d')						
						 );
			$this->db->where("acc_id",$id);
			$query=$this->db->update("tbl_account",$data);
			if($query==TRUE){return TRUE;}
		}
		else{return FALSE;}		
	}	
	public function delete($id)
	{
		if($id==TRUE)
		{	
			$row=$this->index($id);			
			unlink("assets/uploads/".$row->acc_photo);					
			$this->db->where("acc_id",$id);
			$query=$this->db->delete("tbl_account");
			if($query==TRUE){return $query;}
		}
	}		
	
}
?>