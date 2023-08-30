<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamukrtm extends CI_Model
{

	public function filter($search, $limit, $start, $order_field, $order_ascdesc)
	{
		$this->db->like('id_kartu', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('nm_kartu', $search); // Untuk menambahkan query where OR LIKE
		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		$this->db->limit($limit, $start); // Untuk menambahkan query LIMIT

		return $this->db->get('tb_tamu')->result_array(); // Eksekusi query sql sesuai kondisi diatas
	}

	public function count_all()
	{
		return $this->db->count_all('tb_tamu'); // Untuk menghitung semua data siswa
	}

	public function count_filter($search)
	{
		$this->db->like('id_kartu', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('nm_kartu', $search); // Untuk menambahkan query where OR LIKE
		return $this->db->get('tb_tamu')->num_rows(); // Untuk menghitung asal data sesuai dengan filter pada textbox pencarian
	}


	function tamukrt_list()
	{
		$hasil = $this->db->query("SELECT * FROM tb_tamu");
		return $hasil->result();
	}

	function simpan_tamukrt($id, $id_kartu, $nm_kartu)
	{
		$hasil = $this->db->query("INSERT INTO tb_tamu VALUES('$id','$id_kartu','$nm_kartu')");
		return $hasil;
	}

	public function simpantamukrt($data)
	{
		$this->db->insert('tb_tamu', $data);
		return $this->db->affected_rows();
	}

	function get_tamukrt_by_id($id)
	{
		$hsl = $this->db->query("SELECT * FROM tb_tamu WHERE id='$id'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id' => $data->id,
					'id_kartu' => $data->id_kartu,
					'nm_kartu' => $data->nm_kartu,
				);
			}
		}
		return $hasil;
	}

	function tamukrtbyid($id)
	{
		return $this->db->get_where('tb_tamu', ['id' => $id])->result_array();
	}

	function update_tamukrt($id, $id_kartu, $nm_kartu)
	{
		$hasil = $this->db->query("UPDATE tb_tamu SET id_kartu='$id_kartu',nm_kartu='$nm_kartu' WHERE id='$id'");
		return $hasil;
	}

	public function updatetamukrt($data, $id)
	{
		$this->db->update('tb_tamu', $data, ['id' => $id]);
		return $this->db->affected_rows();
	}
	function hapus_tamukrt($id)
	{
		$hasil = $this->db->query("DELETE FROM tb_tamu WHERE id='$id'");
		return $hasil;
	}
	function hapustamukrt($id)
	{
		$this->db->delete('tb_tamu', ['id' => $id]);
		return $this->db->affected_rows();
	}
	public function kode()
	{
		$this->db->select('RIGHT(tb_tamu.id_kartu,2) as id_kartu', FALSE);
		$this->db->order_by('id_kartu', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tb_tamu');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->id_kartu) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}
		$tgl = date('dmY');
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "TM" . "4" . $tgl . $batas;  //format kode
		return $kodetampil;
	}
}
