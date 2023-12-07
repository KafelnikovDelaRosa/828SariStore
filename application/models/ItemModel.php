<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemModel extends CI_Model {
    public function addItem($fileName){
        $this->load->database();
        $itemData=array(
            'itemid'=>$_POST["barcode"],
            'name'=>$_POST["name"],
            'image'=>$fileName,
            'price'=>$_POST["cost"],
            'stock'=>$_POST["stocks"],
            'unit'=>$_POST["unit"],
            'status'=>'full'
        );
        $this->db->insert('itemstb',$itemData);
    }
    public function getNoItems(){
        $this->load->database();
        $result=$this->db->count_all_results('itemstb');
        return $result;
    }
    public function getInventory($limit,$startingIndex){
        $this->load->database();
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('itemstb');
        $result=$query->result();
        return $result;
    }
    public function searchEntry($input,$limit,$startingIndex){
        $this->load->database();
        $this->db->group_start()
            ->like('itemid',$input,'both')
            ->or_like('name',$input,'both')
        ->group_end();
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('itemstb');
        $result=$query->result();
        return $result;
    }
    public function sortItemBy($category,$limit,$startingIndex){
        $this->load->database();
        $this->db->order_by($category,'ASC');
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('itemstb');
        $result=$query->result();
        return $result;
    }
    public function filterEntry($level,$limit,$startingIndex){
        $this->load->database();
        $this->db->where('status',$level);
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('itemstb');
        $result=$query->result();
        return $result;
    }
    public function filteredCount($level){
        $this->load->database();
        $this->db->where('status',$level);
        $result=$this->db->count_all_results('itemstb');
        return $result;
    }
    public function removeItem($id){
        $this->load->database();
        $data=array(
            'itemid'=>$id
        );
        $this->db->delete('itemstb',$data);
    }
}