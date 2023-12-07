<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
    function __construct() {
        parent::__construct();
        // Load url helper
        $this->load->helper('url');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function home(){
		$this->load->view('home');
	}
	public function shop(){
		$this->load->view('shop');
	}
	public function restock(){
		$this->load->view('restock');
	}
	public function add(){
		$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		);
		$this->load->model('ItemModel');
		$this->load->helper(array('form','url'));
		$this->load->library(array('form_validation'));
		$this->load->library('upload', $config);
		$this->form_validation->set_rules('name','Item Name','required');
		$this->form_validation->set_rules('cost','Item Cost','required');
		$this->form_validation->set_rules('stock','Item Stock','required');
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
	public function remove(){
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
	public function update(){
		$this->load->view('update');
	}	
	public function show(){
		$this->load->model('ItemModel');
		$this->load->library('pagination');
		$config=array(
			'base_url'=>base_url()."Page/show",
			'total_rows'=>$this->ItemModel->itemCount(),
			'per_page'=>3,
			'uri_segment'=>2
		);	
		$this->pagination->initialize($config);
		$page=($this->uri->segment(2))?$this->uri->segment(2):0;
		$data['links']=$this->pagination->create_links();
		$data['items']=$this->ItemModel->showItem($config['per_page'],$page);
		$this->load->view('show',$data);
	}	
}
