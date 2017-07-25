<?php
class Booking extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Book';
		$this->page_redirect="admin/Booking";								
		$this->load->model("Booking_m");
		$this->load->model("Location_m");
		$this->load->model("Country_m");
		$this->load->model("Room_type_m");
	}
	public function index()
	{		
		$this->load->view('template/Header');
		$this->load->view('template/Left');		
		$data["booking_list"]=$this->Booking_m->index(); 		
		$this->load->view('admin/booking/Booking_list',$data);
		$this->load->view('template/Footer');
	}
	public function validation()
	{	
		$this->form_validation->set_rules('txtGuestName','Name','trim|required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('txtPhone','Phone','trim|required|regex_match[/^[0-9\-\+]{9,15}+$/]');
		$this->form_validation->set_rules('txtCheckIn','Check-In','trim|required');
		$this->form_validation->set_rules('txtCheckOut','Check-Out','required');
		$this->form_validation->set_rules('QtyPeople','Quanitity People','required');
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}
	public function add()
	{	
		$data["loc_info"]=$this->Location_m->index();
		$data["coun_info"]=$this->Country_m->index();
		$data["room_type"]=$this->Room_type_m->index();				
		$data['ctrl'] = $this->createCtrl($row="");		
		$this->load->view('template/Header');
		$this->load->view('admin/booking/Booking_v',$data);	
		$this->load->view('template/footer1');

	}
	public function add_value()
	{		
		if($this->validation()==TRUE)
		{
			$data = json_decode($this->input->post('str'));
			$row=$this->Booking_m->add_booking($data);
			if($row==TRUE){
				$this->index();
			}
		}else{$this->add();}
	}
	public function edit($id="")
	{		
		if($id!="")
		{
			$row=$this->Room_type_m->index($id);			
			if($row==TRUE)
			{	
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view("admin/booking/Booking_v",$data);
				$this->load->view('template/footer1');
			}
		}
		else{return FALSE;}
	}
	public function edit_value($id="")
	{		
		if(isset($_POST["btnSubmit"]))
		{					
			if($this->validation1()==TRUE)
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
	public function booking_detail($id)
	{	$data["guest_detail"]=$this->Booking_m->guest($id);
		$data["detail"]=$this->Booking_m->booking_detail($id);
		$this->load->view('template/Header');
		$this->load->view('template/Left');	
		$this->load->view('admin/booking/Booking_detail',$data);	
		$this->load->view('template/footer1');
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
					$row1=$row->acc_code;
					$row2=$row->acc_name;
					$row3=$row->pass;
					$row4=$row->gender;
					$row5=$row->email;																
					$row6=$row->phone;
					$row7=$row->acc_photo;
					$row8=$row->acc_addr;
			}											
			//$ctrl = array();
			$ctrl = array(							
						array(
								'type'=>'text',
								'name'=>'txtRoomType',
								'id'=>'txtRoomType',									
								'value'=>$row==""? set_value("txtRoomType") : $row1,					
								'placeholder'=>'Enter room type here...',									
								'class'=>'form-control',
								'label'=>'Room Type'																							
							),
						array(
								'type'=>'text',
								'name'=>'txtMaxPeople',
								'id'=>'txtMaxPeople',									
								'value'=>$row==""? set_value("txtMaxPeople") : $row2,					
								'placeholder'=>'Enter Maximum here...',									
								'class'=>'form-control',
								'label'=>'Maximum People'																								
							),
					);
					return $ctrl;
		}
	public function createCtrl1($row="")
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