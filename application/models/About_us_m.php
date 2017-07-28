<?php
class About_us_m extends CI_Model
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
			$this->db->order_by('ab_id', 'DESC');
			$query=$this->db->get("tbl_about");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$this->db->where("ab_id",$id);
			$query=$this->db->get("tbl_about");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function get_about()
	{
		$query=$this->db->query("SELECT * FROM tbl_about ORDER BY ab_id DESC LIMIT 1");
		if($query->num_rows()>0){return $query->row();}
	}
	public function add()
	{
		$data= array(						
					"descr" => $this->input->post("txtDesc"),
					"services"	=>$this->input->post("txtService"),
					"history"	=>$this->input->post("txtHistory"),
					"photo" =>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",									
					"user_create" => $this->userCrea,
					"date_create" => date('Y-m-d')
					 );
		$query=$this->db->insert("tbl_about",$data);		
		if($query){return $query;}
	}
	public function edit($id)
	{	
		if($id==TRUE)
		{
			if(!empty($this->input->post('txtImgName')))
			{
				$row=$this->index($id);						
				unlink("assets/uploads/".$row->photo);			
				$data= array(
						"descr" => $this->input->post("txtDesc"),
						"services"	=>$this->input->post("txtService"),
						"history"	=>$this->input->post("txtHistory"),	
						"photo" =>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",							
						"user_update" => $this->userCrea,
						"date_update" => date('Y-m-d')
						);		
			}else
			{
				$data= array(
						"descr" => $this->input->post("txtDesc"),
						"services"	=>$this->input->post("txtService"),
						"history"	=>$this->input->post("txtHistory"),	
						"user_update" => $this->userCrea,
						"date_update" => date('Y-m-d')
						);	
			}
			$this->db->where("ab_id",$id);
			$query=$this->db->update("tbl_about",$data);
			if($query==TRUE){return $query;}
		}
	}
	public function delete($id)
	{
		if($id==TRUE)
		{						
			$this->db->where("ab_id",$id);
			$query=$this->db->delete("tbl_about");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>