<?php

  session_start();
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die("not able to connect");

  pg_query($serveur," set search_path = organisation_schema");

  $currentId = $_POST['id'];
  $currentPrenom = $_POST['prenom'];
  $currentNom = $_POST['nom'];
  $currentCourriel = $_POST['courriel'];
  $currentTel= $_POST['tel'];
  $updateQuery = pg_prepare($serveur,"queryPrep", "UPDATE organisation_schema.joueur  SET prenom = $2, nom = $3, courriel =$4, tel=$5 WHERE idJoueur = $1 ");

  $execPrepQ = pg_execute($serveur, "queryPrep", array($currentId,$currentPrenom,$currentNom,$currentCourriel, $currentTel));
  ?>
