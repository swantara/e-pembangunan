<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Web
	 * 
	 * untuk check login dari database
	 */
	public function login($username)
  	{
		$query = $this->db->query("select * from t_user u where u.username='$username' and u.status <> 0");

		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
  	}

	public function getuser()
	{
		$query = $this->db->query("select u.*,
			r.nama as role_user
		from t_user u
		inner join m_role r on r.id = u.role
		where u.status <> 0");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getrole()
	{
		$query = $this->db->query("select * from m_role r");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function geturusan()
	{
		$query = $this->db->query("select * from m_urusan u");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getbidang()
	{
		$query = $this->db->query("select * from m_bidang b");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getunit()
	{
		$query = $this->db->query("select * from m_unit u");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getsub()
	{
		$query = $this->db->query("select * from m_sub_unit s");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdetailuser($id)
	{
		$query = $this->db->query("select u.*,
			r.nama as role_user
		from t_user u
		inner join m_role r on r.id = u.role
		where u.id = '$id'
			and u.status <> 0");

		if($query->num_rows() == 1)
		{
			return $query->result()[0];
		}
		else
		{
			return false;
		}
	}

	/**
	 * Web
	 * 
	 * untuk menginput user
	 */
	public function simpan()
	{
		$data = array(
		  'kd_urusan' => $this -> input -> post('kd_urusan'),
		  'kd_bidang' => $this -> input -> post('kd_bidang'),
		  'kd_unit' => $this -> input -> post('kd_unit'),
		  'kd_sub' => $this -> input -> post('kd_sub'),
		  'username' => $this -> input -> post('username'),
		  'nama' => $this -> input -> post('nama'),
		  'role' => $this -> input -> post('role'),
		  'password' => password_hash($this -> input -> post('password'), PASSWORD_BCRYPT)
		  );

		//insert ke database
		// $this->db->set('created_at', 'now()', false);
		// $this->db->set('created_by', $this->session->userdata('nlvsess')['admin_id']);
		$this->db->insert('t_user', $data);
		$lastid = $this->db->insert_id();

		if($_FILES['foto']['error'] != 4)
		{
			//bila mengubah foto
			
			//upload foto
			$this->uploadfoto($lastid);
		}

		$this->session->set_flashdata('alert','save');
		return true;
	}

	public function edit($id)
	{
		if($this -> input -> post('pass') != "")
		{
			$data = array(
			  'kd_urusan' => $this -> input -> post('kd_urusan'),
			  'kd_bidang' => $this -> input -> post('kd_bidang'),
			  'kd_unit' => $this -> input -> post('kd_unit'),
			  'kd_sub' => $this -> input -> post('kd_sub'),
			  'username' => $this -> input -> post('username'),
			  'nama' => $this -> input -> post('nama'),
			  'role' => $this -> input -> post('role'),
			  'password' => password_hash($this -> input -> post('password'), PASSWORD_BCRYPT)
			  );
		}
		else
		{
			$data = array(
			  'kd_urusan' => $this -> input -> post('kd_urusan'),
			  'kd_bidang' => $this -> input -> post('kd_bidang'),
			  'kd_unit' => $this -> input -> post('kd_unit'),
			  'kd_sub' => $this -> input -> post('kd_sub'),
			  'username' => $this -> input -> post('username'),
			  'nama' => $this -> input -> post('nama'),
			  'role' => $this -> input -> post('role')
			  );
		}

		$sess_array = array();
		$sess_array = array(
			'kd_urusan' => $this -> input -> post('kd_urusan'),
			'kd_bidang' => $this -> input -> post('kd_bidang'),
			'kd_unit' => $this -> input -> post('kd_unit'),
			'kd_sub' => $this -> input -> post('kd_sub'),
			'username' => $this -> input -> post('username'),
			'name' => $this -> input -> post('nama'),
			'role' => $this -> input -> post('role')
			);
		$this->session->set_userdata('session', $sess_array);

		if($_FILES['foto']['error'] != 4)
		{
			//bila mengubah foto
			
			//upload foto
			$this->uploadfoto($id);
		}

		//insert ke database
		// $this->db->set('updated_at', 'now()', false);
		// $this->db->set('updated_by', $this->session->userdata('nlvsess')['admin_id']);
		$this->db->where('id', $id);
		$this->db->update('t_user', $data);

		$this->session->set_flashdata('alert','update');
		return true;
	}

	public function delete($id)
	{
		//insert ke database
		$this->db->set('status', 0);
		$this->db->where('id', $id);
		$this->db->update('t_user');

		$this->session->set_flashdata('alert','delete');
		return true;
	}

	private function uploadfoto($id)
	{
		//proses upload foto

		//mengambil data foto dan mengganti filenamenya sesuai id
		$arrayname = explode(".", $_FILES['foto']['name']);
		$ext = end($arrayname);
		$newfilename = 'img-'.$id.'.'.$ext;

		//fungsi upload foto
		$config['upload_path']      = './assets/images/user/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['file_name']        = $newfilename;
        $config['overwrite']        = true;
        $this->load->library('upload');
		$this->upload->initialize($config);

		if ($this->upload->do_upload('foto'))
        {
        	//bila berhasil update data path foto sebelumnya
        	$this->db->set('foto', $newfilename);
			$this->db->where('id', $id);
			$this->db->update('t_user');
        }
	}
}