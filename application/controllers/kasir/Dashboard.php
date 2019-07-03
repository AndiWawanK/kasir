<?php 

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("M_kasir","mkasir");
    }
    public function home(){
        $product['product'] = $this->mkasir->_getProduct();
        $this->load->view('kasir/Home', $product);
    }
    public function booking(){
        $pesanan = [];
        $product = $this->input->post("pesanan");
        $jumlah  = $this->input->post("jumlah");
        foreach($product as $key => $idPesanan){
            $pesanan[] = array(
                "idPesanan" => $idPesanan,
                "jumlah" => $jumlah[$key]
            );
        }
        
        $data = [
            "nama" => htmlspecialchars($this->input->post("nama_pemesanan")),
            "no_telp" => htmlspecialchars($this->input->post("no_telp")),
            "products" => $pesanan,
            // "jumlah" => htmlspecialchars($this->input->post("jumlah")),
            "total_harga" => htmlspecialchars($this->input->post("total_harga")),
            "tanggal" => htmlspecialchars($this->input->post("tanggal")),
            "keterangan" => htmlspecialchars($this->input->post("keterangan"))

        ];
        $this->mkasir->addData($data);
    }
    public function logout(){
        $data = [
            "nama" => $this->session->userdata("nama"),
            "username" => $this->session->userdata("username"),
            "level" => $this->session->userdata("level"),
        ];
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
        redirect("login");
    }
}