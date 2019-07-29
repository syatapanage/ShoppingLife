<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shopcart extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->load->model('users_model');
		$this->data['cart'] = "";
		session_start(); 
    }

    public function index() {
        $this->load->view('shopcart', $this->data);
    }
	
	public function dispdata() {
		$user = $_SESSION['username'];
		$this->data['cart']=$this->users_model->displayrecords($user);
		$this->load->view('shopcart',$this->data);
	}
	
	public function deleteitem() {
		$id = $this->uri->segment(3);
		$this->users_model->deleterow($id);
		$this->dispdata();
	}

}