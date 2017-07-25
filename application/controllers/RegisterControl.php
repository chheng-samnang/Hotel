<?php
	class RegisterControl extends CI_Controller
	{
		public function __construct()
		{	
			parent::__construct();
			$this->pageHeader='Member';		
			$this->page_redirect="registerControl";							
			$this->load->model("front/account_m","am");
			$this->load->model('front/advertising_m');			
			$this->load->library("image_lib");
			$this->load->helper(array('captcha'));
			 $this->load->library('form_validation'); 
		}
		function index($error=""){
			$data["error"]=$error;
			$cap_id= mt_rand(100, 113);
			$data["captcha"]=$this->am->captcha($cap_id);
			$row=$this->am->account_code();
			if($row==TRUE){ $data["acc_code"] = $row->acc_code;}else{
				$data["acc_code"] ='KJ-000000';
			}
			$data['action'] = "{$this->page_redirect}/add";		
			$data['pageHeader'] = $this->pageHeader;
			$data['cancel'] = "{$this->page_redirect}/acc_log";	
			$data["ads_top"]=$this->advertising_m->ads_top();
			$data["acc_head"]=$this->am->acc_head();
			$this->load->view("template_frontend/herder_and_nav",$data);
			$this->load->view('register/register',$data);
			$this->load->view('template/footer1');
		}// redirect to register page
		function add()
		{	
			$this->form_validation->set_rules('txtAccPass',' password','trim|required');	
			$this->form_validation->set_rules('txtConPasswd','Confirm','trim|required');
			$this->form_validation->set_rules('txtAccName','Name','trim|required');	
			$this->form_validation->set_rules('txtAddr','Address','trim|required');
			$this->form_validation->set_rules('txtEmail','Email','trim|required');	
			$this->form_validation->set_rules('txtDesc','Description','trim|required');
			$this->form_validation->set_rules('txtPhone','Number','numeric|required');	
			if($this->form_validation->run()==true){
				$cap_id=$this->input->post("txtCap_id");
				$cap_code=$this->input->post("txtCaptcha1");
				$row=$this->am->captcha($cap_id,$cap_code);
				if($row==true){
					$result = $this->am->add();
					if($result!=""){
						$this->session->register=1;
						redirect($this->session->url);
					}
				}else{ $this->index(" Your captcha invalid"); }
			}else{$this->index();  
			}
		}
}
?>