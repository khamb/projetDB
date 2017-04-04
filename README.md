# projetDB
Prof. Amal Zouaq - CSI2532– Université d’Ottawa (H2017) Projet proposé par Maxime Taylor et Gabriel Chaussé
1. Etude de cas
Vous devez mettre en place une base de données pour une organisation qui organise des tournois récréatifs pour plusieurs sports. Cette base de données est utilisée principalement par le personnel de l’organisation. Voici les informations accessibles à partir de la base de données.
Chaque employé de l’organisation est caractérisé par son prénom, son nom et son rôle. De manière optionnelle, un employé qui est gestionnaire de ligue peut décider de donner son numéro de téléphone au travail ou son adresse courriel professionnelle. Un employé peut également être un arbitre et il doit spécifier, dans ce cas seulement, les sports pour lesquels il est qualifié, ainsi que son nombre d’années d’expérience en tant qu’arbitre.
Toute personne souhaitant s’inscrire auprès de l’organisation doit fournir son prénom, son nom de famille et son adresse courriel. Elle peut aussi optionnellement fournir son numéro de téléphone. Chaque personne indiquera également ses sports préférés (caractérisés par un nom et une description) afin de compléter son profil. On appelle cette personne usager ou joueur.
L’organisation encourage ses employés à devenir usagers. Cependant, un gestionnaire de ligue ou un arbitre ne peuvent pas assumer leur rôle professionnel dans une ligue où ils sont également joueurs. On assigne à une ligue un IDLigue, un sport particulier et un niveau de difficulté (récréatif ou compétitif) permettant à l’usager de choisir l’intensité qui l’intéresse.
Les usagers doivent être membres d’au moins une équipe. Chaque équipe a un nom et est reliée à une ligue donnée (elle ne peut pas exister sans sa ligue). Elle a aussi des nombres minimal et maximal de joueurs dépendamment de la ligue et a un ou plusieurs gérants. Deux équipes peuvent avoir le même nom si elles jouent dans des ligues différentes, mais doivent avoir des noms différents si elles jouent dans la même ligue. A noter qu’une ligue est composée de plusieurs équipes.
Un gérant est un usager caractérisé par un diplôme sportif. Il gère des équipes et fait le paiement des frais d’une saison pour ses équipes. On stocke alors la date du paiement et les quatre derniers numéros de la carte de crédit.
Les matchs dans une ligue sont regroupés en saisons. Une saison a une date limite pour le paiement d’une équipe, une date commencement et une date de fin. Toutes les équipes d’une ligue participent à chaque saison (jusqu’à dissolution de l’équipe). Chaque saison comporte obligatoirement un certain nombre de matchs. Un match a une date, une heure, un lieu, deux équipes, trois arbitres et, lorsque le match s’est déroulé, un nombre de points marqués pour chaque équipe (entré par les arbitres).
L’organisation crée également des tournois de charité. Un tournoi est associé à un IDTournoi, à une oeuvre de charité (un simple label) et à un sport particulier : on stocke également les fonds accumulés par les dons et inscriptions. Les équipes peuvent participer à un tournoi. Un tournoi comporte des matchs avec les mêmes caractéristiques qu’un match dans une ligue régulière. Un tournoi peut avoir un ou plusieurs commanditaires dont on note la valeur des contributions, le nom et le numéro de téléphone. Enfin, un tournoi commence et se termine à une certaine date.
1
Prof. Amal Zouaq - CSI2532– Université d’Ottawa (H2017) Projet proposé par Maxime Taylor et Gabriel Chaussé
Liste de requêtes à implémenter :
1. Quelles sont les équipes qui comportent plus de 17 joueurs, toutes ligues confondues? Lister les équipes en ordre alphabétique selon le nom de l’équipe.
2. Combien de joueurs ont le nom de famille « Smith »?
3. Quels tournois sont commandités par « Ballons Inc. »? Lister les IDTournoi en ordre croissant.
4. Combien de matchs sont supervisés par un arbitre dont le prénom commence par la lettre «A»?
5. Quels sont les joueurs inscrits à l’équipe «Lions» de la ligue L007? Lister les joueurs en ordre alphabétique selon leur nom de famille.
6. Quels sont les joueurs participant au tournoi T110? Lister les joueurs en ordre alphabétique selon leur nom de famille.
7. Combien de matchs, toutes ligues confondues, ont eu lieu le 14 mars 2016 mais pas au complexe sportif Sportmax?
8. Combien de joueurs sont inscrits à la fois à une équipe dans une ligue de basketball et une équipe dans une ligue de soccer?
9. À quelle date est-ce que le gestionnaire de l’équipe «Titans» de la ligue L040 a effectué le paiement pour la saison débutant le 12 janvier 2016?
10. Inscrire le joueur «John Smith» à l’équipe «Lions» de la ligue L007.
11. Supprimer l’usager «Émilie Jones» de l’organisation.
12. Modifier le nom de l’équipe «Fonceurs» de la ligue L022.
2. Tâches (100 points)
1. Proposez un modèle entités-associations (ou entités associations étendu) permettant de répondre aux besoins exprimés ci-dessus. N’oubliez aucun composant du modèle. Utilisez le logiciel de votre choix pour créer mon modèle en notation UML. (10 points)
2. Traduisez le modèle conceptuel en modèle relationnel et créez la base de données PostgreSQL correspondante. Indiquez vos clés primaires et étrangères. N’oubliez aucune contrainte nécessaire dans votre modèle (exemple : intégrité référentielle, valeurs non nulles, etc.). Enregistrez votre code SQL dans bdschema.sql (10 points)
3. Entrez des données dans la base de données et enregistrez vos données dans data.sql (5 points)
4. Créez les requêtes listées et enregistrez-les dans un fichier query.sql (25 points)
5. Créez une application (Desktop ou Web) avec interface qui permet (50 points) :
a) D’afficher les équipes d’une ligue donnée
b) D’ajouter un joueur dans une équipe d’une ligue donnée
c) D’afficher les compagnies commanditaires de tournois et leurs informations
d) D’effectuer des fonctionnalités supplémentaires de votre choix – Ceci correspond à
votre effort personnel
3. Description des livrables à la fin de la session
1. Un modèle conceptuel fait avec un logiciel de votre choix et présenté sous forme d’image jpeg
2
Prof. Amal Zouaq - CSI2532– Université d’Ottawa (H2017) Projet proposé par Maxime Taylor et Gabriel Chaussé
2. Un modèle relationnel dans un fichier bdschema.sql qui permet de créer votre base de données
3. Un fichier data.sql qui ajoute des données à votre BD avec des instructions INSERT (suffisamment pour qu’il y ait au moins deux tuples dans les réponses aux requêtes)
4. Un fichier query.sql qui rassemble le code SQL de l’ensemble des requêtes. Notez que chaque requête doit être précédée par un commentaire indiquant le texte de la requête (référez-vous à la liste des requêtes)
5. Code de votre application Web qui réutilisera une partie des requêtes dans query.sql
6. Un rapport votrenom_projet.pdf qui contient un entête de projet, avec les noms des étudiants de l’équipe, et un manuel de l’utilisateur expliquant comment installer et faire fonctionner votre application sur une nouvelle machine. Vous devez également indiquer les étapes d’exécution de votre démonstration via des copies d’écran commentées. N’oubliez pas de mettre votre nom dans l’entête de chaque page du rapport et de numéroter
vos pages.
Modalités de remise
1. Soumettez un fichier zip appelé nomEtudiant_projet.zip sur Blackboard Learn qui contient TOUS les livrables. Le projet (zip) doit être soumis au plus tard avant la démonstration en laboratoire; Une seule soumission est nécessaire par groupe ;
2. Tous les membres du groupe doivent être présents à la démonstration (10 mn / groupe). Celle- ci est prévue le lundi 3 avril à 16h. Tous les membres des groupes doivent être présents pour toutes les démonstrations. Chaque démonstration devra être prête à lancer dès le début du laboratoire;
3. Utilisez le SGBD PostgreSQL pour compléter la base de données et un langage tel que Java et JSP ou PHP pour votre application Web. NOTEZ BIEN : aucun autre langage ne sera accepté sans permission par courriel de la professeure.
Critères de correction
1. Modélisation et règles de traduction correctes et complètes
2. Scripts totalement fonctionnels
3. Application fonctionnelle et implantée selon les meilleurs critères de programmation
(interface, élégance du code, présence de commentaires, etc.)
4. Richesse des fonctionnalités présentées
5. Créativité, ergonomie de l’interface
3
