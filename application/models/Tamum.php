<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamum extends CI_Model
{


    // public function filter($search, $limit, $start, $order_field, $order_ascdesc)
    // {
    //     $this->db->like('nik_ktp', $search); // Untuk menambahkan query where LIKE
    //     $this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE
    //     $this->db->or_like('ket', $search);
    //     $this->db->or_like('wkt_msk', $search);
    //     $this->db->or_like('wkt_klr', $search);
    //     $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    //     $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT

    //     return $this->db->get('tamu')->result_array(); // Eksekusi query sql sesuai kondisi diatas
    // }

    // public function count_all()
    // {
    //     return $this->db->count_all('tamu'); // Untuk menghitung semua data siswa
    // }

    // public function count_filter($search)
    // {
    //     $this->db->like('nik_ktp', $search); // Untuk menambahkan query where LIKE
    //     $this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE
    //     $this->db->or_like('ket', $search);
    //     $this->db->or_like('wkt_msk', $search);
    //     $this->db->or_like('wkt_klr', $search);
    //     return $this->db->get('tamu')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
    // }


    // function get_tamu_by_nik_ktp($nik_ktp)
    // {
    //     $hsl = $this->db->query("SELECT * FROM tamu WHERE nik_ktp='$nik_ktp'");
    //     if ($hsl->num_rows() > 0) {
    //         foreach ($hsl->result() as $data) {
    //             $hasil = array(
    //                 'cabang' => $data->cabang,
    //                 'nik_ktp' => $data->nik_ktp,
    //                 'nama' => $data->nama,
    //                 'ktp' => $data->ktp,
    //                 'wkt_msk' => $data->wkt_msk,
    //                 'kk' => $data->kk,
    //                 'jk' => $data->jk,
    //             );
    //         }
    //     }
    //     return $hasil;
    // }

    // public function simpan_wkttm($id, $nama, $nik_ktp, $ket)
    // {
    //     date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
    //     $now = date('Y-m-d H:i:s');
    //     $this->db->set('id', $id);
    //     $this->db->set('nama', $nama);
    //     $this->db->set('nik_ktp', $nik_ktp);
    //     $this->db->set('ket', $ket);
    //     $this->db->set('wkt_msk', $now);
    //     $this->db->insert('tamu');
    // }
    public function simpan_dt_tamu($id_kartu, $nama, $asal, $tujuan, $keterangan)
    {
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $this->db->set('id_kartu', $id_kartu);
        $this->db->set('nama', $nama);
        $this->db->set('asal', $asal);
        $this->db->set('tujuan', $tujuan);
        $this->db->set('keterangan', $keterangan);
        $this->db->set('waktu_msk', $now);
        $this->db->set('status', '0');
        $this->db->insert('tb_dt_tamu');
    }

    public function simpan_wkt_tamu($id_kartu, $nm_kartu)
    {
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $level = 'Tamu';
        return $this->db->query("INSERT INTO tb_msk (nik,nama,waktu_msk,level,STATUS) VALUES('$id_kartu','$nm_kartu','$now','$level','0')");
    }

    function update_tamu($id)
    {
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $this->db->set('wkt_klr', $now);
        $this->db->where('id', $id);
        $this->db->update('tamu');
    }

    function get_tamu_by_nik($nik)
    {
        $hsl = $this->db->query("SELECT * FROM tb_tamu WHERE id_kartu='$nik'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'id_kartu' => $data->id_kartu,
                    'nm_kartu' => $data->nm_kartu
                );
            }
        }
        return $hasil;
    }
}



/* End of file BukuModel.php */
/* Location: ./application/models/BukuModel.php */
