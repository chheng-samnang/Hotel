<?php
class Change_room extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Change_room_m");
		$this->load->model("Check_in_m");
		$this->load->model("Location_m");
		$this->load->model("Country_m");
		$this->load->model("Room_type_m");
		$this->load->model("Exchange_rate_m");
	}
	public function index($id="")
	{	$data["exchang_rate"]=$this->Exchange_rate_m->get_riels();	
		$this->load->view('template/Header');
		$this->load->view('template/Left');		
		$data["check_in_id"]=$id;
		$data["room_info"]=$this->Change_room_m->get_room_info($id);
		$data["guest_info"]=$this->Change_room_m->guest_info($id);
		$this->load->view('admin/Change_room/Change_room',$data);
		$this->load->view('template/Footer1');
	}
	public function change_room()
	{	if($this->input->post("old_room_id")!=$this->input->post("new_room_id"))
		{
			$row=$this->Change_room_m->change_room();
			if($row==TRUE)
			{	$msg="The room was changed​​​ successful..!";
				redirect("admin/Check_in/index");
			}
		}else{	
			$msg="The room was not changed​​​..!";
			redirect("admin/Check_in/index");
		}
	}
}
?>