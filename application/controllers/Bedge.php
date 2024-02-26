<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Bedge extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masuk'){
				redirect('login');
			}
		}

	public function index()
	{
    $data['bedge'] = $this->db->query('SELECT * FROM tblbedge')->result_array();
		$this->load->view('bedge_view', $data);
	}

  public function add()
	{
		$this->load->view('bedge_add_view');
	}

  public function save()
  {
    $data['nama_bedge'] = $this->input->post('nama');
    $data['nilai_bedge'] = $this->input->post('nilai');
		$config = array(
			'upload_path' => './assets/img/bedge',
			'allowed_types' => "gif|jpg|png|jpeg",
		);
		$this->load->library('upload', $config);	
		if($this->upload->do_upload('gambar'))
    {
      $file_data = $this->upload->data();
      $data['gambar_bedge'] = $file_data['file_name'];
    } else {
      $error = array('error' => $this->upload->display_errors());
      print_r($error);
      exit();
    }
    
    $this->db->insert('tblbedge', $data);
    redirect('bedge');
  }

  public function edit($id = null)
  {
    $data['bedge'] = $this->db->query('SELECT * FROM tblbedge WHERE idbedge = ?', $id)->row_array();
		$this->load->view('bedge_edit_view', $data);
  }

  public function update($id = null)
  {
    $data['nama_bedge'] = $this->input->post('nama');
    $data['nilai_bedge'] = $this->input->post('nilai');
    $filename = $this->input->post("gambar");
		// unlink("./assets/img/bedge/".$filename.".jpg");
		$config = array(
			'upload_path' => './assets/img/bedge',
			'allowed_types' => "gif|jpg|png|jpeg"
		);
		
		$this->load->library('upload', $config);	
		if($this->upload->do_upload('gambar'))
			{
				$file_data = $this->upload->data();
				$data['gambar_bedge'] = $file_data['file_name'];
			}
    $this->db->update('tblbedge', $data, ['idbedge'=>$id]);
    redirect('bedge');
  }

  public function delete($id = null)
  {
    $this->db->delete('tblbedge', ['idbedge' => $id]);
    redirect('bedge');
  }
}