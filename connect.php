<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "web_assignment_year_4_job_hunting";

$connection = new mysqli($hostname, $username, $password, $databaseName);

if ($connection->connect_error) {
  die("Connect Failed:" + $connection->connect_error);
}
