<?php 

class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("M_auth","mauth");
    }
    public function login(){
        $this->load->view('Login');
        if(isset($_POST['submit'])){
            $data = [
                "username" => $this->input->post('username'),
                "password" => $this->input->post('password')
            ]; 
            $check = $this->mauth->isLogin($data);
            if($check > 0){
                $data_login = [
                    "nama" => $check[0]['nama'],
                    "username" => $check[0]['username'],
                    "level" => $check[0]['level'],
                ];
                if($data_login['level'] == "admin"){
                    $this->session->set_userdata($data_login);
                    redirect("admin/dashboard");
                }
                $this->session->set_userdata($data_login);
                redirect("kasir/dashboard");
                
            }else{
                redirect("login");
            }

        }
        
    }
}