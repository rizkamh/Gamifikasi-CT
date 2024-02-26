<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaderboard extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masuk'){
				redirect('login');
			}
		}

	public function index()
	{
    $data['leaderboard'] = $this->db
    ->select("a.nim,a.namamhs,sum(a.nilai) as nilai")
    ->from("tblriwayatsoal a")
    ->join("tblmahasiswa b","a.nim=b.nim","LEFT")
    ->order_by("sum(a.nilai)","desc")
    ->order_by("a.timer","desc")
    ->group_by("nim")
    ->get()
    ->result_array();    
		$this->load->view('leaderboard_view', $data);
	}
}