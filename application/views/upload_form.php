<!DOCTYPE html>
<html>
<head>
  <title>Upload photos</title>
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
  
  
	<div class="addheader">
		<h2>Upload photos</h2>
	</div>
	 
	<div class="additem">
		<form method="post" action="<?php echo base_url(); ?>index.php/upload/multiple" enctype="multipart/form-data">
			<p>Upload 1-3 photos of the item:<p>
			<br>
			<input type="file" name='files[]' multiple size="20" />
			<br /><br />
			<input type="submit" value="Upload" name='upload'/>
			<?php echo '<div class="alert-danger">' . $success . '</div>'; ?>
		</form>
		<button onclick="window.location.href = '<?php echo base_url();?>index.php/additems'" class="register">Next step</button>
	</div>

</body>
</html>