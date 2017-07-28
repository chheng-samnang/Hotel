<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
	class Home extends CI_Controller 
	{
		private $thumbnail_url="";
		function __construct(){
			parent::__construct();
			$this->load->model('Contact_us_m');
			$this->load->model('About_us_m');
			//don't delete below
			$this->load->model('Banner_m');
      		$this->load->model('Home_m');
      		$this->load->model('Room_m');
      		$this->load->model("Room_type_m");
		}	
		public function index()
		{	$data["room_type"]=$this->Room_type_m->index();
			$data1["banner_info"]=$this->Banner_m->get_banner();
			$data2["room_info"]= $this->Room_m->index();
			$this->load->view("template_frontend/Herder_and_top",$data); 
			$this->load->view("template_frontend/Slide",$data1); 
			$this->load->view("home",$data2);
			$this->load->view("template_frontend/Footer"); 
		}	
		public function room_detail($id="")
		{	
			$data["room_detail"]= $this->Room_m->index($id);
			$data["room_type"]=$this->Room_type_m->index();
			$data["similer_room"]=$this->Room_m->similer_room($id);
			$this->load->view("template_frontend/Herder_and_top"); 
			$this->load->view("Room_detail",$data);
			$this->load->view("template_frontend/Footer");
		}
		public function search_room($id)
		{	$data["room_type"]=$this->Room_type_m->index();
			$data2["room_info"]= $this->Room_m->search_room($id);
			$data1["banner_info"]=$this->Banner_m->get_banner();
			$this->load->view("template_frontend/Herder_and_top",$data); 
			$this->load->view("template_frontend/Slide",$data1); 
			$this->load->view("home",$data2);
			$this->load->view("template_frontend/Footer");
		}									
		public function about()
		{
			$data["room_type"]=$this->Room_type_m->index();
			$data2["about_info"]= $this->About_us_m->get_about();
			$this->load->view("template_frontend/Herder_and_top",$data); 
			$this->load->view("About_us",$data2);
			$this->load->view("template_frontend/Footer"); 
		}
		public function contact_us()
		{	$data["contant_info"]=$this->Contact_us_m->get_contact();
			$this->load->view("template_frontend/Herder_and_top",$data);
			$this->load->view('Contact_us',$data);
			$this->load->view('template_frontend/Footer');
		}	
	}//end class
	