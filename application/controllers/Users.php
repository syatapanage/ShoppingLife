    <?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller
{
    function __construct() {
        parent::__construct();
        
		$this->data['status'] = "";
        $this->load->model('users_model');
		$email = "";
		$phone = "";
		$location = "";
		session_start(); 
        
        // Load the captcha helper
        $this->load->helper('captcha');
    }
    
    public function index(){
		        // Captcha configuration
        $config = array(
            'img_path'      => 'uploads/captcha_images/',
            'img_url'       => base_url().'uploads/captcha_images/',
			'font_path'     => FCPATH.'system/fonts/texb.ttf',
            //'font_path'     => 'system/fonts/texb.ttf',
            'img_width'     => '200',
            'img_height'    => 50,
            'word_length'   => 6,
            'font_size'     => 22
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and set new captcha word
		unset($_SESSION['captchaCode']);
		$_SESSION['captchaCode'] = $captcha['word'];
        
        // Pass captcha image to view
        $this->data['captchaImg'] = $captcha['image'];
        
        // Load the view
        $this->load->view('login', $this->data);
	}
	
	public function login() {
		
		$username = $this->input->post('username');
        $password = $this->input->post('password');
        $remember = $this->input->post('remember');
		
		if ($remember) {
            setcookie("username", $_POST["username"], time() + 60*60*24, "/");            
        }
		
		
		
        // If captcha form is submitted
        if($this->input->post('submit')){
            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $_SESSION['captchaCode'];
            if($inputCaptcha === $sessCaptcha){
                
				if ($this->users_model->authenticate($username, $password)) {
					$_SESSION['username'] = $username;
					$row = $this->users_model->userdetails($username);
					$email = $row['email'];
					$phone = $row['phone'];
					$location = $row['location'];
					$_SESSION['email'] = $email;
					$_SESSION['phone'] = $phone;
					$_SESSION['location'] = $location;
			
					redirect('home');
				} else {
					$this->data['status'] = "Your username or password is incorrect!";
					$this->index();
				}
				
            }else{
				$this->data['status'] = "Captcha code does not match, please try again.";
				$this->index();
            }
        }
        
    }
    
    public function refresh(){
        // Captcha configuration
        $config = array(
            'img_path'      => './uploads/captcha_images/',
            'img_url'       => base_url().'uploads/captcha_images/',
            'font_path'     => FCPATH.'system/fonts/texb.ttf',
			//'font_path'     => './system/fonts/texb.ttf',
            'img_width'     => '200',
            'img_height'    => 50,
            'word_length'   => 6,
            'font_size'     => 22
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and set new captcha word
		unset($_SESSION['captchaCode']);
		$_SESSION['captchaCode'] = $captcha['word'];
        
        // Display captcha image
        echo $captcha['image'];
    }
	
	
	public function logout() {
        session_destroy();
		unset($_SESSION['username']);
		delete_cookie('username');
        redirect('home');
    }
	
}