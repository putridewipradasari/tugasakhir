<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Honorer extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Honorerm');
		$this->load->library(['form_validation']);

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("Auth"));
		}
	}
	function index()
	{
		if ($this->session->userdata('userdata')->role == 'Admin') {
			$data['kode'] = $this->Honorerm->kode();
			$this->load->view('honorerv', $data);
		} else {
			redirect(base_url("Dashboard"));
		}
	}

	public function tampil()
	{
		$data = $this->Honorerm->honorer_list();
		echo json_encode($data);
	}

	public function view()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$sql_total = $this->Honorerm->count_all(); // Panggil fungsi count_all pada honorerModel
		$sql_data = $this->Honorerm->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada honorerModel
		$sql_filter = $this->Honorerm->count_filter($search); // Panggil fungsi count_filter pada honorerModel


		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);
		echo json_encode($callback);
	}

	function data_honorer()
	{
		$data = $this->Honorerm->honorer_list();
		echo json_encode($data);
	}
	function get_honorer()
	{
		$id = $this->input->get('id');
		$data = $this->Honorerm->get_honorer_by_id($id);
		echo json_encode($data);
	}

	function simpan_honorer()
	{
		if ($this->input->is_ajax_request() == true) {
			$id = $this->input->post('id', true);
			$no_induk = $this->input->post('no_induk', true);
			$nama = $this->input->post('nama', true);
			$asal = $this->input->post('asal', true);
			$bidang = $this->input->post('bidang', true);
			$ktp = $this->input->post('ktp', true);
			$no_tlp = $this->input->post('no_tlp', true);
			$status = $this->input->post('status', true);

			$this->form_validation->set_rules(
				'no_induk',
				'no induk',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'nama',
				'nama',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'asal',
				'asal',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'bidang',
				'bidang',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'ktp',
				'KTP',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'no_tlp',
				'no hp',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'status',
				'status',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);

			if ($this->form_validation->run() == TRUE) {
				$data = $this->Honorerm->simpan_honorer($id, $no_induk, $nama, $asal, $bidang, $ktp, $no_tlp, $status);
				$this->session->set_flashdata('succ', '
				<div class="alert alert-success alert-dismissible" style="width:355px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                Data berhasil ditambah.
              </div>');
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

	function update_honorer()
	{
		if ($this->input->is_ajax_request() == true) {
			$id = $this->input->post('id', true);
			$no_induk = $this->input->post('no_induk', true);
			$nama = $this->input->post('nama', true);
			$asal = $this->input->post('asal', true);
			$bidang = $this->input->post('bidang', true);
			$ktp = $this->input->post('ktp', true);
			$no_tlp = $this->input->post('no_tlp', true);
			$status = $this->input->post('status', true);

			$this->form_validation->set_rules(
				'no_induk',
				'no induk',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'nama',
				'nama',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'asal',
				'asal',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'bidang',
				'bidang',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'ktp',
				'KTP',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'no_tlp',
				'no hp',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'status',
				'status',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);

			if ($this->form_validation->run() == TRUE) {
				$data = $this->Honorerm->update_honorer($id, $no_induk, $nama, $asal, $bidang, $ktp, $no_tlp, $status);
				$this->session->set_flashdata('succ', '
				<div class="alert alert-success alert-dismissible" style="width:355px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                Data berhasil diubah.
              </div>');
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

	function hapus_honorer()
	{
		$id = $this->input->post('kode');
		$data = $this->Honorerm->hapus_honorer($id);
		$this->session->set_flashdata('succ', '
				<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Hapus!</h4>
                Data Terhapus
              </div>');
		echo json_encode($data);
	}
}
