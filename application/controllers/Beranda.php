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

	public function index()
	{
		$data['nama_opd'] = $this->backend->getnamaopd();
		$data['nama_kegiatan'] = $this->rask->getnamakegiatanall();
		$data['targetkeuangan'] = $this->realisasikeuangan->gettargetall()[0];
		$data['realisasikeuangan'] = $this->realisasikeuangan->getrealisasiall()[0];
		$data['targetfisik'] = $this->realisasifisik->gettargetall()[0];
		$data['realisasifisik'] = $this->realisasifisik->getrealisasiall()[0];
		$data['kegiatan'] = $this->beranda->getkegiatanbyopd();
		$data['body'] = $this->load->view('fe/beranda', $data, true);
		$this->load->view('fe/template', $data);
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
		$data['body'] = $this->load->view('fe/summary_opd', $data, true);
		$this->load->view('fe/template', $data);
	}

	public function ajaxgetkeuanganall()
	{
		if($this->input->is_ajax_request()){
			$data["keuangan"][0] = $this->realisasikeuangan->getsumtargetall()[0];
			$data["keuangan"][1] = $this->realisasikeuangan->getsumrealisasiall()[0];
			$data["keuangan"][2] = $this->realisasikeuangan->getsumrealisasiall()[0];
			$data["keuangan"][2]->total_jan = $data["keuangan"][2]->total_jan-$data["keuangan"][0]->total_jan;
			$data["keuangan"][2]->total_feb = $data["keuangan"][2]->total_feb-$data["keuangan"][0]->total_feb;
			$data["keuangan"][2]->total_mar = $data["keuangan"][2]->total_mar-$data["keuangan"][0]->total_mar;
			$data["keuangan"][2]->total_apr = $data["keuangan"][2]->total_apr-$data["keuangan"][0]->total_apr;
			$data["keuangan"][2]->total_mei = $data["keuangan"][2]->total_mei-$data["keuangan"][0]->total_mei;
			$data["keuangan"][2]->total_jun = $data["keuangan"][2]->total_jun-$data["keuangan"][0]->total_jun;
			$data["keuangan"][2]->total_jul = $data["keuangan"][2]->total_jul-$data["keuangan"][0]->total_jul;
			$data["keuangan"][2]->total_agt = $data["keuangan"][2]->total_agt-$data["keuangan"][0]->total_agt;
			$data["keuangan"][2]->total_sep = $data["keuangan"][2]->total_sep-$data["keuangan"][0]->total_sep;
			$data["keuangan"][2]->total_okt = $data["keuangan"][2]->total_okt-$data["keuangan"][0]->total_okt;
			$data["keuangan"][2]->total_nop = $data["keuangan"][2]->total_nop-$data["keuangan"][0]->total_nop;
			$data["keuangan"][2]->total_des = $data["keuangan"][2]->total_des-$data["keuangan"][0]->total_des;
			echo json_encode($data);
		}
	}

	public function ajaxgetfisikall()
	{
		if($this->input->is_ajax_request()){
			$data["fisik"][0] = $this->realisasifisik->gettargetall()[0];
			$data["fisik"][1] = $this->realisasifisik->getrealisasiall()[0];
			$data["fisik"][2] = $this->realisasifisik->getrealisasiall()[0];
			$data["fisik"][2]->total_jan = $data["fisik"][2]->total_jan-$data["fisik"][0]->total_jan;
			$data["fisik"][2]->total_feb = $data["fisik"][2]->total_feb-$data["fisik"][0]->total_feb;
			$data["fisik"][2]->total_mar = $data["fisik"][2]->total_mar-$data["fisik"][0]->total_mar;
			$data["fisik"][2]->total_apr = $data["fisik"][2]->total_apr-$data["fisik"][0]->total_apr;
			$data["fisik"][2]->total_mei = $data["fisik"][2]->total_mei-$data["fisik"][0]->total_mei;
			$data["fisik"][2]->total_jun = $data["fisik"][2]->total_jun-$data["fisik"][0]->total_jun;
			$data["fisik"][2]->total_jul = $data["fisik"][2]->total_jul-$data["fisik"][0]->total_jul;
			$data["fisik"][2]->total_agt = $data["fisik"][2]->total_agt-$data["fisik"][0]->total_agt;
			$data["fisik"][2]->total_sep = $data["fisik"][2]->total_sep-$data["fisik"][0]->total_sep;
			$data["fisik"][2]->total_okt = $data["fisik"][2]->total_okt-$data["fisik"][0]->total_okt;
			$data["fisik"][2]->total_nop = $data["fisik"][2]->total_nop-$data["fisik"][0]->total_nop;
			$data["fisik"][2]->total_des = $data["fisik"][2]->total_des-$data["fisik"][0]->total_des;
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
			$data["keuangan"][2]->total_jan = $data["keuangan"][2]->total_jan-$data["keuangan"][0]->total_jan;
			$data["keuangan"][2]->total_feb = $data["keuangan"][2]->total_feb-$data["keuangan"][0]->total_feb;
			$data["keuangan"][2]->total_mar = $data["keuangan"][2]->total_mar-$data["keuangan"][0]->total_mar;
			$data["keuangan"][2]->total_apr = $data["keuangan"][2]->total_apr-$data["keuangan"][0]->total_apr;
			$data["keuangan"][2]->total_mei = $data["keuangan"][2]->total_mei-$data["keuangan"][0]->total_mei;
			$data["keuangan"][2]->total_jun = $data["keuangan"][2]->total_jun-$data["keuangan"][0]->total_jun;
			$data["keuangan"][2]->total_jul = $data["keuangan"][2]->total_jul-$data["keuangan"][0]->total_jul;
			$data["keuangan"][2]->total_agt = $data["keuangan"][2]->total_agt-$data["keuangan"][0]->total_agt;
			$data["keuangan"][2]->total_sep = $data["keuangan"][2]->total_sep-$data["keuangan"][0]->total_sep;
			$data["keuangan"][2]->total_okt = $data["keuangan"][2]->total_okt-$data["keuangan"][0]->total_okt;
			$data["keuangan"][2]->total_nop = $data["keuangan"][2]->total_nop-$data["keuangan"][0]->total_nop;
			$data["keuangan"][2]->total_des = $data["keuangan"][2]->total_des-$data["keuangan"][0]->total_des;
			echo json_encode($data);
		}
	}

	public function ajaxgetfisikopd()
	{
		if($this->input->is_ajax_request()){
			$data["fisik"][0] = $this->realisasifisik->gettargetopd()[0];
			$data["fisik"][1] = $this->realisasifisik->getrealisasiopd()[0];
			$data["fisik"][2] = $this->realisasifisik->getrealisasiopd()[0];
			$data["fisik"][2]->total_jan = $data["fisik"][2]->total_jan-$data["fisik"][0]->total_jan;
			$data["fisik"][2]->total_feb = $data["fisik"][2]->total_feb-$data["fisik"][0]->total_feb;
			$data["fisik"][2]->total_mar = $data["fisik"][2]->total_mar-$data["fisik"][0]->total_mar;
			$data["fisik"][2]->total_apr = $data["fisik"][2]->total_apr-$data["fisik"][0]->total_apr;
			$data["fisik"][2]->total_mei = $data["fisik"][2]->total_mei-$data["fisik"][0]->total_mei;
			$data["fisik"][2]->total_jun = $data["fisik"][2]->total_jun-$data["fisik"][0]->total_jun;
			$data["fisik"][2]->total_jul = $data["fisik"][2]->total_jul-$data["fisik"][0]->total_jul;
			$data["fisik"][2]->total_agt = $data["fisik"][2]->total_agt-$data["fisik"][0]->total_agt;
			$data["fisik"][2]->total_sep = $data["fisik"][2]->total_sep-$data["fisik"][0]->total_sep;
			$data["fisik"][2]->total_okt = $data["fisik"][2]->total_okt-$data["fisik"][0]->total_okt;
			$data["fisik"][2]->total_nop = $data["fisik"][2]->total_nop-$data["fisik"][0]->total_nop;
			$data["fisik"][2]->total_des = $data["fisik"][2]->total_des-$data["fisik"][0]->total_des;
			echo json_encode($data);
		}
	}

	public function ajaxgetkeuangantriwulan()
	{
		if($this->input->is_ajax_request()){
			$data["keuangan"][0] = $this->realisasikeuangan->getsumtargettriwulan()[0];
			$data["keuangan"][1] = $this->realisasikeuangan->getsumrealisasitriwulan()[0];
			$data["keuangan"][2] = $this->realisasikeuangan->getsumrealisasitriwulan()[0];
			$data["keuangan"][2]->triwulan_1 = $data["keuangan"][2]->triwulan_1-$data["keuangan"][0]->triwulan_1;
			$data["keuangan"][2]->triwulan_2 = $data["keuangan"][2]->triwulan_2-$data["keuangan"][0]->triwulan_2;
			$data["keuangan"][2]->triwulan_3 = $data["keuangan"][2]->triwulan_3-$data["keuangan"][0]->triwulan_3;
			$data["keuangan"][2]->triwulan_4 = $data["keuangan"][2]->triwulan_4-$data["keuangan"][0]->triwulan_4;
			echo json_encode($data);
		}
	}

	public function ajaxgetfisiktriwulan()
	{
		if($this->input->is_ajax_request()){
			$data["fisik"][0] = $this->realisasifisik->gettargettriwulan()[0];
			$data["fisik"][1] = $this->realisasifisik->getrealisasitriwulan()[0];
			$data["fisik"][2] = $this->realisasifisik->getrealisasitriwulan()[0];
			$data["fisik"][2]->triwulan_1 = $data["fisik"][2]->triwulan_1-$data["fisik"][0]->triwulan_1;
			$data["fisik"][2]->triwulan_2 = $data["fisik"][2]->triwulan_2-$data["fisik"][0]->triwulan_2;
			$data["fisik"][2]->triwulan_3 = $data["fisik"][2]->triwulan_3-$data["fisik"][0]->triwulan_3;
			$data["fisik"][2]->triwulan_4 = $data["fisik"][2]->triwulan_4-$data["fisik"][0]->triwulan_4;
			echo json_encode($data);
		}
	}










	public function ajaxgetrealisasikeuanganall()
	{
		if($this->input->is_ajax_request()){
			echo json_encode($this->realisasikeuangan->getrealisasiall()[0]);
		}
	}

	public function ajaxgettargetfisikall()
	{
		if($this->input->is_ajax_request()){
			echo json_encode($this->realisasifisik->gettargetall()[0]);
		}
	}

	public function ajaxgetrealisasifisikall()
	{
		if($this->input->is_ajax_request()){
			echo json_encode($this->realisasifisik->getrealisasiall()[0]);
		}
	}

	public function ajaxgettargetkeuanganopd()
	{
		// if($this->input->is_ajax_request()){
			echo json_encode($this->realisasikeuangan->gettargetopd()[0]);
		// }
	}

	public function ajaxgetrealisasikeuanganopd()
	{
		if($this->input->is_ajax_request()){
			echo json_encode($this->realisasikeuangan->getrealisasiopd()[0]);
		}
	}

	public function ajaxgettargetfisikopd()
	{
		if($this->input->is_ajax_request()){
			echo json_encode($this->realisasifisik->gettargetopd()[0]);
		}
	}

	public function ajaxgetrealisasifisikopd()
	{
		if($this->input->is_ajax_request()){
			echo json_encode($this->realisasifisik->getrealisasiopd()[0]);
		}
	}

	public function ajaxgettargetkeuangantriwulan()
	{
		if($this->input->is_ajax_request()){
			echo json_encode($this->realisasikeuangan->gettargettriwulan()[0]);
		}
	}

	public function ajaxgetrealisasikeuangantriwulan()
	{
		if($this->input->is_ajax_request()){
			echo json_encode($this->realisasikeuangan->getrealisasitriwulan()[0]);
		}
	}

	public function ajaxgettargetfisiktriwulan()
	{
		if($this->input->is_ajax_request()){
			echo json_encode($this->realisasifisik->gettargettriwulan()[0]);
		}
	}

	public function ajaxgetrealisasifisiktriwulan()
	{
		if($this->input->is_ajax_request()){
			echo json_encode($this->realisasifisik->getrealisasitriwulan()[0]);
		}
	}
}