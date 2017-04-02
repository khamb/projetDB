<?php

  session_start();
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die("not able to connect");

  pg_query($serveur," set search_path = organisation_schema");


  $query1 = pg_query($serveur, "SELECT oeuvre,fonds,dateDebut,dateFin, nom FROM TournoiCharite, Sport WHERE TournoiCharite.idSport = Sport.idSport ");

  echo "<h2>Liste des Tournois</h2> <hr> <br>";

  while ($donnee = pg_fetch_row($query1))
    {
      echo "<div class= 'well col-md-4' >";
      echo "<ul class='list-group'>
          <li class='list-group-item'> <strong> Oeuvre: </strong> ".$donnee[0]."</li>
          <li class='list-group-item'> <strong> Fonds: </strong>".$donnee[1]."</li>
          <li class='list-group-item'> <strong> date debut: </strong>".$donnee[2]."</li>
          <li class='list-group-item'> <strong> date fin: </strong>".$donnee[3]."</li>
          <li class='list-group-item'> <strong> Sport: </strong>".$donnee[4]."</li>
          <br>
          <button class= 'btn btn-default btn-lg pull-right'><i class='glyphicon glyphicon-remove'> </i></button>";


      echo "</div>";
    }
?>
