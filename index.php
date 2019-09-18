<?php include('server.php');
  include('dbconnect.php');
  if(!isset($_SESSION['username']))
  {
    header('location: login.php');
  }
  if(isset($_SESSION['quizstart']))
  {
    $message = "Quiz not yet started";
    echo "<script type='text/javascript'>alert('$message');</script>";
    unset($_SESSION['quizstart']);
  }
  if(isset($_SESSION['quiztaken']))
  {
    $message = "Quiz already attempted";
    echo "<script type='text/javascript'>alert('$message');</script>";
    unset($_SESSION['quiztaken']);
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>

</div>
<div class="content">
  	<!-- notification message -->
  	<?php 
    //session_start();
    if (isset($_SESSION['success'])){ ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php } ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <form action="availablequizes.php" method="post">
        <div class = "form-group">
          <label>Select exam subject</label>
            <select name="subject">
              <?php
                    $branch = $_SESSION['branch'];
                    $year = $_SESSION['year'];
                    $selectSQL = "SELECT * FROM subjects WHERE year = '$year' AND branch = '$branch'";
                    $result= mysqli_query($con,$selectSQL);
                    $rows = array();
                    while($row = mysqli_fetch_array($result)){
                    array_push($rows, $row);
                    }
                    foreach ($rows as $item) {
                      $subject = $item['subject'];
                      $subjectName = $item['SubName'];?>
                      <option value="<?php echo $subject ?>"><?php echo $subjectName ?> </option>
                    <?php
                    }
              ?>
            </select>
        </div>
        <div class = "input-group">
      <button type = "submit" name = "available_quiz" class = "btn">Start Quiz</button>
        </div>
      </form> 
    	<p> <a href="index.php?logout=1" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>