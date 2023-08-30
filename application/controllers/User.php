<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
	function index()
	{
		if ($this->session->userdata('userdata')->role == 'Admin') {
			$this->load->view('userv');
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

		$sql_total = $this->M_user->count_all(); // Panggil fungsi count_all pada M_user
		$sql_data = $this->M_user->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada M_user
		$sql_filter = $this->M_user->count_filter($search); // Panggil fungsi count_filter pada M_user

		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);

		//header('Content-Type: application/json');
		echo json_encode($callback); // Convert array $callback ke json
	}


	function data_user()
	{
		$data = $this->M_user->user_list();
		echo json_encode($data);
	}
	function get_user()
	{
		$id = $this->input->get('id');
		$data = $this->M_user->get_user_by_id($id);
		echo json_encode($data);
	}


	function simpan_user()
	{

		if ($this->input->is_ajax_request() == true) {
			$nama = $this->input->post('nama', true);
			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);
			$role = $this->input->post('role', true);
			$email = $this->input->post('email', true);


			$this->form_validation->set_rules('nama', 'nama',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]);
			$this->form_validation->set_rules('username', 'username',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]);
			$this->form_validation->set_rules('password', 'password',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]);
			$this->form_validation->set_rules('role', 'role',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]);
			$this->form_validation->set_rules('email', 'email',
				'required|trim',
				[
					'required' => '%s tidak boleh kosong'
				]);


			if ($this->form_validation->run() == TRUE) {
				$data = $this->M_user->simpan_user($nama, $username, $password, $role, $email);
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

	function update_user()
	{

		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role = $this->input->post('role');
		$email = $this->input->post('email');

		$this->form_validation->set_rules('nama', 'nama',
			'required|trim',
			[
				'required' => '%s tidak boleh kosong'
			]);
		$this->form_validation->set_rules('username', 'username',
			'required|trim',
			[
				'required' => '%s tidak boleh kosong'
			]);
		// $this->form_validation->set_rules('password', 'password', 'required|trim');
		$this->form_validation->set_rules('role', 'role',
			'required|trim',
			[
				'required' => '%s tidak boleh kosong'
			]);
		$this->form_validation->set_rules('email', 'email',
			'required|trim',
			[
				'required' => '%s tidak boleh kosong'
			]);


		if ($this->form_validation->run() == TRUE) {
			$data = $this->M_user->update_user($id, $nama, $username, $role, $email);
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

	function hapus_user()
	{
		$id = $this->input->post('kode');
		$data = $this->M_user->hapus_user($id);
		$this->session->set_flashdata('succ', '
				<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Hapus!</h4>
                Data Terhapus
              </div>');
		echo json_encode($data);
	}
}
