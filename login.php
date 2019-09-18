<?php include('server.php');

	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] )
	{
		header('location: index.php');
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Quiz Registration portal</title>
	<link rel="stylesheet" type="text/css" href="login-style.css">
</head>
<body>
<div class = "login">
	<h2>Student Login</h2>
	<form method = "post" action = "login.php" autocomplete="off">
		<?php  if (count($errors) > 0) : ?>
  			<div class="error">
  				<?php foreach ($errors as $error) : ?>
  	  				<p><?php echo $error ?></p>
  				<?php endforeach ?>
  			</div>
		<?php  endif ?>

		<div class = "input-box">
			<br>
			<input type="text" name="username" required/>
			<label>Username</label>
		</div>

		<div class = "input-box">
			<br>
			<input type="password" name="password" required/>
			<label>Password</label>
		</div>

		<br><button type = "submit" name = "login">Login</button><br>
		
		<p>Not yet a member? <a href = "register.php">Sign up</a></p>

	</form>
</div>
</body>
</html>