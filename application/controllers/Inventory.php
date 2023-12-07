<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inventory extends CI_Controller{
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
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
        $data['last_entries']=$data['per_page']*$page;
        $data['index']=$data['last_entries']-$data['per_page'];   
        $data['entries'] = $this->ItemModel->searchEntry($term,$data['per_page'],$data['index']);
        $entry_length=count($data['entries']);
        $data['total_entries']=$entry_length;
		$this->load->view('inventory',$data);
    }
    public function sortBy($category,$page){
        $data['category']=$category;
        $data['level']='all';
        $data['cur_page']=$page;
        $data['per_page']=4;
        $data['total_entries']=$this->ItemModel->getNoItems();
        $data['last_entries']=$data['per_page']*$page;
        $data['index']=$data['last_entries']-$data['per_page'];
        $data['entries']=$this->ItemModel->sortItemBy($category,$data['per_page'],$data['index']);
        $this->load->view('inventory',$data);
    }
    public function filterBy($level,$page){
        $data['category']='all';
        $data['level']=$level;
        $data['cur_page']=$page;
        $data['per_page']=4;
        $data['last_entries']=$data['per_page']*$page;
        $data['index']=$data['last_entries']-$data['per_page'];
        $data['total_entries']=$this->ItemModel->filteredCount($level);   
        $data['entries'] = $this->ItemModel->filterEntry($level,$data['per_page'],$data['index']);
		$this->load->view('inventory',$data);
    }
    public function addItem(){
        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        );
        $this->form_validation->set_rules('barcode','Barcode','required');
        $this->form_validation->set_rules('name','Item name','required');
        $this->form_validation->set_rules('stocks','Stocks',array(
            'required',
            array(
                'isZero',
                function($count){
                    if($count==0){
                        $this->form_validation->set_message('isZero','Stocks cannot be zero');
                        return FALSE; 
                    }
                    return TRUE;
                }
            ),
        ));
        $this->form_validation->set_rules('quantity','Quantity',array(
            'required',
            array(
                'isZero',
                function($count){
                    if($count==0){
                        $this->form_validation->set_message('isZero','Quantity cannot be zero');
                        return FALSE; 
                    }
                    return TRUE;
                }
            ),
        ));
        $this->load->library('upload',$config);
        if($this->form_validation->run()==TRUE&&$this->upload->do_upload('image')){
            $name_file=$_FILES['image']['name'];
            $this->ItemModel->addItem($name_file);
            $data['title']='Inventory';
            $data['message']='Item entry added!';
            $data['root_url']='inventory';
            $data['return']='Return to inventory';
            $this->load->view('successtemplate',$data);
        }
        else{
            $data['file_error']=$this->upload->display_errors();
            $this->load->view('inventoryadd',$data);
        }
    }
    public function remove($id){
        $data['title']='Inventory';
        $data['message']="Item entry $id deleted!";
        $data['root_url']='inventory';
        $data['return']='Return to inventory';
        $this->ItemModel->removeItem($id);
        $this->load->view('successtemplate',$data);
    }
}
