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
        $customers = $this->madmin->getCustomers();
        $productTerjual = $this->madmin->getProductTerjual();
        $product = $this->madmin->getProduct($id = null);
        $karyawan = $this->madmin->getKaryawan();
        $transaction = $this->madmin->getTransaction();
        $total = 0;
        for($i = 0;$i<count($productTerjual); $i++){
            $total += $productTerjual[$i]['jumlah']; 
        }
        $count['totalProduct'] = count($product);
        $count['totalKaryawan'] = count($karyawan);
        $count['totalCustomers'] = count($customers);
        $count['productTerjual'] = $total;
        $count['transaction'] = $transaction;
        $this->load->view('admin/Home',$count);
    }
    public function transaction_processing($idBooking){
        $data = $this->madmin->getDetailTransaction($idBooking);
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($data));
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
                redirect("admin/dashboard/product");
            }
            $this->session->set_flashdata("message", "Ada Masalah Saat Menambahkan Product!");
            redirect("admin/dashboard/product");
        }
    }
    public function updateProduct(){
        $data = [
            'nama_product' => htmlspecialchars($this->input->post("nama_product")),
            'harga' => htmlspecialchars($this->input->post('harga')),
            'ID_category' => $this->input->post("category"),
            'ID_product' => $this->input->post("ID_product")
        ];
        $isUpdate = $this->madmin->updateProduct($data);
        if($isUpdate){
            $this->session->set_flashdata("message", "Product Berhasil Update!");
            redirect("admin/dashboard/product");
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
            redirect("admin/dashboard/product");
        }
        $this->session->set_flashdata("message", "Ada Masalah Saat Menghapus Data!");
        redirect("admin/dashboard/product");
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
                redirect("admin/dashboard/karyawan");
            }else{
                $this->session->set_flashdata("error", "Ada Masalah Saat Menyimpan Perubahan Data Karyawan!");
                redirect("admin/dashboard/karyawan");
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
                redirect("admin/dashboard/karyawan/tambah-karyawan");
            }else{
                $file = $this->upload->data();
                $data["foto"] = $file['file_name'];
                $check = $this->madmin->insertKaryawan($data);
                if($check){
                    $this->session->set_flashdata("success", "Data Karyawan Berhasil Ditambahkan!");
                    redirect("admin/dashboard/karyawan");
                }else{
                    $this->session->set_flashdata("error", "Ada Masalah Saat Menambah Data Karyawan!");
                    redirect("admin/dashboard/karyawan/tambah-karyawan");
                }
            }

        }

    }
    public function deleteKaryawan($idKaryawan){
        $isDelete = $this->madmin->deleteKaryawan($idKaryawan);
        if($isDelete){
            redirect("admin/dashboard/karyawan");
        }
    }
    public function gallery($idImage = null){
        $data["image"] = $this->madmin->getGallery();
        $this->load->view("admin/gallery", $data);
        if($idImage != null){
            $isDelete = $this->madmin->deleteImage($idImage);
            if($isDelete){
                redirect("admin/dashboard/gallery");
            }
        }
    }
    public function gallery_upload(){
        $config['upload_path']   = FCPATH.'/foto/gallery/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $this->load->library('upload',$config);

        if($this->upload->do_upload('userfile')){
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('gallery',array('gambar'=>$nama));
        }
        if(isset($_POST["isUpload"])){
            $this->session->set_flashdata("success", "Upload Berhasil!");
            redirect("admin/dashboard/gallery");
        }
    }
    public function export_xls(){
        $this->load->view("admin/export");
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