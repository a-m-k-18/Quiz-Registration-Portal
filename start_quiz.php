<?php
include 'dbconnect.php';
include 'server.php';

$_SESSION['quizno'] = $_POST['quizno'];

if(!isset($_SESSION['username']))
  {
    header('location: login.php');
  }


$branch = $_SESSION['branch'];
$year = $_SESSION['year'];
$subject = $_SESSION['subject'];
$quizno = $_SESSION['quizno'];
$username = $_SESSION['username'];
$fetchqry2 = "SELECT * FROM useranswer WHERE username = '$username' AND subject = '$subject' AND quizno = '$quizno'";
$result2 = mysqli_query($con,$fetchqry2);
$num2=mysqli_num_rows($result2);
if($num2 > 0)
{
    $_SESSION['quiztaken'] = "Quiz attempted already";
    //echo $interval->format('%R'); 
    header('location: index.php');
}

date_default_timezone_set('Asia/Kolkata');
$date1 = date('Y/m/d h:i:s a');
$quizquery = "SELECT * FROM quizzes WHERE year = '$year' AND branch = '$branch' AND subject = '$subject' and quizno = '$quizno'";
$result1=mysqli_query($con,$quizquery);
$num1=mysqli_num_rows($result1);

while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC)){

  $date2 = date($row['startTime']);
  $dteStart = new DateTime($date1); 
  $dteEnd   = new DateTime($date2); 
  $interval = date_diff($dteStart, $dteEnd);
  $sign = $interval->format('%R'); 
  if($sign == '-')
  { //echo $interval->format('%R:%H:%i:%S');  
    $nothing = 1;} //Do nothing.    
  else
  {  
    $_SESSION['quizstart'] = "Quiz has not started yet";
    //echo $interval->format('%R'); 
    header('location: index.php');
  }
}
/*if($result > 0)
{
  echo $date;
  echo "<script> window.location='availablequizes.php';
</script>";
}*/
//echo $date;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Start Quiz</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Simple Online Quiz">
    <meta name="author" content="Val Okafor">   
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link href="css/theme.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<center>
  <h>Ten minutes timer</h>
<div id="divCounter"></div>
    <script type="text/javascript">
      function fancyTimeFormat(time)
{   
    // Hours, minutes and seconds
    var hrs = ~~(time / 3600);
    var mins = ~~((time % 3600) / 60);
    var secs = ~~time % 60;

    // Output like "1:01" or "4:03:59" or "123:03:59"
    var ret = "";

    if (hrs > 0) {
        ret += "" + hrs + ":" + (mins < 10 ? "0" : "");
    }

    ret += "" + mins + ":" + (secs < 10 ? "0" : "");
    ret += "" + secs;
    return ret;
}
    if(localStorage.getItem("counter")){
      if(localStorage.getItem("counter") >= 600){
        var value = 0;

      }else{
        var value = localStorage.getItem("counter");
      }
    }else{
      var value = 0;
    }
    document.getElementById('divCounter').innerHTML = value;

    var counter = function (){
      if(value >= 600){
        localStorage.setItem("counter", 0);
        value = 0;
        window.location="result.php";
      }else{
        value = parseInt(value)+1;
        localStorage.setItem("counter", value);
      }
      document.getElementById('divCounter').innerHTML = fancyTimeFormat(value);
    };

    var interval = setInterval(function (){counter();}, 1000);
  </script>
</center>
<div id="myDIV" style="padding: 10px 30px;">
<form action="result.php" method="post" id="form">  		
<table><?php   
				$fetchqry = "SELECT * FROM questions WHERE year = '$year' AND branch = '$branch' AND subject = '$subject' and quizno = '$quizno'";
				$result=mysqli_query($con,$fetchqry);
				$num=mysqli_num_rows($result);
			   while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		  ?>
  <tr><td><h3><br><?php echo @$snr +=1;?>&nbsp;-&nbsp;<?php echo @$row['question'];?></h3></td></tr>

  <tr><td>a )&nbsp;&nbsp;&nbsp;<input type="radio" name="<?php echo $snr;?>" value="<?php echo $row['ans1'];?>">&nbsp;<?php echo $row['ans1']; ?><br>

  <tr><td>b )&nbsp;&nbsp;&nbsp;<input type="radio" name="<?php echo $snr;?>" value="<?php echo $row['ans2'];?>">&nbsp;<?php echo $row['ans2'];?></td></tr>

  <tr><td>c )&nbsp;&nbsp;&nbsp;<input type="radio" name="<?php echo $snr;?>" value="<?php echo $row['ans3'];?>">&nbsp;<?php echo $row['ans3']; ?></td></tr>

  <tr><td>d )&nbsp;&nbsp;&nbsp;<input  type="radio" name="<?php echo $snr;?>" value="<?php echo $row['ans4'];?>">&nbsp;<?php echo $row['ans4']; ?><br><br><br></td></tr>

			    <?php  }
																	?> 
		<tr><td align="center"><button class="button3" name="click" >Submit Quiz</button></td></tr>
	</table>
  <form>
</div>
