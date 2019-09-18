<?php include('fserver.php');

	if(isset($_SESSION['flogged_in']) && $_SESSION['flogged_in'] )
	{
		header('location: findex.php');
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Quiz Registration portal</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class = "header">
		<h2>Faculty Login</h2>
	</div>

	<form method = "post" action = "flogin.php" >
		<?php  if (count($errors) > 0) : ?>
  			<div class="error">
  				<?php foreach ($errors as $error) : ?>
  	  				<p><?php echo $error ?></p>
  				<?php endforeach ?>
  			</div>
		<?php  endif ?>

		<div class = "input-group">
			<label>Username</label>
			<input type="text" name="fusername">
		</div>
		<div class = "input-group">
			<label>Password</label>
			<input type="password" name="fpassword">
		</div>
		</div>
		<div class = "input-group">
			<button type = "submit" name = "flogin" class = "btn">Login</button>
		</div>
	</form>

</body>
</html>