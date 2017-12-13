<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model', 'user', true);
	}

	public function index()
	{
		if($this->session->userdata('session'))
   		{
   			redirect('backend', 'refresh');
   		}


		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|callback_check_database');

		if($this -> form_validation -> run() === false)
		{
			$data['body'] = $this->load->view('fe/login', '', true);
			$this->load->view('fe/template', $data);
		}
		else
		{
			redirect('backend', 'refresh');
		}
	}

	function check_database($pass)
	{
		//Field validation succeeded.  Validate against database
		$user = $this->input->post('username');

		//query the database
		$result = $this->user->login($user);

		if($result)
		{
			$user = $result[0];
			if(password_verify($pass, $user->password))
			{
				$sess_array = array();
				$sess_array = array(
					'user_id' => $user->id,
					'username' => $user->username,
					'name' => $user->nama,
					'kd_urusan' => $user->kd_urusan,
					'kd_bidang' => $user->kd_bidang,
					'kd_unit' => $user->kd_unit,
					'kd_sub' => $user->kd_sub,
					'role' => $user->role
					);
				$this->session->set_userdata('session', $sess_array);
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('check_database', 'Invalid Password');
				return false;
			}
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid Account');
			return false;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('session');
		session_destroy();
		redirect('login', 'refresh');
	}
}