<?php

class Soalterkirim_model extends CI_Model{ 
    public function ambilriwayat(){
        $query = $this->db
                    ->group_by("idsoalriw,tipesoal")
                    ->get("tblriwayatsoal");
        
        return $query;
    }

    public function ambilriwayatfil($kdmk){
        // $query = $this->db->query('select idesai as id, isiesai as soal, nama_level, "esai" as jenis, tanggal from tblsoalesai tbe join tbllevel lvl1 on lvl1.idlevel = tbe.idlevel 
		// union select idpilgan as id, isipilgan as soal, nama_level, "pilgan" as jenis, tanggal from tblsoalpilgan tbp join tbllevel lvl2 on lvl2.idlevel = tbp.idlevel');
        $query = $this->db
                    ->where("kodemk",$kdmk)
                    ->group_by("idsoalriw,tipesoal")
                    ->order_by("idsoalriw", "asc")
                    ->get("tblriwayatsoal");
        
        return $query;
    }

    public function getesai($idsoal){
        $query = $this->db
                    ->where("idsoal",$idsoal)
                    ->get("tblsoalesai");
        return $query;
    }

    public function getpilgan($idsoal){
        $query = $this->db
                    ->where("idsoalpil",$idsoal)
                    ->get("tblsoalpilgan");
        return $query;
    }
}