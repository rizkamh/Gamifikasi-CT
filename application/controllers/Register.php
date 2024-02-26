<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	function __construct(){
		parent::__construct(); 
		$this->load->model("mahasiswa_model");
		$this->load->helper("security");
  }

    public function simpan(){
        $data = array(
          "nim" => $this->input->post("nim"),
          "namamhs" => $this->input->post("namamhs"),				
          "alamat" => $this->input->post("alamat"),
          "email" => $this->input->post("email"),
          "tanggallahir" => $this->input->post("tanggallahir"),
          "agama" => $this->input->post("agama"),
          "jekel" => $this->input->post("jekel"),
          "telepon" => $this->input->post("telepon"),
          "prodi" => $this->input->post("prodi"),
          "kelas" => $this->input->post("kelas"),
          "semester" => $this->input->post("semester"),
          "password" => do_hash("123456","md5")
        );
        $status = $this->mahasiswa_model->createMahasiswa($data);
        redirect('login');
    }
}
