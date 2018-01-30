<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rask_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getsumanggaraninduk(){
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}

		$query = $this->db->query("select sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 then tra.total else 0 end) / 1000000000 as total,
			sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 1 then tra.total else 0 end) / 1000000000 as b_taklangsung,
	        sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 1 and tra.kd_rek_3 = 1 then tra.total else 0 end) / 1000000000 as taklangsung_pegawai,
	        sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 1 and tra.kd_rek_3 <> 1 then tra.total else 0 end) / 1000000000 as taklangsung_non,
			sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 then tra.total else 0 end) / 1000000000 as b_langsung,
			sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tra.kd_rek_3 = 1 then tra.total else 0 end) / 1000000000 as langsung_pegawai,
			sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tra.kd_rek_3 <> 1 then tra.total else 0 end) / 1000000000 as langsung_non,
			sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tra.kd_rek_3 = 2 then tra.total else 0 end) / 1000000000 as barangjasa,
			sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tra.kd_rek_3 = 3 then tra.total else 0 end) / 1000000000 as modal
		from t_rask_arsip tra
	    where tra.tahun = '$tahun'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getsumanggaranperubahan(){
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}

		$query = $this->db->query("select sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 then tra.total else 0 end) / 1000000000 as total,
			sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 1 then tra.total else 0 end) / 1000000000 as b_taklangsung,
	        sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 1 and tra.kd_rek_3 = 1 then tra.total else 0 end) / 1000000000 as taklangsung_pegawai,
	        sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 1 and tra.kd_rek_3 <> 1 then tra.total else 0 end) / 1000000000 as taklangsung_non,
			sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 then tra.total else 0 end) / 1000000000 as b_langsung,
			sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tra.kd_rek_3 = 1 then tra.total else 0 end) / 1000000000 as langsung_pegawai,
			sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tra.kd_rek_3 <> 1 then tra.total else 0 end) / 1000000000 as langsung_non,
			sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tra.kd_rek_3 = 2 then tra.total else 0 end) / 1000000000 as barangjasa,
			sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tra.kd_rek_3 = 3 then tra.total else 0 end) / 1000000000 as modal
		from t_rask_arsip tra
	    where tra.tahun = '$tahun'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getkegiatan()
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
		from t_rask_arsip as tra 
		where tra.tahun = '$tahun'
		group by tra.kd_urusan,
			tra.kd_bidang, 
			tra.kd_unit, 
			tra.kd_sub, 
			tra.kd_prog, 
			tra.kd_keg");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getnamakegiatanall()
	{
		$query = $this->db->query("select tk.*, tk.ket_kegiatan as nama
		from t_kegiatan tk");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getnamakegiatan()
	{
	  	$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_prog = $this -> input -> get('kd_prog');
	  	$kd_keg = $this -> input -> get('kd_keg');

		$query = $this->db->query("select tk.*, tk.ket_kegiatan as nama
		from t_kegiatan tk
		where tk.kd_urusan = '$kd_urusan'
			and tk.kd_bidang = '$kd_bidang'
			and tk.kd_prog = '$kd_prog'
			and tk.kd_keg = '$kd_keg'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getopdlist()
	{
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}

	  	$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_unit = $this -> input -> get('kd_unit');
	  	$kd_sub = $this -> input -> get('kd_sub');
	  	$kd_prog = $this -> input -> get('kd_prog');
	  	$kd_keg = $this -> input -> get('kd_keg');

		$query = $this->db->query("select tra.*,
			sum(case when tra.kd_perubahan = 4 then tra.total else 0 end) as total_induk,
			sum(case when tra.kd_perubahan = 6 then tra.total else 0 end) as total_perubahan 
		from t_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_prog <> 0
			and tra.kd_keg <> 0
		group by tra.kd_urusan, 
			tra.kd_bidang, 
			tra.kd_unit, 
			tra.kd_sub, 
			tra.kd_prog, 
			tra.kd_keg");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
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

	  	$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_unit = $this -> input -> get('kd_unit');
	  	$kd_sub = $this -> input -> get('kd_sub');
	  	$kd_prog = $this -> input -> get('kd_prog');
	  	$kd_keg = $this -> input -> get('kd_keg');

		$query = $this->db->query("select tra.*,
			sum(case when tra.kd_perubahan = 4 then tra.total else 0 end) as total_induk,
			sum(case when tra.kd_perubahan = 6 then tra.total else 0 end) as total_perubahan 
		from t_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_prog = '$kd_prog'
			and tra.kd_keg = '$kd_keg'
		group by tra.kd_urusan, 
			tra.kd_bidang, 
			tra.kd_unit, 
			tra.kd_sub, 
			tra.kd_prog, 
			tra.kd_keg,
			tra.kd_rek_1, 
			tra.kd_rek_2,
			tra.kd_rek_3, 
			tra.kd_rek_4,
            tra.kd_rek_5,
            tra.no_rinc,
            tra.no_id");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getketeranganrask()
	{
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}

	  	$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_unit = $this -> input -> get('kd_unit');
	  	$kd_sub = $this -> input -> get('kd_sub');
	  	$kd_prog = $this -> input -> get('kd_prog');
	  	$kd_keg = $this -> input -> get('kd_keg');

		$query = $this->db->query("select tra.*
		from t_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_prog = '$kd_prog'
			and tra.kd_keg = '$kd_keg'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getanggaraninduk()
	{
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}

	  	$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_unit = $this -> input -> get('kd_unit');
	  	$kd_sub = $this -> input -> get('kd_sub');
	  	$kd_prog = $this -> input -> get('kd_prog');
	  	$kd_keg = $this -> input -> get('kd_keg');

		$query = $this->db->query("select tra.*
		from t_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_prog = '$kd_prog'
			and tra.kd_keg = '$kd_keg'
			and tra.kd_perubahan = '4'
		group by tra.kd_urusan, 
			tra.kd_bidang, 
			tra.kd_unit, 
			tra.kd_sub, 
			tra.kd_prog, 
			tra.kd_keg,
			tra.kd_rek_1, 
			tra.kd_rek_2,
			tra.kd_rek_3, 
			tra.kd_rek_4,
            tra.kd_rek_5,
            tra.no_rinc,
            tra.no_id");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getanggaranperubahan()
	{
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}

	  	$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_unit = $this -> input -> get('kd_unit');
	  	$kd_sub = $this -> input -> get('kd_sub');
	  	$kd_prog = $this -> input -> get('kd_prog');
	  	$kd_keg = $this -> input -> get('kd_keg');

		$query = $this->db->query("select tra.*
		from t_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_prog = '$kd_prog'
			and tra.kd_keg = '$kd_keg'
			and tra.kd_perubahan = '6'
		group by tra.kd_urusan, 
			tra.kd_bidang, 
			tra.kd_unit, 
			tra.kd_sub, 
			tra.kd_prog, 
			tra.kd_keg,
			tra.kd_rek_1, 
			tra.kd_rek_2,
			tra.kd_rek_3, 
			tra.kd_rek_4,
            tra.kd_rek_5,
            tra.no_rinc,
            tra.no_id");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getcountinduk()
	{
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}

	  	$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_unit = $this -> input -> get('kd_unit');
	  	$kd_sub = $this -> input -> get('kd_sub');

		$query = $this->db->query("select tra.*
		from t_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_prog = '$kd_prog'
			and tra.kd_keg = '$kd_keg'
			and tra.kd_perubahan = '4'
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

	public function getrincianinduk()
	{
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}

	  	$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_unit = $this -> input -> get('kd_unit');
	  	$kd_sub = $this -> input -> get('kd_sub');
	  	$kd_prog = $this -> input -> get('kd_prog');
	  	$kd_keg = $this -> input -> get('kd_keg');
	  	$kd_rek_1 = $this -> input -> get('kd_rek_1');
	  	$kd_rek_2 = $this -> input -> get('kd_rek_2');
	  	$kd_rek_3 = $this -> input -> get('kd_rek_3');
	  	$kd_rek_4 = $this -> input -> get('kd_rek_4');
	  	$kd_rek_5 = $this -> input -> get('kd_rek_5');
	  	$no_rinc = $this -> input -> get('no_rinc');
	  	$no_id = $this -> input -> get('no_id');

		$query = $this->db->query("select tra.*
		from t_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_prog = '$kd_prog'
			and tra.kd_keg = '$kd_keg'
			and tra.kd_rek_1 = '$kd_rek_1'
			and tra.kd_rek_2 = '$kd_rek_2'
			and tra.kd_rek_3 = '$kd_rek_3'
			and tra.kd_rek_4 = '$kd_rek_4'
			and tra.kd_rek_5 = '$kd_rek_5'
			and tra.no_rinc = '$no_rinc'
			and tra.no_id = '$no_id'
			and tra.kd_perubahan = '4'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getrincianperubahan()
	{
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}
		
	  	$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_unit = $this -> input -> get('kd_unit');
	  	$kd_sub = $this -> input -> get('kd_sub');
	  	$kd_prog = $this -> input -> get('kd_prog');
	  	$kd_keg = $this -> input -> get('kd_keg');
	  	$kd_rek_1 = $this -> input -> get('kd_rek_1');
	  	$kd_rek_2 = $this -> input -> get('kd_rek_2');
	  	$kd_rek_3 = $this -> input -> get('kd_rek_3');
	  	$kd_rek_4 = $this -> input -> get('kd_rek_4');
	  	$kd_rek_5 = $this -> input -> get('kd_rek_5');
	  	$no_rinc = $this -> input -> get('no_rinc');
	  	$no_id = $this -> input -> get('no_id');

		$query = $this->db->query("select tra.*
		from t_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_prog = '$kd_prog'
			and tra.kd_keg = '$kd_keg'
			and tra.kd_rek_1 = '$kd_rek_1'
			and tra.kd_rek_2 = '$kd_rek_2'
			and tra.kd_rek_3 = '$kd_rek_3'
			and tra.kd_rek_4 = '$kd_rek_4'
			and tra.kd_rek_5 = '$kd_rek_5'
			and tra.no_rinc = '$no_rinc'
			and tra.no_id = '$no_id'
			and tra.kd_perubahan = '6'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getopd()
	{
	  	$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_unit = $this -> input -> get('kd_unit');
	  	$kd_sub = $this -> input -> get('kd_sub');

		$query = $this->db->query("select msu.*
		from m_sub_unit msu
		where msu.kd_urusan = '$kd_urusan'
			and msu.kd_bidang = '$kd_bidang'
			and msu.kd_unit = '$kd_unit'
			and msu.kd_sub = '$kd_sub'");

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