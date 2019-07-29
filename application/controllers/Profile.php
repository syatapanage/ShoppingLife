<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data['status'] = "";
		session_start(); 
    }

    public function index() {
        $this->load->view('profile', $this->data);
    }
	


}
