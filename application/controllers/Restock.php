<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Restock extends CI_Controller{
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
            $this->load->view('restock');
        }
        else{
            $_SESSION['itemid']=$_POST['itemno'];
            header('location:'.base_url("Restock/item/".$_SESSION['itemid']));
        }
    }
    public function item($itemid){
        $this->load->library('session');
        $this->load->helper(array('form','url'));
		$this->load->library(array('form_validation'));
        $this->form_validation->set_rules('stock','Stocks','required|numeric');
        if($this->form_validation->run()==FALSE){
            $data['item']=$this->ItemModel->getItemId($itemid);
            $this->load->view('item',$data);
        }
        else{
            $this->ItemModel->restock($itemid);
            $data['item']=$this->ItemModel->getItemId($itemid);
            $this->load->view('restocksuccess',$data);
        }    
    }
}
