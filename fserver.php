<?php
	session_start();
	//Connecting to database
	$db = mysqli_connect('localhost' , 'root' , '' , 'quiz');
	$fusername = "";
	$femail = "";
	$errors = array();

	//Login from login page
	if(isset($_POST['flogin'])){
		$fusername = mysqli_real_escape_string($db ,$_POST['fusername']);
		$fpassword = mysqli_real_escape_string($db ,$_POST['fpassword']);

		if(empty($fusername))
		{
			array_push($errors , "Username is required");
		}
		if(empty($fpassword))
		{
			array_push($errors , "Password is required");
		}

		if(count($errors) == 0)
		{
			$query = "SELECT * FROM faculties WHERE fusername = '$fusername' AND fpassword = '$fpassword'";
			$result = mysqli_query($db , $query);
			if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['fusername'] = $fusername;
  				$_SESSION['fsuccess'] = "You are now logged in";
  				$_SESSION['flogged_in'] = TRUE;
  				header('location: findex.php');
			}
			else
			{
				array_push($errors , "The username/password is wrong.");
				//header('location: login.php');
			}
		}
	}

	//Logout
	if(isset($_GET['flogout'])){
		session_destroy();
		unset($_SESSION['fusername']);
		header('location: flogin.php');
	}
?>