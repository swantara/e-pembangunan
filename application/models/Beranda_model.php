<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getkegiatanbyopd()
	{
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}

		$query = $this->db->query("select tra.*, 
			sum(case when tra.kd_perubahan = 4 then tra.total else 0 end) as total_induk,
			sum(case when tra.kd_perubahan = 6 then tra.total else 0 end) as total_perubahan
		from ta_rask_arsip as tra 
		where tra.tahun = '$tahun'
			and tra.kd_rek_1 = 5
			and tra.kd_rek_2 = 2
			and concat(tra.kd_urusan, tra.kd_bidang, tra.kd_unit) <> '411' 
			and concat(tra.kd_urusan, tra.kd_bidang, tra.kd_unit) <> '412'
		group by tra.kd_urusan, 
			tra.kd_bidang, 
			tra.kd_unit, 
			tra.kd_sub");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getsumrask()
	{
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}

		$query = $this->db->query("select tra.*, 
			sum(case when tra.kd_perubahan = 4 then tra.total else 0 end)/1000000000 as total_induk,
			sum(case when tra.kd_perubahan = 6 then tra.total else 0 end)/1000000000 as total_perubahan,
            msu.nm_sub_unit
		from ta_rask_arsip as tra 
		inner join ref_sub_unit msu on msu.kd_urusan = tra.kd_urusan and msu.kd_bidang = tra.kd_bidang and msu.kd_unit = tra.kd_unit and msu.kd_sub = tra.kd_sub
		where tra.tahun = '$tahun'
			and tra.kd_rek_1 = 5
			and tra.kd_rek_2 = 2
			and concat(tra.kd_urusan, tra.kd_bidang, tra.kd_unit) <> '411' 
			and concat(tra.kd_urusan, tra.kd_bidang, tra.kd_unit) <> '412'
		group by tra.kd_urusan, 
			tra.kd_bidang, 
			tra.kd_unit, 
			tra.kd_sub");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function gettargetall()
	{
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}

		$dbPmb = $this->load->database('pmb', TRUE);
        // $dbPmb->query
		$query = $dbPmb->query("select ra.*,
				sum(jan) as total_jan,
				sum(feb) as total_feb,
				sum(mar) as total_mar,
				sum(apr) as total_apr,
				sum(mei) as total_mei,
				sum(jun) as total_jun,
				sum(jul) as total_jul,
				sum(agt) as total_agt,
				sum(sep) as total_sep,
				sum(okt) as total_okt,
				sum(nop) as total_nop,
				sum(des) as total_des
			from ta_rencana_arsip ra
			where ra.tahun = '$tahun'
			and ra.kd_rek_1 = 5
			and ra.kd_rek_2 = 2");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getrealisasikeuanganall()
	{
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}

		$dbPmb = $this->load->database('pmb', TRUE);
        // $dbPmb->query
		$query = $dbPmb->query("select sp.*,
				sum(case when month(c.tgl_cair) = 1 then c.nilai else 0 end) as total_jan,
				sum(case when month(c.tgl_cair) = 2 then c.nilai else 0 end) as total_feb,
				sum(case when month(c.tgl_cair) = 3 then c.nilai else 0 end) as total_mar,
				sum(case when month(c.tgl_cair) = 4 then c.nilai else 0 end) as total_apr,
				sum(case when month(c.tgl_cair) = 5 then c.nilai else 0 end) as total_mei,
				sum(case when month(c.tgl_cair) = 6 then c.nilai else 0 end) as total_jun,
				sum(case when month(c.tgl_cair) = 7 then c.nilai else 0 end) as total_jul,
				sum(case when month(c.tgl_cair) = 8 then c.nilai else 0 end) as total_agt,
				sum(case when month(c.tgl_cair) = 9 then c.nilai else 0 end) as total_sep,
				sum(case when month(c.tgl_cair) = 10 then c.nilai else 0 end) as total_okt,
				sum(case when month(c.tgl_cair) = 11 then c.nilai else 0 end) as total_nop,
				sum(case when month(c.tgl_cair) = 12 then c.nilai else 0 end) as total_des
			from ta_sp2d sp
			inner join ta_cheque c on sp.no_sp2d = c.no_sp2d
		    inner join ta_spm_rinc spm on sp.no_spm = spm.no_spm
			where spm.tahun = '$tahun'
			and spm.kd_rek_1 = 5
			and spm.kd_rek_2 = 2");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getnamaopd()
	{
		$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_unit = $this -> input -> get('kd_unit');
	  	$kd_sub = $this -> input -> get('kd_sub');

		$query = $this->db->query("select msu.*
		from ref_sub_unit msu
		where kd_urusan = '$kd_urusan'
			and kd_bidang = '$kd_bidang'
			and kd_unit = '$kd_unit'
			and kd_sub = '$kd_sub'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
}