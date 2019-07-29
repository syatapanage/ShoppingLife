<!DOCTYPE html>
<html>
<head>
  <title>Add item</title>
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
  	<h2>Add item: details</h2>
  </div>
	
  <form class="formstyle" method="POST" action="<?php echo base_url(); ?>index.php/additems/addfile">

  	<div class="input-group">
	  <?php if (strlen($status) > 0): echo '<div class="alert-danger">' . $status . '</div>'; endif?>
  	  <label>Name of item</label>
  	  <input type="text" name="name">
  	</div>
  	<div class="input-group">
  	  <label>Price</label>
  	  <input type="number" name="price">
  	</div>
	<div class="input-group">
  	  <label>Description</label>
  	  <input type="text" name="description">
  	</div>
	<div class="input-group">
  	  <label>Category</label>
  	</div>
	
	<input type="radio" name="category" value="appliances">Appliances
	<input type="radio" name="category" value="furniture">Furniture
	<input type="radio" name="category" value="miscellaneous">Miscellaneous
	
  	<div class="input-group">
  	  <button type="submit" class="btn" name="add_item">Submit</button>
  	</div>
  </form>
</body>
</html>