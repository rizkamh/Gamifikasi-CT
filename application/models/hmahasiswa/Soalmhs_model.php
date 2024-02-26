<?php 

class Soalmhs_model extends CI_Model{
    public function ambilriwayat($nim,$level='all'){
        $sql = 'SELECT `tblriwayatsoal`.*, `tblsoalpilgan`.`idlevel` FROM `tblriwayatsoal` 
        JOIN `tblsoalpilgan` ON `tblsoalpilgan`.`idsoalpil` = `tblriwayatsoal`.`idsoalriw` 
        WHERE `nim` = ?';
        if($level!='all'){
            $sql .= ' AND `tblsoalpilgan`.`idlevel` = '.$level.'';
        }
        $sql .= ' GROUP BY `idsoalriw` UNION ALL
        SELECT `tblriwayatsoal`.*, `tblsoalesai`.`idlevel` FROM `tblriwayatsoal` 
        JOIN `tblsoalesai` ON `tblsoalesai`.`idsoal` = `tblriwayatsoal`.`idsoalriw` 
        WHERE `nim` = ?';
        if($level!='all'){
            $sql .= ' AND `tblsoalesai`.`idlevel` =  '.$level.'';
        }
        $sql .= ' GROUP BY `idsoalriw` ORDER BY `idsoalriw` ASC';
        $query = $this->db->query($sql, array($nim,$nim));
        return $query;
    }

    public function getesai($idsoal){
        $query = $this->db
                    ->where("idsoal",$idsoal)                    
                    ->get("tblsoalesai");
        return $query;
    }

    public function getpilgan($idsoalpil){
        $query = $this->db
                    ->where("idsoalpil",$idsoalpil)
                    ->get("tblsoalpilgan");
        return $query;
    }

    public function getsoal($idsoalpil){
        $query = $this->db
                    ->where("idsoalpil",$idsoalpil)
                    ->get("tblsoalpilgan");
        return $query;
    }

    public function addnilaiesai($data){
        $query = $this->db
                    ->insert("tblriwayatnilai",$data);

        return $this->db->affected_rows();
    }

    public function addnilaipilgan($data){
        $query = $this->db
                    ->insert("tblriwayatnilai",$data);

        return $this->db->affected_rows();
    }

    public function updatenilai($idnilai,$data){
        $query = $this->db
                    ->where("idnilai",$idnilai)
                    ->update("tblriwayatnilai",$data);
        
        return $this->db->affected_rows();
    }

    public function update($idsoal,$tipesoal,$nim,$data){
        $query = $this->db
                    ->where("idsoalriw",$idsoal)
                    ->where("tipesoal",$tipesoal)
                    ->where("nim",$nim)
                    ->update("tblriwayatsoal",$data);
        
        return $this->db->affected_rows();
    }
    

    public function tampilsoalselesai($nim,$tipesoal,$idsoal){
        $query = $this->db
                    // ->select_max('tanggal')
                    ->where("nim",$nim)
                    ->where("tipesoal",$tipesoal)
                    ->where("idsoal",$idsoal)
                    ->get("tblriwayatnilai");
        return $query;
    }

    public function tampilnilai($nim,$tipesoal,$idsoal){
        $query = $this->db
                    ->where("nim",$nim)
                    ->where("tipesoal",$tipesoal)
                    ->where("idsoal",$idsoal)
                    ->group_by("idsoal")
                    ->get("tblriwayatnilai");
        return $query; 
    }

    public function updateabsensi($nim,$data){
        $query = $this->db
                    ->where("nim",$nim)
                    ->update("tblabsensi",$data);        
        return $this->db->affected_rows();
    }
}