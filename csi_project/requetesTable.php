<?php

  session_start();

  $username = $_SESSION['username'];
  $password = $_SESSION['password'];


  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die('ERRORR!!');
  pg_query($serveur, "set search_path = organisation_schema");

  echo "<h2>Requetes SQL</h2> <hr> <br>";
  $output = " <div class='container' id='queriesDiv'><!--debut queriesDiv-->
        <table class='table table-bordered table-responsive'>
          <tr>
            <th>Nº</th>
            <th>requete</th>
            <th>resultat</th>
          </tr>

          <tr>
            <td>1</td>
            <td>
              Quelles sont les équipes qui comportent plus de 8 joueurs, toutes ligues confondues?
              (Lister les équipes en ordre alphabétique selon le nom de l’équipe)
            </td>
            <td><button type='button' class='btn btn-primary' id='button1'>Executer</button></td>
          </tr>

          <tr>
            <td>2</td>
            <td>
              Combien de joueurs ont le nom de famille « Smith »?
            </td>
            <td><button type='button' class='btn btn-primary' id='button2'>Executer</button></td>
          </tr>

          <tr>
            <td>3</td>
            <td>
              Quels tournois sont commandités par « Ballons Inc. »?
              (Lister les IDTournoi en ordre croissant.)
            </td>
            <td><button type='button' class='btn btn-primary' id='button3'>Executer</button></td>
          </tr>

          <tr>
            <td>4</td>
            <td>
              Combien de matchs sont supervisés par un arbitre
              dont le prénom commence par la lettre «A»?
            </td>
            <td><button type='button' class='btn btn-primary' id='button4'>Executer</button></td>
          </tr>

          <tr>
            <td>5</td>
            <td>
              Quels sont les joueurs inscrits à l’équipe «Barcelona Fc» de la ligue L001?
              (Lister les joueurs en ordre alphabétique selon leur nom de famille.)
            </td>
            <td><button type='button' class='btn btn-primary' id='button5'>Executer</button></td>
          </tr>

          <tr>
            <td>6</td>
            <td>
              Quels sont les joueurs participant au tournoi T110?
              (Lister les joueurs en ordre alphabétique selon leur nom de famille.)
            </td>
            <td><button type='button' class='btn btn-primary' id='button6'>Executer</button></td>
          </tr>

          <tr>
            <td>7</td>
            <td>
              Combien de matchs, toutes ligues confondues, ont eu lieu
              le 14 mars 2016 mais pas au kansas?
            </td>
            <td><button type='button' class='btn btn-primary' id='button7'>Executer</button></td>
          </tr>

          <tr>
            <td>8</td>
            <td>
              Combien de joueurs sont inscrits à la fois à une équipe dans une
              ligue de basketball et une équipe dans une ligue de soccer?
            </td>
            <td><button type='button' class='btn btn-primary' id='button8'>Executer</button></td>
          </tr>

          <tr>
            <td>9</td>
            <td>
              À quelle date est-ce que le gestionnaire de l’équipe «Barcelona Fc» de la ligue L001 a effectué
              le paiement pour la saison débutant le 12 janvier 2016?
            </td>
            <td><button type='button' class='btn btn-primary' id='button9'>Executer</button></td>
          </tr>

          <tr>
            <td>10</td>
            <td>
              Inscrire le joueur «John Smith» à l’équipe «Barcelona Fc» de la ligue L001.
            </td>
            <td><button type='button' class='btn btn-primary' id='button10'>Executer</button></td>
          </tr>

          <tr>
            <td>11</td>
            <td>
              Supprimer l’usager «Émilie Jones» de l’organisation.
            </td>
            <td><button type='button' class='btn btn-primary' id='button11'>Executer</button></td>
          </tr>

          <tr>
            <td>12</td>
            <td>
              Modifier le nom de l’équipe «Paris SG» de la ligue L001.
            </td>
            <td><button type='button' class='btn btn-primary' id='button12'>Executer</button></td>
          </tr>








        </table>
      </div><!--fin queriesDiv-->";

      echo $output;
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="jquery-3.2.0.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>

    <div class='modal fade modalContainerEL' tabindex='-1' role='dialog' >
      <div class='modal-dialog' role='document'>
          <div class='modal-content' id='modalRequete'>



          </div>
      </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function() {
      $('button').on('click', function(event) {
        var tmp = $(this).attr('id');

        $.post('executeRequete.php', {buttonId: tmp}, function(data, status,xhr) {
          $('#modalRequete').html(data);
          $('.modalContainerEL').modal('toggle');
        });

      });
    });

    </script>


  </body>
</html>
