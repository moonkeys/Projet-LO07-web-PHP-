insert into langues values (1,'français');
insert into langues values (2, 'anglais');
insert into langues values (3, 'espagnol');
insert into langues values (4, 'chinois');
insert into langues values (5, 'portugais');
insert into langues values (6, 'allemand');

INSERT INTO `langues_nounou`(`ref_nounou`, `ref_langues`) VALUES (1,1);
INSERT INTO `langues_nounou`(`ref_nounou`, `ref_langues`) VALUES (1,2);
INSERT INTO `langues_nounou`(`ref_nounou`, `ref_langues`) VALUES (2,5);
INSERT INTO `langues_nounou`(`ref_nounou`, `ref_langues`) VALUES (2,2);

INSERT INTO `revenu`(`mois`, `trimestre`, `annee`, `id_revenu`) VALUES (24,58,128,1);
INSERT INTO `revenu`(`mois`, `trimestre`, `annee`, `id_revenu`) VALUES (18,64,98,2);



INSERT INTO `evaluation`(`id_utilisateur`, `note`, `avis`) VALUES (1,5,'très bon');

insert into compte values ('admin', 'mdp', 'admin', 1);
insert into compte values ('parent', 'mdp', 'parent', 2);
insert into compte values ('nounou', 'mdp', 'nounou', 3);


INSERT INTO `nounou`(`id_nounou`, `nom`, `prenom`, `ville`, `email`, `portable`, `age`, `presentation`, `candidature`) 
VALUES (1,'Richard','Jerome','Troyes','dffv@gmail.com',0638645740,45,'Bonjour','En attente');
INSERT INTO `nounou`(`id_nounou`, `nom`, `prenom`, `ville`, `email`, `portable`, `age`, `presentation`, `candidature`) 
VALUES (2,'Oui','Non','Rosiere','oui@gmail.com',0779645695,25,'Heureux','En attente');