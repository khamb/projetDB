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
          <button class= 'btn btn-primary btn-lg pull-right' data-toggle='modal' data-target='#ajTeam-$donnee[0]'><i class='glyphicon glyphicon-plus'></i></button>
          <button class= 'btn btn-default btn-lg pull-right' name='$donnee[0]' onclick='montrerJoueurs(name)' data-target='tablePlayer-$donnee[0]' ><i class='glyphicon glyphicon-th-list'> </i></button>";


      //modal pour ajouter un nouveau joueur
      echo "<div class='modal fade' id='ajTeam-$donnee[0]' tabindex='-1' role='dialog' aria-labelledby='ajTeamModal'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content' id='ajTeamModal'>
                  <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title'>Ajouter un nouveau joueur</h4>
                  </div>
                  <div class='modal-body' id='editEmpModal'>

                    <form class='' action='' method='post'>
                      <div class='form-group'>
                        <label for='Id'>Id</label>
                        <input type='text' class='form-control' id='id-$donnee[0]' placeholder='ex j40...'>
                      </div>

                      <div class='form-group'>
                        <label for='prenom'>Prenom</label>
                        <input type='text' class='form-control' id='prenom-$donnee[0]'>
                      </div>

                      <div class='form-group'>
                        <label for='nom'>Nom</label>
                        <input type='text' class='form-control' id='nom-$donnee[0]' >
                      </div>

                      <div class='form-group'>
                        <label for='courriel'> Courriel</label>
                        <input type='email' class='form-control' id='courriel-$donnee[0]' >
                      </div>

                      <div class='form-group'>
                        <label for='tel'> Tel</label>
                        <input type='text' class='form-control' id='tel-$donnee[0]' >
                      </div>

                    </form>

                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Annuler</button>
                    <button type='button' class='btn btn-primary' id='$donnee[0]' onclick='ajouteJoueur(id)' data-dismiss='modal'>Enregistrer</button>
                  </div>
                </div>
              </div>
            </div>";


        //MODAL POUR MONTRER DANS UN TABLEAU LA LISTE DES JOUEURS DE L'EQUIPE
        echo "<div class='modal fade' id='tablePlayer-$donnee[0]' tabindex='-1' role='dialog' aria-labelledby='tablePlayerBody-$donnee[0]' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                      <h3 class='modal-title'>Liste des joueurs de l'equipe</h3>
                    </div>
                    <div class='modal-body' id='tablePlayerBody-$donnee[0]'>


                    </div>
                    <div class='modal-footer'>
                      <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
                    </div>
                  </div>
                </div>
              </div>";


      echo "</div>";
    }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="jquery-3.2.0.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>

    <script type="text/javascript">
      function ajouteJoueur(idEqu){

        var tmpData = {
          idTeam: idEqu,
          id: $('#id-'+idEqu).val(),
          prenom: $('#prenom-'+idEqu).val(),
          nom: $('#nom-'+idEqu).val(),
          courriel: $('#courriel-'+idEqu).val(),
          tel: $('#tel-'+idEqu).val()
        }

        $.post('addJoueurTeam.php', tmpData, function(data, textStatus, xhr) {
          console.log(data);
          //mettre a jour automatiquement la vue
          $.get('afficheTeamPlayers.php', function(data, status){
            $("#tablePlayerBody-"+idEqu).html(data);
          });
        });
      }

      function montrerJoueurs(idEqu){

        var tmpData = {idTeam: idEqu};

        $.post('afficheTeamPlayers.php', tmpData, function(data, textStatus, xhr) {

          $("#tablePlayerBody-"+idEqu).html(data);
          $("#tablePlayer-"+idEqu).modal('toggle');
        });

      }



    </script>

  </body>

</html>
