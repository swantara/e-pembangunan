<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasikeuangan_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	// public function getrealisasikeuanganbyopd()
	// {
	// 	$query = $this->db->query("select sp2d.*,
	// 			spm.kd_urusan, spm.kd_bidang, spm.kd_unit, spm.kd_sub,
	// 		    chek.no_cek, chek.tgl_cair, chek.nilai,
 //                sum(chek.nilai) as total_realisasi
	// 		from t_sp2d sp2d
	// 	    inner join t_spm spm on spm.no_spm = sp2d.no_spm
	//     	inner join t_cheque chek on chek.no_sp2d = sp2d.no_sp2d
	// 	    group by spm.kd_urusan, 
	// 	    	spm.kd_bidang, 
	// 	    	spm.kd_unit, 
	// 	    	spm.kd_sub");

	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }

	public function getrealisasikeuanganbyopd()
	{
		$getYear = $this -> input -> get('tahun');
		if(isset($getYear)){
			$tahun = $getYear;
		}
		else{
			$tahun = date('Y');
		}
		
		$query = $this->db->query("select spm.*,
		    sp.*,
		        c.tgl_cair, sum(spm.nilai) as total_realisasi,
				count(c.tahun) as jumlah_data
		from t_spm_rinc spm
		inner join t_sp2d sp on sp.no_spm = spm.no_spm
		inner join t_cheque c on c.no_sp2d = sp.no_sp2d
		where spm.tahun = '$tahun'
		    and spm.kd_rek_1 = 5
		    and concat(spm.kd_urusan, spm.kd_bidang, spm.kd_unit) <> '411' 
			and concat(spm.kd_urusan, spm.kd_bidang, spm.kd_unit) <> '412'
	    group by spm.kd_urusan,
	    	spm.kd_bidang,
	        spm.kd_unit,
	        spm.kd_sub");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	// public function getdetailrealisasikeuangan()
	// {
	// 	$tahun = 2017;
	//   	$kd_urusan = $this -> input -> get('kd_urusan');
	//   	$kd_bidang = $this -> input -> get('kd_bidang');
	//   	$kd_unit = $this -> input -> get('kd_unit');
	//   	$kd_sub = $this -> input -> get('kd_sub');

	// 	$query = $this->db->query("select sp2d.*,
	// 			spm.kd_urusan, spm.kd_bidang, spm.kd_unit, spm.kd_sub,
	// 		    chek.no_cek, chek.tgl_cair, chek.nilai
	// 		from t_sp2d sp2d
	// 	    inner join t_spm spm on spm.no_spm = sp2d.no_spm
	//     	inner join t_cheque chek on chek.no_sp2d = sp2d.no_sp2d
	// 		where sp2d.tahun = '2017' 
	// 			and spm.kd_urusan = '$kd_urusan'
	// 			and spm.kd_bidang = '$kd_bidang'
	// 			and spm.kd_unit = '$kd_unit'
	// 			and spm.kd_sub = '$kd_sub'");

	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }

	public function getrealisasikeuanganbykegiatan()
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

		$query = $this->db->query("select spm.*,
		    sp.*,
		        c.tgl_cair, sum(spm.nilai) as total_realisasi,
				count(c.tahun) as jumlah_data
		from t_spm_rinc spm
		inner join t_sp2d sp on sp.no_spm = spm.no_spm
		inner join t_cheque c on c.no_sp2d = sp.no_sp2d
		where spm.tahun = '$tahun'
			and spm.kd_urusan = '$kd_urusan'
			and spm.kd_bidang = '$kd_bidang'
			and spm.kd_unit = '$kd_unit'
			and spm.kd_sub = '$kd_sub'
		    and spm.kd_rek_1 = 5
		    and concat(spm.kd_urusan, spm.kd_bidang, spm.kd_unit) <> '411' 
			and concat(spm.kd_urusan, spm.kd_bidang, spm.kd_unit) <> '412'
        group by spm.kd_urusan,
        	spm.kd_bidang,
            spm.kd_unit,
            spm.kd_sub,
            spm.kd_prog,
            spm.kd_keg");

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

		$query = $this->db->query("select sp.*,
				spm.*,
				c.tgl_cair, c.nilai as dana_cair, c.keterangan as keterangan_realisasi
			from t_sp2d sp
			inner join t_cheque c on sp.no_sp2d = c.no_sp2d
		    inner join t_spm_rinc spm on sp.no_spm = spm.no_spm
			where spm.tahun = '$tahun'
				and spm.kd_urusan = '$kd_urusan'
				and spm.kd_bidang = '$kd_bidang'
				and spm.kd_unit = '$kd_unit'
				and spm.kd_sub = '$kd_sub'
                and spm.kd_prog = '$kd_prog'
                and spm.kd_keg = '$kd_keg'
				and spm.kd_rek_1 = 5");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdetailrealisasikeuangan()
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

		$query = $this->db->query("select spm.*,
		    sp.*,
		        c.tgl_cair, sum(spm.nilai) as total_realisasi,
				count(c.tahun) as jumlah_data
		from t_spm_rinc spm
		inner join t_sp2d sp on sp.no_spm = spm.no_spm
		inner join t_cheque c on c.no_sp2d = sp.no_sp2d
		where spm.tahun = '$tahun' 
			and spm.kd_urusan = '$kd_urusan'
			and spm.kd_bidang = '$kd_bidang'
			and spm.kd_unit = '$kd_unit'
			and spm.kd_sub = '$kd_sub'
			and spm.kd_prog = '$kd_prog'
			and spm.kd_keg = '$kd_keg'
		    and spm.kd_rek_1 = 5
		    and concat(spm.kd_urusan, spm.kd_bidang, spm.kd_unit) <> '411' 
			and concat(spm.kd_urusan, spm.kd_bidang, spm.kd_unit) <> '412'
        group by spm.kd_urusan,
        	spm.kd_bidang,
            spm.kd_unit,
            spm.kd_sub,
            spm.kd_rek_1,
            spm.kd_rek_2,
            spm.kd_prog,
            spm.kd_keg,
            spm.kd_rek_3,
            spm.kd_rek_4,
            spm.kd_rek_5");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getrincianrealisasikeuangan()
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

		$query = $this->db->query("select sp.*,
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
			from t_sp2d sp
			inner join t_cheque c on sp.no_sp2d = c.no_sp2d
		    inner join t_spm_rinc spm on sp.no_spm = spm.no_spm
			where spm.tahun = '$tahun' 
				and spm.kd_urusan = '$kd_urusan'
				and spm.kd_bidang = '$kd_bidang'
				and spm.kd_unit = '$kd_unit'
				and spm.kd_sub = '$kd_sub'
                and spm.kd_prog = '$kd_prog'
                and spm.kd_keg = '$kd_keg'
                and spm.kd_rek_1 = '$kd_rek_1'
                and spm.kd_rek_2 = '$kd_rek_2'
                and spm.kd_rek_3 = '$kd_rek_3'
                and spm.kd_rek_4 = '$kd_rek_4'
                and spm.kd_rek_5 = '$kd_rek_5'");

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
		$query = $this->db->query("select ra.*,
				(sum(ra.jan)+sum(ra.feb)+sum(ra.mar)+sum(ra.apr)+sum(ra.mei)+sum(ra.jun)+sum(ra.jul)+sum(ra.agt)+sum(ra.sep)+sum(ra.okt)+sum(ra.nop)+sum(ra.des)) as total_target,
				count(ra.tahun) as jumlah_data
			from t_rencana_arsip ra
			where ra.tahun = '$tahun'
				and ra.kd_rek_1 = 5
				and concat(ra.kd_urusan, ra.kd_bidang, ra.kd_unit) <> '411' 
				and concat(ra.kd_urusan, ra.kd_bidang, ra.kd_unit) <> '412'
				and ra.kd_perubahan = 4
            group by ra.kd_urusan,
            	ra.kd_bidang,
                ra.kd_unit,
                ra.kd_sub");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdetailtargetlist()
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

		$query = $this->db->query("select ra.*,
				(ra.jan+ra.feb+ra.mar+ra.apr+ra.mei+ra.jun+ra.jul+ra.agt+ra.sep+ra.okt+ra.nop+ra.des) as total_target
			from t_rencana_arsip ra
			where ra.tahun = '$tahun'
				and ra.kd_urusan = '$kd_urusan'
				and ra.kd_bidang = '$kd_bidang'
				and ra.kd_unit = '$kd_unit'
				and ra.kd_sub = '$kd_sub'
                and ra.kd_prog = '$kd_prog'
                and ra.kd_keg = '$kd_keg'
				and ra.kd_rek_1 = 5
				and ra.kd_perubahan = 4");

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
				(sum(ra.jan)+sum(ra.feb)+sum(ra.mar)+sum(ra.apr)+sum(ra.mei)+sum(ra.jun)+sum(ra.jul)+sum(ra.agt)+sum(ra.sep)+sum(ra.okt)+sum(ra.nop)+sum(ra.des)) as total_target,
				count(ra.tahun) as jumlah_data
			from t_rencana_arsip ra
			where ra.tahun = '$tahun'
				and ra.kd_rek_1 = 5
				and concat(ra.kd_urusan, ra.kd_bidang, ra.kd_unit) <> '411' 
				and concat(ra.kd_urusan, ra.kd_bidang, ra.kd_unit) <> '412'
				and ra.kd_perubahan = 4");

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

		$query = $this->db->query("select ra.*,
                sum(ra.jan)/1000000000 as total_jan,
                sum(ra.feb)/1000000000 as total_feb,
                sum(ra.mar)/1000000000 as total_mar,
                sum(ra.apr)/1000000000 as total_apr,
                sum(ra.mei)/1000000000 as total_mei,
                sum(ra.jun)/1000000000 as total_jun,
                sum(ra.jul)/1000000000 as total_jul,
                sum(ra.agt)/1000000000 as total_agt,
                sum(ra.sep)/1000000000 as total_sep,
                sum(ra.okt)/1000000000 as total_okt,
                sum(ra.nop)/1000000000 as total_nop,
                sum(ra.des)/1000000000 as total_des,
				(sum(ra.jan)+sum(ra.feb)+sum(ra.mar)+sum(ra.apr)+sum(ra.mei)+sum(ra.jun)+sum(ra.jul)+sum(ra.agt)+sum(ra.sep)+sum(ra.okt)+sum(ra.nop)+sum(ra.des))/1000000000 as total_target,
				count(ra.tahun) as jumlah_data
			from t_rencana_arsip ra
			where ra.tahun = '$tahun'
				and ra.kd_rek_1 = 5
				and concat(ra.kd_urusan, ra.kd_bidang, ra.kd_unit) <> '411' 
				and concat(ra.kd_urusan, ra.kd_bidang, ra.kd_unit) <> '412'
				and ra.kd_perubahan = 4");

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
	  	$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_unit = $this -> input -> get('kd_unit');
	  	$kd_sub = $this -> input -> get('kd_sub');
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
				(sum(ra.jan)+sum(ra.feb)+sum(ra.mar)+sum(ra.apr)+sum(ra.mei)+sum(ra.jun)+sum(ra.jul)+sum(ra.agt)+sum(ra.sep)+sum(ra.okt)+sum(ra.nop)+sum(ra.des)) as total_target
			from t_rencana_arsip ra
			where ra.tahun = '$tahun'
            	and ra.kd_urusan = '$kd_urusan'
            	and ra.kd_bidang = '$kd_bidang'
            	and ra.kd_unit = '$kd_unit'
            	and ra.kd_sub = '$kd_sub'
				and ra.kd_rek_1 = 5
				and ra.kd_perubahan = 4");

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
		$query = $this->db->query("select ra.*,
                sum(ra.jan)/1000000 as total_jan,
                sum(ra.feb)/1000000 as total_feb,
                sum(ra.mar)/1000000 as total_mar,
                sum(ra.apr)/1000000 as total_apr,
                sum(ra.mei)/1000000 as total_mei,
                sum(ra.jun)/1000000 as total_jun,
                sum(ra.jul)/1000000 as total_jul,
                sum(ra.agt)/1000000 as total_agt,
                sum(ra.sep)/1000000 as total_sep,
                sum(ra.okt)/1000000 as total_okt,
                sum(ra.nop)/1000000 as total_nop,
                sum(ra.des)/1000000 as total_des,
				(sum(ra.jan)+sum(ra.feb)+sum(ra.mar)+sum(ra.apr)+sum(ra.mei)+sum(ra.jun)+sum(ra.jul)+sum(ra.agt)+sum(ra.sep)+sum(ra.okt)+sum(ra.nop)+sum(ra.des))/1000000 as total_target
			from t_rencana_arsip ra
			where ra.tahun = '$tahun'
            	and ra.kd_urusan = '$kd_urusan'
            	and ra.kd_bidang = '$kd_bidang'
            	and ra.kd_unit = '$kd_unit'
            	and ra.kd_sub = '$kd_sub'
				and ra.kd_rek_1 = 5
				and ra.kd_perubahan = 4");

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
	  	$kd_urusan = $this -> input -> get('kd_urusan');
	  	$kd_bidang = $this -> input -> get('kd_bidang');
	  	$kd_unit = $this -> input -> get('kd_unit');
	  	$kd_sub = $this -> input -> get('kd_sub');
		$query = $this->db->query("select ra.*,
                (sum(ra.jan)+sum(ra.feb)+sum(ra.mar)) as triwulan_1,
                (sum(ra.apr)+sum(ra.mei)+sum(ra.jun)) as triwulan_2,
                (sum(ra.jul)+sum(ra.agt)+sum(ra.sep)) as triwulan_3,
                (sum(ra.okt)+sum(ra.nop)+sum(ra.des)) as triwulan_4,
				(sum(ra.jan)+sum(ra.feb)+sum(ra.mar)+sum(ra.apr)+sum(ra.mei)+sum(ra.jun)+sum(ra.jul)+sum(ra.agt)+sum(ra.sep)+sum(ra.okt)+sum(ra.nop)+sum(ra.des)) as total_target,
				count(ra.tahun) as jumlah_data
			from t_rencana_arsip ra
			where ra.tahun = '$tahun'
            	and ra.kd_urusan = '$kd_urusan'
            	and ra.kd_bidang = '$kd_bidang'
            	and ra.kd_unit = '$kd_unit'
            	and ra.kd_sub = '$kd_sub'
				and ra.kd_rek_1 = 5
				and ra.kd_perubahan = 4");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getsumtargettriwulan()
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
		$query = $this->db->query("select ra.*,
                (sum(ra.jan)+sum(ra.feb)+sum(ra.mar))/1000000 as triwulan_1,
                (sum(ra.apr)+sum(ra.mei)+sum(ra.jun))/1000000 as triwulan_2,
                (sum(ra.jul)+sum(ra.agt)+sum(ra.sep))/1000000 as triwulan_3,
                (sum(ra.okt)+sum(ra.nop)+sum(ra.des))/1000000 as triwulan_4,
				(sum(ra.jan)+sum(ra.feb)+sum(ra.mar)+sum(ra.apr)+sum(ra.mei)+sum(ra.jun)+sum(ra.jul)+sum(ra.agt)+sum(ra.sep)+sum(ra.okt)+sum(ra.nop)+sum(ra.des))/1000000 as total_target,
				count(ra.tahun) as jumlah_data
			from t_rencana_arsip ra
			where ra.tahun = '$tahun'
            	and ra.kd_urusan = '$kd_urusan'
            	and ra.kd_bidang = '$kd_bidang'
            	and ra.kd_unit = '$kd_unit'
            	and ra.kd_sub = '$kd_sub'
				and ra.kd_rek_1 = 5
				and ra.kd_perubahan = 4");

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

		$query = $this->db->query("select ra.*,
				(sum(ra.jan)+sum(ra.feb)+sum(ra.mar)+sum(ra.apr)+sum(ra.mei)+sum(ra.jun)+sum(ra.jul)+sum(ra.agt)+sum(ra.sep)+sum(ra.okt)+sum(ra.nop)+sum(ra.des)) as total_target,
				count(ra.tahun) as jumlah_data
			from t_rencana_arsip ra
			where ra.tahun = '$tahun' 
				and ra.kd_urusan = '$kd_urusan'
				and ra.kd_bidang = '$kd_bidang'
				and ra.kd_unit = '$kd_unit'
				and ra.kd_sub = '$kd_sub'
				and ra.kd_rek_1 = 5
				and ra.kd_perubahan = 4
            group by ra.kd_urusan,
            	ra.kd_bidang,
                ra.kd_unit,
                ra.kd_sub,
                ra.kd_prog,
                ra.kd_keg");

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
				count(ra.tahun) as jumlah_data
			from t_rencana_arsip ra
			where ra.tahun = '$tahun' 
				and ra.kd_urusan = '$kd_urusan'
				and ra.kd_bidang = '$kd_bidang'
				and ra.kd_unit = '$kd_unit'
				and ra.kd_sub = '$kd_sub'
                and ra.kd_prog = '$kd_prog'
                and ra.kd_keg = '$kd_keg'
				and ra.kd_rek_1 = 5");

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
                (ra.jan+ra.feb+ra.mar+ra.apr+ra.mei+ra.jun+ra.jul+ra.agt+ra.sep+ra.okt+ra.nop+ra.des) as total_keuangan
			from t_rencana_arsip ra
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

	public function getdetailrealisasikeuanganbykegiatan()
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

		$query = $this->db->query("select sp.*,
				c.tgl_cair,
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
			from t_sp2d sp
			inner join t_cheque c on sp.no_sp2d = c.no_sp2d
		    inner join t_spm_rinc spm on sp.no_spm = spm.no_spm
			where spm.tahun = '$tahun' 
				and spm.kd_urusan = '$kd_urusan'
				and spm.kd_bidang = '$kd_bidang'
				and spm.kd_unit = '$kd_unit'
				and spm.kd_sub = '$kd_sub'
				and spm.kd_prog = '$kd_prog'
				and spm.kd_keg = '$kd_keg'
				and spm.kd_rek_1 = 5");

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

		$query = $this->db->query("select spm.*,
		    sp.*,
		        c.tgl_cair,
		        sum(case when month(c.tgl_cair) = 1 then spm.nilai else 0 end) as total_jan,
				sum(case when month(c.tgl_cair) = 2 then spm.nilai else 0 end) as total_feb,
				sum(case when month(c.tgl_cair) = 3 then spm.nilai else 0 end) as total_mar,
				sum(case when month(c.tgl_cair) = 4 then spm.nilai else 0 end) as total_apr,
				sum(case when month(c.tgl_cair) = 5 then spm.nilai else 0 end) as total_mei,
				sum(case when month(c.tgl_cair) = 6 then spm.nilai else 0 end) as total_jun,
				sum(case when month(c.tgl_cair) = 7 then spm.nilai else 0 end) as total_jul,
				sum(case when month(c.tgl_cair) = 8 then spm.nilai else 0 end) as total_agt,
				sum(case when month(c.tgl_cair) = 9 then spm.nilai else 0 end) as total_sep,
				sum(case when month(c.tgl_cair) = 10 then spm.nilai else 0 end) as total_okt,
				sum(case when month(c.tgl_cair) = 11 then spm.nilai else 0 end) as total_nop,
				sum(case when month(c.tgl_cair) = 12 then spm.nilai else 0 end) as total_des,
				(sum(case when month(c.tgl_cair) = 1 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 2 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 3 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 4 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 5 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 6 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 7 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 8 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 9 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 10 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 11 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 12 then spm.nilai else 0 end)) as total_realisasi,
				count(c.tahun) as jumlah_data
		from t_spm_rinc spm
		inner join t_sp2d sp on sp.no_spm = spm.no_spm
		inner join t_cheque c on c.no_sp2d = sp.no_sp2d
		where spm.tahun = '$tahun'
		    and spm.kd_rek_1 = 5
		    and concat(spm.kd_urusan, spm.kd_bidang, spm.kd_unit) <> '411' 
			and concat(spm.kd_urusan, spm.kd_bidang, spm.kd_unit) <> '412'");

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

		$query = $this->db->query("select spm.*,
		    sp.*,
		        c.tgl_cair,
		        sum(case when month(c.tgl_cair) = 1 then spm.nilai else 0 end)/1000000000 as total_jan,
				sum(case when month(c.tgl_cair) = 2 then spm.nilai else 0 end)/1000000000 as total_feb,
				sum(case when month(c.tgl_cair) = 3 then spm.nilai else 0 end)/1000000000 as total_mar,
				sum(case when month(c.tgl_cair) = 4 then spm.nilai else 0 end)/1000000000 as total_apr,
				sum(case when month(c.tgl_cair) = 5 then spm.nilai else 0 end)/1000000000 as total_mei,
				sum(case when month(c.tgl_cair) = 6 then spm.nilai else 0 end)/1000000000 as total_jun,
				sum(case when month(c.tgl_cair) = 7 then spm.nilai else 0 end)/1000000000 as total_jul,
				sum(case when month(c.tgl_cair) = 8 then spm.nilai else 0 end)/1000000000 as total_agt,
				sum(case when month(c.tgl_cair) = 9 then spm.nilai else 0 end)/1000000000 as total_sep,
				sum(case when month(c.tgl_cair) = 10 then spm.nilai else 0 end)/1000000000 as total_okt,
				sum(case when month(c.tgl_cair) = 11 then spm.nilai else 0 end)/1000000000 as total_nop,
				sum(case when month(c.tgl_cair) = 12 then spm.nilai else 0 end)/1000000000 as total_des,
				(sum(case when month(c.tgl_cair) = 1 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 2 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 3 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 4 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 5 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 6 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 7 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 8 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 9 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 10 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 11 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 12 then spm.nilai else 0 end))/1000000000 as total_realisasi,
				count(c.tahun) as jumlah_data
		from t_spm_rinc spm
		inner join t_sp2d sp on sp.no_spm = spm.no_spm
		inner join t_cheque c on c.no_sp2d = sp.no_sp2d
		where spm.tahun = '$tahun'
		    and spm.kd_rek_1 = 5
		    and concat(spm.kd_urusan, spm.kd_bidang, spm.kd_unit) <> '411' 
			and concat(spm.kd_urusan, spm.kd_bidang, spm.kd_unit) <> '412'");

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

		$query = $this->db->query("select spm.*,
		    sp.*,
		        c.tgl_cair,
		        sum(case when month(c.tgl_cair) = 1 then spm.nilai else 0 end) as total_jan,
				sum(case when month(c.tgl_cair) = 2 then spm.nilai else 0 end) as total_feb,
				sum(case when month(c.tgl_cair) = 3 then spm.nilai else 0 end) as total_mar,
				sum(case when month(c.tgl_cair) = 4 then spm.nilai else 0 end) as total_apr,
				sum(case when month(c.tgl_cair) = 5 then spm.nilai else 0 end) as total_mei,
				sum(case when month(c.tgl_cair) = 6 then spm.nilai else 0 end) as total_jun,
				sum(case when month(c.tgl_cair) = 7 then spm.nilai else 0 end) as total_jul,
				sum(case when month(c.tgl_cair) = 8 then spm.nilai else 0 end) as total_agt,
				sum(case when month(c.tgl_cair) = 9 then spm.nilai else 0 end) as total_sep,
				sum(case when month(c.tgl_cair) = 10 then spm.nilai else 0 end) as total_okt,
				sum(case when month(c.tgl_cair) = 11 then spm.nilai else 0 end) as total_nop,
				sum(case when month(c.tgl_cair) = 12 then spm.nilai else 0 end) as total_des,
				(sum(case when month(c.tgl_cair) = 1 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 2 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 3 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 4 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 5 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 6 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 7 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 8 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 9 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 10 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 11 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 12 then spm.nilai else 0 end)) as total_realisasi,
				count(c.tahun) as jumlah_data
		from t_spm_rinc spm
		inner join t_sp2d sp on sp.no_spm = spm.no_spm
		inner join t_cheque c on c.no_sp2d = sp.no_sp2d
		where spm.tahun = '$tahun'
		    and spm.kd_rek_1 = 5
			and spm.kd_urusan = '$kd_urusan'
			and spm.kd_bidang = '$kd_bidang'
			and spm.kd_unit = '$kd_unit'
			and spm.kd_sub = '$kd_sub'");

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

		$query = $this->db->query("select spm.*,
		    sp.*,
	        c.tgl_cair,
	        sum(case when month(c.tgl_cair) = 1 then spm.nilai else 0 end)/1000000000 as total_jan,
			sum(case when month(c.tgl_cair) = 2 then spm.nilai else 0 end)/1000000000 as total_feb,
			sum(case when month(c.tgl_cair) = 3 then spm.nilai else 0 end)/1000000000 as total_mar,
			sum(case when month(c.tgl_cair) = 4 then spm.nilai else 0 end)/1000000000 as total_apr,
			sum(case when month(c.tgl_cair) = 5 then spm.nilai else 0 end)/1000000000 as total_mei,
			sum(case when month(c.tgl_cair) = 6 then spm.nilai else 0 end)/1000000000 as total_jun,
			sum(case when month(c.tgl_cair) = 7 then spm.nilai else 0 end)/1000000000 as total_jul,
			sum(case when month(c.tgl_cair) = 8 then spm.nilai else 0 end)/1000000000 as total_agt,
			sum(case when month(c.tgl_cair) = 9 then spm.nilai else 0 end)/1000000000 as total_sep,
			sum(case when month(c.tgl_cair) = 10 then spm.nilai else 0 end)/1000000000 as total_okt,
			sum(case when month(c.tgl_cair) = 11 then spm.nilai else 0 end)/1000000000 as total_nop,
			sum(case when month(c.tgl_cair) = 12 then spm.nilai else 0 end)/1000000000 as total_des,
			(sum(case when month(c.tgl_cair) = 1 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 2 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 3 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 4 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 5 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 6 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 7 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 8 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 9 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 10 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 11 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 12 then spm.nilai else 0 end))/1000000000 as total_realisasi,
			count(c.tahun) as jumlah_data
		from t_spm_rinc spm
		inner join t_sp2d sp on sp.no_spm = spm.no_spm
		inner join t_cheque c on c.no_sp2d = sp.no_sp2d
		where spm.tahun = '$tahun'
		    and spm.kd_rek_1 = 5
			and spm.kd_urusan = '$kd_urusan'
			and spm.kd_bidang = '$kd_bidang'
			and spm.kd_unit = '$kd_unit'
			and spm.kd_sub = '$kd_sub'");

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

		$query = $this->db->query("select spm.*,
	    sp.*,
	        c.tgl_cair,
			(sum(case when month(c.tgl_cair) = 1 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 2 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 3 then spm.nilai else 0 end)) as triwulan_1,
			(sum(case when month(c.tgl_cair) = 4 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 5 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 6 then spm.nilai else 0 end)) as triwulan_2,
			(sum(case when month(c.tgl_cair) = 7 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 8 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 9 then spm.nilai else 0 end)) as triwulan_3,
			(sum(case when month(c.tgl_cair) = 10 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 11 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 12 then spm.nilai else 0 end)) as triwulan_4,
			(sum(case when month(c.tgl_cair) = 1 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 2 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 3 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 4 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 5 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 6 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 7 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 8 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 9 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 10 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 11 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 12 then spm.nilai else 0 end)) as total_realisasi,
			count(c.tahun) as jumlah_data
		from t_spm_rinc spm
		inner join t_sp2d sp on sp.no_spm = spm.no_spm
		inner join t_cheque c on c.no_sp2d = sp.no_sp2d
		where spm.tahun = '$tahun'
		    and spm.kd_rek_1 = 5
		    and concat(spm.kd_urusan, spm.kd_bidang, spm.kd_unit) <> '411' 
			and concat(spm.kd_urusan, spm.kd_bidang, spm.kd_unit) <> '412'
			and spm.kd_urusan = '$kd_urusan'
			and spm.kd_bidang = '$kd_bidang'
			and spm.kd_unit = '$kd_unit'
			and spm.kd_sub = '$kd_sub'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getsumrealisasitriwulan()
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

		$query = $this->db->query("select spm.*,
	    sp.*,
	        c.tgl_cair,
			(sum(case when month(c.tgl_cair) = 1 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 2 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 3 then spm.nilai else 0 end))/1000000000 as triwulan_1,
			(sum(case when month(c.tgl_cair) = 4 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 5 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 6 then spm.nilai else 0 end))/1000000000 as triwulan_2,
			(sum(case when month(c.tgl_cair) = 7 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 8 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 9 then spm.nilai else 0 end))/1000000000 as triwulan_3,
			(sum(case when month(c.tgl_cair) = 10 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 11 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 12 then spm.nilai else 0 end))/1000000000 as triwulan_4,
			(sum(case when month(c.tgl_cair) = 1 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 2 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 3 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 4 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 5 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 6 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 7 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 8 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 9 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 10 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 11 then spm.nilai else 0 end)+sum(case when month(c.tgl_cair) = 12 then spm.nilai else 0 end))/1000000000 as total_realisasi,
			count(c.tahun) as jumlah_data
		from t_spm_rinc spm
		inner join t_sp2d sp on sp.no_spm = spm.no_spm
		inner join t_cheque c on c.no_sp2d = sp.no_sp2d
		where spm.tahun = '$tahun'
		    and spm.kd_rek_1 = 5
		    and concat(spm.kd_urusan, spm.kd_bidang, spm.kd_unit) <> '411' 
			and concat(spm.kd_urusan, spm.kd_bidang, spm.kd_unit) <> '412'
			and spm.kd_urusan = '$kd_urusan'
			and spm.kd_bidang = '$kd_bidang'
			and spm.kd_unit = '$kd_unit'
			and spm.kd_sub = '$kd_sub'");

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