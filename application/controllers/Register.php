<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data['status'] = "";
        $this->load->model('users_model');
		session_start(); 
    }

    public function index() {
        $this->load->view('register', $this->data);
    }
	
	public function register() {
		$username = $this->input->post('username');
        $email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$password = $this->input->post('password');
		$passwordbcrypt = password_hash($password, PASSWORD_BCRYPT);
		
		$row = $this->users_model->userdetails($username);
		$rowemail = $this->users_model->emaildetails($email);
				
		if($row == 0 && $rowemail == 0) {
			$_SESSION['username'] = $username;
			$_SESSION['email'] = $email;
			$_SESSION['phone'] = $phone;
			$this->users_model->enterdetails($username, $email, $phone, $passwordbcrypt);
			
			redirect('home');
		} elseif ($row>0 && $rowemail==0) {
			$this->data['status'] = "Username already exists";
            $this->index();
		} elseif ($rowemail>0 && $row==0) {
			$this->data['status'] = "Email already exists";
            $this->index();
		} else {
			$this->data['status'] = "Username and email already exists";
            $this->index();
		}

	}


}
