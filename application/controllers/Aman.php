<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aman extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Amanm');

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
	function index()
	{
		if ($this->session->userdata('userdata')->role == 'Petugas') {

			$this->load->view('amanv');
		} else {
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}
	public function userList()
	{

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->Amanm->getUsers($postData);

		echo json_encode($data);
	}

	function get_waktu()
	{
		$nik = $this->input->post('nik');
		$pegawai = $this->Amanm->get_aman_by_nik($nik);
		// $status = $pegawai["status"];
		// echo $status;
		// print($pegawai);
		// print_r($pegawai);
		// die();
		if ($this->Amanm->get_tamu_by_nik($nik) == TRUE) {
			if ($this->Amanm->get_tamu_nik($nik)->num_rows() > 0) {
				$this->Amanm->keamanan_tamu($nik);
				$this->Amanm->data_tamu_keluar($nik);
				// $this->session->set_userdata($tamu);
				$_SESSION['success'] = 'Successfuly : NIK ' . $nik . ' ditemukan';
				redirect(base_url() . "Aman", 'refresh');
			} else {
				redirect(base_url() . "Tamu?nik=$nik");
			}
		} elseif ($this->Amanm->get_magang_by_nik($nik) == TRUE) {
			$data = $this->Amanm->get_magang_data_nik($nik);
			$nama = $data["nama"];
			$level = 'Magang';
			$this->Amanm->keamanan($nik, $nama, $level);
			$_SESSION['success'] = 'Successfuly : NIK ' . $nik . ' ditemukan';
			redirect(base_url() . "Aman", 'refresh');
		} elseif ($this->Amanm->get_honorer_by_nik($nik) == TRUE) {
			$data = $this->Amanm->get_honorer_data_nik($nik);
			$nama = $data["nama"];
			$level = 'Honorer';
			$this->Amanm->keamanan($nik, $nama, $level);
			$_SESSION['success'] = 'Successfuly : NIK ' . $nik . ' ditemukan';
			redirect(base_url() . "Aman", 'refresh');
		} elseif ($this->Amanm->get_aman_data_nik($nik) == TRUE && $pegawai == '1') {
			$data = $this->Amanm->get_aman_data_nik($nik);
			$nama = $data["nama"];
			$level = 'Pegawai';
			$this->Amanm->keamanan($nik, $nama, $level);
			$_SESSION['success'] = 'Successfuly : NIK ' . $nik . ' ditemukan';
			redirect(base_url() . "Aman", 'refresh');
		} else {
			$_SESSION['error'] = 'Cannot find QRCode number ';
			redirect(base_url() . "Aman");
		}
	}




	public function view()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nik field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$sql_total = $this->Amanm->count_all(); // Panggil fungsi count_all pada Amanm
		$sql_data = $this->Amanm->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada Amanm
		$sql_filter = $this->Amanm->count_filter($search); // Panggil fungsi count_filter pada Amanm


		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);

		//header('Content-Type: application/json');
		echo json_encode($callback); // Convert array $callback ke json
	}
}
