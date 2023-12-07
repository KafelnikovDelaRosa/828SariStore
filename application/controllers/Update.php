<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Update extends CI_Controller{
   function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper('url');
        $this->load->model('ItemModel');
    } 
    public function index(){
        $this->load->library('session');
        $this->session->set_userdata('itemid'," ");
        $this->load->helper(array('form','url'));
		$this->load->library(array('form_validation'));
        $this->form_validation->set_rules('itemno','Item Number','required|numeric');    
        if($this->form_validation->run()==FALSE){
            $this->load->view('update');
        }
        else{
            $_SESSION['itemid']=$_POST['itemno'];
            header('location:'.base_url("Update/edit/".$_SESSION['itemid']));
        }
    }
    public function edit($itemid){
        $this->load->library('session');
        $this->load->helper(array('form','url'));
		$this->load->library(array('form_validation'));
        $this->form_validation->set_rules('name','Item Name','required');
		$this->form_validation->set_rules('cost','Item Cost','required|numeric');
		$this->form_validation->set_rules('stock','Item Stock','required|numeric');
        if($this->form_validation->run()==FALSE){
            $data['item']=$this->ItemModel->getItemId($itemid);
            $this->load->view('edit',$data);
        }
        else{
           $this->ItemModel->updateItem($itemid);
           $data['item']=$this->ItemModel->getItemId($itemid);
           $this->load->view('updatesucess',$data);
           session_destroy(); 
        }
    }
}

