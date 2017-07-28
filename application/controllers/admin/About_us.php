<?php
class About_us extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='About us';
		$this->page_redirect="admin/About_us";								
		$this->load->model("About_us_m");
	}
	public function index()
	{		
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$data['pageHeader'] = $this->pageHeader;
		$data["action_url"]=array(0=>"{$this->page_redirect}/add",1=>"{$this->page_redirect}/edit",2=>"{$this->page_redirect}/delete"/*,"{$this->page_redirect}/change_password"*/);							
		$data["tbl_hdr"]=array("Description","Service","History","User create","Date create","User update","Date update");		
		$row=$this->About_us_m->index();		
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$data["tbl_body"][$i]=array(																				
										$value->descr,
										$value->history,
										$value->services,																				
										$value->user_create,
										date("d-m-Y",strtotime($value->date_create)),							
										$value->user_update,
										$value->date_update==NULL?NULL:date("d-m-Y",strtotime($value->date_update)),
										$value->ab_id
									);
			$i=$i+1;
		endforeach;
		}											
		$this->load->view('admin/Page_view',$data);
		$this->load->view('template/footer');
	}
	public function validation()
	{		
		$this->form_validation->set_rules('txtDesc','Description','trim|required');		
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}	
	public function add()
	{			
		$data['ctrl'] = $this->createCtrl($row="");		
		$data['action'] = "{$this->page_redirect}/add_value";
		$data['pageHeader'] = $this->pageHeader;		
		$data['cancel'] = $this->page_redirect;
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/page_add',$data);
		$this->load->view('template/footer');		
	}
	public function add_value()
	{
		if(isset($_POST["btnSubmit"]))
		{
			
			if($this->validation()==TRUE)
				{									
					$row=$this->About_us_m->add();															              
	                if($row==TRUE)
	                {	                		                	
						redirect("{$this->page_redirect}/");	
	                }	                                																			
				}
			else{$this->add();}		
		}
	}
	public function edit($id="")
	{		
		if($id!="")
		{
			$row=$this->About_us_m->index($id);			
			if($row==TRUE)
			{																														
				$data['ctrl'] = $this->createCtrl($row);			
				$data['action'] = "{$this->page_redirect}/edit_value/{$id}";
				$data['pageHeader'] = $this->pageHeader;		
				$data['cancel'] = $this->page_redirect;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view("admin/Page_edit",$data);
				$this->load->view('template/footer');
			}
		}
		else{return FALSE;}
	}
	public function edit_value($id="")
	{		
		if(isset($_POST["btnSubmit"]))
		{						
			if($this->validation()==TRUE)
			{	
				$row=$this->About_us_m->edit($id);	
				if($row==TRUE)
	            {	                		                	
					redirect("{$this->page_redirect}/");	
	            }																												 																				            	                	                                												
			}
			else 
			{	
				$this->edit($id);													
			}			
		}
	}	

	public function delete($id="")
	{
		if($id!="")
		{
			$row=$this->About_us_m->delete($id);
			if($row==TRUE){redirect("{$this->page_redirect}/");}
		}
		else{return FALSE;}
	}
	public function createCtrl($row="")
		{	
			if($row!="")
			{	$row1=$row->descr;	
				$row2=$row->services;								
				$row3=$row->history;
				$row4=$row->photo;																																	
			}											
			//$ctrl = array();
			$ctrl = array(																					
							array(
									'type'=>'textarea',
									'name'=>'txtDesc',
									'value'=>$row==""? set_value("textarea") : $row1,
									'label'=>'Description'
								),
							array(
									'type'=>'textarea',
									'name'=>'txtService',
									'value'=>$row==""? set_value("textarea") : $row2,
									'label'=>'Service'
								),
							array(
									'type'=>'textarea',
									'name'=>'txtHistory',
									'value'=>$row==""? set_value("textarea") : $row3,
									'label'=>'History'
								),
							array(
									'type'=>'upload',
									'name'=>'txtImgName',
									'id'=>'txtImgName',									
									'value'=>$row==""? set_value("txtImgName"):$row4,		
									'class'=>'form-control',
									'label'=>'Photo',
									"img"=>$row==""? set_value("txtUpload") :"<img class='img-thumbnail' src='".base_url("assets/uploads/".$row4)."' style='width:100px;' />",																																		
								),
							);
			return $ctrl;
		}
}
?>