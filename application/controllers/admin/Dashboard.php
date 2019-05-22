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
        $data['product'] = $this->madmin->getProduct($id = null);
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
    // ajax request
    // get all product & get product by category
    public function filterProduct($id = null){
        $data = $this->madmin->getProduct($id);
        $response = [
            "status" => "Success",
            "data" => $data
        ];
        $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
                    ->_display();
        exit;
    }

    public function deleteProduct($id){
        $isDelete = $this->madmin->deleteProductById($id);
        if($isDelete){
            $this->session->set_flashdata("message", "Product Berhasil Dihapus!");
            redirect("admin/product");
        }
        $this->session->set_flashdata("message", "Ada Masalah Saat Menghapus Data!");
        redirect("admin/product");
    }
}