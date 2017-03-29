<?php

  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];

  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password");

  if($serveur){
     echo "Opened database successfully\n";
  } else {
     echo "Error : Unable to open database!!\n";
  }
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
          <i class="navbar-brand" >Fabrice & Khadim</i>
          <ul class="nav nav-pills">
            <li class="active"><a href="#"  id='affEmpButton'>Employes</a></li>
            <li class=""><a href="#" id='affJouButton'>Joueurs</a></li>
            <li class=""><a href="#" id='affArbitreButton'>Arbitres</a></li>
            <li class=""><a href="#" id='affLigueButton'>Ligues</a></li>
            <li class=""><a href="#" id="queriesButton" style="color: #33cc33;">Requetes</a></li>
            <li class=""><a href="#" id="affTeamButton">Equipes</a></li>
            <li class=""><a href="#" id="affComButton">Commanditaires</a></li>
            <li class=""><a href="#">Matchs</a></li>
            <li class=""><a href="#" id='' >Tournois</a></li>
          </ul>
      </div>
    </nav>


    <div class="container " id="corps">

    </div>



    <!--footer-->
    <footer class="navbar navbar-default navbar-fixed-bottom text-center">
      <span><i>&copy;2017 - Fabrice & Khadim :) </i></span>
    </footer>

    <script src="main.js" type="text/javascript"> </script>

  </body>


</html>
