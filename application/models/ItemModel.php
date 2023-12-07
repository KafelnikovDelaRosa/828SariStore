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
    public function showItem($limit,$start){
        $this->load->database();
        $this->db->limit($limit,$start);
        $query=$this->db->get('itemstb');
        $result=$query->result();
        return $result; 
    }
    public function itemCount(){
        $this->load->database();
        return $this->db->count_all('itemstb');
    }
    public function itemInfo(){
        $this->load->database();
        $itemid=$_POST["itemno"];
        $this->db->where('itemid',$itemid);
        $query=$this->db->get('itemstb');
        $result=$query->result();
        return $result;
    }
    public function getItemId($id){
        $this->load->database();
        $this->db->where('itemid',$id);
        $query=$this->db->get('itemstb');
        $result=$query->result();
        return $result;
    }
    public function removeItem(){
        $this->load->database();
        $itemid=$_POST["itemno"];
        $this->db->where('itemid',$itemid);
        $this->db->delete('itemstb');
    }
    public function updateItem($id){
        $this->load->database();
        $name=$_POST["name"];
        $price=$_POST["cost"];
        $stock=$_POST["stock"];
        $this->db->set('name',$name);
        $this->db->set('price',$price);
        $this->db->set('stock',$stock);
        $this->db->where('itemid',$id);
        $this->db->update('itemstb');
    }
    public function restock($id){
        $dbstock=0;
        $stock=$_POST["stock"];
        $this->load->database();
        $this->db->select('stock');
        $this->db->where('itemid',$id);
        $query=$this->db->get('itemstb');
        foreach($query->result() as $row){
            $dbstock=$row->stock;
        }
        $this->db->set('stock',$stock+$dbstock);
        $this->db->where('itemid',$id);
        $this->db->update('itemstb');
    }
}