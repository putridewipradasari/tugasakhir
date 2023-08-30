<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamukrt extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Tamukrtm');
		$this->load->library(['form_validation']);

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
	function index()
	{
		if ($this->session->userdata('userdata')->role == 'Admin') {
			$data['kode'] = $this->Tamukrtm->kode();
			$this->load->view('tamukrtv', $data);
		} else {
			redirect(base_url("Dashboard"));
		}
		// echo $data['kode'];
		// die();

	}

	public function tampil()
	{
		$data = $this->Tamukrtm->tamukrt_list();
		echo json_encode($data);
	}

	public function view()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nm_kartu field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$sql_total = $this->Tamukrtm->count_all(); // Panggil fungsi count_all pada tamukrtModel
		$sql_data = $this->Tamukrtm->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada tamukrtModel
		$sql_filter = $this->Tamukrtm->count_filter($search); // Panggil fungsi count_filter pada tamukrtModel


		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);
		echo json_encode($callback);
	}

	function data_tamukrt()
	{
		$data = $this->Tamukrtm->tamukrt_list();
		echo json_encode($data);
	}
	function get_tamukrt()
	{
		$id = $this->input->get('id');
		$data = $this->Tamukrtm->get_tamukrt_by_id($id);
		echo json_encode($data);
	}

	function simpan_tamukrt()
	{
		if ($this->input->is_ajax_request() == true) {
			$id = $this->input->post('id', true);
			$id_kartu = $this->input->post('id_kartu', true);
			$nm_kartu = $this->input->post('nm_kartu', true);

			$this->form_validation->set_rules(
				'id_kartu',
				'id kartu',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'nm_kartu',
				'nama kartu',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);

			if ($this->form_validation->run() == TRUE) {
				$data = $this->Tamukrtm->simpan_tamukrt($id, $id_kartu, $nm_kartu);
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

	function update_tamukrt()
	{
		if ($this->input->is_ajax_request() == true) {
			$id = $this->input->post('id', true);
			$id_kartu = $this->input->post('id_kartu', true);
			$nm_kartu = $this->input->post('nm_kartu', true);

			$this->form_validation->set_rules(
				'id_kartu',
				'id kartu',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'nm_kartu',
				'nama kartu',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);

			if ($this->form_validation->run() == TRUE) {
				$data = $this->Tamukrtm->update_tamukrt($id, $id_kartu, $nm_kartu);
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

	function hapus_tamukrt()
	{
		$id = $this->input->post('kode');
		$data = $this->Tamukrtm->hapus_tamukrt($id);
		$this->session->set_flashdata('succ', '
				<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Hapus!</h4>
                Data Terhapus
              </div>');
		echo json_encode($data);
	}
}
