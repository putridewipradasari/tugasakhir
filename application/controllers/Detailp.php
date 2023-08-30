<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detailp extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Qrpegawaim');

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
	function index()
	{
		if ($this->session->userdata('userdata')->role == 'Admin') {
			$id = $this->input->get('id');
			$detail = $this->Qrpegawaim->get_pegawai_by_id($id);
		} else {
			redirect(base_url("Dashboard"));
		}
		
		// $data['detail'] = $detail;
		// print_r ($detail[0]);
		// echo $detail[0]->id;
		// var_dump($detail[0]); 
		// die();

		$this->load->view('detail_pv', $detail);
	}
	// download
	public function download()
	{
		// $this->load->helper('download');
		$nik = $this->input->get('nik');
		force_download('assets/uploads/id-card/idcard-' . $nik . '.png', NULL);
		// redirect($_SERVER['REQUEST_URI'], 'refresh'); 

	}
}
