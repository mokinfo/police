-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 16, 2022 at 07:18 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spn`
--

-- --------------------------------------------------------

--
-- Table structure for table `andoc`
--

CREATE TABLE `andoc` (
  `idexam` int(11) NOT NULL,
  `idan` int(11) NOT NULL,
  `identexam` int(11) NOT NULL,
  `datexam` varchar(30) NOT NULL,
  `fg` float NOT NULL,
  `rg` float NOT NULL,
  `gtt` float NOT NULL,
  `chol` float NOT NULL,
  `tc` float NOT NULL,
  `hdlc` float NOT NULL,
  `ldlc` float NOT NULL,
  `br` float NOT NULL,
  `sgptalt` float NOT NULL,
  `alkphos` float NOT NULL,
  `brdi` float NOT NULL,
  `sgot` float NOT NULL,
  `cpk` float NOT NULL,
  `ldh` float NOT NULL,
  `urea` float NOT NULL,
  `crea` float NOT NULL,
  `ua` float NOT NULL,
  `na` float NOT NULL,
  `k` float NOT NULL,
  `chlor` float NOT NULL,
  `calc` float NOT NULL,
  `phos` float NOT NULL,
  `alb` float NOT NULL,
  `glob` float NOT NULL,
  `ratio` float NOT NULL,
  `amy` float NOT NULL,
  `cbc` float NOT NULL,
  `cbcwbc` float NOT NULL,
  `cbclymphh` float NOT NULL,
  `cbcmidh` float NOT NULL,
  `cbcgranh` float NOT NULL,
  `cbclymphp` float NOT NULL,
  `cbcmidp` float NOT NULL,
  `cbcgranp` float NOT NULL,
  `cbcrbc` float NOT NULL,
  `cbchgb` float NOT NULL,
  `cbchct` float NOT NULL,
  `cbcmcv` float NOT NULL,
  `cbcmch` float NOT NULL,
  `cbcmchc` float NOT NULL,
  `cbcrdwcv` float NOT NULL,
  `cbcrdwsd` float NOT NULL,
  `cbcplt` float NOT NULL,
  `cbcmpv` float NOT NULL,
  `cbcpdw` float NOT NULL,
  `cbcpct` float NOT NULL,
  `esr` float NOT NULL,
  `hemo` float NOT NULL,
  `mala` float NOT NULL,
  `btct` float NOT NULL,
  `ptaptt` float NOT NULL,
  `rc` float NOT NULL,
  `plat` float NOT NULL,
  `rha` float NOT NULL,
  `abog` float NOT NULL,
  `ctdi` float NOT NULL,
  `rbcm` float NOT NULL,
  `pregt` float NOT NULL,
  `wt` float NOT NULL,
  `raf` float NOT NULL,
  `vdrl` float NOT NULL,
  `tpha` float NOT NULL,
  `hivab` float NOT NULL,
  `hbsag` float NOT NULL,
  `hcvab` float NOT NULL,
  `mant` float NOT NULL,
  `hcgd` float NOT NULL,
  `bruc` float NOT NULL,
  `toxo` float NOT NULL,
  `asot` float NOT NULL,
  `hpa` float NOT NULL,
  `cprpcr` float NOT NULL,
  `anfana` float NOT NULL,
  `tbs` float NOT NULL,
  `psa` float NOT NULL,
  `urin` float NOT NULL,
  `stol` float NOT NULL,
  `sre` float NOT NULL,
  `csfre` float NOT NULL,
  `safb` float NOT NULL,
  `abfre` float NOT NULL,
  `bjp` float NOT NULL,
  `urinbs` float NOT NULL,
  `urinbp` float NOT NULL,
  `urobil` float NOT NULL,
  `sob` float NOT NULL,
  `srs` float NOT NULL,
  `usgcpc` float NOT NULL,
  `vsgcpc` float NOT NULL,
  `vst` float NOT NULL,
  `tsh` float NOT NULL,
  `t3` float NOT NULL,
  `t4` float NOT NULL,
  `fsh` float NOT NULL,
  `lh` float NOT NULL,
  `prl` float NOT NULL,
  `testo` float NOT NULL,
  `proges` float NOT NULL,
  `e2` float NOT NULL,
  `gh` float NOT NULL,
  `aus` float NOT NULL,
  `ecg` float NOT NULL,
  `cxr` float NOT NULL,
  `bhcg` float NOT NULL,
  `hba1c` float NOT NULL,
  `urincol` text NOT NULL,
  `urinapea` text NOT NULL,
  `urinof` text NOT NULL,
  `urinwbc` text NOT NULL,
  `urinrbc` text NOT NULL,
  `urinbact` text NOT NULL,
  `uringast` text NOT NULL,
  `urincrys` text NOT NULL,
  `urinyeast` text NOT NULL,
  `urinepith` text NOT NULL,
  `urinpara` text NOT NULL,
  `urinofs` text NOT NULL,
  `urinph` text NOT NULL,
  `urinsg` text NOT NULL,
  `uringluc` text NOT NULL,
  `urinprot` text NOT NULL,
  `urinnitrat` text NOT NULL,
  `urinket` text NOT NULL,
  `urinurob` text NOT NULL,
  `urinbr` text NOT NULL,
  `urinblood` text NOT NULL,
  `urinleuc` text NOT NULL,
  `stolcol` text NOT NULL,
  `stolcons` text NOT NULL,
  `stolblood` text NOT NULL,
  `stolmucus` text NOT NULL,
  `stolpus` text NOT NULL,
  `stolof` text NOT NULL,
  `stolova` text NOT NULL,
  `stolcyst` text NOT NULL,
  `stoltroph` text NOT NULL,
  `stollarv` text NOT NULL,
  `stolrbc` text NOT NULL,
  `stolwbc` text NOT NULL,
  `stolbact` text NOT NULL,
  `stolyeast` text NOT NULL,
  `stolofs` text NOT NULL,
  `stolocultbloodtest` text NOT NULL,
  `stolothtest` text NOT NULL,
  `pandoc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `andoc`
--

INSERT INTO `andoc` (`idexam`, `idan`, `identexam`, `datexam`, `fg`, `rg`, `gtt`, `chol`, `tc`, `hdlc`, `ldlc`, `br`, `sgptalt`, `alkphos`, `brdi`, `sgot`, `cpk`, `ldh`, `urea`, `crea`, `ua`, `na`, `k`, `chlor`, `calc`, `phos`, `alb`, `glob`, `ratio`, `amy`, `cbc`, `cbcwbc`, `cbclymphh`, `cbcmidh`, `cbcgranh`, `cbclymphp`, `cbcmidp`, `cbcgranp`, `cbcrbc`, `cbchgb`, `cbchct`, `cbcmcv`, `cbcmch`, `cbcmchc`, `cbcrdwcv`, `cbcrdwsd`, `cbcplt`, `cbcmpv`, `cbcpdw`, `cbcpct`, `esr`, `hemo`, `mala`, `btct`, `ptaptt`, `rc`, `plat`, `rha`, `abog`, `ctdi`, `rbcm`, `pregt`, `wt`, `raf`, `vdrl`, `tpha`, `hivab`, `hbsag`, `hcvab`, `mant`, `hcgd`, `bruc`, `toxo`, `asot`, `hpa`, `cprpcr`, `anfana`, `tbs`, `psa`, `urin`, `stol`, `sre`, `csfre`, `safb`, `abfre`, `bjp`, `urinbs`, `urinbp`, `urobil`, `sob`, `srs`, `usgcpc`, `vsgcpc`, `vst`, `tsh`, `t3`, `t4`, `fsh`, `lh`, `prl`, `testo`, `proges`, `e2`, `gh`, `aus`, `ecg`, `cxr`, `bhcg`, `hba1c`, `urincol`, `urinapea`, `urinof`, `urinwbc`, `urinrbc`, `urinbact`, `uringast`, `urincrys`, `urinyeast`, `urinepith`, `urinpara`, `urinofs`, `urinph`, `urinsg`, `uringluc`, `urinprot`, `urinnitrat`, `urinket`, `urinurob`, `urinbr`, `urinblood`, `urinleuc`, `stolcol`, `stolcons`, `stolblood`, `stolmucus`, `stolpus`, `stolof`, `stolova`, `stolcyst`, `stoltroph`, `stollarv`, `stolrbc`, `stolwbc`, `stolbact`, `stolyeast`, `stolofs`, `stolocultbloodtest`, `stolothtest`, `pandoc`) VALUES
(1, 5, 5, '15/06/2022', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12),
(2, 5, 5, '15/06/2022', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6),
(3, 5, 5, '15/06/2022', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4),
(4, 5, 5, '15/06/2022', 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 29),
(5, 5, 5, '15/06/2022', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4),
(6, 5, 5, '15/06/2022', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 10),
(7, 5, 5, '15/06/2022', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(8, 3, 3, '15/06/2022', 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6),
(9, 8, 6, '15/06/2022', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `consult`
--

CREATE TABLE `consult` (
  `idcons` int(11) NOT NULL,
  `idpa` int(10) NOT NULL,
  `ante` varchar(100) NOT NULL,
  `motif` varchar(100) NOT NULL,
  `examc` text NOT NULL,
  `diagnostic` varchar(100) NOT NULL,
  `traitement` varchar(100) NOT NULL,
  `examdem` varchar(100) NOT NULL,
  `hist` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  `heurdc` varchar(20) NOT NULL,
  `heurfc` varchar(20) NOT NULL,
  `statcons` varchar(1) NOT NULL,
  `datcons` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consult`
--

INSERT INTO `consult` (`idcons`, `idpa`, `ante`, `motif`, `examc`, `diagnostic`, `traitement`, `examdem`, `hist`, `note`, `heurdc`, `heurfc`, `statcons`, `datcons`) VALUES
(0, 1, '', '', '', '', '', '', '', '', '16:16', '16:16', 'F', '13/06/2022'),
(1, 5, 'HTA', 'Fièvre, Douleur abdominale', '', 'Angine', 'Antiopathie', 'RAS', 'Cool', 'Rien à dire', '14:17', '14:19', 'F', ''),
(2, 3, 'Cholesterole', 'Douleur Dorsale', 'Moi même', '                              Cholestérol : \r\nHDL-chol  : \r\n                            ', 'Paracetamole', 'Rien', 'Ras', 'Pas de problème', '19:31', '19:32', 'F', '15/06/2022'),
(3, 8, '', 'Fièvre', 'RAS', '                              Indices CBC/RBC : \r\n                            ', 'SANS', 'Prélèvement sanguine', 'SANS', 'Parfait état', '20:09', '20:10', 'F', '15/06/2022');

-- --------------------------------------------------------

--
-- Table structure for table `entre`
--

CREATE TABLE `entre` (
  `ident` int(11) NOT NULL,
  `codepatient` int(10) NOT NULL,
  `motif` varchar(100) NOT NULL,
  `num_medecin` int(3) NOT NULL,
  `nom_medecin` varchar(60) NOT NULL,
  `num` int(11) NOT NULL,
  `heura` varchar(20) NOT NULL,
  `heurf` varchar(20) NOT NULL,
  `statut` varchar(1) NOT NULL,
  `datent` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entre`
--

INSERT INTO `entre` (`ident`, `codepatient`, `motif`, `num_medecin`, `nom_medecin`, `num`, `heura`, `heurf`, `statut`, `datent`) VALUES
(1, 1, 'Consultation', 2, 'Yahya Abdi', 1, '01:36', '01:36', 'C', '09/06/2022'),
(2, 2, 'ORL', 1, 'Mahyoub Abdallah', 2, '13:43', '13:43', 'C', '09/06/2022'),
(3, 3, 'Consultation Ophtalmo', 1, 'Mahyoub Abdallah', 3, '23:43', '19:32', 'F', '09/06/2022'),
(4, 4, 'Fievre', 2, 'Yahya Abdi', 1, '12:13', '12:13', 'F', '11/06/2022'),
(5, 5, 'Douleur de dos', 2, 'Yahya Abdi', 2, '17:11', '17:11', 'C', '11/06/2022'),
(6, 8, 'Fièvre', 1, 'Mahyoub Abdallah', 1, '19:59', '20:10', 'F', '15/06/2022');

-- --------------------------------------------------------

--
-- Table structure for table `gastro`
--

CREATE TABLE `gastro` (
  `id_gastro` tinyint(3) UNSIGNED NOT NULL,
  `id_voyageur` tinyint(3) UNSIGNED NOT NULL,
  `ville` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pays` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nb_repas` tinyint(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gastro`
--

INSERT INTO `gastro` (`id_gastro`, `id_voyageur`, `ville`, `pays`, `nb_repas`) VALUES
(1, 1, 'Paris', 'France', 3),
(2, 1, 'Mulhouse', 'France', 2),
(3, 1, 'Luxembourg', 'Luxembourg', 2),
(4, 1, 'Charleroi', 'Belgique', 3),
(5, 2, 'Paris', 'France', 10);

-- --------------------------------------------------------

--
-- Table structure for table `medecin`
--

CREATE TABLE `medecin` (
  `idmed` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `specialite` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medecin`
--

INSERT INTO `medecin` (`idmed`, `nom`, `specialite`, `email`, `tel`) VALUES
(1, 'Mahyoub Abdallah', 'Chirurgien Vasculaire', 'mahyoub@police.dj', '77654321'),
(2, 'Yahya Abdi', 'Biologiste', 'yahya@police.dj', '77653425');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `idp` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `civi` varchar(25) NOT NULL,
  `daten` varchar(25) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(25) NOT NULL,
  `sitfam` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `tel` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dateinsp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`idp`, `nom`, `civi`, `daten`, `age`, `sex`, `sitfam`, `address`, `tel`, `email`, `dateinsp`) VALUES
(1, 'Barkad Abdi', 'M.', '1985-12-23', 36, 'Masculin', 'Marié', 'Hayabley', '77653425', 'moktarsaid@gmail.com', '09/06/2022'),
(2, 'Omar Farah', 'M.', '1989-12-12', 32, 'Féminin', 'Célibataire', 'ksjf', '77663632', 'ksdksjd@gmail.com', '09/06/2022'),
(3, 'Abdillahi Mohamed', 'M.', '2003-01-01', 19, 'Masculin', 'Célibataire', 'Cheikh Moussa', '77663636', 'abdillahi@gmail.com', '09/06/2022'),
(4, 'Abayazid Nour Ayeh', 'M.', '1987-12-16', 34, 'Masculin', 'Marié', 'sdlksmdl', '77666767', 'yayzjdh', '11/06/2022'),
(5, 'Nouradine Houssein Nour', 'M.', '1983-09-14', 38, 'Masculin', 'Marié', 'BERMIGHAM', '77466467', 'nour@gmail.com', '11/06/2022'),
(6, 'Idriss ', 'Mlle', '', 0, 'Féminin', 'SF', '', '', '', '12/06/2022'),
(7, 'Mohamed Daher Hersi', 'M.', '1984-12-12', 37, 'Masculin', 'Marié', 'Hayabley', '77847725', 'moktarsaid@gmail.com', '15/06/2022'),
(8, 'Abdo Ibrahim Guelleh', 'M.', '1988-09-26', 33, 'Masculin', 'Veuf', 'Quartier 6', '77012097', 'kdsldjk@gmail.com', '15/06/2022');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(2) NOT NULL,
  `utilisateur` varchar(30) NOT NULL,
  `motspasse` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `utilisateur`, `motspasse`) VALUES
(1, 'admin', 'admin'),
(2, 'Mahyoub', 'admin'),
(3, 'Deheeye', 'abo1234'),
(4, 'Dr.Buhane', 'Buhaneh2019');

-- --------------------------------------------------------

--
-- Table structure for table `voyageur`
--

CREATE TABLE `voyageur` (
  `id_voyageur` tinyint(3) UNSIGNED NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date_deb` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date_fin` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voyageur`
--

INSERT INTO `voyageur` (`id_voyageur`, `prenom`, `nom`, `date_deb`, `date_fin`) VALUES
(1, 'Paul', 'Durant', '04/09/19', '24/09/19'),
(2, 'Armelle', 'Dupont', '04/09/19', '24/09/19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `andoc`
--
ALTER TABLE `andoc`
  ADD PRIMARY KEY (`idexam`);

--
-- Indexes for table `consult`
--
ALTER TABLE `consult`
  ADD PRIMARY KEY (`idcons`);

--
-- Indexes for table `entre`
--
ALTER TABLE `entre`
  ADD PRIMARY KEY (`ident`);

--
-- Indexes for table `gastro`
--
ALTER TABLE `gastro`
  ADD PRIMARY KEY (`id_gastro`);

--
-- Indexes for table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`idmed`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idp`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voyageur`
--
ALTER TABLE `voyageur`
  ADD PRIMARY KEY (`id_voyageur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gastro`
--
ALTER TABLE `gastro`
  MODIFY `id_gastro` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `idmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `voyageur`
--
ALTER TABLE `voyageur`
  MODIFY `id_voyageur` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
