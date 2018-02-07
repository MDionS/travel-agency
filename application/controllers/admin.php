<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->database();
		$this->load->model('Admin_Model');
	}
	public function index()
	{
		$data['customer'] = $this->Admin_Model->kode_cust();
		$this->load->view('/template/header');
		$this->load->view('/template/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('/template/footer');
	}

	public function tambah(){
		$data=array();
		if ($this->input->post('submit')) {
			$this->Admin_Model->simpan();
			$this->session->set_flashdata('success_msg', 'Berhasil Di Tambah');
			redirect('Admin/Customer','refresh');
		}
	}

	public function customer(){
		$config['base_url'] = base_url()."Admin/customer/";
		$config['total_rows'] = $this->db->query("SELECT * FROM customer;")->num_rows();
		$config['per_page']=3;
		$config['num_links'] = 2;
		$config['uri_segment']=3;
		//Tambahan untuk styling
		$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$config['first_link']='< Pertama ';
		$config['last_link']='Terakhir > ';
		$config['next_link']='> ';
		$config['prev_link']='< ';
		
		$this->pagination->initialize($config);
		
		$data['customer']=$this->Admin_Model->view_customer($config);

		$this->load->view('/template/header');
		$this->load->view('/template/sidebar');
		$this->load->view('admin/customer',$data);
		$this->load->view('/template/footer');
	}

	public function hapus_customer($id_customer){
		$this->Admin_Model->hapus_customer($id_customer);
		redirect('Admin/customer','refresh');
	}

	public function edit_customer($id_customer){  
	
		$customer = $this->Admin_Model->edit_customer($id_customer);
		$data["customer"] = $customer[0];	
		$this->load->view('admin/edit_customer',$data);

	}

	public function edit_customer_update(){
		$data=[
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'phone' => $this->input->post('phone'),
			'gender' => $this->input->post('gender')
		];

		$id_customer = $this->input->post('id_customer');
		if($this->Admin_Model->updatecustomer($id_customer,$data) == true){
			echo "berhasil";
		
		}
	
	}

	public function user(){
		$config['base_url'] = base_url()."Admin/user/";
		$config['total_rows'] = $this->db->query("SELECT * FROM user;")->num_rows();
		$config['per_page']=3;
		$config['num_links'] = 2;
		$config['uri_segment']=3;
		//Tambahan untuk styling
		$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$config['first_link']='< Pertama ';
		$config['last_link']='Terakhir > ';
		$config['next_link']='> ';
		$config['prev_link']='< ';
		
		$this->pagination->initialize($config);
		
		$data['user']=$this->Admin_Model->view_user($config);

		$this->load->view('/template/header');
		$this->load->view('/template/sidebar');
		$this->load->view('admin/user',$data);
		$this->load->view('/template/footer');
	}

	public function tambahuser(){
		$data=array();
		if ($this->input->post('submit')) {
			$this->Admin_Model->simpanuser();
			$this->session->set_flashdata('success_msg', 'Berhasil Di Tambah');
			redirect('Admin/user','refresh');
		}

	}

	public function edit_user($id_user){  
		
		$user = $this->Admin_Model->edit_user($id_user);
		$data["user"] = $user[0];	
		$this->load->view('admin/edit_user',$data);

	}

	public function edit_user_update(){
		$data=[
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'fullname' => $this->input->post('fullname'),
			'level' => $this->input->post('level')
		];
		$id_user = $this->input->post('id_user');
		if($this->Admin_Model->updateuser($id_user,$data) == true){
			echo "berhasil";
		}
	}
	
	public function hapus_user($id_user){
		$this->Admin_Model->hapus_user($id_user);
		redirect('Admin/user','refresh');
	}




	public function lihat_user(){
		$config['base_url'] = base_url()."Admin/lihat_user/";
		$config['total_rows'] = $this->db->query("SELECT * FROM user;")->num_rows();
		$config['per_page']=3;
		$config['num_links'] = 2;
		$config['uri_segment']=3;
		//Tambahan untuk styling
		$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$config['first_link']='< Pertama ';
		$config['last_link']='Terakhir > ';
		$config['next_link']='> ';
		$config['prev_link']='< ';
		
		$this->pagination->initialize($config);
		
		$data['user']=$this->Admin_Model->view_user($config);

		$this->load->view('/template/header');
		$this->load->view('/template/sidebar');
		$this->load->view('admin/lihat_user',$data);
		$this->load->view('/template/footer');
	}
}
