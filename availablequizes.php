<?php
  include('dbconnect.php');

  session_start();
  $_SESSION['subject'] = $_POST['subject'];

  if(!isset($_SESSION['username']))
  {
    header('location: login.php');
  }
?>

<?php  if (isset($_SESSION['username'])) : ?>
      <form action="start_quiz.php" method="post">
        <div class = "form-group">
          <label>Select which quiz you want to take</label>
            <select name="quizno">
              <?php
                    $branch = $_SESSION['branch'];
                    $year = $_SESSION['year'];
                    $subject = $_SESSION['subject'];
                    $_SESSION['subject'] = $_POST['subject'];
                    $selectSQL = "SELECT DISTINCT quizno FROM questions  WHERE year = '$year' AND branch = '$branch' and subject = '$subject'
                    ORDER BY quizno ASC ";
                    $result= mysqli_query($con,$selectSQL);
                    $rows = array();
                    while($row = mysqli_fetch_array($result)){
                    array_push($rows, $row);
                    }
                    foreach ($rows as $item) {
                      ?>
                      <option value="<?php echo $item['quizno'] ?>"><?php echo "Quiz ".$item['quizno']?> </option>
                    <?php
                    }
              ?>
            </select>
        </div>
        <div class = "input-group">
      <button type = "submit" name = "start_quiz" class = "btn">Start Quiz</button>
        </div>
    <?php endif ?>