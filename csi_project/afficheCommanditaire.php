<?php

  session_start();
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die("not able to connect");

  pg_query($serveur," set search_path = organisation_schema");


  $query1 = pg_query($serveur, "SELECT * FROM commanditaire");

  echo "<h2>Liste des Commanditaires</h2> <hr> <br>";

  while ($donnee = pg_fetch_row($query1))
    {
      echo "<div class= 'well col-md-4' >";
      echo "<ul class='list-group'>
          <li class='list-group-item'> <strong> Nom: </strong> ".$donnee[1]."</li>
          <li class='list-group-item'> <strong> Tel: </strong>".$donnee[2]."</li>
          <li class='list-group-item'> <strong> Contribution: </strong>".$donnee[3]."</li>
          <br>
          <button class= 'btn btn-default btn-lg pull-right'><i class='glyphicon glyphicon-remove'> </i></button>
          <button class= 'btn btn-default btn-lg pull-right'><i class='glyphicon glyphicon-pencil'> </i></button>";
      echo "</div>";
    }
?>
