<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masuk'){
				redirect('login');
			}
			$this->load->model("absensi_model");
			$this->load->helper("security");
		}

	public function index()
	{
		$soal = $this->db->query('select idesai as id, isiesai as soal, nama_level, "esai" as jenis from tblsoalesai tbe join tbllevel lvl1 on lvl1.idlevel = tbe.idlevel 
		union select idpilgan as id, isipilgan as soal, nama_level, "pilgan" as jenis from tblsoalpilgan tbp join tbllevel lvl2 on lvl2.idlevel = tbp.idlevel')->result_array();
		$data['soal'] = $soal;
		$this->load->view('soal_view', $data);
	}

	public function soal_pilgan($id = null)
	{
		$detail_soal = $this->db->query('select * from tblsoalpilgan where idpilgan = ?', $id)->row_array();
		
	}
}
