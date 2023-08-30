<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Magangm extends CI_Model
{

	public function filter($search, $limit, $start, $order_field, $order_ascdesc)
	{
		$this->db->like('no_induk', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('asal', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('tujuan', $search);
		$this->db->or_like('keterangan', $search);
		$this->db->or_like('status', $search);
		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		$this->db->limit($limit, $start); // Untuk menambahkan query LIMIT

		return $this->db->get('tb_magang')->result_array(); // Eksekusi query sql sesuai kondisi diatas
	}

	public function count_all()
	{
		return $this->db->count_all('tb_magang'); // Untuk menghitung semua data siswa
	}

	public function count_filter($search)
	{
		$this->db->like('no_induk', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('asal', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('tujuan', $search);
		$this->db->or_like('keterangan', $search);
		$this->db->or_like('status', $search);
		return $this->db->get('tb_magang')->num_rows(); // Untuk menghitung asal data sesuai dengan filter pada textbox pencarian
	}


	function magang_list()
	{
		$hasil = $this->db->query("SELECT * FROM tb_magang");
		return $hasil->result();
	}

	function simpan_magang($id, $no_induk, $nama, $asal, $tujuan, $keterangan, $status)
	{
		$hasil = $this->db->query("INSERT INTO tb_magang VALUES('$id','$no_induk','$nama','$asal','$tujuan','$keterangan','$status')");
		return $hasil;
	}

	public function simpanmagang($data)
	{
		$this->db->insert('tb_magang', $data);
		return $this->db->affected_rows();
	}

	function get_magang_by_id($id)
	{
		$hsl = $this->db->query("SELECT * FROM tb_magang WHERE id='$id'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id' => $data->id,
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

	function magangbyid($id)
	{
		return $this->db->get_where('tb_magang', ['id' => $id])->result_array();
	}

	function update_magang($id, $no_induk, $nama, $asal, $tujuan, $keterangan, $status)
	{
		$hasil = $this->db->query("UPDATE tb_magang SET no_induk='$no_induk',nama='$nama',asal='$asal',tujuan='$tujuan',keterangan='$keterangan',status='$status' WHERE id='$id'");
		return $hasil;
	}

	public function updatemagang($data, $id)
	{
		$this->db->update('tb_magang', $data, ['id' => $id]);
		return $this->db->affected_rows();
	}
	function hapus_magang($id)
	{
		$hasil = $this->db->query("DELETE FROM tb_magang WHERE id='$id'");
		return $hasil;
	}
	function hapusmagang($id)
	{
		$this->db->delete('tb_magang', ['id' => $id]);
		return $this->db->affected_rows();
	}
	public function kode()
	{
		$this->db->select('RIGHT(tb_magang.no_induk,2) as no_induk', FALSE);
		$this->db->order_by('no_induk', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tb_magang');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->no_induk) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}
		$tgl = date('dmY');
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "MG" . "3" . $tgl . $batas;  //format kode
		return $kodetampil;
	}
}
