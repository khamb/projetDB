<?php

  session_start();
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die("not able to connect");

  pg_query($serveur," set search_path = organisation_schema");


  $query1 = pg_query($serveur, "SELECT prenom, nom FROM arbitre, employe WHERE arbitre.idEmploye = employe.idEmploye");

  echo "<h2>Liste des Arbitres</h2> <hr> <br>";

  while ($donnee = pg_fetch_row($query1))
    {
      echo "<div class= 'well col-md-4' >";
      echo "<ul class='list-group'>
          <li class='list-group-item'> <strong> Prenom: </strong> ".$donnee[0]."</li>
          <li class='list-group-item'> <strong> Nom: </strong>".$donnee[1]."</li>
          <br>
          <button class= 'btn btn-default btn-lg pull-right'><i class='glyphicon glyphicon-remove'> </i></button>";
      echo "</div>";
    }
?>
