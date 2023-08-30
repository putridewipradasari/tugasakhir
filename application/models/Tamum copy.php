<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamum extends CI_Model
{


    public function filter($search, $limit, $start, $order_field, $order_ascdesc)
    {
        $this->db->like('nik', $search); // Untuk menambahkan query where LIKE
        $this->db->or_like('absen', $search); // Untuk menambahkan query where OR LIKE
        $this->db->or_like('nama', $search);
        $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
        $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT

        return $this->db->get('aman')->result_array(); // Eksekusi query sql sesuai kondisi diatas
    }

    public function count_all()
    {
        return $this->db->count_all('aman'); // Untuk menghitung semua data siswa
    }

    public function count_filter($search)
    {
        $this->db->like('nik', $search); // Untuk menambahkan query where LIKE
        $this->db->or_like('absen', $search); // Untuk menambahkan query where OR LIKE
        $this->db->or_like('nama', $search);
        return $this->db->get('aman')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
    }


    function get_aman_by_nik($nik)
    {
        $hsl = $this->db->query("SELECT * FROM aman WHERE nik='$nik'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'cabang' => $data->cabang,
                    'nik' => $data->nik,
                    'absen' => $data->absen,
                    'ktp' => $data->ktp,
                    'nama' => $data->nama,
                    'kk' => $data->kk,
                    'jk' => $data->jk,
                    'tmp_lhr' => $data->tmp_lhr,
                    'tgl_lhr' => $data->tgl_lhr,
                    'pendidikan' => $data->pendidikan,
                    'alamat' => $data->alamat,
                    'telp' => $data->telp,
                    'agama' => $data->agama,
                    'goldar' => $data->goldar,
                    'tgl_masuk' => $data->tgl_masuk,
                    'tgl_akhir' => $data->tgl_akhir,
                    'statuspegawai' => $data->statuspegawai,
                    'bpjs_kes' => $data->bpjs_kes,
                    'bpjs_tk' => $data->bpjs_tk,
                    'taspen' => $data->taspen,
                    'email' => $data->email,
                    'segmen' => $data->segmen,
                    'no_skcalon' => $data->no_skcalon,
                    'tmt_sk' => $data->tmt_sk,
                    'no_skpgw' => $data->no_skpgw,
                );
            }
        }
        return $hasil;
    }

    public function simpan_wkttm($id, $nama, $nik, $ket)
    {
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $this->db->set('id', $id);
        $this->db->set('nama', $nama);
        $this->db->set('nik', $nik);
        $this->db->set('wkt_msk', $now);
        $this->db->set('ket', $ket);
        $this->db->insert('tamu_msk');
    }
    public function simpan_klrtm($id_klr, $nama_klr, $nik_klr, $wkt_msk)
    {
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $this->db->set('id_klr', $id_klr);
        $this->db->set('nama_klr', $nama_klr);
        $this->db->set('nik_klr', $nik_klr);
        $this->db->set('wkt_msk', $wkt_msk);
        $this->db->set('wkt_klr', $now);
        $this->db->insert('tamu_klr');
    }
}



/* End of file BukuModel.php */
/* Location: ./application/models/BukuModel.php */
