<?php
include 'fserver.php';
include 'dbconnect.php';

if(isset($_POST['available_quiz']))
{
    $_SESSION['branch'] = $_POST['branch'];
    $_SESSION['year'] = $_POST['year'];
    $_SESSION['subject'] = $_POST['subject'];
    $_SESSION['starttime'] = $_POST['starttime'];
}

if(!isset($_SESSION['fusername']))
  {
    header('location: flogin.php');
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Quiz</title>
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



<div class="row">
    <div class="col-lg-12">
        <h1 align = "center">Add Quiz</h1>
        <form action="add_quiz.php" method="post">
            <div id = "items">
                <div class="form-group">
                    <label for="question">Ask Question</label>
                    <input type="text" class="form-control" name="question[]" placeholder="Enter your question here" Required>
                </div>
                <div class="form-group">
                    <label for="correct_answer">Option 1</label>
                    <input type="text" class="form-control" name="option1[]" placeholder="Enter the first option" Required>
                </div>
                <div class="form-group">
                    <label for="correct_answer">Option 2</label>
                    <input type="text" class="form-control" name="option2[]" placeholder="Enter the second option" Required>
                </div>
                <div class="form-group">
                    <label for="correct_answer">Option 3</label>
                    <input type="text" class="form-control" name="option3[]" placeholder="Enter the thrid option" Required>
                </div>
                <div class = "form-group">
                <label for="correct_answer">Option 4</label>
                    <input type="text" class="form-control" name="option4[]" placeholder="Enter the fourth option" Required>
                </div>
                <div class = "form-group">
                <label>Correct Choice(Copy exactly from correct option)</label>
                    <input type="text" class="form-control" name="correct_ans[]" placeholder="Enter the correct choice here" Required>
                </div>
            </div>
            <input type="button" class="btn btn-primary btn-large" value="Add Question" name="add entry" id = "add">
            <button type = "submit" name = "submit" class = "btn">Add Quiz</button>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" language="javascript" src="js/custom.js"></script>


<?php  if (isset($_SESSION['fusername'])) : ?>
<div><p align= "center"> <a href="findex.php?flogout=1" style="color: red;">LOGOUT</a> </p>
</div>
<?php endif ?>


<?php if(isset($_POST['submit'])){

$branch = $_SESSION['branch'];
$year = $_SESSION['year'];
$subject = $_SESSION['subject'];
$starttime = date("Y-m-d H:i:s",strtotime($_SESSION['starttime']));
$quizno = 0;

$query1 = "SELECT * FROM quizzes WHERE year = '$year' AND branch = '$branch' AND subject = '$subject'";
$result1 = mysqli_query($con , $query1);
$quizno = mysqli_num_rows($result1) + 1;
$query2 = "INSERT INTO quizzes(year , branch , subject , quizno ,startTime)
    VALUES ('$year' ,'$branch','$subject','$quizno','$starttime')";
mysqli_query($con , $query2);

$query3 = "SELECT * FROM subjects WHERE year = '$year' AND branch = '$branch' AND subject = '$subject'";
$result3 = mysqli_query($con , $query3); 

if(mysqli_num_rows($result3) == 0)
{

    $query4 = "INSERT INTO subjects(year , branch , subject ,SubName)
    VALUES ('$year' ,'$branch','$subject','$subject')";
    mysqli_query($con , $query4);
}


$size = sizeof($_POST['question']);
for ($i = 0;$i < $size;$i++)
{
 
 $question = $_POST['question'][$i];
 $ans1 = $_POST['option1'][$i];
 $ans2 = $_POST['option2'][$i];
 $ans3 = $_POST['option3'][$i];
 $ans4 = $_POST['option4'][$i];
 $correct_ans = $_POST['correct_ans'][$i];

$query5 = "INSERT INTO questions(question,ans1,ans2,ans3,ans4,correct_ans,year,branch,subject,quizno)
    VALUES ('$question' ,'$ans1','$ans2','$ans3','$ans4' , '$correct_ans' , '$year' , '$branch' ,'$subject', '$quizno')";
mysqli_query($con , $query5);

}


}
?>