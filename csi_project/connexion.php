


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <title></title>
  </head>
  <body>

    <div class="container well" id="connectForm">
      <h2 class="text-center"> Connexion a la base de donnee </h2><br><br>

      <form class="form-horizontal" action="index.php" method="post">
        <div class="form-group">
          <label for="username" class="col-sm-2 control-label">Nom d'utilisateur: </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username" placeholder="username ex: bamr077">
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
            <input type="submit" id="connectBtn" name="submit" class="btn btn-lg btn-success" value="Connexion">
          </div>
        </div>

      </form>

    </div>



  </body>
</html>
