<?php
class Room_photo_m extends CI_Model
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
			$query = $this->db->query("SELECT * FROM tbl_room_photo p INNER JOIN tbl_room r ON p.room_id=r.room_id GROUP BY p.photo ASC");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$query = $this->db->query("SELECT * FROM tbl_room_photo p INNER JOIN tbl_room r ON p.room_id=r.room_id WHERE room_photo_id='$id'");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function add()
	{

		$data= array(	
					"room_id" => $this->input->post("RoomName"),
					'photo'=>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
					"user_create" => $this->userCrea,
					"date_create" => date('Y-m-d'));
		$query=$this->db->insert("tbl_room_photo",$data);		
		if($query){return $query;}
	}

	public function edit($id)
	{
		if($id!="")
		{
			if($this->input->post("txtImgName")=="")
			{
				$data= array(	
				"room_id" => $this->input->post("RoomName"),
				);
			}else{
				$data= array(	
					"room_id" => $this->input->post("RoomName"),
					"photo" => $this->input->post("txtImgName"),
				);	
			}
			$this->db->where("room_photo_id",$id);
			$query=$this->db->update("tbl_room_photo",$data);
			if($query==TRUE){return TRUE;}
		}				
	}
	public function delete($id)
	{
		if($id==TRUE)
		{	
			$this->db->where("room_photo_id",$id);
			$query=$this->db->delete("tbl_room_photo");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>