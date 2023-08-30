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
		$this->load->view('Tamuv');
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

	function simpan_msktm()
	{
		if ($this->input->is_ajax_request() == true) {
			$id = $this->input->post('id', true);
			$nama = $this->input->post('nama', true);
			$nik = $this->input->post('nik', true);
			$ket = $this->input->post('ket', true);

			$this->form_validation->set_rules(
				'nama',
				'nama',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'nik',
				'nik',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'ket',
				'ket',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);

			if ($this->form_validation->run() == TRUE) {
				$data = $this->Tamum->simpan_wkttm($id, $nama, $nik, $ket);
			} else {
				$data = [
					'error' => '<div class="alert alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					' . validation_errors() . '
				  </div>'
				];
			}
			echo json_encode($data);
		}
	}

	function simpan_klrtm()
	{
		if ($this->input->is_ajax_request() == true) {
			$id_klr = $this->input->post('id_klr', true);
			$nama_klr = $this->input->post('nama_klr', true);
			$nik_klr = $this->input->post('nik_klr', true);
			$wkt_msk = $this->input->post('wkt_msk', true);

			$this->form_validation->set_rules(
				'nama_klr',
				'nama_klr',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'nik_klr',
				'nik_klr',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'wkt_msk',
				'wkt_msk',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);

			if ($this->form_validation->run() == TRUE) {
				$data = $this->Tamum->simpan_klrtm($id_klr, $nama_klr, $nik_klr, $wkt_msk);
			} else {
				$data = [
					'error' => '<div class="alert alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					' . validation_errors() . '
				  </div>'
				];
			}
			echo json_encode($data);
		}
	}

	function update_Tamu()
	{
		if ($this->input->is_ajax_request() == true) {
			$id = $this->input->post('id', true);
			$nama = $this->input->post('nama', true);
			$nik = $this->input->post('nik', true);
			$wkt_msk = $this->input->post('wkt_msk', true);

			$this->form_validation->set_rules(
				'nama',
				'nama',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'nik',
				'nik',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'wkt_msk',
				'wkt_msk',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);

			if ($this->form_validation->run() == TRUE) {
				$data = $this->Tamum->update_Tamu($id, $nama, $nik, $wkt_msk);
			} else {
				$data = [
					'error' => '<div class="alert alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					' . validation_errors() . '
				  </div>'
				];
			}
			echo json_encode($data);
		}
	}

	function hapus_Tamu()
	{
		$id = $this->input->post('kode');
		$data = $this->Tamum->hapus_Tamu($id);
		echo json_encode($data);
	}
}
