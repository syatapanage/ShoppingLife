<?php
class Users_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
    
	public function authenticate($username, $password) {
		$query = $this->db->where('username', $username)
					      ->get('users'); 
		
		$row = $query->row_array();

		if (isset($row)) {
			return (password_verify($password, $row['password']));
		} else {
			return FALSE;
		}
	}
	
	public function userdetails($username) {
		$query = $this->db->where('username', $username)
					  ->get('users'); 
		$row = $query->row_array();
		return $row;
	}
	
	public function enterdetails($username, $email, $phone, $password) {
		$data = array(
        'username' => $username,
		'email' => $email,
        'password' => $password,
		'phone' => $phone
		);
		$this->db->insert('users', $data);
	}
	
	public function emaildetails($email) {
		$query = $this->db->where('email', $email)
					      ->get('users'); 
		$row = $query->row_array();
		return $row;
	}
	
	public function updateemail($email, $username) {
		$data = array(
        'email' => $email
		);

		$this->db->where('username', $username);
		$this->db->update('users', $data);
	}
	
	public function updatephone($phone, $username) {
		$data = array(
        'phone' => $phone
		);

		$this->db->where('username', $username);
		$this->db->update('users', $data);
	}
	
	public function enteritem($name, $description, $url, $location, $price) {
		$data = array(
        'name' => $name,
		'description' => $description,
        'url' => $url,
		'location' => $location,
		'price' => $price
		);
		$this->db->insert('product', $data);
	}
	
	public function displayrecords($user) {
		$query = $this->db->where('user', $user)
					  ->get('cart'); 
		return $query->result();
	}
	
	public function displayreview($product) {
		$this->db->where('product', $product);
		$query = $this->db->get('review'); 
		return $query->result();
	}
	
	public function deleterow($id) {
		$this->db->where('cartid', $id);
		$this->db->delete('cart');
	}
	
	public function insertcart($name, $price, $user){
		$data = array(
        'productname' => $name,
		'price' => $price,
        'user' => $user
		);
		$this->db->insert('cart', $data);
	}
	
	public function addreview($user, $product, $comments, $reviewdate, $rating) {
		$data = array(
        'user' => $user,
		'product' => $product,
        'comments' => $comments,
		'reviewdate' => $reviewdate,
		'rating' => $rating
		);
		$this->db->insert('review', $data);
	}
	
	public function searchappliances() {
		$query = $this->db->where('category', 'appliances')
					      ->get('product'); 
		$result = $query->result_array();
		
		if (sizeof($result)>0) {
			return ($result);
		} else {
			return FALSE;
		}
	}
	
	public function searchfurniture() {
		$query = $this->db->where('category', 'furniture')
					      ->get('product'); 
		$result = $query->result_array();
		
		if (sizeof($result)>0) {
			return ($result);
		} else {
			return FALSE;
		}
	}
	
	public function searchmiscellaneous() {
		$query = $this->db->where('category', 'miscellaneous')
					      ->get('product'); 
		$result = $query->result_array();
		
		if (sizeof($result)>0) {
			return ($result);
		} else {
			return FALSE;
		}
	}
	
	public function search($product) {
		$this->db->like('name', $product, 'after');
        $query = $this->db->get('product');
		$result = $query->result_array();
		
		if (sizeof($result)>0) {
			return ($result);
		} else {
			return FALSE;
		}
	}
	
	public function searchlatest() {
		$query = $this->db->query("SELECT * FROM product ORDER BY id DESC LIMIT 3");
		$result = $query->result_array();
		
		if (sizeof($result)>0) {
			return ($result);
		} else {
			return FALSE;
		}
	}
	
}