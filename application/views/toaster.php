<!DOCTYPE html>
<html>
<head>
  <title>Toaster</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
</head>
<body>
			<div>
			<ul id="toplist">
				<li class="left"><a href="<?php echo base_url(); ?>index.php/home" id="logo">Shopping Life</a></li>
				<li class="right">
					<?php  if (isset($_SESSION['username'])) : ?>
					<a href="<?php echo base_url(); ?>index.php/users/logout" id="logout">Logout</a>
					<?php endif ?>
				</li>
				<li class="right">
					<?php  if (isset($_SESSION['username'])) : ?>
					<button onclick="window.location.href = '<?php echo base_url();?>index.php/shopcart/dispdata'" class="register">Cart</button>
					<?php endif ?>
				</li>
				<li class="right">
					<?php  if (isset($_SESSION['username'])) : ?>
					<p>Logged in as: <strong><?php echo $_SESSION['username']; ?></strong></p>
					<?php endif ?>
				</li>
				
			</ul>
			</div>
			
		<div class="sellheader">
			<h2>Toaster</h2>
		</div>
			
		<div class="sellitem">	
			<div class="row">
				<div class="twocolumn">
					<div id="itempic"><img src="<?php echo base_url(); ?>uploads/toaster.jpg" alt="" height="300"></div>
					<div id="itempic"><img src="<?php echo base_url(); ?>uploads/toaster1.jpg" alt="" height="300"></div>
					<div id="itempic"><img src="<?php echo base_url(); ?>uploads/toaster2.jpg" alt="" height="300"></div>
				</div>
			<div class="twocolumn">
				<div class="input-group">
					<label>Description:</label>
					<p>Silver<p>
				</div>
				<div class="input-group">
					<label>Seller:</label>
					<p>User1<p>
				</div>
				<div class="input-group">
					<label>Price:</label>
					<p>$12<p>
				</div>
				
				<form method="POST" action="<?php echo base_url(); ?>index.php/toaster/cart">
					<div class="input-group">
					<button type="submit" class="btn" name="reg_user">Add to cart</button>
					</div>
					<?php echo '<div class="alert-danger">' . $status . '</div>'; ?>
				</form>
				
				<hr>
					
				<p id="review">Reviews</p>
					
				<form method="POST" action="<?php echo base_url(); ?>index.php/toaster/review">
					<div class="input-group">
					<button type="submit" class="register" name="review">Write review</button>
					</div>
					
					<br>
<?php
$average = 0;
if (sizeof($reviewlist) > 0): 
  foreach($reviewlist as $row)
  {
	$average += $row->rating;

  }
  $size = (sizeof($reviewlist));
  $average = ($average / $size);
  $average = number_format($average,2);
  
   echo '<p class="review">' . "Average rating: " . $average . '</p>';
  endif
   ?>
					
				</form>
					
					<br>
					
				<?php
				if (sizeof($reviewlist) > 0): 
  foreach($reviewlist as $row)
  {
  echo "<strong>" . $row->user . "</strong>";
  echo "<br>";
  echo $row->reviewdate;
  echo "<br>";
  echo "Rating: " . $row->rating . "/5";
  echo "<br>";
  echo $row->comments;
  echo "<br>";
  echo "<br>";
  echo "<br>";
  }
  endif
   ?>
				</div>
			</div>
		</div>
</body>
</html>
