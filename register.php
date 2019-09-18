<?php include('server.php'); 
	//session_start();
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] )
	{
		header('location: index.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Quiz Registration Portal</title>
	<link rel="stylesheet" type="text/css" href="register-style.css">
</head>
<body>
<div class = "register">
	<h2>Registration Form</h2>
	<form method = "post" action = "register.php" autocomplete="off">
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
			<input type="text" name="email" required/>
			<label>Email Id</label>
		</div>

		<div class = "input-box">
			<br>
			<input type="password" name="password_1" required/>
			<label>Password</label>
		</div>

		<div class = "input-box">
			<br>
			<input type="password" name="password_2" required/>
			<label>Confirm Password</label>
		</div>

		<div class = "row1">
			<p>Please select your year :</p>
		</div>

		<div class = "row2">
				<input type="radio" name="year" value="1st"checked>1st year
  				<input type="radio" name="year" value="2nd">2nd year
				<input type="radio" name="year" value="3rd">3rd year
				<input type="radio" name="year" value="4th">4th year
		</div>

		<div class = "row3">
			<br><p>Please select your Branch :</p>
		</div>

		<div class = "select">
			<select name="branch">
    			<option value="ece">Electronics and Communication Engineering</option>
    			<option value="eee">Electrical and Electronics Engineering</option>
    			<option value="cse">Computer Science Engineering</option>
    			<option value="me">Mechanical Engineering</option>
    			<option value="ce">Civil Engineering</option>
  			</select>
		</div>	
		
		<br><button type = "submit" name = "register">Register</button>

		<br><p>Already a member ? <a href = "login.php" color="red">Sign in</a></p>

	</form>
</div>
</body>
</html>