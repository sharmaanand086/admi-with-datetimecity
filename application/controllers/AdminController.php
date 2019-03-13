<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class AdminController extends CI_Controller {
	 function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('AdminModel');
		 $this->load->helper(array('form', 'url'));
		 $this->load->library('session');

		}
	public function index()
	{	  		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user_mgt.email]');
        $this->form_validation->set_rules('user_name', 'Username', 'required|is_unique[user_mgt.user_name]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required');
		 
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('/admin/signup');
		}
		else
		{
			//Setting values for tabel columns
			$data = array(
			'name' => $this->input->post('name'),
			'mobile' => $this->input->post('mobile'),
			'email' => $this->input->post('email'),
			'user_name' => $this->input->post('user_name'),
			'password' => $this->input->post('password'),
			'cpassword' => $this->input->post('cpassword'),			 
			);
			//Transfering data to Model
			$this->AdminModel->UserRegistration_insert($data);
			$data['formmessage'] = 'User data Inserted Successfully';
			//Loading View
			$this->load->view('/admin/signup',$data);
		}
	}
	public function AdminLogin()
	{
	    $this->load->model('AdminModel');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
		if(isset($this->session->userdata['logged_in'])){
		$this->load->view('/admin/admin_page');
		}else{
		$this->load->view('/admin/AdminLogin');
		}
		} else {
		$data = array(
		'email' => $this->input->post('email'),
		'password' => $this->input->post('password')
		);
		$result = $this->AdminModel->adminlogin($data);
		if ($result == TRUE) {
		$email = $this->input->post('email');
		$result = $this->AdminModel->read_admin_information($email);
		if ($result != false) {
		$session_data = array(
		'name' => $result[0]->name,
		'email' => $result[0]->email,
		);
		// Add user data in session
		$this->session->set_userdata('logged_in', $session_data);
		$this->load->view('/admin/admin_page');
		}
		} else {
		$data = array(
		'error_message' => 'Invalid Username or Password'
		);
		$this->load->view('/admin/AdminLogin', $data);
		}
		}
	}
	    // Logout from admin page
		public function logout() {
		// Removing session data
		$sess_array = array(
		'name' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('admin/AdminLogin', $data);
		}

}