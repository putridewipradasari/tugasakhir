<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamudtm extends CI_Model
{

	// public function filter($search, $limit, $start, $order_field, $order_ascdesc)
	// {
	// 	$this->db->like('id_kartu', $search); // Untuk menambahkan query where OR LIKE
	// 	$this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE
	// 	$this->db->or_like('asal', $search); // Untuk menambahkan query where OR LIKE
	// 	$this->db->or_like('tujuan', $search);
	// 	$this->db->or_like('keterangan', $search);
	// 	$this->db->or_like('waktu_msk', $search);
	// 	$this->db->or_like('waktu_klr', $search);
	// 	$this->db->or_like('status', $search);
	// 	$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
	// 	$this->db->limit($limit, $start); // Untuk menambahkan query LIMIT

	// 	return $this->db->get('tb_dt_tamu')->result_array(); // Eksekusi query sql sesuai kondisi diatas
	// }

	// public function count_all()
	// {
	// 	return $this->db->count_all('tb_dt_tamu'); // Untuk menghitung semua data siswa
	// }

	// public function count_filter($search)
	// {
	// 	$this->db->like('id_kartu', $search); // Untuk menambahkan query where OR LIKE
	// 	$this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE
	// 	$this->db->or_like('asal', $search); // Untuk menambahkan query where OR LIKE
	// 	$this->db->or_like('tujuan', $search);
	// 	$this->db->or_like('keterangan', $search);
	// 	$this->db->or_like('waktu_msk', $search);
	// 	$this->db->or_like('waktu_klr', $search);
	// 	$this->db->or_like('status', $search);
	// 	return $this->db->get('tb_dt_tamu')->num_rows(); // Untuk menghitung asal data sesuai dengan filter pada textbox pencarian
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
		$searchMin = $postData['searchMin'];
		$searchMax = $postData['searchMax'];
		$awal = "$searchMin 00-00-00";
		$akhir = "$searchMax 23-59-59";

		## Search 
		$search_arr = array();
		$searchQuery = "";
		if ($searchValue != '') {
			$search_arr[] = " (id_kartu like '%" . $searchValue . "%' or 
         nama like '%" . $searchValue . "%' or 
         asal like'%" . $searchValue . "%' or 
        tujuan like'%" . $searchValue . "%' or 
         keterangan like'%" . $searchValue . "%' or
         waktu_msk like'%" . $searchValue . "%' or 
         waktu_klr like '%" . $searchValue . "%' or 
         status like '%" . $searchValue . "%') ";
		}

		if ($searchMin != '' && $searchMax != '') {
			$search_arr[] .= " waktu_msk between '" . $awal . "' and '" . $akhir . "' ";
		}
		if (count($search_arr) > 0) {
			$searchQuery = implode(" and ", $search_arr);
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('tb_dt_tamu')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if ($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('tb_dt_tamu')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if ($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('tb_dt_tamu')->result();

		$data = array();

		foreach ($records as $record) {

			$data[] = array(
				"id" => $record->id,
				"id_kartu" => $record->id_kartu,
				"nama" => $record->nama,
				"asal" => $record->asal,
				"tujuan" => $record->tujuan,
				"keterangan" => $record->keterangan,
				"waktu_msk" => $record->waktu_msk,
				"waktu_klr" => $record->waktu_klr,
				"status" => $record->status
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


	function tamudt_list()
	{
		$hasil = $this->db->query("SELECT * FROM tb_dt_tamu");
		return $hasil->result();
	}

	// function simpan_tamudt($id, $id_kartu, $nama, $asal, $tujuan, $keterangan, $waktu_msk, $waktu_klr, $status)
	// {
	// 	$hasil = $this->db->query("INSERT INTO tb_dt_tamu VALUES('$id','$id_kartu','$nama','$asal','$tujuan','$keterangan', '$waktu_msk', '$waktu_klr',,'$status')");
	// 	return $hasil;
	// }

	// public function simpantamudt($data)
	// {
	// 	$this->db->insert('tb_dt_tamu', $data);
	// 	return $this->db->affected_rows();
	// }

	function get_tamudt_by_id($id)
	{
		$hsl = $this->db->query("SELECT * FROM tb_dt_tamu WHERE id='$id'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id' => $data->id,
					'id_kartu' => $data->id_kartu,
					'nama' => $data->nama,
					'asal' => $data->asal,
					'tujuan' => $data->tujuan,
					'keterangan' => $data->keterangan,
					'waktu_msk' => $data->waktu_msk,
					'waktu_klr' => $data->waktu_klr,
					'status' => $data->status,
				);
			}
		}
		return $hasil;
	}

	// function tamudtbyid($id)
	// {
	// 	return $this->db->get_where('tb_dt_tamu', ['id' => $id])->result_array();
	// }

	function update_tamudt($id, $id_kartu, $nama, $asal, $tujuan, $keterangan)
	{
		$hasil = $this->db->query("UPDATE tb_dt_tamu SET id_kartu='$id_kartu',nama='$nama',asal='$asal',tujuan='$tujuan',keterangan='$keterangan' WHERE id='$id'");
		return $hasil;
	}
	function update_masukdt($id_kartu, $nama, $wkt)
	{
		$hasil = $this->db->query("UPDATE tb_msk SET nama='$nama' WHERE nik='$id_kartu' and waktu_msk='$wkt'");
		return $hasil;
	}

	// public function updatetamudt($data, $id)
	// {
	// 	$this->db->update('tb_dt_tamu', $data, ['id' => $id]);
	// 	return $this->db->affected_rows();
	// }
	function hapus_tamudt($id)
	{
		$hasil = $this->db->query("DELETE FROM tb_dt_tamu WHERE id='$id'");
		return $hasil;
	}
	// function hapustamudt($id)
	// {
	// 	$this->db->delete('tb_dt_tamu', ['id' => $id]);
	// 	return $this->db->affected_rows();
	// }
	// function get_masuk_by_nik($nik, $wkt)
	// {
	// 	// return $this->db->get_where('tb_dt_tamu', ['id_kartu' => $nik, 'waktu_msk' => $wkt])->result_array();
	// 	// $hasil = $this->db->query("SELECT * FROM tb_dt_tamu WHERE id_kartu='$nik' and waktu_msk='$wkt'");
	// 	// // return $hasil->result_array();
	// 	$query = $this->db->query("SELECT * FROM tb_msk WHERE nik='$nik' and waktu_msk='$wkt'");
	// 	return $query;
	// }
	function delete_masuk($nik, $wkt)
	{
		$hasil = $this->db->query("DELETE FROM tb_msk WHERE nik='$nik' and waktu_msk='$wkt'");
		return $hasil;
	}
}
