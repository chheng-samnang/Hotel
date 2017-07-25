<?php
class Home_m extends CI_Model
{			
	var $account_login;			
	public function __construct()
	{
		parent::__construct();
		$this->account_login=$this->session->acc_log1;					
	}
	public function premium_job()	
	{
		$query=$this->db->query("SELECT post_job_id,job_title,acc_name,end_date FROM tbl_post_job AS pj INNER JOIN tbl_account AS acc ON pj.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON pj.priority=rd.rate_det_id WHERE rate_det_type='Premium' AND post_job_status='Published' ORDER BY post_job_id DESC");
		if($query->num_rows()>0){return $query->result();}	
	}
	public function premium_cv()	
	{
		$query=$this->db->query("SELECT post_cv_id,photo,name,position FROM tbl_post_cv AS pcv INNER JOIN tbl_rate_detail AS rd ON pcv.priority=rd.rate_det_id WHERE (rate_det_type='Premium' AND post_cv_status='Published') AND cv_status=1 ORDER BY post_cv_id DESC");
		if($query->num_rows()>0){return $query->result();}	
	}
	public function premium_skill()	
	{
		$query=$this->db->query("SELECT skill_det_id,img,name,skill_det_name,loc_name FROM tbl_post_skill_detail AS skd INNER JOIN tbl_post_skill AS sk ON skd.post_skill_id=sk.post_skill_id INNER JOIN tbl_rate_detail AS rd ON sk.priority=rd.rate_det_id INNER JOIN tbl_location AS loc ON sk.loc_id=loc.loc_id WHERE (rate_det_type='Premium' AND post_skill_status='Published') ORDER BY sk.post_skill_id DESC");
		if($query->num_rows()>0){return $query->result();}	
	}	
	public function feature_emp()	
	{
		$query=$this->db->query("SELECT acc.acc_photo,acc.acc_name FROM tbl_account AS acc INNER JOIN tbl_bundle_package AS bp ON acc.acc_id=bp.acc_id WHERE (bp.bp_status='Published' AND acc_company='company') AND type!='Free' ORDER BY bp.bp_id DESC");
		if($query->num_rows()>0){return $query->result();}	
	}
	public function feature_recruit()	
	{
		$query=$this->db->query("SELECT acc.acc_photo,acc.acc_name FROM tbl_account AS acc INNER JOIN tbl_bundle_package AS bp ON acc.acc_id=bp.acc_id WHERE (bp.bp_status='Published' AND acc_company='recruitment_agency') AND type!='Free' ORDER BY bp.bp_id DESC");
		if($query->num_rows()>0){return $query->result();}	
	}

}
?>
