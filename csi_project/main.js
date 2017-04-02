 $(document).ready(function() {


  $(".nav li").on("click", function() {
      $(".nav li").removeClass("active");
      $(this).addClass("active");
    });

  $('#affEmpButton').on('click', function(event) {
    $.get('afficheEmploye.php', function(data, status){
      $("#corps").html(data);
    });
  });

  $('#affJouButton').on('click', function(event) {
    $.get('afficheJoueur.php', function(data, status){
      $('#corps ').html(data);
    });
  });

  $('#affLigueButton').on('click', function(event) {
    $.get('afficheLigue.php', function(data, status){
      $('#corps ').html(data);
    });
  });

  $('#affArbitreButton').on('click', function(event) {
    $.get('afficheArbitre.php', function(data, status){
      $('#corps ').html(data);
    });
  });

  $('#affComButton').on('click', function(event) {
    $.get('afficheCommanditaire.php', function(data, status){
      $('#corps ').html(data);
    });
  });

  $('#affTeamButton').on('click', function(event) {
    $.get('afficheTeam.php', function(data, status){
      $('#corps ').html(data);
    });
  });

  $('#affMatchButton').on('click', function(event) {
    $.get('afficheMatch.php', function(data, status){
      $('#corps ').html(data);
    });
  });

  $('#affTournoiButton').on('click', function(event) {
    $.get('afficheTournoi.php', function(data, status){
      $('#corps ').html(data);
    });
  });

  $('#queriesButton').on('click', function(event) {
    $.get('requetesTable.php', function(data, status){
      $('#corps').html(data);
    });
  });





});// document ready end
