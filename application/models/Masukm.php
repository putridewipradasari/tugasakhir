<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masukm extends CI_Model
{


	// public function filter($search, $limit, $start, $order_field,$order_ascdesc, $startdate, $enddate)
	// {
	// 	// date_default_timezone_set('Asia/Jakarta');


	// 	if ($startdate == null && $enddate == null) {
	// 		$this->db->like('nik', $search); // Untuk menambahkan query where LIKE
	// 		$this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE
	// 		$this->db->or_like('waktu_msk', $search); // Untuk menambahkan query where OR LIKE
	// 		$this->db->or_like('waktu_klr', $search);
	// 		$this->db->or_like('level', $search);
	// 		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
	// 		$this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
	// 		return $this->db->get('tb_msk')->result_array(); // Eksekusi query sql sesuai kondisi diatas
	// 	} else {
	// 		$mulai = $startdate . ' 00:00:00';
	// 		$akhir = $enddate . ' 23:59:59';
	// 		$this->db->like('nik', $search); // Untuk menambahkan query where LIKE
	// 		$this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE
	// 		$this->db->or_like('waktu_msk', $search); // Untuk menambahkan query where OR LIKE
	// 		$this->db->or_like('waktu_klr', $search);
	// 		$this->db->or_like('level', $search);
	// 		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
	// 		$this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
	// 		$this->db->where('waktu_msk >=', $mulai);
	// 		$this->db->where('waktu_msk <=', $akhir);
	// 		return $this->db->get('tb_msk')->result_array(); // Eksekusi query sql sesuai kondisi diatas
	// 	}
	// }

	// public function count_all()
	// {
	// 	return $this->db->count_all('tb_msk'); // Untuk menghitung semua data 
	// }

	// public function count_filter($search)
	// {
	// 	$this->db->like('nik', $search); // Untuk menambahkan query where LIKE
	// 	$this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE
	// 	$this->db->or_like('waktu_msk', $search); // Untuk menambahkan query where OR LIKE
	// 	$this->db->or_like('waktu_klr', $search);
	// 	$this->db->or_like('level', $search);
	// 	return $this->db->get('tb_msk')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
	// 	//return $this->db->query("SELECT tb_msk.id, tb_msk.nik, pegawai.nama, tb_msk.waktu FROM tb_msk JOIN pegawai ON pegawai.nik=tb_msk.nik")->num_rows();
	// 	/*$this->db->select('tb_msk.id, tb_msk.nik, pegawai.nama, tb_msk.waktu');
	// 	$this->db->from('tb_msk');
	// 	$this->db->join('pegawai', 'pegawai.nik = tb_msk.nik');
	// 	return $this->db->get()->num_rows();*/
	// }


	function hapus_masuk($id)
	{
		$hasil = $this->db->query("DELETE FROM tb_msk WHERE id='$id'");
		return $hasil;
	}

	// Get DataTable data
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
		$searchMin = $postData['searchMin'];
		$searchMax = $postData['searchMax'];
		$awal = "$searchMin 00-00-00";
		$akhir = "$searchMax 23-59-59";

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
		// if ($searchMin != '') {
		// $search_arr[] = " waktu_msk like '%" . $date . "%' ";
		// }
		// if ($searchMax != '') {
		// 	$search_arr[] = " waktu_msk like '%" . $searchMax . "%' ";
		// }
		if ($searchMin != '' && $searchMax != '') {
			$search_arr[] .= " waktu_msk between '" . $awal . "' and '" . $akhir . "' ";
		}
		// if ($searchMin != '') {
		// 	$search_arr[] = " waktu_msk='" . $searchMin . "' ";
		// }
		// if ($searchMax != '') {
		// 	$search_arr[] = " waktu_msk='" . $searchMax . "' ";
		// }
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

	function get_tamu_by_nik($nik, $wkt)
	{
		// return $this->db->get_where('tb_dt_tamu', ['id_kartu' => $nik, 'waktu_msk' => $wkt])->result_array();
		// $hasil = $this->db->query("SELECT * FROM tb_dt_tamu WHERE id_kartu='$nik' and waktu_msk='$wkt'");
		// // return $hasil->result_array();
		$query = $this->db->query("SELECT * FROM tb_dt_tamu WHERE id_kartu='$nik' and waktu_msk='$wkt'");
		return $query;
	}
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
	function delete_tamu($nik,$wkt)
	{
		$hasil = $this->db->query("DELETE FROM tb_dt_tamu WHERE id_kartu='$nik' and waktu_msk='$wkt'");
		return $hasil;
	}

}
