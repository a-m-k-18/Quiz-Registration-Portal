<?php
include 'dbconnect.php';
session_start();
if(!isset($_SESSION['username']))
  {
    header('location: login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Simple Online Quiz">
    <meta name="author" content="Val Okafor">   
    <title>Result Page</title>
 
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <!-- Custom styles for this template -->
    <link href="css/theme.css" rel="stylesheet">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

<?php

$branch = $_SESSION['branch'];
$year = $_SESSION['year'];
$subject = $_SESSION['subject'];
$username = $_SESSION['username'];
$quizno = $_SESSION['quizno'];
$fetchqry = "SELECT * FROM questions WHERE year = '$year' AND branch = '$branch' AND subject = '$subject' AND quizno = '$quizno'";
$result=mysqli_query($con,$fetchqry);
$num=mysqli_num_rows($result);
$i=1;

$rows = array();
while($row = mysqli_fetch_array($result)){
  array_push($rows, $row);
}

$fetchqry2 = "SELECT * FROM useranswer WHERE username = '$username' AND subject = '$subject' AND quizno = '$quizno'";
$result2 = mysqli_query($con,$fetchqry2);
$num2=mysqli_num_rows($result2);

if($num2 == 0)
{

  foreach ($rows as $item) {

      $userselected = $_POST[$i];
      $q_id = $item[0];
      $correct_ans = $item[6];
      $fetchqry2 = "INSERT INTO useranswer(q_id , username, correct_ans, userans , branch , year, subject ,quizno) VALUES ( $q_id ,'$username', '$correct_ans ', '$userselected ' ,  '$year' , '$branch' , '$subject' , '$quizno')";

      mysqli_query($con,$fetchqry2);
      $i++;
  }
}

$_SESSION['score'] = 0;
$qry3 = "SELECT * FROM useranswer WHERE username = '$username' AND subject = '$subject' AND quizno = '$quizno'";
$result3 = mysqli_query($con,$qry3);
while ($row3 = mysqli_fetch_array($result3)) {
    if($row3['correct_ans']==$row3['userans']){
      $_SESSION['score'] += 1 ;
    }
}

?> 

 <div class="col-md-offset-2 col-md-8">
<h2>Result:</h2><br><br>
 <span><b>No. of Correct Answer:</b>&nbsp;<?php  echo $no = @$_SESSION['score']; 
 ?></span>

 <p> <a href="index.php?logout=1" style="color: red;">EXIT</a> </p>
</div>