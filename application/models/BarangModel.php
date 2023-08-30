<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangModel extends CI_Model
{

	public function filter($search, $limit, $start, $order_field, $order_ascdesc)
	{
		$this->db->like('barang', $search); // Untuk menambahkan query where LIKE
		$this->db->or_like('merek', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('jumlah', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('hargasatuan', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('totalharga', $search);
		$this->db->or_like('keterangan', $search);
		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		$this->db->limit($limit, $start); // Untuk menambahkan query LIMIT

		return $this->db->get('barang')->result_array(); // Eksekusi query sql sesuai kondisi diatas
	}

	public function count_all()
	{
		return $this->db->count_all('barang'); // Untuk menghitung semua data siswa
	}

	public function count_filter($search)
	{
		$this->db->like('barang', $search); // Untuk menambahkan query where LIKE
		$this->db->or_like('merek', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('jumlah', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('hargasatuan', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('totalharga', $search);
		$this->db->or_like('keterangan', $search);
		return $this->db->get('barang')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
	}


	function barang_list()
	{
		$hasil = $this->db->query("SELECT * FROM barang");
		return $hasil->result();
	}

	function simpan_barang($id, $barang, $merek, $jumlah, $hargasatuan, $totalharga, $keterangan)
	{
		$hasil = $this->db->query("INSERT INTO barang VALUES('$id','$barang','$merek','$jumlah','$hargasatuan','$totalharga','$keterangan')");
		return $hasil;
	}

	public function simpanbarang($data)
	{
		$this->db->insert('barang', $data);
		return $this->db->affected_rows();
	}

	function get_barang_by_id($id)
	{
		$hsl = $this->db->query("SELECT * FROM barang WHERE id='$id'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id' => $data->id,
					'barang' => $data->barang,
					'merek' => $data->merek,
					'jumlah' => $data->jumlah,
					'hargasatuan' => $data->hargasatuan,
					'totalharga' => $data->totalharga,
					'keterangan' => $data->keterangan,
				);
			}
		}
		return $hasil;
	}

	function barangbyid($id)
	{
		return $this->db->get_where('barang', ['id' => $id])->result_array();
	}

	function update_barang($id, $barang, $merek, $jumlah, $hargasatuan, $totalharga, $keterangan)
	{
		$hasil = $this->db->query("UPDATE barang SET barang='$barang',merek='$merek',jumlah='$jumlah',hargasatuan='$hargasatuan',totalharga='$totalharga',keterangan='$keterangan' WHERE id='$id'");
		return $hasil;
	}

	public function updatebarang($data, $id)
	{
		$this->db->update('barang', $data, ['id' => $id]);
		return $this->db->affected_rows();
	}
	function hapus_barang($id)
	{
		$hasil = $this->db->query("DELETE FROM barang WHERE id='$id'");
		return $hasil;
	}
	function hapusbarang($id)
	{
		$this->db->delete('barang', ['id' => $id]);
		return $this->db->affected_rows();
	}
}
