<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboardm extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function count_brng()
    {
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d');
        $this->db->like('waktu_msk', $now);
        $this->db->where('level', 'Tamu');
        $this->db->from('tb_msk');
        return $this->db->count_all_results();
    }
    public function count_pgw()
    {
        //return $this->db->count_all('tb_msk'); 

        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d');
        // $this->db->like('waktu_msk', $now);
        // $this->db->where('level', 'Pegawai');
        $this->db->where('status', '0');
        $this->db->from('tb_msk');
        return $this->db->count_all_results();
    }
    function statistik_pengunjung()
    {

        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $year = date('Y');
        $sql = $this->db->query("
  
        select
        ifnull((SELECT count(id) FROM (tb_dt_tamu)WHERE((Month(waktu_msk)=1)AND (YEAR(waktu_msk)=" . $year . "))),0) AS `Januari`,
        ifnull((SELECT count(id) FROM (tb_dt_tamu)WHERE((Month(waktu_msk)=2)AND (YEAR(waktu_msk)=" . $year . "))),0) AS `Februari`,
        ifnull((SELECT count(id) FROM (tb_dt_tamu)WHERE((Month(waktu_msk)=3)AND (YEAR(waktu_msk)=" . $year . "))),0) AS `Maret`,
        ifnull((SELECT count(id) FROM (tb_dt_tamu)WHERE((Month(waktu_msk)=4)AND (YEAR(waktu_msk)=" . $year . "))),0) AS `April`,
        ifnull((SELECT count(id) FROM (tb_dt_tamu)WHERE((Month(waktu_msk)=5)AND (YEAR(waktu_msk)=" . $year . "))),0) AS `Mei`,
        ifnull((SELECT count(id) FROM (tb_dt_tamu)WHERE((Month(waktu_msk)=6)AND (YEAR(waktu_msk)=" . $year . "))),0) AS `Juni`,
        ifnull((SELECT count(id) FROM (tb_dt_tamu)WHERE((Month(waktu_msk)=7)AND (YEAR(waktu_msk)=" . $year . "))),0) AS `Juli`,
        ifnull((SELECT count(id) FROM (tb_dt_tamu)WHERE((Month(waktu_msk)=8)AND (YEAR(waktu_msk)=" . $year . "))),0) AS `Agustus`,
        ifnull((SELECT count(id) FROM (tb_dt_tamu)WHERE((Month(waktu_msk)=9)AND (YEAR(waktu_msk)=" . $year . "))),0) AS `September`,
        ifnull((SELECT count(id) FROM (tb_dt_tamu)WHERE((Month(waktu_msk)=10)AND (YEAR(waktu_msk)=" . $year . "))),0) AS `Oktober`,
        ifnull((SELECT count(id) FROM (tb_dt_tamu)WHERE((Month(waktu_msk)=11)AND (YEAR(waktu_msk)=" . $year . "))),0) AS `November`,
        ifnull((SELECT count(id) FROM (tb_dt_tamu)WHERE((Month(waktu_msk)=12)AND (YEAR(waktu_msk)=" . $year . "))),0) AS `Desember`
        from tb_dt_tamu GROUP BY YEAR(waktu_msk) 
        ");

        return $sql;
    }
}
