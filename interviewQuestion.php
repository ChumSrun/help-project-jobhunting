<?php include "Header.php";
require "connect.php";

if (isset($_POST['addQuestion'])) {
  $inputQuestion = $_POST['newQuestion'];
  if (!empty($inputQuestion)) {
    $addQuestionQuery = "INSERT INTO questions (question) VALUE ('" . addslashes($inputQuestion) . "')";
    if ($connection->query($addQuestionQuery)) {
      echo "New question created successfully";
    } else {
      echo "Something went wrong!";
    }
  }
}
if (isset($_POST['submitAnswer'])) {
  $answerInput = $_POST['answer'];
  $questionId = $_POST['questionID'];
  if (!empty($answerInput) && !empty($questionId)) {
    $insertAnswerQuery = "INSERT INTO answers (answer, question_id) VALUES ('" . addslashes($answerInput) . "','" . $questionId . "')";
    if ($connection->query($insertAnswerQuery)) {
      echo "New answer inserted successfully";
    } else {
      echo "Something went wrong!";
    }
  }
}
if (isset($_POST['deleteQuestion'])) {
  $questionDeleteId = $_POST['question_id'];
  if (!empty($questionDeleteId)) {
    $deleteQuestionQuery = "DELETE FROM questions WHERE id=" . $questionDeleteId;
    if ($connection->query($deleteQuestionQuery)) {
      echo "Question deleted successfully";
    } else {
      echo "Something went wrong!";
    }
  }
}

?>
<div class="container-fluid mb-5">
  <div class="container text-center">
    <h1 class="text-center">Questions</h1>
    <form class="input-group my-3" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <input type="text" class="form-control" placeholder="Question" name="newQuestion">
      <div class="input-group-append">
        <button class="btn btn-primary ml-2" name="addQuestion" type="submit">Submit Question</button>
      </div>
    </form>
    <h5 class="text-center">Add Answer To Existed Question</h5>
  </div>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="mb-3">
    <div class="row text-center">
      <div class="col col-12 col-md-6">
        <div class="form-group d-block">
          <label>Question</label>
          <select class="form-control" name="questionID">
            <option selected>Choose The Existed Question</option>
            <?php
            $getQuestion = "SELECT * FROM questions";
            $resultQuestion = $connection->query($getQuestion);
            if ($resultQuestion->num_rows > 0) {
              while ($row = $resultQuestion->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['question']  ?></option>
            <?php
              }
            }
            ?>
          </select>
        </div>
      </div>
      <div class="col col-12 col-md-6">
        <label>Answer</label>
        <div class="input-group ">
          <input type="text" class="form-control" name="answer" placeholder="Add Your Answer Here">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" name="submitAnswer">Submit Answer</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <div class="gridContainer">
    <?php
    $getAllDataQuery = "SELECT * FROM questions ORDER BY created_date DESC";
    $result = $connection->query($getAllDataQuery);
    if ($result->num_rows > 0) {
      $questions = $result->fetch_all(MYSQLI_ASSOC);
      foreach ($questions as $key => $value) {
    ?>

        <div class="card my-1">
          <form class="card-header d-flex justify-content-between align-items-center" method="POST">
            <h5 class="pb-0 mb-0"> <?php echo $key + 1 . ". " . $value['question'] ?></h5>
            <input type="hidden" name="question_id" value="<?php echo $value['id'] ?>">
            <button type="submit" class=" btn  deleteQuestion  text-danger" name="deleteQuestion"><i class="fa fa-times" style="font-size:1.5em"></i></button>
          </form>
          <div class=" card-body">
            <ul>
              <?php
              $getAllAnswerQuery =  "SELECT * FROM answers WHERE question_id=" . $value['id'];
              $resultAnswers = $connection->query($getAllAnswerQuery);
              if ($resultAnswers->num_rows > 0) {
                while ($rowAnswer = $resultAnswers->fetch_assoc()) {
              ?>
                  <li> <?php echo $rowAnswer['answer'] ?></li>
              <?php
                }
              }
              ?>
            </ul>
          </div>
        </div>

    <?php
      }
    } else {
      echo "<p>Something went wrong</p>";
    }
    ?>
  </div>

</div>

<?php include "Footer.php" ?>