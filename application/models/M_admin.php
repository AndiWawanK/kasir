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
    public function getTransaction(){
        $this->db->select("booking.ID_booking, booking.tanggal, SUM(jumlah) as jumlah, transaction.keterangan, transaction.total_harga");
        $this->db->from("transaction");
        $this->db->join("booking","transaction.ID_booking = booking.ID_booking");
        $this->db->join("detail_booking","booking.ID_booking = detail_booking.ID_booking");
        $this->db->group_by("transaction.ID_transaction");
        return $this->db->get()->result_array();
    }
    public function getDetailTransaction($idBooking){
        $this->db->select("booking.ID_booking, customers.nama, customers.no_telp, booking.tanggal, product.nama_product, category.nama_category, detail_booking.jumlah,product.harga, transaction.total_harga, transaction.keterangan");
        $this->db->from("transaction");
        $this->db->join("booking","transaction.ID_booking = booking.ID_booking");
        $this->db->join("customers","booking.ID_customers = customers.ID_customers");
        $this->db->join("detail_booking","booking.ID_booking = detail_booking.ID_booking");
        $this->db->join("product","detail_booking.ID_product = product.ID_product");
        $this->db->join("category","product.ID_category = category.ID_category");
        $this->db->where("booking.ID_booking", $idBooking);
        return $this->db->get()->result_array();
    }
    public function getCustomers(){
        return $this->db->get("customers")->result_array();
    }
    public function getProductTerjual(){
        $this->db->select("jumlah");
        $this->db->from("detail_booking");
        return $this->db->get()->result_array();
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
    public function updateProduct($data){
        $this->db->set("nama_product", $data["nama_product"]);
        $this->db->set("harga", $data["harga"]);
        $this->db->set("ID_category", $data["ID_category"]);
        $this->db->where("ID_product", $data["ID_product"]);
        return $this->db->update("product");
    }
    public function getKaryawan(){
        return $this->db->get("karyawan")->result_array();
    }
    public function insertKaryawan($data){
        return $this->db->insert("karyawan", $data);
    }
    public function updateKaryawan($data,$idKaryawan){
        return $this->db->update("karyawan", $data, array("ID_karyawan" => $idKaryawan));
    }
    public function deleteKaryawan($idKaryawan){
        return $this->db->delete("karyawan", array("ID_karyawan" => $idKaryawan));
    }
    public function getGallery(){
        return $this->db->get("gallery")->result_array();
    }
    public function deleteImage($idImage){
        $getDetailImage = $this->db->get_where("gallery", array("ID_gambar" => $idImage))->row_array();
        if($getDetailImage != null){
            if(file_exists($file=FCPATH."/foto/gallery/".$getDetailImage["gambar"])){
                unlink($file);
            }
            return $this->db->delete("gallery", array("ID_gambar" => $idImage));
        }
        // $delete = $this->db->delete("gallery", array("ID_gambar" => $idImage));
    }
}