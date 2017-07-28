<?php
class Receipt extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Receipt_m");
	}
	public function index()
	{	$this->load->view('template/Header');
		$this->load->view('template/Left');		
		$data["receipt_list"]=$this->Receipt_m->index(); 		
		$this->load->view('admin/receipt/Receipt_list',$data);
		$this->load->view('template/Footer1');
	}
	public function view($pay_id="")
	{	
		$data["receipt_list"]=$this->Receipt_m->index($pay_id);
		$this->load->view('admin/receipt/Print_receipt',$data);
	}	
	public function trash($pay_id="")
	{
		
	}
}
?>