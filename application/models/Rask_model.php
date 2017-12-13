<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rask_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getkegiatan()
	{
		$query = $this->db->query("select tra.*, 
			sum(case when tra.kd_perubahan = 4 then tra.total else 0 end) as total_induk,
			sum(case when tra.kd_perubahan = 6 then tra.total else 0 end) as total_perubahan 
		from t_rask_arsip as tra 
		where tra.tahun = 2017
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
}