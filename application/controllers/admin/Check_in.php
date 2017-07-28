<?php
class Check_in extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Check_in_m");
		$this->load->model("Location_m");
		$this->load->model("Country_m");
		$this->load->model("Room_type_m");
		$this->load->model("Exchange_rate_m");	
		$this->load->model("Receipt_m");
	}	
	public function index()
	{			$this->load->view('template/Header');
		$this->load->view('template/Left');		
		$data["check_list"]=$this->Check_in_m->index(); 		
		$this->load->view('admin/check_in/Check_in_list',$data);
		$this->load->view('template/Footer1');
	}	

	public function check_out($guest_code="")
	{	
		if($guest_code!=""){
				$row=$this->Check_in_m->check_out($guest_code);
				if($row=true){
					redirect("admin/Check_in");
				}
		}
	}
	
	public function validation()
	{	
		$this->form_validation->set_rules('txtGuestName','Guest Name','trim|required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('txtPhone','Phone','trim|required|regex_match[/^[0-9\-\+]{9,15}+$/]');
		$this->form_validation->set_rules('txtCheckIn','Check-In','required');
		$this->form_validation->set_rules('txtCheckOut','Check-Out','required');
		if($this->form_validation->run()==TRUE){return TRUE;}

		else{return FALSE;}
	}
	public function validation1()
	{
		$this->form_validation->set_rules('txtGuestName','Guest Name','trim|required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('txtPhone','Phone','trim|required|regex_match[/^[0-9\-\+]{9,15}+$/]');
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}

	public function change_room($id)
	{	if($id!="")
		{
			$data["check_info"]=$this->Check_in_m->chang_room($id);
			$this->load->view("template/Header");
			$this->load->view("admin/check_in/Change_room",$data);
			$this->load->view("template/Footer1");
		}
	}
	public function check_booking($id="")
	{	
		$data["loc_info"]=$this->Location_m->index();
		$data["coun_info"]=$this->Country_m->index();
		$data["room_type"]=$this->Room_type_m->index();				
		$data["booking_detail"]=$this->Check_in_m->booking_detail($id);
		$data["guest_detail"]=$this->Check_in_m->guest($id);
		$this->load->view('template/Header');
		$this->load->view('template/left');
		$this->load->view('admin/check_in/Check_booking',$data);	
		$this->load->view('template/footer1');
	} /*----=====select from booking======-------*/
	public function check_in()
	{
		$data["loc_info"]=$this->Location_m->index();
		$data["coun_info"]=$this->Country_m->index();
		$data["room_type"]=$this->Room_type_m->index();
		$this->load->view('template/Header');
		$this->load->view('admin/check_in/Check_in',$data);
		$this->load->view('template/footer1');
	}
	public function check_in_detail($id="")
	{	
		$data["detail"]=$this->Check_in_m->index($id);
		$data["check_in_price"]=$this->Check_in_m->check_in_price($id);/* select form payment_detail*/
		$data["guest_detail"]=$this->Check_in_m->guest_detail($id);
		$this->load->view('template/Header');
		$this->load->view('template/Left');
		$this->load->view('admin/check_in/Check_in_detail',$data);
		$this->load->view('template/footer1');
	}
	public function add_check_in_booking()
	{	
		if(isset($_POST["btnCheck"])){
			if($this->validation1()==TRUE)
			{	$guest_code=uniqid();
				$row=$this->Check_in_m->add_check_in($guest_code);
				if($row==TRUE){
					$this->get_pay_info($guest_code);
				}
			}else{$this->check_booking($this->input->post('txtBookId'));}
		}
	}/*data from boking */
	public function add_check_in()
	{	if($this->validation()==TRUE)
		{	$guest_code=uniqid();
			$row=$this->Check_in_m->add_check_in($guest_code);
			if($row==TRUE){
				$this->session->guest_code = $guest_code;
				redirect("admin/Check_in/get_pay_info");
			}
		}else{$this->check_in();}
	}/*=====data from check-In form=======*/

	public function get_pay_info($guest_code="")
	{	$guest_code=$this->session->guest_code;
		$data["receipt"]=$this->Check_in_m->get_reciept_num();
		$data["exchang_rate"]=$this->Exchange_rate_m->get_riels();
		$data["check_in_info"]=$this->Check_in_m->check_in_info($guest_code);
		$data["guest_info"]=$this->Check_in_m->guest_info($guest_code);
		$this->load->view('template/Header');
		$this->load->view('template/Left');
		$this->load->view("admin/payment/Payment",$data);
		$this->load->view('template/footer1');
	}/* process after add check_in*/

	public function payment()
	{	
		if($guest_code=$this->input->post("guest_code"))
		{	
			$row=$this->Check_in_m->payment($guest_code);
			if($row==true){
				$this->session->unset_userdata('guest_code');
				redirect("admin/Check_in/index");
			}
		}
	}
}
?>