<!DOCTYPE html>
<html>
<head>
  <title>Update email</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
</head>
<body>
		<div>
			<ul id="toplist">
				<li><a href="<?php echo base_url(); ?>index.php/home" id="logo">Shopping Life</a></li>
				<li class="right">
					<!-- logged in user information -->
					<?php  if (isset($_SESSION['username'])) : ?>
					<a href="<?php echo base_url(); ?>index.php/users/logout" id="logout">Logout</a>
					<?php endif ?>
				</li>
				<li class="right">
					<!-- logged in user information -->
					<?php  if (isset($_SESSION['username'])) : ?>
					<a href="profile" id="profilelink">My profile</a></p>
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
			
  <div class="header">
  	<h2>Update email</h2>
  </div>
	 
	<form class="formstyle" method="POST" action="<?php echo base_url(); ?>index.php/updateemail/updateemail">
	<div class="input-group">
  	  <label>Email</label>
  	  <input type="text" name="email">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="update_email">Save</button>
  	</div>
	</form>

</body>
</html>