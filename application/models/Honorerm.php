<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Honorerm extends CI_Model
{

	public function filter($search, $limit, $start, $order_field, $order_ascdesc)
	{
		$this->db->like('no_induk', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('asal', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('bidang', $search);
		$this->db->or_like('ktp', $search);
		$this->db->or_like('no_tlp', $search);
		$this->db->or_like('status', $search);
		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		$this->db->limit($limit, $start); // Untuk menambahkan query LIMIT

		return $this->db->get('tb_honorer')->result_array(); // Eksekusi query sql sesuai kondisi diatas
	}

	public function count_all()
	{
		return $this->db->count_all('tb_honorer'); // Untuk menghitung semua data siswa
	}

	public function count_filter($search)
	{
		$this->db->like('no_induk', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('asal', $search); // Untuk menambahkan query where OR LIKE
		$this->db->or_like('bidang', $search);
		$this->db->or_like('ktp', $search);
		$this->db->or_like('no_tlp', $search);
		$this->db->or_like('status', $search);
		return $this->db->get('tb_honorer')->num_rows(); // Untuk menghitung asal data sesuai dengan filter pada textbox pencarian
	}


	function honorer_list()
	{
		$hasil = $this->db->query("SELECT * FROM tb_honorer");
		return $hasil->result();
	}

	function simpan_honorer($id, $no_induk, $nama, $asal, $bidang, $ktp, $no_tlp, $status)
	{
		$hasil = $this->db->query("INSERT INTO tb_honorer VALUES('$id','$no_induk','$nama','$asal','$bidang','$ktp','$no_tlp','$status')");
		return $hasil;
	}

	public function simpanhonorer($data)
	{
		$this->db->insert('tb_honorer', $data);
		return $this->db->affected_rows();
	}

	function get_honorer_by_id($id)
	{
		$hsl = $this->db->query("SELECT * FROM tb_honorer WHERE id='$id'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id' => $data->id,
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

	function honorerbyid($id)
	{
		return $this->db->get_where('tb_honorer', ['id' => $id])->result_array();
	}

	function update_honorer($id, $no_induk, $nama, $asal, $bidang, $ktp, $no_tlp, $status)
	{
		$hasil = $this->db->query("UPDATE tb_honorer SET no_induk='$no_induk',nama='$nama',asal='$asal',bidang='$bidang',ktp='$ktp',no_tlp='$no_tlp',status='$status' WHERE id='$id'");
		return $hasil;
	}

	public function updatehonorer($data, $id)
	{
		$this->db->update('tb_honorer', $data, ['id' => $id]);
		return $this->db->affected_rows();
	}
	function hapus_honorer($id)
	{
		$hasil = $this->db->query("DELETE FROM tb_honorer WHERE id='$id'");
		return $hasil;
	}
	function hapushonorer($id)
	{
		$this->db->delete('tb_honorer', ['id' => $id]);
		return $this->db->affected_rows();
	}
	public function kode()
	{
		$this->db->select('RIGHT(tb_honorer.no_induk,2) as no_induk', FALSE);
		$this->db->order_by('no_induk', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tb_honorer');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->no_induk) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}
		$tgl = date('dmY');
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "HN" . "2" . $tgl . $batas;  //format kode
		return $kodetampil;
	}
}
