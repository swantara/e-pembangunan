<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('backend_model', 'backend', true);
		$this->load->model('rask_model', 'rask', true);
		$this->load->model('beranda_model', 'beranda', true);
		$this->load->model('realisasikeuangan_model', 'realisasikeuangan', true);
		$this->load->model('realisasifisik_model', 'realisasifisik', true);
	}

	public function test(){
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

		$count = count($data['real']);

		echo json_encode($data['induk']);
	}

	public function index()
	{
		$data['nama_opd'] = $this->backend->getnamaopd();
		$data['nama_kegiatan'] = $this->rask->getnamakegiatanall();
		$data['targetkeuangan'] = $this->realisasikeuangan->gettargetall()[0];
		$data['realisasikeuangan'] = $this->realisasikeuangan->getrealisasiall()[0];
		$data['targetfisik'] = $this->realisasifisik->gettargetall()[0];
		$data['realisasifisik'] = $this->realisasifisik->getrealisasiall()[0];
		$data['kegiatan'] = $this->beranda->getkegiatanbyopd();
		$data['jumlahkegiatan'] = $this->rask->getkegiatan();
		$count = sizeof($data['jumlahkegiatan']);

		$data["targetfisik"]->total_jan = $data["targetfisik"]->total_jan/$count;
		$data["targetfisik"]->total_feb = $data["targetfisik"]->total_feb/$count;
		$data["targetfisik"]->total_mar = $data["targetfisik"]->total_mar/$count;
		$data["targetfisik"]->total_apr = $data["targetfisik"]->total_apr/$count;
		$data["targetfisik"]->total_mei = $data["targetfisik"]->total_mei/$count;
		$data["targetfisik"]->total_jun = $data["targetfisik"]->total_jun/$count;
		$data["targetfisik"]->total_jul = $data["targetfisik"]->total_jul/$count;
		$data["targetfisik"]->total_agt = $data["targetfisik"]->total_agt/$count;
		$data["targetfisik"]->total_sep = $data["targetfisik"]->total_sep/$count;
		$data["targetfisik"]->total_okt = $data["targetfisik"]->total_okt/$count;
		$data["targetfisik"]->total_nop = $data["targetfisik"]->total_nop/$count;
		$data["targetfisik"]->total_des = $data["targetfisik"]->total_des/$count;

		$data["realisasifisik"]->total_jan = $data["realisasifisik"]->total_jan/$count;
		$data["realisasifisik"]->total_feb = $data["realisasifisik"]->total_feb/$count;
		$data["realisasifisik"]->total_mar = $data["realisasifisik"]->total_mar/$count;
		$data["realisasifisik"]->total_apr = $data["realisasifisik"]->total_apr/$count;
		$data["realisasifisik"]->total_mei = $data["realisasifisik"]->total_mei/$count;
		$data["realisasifisik"]->total_jun = $data["realisasifisik"]->total_jun/$count;
		$data["realisasifisik"]->total_jul = $data["realisasifisik"]->total_jul/$count;
		$data["realisasifisik"]->total_agt = $data["realisasifisik"]->total_agt/$count;
		$data["realisasifisik"]->total_sep = $data["realisasifisik"]->total_sep/$count;
		$data["realisasifisik"]->total_okt = $data["realisasifisik"]->total_okt/$count;
		$data["realisasifisik"]->total_nop = $data["realisasifisik"]->total_nop/$count;
		$data["realisasifisik"]->total_des = $data["realisasifisik"]->total_des/$count;

		if(date("n")<1){
			$data["realisasikeuangan"]->total_jan = null;
			$data["realisasifisik"]->total_jan = null;
		}
		if(date("n")<2){
			$data["realisasikeuangan"]->total_feb = null;
			$data["realisasifisik"]->total_feb = null;
		}
		if(date("n")<3){
			$data["realisasikeuangan"]->total_mar = null;
			$data["realisasifisik"]->total_mar = null;
		}
		if(date("n")<4){
			$data["realisasikeuangan"]->total_apr = null;
			$data["realisasifisik"]->total_apr = null;
		}
		if(date("n")<5){
			$data["realisasikeuangan"]->total_mei = null;
			$data["realisasifisik"]->total_mei = null;
		}
		if(date("n")<6){
			$data["realisasikeuangan"]->total_jun = null;
			$data["realisasifisik"]->total_jun = null;
		}
		if(date("n")<7){
			$data["realisasikeuangan"]->total_jul = null;
			$data["realisasifisik"]->total_jul = null;
		}
		if(date("n")<8){
			$data["realisasikeuangan"]->total_agt = null;
			$data["realisasifisik"]->total_agt = null;
		}
		if(date("n")<9){
			$data["realisasikeuangan"]->total_sep = null;
			$data["realisasifisik"]->total_sep = null;
		}
		if(date("n")<10){
			$data["realisasikeuangan"]->total_okt = null;
			$data["realisasifisik"]->total_okt = null;
		}
		if(date("n")<11){
			$data["realisasikeuangan"]->total_nop = null;
			$data["realisasifisik"]->total_nop = null;
		}
		if(date("n")<12){
			$data["realisasikeuangan"]->total_des = null;
			$data["realisasifisik"]->total_des = null;
		}

		$data['body'] = $this->load->view('fe/beranda', $data, true);
		$this->load->view('fe/template', $data);
		// echo json_encode($data['kegiatan']);
	}

	public function opd()
	{
		$data['nama_opd'] = $this->beranda->getnamaopd()[0];
		$data['targetkeuangan'] = $this->realisasikeuangan->gettargetopd()[0];
		$data['realisasikeuangan'] = $this->realisasikeuangan->getrealisasiopd()[0];
		$data['targetfisik'] = $this->realisasifisik->gettargetopd()[0];
		$data['realisasifisik'] = $this->realisasifisik->getrealisasiopd()[0];
		$data['targetkeuangantriwulan'] = $this->realisasikeuangan->gettargettriwulan()[0];
		$data['realisasikeuangantriwulan'] = $this->realisasikeuangan->getrealisasitriwulan()[0];
		$data['targetfisiktriwulan'] = $this->realisasifisik->gettargettriwulan()[0];
		$data['realisasifisiktriwulan'] = $this->realisasifisik->getrealisasitriwulan()[0];
		$data['jumlahkegiatan'] = $this->rask->getcountkegiatanopd();
		$count = sizeof($data['jumlahkegiatan']);

		$data["targetfisik"]->total_jan = $data["targetfisik"]->total_jan/$count;
		$data["targetfisik"]->total_feb = $data["targetfisik"]->total_feb/$count;
		$data["targetfisik"]->total_mar = $data["targetfisik"]->total_mar/$count;
		$data["targetfisik"]->total_apr = $data["targetfisik"]->total_apr/$count;
		$data["targetfisik"]->total_mei = $data["targetfisik"]->total_mei/$count;
		$data["targetfisik"]->total_jun = $data["targetfisik"]->total_jun/$count;
		$data["targetfisik"]->total_jul = $data["targetfisik"]->total_jul/$count;
		$data["targetfisik"]->total_agt = $data["targetfisik"]->total_agt/$count;
		$data["targetfisik"]->total_sep = $data["targetfisik"]->total_sep/$count;
		$data["targetfisik"]->total_okt = $data["targetfisik"]->total_okt/$count;
		$data["targetfisik"]->total_nop = $data["targetfisik"]->total_nop/$count;
		$data["targetfisik"]->total_des = $data["targetfisik"]->total_des/$count;

		$data["realisasifisik"]->total_jan = $data["realisasifisik"]->total_jan/$count;
		$data["realisasifisik"]->total_feb = $data["realisasifisik"]->total_feb/$count;
		$data["realisasifisik"]->total_mar = $data["realisasifisik"]->total_mar/$count;
		$data["realisasifisik"]->total_apr = $data["realisasifisik"]->total_apr/$count;
		$data["realisasifisik"]->total_mei = $data["realisasifisik"]->total_mei/$count;
		$data["realisasifisik"]->total_jun = $data["realisasifisik"]->total_jun/$count;
		$data["realisasifisik"]->total_jul = $data["realisasifisik"]->total_jul/$count;
		$data["realisasifisik"]->total_agt = $data["realisasifisik"]->total_agt/$count;
		$data["realisasifisik"]->total_sep = $data["realisasifisik"]->total_sep/$count;
		$data["realisasifisik"]->total_okt = $data["realisasifisik"]->total_okt/$count;
		$data["realisasifisik"]->total_nop = $data["realisasifisik"]->total_nop/$count;
		$data["realisasifisik"]->total_des = $data["realisasifisik"]->total_des/$count;

		$data["targetfisiktriwulan"]->triwulan_1 = $data["targetfisiktriwulan"]->triwulan_1/$count;
		$data["targetfisiktriwulan"]->triwulan_2 = $data["targetfisiktriwulan"]->triwulan_2/$count;
		$data["targetfisiktriwulan"]->triwulan_3 = $data["targetfisiktriwulan"]->triwulan_3/$count;
		$data["targetfisiktriwulan"]->triwulan_4 = $data["targetfisiktriwulan"]->triwulan_4/$count;

		$data["realisasifisiktriwulan"]->triwulan_1 = $data["realisasifisiktriwulan"]->triwulan_1/$count;
		$data["realisasifisiktriwulan"]->triwulan_2 = $data["realisasifisiktriwulan"]->triwulan_2/$count;
		$data["realisasifisiktriwulan"]->triwulan_3 = $data["realisasifisiktriwulan"]->triwulan_3/$count;
		$data["realisasifisiktriwulan"]->triwulan_4 = $data["realisasifisiktriwulan"]->triwulan_4/$count;

		if(date("n")<1){
			$data["realisasikeuangan"]->total_jan = null;
			$data["realisasifisik"]->total_jan = null;
			$data["realisasikeuangantriwulan"]->triwulan_1 = null;
			$data["realisasifisiktriwulan"]->triwulan_1 = null;
		}
		if(date("n")<2){
			$data["realisasikeuangan"]->total_feb = null;
			$data["realisasifisik"]->total_feb = null;
		}
		if(date("n")<3){
			$data["realisasikeuangan"]->total_mar = null;
			$data["realisasifisik"]->total_mar = null;
		}
		if(date("n")<4){
			$data["realisasikeuangan"]->total_apr = null;
			$data["realisasifisik"]->total_apr = null;
			$data["realisasikeuangantriwulan"]->triwulan_2 = null;
			$data["realisasifisiktriwulan"]->triwulan_2 = null;
		}
		if(date("n")<5){
			$data["realisasikeuangan"]->total_mei = null;
			$data["realisasifisik"]->total_mei = null;
		}
		if(date("n")<6){
			$data["realisasikeuangan"]->total_jun = null;
			$data["realisasifisik"]->total_jun = null;
		}
		if(date("n")<7){
			$data["realisasikeuangan"]->total_jul = null;
			$data["realisasifisik"]->total_jul = null;
			$data["realisasikeuangantriwulan"]->triwulan_3 = null;
			$data["realisasifisiktriwulan"]->triwulan_3 = null;
		}
		if(date("n")<8){
			$data["realisasikeuangan"]->total_agt = null;
			$data["realisasifisik"]->total_agt = null;
		}
		if(date("n")<9){
			$data["realisasikeuangan"]->total_sep = null;
			$data["realisasifisik"]->total_sep = null;
		}
		if(date("n")<10){
			$data["realisasikeuangan"]->total_okt = null;
			$data["realisasifisik"]->total_okt = null;
			$data["realisasikeuangantriwulan"]->triwulan_4 = null;
			$data["realisasifisiktriwulan"]->triwulan_4 = null;
		}
		if(date("n")<11){
			$data["realisasikeuangan"]->total_nop = null;
			$data["realisasifisik"]->total_nop = null;
		}
		if(date("n")<12){
			$data["realisasikeuangan"]->total_des = null;
			$data["realisasifisik"]->total_des = null;
		}

		$data['body'] = $this->load->view('fe/summary_opd', $data, true);
		$this->load->view('fe/template', $data);
	}

	public function ajaxgetkeuanganall()
	{
		if($this->input->is_ajax_request()){
			$data["keuangan"][0] = $this->realisasikeuangan->getsumtargetall()[0];
			$data["keuangan"][1] = $this->realisasikeuangan->getsumrealisasiall()[0];
			$data["keuangan"][2] = $this->realisasikeuangan->getsumrealisasiall()[0];

			if(date("n")>=1){
				$data["keuangan"][2]->total_jan = number_format($data["keuangan"][2]->total_jan-$data["keuangan"][0]->total_jan, 2, ',', '');
				$data["keuangan"][1]->total_jan = number_format($data["keuangan"][1]->total_jan, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_jan = null;
				$data["keuangan"][1]->total_jan = null;
			}
			if(date("n")>=2){
				$data["keuangan"][2]->total_feb = number_format($data["keuangan"][2]->total_feb-$data["keuangan"][0]->total_feb, 2, ',', '');
				$data["keuangan"][1]->total_feb = number_format($data["keuangan"][1]->total_feb, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_feb = null;
				$data["keuangan"][1]->total_feb = null;
			}
			if(date("n")>=3){
				$data["keuangan"][2]->total_mar = number_format($data["keuangan"][2]->total_mar-$data["keuangan"][0]->total_mar, 2, ',', '');
				$data["keuangan"][1]->total_mar = number_format($data["keuangan"][1]->total_mar, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_mar = null;
				$data["keuangan"][1]->total_mar = null;
			}
			if(date("n")>=4){
				$data["keuangan"][2]->total_apr = number_format($data["keuangan"][2]->total_apr-$data["keuangan"][0]->total_apr, 2, ',', '');
				$data["keuangan"][1]->total_apr = number_format($data["keuangan"][1]->total_apr, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_apr = null;
				$data["keuangan"][1]->total_apr = null;
			}
			if(date("n")>=5){
				$data["keuangan"][2]->total_mei = number_format($data["keuangan"][2]->total_mei-$data["keuangan"][0]->total_mei, 2, ',', '');
				$data["keuangan"][1]->total_mei = number_format($data["keuangan"][1]->total_mei, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_mei = null;
				$data["keuangan"][1]->total_mei = null;
			}
			if(date("n")>=6){
				$data["keuangan"][2]->total_jun = number_format($data["keuangan"][2]->total_jun-$data["keuangan"][0]->total_jun, 2, ',', '');
				$data["keuangan"][1]->total_jun = number_format($data["keuangan"][1]->total_jun, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_jun = null;
				$data["keuangan"][1]->total_jun = null;
			}
			if(date("n")>=7){
				$data["keuangan"][2]->total_jul = number_format($data["keuangan"][2]->total_jul-$data["keuangan"][0]->total_jul, 2, ',', '');
				$data["keuangan"][1]->total_jul = number_format($data["keuangan"][1]->total_jul, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_jul = null;
				$data["keuangan"][1]->total_jul = null;
			}
			if(date("n")>=8){
				$data["keuangan"][2]->total_agt = number_format($data["keuangan"][2]->total_agt-$data["keuangan"][0]->total_agt, 2, ',', '');
				$data["keuangan"][1]->total_agt = number_format($data["keuangan"][1]->total_agt, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_agt = null;
				$data["keuangan"][1]->total_agt = null;
			}
			if(date("n")>=9){
				$data["keuangan"][2]->total_sep = number_format($data["keuangan"][2]->total_sep-$data["keuangan"][0]->total_sep, 2, ',', '');
				$data["keuangan"][1]->total_sep = number_format($data["keuangan"][1]->total_sep, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_sep = null;
				$data["keuangan"][1]->total_sep = null;
			}
			if(date("n")>=10){
				$data["keuangan"][2]->total_okt = number_format($data["keuangan"][2]->total_okt-$data["keuangan"][0]->total_okt, 2, ',', '');
				$data["keuangan"][1]->total_okt = number_format($data["keuangan"][1]->total_okt, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_okt = null;
				$data["keuangan"][1]->total_okt = null;
			}
			if(date("n")>=11){
				$data["keuangan"][2]->total_nop = number_format($data["keuangan"][2]->total_nop-$data["keuangan"][0]->total_nop, 2, ',', '');
				$data["keuangan"][1]->total_nop = number_format($data["keuangan"][1]->total_nop, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_nop = null;
				$data["keuangan"][1]->total_nop = null;
			}
			if(date("n")>=12){
				$data["keuangan"][2]->total_des = number_format($data["keuangan"][2]->total_des-$data["keuangan"][0]->total_des, 2, ',', '');
				$data["keuangan"][1]->total_des = number_format($data["keuangan"][1]->total_des, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_des = null;
				$data["keuangan"][1]->total_des = null;
			}

			$data["keuangan"][0]->total_jan = number_format($data["keuangan"][0]->total_jan, 2, ',', '');
			$data["keuangan"][0]->total_feb = number_format($data["keuangan"][0]->total_feb, 2, ',', '');
			$data["keuangan"][0]->total_mar = number_format($data["keuangan"][0]->total_mar, 2, ',', '');
			$data["keuangan"][0]->total_apr = number_format($data["keuangan"][0]->total_apr, 2, ',', '');
			$data["keuangan"][0]->total_mei = number_format($data["keuangan"][0]->total_mei, 2, ',', '');
			$data["keuangan"][0]->total_jun = number_format($data["keuangan"][0]->total_jun, 2, ',', '');
			$data["keuangan"][0]->total_jul = number_format($data["keuangan"][0]->total_jul, 2, ',', '');
			$data["keuangan"][0]->total_agt = number_format($data["keuangan"][0]->total_agt, 2, ',', '');
			$data["keuangan"][0]->total_sep = number_format($data["keuangan"][0]->total_sep, 2, ',', '');
			$data["keuangan"][0]->total_okt = number_format($data["keuangan"][0]->total_okt, 2, ',', '');
			$data["keuangan"][0]->total_nop = number_format($data["keuangan"][0]->total_nop, 2, ',', '');
			$data["keuangan"][0]->total_des = number_format($data["keuangan"][0]->total_des, 2, ',', '');
			
			echo json_encode($data);
		}
	}

	public function ajaxgetfisikall()
	{
		if($this->input->is_ajax_request()){
			$data["fisik"][0] = $this->realisasifisik->getsumtargetall()[0];
			$data["fisik"][1] = $this->realisasifisik->getsumrealisasiall()[0];
			$data["fisik"][2] = $this->realisasifisik->getsumrealisasiall()[0];
			$data['kegiatan'] = $this->rask->getkegiatan();
			$count = sizeof($data['kegiatan']);
			
			if(date("n")>=1){
				$data["fisik"][2]->total_jan = number_format(($data["fisik"][2]->total_jan/$count)-($data["fisik"][0]->total_jan/$count), 2, '.', ',');
				$data["fisik"][1]->total_jan = number_format($data["fisik"][1]->total_jan/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_jan = null;
				$data["fisik"][1]->total_jan = null;
			}
			if(date("n")>=2){
				$data["fisik"][2]->total_feb = number_format(($data["fisik"][2]->total_feb/$count)-($data["fisik"][0]->total_feb/$count), 2, '.', ',');
				$data["fisik"][1]->total_feb = number_format($data["fisik"][1]->total_feb/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_feb = null;
				$data["fisik"][1]->total_feb = null;
			}
			if(date("n")>=3){
				$data["fisik"][2]->total_mar = number_format(($data["fisik"][2]->total_mar/$count)-($data["fisik"][0]->total_mar/$count), 2, '.', ',');
				$data["fisik"][1]->total_mar = number_format($data["fisik"][1]->total_mar/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_mar = null;
				$data["fisik"][1]->total_mar = null;
			}
			if(date("n")>=4){
				$data["fisik"][2]->total_apr = number_format(($data["fisik"][2]->total_apr/$count)-($data["fisik"][0]->total_apr/$count), 2, '.', ',');
				$data["fisik"][1]->total_apr = number_format($data["fisik"][1]->total_apr/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_apr = null;
				$data["fisik"][1]->total_apr = null;
			}
			if(date("n")>=5){
				$data["fisik"][2]->total_mei = number_format(($data["fisik"][2]->total_mei/$count)-($data["fisik"][0]->total_mei/$count), 2, '.', ',');
				$data["fisik"][1]->total_mei = number_format($data["fisik"][1]->total_mei/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_mei = null;
				$data["fisik"][1]->total_mei = null;
			}
			if(date("n")>=6){
				$data["fisik"][2]->total_jun = number_format(($data["fisik"][2]->total_jun/$count)-($data["fisik"][0]->total_jun/$count), 2, '.', ',');
				$data["fisik"][1]->total_jun = number_format($data["fisik"][1]->total_jun/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_jun = null;
				$data["fisik"][1]->total_jun = null;
			}
			if(date("n")>=7){
				$data["fisik"][2]->total_jul = number_format(($data["fisik"][2]->total_jul/$count)-($data["fisik"][0]->total_jul/$count), 2, '.', ',');
				$data["fisik"][1]->total_jul = number_format($data["fisik"][1]->total_jul/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_jul = null;
				$data["fisik"][1]->total_jul = null;
			}
			if(date("n")>=8){
				$data["fisik"][2]->total_agt = number_format(($data["fisik"][2]->total_agt/$count)-($data["fisik"][0]->total_agt/$count), 2, '.', ',');
				$data["fisik"][1]->total_agt = number_format($data["fisik"][1]->total_agt/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_agt = null;
				$data["fisik"][1]->total_agt = null;
			}
			if(date("n")>=9){
				$data["fisik"][2]->total_sep = number_format(($data["fisik"][2]->total_sep/$count)-($data["fisik"][0]->total_sep/$count), 2, '.', ',');
				$data["fisik"][1]->total_sep = number_format($data["fisik"][1]->total_sep/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_sep = null;
				$data["fisik"][1]->total_sep = null;
			}
			if(date("n")>=10){
				$data["fisik"][2]->total_okt = number_format(($data["fisik"][2]->total_okt/$count)-($data["fisik"][0]->total_okt/$count), 2, '.', ',');
				$data["fisik"][1]->total_okt = number_format($data["fisik"][1]->total_okt/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_okt = null;
				$data["fisik"][1]->total_okt = null;
			}
			if(date("n")>=11){
				$data["fisik"][2]->total_nop = number_format(($data["fisik"][2]->total_nop/$count)-($data["fisik"][0]->total_nop/$count), 2, '.', ',');
				$data["fisik"][1]->total_nop = number_format($data["fisik"][1]->total_nop/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_nop = null;
				$data["fisik"][1]->total_nop = null;
			}
			if(date("n")>=12){
				$data["fisik"][2]->total_des = number_format(($data["fisik"][2]->total_des/$count)-($data["fisik"][0]->total_des/$count), 2, '.', ',');
				$data["fisik"][1]->total_des = number_format($data["fisik"][1]->total_des/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_des = null;
				$data["fisik"][1]->total_des = null;
			}

			$data["fisik"][0]->total_jan = number_format($data["fisik"][0]->total_jan/$count, 2, '.', ',');
			$data["fisik"][0]->total_feb = number_format($data["fisik"][0]->total_feb/$count, 2, '.', ',');
			$data["fisik"][0]->total_mar = number_format($data["fisik"][0]->total_mar/$count, 2, '.', ',');
			$data["fisik"][0]->total_apr = number_format($data["fisik"][0]->total_apr/$count, 2, '.', ',');
			$data["fisik"][0]->total_mei = number_format($data["fisik"][0]->total_mei/$count, 2, '.', ',');
			$data["fisik"][0]->total_jun = number_format($data["fisik"][0]->total_jun/$count, 2, '.', ',');
			$data["fisik"][0]->total_jul = number_format($data["fisik"][0]->total_jul/$count, 2, '.', ',');
			$data["fisik"][0]->total_agt = number_format($data["fisik"][0]->total_agt/$count, 2, '.', ',');
			$data["fisik"][0]->total_sep = number_format($data["fisik"][0]->total_sep/$count, 2, '.', ',');
			$data["fisik"][0]->total_okt = number_format($data["fisik"][0]->total_okt/$count, 2, '.', ',');
			$data["fisik"][0]->total_nop = number_format($data["fisik"][0]->total_nop/$count, 2, '.', ',');
			$data["fisik"][0]->total_des = number_format($data["fisik"][0]->total_des/$count, 2, '.', ',');

			echo json_encode($data);
		}
	}

	public function ajaxgetsumrask()
	{
		if($this->input->is_ajax_request()){
			$data["rask"] = $this->beranda->getsumrask();
			echo json_encode($data);
		}
	}

	public function ajaxgetkeuanganopd()
	{
		if($this->input->is_ajax_request()){
			$data["keuangan"][0] = $this->realisasikeuangan->getsumtargetopd()[0];
			$data["keuangan"][1] = $this->realisasikeuangan->getsumrealisasiopd()[0];
			$data["keuangan"][2] = $this->realisasikeuangan->getsumrealisasiopd()[0];

			if(date("n")>=1){
				$data["keuangan"][2]->total_jan = number_format($data["keuangan"][2]->total_jan-$data["keuangan"][0]->total_jan, 2, ',', '');
				$data["keuangan"][1]->total_jan = number_format($data["keuangan"][1]->total_jan, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_jan = null;
				$data["keuangan"][1]->total_jan = null;
			}
			if(date("n")>=2){
				$data["keuangan"][2]->total_feb = number_format($data["keuangan"][2]->total_feb-$data["keuangan"][0]->total_feb, 2, ',', '');
				$data["keuangan"][1]->total_feb = number_format($data["keuangan"][1]->total_feb, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_feb = null;
				$data["keuangan"][1]->total_feb = null;
			}
			if(date("n")>=3){
				$data["keuangan"][2]->total_mar = number_format($data["keuangan"][2]->total_mar-$data["keuangan"][0]->total_mar, 2, ',', '');
				$data["keuangan"][1]->total_mar = number_format($data["keuangan"][1]->total_mar, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_mar = null;
				$data["keuangan"][1]->total_mar = null;
			}
			if(date("n")>=4){
				$data["keuangan"][2]->total_apr = number_format($data["keuangan"][2]->total_apr-$data["keuangan"][0]->total_apr, 2, ',', '');
				$data["keuangan"][1]->total_apr = number_format($data["keuangan"][1]->total_apr, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_apr = null;
				$data["keuangan"][1]->total_apr = null;
			}
			if(date("n")>=5){
				$data["keuangan"][2]->total_mei = number_format($data["keuangan"][2]->total_mei-$data["keuangan"][0]->total_mei, 2, ',', '');
				$data["keuangan"][1]->total_mei = number_format($data["keuangan"][1]->total_mei, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_mei = null;
				$data["keuangan"][1]->total_mei = null;
			}
			if(date("n")>=6){
				$data["keuangan"][2]->total_jun = number_format($data["keuangan"][2]->total_jun-$data["keuangan"][0]->total_jun, 2, ',', '');
				$data["keuangan"][1]->total_jun = number_format($data["keuangan"][1]->total_jun, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_jun = null;
				$data["keuangan"][1]->total_jun = null;
			}
			if(date("n")>=7){
				$data["keuangan"][2]->total_jul = number_format($data["keuangan"][2]->total_jul-$data["keuangan"][0]->total_jul, 2, ',', '');
				$data["keuangan"][1]->total_jul = number_format($data["keuangan"][1]->total_jul, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_jul = null;
				$data["keuangan"][1]->total_jul = null;
			}
			if(date("n")>=8){
				$data["keuangan"][2]->total_agt = number_format($data["keuangan"][2]->total_agt-$data["keuangan"][0]->total_agt, 2, ',', '');
				$data["keuangan"][1]->total_agt = number_format($data["keuangan"][1]->total_agt, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_agt = null;
				$data["keuangan"][1]->total_agt = null;
			}
			if(date("n")>=9){
				$data["keuangan"][2]->total_sep = number_format($data["keuangan"][2]->total_sep-$data["keuangan"][0]->total_sep, 2, ',', '');
				$data["keuangan"][1]->total_sep = number_format($data["keuangan"][1]->total_sep, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_sep = null;
				$data["keuangan"][1]->total_sep = null;
			}
			if(date("n")>=10){
				$data["keuangan"][2]->total_okt = number_format($data["keuangan"][2]->total_okt-$data["keuangan"][0]->total_okt, 2, ',', '');
				$data["keuangan"][1]->total_okt = number_format($data["keuangan"][1]->total_okt, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_okt = null;
				$data["keuangan"][1]->total_okt = null;
			}
			if(date("n")>=11){
				$data["keuangan"][2]->total_nop = number_format($data["keuangan"][2]->total_nop-$data["keuangan"][0]->total_nop, 2, ',', '');
				$data["keuangan"][1]->total_nop = number_format($data["keuangan"][1]->total_nop, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_nop = null;
				$data["keuangan"][1]->total_nop = null;
			}
			if(date("n")>=12){
				$data["keuangan"][2]->total_des = number_format($data["keuangan"][2]->total_des-$data["keuangan"][0]->total_des, 2, ',', '');
				$data["keuangan"][1]->total_des = number_format($data["keuangan"][1]->total_des, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->total_des = null;
				$data["keuangan"][1]->total_des = null;
			}

			$data["keuangan"][0]->total_jan = number_format($data["keuangan"][0]->total_jan, 2, ',', '');
			$data["keuangan"][0]->total_feb = number_format($data["keuangan"][0]->total_feb, 2, ',', '');
			$data["keuangan"][0]->total_mar = number_format($data["keuangan"][0]->total_mar, 2, ',', '');
			$data["keuangan"][0]->total_apr = number_format($data["keuangan"][0]->total_apr, 2, ',', '');
			$data["keuangan"][0]->total_mei = number_format($data["keuangan"][0]->total_mei, 2, ',', '');
			$data["keuangan"][0]->total_jun = number_format($data["keuangan"][0]->total_jun, 2, ',', '');
			$data["keuangan"][0]->total_jul = number_format($data["keuangan"][0]->total_jul, 2, ',', '');
			$data["keuangan"][0]->total_agt = number_format($data["keuangan"][0]->total_agt, 2, ',', '');
			$data["keuangan"][0]->total_sep = number_format($data["keuangan"][0]->total_sep, 2, ',', '');
			$data["keuangan"][0]->total_okt = number_format($data["keuangan"][0]->total_okt, 2, ',', '');
			$data["keuangan"][0]->total_nop = number_format($data["keuangan"][0]->total_nop, 2, ',', '');
			$data["keuangan"][0]->total_des = number_format($data["keuangan"][0]->total_des, 2, ',', '');
			
			echo json_encode($data);
		}
	}

	public function ajaxgetfisikopd()
	{
		if($this->input->is_ajax_request()){
			$data["fisik"][0] = $this->realisasifisik->getsumtargetopd()[0];
			$data["fisik"][1] = $this->realisasifisik->getsumrealisasiopd()[0];
			$data["fisik"][2] = $this->realisasifisik->getsumrealisasiopd()[0];
			$data['kegiatan'] = $this->rask->getcountkegiatanopd();
			$count = sizeof($data['kegiatan']);
			
			if(date("n")>=1){
				$data["fisik"][2]->total_jan = number_format(($data["fisik"][2]->total_jan/$count)-($data["fisik"][0]->total_jan/$count), 2, '.', ',');
				$data["fisik"][1]->total_jan = number_format($data["fisik"][1]->total_jan/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_jan = null;
				$data["fisik"][1]->total_jan = null;
			}
			if(date("n")>=2){
				$data["fisik"][2]->total_feb = number_format(($data["fisik"][2]->total_feb/$count)-($data["fisik"][0]->total_feb/$count), 2, '.', ',');
				$data["fisik"][1]->total_feb = number_format($data["fisik"][1]->total_feb/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_feb = null;
				$data["fisik"][1]->total_feb = null;
			}
			if(date("n")>=3){
				$data["fisik"][2]->total_mar = number_format(($data["fisik"][2]->total_mar/$count)-($data["fisik"][0]->total_mar/$count), 2, '.', ',');
				$data["fisik"][1]->total_mar = number_format($data["fisik"][1]->total_mar/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_mar = null;
				$data["fisik"][1]->total_mar = null;
			}
			if(date("n")>=4){
				$data["fisik"][2]->total_apr = number_format(($data["fisik"][2]->total_apr/$count)-($data["fisik"][0]->total_apr/$count), 2, '.', ',');
				$data["fisik"][1]->total_apr = number_format($data["fisik"][1]->total_apr/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_apr = null;
				$data["fisik"][1]->total_apr = null;
			}
			if(date("n")>=5){
				$data["fisik"][2]->total_mei = number_format(($data["fisik"][2]->total_mei/$count)-($data["fisik"][0]->total_mei/$count), 2, '.', ',');
				$data["fisik"][1]->total_mei = number_format($data["fisik"][1]->total_mei/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_mei = null;
				$data["fisik"][1]->total_mei = null;
			}
			if(date("n")>=6){
				$data["fisik"][2]->total_jun = number_format(($data["fisik"][2]->total_jun/$count)-($data["fisik"][0]->total_jun/$count), 2, '.', ',');
				$data["fisik"][1]->total_jun = number_format($data["fisik"][1]->total_jun/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_jun = null;
				$data["fisik"][1]->total_jun = null;
			}
			if(date("n")>=7){
				$data["fisik"][2]->total_jul = number_format(($data["fisik"][2]->total_jul/$count)-($data["fisik"][0]->total_jul/$count), 2, '.', ',');
				$data["fisik"][1]->total_jul = number_format($data["fisik"][1]->total_jul/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_jul = null;
				$data["fisik"][1]->total_jul = null;
			}
			if(date("n")>=8){
				$data["fisik"][2]->total_agt = number_format(($data["fisik"][2]->total_agt/$count)-($data["fisik"][0]->total_agt/$count), 2, '.', ',');
				$data["fisik"][1]->total_agt = number_format($data["fisik"][1]->total_agt/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_agt = null;
				$data["fisik"][1]->total_agt = null;
			}
			if(date("n")>=9){
				$data["fisik"][2]->total_sep = number_format(($data["fisik"][2]->total_sep/$count)-($data["fisik"][0]->total_sep/$count), 2, '.', ',');
				$data["fisik"][1]->total_sep = number_format($data["fisik"][1]->total_sep/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_sep = null;
				$data["fisik"][1]->total_sep = null;
			}
			if(date("n")>=10){
				$data["fisik"][2]->total_okt = number_format(($data["fisik"][2]->total_okt/$count)-($data["fisik"][0]->total_okt/$count), 2, '.', ',');
				$data["fisik"][1]->total_okt = number_format($data["fisik"][1]->total_okt/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_okt = null;
				$data["fisik"][1]->total_okt = null;
			}
			if(date("n")>=11){
				$data["fisik"][2]->total_nop = number_format(($data["fisik"][2]->total_nop/$count)-($data["fisik"][0]->total_nop/$count), 2, '.', ',');
				$data["fisik"][1]->total_nop = number_format($data["fisik"][1]->total_nop/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_nop = null;
				$data["fisik"][1]->total_nop = null;
			}
			if(date("n")>=12){
				$data["fisik"][2]->total_des = number_format(($data["fisik"][2]->total_des/$count)-($data["fisik"][0]->total_des/$count), 2, '.', ',');
				$data["fisik"][1]->total_des = number_format($data["fisik"][1]->total_des/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->total_des = null;
				$data["fisik"][1]->total_des = null;
			}

			$data["fisik"][0]->total_jan = number_format($data["fisik"][0]->total_jan/$count, 2, '.', ',');
			$data["fisik"][0]->total_feb = number_format($data["fisik"][0]->total_feb/$count, 2, '.', ',');
			$data["fisik"][0]->total_mar = number_format($data["fisik"][0]->total_mar/$count, 2, '.', ',');
			$data["fisik"][0]->total_apr = number_format($data["fisik"][0]->total_apr/$count, 2, '.', ',');
			$data["fisik"][0]->total_mei = number_format($data["fisik"][0]->total_mei/$count, 2, '.', ',');
			$data["fisik"][0]->total_jun = number_format($data["fisik"][0]->total_jun/$count, 2, '.', ',');
			$data["fisik"][0]->total_jul = number_format($data["fisik"][0]->total_jul/$count, 2, '.', ',');
			$data["fisik"][0]->total_agt = number_format($data["fisik"][0]->total_agt/$count, 2, '.', ',');
			$data["fisik"][0]->total_sep = number_format($data["fisik"][0]->total_sep/$count, 2, '.', ',');
			$data["fisik"][0]->total_okt = number_format($data["fisik"][0]->total_okt/$count, 2, '.', ',');
			$data["fisik"][0]->total_nop = number_format($data["fisik"][0]->total_nop/$count, 2, '.', ',');
			$data["fisik"][0]->total_des = number_format($data["fisik"][0]->total_des/$count, 2, '.', ',');

			echo json_encode($data);
		}
	}

	public function ajaxgetkeuangantriwulan()
	{
		if($this->input->is_ajax_request()){
			$data["keuangan"][0] = $this->realisasikeuangan->getsumtargettriwulan()[0];
			$data["keuangan"][1] = $this->realisasikeuangan->getsumrealisasitriwulan()[0];
			$data["keuangan"][2] = $this->realisasikeuangan->getsumrealisasitriwulan()[0];

			if(date("n")>=1){
				$data["keuangan"][2]->triwulan_1 = number_format($data["keuangan"][2]->triwulan_1-$data["keuangan"][0]->triwulan_1, 2, ',', '');
				$data["keuangan"][1]->triwulan_1 = number_format($data["keuangan"][1]->triwulan_1, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->triwulan_1 = null;
				$data["keuangan"][1]->triwulan_1 = null;
			}
			if(date("n")>=4){
				$data["keuangan"][2]->triwulan_2 = number_format($data["keuangan"][2]->triwulan_2-$data["keuangan"][0]->triwulan_2, 2, ',', '');
				$data["keuangan"][1]->triwulan_2 = number_format($data["keuangan"][1]->triwulan_2, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->triwulan_2 = null;
				$data["keuangan"][1]->triwulan_2 = null;
			}
			if(date("n")>=7){
				$data["keuangan"][2]->triwulan_3 = number_format($data["keuangan"][2]->triwulan_3-$data["keuangan"][0]->triwulan_3, 2, ',', '');
				$data["keuangan"][1]->triwulan_3 = number_format($data["keuangan"][1]->triwulan_3, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->triwulan_3 = null;
				$data["keuangan"][1]->triwulan_3 = null;
			}
			if(date("n")>=10){
				$data["keuangan"][2]->triwulan_4 = number_format($data["keuangan"][2]->triwulan_4-$data["keuangan"][0]->triwulan_4, 2, ',', '');
				$data["keuangan"][1]->triwulan_4 = number_format($data["keuangan"][1]->triwulan_4, 2, ',', '');
			}
			else{
				$data["keuangan"][2]->triwulan_4 = null;
				$data["keuangan"][1]->triwulan_4 = null;
			}

			$data["keuangan"][0]->triwulan_1 = number_format($data["keuangan"][0]->triwulan_1, 2, ',', '');
			$data["keuangan"][0]->triwulan_2 = number_format($data["keuangan"][0]->triwulan_2, 2, ',', '');
			$data["keuangan"][0]->triwulan_3 = number_format($data["keuangan"][0]->triwulan_3, 2, ',', '');
			$data["keuangan"][0]->triwulan_4 = number_format($data["keuangan"][0]->triwulan_4, 2, ',', '');

			echo json_encode($data);
		}
	}

	public function ajaxgetfisiktriwulan()
	{
		if($this->input->is_ajax_request()){
			$data["fisik"][0] = $this->realisasifisik->gettargettriwulan()[0];
			$data["fisik"][1] = $this->realisasifisik->getrealisasitriwulan()[0];
			$data["fisik"][2] = $this->realisasifisik->getrealisasitriwulan()[0];
			$data['kegiatan'] = $this->rask->getcountkegiatanopd();
			$count = sizeof($data['kegiatan']);

			if(date("n")>=1){
				$data["fisik"][2]->triwulan_1 = number_format(($data["fisik"][2]->triwulan_1/$count)-($data["fisik"][0]->triwulan_1/$count), 2, '.', ',');
				$data["fisik"][1]->triwulan_1 = number_format($data["fisik"][1]->triwulan_1/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->triwulan_1 = null;
				$data["fisik"][1]->triwulan_1 = null;
			}
			if(date("n")>=4){
				$data["fisik"][2]->triwulan_2 = number_format(($data["fisik"][2]->triwulan_2/$count)-($data["fisik"][0]->triwulan_2/$count), 2, '.', ',');
				$data["fisik"][1]->triwulan_2 = number_format($data["fisik"][1]->triwulan_2/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->triwulan_2 = null;
				$data["fisik"][1]->triwulan_2 = null;
			}
			if(date("n")>=7){
				$data["fisik"][2]->triwulan_3 = number_format(($data["fisik"][2]->triwulan_3/$count)-($data["fisik"][0]->triwulan_3/$count), 2, '.', ',');
				$data["fisik"][1]->triwulan_3 = number_format($data["fisik"][1]->triwulan_3/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->triwulan_3 = null;
				$data["fisik"][1]->triwulan_3 = null;
			}
			if(date("n")>=10){
				$data["fisik"][2]->triwulan_4 = number_format(($data["fisik"][2]->triwulan_4/$count)-($data["fisik"][0]->triwulan_4/$count), 2, '.', ',');
				$data["fisik"][1]->triwulan_4 = number_format($data["fisik"][1]->triwulan_4/$count, 2, '.', ',');
			}
			else{
				$data["fisik"][2]->triwulan_4 = null;
				$data["fisik"][1]->triwulan_4 = null;
			}

			$data["fisik"][0]->triwulan_1 = number_format($data["fisik"][0]->triwulan_1/$count, 2, '.', ',');
			$data["fisik"][0]->triwulan_2 = number_format($data["fisik"][0]->triwulan_2/$count, 2, '.', ',');
			$data["fisik"][0]->triwulan_3 = number_format($data["fisik"][0]->triwulan_3/$count, 2, '.', ',');
			$data["fisik"][0]->triwulan_4 = number_format($data["fisik"][0]->triwulan_4/$count, 2, '.', ',');
			
			echo json_encode($data);
		}

	}
}