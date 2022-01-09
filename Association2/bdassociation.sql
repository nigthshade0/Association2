-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 20 sep. 2021 à 14:06
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdassociation`
--

-- --------------------------------------------------------

--
-- Structure de la table `associations`
--

DROP TABLE IF EXISTS `associations`;
CREATE TABLE IF NOT EXISTS `associations` (
  `idAsso` int NOT NULL,
  `nom` varchar(80) NOT NULL,
  `site` varchar(50) NOT NULL,
  `idQuartier` int NOT NULL,
  PRIMARY KEY (`idAsso`),
  KEY `idQuartier` (`idQuartier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `associations`
--

INSERT INTO `associations` (`idAsso`, `nom`, `site`, `idQuartier`) VALUES
(1, 'AIKIDO BUDO CLUB (ABC)', 'aikidobudoclub.free.fr', 14),
(2, 'ASEAT', 'www.aseat.fr', 12),
(3, 'ASPTT section BOWLING', 'www.toulouse.asptt.com', 9),
(4, 'ASSOCIATION CAPOEIRAGEM', 'www.capoeiragem.fr', 2),
(5, 'ASSOCIATION SPORTIVE AIR FRANCE', 'www.asaf.sport.asso.fr', 9),
(6, 'ASSOCIATION SPORTIVE TOULOUSE LARDENNE', 'lardenneac.site.voila.fr', 13),
(7, 'ASSOCIATION SPORTIVE TOULOUSE MIRAIL BADMINTON', 'www.astmb.fr', 3),
(8, 'ASSOCIATION STADE TOULOUSAIN RUGBY', 'www.stadetoulousain.fr', 25),
(9, 'BALMA SAINT EXUPERY 31', 'www.bse31.com', 20),
(10, 'BOULING CLUB SPORTIF DE ROGUET', 'joseroguet@orange.fr', 19),
(11, 'CLUB STUDIO DUO DANSES', 'www.studioduodanses.com', 5),
(12, 'CROIX DE PIERRE JUDO', 'croixdepierrejudo.free.fr', 6),
(13, 'DOJO DE LA ROSERAIE', 'www.aikido-noel.com', 22),
(14, 'ETOILE TOULOUSAINE', 'www.coursnicholas.com', 23),
(15, 'FCTT - FOOTBALL CLUB TOAC TOEC', 'www.fcttrugby.com', 7),
(16, 'L\'UNION DES ARTS', 'www.uniondesarts.com', 10),
(17, 'LE DOJO', 'www.ledojo.com', 10),
(18, 'OLYMPE BADMINTON CLUB', 'www.club.fft.fr/\r\nolympetoulouse', 8),
(19, 'SPACER\'S TOAC-TUC VOLLEY-BALL', 'www.spacerstoulouse.fr', 4),
(20, 'TCMS section TENNIS', 'tcms-tennis.clubeo.com', 12),
(21, 'TEC - Toulouse Electrogaz Club', 'jean.marc.fochesato@cegetel.net', 1),
(22, 'TOAC - TOULOUSE OLYMPIQUE AVIATION CLUB - OMNISPORT', 'bowling.toac.free.fr', 9),
(23, 'TOAC Section SQUASH', 'www.toacsquash.com', 25),
(24, 'TOULOUSE BASKET CLUB', 'www.toulouse-basket-club.fr', 3),
(25, 'TOULOUSE FEMININ HANDBALL', 'www.tfhb.org', 4),
(26, 'TOULOUSE JULES JULIEN BRONCOS XIII', 'ustjj13@free.fr', 7),
(27, 'TOULOUSE MULTI BOXE', 'tmboxe.free.fr', 19),
(28, 'TOULOUSE UNION HANDBALL', 'www.toulousehandball.com', 4),
(29, 'TUC OMNISPORTS- Toulouse Université Club', 'www.tucbad.org', 21),
(30, 'VIRE ET VOLTE', 'www.virevolte.fr', 15);

-- --------------------------------------------------------

--
-- Structure de la table `pratiques`
--

DROP TABLE IF EXISTS `pratiques`;
CREATE TABLE IF NOT EXISTS `pratiques` (
  `idAsso` int NOT NULL,
  `idSport` int NOT NULL,
  PRIMARY KEY (`idAsso`,`idSport`),
  KEY `etsport` (`idSport`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pratiques`
--

INSERT INTO `pratiques` (`idAsso`, `idSport`) VALUES
(1, 1),
(9, 1),
(13, 1),
(16, 1),
(17, 1),
(2, 2),
(7, 2),
(29, 2),
(24, 3),
(21, 4),
(3, 5),
(5, 5),
(22, 5),
(27, 6),
(4, 7),
(16, 7),
(2, 8),
(11, 9),
(14, 9),
(30, 9),
(2, 10),
(6, 10),
(25, 11),
(28, 11),
(2, 12),
(12, 12),
(10, 13),
(8, 14),
(15, 14),
(26, 15),
(23, 16),
(2, 17),
(18, 17),
(20, 17),
(19, 18);

-- --------------------------------------------------------

--
-- Structure de la table `quartiers`
--

DROP TABLE IF EXISTS `quartiers`;
CREATE TABLE IF NOT EXISTS `quartiers` (
  `idQuartier` int NOT NULL,
  `nom` varchar(20) NOT NULL,
  `associations` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`idQuartier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `quartiers`
--

INSERT INTO `quartiers` (`idQuartier`, `nom`, `associations`) VALUES
(1, 'Amidonniers', 'TEC - Toulouse Electrogaz Club'),
(2, 'Arnaud Bernard', 'ASSOCIATION CAPOEIRAGEM'),
(3, 'Bagatelle', 'ASSOCIATION SPORTIVE TOULOUSE MIRAIL BADMINTON'),
(4, 'Compans', 'SPACER\'S TOAC-TUC VOLLEY-BALL'),
(5, 'Croix Daurade', 'CLUB STUDIO DUO DANSES'),
(6, 'Croix de Pierre', 'CROIX DE PIERRE JUDO'),
(7, 'Empalot', 'FCTT - FOOTBALL CLUB TOAC TOEC'),
(8, 'Ginestous', 'OLYMPE BADMINTON CLUB'),
(9, 'Gramont', 'TOAC - TOULOUSE OLYMPIQUE AVIATION CLUB - OMNISPOR'),
(10, 'Guilheméry', 'L\'UNION DES ARTS/LE DOJO'),
(11, 'Jules Julien', NULL),
(12, 'Argoulets', 'TCMS section TENNIS/ASEAT'),
(13, 'Lardenne', 'ASSOCIATION SPORTIVE TOULOUSE LARDENNE'),
(14, 'Les Chalets', 'AIKIDO BUDO CLUB (ABC)'),
(15, 'Les Pradettes', NULL),
(16, 'Marengo Jolimont', NULL),
(17, 'Minimes', NULL),
(18, 'Montaudran Lespinet', NULL),
(19, 'Patte d\'Oie', '	\r\nBOULING CLUB SPORTIF DE ROGUET/TOULOUSE MULTI B'),
(20, 'Pont des Demoiselles', 'BALMA SAINT EXUPERY 31'),
(21, 'Rangueil', 'TUC OMNISPORTS- Toulouse Université Club'),
(22, 'Roseraie', 'DOJO DE LA ROSERAIE'),
(23, 'Saint Aubin - Dupuy', '	\r\nETOILE TOULOUSAINE'),
(24, 'Saint Cyprien', NULL),
(25, 'Sept Deniers', 'TOAC Section SQUASH/ASSOCIATION STADE TOULOUSAIN ');

-- --------------------------------------------------------

--
-- Structure de la table `sports`
--

DROP TABLE IF EXISTS `sports`;
CREATE TABLE IF NOT EXISTS `sports` (
  `idSport` int NOT NULL,
  `nom` varchar(20) NOT NULL,
  `genre_de_sport` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idSport`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sports`
--

INSERT INTO `sports` (`idSport`, `nom`, `genre_de_sport`) VALUES
(1, 'AIKIDO', 'Sport Individuelle'),
(2, 'BADMINTON', 'Sport Individuelle'),
(3, 'BASKET-BALL', 'Sport Collective'),
(4, 'BOULES LYONNAISES', 'Sport Individuelle'),
(5, 'BOWLING', 'Sport Individuelle'),
(6, 'BOXE FRANCAISE', 'Sport Individuelle'),
(7, 'CAPOEIRA', 'Sport Individuelle'),
(8, 'COURSE A PIED', 'Sport Individuelle'),
(9, 'DANSE DE SALON', 'Sport Collective'),
(10, 'FOOTBALL', 'Sport Collective'),
(11, 'handball', 'Sport Collective'),
(12, 'JUDO', 'Sport Individuelle'),
(13, 'Babmington', 'Sport Individuelle'),
(14, 'rugby', 'Sport Collective'),
(15, 'rugby à XIII', 'Sport Collective'),
(16, 'squash', 'Sport Individuelle'),
(17, 'tennis', 'Sport Individuelle'),
(18, 'VOLLEY BALL', 'Sport Collective');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `email_user` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `login_user` char(50) NOT NULL,
  `pwd_user` char(255) NOT NULL,
  `fonction` char(80) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `email_user`, `login_user`, `pwd_user`, `fonction`) VALUES
(55, 'nigthshade0@gmail.com', 'Shaq', '$2y$10$vNbEzMQZr.Tk6vL8ZhqO3emkWoZZNLN4BZZne65wdc9y9TJRwvTvy', 'cool'),
(56, 'nigthshade@gmail.com', 'Sha', '$2y$10$NvPUnXfujt.jvMRh4Ew5sOyuq0gcs.TNu/2LYJnvzY4/SGY2Ss4sm', 'qsdfgh');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `associations`
--
ALTER TABLE `associations`
  ADD CONSTRAINT `etquartier` FOREIGN KEY (`idQuartier`) REFERENCES `quartiers` (`idQuartier`);

--
-- Contraintes pour la table `pratiques`
--
ALTER TABLE `pratiques`
  ADD CONSTRAINT `etasso` FOREIGN KEY (`idAsso`) REFERENCES `associations` (`idAsso`),
  ADD CONSTRAINT `etsport` FOREIGN KEY (`idSport`) REFERENCES `sports` (`idSport`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
