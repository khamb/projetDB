<?php

  session_start();
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die("not able to connect");

  $currentId = $_POST['id'];

  pg_query($serveur," set search_path = organisation_schema");

  pg_query($serveur, "DELETE FROM joueur where idJoueur = '$currentId'");

?>
