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
		from ta_rask_arsip tra
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
		from ta_rask_arsip tra
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

	public function getsumanggaranindukopd(){
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

		$query = $this->db->query("select sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 then tra.total else 0 end) as total,
			sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 1 then tra.total else 0 end) as b_taklangsung,
	        sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 1 and tra.kd_rek_3 = 1 then tra.total else 0 end) as taklangsung_pegawai,
	        sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 1 and tra.kd_rek_3 <> 1 then tra.total else 0 end) as taklangsung_non,
			sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 then tra.total else 0 end) as b_langsung,
			sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tra.kd_rek_3 = 1 then tra.total else 0 end) as langsung_pegawai,
			sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tra.kd_rek_3 <> 1 then tra.total else 0 end) as langsung_non,
			sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tra.kd_rek_3 = 2 then tra.total else 0 end) as barangjasa,
			sum(case when tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tra.kd_rek_3 = 3 then tra.total else 0 end) as modal
		from ta_rask_arsip tra
	    where tra.tahun = '$tahun'
	    	and tra.kd_urusan = '$kd_urusan'
	    	and tra.kd_bidang = '$kd_bidang'
	    	and tra.kd_unit = '$kd_unit'
	    	and tra.kd_sub = '$kd_sub'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getsumanggaranperubahanopd(){
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

		$query = $this->db->query("select sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 then tra.total else 0 end) as total,
			sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 1 then tra.total else 0 end) as b_taklangsung,
	        sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 1 and tra.kd_rek_3 = 1 then tra.total else 0 end) as taklangsung_pegawai,
	        sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 1 and tra.kd_rek_3 <> 1 then tra.total else 0 end) as taklangsung_non,
			sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 then tra.total else 0 end) as b_langsung,
			sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tra.kd_rek_3 = 1 then tra.total else 0 end) as langsung_pegawai,
			sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tra.kd_rek_3 <> 1 then tra.total else 0 end) as langsung_non,
			sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tra.kd_rek_3 = 2 then tra.total else 0 end) as barangjasa,
			sum(case when tra.kd_perubahan = 6 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tra.kd_rek_3 = 3 then tra.total else 0 end) as modal
		from ta_rask_arsip tra
	    where tra.tahun = '$tahun'
	    	and tra.kd_urusan = '$kd_urusan'
	    	and tra.kd_bidang = '$kd_bidang'
	    	and tra.kd_unit = '$kd_unit'
	    	and tra.kd_sub = '$kd_sub'");

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
		from ta_rask_arsip as tra 
		where tra.tahun = '$tahun'
			and tra.kd_rek_1 = 5
			and tra.kd_rek_2 = 2
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

	public function getrekening()
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
			and tra.kd_prog <> 0
			and tra.kd_keg <> 0
			and concat(tra.kd_urusan, tra.kd_bidang, tra.kd_unit) <> '411' 
			and concat(tra.kd_urusan, tra.kd_bidang, tra.kd_unit) <> '412'
		group by tra.kd_urusan,
			tra.kd_bidang, 
			tra.kd_unit, 
			tra.kd_sub, 
			tra.kd_prog, 
			tra.kd_keg
			tra.kd_rek_1, 
			tra.kd_rek_2, 
			tra.kd_rek_3, 
			tra.kd_rek_4, 
			tra.kd_rek_5");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getcountkegiatanopd()
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

		$query = $this->db->query("select tra.*, 
			sum(case when tra.kd_perubahan = 4 then tra.total else 0 end) as total_induk,
			sum(case when tra.kd_perubahan = 6 then tra.total else 0 end) as total_perubahan
		from ta_rask_arsip as tra 
		where tra.tahun = '$tahun'
			and tra.kd_rek_1 = 5
			and tra.kd_rek_2 = 2
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
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
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}

		$query = $this->db->query("select tk.*, tk.ket_kegiatan as nama
		from ta_kegiatan tk
		where tahun = '$tahun'");

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
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}
	  	$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_prog = $this -> input -> get('kd_prog');
	  	$kd_keg = $this -> input -> get('kd_keg');

		$query = $this->db->query("select tk.*, tk.ket_kegiatan as nama
		from ta_kegiatan tk
		where tahun = '$tahun'
			and tk.kd_urusan = '$kd_urusan'
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
			sum(case when tra.kd_perubahan = 6 then tra.total else 0 end) as total_perubahan,
			count(tra.tahun) as jumlah_data
		from ta_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_rek_1 = 5
			and tra.kd_rek_2 = 2
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
		from ta_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_prog = '$kd_prog'
			and tra.kd_keg = '$kd_keg'
			and tra.kd_rek_1 = 5
			and tra.kd_rek_2 = 2
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
		from ta_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_prog = '$kd_prog'
			and tra.kd_keg = '$kd_keg'
			and tra.kd_rek_1 = 5
			and tra.kd_rek_2 = 2");

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

		$query = $this->db->query("select tra.*,
			sum(tra.total) as total_anggaran
		from ta_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_prog = '$kd_prog'
			and tra.kd_keg = '$kd_keg'
			and tra.kd_perubahan = '4'
			and tra.kd_rek_1 = 5
			and tra.kd_rek_2 = 2
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
            tra.kd_rek_5");

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

		$query = $this->db->query("select tra.*,
			sum(tra.total) as total_anggaran
		from ta_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_prog = '$kd_prog'
			and tra.kd_keg = '$kd_keg'
			and tra.kd_perubahan = '6'
			and tra.kd_rek_1 = 5
			and tra.kd_rek_2 = 2
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
            tra.kd_rek_5");

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
		from ta_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_prog = '$kd_prog'
			and tra.kd_keg = '$kd_keg'
			and tra.kd_perubahan = '4'
			and tra.kd_rek_1 = 5
			and tra.kd_rek_2 = 2
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
		from ta_rask_arsip as tra 
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
		from ta_rask_arsip as tra 
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
		from ref_sub_unit msu
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
	
	public function syncrask()
	{
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear))
		{
			$tahun = $getYear;
		}
		else
		{
			$tahun = date('Y');
		}

	  	$dbPmb = $this->load->database('pmb', TRUE);
		$query = $dbPmb->query("select tra.* 
		from t_rask_arsip tra
		where tra.tahun = '$tahun'
		limit 60000, 10000");

		if($query->num_rows() > 0)
		{
			$datakontrak = $query->result();
			foreach ($datakontrak as $row) :
				$queryB = $dbPmb->query("select kd.* 
				from t_kelengkapan_data kd
				where kd.tahun = '$row->tahun'
					and kd.kd_urusan = '$row->kd_urusan'
					and kd.kd_bidang = '$row->kd_bidang'
					and kd.kd_unit = '$row->kd_unit'
					and kd.kd_sub = '$row->kd_sub'
					and kd.kd_rek_1 = '$row->kd_rek_1'
					and kd.kd_rek_2 = '$row->kd_rek_2'
					and kd.kd_rek_3 = '$row->kd_rek_3'
					and kd.kd_rek_4 = '$row->kd_rek_4'
					and kd.kd_rek_5 = '$row->kd_rek_5'");

				if($queryB->result())
				{
			  		$kelengkapandata = $queryB->result();
			  		foreach ($kelengkapandata as $rowB) :
			  			$data = array(
							'status_pengadaan' => $row->status_pengadaan,
							'status_target' => $row->status_target
						);

			  			$where = array(
						  	'tahun' => $row->tahun,
							'kd_urusan' => $row->kd_urusan,
							'kd_bidang' => $row->kd_bidang,
							'kd_unit' => $row->kd_unit,
							'kd_sub' => $row->kd_sub,
							'kd_prog' => $row->kd_prog,
							'kd_keg' => $row->kd_keg,
							'kd_rek_1' => $row->kd_rek_1,
							'kd_rek_2' => $row->kd_rek_2,
							'kd_rek_3' => $row->kd_rek_3,
							'kd_rek_4' => $row->kd_rek_4,
							'kd_rek_5' => $row->kd_rek_5
						  );

						$dbPmb->set($data);
						$dbPmb->where($where);
						$dbPmb->update('t_kelengkapan_data');
			  		endforeach;
			  	}
			  	else
			  	{
			  	    if($row->status_pengadaan == 1 && $row->status_target == 1)
			  	    {
    		  			$data = array(
    						'tahun' => $row->tahun,
    						'kd_urusan' => $row->kd_urusan,
    						'kd_bidang' => $row->kd_bidang,
    						'kd_unit' => $row->kd_unit,
    						'kd_sub' => $row->kd_sub,
    						'kd_prog' => $row->kd_prog,
    						'kd_keg' => $row->kd_keg,
    						'kd_rek_1' => $row->kd_rek_1,
    						'kd_rek_2' => $row->kd_rek_2,
    						'kd_rek_3' => $row->kd_rek_3,
    						'kd_rek_4' => $row->kd_rek_4,
    						'kd_rek_5' => $row->kd_rek_5,
    						'status_pengadaan' => $row->status_pengadaan,
    						'status_target' => $row->status_target
    						);
    						
    						//insert ke database
        					$dbPmb->insert('t_kelengkapan_data', $data);
			  	    }
			  	    else{
			  	        if($row->status_pengadaan == 1 && $row->status_target == 0)
			  	        {
			  	            $data = array(
    						'tahun' => $row->tahun,
    						'kd_urusan' => $row->kd_urusan,
    						'kd_bidang' => $row->kd_bidang,
    						'kd_unit' => $row->kd_unit,
    						'kd_sub' => $row->kd_sub,
    						'kd_prog' => $row->kd_prog,
    						'kd_keg' => $row->kd_keg,
    						'kd_rek_1' => $row->kd_rek_1,
    						'kd_rek_2' => $row->kd_rek_2,
    						'kd_rek_3' => $row->kd_rek_3,
    						'kd_rek_4' => $row->kd_rek_4,
    						'kd_rek_5' => $row->kd_rek_5,
    						'status_pengadaan' => $row->status_pengadaan,
    						'status_target' => 0
    						);        
    						
    						//insert ke database
					        $dbPmb->insert('t_kelengkapan_data', $data);
			  	        }
			  	        else if($row->status_pengadaan == 0 && $row->status_target == 1)
			  	        {
			  	            $data = array(
    						'tahun' => $row->tahun,
    						'kd_urusan' => $row->kd_urusan,
    						'kd_bidang' => $row->kd_bidang,
    						'kd_unit' => $row->kd_unit,
    						'kd_sub' => $row->kd_sub,
    						'kd_prog' => $row->kd_prog,
    						'kd_keg' => $row->kd_keg,
    						'kd_rek_1' => $row->kd_rek_1,
    						'kd_rek_2' => $row->kd_rek_2,
    						'kd_rek_3' => $row->kd_rek_3,
    						'kd_rek_4' => $row->kd_rek_4,
    						'kd_rek_5' => $row->kd_rek_5,
    						'status_pengadaan' => 0,
    						'status_target' => $row->status_target
    						);
    						
    						//insert ke database
					        $dbPmb->insert('t_kelengkapan_data', $data);
			  	        }
			  	    }
			  	}
			endforeach;

			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function getlaporanopd()
	{
	    $getYear = $this -> input -> get('tahun');
		if(isset($getYear))
		{
			$tahun = $getYear;
		}
		else
		{
			$tahun = date('Y');
		}

	  	$dbPmb = $this->load->database('pmb', TRUE);
		$query = $dbPmb->query("select tra.*, tk.tahun, k.tahun, 
    		sum(case when tra.kd_perubahan = 4 then tra.total else 0 end) as total_induk,
    		sum(case when tra.kd_perubahan = 6 then tra.total else 0 end) as total_perubahan,
    		count(tra.tahun) as jumlah_data
    	from t_rask_arsip tra
    
        left join t_target_fisik tk on tk.kd_urusan = tra.kd_urusan and tk.kd_bidang = tra.kd_bidang and tk.kd_unit = tra.kd_unit and tk.kd_sub = tra.kd_sub and tk.kd_prog = tra.kd_prog and tk.kd_keg = tra.kd_keg and tk.kd_rek_1 = tra.kd_rek_1 and tk.kd_rek_2 = tra.kd_rek_2 and tk.kd_rek_3 = tra.kd_rek_3 and tk.kd_rek_4 = tra.kd_rek_4 and tk.kd_rek_5 = tra.kd_rek_5
    
        left join t_kontrak k on k.kd_urusan = tra.kd_urusan and k.kd_bidang = tra.kd_bidang and k.kd_unit = tra.kd_unit and k.kd_sub = tra.kd_sub and k.kd_prog = tra.kd_prog and k.kd_keg = tra.kd_keg and k.kd_rek_1 = tra.kd_rek_1 and k.kd_rek_2 = tra.kd_rek_2 and k.kd_rek_3 = tra.kd_rek_3 and k.kd_rek_4 = tra.kd_rek_4 and k.kd_rek_5 = tra.kd_rek_5
    
        where tra.tahun = '$tahun' and tra.kd_perubahan = 4 and tra.kd_rek_1 = 5 and tra.kd_rek_2 = 2 and tk.tahun is null and k.tahun is null
    
        group by tra.kd_perubahan, tra.kd_urusan, tra.kd_bidang, tra.kd_unit, tra.kd_sub, tra.kd_prog, tra.kd_keg");

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