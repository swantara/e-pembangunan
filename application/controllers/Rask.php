<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rask extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('backend_model', 'backend', true);
		$this->load->model('beranda_model', 'beranda', true);
		$this->load->model('rask_model', 'rask', true);
	
		// if(!$this->session->userdata('nlvsess'))
  //  		{
  //  			redirect('login', 'refresh');
  //  		}
	}

	public function index()
	{
		$data['nama_opd'] = $this->backend->getnamaopd();
		$data['kegiatan'] = $this->beranda->getkegiatanbyopd();
		$data['body'] = $this->load->view('fe/rask', $data, true);
		$this->load->view('fe/template', $data);
	}

	public function opd()
	{
		// echo json_encode($this->backend->getdetailkegiatan());
		$data['nama_opd'] = $this->rask->getopd()[0];
		$data['kegiatan'] = $this->rask->getopdlist();
		$data['nama_kegiatan'] = $this->rask->getnamakegiatanall();
		$data['body'] = $this->load->view('fe/rask_opd', $data, true);
		$this->load->view('fe/template', $data);
	}

	public function kegiatanold()
	{
		// echo json_encode($this->backend->getdetailkegiatan());
		$data['nama_opd'] = $this->rask->getopd()[0];
		$data['induk'] = $this->rask->getanggaraninduk();
		$data['perubahan'] = $this->rask->getanggaranperubahan();
		$data['nama_kegiatan'] = $this->rask->getnamakegiatan()[0];
		$data['body'] = $this->load->view('fe/rask_kegiatan', $data, true);
		$this->load->view('fe/template', $data);
	}

	public function kegiatan()
	{
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

		$data['nama_opd'] = $this->rask->getopd()[0];
		$data['nama_kegiatan'] = $this->rask->getnamakegiatan()[0];
		$data['body'] = $this->load->view('fe/rask_kegiatan', $data, true);
		$this->load->view('fe/template', $data);
	}

	public function meong()
	{
		$data['induk'] = $this->rask->getanggaraninduk();
		$data['perubahan'] = $this->rask->getanggaranperubahan();

		$data['real'] = $data['induk'];

		for ($i=0; $i < count($data['real']); $i++) { 
			
			$data['real'][$i]->jml_satuan_p = 0;
			$data['real'][$i]->nilai_rp_p = 0;
			$data['real'][$i]->total_p = 0;

			foreach ($data['perubahan'] as $perubahan) {
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
					$data['real'][$i]->jml_satuan_p = $perubahan->jml_satuan;
					$data['real'][$i]->nilai_rp_p = $perubahan->nilai_rp;
					$data['real'][$i]->total_p = $perubahan->total;
				}
			}
		}

		for ($i=0; $i < count($data['perubahan']); $i++) { 
			
			// $data['real'][$i]->jml_satuan_p = 0;
			// $data['real'][$i]->nilai_rp_p = 0;
			// $data['real'][$i]->total_p = 0;

			$ada = 0;
			foreach ($data['real'] as $real) {
				if(
					$real->kd_urusan == $data['perubahan'][$i]->kd_urusan && 
					$real->kd_bidang == $data['perubahan'][$i]->kd_bidang && 
					$real->kd_unit == $data['perubahan'][$i]->kd_unit && 
					$real->kd_sub == $data['perubahan'][$i]->kd_sub && 
					$real->kd_prog == $data['perubahan'][$i]->kd_prog && 
					$real->kd_keg == $data['perubahan'][$i]->kd_keg && 
					$real->kd_rek_1 == $data['perubahan'][$i]->kd_rek_1 && 
					$real->kd_rek_2 == $data['perubahan'][$i]->kd_rek_2 && 
					$real->kd_rek_3 == $data['perubahan'][$i]->kd_rek_3 && 
					$real->kd_rek_4 == $data['perubahan'][$i]->kd_rek_4 && 
					$real->kd_rek_5 == $data['perubahan'][$i]->kd_rek_5 && 
					$real->no_rinc == $data['perubahan'][$i]->no_rinc && 
					$real->no_id == $data['perubahan'][$i]->no_id
				)
				{
					$ada = 1;
					break;
				}
			}

			if($ada == 0)
			{
				$counter = count($data['real']);
				$data['real'][$counter] = $data['perubahan'][$i];
				$data['real'][$counter]->jml_satuan_p = $data['real'][$counter]->jml_satuan;
				$data['real'][$counter]->nilai_rp_p = $data['real'][$counter]->nilai_rp;
				$data['real'][$counter]->total_p = $data['real'][$counter]->total;
				$data['real'][$counter]->jml_satuan = 0;
				$data['real'][$counter]->nilai_rp = 0;
				$data['real'][$counter]->total = 0;
			}
		}

		echo json_encode($data['real']);
	}

	public function ajaxgetsumanggaran()
	{
		$sum['induk'] = $this->rask->getsumanggaraninduk()[0];
		$sum['perubahan'] = $this->rask->getsumanggaranperubahan()[0];
		if($sum['induk']->total > $sum['perubahan']->total)
		{
			$sum['real'] = $this->rask->getsumanggaraninduk();
		}
		else
		{
			$sum['real'] = $this->rask->getsumanggaranperubahan();			
		}

		$data['sum'] = (object)[
			'name' => "Total Anggaran - " . number_format(($sum['real'][0]->total), 2, ',', '.') . " Miliar",
			'children' =>	array([
					'name' => "Belanja Tidak Langsung - " . number_format(($sum['real'][0]->b_taklangsung), 2, ',', '.') . " Miliar",
					'children' => array([
						'name' => "Pegawai - " . number_format(($sum['real'][0]->taklangsung_pegawai), 2, ',', '.') . " Miliar"
					],
					[
						'name' => "Non Pegawai - " . number_format(($sum['real'][0]->taklangsung_non), 2, ',', '.') . " Miliar"
					])
				],
				[
					'name' => "Belanja Langsung - " . number_format(($sum['real'][0]->b_langsung), 2, ',', '.') . " Miliar",
					'children' => array([
						'name' => "Pegawai - " . number_format(($sum['real'][0]->langsung_pegawai), 2, ',', '.') . " Miliar"
					],
					[
						'name' => "Non Pegawai - " . number_format(($sum['real'][0]->langsung_non), 2, ',', '.') . " Miliar",
						'children' => array([
							'name' => "Barang/Jasa - " . number_format(($sum['real'][0]->barangjasa), 2, ',', '.') . " Miliar"
						],
						[
							'name' => "Modal - " . number_format(($sum['real'][0]->modal), 2, ',', '.') . " Miliar"
						])
					])
				])
		];
		// $data['sum']->name = "Total Anggaran - " . $sum['real'][0]->total/1000000000 . " Miliar";
		// $data['sum']->children[0]->name = "Belanja Tidak Langsung - " . $sum['real'][0]->b_taklangsung/1000000000 . " Miliar";
		// $data['sum']->children[1]->name = "Belanja Langsung - " . $sum['real'][0]->b_langsung/1000000000 . " Miliar";
		// $data['sum']->children[0][0]->name = "Pegawai - " . $sum['real'][0]->langsung_pegawai/1000000000 . " Miliar";
		// $data['sum']->children[0][1]->name = "Non Pegawai - " . $sum['real'][0]->langsung_non/1000000000 . " Miliar";
		// $data['sum']->children[1][0]->name = "Pegawai - " . $sum['real'][0]->taklangsung_pegawai/1000000000 . " Miliar";
		// $data['sum']->children[1][1]->name = "Non Pegawai - " . $sum['real'][0]->taklangsung_non/1000000000 . " Miliar";
		// $data['sum']->children[1][1][0]->name = "Barang/Jasa - " . $sum['real'][0]->barangjasa/1000000000 . " Miliar";
		// $data['sum']->children[1][1][1]->name = "Modal - " . $sum['real'][0]->modal/1000000000 . " Miliar";

		echo json_encode($data['sum']);
	}

	public function ajaxgetsumanggaranopd()
	{
		$sum['induk'] = $this->rask->getsumanggaranindukopd()[0];
		$sum['perubahan'] = $this->rask->getsumanggaranperubahanopd()[0];
		if($sum['induk']->total > $sum['perubahan']->total)
		{
			$sum['real'] = $this->rask->getsumanggaraninduk();
		}
		else
		{
			$sum['real'] = $this->rask->getsumanggaranperubahan();			
		}

		$data['sum'] = (object)[
			'name' => "Total Anggaran - " . number_format(($sum['real'][0]->total), 2, ',', '.') . " Miliar",
			'children' =>	array([
					'name' => "Belanja Tidak Langsung - " . number_format(($sum['real'][0]->b_taklangsung), 2, ',', '.') . " Miliar",
					'children' => array([
						'name' => "Pegawai - " . number_format(($sum['real'][0]->taklangsung_pegawai), 2, ',', '.') . " Miliar"
					],
					[
						'name' => "Non Pegawai - " . number_format(($sum['real'][0]->taklangsung_non), 2, ',', '.') . " Miliar"
					])
				],
				[
					'name' => "Belanja Langsung - " . number_format(($sum['real'][0]->b_langsung), 2, ',', '.') . " Miliar",
					'children' => array([
						'name' => "Pegawai - " . number_format(($sum['real'][0]->langsung_pegawai), 2, ',', '.') . " Miliar"
					],
					[
						'name' => "Non Pegawai - " . number_format(($sum['real'][0]->langsung_non), 2, ',', '.') . " Miliar",
						'children' => array([
							'name' => "Barang/Jasa - " . number_format(($sum['real'][0]->barangjasa), 2, ',', '.') . " Miliar"
						],
						[
							'name' => "Modal - " . number_format(($sum['real'][0]->modal), 2, ',', '.') . " Miliar"
						])
					])
				])
		];
		// $data['sum']->name = "Total Anggaran - " . $sum['real'][0]->total/1000000000 . " Miliar";
		// $data['sum']->children[0]->name = "Belanja Tidak Langsung - " . $sum['real'][0]->b_taklangsung/1000000000 . " Miliar";
		// $data['sum']->children[1]->name = "Belanja Langsung - " . $sum['real'][0]->b_langsung/1000000000 . " Miliar";
		// $data['sum']->children[0][0]->name = "Pegawai - " . $sum['real'][0]->langsung_pegawai/1000000000 . " Miliar";
		// $data['sum']->children[0][1]->name = "Non Pegawai - " . $sum['real'][0]->langsung_non/1000000000 . " Miliar";
		// $data['sum']->children[1][0]->name = "Pegawai - " . $sum['real'][0]->taklangsung_pegawai/1000000000 . " Miliar";
		// $data['sum']->children[1][1]->name = "Non Pegawai - " . $sum['real'][0]->taklangsung_non/1000000000 . " Miliar";
		// $data['sum']->children[1][1][0]->name = "Barang/Jasa - " . $sum['real'][0]->barangjasa/1000000000 . " Miliar";
		// $data['sum']->children[1][1][1]->name = "Modal - " . $sum['real'][0]->modal/1000000000 . " Miliar";

		echo json_encode($data['sum']);
	}

	public function ajaxgetsumanggaranmix()
	{
		$data['induk'] = $this->rask->getsumanggaraninduk();
		$data['perubahan'] = $this->rask->getsumanggaranperubahan();	
		echo json_encode($data);
	}
	
	public function sync()
	{
	    ini_set('memory_limit', '-1');
		$data['sync'] = $this->rask->syncrask();
		echo json_encode($data['sync']);
	}
}