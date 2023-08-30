<?php
defined('BASEPATH') or exit('No direct script access allowed');
require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

class Amanm extends CI_Model
{

    private $_client;
    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/pusat/',
            'auth' => ['admin', '1234']
        ]);
    }
    // public function filter($search, $limit, $start, $order_field, $order_ascdesc)
    // {
    //     if ($search == null) {
    //         date_default_timezone_set('Asia/Jakarta');
    //         $date = date('Y-m-d');
    //         $this->db->like('waktu_msk', $date);
    //         $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    //         $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
    //         return $this->db->get('tb_msk')->result_array();
    //     } else {
    //         date_default_timezone_set('Asia/Jakarta');
    //         $date = date('Y-m-d');
    //         $this->db->like('waktu_msk', $date);
    //         $this->db->like('nik', $search); // Untuk menambahkan query where LIKE
    //         $this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE
    //         $this->db->or_like('waktu_msk', $search); // Untuk menambahkan query where OR LIKE
    //         $this->db->or_like('waktu_klr', $search);
    //         $this->db->or_like('level', $search);
    //         $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    //         $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT

    //         return $this->db->get('tb_msk')->result_array();
    //         // return $this->db->get('tb_msk', ['waktu_msk' => $date])->result_array();
    //         // return $this->db->query("SELECT * FROM tb_msk WHERE nik like '$search' or nama like '$search' or waktu_msk like '$search' or waktu_klr like '$search' order by $order_ascdesc or order by $order_field limit $limit");
    //     }
    // }

    // public function count_all()
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $date = date('Y-m-d');
    //     $this->db->like('waktu_msk', $date);
    //     // return $this->db->count_all('tb_msk');
    //     return $this->db->get('tb_msk')->num_rows();
    // }

    // public function count_filter($search)
    // {
    //     if ($search == null) {
    //         date_default_timezone_set('Asia/Jakarta');
    //         $date = date('Y-m-d');
    //         $this->db->like('waktu_msk', $date);
    //         return $this->db->get('tb_msk')->num_rows();
    //     } else {
    //         date_default_timezone_set('Asia/Jakarta');
    //         $date = date('Y-m-d');
    //         $this->db->like('waktu_msk', $date);
    //         $this->db->like('nik', $search); // Untuk menambahkan query where LIKE
    //         $this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE
    //         $this->db->or_like('waktu_msk', $search); // Untuk menambahkan query where OR LIKE
    //         $this->db->or_like('waktu_klr', $search);
    //         $this->db->or_like('level', $search);
    //         return $this->db->get('tb_msk')->num_rows();
    //     }
    // }

    function getUsers($postData = null)
    {

        $response = array();
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column nama
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        // $searchMin = $postData['searchMin'];
        // $searchMax = $postData['searchMax'];
        // $awal = "$searchMin 00-00-00";
        // $akhir = "$searchMax 23-59-59";

        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = " (nik like '%" . $searchValue . "%' or 
         nama like '%" . $searchValue . "%' or 
         waktu_msk like'%" . $searchValue . "%'or 
         waktu_klr like '%" . $searchValue . "%' or 
         level like '%" . $searchValue . "%') ";
        }

        $search_arr[] = " waktu_msk like '%" . $date . "%' ";

        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('tb_msk')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get('tb_msk')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('tb_msk')->result();

        $data = array();

        foreach ($records as $record) {

            $data[] = array(
                "id" => $record->id,
                "nik" => $record->nik,
                "nama" => $record->nama,
                "waktu_msk" => $record->waktu_msk,
                "waktu_klr" => $record->waktu_klr,
                "level" => $record->level
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
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
        // $result = json_decode($response->getBody()->getContents(), true);
        $result = json_decode($response->getBody(), true);
        return $result['status'];
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
    // magang
    function get_magang_by_nik($nik)
    {

        $hsl = $this->db->query("SELECT * FROM tb_magang WHERE no_induk='$nik' and status='Aktif'");
        return $hsl->result_array();
    }
    function get_magang_data_nik($nik)
    {
        $hsl = $this->db->query("SELECT * FROM tb_magang WHERE no_induk='$nik' and status='Aktif'");
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
        $hsl = $this->db->query("SELECT * FROM tb_honorer WHERE no_induk='$nik' and status='Aktif'");
        return $hsl->result_array();
    }
    function get_honorer_data_nik($nik)
    {
        $hsl = $this->db->query("SELECT * FROM tb_honorer WHERE no_induk='$nik' and status='Aktif'");
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
        // $hsl = $this->db->query("SELECT * FROM tb_tamu WHERE id_kartu='$nik'");
        // if ($hsl->num_rows() > 0) {
        //     foreach ($hsl->result() as $data) {
        //         $hasil = array(
        //             'id_kartu' => $data->id_kartu,
        //             'nm_kartu' => $data->nm_kartu
        //         );
        //     }
        // }
        // return $hasil;
        return $this->db->get_where('tb_tamu', ['id_kartu' => $nik])->result_array();
    }

    public function keamanan($nik, $nama, $level)
    {
        /*date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $this->db->set('nik', $nik);
        $this->db->set('waktu', $now);
        $this->db->insert('tb_msk');*/

        date_default_timezone_set('Asia/Jakarta');
        //$date = date('Y-m-d');
        //$time = date('H:i:s A');
        $now = date('Y-m-d H:i:s');
        //$sql = "SELECT * FROM tb_msk WHERE nik='$nik' AND STATUS='0'";
        $query = $this->db->query("SELECT * FROM tb_msk WHERE nik='$nik' AND STATUS='0'");
        if ($query->num_rows() > 0) {
            //$sql = "UPDATE tb_msk SET waktu_klr='$time', STATUS='1' WHERE nik='$nik'";
            return $this->db->query("UPDATE tb_msk SET waktu_klr='$now', STATUS='1' WHERE nik='$nik' AND STATUS='0'");
        } else {
            return $this->db->query("INSERT INTO tb_msk (nik,nama,waktu_msk,level,STATUS) VALUES('$nik','$nama','$now','$level','0')");
        }
    }

    public function get_tamu_nik($nik)
    {
        $query = $this->db->query("SELECT * FROM tb_msk WHERE nik='$nik' AND STATUS='0'");
        return $query;
    }

    public function keamanan_tamu($nik)
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');
        return $this->db->query("UPDATE tb_msk SET waktu_klr='$now', STATUS='1' WHERE nik='$nik' AND STATUS='0'");
    }
    public function data_tamu_keluar($nik)
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');
        return $this->db->query("UPDATE tb_dt_tamu SET waktu_klr='$now', STATUS='1' WHERE id_kartu='$nik' AND STATUS='0'");
    }
}
