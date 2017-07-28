<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class MainController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Main_m');
	}
	function index()
	{
		$data["booking"]=$this->Main_m->index();
		$data["check_in"]=$this->Main_m->check_in();
		$data["check_out"]=$this->Main_m->check_out();
		$data["all_room"]=$this->Main_m->room_status();
		$data["room_book"]=$this->Main_m->room_status("booking");
		$data["room_check_in"]=$this->Main_m->room_status("check-in");
		$data["busy"]=$this->Main_m->room_status("busy");
		$data["free"]=$this->Main_m->room_status("free");
		$data["prepare"]=$this->Main_m->room_status("prepare");
		$data["repair"]=$this->Main_m->room_status("repair");
		$data["grand_total"]=$this->Main_m->grand_total();
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/main',$data);
		$this->load->view('template/footer');
	}
}
?>