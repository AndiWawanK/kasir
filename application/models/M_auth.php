<?php 

class M_auth extends CI_Model{
    public function isLogin($data){
       $getUsers = $this->db->get_where("users", array("username" => $data['username']))->row_array();
       if($getUsers > 0){
           if(password_verify($data['password'], $getUsers['password'])){
                // return true;
                return $this->db->get_where("users", array("username" => $data['username']))->result_array();
           }else{
                $this->session->set_flashdata('message', '<p style="color:red">Password Salah!</p>');
           }
       }else{
            $this->session->set_flashdata('message', '<p style="color:red">User Tidak Ditemukan!</p>');
       }
    }
}