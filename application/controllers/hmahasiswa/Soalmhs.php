<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soalmhs extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		//validasi jika user belum login
		if ($this->session->userdata('islogin') != 'masukmhs') {
			redirect('login');
		}
		$this->load->model("hmahasiswa/soalmhs_model");
		$this->load->helper("security");
	}

	public function index()
	{
		$data['level'] = $this->db->get('tbllevel')->result_array();
		$this->load->view('hmahasiswa/soalmhs_view', $data);
	}

	public function level()
	{
		$data['level'] = $this->db->get('tbllevel')->result_array();
		$this->load->view('hmahasiswa/level_view', $data);
	}

	public function ambilriwayat($nim, $level = 'all')
	{
		date_default_timezone_set("Asia/Jakarta");
		$arraySoalUserNowPilgan = [];
		$arraySoalUserNowEsai = [];
		$arrayAllSoalPilgan = [];
		$arrayAllSoalEssay = [];

		$getIdSoalRiwByNimPilgan = $this->db->where('nim', $nim)->where('tipesoal', 'p')->get('tblriwayatsoal')->result_array();

		foreach ($getIdSoalRiwByNimPilgan as $item) {
			array_push($arraySoalUserNowPilgan, $item['idsoalriw']);
		}

		$getIdSoalRiwByNimEsai = $this->db->where('nim', $nim)->where('tipesoal', 'e')->get('tblriwayatsoal')->result_array();

		foreach ($getIdSoalRiwByNimEsai as $item) {
			array_push($arraySoalUserNowEsai, $item['idsoalriw']);
		}

		$getIdSoalAllPilgan = $this->db->query("SELECT DISTINCT idsoalpil, matakuliah FROM tblsoalpilgan");
		$i = 0;
		foreach ($getIdSoalAllPilgan->result_array() as $item) {
			// echo $item['idsoalpil'];
			// echo $item['matakuliah'];
			// echo "<br>";
			$j = 0;
			$arrayAllSoalPilgan[$i][$j] = $item['idsoalpil'];
			$j++;
			$arrayAllSoalPilgan[$i][$j] = $item['matakuliah'];
			$i++;
		}

		$getIdSoalAllEsai = $this->db->query("SELECT DISTINCT idsoal, matakuliah FROM tblsoalesai");
		$i = 0;
		foreach ($getIdSoalAllEsai->result_array() as $item) {
			// echo $item['idsoal'];
			// echo $item['matakuliah'];
			// echo "<br>";
			$j = 0;
			$arrayAllSoalEssay[$i][$j] = $item['idsoal'];
			$j++;
			$arrayAllSoalEssay[$i][$j] = $item['matakuliah'];
			$i++;
		}

		$tempArrayPilgan = [];
		for ($i = 0; $i < count($arrayAllSoalPilgan); $i++) {
			array_push($tempArrayPilgan, $arrayAllSoalPilgan[$i][0]);
		}

		$tempArrayEsai = [];
		for ($i = 0; $i < count($arrayAllSoalEssay); $i++) {
			array_push($tempArrayEsai, $arrayAllSoalEssay[$i][0]);
		}

		$arrayNotAddedPilgan = array_diff($tempArrayPilgan, $arraySoalUserNowPilgan);
		$arrayNotAddedEssay = array_diff($tempArrayEsai, $arraySoalUserNowEsai);
		// echo json_encode($arrayNotAddedPilgan);
		// echo "<br>";
		// echo json_encode($arrayAllSoalPilgan);
		// echo json_encode($arraySoalUserNowPilgan);
		// echo json_encode($arrayNotAddedEssay);
		// echo "<br>";
		// echo json_encode($arrayAllSoalEssay);
		// echo json_encode($arraySoalUserNowEsai);

		if (!empty($arrayNotAddedPilgan)) {
			// insert soal pilgan tipe P
			for ($i = 0; $i < count($arrayNotAddedPilgan); $i++) {
				$idsoalnow = $arrayNotAddedPilgan[$i];
				$getIdSoalAllPilgan = $this->db->query("SELECT DISTINCT idsoalpil, matakuliah FROM tblsoalpilgan WHERE idsoalpil = '$idsoalnow'");

				foreach ($getIdSoalAllPilgan->result_array() as $item) {
					$idsoalpil = $item['idsoalpil'];
					$matakuliah =  $item['matakuliah'];
				}
				$data = array(
					"idsoalriw" => $idsoalpil,
					"tipesoal" => ('p'),
					"kodemk" => $matakuliah,
					"nim" => $this->session->userdata('ses_id'),
					"namamhs" => $this->session->userdata('ses_nama'),
					"tipetugas" => 'tugas',
					"prodi" => $this->session->userdata('ses_prodi'),
					"semester" => $this->session->userdata('ses_semester'),
					"status" => ("belum"),
					"tanggal" => date('Y-m-d H:i:s'),
					"absensike" => ""
				);
				$this->db->insert("tblriwayatsoal", $data);
			}
		}
		if (!empty($arrayNotAddedEssay)) {
			// insert soal pilgan tipe P
			for ($i = 0; $i < count($arrayNotAddedEssay); $i++) {
				$idsoalnow = $arrayNotAddedEssay[$i];
				$getIdSoalAllEssay = $this->db->query("SELECT DISTINCT idsoal, matakuliah FROM tblsoalesai WHERE idsoal = '$idsoalnow'");

				foreach ($getIdSoalAllEssay->result_array() as $item) {
					$idsoalpil = $item['idsoal'];
					$matakuliah =  $item['matakuliah'];
				}
				$data = array(
					"idsoalriw" => $idsoalpil,
					"tipesoal" => ('e'),
					"kodemk" => $matakuliah,
					"nim" => $this->session->userdata('ses_id'),
					"namamhs" => $this->session->userdata('ses_nama'),
					"tipetugas" => 'tugas',
					"prodi" => $this->session->userdata('ses_prodi'),
					"semester" => $this->session->userdata('ses_semester'),
					"status" => ("belum"),
					"tanggal" => date('Y-m-d H:i:s'),
					"absensike" => ""
				);
				$this->db->insert("tblriwayatsoal", $data);
			}
		}

		echo json_encode($this->soalmhs_model->ambilriwayat($nim, $level)->result());
	}

	public function bacaesai($idsoal)
	{
		$data = $this->soalmhs_model->getesai($idsoal)->result();
		shuffle($data);
		echo json_encode($data);
	}

	public function bacapilgan($idsoalpil)
	{
		$data = $this->soalmhs_model
			->getpilgan($idsoalpil)->result();
		shuffle($data);
		echo json_encode($data);
	}

	public function updateabsen($abs)
	{
		// $tipetugas = $this->input->post("tipetugastp1");
		// $nimkel = $this->session->userdata('ses_id');
		// $tipetugas = 'kelompok';
		// $nimkel = '1513121497';
		// $qry = $this->db->query("select kelompok from tblabsensi where nim = '$nimkel'");
		// foreach ($qry->result() as $item) {
		// 	$kel = $item->kelompok;
		// }
		// $qry1 = $this->db->query("select * from tblabsensi where kelompok = '$kel'");
		// $nimkelompok = array();
		// $pjgkel = 0;
		// foreach ($qry1->result() as $item1) {
		// 	 $nimkelompok[] = $item1;
		// 	 $pjgkel++;
		// }
		// if ($tipetugas == 'kelompok') {
		// 	for ($x=0; $x < $pjgkel; $x++) { 
		// 		$a = $this->input->post("temp");
		// 		$nim = $nimkelompok[$x]->nim;
		// 		if ($a != 0) {
		// 			$temp = "Hadir";
		// 		}else{ 
		// 			$temp = "Tidak";
		// 		}
		// 		$data1 = array(
		// 			$abs => $temp
		// 		);
		// 		print_r($nimkelompok[$x]->nim);
		// 		$status = $this->soalmhs_model->updateabsensi($nim,$data1);
		// 		echo json_encode(array("status" => TRUE));
		// 	}
		// } else {
		$a = $this->input->post("temp");
		$nim = $this->input->post("nim1");
		if ($a != 0) {
			$temp = "Hadir";
		} else {
			$temp = "Tidak";
		}
		$data1 = array(
			$abs => $temp
		);
		// $status = $this->soalmhs_model->updateabsensi($nim,$data1);
		echo json_encode(array("status" => TRUE));
		// }
	}

	function ambillast()
	{
		// $nim = $this->session->userdata('ses_id');
		$sql = $this->db->query("SELECT MAX(idnilai) as akhir FROM tblriwayatnilai");
		foreach ($sql->result() as $row) {
			$nilai = $row->akhir;
		}
		return $nilai;
	}

	public function upesai()
	{
		$tipetugas = $this->input->post("tipetugastp1");
		$nimkel =  $this->session->userdata('ses_id');
		$qry = $this->db->query("select kelompok from tblabsensi where nim = '$nimkel'");
		foreach ($qry->result() as $item) {
			$kel = $item->kelompok;
		}
		$qry1 = $this->db->query("select * from tblabsensi where kelompok = '$kel'");
		$nimkelompok = array();
		$pjgkel = 0;
		foreach ($qry1->result() as $item1) {
			$nimkelompok[] = $item1;
			$pjgkel++;
		}
		// echo $pjgkel."\n";
		if ($tipetugas == 'kelompok') {
			for ($x = 0; $x < $pjgkel; $x++) {
				$akhir = $this->ambillast(); //angka terakhir idsoal
				$jlh = $this->input->post("jlhup");
				$mulai = $akhir - $jlh;
				$mulai++;
				for ($i = 1; $i <= $jlh; $i++) {
					$y = $i - 1;
					$data = array(
						"nim" => $nimkelompok[$x]->nim,
						"nama" => $nimkelompok[$x]->namamhs,
						"tipesoal" => "e",
						"idsoal" => $this->input->post("idsoal"),
						"nosoal" => $y + 1,
						"jawabesai" => $this->input->post("jawaban" . $y),
						"status" => "proses",
						"nilai" => 0,
						"tanggal" => $this->input->post("tanggal"),
						"kelompok" => $kel
					);
					$idnilai = ($mulai - 1) + $i;
					$status = $this->soalmhs_model->updatenilai($idnilai, $data);
				}
				echo json_encode(array("status" => TRUE));
			}
		} else {
			$akhir = $this->ambillast(); //angka terakhir idsoal
			$jlh = $this->input->post("jlhup");
			$mulai = $akhir - $jlh;
			$mulai++;
			for ($i = 1; $i <= $jlh; $i++) {
				$x = $i - 1;
				$data = array(
					"nim" => $this->input->post("nim1"),
					"nama" => $this->input->post("nama1"),
					"tipesoal" => "e",
					"idsoal" => $this->input->post("idsoal"),
					"nosoal" => $x + 1,
					"jawabesai" => $this->input->post("jawaban" . $x),
					"status" => "proses",
					"nilai" => 0,
					"tanggal" => $this->input->post("tanggal")
				);
				$idnilai = ($mulai - 1) + $i;
				$status = $this->soalmhs_model->updatenilai($idnilai, $data);
			}
			echo json_encode(array("status" => TRUE));
		}
	}

	public function simpanesai()
	{
		// $tipetugas = $this->input->post("tipetugastp1");
		// $nimkel = $this->session->userdata('ses_id');
		// $qry = $this->db->query("select kelompok from tblabsensi where nim = '$nimkel'");
		// foreach ($qry->result() as $item) {
		// 	$kel = $item->kelompok;
		// }
		// $qry1 = $this->db->query("select * from tblabsensi where kelompok = '$kel'");
		// $nimkelompok = array();
		// $pjgkel = 0;
		// foreach ($qry1->result() as $item1) {
		// 	 $nimkelompok[] = $item1;
		// 	 $pjgkel++;
		// }
		// if ($tipetugas == 'kelompok') {
		// 	for ($x=0; $x < $pjgkel; $x++) { 
		// 		$jlh = $this->input->post("jlh");
		// 		for ($i=0; $i <= $jlh ; $i++) { 
		// 			$data = array(
		// 				"kodemk" => $this->session->userdata("ses_kodemk"),
		// 				"nim" => $nimkelompok[$x]->nim,	
		// 				"nama" => $nimkelompok[$x]->namamhs,	
		// 				"tipesoal" => "e",	
		// 				"tipetugas" => $this->input->post("tipetugastp1"),
		// 				"idsoal" => $this->input->post("idsoal"),	
		// 				"nosoal" => $i+1,
		// 				"isisoal" => $this->input->post("tanya".$i),
		// 				"jawabesai" => $this->input->post("jawaban".$i),
		// 				"status" => "proses",
		// 				"nilai" => 0,
		// 				"tanggal" => $this->input->post("tanggal"),
		// 				"kelompok" => $kel
		// 			);
		// 			$status = $this->soalmhs_model->addnilaiesai($data);
		// 		}
		// 		$upd = array(
		// 			"status" => "proses",
		// 			"kelompok" => $kel
		// 		);
		// 		$ids = $this->input->post("idsoal");
		// 		$nim = $nimkelompok[$x]->nim;
		// 		$status = $this->soalmhs_model->update($ids,"e",$nim,$upd);
		// 		// echo json_encode(array("status" => TRUE));
		// 		$this->session->set_flashdata('berhasil','Jawaban berhasil terkirim.');	
		// 	}
		// } else {
		$jlh = $this->input->post("jlh");
		for ($i = 0; $i <= $jlh; $i++) {
			$data = array(
				"kodemk" => 'MK1',
				"nim" => $this->input->post("nim1"),
				"nama" => $this->input->post("nama1"),
				"tipesoal" => "e",
				"tipetugas" => $this->input->post("tipetugastp1"),
				"idsoal" => $this->input->post("idsoal"),
				"nosoal" => $i + 1,
				"isisoal" => $this->input->post("tanya" . $i),
				"jawabesai" => $this->input->post("jawaban" . $i),
				"status" => "proses",
				"nilai" => 0,
				"tanggal" => $this->input->post("tanggal")
			);
			$status = $this->soalmhs_model->addnilaiesai($data);
		}
		$upd = array(
			"status" => "proses",
		);
		$ids = $this->input->post("idsoal");
		$nim = $this->input->post("nim1");
		$status = $this->soalmhs_model->update($ids, "e", $nim, $upd);
		$this->session->set_flashdata('berhasil', 'Jawaban berhasil terkirim.');
		// }
		echo json_encode(array("status" => TRUE));
		// redirect('subbuatdiskusi');
	}

	public function uppilgan()
	{
		$akhir = $this->ambillast(); //angka terakhir idsoal
		$jlh = $this->input->post("jlhup");
		// $jlh = 5; // jlhsoal
		$mulai = $akhir - $jlh;
		$mulai++;
		// echo $mulai;

		for ($i = 1; $i <= $jlh; $i++) {
			$x = $i - 1;
			$data = array(
				"nim" => $this->input->post("nim1"),
				"nama" => $this->input->post("nama1"),
				"tipesoal" => "p",
				"idsoal" => $this->input->post("idsoal"),
				"nosoal" => $x + 1,
				// "isisoal" => $this->input->post("tanya".$x),
				"jawabpilgan" => $this->input->post("jbpil" . $x),
				// "a" => $this->input->post("pila".$x),
				// "b" => $this->input->post("pilb".$x),
				// "c" => $this->input->post("pilc".$x),
				// "d" => $this->input->post("pild".$x),
				"status" => "proses",
				"nilai" => 0,
				"tanggal" => $this->input->post("tanggal")
			);
			$idnilai = ($mulai - 1) + $i;
			// echo $idnilai;
			$status = $this->soalmhs_model->updatenilai($idnilai, $data);
		}
		echo json_encode(array("status" => TRUE));
	}

	public function simpanpilgan()
	{
		$jlh = $this->input->post("jlh");
		$nilai = 0;
		// print_r($this->input->post());
		// exit();
		for ($i = 0; $i <= $jlh; $i++) {
			$koreksi = $this->db->query('select * from tblsoalpilgan where idsoalpil = ? and nopilgan = ?', [$this->input->post("idsoal"), $this->input->post("nomor" . $i)])->row_array();
			$benar = 0;
			// print_r($this->input->post("jbpil".$i));
			// echo  "<br>";
			// print_r($koreksi['jawabanpilgan']);
			// echo  "<br>";
			if ($this->input->post("jbpil" . $i) == $koreksi['jawabanpilgan']) {
				if ($koreksi['idlevel'] == 1) {
					$benar = 10;
					$nilai = $nilai + 10;
				} elseif ($koreksi['idlevel'] == 2) {
					$benar = 20;
					$nilai = $nilai + 20;
				} else {
					$benar = 30;
					$nilai = $nilai + 30;
				}
			}
			$data = array(
				"kodemk" => 'MK1',
				"nim" => $this->input->post("nim1"),
				"timer" => $this->input->post("timer"),
				"nama" => $this->input->post("nama1"),
				"tipesoal" => "p",
				"tipetugas" => $this->input->post("tipetugastp1"),
				"idsoal" => $this->input->post("idsoal"),
				"nosoal" => $i + 1,
				"isisoal" => $this->input->post("tanya" . $i),
				"jawabpilgan" => $this->input->post("jbpil" . $i),
				"a" => $this->input->post("pila" . $i),
				"b" => $this->input->post("pilb" . $i),
				"c" => $this->input->post("pilc" . $i),
				"d" => $this->input->post("pild" . $i),
				"status" => "selesai",
				"nilai" => $benar,
				"tanggal" => $this->input->post("tanggal")
			);
			// echo  "<br>";
			// print_r($data);
			// echo  "<br>";
			$status = $this->soalmhs_model->addnilaipilgan($data);
		}
		$upd = array(
			"status" => "selesai",
			"timer" => $this->input->post("timer"),
			"nilai" => $nilai
		);
		$ids = $this->input->post("idsoal");
		$nim = $this->input->post("nim1");
		$status = $this->soalmhs_model->update($ids, "p", $nim, $upd);
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('berhasil', 'Jawaban berhasil terkirim.');
		// redirect('subbuatdiskusi');
	}

	public function tampil($nim, $tipesoal, $idsoal)
	{
		echo json_encode($this->soalmhs_model
			->tampilsoalselesai($nim, $tipesoal, $idsoal)->result());
	}

	public function tampilnilai($nim, $tipesoal, $idsoal)
	{
		echo json_encode($this->soalmhs_model
			->tampilsoalselesai($nim, $tipesoal, $idsoal)->result());
	}
}
