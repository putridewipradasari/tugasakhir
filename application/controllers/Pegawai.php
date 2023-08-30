<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {


	// TIDAK DIPAKAI
	
	function __construct(){
		parent::__construct();
		$this->load->model('Pegawaim');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}

		
		 
	}
	function index()
	{
		$this->load->view('pegawaiv');
	}



	public function view(){
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
	
		$sql_total = $this->Pegawaim->count_all(); // Panggil fungsi count_all pada Pegawaim
		$sql_data = $this->Pegawaim->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada Pegawaim
		$sql_filter = $this->Pegawaim->count_filter($search); // Panggil fungsi count_filter pada Pegawaim
	
		$callback = array(
			'draw'=>$_POST['draw'], // Ini dari datatablenya
			'recordsTotal'=>$sql_total,
			'recordsFiltered'=>$sql_filter,
			'data'=>$sql_data
		);
	
		//header('Content-Type: application/json');
		echo json_encode($callback); // Convert array $callback ke json
	  }


	function data_pegawai(){
        $data=$this->Pegawaim->pegawai_list();
        echo json_encode($data);
    }
	function get_pegawai(){
		$idpegawai=$this->input->get('idpegawai');
		$data=$this->Pegawaim->get_pegawai_by_id($idpegawai);
		echo json_encode($data);
	}

	function simpan_pegawai(){
		/*$idpegawai=$this->input->post('idpegawai');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$bagian=$this->input->post('bagian');
		$data=$this->Pegawaim->simpan_pegawai($idpegawai,$nama,$alamat,$bagian);
		echo json_encode($data);*/

		if ($this->input->is_ajax_request() == true){
			$idpegawai=$this->input->post('idpegawai', true);
			$nama=$this->input->post('nama', true);
			$alamat=$this->input->post('alamat', true);
			$bagian=$this->input->post('bagian', true);
	
			$this->form_validation->set_rules('nama', 'nama', 'required|trim',
			[
				'required' => '%s tidak boleh kosong'
			]
			);
			$this->form_validation->set_rules('alamat', 'alamat', 'required|trim',
			[
				'required' => '%s tidak boleh kosong'
			]
			);
			$this->form_validation->set_rules('bagian', 'bagian', 'required|trim',
			[
				'required' => '%s tidak boleh kosong'
			]
			);
	
			if ($this->form_validation->run() == TRUE){
				$data=$this->Pegawaim->simpan_pegawai($idpegawai,$nama,$alamat,$bagian);
			}else{
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

	function update_pegawai(){
		/*$idpegawai=$this->input->post('idpegawai');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$bagian=$this->input->post('bagian');
		$data=$this->Pegawaim->update_pegawai($idpegawai,$nama,$alamat,$bagian);
		echo json_encode($data);*/

		if ($this->input->is_ajax_request() == true){
			$idpegawai=$this->input->post('idpegawai', true);
			$nama=$this->input->post('nama', true);
			$alamat=$this->input->post('alamat', true);
			$bagian=$this->input->post('bagian', true);
	
			$this->form_validation->set_rules('nama', 'nama', 'required|trim',
			[
				'required' => '%s tidak boleh kosong'
			]
			);
			$this->form_validation->set_rules('alamat', 'alamat', 'required|trim',
			[
				'required' => '%s tidak boleh kosong'
			]
			);
			$this->form_validation->set_rules('bagian', 'bagian', 'required|trim',
			[
				'required' => '%s tidak boleh kosong'
			]
			);
	
			if ($this->form_validation->run() == TRUE){
				$data=$this->Pegawaim->update_pegawai($idpegawai,$nama,$alamat,$bagian);
			}else{
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

	function hapus_pegawai(){
		$idpegawai=$this->input->post('kode');
		$data=$this->Pegawaim->hapus_pegawai($idpegawai);
		echo json_encode($data);
	}


}
