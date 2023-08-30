<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboardm');

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("Auth"));
		}
	}
	function index()
	{
		// $this->data['count_brng'] = $this->Dashboardm->count_brng();
		// $this->data['count_pgw'] = $this->Dashboardm->count_pgw();
		$data['count_brng'] = $this->Dashboardm->count_brng();
		$data['count_pgw'] = $this->Dashboardm->count_pgw();
		foreach ($this->Dashboardm->statistik_pengunjung()->result_array() as $row) {
			$data['grafik'][] = (float)$row['Januari'];
			$data['grafik'][] = (float)$row['Februari'];
			$data['grafik'][] = (float)$row['Maret'];
			$data['grafik'][] = (float)$row['April'];
			$data['grafik'][] = (float)$row['Mei'];
			$data['grafik'][] = (float)$row['Juni'];
			$data['grafik'][] = (float)$row['Juli'];
			$data['grafik'][] = (float)$row['Agustus'];
			$data['grafik'][] = (float)$row['September'];
			$data['grafik'][] = (float)$row['Oktober'];
			$data['grafik'][] = (float)$row['November'];
			$data['grafik'][] = (float)$row['Desember'];
		}
		$this->load->view('dashboardv', $data);
	}
}
