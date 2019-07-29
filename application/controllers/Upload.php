<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
		$this->data['success'] = "";
		session_start(); 

    }

    public function index() {
		$this->load->view('upload_form', $this->data);
	}
	
	public function multiple() {
		$itemname = $this->input->post('name');
		$lname = lcfirst($itemname);
		$slname = str_replace(' ', '', $lname);
		//$this->load->view('upload_form', array('error' => ' ' ));

 
      $data = array();

      // Count total files
      $countfiles = count($_FILES['files']['name']);
 
      // Looping all files
      for($i=0;$i<$countfiles;$i++){
 
        if(!empty($_FILES['files']['name'][$i])){
 
          // Define new $_FILES array - $_FILES['file']
          $_FILES['file']['name'] = $_FILES['files']['name'][$i];
          $_FILES['file']['type'] = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
          $_FILES['file']['size'] = $_FILES['files']['size'][$i];

          // Set preference
          $config['upload_path'] = 'uploads/'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['max_size'] = '5000'; // max_size in kb
		  $pname = "newphoto";
          $config['file_name'] = $pname;
 
          //Load upload library
          $this->load->library('upload',$config); 
 
          // File upload
          if($this->upload->do_upload('file')){
            // Get data about the file
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];

            
          }else{
			  $this->index();
		  }
		  
        }
      }
		$this->data['success'] = "Successfully uploaded";
		$this->index();		
    } 

}
