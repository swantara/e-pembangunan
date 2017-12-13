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
		$query = $this->db->query("select * from t_user u where u.status <> 0");

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
		$query = $this->db->query("select * from t_user u where u.id=$id and u.status <> 0");

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
	public function save()
	{
		$data = array(
		  'admin_email' => $this -> input -> post('email'),
		  'admin_pass' => password_hash($this -> input -> post('pass'), PASSWORD_BCRYPT),
		  'admin_name' => $this -> input -> post('name'),
		  'admin_role' => $this -> input -> post('role')
		  );

		//insert ke database
		$this->db->set('created_at', 'now()', false);
		$this->db->set('created_by', $this->session->userdata('nlvsess')['admin_id']);
		$this->db->insert('admins', $data);

		$this->session->set_flashdata('alert','save');
		return true;
	}

	public function update($id)
	{
		if($this -> input -> post('pass') != "")
		{
			$data = array(
			  'admin_pass' => password_hash($this -> input -> post('pass'), PASSWORD_BCRYPT),
			  'admin_name' => $this -> input -> post('name'),
			  'admin_role' => $this -> input -> post('role')
			  );
		}
		else
		{
			$data = array(
			  'admin_name' => $this -> input -> post('name'),
			  'admin_role' => $this -> input -> post('role')
			  );
		}

		//insert ke database
		$this->db->set('updated_at', 'now()', false);
		$this->db->set('updated_by', $this->session->userdata('nlvsess')['admin_id']);
		$this->db->where('admin_id', $id);
		$this->db->update('admins', $data);

		$this->session->set_flashdata('alert','update');
		return true;
	}

	public function delete($id)
	{
		//insert ke database
		$this->db->set('deleted_at', 'now()', false);
		$this->db->set('deleted_by', $this->session->userdata('nlvsess')['admin_id']);
		$this->db->where('admin_id', $id);
		$this->db->update('admins');

		$this->session->set_flashdata('alert','delete');
		return true;
	}
}