<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasifisik extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('backend_model', 'backend', true);
		$this->load->model('beranda_model', 'beranda', true);
		$this->load->model('rask_model', 'rask', true);
		$this->load->model('realisasifisik_model', 'realisasifisik', true);
	
	// 	if(!$this->session->userdata('nlvsess'))
 //   		{
 //   			redirect('login', 'refresh');
 //   		}
	// }
	}

	public function index()
	{
		$data['nama_opd'] = $this->backend->getnamaopd();
		$data['target'] = $this->realisasifisik->gettargetbyopd();
		$data['realisasifisik'] = $this->realisasifisik->getrealisasibyopd();
		$data['body'] = $this->load->view('fe/realisasifisik', $data, true);
		$this->load->view('fe/template', $data);
	}

	public function kegiatan()
	{
		$data['nama_kegiatan'] = $this->rask->getnamakegiatanall();
		$data['target'] = $this->realisasifisik->gettargetbykegiatan();
		$data['realisasifisik'] = $this->realisasifisik->getrealisasibykegiatan();
		$data['body'] = $this->load->view('fe/realisasifisik_bykegiatan', $data, true);
		$this->load->view('fe/template', $data);
	}

	public function detail()
	{
		$data['nama_opd'] = $this->rask->getopd()[0];
		$data['target'] = $this->realisasifisik->getdetailtarget();
		$data['realisasifisik'] = $this->realisasifisik->getrealisasibydetail();
		$data['rask'] = $this->rask->getketeranganrask();
		$data['body'] = $this->load->view('fe/realisasifisik_detail', $data, true);
		$this->load->view('fe/template', $data);
	}

}