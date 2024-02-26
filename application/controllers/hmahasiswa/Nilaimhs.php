<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilaimhs extends CI_Controller {

	function __construct(){
		parent::__construct(); 
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masukmhs'){
        		redirect('login');
			}
			$this->load->model("hmahasiswa/nilaimhs_model");
			$this->load->model("laporan_model");
			$this->load->helper("security");
		}
		  
	public function index()
	{
		$count = $this->db->query('select sum(nilai) as nilai from tblriwayatsoal where nim = ?', $this->session->userdata("ses_id"))->row_array();
		$data['bedge'] = $this->db->query('select * from tblbedge where nilai_bedge <= ?', $count['nilai'])->result_array();
		$this->load->view('hmahasiswa/nilaimhs_view',$data);
	} 

	public function ambilriwayat(){
		echo json_encode($this->nilaimhs_model
							->ambilriwayat($this->session->userdata("ses_id"))->result());
	}
 
	public function ambildata(){
		echo json_encode($this->nilaimhs_model
							->ambildata($this->session->userdata("ses_id"))->result());
	}


	public function laporan(){
        $result = $this->laporan_model->ambilnilaimhs($this->session->userdata("ses_id"),
        $this->session->userdata("ses_kodemk"),$this->input->get("tipetugas"))->result();
        if($result == null){
            redirect("hmahasiswa/nilaimhs");
        }else{
            if($this->input->get()){
                $this->load->view("laporan/nilaimhs_laporan",array(
                    "nilai" => $this->laporan_model->ambilnilaimhs($this->session->userdata("ses_id"),
                                $this->session->userdata("ses_kodemk"),$this->input->get("tipetugas"))->result(),
                    "title" => "Laporan Nilai"
                ));
            }else{
                redirect("hmahasiswa/nilaimhs");
            } 
        }                 
    }

	public function laporan111($tipesoal){
        $result = $this->laporan_model->ambilnilaimhs($this->session->userdata("ses_id"),
        $this->session->userdata("ses_kodemk"),$tipesoal)->result();
        if($result == null){
			$this->load->view('hmahasiswa/nilaimhs_view');
                // array(
                //     "action" => "laporan/nilailaporanmhs",
                //     "nilai" => $this->laporan_model->ambilnilaimhs($this->session->userdata("ses_id"),
                //                 $this->session->userdata("ses_kodemk"),$this->input->get("tipesoal"))->result(),
                //     // "alert" => "<script>alert('Pilih terlebih dahulu');</script>",
                // ));
        }else{
            $this->load->view("laporan/nilaimhs_laporan",array(
				"nilai" => $this->laporan_model->ambilnilaimhs($this->session->userdata("ses_id"),
							$this->session->userdata("ses_kodemk"),$tipesoal)->result(),
				"title" => "Laporan Nilai"
			));
		}
		               
    }
}
