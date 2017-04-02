<?php

  session_start();

  $username = $_SESSION['username'];
  $password = $_SESSION['password'];


  $serveur = pg_connect("host=www.eecs.uottawa.ca port=15432 dbname=$username user=$username password=$password") or die('ERRORR!!');
  pg_query($serveur, "set search_path = organisation_schema");

  $pressedButton = $_POST['buttonId'];



  //afficher les resultats des requetes
  switch ($pressedButton) {
    case 'button1':
      # code...
      echo "<div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            <h4 class='modal-title'> Resultat Requete Nº1</h4>
            </div>
            <table class='table table-bordered table-responsive'>
            <tr>
            <th>Nº</th>
            <th>Nom Equipe</th>
            </tr>";
      $i=1;
      $query1 = pg_query($serveur, "SELECT b.nom,  count (idjoueur)>17 from organisation_schema.joueurequipe a, organisation_schema.equipe b
                      where a.idequipe = b.idequipe
                      group by a.idequipe, b.nom
                      order by b.nom
                      ");
      while ($donnee = pg_fetch_row($query1))
        {
          echo "<tr class=''>
              <td>".$i."</td>
              <td>".$donnee[0]."</td>
                </tr>";
          $i+=1;
        }
      echo "</table>
            <div class='modal-footer'>
            <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
            </div>";

      break;

    case 'button2':
        # code...
        echo "<div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class='modal-title'> Resultat Requete Nº2</h4>
              </div>";

        $query2 = pg_query($serveur,"SELECT count(idjoueur) from organisation_schema.joueur
                      where nom = 'Smith'");

        while ($donnee = pg_fetch_row($query2))
          {
            echo "Il y a <strong>".$donnee[0]."</strong> joueurs qui ont le nom Smith!";
          }
        echo "<div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
              </div>";
      break;

    case 'button3':
        # code...
        echo "<div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class='modal-title'> Resultat Requete Nº3</h4>
              </div>
              <table class='table table-bordered table-responsive'>
              <tr>
              <th>Nº</th>
              <th>IDTournoi</th>
              </tr>";
        $i=1;
        $query3 = pg_query($serveur,"SELECT idtournoi from organisation_schema.commanditaire
                    where nom = 'Ballons Inc'
                    order by idtournoi");

        while ($donnee = pg_fetch_row($query3))
          {
            echo "<tr class=''>
                <td>".$i."</td>
                <td>".$donnee[0]."</td>
                  </tr>";
            $i+=1;
          }
        echo "</table>
              <div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
              </div>";
      break;

    case 'button4':
        # code...
        echo "<div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class='modal-title'> Resultat Requete Nº4/h4>
              </div>";

        $query4 = pg_query($serveur,"SELECT count(a.idmatch) from organisation_schema.arbitre a, organisation_schema.employe e
                    where a.idemploye = e.idemploye
                    and e.prenom like 'A%'");

        while ($donnee = pg_fetch_row($query4))
          {
            echo "Il y a <strong>".$donnee[0]."</strong> matchs supervises par un arbitre dont le nom commence par A!";
          }
        echo "<div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
              </div>";
      break;

    case 'button5':
        # code...
        echo "<div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class='modal-title'> Resultat Requete Nº5</h4>
              </div>
              <table class='table table-bordered table-responsive'>
              <tr>
              <th>Nº</th>
              <th>Prenom</th>
              <th>Nom</th>
              </tr>";
        $i=1;

        $query5 = pg_query($serveur,"SELECT j.idjoueur, j.prenom, j.nom from organisation_schema.equipe e, organisation_schema.joueurequipe q, organisation_schema.joueur j
                    where e.idequipe = q.idequipe and q.idjoueur = j.idjoueur
                    and e.nom = 'Barcelona Fc' and e.idligue = 'L001'");

        while ($donnee = pg_fetch_row($query5))
          {
            echo "<tr class=''>
                <td>".$i."</td>
                <td>".$donnee[1]."</td>
                <td>".$donnee[2]."</td>
                  </tr>";
            $i+=1;
          }
        echo "</table>
              <div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
              </div>";
      break;

    case 'button6':
        # code...
        echo "<div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class='modal-title'> Resultat Requete Nº6</h4>
              </div>
              <table class='table table-bordered table-responsive'>
              <tr>
              <th>Nº</th>
              <th>Prenom</th>
              <th>Nom</th>
              </tr>";
        $i=1;

        $query6 = pg_query($serveur,"SELECT j.idjoueur, j.prenom, j.nom from organisation_schema.equipe e, organisation_schema.joueurequipe q, organisation_schema.joueur j
                    where e.idequipe = q.idequipe and q.idjoueur = j.idjoueur
                    and e.idtournoi = 'T110'
                    order by j.nom");

        while ($donnee = pg_fetch_row($query6))
          {
            echo "<tr class=''>
                <td>".$i."</td>
                <td>".$donnee[1]."</td>
                <td>".$donnee[2]."</td>
                  </tr>";
            $i+=1;
          }
        echo "</table>
              <div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
              </div>";
      break;

    case 'button7':
        # code...
        echo "<div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class='modal-title'> Resultat Requete Nº7</h4>
              </div>";

        $query7 = pg_query($serveur,"SELECT count(idmatch) from organisation_schema.match
                    where ddate = '2016-03-14' and lieu not like 'Kansas'");

        while ($donnee = pg_fetch_row($query7))
          {
            echo "Il y a <strong>".$donnee[0]."</strong> matchs, toutes ligues confondues,qui ont eu lieu le 14 mars 2016 mais pas au kansas!";
          }
        echo "<div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
              </div>";
      break;

    case 'button8':
        # code...
        echo "<div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class='modal-title'> Resultat Requete Nº8</h4>
              </div>";

        $query8 = pg_query($serveur,"SELECT count(q.idjoueur)  from organisation_schema.equipe e, organisation_schema.ligue l, organisation_schema.joueurequipe q
                    , organisation_schema.sport s
                    where e.idligue=l.idligue and e.idequipe = q.idequipe and l.idsport = s.idsport
                    and s.nom = 'Soccer' and s.nom = 'BasketBall'");

        while ($donnee = pg_fetch_row($query8))
          {
            echo "Il y a <strong>".$donnee[0]."</strong> joueurs qui sont inscrits à la fois à une équipe dans une ligue de basketball et une équipe dans une ligue de soccer!";
          }
        echo "<div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
              </div>";
      break;

    case 'button9':
        # code...
        echo "<div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class='modal-title'> Resultat Requete Nº9</h4>
              </div>";

        $query9 = pg_query($serveur,"SELECT datepaiement from organisation_schema.equipe e, organisation_schema.saison s
                    where e.idligue = s.idligue and e.nom = 'Barcelona Fc' and e.idligue = 'L001'
                    and s.datedebut ='2017-01-23' ");

        while ($donnee = pg_fetch_row($query9))
          {
            echo "Le gestionnaire de «Barcelona Fc» de la ligue L001
            a effectué le paiement pour la saison débutant le 12 janvier 2016 <strong> le ".$donnee[0]."</strong>";
          }
        echo "<div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
              </div>";
      break;

    case 'button10':
        # code...
        echo "<div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class='modal-title'> Resultat Requete Nº10</h4>
              </div>";
        $query10 = pg_query($serveur,"INSERT into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j36', 'John', 'Smith', '','', null)");
        $query13 = pg_query($serveur, "INSERT into organisation_schema.joueurEquipe (idJoueur, idEquipe) values ('j36', 'eq1')");                  

        echo "le joueur <strong> «John Smith» </strong> à l’équipe «Barcelona Fc» de la ligue L001 avec succes.";
        echo "<div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
              </div>";
      break;

    case 'button11':
        # code...
        $query11 = pg_query($serveur,"DELETE from organisation_schema.joueur
                    where prenom = 'emilie' and nom = 'jones'");
        echo "<div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class='modal-title'> Resultat Requete Nº11</h4>
              </div>";
        echo "<strong>«Émilie Jones»</strong> a ete supprime de l’organisation. avec succes.";
        echo "<div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
              </div>";

      break;

    case 'button12':
        # code...
        $query12 = pg_query($serveur,"UPDATE organisation_schema.equipe
                    set nom = 'Marseille'
                    where nom = 'Paris SG' and idligue = 'L001' ");

        echo "<div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class='modal-title'> Resultat Requete Nº11</h4>
              </div>";
        echo "le nom de l’équipe «Paris SG» de la ligue L001 a ete change par «Marseille» avec succes.";
        echo "<div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
              </div>";
      break;

    default:
      # code...
    break;
  }
  //fin affiche resultats requete


 ?>
