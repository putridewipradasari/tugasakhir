<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Magang extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Magangm');
		$this->load->library(['form_validation']);

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
	function index()
	{
		if ($this->session->userdata('userdata')->role == 'Admin') {
			$data['kode'] = $this->Magangm->kode();
			$this->load->view('magangv', $data);
		} else {
			redirect(base_url("Dashboard"));
		}

		
	}

	public function tampil()
	{
		$data = $this->Magangm->magang_list();
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

		$sql_total = $this->Magangm->count_all(); // Panggil fungsi count_all pada magangModel
		$sql_data = $this->Magangm->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada magangModel
		$sql_filter = $this->Magangm->count_filter($search); // Panggil fungsi count_filter pada magangModel


		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);
		echo json_encode($callback);
	}

	function data_magang()
	{
		$data = $this->Magangm->magang_list();
		echo json_encode($data);
	}
	function get_magang()
	{
		$id = $this->input->get('id');
		$data = $this->Magangm->get_magang_by_id($id);
		echo json_encode($data);
	}

	function simpan_magang()
	{
		if ($this->input->is_ajax_request() == true) {
			$id = $this->input->post('id', true);
			$no_induk = $this->input->post('no_induk', true);
			$nama = $this->input->post('nama', true);
			$asal = $this->input->post('asal', true);
			$tujuan = $this->input->post('tujuan', true);
			$keterangan = $this->input->post('keterangan', true);
			$status = $this->input->post('status', true);

			$this->form_validation->set_rules(
				'no_induk',
				'no_induk',
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
				'tujuan',
				'tujuan',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'keterangan',
				'keterangan',
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
				$data = $this->Magangm->simpan_magang($id, $no_induk, $nama, $asal, $tujuan, $keterangan, $status);
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

	function update_magang()
	{
		if ($this->input->is_ajax_request() == true) {
			$id = $this->input->post('id', true);
			$no_induk = $this->input->post('no_induk', true);
			$nama = $this->input->post('nama', true);
			$asal = $this->input->post('asal', true);
			$tujuan = $this->input->post('tujuan', true);
			$keterangan = $this->input->post('keterangan', true);
			$status = $this->input->post('status', true);

			$this->form_validation->set_rules(
				'no_induk',
				'no_induk',
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
				'tujuan',
				'tujuan',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'keterangan',
				'keterangan',
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
				$data = $this->Magangm->update_magang($id, $no_induk, $nama, $asal, $tujuan, $keterangan, $status);
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

	function hapus_magang()
	{
		$id = $this->input->post('kode');
		$data = $this->Magangm->hapus_magang($id);
		$this->session->set_flashdata('succ', '
				<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Hapus!</h4>
                Data Terhapus
              </div>');
		echo json_encode($data);
	}
}
