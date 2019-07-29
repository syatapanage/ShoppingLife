<!DOCTYPE html>
<html>
<head>
  <title>Review</title>
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
  	<h2>Write a review</h2>
  </div>
	
  <form class="formstyle" method="POST" action="<?php echo base_url(); ?>index.php/toaster/addreview">
  	<div class="input-group">
  	  <label>Rating from 1(poor) to 5(best)</label>
		<select name="rating" required>
			<option value="0" disabled selected>Select rating:</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select> 
  	</div>
  	<div class="input-group">
  	  <label>Comments</label>
  	  <input type="text" name="comments">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Submit</button>
  	</div>
  </form>
</body>
</html>