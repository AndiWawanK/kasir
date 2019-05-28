<?php 

class M_admin extends CI_Model{
    public function getProduct($id){
        if($id == null){
            $this->db->select("product.ID_product, product.nama_product, product.harga, category.nama_category, category.ID_category");
            $this->db->from("product");
            $this->db->join("category", "product.ID_category = category.ID_category");
            return $this->db->get()->result_array();
        }else{
            $this->db->select("product.ID_product, product.nama_product, product.harga, category.nama_category, category.ID_category");
            $this->db->from("product");
            $this->db->join("category", "product.ID_category = category.ID_category");
            $this->db->where("category.ID_category", $id);
            return $this->db->get()->result_array();
        }
    }
    public function getCategory(){
        return $this->db->get("category")->result_array();
    }
    public function createProduct($data){
        return $this->db->insert("product", $data);
    }
    public function deleteProductById($id){
        return $this->db->delete("product", array("ID_product" => $id));
    }

    public function getKaryawan(){
        return $this->db->get("karyawan")->result_array();
    }
    public function insertKaryawan($data){
        return $this->db->insert("karyawan", $data);
    }
    public function updateKaryawan($data,$idKaryawan){
        // $this->db->where("ID_karyawan", $idKaryawan);
        // $this->db->update("karyawan",$data);
        return $this->db->update("karyawan", $data, array("ID_karyawan" => $idKaryawan));
    }
}