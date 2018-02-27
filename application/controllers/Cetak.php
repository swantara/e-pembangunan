<<<<<<< HEAD
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

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
    
    public function cetak_opd()
	{
		$data['laporan'] = $this->rask->getlaporanopd();
		$data['nama_opd'] = $this->backend->getnamaopd();
		$data['kegiatan'] = $this->beranda->getkegiatanbyopd();
		$this->load->view('cetak/cetak_opd', $data);
	}
	
	public function cetak_kegiatan()
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
		$this->load->view('cetak/cetak_kegiatan', $data);
	}

=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

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

	public function cetak_kegiatan()
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
		$this->load->view('cetak/cetak_kegiatan', $data);
	}

>>>>>>> master
}