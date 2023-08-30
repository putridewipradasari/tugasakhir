<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qrpegawai extends CI_Controller
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
			$this->load->view('qrpegawaiv');
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

		$sql_total = $this->Qrpegawaim->count_all(); // Panggil fungsi count_all pada Qrpegawaim
		$sql_data = $this->Qrpegawaim->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada Qrpegawaim
		$sql_filter = $this->Qrpegawaim->count_filter($search); // Panggil fungsi count_filter pada Qrpegawaim

		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);

		//header('Content-Type: application/json');
		echo json_encode($callback); // Convert array $callback ke json
	}


	function data_pegawai()
	{
		$data = $this->Qrpegawaim->pegawai_list();
		echo json_encode($data);
	}
	function get_pegawai()
	{
		$id = $this->input->get('id');
		$data = $this->Qrpegawaim->get_pegawai_by_id($id);
		echo json_encode($data);
	}

	function detail()
	{
		$id = $this->input->get('id');
		$detail = $this->Qrpegawaim->get_pegawai_by_id($id);
		$data['detail'] = $detail;
		$this->load->view('detail_pv', $data);
	}

	function simpan_pegawai()
	{

		if ($this->input->is_ajax_request() == true) {
			$cabang = $this->input->post('cabang', true);
			$nik = $this->input->post('nik', true);
			$no_absen = $this->input->post('no_absen', true);
			$no_ktp = $this->input->post('no_ktp', true);
			$nama = $this->input->post('nama', true);
			$no_kk = $this->input->post('no_kk', true);
			$jk = $this->input->post('jk', true);
			$tempat_lahir = $this->input->post('tempat_lahir', true);
			$tanggal_lahir = $this->input->post('tanggal_lahir', true);
			$pendidikan = $this->input->post('pendidikan', true);
			$alamat = $this->input->post('alamat', true);
			$tlp = $this->input->post('tlp', true);
			$agama = $this->input->post('agama', true);
			$gol_dar = $this->input->post('gol_dar', true);
			$tgl_masuk = $this->input->post('tgl_masuk', true);
			$tgl_akhir = $this->input->post('tgl_akhir', true);
			$status_pegawai = $this->input->post('status_pegawai', true);
			$bpjs_kesehatan = $this->input->post('bpjs_kesehatan', true);
			$bpjs_tenaga_kerja = $this->input->post('bpjs_tenaga_kerja', true);
			$taspen = $this->input->post('taspen', true);
			$email = $this->input->post('email', true);
			$segmen = $this->input->post('segmen', true);
			$no_sk_cp = $this->input->post('no_sk_cp', true);
			$tmt_sk_cp = $this->input->post('tmt_sk_cp', true);
			$no_sk_pp = $this->input->post('no_sk_pp', true);

			$this->form_validation->set_rules('cabang', 'cabang', 'required|trim');
			$this->form_validation->set_rules('nik', 'nik', 'required|trim');
			$this->form_validation->set_rules('no_absen', 'no_absen', 'required|trim');
			$this->form_validation->set_rules('no_ktp', 'no_ktp', 'required|trim');
			$this->form_validation->set_rules('nama', 'nama', 'required|trim');
			$this->form_validation->set_rules('no_kk', 'no_kk', 'required|trim');
			$this->form_validation->set_rules('jk', 'jk', 'required|trim');
			$this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required|trim');
			$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|trim');
			$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required|trim');
			$this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
			$this->form_validation->set_rules('tlp', 'tlp', 'required|trim');
			$this->form_validation->set_rules('agama', 'agama', 'required|trim');
			$this->form_validation->set_rules('gol_dar', 'gol_dar', 'required|trim');
			$this->form_validation->set_rules('tgl_masuk', 'tgl_masuk', 'required|trim');
			$this->form_validation->set_rules('tgl_akhir', 'tgl_akhir', 'required|trim');
			$this->form_validation->set_rules('status_pegawai', 'status_pegawai', 'required|trim');
			$this->form_validation->set_rules('bpjs_kesehatan', 'bpjs_kesehatan', 'required|trim');
			$this->form_validation->set_rules('bpjs_tenaga_kerja', 'bpjs_tenaga_kerja', 'required|trim');
			$this->form_validation->set_rules('taspen', 'taspen', 'required|trim');
			$this->form_validation->set_rules('email', 'email', 'required|trim');
			$this->form_validation->set_rules('segmen', 'segmen', 'required|trim');
			$this->form_validation->set_rules('no_sk_cp', 'no_sk_cp', 'required|trim');
			$this->form_validation->set_rules('tmt_sk_cp', 'tmt_sk_cp', 'required|trim');
			$this->form_validation->set_rules('no_sk_pp', 'no_sk_pp', 'required|trim');

			if ($this->form_validation->run() == TRUE) {
				$data = $this->Qrpegawaim->simpan_pegawai($cabang, $nik, $no_absen, $no_ktp, $nama, $no_kk, $jk, $tempat_lahir, $tanggal_lahir, $pendidikan, $alamat, $tlp, $agama, $gol_dar, $tgl_masuk, $tgl_akhir, $status_pegawai, $bpjs_kesehatan, $bpjs_tenaga_kerja, $taspen, $email, $segmen, $no_sk_cp, $tmt_sk_cp, $no_sk_pp);
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

	function update_pegawai()
	{

		$id = $this->input->post('id');
		$cabang = $this->input->post('cabang');
		$nik = $this->input->post('nik');
		$no_absen = $this->input->post('no_absen');
		$no_ktp = $this->input->post('no_ktp');
		$nama = $this->input->post('nama');
		$no_kk = $this->input->post('no_kk');
		$jk = $this->input->post('jk');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$pendidikan = $this->input->post('pendidikan');
		$alamat = $this->input->post('alamat');
		$tlp = $this->input->post('tlp');
		$agama = $this->input->post('agama');
		$gol_dar = $this->input->post('gol_dar');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$tgl_akhir = $this->input->post('tgl_akhir');
		$status_pegawai = $this->input->post('status_pegawai');
		$bpjs_kesehatan = $this->input->post('bpjs_kesehatan');
		$bpjs_tenaga_kerja = $this->input->post('bpjs_tenaga_kerja');
		$taspen = $this->input->post('taspen');
		$email = $this->input->post('email');
		$segmen = $this->input->post('segmen');
		$no_sk_cp = $this->input->post('no_sk_cp');
		$tmt_sk_cp = $this->input->post('tmt_sk_cp');
		$no_sk_pp = $this->input->post('no_sk_pp');

		$data = $this->Qrpegawaim->update_pegawai($id, $cabang, $nik, $no_absen, $no_ktp, $nama, $no_kk, $jk, $tempat_lahir, $tanggal_lahir, $pendidikan, $alamat, $tlp, $agama, $gol_dar, $tgl_masuk, $tgl_akhir, $status_pegawai, $bpjs_kesehatan, $bpjs_tenaga_kerja, $taspen, $email, $segmen, $no_sk_cp, $tmt_sk_cp, $no_sk_pp);

		echo json_encode($data);
	}

	function hapus_pegawai()
	{
		$id = $this->input->post('kode');
		$data = $this->Qrpegawaim->hapus_pegawai($id);
		echo json_encode($data);
	}

	// public function qrpegawai()
	// {
	// 	$nik = $this->input->post('nik');
	// 	$result = new Endroid\QrCode\QrCode($nik);
	// 	$result->writeFile('assets/uploads/qr-code/item-' . $nik . '.png');
	// 	// Save it to a file
	// 	echo json_encode($result);
	// }

	public function aksi_upload()
	{
		$nik = $this->input->post('nik');
		$id = $this->input->post('id');
		$name = 'foto-' . $nik;
		$file = 'assets/uploads/foto/foto-' . $nik . '.png';
		if ($file != NULL) {
			unlink('assets/uploads/foto/foto-' . $nik . '.png');
			$config['file_name']        	= $name;
			$config['upload_path']          = 'assets/uploads/foto/';
			$config['allowed_types']        = 'png';
			$config['max_size']             = 1000;
			$config['max_width']            = 8000;
			$config['max_height']           = 10000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('berkas')) {
				// $error = array('error' => $this->upload->display_errors());
				$_SESSION['error'] = 'format foto salah ';
				redirect(base_url("Detailp?id=" . $id));
			} else {
				// $data = array('upload_data' => $this->upload->data());
				redirect(base_url("Detailp?id=" . $id));
			}
		} else {
			$config['file_name']        	= $name;
			$config['upload_path']          = 'assets/uploads/foto/';
			$config['allowed_types']        = 'png';
			$config['max_size']             = 1000;
			$config['max_width']            = 8000;
			$config['max_height']           = 10000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('berkas')) {
				// $error = array('error' => $this->upload->display_errors());
				// $this->load->view('detail_pv/' . $id, $error);
				$_SESSION['error'] = 'format foto salah ';
				redirect(base_url("Detailp?id=" . $id));
			} else {
				// $data = array('upload_data' => $this->upload->data());
				// $this->load->view('detail_pv/' . $id, $data);
				redirect(base_url("Detailp?id=" . $id));
			}
		}
	}

	public function card()
	{

		$nik = $this->input->post('nik');
		$result = new Endroid\QrCode\QrCode($nik);
		$result->writeFile('assets/uploads/qr-code/item-' . $nik . '.png');
		// Save it to a file
		echo json_encode($result);

		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$qr = 'assets/uploads/qr-code/item-' . $nik . '.png';
		$foto = 'assets/uploads/foto/foto-' . $nik . '.png';
		// template
		$image = imagecreatefrompng('assets/idcard.png');
		// FONT
		$font = 'C:/WINDOWS/Fonts/Arial.ttf';
		// warna
		$hitam = imagecolorallocate($image, 255, 255, 255);
		// text
		// $text1 = imagettftext($image, 0, 0, 140, 350, $hitam, $font, $qr);
		// $text1 = imagettftext($image, 14, 0, 140, 790, $hitam, $font, $nama);
		// $text2 = imagettftext($image, 14, 0, 140, 820, $hitam, $font, $nik);

		$text1 = imagettftext($image, 18, 0, 90, 300, $hitam, $font, $nama);

		// qr code
		list($width, $height) = getimagesize($qr);
		$qrBaru = imagecreatefrompng($qr);
		$newWidth = 200;
		$newHeight = 200;
		$direktori = 'assets/uploads/resizeqr/' . $nik . '.png';

		$truecolor = imagecreatetruecolor($newWidth, $newHeight);

		imagecopyresampled($truecolor, $qrBaru, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

		imagepng($truecolor, $direktori);

		$qrOk = imagecreatefrompng('assets/uploads/resizeqr/' . $nik . '.png');

		// imagecopy($image, $qrOk, 140, 290, 0, 0, 200, 200);
		imagecopy($image, $qrOk, 90, 350, 0, 0, 200, 200);

		// FOTO
		list($width1, $height1) = getimagesize($foto);
		$fotoBaru = imagecreatefrompng($foto);
		$newWidth1 = 500;
		$newHeight1 = 600;
		$direktori1 = 'assets/uploads/resizeft/ft-' . $nik . '.png';

		$truecolor1 = imagecreatetruecolor($newWidth1, $newHeight1);

		// imagealphablending($fotoBaru, false);
		// imagesavealpha($fotoBaru, true);
		// $transparent = imagecolorallocatealpha($fotoBaru, 255, 255, 255, 127);
		// imagefill($fotoBaru, 0, 0, $transparent);

		$backg = imagecolorallocate($truecolor1, 0, 0, 0);
		imagecolortransparent($truecolor1, $backg);
		imagealphablending($truecolor1, false);
		imagesavealpha($truecolor1, true);

		imagecopyresampled($truecolor1, $fotoBaru, 0, 0, 0, 0, $newWidth1, $newHeight1, $width1, $height1);

		imagepng($truecolor1, $direktori1);

		$fotoOk = imagecreatefrompng('assets/uploads/resizeft/ft-' . $nik . '.png');

		// imagecopy($image, $qrOk, 140, 290, 0, 0, 200, 200);
		imagecopy($image, $fotoOk, 250, 450, 0, 0, 500, 600);

		// generate
		imagepng($image, 'assets/uploads/id-card/idcard-' . $nik . '.png');
	}
}
