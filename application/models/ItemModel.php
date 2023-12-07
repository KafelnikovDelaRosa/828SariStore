<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemModel extends CI_Model {
    public function addItem($fileName){
        $this->load->database();
        $itemData=array(
            'itemid'=>$_POST["itemno"],
            'name'=>$_POST["name"],
            'image'=>$fileName,
            'price'=>$_POST["cost"],
            'stock'=>$_POST["stock"],
            'status'=>'green'
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
}