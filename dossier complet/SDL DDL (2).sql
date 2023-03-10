CREATE TABLE t_compte_cpt (
  cpt_pseudo VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  cpt_mot_de_passe CHAR(32) NOT NULL,
  PRIMARY KEY (cpt_pseudo)
			)
ENGINE = InnoDB;

CREATE TABLE t_profil_pfl (
 
  pfl_nom VARCHAR(60) NOT NULL,
  pfl_prenom VARCHAR(60) NOT NULL,
  pfl_email VARCHAR(100) NOT NULL,
  pfl_statut CHAR(1) NOT NULL,
  pfl_validite CHAR(1) NOT NULL,
  pfl_date DATE NOT NULL,
  cpt_pseudo VARCHAR(60)  CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (cpt_pseudo),
  FOREIGN KEY (cpt_pseudo) REFERENCES t_compte_cpt(cpt_pseudo)
 
  
  )
ENGINE = InnoDB;

create table t_news_new (
new_id integer AUTO_INCREMENT PRIMARY KEY not null,
new_titre varchar(30),
new_texte varchar(500),
new_date DATE,
cpt_pseudo varchar(60)  CHARACTER SET utf8 COLLATE utf8_bin  not null,
foreign key(cpt_pseudo) references t_compte_cpt(cpt_pseudo)
)
ENGINE = InnoDB;
create table t_artiste_art (
art_id Integer AUTO_INCREMENT primary key not null,
art_nom varchar(50),
art_prenom varchar(60),
art_texte varchar(200),
art_mail varchar(30),
cpt_pseudo Varchar(60) CHARACTER SET utf8 COLLATE utf8_bin  not null,
FOREIGN KEY (cpt_pseudo) REFERENCES t_compte_cpt(cpt_pseudo)
 )
 ENGINE = InnoDB;
 CREATE table t_oeuvre_oe (
 oe_id INTEGER AUTO_INCREMENT primary key not null,
 oe_titre varchar(30) not null,
 oe_dateheure DATETIME not null,
 oe_description VARCHAR(200) not null,
 oe_fichier VARCHAR(100)not null

 
 ) ENGINE = InnoDB;

 
 create table t_presentation_p (
 art_id INTEGER not null,
 oe_id INTEGER not null,
 primary key(art_id,oe_id),
 foreign key(art_id) references t_artiste_art(art_id),
 foreign key (oe_id) references t_oeuvre_oe(oe_id)
 )
 ENGINE = InnoDB;

create table t_visiteur_vis (
vis_id INTEGER AUTO_INCREMENT primary key not null,
vis_mdp CHAR(15), 
vis_prenom VARCHAR(50),
vis_nom  VARCHAR(50),
cpt_pseudo VARCHAR(60)  CHARACTER SET utf8 COLLATE utf8_bin  not null,
vis_date DATETIME not null,
foreign key (cpt_pseudo) references t_compte_cpt(cpt_pseudo)
) 
ENGINE = InnoDB;

create table t_commentaire_com (
com_id INTEGER AUTO_INCREMENT primary key not null,
vis_id INTEGER not null,
com_text VARCHAR(500) not null,
com_date DATETIME not null,
foreign key(vis_id) references t_visiteur_vis(vis_id),
unique(vis_id)
)
 ENGINE = InnoDB;
create table t_configuration_config (
config_id INTEGER AUTO_INCREMENT primary key not null,
config_intitule varchar(60) not null,
config_lieu varchar(60) not null,
config_date_debut DATETIME not null,
config_date_fin DATETIME not null,
config_date_vernissage DATETIME not null,
config_texte_bienvenu VARCHAR(60),
config_presentation VARCHAR(60)
)
ENGINE = InnoDB;
INSERT INTO `t_compte_cpt` (`cpt_pseudo`, `cpt_mot_de_passe`) VALUES
('Fred44', MD5('ciel')),
('Manuel12', MD5('soleil')),
('ValMarc', MD5('shogun')),
('YanLik', MD5('wano')),
('eric17', MD5('luffy')),
('gEstionnaire', MD5('gest22!_OPXE')),
('jeanLuc', MD5('five')),
('levitaroltonaro', MD5('niggahood')),
('manuelagringa', MD5('blm')),
('soso58', MD5('noracism')),
('trafalgareric', MD5('ace'));
INSERT INTO `t_profil_pfl` (`pfl_nom`, `pfl_prenom`, `pfl_email`, `pfl_statut`, `pfl_validite`, `pfl_date`, `cpt_pseudo`) VALUES
('LeBl??', 'Fred Fran??ois', 'ffd44@gmail.com', 'O', 'A', '2022-01-08', 'Fred44'),
('Diouf', 'Corinthes', 'dioufc11@gmail.com', 'O', 'A', '2022-01-27', 'Manuel12'),
('Yoan', 'Valode', 'marcval@gmail.com', 'A', 'A', '2021-11-15', 'ValMarc'),
('LIKEME', 'Marcel', 'likemarcel@yhotmail.com', 'O', 'A', '2018-01-01', 'YanLik'),
('Le Pil', 'Em??ric', 'emp@gmail.com', 'O', 'A', '2018-12-05', 'eric17'),
('LIKEME', 'Yan', 'yann@gmail.com', 'A', 'A', '2018-11-01', 'gEstionnaire'),
('Luc', 'Dorian', 'ddorian@gmail.com', 'O', 'A', '2018-01-02', 'jeanLuc'),
('Liboma', 'Armans', 'libarmandd@gmail.com', 'O', 'A', '2018-01-01', 'levitaroltonaro'),
('Gringa', 'Manuella', 'manue117@gmail.com', 'O', 'A', '2022-01-04', 'manuelagringa'),
('Le Hir', 'solene', 'okay@fr', 'O', 'A', '2022-04-25', 'soso58'),
('Jonas', 'Eric', 'je@sfr.fr', 'A', 'A', '2021-11-08', 'trafalgareric');


INSERT INTO `t_oeuvre_oe` (`oe_id`, `oe_titre`, `oe_dateheure`, `oe_description`, `oe_fichier`) VALUES
(11, 'l\'Arc', '0000-02-03', 'L\'arc est une arme de trait destin??e ?? lancer des fl??ches, il parait ??  la fin de la pr??histoire', 'images/demo/gallery/arc.jpg'),
(12, 'La lance', '0000-02-01', 'La lance est un type d\'arme d\'hast, apparue d??s le pal??olithique', 'images/demo/gallery/lance.jpg'),
(13, 'BrowningM2', '1921-02-02', 'connue sous le nom de .50 BMG.\r\nLa conception du M2 remonte ?? la fin de la Premi??re Guerre mondiale', 'images/demo/gallery/M2_Browning.jpg'),
(14, 'Le Kunai', '0100-01-03', 'Le kunai (???????) est une arme blanche autrefois utilis??e par les shinobi', 'images/demo/gallery/bo_shuriken.JPG'),
(15, 'Arme Nucl??aie', '1945-08-06', 'Arme de destruction massive utilis??e pour la premiere fois pendant la seconde guerre mondiale', 'images/demo/gallery/nucl.jpg'),
(17, 'AK-47', '1947-01-01', 'L\'AK-47 est le premier mod??le d\'une vaste famille de fusils d\'assaut', 'images/demo/gallery/637468.jpg'),
(18, 'Mitrailleuse Maxim', '1884-03-16', 'La mitrailleuse Maxim ??tait la premi??re mitrailleuse auto-aliment??e. Invent??e par Sir Hiram Maxim en 1884 en Grande-Bretagne', 'images/demo/gallery/Maxim.jpg'),
(19, 'Le revolver', '1863-01-01', 'r??volverN 2 est un syst??me ??quipant une arme ?? feu dans lequel les chambres sont amen??es tour ?? tour par rotation devant un canon ind??pendant', 'images/demo/gallery/revollJPG.JPG'),
(20, 'Winchester M1897', '1897-01-01', 'Les Winchester se caract??risent par leur levier d\'armement , m??canisme ?? hauteur de d??tente, qui permet d\'??jecter la douille vide rapidement et dans un m??me temps de charger une nouvelle cartouche', 'images/demo/gallery/Winchester_1897.jpg'),
(21, 'Winchester M12', '1912-01-01', 'Le Winchester Model 1912 est le premier fusil ?? pompe ?? conna??tre le succ??s. Il prend la succession du Winchester M97', 'images/demo/gallery/Winchester_Model_1912.jpg'),
(22, 'Le HK MP5', '1665-04-07', ' est un pistolet-mitrailleur produit par la firme allemande Heckler & Koch.', 'images/demo/gallery/MP5.jpg'),
(23, ' Le HK PSG1', '1991-01-01', 'Le HK PSG1 (Pr??zisions Scharfsch??tzengewehr, ?? fusil de pr??cision ?? en fran??ais) est un fusil semi-automatique allemand pour tireurs d\'??lite', 'images/demo/gallery/PSG.jpg'),
(24, 'M1A1 Abrams', '2003-12-14', 'Il s\'agit d\'un tank d??voil?? par l\'arm??e am??ricaine Abrams est un char de combat am??ricain de deuxi??me g??n??ration, num??rot?? M1. Ce char a ??t?? nomm?? en m??moire du g??n??ral Creighton Williams Abrams.', 'images/demo/gallery/Abrams.jpg'),
(25, 'La yari', '0000-01-01', 'Elle est l\'arme de pr??dilection des samoura??s, notamment utilis??e par les bataillons pour trancher les jarrets des chevaux et d??sar??onner leurs cavaliers', 'images/demo/gallery/Yari.jpg'),
(26, 'Le M4 Sherman', '1941-01-01', 'Le M4 Sherman est un char moyen et le char am??ricain produit en plus grande quantit?? pendant la Seconde Guerre mondiale. ', 'images/demo/gallery/R.jpg'),
(27, 'Le SKS.', '1941-11-01', 'Le SKS, un c??l??bre fusil semi-automatique americo-sovi??tique.', 'images/demo/gallery/SKS.jpg');
INSERT INTO `t_artiste_art` (`art_id`, `art_nom`, `art_prenom`, `art_texte`, `art_mail`, `cpt_pseudo`) VALUES
(1, 'Homme Pr??historique', NULL, 'Il s\'agit de peuples anciens ayant v??cu avant -3500 av JC.', NULL, 'eric17'),
(3, 'Browning', 'Mathew', '???inventeur de fusils ?? r??p??tition ?? glissi??re et ?? r??p??tition de cylindre???', NULL, 'jeanLuc'),
(5, 'Forces arm??es des ??tats-Unis', NULL, 'Us Army,US Navy, US Air Force US Marine Corps US Space Force US Coast Guard', NULL, 'Manuel12'),
(6, 'Kalachnikov', 'Mikha??l', 'est un ing??nieur et lieutenant-g??n??ral russe, inventeur de l\'AK-47, arme qui porte son nom', NULL, 'Manuel12'),
(11, 'Winchester', 'Oliver', 'Inveteur du c??l??bre Gun that won the West', NULL, 'trafalgareric'),
(12, 'Heckler & Koch', NULL, 'Heckler & Koch est une firme d\'armement allemande qui produit en particulier les pistolets mitrailleurs MP5, MP7 et HK UMP, les fusils d\'assaut HK G36, HK G3 et HK 416, et le fusil de pr??cision PSG-1.', 'www.heckler-koch.com/de', 'Manuel12');

INSERT INTO `t_news_new` (`new_id`, `new_titre`, `new_texte`, `new_date`, `cpt_pseudo`) VALUES
(1, 'Les nouveaut??s de artici', 'Nous proposons  un service beaucoup plus appronfondi dans le partage des emotions de nos artistes vers nos visiteurs, emettre une synergie est notre principale motivation', '2022-01-30', 'eric17'),
(2, 'Le dr??ne de combat', 'Ce bijou nous sera bientot disponible !', '2022-01-02', 'YanLik'),
(3, 'Le temps de la visite augmente', 'La dur??e d\'un ticket standard passe ?? 3h !', '2022-01-05', 'ValMarc'),
(4, 'L\'hiver est notre ami', 'les oeuvres d\'hiver seront sensationelles pour les plus grands fan d\'armes', '2022-01-14', 'jeanLuc'),
(5, 'Nouvel an !', 'L\'??quipe ArtIci vous souhaite ?? tous une merveilleuse ann??e artisitque !', '2022-01-01', 'trafalgareric'),
(8, 'Le quinquenat de notre galerie', 'Sous les couleurs chaleureuses des flammes, nos armes c??l??brent leur 5 ans !', '2022-02-09', 'gEstionnaire'),
(56, 'Attention, la QQ9 arrive !', 'Une arme in??dite... Que de surprises !', '2022-02-21', 'Manuel12');

INSERT INTO `t_configuration_config` (`config_id`, `config_intitule`, `config_lieu`, `config_date_debut`, `config_date_fin`, `config_date_vernissage`, `config_texte_bienvenu`, `config_presentation`) VALUES
(1, 'LA CONFIGURATION ARTICI', '14 Boulevard la Fontaine, 97600 RESTB', '2022-02-01 14:00:00', '2022-04-14 17:00:00', '2022-01-02 18:00:00', 'NOUS VOUS SOUHAITONS LA BIENVENUE', 'M??lange des g??n??rations');
INSERT INTO `t_presentation_p` (`art_id`, `oe_id`) VALUES
(1, 11),
(1, 14),
(1, 25),
(3, 13),
(3, 18),
(3, 26),
(5, 12),
(5, 15),
(5, 24),
(5, 27),
(6, 17),
(6, 19),
(6, 20),
(6, 27),
(12, 21),
(12, 22),
(12, 23);
INSERT INTO `t_visiteur_vis` (`vis_id`, `vis_mdp`, `vis_prenom`, `vis_nom`, `cpt_pseudo`, `vis_date`, `vis_mail`) VALUES
(7, 'sept', 'Emilie', 'OKAO', 'trafalgareric', '2022-02-03 12:00:00', 'jkl@.cg'),
(8, 'huit', 'Jo', 'Ann', 'ValMarc', '2022-02-21 00:00:00', 'yan@gmil.com'),
(9, 'neuf', 'morge', 'KAMILA', 'jeanLuc', '2022-02-03 12:00:00', 'ko@xx.com'),
(10, 'dix', 'aymeric', 'o\'neal', 'jeanLuc', '2022-03-29 10:00:00', 'yaninitonm@hotmail.com'),
(89, 'quatrevingtneuf', NULL, NULL, 'Manuel12', '2022-04-14 00:00:00', NULL),
(90, 'quatrevingtdix', NULL, NULL, 'levitaroltonaro', '2022-04-11 00:00:00', NULL),
(92, '11', 'a', 'a', 'soso58', '2022-04-25 15:29:53', 'a');
INSERT INTO `t_commentaire_com` (`com_id`, `vis_id`, `com_text`, `com_date`, `com_etat`) VALUES
(1, 9, 'fabuleux', '2022-02-18 11:00:00', 'D'),
(4, 7, 'je la conseille vivement ', '2022-01-03 15:00:00', 'D'),
(41, 10, 'toujours aussi bien', '2022-03-15 13:00:00', 'D'),
(51, 8, 'incroyable', '2022-04-06 00:00:00', 'D'),
(52, 92, 'a', '2022-04-25 15:31:23', 'D');
