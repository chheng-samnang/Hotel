<?php
class Location_m extends CI_Model
{			
	public function __construct()
	{
		parent::__construct();					
	}
	public function index($id="")
	{
		if($id=="")
		{
			$this->db->order_by('loc_id', 'DESC');
			$query=$this->db->get("tbl_location");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$this->db->where("loc_id",$id);
			$query=$this->db->get("tbl_location");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	
	
}
?>