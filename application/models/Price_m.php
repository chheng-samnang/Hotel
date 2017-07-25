<?php
class Price_m extends CI_Model
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
			$query = $this->db->query("SELECT * FROM tbl_price p INNER JOIN tbl_reason r ON p.reason_id=r.reason_id GROUP BY p.price ASC");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$query = $this->db->query("SELECT * FROM tbl_price p INNER JOIN tbl_reason r ON p.reason_id=r.reason_id WHERE price_id='$id' ");
			/*$this->db->where("price_id",$id);
			$query=$this->db->get("tbl_price");*/
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function add()
	{

		$data= array(	
					"price" => $this->input->post("txtPrice"),
					"reason_id" => $this->input->post("reason"),
					"user_create" => $this->userCrea,
					"date_create" => date('Y-m-d'));
		$query=$this->db->insert("tbl_price",$data);		
		if($query){return $query;}
	}

	public function edit($id)
	{
		if($id!="")
		{
			$data= array(	
					"price" => $this->input->post("txtPrice"),
					 );
			$this->db->where("price_id",$id);
			$query=$this->db->update("tbl_price",$data);
			if($query==TRUE){return TRUE;}
		}				
	}
	public function delete($id)
	{
		if($id==TRUE)
		{	
			$this->db->where("price_id",$id);
			$query=$this->db->delete("tbl_price");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>