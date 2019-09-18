<?php include('fserver.php');
  include('dbconnect.php');
  if(!isset($_SESSION['fusername']))
  {
    header('location: flogin.php');
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div>
  	<!-- notification message -->
  	<?php 
    //session_start();
    if (isset($_SESSION['fsuccess'])){ ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['fsuccess']; 
          	unset($_SESSION['fsuccess']);
          ?>
      	</h3>
      </div>
  	<?php } ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['fusername'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['fusername']; ?></strong></p>

      <form method="post" action="add_quiz.php">

            <h1 align = "center">Add Quiz</h1>
            <div class = "row1">
              <p>Please select the year for which you want to add quiz :</p>
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
            <div>
              <select name="branch">
                <option value="ece">Electronics and Communication Engineering</option>
                <option value="eee">Electrical and Electronics Engineering</option>
                <option value="cse">Computer Science Engineering</option>
                <option value="me">Mechanical Engineering</option>
                <option value="ce">Civil Engineering</option>
              </select>
            </div><br>
            <div>
              Subject Name:
                <input type="text" name="subject">
            </div>  
            <div>
            Quiz start Time(date and time):
            <input type="datetime-local" name="starttime">          
            </div>
          <button type = "submit" name = "available_quiz" class = "btn">Add Quiz</button>
      </form>
    	<p> <a href="findex.php?flogout=1" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>