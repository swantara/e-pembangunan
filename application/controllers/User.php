<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model', 'user', true);
		$this->load->model('backend_model', 'backend', true);
		$this->load->model('rask_model', 'rask', true);
		$this->load->model('beranda_model', 'beranda', true);
		// $this->load->model('user_model','user',TRUE);
	
		if(!$this->session->userdata('session'))
   		{
   			redirect('login', 'refresh');
   		}
	}

	public function index()
	{
		$data['nama_opd'] = $this->backend->getnamaopd();
		$data['user'] = $this->user->getuser();
		$data['body'] = $this->load->view('be/user', $data, true);
		$this->load->view('be/template_be', $data);
	}

	public function tambah(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[t_user.username]');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		if($this->form_validation->run() === false)
		{
			$data['nama_opd'] = $this->backend->getnamaopd();
			$data['urusan'] = $this->user->geturusan();
			$data['bidang'] = $this->user->getbidang();
			$data['unit'] = $this->user->getunit();
			$data['sub'] = $this->user->getsub();
			$data['role'] = $this->user->getrole();
			$data['body'] = $this->load->view('be/tambah_user', $data, true);
			$this->load->view('be/template_be', $data);
		}
		else
		{
			$this->user->simpan();
			redirect('user','refresh');
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		
		if($this->form_validation->run() === false)
		{
			$data['nama_opd'] = $this->backend->getnamaopd();
			$data['data'] = $this->user->getdetailuser($id);			
			$data['role'] = $this->user->getrole();
			$data['body'] = $this->load->view('be/edit_user', $data, true);
			$this->load->view('be/template_be', $data);
		}
		else
		{
			$this->user->edit($id);
			redirect('user','refresh');
		}
	}

	public function editprofile($id)
	{
		if($id == $this->session->userdata('session')['user_id']){
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			
			if($this->form_validation->run() === false)
			{
				$data['nama_opd'] = $this->backend->getnamaopd();
				$data['data'] = $this->user->getdetailuser($id);			
				$data['role'] = $this->user->getrole();
				$data['body'] = $this->load->view('be/edit_user', $data, true);
				$this->load->view('be/template_be', $data);
			}
			else
			{
				$this->user->edit($id);
				redirect('user','refresh');
			}
		}
		else{
			redirect('backend','refresh');
		}
	}

	public function hapus($id)
	{
		// $this->kiapauth->checkrole(['1']);
		$this->user->delete($id);
		redirect('user','refresh');
	}
}