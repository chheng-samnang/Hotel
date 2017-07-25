<?php
class Room_m extends CI_Model
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
			$query = $this->db->query("SELECT * FROM tbl_room AS r 
				INNER JOIN tbl_room_type AS rt ON rt.room_type_code=r.room_type_code");
				if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$query = $this->db->query("SELECT * FROM tbl_room AS r 
				INNER JOIN tbl_room_type AS rt ON r.room_type_code=rt.room_type_code 
			 	WHERE room_id='$id'");
				if($query->num_rows()>0){return $query->row();}
		}
	}
	public function check($check="")
	{
			$this->db->where("room_name",$check);
			$query=$this->db->get("tbl_room");
			if($query->num_rows()>0){ return $query->row();}
	}
	public function add()
	{
		$data= array(	
						"room_type_code" => $this->input->post("txtRoomType"),
						"price" =>$this->input->post("txtPrice"),
						"room_name" => $this->input->post("txtRoomName"),
						"remark" => $this->input->post("txtDesc"),
						'photo'=>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
						"status" =>$this->input->post("txtRoomStatus"),
						"user_update" => $this->userCrea,
						"date_update" => date('Y-m-d')
					);
		$query=$this->db->insert("tbl_room",$data);		
		if($query){return $query;}
	}
	public function edit($id)
	{
		if($id!="")
		{  	
			$row=$this->index($id);
			if($row->status=='free' OR $row->status=='prepea'){
				$room_status=$this->input->post("txtRoomStatus");
			}else{ $room_status= $row->status;}

			if(!empty($this->input->post('txtImgName')))
			{	  	
				unlink("assets/uploads/".$row->acc_photo);	
				$data= array(	
						"price" =>$this->input->post("txtPrice"),
						"room_name" => $this->input->post("txtRoomName"),
						"remark" => $this->input->post("txtDesc"),
						"photo"=>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
						"status" =>$room_status,
						"user_update" => $this->userCrea,
						"date_update" => date('Y-m-d')
					);
			}
			else
			{
				$data= array(	
						"price" =>$this->input->post("txtPrice"),
						"room_name" => $this->input->post("txtRoomName"),
						"remark" => $this->input->post("txtDesc"),
						"status" =>$room_status,
						"user_update" => $this->userCrea,
						"date_update" => date('Y-m-d')
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