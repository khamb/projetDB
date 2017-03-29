<?php

  session_start();
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die("not able to connect");

  pg_query($serveur," set search_path = organisation_schema");


  $query1 = pg_query($serveur, "SELECT * FROM employe ORDER BY nom");

  echo "<h2>Liste des Employes</h2> <hr> <br>";

  while ($donnee = pg_fetch_row($query1))
    {
      echo "<div class= 'well col-md-4' >";
      echo "<ul class='list-group'>
          <li class='list-group-item'> <strong> Prenom: </strong> ".$donnee[1]."</li>
          <li class='list-group-item'> <strong> Nom: </strong>".$donnee[2]."</li>
          <li class='list-group-item'> <strong> Role: </strong>".$donnee[3]."</li>
          <br>
          <button class= 'btn btn-default btn-lg pull-right'><i class='glyphicon glyphicon-remove'> </i></button>
          <button class= 'btn btn-default btn-lg pull-right' data-toggle='modal' data-target='#editEmpModal-$donnee[0]'><i class='glyphicon glyphicon-pencil'> </i></button> ";

          //form for updating employee informations
      echo "<div class='modal fade' id='editEmpModal-$donnee[0]' tabindex='-1' role='dialog' aria-labelledby='editEmpModal'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
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
                        <label for='role'>Role</label>
                        <input type='text' class='form-control' id='role-$donnee[0]' value='$donnee[3]'>
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

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="jquery-3.2.0.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>

    <script type="text/javascript">
      function updateEmploye(idEmp){

        var tmpData = {
          id: idEmp,
          prenom: $('#prenom-'+idEmp).val(),
          nom: $('#nom-'+idEmp).val(),
          role: $('#role-'+idEmp).val()
        }

        $.post('updateEmploye.php', tmpData, function(data, textStatus, xhr) {

          //mettre a jour automatiquement la vue des employes
          $.get('afficheEmploye.php', function(data, status){
            $("#corps").html(data);
          });
        });

      }
    </script>

  </body>

</html>
