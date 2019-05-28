<?php 

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("M_admin","madmin");
        if($this->session->userdata("level") != "admin" || $this->session->userdata("level") == ""){
            redirect("login");
        }
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
    // ajax filter product by category
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
    
    public function karyawan(){
        $data['karyawan'] = $this->madmin->getKaryawan();
        $this->load->view("admin/Karyawan",$data);
        if(isset($_POST['update'])){
            $idKaryawan = $this->input->post("id_karyawan");
            $data = [
                "nama" => htmlspecialchars($this->input->post("nama")),
                "nik"  => htmlspecialchars($this->input->post("nik")),
                "no_telp" => htmlspecialchars($this->input->post("no_telp")),
                "alamat" => htmlspecialchars($this->input->post("alamat")),
                "jabatan" => htmlspecialchars($this->input->post("jabatan")),
                "status" => htmlspecialchars($this->input->post("status")),
            ];
            $check = $this->madmin->updateKaryawan($data,$idKaryawan);
            if($check){
                $this->session->set_flashdata("success", "Data Karyawan Berhasil di Ubah!");
                redirect("admin/karyawan");
            }else{
                $this->session->set_flashdata("error", "Ada Masalah Saat Menyimpan Perubahan Data Karyawan!");
                redirect("admin/karyawan");
            }
        }
    }
    public function inputDataKaryawan(){
        $this->load->view("admin/Input_karyawan");

        if(isset($_POST['submit'])){
            $data = [
                "nama" => htmlspecialchars($this->input->post("nama")),
                "nik"  => htmlspecialchars($this->input->post("nik")),
                "no_telp" => htmlspecialchars($this->input->post("no_telp")),
                "jenis_kelamin" => $this->input->post("jenis_kelamin"),
                "alamat" => htmlspecialchars($this->input->post("alamat")),
                "jabatan" => htmlspecialchars($this->input->post("jabatan")),
                "status" => htmlspecialchars($this->input->post("status")),
                "tanggal_masuk" => htmlspecialchars($this->input->post("tanggal_masuk")),
                "foto" => ""
            ];
            
            $config['upload_path']   = './foto/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']      = 1000;
    
            $this->load->library('upload', $config);
    
            if(!$this->upload->do_upload('gambar')){
                $this->session->set_flashdata("error", "Ada Masalah Saat Mengupload Foto!");
                redirect("admin/tambah-karyawan");
            }else{
                $file = $this->upload->data();
                $data["foto"] = $file['file_name'];
                $check = $this->madmin->insertKaryawan($data);
                if($check){
                    $this->session->set_flashdata("success", "Data Karyawan Berhasil Ditambahkan!");
                    redirect("admin/karyawan");
                }else{
                    $this->session->set_flashdata("error", "Ada Masalah Saat Menambah Data Karyawan!");
                    redirect("admin/tambah-karyawan");
                }
            }

        }

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