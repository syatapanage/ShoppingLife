<!DOCTYPE html>
<html>
<head>
	<title>Shopping life</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" type="text/css" />
	
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

</head>
<body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

		<div>
			<ul id="toplist">
				<li class="left"><a href="<?php echo base_url(); ?>index.php/home" id="logo">Shopping Life</a></li>
				<li class="right">
				    <?php  if (!isset($_SESSION['username'])) : ?>
					<a href = '<?php echo base_url();?>index.php/register'" class="register">Register</a>
					<?php endif ?>
				</li>
				<li class="right">
					<?php  if (!isset($_SESSION['username'])) : ?>
					<a href = '<?php echo base_url();?>index.php/login'" class="register">Login</a>
					<?php endif ?>
				</li>
				<li class="right">
					<?php  if (!isset($_SESSION['username'])) : ?>
					<p>Please log in or register to continue</p>
					<?php endif ?>
				</li>
				<li class="right">
					<!-- logged in user information -->
					<?php  if (isset($_SESSION['username'])): ?>
					<a href="<?php echo base_url(); ?>index.php/users/logout" id="logout">Logout</a>
					<?php endif ?>
				</li>
				<li class="right">
					<!-- logged in user information -->
					<?php  if (isset($_SESSION['username'])) : ?>
					<a href = '<?php echo base_url();?>index.php/shopcart/dispdata'" class="register">Cart</a>
					<?php endif ?>
				</li>
				<li class="right">
					<!-- logged in user information -->
					<?php  if (isset($_SESSION['username'])) : ?>
					<a href = '<?php echo base_url();?>index.php/upload_form'" class="register">Add item</a>
					<?php endif ?>
				</li>
				<li class="right">
					<!-- logged in user information -->
					<?php  if (isset($_SESSION['username'])) : ?>
					<a href = '<?php echo base_url();?>index.php/profile'" class="register">Profile</a>
					<?php endif ?>
				</li>
				<li class="right">
					<!-- logged in user information -->
					<?php  if (isset($_SESSION['username'])) : ?>
					<p>Logged in as: <?php echo $_SESSION['username']; ?></p>
					<?php endif ?>
				</li>
			</ul>
		</div>
		
		<?php  if (isset($_SESSION['username'])) : ?>
		
	 	<div class="navbar">
			<ul class="options">
				<li class="navbtn"><a href="<?php echo base_url(); ?>index.php/appliances">Appliances</a></li>
				<li class="navbtn"><a href="<?php echo base_url(); ?>index.php/furniture">Furniture</a></li>
				<li class="navbtnlast"><a href="<?php echo base_url(); ?>index.php/miscellaneous">Miscellaneous</a></li>
				<li class="navbtn">
			<form method="POST" action="<?php echo base_url(); ?>index.php/home/search">
				<input type="text" name="search" id="search-box" size="40" placeholder="Product" />
				<button type="submit" class="searchbtn">Search</button><br>
				<?php echo $error ?>
			</form>
				</li>
			</ul>
		</div>
		
		<?php endif ?>

		
		
		<div>
			<img id="largePic" src="<?php echo base_url(); ?>images/buying.jpg" alt="market" height="400">
		</div>
		
		<p class="centre">Latest items</p>
		
		<div class="row">
	 	<form method="POST" action="<?php echo base_url(); ?>index.php/home">
			<?php foreach ($productlist as $item => $list):?>
			<div class="column">
				<img src="<?php echo base_url(); ?>uploads/<?php echo $productlist[$item]; ?>.jpg" 
					alt="Item" style="width:100%" height="270" width= "150">
				<p><?php echo $productname[$item]; ?>: $<?php echo $productprice[$item]; ?></p>
				
				<?php  if (isset($_SESSION['username'])) : ?>
					<a href="<?php echo site_url($list); ?>" class="register">View item</a><br>
				<?php endif ?>
			</div>
			<?php endforeach; ?>
		</form>
	</div>

		
</body>
</html>