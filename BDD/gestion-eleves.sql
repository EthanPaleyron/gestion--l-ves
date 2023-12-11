/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  07/12/2023 17:04:50                      */
/*==============================================================*/


drop table if exists FORME;

drop table if exists FORMATEUR;

drop table if exists ENSEIGNE;

drop table if exists NATIONALLITE;

drop table if exists SALLE;

drop table if exists STAGIAIRE;

drop table if exists TYPE_FORMATION;

/*==============================================================*/
/* Table : CONTIENTS                                            */
/*==============================================================*/
create table FORME
(
   ID_STAGIAIRE         int not null,
   ID_FORMATEUR         int not null,
   DATE_DEBUT           date,
   DATE_FIN             date,
   primary key (ID_STAGIAIRE, ID_FORMATEUR)
);

/*==============================================================*/
/* Table : FORMATEUR                                            */
/*==============================================================*/
create table FORMATEUR
(
   ID_FORMATEUR         int not null AUTO_INCREMENT,
   ID_SALLE             int not null,
   NOM_FORMATEUR        varchar(100),
   PRENOM_FORMATEUR     varchar(100),
   primary key (ID_FORMATEUR)
);

/*==============================================================*/
/* Table : FORME                                                */
/*==============================================================*/
create table ENSEIGNE
(
   ID_FORMATEUR         int not null,
   ID_TYPE_FORMATION    int not null,
   primary key (ID_FORMATEUR, ID_TYPE_FORMATION)
);

/*==============================================================*/
/* Table : NATIONALLITE                                         */
/*==============================================================*/
create table NATIONALLITE
(
   ID_NATIONALLITE      int not null AUTO_INCREMENT,
   LIBELLE_NATIONALLITE varchar(50),
   primary key (ID_NATIONALLITE)
);

/*==============================================================*/
/* Table : SALLE                                                */
/*==============================================================*/
create table SALLE
(
   ID_SALLE             int not null AUTO_INCREMENT,
   LIBELLE_SALLE        varchar(50),
   primary key (ID_SALLE)
);

/*==============================================================*/
/* Table : STAGIAIRE                                            */
/*==============================================================*/
create table STAGIAIRE
(
   ID_STAGIAIRE         int not null AUTO_INCREMENT,
   ID_TYPE_FORMATION    int not null,
   ID_NATIONALLITE      int not null,
   NOM_STAGIAIRE        varchar(100),
   PRENOM_STAGIAIRE     varchar(100),
   primary key (ID_STAGIAIRE)
);

/*==============================================================*/
/* Table : TYPE_FORMATION                                       */
/*==============================================================*/
create table TYPE_FORMATION
(
   ID_TYPE_FORMATION    int not null AUTO_INCREMENT,
   LIBELLE_TYPE_FORMATION varchar(50),
   primary key (ID_TYPE_FORMATION)
);

ALTER TABLE FORME ENGINE = InnoDB;
ALTER TABLE FORMATEUR ENGINE = InnoDB;
ALTER TABLE ENSEIGNE ENGINE = InnoDB;
ALTER TABLE NATIONALLITE ENGINE = InnoDB;
ALTER TABLE SALLE ENGINE = InnoDB;
ALTER TABLE STAGIAIRE ENGINE = InnoDB;
ALTER TABLE TYPE_FORMATION ENGINE = InnoDB;

alter table FORME add constraint FK_FORME foreign key (ID_FORMATEUR)
      references FORMATEUR (ID_FORMATEUR) on delete restrict on update restrict;

alter table FORME add constraint FK_FORME2 foreign key (ID_STAGIAIRE)
      references STAGIAIRE (ID_STAGIAIRE) on delete cascade on update restrict;

alter table FORMATEUR add constraint FK_VA foreign key (ID_SALLE)
      references SALLE (ID_SALLE) on delete restrict on update restrict;

alter table ENSEIGNE add constraint FK_ENSEIGNE foreign key (ID_TYPE_FORMATION)
      references TYPE_FORMATION (ID_TYPE_FORMATION) on delete restrict on update restrict;

alter table ENSEIGNE add constraint FK_ENSEIGNE2 foreign key (ID_FORMATEUR)
      references FORMATEUR (ID_FORMATEUR) on delete restrict on update restrict;

alter table STAGIAIRE add constraint FK_EST_DE foreign key (ID_NATIONALLITE)
      references NATIONALLITE (ID_NATIONALLITE) on delete restrict on update restrict;

alter table STAGIAIRE add constraint FK_SE_FORM foreign key (ID_TYPE_FORMATION)
      references TYPE_FORMATION (ID_TYPE_FORMATION) on delete restrict on update restrict;

