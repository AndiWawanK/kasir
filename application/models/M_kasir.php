<?php 

class M_kasir extends CI_Model{
    public function _getProduct(){
        return $this->db->get("product")->result_array();
    }
    public function addData($data){
        $idCostumer = $this->addCostumer($data);
        $booking = [
            "ID_customers" => $idCostumer,
            "tanggal" => $data['tanggal'],
            "pesanan" => $data['products'],
            "total_harga" => $data['total_harga'],
            "keterangan" => $data['keterangan']
        ];
        
        $isDone = $this->addBooking($booking);
        if($isDone){
            $this->session->set_flashdata("success", "Pesanan Berhasil! Terima Kasih");
            redirect("kasir/dashboard");
        }
    }
    public function addCostumer($data){
        $dataCustomers = [
            "nama" => $data['nama'],
            "no_telp" => $data['no_telp']
        ];
        $isAdd = $this->db->insert("customers", $dataCustomers);

        if($isAdd){
            //get last ID_Customers
            $this->db->select("ID_customers");
            $this->db->from("customers");
            $this->db->order_by("ID_customers", "DESC");
            $lastRow = $this->db->get()->result_array();
            return $lastRow[0]['ID_customers'];
        }else{
            $this->session->set_flashdata("error", "Ada Masalah Saat Menambahkan Data Customers!");
        }
    }
    public function addBooking($data){
        //insert to booking
        $this->db->set("ID_customers", $data['ID_customers']);
        $this->db->set("tanggal", $data['tanggal']);
        $this->db->insert("booking");

        //get last ID_booking
        $this->db->select("ID_booking");
        $this->db->from("booking");
        $this->db->order_by("ID_booking", "DESC");
        $lastRow = $this->db->get()->result_array();
        
        $idBooking = $lastRow[0]['ID_booking'];

        if($lastRow){
            foreach($data['pesanan'] as $pesanan){
                $this->db->set("ID_product", $pesanan['idPesanan']);
                $this->db->set("ID_booking", $idBooking);
                $this->db->set("jumlah", $pesanan['jumlah']);
                $this->db->insert("detail_booking");

            }
            $this->db->set("ID_booking", $idBooking);
            $this->db->set("keterangan", $data['keterangan']);
            $this->db->set("total_harga", $data['total_harga']);
            $this->db->insert("transaction");
            return true;
        }

    }
} 