<?php
defined('BASEPATH') or exit('No direct script access allowed');
require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

class Masukdm extends CI_Model
{
    private $_client;
    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/pusat/',
            'auth' => ['admin', '1234']
        ]);
    }

    function get_aman_by_nik($nik)
    {
        $response = $this->_client->request('GET', 'Pegawaiapi', [
            //'auth' => ['admin', '1234'],
            'query' => [
                'X-API-KEY' => 'why',
                'nik' => $nik
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }
    function get_aman_data_nik($nik)
    {
        $response = $this->_client->request('GET', 'Pegawaiapi', [
            //'auth' => ['admin', '1234'],
            'query' => [
                'X-API-KEY' => 'why',
                'nik' => $nik
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }

    // function get_aman_by_nik($nik)
    // {
    //     return $this->db->get_where('pegawai', ['nik' => $nik])->result_array();
    // }
    // function get_aman_data_nik($nik)
    // {
    //     $hsl = $this->db->query("SELECT * FROM pegawai WHERE nik='$nik'");
    //     if ($hsl->num_rows() > 0) {
    //         foreach ($hsl->result() as $data) {
    //             $hasil = array(
    //                 'cabang' => $data->cabang,
    //                 'nik' => $data->nik,
    //                 'no_absen' => $data->no_absen,
    //                 'no_ktp' => $data->no_ktp,
    //                 'nama' => $data->nama,
    //                 'no_kk' => $data->no_kk,
    //                 'jk' => $data->jk,
    //                 'tempat_lahir' => $data->tempat_lahir,
    //                 'tanggal_lahir' => $data->tanggal_lahir,
    //                 'pendidikan' => $data->pendidikan,
    //                 'alamat' => $data->alamat,
    //                 'tlp' => $data->tlp,
    //                 'agama' => $data->agama,
    //                 'gol_dar' => $data->gol_dar,
    //                 'tgl_masuk' => $data->tgl_masuk,
    //                 'tgl_akhir' => $data->tgl_akhir,
    //                 'status_pegawai' => $data->status_pegawai,
    //                 'bpjs_kesehatan' => $data->bpjs_kesehatan,
    //                 'bpjs_tenaga_kerja' => $data->bpjs_tenaga_kerja,
    //                 'taspen' => $data->taspen,
    //                 'email' => $data->email,
    //                 'segmen' => $data->segmen,
    //                 'no_sk_cp' => $data->no_sk_cp,
    //                 'tmt_sk_cp' => $data->tmt_sk_cp,
    //                 'no_sk_pp' => $data->no_sk_pp,
    //             );
    //         }
    //     }
    //     return $hasil;
    // }

    function get_data_msk($id)
    {
        $hsl = $this->db->query("SELECT * FROM tb_msk WHERE id='$id'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'nik' => $data->nik,
                    'nama' => $data->nama,
                    'waktu_msk' => $data->waktu_msk,
                    'waktu_klr' => $data->waktu_klr,
                    'level' => $data->level,
                    'status' => $data->status,
                );
            }
        }
        return $hasil;
    }

    // magang
    function get_magang_by_nik($nik)
    {
        return $this->db->get_where('tb_magang', ['no_induk' => $nik])->result_array();
    }
    function get_magang_data_nik($nik)
    {
        $hsl = $this->db->query("SELECT * FROM tb_magang WHERE no_induk='$nik'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'no_induk' => $data->no_induk,
                    'nama' => $data->nama,
                    'asal' => $data->asal,
                    'tujuan' => $data->tujuan,
                    'keterangan' => $data->keterangan,
                    'status' => $data->status,
                );
            }
        }
        return $hasil;
    }

    // honorer
    function get_honorer_by_nik($nik)
    {
        return $this->db->get_where('tb_honorer', ['no_induk' => $nik])->result_array();
    }
    function get_honorer_data_nik($nik)
    {
        $hsl = $this->db->query("SELECT * FROM tb_honorer WHERE no_induk='$nik'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'no_induk' => $data->no_induk,
                    'nama' => $data->nama,
                    'asal' => $data->asal,
                    'bidang' => $data->bidang,
                    'ktp' => $data->ktp,
                    'no_tlp' => $data->no_tlp,
                    'status' => $data->status,
                );
            }
        }
        return $hasil;
    }
    function get_tamu_by_nik($nik)
    {
        return $this->db->get_where('tb_tamu', ['id_kartu' => $nik])->result_array();
    }


    public function get_tamu_nik($nik, $wkt)
    {
        $hsl = $this->db->query("SELECT * FROM tb_dt_tamu WHERE id_kartu='$nik' and waktu_msk='$wkt'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'id_kartu' => $data->id_kartu,
                    'nama' => $data->nama,
                    'asal' => $data->asal,
                    'tujuan' => $data->tujuan,
                    'keterangan' => $data->keterangan,
                    'waktu_msk' => $data->waktu_msk,
                    'waktu_klr' => $data->waktu_klr,
                );
            }
        }
        return $hasil;
    }
}
