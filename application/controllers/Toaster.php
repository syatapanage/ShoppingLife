<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toaster extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->load->model('users_model');
		$this->data['status'] = "";
		$this->data['reviewlist'] = array();
		session_start(); 
    }

    public function index() {
		$product = "Toaster";
		$this->data['reviewlist']=$this->users_model->displayreview($product);
        $this->load->view('toaster', $this->data);
    }
	
	public function cart() {
		$name = "Toaster";
		$price = "12";
		$user = $_SESSION['username'];

		$this->users_model->insertcart($name, $price, $user);
		
		$this->data['status'] = "Item added to cart";
		$this->index();
	}
	
	public function review() {
		$this->load->view('toasterreview');

	}
	
	public function addreview() {
		$user = $_SESSION['username'];
		$product = $this->uri->segment(1);
		$rating = $this->input->post('rating');
		$comments = $this->input->post('comments');
		$reviewdate = date('d M Y');
		$this->users_model->addreview($user, $product, $comments, $reviewdate, $rating);
		
		$this->index();
	}
	
}