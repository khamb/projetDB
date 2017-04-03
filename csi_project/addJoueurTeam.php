<?php

  session_start();
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die("not able to connect");

  $currentId = $_POST['id'];
  $currentPrenom = $_POST['prenom'];
  $currentNom = $_POST['nom'];
  $currentCourriel = $_POST['courriel'];
  $currentTel = $_POST['tel'];

  $teamSelected = $_POST['idTeam'];

  pg_query($serveur," set search_path = organisation_schema");

  pg_query($serveur, "INSERT INTO organisation_schema.joueur VALUES('$currentId','$currentPrenom','$currentNom','$currentCourriel','$currentTel')");
  pg_query($serveur, "INSERT INTO organisation_schema.joueurEquipe VALUES ('$currentId', '$teamSelected'");
?>
