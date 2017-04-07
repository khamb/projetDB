<?php

  session_start();
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die("not able to connect");

  pg_query($serveur," set search_path = organisation_schema");

  $tmpId = $_POST['idLigue'];

  $query1 = pg_query($serveur, "SELECT * FROM equipe WHERE idLigue = '$tmpId' ");

  echo "<div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title'>Equipes</h4>
        </div>";
  echo "<table class='table table-bordered table-responsive'>";
  echo "<tr class='active'>
        <th>idEquipe</th>
        <th>Nom</th>
        </tr>";


  while ($donnee = pg_fetch_row($query1))
    {
      echo "<tr class=''>
          <td>".$donnee[0]."</td>
          <td>".$donnee[1]."</td>
            </tr>";
    }

    echo "</table>";
    echo "<div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
          </div>";

?>
