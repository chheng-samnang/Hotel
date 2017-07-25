<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
	class Home extends CI_Controller 
	{
		private $thumbnail_url="";
		function __construct(){
			parent::__construct();
			$this->load->model('front/account_m','acc');
			//$this->load->model('front/contact_us_m','ct');
			//$this->load->model('front/about_us_m','au');
			//$this->load->model('front/ads_setup_m',"ads");
			//$this->load->model('front/promotion_m',"pt");
			//$this->load->model('front/FAQ_m');
			//$this->load->model('front/cv_setup_m');
			//$this->load->model("front/search_cv_setup_m");
			//$this->load->model("front/search_job_setup_m");
			//$this->load->model("front/skill_setup_m");
			//$this->load->model("front/search_skill_setup_m");
			//$this->load->model("front/job_setup_m");      		
			//don't delete below
      		//$this->load->model('front/job_m');
      		//$this->load->model('front/cv_m');
      		//$this->load->model('front/skill_m');
      		//$this->load->model('front/home_m');
      		//$this->load->model('front/advertising_m');
		}	
		public function process_payment(){$this->load->view("process_payment");}		
		
		public function index()
		{	
			$this->load->view("home");
		}										
		public function home_search()
		{
			$filter=$this->input->post("ddlFilterSearch");
			$value_search=$this->input->post("txtSearch");
			if($filter=='job'){$this->job_thumbnail($value_search);}		
			elseif($filter=='cv'){$this->cv_thumbnail($value_search);}
			elseif($filter=='skill'){$this->skill_thumbnail($value_search);}		
		}
		public function cv_thumbnail($id="")
		{	$this->session->active_id=$id;
			$data["ads_top"]=$this->advertising_m->ads_top();
			$data["acc_head"]=$this->acc->acc_head();
			$this->load->view("template_frontend/herder_and_nav",$data);
			$data['thumbnail_url']=$this->thumbnail_url="cv_c/post_cv";				
			$data['cv_category']=$this->cv_m->index();
			$data['sub_category']=$this->cv_m->sub_category($id);
			$data["right_ads"]=$this->advertising_m->right_ads();
			$data["premium_cv"]=$this->home_m->premium_cv();			
			$this->load->view('cv/cv_search_v',$data);
			$this->load->view('template_frontend/advertising',$data); 			 
			$this->load->view('template_frontend/footer');
		}
		public function job_thumbnail($id="")
		{	$this->session->active_id=$id;
			$data["acc_head"]=$this->acc->acc_head();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$this->load->view("template_frontend/herder_and_nav",$data);
			$data['thumbnail_url']=$this->thumbnail_url="job_c/post_job";
			$data['job_location']=$this->job_m->location();
			$data['job_category']=$this->job_m->index();
			$data['sub_category']=$this->job_m->sub_category($id);
			$data["right_ads"]=$this->advertising_m->right_ads();
			$data["feature_emp"]=$this->home_m->feature_emp();
			$data["feature_recruit"]=$this->home_m->feature_recruit();
			$this->load->view('job/job_search_v',$data);
			$this->load->view('template_frontend/advertising',$data);			 
			$this->load->view('template_frontend/footer');
		}
		public function skill_thumbnail($id="")
		{
			$this->session->active_id=$id;
			$data["ads_top"]=$this->advertising_m->ads_top();
			$data["acc_head"]=$this->acc->acc_head();
			$this->load->view("template_frontend/herder_and_nav",$data);
			$data['thumbnail_url']=$this->thumbnail_url="skill_c/post_skill";
			$data['skill_location']=$this->skill_m->location();
			$data['skill_category']=$this->skill_m->get_category();			
			$data['sub_category']=$this->skill_m->get_subCategory($id);
			$data["right_ads"]=$this->advertising_m->right_ads();
			$data["premium_skill"]=$this->home_m->premium_skill();		
			$this->load->view('skill/skill_search_v',$data);
			$this->load->view('template_frontend/advertising',$data);			 
			$this->load->view('template_frontend/footer');
		}
		public function job_thumbnail_freature($id="")
		{	$this->session->active_id=$id;
			$data["ads_top"]=$this->advertising_m->ads_top();
			$data["acc_head"]=$this->acc->acc_head();
			$this->load->view("template_frontend/herder_and_nav",$data);
			$data['thumbnail_url']=$this->thumbnail_url="job_c/post_job";
			$data['job_location']=$this->job_m->location();
			$data['job_category']=$this->job_m->index();
			$data['sub_category']=$this->job_m->feature($id);
			$data["right_ads"]=$this->advertising_m->right_ads();
			$data["feature_emp"]=$this->home_m->feature_emp();
			$data["feature_recruit"]=$this->home_m->feature_recruit();
			$this->load->view('job/job_search_v',$data);
			$this->load->view('template_frontend/advertising',$data);			 
			$this->load->view('template_frontend/footer');
		}

		public function service($value)
		{	
			$data["ads_top"]=$this->advertising_m->ads_top();
			$data["acc_head"]=$this->acc->acc_head();
			$this->load->view("template_frontend/herder_and_nav",$data); 
			$this->load->view('template_frontend/cv_job_skill'); 
			if($value=="p_cv")
			{
				$data["row"]=$this->cv_setup_m->index();
				$data["desc"]=$this->cv_setup_m->rate_desc();
				if($data["row"]==TRUE){$this->load->view('cv_setup',$data);}
			}else if($value=="s_cv")
			{
				$data["row"]=$this->search_cv_setup_m->index();
				$data["desc"]=$this->search_cv_setup_m->rate_desc();
				if($data["row"]!=""){$this->load->view('search_cv_setup',$data);}

			}else if($value=="p_job")
			{
				$data["row"]=$this->job_setup_m->index();
				$data["desc"]=$this->job_setup_m->rate_desc();
				if($data["row"]==TRUE){$this->load->view('job_setup',$data);}

			}else if($value=="s_job")
			{
				$data["row"]=$this->search_job_setup_m->index();
				if($data["row"]==TRUE){$this->load->view('search_job_setup',$data);}
			}else if($value=="p_skill")
			{
				$data["row"]=$this->skill_setup_m->index();
				$data["desc"]=$this->skill_setup_m->rate_desc();
				if($data["row"]==TRUE){$this->load->view('skill_setup',$data);}
			}else
			{
				$data["row"]=$this->search_skill_setup_m->index();
				if($data["row"]==TRUE){$this->load->view('search_skill_setup',$data);}
			}

			$this->load->view('template_frontend/footer');   
		}
		public function promotion()
		{
			$data["promotion"]=$this->pt->index();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$data["acc_head"]=$this->acc->acc_head();
			$this->load->view("template_frontend/herder_and_nav",$data);      	
			if($data["promotion"]==TRUE){ 	
			$this->load->view('promotion',$data);
			}
			$this->load->view('template_frontend/footer');
		}
		public function advertise_rate()
		{
			$data["ads"]=$this->ads->index();
			$data["desc"]=$this->ads->rate_desc();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$data["acc_head"]=$this->acc->acc_head();
			$this->load->view("template_frontend/herder_and_nav",$data);
			$this->load->view('template_frontend/cv_job_skill'); 
			if($data["ads"]==TRUE){
				$this->load->view("advertise_rate",$data);
			}
			$this->load->view('template_frontend/footer');  
		}
		public function payment(){
			$data["ads_top"]=$this->advertising_m->ads_top();
			$data["acc_head"]=$this->acc->acc_head();
			$this->load->view("template_frontend/herder_and_nav",$data);
			$this->load->view('template_frontend/cv_job_skill'); 
			$this->load->view('template_frontend/footer');  
		}
		public function form_log($msg=""){
			$data["error"]=$msg ;
			$this->load->view("acc_log",$data);
		}
		public function acc_log()
		{		 
			$this->form_validation->set_rules('txtEmail','Email','required');
			$this->form_validation->set_rules('txtPassword','Password','required');
			if($this->form_validation->run()==false){
				$this->load->view("acc_log");
			}else
			{
				$email = $this->input->post('txtEmail');
				$pass = $this->input->post('txtPassword');
				$result = $this->acc->validateemail($email);
				if($result==0)
				{
					$this->form_log('incorrect email / password..!');
				}else
				{
					$result = $this->acc->validatePassword($pass,$email);
					if($result!==0)
					{	$this->session->acc_log1 = $result->acc_id;		
						$this->session->acc_photo = $result->acc_photo;
						$this->session->acc_name = $result->acc_name;
						if(isset($this->session->url)){
							redirect($this->session->url);	
						}else{
							redirect("home");
						}					
					}else
					{
						$this->form_log('incorrect email / password..!');
					}
				}
			}
		}
		public function log_out()
		{
			$logout_url=$this->uri->segment(3)."/".$this->uri->segment(4);
			$this->session->unset_userdata('acc_log1');
			$this->session->unset_userdata('register');
			$this->session->unset_userdata('start_count');
			redirect($logout_url);
		}
		public function about()
		{
			$data["about"]=$this->au->index();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$data["acc_head"]=$this->acc->acc_head();
			$this->load->view("template_frontend/herder_and_nav",$data);
			if($data["about"]==TRUE){
			$this->load->view('about',$data);
			}
			$this->load->view("template_frontend/footer");
		}
		public function contact_us($error="")
		{	$data["error"]=$error;
			$cap_id= mt_rand(100, 113);
			$data["captcha"]=$this->acc->captcha($cap_id);
			$data["contacts"] = $this->ct->index();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$data["acc_head"]=$this->acc->acc_head();
			$this->load->view("template_frontend/herder_and_nav",$data);
			if($data["contacts"]==TRUE){
			$this->load->view('contact_us',$data);
			}
			$this->load->view('template_frontend/footer');
		}	
		public function send_email()
		{	
			$this->form_validation->set_rules('txtName','Name','required');
			$this->form_validation->set_rules('txtYourEmail','Email','required');
			$this->form_validation->set_rules('areaMessage','Massage','required');
			$this->form_validation->set_rules('txtCaptcha1','Captcha','required');
			if($this->form_validation->run()==TRUE)
			{	
				$cap_id=$this->input->post("txtCap_id");
				$cap_code=$this->input->post("txtCaptcha1");
				$result=$this->acc->captcha($cap_id,$cap_code);
				if($result==true){
					$email=$this->input->post('txtYourEmail');
					$row=$this->acc->validateemail($email);
					if($row==true){
						$this->email->from($this->input->post('txtYourEmail'));
						$this->email->to('Khmerjob@gmail.com');				
						$this->email->subject($this->input->post('txtSubject'));
						$this->email->message($this->input->post('areaMessage'));
						if($this->email->send()){
						redirect($this->uri->segment(1).'/'.$this->uri->segment(2));
						}
					}else{
					 $this->contact_us('your email invalides');
					}
				}else{$this->contact_us('your captcha invalides');}
			}else{$this->contact_us();}		          
		}	
		public function FAQ()
		{
			$data["FAQ"] = $this->FAQ_m->index();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$data["acc_head"]=$this->acc->acc_head();
			$this->load->view("template_frontend/herder_and_nav",$data);
			if($data["FAQ"]==TRUE){
				$this->load->view('FAQ',$data);
			}
			$this->load->view("template_frontend/footer");
		}		
	}//end class
	