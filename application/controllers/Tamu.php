<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamu extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Tamum');

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
	function index()
	{
		if ($this->session->userdata('userdata')->role == 'Petugas') {
			$nik = $this->input->get('nik');
			$detail = $this->Tamum->get_tamu_by_nik($nik);
			$this->load->view('Tamuv', $detail);
		} else {
			redirect(base_url("Dashboard"));
		}
	}



	public function view()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$sql_total = $this->Tamum->count_all(); // Panggil fungsi count_all pada Tamum
		$sql_data = $this->Tamum->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada Tamum
		$sql_filter = $this->Tamum->count_filter($search); // Panggil fungsi count_filter pada Tamum

		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);

		//header('Content-Type: application/json');
		echo json_encode($callback); // Convert array $callback ke json
	}


	function data_Tamu()
	{
		$data = $this->Tamum->Tamu_list();
		echo json_encode($data);
	}
	function get_Tamu()
	{
		$id = $this->input->get('id');
		$data = $this->Tamum->get_Tamu_by_id($id);
		echo json_encode($data);
	}

	function simpan_dt_tamu()
	{
		$id_kartu = $this->input->post('id_kartu', true);
		// $nm_kartu = $this->input->post('nm_kartu', true);
		$nama = $this->input->post('nama', true);
		$asal = $this->input->post('asal', true);
		$tujuan = $this->input->post('tujuan', true);
		$keterangan = $this->input->post('keterangan', true);
		$this->Tamum->simpan_dt_tamu($id_kartu, $nama, $asal, $tujuan, $keterangan);
		$this->Tamum->simpan_wkt_tamu($id_kartu, $nama);
		$_SESSION['success'] = 'Data Tamu Telah Ditambah';
		redirect(base_url() . "Aman");
	}

	// function simpan_msktm()
	// {
	// 	if ($this->input->is_ajax_request() == true) {
	// 		$id = $this->input->post('id', true);
	// 		$nama = $this->input->post('nama', true);
	// 		$nik_ktp = $this->input->post('nik_ktp', true);
	// 		$ket = $this->input->post('ket', true);

	// 		$this->form_validation->set_rules(
	// 			'nama',
	// 			'nama',
	// 			'required|trim',
	// 			[
	// 				'required' => '%s tidak boleh kosong'
	// 			]
	// 		);
	// 		$this->form_validation->set_rules(
	// 			'nik_ktp',
	// 			'nik_ktp',
	// 			'required|trim',
	// 			[
	// 				'required' => '%s tidak boleh kosong'
	// 			]
	// 		);
	// 		$this->form_validation->set_rules(
	// 			'ket',
	// 			'ket',
	// 			'required|trim',
	// 			[
	// 				'required' => '%s tidak boleh kosong'
	// 			]
	// 		);

	// 		if ($this->form_validation->run() == TRUE) {
	// 			$data = $this->Tamum->simpan_wkttm($id, $nama, $nik_ktp, $ket);
	// 		} else {
	// 			$data = [
	// 				'error' => '<div class="alert alert-warning alert-dismissible" role="alert">
	// 				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	// 				' . validation_errors() . '
	// 			  </div>'
	// 			];
	// 		}
	// 		echo json_encode($data);
	// 	}
	// }

	function update_Tamu()
	{
		$id = $this->input->post('id');
		$data = $this->Tamum->update_tamu($id);
		echo json_encode($data);
	}

	function hapus_Tamu()
	{
		$id = $this->input->post('kode');
		$data = $this->Tamum->hapus_Tamu($id);
		echo json_encode($data);
	}
}
