<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
</head>
<body>
	<a href="<?php echo base_url(); ?>index.php/home" id="logo">Shopping Life</a>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form class="formstyle" method="POST" action="<?php echo base_url(); ?>index.php/register/register">

  	<div class="input-group">
	  <?php if (strlen($status) > 0): echo '<div class="alert-danger">' . $status . '</div>'; endif?>
  	  <label>Username</label>
  	  <input type="text" name="username">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email">
  	</div>
	<div class="input-group">
  	  <label>Phone number</label>
  	  <input type="text" name="phone">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password" 
	  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  </form>
</body>
</html>