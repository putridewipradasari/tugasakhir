<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('BarangModel');
		$this->load->model('BrgModel');
		$this->load->library(['form_validation']);

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
	function index()
	{

		$this->load->view('data');
	}

	public function tampil()
	{
		/*$content = file_get_contents("http://localhost/aaa/Barangapi?X-API-KEY=why");
		$content = utf8_encode($content);
		$hasil = json_encode($content, true);

		$data = array(
		);
		*/
		$data = $this->BrgModel->barang_list();
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

		$sql_total = $this->BrgModel->count_all(); // Panggil fungsi count_all pada BarangModel
		$sql_data = $this->BrgModel->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada BarangModel
		$sql_filter = $this->BrgModel->count_filter($search); // Panggil fungsi count_filter pada BarangModel


		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);

		//header('Content-Type: application/json');
		echo json_encode($callback); // Convert array $callback ke json
	}

	function data_barang()
	{
		$data = $this->BrgModel->barang_list();
		echo json_encode($data);
	}
	function get_barang()
	{
		$id = $this->input->get('id');
		$data = $this->BrgModel->get_barang_by_id($id);
		echo json_encode($data);
	}

	function simpan_barang()
	{
		if ($this->input->is_ajax_request() == true) {
			$id = $this->input->post('id', true);
			$barang = $this->input->post('barang', true);
			$merek = $this->input->post('merek', true);
			$jumlah = $this->input->post('jumlah', true);
			$hargasatuan = $this->input->post('hargasatuan', true);
			$totalharga = $this->input->post('totalharga', true);
			$keterangan = $this->input->post('keterangan', true);

			$this->form_validation->set_rules(
				'barang',
				'barang',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'merek',
				'merek',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'jumlah',
				'jumlah',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'hargasatuan',
				'hargasatuan',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'totalharga',
				'totalharga',
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
				$data = $this->BrgModel->simpan_barang($id, $barang, $merek, $jumlah, $hargasatuan, $totalharga, $keterangan);
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

	function update_barang()
	{
		/*$id=$this->input->post('id');
		$barang=$this->input->post('barang');
		$merek=$this->input->post('merek');
		$jumlah=$this->input->post('jumlah');
		$hargasatuan=$this->input->post('hargasatuan');
		$totalharga=$this->input->post('totalharga');
		$keterangan=$this->input->post('keterangan');
		$data=$this->BarangModel->update_barang($id,$barang,$merek,$jumlah,$hargasatuan,$totalharga,$keterangan);
		echo json_encode($data);*/

		if ($this->input->is_ajax_request() == true) {
			$id = $this->input->post('id', true);
			$barang = $this->input->post('barang', true);
			$merek = $this->input->post('merek', true);
			$jumlah = $this->input->post('jumlah', true);
			$hargasatuan = $this->input->post('hargasatuan', true);
			$totalharga = $this->input->post('totalharga', true);
			$keterangan = $this->input->post('keterangan', true);

			$this->form_validation->set_rules(
				'barang',
				'barang',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'merek',
				'merek',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'jumlah',
				'jumlah',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'hargasatuan',
				'hargasatuan',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]
			);
			$this->form_validation->set_rules(
				'totalharga',
				'totalharga',
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
				$data = $this->BrgModel->update_barang($id, $barang, $merek, $jumlah, $hargasatuan, $totalharga, $keterangan);
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

	function hapus_barang()
	{
		$id = $this->input->post('kode');
		$data = $this->BrgModel->hapus_barang($id);
		echo json_encode($data);
	}
}
