<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getkontrak()
	{
		$query = $this->db->query("select k.*,
			mjp.nama as ket_jenis_pengadaan
		from t_kontrak k
		inner join m_jenis_pengadaan mjp on mjp.id = k.jenis_pengadaan
		where k.tahun = 2017
			and k.metode_pengadaan = 2");

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

	public function getnamakegiatan()
	{
		$tahun = 2017;
	  	$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_prog = $this -> input -> get('kd_prog');
	  	$kd_keg = $this -> input -> get('kd_keg');

		$query = $this->db->query("select mk.* 
		from m_kegiatan mk
		where mk.kd_urusan = '$kd_urusan'
			and mk.kd_bidang = '$kd_bidang'
			and mk.kd_prog = '$kd_prog'
			and mk.kd_keg = '$kd_keg'");

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
		where tra.tahun = '2017' 
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

	public function getanggaraninduk()
	{
		$tahun = 2017;
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
		$tahun = 2017;
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