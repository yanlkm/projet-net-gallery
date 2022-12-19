-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 27 avr. 2022 à 20:20
-- Version du serveur :  10.3.9-MariaDB-log
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `zfl2-zlikemeya`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_artiste_art`
--

CREATE TABLE `t_artiste_art` (
  `art_id` int(11) NOT NULL,
  `art_nom` varchar(50) DEFAULT NULL,
  `art_prenom` varchar(60) DEFAULT NULL,
  `art_texte` varchar(200) DEFAULT NULL,
  `art_mail` varchar(30) DEFAULT NULL,
  `cpt_pseudo` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_artiste_art`
--

INSERT INTO `t_artiste_art` (`art_id`, `art_nom`, `art_prenom`, `art_texte`, `art_mail`, `cpt_pseudo`) VALUES
(1, 'Homme Préhistorique', NULL, 'Il s\'agit de peuples anciens ayant vécu avant -3500 av JC.', NULL, 'eric17'),
(3, 'Browning', 'Mathew', '‎inventeur de fusils à répétition à glissière et à répétition de cylindre‎', NULL, 'jeanLuc'),
(5, 'Forces armées des États-Unis', NULL, 'Us Army,US Navy, US Air Force US Marine Corps US Space Force US Coast Guard', NULL, 'Manuel12'),
(6, 'Kalachnikov', 'Mikhaïl', 'est un ingénieur et lieutenant-général russe, inventeur de l\'AK-47, arme qui porte son nom', NULL, 'Manuel12'),
(11, 'Winchester', 'Oliver', 'Inveteur du célèbre Gun that won the West', NULL, 'trafalgareric'),
(12, 'Heckler & Koch', NULL, 'Heckler & Koch est une firme d\'armement allemande qui produit en particulier les pistolets mitrailleurs MP5, MP7 et HK UMP, les fusils d\'assaut HK G36, HK G3 et HK 416, et le fusil de précision PSG-1.', 'www.heckler-koch.com/de', 'Manuel12');

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaire_com`
--

CREATE TABLE `t_commentaire_com` (
  `com_id` int(11) NOT NULL,
  `vis_id` int(11) NOT NULL,
  `com_text` varchar(200) DEFAULT NULL,
  `com_date` datetime NOT NULL,
  `com_etat` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_commentaire_com`
--

INSERT INTO `t_commentaire_com` (`com_id`, `vis_id`, `com_text`, `com_date`, `com_etat`) VALUES
(1, 9, 'fabuleux', '2022-02-18 11:00:00', 'D'),
(4, 7, 'je la conseille vivement ', '2022-01-03 15:00:00', 'D'),
(41, 10, 'toujours aussi bien', '2022-03-15 13:00:00', 'D'),
(51, 8, 'incroyable', '2022-04-06 00:00:00', 'D'),
(52, 92, 'a', '2022-04-25 15:31:23', 'D');

-- --------------------------------------------------------

--
-- Structure de la table `t_compte_cpt`
--

CREATE TABLE `t_compte_cpt` (
  `cpt_pseudo` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cpt_mot_de_passe` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_compte_cpt`
--

INSERT INTO `t_compte_cpt` (`cpt_pseudo`, `cpt_mot_de_passe`) VALUES
('Fred44', '12bbd9846d51a4f3239e5f72c150eb07'),
('Manuel12', '4fc66ad8d3d65e9c06d04167daf279e3'),
('ValMarc', 'df8fede7ff71608e24a5576326e41c75'),
('YanLik', 'ba10182f9690a88ef186c4c8147b0ee3'),
('eric17', '0f22b8ad50630e087b8f240acb6a785d'),
('gEstionnaire', '98abb15e560057e55e4e99187702ed4e'),
('jeanLuc', '43ee1d83b74b6407b7bf4160a5b28fd7'),
('levitaroltonaro', 'afc5bd9d18aba20a5a9ef04805e9aa28'),
('manuelagringa', 'b6edd10559b20cb0a3ddaeb15e5267cc'),
('soso58', 'df8fede7ff71608e24a5576326e41c75'),
('trafalgareric', '43ee1d83b74b6407b7bf4160a5b28fd7');

-- --------------------------------------------------------

--
-- Structure de la table `t_configuration_config`
--

CREATE TABLE `t_configuration_config` (
  `config_id` int(11) NOT NULL,
  `config_intitule` varchar(60) NOT NULL,
  `config_lieu` varchar(60) NOT NULL,
  `config_date_debut` datetime NOT NULL,
  `config_date_fin` datetime NOT NULL,
  `config_date_vernissage` datetime NOT NULL,
  `config_texte_bienvenu` varchar(60) DEFAULT NULL,
  `config_presentation` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_configuration_config`
--

INSERT INTO `t_configuration_config` (`config_id`, `config_intitule`, `config_lieu`, `config_date_debut`, `config_date_fin`, `config_date_vernissage`, `config_texte_bienvenu`, `config_presentation`) VALUES
(1, 'LA CONFIGURATION ARTICI', '14 Boulevard la Fontaine, 97600 RESTB', '2022-02-01 14:00:00', '2022-04-14 17:00:00', '2022-01-02 18:00:00', 'NOUS VOUS SOUHAITONS LA BIENVENUE', 'Mélange des générations');

-- --------------------------------------------------------

--
-- Structure de la table `t_news_new`
--

CREATE TABLE `t_news_new` (
  `new_id` int(11) NOT NULL,
  `new_titre` varchar(30) DEFAULT NULL,
  `new_texte` varchar(500) DEFAULT NULL,
  `new_date` date DEFAULT NULL,
  `cpt_pseudo` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_news_new`
--

INSERT INTO `t_news_new` (`new_id`, `new_titre`, `new_texte`, `new_date`, `cpt_pseudo`) VALUES
(1, 'Les nouveautés de artici', 'Nous proposons  un service beaucoup plus appronfondi dans le partage des emotions de nos artistes vers nos visiteurs, emettre une synergie est notre principale motivation', '2022-01-30', 'eric17'),
(2, 'Le drône de combat', 'Ce bijou nous sera bientot disponible !', '2022-01-02', 'YanLik'),
(3, 'Le temps de la visite augmente', 'La durée d\'un ticket standard passe à 3h !', '2022-01-05', 'ValMarc'),
(4, 'L\'hiver est notre ami', 'les oeuvres d\'hiver seront sensationelles pour les plus grands fan d\'armes', '2022-01-14', 'jeanLuc'),
(5, 'Nouvel an !', 'L\'équipe ArtIci vous souhaite à tous une merveilleuse année artisitque !', '2022-01-01', 'trafalgareric'),
(8, 'Le quinquenat de notre galerie', 'Sous les couleurs chaleureuses des flammes, nos armes célèbrent leur 5 ans !', '2022-02-09', 'gEstionnaire'),
(56, 'Attention, la QQ9 arrive !', 'Une arme inédite... Que de surprises !', '2022-02-21', 'Manuel12');

-- --------------------------------------------------------

--
-- Structure de la table `t_oeuvre_oe`
--

CREATE TABLE `t_oeuvre_oe` (
  `oe_id` int(11) NOT NULL,
  `oe_titre` varchar(30) NOT NULL,
  `oe_dateheure` date DEFAULT NULL,
  `oe_description` varchar(200) NOT NULL,
  `oe_fichier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_oeuvre_oe`
--

INSERT INTO `t_oeuvre_oe` (`oe_id`, `oe_titre`, `oe_dateheure`, `oe_description`, `oe_fichier`) VALUES
(11, 'l\'Arc', '0000-02-03', 'L\'arc est une arme de trait destinée à lancer des flèches, il parait à  la fin de la préhistoire', 'images/demo/gallery/arc.jpg'),
(12, 'La lance', '0000-02-01', 'La lance est un type d\'arme d\'hast, apparue dès le paléolithique', 'images/demo/gallery/lance.jpg'),
(13, 'BrowningM2', '1921-02-02', 'connue sous le nom de .50 BMG.\r\nLa conception du M2 remonte à la fin de la Première Guerre mondiale', 'images/demo/gallery/M2_Browning.jpg'),
(14, 'Le Kunai', '0100-01-03', 'Le kunai (苦無?) est une arme blanche autrefois utilisée par les shinobi', 'images/demo/gallery/bo_shuriken.JPG'),
(15, 'Arme Nucléaie', '1945-08-06', 'Arme de destruction massive utilisée pour la premiere fois pendant la seconde guerre mondiale', 'images/demo/gallery/nucl.jpg'),
(17, 'AK-47', '1947-01-01', 'L\'AK-47 est le premier modèle d\'une vaste famille de fusils d\'assaut', 'images/demo/gallery/637468.jpg'),
(18, 'Mitrailleuse Maxim', '1884-03-16', 'La mitrailleuse Maxim était la première mitrailleuse auto-alimentée. Inventée par Sir Hiram Maxim en 1884 en Grande-Bretagne', 'images/demo/gallery/Maxim.jpg'),
(19, 'Le revolver', '1863-01-01', 'révolverN 2 est un système équipant une arme à feu dans lequel les chambres sont amenées tour à tour par rotation devant un canon indépendant', 'images/demo/gallery/revollJPG.JPG'),
(20, 'Winchester M1897', '1897-01-01', 'Les Winchester se caractérisent par leur levier d\'armement , mécanisme à hauteur de détente, qui permet d\'éjecter la douille vide rapidement et dans un même temps de charger une nouvelle cartouche', 'images/demo/gallery/Winchester_1897.jpg'),
(21, 'Winchester M12', '1912-01-01', 'Le Winchester Model 1912 est le premier fusil à pompe à connaître le succès. Il prend la succession du Winchester M97', 'images/demo/gallery/Winchester_Model_1912.jpg'),
(22, 'Le HK MP5', '1665-04-07', ' est un pistolet-mitrailleur produit par la firme allemande Heckler & Koch.', 'images/demo/gallery/MP5.jpg'),
(23, ' Le HK PSG1', '1991-01-01', 'Le HK PSG1 (Präzisions Scharfschützengewehr, « fusil de précision » en français) est un fusil semi-automatique allemand pour tireurs d\'élite', 'images/demo/gallery/PSG.jpg'),
(24, 'M1A1 Abrams', '2003-12-14', 'Il s\'agit d\'un tank dévoilé par l\'armée américaine Abrams est un char de combat américain de deuxième génération, numéroté M1. Ce char a été nommé en mémoire du général Creighton Williams Abrams.', 'images/demo/gallery/Abrams.jpg'),
(25, 'La yari', '0000-01-01', 'Elle est l\'arme de prédilection des samouraïs, notamment utilisée par les bataillons pour trancher les jarrets des chevaux et désarçonner leurs cavaliers', 'images/demo/gallery/Yari.jpg'),
(26, 'Le M4 Sherman', '1941-01-01', 'Le M4 Sherman est un char moyen et le char américain produit en plus grande quantité pendant la Seconde Guerre mondiale. ', 'images/demo/gallery/R.jpg'),
(27, 'Le SKS.', '1941-11-01', 'Le SKS, un célèbre fusil semi-automatique americo-soviétique.', 'images/demo/gallery/SKS.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `t_presentation_p`
--

CREATE TABLE `t_presentation_p` (
  `art_id` int(11) NOT NULL,
  `oe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_presentation_p`
--

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

-- --------------------------------------------------------

--
-- Structure de la table `t_profil_pfl`
--

CREATE TABLE `t_profil_pfl` (
  `pfl_nom` varchar(60) NOT NULL,
  `pfl_prenom` varchar(60) NOT NULL,
  `pfl_email` varchar(100) NOT NULL,
  `pfl_statut` char(1) NOT NULL,
  `pfl_validite` char(1) NOT NULL,
  `pfl_date` date NOT NULL,
  `cpt_pseudo` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_profil_pfl`
--

INSERT INTO `t_profil_pfl` (`pfl_nom`, `pfl_prenom`, `pfl_email`, `pfl_statut`, `pfl_validite`, `pfl_date`, `cpt_pseudo`) VALUES
('LeBlé', 'Fred François', 'ffd44@gmail.com', 'O', 'A', '2022-01-08', 'Fred44'),
('Diouf', 'Corinthes', 'dioufc11@gmail.com', 'O', 'A', '2022-01-27', 'Manuel12'),
('Yoan', 'Valode', 'marcval@gmail.com', 'A', 'A', '2021-11-15', 'ValMarc'),
('LIKEME', 'Marcel', 'likemarcel@yhotmail.com', 'O', 'A', '2018-01-01', 'YanLik'),
('Le Pil', 'Eméric', 'emp@gmail.com', 'O', 'A', '2018-12-05', 'eric17'),
('LIKEME', 'Yan', 'yann@gmail.com', 'A', 'A', '2018-11-01', 'gEstionnaire'),
('Luc', 'Dorian', 'ddorian@gmail.com', 'O', 'A', '2018-01-02', 'jeanLuc'),
('Liboma', 'Armans', 'libarmandd@gmail.com', 'O', 'A', '2018-01-01', 'levitaroltonaro'),
('Gringa', 'Manuella', 'manue117@gmail.com', 'O', 'A', '2022-01-04', 'manuelagringa'),
('Le Hir', 'solene', 'okay@fr', 'O', 'A', '2022-04-25', 'soso58'),
('Jonas', 'Eric', 'je@sfr.fr', 'A', 'A', '2021-11-08', 'trafalgareric');

-- --------------------------------------------------------

--
-- Structure de la table `t_visiteur_vis`
--

CREATE TABLE `t_visiteur_vis` (
  `vis_id` int(11) NOT NULL,
  `vis_mdp` char(15) DEFAULT NULL,
  `vis_prenom` varchar(50) DEFAULT NULL,
  `vis_nom` varchar(50) DEFAULT NULL,
  `cpt_pseudo` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `vis_date` datetime NOT NULL,
  `vis_mail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_visiteur_vis`
--

INSERT INTO `t_visiteur_vis` (`vis_id`, `vis_mdp`, `vis_prenom`, `vis_nom`, `cpt_pseudo`, `vis_date`, `vis_mail`) VALUES
(7, 'sept', 'Emilie', 'OKAO', 'trafalgareric', '2022-02-03 12:00:00', 'jkl@.cg'),
(8, 'huit', 'Jo', 'Ann', 'ValMarc', '2022-02-21 00:00:00', 'yan@gmil.com'),
(9, 'neuf', 'morge', 'KAMILA', 'jeanLuc', '2022-02-03 12:00:00', 'ko@xx.com'),
(10, 'dix', 'aymeric', 'o\'neal', 'jeanLuc', '2022-03-29 10:00:00', 'yaninitonm@hotmail.com'),
(89, 'quatrevingtneuf', NULL, NULL, 'Manuel12', '2022-04-14 00:00:00', NULL),
(90, 'quatrevingtdix', NULL, NULL, 'levitaroltonaro', '2022-04-11 00:00:00', NULL),
(92, '11', 'a', 'a', 'soso58', '2022-04-25 15:29:53', 'a');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_artiste_art`
--
ALTER TABLE `t_artiste_art`
  ADD PRIMARY KEY (`art_id`),
  ADD KEY `cpt_pseudo` (`cpt_pseudo`);

--
-- Index pour la table `t_commentaire_com`
--
ALTER TABLE `t_commentaire_com`
  ADD PRIMARY KEY (`com_id`),
  ADD UNIQUE KEY `vis_id` (`vis_id`);

--
-- Index pour la table `t_compte_cpt`
--
ALTER TABLE `t_compte_cpt`
  ADD PRIMARY KEY (`cpt_pseudo`);

--
-- Index pour la table `t_configuration_config`
--
ALTER TABLE `t_configuration_config`
  ADD PRIMARY KEY (`config_id`);

--
-- Index pour la table `t_news_new`
--
ALTER TABLE `t_news_new`
  ADD PRIMARY KEY (`new_id`),
  ADD KEY `cpt_pseudo` (`cpt_pseudo`);

--
-- Index pour la table `t_oeuvre_oe`
--
ALTER TABLE `t_oeuvre_oe`
  ADD PRIMARY KEY (`oe_id`);

--
-- Index pour la table `t_presentation_p`
--
ALTER TABLE `t_presentation_p`
  ADD PRIMARY KEY (`art_id`,`oe_id`),
  ADD KEY `oe_id` (`oe_id`);

--
-- Index pour la table `t_profil_pfl`
--
ALTER TABLE `t_profil_pfl`
  ADD PRIMARY KEY (`cpt_pseudo`);

--
-- Index pour la table `t_visiteur_vis`
--
ALTER TABLE `t_visiteur_vis`
  ADD PRIMARY KEY (`vis_id`),
  ADD KEY `cpt_pseudo` (`cpt_pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_artiste_art`
--
ALTER TABLE `t_artiste_art`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `t_commentaire_com`
--
ALTER TABLE `t_commentaire_com`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `t_configuration_config`
--
ALTER TABLE `t_configuration_config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_news_new`
--
ALTER TABLE `t_news_new`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `t_oeuvre_oe`
--
ALTER TABLE `t_oeuvre_oe`
  MODIFY `oe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `t_visiteur_vis`
--
ALTER TABLE `t_visiteur_vis`
  MODIFY `vis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_artiste_art`
--
ALTER TABLE `t_artiste_art`
  ADD CONSTRAINT `t_artiste_art_ibfk_1` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);

--
-- Contraintes pour la table `t_commentaire_com`
--
ALTER TABLE `t_commentaire_com`
  ADD CONSTRAINT `t_commentaire_com_ibfk_1` FOREIGN KEY (`vis_id`) REFERENCES `t_visiteur_vis` (`vis_id`);

--
-- Contraintes pour la table `t_news_new`
--
ALTER TABLE `t_news_new`
  ADD CONSTRAINT `t_news_new_ibfk_1` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);

--
-- Contraintes pour la table `t_presentation_p`
--
ALTER TABLE `t_presentation_p`
  ADD CONSTRAINT `t_presentation_p_ibfk_1` FOREIGN KEY (`art_id`) REFERENCES `t_artiste_art` (`art_id`),
  ADD CONSTRAINT `t_presentation_p_ibfk_2` FOREIGN KEY (`oe_id`) REFERENCES `t_oeuvre_oe` (`oe_id`);

--
-- Contraintes pour la table `t_profil_pfl`
--
ALTER TABLE `t_profil_pfl`
  ADD CONSTRAINT `t_profil_pfl_ibfk_1` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);

--
-- Contraintes pour la table `t_visiteur_vis`
--
ALTER TABLE `t_visiteur_vis`
  ADD CONSTRAINT `t_visiteur_vis_ibfk_1` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
