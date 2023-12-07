<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inventory extends CI_Controller{
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper('url');
        $this->load->model('ItemModel');
    } 
    public function index($page){
        $data['level']='all';
        $data['category']='all';
        $data['cur_page']=$page;
        $data['per_page']=4;
        $data['total_entries']=$this->ItemModel->getNoItems();
        $data['last_entries']=$data['per_page']*$page;
        $data['index']=$data['last_entries']-$data['per_page'];   
        $data['entries'] = $this->ItemModel->getInventory($data['per_page'],$data['index']);
        $this->load->view('inventory',$data);
    }
    public function search($term,$page){
        $data['category']='all';
        $data['level']='all';
        $data['cur_page']=$page;
        $data['per_page']=4;
        $data['last_entries']=$data['per_page']*4;
        $data['index']=$data['last_entries']-$data['per_page'];   
        $data['entries'] = $this->ItemModel->searchEntry($term,$data['per_page'],$data['index']);
        $entry_length=count($data['entries']);
        $data['total_entries']=$entry_length;
		$this->load->view('inventory',$data);
    }
}
