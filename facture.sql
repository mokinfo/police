-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 07 fév. 2024 à 11:42
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `spn`
--

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `idf` int(11) NOT NULL,
  `desg` varchar(100) NOT NULL,
  `idp` int(11) NOT NULL,
  `datef` varchar(20) NOT NULL,
  `type_paix` varchar(20) NOT NULL,
  `mt` double NOT NULL,
  `mt_cnss` double NOT NULL,
  `etat` varchar(10) NOT NULL,
  `etat_cnss` varchar(10) NOT NULL,
  `date_paix` varchar(20) NOT NULL,
  `codf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`idf`, `desg`, `idp`, `datef`, `type_paix`, `mt`, `mt_cnss`, `etat`, `etat_cnss`, `date_paix`, `codf`) VALUES
(1, 'Frais de consultation Généraliste', 10, '2024-02-05 15:59', 'PSC', 1500, 3000, 'IMPAYER', '', '0', 0),
(2, 'Glycémie à jeun', 10, '2024-02-05 16:02', 'ESP', 500, 500, 'IMPAYER', '', '', 0),
(3, 'Urée', 10, '2024-02-05 16:02', 'ESP', 500, 500, 'IMPAYER', '', '', 0),
(4, 'Frais de consultation Généraliste', 12, '2024-02-05 16:54', 'PSC', 1500, 3000, 'IMPAYER', '', '0', 0),
(5, 'Frais de consultation Généraliste', 13, '2024-02-05 17:06', 'PSC', 1500, 3000, 'OK', '', '2024-02-06 9:01', 1),
(6, 'Frais de consultation Généraliste', 16, '2024-02-06 15:14', 'ESP', 1500, 3000, 'OK', '', '2024-02-06 15:16', 2),
(7, 'Frais de consultation Cancérologie', 17, '2024-02-06 15:18', 'PSC', 2000, 3000, 'IMPAYER', '', '0', 0),
(8, 'Frais de consultation Ophtalmologie', 18, '2024-02-07 7:42', 'PSC', 2000, 3000, 'OK', '', '2024-02-07 8:40', 4),
(9, 'Frais de consultation ORL', 20, '2024-02-07 8:39', 'ESP', 2000, 3000, 'OK', '', '2024-02-07 8:40', 3),
(10, 'Frais de consultation Urgence', 19, '2024-02-07 8:51', 'ESP', 1500, 0, 'OK', '', '2024-02-07 8:52', 5),
(11, 'Frais de consultation Cardiologie', 21, '2024-02-07 8:56', 'ESP', 2000, 3000, 'OK', '', '2024-02-07 8:56', 6),
(12, 'Frais de consultation Cancérologie', 24, '2024-02-07 10:24', 'PSC', 2000, 3000, 'IMPAYER', '', '0', 0),
(13, 'Frais de consultation ', 25, '2024-02-07 10:29', '0', 0, 0, 'OK', '', '2024-02-07 10:31', 7),
(14, 'Frais de consultation ORL', 25, '2024-02-07 10:30', 'ESP', 2000, 3000, 'OK', '', '2024-02-07 10:31', 7),
(15, 'Frais de consultation Pédiatrie', 26, '2024-02-07 10:33', 'ESP', 2000, 3000, 'OK', '', '2024-02-07 10:36', 8),
(16, 'Frais de consultation Ophtalmologie', 27, '2024-02-07 10:40', 'ESP', 2000, 3000, 'OK', '', '2024-02-07 10:40', 9),
(17, 'Frais de consultation Ophtalmologie', 28, '2024-02-07 10:42', 'ESP', 2000, 3000, 'OK', '', '2024-02-07 10:42', 10),
(18, 'Urée', 29, '2024-02-07 10:48', 'ESP', 500, 500, 'OK', '', '2024-02-07 10:49', 11),
(19, 'Créatinine', 29, '2024-02-07 10:48', 'ESP', 500, 500, 'OK', '', '2024-02-07 10:49', 11),
(20, 'NFS', 29, '2024-02-07 10:48', 'ESP', 500, 500, 'OK', '', '2024-02-07 10:49', 11),
(21, 'Groupage sanguine (GSRh)', 29, '2024-02-07 10:48', 'ESP', 500, 500, 'OK', '', '2024-02-07 10:49', 11);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`idf`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `idf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
