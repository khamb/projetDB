<?php

  session_start();



  $username = $_SESSION['username'] ;
  $password = $_SESSION['password'];

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die("enable to connect!");

  pg_query($serveur, "set search_path = organisation_schema");

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- Optional theme -->
    <script src="jquery-3.2.0.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title> Projet de Fabrice & Khadim</title>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
          <a href="index.php"><i class="navbar-brand">Fabrice & Khadim</i></a>
          <ul class="nav nav-pills">
            <li class=""><a href="#"  id='affEmpButton'>Employes</a></li>
            <li class=""><a href="#" id='affJouButton'>Joueurs</a></li>
            <li class=""><a href="#" id='affArbitreButton'>Arbitres</a></li>
            <li class=""><a href="#" id='affLigueButton'>Ligues</a></li>
            <li class=""><a href="#" id="queriesButton" style="color: #33cc33;">Requetes</a></li>
            <li class=""><a href="#" id="affTeamButton">Equipes</a></li>
            <li class=""><a href="#" id="affComButton">Commanditaires</a></li>
            <li class=""><a href="#" id='affMatchButton'>Matchs</a></li>
            <li class=""><a href="#" id='affTournoiButton' >Tournois</a></li>
          </ul>
      </div>
    </nav>


    <div class="container " id="corps">
      <h2> Bienvenue a notre application de gestion sportive!</h2><br>
      <h4>les technologies utilisees dans cette application web:</h4><hr><br>

      <div class="container-fluid row text-center">
          <div class="col-md-3 col-xs-3">
           <img src="images/html5.png" title="Html5" height="150" width="150" alt="Hhtml 5 logo" class="">
          </div>

          <div class="col-md-3 col-xs-3">
           <img src="images/css3.png" title="Css3" height="150" width="150" alt="css3 logo" class="">
          </div>

          <div class="col-md-3 col-xs-3">
           <img src="images/jQuery.gif" title="JQuery" height="150" width="150" alt="jQuery logo" class="">
          </div>

          <div class="col-md-3 col-xs-3">
           <img src="images/bootstrap.png" title="bootstrap" height="200" width="200" alt="bootstrap logo" class="">
          </div>

      </div>

      <div class="container-fluid row text-center">

          <div class="col-md-3 col-xs-3">
           <img src="images/javascript.png" title="javascript" height="150" width="150" alt="javascript logo" class="">
          </div>

          <div class="col-md-3 col-xs-3">
           <img src="images/ajax.png" title="ajax" height="150" width="150" alt="ajax logo" class="">
          </div>

          <div class="col-md-3 col-xs-3">
           <img src="images/postgres.png" title="postgres" height="150" width="200" alt="postgreSQL logo" class="">
          </div>

          <div class="col-md-3 col-xs-3">
            <a href="https://github.com/khamb/projetDB">
              <img src="images/github.png" title="github" height="150" width="150" alt="github logo" class="img-thumbnail">
            </a>
          </div>


      </div>
      <br><br><br><br>
    </div>



    <!--footer-->
    <footer class="navbar navbar-default navbar-fixed-bottom text-center">
      <span><i>&copy;2017 - Fabrice & Khadim :) </i></span>
    </footer>

    <script src="main.js" type="text/javascript"> </script>

  </body>


</html>
