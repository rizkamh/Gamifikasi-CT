<?php

class Laporan_model extends CI_Model{
    public function ambilmahasiswa(){
        $query = $this->db
                    ->get("tblmahasiswa");
        return $query;
    }

    public function ambilabsensi($kdmk,$kelas){
        $query = $this->db
                    ->where("kodemk",$kdmk)
                    ->where("kelas",$kelas)
                    ->order_by("kelompok","asc")
                    ->get("tblabsensi");                    
        return $query;
    } 

    public function ambilmatakuliah(){
        $query = $this->db
                    ->get("tblmatakuliah");        
        return $query;
    }

    public function ambilnilai(){
        $query = $this->db
                ->select("a.nim,a.namamhs,sum(a.nilai) as nilai")
                ->from("tblriwayatsoal a")
                ->join("tblmahasiswa b","a.nim=b.nim","LEFT")
                // ->where("a.kodemk",$kodemk)
                // ->where("b.kelas",$kelas)
                // ->where("a.absensike",$pertemuan)
                // ->where("a.status","selesai")
                ->order_by("tanggal","asc")
                ->group_by("nim")
                ->get();        
        return $query;
    }

    public function ambilnilaimhs($nim,$kodemk,$tipetugas){
        $query = $this->db
                    ->where("nim",$nim)
                    ->where("kodemk",$kodemk)
                    ->where("tipetugas",$tipetugas)
                    ->where("status","selesai")                    
                    ->order_by("tanggal","asc")
                    ->get("tblriwayatsoal");
        
        return $query;
    }

}