<?php
class Room_type_m extends CI_Model
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
			$this->db->order_by('room_type_id', 'DESC');
			$query=$this->db->get("tbl_room_type");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$this->db->where("room_type_id",$id);
			$query=$this->db->get("tbl_room_type");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function add($room_type_code="")
	{
		$data= array(	
						"room_type_code"=>$room_type_code,
						"room_type_name" => $this->input->post("txtRoomType"),
						"maximum_people" => $this->input->post("txtMaxPeople"),
						"user_create" => $this->userCrea,
						"date_create" => date('Y-m-d')
					);
		$query=$this->db->insert("tbl_room_type",$data);		
		if($query){return $query;}
	}
	public function check_room_type($room_type="")
	{
		if($room_type!=""){
			$query=$this->db->query("SELECT room_type_code FROM tbl_room_type WHERE room_type_name='$room_type'");
			if($query->num_rows()>0){return $query->row();}else{return false; }	
		}
	}
	public function room_type_code()
	{
		$query=$this->db->query("SELECT room_type_code FROM tbl_room_type ORDER BY room_type_code DESC LIMIT 1");
		if($query->num_rows()>0){return $query->row();}else{return false; }	
	}
	public function edit($id)
	{
		if($id!="")
		{
			$data= array(	
					"room_type_name" => $this->input->post("txtRoomType"),
					"maximum_people" => $this->input->post("txtMaxPeople"),
					"user_update" => $this->userCrea,
					"date_update" => date('Y-m-d')
					);
		$this->db->where("room_type_id",$id);
		$query=$this->db->update("tbl_room_type",$data);
		if($query==TRUE){return TRUE;}
		}				
	}
	public function delete($id)
	{
		if($id==TRUE)
		{	
			$this->db->where("room_type_id",$id);
			$query=$this->db->delete("tbl_room_type");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>