<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Job Hunting</title>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">

    <button class="navbar-toggler ml-n2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand mx-auto" href="index.php">Job Hunting</a>


    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item <?php if (basename($_SERVER["SCRIPT_NAME"]) == "index.php") echo 'active' ?> ">
          <a class="nav-link" href="./index.php">Home</a>
        </li>
        <li class="nav-item <?php if (basename($_SERVER["SCRIPT_NAME"]) == "interviewQuestion.php") echo 'active' ?>">
          <a class="nav-link" href="interviewQuestion.php">Interview Questions</a>
        </li>
        <li class="nav-item <?php if (basename($_SERVER["SCRIPT_NAME"]) == "aboutMe.php") echo 'active' ?>">
          <a class="nav-link" href="aboutMe.php">About Me</a>
        </li>
      </ul>
    </div>

  </nav>