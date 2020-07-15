-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 15 juil. 2020 à 09:35
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `articleID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `articleTitre` varchar(255) NOT NULL,
  `articleTexte` text NOT NULL,
  `articleDate` datetime NOT NULL,
  `articleImage` varchar(255) DEFAULT NULL,
  `articleVues` int(11) NOT NULL,
  PRIMARY KEY (`articleID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`articleID`, `articleTitre`, `articleTexte`, `articleDate`, `articleImage`, `articleVues`) VALUES
(1, 'Premier article du Portfolio d\'Olivier Prieur', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo...', '2020-07-08 11:10:26', 'img/articles/article1.jpg', 854),
(2, 'Deuxieme article du Portfolio d\'Olivier Prieur', 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in...', '2020-07-08 12:52:26', 'img/articles/article2.jpg', 124),
(3, 'Troisieme article', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2020-07-15 09:05:09', 'img/articles/article3.jpg', 45),
(4, 'QuatriÃ¨me article du portfolio', '<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam...</p>', '2020-07-15 10:33:42', 'img/articles/article4.jpg', 231),
(5, 'PengolinCoin passe en version 2.0.0.2', '<p>PengolinCoin [PGO] est une crypto-monnaie ASIC-resitante, utilisant l\'algorithme PoW Cryptonight_turtle (pico). Les transactions sont rapides, la confidentialit&eacute; et la facilit&eacute; d\'utilisation rendent cette monnaie parfaite pour payer ou donner un pourboire &agrave; n\'importe qui &agrave; tout moment. OK.</p>', '2020-07-15 10:33:22', 'img/articles/article-test.png', 9847);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `memberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`memberID`, `username`, `password`, `email`) VALUES
(1, 'Demo', '$2y$10$wJxa1Wm0rtS2BzqKnoCPd.7QQzgu7D/aLlMR5Aw3O.m9jx3oRJ5R2', 'demo@demo.com'),
(2, 'citizenz', '$2y$10$xxjFBzObo5kRt4hKiFC5Lej0Y.gyzyS2qVa/JnRU/Mr6eQlOC4mT2', 'citizenz7@protonmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `projetID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `projetTitre` varchar(255) NOT NULL,
  `projetCat` varchar(255) NOT NULL,
  `projetFilter` varchar(255) NOT NULL,
  `projetTexte` text NOT NULL,
  `projetGithub` varchar(255) DEFAULT NULL,
  `projetDate` datetime NOT NULL,
  `projetImage` varchar(255) DEFAULT NULL,
  `projetVues` int(11) NOT NULL,
  PRIMARY KEY (`projetID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`projetID`, `projetTitre`, `projetCat`, `projetFilter`, `projetTexte`, `projetGithub`, `projetDate`, `projetImage`, `projetVues`) VALUES
(1, 'IntÃ©gration d\'une maquette au format PSD avec HTML, CSS et Bootstrap', 'HTML / CSS / Bootstrap', 'html', '<p>Premier projet HTML/Bootstrap &agrave; l\'Acces Code School : depuis un fichier .psd, r&eacute;aliser la maquette du site web en HTML, CSS et Bootstrap</p>', 'https://github.com/citizenz7/integration-template-Interactive-Agency', '2020-07-08 12:41:14', 'img/projets/projet-maquette1.jpg', 325),
(2, 'IntÃ©gration d\'une maquette d\'un collÃ¨gue de formation sans bootstrap', 'HTML / CSS', 'html', '<p>Int&eacute;gration de la maquette d\'un coll&egrave;gue de formation en utilisant seulement HTML et CSS (flex-box et media-queries)...</p>', 'https://github.com/citizenz7/integration-oswald', '2020-07-08 13:18:31', 'img/projets/projet-maquette2.jpg', 125),
(3, 'Portfolio PHP/MySQL', 'HTML / CSS / PHP / MySQL', 'php', '<p>Projet de cr&eacute;ation d\'un portfolio avec backend PHP / MySQL dans le cadre de l\'Access Code School de Nevers.</p>', 'https://github.com/citizenz7/portfolio', '2020-07-08 13:52:03', 'img/projets/projet3-portfolio.jpg', 231),
(4, 'Projet Explorateur de fichiers en PHP', 'HTML / CSS / PHP', 'php', '<p>Projet de Files explorer r&eacute;alis&eacute; en PHP</p>', 'https://github.com/citizenz7/files-explorer', '2020-07-08 14:17:44', 'img/projets/projet4-filesexplorer.jpg', 354),
(5, 'Projet Bomberman (jeu) en Javascript', 'Javascript', 'js', '<p>Jeu Bomberman r&eacute;alis&eacute; en <strong>Javascript + HTML + CSS</strong> dans le cadre de la formation D&eacute;veloppeur web et web mobile &agrave; l\'Access Code School de Nevers</p>', 'https://github.com/citizenz7/JS-bomberman', '2020-07-08 14:49:34', 'img/projets/projet5-bomberman.jpg', 654),
(6, 'Ceci est un test', 'HTML, CSS', 'html', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>', NULL, '2020-07-10 15:35:50', 'img/projets/projet-test-2.png', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
