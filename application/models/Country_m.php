<?php
class Country_m extends CI_Model
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
			$this->db->order_by('coun_id', 'DESC');
			$query=$this->db->get("tbl_country");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$this->db->where("coun_id",$id);
			$query=$this->db->get("tbl_country");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function add()
	{
		$data= array(						
						"coun_name" => $this->input->post("txtCountryName"),						
						"user_create" => $this->userCrea,
						"date_create" => date('Y-m-d')
						 );
		$query=$this->db->insert("tbl_country",$data);		
		if($query){return $query;}
	}
	public function edit($id)
	{
		if($id==TRUE)
		{			
			$data= array(
					"coun_name" => $this->input->post("txtCountryName"),								
					"user_update" => $this->userCrea,
					"date_update" => date('Y-m-d')
					 );				
			$this->db->where("coun_id",$id);
			$query=$this->db->update("tbl_country",$data);
			if($query==TRUE){return $query;}
		}				
	}
	public function delete($id)
	{
		if($id==TRUE)
		{						
			$this->db->where("coun_id",$id);
			$query=$this->db->delete("tbl_country");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>