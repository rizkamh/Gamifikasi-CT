<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masuk'){
				redirect('login');
			}
		$this->load->model("matakuliah_model");
		$this->load->helper("security");
		}


	public function index()
	{
		$this->load->view('kelas_view');
	}

	public function data(){
		echo json_encode($this->db->get('tblkelas')->result());
	}

	public function hapus($id){
		echo json_encode(array(
			"status" => $this->db->delete('tblkelas', $id)));
	}
 
	public function simpan($mode){					
		if($this->_validate($mode)){
			if($mode=="add"){
				$data = array(		
					"nama" => $this->input->post("nama")
				);
				$this->db->insert('tblkelas', $data);
			}elseif($mode=="edit"){
				$data = array(
					"nama" => $this->input->post("nama")
				);
				$this->db->update("tblkelas", array("id" =>$this->input->post("id")),$data);
			}			
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array(
				"status" => FALSE,
				"message" => array(
					"nama" => form_error("nama")
				)
			));
		}
	}
	
	private function _validate($mode){
		$rules = array(
			array(
				"field" => "nama",
				"label" => "nama matakuliah",
				"rules" => "required"
			)
		);

		$this->form_validation->set_rules($rules);
		$this->form_validation
			->set_error_delimiters("<span class='help-block alert alert-error nopadding'>","</span>");

		return $this->form_validation->run();
	}
	
}
