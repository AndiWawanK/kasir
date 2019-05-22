<?php 

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("M_admin","madmin");
    }
    public function home(){
        $this->load->view('admin/Home');
    }
    public function product(){
        $data['product'] = $this->madmin->getProduct();
        $data['category'] = $this->madmin->getCategory();
        $this->load->view('admin/Product',$data);
        if(isset($_POST['submit'])){
            $data = [
                'nama_product' => htmlspecialchars($this->input->post("nama_product")),
                'harga' => htmlspecialchars($this->input->post('harga')),
                'ID_category' => $this->input->post("category")
            ];
            $isSubmit = $this->madmin->createProduct($data);
            if($isSubmit){
                $this->session->set_flashdata("message", "Product Berhasil Ditambahakan!");
                redirect("admin/product");
            }
            $this->session->set_flashdata("message", "Ada Masalah Saat Menambahkan Product!");
            redirect("admin/product");
        }
    }
}