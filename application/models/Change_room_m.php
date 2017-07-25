<?php
class Change_room_m extends CI_Model
{			
	var $userCrea;		
	public function __construct()
	{	parent::__construct();
		$this->load->helper("security");
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";				
	}
	public function index($id="")
	{
		if($id=="")
		{	$query = $this->db->query("SELECT * FROM 
			tbl_guest AS g INNER JOIN 
			tbl_check_in AS ch ON g.guest_code=ch.guest_code INNER JOIN
			tbl_room AS r ON ch.room_id=r.room_id WHERE check_in_status='check-in'
			GROUP BY guest_name");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{	$query = $this->db->query("SELECT * FROM tbl_check_in AS ch INNER JOIN 
			tbl_guest AS g ON g.guest_code=ch.guest_code INNER JOIN
			tbl_room AS r ON r.room_id = ch.room_id JOIN tbl_room_type AS rt ON rt.room_type_code=r.room_type_code
			WHERE guest_id='$id'");
			if($query->num_rows()>0){return $query->result();}
		}
	}

	public function guest_info($id="")
	{$query = $this->db->query("SELECT guest_name,gender,national_num,visa_num,passport_num,age,location,country,address,phone,email FROM tbl_guest AS g 
		INNER JOIN tbl_check_in AS ch ON ch.guest_code=g.guest_code WHERE check_in_id='$id'");
		if($query->num_rows()>0){return $query->row();}
	}

	public function get_room_info($id="")
	{
		$query=$this->db->query("SELECT * FROM tbl_check_in AS ch INNER JOIN tbl_room AS r ON ch.room_id=r.room_id WHERE check_in_id='$id'");
		if($query->num_rows()>0){return $query->row();}
	}
	public function change_room()
	{	
		$array = array(
			'room_id'=>$this->input->post("new_room_id"),
			'check_in_remark'=>$this->input->post("txtRemark")
			);
		$this->db->where("check_in_id",$this->input->post("check_in_id"));
		$query=$this->db->update("tbl_check_in",$array);

		if($query=TRUE)
		{
			if($this->input->post("new_room_id")!="")
			{
				$array = array('status'=>'busy');
				$this->db->where("room_id",$this->input->post("new_room_id"));
				$query=$this->db->update("tbl_room",$array); /*change room status to busy when choose it*/ 
				
				if($query=TRUE)
				{	
					$array = array('status'=>'free');
					$this->db->where("room_id",$this->input->post("old_room_id"));
					$query=$this->db->update("tbl_room",$array); /*change room status to free when exange to new room*/

					if($query=TRUE)
					{	$riels=$this->get_riels();
						$grandTotal_riels=($this->input->post("new_room_price"))*($riels->value);

						$row=$this->pay_info($this->input->post("old_room_id")); /*get pay code from paymant_detail by old room id*/
							
						if($this->input->post('txtCash_dollar')!="")
						{	
							$array=array(
							'grand_total'=>	$this->input->post("new_room_price"),
							'cash'=>$this->input->post("txtCash_dollar"),
							'exchange'=>$this->input->post("txtExchangeDollar"),
							'cash_currency'=>'d'
							);
						}else{
							$array=array(
							'grand_total'=>$grandTotal_riels,
							'cash'=>$this->input->post("txtCashRiels"),
							'exchange'=>$this->input->post("txtExchangeRiels"),
							'cash_currency'=>'r'
							);
						}
						$this->db->where("pay_code",$row->pay_code);
						$query=$this->db->update("tbl_payment",$array); /*======update paymant after change room===*/
						
						$oldPrice=$this->input->post("txtOldprice");
						$NewPrice=$this->input->post("txtNewprice");
						
						if($NewPrice<=$oldPrice)
						{
							$price=$this->input->post("txtOldprice");
						}else{
							$price=$this->input->post("txtNewprice");
						}
						
						$array1=array(
							'price'=>$price,
							'room_id'=>$this->input->post("old_room_id")
							);
						$this->db->where("pay_code",$row->pay_code);
						$query1=$this->db->update("tbl_payment_detail",$array1); /*======update paymant_detail===*/
						
						if($query1==TRUE){return TRUE;}
					}
				}
			}
		}
	}
	public function pay_info($id="")
	{
		$query = $this->db->query("SELECT pay_code  FROM tbl_payment_detail WHERE room_id='$id'");
			if($query->num_rows()>0){return $query->row();}
	}
	public function get_riels()
	{
		$this->db->where("to",'riels');
		$this->db->order_by('ex_id', 'DESC');
		$query=$this->db->get("tbl_exchange_rate");
		if($query->num_rows()>0){return $query->row();}
	}
}
?>