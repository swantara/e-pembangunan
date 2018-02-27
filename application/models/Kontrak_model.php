<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getkontrak()
	{
		$dbPmb = $this->load->database('pmb', TRUE);
        // $dbPmb->query
		$query = $dbPmb->query("select k.*,
			mjp.nama as ket_jenis_pengadaan
		from t_kontrak k
		inner join m_jenis_pengadaan mjp on mjp.id = k.jenis_pengadaan
		where k.tahun = 2017
			and k.metode_pengadaan = 2
			and k.kd_rek_1 = 5
			and k.kd_rek_2 = 2");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdetailkontrak()
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

	  	$dbPmb = $this->load->database('pmb', TRUE);
        // $dbPmb->query
		$query = $dbPmb->query("select k.*,
			mjp.nama as ket_jenis_pengadaan
		from t_kontrak k
		inner join m_jenis_pengadaan mjp on mjp.id = k.jenis_pengadaan
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
		from ref_kegiatan mk");

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
		from ref_kegiatan mk
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
		from ta_rask_arsip as tra 
		where tra.tahun = '$tahun' 
			and tra.kd_urusan = '$kd_urusan'
			and tra.kd_bidang = '$kd_bidang'
			and tra.kd_unit = '$kd_unit'
			and tra.kd_sub = '$kd_sub'
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
		from ta_rask_arsip as tra 
		where tra.tahun = '2017' 
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
	
	public function synckelengkapanpengadaan()
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
		$query = $dbPmb->query("select k.* 
		from t_kontrak k
		where k.tahun = '$tahun'");

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

						$dbPmb->set('status_pengadaan', 1);
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
						'status_pengadaan' => 1
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
}