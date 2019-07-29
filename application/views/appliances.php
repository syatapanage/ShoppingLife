<!DOCTYPE html>
<html>
<head>
  <title>Appliances</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
</head>
<body>
	<div>
		<ul id="toplist">
			<li class="left"><a href="<?php echo base_url(); ?>index.php/home" id="logo">Shopping Life</a></li>
			<li class="right">
				<!-- logged in user information -->
				<?php  if (isset($_SESSION['username'])) : ?>
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
				<p>Logged in as: <strong><?php echo $_SESSION['username']; ?></strong></p>
				<?php endif ?>
			</li>
				
		</ul>
	</div>
				
	<div class="navbar">
		<ul class="options">
			<li class="navbtn"><a href="<?php echo base_url(); ?>index.php/appliances">Appliances</a></li>
			<li class="navbtn"><a href="<?php echo base_url(); ?>index.php/furniture">Furniture</a></li>
			<li class="navbtnlast"><a href="<?php echo base_url(); ?>index.php/miscellaneous">Miscellaneous</a></li>
			<li class="navbtn">
				<form method="POST" action="<?php echo base_url(); ?>index.php/appliances/search">
					<input type="text" name="search" id="search-box" size="40" placeholder="Product" />
					<button type="submit" class="searchbtn">Search</button><br>
					<?php echo $searcherror ?>
				</form>
			</li>
		</ul>
	</div>
				
	<div id="category">
		<h2>Appliances</h2>
	</div>
	 
	<div class="row">
	 	<form method="POST" action="<?php echo base_url(); ?>index.php/appliances">
			<?php foreach ($productlist as $item => $list):?>
			<div class="column">
				<img src="<?php echo base_url(); ?>uploads/<?php echo $productlist[$item]; ?>.jpg" 
					alt="Item" style="width:100%" height="270" width= "150">
				<p><?php echo $productname[$item]; ?>: $<?php echo $productprice[$item]; ?></p>
				<a href="<?php echo site_url($list); ?>" class="register">View item</a><br>
			</div>
			<?php endforeach; ?>
			<?php echo $error ?>
		</form>
	</div>
	
	 
</body>
</html>