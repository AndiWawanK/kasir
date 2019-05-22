<?php 

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function home(){
        $this->load->view('admin/Home');
    }
    public function product(){
        $this->load->view('admin/Product');
    }
}