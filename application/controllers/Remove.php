<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Remove extends CI_Controller{
   function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper('url');
    } 
    public function index(){
        $this->load->helper(array('form','url'));
		$this->load->library(array('form_validation'));
		$this->load->model('ItemModel');
		$this->form_validation->set_rules('itemno','Item Number','required|numeric');
		if($this->form_validation->run()==FALSE) {		
			$this->load->view('remove');
		}
		else {
			$data['items']=$this->ItemModel->itemInfo();
			$this->ItemModel->removeItem();
			$this->load->view('removesuccess',$data);	
		}
    }
}

