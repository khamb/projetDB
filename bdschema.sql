set search_path = organisation_schema;

drop schema if exists organisation_schema cascade;
create schema organisation_schema;


create domain niveau as varchar(10) check
(value in ('recreatif','competitif'));

create table if not exists organisation_schema.Employe(
  idEmploye varchar(20) not null,
  prenom varchar(20) not null,
  nom varchar(20) not null,
  primary key(idEmploye)
  );

create table if not exists organisation_schema.GestionnaireLigue(
  idGestionnaire varchar(20) not null,
  tel varchar(20),
  courriel varchar(20),
  idLigue varchar(20),
  idEmploye varchar(20),
  idSaison varchar(20),
  primary key(idGestionnaire),
  foreign key (idLigue) references organisation_schema.Ligue(idLigue),
  foreign key (idEmploye) references organisation_schema.Employe(idEmploye),
  foreign key (idSaison) references organisation_schema.Ligue(idSaison)

  );

create table if not exits organisation_schema.Arbitre(
  idArbitre varchar(20) not null,
  idEmploye varchar(20),
  idMatch varchar(20),
  primary key(idArbitre),
  foreign key (idEmploye) references organisation_schema.Employe(idEmploye),
  foreign key (idMatch) references organisation_schema.Match(idMatch)
  );

create table if not exists organisation_schema.Joueur(
  idJoueur varchar(20) not null,
  prenom varchar(20) not null,
  nom varchar(20) not null,
  courriel varchar(20) not null,
  tel varchar(20), -- pas sur du type
  idEmploye varchar(20),
  primary key(idJoueur),
  foreign key (idEmploye) references organisation_schema.Employe(idEmploye)
  );

  create table if not exists organisation_schema.JoueurEquipe(
    idEquipe varchar(20),
    idJoueur varchar(20),
    primary key(idEquipe, idJoueur),
    foreign key (idEquipe) references Equipe(idEquipe),
    foreign key (idJoueur) references Equipe(idJoueur)
  );

  create table if not exists organisation_schema.Sport(
    idSport varchar(20) not null,
    nom varchar(20) not null,
    description varchar(200) not null
  );

  create table if not exists organisation_schema.JoueurSportPrefere(
    idJoueur varchar(20) not null,
    idSport varchar(20) not null,
    primary key(idJoueur,idSport),
    foreign key (idJoueur) references organisation_schema.Joueur(idJoueur),
    foreign key (idSport) references organisation_schema.Sport(idSport)
    );

  create table if not exists organisation_schema.ArbitreSportQualifie(
    idArbitre varchar(20) not null,
    idSport varchar(20) not null,
    primary key (idArbitre,idSport),
    foreign key (idArbitre) references organisation_schema.Arbitre(idArbitre),
    foreign key (idSport) references organisation_schema.Sport(idSport)
    );

  create table if not exists organisation_schema.Equipe(
    idEquipe varchar(20) not null,
    nom varchar(30) not null,
    idLigue varchar(20),
    idMatch varchar(20),
    idGerantEqu varchar(20),
    idTournoi varchar(20),
    datePaiement date  not null,
    derNumCarte numeric(4) not null,
    maxJoueur integer not null,
    minJoueur integer not null,
    primary key(idEquipe),
    foreign key (idLigue) references organisation_schema.Ligue(idLigue),
    foreign key (idMatch) references organisation_schema.Match(idMatch),
    foreign key (idGerantEqu) references organisation_schema.GerantEquipe(idGerantEqu),
    foreign key (idTournoi) references organisation_schema.TournoiCharite(idTournoi)
    );

  create table if not exists organisation_schema.Match(
    idMatch varchar(20) not null,
    dateMatch date not null, --pas sure du type aussi
    heure time not null,
    lieu varchar(20) not null,
    idSaison varchar(20),
    idTournoi varchar(20),
    primary key (idMatch), --j 'ai un doute aussi sur la cle primaire
    foreign key (idSaison) references organisation_schema.Saison(idSaison),
    foreign key (idTournoi) references organisation_schema.Ligue(idLigue),
    );

    create table if not exists organisation_schema.Commanditaire(
      idCommandit varchar(20) not null,
      nom varchar(40) not null,
      tel varchar(20) not null,--dubitatif sur le type
      idTournoi varchar(20),
      primary key(idCommandit),
      foreign key (idTournoi) references TournoiCharite(idTournoi)
      );

      create table if not exists organisation_schema.Ligue(
        idLigue varchar(20) not null,
        difficulte niveau not null,
        idSport varchar(20) not null,
        primary key(idLigue)
      );

    create table if not exists organisation_schema.Saison(
      idSaison varchar(20) not null,
      dateLimitePaiement varchar(20) not null, --doute sur le type
      dateDebut varchar(20) not null, --doute sur le type
      dateFin varchar(20) not null, --doute sur le type
      nmbrMatch varchar(20) not null,
      idLigue varchar(20),
      primary key(idSaison),
      foreign key (idLigue) references Ligue(idLigue)
     );

    create table if not exists organisation_schema.TournoiCharite(
      idTournoi varchar(20) not null,
      oeuvre varchar(20) not null,
      fonds varchar(40) not null,--doute sur le type
      dateDebut varchar(20) not null,
      dateFin varchar(20) not null,
      idSport varchar(20),
      primary key(idTournoi),
      foreign key (idSport) references Sport(idSport)
      );

    create table if not exists organisation_schema.GerantEquipe(
      idGerantEqu varchar(20) not null,
      idJoueur varchar(20),
      diplome varchar(30) not null,
      primary key(idGerantEqu),
      foreign key (idJoueur) references Joueur(idJoueur)

    );
