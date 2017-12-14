<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('backend_model', 'backend', true);
		$this->load->model('rask_model', 'rask', true);
		$this->load->model('beranda_model', 'beranda', true);
		// $this->load->model('user_model','user',TRUE);
		// $this->load->model('villa_model','villa',TRUE);
		// $this->load->model('photo_model','photo',TRUE);
		// $this->load->model('stuff_model', 'stuff',TRUE);
		// $this->load->model('about_photo_model', 'aboutphoto',TRUE);
		// $this->load->model('meta_model', 'meta',TRUE);
		// $this->load->model('priorityguest_model', 'pg', TRUE);
		// $this->load->model('statistic_model', 'stat', true);
	
		// if(!$this->session->userdata('nlvsess'))
  //  		{
  //  			redirect('login', 'refresh');
  //  		}
	}

	public function index()
	{
		$data['nama_opd'] = $this->backend->getopd();
		$data['nama_kegiatan'] = $this->rask->getnamakegiatan();
		$data['kegiatan'] = $this->beranda->getkegiatanbyopd();
		$data['body'] = $this->load->view('fe/beranda', $data, true);
		$this->load->view('fe/template', $data);
	}

}