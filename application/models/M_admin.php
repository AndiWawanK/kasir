<?php 

class M_admin extends CI_Model{
    public function getProduct(){
        $this->db->select("product.ID_product, product.nama_product, product.harga, category.nama_category, category.ID_category");
        $this->db->from("product");
        $this->db->join("category", "product.ID_category = category.ID_category");
        return $this->db->get()->result_array();
    }
    public function getCategory(){
        return $this->db->get("category")->result_array();
    }
    public function createProduct($data){
        return $this->db->insert("product", $data);
    }
}