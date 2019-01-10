CREATE TABLE compte (
    login Varchar(45) NOT NULL,
    mdp Varchar(45) NOT NULL,
    utilisateur varchar(45) NOT NULL
);

CREATE TABLE evaluation (
    note float,
    avis varchar(250) not null,
    id_utilisateur varchar(25) not null,
    PRIMARY KEY(id_utilisateur)
);

CREATE TABLE langues(
    langue varchar(20) not null,
    PRIMARY KEY(langue)
);

CREATE TABLE nounou (
    id_nounou integer(45) not null,
    nom varchar(45) not null,
    prenom varchar(45) not null,
    ville varchar(45) not null,
    email varchar(45) not null,
    portable integer(10) not null,
    langues_parlees varchar(20) not null,
    age integer(3) not null,
    presentation varchar(250),
    evaluation_id float,
    candidature varchar(45),
    photo varchar(45),
    PRIMARY KEY(id_nounou),
    FOREIGN KEY(evaluation_id)
        REFERENCES evaluation(nom_utilisateur)
            ON DELETE CASCADE
            ON UPDATE RESTRICT,
    FOREIGN KEY(langues_parlees)
        REFERENCES langues(langue)
          ON DELETE CASCADE
          ON UPDATE RESTRICT
);

CREATE TABLE enfant (
    prenom varchar(20) not null,
    date_naissance varchar(20) not null,
    restriction_alimentaire varchar(250) not null,
    PRIMARY KEY(prenom)
);

CREATE TABLE parent(
    id_parent integer not null,
    nom varchar(20) not null,
    ville varchar(25) not null,
    email varchar(25) not null,
    enfant_id varchar(25) not null,
    info_generale varchar(250) not null,
    PRIMARY KEY(id_parent),
    FOREIGN KEY(enfant_id)
        REFERENCES enfant(prenom)
          ON DELETE CASCADE
          ON UPDATE RESTRICT
    
);