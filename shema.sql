SET search_path = organisation_schema;

DROP SCHEMA IF EXISTS organisation_schema CASCADE;
CREATE SCHEMA organisation_schema;


-- DROP DOMAIN IF EXISTS organisation_schema.SexType;
-- DROP TABLE IF EXISTS organisation_schema.Room;
-- DROP TABLE IF EXISTS organisation_schema.Hotel;
-- DROP TABLE IF EXISTS organisation_schema.Guest;
-- DROP TABLE IF EXISTS organisation_schema.Booking;







CREATE TABLE IF NOT EXISTS organisation_schema.Employe(
		idEmploye		VARCHAR(100)		NOT NULL,
		prenom	  	VARCHAR(100)		NOT NULL,
		nom 	VARCHAR(100)			NOT NULL,
		role		VARCHAR(100)		NOT	NULL,
		PRIMARY KEY (idEmploye)
		);

CREATE TABLE IF NOT EXISTS organisation_schema.Joueur(
		idJoueur		VARCHAR(100)		NOT NULL,
		prenom	  	VARCHAR(100)		NOT NULL,
		nom VARCHAR(100)  NOT NULL,
		courriel 	VARCHAR(100)			NOT NULL,
		tel VARCHAR(100)  ,
		idEmploye VARCHAR(100),
		PRIMARY KEY (idJoueur),
		FOREIGN KEY (idEmploye) REFERENCES organisation_schema.Employe(idEmploye)
		);




CREATE TABLE IF NOT EXISTS organisation_schema.sport(
		idSport		VARCHAR(10)		NOT NULL,
		nom	  	VARCHAR(10)		NOT NULL,
		description	  	VARCHAR(200)		NOT NULL,
		PRIMARY KEY (idSport)
		);

CREATE TABLE IF NOT EXISTS organisation_schema.Ligue(
		idLigue		VARCHAR(10)		NOT NULL,
		difficulte 	VARCHAR(10)			NOT NULL,
		idSport	  	VARCHAR(10)		NOT NULL,
		PRIMARY KEY (idLigue),
		FOREIGN KEY (idSport) REFERENCES organisation_schema.sport(idSport)
		);

CREATE TABLE IF NOT EXISTS organisation_schema.Saison(
idSaison		VARCHAR(10)		NOT NULL,
dateLimitePaiement		date	NOT NULL,
dateDebut 	date	 		NOT NULL,
dateFin		date			not NULL,
nbreMatch	integer		NOT NULL,
idLigue		VARCHAR(10) NOT NULL, 
PRIMARY KEY (idSaison),
FOREIGN KEY (idLigue) REFERENCES Ligue(idLigue)
);

CREATE TABLE IF NOT EXISTS organisation_schema.TournoiCharite(
		idTournoi		VARCHAR(10)		NOT NULL,
		oeuvre	  	VARCHAR(10)		NOT NULL,
		fonds 	VARCHAR(10)			NOT NULL,
		dateDebut		DATE		NOT	NULL,
		dateFin		date		NOT NULL,
		idSport VARCHAR(10),
		PRIMARY KEY (idTournoi),
		FOREIGN KEY (idsport) REFERENCES organisation_schema.sport(idSport) 
		);


CREATE TABLE IF NOT EXISTS  organisation_schema.Match (
		idMatch		VARCHAR(10)		NOT NULL,
		ddate 	DATE		NOT NULL,
		heure		time		NOT NULL,
		lieu	VARCHAR(20)		NOT NULL, 
		idSaison VARCHAR(10) NOT NULL,
		idTournoi VARCHAR(10) , 
		PRIMARY KEY (idMatch),
		FOREIGN KEY (idSaison) REFERENCES organisation_schema.Saison(idSaison),
		FOREIGN KEY (idTournoi) REFERENCES organisation_schema.TournoiCharite(idTournoi)
		);

CREATE TABLE IF NOT EXISTS organisation_schema.Arbitre(
		idArbitre		VARCHAR(10)		NOT NULL,
		idEmploye	  	VARCHAR(10)		NOT NULL,
		idMatch 	VARCHAR(10)			NOT NULL,
		PRIMARY KEY (idArbitre),
		FOREIGN KEY (idMatch) REFERENCES organisation_schema.Match(idMatch) 
		);


CREATE TABLE IF NOT EXISTS organisation_schema.GerantEquipe(
		idgerantEqu		VARCHAR(10)		NOT NULL,
		idJoueur	  	VARCHAR(10)		NOT NULL,
		Diplome 	VARCHAR(10) NOT NULL,
		PRIMARY KEY (idgerantEqu),
		FOREIGN KEY (idJoueur) REFERENCES organisation_schema.Joueur(idJoueur)
		);



CREATE TABLE IF NOT EXISTS organisation_schema.Equipe(
		idEquipe		VARCHAR(10)		NOT NULL,
		nom	  	VARCHAR(20)		NOT NULL,
		idLigue	  	VARCHAR(10)		NOT NULL,
		idMatch	  	VARCHAR(10)		NOT NULL,
		idgerantEqu	  	VARCHAR(10)		NOT NULL,
		idTournoi	  	VARCHAR(10)		NOT NULL,
		datePaiement	 date		NOT NULL,
		derNumCarte Numeric(4) not NULL,
		maxJoueur integer NOT NULL,
		minJoueur integer NOT NULL,
		PRIMARY KEY (idEquipe),
		FOREIGN KEY (idLigue) REFERENCES organisation_schema.Ligue(idLigue),
		FOREIGN KEY (idMatch) REFERENCES organisation_schema.Match(idMatch),
		FOREIGN KEY (idgerantEqu) REFERENCES organisation_schema.GerantEquipe(idgerantEqu),
		FOREIGN KEY (idTournoi) REFERENCES organisation_schema.TournoiCharite(idTournoi)
		);


CREATE TABLE IF NOT EXISTS organisation_schema.JoueurEquipe(
		idEquipe VARCHAR(10) NOT NULL,
		idJoueur VARCHAR(10) NOT NULL,
		PRIMARY KEY (idJoueur, idEquipe),
		FOREIGN KEY (idEquipe) REFERENCES organisation_schema.Equipe(idEquipe),
		FOREIGN KEY (idJoueur) REFERENCES organisation_schema.Joueur(idJoueur)		
		);



CREATE TABLE IF NOT EXISTS organisation_schema.Commanditaire(
idCommandit VARCHAR(10) NOT NULL, 
nom VARCHAR(20)	NOT NULL,
tel VARCHAR(20)	NOT NULL,
contribution money NOT NULL, 
idTournoi VARCHAR(10) not NULL, 
PRIMARY KEY (idCommandit),
FOREIGN KEY(idTournoi) REFERENCES organisation_schema.TournoiCharite(idTournoi));


	


CREATE TABLE IF NOT EXISTS organisation_schema.GestionnaireLigue(
		idgestionnaire		VARCHAR(10)		NOT NULL,
		tel	  	VARCHAR(20)		NOT NULL,
		courriel VARCHAR(100) NOT NULL,
		idLigue VARCHAR(10)  NOT NULL,
		idEmploye 	VARCHAR(10)			NOT NULL,
		PRIMARY KEY (idgestionnaire),
		FOREIGN KEY (idLigue) REFERENCES organisation_schema.Ligue(idLigue),
		FOREIGN KEY (idEmploye) REFERENCES organisation_schema.Employe(idEmploye),
		);



CREATE TABLE IF NOT EXISTS organisation_schema.joueurSportPrefere(
		idJoueur		VARCHAR(10)		NOT NULL,
		idSport	  	VARCHAR(10)		NOT NULL,
		PRIMARY KEY (idJoueur, idSport),
		FOREIGN KEY (idJoueur) REFERENCES organisation_schema.Joueur(idJoueur),
		FOREIGN KEY (idSport) REFERENCES organisation_schema.sport(idSport)
		);




CREATE TABLE IF NOT EXISTS organisation_schema.ArbitreSportPrefere(
		idArbitre		VARCHAR(10)		NOT NULL,
		idSport	  	VARCHAR(10)		NOT NULL,
		PRIMARY KEY (idArbitre, idSport),
		FOREIGN KEY (idArbitre) REFERENCES organisation_schema.Arbitre(idArbitre),
		FOREIGN KEY (idSport) REFERENCES organisation_schema.sport(idSport)
		);
