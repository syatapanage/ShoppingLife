<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updateemail extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data['status'] = "";
		$this->load->model('users_model');
		$username = "";
		session_start(); 
    }

    public function index() {
        $this->load->view('updateemail', $this->data);
    }
	
	public function updateemail() {
		$newemail = $this->input->post('email');
		$username = $_SESSION['username'];
		$this->users_model->updateemail($newemail, $username);
		$_SESSION['email'] = $newemail;
		redirect(base_url(). "index.php/profile");
	}
	

}
