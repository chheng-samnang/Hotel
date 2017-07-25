<?php
class Room extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Room';
		$this->page_redirect="admin/Room";								
		$this->load->model("Room_m");
		$this->load->model("Price_m");
		$this->load->model("Room_type_m");
	}

	public function index()
	{		
		$this->load->view('template/Header');
		$this->load->view('template/Left');		
		$data['pageHeader'] = $this->pageHeader;
		$data["action_url"]=array(0=>"{$this->page_redirect}/add",1=>"{$this->page_redirect}/edit",2=>"{$this->page_redirect}/delete"/*3=>"{$this->page_redirect}/change_password"*/);							
		$data["tbl_hdr"]=array("Room Name","Room Type","Status","Price","Photo","Maximum People");		
		$row=$this->Room_m->index();		
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$data["tbl_body"][$i]=array(
										"<a href=".base_url($this->page_redirect.'/room_detail/'.$value->room_id)." title='Room Detail'>".$value->room_name."</a>",		
										$value->room_type_name,
										$value->status,
										$value->price." $ /night",
										"<img class='img-thumbnail' src='http://localhost:8888/Hotel/assets/uploads/".$value->photo."' style='width:43px;' />",
										$value->maximum_people,
										$value->room_id
									);
			$i=$i+1;
			endforeach;
		}
		$this->load->view('admin/Page_view',$data);
		$this->load->view('template/Footer');
	}

	public function validation()
	{	
		$this->form_validation->set_rules('txtRoomName','Room','trim|required');
		$this->form_validation->set_rules('txtRoomType','Room Type','required');
		$this->form_validation->set_rules('txtPrice','Price','trim|required');
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}
	public function add($error="")
	{	$data["error"]=$error;
		$option= array('free'=>'Free','prepea'=>'Prepea','repea'=>'Repea','busy'=>'Busy','booking'=>'Booking');		
		$row=$this->Room_type_m->index();
		if($row==TRUE)
		{
			$option1[0]="Choose One";
			foreach($row as $value):						
			$option1[$value->room_type_code]=$value->room_type_name;								
			endforeach;
		}/*---========type of room====-------*/
		$data['ctrl'] = $this->createCtrl($row="",$option,$option1);		
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
				$check=$this->input->post("txtRoomName");	
				if($this->Room_m->check($check)){
					$this->add("This Room setup alredy....!");
				}else{
					$row=$this->Room_m->add();															              
	                if($row==TRUE)
	                {redirect("{$this->page_redirect}/");}
	            }						
			}
			else{$this->add();}		
		}
	}
	public function edit($id="")
	{		
		if($id!="")
		{
			$row=$this->Room_m->index($id);			
			if($row==TRUE)
			{	
				$option= array('free'=>'Free','prepea'=>'Prepea','repea'=>'Repea','busy'=>'Busy','booking'=>'Booking');	
				$row1=$this->Room_type_m->index();
				if($row1==TRUE)
				{
					$option1[0]="Choose One";
					foreach($row1 as $value):						
					$option1[$value->room_type_code]=$value->room_type_name;								
					endforeach;
				}/*---========type of room====-------*/

				$data['ctrl'] = $this->createCtrl($row,$option,$option1);			
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
					$row=$this->Room_m->edit($id);	
					if($row==TRUE){redirect("{$this->page_redirect}/");}
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
			$row=$this->Room_m->delete($id);
			if($row==TRUE){redirect("{$this->page_redirect}/");}
		}
		else{return FALSE;}
	}
	public function room_detail($id)
	{	
		$data["detail"]=$this->Room_m->index($id);
		$data['cancel'] = $this->page_redirect;
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view("admin/room_detail",$data);
		$this->load->view('template/footer');
		/*}else{$this->index();}*/
	}
	public function createCtrl($row="",$option,$option1)
	{
		if($row!="")
		{			
				$row1=$row->room_name;
				$row2=$row->room_type_code;
				$row3=$row->price;
				$row4=$row->remark;
				$row5=$row->photo;
				$row6=$row->status;
		}											
		//$ctrl = array();
		$ctrl = array(							
						array(
							'type'=>'text',
							'name'=>'txtRoomName',
							'id'=>'txtRoom',									
							'value'=>$row==""? set_value("txtRoom") : $row1,					
							'placeholder'=>'Enter room name here...',									
							'class'=>'form-control',
							'label'=>'Room Name',	
							),
						array(
							'type'=>'dropdown',
							'name'=>'txtRoomType',
							'option'=>$option1,
							'selected'=>$row==""? NULL : $row2,																		
							'class'=>'class="form-control"',
							'label'=>'Room Type'
							),	
						array(
							'type'=>'dropdown',
							'name'=>'txtRoomStatus',
							'option'=>$option,
							'selected'=>$row==""? NULL : $row6,																		
							'class'=>'class="form-control"',
							'label'=>'Room Status'
							),		
						array(
							'type'=>'text',
							'name'=>'txtPrice',
							'id'=>'txtPrice',									
							'value'=>$row==""? set_value("txtPrice") : $row3,					
							'placeholder'=>'Enter room price here...',									
							'class'=>'form-control',
							'label'=>'Price',	
							),														
						array(
							'type'=>'textarea',
							'name'=>'txtDesc',
							'value'=>$row==""? set_value("txtDesc") : $row4,
							'label'=>'Remark'
							),
						array(
							'type'=>'upload',
							'name'=>'txtImgName',
							'id'=>'txtImgName',									
							'value'=>$row==""? set_value("txtImgName"):$row5,					
							'class'=>'form-control',
							'label'=>'Room Photo',
							"img"=>$row==""? set_value("txtUpload") :"<img class='img-thumbnail' src='".base_url("assets/uploads/".$row5)."' style='width:100px;' />",																																		
							),														
					);
		return $ctrl;
	}
	public function createCtrl1($row="",$option,$option1,$option2)
	{
		if($row!="")
		{			
				$row1=$row->room_name;
				$row2=$row->room_type_name;
				$row3=$row->price;
				$row4=$row->desc;
				$row5=$row->photo;
		}											
		//$ctrl = array();
		$ctrl = array(							
						array(
							'type'=>'text',
							'name'=>'txtRoomName',
							'id'=>'txtRoom',									
							'value'=>$row==""? set_value("txtRoom") : $row1,					
							'placeholder'=>'Enter room name here...',									
							'class'=>'form-control',
							'label'=>'Room name'																								
							),
						array(
							'type'=>'dropdown',
							'name'=>'txtRoomType',
							'option'=>$option1,
							'selected'=>$row==""? NULL : $row2,																		
							'class'=>'class="form-control"',
							'label'=>'Room Type'
							),		
						array(
							'type'=>'text',
							'name'=>'txtPrice',
							'id'=>'txtPrice',									
							'value'=>$row==""? set_value("txtPrice") : $row1,					
							'placeholder'=>'Enter room name here...',									
							'class'=>'form-control',
							'label'=>'Room Price'																								
							),												
						array(
							'type'=>'textarea',
							'name'=>'txtDesc',
							'value'=>$row==""? set_value("txtDesc") : $row4,
							'label'=>'Description'
							),
						array(
							'type'=>'upload',
							'name'=>'txtImgName',
							'id'=>'txtImgName',									
							'value'=>$row==""? set_value("txtImgName"):$row5,					
							'class'=>'form-control',
							'label'=>'Room Photo',
							"img"=>$row==""? set_value("txtUpload") :"<img class='img-thumbnail' src='".base_url("assets/uploads/".$row5)."' style='width:100px;' />",																																		
							),														
					);
		return $ctrl;
	}
}
?>