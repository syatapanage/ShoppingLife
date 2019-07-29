<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Additems extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data['status'] = "";
		$this->load->model('users_model');
		$this->load->database();
		session_start(); 
    }

    public function index() {
        $this->load->view('additems', $this->data);
    }
	
	public function addfile() {
			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$price = $this->input->post('price');
			$category = $this->input->post('category');
			
			$cname = ucfirst($name);  
			$lname = lcfirst($name);
			$scname = str_replace(' ', '', $cname);
			$slname = str_replace(' ', '', $lname);
			
			$user = $_SESSION['username'];
			$url = $slname;
			
			$query = $this->db->query("INSERT INTO product (name, description, url, user, price, category) 
			VALUES('$cname', '$description', '$slname', '$user', '$price', '$category')");
			
			
			$vcontents = 
			"<!DOCTYPE html>
<html>
<head>
  <title>" . $cname . "</title>
  <link rel=\"stylesheet\" type=\"text/css\" href=\"<?php echo base_url(); ?>css/style.css\">
</head>
<body>
			<div>
			<ul id=\"toplist\">
				<li class=\"left\"><a href=\"<?php echo base_url(); ?>index.php/home\" id=\"logo\">Shopping Life</a></li>
				<li class=\"right\">
					<?php  if (isset($" . "_SESSION['username'])) : ?>
					<a href=\"<?php echo base_url(); ?>index.php/users/logout\" id=\"logout\">Logout</a>
					<?php endif ?>
				</li>
				<li class=\"right\">
					<?php  if (isset($" . "_SESSION['username'])) : ?>
					<button onclick=\"window.location.href = '<?php echo base_url();?>index.php/shopcart/dispdata'\" class=\"register\">Cart</button>
					<?php endif ?>
				</li>
				<li class=\"right\">
					<?php  if (isset($" . "_SESSION['username'])) : ?>
					<p>Logged in as: <strong><?php echo $" . "_SESSION['username']; ?></strong></p>
					<?php endif ?>
				</li>
				
			</ul>
			</div>
			
		<div class=\"sellheader\">
			<h2>" . $cname . "</h2>
		</div>
			
		<div class=\"sellitem\">	
			<div class=\"row\">
				<div class=\"twocolumn\">
					<div id=\"itempic\"><img src=\"<?php echo base_url(); ?>uploads/" . $slname . ".jpg\" alt=\"\" height=\"300\"></div>
					<div id=\"itempic\"><img src=\"<?php echo base_url(); ?>uploads/" . $slname . "1.jpg\" alt=\"\" height=\"300\"></div>
					<div id=\"itempic\"><img src=\"<?php echo base_url(); ?>uploads/" . $slname . "2.jpg\" alt=\"\" height=\"300\"></div>
				</div>
			<div class=\"twocolumn\">
				<div class=\"input-group\">
					<label>Description:</label>
					<p>" . $description . "<p>
				</div>
				<div class=\"input-group\">
					<label>Seller:</label>
					<p>" . $_SESSION['username'] . "<p>
				</div>
				<div class=\"input-group\">
					<label>Price:</label>
					<p>$" . $price . "<p>
				</div>
				
				<form method=\"POST\" action=\"<?php echo base_url(); ?>index.php/" . $slname . "/cart\">
					<div class=\"input-group\">
					<button type=\"submit\" class=\"btn\" name=\"reg_user\">Add to cart</button>
					</div>
					<?php echo '<div class=\"alert-danger\">' . $" . "status . '</div>'; ?>
				</form>
				
				<hr>
					
				<p id=\"review\">Reviews</p>
					
				<form method=\"POST\" action=\"<?php echo base_url(); ?>index.php/" . $slname . "/review\">
					<div class=\"input-group\">
					<button type=\"submit\" class=\"register\" name=\"review\">Write review</button>
					</div>
					
					<br>
<?php
$" . "average = 0;
if (sizeof($" . "reviewlist) > 0): 
  foreach($" . "reviewlist as $" . "row)
  {
	$" . "average += $" . "row->rating;

  }
  $" . "size = (sizeof($" . "reviewlist));
  $" . "average = ($" . "average / $" . "size);
  $" . "average = number_format($" . "average,2);
  
   echo '<p class=\"review\">' . \"Average rating: \" . $" . "average . '</p>';
  endif
   ?>
					
				</form>
					
					<br>
					
				<?php
				if (sizeof($" . "reviewlist) > 0): 
  foreach($" . "reviewlist as $" . "row)
  {
  echo \"<strong>\" . $" . "row->user . \"</strong>\";
  echo \"<br>\";
  echo $" . "row->reviewdate;
  echo \"<br>\";
  echo \"Rating: \" . $" . "row->rating . \"/5\";
  echo \"<br>\";
  echo $" . "row->comments;
  echo \"<br>\";
  echo \"<br>\";
  echo \"<br>\";
  }
  endif
   ?>
				</div>
			</div>
		</div>
</body>
</html>
";
			
			

			
			
			$ccontents = "<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class " . $scname . " extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
		$" . "this->load->model('users_model');
		$" . "this->data['status'] = \"\";
		$" . "this->data['reviewlist'] = array();
		session_start(); 
    }

    public function index() {
		$" . "product = \"". $scname . "\";
		$" . "this->data['reviewlist']=$" . "this->users_model->displayreview($" . "product);
        $" . "this->load->view('" . $slname . "', $" . "this->data);
    }
	
	public function cart() {
		$" . "name = \"". $scname . "\";
		$" . "price = \"". $price . "\";
		$" . "user = $" . "_SESSION['username'];

		$" . "this->users_model->insertcart($" . "name, $" . "price, $" . "user);
		
		$" . "this->data['status'] = \"Item added to cart\";
		$" . "this->index();
	}
	
	public function review() {
		$" . "this->load->view('" . $slname . "review');

	}
	
	public function addreview() {
		$" . "user = $" . "_SESSION['username'];
		$" . "product = $" . "this->uri->segment(1);
		$" . "rating = $" . "this->input->post('rating');
		$" . "comments = $" . "this->input->post('comments');
		$" . "reviewdate = date('d M Y');
		$" . "this->users_model->addreview($" . "user, $" . "product, $" . "comments, $" . "reviewdate, $" . "rating);
		
		$" . "this->index();
	}
	
}";


		$reviewcontents = 
		"<!DOCTYPE html>
<html>
<head>
  <title>Review</title>
  <link rel=\"stylesheet\" type=\"text/css\" href=\"<?php echo base_url(); ?>css/style.css\">
</head>
<body>
			<div>
			<ul id=\"toplist\">
				<li class=\"left\"><a href=\"<?php echo base_url(); ?>index.php/home\" id=\"logo\">Shopping Life</a></li>
				<li class=\"right\">
					<!-- logged in user information -->
					<?php  if (isset($" . "_SESSION['username'])) : ?>
					<a href=\"<?php echo base_url(); ?>index.php/users/logout\" id=\"logout\">Logout</a>
					<?php endif ?>
				</li>
				<li class=\"right\">
					<!-- logged in user information -->
					<?php  if (isset($" . "_SESSION['username'])) : ?>
					<p>Logged in as: <strong><?php echo $" . "_SESSION['username']; ?></strong></p>
					<?php endif ?>
				</li>
				
			</ul>
			</div>
	
	<div class=\"header\">
  	<h2>Write a review</h2>
  </div>
	
  <form class=\"formstyle\" method=\"POST\" action=\"<?php echo base_url(); ?>index.php/" . $slname . "/addreview\">
  	<div class=\"input-group\">
  	  <label>Rating from 1(poor) to 5(best)</label>
		<select name=\"rating\" required>
			<option value=\"0\" disabled selected>Select rating:</option>
			<option value=\"1\">1</option>
			<option value=\"2\">2</option>
			<option value=\"3\">3</option>
			<option value=\"4\">4</option>
			<option value=\"5\">5</option>
		</select> 
  	</div>
  	<div class=\"input-group\">
  	  <label>Comments</label>
  	  <input type=\"text\" name=\"comments\">
  	</div>
  	<div class=\"input-group\">
  	  <button type=\"submit\" class=\"btn\" name=\"reg_user\">Submit</button>
  	</div>
  </form>
</body>
</html>";

			
			write_file(FCPATH . '/application/views/'. $slname . '.php', $vcontents);
			write_file(FCPATH . '/application/controllers/' . $scname . '.php', $ccontents);
			write_file('./application/views/' . $slname . 'review.php', $reviewcontents);
			
			rename('./uploads/newphoto.jpg', './uploads/'. $slname .'.jpg');
			rename('./uploads/newphoto1.jpg', './uploads/'. $slname .'1.jpg');
			rename('./uploads/newphoto2.jpg', './uploads/'. $slname .'2.jpg');
			
			redirect('home');
			
	}
	
}