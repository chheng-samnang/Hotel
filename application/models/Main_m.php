<?php
class Main_m extends CI_Model
{					
	var $today;
	public function __construct()
	{
		parent::__construct();	
		$this->today = date("Y-m-d");				
	}	
	public function index()
	{
		$query=$this->db->query("SELECT COUNT(book_id) AS value FROM tbl_booking WHERE  book_status='booking'");
		if($query->num_rows()>0){return $query->row()->value;}
		else{return 0;}
	}
	public function check_in()
	{
		$query=$this->db->query("SELECT COUNT(check_in_id) AS value FROM tbl_check_in WHERE  check_in_status='check-in'");
		if($query->num_rows()>0){return $query->row()->value;}
		else{return 0;}
	}

	public function check_out()
	{
		$query=$this->db->query("SELECT COUNT(check_in_id) AS value FROM tbl_check_in WHERE check_out='$this->today' AND check_in_status='check-out'");
		if($query->num_rows()>0){return $query->row()->value;}
		else{return 0;}
	}
	public function room_status($status="")
	{	
		if($status=="")
		{
			$query=$this->db->query("SELECT COUNT(room_id) AS value FROM tbl_room");
		 if($query->num_rows()>0){return $query->row()->value;}else{return 0;}

		}else{
			$query=$this->db->query("SELECT COUNT(room_id) AS value FROM tbl_room WHERE status='$status'");
		 if($query->num_rows()>0){return $query->row()->value;}else{return 0;}
		}
	}
	public function grand_total()
	{
		$query=$this->db->query("SELECT pay_id,grand_total,cash_currency FROM tbl_payment");
		if($query->num_rows()>0){ return $query->result();}
		else{return 0;}
	}
}
?>