<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->data['rowlist'] = array();
		$list = array();
		$this->data['rowname'] = array();
		$name = array();
		$this->data['productprice'] = array();
		$productprice = array();
		$this->data['searchterm'] = "";
        $this->load->model('users_model');
		$this->data['error'] = "";
		
		$this->data['productlist'] = array();
		$productlist = array();
		$this->data['productname'] = array();
		$productname = array();
		$this->data['productprice'] = array();
		$productprice = array();
		session_start(); 
    }

	public function index() {
		if(isset($_COOKIE['username'])) {
			$_SESSION['username'] = $_COOKIE['username'];
		}
		
		
		if($this->users_model->searchlatest()){
			$row = $this->users_model->searchlatest();
		
			foreach ($row as $item) {
				$productlist[] = $item['url'];
			}
		
			$this->data['productlist'] = $productlist;
		
			foreach ($row as $item) {
				$productname[] = $item['name'];
			}
		
			$this->data['productname'] = $productname;
			
			foreach ($row as $item) {
				$productprice[] = $item['price'];
			}
		
			$this->data['productprice'] = $productprice;
			
			$this->load->view('home', $this->data);
		} else {
			$this->data['error'] = "";
			$this->load->view('home', $this->data);
		
		}
		
		
		
		
	}
	
	public function search() {
		$product = $this->input->post('search');
		$this->data['searchterm'] = $product;
		
		if($this->users_model->search($product)){
			$row = $this->users_model->search($product);
		
			foreach ($row as $item) {
				$list[] = $item['url'];
			}
		
			$this->data['rowlist'] = $list;
		
			foreach ($row as $item) {
				$name[] = $item['name'];
			}
		
			$this->data['rowname'] = $name;
			
			foreach ($row as $item) {
				$rowprice[] = $item['price'];
			}
		
			$this->data['rowprice'] = $rowprice;
			
			$this->load->view('search', $this->data);
		} else {
			$this->data['error'] = "No search results found";
			$this->index();
		
		}
	
	}
	
	public function autocomplete()
    {
        $q = $this->input->get('q');
        echo json_encode($this->SearchModel->getProduct($q));
    }
	
	
}