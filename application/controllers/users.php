<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct() {

		parent::__construct();
		$this->load->model('User');

	}

	function index() {

		$this->load->view('users/users');

	}

	function register() {

		$this->User->create_user($this->input->post());
		redirect('/');

	}

	function login() {

		$current_user = $this->User->get_user($this->input->post());

		if ($current_user) {
			
			$this->session->set_userdata('user_info', $current_user);
			redirect('/travels');

		} else {
			
			$this->session->set_flashdata('login_error', 'Invalid Username/Password combination');
			redirect('/');

		}
		
	}

	function logout() {

		$this->session->sess_destroy();
		redirect('/');

	}

}

?>