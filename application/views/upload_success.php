<!DOCTYPE html>
<html>
<head>
  <title>Upload files</title>
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
					<p>Logged in as: <strong><?php echo $_SESSION['username']; ?></strong></p>
					<?php endif ?>
				</li>
				
			</ul>
			</div>
  
  
  <div class="header">
  	<h2>Add item: Upload photo</h2>
  </div>
  
  <div class="formstyle">
      <p>Your file was successfully uploaded!</p>  
	  <br>
      
	  <p><?php echo anchor('additems', 'Finish adding item'); ?></p>
  </div>
  
</body>
</html>