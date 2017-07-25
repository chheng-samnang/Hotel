<?php
class Reason_m extends CI_Model
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
			$this->db->order_by('reason_id', 'DESC');
			$query=$this->db->get("tbl_reason");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$this->db->where("reason_id",$id);
			$query=$this->db->get("tbl_reason");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function add()
	{
		$data= array(	
					"reason_desc" => $this->input->post("txtReason"),
					"user_create" => $this->userCrea,
					"date_create" => date('Y-m-d')
					);
		$query=$this->db->insert("tbl_reason",$data);		
		if($query){return $query;}
	}

	public function edit($id)
	{
		if($id!="")
		{
			$data= array(	
					"reason_desc" => $this->input->post("txtReason"),
					"user_update" => $this->userCrea,
					"date_update" => date('Y-m-d')
					 );
			$this->db->where("reason_id",$id);
			$query=$this->db->update("tbl_reason",$data);
			if($query==TRUE){return TRUE;}
		}				
	}
	public function delete($id)
	{
		if($id==TRUE)
		{	
			$this->db->where("reason_id",$id);
			$query=$this->db->delete("tbl_reason");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>