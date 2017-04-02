<?php

  session_start();
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die("not able to connect");

  pg_query($serveur," set search_path = organisation_schema");


  $query1 = pg_query($serveur, "SELECT idEquipe, nom,idGerantEqu,datePaiement,maxJoueur,minJoueur FROM equipe ORDER BY nom");

  echo "<h2>Liste des Equipes</h2> <hr> <br>";

  while ($donnee = pg_fetch_row($query1))
    {
      echo "<div class= 'well col-md-4' >";
      echo "<ul class='list-group'>
          <li class='list-group-item'> <strong> Nom: </strong> ".$donnee[1]."</li>
          <li class='list-group-item'> <strong> ID Gerant: </strong>".$donnee[2]."</li>
          <li class='list-group-item'> <strong> date Paiement: </strong>".$donnee[3]."</li>
          <li class='list-group-item'> <strong> maximum joueurs: </strong>".$donnee[4]."</li>
          <li class='list-group-item'> <strong> minimum joueurs: </strong>".$donnee[5]."</li>
          <br>
          <button class= 'btn btn-default btn-lg pull-right'><i class='glyphicon glyphicon-remove'> </i></button>
          <button class= 'btn btn-primary btn-lg pull-right' data-toggle='modal' data-target='#$donnee[0]'><i class='glyphicon glyphicon-plus'></i></button>";


      //modal pour ajouter un nouveau joueur
      echo "<div class='modal fade' id='$donnee[0]' tabindex='-1' role='dialog' aria-labelledby='editEmpModal'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title'>Ajouter un nouveau joueur</h4>
                  </div>
                  <div class='modal-body'>

                    <form class='' action='' method='post'>
                      <div class='form-group'>
                        <label for='prenom'>Prenom</label>
                        <input type='text' class='form-control' id='prenom-$donnee[0]'>
                      </div>

                      <div class='form-group'>
                        <label for='nom'>Nom</label>
                        <input type='text' class='form-control' id='nom-$donnee[0]' >
                      </div>

                      <div class='form-group'>
                        <label for='role'> Courriel</label>
                        <input type='text' class='form-control' id='role-$donnee[0]' >
                      </div>

                      <div class='form-group'>
                        <label for='role'> Tel</label>
                        <input type='text' class='form-control' id='role-$donnee[0]' >
                      </div>

                    </form>

                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Annuler</button>
                    <button type='button' class='btn btn-primary' id='$donnee[0]' onclick='updateEmploye(id)' data-dismiss='modal'>Enregistrer</button>
                  </div>
                </div>
              </div>
            </div>";


      echo "</div>";
    }
?>
