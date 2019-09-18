<?php
	session_start();
	//Connecting to database
	$db = mysqli_connect('localhost' , 'root' , '' , 'quiz');
	$username = "";
	$email = "";
	$year = "";
	$branch = "";
	$errors = array();

	if(isset($_POST['register'])){
		$username = mysqli_real_escape_string($db ,$_POST['username']);
		$email = mysqli_real_escape_string($db ,$_POST['email']);
		$password_1 = mysqli_real_escape_string($db ,$_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db ,$_POST['password_2']);
		$year = mysqli_real_escape_string($db ,$_POST['year']);
		$branch = mysqli_real_escape_string($db ,$_POST['branch']);
		if(empty($username))
		{
			array_push($errors , "Username is required");
		}
		if(empty($email))
		{
			array_push($errors , "Email is required");
		}
		if(empty($password_1))
		{
			array_push($errors , "Password is required");
		}

		if($password_1 != $password_2)
		{
			array_push($errors , "Passwords do not match");
		}

		if(count($errors) == 0)
		{
			$sql = "INSERT INTO students (username , email , password , year , branch)
				VALUES ('$username' , '$email' , '$password_1' ,  '$year' , '$branch')";
			mysqli_query($db , $sql);
			$_SESSION['username'] = $username;
			$_SESSION['branch'] = $branch;
			$_SESSION['year'] = $year;
  			$_SESSION['success'] = "You are now logged in";
  			$_SESSION['logged_in'] = TRUE;
  			header('location: index.php');
		}

	}
	//Login from login page
	if(isset($_POST['login'])){
		$username = mysqli_real_escape_string($db ,$_POST['username']);
		$password = $_POST['password'];

		if(empty($username))
		{
			array_push($errors , "Username is required");
		}
		if(empty($password))
		{
			array_push($errors , "Password is required");
		}

		if(count($errors) == 0)
		{
			$query = "SELECT * FROM students WHERE username = '$username' AND password = '$password'";
			$result = mysqli_query($db , $query);
			if(mysqli_num_rows($result) == 1)
			{
				$result=mysqli_query($db,$query);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				$_SESSION['username'] = $username;
				$_SESSION['branch'] = $row['branch'];
				$_SESSION['year'] = $row['year'];
  				$_SESSION['success'] = "You are now logged in";
  				$_SESSION['logged_in'] = TRUE;
  				header('location: index.php');
			}
			else
			{
				array_push($errors , "The username/password is wrong.");
				//header('location: login.php');
			}
		}
	}

	//Logout
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}
?>
