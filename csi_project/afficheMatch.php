<?php

  session_start();
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die("not able to connect");

  pg_query($serveur," set search_path = organisation_schema");


  $query1 = pg_query($serveur, "SELECT idMatch,ddate, heure, lieu FROM match");


  echo "<h2>Liste des Matchs</h2> <hr> <br>";

  while ($donnee = pg_fetch_row($query1))
    {
      //$queryEqu recupere les equipes qui disputent le match
      $queryEqu = pg_query($serveur, "SELECT nom FROM equipe WHERE idMatch = '$donnee[0]' ");
      $resultQEqu = pg_fetch_all($queryEqu); // on recupere une array des resultats de $query2


      echo "<div class= 'well col-md-4' >";
      echo "<ul class='list-group'>
          <li class='list-group-item'> <strong> date: </strong> ".$donnee[1]."</li>
          <li class='list-group-item'> <strong> heure: </strong>".$donnee[2]."</li>
          <li class='list-group-item'> <strong> lieu: </strong>".$donnee[3]."</li>";

      if(!empty($resultQEqu)){
          echo "<li class='list-group-item'> <strong> Equipes: </strong>".$resultQEqu[0]['nom']."<strong> VS </strong> ".$resultQEqu[1]['nom']."</li>";
      }
      else {
        echo "<li class='list-group-item'> <strong> Equipes: </strong> <i style='color: red; '>A determiner</i> </li>";
      }

      echo "<br> </div>";
    }
?>
