<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Honorerdt extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Honorerm');

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
	function index()
	{
		if ($this->session->userdata('userdata')->role == 'Admin') {
			$id = $this->input->get('id');
			$detail = $this->Honorerm->get_honorer_by_id($id);
			$this->load->view('honorerdtv', $detail);
		} else {
			redirect(base_url("Dashboard"));
		}
	}
	function get_honorer()
	{
		$id = $this->input->get('id');
		$data = $this->Honorerm->get_honorer_by_id($id);
		echo json_encode($data);
	}
	// download
	public function download()
	{
		// $this->load->helper('download');
		$nik = $this->input->get('no_induk');
		force_download('assets/uploads/id-card/honorer/idcard-' . $nik . '.png', NULL);
		// redirect($_SERVER['REQUEST_URI'], 'refresh'); 

	}

	public function aksi_upload()
	{
		$nik = $this->input->post('no_induk');
		$id = $this->input->post('id');
		$name = 'foto-' . $nik;
		$file = 'assets/uploads/foto/honorer/foto-' . $nik . '.png';
		if ($file != NULL) {
			unlink('assets/uploads/foto/honorer/foto-' . $nik . '.png');
			$config['file_name']        	= $name;
			$config['upload_path']          = 'assets/uploads/foto/honorer/';
			$config['allowed_types']        = 'png';
			$config['max_size']             = 1000;
			$config['max_width']            = 8000;
			$config['max_height']           = 10000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('berkas')) {
				// $error = array('error' => $this->upload->display_errors());
				$_SESSION['error'] = 'format foto salah ';
				redirect(base_url("Honorerdt?id=" . $id));
			} else {
				// $data = array('upload_data' => $this->upload->data());
				redirect(base_url("Honorerdt?id=" . $id));
			}
		} else {
			$config['file_name']        	= $name;
			$config['upload_path']          = 'assets/uploads/foto/honorer/';
			$config['allowed_types']        = 'png';
			$config['max_size']             = 1000;
			$config['max_width']            = 8000;
			$config['max_height']           = 10000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('berkas')) {
				$_SESSION['error'] = 'format foto salah ';
				redirect(base_url("Honorerdt?id=" . $id));
			} else {
				redirect(base_url("Honorerdt?id=" . $id));
			}
		}
	}

	public function card()
	{

		$nik = $this->input->post('no_induk');
		$result = new Endroid\QrCode\QrCode($nik);
		$result->writeFile('assets/uploads/qr-code/honorer/item-' . $nik . '.png');
		// Save it to a file
		echo json_encode($result);

		// $nik = $this->input->post('no_induk');
		$nama = $this->input->post('nama');
		$qr = 'assets/uploads/qr-code/honorer/item-' . $nik . '.png';
		$foto = 'assets/uploads/foto/honorer/foto-' . $nik . '.png';
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
		$direktori = 'assets/uploads/resizeqr/honorer/' . $nik . '.png';

		$truecolor = imagecreatetruecolor($newWidth, $newHeight);

		imagecopyresampled($truecolor, $qrBaru, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

		imagepng($truecolor, $direktori);

		$qrOk = imagecreatefrompng('assets/uploads/resizeqr/honorer/' . $nik . '.png');

		// imagecopy($image, $qrOk, 140, 290, 0, 0, 200, 200);
		imagecopy($image, $qrOk, 90, 350, 0, 0, 200, 200);

		// FOTO
		list($width1, $height1) = getimagesize($foto);
		$fotoBaru = imagecreatefrompng($foto);
		$newWidth1 = 500;
		$newHeight1 = 600;
		$direktori1 = 'assets/uploads/resizeft/honorer/ft-' . $nik . '.png';

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

		$fotoOk = imagecreatefrompng('assets/uploads/resizeft/honorer/ft-' . $nik . '.png');

		// imagecopy($image, $qrOk, 140, 290, 0, 0, 200, 200);
		imagecopy($image, $fotoOk, 250, 450, 0, 0, 500, 600);

		// generate
		imagepng($image, 'assets/uploads/id-card/honorer/idcard-' . $nik . '.png');
	}
}
