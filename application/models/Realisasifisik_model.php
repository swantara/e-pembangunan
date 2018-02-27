<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasifisik_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getrealisasibyopd()
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
		$query = $dbPmb->query("select *,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)+sum(rf.b_11)+sum(rf.b_12)) as total_realisasi
			from t_realisasi_fisik rf
		    where rf.tahun = '$tahun'
			and rf.kd_rek_1 = 5
			and rf.kd_rek_2 = 2
		    group by rf.kd_urusan,
		    	rf.kd_bidang,
		        rf.kd_unit,
		        rf.kd_sub");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function gettargetbyopd()
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
		$query = $dbPmb->query("select tf.*,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)+sum(tf.b_11)+sum(tf.b_12)) as total_target,
				count(tf.tahun) as jumlah_data
			from t_target_fisik tf
			where tf.tahun = '$tahun'
			and tf.kd_rek_1 = 5
			and tf.kd_rek_2 = 2
            group by tf.kd_urusan,
            	tf.kd_bidang,
                tf.kd_unit,
                tf.kd_sub");

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
		$query = $dbPmb->query("select tf.*,
<<<<<<< HEAD
				sum(tf.b_1) as total_jan,
				(sum(tf.b_1)+sum(tf.b_2)) as total_feb,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)) as total_mar,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)) as total_apr,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)) as total_mei,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)) as total_jun,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)) as total_jul,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)) as total_agt,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)) as total_sep,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)) as total_okt,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)+sum(tf.b_11)) as total_nop,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)+sum(tf.b_11)+sum(tf.b_12)) as total_des,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)+sum(tf.b_11)+sum(tf.b_12)) as total_target,
				count(tf.tahun) as jumlah_data
			from t_target_fisik tf
			where tf.tahun = '$tahun'
			and tf.kd_rek_1 = 5
			and tf.kd_rek_2 = 2");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getsumtargetall()
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
		$query = $dbPmb->query("select tf.*,
=======
>>>>>>> master
				sum(tf.b_1) as total_jan,
				(sum(tf.b_1)+sum(tf.b_2)) as total_feb,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)) as total_mar,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)) as total_apr,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)) as total_mei,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)) as total_jun,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)) as total_jul,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)) as total_agt,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)) as total_sep,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)) as total_okt,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)+sum(tf.b_11)) as total_nop,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)+sum(tf.b_11)+sum(tf.b_12)) as total_des,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)+sum(tf.b_11)+sum(tf.b_12)) as total_target,
				count(tf.tahun) as jumlah_data
			from t_target_fisik tf
			where tf.tahun = '$tahun'
			and tf.kd_rek_1 = 5
			and tf.kd_rek_2 = 2");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	public function gettargetopd()
	{
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}
<<<<<<< HEAD
	  	$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_unit = $this -> input -> get('kd_unit');
	  	$kd_sub = $this -> input -> get('kd_sub');

		$dbPmb = $this->load->database('pmb', TRUE);
        // $dbPmb->query
		$query = $dbPmb->query("select tf.*,
				sum(tf.b_1) as total_jan,
				(sum(tf.b_1)+sum(tf.b_2)) as total_feb,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)) as total_mar,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)) as total_apr,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)) as total_mei,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)) as total_jun,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)) as total_jul,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)) as total_agt,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)) as total_sep,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)) as total_okt,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)+sum(tf.b_11)) as total_nop,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)+sum(tf.b_11)+sum(tf.b_12)) as total_des,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)+sum(tf.b_11)+sum(tf.b_12)) as total_target,
				count(tf.tahun) as jumlah_data
			from t_target_fisik tf
			where tf.tahun = '$tahun'
            	and tf.kd_urusan = '$kd_urusan'
            	and tf.kd_bidang = '$kd_bidang'
            	and tf.kd_unit = '$kd_unit'
            	and tf.kd_sub = '$kd_sub'
				and tf.kd_rek_1 = 5
				and tf.kd_rek_2 = 2");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getsumtargetopd()
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
=======
		$kd_urusan = $this->session->userdata('session')['kd_urusan'];
		$kd_bidang = $this->session->userdata('session')['kd_bidang'];
		$kd_unit = $this->session->userdata('session')['kd_unit'];
		$kd_sub = $this->session->userdata('session')['kd_sub'];
>>>>>>> master

		$dbPmb = $this->load->database('pmb', TRUE);
        // $dbPmb->query
		$query = $dbPmb->query("select tf.*,
				sum(tf.b_1) as total_jan,
				(sum(tf.b_1)+sum(tf.b_2)) as total_feb,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)) as total_mar,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)) as total_apr,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)) as total_mei,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)) as total_jun,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)) as total_jul,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)) as total_agt,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)) as total_sep,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)) as total_okt,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)+sum(tf.b_11)) as total_nop,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)+sum(tf.b_11)+sum(tf.b_12)) as total_des,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)+sum(tf.b_11)+sum(tf.b_12)) as total_target,
				count(tf.tahun) as jumlah_data
			from t_target_fisik tf
			where tf.tahun = '$tahun'
            	and tf.kd_urusan = '$kd_urusan'
            	and tf.kd_bidang = '$kd_bidang'
            	and tf.kd_unit = '$kd_unit'
            	and tf.kd_sub = '$kd_sub'
				and tf.kd_rek_1 = 5
				and tf.kd_rek_2 = 2");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function gettargettriwulan()
	{
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}
<<<<<<< HEAD
	  	$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_unit = $this -> input -> get('kd_unit');
	  	$kd_sub = $this -> input -> get('kd_sub');
=======
		$kd_urusan = $this->session->userdata('session')['kd_urusan'];
		$kd_bidang = $this->session->userdata('session')['kd_bidang'];
		$kd_unit = $this->session->userdata('session')['kd_unit'];
		$kd_sub = $this->session->userdata('session')['kd_sub'];
>>>>>>> master

		$dbPmb = $this->load->database('pmb', TRUE);
        // $dbPmb->query
		$query = $dbPmb->query("select tf.*,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)) as triwulan_1,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)) as triwulan_2,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)) as triwulan_3,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)+sum(tf.b_11)+sum(tf.b_12)) as triwulan_4,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)+sum(tf.b_11)+sum(tf.b_12)) as total_target,
				count(tf.tahun) as jumlah_data
			from t_target_fisik tf
			where tf.tahun = '$tahun'
            	and tf.kd_urusan = '$kd_urusan'
            	and tf.kd_bidang = '$kd_bidang'
            	and tf.kd_unit = '$kd_unit'
            	and tf.kd_sub = '$kd_sub'
				and tf.kd_rek_1 = 5
				and tf.kd_rek_2 = 2");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function gettargetbykegiatan()
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

	  	$dbPmb = $dbPmb->database('pmb', TRUE);
        // $dbPmb->query
		$query = $this->db->query("select tf.*,
				(sum(tf.b_1)+sum(tf.b_2)+sum(tf.b_3)+sum(tf.b_4)+sum(tf.b_5)+sum(tf.b_6)+sum(tf.b_7)+sum(tf.b_8)+sum(tf.b_9)+sum(tf.b_10)+sum(tf.b_11)+sum(tf.b_12)) as total_target,
				count(tf.tahun) as jumlah_data
			from t_target_fisik tf
			where tf.tahun = '$tahun'
				and tf.kd_urusan = '$kd_urusan'
				and tf.kd_bidang = '$kd_bidang'
				and tf.kd_unit = '$kd_unit'
				and tf.kd_sub = '$kd_sub'
				and tf.kd_rek_1 = 5
				and tf.kd_rek_2 = 2
            group by tf.kd_urusan,
            	tf.kd_bidang,
                tf.kd_unit,
                tf.kd_sub,
                tf.kd_prog,
                tf.kd_keg");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdetailtarget()
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

	  	$dbPmb = $dbPmb->database('pmb', TRUE);
        // $dbPmb->query
		$query = $this->db->query("select tf.*,
				(tf.b_1+tf.b_2+tf.b_3+tf.b_4+tf.b_5+tf.b_6+tf.b_7+tf.b_8+tf.b_9+tf.b_10+tf.b_11+tf.b_12) as total_target
			from t_target_fisik tf
			where tf.tahun = '$tahun'
				and tf.kd_urusan = '$kd_urusan'
				and tf.kd_bidang = '$kd_bidang'
				and tf.kd_unit = '$kd_unit'
				and tf.kd_sub = '$kd_sub'
                and tf.kd_prog = '$kd_prog'
                and tf.kd_keg = '$kd_keg'
				and tf.kd_rek_1 = 5
				and tf.kd_rek_2 = 2");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getrinciantarget()
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

		$query = $this->db->query("select ra.*,
                sum(ra.jan) as total_jan,
                sum(ra.feb) as total_feb,
                sum(ra.mar) as total_mar,
                sum(ra.apr) as total_apr,
                sum(ra.mei) as total_mei,
                sum(ra.jun) as total_jun,
                sum(ra.jul) as total_jul,
                sum(ra.agt) as total_agt,
                sum(ra.sep) as total_sep,
                sum(ra.okt) as total_okt,
                sum(ra.nop) as total_nop,
                sum(ra.des) as total_des,
                (ra.jan+ra.feb+ra.mar+ra.apr+ra.mei+ra.jun+ra.jul+ra.agt+ra.sep+ra.okt+ra.nop+ra.des) as total_keuangan,
                count(ra.tahun) as jumlah_data
			from ta_rencana_arsip ra
			where ra.tahun = '$tahun' 
				and ra.kd_urusan = '$kd_urusan'
				and ra.kd_bidang = '$kd_bidang'
				and ra.kd_unit = '$kd_unit'
				and ra.kd_sub = '$kd_sub'
                and ra.kd_prog = '$kd_prog'
                and ra.kd_keg = '$kd_keg'
                and ra.kd_rek_1 = '$kd_rek_1'
                and ra.kd_rek_2 = '$kd_rek_2'
                and ra.kd_rek_3 = '$kd_rek_3'
                and ra.kd_rek_4 = '$kd_rek_4'
                and ra.kd_rek_5 = '$kd_rek_5'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getrealisasiall()
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
		$query = $dbPmb->query("select *,
<<<<<<< HEAD
				(sum(rf.b_1)) as total_jan,
				(sum(rf.b_1)+sum(rf.b_2)) as total_feb,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)) as total_mar,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)) as total_apr,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)) as total_mei,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)) as total_jun,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)) as total_jul,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)) as total_agt,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)) as total_sep,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)) as total_okt,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)+sum(rf.b_11)) as total_nop,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)+sum(rf.b_11)+sum(rf.b_12)) as total_des,
=======
				sum(rf.b_1) as total_jan,
				sum(rf.b_2) as total_feb,
				sum(rf.b_3) as total_mar,
				sum(rf.b_4) as total_apr,
				sum(rf.b_5) as total_mei,
				sum(rf.b_6) as total_jun,
				sum(rf.b_7) as total_jul,
				sum(rf.b_8) as total_agt,
				sum(rf.b_9) as total_sep,
				sum(rf.b_10) as total_okt,
				sum(rf.b_11) as total_nop,
				sum(rf.b_12) as total_des,
>>>>>>> master
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)+sum(rf.b_11)+sum(rf.b_12)) as total_realisasi,
				count(rf.tahun) as jumlah_data
			from t_realisasi_fisik rf
		    where rf.tahun = '$tahun'
				and rf.kd_rek_1 = 5
				and rf.kd_rek_2 = 2");
<<<<<<< HEAD

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getsumrealisasiall()
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
		$query = $dbPmb->query("select *,
				(sum(rf.b_1)) as total_jan,
				(sum(rf.b_1)+sum(rf.b_2)) as total_feb,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)) as total_mar,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)) as total_apr,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)) as total_mei,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)) as total_jun,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)) as total_jul,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)) as total_agt,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)) as total_sep,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)) as total_okt,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)+sum(rf.b_11)) as total_nop,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)+sum(rf.b_11)+sum(rf.b_12)) as total_des,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)+sum(rf.b_11)+sum(rf.b_12)) as total_realisasi,
				count(rf.tahun) as jumlah_data
			from t_realisasi_fisik rf
		    where rf.tahun = '$tahun'
				and rf.kd_rek_1 = 5
				and rf.kd_rek_2 = 2");
=======
>>>>>>> master

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getrealisasiopd()
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

	  	$dbPmb = $this->load->database('pmb', TRUE);
        // $dbPmb->query
		$query = $dbPmb->query("select *,
<<<<<<< HEAD
				(sum(rf.b_1)) as total_jan,
				(sum(rf.b_1)+sum(rf.b_2)) as total_feb,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)) as total_mar,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)) as total_apr,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)) as total_mei,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)) as total_jun,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)) as total_jul,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)) as total_agt,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)) as total_sep,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)) as total_okt,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)+sum(rf.b_11)) as total_nop,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)+sum(rf.b_11)+sum(rf.b_12)) as total_des,
=======
				sum(rf.b_1) as total_jan,
				sum(rf.b_2) as total_feb,
				sum(rf.b_3) as total_mar,
				sum(rf.b_4) as total_apr,
				sum(rf.b_5) as total_mei,
				sum(rf.b_6) as total_jun,
				sum(rf.b_7) as total_jul,
				sum(rf.b_8) as total_agt,
				sum(rf.b_9) as total_sep,
				sum(rf.b_10) as total_okt,
				sum(rf.b_11) as total_nop,
				sum(rf.b_12) as total_des,
>>>>>>> master
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)+sum(rf.b_11)+sum(rf.b_12)) as total_realisasi,
				count(rf.tahun) as jumlah_data
			from t_realisasi_fisik rf
		    where rf.tahun = '$tahun'
            	and rf.kd_urusan = '$kd_urusan'
            	and rf.kd_bidang = '$kd_bidang'
            	and rf.kd_unit = '$kd_unit'
            	and rf.kd_sub = '$kd_sub'
				and rf.kd_rek_1 = 5
				and rf.kd_rek_2 = 2");
<<<<<<< HEAD

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getsumrealisasiopd()
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

	  	$dbPmb = $this->load->database('pmb', TRUE);
        // $dbPmb->query
		$query = $dbPmb->query("select *,
				(sum(rf.b_1)) as total_jan,
				(sum(rf.b_1)+sum(rf.b_2)) as total_feb,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)) as total_mar,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)) as total_apr,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)) as total_mei,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)) as total_jun,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)) as total_jul,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)) as total_agt,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)) as total_sep,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)) as total_okt,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)+sum(rf.b_11)) as total_nop,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)+sum(rf.b_11)+sum(rf.b_12)) as total_des,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)+sum(rf.b_11)+sum(rf.b_12)) as total_realisasi,
				count(rf.tahun) as jumlah_data
			from t_realisasi_fisik rf
		    where rf.tahun = '$tahun'
            	and rf.kd_urusan = '$kd_urusan'
            	and rf.kd_bidang = '$kd_bidang'
            	and rf.kd_unit = '$kd_unit'
            	and rf.kd_sub = '$kd_sub'
				and rf.kd_rek_1 = 5
				and rf.kd_rek_2 = 2");
=======
>>>>>>> master

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getrealisasitriwulan()
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

	  	$dbPmb = $this->load->database('pmb', TRUE);
        // $dbPmb->query
		$query = $dbPmb->query("select *,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)) as triwulan_1,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)) as triwulan_2,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)) as triwulan_3,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)+sum(rf.b_11)+sum(rf.b_12)) as triwulan_4,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)+sum(rf.b_11)+sum(rf.b_12)) as total_realisasi,
				count(rf.tahun) as jumlah_data
			from t_realisasi_fisik rf
		    where rf.tahun = '$tahun'
            	and rf.kd_urusan = '$kd_urusan'
            	and rf.kd_bidang = '$kd_bidang'
            	and rf.kd_unit = '$kd_unit'
            	and rf.kd_sub = '$kd_sub'
				and rf.kd_rek_1 = 5
				and rf.kd_rek_2 = 2");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getrealisasibykegiatan()
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

	  	$dbPmb = $this->load->database('pmb', TRUE);
        // $dbPmb->query
		$query = $dbPmb->query("select *,
				(sum(rf.b_1)+sum(rf.b_2)+sum(rf.b_3)+sum(rf.b_4)+sum(rf.b_5)+sum(rf.b_6)+sum(rf.b_7)+sum(rf.b_8)+sum(rf.b_9)+sum(rf.b_10)+sum(rf.b_11)+sum(rf.b_12)) as total_realisasi
			from t_realisasi_fisik rf
		    where rf.tahun = '$tahun' 
		    group by rf.kd_urusan, 
		    	rf.kd_bidang,
		    	rf.kd_unit,
		    	rf.kd_sub,
		    	rf.kd_prog,
		    	rf.kd_keg");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getrealisasibydetail()
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

	  	$dbPmb = $this->load->database('pmb', TRUE);
        // $dbPmb->query
		$query = $dbPmb->query("select *,
				(rf.b_1+rf.b_2+rf.b_3+rf.b_4+rf.b_5+rf.b_6+rf.b_7+rf.b_8+rf.b_9+rf.b_10+rf.b_11+rf.b_12) as total_realisasi
			from t_realisasi_fisik rf
		    where rf.tahun = '$tahun' 
				and rf.kd_urusan = '$kd_urusan'
				and rf.kd_bidang = '$kd_bidang'
				and rf.kd_unit = '$kd_unit'
				and rf.kd_sub = '$kd_sub'
				and rf.kd_prog = '$kd_prog'
				and rf.kd_keg = '$kd_keg'
				and rf.kd_rek_1 = 5
				and rf.kd_rek_2 = 2
            group by rf.kd_urusan,
            	rf.kd_bidang,
                rf.kd_unit,
                rf.kd_sub,
                rf.kd_prog,
                rf.kd_keg,
            	rf.kd_rek_1,
                rf.kd_rek_2,
                rf.kd_rek_3,
                rf.kd_rek_4,
                rf.kd_rek_5,
                rf.no_rinc,
                rf.no_id");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
<<<<<<< HEAD
	
=======

>>>>>>> master
	public function synckelengkapantarget()
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
		$query = $dbPmb->query("select tf.* 
		from t_target_fisik tf
		where tf.tahun = '$tahun'");

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

						$dbPmb->set('status_target', 1);
						$dbPmb->where($where);
						$dbPmb->update('t_kelengkapan_data');
			  		endforeach;
			  	}
			  	else
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
						'status_target' => 1
						);

					//insert ke database
					$dbPmb->insert('t_kelengkapan_data', $data);
			  	}
			endforeach;

			return true;
		}
		else
		{
			return false;
		}
	}
<<<<<<< HEAD
=======

>>>>>>> master
}