-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 20 Décembre 2019 à 16:47
-- Version du serveur :  5.1.72-community
-- Version de PHP :  5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `gastro`
--

CREATE TABLE IF NOT EXISTS `gastro` (
  `id_gastro` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `id_voyageur` tinyint(3) unsigned NOT NULL,
  `ville` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pays` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nb_repas` tinyint(3) NOT NULL,
  PRIMARY KEY (`id_gastro`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `gastro`
--

INSERT INTO `gastro` (`id_gastro`, `id_voyageur`, `ville`, `pays`, `nb_repas`) VALUES
(1, 1, 'Paris', 'France', 3),
(2, 1, 'Mulhouse', 'France', 2),
(3, 1, 'Luxembourg', 'Luxembourg', 2),
(4, 1, 'Charleroi', 'Belgique', 3),
(5, 2, 'Paris', 'France', 10);

-- --------------------------------------------------------

--
-- Structure de la table `voyageur`
--

CREATE TABLE IF NOT EXISTS `voyageur` (
  `id_voyageur` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date_deb` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date_fin` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_voyageur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `voyageur`
--

INSERT INTO `voyageur` (`id_voyageur`, `prenom`, `nom`, `date_deb`, `date_fin`) VALUES
(1, 'Paul', 'Durant', '04/09/19', '24/09/19'),
(2, 'Armelle', 'Dupont', '04/09/19', '24/09/19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
