<?php
class Banner_m extends CI_Model
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
			$this->db->order_by('b_id', 'DESC');
			$query=$this->db->get("tbl_banner");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$this->db->where("b_id",$id);
			$query=$this->db->get("tbl_banner");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function get_banner()
	{
		$query = $this->db->query("SELECT title,descr,img FROM tbl_banner ORDER BY b_id DESC");
		if($query->num_rows()>0){return $query->row();}	
	}
	public function add()
	{
		$data= array(
						"title" => $this->input->post("txtTitle"),
						"descr" => $this->input->post("txtDescr"),
						"img" =>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",					
						"user_create" => $this->userCrea,
						"date_create" => date('Y-m-d')
						 );
						$query=$this->db->insert("tbl_banner",$data);		
						if($query){return $query;}
	}
	public function edit($id)
	{
		if($id!="")
		{
			if(!empty($this->input->post('txtImgName')))
			{	  	
				$row=$this->index($id);						
				unlink("assets/uploads/".$row->img);	
				$data= array(							
						"title" => $this->input->post("txtTitle"),
						"descr" => $this->input->post("txtDescr"),
						"img" =>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",					
						"user_update" => $this->userCrea,
						"date_update" => date('Y-m-d')
						 );	
			}
			else
			{
				$data= array(	
						"title" => $this->input->post("txtTitle"),
						"descr" => $this->input->post("txtDescr"),											
						"user_update" => $this->userCrea,
						"date_update" => date('Y-m-d')
						 );
			}	
			$this->db->where("b_id",$id);
			$query=$this->db->update("tbl_banner",$data);
			if($query==TRUE){return TRUE;}
		}				
	}
	public function delete($id)
	{
		if($id==TRUE)
		{	
			$row=$this->index($id);			
			unlink("assets/uploads/".$row->acc_photo);					
			$this->db->where("b_id",$id);
			$query=$this->db->delete("tbl_banner");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>