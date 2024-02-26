<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		//validasi jika user belum login
		if ($this->session->userdata('islogin') != 'masukmhs') {
			redirect('login');
		}
		$this->load->model("home_model");
		$this->load->helper("security");
	}

	public function index()
	{
		$data['leaderboard'] = $this->db
			->select("a.nim,a.namamhs,sum(a.nilai) as nilai")
			->from("tblriwayatsoal a")
			->join("tblmahasiswa b", "a.nim=b.nim", "LEFT")
			->order_by("sum(a.nilai)", "desc")
			->order_by("a.timer","desc")
			->group_by("nim")
			->get()
			->result_array();
		$this->load->view('hmahasiswa/home_view', $data);
	}
	public function data()
	{
		echo json_encode($this->home_model->ambil()->result());
	}
}
