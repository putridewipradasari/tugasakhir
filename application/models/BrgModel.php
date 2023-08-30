<?php
defined('BASEPATH') or exit('No direct script access allowed');
require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

class BrgModel extends CI_Model
{
	private $_client;
	public function __construct()
	{
		$this->_client = new Client([
			'base_uri' => 'http://localhost/aaa/',
			'auth' => ['admin', '1234']
		]);
	}

	public function filter($search, $limit, $start, $order_field, $order_ascdesc)
	{

		$response = $this->_client->request('GET', 'Barangapi_f', [
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

		/*$this->db->like('barang', $search); // Untuk menambahkan query where LIKE
		$this->db->or_like('merek', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('jumlah', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('hargasatuan', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('totalharga', $search);
		$this->db->or_like('keterangan', $search);
		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		$this->db->limit($limit, $start); // Untuk menambahkan query LIMIT

		return $this->db->get('barang')->result_array(); // Eksekusi query sql sesuai kondisi diatas*/
	}

	public function count_all()
	{
		//return $this->db->count_all('barang'); // Untuk menghitung semua data siswa

		$response = $this->_client->request('GET', 'Barangapi_ca', [
			'query' => [
				'X-API-KEY' => 'why'
			]
		]);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result['count_all'];
	}

	public function count_filter($search)
	{


		$response = $this->_client->request('GET', 'Barangapi_cf', [
			'query' => [
				'X-API-KEY' => 'why',
				'search' => $search
			]
		]);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result['search'];

		/*$this->db->like('barang', $search); // Untuk menambahkan query where LIKE
		$this->db->or_like('merek', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('jumlah', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('hargasatuan', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('totalharga', $search);
		$this->db->or_like('keterangan', $search);
		return $this->db->get('barang')->num_rows();*/ // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
	}


	function barang_list()
	{
		//$hasil = $this->db->query("SELECT * FROM barang");
		//return $hasil->result();
		$response = $this->_client->request('GET', 'Barangapi', [
			//'auth' => ['admin', '1234'],
			'query' => [
				'X-API-KEY' => 'why'
			]
		]);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result['data'][0];
	}

	function simpan_barang($id, $barang, $merek, $jumlah, $hargasatuan, $totalharga, $keterangan)
	{
		$response = $this->_client->request('POST', 'Barangapi', [
			'form_params' => [
				'barang' => $barang,
				'merek' => $merek,
				'jumlah' => $jumlah,
				'hargasatuan' => $hargasatuan,
				'totalharga' => $totalharga,
				'keterangan' => $keterangan,
				'X-API-KEY' => 'why'
			]
		]);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}



	function get_barang_by_id($id)
	{
		$response = $this->_client->request('GET', 'Barangapi', [
			//'auth' => ['admin', '1234'],
			'query' => [
				'X-API-KEY' => 'why',
				'id' => $id
			]
		]);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result['data'][0];
	}



	function update_barang($id, $barang, $merek, $jumlah, $hargasatuan, $totalharga, $keterangan)
	{
		$response = $this->_client->request(
			'PUT',
			'Barangapi',
			[
				'form_params' => [
					'barang' => $barang,
					'merek' => $merek,
					'jumlah' => $jumlah,
					'hargasatuan' => $hargasatuan,
					'totalharga' => $totalharga,
					'keterangan' => $keterangan,
					'id' => $id,
					'X-API-KEY' => 'why'
				]
			]
		);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}


	function hapus_barang($id)
	{

		$response = $this->_client->request('DELETE', 'Barangapi', [
			'form_params' => [
				'id' => $id,
				'X-API-KEY' => 'why'
			]
		]);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}
}



/* End of file BukuModel.php */
/* Location: ./application/models/BukuModel.php */
