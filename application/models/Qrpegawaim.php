<?php
defined('BASEPATH') or exit('No direct script access allowed');
require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

class Qrpegawaim extends CI_Model
{
	private $_client;
	public function __construct()
	{
		$this->_client = new Client([
			'base_uri' => 'http://localhost/pusat/',
			'auth' => ['admin', '1234']
		]);
	}
	public function filter($search, $limit, $start, $order_field, $order_ascdesc)
	{

		$response = $this->_client->request('GET', 'Pegawaiapi_f', [
			'query' => [
				'X-API-KEY' => 'why',
				'search' => $search,
				'limit' => $limit,
				'start' => $start,
				'order_field' => $order_field,
				'order_ascdesc' => $order_ascdesc
			]
		]);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result['data'];
	}

	public function count_all()
	{
		$response = $this->_client->request('GET', 'Pegawaiapi_ca', [
			'query' => [
				'X-API-KEY' => 'why',
			]
		]);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result['count_all'];
	}

	public function count_filter($search)
	{


		$response = $this->_client->request('GET', 'Pegawaiapi_cf', [
			'query' => [
				'X-API-KEY' => 'why',
				'search' => $search
			]
		]);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result['search'];
	}


	function pegawai_list()
	{

		$response = $this->_client->request('GET', 'Pegawaiapi', [
			//'auth' => ['admin', '1234'],
			'query' => [
				'X-API-KEY' => 'why'
			]
		]);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result['data'][0];
	}

	function get_pegawai_by_id($id)
	{
		$response = $this->_client->request('GET', 'Pegawaiapi', [
			//'auth' => ['admin', '1234'],
			'query' => [
				'X-API-KEY' => 'why',
				'id' => $id
			]
		]);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result['data'][0];
	}

	//NON API
	// public function filter($search, $limit, $start, $order_field, $order_ascdesc)
	// {
	// 	$this->db->like('nik', $search); // Untuk menambahkan query where LIKE
	// 	$this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE
	// 	$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
	// 	$this->db->limit($limit, $start); // Untuk menambahkan query LIMIT

	// 	return $this->db->get('pegawai')->result_array(); // Eksekusi query sql sesuai kondisi diatas
	// }

	// public function count_all()
	// {
	// 	return $this->db->count_all('pegawai'); // Untuk menghitung semua data siswa
	// }

	// public function count_filter($search)
	// {
	// 	$this->db->like('nama', $search); // Untuk menambahkan query where LIKE
	// 	$this->db->or_like('nik', $search); // Untuk menambahkan query where OR LIKE
	// 	return $this->db->get('pegawai')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
	// }
	// function get_pegawai_by_id($id)
	// {
	// 	$hsl = $this->db->query("SELECT * FROM pegawai WHERE id='$id'");
	// 	if ($hsl->num_rows() > 0) {
	// 		foreach ($hsl->result() as $data) {
	// 			$hasil = array(
	// 				'id' => $data->id,
	// 				'cabang' => $data->cabang,
	// 				'nik' => $data->nik,
	// 				'no_absen' => $data->no_absen,
	// 				'no_ktp' => $data->no_ktp,
	// 				'nama' => $data->nama,
	// 				'no_kk' => $data->no_kk,
	// 				'jk' => $data->jk,
	// 				'tempat_lahir' => $data->tempat_lahir,
	// 				'tanggal_lahir' => $data->tanggal_lahir,
	// 				'pendidikan' => $data->pendidikan,
	// 				'alamat' => $data->alamat,
	// 				'tlp' => $data->tlp,
	// 				'agama' => $data->agama,
	// 				'gol_dar' => $data->gol_dar,
	// 				'tgl_masuk' => $data->tgl_masuk,
	// 				'tgl_akhir' => $data->tgl_akhir,
	// 				'status_pegawai' => $data->status_pegawai,
	// 				'bpjs_kesehatan' => $data->bpjs_kesehatan,
	// 				'bpjs_tenaga_kerja' => $data->bpjs_tenaga_kerja,
	// 				'taspen' => $data->taspen,
	// 				'email' => $data->email,
	// 				'segmen' => $data->segmen,
	// 				'no_sk_cp' => $data->no_sk_cp,
	// 				'tmt_sk_cp' => $data->tmt_sk_cp,
	// 				'no_sk_pp' => $data->no_sk_pp,
	// 			);
	// 		}
	// 	}
	// 	return $hasil;
	// }

	// function simpan_pegawai($cabang, $nik, $no_absen, $no_ktp, $nama, $no_kk, $jk, $tempat_lahir, $tanggal_lahir, $pendidikan, $alamat, $tlp, $agama, $gol_dar, $tgl_masuk, $tgl_akhir, $status_pegawai, $bpjs_kesehatan, $bpjs_tenaga_kerja, $taspen, $email, $segmen, $no_sk_cp, $tmt_sk_cp, $no_sk_pp)
	// {
	// 	$hasil = $this->db->query("INSERT INTO pegawai (cabang,nik,no_absen,no_ktp,nama,no_kk,jk,tempat_lahir,tanggal_lahir,pendidikan,alamat,tlp,agama,gol_dar,tgl_masuk,tgl_akhir,status_pegawai,bpjs_kesehatan,bpjs_tenaga_kerja,taspen,email,segmen,no_sk_cp,tmt_sk_cp,no_sk_pp)VALUES('$cabang', '$nik', '$no_absen', '$no_ktp', '$nama', '$no_kk', '$jk', '$tempat_lahir', '$tanggal_lahir', '$pendidikan', '$alamat', '$tlp', '$agama', '$gol_dar', '$tgl_masuk', '$tgl_akhir', '$status_pegawai', '$bpjs_kesehatan', '$bpjs_tenaga_kerja', '$taspen', '$email', '$segmen', '$no_sk_cp', '$tmt_sk_cp', '$no_sk_pp')");
	// 	return $hasil;
	// }

	// public function update_pegawai($id, $cabang, $nik, $no_absen, $no_ktp, $nama, $no_kk, $jk, $tempat_lahir, $tanggal_lahir, $pendidikan, $alamat, $tlp, $agama, $gol_dar, $tgl_masuk, $tgl_akhir, $status_pegawai, $bpjs_kesehatan, $bpjs_tenaga_kerja, $taspen, $email, $segmen, $no_sk_cp, $tmt_sk_cp, $no_sk_pp)
	// {
	// 	$hasil = $this->db->query("UPDATE pegawai SET cabang='$cabang', nik='$nik', no_absen='$no_absen', no_ktp='$no_ktp', nama='$nama', no_kk='$no_kk', jk='$jk', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', pendidikan='$pendidikan', alamat='$alamat', tlp='$tlp', agama='$agama', gol_dar='$gol_dar', tgl_masuk='$tgl_masuk', tgl_akhir='$tgl_akhir', status_pegawai='$status_pegawai', bpjs_kesehatan='$bpjs_kesehatan', bpjs_tenaga_kerja='$bpjs_tenaga_kerja', taspen='$taspen', email='$email', segmen='$segmen', no_sk_cp='$no_sk_cp', tmt_sk_cp='$tmt_sk_cp', no_sk_pp='$no_sk_pp' WHERE id = '$id' ");
	// 	return $hasil;
	// }

	// public function hapus_pegawai($id)
	// {
	// 	$hasil = $this->db->query("DELETE FROM pegawai WHERE id='$id'");
	// 	return $hasil;
	// }
}
