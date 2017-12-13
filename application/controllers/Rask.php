<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rask extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('rask_model', 'rask', true);
	
		// if(!$this->session->userdata('nlvsess'))
  //  		{
  //  			redirect('login', 'refresh');
  //  		}
	}

	public function index()
	{
		$data['data'] = $this->rask->getkegiatan();
		$data['body'] = $this->load->view('fe/rask', $data, true);
		$this->load->view('fe/template', $data);
	}

}