<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('recaptcha');
	}
	public function index()
	{
		$data = ['title' => 'Login'];
		$data['widget'] = $this->recaptcha->getWidget();
		$data['script'] = $this->recaptcha->getScriptTag();
		$this->load->view('login', $data, FALSE);
	}


	function doLogin()
	{
		if ($this->input->is_ajax_request()) {

			$password = $this->input->post('password',true);
			$username = $this->input->post('username',true);
			// $recaptcha = $this->input->post('g-recaptcha-response');
			$cek = $this->db->get_where('users', ['username' => $username])->row();
			// var_dump(sha1($password) == $cek->password);die;
			if ($cek) {
				if ($cek->status == "Active") {
					if (sha1($password) == $cek->password) {
						$userData = [
							'id_user' => $cek->id_user,
							'username' => $cek->username,
							'nickname' => $cek->nickname,
							'role_id' => $cek->role_id,
							'phone' => $cek->phone,
							'email' => $cek->email,
							'fullname' => $cek->fullname,
							'profile_picture' => $cek->profile_picture,
						];
						$this->session->set_userdata('userData',$userData);
						$response = [
							'success' => true,
							'msg' => "Welcome back ".$cek->fullname,
						];
					}else{
						$response = [
							'success' => false,
							'msg' => "Username and Password Not Matches"
						];
					}
				}else{
					$response = [
						'success' => false,
						'msg' => "Your Account is Not Active <br> Please Contact Administrator"
					];
				}
			}else{
				$response = [
					'success' => false,
					'msg' => "Account Not Found"
				];
			}

			$this->output->set_output(json_encode($response));

		}else{
			exit();
		}
	}

	function doLogina()
	{
		if ($this->input->is_ajax_request()) {
			$password = $this->input->post('password',true);
			$username = $this->input->post('username',true);
			$recaptcha = $this->input->post('g-recaptcha-response');
			if (!empty($recaptcha)) {
				$cek = $this->db->get_where('users', ['username' => $username])->row();
				if ($cek) {
					if ($cek->status == "Active") {
						if (sha1($password) == $cek->password) {
							$userData = [
								'id_user' => $cek->id_user,
								'username' => $cek->username,
								// 'role_id' => $cek->role_id,
								'phone' => $cek->phone,
								'email' => $cek->email,
								'fullname' => $cek->fullname,
								'profile_picture' => $cek->profile_picture,
								'is_not_member' => true
							];
							$this->session->set_userdata('userData',$userData);
							$response = [
								'success' => true,
								'msg' => "Welcome back ".$cek->fullname,
							];
						}else{
							$response = [
								'success' => false,
								'msg' => "Username and Password Not Matches"
							];
						}
					}else{
						$response = [
							'success' => false,
							'msg' => "Your Account is Not Active <br> Please Contact Administrator"
						];
					}
				}else{
					$response = [
						'success' => false,
						'msg' => "Account Not Found"
					];
				}
			}else{
				$response = [
					'success' => false,
					'msg' => "Please Sign the reCAPTCHA Box"
				];
			}

			$this->output->set_output(json_encode($response));

		}else{
			exit();
		}
	}


	function logout()
	{
		foreach ($_COOKIE as $key=>$value) {
		  setcookie($key,"",1);
		  }
		$this->session->unset_userdata('userData');
		redirect('login');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */