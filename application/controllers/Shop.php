<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shop extends CI_Controller{
   function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('ItemModel');
    } 
    public function index(){
        $this->session->set_userdata('count',NULL);
        $this->session->set_userdata('items',NULL);
        $countCache=$this->session->userdata('count');
        $itemCache=$this->session->userdata('items');
        if(is_null($countCache)&&is_null($itemCache)){
            $data=$this->session->userdata('items');
            $newValue=0;
            $curValue=$this->session->userdata('count');
            $newValue=$curValue++;
            $id=$_POST['inputno'];
            $infos=$this->ItemModel->getItemId($id);
            foreach($infos as $info){ 
                $data['id'][]=$info->itemid;
                $data['name'][]=$info->name;
                $data['image'][]=$info->image;
                $data['price'][]=$info->price;
                $data['stock'][]=$info->stock-($info->stock-1);  
            }
            $this->session->set_userdata('count',$newValue);
            $this->session->set_userdata('items',$data);

        }
        else{
            $this->session->set_userdata('count',0);
        }
        //form validation logic
        $this->form_validation->set_rules('inputno','Input Number','required');
        if($this->form_validation->run()==FALSE){
            $this->load->view('shop');
        }
        else{
            $this->load->view('shop');
        }
    }

}

        
        