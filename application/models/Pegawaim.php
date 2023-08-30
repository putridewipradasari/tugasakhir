<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawaim extends CI_Model
{


	public function filter($search, $limit, $start, $order_field, $order_ascdesc)
	{
		$this->db->like('nama', $search); // Untuk menambahkan query where LIKE
		$this->db->or_like('alamat', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('bagian', $search);
		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		$this->db->limit($limit, $start); // Untuk menambahkan query LIMIT

		return $this->db->get('pegawai')->result_array(); // Eksekusi query sql sesuai kondisi diatas
	}

	public function count_all()
	{
		return $this->db->count_all('pegawai'); // Untuk menghitung semua data siswa
	}

	public function count_filter($search)
	{
		$this->db->like('nama', $search); // Untuk menambahkan query where LIKE
		$this->db->or_like('alamat', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('bagian', $search);
		return $this->db->get('pegawai')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
	}


	function pegawai_list()
	{
		$hasil = $this->db->query("SELECT * FROM pegawai");
		return $hasil->result();
	}

	function simpan_pegawai($idpegawai, $nama, $alamat, $bagian)
	{
		$hasil = $this->db->query("INSERT INTO pegawai VALUES('$idpegawai','$nama','$alamat','$bagian')");
		return $hasil;
	}

	function get_pegawai_by_id($idpegawai)
	{
		$hsl = $this->db->query("SELECT * FROM pegawai WHERE idpegawai='$idpegawai'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'idpegawai' => $data->idpegawai,
					'nama' => $data->nama,
					'alamat' => $data->alamat,
					'bagian' => $data->bagian,
				);
			}
		}
		return $hasil;
	}

	function update_pegawai($idpegawai, $nama, $alamat, $bagian)
	{
		$hasil = $this->db->query("UPDATE pegawai SET nama='$nama',alamat='$alamat',bagian='$bagian' WHERE idpegawai='$idpegawai'");
		return $hasil;
	}

	function hapus_pegawai($idpegawai)
	{
		$hasil = $this->db->query("DELETE FROM pegawai WHERE idpegawai='$idpegawai'");
		return $hasil;
	}
}



/* End of file BukuModel.php */
/* Location: ./application/models/BukuModel.php */
