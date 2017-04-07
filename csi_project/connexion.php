<?php

  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];
  $message = $_POST['message'];

  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;

  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password");

  if($serveur){
    header("Location: http://localhost:8888/csi_project/index.php");
  }else{
    if(!empty($message)){ //on si la value rien dans le hidden input de notre form apparait
        $msg = "erreur";
    }
  }

  pg_query($serveur, "set search_path = organisation_schema");


 ?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <script src="jquery-3.2.0.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>

    <?php if($msg == "erreur"){
      echo "<div class='alert alert-danger' id='erMsg'>
           <strong>ERREUR!</strong> le username ou le password n'est pas correct, Reessayez!.
         </div>";}
    ?>

    <div class="container well" id="connectForm">
      <h2 class="text-center"> Connexion a la base de donnee </h2><br><br>
      <form class="form-horizontal" action="" method="post">

        <input type="hidden" name="message" value="rien">
        <div class="form-group">
          <label for="username" class="col-sm-2 control-label">Nom d'utilisateur: </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username" placeholder="localhost username or uOttawa username ">
          </div>
        </div>

        <div class="form-group">
          <label for="pswrd" class="col-sm-2 control-label">Mot de passe: </label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" placeholder="password">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-offset-2 col-md-10">
            <input type="submit" name="submit" class="btn btn-lg btn-success" value="Connexion">
          </div>
        </div>

      </form>

    </div>



    <script type="text/javascript" src="main.js"> </script>


  </body>
</html>
