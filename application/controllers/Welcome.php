<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model("M_admin","admin");
	}
	public function index(){
		$data["product"] = $this->admin->getProduct($id=null);
		$data["images"] = $this->admin->getGallery();
		$this->load->view('Welcome', $data);
	}
}
