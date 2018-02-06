<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('backend_model', 'backend', true);
		$this->load->model('rask_model', 'rask', true);
		$this->load->model('beranda_model', 'beranda', true);
		$this->load->model('kontrak_model', 'kontrak', true);
		$this->load->model('realisasikeuangan_model', 'realisasikeuangan', true);
		// $this->load->model('user_model','user',TRUE);
	
		if(!$this->session->userdata('session'))
   		{
   			redirect('login', 'refresh');
   		}
	}

	public function index()
	{
		if($this->session->userdata('session')['role'] == 1) {
			$data['nama_opd'] = $this->backend->getnamaopd();
			$data['kegiatan'] = $this->beranda->getkegiatanbyopd();
			$data['body'] = $this->load->view('be/index', $data, true);
			$this->load->view('be/template_be', $data);
		}
		else{
			$data['nama_opd'] = $this->backend->getnamaopd();
			$data['kegiatan'] = $this->backend->getkegiatan();
			$data['nama_kegiatan'] = $this->rask->getnamakegiatanall();
			$data['body'] = $this->load->view('be/index', $data, true);
			$this->load->view('be/template_be', $data);			
		}
	}

	public function kegiatanbyopd()
	{
		// echo json_encode($this->backend->getdetailkegiatan());
		$data['nama_kegiatan'] = $this->rask->getnamakegiatanall();
		$data['kegiatan'] = $this->backend->getlistkegiatanbyopd();
		$data['body'] = $this->load->view('be/kegiatanbyopd_list', $data, true);
		$this->load->view('be/template_be', $data);
	}

	public function rincianbykegiatan()
	{
		// echo json_encode($this->backend->getdetailkegiatan());
		$data['induk'] = $this->rask->getanggaraninduk();
		$data['perubahan'] = $this->rask->getanggaranperubahan();

		$data['real'] = $data['perubahan'];

		if($data['perubahan'] == false){
			$data['real'] = $data['induk'];
		}
		else{
			for ($i=0; $i < count($data['real']); $i++) { 
				
				$data['real'][$i]->jml_satuan_i = 0;
				$data['real'][$i]->nilai_rp_i = 0;
				$data['real'][$i]->total_i = 0;

				foreach ($data['induk'] as $perubahan) {
					if(
						$perubahan->kd_urusan == $data['real'][$i]->kd_urusan && 
						$perubahan->kd_bidang == $data['real'][$i]->kd_bidang && 
						$perubahan->kd_unit == $data['real'][$i]->kd_unit && 
						$perubahan->kd_sub == $data['real'][$i]->kd_sub && 
						$perubahan->kd_prog == $data['real'][$i]->kd_prog && 
						$perubahan->kd_keg == $data['real'][$i]->kd_keg && 
						$perubahan->kd_rek_1 == $data['real'][$i]->kd_rek_1 && 
						$perubahan->kd_rek_2 == $data['real'][$i]->kd_rek_2 && 
						$perubahan->kd_rek_3 == $data['real'][$i]->kd_rek_3 && 
						$perubahan->kd_rek_4 == $data['real'][$i]->kd_rek_4 && 
						$perubahan->kd_rek_5 == $data['real'][$i]->kd_rek_5 && 
						$perubahan->no_rinc == $data['real'][$i]->no_rinc && 
						$perubahan->no_id == $data['real'][$i]->no_id
					)
					{
						$data['real'][$i]->jml_satuan_i = $perubahan->jml_satuan;
						$data['real'][$i]->nilai_rp_i = $perubahan->nilai_rp;
						$data['real'][$i]->total_i = $perubahan->total_anggaran;
					}
				}
			}

			for ($i=0; $i < count($data['induk']); $i++) { 
				
				// $data['real'][$i]->jml_satuan_p = 0;
				// $data['real'][$i]->nilai_rp_p = 0;
				// $data['real'][$i]->total_p = 0;

				$ada = 0;
				foreach ($data['real'] as $real) {
					if(
						$real->kd_urusan == $data['induk'][$i]->kd_urusan && 
						$real->kd_bidang == $data['induk'][$i]->kd_bidang && 
						$real->kd_unit == $data['induk'][$i]->kd_unit && 
						$real->kd_sub == $data['induk'][$i]->kd_sub && 
						$real->kd_prog == $data['induk'][$i]->kd_prog && 
						$real->kd_keg == $data['induk'][$i]->kd_keg && 
						$real->kd_rek_1 == $data['induk'][$i]->kd_rek_1 && 
						$real->kd_rek_2 == $data['induk'][$i]->kd_rek_2 && 
						$real->kd_rek_3 == $data['induk'][$i]->kd_rek_3 && 
						$real->kd_rek_4 == $data['induk'][$i]->kd_rek_4 && 
						$real->kd_rek_5 == $data['induk'][$i]->kd_rek_5 && 
						$real->no_rinc == $data['induk'][$i]->no_rinc && 
						$real->no_id == $data['induk'][$i]->no_id
					)
					{
						$ada = 1;
						break;
					}
				}

				if($ada == 0)
				{
					$counter = count($data['real']);
					$data['real'][$counter] = $data['induk'][$i];
					$data['real'][$counter]->jml_satuan_i = $data['real'][$counter]->jml_satuan;
					$data['real'][$counter]->nilai_rp_i = $data['real'][$counter]->nilai_rp;
					$data['real'][$counter]->total_i = $data['real'][$counter]->total_anggaran;
					$data['real'][$counter]->jml_satuan = 0;
					$data['real'][$counter]->nilai_rp = 0;
					$data['real'][$counter]->total = 0;
				}
			}
		}

		$data['nama_kegiatan'] = $this->backend->getnamakegiatan();
		$data['rincian'] = $this->backend->getlistrincianbykegiatan();
		$data['body'] = $this->load->view('be/rincianbykegiatan_list', $data, true);
		$this->load->view('be/template_be', $data);
	}

	public function detailrincianbykegiatan()
	{
		$data['induk'] = $this->rask->getrincianinduk();
		$data['perubahan'] = $this->rask->getrincianperubahan();

		$data['real'] = $data['perubahan'];

		if($data['perubahan'] == false){
			$data['real'] = $data['induk'];
		}
		else{
			for ($i=0; $i < count($data['real']); $i++) { 
				
				$data['real'][$i]->jml_satuan_i = 0;
				$data['real'][$i]->nilai_rp_i = 0;
				$data['real'][$i]->total_i = 0;

				foreach ($data['induk'] as $perubahan) {
					if(
						$perubahan->kd_urusan == $data['real'][$i]->kd_urusan && 
						$perubahan->kd_bidang == $data['real'][$i]->kd_bidang && 
						$perubahan->kd_unit == $data['real'][$i]->kd_unit && 
						$perubahan->kd_sub == $data['real'][$i]->kd_sub && 
						$perubahan->kd_prog == $data['real'][$i]->kd_prog && 
						$perubahan->kd_keg == $data['real'][$i]->kd_keg && 
						$perubahan->kd_rek_1 == $data['real'][$i]->kd_rek_1 && 
						$perubahan->kd_rek_2 == $data['real'][$i]->kd_rek_2 && 
						$perubahan->kd_rek_3 == $data['real'][$i]->kd_rek_3 && 
						$perubahan->kd_rek_4 == $data['real'][$i]->kd_rek_4 && 
						$perubahan->kd_rek_5 == $data['real'][$i]->kd_rek_5 && 
						$perubahan->no_rinc == $data['real'][$i]->no_rinc && 
						$perubahan->no_id == $data['real'][$i]->no_id
					)
					{
						$data['real'][$i]->jml_satuan_i = $perubahan->jml_satuan;
						$data['real'][$i]->nilai_rp_i = $perubahan->nilai_rp;
						$data['real'][$i]->total_i = $perubahan->total;
					}
				}
			}

			for ($i=0; $i < count($data['induk']); $i++) { 
				
				// $data['real'][$i]->jml_satuan_p = 0;
				// $data['real'][$i]->nilai_rp_p = 0;
				// $data['real'][$i]->total_p = 0;

				$ada = 0;
				foreach ($data['real'] as $real) {
					if(
						$real->kd_urusan == $data['induk'][$i]->kd_urusan && 
						$real->kd_bidang == $data['induk'][$i]->kd_bidang && 
						$real->kd_unit == $data['induk'][$i]->kd_unit && 
						$real->kd_sub == $data['induk'][$i]->kd_sub && 
						$real->kd_prog == $data['induk'][$i]->kd_prog && 
						$real->kd_keg == $data['induk'][$i]->kd_keg && 
						$real->kd_rek_1 == $data['induk'][$i]->kd_rek_1 && 
						$real->kd_rek_2 == $data['induk'][$i]->kd_rek_2 && 
						$real->kd_rek_3 == $data['induk'][$i]->kd_rek_3 && 
						$real->kd_rek_4 == $data['induk'][$i]->kd_rek_4 && 
						$real->kd_rek_5 == $data['induk'][$i]->kd_rek_5 && 
						$real->no_rinc == $data['induk'][$i]->no_rinc && 
						$real->no_id == $data['induk'][$i]->no_id
					)
					{
						$ada = 1;
						break;
					}
				}

				if($ada == 0)
				{
					$counter = count($data['real']);
					$data['real'][$counter] = $data['induk'][$i];
					$data['real'][$counter]->jml_satuan_i = $data['real'][$counter]->jml_satuan;
					$data['real'][$counter]->nilai_rp_i = $data['real'][$counter]->nilai_rp;
					$data['real'][$counter]->total_i = $data['real'][$counter]->total;
					$data['real'][$counter]->jml_satuan = 0;
					$data['real'][$counter]->nilai_rp = 0;
					$data['real'][$counter]->total = 0;
				}
			}
		}

		$data['rincian'] = $data['real'][0];
		$data['nama_opd'] = $this->rask->getopd()[0];
		$data['nama_kegiatan'] = $this->rask->getnamakegiatan()[0];
		$data['data_kegiatan'] = $this->backend->getdatarinciankegiatan()[0];
		$data['data_kontrak'] = $this->backend->getdatadetailkontrak()[0];
		$data['target_keuangan'] = $this->realisasikeuangan->getrinciantarget()[0];
		$data['target_fisik'] = $this->backend->gettargetfisik()[0];
		$data['kontrak_keuangan'] = $this->backend->gettargetkeuangankontrak()[0];
		$data['kontrak_fisik'] = $this->backend->gettargetfisikkontrak()[0];
		$data['realisasi_keuangan'] = $this->realisasikeuangan->getrincianrealisasikeuangan()[0];
		$data['realisasi_fisik'] = $this->backend->getrealisasifisik()[0];
		$data['body'] = $this->load->view('be/rincianbykegiatan_detail', $data, true);
		$this->load->view('be/template_be', $data);
	}

	public function detailkegiatanbyopd()
	{
		$data['induk'] = $this->rask->getanggaraninduk();
		$data['perubahan'] = $this->rask->getanggaranperubahan();

		$data['real'] = $data['perubahan'];

		for ($i=0; $i < count($data['real']); $i++) { 
			
			$data['real'][$i]->jml_satuan_i = 0;
			$data['real'][$i]->nilai_rp_i = 0;
			$data['real'][$i]->total_i = 0;

			foreach ($data['induk'] as $perubahan) {
				if(
					$perubahan->kd_urusan == $data['real'][$i]->kd_urusan && 
					$perubahan->kd_bidang == $data['real'][$i]->kd_bidang && 
					$perubahan->kd_unit == $data['real'][$i]->kd_unit && 
					$perubahan->kd_sub == $data['real'][$i]->kd_sub && 
					$perubahan->kd_prog == $data['real'][$i]->kd_prog && 
					$perubahan->kd_keg == $data['real'][$i]->kd_keg && 
					$perubahan->kd_rek_1 == $data['real'][$i]->kd_rek_1 && 
					$perubahan->kd_rek_2 == $data['real'][$i]->kd_rek_2 && 
					$perubahan->kd_rek_3 == $data['real'][$i]->kd_rek_3 && 
					$perubahan->kd_rek_4 == $data['real'][$i]->kd_rek_4 && 
					$perubahan->kd_rek_5 == $data['real'][$i]->kd_rek_5 && 
					$perubahan->no_rinc == $data['real'][$i]->no_rinc && 
					$perubahan->no_id == $data['real'][$i]->no_id
				)
				{
					$data['real'][$i]->jml_satuan_i = $perubahan->jml_satuan;
					$data['real'][$i]->nilai_rp_i = $perubahan->nilai_rp;
					$data['real'][$i]->total_i = $perubahan->total;
				}
			}
		}

		for ($i=0; $i < count($data['induk']); $i++) { 
			
			// $data['real'][$i]->jml_satuan_p = 0;
			// $data['real'][$i]->nilai_rp_p = 0;
			// $data['real'][$i]->total_p = 0;

			$ada = 0;
			foreach ($data['real'] as $real) {
				if(
					$real->kd_urusan == $data['induk'][$i]->kd_urusan && 
					$real->kd_bidang == $data['induk'][$i]->kd_bidang && 
					$real->kd_unit == $data['induk'][$i]->kd_unit && 
					$real->kd_sub == $data['induk'][$i]->kd_sub && 
					$real->kd_prog == $data['induk'][$i]->kd_prog && 
					$real->kd_keg == $data['induk'][$i]->kd_keg && 
					$real->kd_rek_1 == $data['induk'][$i]->kd_rek_1 && 
					$real->kd_rek_2 == $data['induk'][$i]->kd_rek_2 && 
					$real->kd_rek_3 == $data['induk'][$i]->kd_rek_3 && 
					$real->kd_rek_4 == $data['induk'][$i]->kd_rek_4 && 
					$real->kd_rek_5 == $data['induk'][$i]->kd_rek_5 && 
					$real->no_rinc == $data['induk'][$i]->no_rinc && 
					$real->no_id == $data['induk'][$i]->no_id
				)
				{
					$ada = 1;
					break;
				}
			}

			if($ada == 0)
			{
				$counter = count($data['real']);
				$data['real'][$counter] = $data['induk'][$i];
				$data['real'][$counter]->jml_satuan_i = $data['real'][$counter]->jml_satuan;
				$data['real'][$counter]->nilai_rp_i = $data['real'][$counter]->nilai_rp;
				$data['real'][$counter]->total_i = $data['real'][$counter]->total;
				$data['real'][$counter]->jml_satuan = 0;
				$data['real'][$counter]->nilai_rp = 0;
				$data['real'][$counter]->total = 0;
			}
		}

		$data['nama_opd'] = $this->rask->getopd()[0];
		$data['nama_kegiatan'] = $this->rask->getnamakegiatan()[0];
		$data['data_kegiatan'] = $this->backend->getdatadetailkegiatan()[0];
		$data['data_kontrak'] = $this->backend->getdatadetailkontrak()[0];
		$data['target_keuangan'] = $this->backend->gettargetkeuangan()[0];
		$data['target_fisik'] = $this->backend->gettargetfisik()[0];
		$data['kontrak_keuangan'] = $this->backend->gettargetkeuangankontrak()[0];
		$data['kontrak_fisik'] = $this->backend->gettargetfisikkontrak()[0];
		$data['body'] = $this->load->view('be/kegiatanbyopd_detail', $data, true);
		$this->load->view('be/template_be', $data);
	}

	public function detailkegiatan()
	{
		// echo json_encode($this->backend->getdetailkegiatan());
		$data['nama_opd'] = $this->backend->getnamaopd();
		$data['kegiatan'] = $this->backend->getdetailkegiatan();
		$data['body'] = $this->load->view('be/kegiatan_detail', $data, true);
		$this->load->view('be/template_be', $data);
	}

	public function editdatakegiatan()
	{
		$this->form_validation->set_rules('opd', 'OPD', 'trim|required');
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
		
		if($this->form_validation->run() === false)
		{
			$data['kontrak'] = $this->kontrak->getdetailkontrak()[0];
			$data['induk'] = $this->rask->getrincianinduk();
			$data['perubahan'] = $this->rask->getrincianperubahan();

			$data['real'] = $data['perubahan'];
			if($data['perubahan'] == false){
				$data['real'] = $data['induk'];
			}
			else{
				for ($i=0; $i < count($data['real']); $i++) { 
					
					$data['real'][$i]->jml_satuan_i = 0;
					$data['real'][$i]->nilai_rp_i = 0;
					$data['real'][$i]->total_i = 0;

					foreach ($data['induk'] as $perubahan) {
						if(
							$perubahan->kd_urusan == $data['real'][$i]->kd_urusan && 
							$perubahan->kd_bidang == $data['real'][$i]->kd_bidang && 
							$perubahan->kd_unit == $data['real'][$i]->kd_unit && 
							$perubahan->kd_sub == $data['real'][$i]->kd_sub && 
							$perubahan->kd_prog == $data['real'][$i]->kd_prog && 
							$perubahan->kd_keg == $data['real'][$i]->kd_keg && 
							$perubahan->kd_rek_1 == $data['real'][$i]->kd_rek_1 && 
							$perubahan->kd_rek_2 == $data['real'][$i]->kd_rek_2 && 
							$perubahan->kd_rek_3 == $data['real'][$i]->kd_rek_3 && 
							$perubahan->kd_rek_4 == $data['real'][$i]->kd_rek_4 && 
							$perubahan->kd_rek_5 == $data['real'][$i]->kd_rek_5 && 
							$perubahan->no_rinc == $data['real'][$i]->no_rinc && 
							$perubahan->no_id == $data['real'][$i]->no_id
						)
						{
							$data['real'][$i]->jml_satuan_i = $perubahan->jml_satuan;
							$data['real'][$i]->nilai_rp_i = $perubahan->nilai_rp;
							$data['real'][$i]->total_i = $perubahan->total;
						}
					}
				}

				for ($i=0; $i < count($data['induk']); $i++) { 
					
					// $data['real'][$i]->jml_satuan_p = 0;
					// $data['real'][$i]->nilai_rp_p = 0;
					// $data['real'][$i]->total_p = 0;

					$ada = 0;
					foreach ($data['real'] as $real) {
						if(
							$real->kd_urusan == $data['induk'][$i]->kd_urusan && 
							$real->kd_bidang == $data['induk'][$i]->kd_bidang && 
							$real->kd_unit == $data['induk'][$i]->kd_unit && 
							$real->kd_sub == $data['induk'][$i]->kd_sub && 
							$real->kd_prog == $data['induk'][$i]->kd_prog && 
							$real->kd_keg == $data['induk'][$i]->kd_keg && 
							$real->kd_rek_1 == $data['induk'][$i]->kd_rek_1 && 
							$real->kd_rek_2 == $data['induk'][$i]->kd_rek_2 && 
							$real->kd_rek_3 == $data['induk'][$i]->kd_rek_3 && 
							$real->kd_rek_4 == $data['induk'][$i]->kd_rek_4 && 
							$real->kd_rek_5 == $data['induk'][$i]->kd_rek_5 && 
							$real->no_rinc == $data['induk'][$i]->no_rinc && 
							$real->no_id == $data['induk'][$i]->no_id
						)
						{
							$ada = 1;
							break;
						}
					}

					if($ada == 0)
					{
						$counter = count($data['real']);
						$data['real'][$counter] = $data['induk'][$i];
						$data['real'][$counter]->jml_satuan_i = $data['real'][$counter]->jml_satuan;
						$data['real'][$counter]->nilai_rp_i = $data['real'][$counter]->nilai_rp;
						$data['real'][$counter]->total_i = $data['real'][$counter]->total;
						$data['real'][$counter]->jml_satuan = 0;
						$data['real'][$counter]->nilai_rp = 0;
						$data['real'][$counter]->total = 0;
					}
				}
			}

			$data['rincian'] = $data['real'][0];
			$data['nama_opd'] = $this->backend->getnamaopd();
			$data['opd'] = $this->rask->getopd()[0];
			$data['nama_kegiatan'] = $this->rask->getnamakegiatan()[0];
			$data['data_kegiatan'] = $this->backend->getdatarinciankegiatan()[0];
			$data['body'] = $this->load->view('be/edit_datakegiatan', $data, true);
			$this->load->view('be/template_be', $data);
		}
		else
		{
			$this->backend->editdatakegiatan();
		}
	}

	public function edittargetkegiatan()
	{
		$this->form_validation->set_rules('fisik1', 'Fisik Bulan 1', 'trim|required');
		$this->form_validation->set_rules('fisik2', 'Fisik Bulan 2', 'trim|required');
		$this->form_validation->set_rules('fisik3', 'Fisik Bulan 3', 'trim|required');
		$this->form_validation->set_rules('fisik4', 'Fisik Bulan 4', 'trim|required');
		$this->form_validation->set_rules('fisik5', 'Fisik Bulan 5', 'trim|required');
		$this->form_validation->set_rules('fisik6', 'Fisik Bulan 6', 'trim|required');
		$this->form_validation->set_rules('fisik7', 'Fisik Bulan 7', 'trim|required');
		$this->form_validation->set_rules('fisik8', 'Fisik Bulan 8', 'trim|required');
		$this->form_validation->set_rules('fisik9', 'Fisik Bulan 9', 'trim|required');
		$this->form_validation->set_rules('fisik10', 'Fisik Bulan 10', 'trim|required');
		$this->form_validation->set_rules('fisik11', 'Fisik Bulan 11', 'trim|required');
		$this->form_validation->set_rules('fisik12', 'Fisik Bulan 12', 'trim|required');
		
		if($this->form_validation->run() === false)
		{
			$data['nama_opd'] = $this->rask->getopd()[0];
			$data['nama_kegiatan'] = $this->rask->getnamakegiatan()[0];
			$data['data_kegiatan'] = $this->backend->getdatarinciankegiatan()[0];
			$data['target_fisik'] = $this->backend->gettargetfisik()[0];
			$data['body'] = $this->load->view('be/edit_datatarget', $data, true);
			$this->load->view('be/template_be', $data);
		}
		else
		{
			$this->backend->edittargetkegiatan();
		}
	}

	public function edittargetkontrak()
	{	
		$this->form_validation->set_rules('fisik1', 'Fisik Bulan 1', 'trim|required');
		$this->form_validation->set_rules('fisik2', 'Fisik Bulan 2', 'trim|required');
		$this->form_validation->set_rules('fisik3', 'Fisik Bulan 3', 'trim|required');
		$this->form_validation->set_rules('fisik4', 'Fisik Bulan 4', 'trim|required');
		$this->form_validation->set_rules('fisik5', 'Fisik Bulan 5', 'trim|required');
		$this->form_validation->set_rules('fisik6', 'Fisik Bulan 6', 'trim|required');
		$this->form_validation->set_rules('fisik7', 'Fisik Bulan 7', 'trim|required');
		$this->form_validation->set_rules('fisik8', 'Fisik Bulan 8', 'trim|required');
		$this->form_validation->set_rules('fisik9', 'Fisik Bulan 9', 'trim|required');
		$this->form_validation->set_rules('fisik10', 'Fisik Bulan 10', 'trim|required');
		$this->form_validation->set_rules('fisik11', 'Fisik Bulan 11', 'trim|required');
		$this->form_validation->set_rules('fisik12', 'Fisik Bulan 12', 'trim|required');

		if($this->form_validation->run() === false)
		{
			$data['nama_opd'] = $this->rask->getopd()[0];
			$data['nama_kegiatan'] = $this->rask->getnamakegiatan()[0];
			$data['data_kegiatan'] = $this->backend->getdatarinciankegiatan()[0];
			$data['target_keuangan'] = $this->backend->gettargetkeuangankontrak()[0];
			$data['target_fisik'] = $this->backend->gettargetfisikkontrak()[0];
			$data['body'] = $this->load->view('be/edit_datatargetkontrak', $data, true);
			$this->load->view('be/template_be', $data);
		}
		else
		{
			$this->backend->edittargetkontrak();
		}
	}

	public function laporanfisik()
	{
		$this->form_validation->set_rules('realisasi', 'Realisasi', 'trim|required');
		
		if($this->form_validation->run() === false)
		{
			$data['nama_opd'] = $this->backend->getnamaopd();
			$data['opd'] = $this->rask->getopd()[0];
			$data['nama_kegiatan'] = $this->rask->getnamakegiatan()[0];
			$data['data_kegiatan'] = $this->backend->getdatarinciankegiatan()[0];
			$data['target_fisik'] = $this->backend->gettargetfisik()[0];
			$data['realisasi_fisik'] = $this->backend->getrealisasifisik()[0];
			$data['body'] = $this->load->view('be/pelaporan_fisik2', $data, true);
			$this->load->view('be/template_be', $data);
		}
		else
		{
			$this->backend->laporanfisik();
		}
	}

	public function rask()
	{
		$data['nama_opd'] = $this->backend->getnamaopd();
		$data['kegiatan'] = $this->beranda->getkegiatanbyopd();
		$data['body'] = $this->load->view('be/report_rask', $data, true);
		$this->load->view('be/template_be', $data);
	}

	public function kontrak()
	{
		$data['nama_opd'] = $this->backend->getnamaopd();
		$data['kontrak'] = $this->kontrak->getkontrak();
		$data['nama_kegiatan'] = $this->rask->getnamakegiatanall();
		$data['body'] = $this->load->view('be/report_kontrak', $data, true);
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
		if($this->session->userdata('session')['role']==1){
			$data['body'] = $this->load->view('be/pelaporan_fisik', '', true);
			$this->load->view('be/template_be', $data);
		}
		else{			
			$data['body'] = $this->load->view('be/pelaporan_fisik_opd', '', true);
			$this->load->view('be/template_be', $data);
		}
	}

	public function user()
	{
		$data['body'] = $this->load->view('be/user', '', true);
		$this->load->view('be/template_be', $data);
	}
}