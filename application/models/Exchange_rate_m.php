<?php
class Exchange_rate_m extends CI_Model
{			
	var $userCrea;		
	public function __construct()
	{
		parent::__construct();
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";				
	}
	public function index($id="")
	{
		if($id=="")
		{
			$this->db->order_by('ex_id', 'DESC');
			$query=$this->db->get("tbl_exchange_rate");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$this->db->where("ex_id",$id);
			$query=$this->db->get("tbl_exchange_rate");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function add()
	{

		$data= array(		
						"amount" => $this->input->post("txtAmount"),
						"from" => $this->input->post("ddlFrom"),
						"to" => $this->input->post("ddlTo"),	
						"value" => $this->input->post("txtValue"),	
						"user_create" => $this->userCrea,
						"date_create" => date('Y-m-d')
						 );
		$query=$this->db->insert("tbl_exchange_rate",$data);		
		if($query){return $query;}
	}
	public function edit($id)
	{
		if($id==TRUE)
		{			
			$data= array(		
						"amount" => $this->input->post("txtAmount"),
						"from" => $this->input->post("ddlFrom"),
						"to" => $this->input->post("ddlTo"),	
						"value" => $this->input->post("txtValue"),	
						"user_update" => $this->userCrea,
						"date_update" => date('Y-m-d')
						 );			
			$this->db->where("ex_id",$id);
			$query=$this->db->update("tbl_exchange_rate",$data);
			if($query==TRUE){return $query;}
		}				
	}
	public function delete($id)
	{
		if($id==TRUE)
		{						
			$this->db->where("ex_id",$id);
			$query=$this->db->delete("tbl_exchange_rate");
			if($query==TRUE){return $query;}
		}
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