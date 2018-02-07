<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model {

	public function kode_cust(){
		$this->db->select_max('id_customer');
		return $this->db->get('customer')->row();
	}

	public function simpan(){
		$data=array(
			'id_customer' => $this->input->post('id_customer'),
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'phone' => $this->input->post('phone'),
			'gender' => $this->input->post('gender')
		);
		$this->db->insert('customer', $data);
	}

	public function updatecustomer($id_customer,$data){
		$this->db->where('id_customer', $id_customer);
		return $this->db->update('customer', $data);
	}

	public function view_customer($config){
		$hasilquery=$this->db->get('customer', $config['per_page'], $this->uri->segment(3));

		if ($hasilquery->num_rows() > 0) {
			foreach($hasilquery->result() as $value){
				$data[]=$value;
			}
			return $data;
		}
	}

	public function hapus_customer($id_customer){
		$this->db->where('id_customer', $id_customer);
		$this->db->delete('customer');
	}

	public function edit_customer($id_customer){
		$this->db->where('id_customer', $id_customer);
		$this->db->limit(1);
		return $this->db->get('customer')->result_array();
	   }

	function simpanuser(){
		$data=array(
			'id_user' => $this->input->post('id_user'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'fullname' => $this->input->post('fullname'),
			'level' => $this->input->post('level')
		);
		$this->db->insert('user', $data);
	}

	public function updateuser($id_user,$data){
		$this->db->where('id_user', $id_user);
		return $this->db->update('user', $data);
	}

	public function view_user($config){

		$query = $this->db->get('user',$config['per_page'], $this->uri->segment(3));
		return $query->result();
		
	}

	function hapus_user($id_user){
		$this->db->where('id_user', $id_user);
		$this->db->delete('user');
}
	function edit_user($id_user){
		$this->db->where('id_user', $id_user);
		$this->db->limit(1);
		return $this->db->get('user')->result_array();
	}


	function kode_user(){
		$this->db->select_max('id_user');
		return $this->db->get('user')->row();
	}


}