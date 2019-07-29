<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updatephone extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data['status'] = "";
		$this->load->model('users_model');
		session_start(); 
    }

    public function index() {
        $this->load->view('updatephone', $this->data);
    }
	
	public function updatephone() {
		$newphone = $this->input->post('phone');
		$username = $_SESSION['username'];
		$this->users_model->updatephone($newphone, $username);
		$_SESSION['phone'] = $newphone;
		redirect(base_url(). "index.php/profile");
	}

}
