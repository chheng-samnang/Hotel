<?php
class Booking_m extends CI_Model
{			
	var $userCrea;		
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("security");
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";				
	}
	public function index($id="")
	{
		if($id=="")
		{						
			$query = $this->db->query("SELECT * FROM tbl_booking AS b LEFT JOIN tbl_booking_detail AS bd
			ON b.booking_code=bd.booking_code WHERE book_status='booking' GROUP BY guest_name  ASC ");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{	
			$query = $this->db->query("SELECT * FROM tbl_booking AS b LEFT JOIN tbl_booking_detail AS bd
			ON b.booking_code=bd.booking_code
			LEFT JOIN tbl_room AS r ON bd.room_id=r.room_id		
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
	public function guest($id="")
	{
		if($id!="")
		{
			$query = $this->db->query("SELECT guest_name,gender,loc_name,coun_name,phone,email,address  FROM 
		 		tbl_booking_detail AS bd INNER JOIN 
		 	    tbl_room AS r ON bd.room_id=r.room_id INNER JOIN
		 		tbl_booking AS b ON bd.booking_code=b.booking_code INNER JOIN 
		 		tbl_location AS l ON b.loc_id=b.loc_id INNER JOIN 
		 		tbl_country AS c ON b.coun_id=c.coun_id  
				WHERE book_id='$id'");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function check($check="")
	{
			$this->db->where("room_name",$check);
			$query=$this->db->get("tbl_room");
			if($query->num_rows()>0){ return TRUE;}
	}
	public function add_booking($data1)
	{		$booking_code=date('YmdHis');
		
		$data= array(	
						"booking_code" =>$booking_code,
						"book_status"=>"booking",
						"guest_name" => $this->input->post("txtGuestName"),
						"gender" =>$this->input->post("gender"),
						"loc_id" =>$this->input->post("location"),
						"coun_id" => $this->input->post("country"),
						"phone" => $this->input->post("txtPhone"),
						"email" => $this->input->post("txtEmail"),
						"address" => $this->input->post("addr"),
						"user_create" => $this->userCrea,
						"date_create" => date('Y-m-d')
					);
		$query=$this->db->insert("tbl_booking",$data);
		if($query){
			foreach ($data1 as $row){
				$value = array(
							'room_id'=>$row[0],
							'booking_code'=>$booking_code,
							'check_in'=>$row[5],
							'check_out'=>$row[6],
							'quantity_people'=>$row[7],
					);
				$query1=$this->db->insert('tbl_booking_detail',$value);
			}
			if($query1){return $query;}
		}

	}
	public function edit($id)
	{
		if($id!="")
		{
			if(!empty($this->input->post('txtImgName')))
			{	  	
				$row=$this->index($id);						
				unlink("assets/uploads/".$row->acc_photo);	
				$data= array(							
						"acc_name" => $this->input->post("txtAccName"),
						"email" => $this->input->post("txtEmail"),
						"phone" => $this->input->post("txtPhone"),
						"address" => $this->input->post("txtAddr"),
						"acc_photo" =>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",					
						 );	
			}
			else
			{
				$data= array(	
						"acc_code" => $this->input->post("txtAccCode"),
						"acc_name" => $this->input->post("txtAccName"),
						"acc_company" => $this->input->post("txtCompany"),						
						"acc_gender" => $this->input->post("ddlGender"),
						"acc_email" => $this->input->post("txtEmail"),
						"acc_phone" => $this->input->post("txtPhone"),
						"acc_addr" => $this->input->post("txtAddr"),
						"acc_website" => $this->input->post("txtWebsite"),						
						"acc_status" => $this->input->post("ddlStatus"),												
						"acc_desc" => $this->input->post("txtDesc"),												
						"user_updt" => $this->userCrea,
						"date_updt" => date('Y-m-d')
						 );
			}	
			$this->db->where("room_id",$id);
			$query=$this->db->update("tbl_room",$data);
			if($query==TRUE){return TRUE;}
		}				
	}
	
	public function delete($id)
	{
		if($id==TRUE)
		{	
			$this->db->where("room_id",$id);
			$query=$this->db->delete("tbl_room");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>