<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		//session_start();
		$this->load->model('M_user');
	}
	function index()
	{
		$this->load->view('login');
	}

	public function login()
	{

		$this->form_validation->set_rules('username', 'Username',
			'required|min_length[4]|max_length[50]',
			[
				'required' => '%s tidak boleh kosong'
			]);
		$this->form_validation->set_rules('password', 'Password',
			'required',
			[
				'required' => '%s tidak boleh kosong'
			]
		);

		if ($this->form_validation->run() == TRUE) {
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);

			$data = $this->M_user->login($username, $password);

			if ($data == false) {
				$this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
				redirect('Auth');
			} else {
				$session = [
					'userdata' => $data,
					'status' => "login"
				];
				$this->session->set_userdata($session);

				redirect('Dashboard');
			}
		} else {
			// $this->session->set_flashdata('error_msg', validation_errors());
			// redirect('Auth');
			$this->load->view('login');
		}
		/*

		<?php
        echo show_err_msg($this->session->flashdata('error_msg'));
      ?>
	  $this->session->userdata('status') != "login"
	  $this->session->userdata($data=array('nama' => $row->nama))
	  

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->M_user->cek_login("user",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("data"));
 
		}else{
			echo "Username dan password salah !";
		}*/
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth');
	}
	public function forgotpassword()
	{
		$this->form_validation->set_rules('email', 'email',
			'trim|required|valid_email',
			[
				'required' => '%s tidak boleh kosong'
			]);
		if ($this->form_validation->run() == false) {
			$this->load->view('forgotv');
		} else{
			$email =$this->input->post('email');
			$user = $this->db->get_where('tb_user',['email' => $email])->row_array();

			if($user){
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('succ_msg', 'Cek email anda untuk reset password.');
				redirect('Auth/forgotpassword');

			}else{
				$this->session->set_flashdata('error_msg', 'Email tidak terdaftar.');
				redirect('Auth/forgotpassword');
			}
		}
	}
	private function _sendEmail($token, $type)
	{
		$this->load->library('email');
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' =>
			'smtp.gmail.com',
			'smtp_user' => 'putridewipradasari@gmail.com',  // Email gmail
			'smtp_pass'   => 'zhvfnmrhecrlppsi',  // Password gmail
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		];

		$this->email->initialize($config);
		// Load library email dan konfigurasinya
		// $this->load->library('email', $config);

		// Email dan nama pengirim
		$this->email->from('putridewipradasari.com', 'Tugas Akhir');

		// Email penerima
		$this->email->to($this->input->post('email')); // Ganti dengan email tujuan

		if ($type == 'forgot'){
			$this->email->subject('Reset password');
			$this->email->message('Klik Link ini untuk reset password : <a href="' . base_url() . 'Auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Reset Password </a>');
			
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function resetpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
		if($user){
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token){
				$this->session->set_userdata('reset_email', $email); //forgot password hanya dapat digunakan ketika sudah klik link di email
				$this->changepassword();
			} else{
				$this->session->set_flashdata('error_msg', 'Token Salah.');
				redirect('Auth/forgotpassword');
			}
		} else{
			$this->session->set_flashdata('error_msg', 'Reset Password Failed! Wrong Email.');
			redirect('Auth/forgotpassword');
		}
	}

	public function changepassword(){
		if(!$this->session->userdata('reset_email')){
			redirect('Auth');
		}
		$this->form_validation->set_rules('password1', 'password', 'trim|required|matches[password2]');
		$this->form_validation->set_rules('password2', 'repeat password', 'trim|required|matches[password1]');
		if($this->form_validation->run() ==  false){
			$this->load->view('changepass');
		} else{
			$password = md5($this->input->post('password1'));
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('tb_user');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('succ_msg', 'Password telah diubah. Silahkan Login!.');
			redirect('Auth/forgotpassword');
		}
		
	}
}
