<?php
class Check_in_m extends CI_Model
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
	public function guest_info($guest_code=""){
		$query = $this->db->query("SELECT guest_id,guest_code,guest_name,gender,national_num,visa_num,passport_num,age,location,country,address,phone,email FROM tbl_guest 
		WHERE guest_code='$guest_code'");	
		if($query->num_rows()>0){return $query->row();}
	}

	public function check_in_info($guest_code=""){
		$query = $this->db->query("SELECT * FROM tbl_check_in AS ch_in 
		INNER JOIN tbl_room AS r ON ch_in.room_id=r.room_id	
		WHERE guest_code='$guest_code'");	
		if($query->num_rows()>0){return $query->result();}
	}

	public function guest($id="")
	{	if($id!="")
		{		$query = $this->db->query("SELECT *  FROM 
		 		tbl_booking_detail AS bd INNER JOIN 
		 	    tbl_room AS r ON bd.room_id=r.room_id INNER JOIN
		 		tbl_booking AS b ON bd.booking_code=b.booking_code INNER JOIN 
		 		tbl_location AS l ON b.loc_id=l.loc_id INNER JOIN 
		 		tbl_country AS c ON b.coun_id=c.coun_id  
				WHERE book_id='$id'");
			if($query->num_rows()>0){return $query->row();}
		}
	}

	public function booking_detail($id="")
	{
		$query = $this->db->query("SELECT * FROM 
		 		tbl_booking_detail AS bd INNER JOIN 
		 		tbl_room AS r ON bd.room_id=r.room_id INNER JOIN
		 		tbl_booking AS b ON bd.booking_code=b.booking_code INNER JOIN
		 		tbl_room_type AS rt ON r.room_type_code=rt.room_type_code 
				WHERE book_id='$id'");
			if($query->num_rows()>0){return $query->result();}
	}

	public function guest_detail($id="")
	{   $query = $this->db->query("SELECT guest_code,guest_name,gender,national_num,visa_num,passport_num,age,location,country,address,phone,email FROM tbl_guest WHERE guest_id='$id'");
		if($query->num_rows()>0){return $query->row();}
	}
	public function check_in_price($id="")
	{
		$query = $this->db->query("SELECT price FROM tbl_payment_detail AS pd INNER JOIN tbl_payment AS p ON pd.pay_code=p.pay_code 
								   INNER JOIN tbl_guest AS g ON p.guest_code=g.guest_code
		 						   WHERE guest_id='$id'");
		if($query->num_rows()>0){return $query->row();}
	}
	public function add_check_in($guest_code="")
	{		
			$data1 = json_decode($this->input->post('str'));
			$data=array(
				"guest_code"=>$guest_code,
				"guest_name"=>$this->input->post("txtGuestName"),
				"gender"=>$this->input->post("gender"),
				"national_num"=>$this->input->post("txtNational"),
				"visa_num"=>$this->input->post("txtVisa"),
				"passport_num	"=>$this->input->post("txtPassport"),
				"age"=>$this->input->post("txtAge"),
				"location"=>$this->input->post("location"),
				"country"=>$this->input->post("country"),
				"phone"=>$this->input->post("txtPhone"),
				"email"=>$this->input->post("txtEmail"),
				"address"=>$this->input->post("addr"),
				"user_create"=>$this->userCrea,
				"date_create"=>date('Y-m-d')
			);
			$query=$this->db->insert("tbl_guest",$data);
			if($query)
			{
				$id=$this->input->post("book_id");
				if($id!="")
				{	$row=$this->booking_detail($this->input->post("book_id")); 
					foreach ($row as $value)
					{	$data = array(
						'guest_code'=>$guest_code,
						'room_id'=>$value->room_id,
						'quantity_people'=>$value->quantity_people,
						'check_in_status'=>'pending',
						'check_in'=>$value->check_in,
						'check_out'=>$value->check_out
						);
						$query=$this->db->insert("tbl_check_in",$data);
						if($query)
						{
							$data= array("book_status"=>'check-in');
							$this->db->where("book_id",$id);
							$query=$this->db->update("tbl_booking",$data);
						}
					}/*---=====select from booking=====----*/
				}else
				{ 	foreach ($data1 as $row)
					{	$data = array(
							'guest_code'=>$guest_code,
							'room_id'=>$row[1],	
							'quantity_people'=>$row[8],
							'check_in'=>$row[6],
							'check_out'=>$row[7],
							'check_in_status'=>'pending',
						);
						$query=$this->db->insert("tbl_check_in",$data);
					}
				} /*data from check_in form*/
				
				if($query==TRUE){
						$data= array("status"=>'busy');
						$this->db->where("room_id",$this->input->post("txtRoom_id"));
						$query=$this->db->update("tbl_room",$data);
						if($query==TRUE){return TRUE;}
				}
			}
	} 

	public function check_out($guest_code="")
	{	
			$array =array(
						'check_in_status' =>'check-out'
						);
			$this->db->where("guest_code",$guest_code);
			$quary=$this->db->update("tbl_check_in",$array);
			/*change check-in status*/
			if($quary)
			{
				$row=$this->room_check_out($guest_code);
				$id=$row->room_id;
				$array = array('status' =>'prepea',
								'date_check_out'  =>date("YmdHi"),
					);
				$this->db->where("room_id",$id);
				$quary=$this->db->update("tbl_room",$array);
				if($quary==TRUE){return TRUE;}
			} /*change room status*/
	}

	public function room_check_out($guest_code="")
	{
		$query = $this->db->query("SELECT * FROM tbl_room  AS r INNER JOIN tbl_check_in AS ch ON ch.room_id=r.room_id WHERE guest_code='$guest_code'");
		if($query->num_rows()>0){return $query->row();}	
	}
	public function payment($guest_code="")
	{	$sub_total=$this->input->post("sub_total");
		$exchang_rate=$this->get_riels();
		$riels =($exchang_rate->value)*$sub_total;
		if($guest_code)
		{	
			$check_info=$this->check_in_info($guest_code);
			$pay_code=uniqid();
			$receipt_num=$this->input->post("txtReceipt");
			if($this->input->post("txtCash_dollar")!="")
			{	
				$data1 = array(
							'pay_code'=>$pay_code,
							'guest_code'=>$guest_code,
							'exchange'=>$this->input->post("txtExchangeDollar"),
							'receipt_num'=>$receipt_num,
							'cash'=>$this->input->post("txtCash_dollar"),
							'cash_currency'=>"d",
							'grand_total'=>$this->input->post("sub_total"),
							'user_create'=>$this->userCrea,
							'date_create'=>date('Y-m-d')
						);
			}else{
				$data1 = array(
							'pay_code'=>$pay_code,
							'guest_code'=>$guest_code,
							'exchange'=>$this->input->post("txtExchange_riels"),
							'receipt_num'=>$receipt_num,
							'cash'=>$this->input->post("txtCash_riels"),
							'cash_currency'=>"r",
							'grand_total'=>$riels,
							'user_create'=>$this->userCrea,
							'date_create'=>date('Y-m-d')
						);
			}

			$query=$this->db->insert("tbl_payment",$data1);
			if($query)
			{	foreach ($check_info as $value)
				{	$data2 = array(
						'pay_code'=>$pay_code,
						'room_id'=>$value->room_id,
						'price'=>$value->price
					);
					$room_id=$value->room_id;
					$query=$this->db->insert("tbl_payment_detail",$data2);
				}
			}
			if($query)
			{	
				$array = array('check_in_status'=>'check-in');
				$this->db->where("guest_code",$guest_code);
				$query=$this->db->update("tbl_check_in",$array);
				if($query)
				{	
					$array = array('status'=>'busy');
					$this->db->where("room_id",$room_id);
					$query=$this->db->update("tbl_room",$array);
					if($query=TRUE){ return TRUE;}
				}
			}	
		}
	}
	public function get_reciept_num()
	{	
		$query = $this->db->query("SELECT receipt_num FROM tbl_payment ORDER BY pay_id DESC; ");
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