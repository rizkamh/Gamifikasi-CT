<?php

class Nilaimhs_model extends CI_Model{

    public function ambilriwayat($nim){
        $query = $this->db
                    ->select('a.*, max(b.tanggal) as tanggal_nilai')
                    ->join('tblriwayatnilai b', 'a.idsoalriw = b.idsoal', 'left')
                    ->from("tblriwayatsoal a")
                    ->where("a.nim",$nim)
                    ->where("a.status","selesai")
                    ->group_by('a.idsoalriw')
                    ->order_by("a.idsoalriw","asc")
                    ->get();
        
        return $query;
    }

    public function ambildata($nim){
        $query = $this->db
                    ->select('a.*, max(b.tanggal) as tanggal_nilai')
                    ->from("tblriwayatsoal a")
                    ->join('tblriwayatnilai b', 'a.idsoalriw = b.idsoal', 'left')
                    ->where("a.nim",$nim)
                    ->where("a.status","selesai")
                    ->group_by('a.idsoalriw')                  
                    ->order_by("a.idsoalriw","asc")
                    ->get();
        
        return $query;
    }
}