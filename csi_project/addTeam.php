<?php

  session_start();
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die("not able to connect");

  $sid = $_POST['sid'];
  $nom = $_POST['nom'];
  $sex = $_POST['sex'];
  $age = $_POST['age'];
  $year = $_POST['year'];
  $gpa = $_POST['gpa'];

  pg_query($serveur," set search_path = university_schema");

  pg_query($serveur, "INSERT INTO student VALUES('$sid','$nom','$sex','$age','$year','$gpa')");

?>
