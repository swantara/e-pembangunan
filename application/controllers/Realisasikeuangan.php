<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasikeuangan extends CI_Controller {

	// function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('user_model','user',TRUE);
	// 	$this->load->model('villa_model','villa',TRUE);
	// 	$this->load->model('photo_model','photo',TRUE);
	// 	$this->load->model('stuff_model', 'stuff',TRUE);
	// 	$this->load->model('about_photo_model', 'aboutphoto',TRUE);
	// 	$this->load->model('meta_model', 'meta',TRUE);
	// 	$this->load->model('priorityguest_model', 'pg', TRUE);
	// 	$this->load->model('statistic_model', 'stat', true);
	
	// 	if(!$this->session->userdata('nlvsess'))
 //   		{
 //   			redirect('login', 'refresh');
 //   		}
	// }

	public function index()
	{
		$data['body'] = $this->load->view('fe/realisasikeuangan', '', true);
		$this->load->view('fe/template', $data);
	}

	public function detail()
	{
		$data['body'] = $this->load->view('fe/realisasikeuangan_detail', '', true);
		$this->load->view('fe/template', $data);
	}

}