<?php
class Receipt_m extends CI_Model
{					
	var $today;
	public function __construct()
	{
		parent::__construct();	
		$this->today = date("Y-m-d");				
	}	

	public function index($pay_id="")
	{	
		if($pay_id=="")
		{
			$query=$this->db->query("SELECT pay_id, guest_name,check_in,check_out,cash,receipt_num,grand_total,exchange,cash_currency,room_name,room_type_name
			FROM tbl_payment AS p INNER JOIN tbl_guest AS g ON p.guest_code=g.guest_code INNER JOIN tbl_payment_detail AS pd ON p.pay_code=pd.pay_code 
			INNER JOIN tbl_check_in AS c ON p.guest_code=c.guest_code INNER JOIN tbl_room AS r ON r.room_id=pd.room_id INNER JOIN tbl_room_type AS rt ON 
			rt.room_type_code=r.room_type_code");
			if($query->num_rows()>0){return $query->result();}
			else{return 0;}

		}else{
			$query=$this->db->query("SELECT *
			FROM tbl_payment AS p INNER JOIN tbl_guest AS g ON p.guest_code=g.guest_code INNER JOIN tbl_payment_detail AS pd ON p.pay_code=pd.pay_code 
			INNER JOIN tbl_check_in AS c ON p.guest_code=c.guest_code INNER JOIN tbl_room AS r ON r.room_id=pd.room_id INNER JOIN tbl_room_type AS rt ON 
			rt.room_type_code=r.room_type_code WHERE pay_id='$pay_id'");
			if($query->num_rows()>0){return $query->row();}
		    else{return 0;}
		}
	}
}
?>