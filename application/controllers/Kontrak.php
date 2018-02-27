<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('backend_model', 'backend', true);
		$this->load->model('beranda_model', 'beranda', true);
		$this->load->model('kontrak_model', 'kontrak', true);
		$this->load->model('rask_model', 'rask', true);
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
		$data['nama_opd'] = $this->backend->getnamaopd();
		$data['kontrak'] = $this->kontrak->getkontrak();
		$data['nama_kegiatan'] = $this->rask->getnamakegiatanall();
		$data['body'] = $this->load->view('fe/kontrak', $data, true);
		$this->load->view('fe/template', $data);
	}
<<<<<<< HEAD
    
    public function sync()
=======

	public function sync()
>>>>>>> master
	{
		$data['sync'] = $this->kontrak->synckelengkapanpengadaan();
		echo json_encode($data['sync']);
	}
<<<<<<< HEAD
=======

>>>>>>> master
}