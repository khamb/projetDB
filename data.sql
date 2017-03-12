set search_path = organisation_schema;
--modififer les mails et numeros!!!!!!!!!!!!

insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e1', 'Irene', 'Smith', 'Systems Administrator III');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e2', 'Wayne', 'Smith', 'Registered Nurse');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e3', 'Carol', 'Oliver', 'Mechanical Systems Engineer');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e4', 'Howard', 'Gordon', 'Computer Systems Analyst III');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e5', 'Brian', 'Lane', 'Structural Analysis Engineer');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e6', 'Julia', 'Flores', 'Registered Nurse');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e7', 'Stephanie', 'Walker', 'Assistant Manager');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e8', 'Jose', 'Williamson', 'Pharmacist');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e9', 'Fred', 'Diaz', 'Budget/Accounting Analyst IV');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e10', 'Ashley', 'Diaz', 'Community Outreach Specialist');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e11', 'Earl', 'Pierce', 'Data Coordiator');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e12', 'Clarence', 'Hernandez', 'VP Quality Control');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e13', 'Paul', 'Rice', 'Assistant Media Planner');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e14', 'Kathryn', 'Crawford', 'Programmer Analyst III');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e15', 'Barbara', 'Hart', 'Marketing Assistant');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e16', 'Shirley', 'Day', 'Pharmacist');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e17', 'Virginia', 'Stone', 'Associate Professor');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e18', 'Carl', 'Bennett', 'Senior Quality Engineer');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e19', 'Walter', 'Coleman', 'Web Designer IV');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e20', 'Brandon', 'Dixon', 'Geological Engineer');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e21', 'Christina', 'Perry', 'Compensation Analyst');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e22', 'David', 'Nichols', 'Technical Writer');
insert into organisation_schema.Employe (idEmploye, prenom, nom, role) values ('e23', 'Alan', 'Peterson', 'Sales Representative');


insert into organisation_schema.Arbitre (idArbitre, idEmploye, idMatch) values ('a1', 'e7', 'm3');
insert into organisation_schema.Arbitre (idArbitre, idEmploye, idMatch) values ('a2', 'e19', 'm2');
insert into organisation_schema.Arbitre (idArbitre, idEmploye, idMatch) values ('a3', 'e2', 'm1');
insert into organisation_schema.Arbitre (idArbitre, idEmploye, idMatch) values ('a4', 'e16', 'm2');
insert into organisation_schema.Arbitre (idArbitre, idEmploye, idMatch) values ('a5', 'e23', 'm3');
insert into organisation_schema.Arbitre (idArbitre, idEmploye, idMatch) values ('a6', 'e11', 'm2');
insert into organisation_schema.Arbitre (idArbitre, idEmploye, idMatch) values ('a7', 'e21', 'm1');
insert into organisation_schema.Arbitre (idArbitre, idEmploye, idMatch) values ('a8', 'e13', 'm1');
insert into organisation_schema.Arbitre (idArbitre, idEmploye, idMatch) values ('a9', 'e1', 'm3');

insert into organisation_schema.Sport (idSport, nom, description) values ('s1', 'Soccer', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.');
insert into organisation_schema.Sport (idSport, nom, description) values ('s2', 'BasketBall', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.');
insert into organisation_schema.Sport (idSport, nom, description) values ('s3', 'Hockey', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.');
insert into organisation_schema.Sport (idSport, nom, description) values ('s4', 'Volley', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.');

insert into organisation_schema.Ligue (idLigue, difficulte, idSport) values ('L001', 'recreatif', 's4');
insert into organisation_schema.Ligue (idLigue, difficulte, idSport) values ('L002', 'recreatif', 's2');
insert into organisation_schema.Ligue (idLigue, difficulte, idSport) values ('L003', 'recreatif', 's3');
insert into organisation_schema.Ligue (idLigue, difficulte, idSport) values ('L004', 'competitif', 's1');

insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j1', 'Benjamin', 'Alexander', 'balexander0@berkeley.edu', '976-(430)946-2103', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j2', 'Paula', 'Reid', 'preid1@hao123.com', '82-(620)955-5532', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j3', 'Evelyn', 'Carroll', 'ecarroll2@mit.edu', '47-(608)443-0862', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j4', 'Ann', 'Howard', 'ahoward3@zimbio.com', '86-(742)357-2594', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j5', 'Deborah', 'Burton', 'dburton4@ning.com', '63-(740)984-4235', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j6', 'Wayne', 'Vasquez', 'wvasquez5@hp.com', '62-(914)239-5700', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j7', 'Heather', 'Mccoy', 'hmccoy6@biglobe.ne.jp', '260-(645)677-0732', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j8', 'Gloria', 'Price', 'gprice7@over-blog.com', '57-(333)464-5076', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j9', 'Brandon', 'George', 'bgeorge8@xrea.com', '62-(202)792-1600', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j10', 'Edward', 'Holmes', 'eholmes9@psu.edu', '86-(694)904-5009', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j11', 'Julie', 'Richardson', 'jrichardsona@irs.gov', '27-(124)834-9868', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j12', 'Carl', 'Long', 'clongb@github.com', '62-(215)724-2666', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j13', 'Julia', 'Ford', 'jfordc@rambler.ru', '55-(750)910-1903', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j14', 'Dorothy', 'Jones', 'djonesd@netlog.com', '81-(988)482-9806', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j15', 'Jose', 'Ortiz', 'jortize@eepurl.com', '357-(337)922-4649', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j16', 'Marilyn', 'Brooks', 'mbrooksf@ucoz.ru', '86-(288)189-5865', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j17', 'Nicole', 'Fowler', 'nfowlerg@sciencedirect.com', '7-(813)755-1773', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j18', 'Phyllis', 'Little', 'plittleh@google.pl', '224-(917)779-6535', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j19', 'Joyce', 'James', 'jjamesi@barnesandnoble.com', '86-(441)347-4696', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j20', 'Anna', 'Payne', 'apaynej@miibeian.gov.cn', '358-(329)287-0488', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j21', 'Ernest', 'Mccoy', 'emccoyk@cornell.edu', '1-(513)585-4532', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j22', 'Louis', 'Thompson', 'lthompsonl@sbwire.com', '86-(315)230-6854', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j23', 'Keith', 'Webb', 'kwebbm@cbslocal.com', '33-(549)577-7115', '');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j24', 'George', 'Cox', 'gcoxn@yale.edu', '506-(153)644-7326','');

--modififer les mails et numeros!!!!!!!!!!!!
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j25', 'Stephanie', 'Walker', 'apaynej@miibeian.gov.cn', '358-(329)287-0288', 'e7');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j26', 'Jose', 'Williamson', 'aasaj@miibeian.gov.cn', '358-(329)287-0488', 'e8');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j27', 'Fred', 'Diaz', 'apffej@miibeian.gov.cn', '358-(329)287-0488', 'e9');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j28', 'Ashley', 'Diaz', 'dff@miibeian.gov.cn', '358-(329)287-0488', 'e10');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j29', 'Earl', 'Pierce', 'ggd@miibeian.gov.cn', '358-(329)287-0488', 'e11');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j29', 'Clarence', 'Hernandez', 'ghh@miibeian.gov.cn', '358-(329)287-0488', 'e12');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j30', 'Paul', 'Rice', 'hkuynej@miibeian.gov.cn', '358-(329)287-0488', 'e13');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j31', 'Kathryn', 'Crawford', 'kiunej@miibeian.gov.cn', '358-(329)287-0488', 'e14');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j32', 'Barbara', 'Hart', 'yuiynej@miibeian.gov.cn', '358-(329)287-0488', 'e15');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j33', 'Shirley', 'Day', 'ytrnej@miibeian.gov.cn', '358-(329)287-0488', 'e16');
insert into organisation_schema.Joueur (idJoueur, prenom, nom, courriel, tel, idEmploye) values ('j34', 'Virginia', 'Stone', 'aweynej@miibeian.gov.cn', '358-(329)287-0488', 'e17');
--modififer les mails et numeros!!!!!!!!!!!!


insert into organisation_schema.Saison (idSaison, dateLimitePaiement, dateDebut, dateFin, nmbrMatch, idLigue) values ('S001', '1/3/2017', '1/23/2017', '11/30/2017', 6, 'L001');
insert into organisation_schema.Saison (idSaison, dateLimitePaiement, dateDebut, dateFin, nmbrMatch, idLigue) values ('S002', '11/19/2016', '12/31/2016', '4/4/2017', 17, 'L002');
insert into organisation_schema.Saison (idSaison, dateLimitePaiement, dateDebut, dateFin, nmbrMatch, idLigue) values ('S003', '10/10/2016', '1/23/2017', '10/5/2017', 11, 'L003');
insert into organisation_schema.Saison (idSaison, dateLimitePaiement, dateDebut, dateFin, nmbrMatch, idLigue) values ('S004', '1/14/2017', '1/29/2017', '9/18/2017', 18, 'L004');

insert into organisation_schema.TournoiCharite (idTournoi, oeuvre, fonds, dateDebut, dateFin, idSport) values ('T001', 'Treeflex', 230000, '6/10/2016', '1/31/2017', 's1');
insert into organisation_schema.TournoiCharite (idTournoi, oeuvre, fonds, dateDebut, dateFin, idSport) values ('T002', 'Kanlam', 1800000, '9/3/2016', '7/30/2016', 's2');


insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m1', '12/28/2016', '1:51 PM', 'Indiana', 'S001', null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m2', '8/31/2016', '7:38 AM', 'California', 'S001', null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m3', '5/14/2016', '2:03 AM', 'California', 'S001', null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m4', '10/15/2016', '2:27 PM', 'Kansas', 'S001', null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m5', '11/30/2016', '3:03 AM', 'Texas', 'S001',null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m1', '12/1/2016', '3:35 PM', 'North Carolina', 'S002', null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m2', '9/25/2016', '12:32 AM', 'District of Columbia', 'S002', null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m3', '11/3/2016', '10:48 PM', 'Louisiana', 'S002', null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m4', '5/13/2016', '12:08 AM', 'Colorado', 'S002', null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m5', '8/16/2016', '5:34 AM', 'Texas', 'S002', null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m1', '5/2/2016', '7:59 AM', 'California', 'S003', null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m2', '1/12/2017', '1:46 AM', 'California', 'S003', null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m3', '5/28/2016', '12:09 PM', 'Virginia', 'S003', null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m4', '4/3/2016', '2:21 PM', 'Alabama', 'S003', null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m5', '11/27/2016', '12:46 PM', 'Ohio', 'S003', null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m1', '7/2/2016', '5:22 AM', 'Idaho', 'S004', null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m2', '7/21/2016', '9:39 AM', 'California', 'S004', null);
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m3', '3/30/2016', '4:28 AM', 'Michigan', 'S004', null);
--matchs tournois
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m1', '7/8/2016', '12:59 PM', 'New York', null, 'T001');
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m2', '2/27/2017', '12:37 AM', 'Kentucky', null, 'T002');
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m3', '4/23/2016', '4:11 PM', 'District of Columbia', null, 'T001');
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m4', '4/9/2016', '12:29 PM', 'New York', null, 'T001');
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m5', '10/17/2016', '12:47 PM', 'Indiana', null, 'T001');
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m6', '2/26/2017', '7:12 AM', 'Alaska', null, 'T002');
insert into organisation_schema.Match (idMatch, dateMatch, heure, lieu, idSaison, idTournoi) values ('m7', '5/19/2016', '6:13 AM', 'California', null, 'T002');
