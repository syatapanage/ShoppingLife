<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
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
					<p>Logged in as: <strong><?php echo $_SESSION['username']; ?></strong></p>
					<?php endif ?>
				</li>
				
			</ul>
			</div>
				
  <div class="header">
  	<h2>My profile</h2>
  </div>
	 
	 <form class="formstyle">
	<div class="input-group">
  		<label>Username</label>
  		<p><?php echo $_SESSION['username']; ?><p>
  	</div>
	<div class="input-group">
  		<label>Email</label>
  		<p><?php echo $_SESSION['email']; ?>&emsp;<a href="updateemail">Update</a><p>
  	</div>
  	<div class="input-group">
  		<label>Phone number</label>
  		<p><?php echo $_SESSION['phone']; ?>&emsp;<a href="updatephone">Update</a><p>
  	</div>
</form>
</body>
</html>