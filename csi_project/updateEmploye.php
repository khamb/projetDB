<?php

  session_start();
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die("not able to connect");

  pg_query($serveur," set search_path = organisation_schema");

  $currentId = $_POST['id'];
  $currentPrenom = $_POST['prenom'];
  $currentNom = $_POST['nom'];
  $currentRole = $_POST['role'];
  $updateQuery = pg_prepare($serveur,"queryPrep", "UPDATE organisation_schema.employe  SET prenom = $2, nom = $3, role =$4 WHERE idEmploye = $1 ");

  $execPrepQ = pg_execute($serveur, "queryPrep", array($currentId,$currentPrenom,$currentNom,$currentRole));

  if($execPrepQ){
    echo "nice";
  } else {
    echo "wrong";
  }
?>
