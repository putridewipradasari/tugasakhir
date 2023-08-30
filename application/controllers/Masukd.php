<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masukd extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Masukdm');

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
	function index()
	{
		if ($this->session->userdata('userdata')->role == 'Admin' || $this->session->userdata('userdata')->role == 'Petugas') {
			$id = $this->input->get('id');
			$data = $this->Masukdm->get_data_msk($id);
			$nik = $data["nik"];
			$wkt = $data["waktu_msk"];

			if ($this->Masukdm->get_honorer_by_nik($nik) == TRUE) {
				$data = $this->Masukdm->get_honorer_data_nik($nik);
				$this->load->view('masukdt_hnv', $data);
			} elseif ($this->Masukdm->get_tamu_by_nik($nik) == TRUE) {
				$data = $this->Masukdm->get_tamu_nik($nik, $wkt);
				$this->load->view('masukdt_tmv', $data);
			} elseif ($this->Masukdm->get_magang_by_nik($nik) == TRUE) {
				$data = $this->Masukdm->get_magang_data_nik($nik);
				$this->load->view('masukdt_mgv', $data);
			} elseif ($this->Masukdm->get_aman_by_nik($nik) == TRUE) {
				$data = $this->Masukdm->get_aman_data_nik($nik);
				$this->load->view('masukdt_pgv', $data);
			} else {
				$_SESSION['error'] = 'no induk tidak ditemukan ';
				redirect(base_url() . "Masuk");
			}
		} else {
			redirect(base_url("Dashboard"));
		}


		// $this->load->view('masukdv', $detail);
	}
	
}
