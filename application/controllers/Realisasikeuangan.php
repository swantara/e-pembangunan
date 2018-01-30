<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasikeuangan extends CI_Controller {

	function __construct()
	{		
		parent::__construct();
		$this->load->model('backend_model', 'backend', true);
		$this->load->model('beranda_model', 'beranda', true);
		$this->load->model('rask_model', 'rask', true);
		$this->load->model('realisasikeuangan_model', 'realisasikeuangan', true);
	
		// if(!$this->session->userdata('nlvsess'))
  //  		{
  //  			redirect('login', 'refresh');
  //  		}
	}

	public function index()
	{
		$data['nama_opd'] = $this->backend->getnamaopd();
		$data['target'] = $this->realisasikeuangan->gettargetbyopd();
		$data['realisasikeuangan'] = $this->realisasikeuangan->getrealisasikeuanganbyopd();
		$data['body'] = $this->load->view('fe/realisasikeuangan', $data, true);
		$this->load->view('fe/template', $data);
	}

	public function kegiatan()
	{
		$data['nama_kegiatan'] = $this->rask->getnamakegiatanall();
		$data['target'] = $this->realisasikeuangan->gettargetbykegiatan();
		$data['realisasikeuangan'] = $this->realisasikeuangan->getrealisasikeuanganbykegiatan();
		$data['body'] = $this->load->view('fe/realisasikeuangan_bykegiatan', $data, true);
		$this->load->view('fe/template', $data);
	}

	public function detail()
	{
		$data['nama_opd'] = $this->rask->getopd()[0];
		$data['target'] = $this->realisasikeuangan->getdetailtargetlist();
		$data['realisasikeuangan'] = $this->realisasikeuangan->getdetailrealisasikeuangan();
		$data['rask'] = $this->rask->getketeranganrask();
		$data['body'] = $this->load->view('fe/realisasikeuangan_detail', $data, true);
		$this->load->view('fe/template', $data);
	}

}