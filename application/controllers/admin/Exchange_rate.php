<?php
class Exchange_rate extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Exchange Rate';
		$this->page_redirect="admin/Exchange_rate";								
		$this->load->model("Exchange_rate_m");
	}
	public function index()
	{		$row=$this->Exchange_rate_m->index();
		$this->load->view('template/Header');
		$this->load->view('template/Left');		
		$data['pageHeader'] = $this->pageHeader;
		$data["action_url"]=array(0=>"{$this->page_redirect}/add",1=>"{$this->page_redirect}/edit",2=>"{$this->page_redirect}/delete"/*3=>"{$this->page_redirect}/change_password"*/);							
		$data["tbl_hdr"]=array("Amount","From","To","Value","User Create","Date Create","User Update","Date Create");		
				
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$data["tbl_body"][$i]=array(
										$value->amount,
										$value->from,
										$value->to,
										$value->value,										
										$value->user_create,
										$value->date_create,
										$value->user_update,
										$value->date_update,
										$value->ex_id
									);
			$i=$i+1;
			endforeach;
		}
		$this->load->view('admin/Page_view',$data);
		$this->load->view('template/Footer');
	}
	public function validation()
	{	
		$this->form_validation->set_rules('txtAmount','Amount','trim|required');
		$this->form_validation->set_rules('ddlFrom','From','trim|required');
		$this->form_validation->set_rules('ddlTo','To','trim|required');
		$this->form_validation->set_rules('txtValue','Value','trim|required');
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}
	public function add()
	{	$row="";
		$option=array(''=>'selected currentcy','dollar'=>'Dollar','riels'=>'Riels','baht'=>'Baht');	
		$data['ctrl'] = $this->createCtrl($row,$option);		
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
					$row=$this->Exchange_rate_m->add();															              
	                if($row==TRUE)
	                {	                		                	
						redirect("{$this->page_redirect}/");	
	                }	                                											
				}
			else{$this->add();}		
		}
	}
	public function edit($id="")
	{	$option=array(''=>'selected currentcy','dollar'=>'Dollar','riels'=>'Riels','baht'=>'Baht');	
		if($id!="")
		{	
			$row=$this->Exchange_rate_m->index($id);		
			if($row==TRUE)
			{	
				$data['ctrl'] = $this->createCtrl($row,$option);			
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
				$row=$this->Exchange_rate_m->edit($id);	
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
			$row=$this->Exchange_rate_m->delete($id);
			if($row==TRUE){redirect("{$this->page_redirect}/");}
		}
		else{return FALSE;}
	}
	public function createCtrl($row="",$option)
		{	
			if($row!="")
			{			
				$row1=$row->amount;
				$row2=$row->from;
				$row3=$row->to;
				$row4=$row->value;
			}											
			//$ctrl = array();
			$ctrl = array(							
						array(
								'type'=>'text',
								'name'=>'txtAmount',
								'id'=>'txtAmount',									
								'value'=>$row==""? set_value("txtAmount") : $row1,					
								'placeholder'=>'Enter amount...',									
								'class'=>'form-control',
								'label'=>'Amount'																							
							),
						array(
							'type'=>'dropdown',
							'name'=>'ddlFrom',
							'option'=>$option,
							'selected'=>$row==""? NULL : $row2,																		
							'class'=>'class="form-control"',
							'label'=>'From'
							),	
						array(
							'type'=>'dropdown',
							'name'=>'ddlTo',
							'option'=>$option,
							'selected'=>$row==""? NULL : $row3,																		
							'class'=>'class="form-control"',
							'label'=>'To'
							),		
						array(
								'type'=>'text',
								'name'=>'txtValue',
								'id'=>'txtValue',									
								'value'=>$row==""? set_value("txtValue") : $row4,					
								'placeholder'=>'Enter amount...',									
								'class'=>'form-control',
								'label'=>'Value'																							
							)
					);
					return $ctrl;
		}
}
?>