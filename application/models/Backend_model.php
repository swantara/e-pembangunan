<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
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

		$kd_urusan = $this->session->userdata('session')['kd_urusan'];
		$kd_bidang = $this->session->userdata('session')['kd_bidang'];
		$kd_unit = $this->session->userdata('session')['kd_unit'];
		$kd_sub = $this->session->userdata('session')['kd_sub'];
		$query = $this->db->query("select tra.*, 
			sum(case when tra.kd_perubahan = 4 then tra.total else 0 end) as total_induk,
			sum(case when tra.kd_perubahan = 6 then tra.total else 0 end) as total_perubahan,
			count(case when tra.status_pengadaan = 1 and tra.status_target = 1 then tra.tahun end) as progress_data,
			count(tra.tahun) as total_data 
		from t_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_rek_1 = 5
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

	public function getdatacount()
	{
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}

		$query = $this->db->query("select 
			count(case when tra.status = 1 then tra.tahun else 0 end) as progress_data,
			count(tra.tahun) as total_data 
		from t_rask_arsip as tra 
		where tra.tahun = '$tahun'
			and tra.kd_rek_1 = 5");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getlistkegiatanbyopd()
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
			sum(case when tra.kd_perubahan = 6 then tra.total else 0 end) as total_perubahan,
			count(case when tra.status_pengadaan = 1 and tra.status_target = 1 then tra.tahun end) as progress_data,
			count(tra.tahun) as total_data 
		from t_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_rek_1 = 5
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

	public function getlistrincianbykegiatan()
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
			count(case when tra.status_pengadaan = 1 and tra.status_target = 1 then tra.tahun end) as progress_data,
			count(tra.tahun) as total_data 
		from t_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
			and tra.kd_rek_1 = 5
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

	public function getdetailrincianbykegiatan()
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
			and tra.kd_rek_1 = '$kd_rek_1'
			and tra.kd_rek_2 = '$kd_rek_2'
			and tra.kd_rek_3 = '$kd_rek_3'
			and tra.kd_rek_4 = '$kd_rek_4'
			and tra.kd_rek_5 = '$kd_rek_5'
			and tra.no_rinc = '$no_rinc'
			and tra.no_id = '$no_id'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdetailkegiatanbyopd()
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
			and tra.kd_rek_1 = 5
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

	public function getdatadetailkegiatan()
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
			and tra.kd_rek_1 = 5
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

	public function getdatarinciankegiatan()
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
			and tra.kd_rek_1 = '$kd_rek_1'
			and tra.kd_rek_2 = '$kd_rek_2'
			and tra.kd_rek_3 = '$kd_rek_3'
			and tra.kd_rek_4 = '$kd_rek_4'
			and tra.kd_rek_5 = '$kd_rek_5'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdatadetailkontrak()
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

		$query = $this->db->query("select k.*,
			mp.nama as ket_metode_pengadaan,
			mjp.nama as ket_jenis_pengadaan
		from t_kontrak k
		left join m_pengadaan mp on mp.id = k.metode_pengadaan
		left join m_jenis_pengadaan mjp on mjp.id = k.jenis_pengadaan
		where k.tahun = '$tahun' 
			and k.kd_urusan = '$kd_urusan'
			and k.kd_bidang = '$kd_bidang'
			and k.kd_unit = '$kd_unit'
			and k.kd_sub = '$kd_sub'
			and k.kd_prog = '$kd_prog'
			and k.kd_keg = '$kd_keg'
			and k.kd_rek_1 = 5");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdetailkegiatan()
	{
		$tahun = 2017;
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
			and tra.kd_rek_1 = 5
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

	public function getnamaopd()
	{
		$query = $this->db->query("select msu.*
		from m_sub_unit msu");

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
		$query = $this->db->query("select mk.*
		from m_kegiatan mk");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdatakontrakbyrek(){
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

		$query = $this->db->query("select k.* 
		from t_kontrak k 
		where k.tahun = '$tahun' 
			and k.kd_urusan = '$kd_urusan'
			and k.kd_bidang = '$kd_bidang'
			and k.kd_unit = '$kd_unit'
			and k.kd_sub = '$kd_sub'
			and k.kd_prog = '$kd_prog'
			and k.kd_keg = '$kd_keg'
			and k.kd_rek_1 = 5");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function gettargetkeuangan(){
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

		$query = $this->db->query("select tk.* 
		from t_target_keuangan tk
		where tk.tahun = '$tahun' 
			and tk.kd_urusan = '$kd_urusan'
			and tk.kd_bidang = '$kd_bidang'
			and tk.kd_unit = '$kd_unit'
			and tk.kd_sub = '$kd_sub'
			and tk.kd_prog = '$kd_prog'
			and tk.kd_keg = '$kd_keg'
			and tk.jenis = '1'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function gettargetkeuangankontrak(){
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

		$query = $this->db->query("select tk.* 
		from t_target_keuangan tk
		where tk.tahun = '$tahun' 
			and tk.kd_urusan = '$kd_urusan'
			and tk.kd_bidang = '$kd_bidang'
			and tk.kd_unit = '$kd_unit'
			and tk.kd_sub = '$kd_sub'
			and tk.kd_prog = '$kd_prog'
			and tk.kd_keg = '$kd_keg'
			and tk.jenis = '2'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function gettargetfisik(){
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

		$query = $this->db->query("select tf.*,
			(b_1 + b_2 + b_3 + b_4 + b_5 + b_6 + b_7 + b_8 + b_9 + b_10 + b_11 + b_12) as total_fisik
		from t_target_fisik tf
		where tf.tahun = '$tahun' 
			and tf.kd_urusan = '$kd_urusan'
			and tf.kd_bidang = '$kd_bidang'
			and tf.kd_unit = '$kd_unit'
			and tf.kd_sub = '$kd_sub'
			and tf.kd_prog = '$kd_prog'
			and tf.kd_keg = '$kd_keg'
			and tf.kd_rek_1 = '$kd_rek_1'
			and tf.kd_rek_2 = '$kd_rek_2'
			and tf.kd_rek_3 = '$kd_rek_3'
			and tf.kd_rek_4 = '$kd_rek_4'
			and tf.kd_rek_5 = '$kd_rek_5'
			and tf.no_rinc = '$no_rinc'
			and tf.no_id = '$no_id'
			and tf.jenis = '1'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getrealisasifisik(){
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

		$query = $this->db->query("select rf.*,
			(b_1 + b_2 + b_3 + b_4 + b_5 + b_6 + b_7 + b_8 + b_9 + b_10 + b_11 + b_12) as total_fisik
		from t_realisasi_fisik rf
		where rf.tahun = '$tahun' 
			and rf.kd_urusan = '$kd_urusan'
			and rf.kd_bidang = '$kd_bidang'
			and rf.kd_unit = '$kd_unit'
			and rf.kd_sub = '$kd_sub'
			and rf.kd_prog = '$kd_prog'
			and rf.kd_keg = '$kd_keg'
			and rf.kd_rek_1 = '$kd_rek_1'
			and rf.kd_rek_2 = '$kd_rek_2'
			and rf.kd_rek_3 = '$kd_rek_3'
			and rf.kd_rek_4 = '$kd_rek_4'
			and rf.kd_rek_5 = '$kd_rek_5'
			and rf.no_rinc = '$no_rinc'
			and rf.no_id = '$no_id'
			and rf.jenis = '1'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function gettargetfisikkontrak(){
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

		$query = $this->db->query("select tf.*
		from t_target_fisik tf
		where tf.tahun = '$tahun' 
			and tf.kd_urusan = '$kd_urusan'
			and tf.kd_bidang = '$kd_bidang'
			and tf.kd_unit = '$kd_unit'
			and tf.kd_sub = '$kd_sub'
			and tf.kd_prog = '$kd_prog'
			and tf.kd_keg = '$kd_keg'
			and tf.kd_rek_1 = '$kd_rek_1'
			and tf.kd_rek_2 = '$kd_rek_2'
			and tf.kd_rek_3 = '$kd_rek_3'
			and tf.kd_rek_4 = '$kd_rek_4'
			and tf.kd_rek_5 = '$kd_rek_5'
			and tf.no_rinc = '$no_rinc'
			and tf.no_id = '$no_id'
			and tf.jenis = '2'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function editdatakegiatan()
	{
		//ambil data admin yang menginputkan data
		$data_session = $this->session->userdata('session');
		$id_user = $data_session['user_id'];

		
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

	  	$query = $this->db->query("select k.* 
		from t_kontrak k 
		where k.tahun = '$tahun' 
			and k.kd_urusan = '$kd_urusan'
			and k.kd_bidang = '$kd_bidang'
			and k.kd_unit = '$kd_unit'
			and k.kd_sub = '$kd_sub'
			and k.kd_prog = '$kd_prog'
			and k.kd_keg = '$kd_keg'
			and k.kd_rek_1 = '$kd_rek_1'
			and k.kd_rek_2 = '$kd_rek_2'
			and k.kd_rek_3 = '$kd_rek_3'
			and k.kd_rek_4 = '$kd_rek_4'
			and k.kd_rek_5 = '$kd_rek_5'
			and k.no_rinc = '$no_rinc'
			and k.no_id = '$no_id'");

	  	if($query->result()){
	  		$data_kontrak = $query->result()[0];
	  	}

	  	if(!$query->result()){
		  	if($this -> input -> post('metode_pengadaan') == 1){
		  		$data = array(
				  'tahun' => $tahun,
				  'kd_urusan' => $kd_urusan,
				  'kd_bidang' => $kd_bidang,
				  'kd_unit' => $kd_unit,
				  'kd_sub' => $kd_sub,
				  'kd_prog' => $kd_prog,
				  'kd_keg' => $kd_keg,
				  'kd_rek_1' => $kd_rek_1,
				  'kd_rek_2' => $kd_rek_2,
				  'kd_rek_3' => $kd_rek_3,
				  'kd_rek_4' => $kd_rek_4,
				  'kd_rek_5' => $kd_rek_5,
				  'no_rinc' => $no_rinc,
				  'no_id' => $no_id,
				  'metode_pengadaan' => $this -> input -> post('metode_pengadaan'),
				  'created_by' => $id_user
				  );
		  	}
		  	else {
				$data = array(
				  'tahun' => $tahun,
				  'kd_urusan' => $kd_urusan,
				  'kd_bidang' => $kd_bidang,
				  'kd_unit' => $kd_unit,
				  'kd_sub' => $kd_sub,
				  'kd_prog' => $kd_prog,
				  'kd_keg' => $kd_keg,
				  'kd_rek_1' => $kd_rek_1,
				  'kd_rek_2' => $kd_rek_2,
				  'kd_rek_3' => $kd_rek_3,
				  'kd_rek_4' => $kd_rek_4,
				  'kd_rek_5' => $kd_rek_5,
				  'no_rinc' => $no_rinc,
				  'no_id' => $no_id,
				  'metode_pengadaan' => $this -> input -> post('metode_pengadaan'),
				  'jenis_pengadaan' => $this -> input -> post('jenis_pengadaan'),
				  'pelaksana' => $this -> input -> post('pelaksana'),
				  'npwp' => $this -> input -> post('npwp'),
				  'nilai_kontrak' => $this -> input -> post('nilai_kontrak'),
				  'tanggal_mulai' => date('Y-m-d', strtotime($this -> input -> post('tanggal_mulai'))),
				  'tanggal_selesai' => date('Y-m-d', strtotime($this -> input -> post('tanggal_selesai'))),
				  'durasi' => $this -> input -> post('durasi'),
				  'created_by' => $id_user
				  );
			}
			//insert ke database
			$this->db->insert('t_kontrak', $data);

			$where = array(
				  'tahun' => $tahun,
				  'kd_urusan' => $kd_urusan,
				  'kd_bidang' => $kd_bidang,
				  'kd_unit' => $kd_unit,
				  'kd_sub' => $kd_sub,
				  'kd_prog' => $kd_prog,
				  'kd_keg' => $kd_keg,
				  'kd_rek_1' => $kd_rek_1,
				  'kd_rek_2' => $kd_rek_2,
				  'kd_rek_3' => $kd_rek_3,
				  'kd_rek_4' => $kd_rek_4,
				  'kd_rek_5' => $kd_rek_5,
				  'no_rinc' => $no_rinc,
				  'no_id' => $no_id
				  );


			$this->db->set('status_pengadaan', 1);
			$this->db->where($where);
			$this->db->update('t_rask_arsip');

			$this->session->set_flashdata('alert','update');
			redirect('backend/detailrincianbykegiatan/?kd_urusan='.$kd_urusan.'&kd_bidang='.$kd_bidang.'&kd_unit='.$kd_unit.'&kd_sub='.$kd_sub.'&kd_prog='.$kd_prog.'&kd_keg='.$kd_keg.'&kd_rek_1='.$kd_rek_1.'&kd_rek_2='.$kd_rek_2.'&kd_rek_3='.$kd_rek_3.'&kd_rek_4='.$kd_rek_4.'&kd_rek_5='.$kd_rek_5.'&no_rinc='.$no_rinc.'&no_id='.$no_id,'refresh');
		}
		else{

		  	if($this -> input -> post('metode_pengadaan') == 1){
		  		$data = array(
				  'kd_urusan' => $kd_urusan,
				  'kd_bidang' => $kd_bidang,
				  'kd_unit' => $kd_unit,
				  'kd_sub' => $kd_sub,
				  'kd_prog' => $kd_prog,
				  'kd_keg' => $kd_keg,
				  'kd_rek_1' => $kd_rek_1,
				  'kd_rek_2' => $kd_rek_2,
				  'kd_rek_3' => $kd_rek_3,
				  'kd_rek_4' => $kd_rek_4,
				  'kd_rek_5' => $kd_rek_5,
				  'no_rinc' => $no_rinc,
				  'no_id' => $no_id,
				  'metode_pengadaan' => $this -> input -> post('metode_pengadaan'),
				  'jenis_pengadaan' => null,
				  'pelaksana' => null,
				  'npwp' => null,
				  'nilai_kontrak' => null,
				  'tanggal_mulai' => null,
				  'tanggal_selesai' => null,
				  'durasi' => null,
				  'updated_by' => $id_user
				  );
		  	}
		  	else {
				$data = array(
				  'kd_urusan' => $kd_urusan,
				  'kd_bidang' => $kd_bidang,
				  'kd_unit' => $kd_unit,
				  'kd_sub' => $kd_sub,
				  'kd_prog' => $kd_prog,
				  'kd_keg' => $kd_keg,
				  'kd_rek_1' => $kd_rek_1,
				  'kd_rek_2' => $kd_rek_2,
				  'kd_rek_3' => $kd_rek_3,
				  'kd_rek_4' => $kd_rek_4,
				  'kd_rek_5' => $kd_rek_5,
				  'no_rinc' => $no_rinc,
				  'no_id' => $no_id,
				  'metode_pengadaan' => $this -> input -> post('metode_pengadaan'),
				  'jenis_pengadaan' => $this -> input -> post('jenis_pengadaan'),
				  'pelaksana' => $this -> input -> post('pelaksana'),
				  'npwp' => $this -> input -> post('npwp'),
				  'nilai_kontrak' => $this -> input -> post('nilai_kontrak'),
				  'tanggal_mulai' => date('Y-m-d', strtotime($this -> input -> post('tanggal_mulai'))),
				  'tanggal_selesai' => date('Y-m-d', strtotime($this -> input -> post('tanggal_selesai'))),
				  'durasi' => $this -> input -> post('durasi'),
				  'updated_by' => $id_user
				  );
			}
			//insert ke database
			$this->db->where('id', $data_kontrak->id);
			$this->db->update('t_kontrak', $data);

			$where = array(
				  'tahun' => $tahun,
				  'kd_urusan' => $kd_urusan,
				  'kd_bidang' => $kd_bidang,
				  'kd_unit' => $kd_unit,
				  'kd_sub' => $kd_sub,
				  'kd_prog' => $kd_prog,
				  'kd_keg' => $kd_keg,
				  'kd_rek_1' => $kd_rek_1,
				  'kd_rek_2' => $kd_rek_2,
				  'kd_rek_3' => $kd_rek_3,
				  'kd_rek_4' => $kd_rek_4,
				  'kd_rek_5' => $kd_rek_5,
				  'no_rinc' => $no_rinc,
				  'no_id' => $no_id
				  );


			$this->db->set('status_pengadaan', 1);
			$this->db->where($where);
			$this->db->update('t_rask_arsip');

			$this->session->set_flashdata('alert','update');
			redirect('backend/detailrincianbykegiatan/?kd_urusan='.$kd_urusan.'&kd_bidang='.$kd_bidang.'&kd_unit='.$kd_unit.'&kd_sub='.$kd_sub.'&kd_prog='.$kd_prog.'&kd_keg='.$kd_keg.'&kd_rek_1='.$kd_rek_1.'&kd_rek_2='.$kd_rek_2.'&kd_rek_3='.$kd_rek_3.'&kd_rek_4='.$kd_rek_4.'&kd_rek_5='.$kd_rek_5.'&no_rinc='.$no_rinc.'&no_id='.$no_id,'refresh');
		}

		
		return true;
	}

	public function edittargetkegiatan()
	{
		//ambil data admin yang menginputkan data
		$data_session = $this->session->userdata('session');
		$id_user = $data_session['user_id'];

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

		$query = $this->db->query("select tf.* 
		from t_target_fisik tf
		where tf.tahun = '$tahun' 
			and tf.kd_urusan = '$kd_urusan'
			and tf.kd_bidang = '$kd_bidang'
			and tf.kd_unit = '$kd_unit'
			and tf.kd_sub = '$kd_sub'
			and tf.kd_prog = '$kd_prog'
			and tf.kd_keg = '$kd_keg'
			and tf.kd_rek_1 = '$kd_rek_1'
			and tf.kd_rek_2 = '$kd_rek_2'
			and tf.kd_rek_3 = '$kd_rek_3'
			and tf.kd_rek_4 = '$kd_rek_4'
			and tf.kd_rek_5 = '$kd_rek_5'
			and tf.no_rinc = '$no_rinc'
			and tf.no_id = '$no_id'
			and tf.jenis = 1");

	  	if($query->result()){
	  		$data_fisik = $query->result()[0];
	  	}

	  	if(!$query->result()){
	  		$data = array(
				'tahun' => $tahun,
				'kd_urusan' => $kd_urusan,
				'kd_bidang' => $kd_bidang,
				'kd_unit' => $kd_unit,
				'kd_sub' => $kd_sub,
				'kd_prog' => $kd_prog,
				'kd_keg' => $kd_keg,
				'kd_rek_1' => $kd_rek_1,
				'kd_rek_2' => $kd_rek_2,
				'kd_rek_3' => $kd_rek_3,
				'kd_rek_4' => $kd_rek_4,
				'kd_rek_5' => $kd_rek_5,
				'no_rinc' => $no_rinc,
				'no_id' => $no_id,
				'jenis' => 1,
				'b_1' => $this -> input -> post('fisik1'),
				'b_2' => $this -> input -> post('fisik2'),
				'b_3' => $this -> input -> post('fisik3'),
				'b_4' => $this -> input -> post('fisik4'),
				'b_5' => $this -> input -> post('fisik5'),
				'b_6' => $this -> input -> post('fisik6'),
				'b_7' => $this -> input -> post('fisik7'),
				'b_8' => $this -> input -> post('fisik8'),
				'b_9' => $this -> input -> post('fisik9'),
				'b_10' => $this -> input -> post('fisik10'),
				'b_11' => $this -> input -> post('fisik11'),
				'b_12' => $this -> input -> post('fisik12'),
				'created_by' => $id_user
				);

			//insert ke database
			$this->db->insert('t_target_fisik', $data);
			$lastid = $this->db->insert_id();

			$where = array(
				  'tahun' => $tahun,
				  'kd_urusan' => $kd_urusan,
				  'kd_bidang' => $kd_bidang,
				  'kd_unit' => $kd_unit,
				  'kd_sub' => $kd_sub,
				  'kd_prog' => $kd_prog,
				  'kd_keg' => $kd_keg,
				  'kd_rek_1' => $kd_rek_1,
				  'kd_rek_2' => $kd_rek_2,
				  'kd_rek_3' => $kd_rek_3,
				  'kd_rek_4' => $kd_rek_4,
				  'kd_rek_5' => $kd_rek_5,
				  'no_rinc' => $no_rinc,
				  'no_id' => $no_id
				  );


			$this->db->set('status_target', 1);
			$this->db->where($where);
			$this->db->update('t_rask_arsip');

			$this->session->set_flashdata('alert','update');
			redirect('backend/detailrincianbykegiatan/?tahun='.$tahun.'&kd_urusan='.$kd_urusan.'&kd_bidang='.$kd_bidang.'&kd_unit='.$kd_unit.'&kd_sub='.$kd_sub.'&kd_prog='.$kd_prog.'&kd_keg='.$kd_keg.'&kd_rek_1='.$kd_rek_1.'&kd_rek_2='.$kd_rek_2.'&kd_rek_3='.$kd_rek_3.'&kd_rek_4='.$kd_rek_4.'&kd_rek_5='.$kd_rek_5.'&no_rinc='.$no_rinc.'&no_id='.$no_id,'refresh');
		}

		else{
	  		$data = array(
				'tahun' => $tahun,
				'kd_urusan' => $kd_urusan,
				'kd_bidang' => $kd_bidang,
				'kd_unit' => $kd_unit,
				'kd_sub' => $kd_sub,
				'kd_prog' => $kd_prog,
				'kd_keg' => $kd_keg,
				'kd_rek_1' => $kd_rek_1,
				'kd_rek_2' => $kd_rek_2,
				'kd_rek_3' => $kd_rek_3,
				'kd_rek_4' => $kd_rek_4,
				'kd_rek_5' => $kd_rek_5,
				'no_rinc' => $no_rinc,
				'no_id' => $no_id,
				'jenis' => 1,
				'b_1' => $this -> input -> post('fisik1'),
				'b_2' => $this -> input -> post('fisik2'),
				'b_3' => $this -> input -> post('fisik3'),
				'b_4' => $this -> input -> post('fisik4'),
				'b_5' => $this -> input -> post('fisik5'),
				'b_6' => $this -> input -> post('fisik6'),
				'b_7' => $this -> input -> post('fisik7'),
				'b_8' => $this -> input -> post('fisik8'),
				'b_9' => $this -> input -> post('fisik9'),
				'b_10' => $this -> input -> post('fisik10'),
				'b_11' => $this -> input -> post('fisik11'),
				'b_12' => $this -> input -> post('fisik12'),
				'updated_by' => $id_user
				);

			//insert ke database
			$this->db->where('id', $data_fisik->id);
			$this->db->update('t_target_fisik', $data);

			$where = array(
				  'tahun' => $tahun,
				  'kd_urusan' => $kd_urusan,
				  'kd_bidang' => $kd_bidang,
				  'kd_unit' => $kd_unit,
				  'kd_sub' => $kd_sub,
				  'kd_prog' => $kd_prog,
				  'kd_keg' => $kd_keg,
				  'kd_rek_1' => $kd_rek_1,
				  'kd_rek_2' => $kd_rek_2,
				  'kd_rek_3' => $kd_rek_3,
				  'kd_rek_4' => $kd_rek_4,
				  'kd_rek_5' => $kd_rek_5,
				  'no_rinc' => $no_rinc,
				  'no_id' => $no_id
				  );


			$this->db->set('status_target', 1);
			$this->db->where($where);
			$this->db->update('t_rask_arsip');

			$this->session->set_flashdata('alert','update');
			redirect('backend/detailrincianbykegiatan/?tahun='.$tahun.'&kd_urusan='.$kd_urusan.'&kd_bidang='.$kd_bidang.'&kd_unit='.$kd_unit.'&kd_sub='.$kd_sub.'&kd_prog='.$kd_prog.'&kd_keg='.$kd_keg.'&kd_rek_1='.$kd_rek_1.'&kd_rek_2='.$kd_rek_2.'&kd_rek_3='.$kd_rek_3.'&kd_rek_4='.$kd_rek_4.'&kd_rek_5='.$kd_rek_5.'&no_rinc='.$no_rinc.'&no_id='.$no_id,'refresh');
		}
	}

	public function edittargetkontrak()
	{
		//ambil data admin yang menginputkan data
		$data_session = $this->session->userdata('session');
		$id_user = $data_session['user_id'];

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

		$query = $this->db->query("select tf.* 
		from t_target_fisik tf
		where tf.tahun = '$tahun' 
			and tf.kd_urusan = '$kd_urusan'
			and tf.kd_bidang = '$kd_bidang'
			and tf.kd_unit = '$kd_unit'
			and tf.kd_sub = '$kd_sub'
			and tf.kd_prog = '$kd_prog'
			and tf.kd_keg = '$kd_keg'
			and tf.kd_rek_1 = '$kd_rek_1'
			and tf.kd_rek_2 = '$kd_rek_2'
			and tf.kd_rek_3 = '$kd_rek_3'
			and tf.kd_rek_4 = '$kd_rek_4'
			and tf.kd_rek_5 = '$kd_rek_5'
			and tf.no_rinc = '$no_rinc'
			and tf.no_id = '$no_id'
			and tf.jenis = 2");

	  	if($query->result()){
	  		$data_fisik = $query->result()[0];
	  	}

	  	if(!$query->result()){
	  		$data = array(
				'tahun' => $tahun,
				'kd_urusan' => $kd_urusan,
				'kd_bidang' => $kd_bidang,
				'kd_unit' => $kd_unit,
				'kd_sub' => $kd_sub,
				'kd_prog' => $kd_prog,
				'kd_keg' => $kd_keg,
				'kd_rek_1' => $kd_rek_1,
				'kd_rek_2' => $kd_rek_2,
				'kd_rek_3' => $kd_rek_3,
				'kd_rek_4' => $kd_rek_4,
				'kd_rek_5' => $kd_rek_5,
				'no_rinc' => $no_rinc,
				'no_id' => $no_id,
				'jenis' => 2,
				'b_1' => $this -> input -> post('fisik1'),
				'b_2' => $this -> input -> post('fisik2'),
				'b_3' => $this -> input -> post('fisik3'),
				'b_4' => $this -> input -> post('fisik4'),
				'b_5' => $this -> input -> post('fisik5'),
				'b_6' => $this -> input -> post('fisik6'),
				'b_7' => $this -> input -> post('fisik7'),
				'b_8' => $this -> input -> post('fisik8'),
				'b_9' => $this -> input -> post('fisik9'),
				'b_10' => $this -> input -> post('fisik10'),
				'b_11' => $this -> input -> post('fisik11'),
				'b_12' => $this -> input -> post('fisik12'),
				'created_by' => $id_user
				);

			//insert ke database
			$this->db->insert('t_target_fisik', $data);

			$this->session->set_flashdata('alert','update');
			redirect('backend/detailrincianbykegiatan/?tahun='.$tahun.'&kd_urusan='.$kd_urusan.'&kd_bidang='.$kd_bidang.'&kd_unit='.$kd_unit.'&kd_sub='.$kd_sub.'&kd_prog='.$kd_prog.'&kd_keg='.$kd_keg.'&kd_rek_1='.$kd_rek_1.'&kd_rek_2='.$kd_rek_2.'&kd_rek_3='.$kd_rek_3.'&kd_rek_4='.$kd_rek_4.'&kd_rek_5='.$kd_rek_5.'&no_rinc='.$no_rinc.'&no_id='.$no_id,'refresh');
		}

		else{
	  		$data = array(
				'tahun' => $tahun,
				'kd_urusan' => $kd_urusan,
				'kd_bidang' => $kd_bidang,
				'kd_unit' => $kd_unit,
				'kd_sub' => $kd_sub,
				'kd_prog' => $kd_prog,
				'kd_keg' => $kd_keg,
				'kd_rek_1' => $kd_rek_1,
				'kd_rek_2' => $kd_rek_2,
				'kd_rek_3' => $kd_rek_3,
				'kd_rek_4' => $kd_rek_4,
				'kd_rek_5' => $kd_rek_5,
				'no_rinc' => $no_rinc,
				'no_id' => $no_id,
				'jenis' => 2,
				'b_1' => $this -> input -> post('fisik1'),
				'b_2' => $this -> input -> post('fisik2'),
				'b_3' => $this -> input -> post('fisik3'),
				'b_4' => $this -> input -> post('fisik4'),
				'b_5' => $this -> input -> post('fisik5'),
				'b_6' => $this -> input -> post('fisik6'),
				'b_7' => $this -> input -> post('fisik7'),
				'b_8' => $this -> input -> post('fisik8'),
				'b_9' => $this -> input -> post('fisik9'),
				'b_10' => $this -> input -> post('fisik10'),
				'b_11' => $this -> input -> post('fisik11'),
				'b_12' => $this -> input -> post('fisik12'),
				'updated_by' => $id_user
				);

			//insert ke database
			$this->db->where('id', $data_fisik->id);
			$this->db->update('t_target_fisik', $data);

			$this->session->set_flashdata('alert','update');
			redirect('backend/detailrincianbykegiatan/?tahun='.$tahun.'&kd_urusan='.$kd_urusan.'&kd_bidang='.$kd_bidang.'&kd_unit='.$kd_unit.'&kd_sub='.$kd_sub.'&kd_prog='.$kd_prog.'&kd_keg='.$kd_keg.'&kd_rek_1='.$kd_rek_1.'&kd_rek_2='.$kd_rek_2.'&kd_rek_3='.$kd_rek_3.'&kd_rek_4='.$kd_rek_4.'&kd_rek_5='.$kd_rek_5.'&no_rinc='.$no_rinc.'&no_id='.$no_id,'refresh');
		}
	}

	public function laporanfisik()
	{
		//ambil data admin yang menginputkan data
		$data_session = $this->session->userdata('session');
		$id_user = $data_session['user_id'];

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


	  	$bulan = $this -> input -> post('bulan');

		$query = $this->db->query("select rf.* 
		from t_realisasi_fisik rf
		where rf.tahun = '$tahun' 
			and rf.kd_urusan = '$kd_urusan'
			and rf.kd_bidang = '$kd_bidang'
			and rf.kd_unit = '$kd_unit'
			and rf.kd_sub = '$kd_sub'
			and rf.kd_prog = '$kd_prog'
			and rf.kd_keg = '$kd_keg'
			and rf.kd_rek_1 = '$kd_rek_1'
			and rf.kd_rek_2 = '$kd_rek_2'
			and rf.kd_rek_3 = '$kd_rek_3'
			and rf.kd_rek_4 = '$kd_rek_4'
			and rf.kd_rek_5 = '$kd_rek_5'
			and rf.no_rinc = '$no_rinc'
			and rf.no_id = '$no_id'
			and rf.jenis = 1");

	  	if($query->result()){
	  		$data_fisik = $query->result()[0];
	  	}

	  	if(!$query->result()){
			if($bulan == "b_1") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_1' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_2") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_2' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_3") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_3' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_4") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_4' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_5") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_5' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_6") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_6' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_7") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_7' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_8") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_8' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_9") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_9' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_10") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_10' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_11") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_11' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_12") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_12' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}

			//insert ke database
			$this->db->insert('t_realisasi_fisik', $data);
			$lastid = $this->db->insert_id();

			if($_FILES['foto']['error'] != 4)
			{
				//bila mengubah foto
				
				//upload foto
				$this->uploadfoto($lastid);
			}

			$this->session->set_flashdata('alert','update');
			redirect('backend/detailrincianbykegiatan/?tahun='.$tahun.'&kd_urusan='.$kd_urusan.'&kd_bidang='.$kd_bidang.'&kd_unit='.$kd_unit.'&kd_sub='.$kd_sub.'&kd_prog='.$kd_prog.'&kd_keg='.$kd_keg.'&kd_rek_1='.$kd_rek_1.'&kd_rek_2='.$kd_rek_2.'&kd_rek_3='.$kd_rek_3.'&kd_rek_4='.$kd_rek_4.'&kd_rek_5='.$kd_rek_5.'&no_rinc='.$no_rinc.'&no_id='.$no_id,'refresh');
		}

		else{
			if($bulan == "b_1") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_1' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_2") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_2' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_3") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_3' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_4") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_4' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_5") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_5' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_6") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_6' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_7") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_7' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_8") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_8' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_9") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_9' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_10") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_10' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_11") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_11' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}
		  	else if($bulan == "b_12") {
		  		$data = array(
					'tahun' => $tahun,
					'kd_urusan' => $kd_urusan,
					'kd_bidang' => $kd_bidang,
					'kd_unit' => $kd_unit,
					'kd_sub' => $kd_sub,
					'kd_prog' => $kd_prog,
					'kd_keg' => $kd_keg,
					'kd_rek_1' => $kd_rek_1,
					'kd_rek_2' => $kd_rek_2,
					'kd_rek_3' => $kd_rek_3,
					'kd_rek_4' => $kd_rek_4,
					'kd_rek_5' => $kd_rek_5,
					'no_rinc' => $no_rinc,
					'no_id' => $no_id,
					'jenis' => 1,
					'b_12' => $this -> input -> post('realisasi'),
					'keterangan' => $this -> input -> post('keterangan'),
					'created_by' => $id_user
					);
		  	}

			//insert ke database
			$this->db->where('id', $data_fisik->id);
			$this->db->update('t_realisasi_fisik', $data);

			if($_FILES['foto']['error'] != 4)
			{
				//bila mengubah foto
				
				//upload foto
				$this->uploadfoto($data_fisik->id);
			}

			$this->session->set_flashdata('alert','update');
			redirect('backend/detailrincianbykegiatan/?tahun='.$tahun.'&kd_urusan='.$kd_urusan.'&kd_bidang='.$kd_bidang.'&kd_unit='.$kd_unit.'&kd_sub='.$kd_sub.'&kd_prog='.$kd_prog.'&kd_keg='.$kd_keg.'&kd_rek_1='.$kd_rek_1.'&kd_rek_2='.$kd_rek_2.'&kd_rek_3='.$kd_rek_3.'&kd_rek_4='.$kd_rek_4.'&kd_rek_5='.$kd_rek_5.'&no_rinc='.$no_rinc.'&no_id='.$no_id,'refresh');
		}
	}

	private function uploadfoto($id)
	{
		//ambil data admin yang menginputkan data
		$data_session = $this->session->userdata('session');
		$id_user = $data_session['user_id'];

		//proses upload foto

		//mengambil data foto dan mengganti filenamenya sesuai id
		$arrayname = explode(".", $_FILES['foto']['name']);
		$ext = end($arrayname);
		$newfilename = 'img-'.$id.'-'.uniqid().'.'.$ext;

		//fungsi upload foto
		$config['upload_path']      = './assets/images/laporanfisik/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['file_name']        = $newfilename;
        $config['overwrite']        = true;
        $this->load->library('upload');
		$this->upload->initialize($config);

		if ($this->upload->do_upload('foto'))
        {
        	$data = array(
				'id_realisasi_fisik' => $id,
				'photo' => $newfilename,
				'created_by' => $id_user
				);

			//insert ke database
			$this->db->insert('t_dokumentasi_fisik', $data);
        }
	}
}