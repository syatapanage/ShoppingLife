<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Miscellaneous extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->data['error'] = "";
		$this->data['searcherror'] = "";
		$this->data['productlist'] = array();
		$productlist = array();
		$this->data['productname'] = array();
		$productname = array();
		$this->data['productprice'] = array();
		$productprice = array();
		$this->load->model('users_model');
		$this->data['rowlist'] = array();
		$list = array();
		$this->data['rowname'] = array();
		$name = array();
		$this->data['searchterm'] = "";
		session_start(); 
    }

	public function index() {
		if(isset($_COOKIE['username'])) {
			$_SESSION['username'] = $_COOKIE['username'];
		}
		
		if($this->users_model->searchmiscellaneous()){
			$row = $this->users_model->searchmiscellaneous();
		
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
			
			$this->load->view('miscellaneous', $this->data);
		} else {
			$this->data['error'] = "No results found";
			$this->load->view('miscellaneous', $this->data);
		
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
			$this->data['searcherror'] = "No search results found";
			$this->index();
		
		}
	
	}
	
}