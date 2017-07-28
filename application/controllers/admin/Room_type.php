<?php
class Room_type extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Room Type';
		$this->page_redirect="admin/Room_type";								
		$this->load->model("Room_type_m");

	}
	public function index()
	{		
		$this->load->view('template/Header');
		$this->load->view('template/Left');		
		$data['pageHeader'] = $this->pageHeader;
		$data["action_url"]=array(0=>"{$this->page_redirect}/add",1=>"{$this->page_redirect}/edit",2=>"{$this->page_redirect}/delete"/*3=>"{$this->page_redirect}/change_password"*/);							
		$data["tbl_hdr"]=array("Room Type","Maximum People" ,"User Create","Date Create","User Update","Date Create");		
		$row=$this->Room_type_m->index();		
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$data["tbl_body"][$i]=array(
										$value->room_type_name,
										$value->maximum_people,
										$value->user_create,
										$value->date_create,
										$value->user_update,
										$value->date_update,
										$value->room_type_id
									);
			$i=$i+1;
			endforeach;
		}
		$this->load->view('admin/Page_view',$data);
		$this->load->view('template/Footer');
	}
	public function account_detail($id="")
	{
		$data["detail"]=$this->Account_m->index($id);		
		$data['cancel'] = $this->page_redirect;
		$this->load->view('template/Header');
		$this->load->view('template/Left');		
		$this->load->view('admin/Account_detail.php',$data);
		$this->load->view('template/Footer');	
	}
	
	public function validation()
	{	
		$this->form_validation->set_rules('txtRoomType','Room Type','trim|required');
		$this->form_validation->set_rules('txtMaxPeople','Maximum People','required');
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}
	public function validation1()
	{	

		$this->form_validation->set_rules('txtRoomType','Room Type','trim|required');
		$this->form_validation->set_rules('max_people','Maximum People','required');
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}
	public function add($error="")
	{	$data["error"]=$error;
		$data['ctrl'] = $this->createCtrl($row="");		
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
					$room_type=$this->input->post("txtRoomType");
					$room_type=$this->Room_type_m->check_room_type($room_type);							
					
					$room_type_code=$this->Room_type_m->room_type_code();

					if($room_type_code==false){$room_type_code=1;}
					else{$room_type_code=$room_type_code->room_type_code+1;}
					
					if($room_type==false)
					{
						$row=$this->Room_type_m->add($room_type_code);															              
						if($row==TRUE)
						{	                		                	
						   redirect("{$this->page_redirect}/");	
						}
					}else{$this->add("Room Type Insert already...!");}
				}
			else{$this->add();}		
		}
	}
	public function edit($id="")
	{		
		if($id!="")
		{
			$row=$this->Room_type_m->index($id);			
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
				$row=$this->Room_type_m->edit($id);	
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
			$row=$this->Room_type_m->delete($id);
			if($row==TRUE){redirect("{$this->page_redirect}/");}
		}
		else{return FALSE;}
	}
	public function createCtrl($row="")
	{	
			if($row!="")
			{			
					$row2=$row->room_type_name;
					$row3=$row->maximum_people;
			}											
			//$ctrl = array();
			$ctrl = array(		
						array(
								'type'=>'text',
								'name'=>'txtRoomType',
								'id'=>'txtRoomType',									
								'value'=>$row==""? set_value("txtRoomType") : $row2,					
								'placeholder'=>'Enter room type here...',									
								'class'=>'form-control',
								'label'=>'Room Type'																							
							),
						array(
								'type'=>'text',
								'name'=>'txtMaxPeople',
								'id'=>'txtMaxPeople',									
								'value'=>$row==""? set_value("txtMaxPeople") : $row3,					
								'placeholder'=>'Enter Maximum here...',									
								'class'=>'form-control',
								'label'=>'Maximum People'																								
							),
					);
					return $ctrl;
		}
	public function createCtrl1($row="",$option,$option1,$option2)
		{	
			if($row!="")
			{			
					$row0=$row->room_type_name;
					$row1=$row->maximum_people;
			}											
			//$ctrl = array();
			$ctrl = array(							
							array(
									'type'=>'text',
									'name'=>'txtRoomType',
									'id'=>'txtRoomType',									
									'value'=>$row==""? set_value("txtRoomType") : $row0,					
									'class'=>'form-control',
									'label'=>'Room type'																								
								),
							array(
									'type'=>'text',
									'name'=>'max_people',
									'value'=>$row==""? set_value("max_people") : $row1,
									'class'=>'form-control',
									'label'=>'Maximum People'
								),														
							);
			return $ctrl;
		}
}
?>