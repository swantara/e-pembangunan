<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('backend_model', 'backend', true);
		$this->load->model('rask_model', 'rask', true);
		// $this->load->model('user_model','user',TRUE);
	
		if(!$this->session->userdata('session'))
   		{
   			redirect('login', 'refresh');
   		}
	}

	public function index()
	{
		$data['nama_opd'] = $this->backend->getopd();
		$data['kegiatan'] = $this->backend->getkegiatan();
		$data['nama_kegiatan'] = $this->rask->getnamakegiatan();
		$data['body'] = $this->load->view('be/index', $data, true);
		$this->load->view('be/template_be', $data);
	}

	public function detailkegiatan()
	{
		// echo json_encode($this->backend->getdetailkegiatan());
		$data['nama_opd'] = $this->backend->getopd();
		$data['kegiatan'] = $this->backend->getdetailkegiatan();
		$data['body'] = $this->load->view('be/kegiatan_detail', $data, true);
		$this->load->view('be/template_be', $data);
	}

	public function rask()
	{
		$data['body'] = $this->load->view('be/report_rask', '', true);
		$this->load->view('be/template_be', $data);
	}

	public function kontrak()
	{
		$data['body'] = $this->load->view('be/report_kontrak', '', true);
		$this->load->view('be/template_be', $data);
	}

	public function realisasikeuangan()
	{
		$data['body'] = $this->load->view('be/report_realisasikeuangan', '', true);
		$this->load->view('be/template_be', $data);
	}

	public function realisasifisik()
	{
		$data['body'] = $this->load->view('be/report_realisasifisik', '', true);
		$this->load->view('be/template_be', $data);
	}

	public function pelaporanfisik()
	{
		$data['body'] = $this->load->view('be/pelaporan_fisik', '', true);
		$this->load->view('be/template_be', $data);
	}

	public function user()
	{
		$data['body'] = $this->load->view('be/user', '', true);
		$this->load->view('be/template_be', $data);
	}
}