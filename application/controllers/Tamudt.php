<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamudt extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Tamudtm');
		$this->load->library(['form_validation']);

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
	function index()
	{
		if ($this->session->userdata('userdata')->role == 'Admin' || $this->session->userdata('userdata')->role == 'Petugas') {
			$this->load->view('tamudtv');
		} else {
			redirect(base_url("Dashboard"));
		}
	}

	public function tampil()
	{
		$data = $this->Tamudtm->tamudt_list();
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

		$sql_total = $this->Tamudtm->count_all(); // Panggil fungsi count_all pada tamudtModel
		$sql_data = $this->Tamudtm->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada tamudtModel
		$sql_filter = $this->Tamudtm->count_filter($search); // Panggil fungsi count_filter pada tamudtModel


		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);
		echo json_encode($callback);
	}
	public function userList()
	{

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->Tamudtm->getUsers($postData);

		echo json_encode($data);
	}

	function data_tamudt()
	{
		$data = $this->Tamudtm->tamudt_list();
		echo json_encode($data);
	}
	function get_tamudt()
	{
		$id = $this->input->get('id');
		$data = $this->Tamudtm->get_tamudt_by_id($id);
		echo json_encode($data);
	}

	function update_tamudt()
	{
		if ($this->input->is_ajax_request() == true) {
			$id = $this->input->post('id', true);
			$id_kartu = $this->input->post('id_kartu', true);
			$nama = $this->input->post('nama', true);
			$asal = $this->input->post('asal', true);
			$tujuan = $this->input->post('tujuan', true);
			$keterangan = $this->input->post('keterangan', true);
			// $waktu_msk = $this->input->post('waktu_msk', true);
			// $waktu_klr = $this->input->post('waktu_klr', true);
			// $status = $this->input->post('status', true);

			$this->form_validation->set_rules(
				'id_kartu',
				'id_kartu',
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
			if ($this->form_validation->run() == TRUE) {
				$tamu = $this->Tamudtm->get_tamudt_by_id($id);
				$wkt = $tamu["waktu_msk"];
				$data = [
					$this->Tamudtm->update_tamudt($id, $id_kartu, $nama, $asal, $tujuan, $keterangan),
					$this->Tamudtm->update_masukdt($id_kartu, $nama, $wkt)
				];

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

	function hapus_tamudt()
	{
		$id = $this->input->post('kode');
		// $data = $this->Tamudtm->hapus_tamudt($id);
		// $this->session->set_flashdata('succ', '
		// 		<div class="alert alert-danger alert-dismissible">
		//         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		//         <h4><i class="icon fa fa-ban"></i> Hapus!</h4>
		//         Data Terhapus
		//       </div>');
		// echo json_encode($data);

		$masuk = $this->Tamudtm->get_tamudt_by_id($id);
		$nik = $masuk["id_kartu"];
		$wkt = $masuk["waktu_msk"];
		$data = [
			$this->Tamudtm->delete_masuk($nik, $wkt),
			$this->Tamudtm->hapus_tamudt($id)
		];
		$this->session->set_flashdata('succ', '
				<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Hapus!</h4>
                Data Terhapus
              </div>');
		echo json_encode($data);
	}
}
