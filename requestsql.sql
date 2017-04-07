--1.Quelles sont les équipes qui comportent plus de 8 joueurs, toutes ligues confondues?
--Lister les équipes en ordre alphabétique selon le nom de l’équipe.
SELECT b.nom from organisation_schema.joueurequipe a, organisation_schema.equipe b
                where a.idequipe = b.idequipe
                group by b.nom having count (idjoueur)>8
                order by b.nom

--2. Combien de joueurs ont le nom de famille « Smith »?
select count(idjoueur) from organisation_schema.joueur
where nom = 'Smith'

--3. Quels tournois sont commandités par « Ballons Inc. »?
--Lister les IDTournoi en ordre croissant.
select idtournoi from organisation_schema.commanditaire
where nom = 'Ballons Inc'
order by idtournoi

--Combien de matchs sont supervisés par un arbitre
--dont le prénom commence par la lettre «A»?
select count(a.idmatch) from organisation_schema.arbitre a, organisation_schema.employe e
where a.idemploye = e.idemploye
and e.prenom like 'A%'

--Quels sont les joueurs inscrits à l’équipe «Barcelona Fc» de la ligue L001?
--Lister les joueurs en ordre alphabétique selon leur nom de famille.
select j.idjoueur, j.prenom, j.nom from organisation_schema.equipe e, organisation_schema.joueurequipe q, organisation_schema.joueur j
where e.idequipe = q.idequipe and q.idjoueur = j.idjoueur
and e.nom = 'Barcelona Fc' and e.idligue = 'L001'

--6. Quels sont les joueurs participant au tournoi T110? Lister les joueurs en ordre
-- alphabétique selon leur nom de famille.
select j.idjoueur, j.prenom, j.nom from organisation_schema.equipe e, organisation_schema.joueurequipe q, organisation_schema.joueur j
where e.idequipe = q.idequipe and q.idjoueur = j.idjoueur
and e.idtournoi = 'T110'
order by j.nom

--7 Combien de matchs, toutes ligues confondues, ont eu lieu
--le 14 mars 2016 mais pas au kansas?
select count(idmatch) from organisation_schema.match
where ddate = '2016-03-14' and lieu not like 'Kansas'

--8. Combien de joueurs sont inscrits à la fois à une équipe dans une
-- ligue de basketball et une équipe dans une ligue de soccer?
SELECT count(q.idjoueur) from organisation_schema.equipe e, organisation_schema.ligue l, organisation_schema.joueurequipe q
                    , organisation_schema.sport s
                    where e.idligue=l.idligue and e.idequipe = q.idequipe and l.idsport = s.idsport and
		    s.nom = 'Soccer'
		    and q.idJoueur in (SELECT q.idjoueur from organisation_schema.equipe e, organisation_schema.ligue l, organisation_schema.joueurequipe q
							    , organisation_schema.sport s
							    where e.idligue=l.idligue and e.idequipe = q.idequipe and l.idsport = s.idsport and
							    s.nom = 'BasketBall');

--9. À quelle date est-ce que le gestionnaire de l’équipe «Barcelona Fc» de la ligue L001 a effectué
-- le paiement pour la saison débutant le 12 janvier 2016?
select datepaiement from organisation_schema.equipe e, organisation_schema.saison s
where e.idligue = s.idligue and e.nom = 'Barcelona Fc' and e.idligue = 'L001'
and s.datedebut ='2017-01-23'

--10. Inscrire le joueur «John Smith» à l’équipe «Barcelona Fc» de la ligue L001.
insert into organisation_schema.Joueur values ('j36', 'John', 'Smith', '','','')
insert into organisation_schema.joueurEquipe (idJoueur, idEquipe) values ('j36', 'eq1');
--insert into organisation_schema.Equipe (idEquipe, nom, idLigue, minjoueur, maxjoueur, idMatch, idgerantEqu, datePaiement, derNumCarte, idTournoi) values ('eq1', 'Barcelona Fc', 'L001', '2', '7', 'm1', 'ge1', '12/1/2016', '4325', 'T110');

--11. Supprimer l’usager «Émilie Jones» de l’organisation.
delete from organisation_schema.joueur
where prenom = 'emilie' and nom = 'jones'

--12. Modifier le nom de l’équipe «Paris SG» de la ligue L001.
update organisation_schema.equipe
set nom = 'Marseil'
where nom = 'Paris SG' and idligue = 'L001'
