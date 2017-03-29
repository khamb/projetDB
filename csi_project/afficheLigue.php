<?php

  session_start();
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die("not able to connect");

  pg_query($serveur," set search_path = organisation_schema");


  $query1 = pg_query($serveur, "SELECT * FROM ligue");

  echo "<h2>Liste des Ligues</h2> <hr> <br>";

  while ($donnee = pg_fetch_row($query1))
    {
      echo "<div class= 'well col-md-4' id='ligueItem'>";
      echo "<ul class='list-group'>
      <li class='list-group-item'> <strong> Ligue N~: </strong> ".$donnee[0]."</li>
      <li class='list-group-item'> <strong> Difficulte: </strong>".$donnee[1]."</li>
      <br>
      <button class= 'voir-equ btn btn-default btn-lg pull-right' id='$donnee[0]'  > Voir Equipes</button>";
      echo "</div>";
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="jquery-3.2.0.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>

    <div class='modal fade modalContainerEL' tabindex='-1' role='dialog' >
      <div class='modal-dialog' role='document'>
          <div class='modal-content' id='modalEquipeLigue'>



          </div>
      </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function() {
      $('.voir-equ').on('click', function(event) {
        var tmp = $(this).attr('id');

        $.post('afficheTeam.php',{idLigue: tmp}, function(data,status,xhr) {
            $('#modalEquipeLigue').html(data);
            $('.modalContainerEL').modal('toggle');
        });


      });
    });

    </script>

  </body>
</html>
