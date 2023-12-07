<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Show extends CI_Controller{
   function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper('url');
    } 
    public function index($page=''){
        $this->load->model('ItemModel');
		$this->load->library('pagination');
		$config=array(
			'base_url'=>base_url()."Show",
			'total_rows'=>$this->ItemModel->itemCount(),
			'per_page'=>4,
			'uri_segment'=>2
		);	
		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
		$data['items']=$this->ItemModel->showItem($config['per_page'],$page);
		$this->load->view('Show',$data);
    }
}

