<?php

  session_start();
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die("not able to connect");

  $chosenTeam = $_POST['idTeam'];

  pg_query($serveur," set search_path = organisation_schema");


  echo "<table class='table table-bordered'>
        <tr>
          <th>#</th>
          <th>Prenom</th>
          <th>Nom</th>
          <th>Courriel</th>
          <th>Tel</th>
        </tr>";
  $i=1;

  $query1 = pg_query($serveur, "SELECT prenom, nom, courriel, tel FROM Joueur,joueurEquipe WHERE joueur.idJoueur = joueurEquipe.idJoueur and joueurEquipe.idEquipe = '$chosenTeam'");



  while ($donnee = pg_fetch_row($query1)) {
    echo "<tr>
            <td>".$i."</td>
            <td>".$donnee[0]."</td>
            <td>".$donnee[1]."</td>
            <td>".$donnee[2]."</td>
            <td>".$donnee[3]."</td>
          </tr>";

    $i+=1;
  }
  echo "</table>";


?>
