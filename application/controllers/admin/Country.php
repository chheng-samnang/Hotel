<?php
class Country extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Country';
		$this->page_redirect="admin/Country";								
		$this->load->model("Country_m");
	}
	public function index()
	{		
		$this->load->view('template/Header');
		$this->load->view('template/Left');		
		$data['pageHeader'] = $this->pageHeader;
		$data["action_url"]=array(0=>"{$this->page_redirect}/add",1=>"{$this->page_redirect}/edit",2=>"{$this->page_redirect}/delete"/*3=>"{$this->page_redirect}/change_password"*/);							
		$data["tbl_hdr"]=array("Country Name","User Create","Date Create","User Update","Date Create");		
		$row=$this->Country_m->index();		
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$data["tbl_body"][$i]=array(
										$value->coun_name,
										$value->user_create,
										$value->date_create,
										$value->user_update,
										$value->date_update,
										$value->coun_id
									);
			$i=$i+1;
			endforeach;
		}
		$this->load->view('admin/Page_view',$data);
		$this->load->view('template/Footer');
	}
	public function validation()
	{	
		$this->form_validation->set_rules('txtCountryName','Location','trim|required');
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}
	public function add()
	{	
		$data['ctrl'] = $this->createCtrl();		
		$data['action'] = "{$this->page_redirect}/add_value";
		$data['pageHeader'] = $this->pageHeader;		
		$data['cancel'] = $this->page_redirect;
		$this->load->view('template/Header');
		$this->load->view('template/Left');
		$this->load->view('admin/Page_add',$data);
		$this->load->view('template/Footer');		
	}
	public function add_value()
	{
		if(isset($_POST["btnSubmit"]))
		{
			if($this->validation()==TRUE)
				{									
					$row=$this->Country_m->add();															              
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
			$row=$this->Country_m->index($id);			
			if($row==TRUE)
			{	
				$data['ctrl'] = $this->createCtrl($row);			
				$data['action'] = "{$this->page_redirect}/edit_value/{$id}";
				$data['pageHeader'] = $this->pageHeader;		
				$data['cancel'] = $this->page_redirect;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view("admin/page_edit",$data);
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
				$row=$this->Country_m->edit($id);	
				if($row==TRUE)
	            {	                		                	
					redirect("{$this->page_redirect}/");	
	            }																					
			}
			else{$this->edit($id);}			
		}
	}	
	public function delete($id="")
	{
		if($id!="")
		{
			$row=$this->Country_m->delete($id);
			if($row==TRUE){redirect("{$this->page_redirect}/");}
		}
		else{return FALSE;}
	}
	public function createCtrl($row="")
	{
		if($row!="")
		{			
			$row1=$row->coun_name;
		}											
		//$ctrl = array();
		$ctrl = array(							
					array(
							'type'=>'text',
							'name'=>'txtCountryName',
							'id'=>'txtCountryName',									
							'value'=>$row==""? set_value("txtCountryName") : $row1,					
							'placeholder'=>'Enter Country here...',									
							'class'=>'form-control',
							'label'=>'Country'									
						)
				);
				return $ctrl;
	}
}
?>