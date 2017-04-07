<?php

  session_start();
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die("not able to connect");

  pg_query($serveur," set search_path = organisation_schema");


  $query1 = pg_query($serveur, "SELECT * FROM joueur order by nom");

  echo "<h2>Liste des Joueurs</h2> <hr> <br>";


  while ($donnee = pg_fetch_row($query1))
    {
      echo "<div class= 'well col-md-4' >";
      echo "<ul class='list-group'>
      <li class='list-group-item'> <strong> Prenom: </strong> ".$donnee[1]."</li>
      <li class='list-group-item'> <strong> Nom: </strong>".$donnee[2]."</li>
      <li class='list-group-item'> <strong> Courriel: </strong>".$donnee[3]."</li>
      <li class='list-group-item'> <strong> Tel: </strong>".$donnee[4]."</li>
      <br>
      <button class= 'btn btn-default btn-lg pull-right' data-toggle='modal' data-target='#delJouModal-$donnee[0]'><i class='glyphicon glyphicon-remove'> </i></button>
      <button class= 'btn btn-default btn-lg pull-right' data-toggle='modal' data-target='#editJoueurModal-$donnee[0]'><i class='glyphicon glyphicon-pencil'> </i></button>";

      //MODAL POUR confirmer suppression joueur
      echo "<div class='modal fade' id='delJouModal-$donnee[0]' tabindex='-1' role='dialog' aria-labelledby='delJouModal' aria-hidden='true'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-body'id='delJouModal'>
                    <h4>Voulez-vous VRAIMENT supprimer ce joueur?</h4>
                  </div>
                  <div class='modal-footer'>
                    <button class= 'btn btn-primary btn-lg pull-right' name='$donnee[0]' onclick='deleteJoueur(name)' data-dismiss='modal'>Oui</button>
                    <button class= 'btn btn-default btn-lg pull-right' data-dismiss='modal' >Non</button>
                  </div>
                </div>
              </div>
            </div>";

      //form for updating joueur informations
  echo "<div class='modal fade' id='editJoueurModal-$donnee[0]' tabindex='-1' role='dialog' aria-labelledby='editJouModal' aria-hidden='true'>
          <div class='modal-dialog' role='document'>
            <div class='modal-content' id='editJouModal'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title'>Modifier les infos de l'Employe</h4>
              </div>
              <div class='modal-body'>

                <form class='' action='' method='post'>
                  <div class='form-group'>
                    <label for='prenom'>Prenom</label>
                    <input type='text' class='form-control' id='prenom-$donnee[0]' value='$donnee[1]'>
                  </div>

                  <div class='form-group'>
                    <label for='nom'>Nom</label>
                    <input type='text' class='form-control' id='nom-$donnee[0]' value='$donnee[2]'>
                  </div>

                  <div class='form-group'>
                    <label for='courriel'>Courriel</label>
                    <input type='email' class='form-control' id='courriel-$donnee[0]' value='$donnee[3]'>
                  </div>

                  <div class='form-group'>
                    <label for='tel'>Tel</label>
                    <input type='text' class='form-control' id='tel-$donnee[0]' value='$donnee[4]'>
                  </div>

                </form>

              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Annuler</button>
                <button type='button' class='btn btn-primary' id='$donnee[0]' onclick='updateJoueur(id)' data-dismiss='modal'>Enregistrer</button>
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
  </head>
  <body>

    <script type="text/javascript">

      function updateJoueur(idJou){

        var tmpData = {
          id: idJou,
          prenom: $('#prenom-'+idJou).val(),
          nom: $('#nom-'+idJou).val(),
          courriel: $('#courriel-'+idJou).val(),
          tel: $('#tel-'+idJou).val()
        }

        $.post('updateJoueur.php', tmpData, function(data, textStatus, xhr) {

          //mettre a jour automatiquement la vue des joueurs
          $.get('afficheJoueur.php', function(data, status){
            $("#corps").html(data);
          });
        });
      }

      function deleteJoueur(idJou){
        var tmpId = {id: idJou};

        $.post('deleteJoueur.php', tmpId, function(data, textStatus, xhr) {
          //mettre a jour automatiquement la vue des employes apres suppression
          $.get('afficheJoueur.php', function(data, status){
            $("#corps").html(data);
          });
        });
      }


    </script>

  </body>

</html>
