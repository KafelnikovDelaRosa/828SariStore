<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add extends CI_Controller{
   function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper('url');
    } 
    public function index(){
        $config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		);
		$this->load->database();
		$this->load->model('ItemModel');
		$this->load->helper(array('form','url'));
		$this->load->library(array('form_validation'));
		$this->load->library('upload', $config);
		$this->form_validation->set_rules('itemno','Item Number','required|numeric|is_unique[itemstb.temid]');
		$this->form_validation->set_rules('name','Item Name','required');
		$this->form_validation->set_rules('cost','Item Cost','required|numeric');
		$this->form_validation->set_rules('stock','Item Stock','required|numeric');
		if($this->upload->do_upload('filename')&&$this->form_validation->run()==TRUE) {
			$name_file = $_FILES['filename']['name'];
			$this->ItemModel->addItem($name_file);
			$data['items']=$this->ItemModel->itemInfo();
			$this->load->view('addsuccess',$data);
		}
		else {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('add',$error);
		}
    }
}

