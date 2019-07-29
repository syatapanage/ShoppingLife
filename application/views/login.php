<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
  
</head>
    <body>
		<a href="<?php echo base_url(); ?>index.php/home" id="logo">Shopping Life</a>
		<div class="header">
			<h2>Login</h2>
		</div>

	<form class="formstyle" method="post" action="<?php echo base_url(); ?>index.php/users/login">

		<div class="input-group">
			<?php if (strlen($status) > 0): echo '<div class="alert-danger">' . $status . '</div>'; endif?>
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div>
			<label>
				<input type="checkbox" name="remember" id="remember">&ensp;Keep me logged in
			</label>
		</div>

		<br>
	 
		<div class="input-group">
			<label><p>Captcha Code</p></label>
			<p id="captImg"><?php echo $captchaImg; ?></p>
			<p>Can't read the image? click <a href="javascript:void(0);" class="refreshCaptcha">here</a> to refresh.</p>
		</div>

		<div class="input-group">
			Enter the code: 
			<input type="text" name="captcha" value=""/>
		</div>
		<input type="submit" class="btn" name="submit" value="Login"/>
	</form>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- captcha refresh code -->
<script>
$(document).ready(function(){
    $('.refreshCaptcha').on('click', function(){
        $.get('<?php echo base_url().'index.php/users/refresh'; ?>', function(data){
            $('#captImg').html(data);
        });
    });
});
</script>

    </body>
</html>