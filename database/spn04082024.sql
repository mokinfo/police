-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2024 at 11:02 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
-- Table structure for table `acte`
--

CREATE TABLE `acte` (
  `id` varchar(10) NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `prix_struct` int(10) NOT NULL,
  `prix_cnss` int(10) NOT NULL,
  `prix_diff` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acte`
--

INSERT INTO `acte` (`id`, `libelle`, `prix_struct`, `prix_cnss`, `prix_diff`) VALUES
('10B', 'AG (anesthésie générale avec intubation)', 11500, 10000, 1500),
('10C', 'AR (anesthésie régionale ou locorégionale)', 11500, 10000, 1500),
('10D', 'AS (anesthésie par sédation sans intubation)', 11500, 10000, 1500),
('10E', 'AL (anesthésie locale)', 11500, 10000, 1500),
('10F', 'RM (réanimation d’indication médicale)', 9200, 8000, 1200),
('10G', 'RC (réanimation d’indication chirurgicale)', 9200, 8000, 1200),
('10H', 'HVC (hémodialyse par voie centrale)', 5750, 5000, 750),
('10I', 'HVF (hémodialyse par voie fistule artério-veineuse)', 5750, 5000, 750),
('10J', 'HIP (hémodialyse intra-péritonéale)', 5750, 5000, 750),
('13D', 'Césarienne sous AG', 60000, 20000, 40000),
('13E', 'Césarienne sous Anesthésie loco-regionale', 50000, 18000, 22000),
('13F', 'Hystérectomie voie basse', 50000, 10000, 40000),
('13G', 'Hystérectomie voie basse', 13000, 10000, 3000),
('14G', 'Hystérectomie voie haute', 13000, 10000, 3000),
('15G', 'Laparotomie sous coelioscopie', 13000, 10000, 3000),
('16G', 'Curetage biopsique ou hémorragique', 13000, 10000, 3000),
('17G', 'Incision d\'abcès du sein', 13000, 10000, 3000),
('18G', 'Incision de nodule du sein', 13000, 10000, 3000),
('19G', 'Cerclage du col', 13000, 10000, 3000),
('1A', 'Généraliste', 3000, 1500, 1500),
('1B', 'Spécialiste', 5000, 3000, 2000),
('1C', 'Sage-femme (consultation pré-natale)', 1500, 1000, 500),
('1D', 'IDE (Triage, dépistage)', 1500, 1000, 500),
('1E', 'Technicien supérieur (psychiatrie, counseling, nutritionniste)', 2250, 1500, 750),
('1F', 'Aide-infirmier', 750, 500, 250),
('1G', 'Aide-soignant', 750, 500, 250),
('20G', 'Colporraphie', 5000, 0, 5000),
('21G', 'Cure de fistule vésicale et rectale', 13000, 10000, 3000),
('22G', 'Périno-plastie', 13000, 10000, 3000),
('2A1A', 'Incidences fondamentales : face, profil, menton-film, Hirtz, Worms', 1500, 1000, 500),
('2A1B', 'Maxillaire défilé', 1500, 1000, 500),
('2A1C', 'Os propres du nez', 1500, 1000, 500),
('2A1D', 'Dent par technique intra buccale, film occlusal ou rétro-alvéolaire', 1500, 1000, 500),
('2A1E', 'Articulation Temporo-Maxillaire 1 ou 2 cotés', 1500, 1000, 500),
('2A1F', 'Incidence du Cavum', 1500, 1000, 500),
('2A1G', 'Larynx F + P', 1500, 1000, 500),
('2A2A', 'Gril costal', 1500, 1000, 500),
('2A2B', 'Poumon Face', 1500, 1000, 500),
('2A2C', 'Poumon Profil', 1500, 1000, 500),
('2A2D', 'Sternum', 1500, 1000, 500),
('2A2E', 'Articulation sterno-claviculaire ', 1500, 1000, 500),
('2A2F', 'Articulation scapulo-humérale', 1500, 1000, 500),
('2A3A', 'Charnière cervico-occipitale F + P', 1500, 1000, 500),
('2A3B', 'Rachis Cervical F + P et/ou 3/4', 1500, 1000, 500),
('2A3C', 'Rachis Dorsal F + P', 1500, 1000, 500),
('2A3D', 'Rachis Lombaire F + P et/ou 3/4', 1500, 1000, 500),
('2A3E', 'Sacrum F + P', 1500, 1000, 500),
('2A3F', 'Rachis entier Enfant', 1500, 1000, 500),
('2A3G', 'Rachis entier Adulte', 1500, 1000, 500),
('2A4A', 'Epaule F+P', 1500, 1000, 500),
('2A4B', 'Clavicule', 1500, 1000, 500),
('2A4C', 'Omoplate F+P', 1500, 1000, 500),
('2A4D', 'Humérus F+P', 1500, 1000, 500),
('2A4E', 'Coude F+P', 1500, 1000, 500),
('2A4F', 'Avant-bras F+P', 1500, 1000, 500),
('2A4G', 'Poignet F+P', 1500, 1000, 500),
('2A4H', 'Main F+P', 1500, 1000, 500),
('2A4I', 'Doigt F+P', 1500, 1000, 500),
('2A4J', 'Scaphoïde', 1500, 1000, 500),
('2A5A', 'Bassin Face et 3/4', 1500, 1000, 500),
('2A5B', 'Sacro-iliaques face', 1500, 1000, 500),
('2A5C', 'Hanche F+P et 3/4', 1500, 1000, 500),
('2A5D', 'Fémur F+P', 1500, 1000, 500),
('2A5E', 'Genou F+P', 1500, 1000, 500),
('2A5F', 'Jambe F+P', 1500, 1000, 500),
('2A5G', 'Pied F+P', 1500, 1000, 500),
('2A5H', 'Talon F+P', 1500, 1000, 500),
('2A5I', 'Cheville F+P', 1500, 1000, 500),
('2A5J', 'Orteil', 1500, 1000, 500),
('2A5K', 'Radiomensuration comparative des membres', 1500, 1000, 500),
('2A6A', 'Abdomen sans préparation', 1500, 1000, 500),
('2A6B', 'Arbre urinaire sans préparation', 1500, 1000, 500),
('2A6C', 'Mammographie uni ou bilatérale', 1500, 1000, 500),
('2A6D', 'Radiopelvimétrie', 1500, 1000, 500),
('2A6E', 'Age osseux', 1500, 1000, 500),
('2A6F', 'Ostéodensitometrie', 1500, 1000, 500),
('2A6G', 'Squelette entier', 1500, 1000, 500),
('2C10A', 'Paroi abdominale (antérieure, latérale et lombaire)', 5000, 4000, 1000),
('2C10B', 'Viscères ou Organes intra abdominaux', 5000, 4000, 1000),
('2C10C', 'Doppler-vasculaire Porte-Aorto-Cave', 5000, 4000, 1000),
('2C11A', 'Rein', 5000, 4000, 1000),
('2C11B', 'Vessie', 5000, 4000, 1000),
('2C11C', 'Prostate', 5000, 4000, 1000),
('2C11D', 'Vésicule séminale', 5000, 4000, 1000),
('2C11E', 'Testicule et Scrotum', 5000, 4000, 1000),
('2C11F', 'Périnée', 5000, 4000, 1000),
('2C11G', 'Trans-Anale', 5000, 4000, 1000),
('2C12A', 'Mammaire', 5000, 4000, 1000),
('2C12B', 'Pelvienne', 5000, 4000, 1000),
('2C12C', 'Trans-Vaginale', 5000, 4000, 1000),
('2C12D', 'Echo du 1er trimestre', 5000, 4000, 1000),
('2C12E', 'Echo du 2e trimestre', 5000, 4000, 1000),
('2C12F', 'Echo du 3e trimestre', 5000, 4000, 1000),
('2C13A', 'Echographie cardiaque adulte ou pédiatrique', 5000, 4000, 1000),
('2C13B', 'Echographie Vasculaire périphérique', 5000, 4000, 1000),
('2C13C', 'Echographie Trans-Oesophagienne', 5000, 4000, 1000),
('2C13D', 'Echographie de stress sous dobutamine', 5000, 4000, 1000),
('2C1A', 'Trans-Fontanelles', 5000, 4000, 1000),
('2C1B', 'Temporo-Oculaire', 5000, 4000, 1000),
('2C1C', 'Cervicale Antérieur et Latérale ou Postérieure', 5000, 4000, 1000),
('2C1D', 'Sus-claviculaire', 5000, 4000, 1000),
('2C9A', 'Pectorale', 5000, 4000, 1000),
('2C9B', 'Creux axillaire', 5000, 4000, 1000),
('2C9C', 'Latéro-thoracique', 5000, 4000, 1000),
('2C9D', 'Dorsolombaire', 5000, 4000, 1000),
('2C9E', 'Glutéale ou fessière ', 5000, 4000, 1000),
('2C9F', 'Membre supérieur', 5000, 4000, 1000),
('2C9G', 'Membre inférieur', 5000, 4000, 1000),
('4A', 'Respiratoire (EFR, spiromètrie)', 1000, 800, 200),
('4B', 'Digestive (PH-mètrie, manométries)', 1000, 800, 200),
('4C1', 'ECG', 5000, 4000, 1000),
('4C2', 'Epreuve d’effort', 5000, 4000, 1000),
('4D', 'Vasculaire ', 3750, 3000, 750),
('4E', 'Neurologique (EMG, EEG)', 3750, 3000, 750),
('4F', 'Sensorielle (potentiels évoqués, audiométrie)', 3750, 3000, 750),
('4G', 'Ophtalmologique (optométrie, campimétrie)', 3750, 3000, 750),
('4H', 'Allergologique (test allergologique, désenbilisation)', 3750, 3000, 750),
('4I', 'Urodynamique (débitmètrie, manométrie)', 3750, 3000, 750),
('4J', 'Tests mentaux et psychologiques', 3750, 3000, 750),
('5A', 'Oesogastroscopie', 5000, 4000, 1000),
('5B', 'Anorectosigmoidoscopie rigide', 5000, 4000, 1000),
('5C', 'Colonoscopie', 5000, 4000, 1000),
('5D', 'Otoscopie', 5000, 4000, 1000),
('5E', 'Rhinoscopie', 5000, 4000, 1000),
('5F', 'Capillaroscopie', 5000, 4000, 1000),
('5FF', 'Laryngoscopie', 5000, 4000, 1000),
('5G', 'Urethrocystoscopie', 5000, 4000, 1000),
('5H', 'Colpohysteroscopie', 5000, 4000, 1000),
('6A', 'Soins locaux ou pansements simples', 600, 400, 200),
('6AA', 'Vaccination (SAT)', 150, 100, 50),
('6B', 'Soins locaux ou pansements spécialisés', 900, 600, 300),
('6C', 'Nursing de soins infirmiers (hygiène, surveillance et entretien)', 750, 500, 250),
('6D', 'Injections', 300, 200, 100),
('6E', 'Infiltrations', 300, 200, 100),
('6F', 'Perfusion', 1800, 1200, 600),
('6G', 'Ponction ou drainage (articulaire, lombaire, pleurale, péritonéale) ', 1500, 1000, 500),
('6H', 'Péricardique', 1500, 1000, 500),
('6I', 'Suture et ablation de points de suture', 1200, 800, 400),
('6J', 'Incision, excision, résection, ablation', 600, 400, 200),
('6K', 'Circoncision', 4500, 3000, 1500),
('6L', 'Sondage urinaire', 1500, 1000, 500),
('6M', 'Sondage nasogastrique ', 1500, 1000, 500),
('6N', 'Prélèvements sanguins', 750, 500, 250),
('6O', 'Lavage gastrique', 750, 500, 250),
('6P', 'Lavage colique', 750, 500, 250),
('6Q', 'Lavage vésical', 750, 500, 250),
('6R', 'Plâtre ou attèle Plâtrée', 1200, 800, 400),
('6S', 'Traction trans-osseuse ou collée ', 1500, 1000, 500),
('6T', 'Chimiothérapie', 1500, 1000, 500),
('6U', 'Radiothérapie', 1500, 1000, 500),
('6V', 'Oxygénothérapie hyperbare', 1500, 1000, 500),
('6W', 'Psychothérapie', 3000, 2000, 1000),
('6X', 'Attèle simple, collier cervical ou minerve', 750, 500, 250),
('6Y', 'Corset plâtré', 750, 500, 250),
('6Z', 'Aérosol', 300, 200, 100),
('C10A1', 'Réduction minerve plâtrée ', 19500, 15000, 4500),
('C10A2', 'Ostéosynthèse interne', 52000, 40000, 12000),
('C10A3', 'Greffe osseuse', 39000, 30000, 9000),
('C10A4', 'Traction sur étrier', 19500, 15000, 4500),
('C10B1', 'Réduction et/ou plâtre', 19500, 15000, 4500),
('C10B2', 'Ostéosynthèse externe', 19500, 15000, 4500),
('C10B3', 'Ostéosynthèse interne', 19500, 15000, 4500),
('C10B4', 'Greffe osseuse', 39000, 30000, 9000),
('C10B5', 'Strapping ou Bangade', 19500, 15000, 4500),
('C10C1', 'Réduction et/ou plâtre', 19500, 15000, 4500),
('C10C2', 'Ostéosynthèse externe', 19500, 15000, 4500),
('C10C3', 'Ostéosynthèse interne', 19500, 15000, 4500),
('C10C4', 'Greffe osseuse', 39000, 30000, 9000),
('C10C5', 'Traction trans-olécranienne', 19500, 15000, 4500),
('C10D1', 'Réduction et/ou plâtre', 19500, 15000, 4500),
('C10D2', 'Ostéosynthèse externe', 19500, 15000, 4500),
('C10D3', 'Ostéosynthèse interne', 19500, 15000, 4500),
('C10D4', 'Greffe osseuse', 39000, 30000, 9000),
('C10E1', 'Réduction et/ou plâtre', 19500, 15000, 4500),
('C10E2', 'Ostéosynthèse externe', 19500, 15000, 4500),
('C10E3', 'Ostéosynthèse interne', 19500, 15000, 4500),
('C10E4', 'Strapping ou Bandage', 39000, 30000, 9000),
('C10F1', 'Réduction et/ou corset plâtré', 19500, 15000, 4500),
('C10F2', 'Ostéosynthèse interne', 19500, 15000, 4500),
('C10G1', 'Réduction', 19500, 15000, 4500),
('C10G2', 'Ostéosynthèse externe', 19500, 15000, 4500),
('C10G3', 'Ostéosynthèse interne', 19500, 15000, 4500),
('C10G4', 'Prélèvement de greffe osseuse', 39000, 30000, 9000),
('C10H1', 'Réduction et/ou plâtre', 19500, 15000, 4500),
('C10H2', 'Ostéosynthèse externe', 19500, 15000, 4500),
('C10H3', 'Ostéosynthèse interne', 19500, 15000, 4500),
('C10H4', 'Traction trans-condylienne', 39000, 30000, 9000),
('C10H5', 'Greffe osseuse', 39000, 30000, 9000),
('C10H6', 'Prothèse (Moore)', 39000, 30000, 9000),
('C10H7', 'Ostéotomie', 39000, 30000, 9000),
('C10I1', 'Réduction et/ou plâtre', 19500, 15000, 4500),
('C10I2', 'Ostéosynthèse externe', 19500, 15000, 4500),
('C10I3', 'Ostéosynthèse interne', 19500, 15000, 4500),
('C10I4', 'Traction trans-tibiale', 39000, 30000, 9000),
('C10I5', 'Greffe et prélèvement osseux', 39000, 30000, 9000),
('C10I6', 'Prothèse plateau tibial', 39000, 30000, 9000),
('C10I7', 'Ostéotomie', 39000, 30000, 9000),
('C10J1', 'Réduction et/ou plâtre', 19500, 15000, 4500),
('C10J2', 'Ostéosynthèse externe', 19500, 15000, 4500),
('C10J3', 'Ostéosynthèse interne', 19500, 15000, 4500),
('C10J4', 'Traction trans-calcanéenne', 39000, 30000, 9000),
('C10K1', 'Ténotomie', 19500, 15000, 4500),
('C10K2', 'Suture', 19500, 15000, 4500),
('C10K3', 'Réinsertion', 19500, 15000, 4500),
('C10M1', 'Epaule', 19500, 15000, 4500),
('C10M2', 'Coude', 19500, 15000, 4500),
('C10M3', 'Poignet', 19500, 15000, 4500),
('C10M4', 'Hanche', 19500, 15000, 4500),
('C10M5', 'Genou', 19500, 15000, 4500),
('C10M6', 'Cheville', 19500, 15000, 4500),
('C10M7', 'Métatarsophalanges', 19500, 15000, 4500),
('C11B1', 'Biopsie rénale', 39000, 30000, 9000),
('C11B10', 'Pyélostomie', 52000, 40000, 12000),
('C11B11', 'Pyelotomie et/ou pyéloplastie ', 52000, 40000, 12000),
('C11B12', 'Pyélolithotomie', 52000, 40000, 12000),
('C11B2', 'Ponction ou Drainage d’une collection rénale ou péri-néphrétique', 39000, 30000, 9000),
('C11B3', 'Lombotomie exploratrice en chirurgie réglée', 39000, 30000, 9000),
('C11B4', 'Néphropexie', 52000, 40000, 12000),
('C11B5', 'Néphrostomie ', 39000, 30000, 9000),
('C11B6', 'Néphrectomie partielle ', 52000, 40000, 12000),
('C11B7', 'Néphrotomie d’un rein en Fer a cheval', 52000, 40000, 12000),
('C11B8', 'Néphrolithotomie', 52000, 40000, 12000),
('C11B9', 'Néphrectomie totale pour cancer', 52000, 40000, 12000),
('C11C1', 'Urétérostomie cutanée', 39000, 30000, 9000),
('C11C2', 'Urétèrolyse ', 39000, 30000, 9000),
('C11C3', 'Urétérotomie pelvienne', 39000, 30000, 9000),
('C11C4', 'Urétérectomie secondaire totale', 39000, 30000, 9000),
('C11C5', 'Urétéro-lithotomie par lombotomie', 52000, 40000, 12000),
('C11C6', 'Abouchement d\'un uretère dans l\'intestin ', 52000, 40000, 12000),
('C11C7', 'Chirurgie du reflux vésico-urétérale', 52000, 40000, 12000),
('C11D1', 'Cystostomie sus pubienne', 19500, 15000, 4500),
('C11D10', 'Chirurgie de la cystocèle', 52000, 40000, 12000),
('C11D11', 'Chirurgie du kyste et fistule de l’ouraque', 39000, 30000, 9000),
('C11D12', 'Chirurgie de l’incontinence', 52000, 40000, 12000),
('C11D2', 'Cystectomie partielle ou totale', 52000, 40000, 12000),
('C11D3', 'Chirurgie de la lithiase vésicale', 39000, 30000, 9000),
('C11D4', 'Cystoplastie d’agrandissement ', 52000, 40000, 12000),
('C11D5', 'Résection ou cautérisation d’une tumeur intra vésicale', 39000, 30000, 9000),
('C11D6', 'Enterocystoplastie de remplacement', 52000, 40000, 12000),
('C11D7', 'Chirurgie du diverticule de vessie', 52000, 40000, 12000),
('C11D8', 'Chirurgie de la sténose du col de la vessie', 39000, 30000, 9000),
('C11D9', 'Chirurgie de la fistule vésico-vaginale et vésico-utérine', 52000, 40000, 12000),
('C11E1', 'Circoncision', 3900, 3000, 900),
('C11E10', 'Urétrotomie interne ou externe', 39000, 30000, 9000),
('C11E11', 'Urétroplastie', 39000, 30000, 9000),
('C11E12', 'Abcès, Phlegmon et Suppurations urétrales ', 39000, 30000, 9000),
('C11E2', 'Phimosis et paraphimosis', 19500, 15000, 4500),
('C11E3', 'Hypospadias', 52000, 40000, 12000),
('C11E4', 'Epispadias', 52000, 40000, 12000),
('C11E5', 'Coudure et fracture de verge', 52000, 40000, 12000),
('C11E6', 'Chirurgie du priapisme', 39000, 30000, 9000),
('C11E7', 'Amputation partielle ou totale', 52000, 40000, 12000),
('C11E8', 'Méatotomie et Méatostomie', 39000, 30000, 9000),
('C11E9', 'Dilatation urétrale au beniquet', 39000, 30000, 9000),
('C11F1', 'Ponction biopsie de la prostate', 39000, 30000, 9000),
('C11F2', 'Prostatectomie pour cancer', 52000, 40000, 12000),
('C11F3', 'Incision d\'un abcès de la prostate par voie périnéale', 52000, 40000, 12000),
('C11F4', 'Ablation des vésicules séminales chez l\'adulte', 52000, 40000, 12000),
('C11G1', 'Biopsie testiculaire', 39000, 30000, 9000),
('C11G2', 'Chirurgie du cordon spermatique (kyste, nodule, torsion, épididymite)', 39000, 30000, 9000),
('C11G3', 'Chirurgie du canal défèrent', 39000, 30000, 9000),
('C11G4', 'Cure d’hydrocèle', 39000, 30000, 9000),
('C11G5', 'Orchidectomie unilatérale ou castration', 39000, 30000, 9000),
('C11G6', 'Orchidopexie', 39000, 30000, 9000),
('C11G7', 'Pose ou ablation de prothèse testiculaire', 39000, 30000, 9000),
('C1B1', 'Ponction péricardique', 25000, 5000, 20000),
('C1B3', 'Péricardectomie', 52000, 40000, 12000),
('C1C1', 'Ponction artérielle', 6500, 5000, 1500),
('C1C2', 'Injection intra-artérielle', 3900, 3000, 900),
('C1C3', 'Abord vasculaire pour dialyse', 5850, 4500, 1350),
('C1C4', 'Suture et/ou ligature', 1950, 1500, 450),
('C1C5', 'Dénudation veineuse', 13000, 10000, 3000),
('C1C6', 'Chirurgie des anévrysmes artériels', 39000, 30000, 9000),
('C1C7', 'Chirurgie de la maladie thromboembolique veineuse et artérielle', 19500, 15000, 4500),
('C2A1', 'Exérèse Tumeur bénigne de l’œsophage', 19500, 15000, 4500),
('C2A2', 'Exérèse diverticule oesophagien', 19500, 15000, 4500),
('C2A3', 'Oesophagectomie partielle ou totale pour cancer', 52000, 40000, 12000),
('C2A4', 'Cure de Hernie Hiatale', 52000, 40000, 12000),
('C2A5', 'Cure de Megaoesophage', 52000, 40000, 12000),
('C2A6', 'Cure de Perforation de l’œsophage', 52000, 40000, 12000),
('C2A7', 'Oesophago-coloplastie ', 52000, 40000, 12000),
('C2B1', 'Vagotomie tronculaire ou sélective', 19500, 15000, 4500),
('C2B2', 'Gastrectomie partielle ou totale pour lésion bénigne ', 52000, 40000, 12000),
('C2B3', 'Gastrectomie partielle ou totale pour cancer', 52000, 40000, 12000),
('C2B4', 'Gastrostomie d’alimentation', 19500, 15000, 4500),
('C2B5', 'Gastro-Entero-Anastomose', 39000, 30000, 9000),
('C2B6', 'Pyloroplastie pour sténose ulcéreuse  ', 52000, 40000, 12000),
('C2C1', 'Résection duodénale', 52000, 40000, 12000),
('C2C2', 'Chirurgie transduodénale de la papille et de l’ampoule de Water', 52000, 40000, 12000),
('C2C3', 'Dérivation biliodigestive duodénale ou jéjunale', 52000, 40000, 12000),
('C2C4', 'Chirurgie du diverticule de Meckel', 52000, 40000, 12000),
('C2C5', 'Résection iléo-jéjunale ', 52000, 40000, 12000),
('C2D1', 'Appendicectomie simple par Laparotomie', 19500, 15000, 4500),
('C2D10', 'Détorsion colique par laparotomie ou laparoscopie sans résection ', 52000, 40000, 12000),
('C2D2', 'Appendicectomie simple par Laparoscopie ', 19500, 15000, 4500),
('C2D3', 'Colostomie de décharge ou de dérivation', 52000, 40000, 12000),
('C2D4', 'Colectomie par Laparotomie pour lésion bénigne', 52000, 40000, 12000),
('C2D5', 'Colectomie par Laparoscopie pour lésion bénigne', 52000, 40000, 12000),
('C2D6', 'Colectomie par Laparotomie pour cancer', 52000, 40000, 12000),
('C2D7', 'Colectomie par Laparoscopie pour cancer', 52000, 40000, 12000),
('C2D8', 'Rétablissement de la continuité colique', 52000, 40000, 12000),
('C2D9', 'Dérivation colique interne ou détorsion colique', 52000, 40000, 12000),
('C2E1', 'Chirurgie des hémorroïdes', 19500, 15000, 4500),
('C2E2', 'Chirurgie de la fissure anale', 19500, 15000, 4500),
('C2E3', 'Chirurgie de la fistule anale', 19500, 15000, 4500),
('C2E4', 'Chirurgie des suppurations ano-périnéales chroniques ', 19500, 15000, 4500),
('C2E5', 'Anoplastie et/ou proctoplastie', 19500, 15000, 4500),
('C2E6', 'Chirurgie du rectocèle par voie basse ou haute', 52000, 40000, 12000),
('C2E7', 'Chirurgie des cancers ano-rectaux avec conservation sphinctérienne', 52000, 40000, 12000),
('C2E8', 'Chirurgie des cancers ano-rectaux sans conservation sphinctérienne', 52000, 40000, 12000),
('C2E9', 'Amputation abdomino-périnéale', 52000, 40000, 12000),
('C2F1', 'Ponction-biopsie du foie', 3900, 3000, 900),
('C2F10', 'Choledocotomie pour lithiase de la voie biliaire principale', 39000, 30000, 9000),
('C2F11', 'Chirurgie des Voies Biliaires hors lithiase', 39000, 30000, 9000),
('C2F2', 'Drainage biliaire transhépatique percutané', 10400, 8000, 2400),
('C2F3', 'Drainage d’un abcès du foie', 10400, 8000, 2400),
('C2F4', 'Traitement Chirurgical du kyste hydatique ', 39000, 30000, 9000),
('C2F5', 'Hépatectomie segmentaire ou lobaire', 52000, 40000, 12000),
('C2F6', 'Hépatectomie étendue, complexes ou multiples', 52000, 40000, 12000),
('C2F7', 'Dérivations porto-caves', 52000, 40000, 12000),
('C2F8', 'Cholécystectomie par laparotomie', 39000, 30000, 9000),
('C2F9', 'Cholécystectomie par laparoscopie', 52000, 40000, 12000),
('C2G1', 'Cholangiopancréatographie rétrograde par sphincterotomie per opératoire', 52000, 40000, 12000),
('C2G2', 'Traitement chirurgicale des pancréatites ', 52000, 40000, 12000),
('C2G3', 'Traitement chirurgical des kyste et faux kyste du pancréas', 52000, 40000, 12000),
('C2G4', 'Pancréatectomie partielle ou splénopancréatectomie caudale', 52000, 40000, 12000),
('C2G5', 'Duodénopancréatectomie céphalique pour cancer', 52000, 40000, 12000),
('C2G6', 'Splanchnectomie', 39000, 30000, 9000),
('C2G7', 'Splénectomie totale ou partielle par laparotomie ou laparoscopie', 52000, 40000, 12000),
('C2H1', 'Chirurgie des hernies de l’aine, de l’ombilic, de la ligne blanche et éventrations', 19500, 15000, 4500),
('C2H2', 'Chirurgie par mèche ou plaque des hernies et éventrations ', 19500, 15000, 4500),
('C2H3', 'Traitement chirurgical des collections liquidiennes péritonéales', 19500, 15000, 4500),
('C2H4', 'Laparotomie exploratrice en chirurgie programmée', 19500, 15000, 4500),
('C2H5', 'Drainage percutané d\'une collection cloisonnée ou non intra ou rétro -péritonéale', 19500, 15000, 4500),
('C4A1', 'Trépanation pour hématome, abcès ou empyème', 19500, 15000, 4500),
('C4A2', 'Volet crânien de décompression', 19500, 15000, 4500),
('C4A3', 'Chirurgie des embarrures', 19500, 15000, 4500),
('C4A4', 'Cranioplastie par greffe ou prothèse', 19500, 15000, 4500),
('C4A5', 'Biopsie-exérèse d’une masse cuir chevelu ou du crane', 19500, 15000, 4500),
('C4A6', 'Chirurgie des craniosténoses', 19500, 15000, 4500),
('C4B1', 'Exérèse d’une tumeur des méninges ', 19500, 15000, 4500),
('C4B2', 'Traitement d’une fistule post-traumatique du LCR', 19500, 15000, 4500),
('C4B3', 'Dérivation ventriculaire (externe, -atriale, -péritonéale)', 19500, 15000, 4500),
('C4B4', 'Ventriculo-cisternostomie', 52000, 40000, 12000),
('C4B5', 'Chirurgie du méningocele et myéloméningocele', 52000, 40000, 12000),
('C4B6', 'Myélotomie ou Cordotomie', 19500, 15000, 4500),
('C4C1', 'Exérèse d’une tumeur du parenchyme cérébral', 39000, 30000, 9000),
('C4C2', 'Chirurgie d’anévrysme artério-veineux', 19500, 15000, 4500),
('C4C3', 'Traitement d’une plaie cranio-cérébrale', 19500, 15000, 4500),
('C4C4', 'Chirurgie des méningo-encéphales', 39000, 30000, 9000),
('C4C5', 'Chirurgie stéréotaxique', 39000, 30000, 9000),
('C4C6', 'Hémisphérectomie', 52000, 40000, 12000),
('C4C7', 'Chirurgie de l’épilepsie', 39000, 30000, 9000),
('C4E1', 'Chirurgie de la névralgie faciale', 19500, 15000, 4500),
('C4E2', 'Chirurgie et greffe de nerf crânien', 19500, 15000, 4500),
('C5A', 'Extractions', 19500, 15000, 4500),
('C5B', 'Dentinite', 19500, 15000, 4500),
('C5C', 'Pulpite', 19500, 15000, 4500),
('C5D', 'Gangrène', 19500, 15000, 4500),
('C5E', 'Détartrage', 19500, 15000, 4500),
('C5F', 'Petite Chirurgie ', 19500, 15000, 4500),
('C5G', 'Ligature', 19500, 15000, 4500),
('C5H', 'Restauration coronaire', 19500, 15000, 4500),
('C5I', 'O.D.F', 19500, 15000, 4500),
('C5J', 'Prothèse', 19500, 15000, 4500),
('C6A1', 'Réfection palpébrale traumatique, tumorale ou neurologique', 39000, 30000, 9000),
('C6A10', 'Exploration, désobstruction des voies lacrinales', 39000, 30000, 9000),
('C6A11', 'Insertion intra orbitaire de tissue adipeux(pour remplissage)', 39000, 30000, 9000),
('C6A2', 'Chirurgie du ptôsis et lagophtalmie', 39000, 30000, 9000),
('C6A3', 'Chirurgie du chalazion, kyste palpébral', 39000, 30000, 9000),
('C6A4', 'Chirurgie de l’entropion, ectropion', 39000, 30000, 9000),
('C6A5', 'Chirurgie du xanthélasma et du trichiasis', 39000, 30000, 9000),
('C6A6', 'Extraction d’un corps étranger de l’orbite', 39000, 30000, 9000),
('C6A7', 'Orbitotomie, énucléation, exentération, éviscération', 39000, 30000, 9000),
('C6A8', 'Chirurgie des muscles oculomoteurs (strabologie)', 39000, 30000, 9000),
('C6A9', 'Insertion d’une sphère pour prothèse ', 39000, 30000, 9000),
('C6B1', 'Cathétérisme des voies lacrymales sous anesthésie locale', 39000, 30000, 9000),
('C6B2', 'Cathétérisme avec mise en place d’une sonde canaliculo-nasale', 39000, 30000, 9000),
('C6B3', 'Réparation du canal lacrymo-nasal', 39000, 30000, 9000),
('C6B4', 'Exérèse de la glande ou sac lacrymal', 39000, 30000, 9000),
('C6B5', 'Drainage, Incision, Fermeture, biopsie du canal lacrymal', 39000, 30000, 9000),
('C6B6', 'Extraction d’un corps étranger des voies lacrymales', 39000, 30000, 9000),
('C6C1', 'Ablation de pterygium,pingueculum', 39000, 30000, 9000),
('C6C2', 'Conjonctival flap (rideau conjonctival)', 39000, 30000, 9000),
('C6C3', 'Réparation de symblepharon, Keratomalacie', 39000, 30000, 9000),
('C6C4', 'Tumeurs conjonctivaux', 39000, 30000, 9000),
('C6C5', 'Suture de lacération conjonctivale', 39000, 30000, 9000),
('C6D1A', 'Biopsie de la cornée', 39000, 30000, 9000),
('C6D1B', 'Frottis de la cornée', 39000, 30000, 9000),
('C6D1C', 'Exérèse de tumeur du limbe', 39000, 30000, 9000),
('C6D1D', 'Réparation/suture d’une plaie cornéenne', 39000, 30000, 9000),
('C6D1E', 'Ablation des fils', 39000, 30000, 9000),
('C6D1F', 'Kératoplastie (lamellaire, transfixiante) greffe de cornée', 39000, 30000, 9000),
('C6D2A', 'Capsulotomie', 39000, 30000, 9000),
('C6D2B', 'Extraction intracapsulaire ou extracapsulaire sans implantation', 39000, 30000, 9000),
('C6D2C', 'Extraction intracapsulaire ou extracapsulaire avec implantation chambre antérieure/chambre postérieure', 39000, 30000, 9000),
('C6D2D', 'Extraction par Phacoemulsification sans implantation ', 39000, 30000, 9000),
('C6D2E', 'Extraction par Phacoemulsification avec implantation ', 39000, 30000, 9000),
('C6D2F', 'Phacophagie', 39000, 30000, 9000),
('C6D2G', 'Extraction de cristallin luxé, subluxé ou ectopique', 39000, 30000, 9000),
('C6D2H', 'Ablation d’implant, explantation avec réimplantation', 39000, 30000, 9000),
('C6D3A', 'Iridectomie ou iridoplastie, sphincteroctomie', 39000, 30000, 9000),
('C6D3B', 'Photocoagulation de l’iris', 39000, 30000, 9000),
('C6D3C', 'Cure de hernie iridienne et/ou du vitré', 39000, 30000, 9000),
('C6D3D', 'Libération des synéchies ou des brides', 39000, 30000, 9000),
('C6D5A', 'Lavage Chambre Antérieure', 39000, 30000, 9000),
('C6D5B', 'Paracentèse et prélèvement pour analyse', 39000, 30000, 9000),
('C6E1A', 'Cryothérapie trans-sclérale', 39000, 30000, 9000),
('C6E1B', 'Implantation sclérale de matériel', 39000, 30000, 9000),
('C6E1C', 'Réparation d’un staphylome', 39000, 30000, 9000),
('C6E1D', 'Réparation d’une rupture du globe et suture sclérale', 39000, 30000, 9000),
('C6E3A', 'Traitement du décollement et Déchirement rétinien', 39000, 30000, 9000),
('C6E3B', 'Cryo-application rétinienne pour ischémie ou lésions', 39000, 30000, 9000),
('C6E3C', 'Laserothérapie des rétinopathies variées', 39000, 30000, 9000),
('C6E4A', 'Vitrectomie', 39000, 30000, 9000),
('C6E4B', 'Section de brides vitréennes', 39000, 30000, 9000),
('C6E4C', 'Remplacement du corps vitré par gaz, liquide physiologique BSS et silicone', 39000, 30000, 9000),
('C6F1', 'Chirurgie esthétique du strabisme', 39000, 30000, 9000),
('C6F2', 'Chirurgie du nystagmus', 39000, 30000, 9000),
('C6F3', 'Chirurgie des paralysies oculomotrices', 39000, 30000, 9000),
('C6F4', 'Chirurgie des rétractions oculomotrices', 39000, 30000, 9000),
('C6F5', 'Chirurgie des troubles de la réfraction Kératotomie périphérique et LAZIK', 39000, 30000, 9000),
('C6G1', 'Prise/Mesure de l’A-V', 39000, 30000, 9000),
('C6G2', 'Correction de l’A-V', 39000, 30000, 9000),
('C6G3', 'Prise en charge de la basse vision et de la malvoyance', 39000, 30000, 9000),
('C6H1', 'Corps étrangers du segment antérieur', 39000, 30000, 9000),
('C6H2', 'Corps étrangers du segment postérieur (vitrocteomie) ', 39000, 30000, 9000),
('C6H3', 'Corps étrangers transfixiants de la cornée', 39000, 30000, 9000),
('C7A1A', 'Suture ou réfection simple du pavillon', 19500, 15000, 4500),
('C7A1B', 'Reconstitution du pavillon pour aplasie', 19500, 15000, 4500),
('C7A1C', 'Chirurgie reconstructive avec greffe cutanée et/ou cartilagineuse', 19500, 15000, 4500),
('C7A1D', 'Ablation simple d’une tumeur ou d’une chéloïde de l’oreille ', 19500, 15000, 4500),
('C7A1E', 'Ablation large d’une tumeur de l’oreille', 39000, 30000, 9000),
('C7A2A', 'Ablation de bouchon de cérumen uni ou bilatéral', 19500, 15000, 4500),
('C7A2B', 'Ablation de corps étrangers', 19500, 15000, 4500),
('C7A2C', 'Exérèse de tumeur du conduit auditif externe', 19500, 15000, 4500),
('C7A2D', 'Curetage d’othématome ou périchondrite', 39000, 30000, 9000),
('C7A3A', 'Paracentèse du tympan', 19500, 15000, 4500),
('C7A3B', 'Injection transtympanique', 19500, 15000, 4500),
('C7A3C', 'Drainage transtympanique permanent', 19500, 15000, 4500),
('C7A3D', 'Tympanoplastie (ossiculoplastie)', 39000, 30000, 9000),
('C7A3E', 'Séances d’aspiration des otites chroniques sous microscopie', 39000, 30000, 9000),
('C7A3F', 'Ablation de polype ', 39000, 30000, 9000),
('C7A3G', 'Myringoplastie simple', 39000, 30000, 9000),
('C7A3H', 'Chirurgie de l’otospongiose', 39000, 30000, 9000),
('C7A3I', 'Exploration sous microscopie de l’oreille moyenne', 39000, 30000, 9000),
('C7A3J', 'Implant cochléaire', 39000, 30000, 9000),
('C7A3K', 'Chirurgie de la paralysie faciale (greffe intrapétreuse, décompression)', 52000, 40000, 12000),
('C7A3L', 'Oto-Neuro-Chirurgie (translabyrinte, rétro-sigmoïde, base du crane)', 52000, 40000, 12000),
('C7A4A', 'Audiométrie tonale ou vocale', 19500, 15000, 4500),
('C7A4B', 'Audiométrie spéciale de l’enfant', 19500, 15000, 4500),
('C7A4C', 'Impédancemétrie', 19500, 15000, 4500),
('C7A4D', 'Oto-émissions acoustiques', 19500, 15000, 4500),
('C7A5A', 'Examen labyrinthique calorique ou postural', 19500, 15000, 4500),
('C7A5B', 'Explorations vestibulaires', 19500, 15000, 4500),
('C7B1A', 'Décortication pour rhinophyma', 39000, 30000, 9000),
('C7B1B', 'Réduction d’une fracture avec ou sans appareillage', 19500, 15000, 4500),
('C7B1C', 'Rhinoplastie avec greffe osseuse ou cartilagineuse', 39000, 30000, 9000),
('C7B1D', 'Chirurgie de la pyramide nasale avec greffe peau-os-cartilage', 52000, 40000, 12000),
('C7B1E', 'Résection de crête ou reposition de cloison', 39000, 30000, 9000),
('C7B1F', 'Traitement d’un hématome ou abcès de la cloison', 19500, 15000, 4500),
('C7B2A', 'Chirurgie de la rhinite atrophique', 19500, 15000, 4500),
('C7B2B', 'Injection de substance plastique pour rhinite atrophique', 19500, 15000, 4500),
('C7B2C', 'Ablation de corps étrangers', 19500, 15000, 4500),
('C7B2D', 'Hémostase pour épistaxis', 19500, 15000, 4500),
('C7B2E', 'Rhinoplastie narinaire réparatrice', 39000, 30000, 9000),
('C7B2F', 'Traitement des synéchies nasales', 19500, 15000, 4500),
('C7B2G', 'Traitement des oblitérations choanales membraneuse ou osseuse', 19500, 15000, 4500),
('C7B2H', 'Traitement des polypes des choanes', 19500, 15000, 4500),
('C7B2I', 'Traitement des polyposes nasales', 19500, 15000, 4500),
('C7B2J', 'Fermeture d’une communication bucco-nasale ou bucco-sinusale', 19500, 15000, 4500),
('C7B2K', 'Incision ou drainage d’une cellulite ou adénite génienne', 39000, 30000, 9000),
('C7B2L', 'Chirurgie des collections suppurées de la face', 39000, 30000, 9000),
('C7B2M', 'Septoplastie ', 19500, 15000, 4500),
('C7B2N', 'Rhinoseptoplastie ', 19500, 15000, 4500),
('C7B3A', 'Ponction isolée ou lavage du sinus maxillaire', 19500, 15000, 4500),
('C7B3B', 'Drainage permanent du sinus maxillaire', 19500, 15000, 4500),
('C7B3C', 'Chirurgie des tumeurs du sinus', 39000, 30000, 9000),
('C7B3D', 'Traitement d’une pansinusite', 19500, 15000, 4500),
('C7B3E', 'Méatotomie moyenne', 19500, 15000, 4500),
('C7B3F', 'Turbinectomie ', 19500, 15000, 4500),
('C7B4A', 'Ethmoïdectomie antérieure', 39000, 30000, 9000),
('C7B4B', 'Ethmoïdectomie totale ', 39000, 30000, 9000),
('C7B4C', 'Sphénoïdotomie', 39000, 30000, 9000),
('C7C1', 'Curage cervical superficiel', 52000, 40000, 12000),
('C7C10', 'Curage total', 52000, 40000, 12000),
('C7C11', 'Kyste branchial', 39000, 30000, 9000),
('C7C12', 'Lobectomie thyroïdienne', 52000, 40000, 12000),
('C7C13', 'Thyroïdectomie totale', 52000, 40000, 12000),
('C7C14', 'Trachéotomie', 39000, 30000, 9000),
('C7C15', 'Cordectomie par voie externe', 39000, 30000, 9000),
('C7C2', 'Curage sus claviculaire', 52000, 40000, 12000),
('C7C3', 'Drainage cervical', 39000, 30000, 9000),
('C7C4', 'Fistule cervicale', 39000, 30000, 9000),
('C7C5', 'Kyste thyreoglosse', 52000, 40000, 12000),
('C7C6', 'Sous Maxillectomie', 52000, 40000, 12000),
('C7C7', 'Parotidectomie superficielle', 52000, 40000, 12000),
('C7C8', 'Parotidectomie totale', 52000, 40000, 12000),
('C7C9', 'Exerese glande sublinguale', 52000, 40000, 12000),
('C7D1', 'Réfection partielle ou totale des lèvres traumatique ou tumorale', 39000, 30000, 9000),
('C7D2', 'Cheilorhinoplastie de fente labiale unilatérale', 52000, 40000, 12000),
('C7D3', 'Cheilorhinoplastie de fente labiale bilatérale', 52000, 40000, 12000),
('C7D4', 'Réparation de fente labio-vélo-palatine', 52000, 40000, 12000),
('C7E1', 'Incision d’abcès', 19500, 15000, 4500),
('C7E2', 'Réfection et/ou réparation post-traumatique, congénitale ou acquise', 52000, 40000, 12000),
('C7E3', 'Glossectomie partielle correctrice ou tumorale ', 52000, 40000, 12000),
('C7E4', 'Incision ou d’abcès ou phlegmon de la base de la langue ou du plancher buccal', 39000, 30000, 9000),
('C7E5', 'Excision de kyste congénital et de fistule du plancher buccal', 52000, 40000, 12000),
('C7E6', 'Biopsie ou exérèse d’une lésion de la bouche (oropharynx, hypopharynx)', 19500, 15000, 4500),
('C7E7', 'Diathermo-coagulation d’une tumeur de la bouche', 39000, 30000, 9000),
('C7E8', 'Diathermo-coagulation d’une leucoplasie ou d’un lupus', 39000, 30000, 9000),
('C7F1', 'Biopsie du tumeur UCN', 39000, 30000, 9000),
('C7G1', 'Adénoïdectomie', 39000, 30000, 9000),
('C7G10', 'Réparation vélo-palatine et véloplastie', 39000, 30000, 9000),
('C7G11', 'Amygdalectomie associé adénoïdectomie', 52000, 40000, 12000),
('C7G2', 'Amygdalectomie par dissection', 39000, 30000, 9000),
('C7G3', 'Amygdalectomie par électrocoagulation', 39000, 30000, 9000),
('C7G4', 'Amygdalectomie par cryothérapie', 39000, 30000, 9000),
('C7G5', 'Incision d’abcès ou phlegmon amygdalien, rétro-pharyngien', 39000, 30000, 9000),
('C7G6', 'Pharyngoplastie - Pharyngotomie - Pharyngectomie', 52000, 40000, 12000),
('C7G7', 'Réparation d’un pharyngostome avec ou sans lambeau cutané', 52000, 40000, 12000),
('C7G8', 'Résection de tumeur du pharynx et oropharynx avec ou sans curage ganglionnaire', 52000, 40000, 12000),
('C7G9', 'Ablation d’un fibrome naso-pharyngien', 39000, 30000, 9000),
('C7H1', 'Cordectomie partielle', 39000, 30000, 9000),
('C7H2', 'Nodule / polype corde vocale', 39000, 30000, 9000),
('C7H3', 'Biopsie larynx', 19500, 15000, 4500),
('C7H4', 'Laryngectomie partielle', 19500, 15000, 4500),
('C7H5', 'Epiglotopexie', 39000, 30000, 9000),
('C7H6', 'Pan endoscopie', 39000, 30000, 9000),
('C7H7', 'Infiltration corde vocale', 19500, 15000, 4500),
('C7I1', 'Lithotomie antérieure par incision muqueuse simple', 19500, 15000, 4500),
('C7I10', 'Sous maxillectomie associer curage sous mandibulaire', 52000, 40000, 12000),
('C7I11', 'Exerese glande sublinguale', 52000, 40000, 12000),
('C7I2', 'Lithotomie postérieure par dissection du canal excréteur', 39000, 30000, 9000),
('C7I3', 'Chirurgie de la fistule salivaire cutanée', 39000, 30000, 9000),
('C7I4', 'Chirurgie tumorale bénigne d’une glande salivaire', 39000, 30000, 9000),
('C7I5', 'Chirurgie tumorale maligne d’une glande salivaire', 39000, 30000, 9000),
('C7I6', 'Parotidectomie sans dissection du nerf facial', 39000, 30000, 9000),
('C7I7', 'Parotidectomie avec dissection du nerf facial et curage ganglionnaire', 52000, 40000, 12000),
('C7I8', 'Parotidectomie sans conservation du nerf facial et curage ganglionnaire', 52000, 40000, 12000),
('C7I9', 'Sous maxillectomie ', 52000, 40000, 12000),
('C7J1A', 'Trapano-ponction du sinus frontal', 52000, 40000, 12000),
('C7J1B', 'Trépanation ethmoïdo-frontal de lésion non maligne', 52000, 40000, 12000),
('C7J1C', 'Chirurgie d’un ostéome ethmoïdo-frontal', 52000, 40000, 12000),
('C7J1D', 'Drainage d’un sinus frontal', 39000, 30000, 9000),
('C7J1E', 'Réduction et contention des procès alvéolaire', 52000, 40000, 12000),
('C7J1F', 'Traitement orthopédique d’une fracture avec ou sans déplacement', 52000, 40000, 12000),
('C7J1G', 'Ostéosynthèse des fractures maxillaires', 52000, 40000, 12000),
('C7J1H', 'Réduction orthopédique simple du malaire', 52000, 40000, 12000),
('C7J1I', 'Réduction sanglante et ostéosynthèse du malaire avec ou sans plancher', 52000, 40000, 12000),
('C7J1J', 'Réduction orthopédique simple du zygoma', 39000, 30000, 9000),
('C7J1K', 'Réduction sanglante et ostéosynthèse du zygoma', 52000, 40000, 12000),
('C7J1L', 'Traitement orthopédique des disjonctions cranio-faciales', 39000, 30000, 9000),
('C7J1M', 'Traitement sanglant des disjonctions cranio-faciales', 52000, 40000, 12000),
('C7J1N', 'Traitement énophtalmique par greffe osseuse ou cartilagineuse', 52000, 40000, 12000),
('C7J1O', 'Camphopexie transnasale', 52000, 40000, 12000),
('C7J1P', 'Chirurgie des lésions infectieuses par curage ou sequestrectomie', 52000, 40000, 12000),
('C7J1Q', 'Trépanation de la fosse canine du sinus maxillaire', 52000, 40000, 12000),
('C7J1R', 'Ostéotomie uni ou bilatérale par voie endo ou exo-buccale', 52000, 40000, 12000),
('C7J1S', 'Ostéotomie segmentaire ou totale pour rétrognatie ou prognatie inferieure', 52000, 40000, 12000),
('C7J1T', 'Ostéotomie segmentaire ou totale pour rétrognatie ou prognatie supérieure', 52000, 40000, 12000),
('C7J1U', 'Réfection du massif osseux avec greffe osseuse et/ou cartilagineuse', 52000, 40000, 12000),
('C7J1V', 'Résection segmentaire ou hemi-maxillaire supérieur ou inférieur', 52000, 40000, 12000),
('C7J1W', 'Reconstitution par endo-prothèse maxillaire ou mandibulaire', 52000, 40000, 12000),
('C7J1X', 'Ablation d’une tumeur bénigne ou maligne maxillaire', 52000, 40000, 12000),
('C7J1Y', 'Ostéosynthèse mandibulaire fracture', 52000, 40000, 12000),
('C7J1Z', 'Ostéosynthèse plancher orbite', 52000, 40000, 12000),
('C7J2A', 'Mastoïdectomie', 52000, 40000, 12000),
('C7J2B', 'Evidemment pétro-mastoïdien', 52000, 40000, 12000),
('C7J2C', 'Résection du rocher pour tumeur', 52000, 40000, 12000),
('C7J2D', 'Pétrectomie large pour tumeur', 52000, 40000, 12000),
('C7J3A', 'Traitement chirurgical des plaies et infections de l’ATM', 52000, 40000, 12000),
('C7J3B', 'Traitement orthopédique des luxations unies ou bilatérales de l’ATM', 52000, 40000, 12000),
('C7J3C', 'Réduction sanglante de la luxation de l’ATM', 52000, 40000, 12000),
('C7J3D', 'Méniscectomie et/ou résection du condyle de l’ATM', 52000, 40000, 12000),
('C7J3E', 'Traitement chirurgical des luxations récidivantes de l’ATM', 52000, 40000, 12000),
('C7J3F', 'Traitement chirurgical de l’ankylose de l’ATM', 52000, 40000, 12000),
('C7J3G', 'Traitement chirurgical d’arthroplastie par endo-prothèse de l’ATM', 52000, 40000, 12000),
('C7J3H', 'Traitement chirurgical des constrictions permanentes extracapsulaire de l’ATM', 52000, 40000, 12000),
('C7K1', 'Extraction de corps étranger oesophagien', 19500, 15000, 4500),
('C7K2', 'Biopsie oesophagienne', 19500, 15000, 4500),
('C7K3', 'Oesophagoscopie exploration diagnostic', 19500, 15000, 4500),
('C8A1', 'Nettoyage ou pansement d\'une brûlure', 19500, 15000, 4500),
('C8A10', 'Régularisation, épluchage et suture éventuelle des plans superficiels d\'une plaie vaste ou complexe des membres ou de paroi thoraco-abdominale', 19500, 15000, 4500),
('C8A11', 'Extraction de corps étrangers profonds des parties molles', 39000, 30000, 9000),
('C8A2', 'Prélèvement simple de peau ou de muqueuse pour examen histologique', 19500, 15000, 4500),
('C8A3', 'Suture secondaire d\'une plaie après avivement', 19500, 15000, 4500),
('C8A4', 'Incision ou drainage d\'une collection isolée ou associée superficielle', 19500, 15000, 4500),
('C8A5', 'Incision d\'une collection volumineuse sous anesthésie générale', 39000, 30000, 9000),
('C8A6', 'Nettoyage de peau et mise à plat des collections suppurées ou kystiques', 39000, 30000, 9000),
('C8A7', 'Régularisation parage et suture d\'une plaie superficielle des parties molles', 19500, 15000, 4500),
('C8A8', 'Régularisation et suture d\'une plaie des parties molles, profonde et étendue', 19500, 15000, 4500),
('C8A9', 'Evacuation et drainage des épanchements liquidiens avec décollement cutané ', 19500, 15000, 4500),
('C8B1', 'Greffe libre de peau totale', 39000, 30000, 9000),
('C8B2', 'Plastie cutanée hétéro-jambière par lambeau pédiculé', 39000, 30000, 9000),
('C8B3', 'Excision d\'une cicatrice vicieuse suivie de suture et/ou plastie', 39000, 30000, 9000),
('C8B4', 'Epiplooplastie d\'une vaste perte de substance extra-abdominale', 52000, 40000, 12000),
('C8B5', 'Autoplastie par mutation ou glissement', 39000, 30000, 9000),
('C8B6', 'Correction d\'une bride rétractile par plastie en Z', 39000, 30000, 9000),
('C8B7', 'Mise en place d\'une prothèse d\'expansion cutanée et/ou séances de gonflage', 39000, 30000, 9000),
('C8C1', 'Destruction de verrues plantaires et péri-unguéales ', 19500, 15000, 4500),
('C8C10', 'Exérèse de lésions congénitales de la peau ou parties molles de la face et du cou', 39000, 30000, 9000),
('C8C11', 'Exérèse d\'un kyste ou fistule de fente branchiale', 19500, 15000, 4500),
('C8C2', 'Destruction des tumeurs sous-unguéales avec exérèse partielle ou totale de l\'ongle', 19500, 15000, 4500),
('C8C3', 'Destruction de végétations vénériennes', 39000, 30000, 9000),
('C8C4', 'Traitement des angiomes, télangiectasies, leucoplasies, naevi et chéloïdes ', 19500, 15000, 4500),
('C8C5', 'Ablation ou destruction de tumeurs cutanées ou sous cutanées bénignes', 19500, 15000, 4500),
('C8C6', 'Ablation ou destruction de tumeurs bénignes sous-aponévrotiques', 19500, 15000, 4500),
('C8C7', 'Ablation ou destruction de naevi pigmentaires ou de tumeurs cutanées malignes', 19500, 15000, 4500),
('C8C8', 'Exérèse ou destruction en masse d\'un lupus ou d\'une tuberculose verruqueuse', 19500, 15000, 4500),
('C8C9', 'Ablation d\'une tumeur cutanée suivie des lambeaux ou par greffe', 39000, 30000, 9000),
('C9A1', 'Mise à plat ou drainage d’une collection pariétale (abcès, hématome, sérosité)', 39000, 30000, 9000),
('C9A2', 'Thoracoplastie des malformations congénitales ou déformation acquise', 39000, 30000, 9000),
('C9A3', 'Myoplastie avec ou sans mobilisation musculaire', 39000, 30000, 9000),
('C9A4', 'Thoracoscopie diagnostique ou thérapeutique (avec ou sans biopsie)', 39000, 30000, 9000),
('C9A5', 'Résection partielle ou totale d’une ou plusieurs cotes', 39000, 30000, 9000),
('C9A6', 'Thoracotomie exploratrice ', 39000, 30000, 9000),
('C9B1', 'Curage ganglionnaire du creux axillaire', 39000, 30000, 9000),
('C9B2', 'Curage ganglionnaire du creux sus-claviculaire', 39000, 30000, 9000),
('C9B3', 'Chirurgie des masses et tumeurs sus-claviculaires', 39000, 30000, 9000),
('C9B4', 'Chirurgie des masses et tumeurs du creux axillaire', 39000, 30000, 9000),
('C9C1', 'Résection d\'un segment ou d’un lobe pulmonaire ', 52000, 40000, 12000),
('C9C2', 'Résection totale d’un poumon ou de plus d’un lobe de poumon', 52000, 40000, 12000),
('C9C3', 'Pneumonectomie élargie pour cancer avec curage ganglionnaire', 52000, 40000, 12000),
('C9C4', 'Lobectomie élargie pour cancer avec curage ganglionnaire', 52000, 40000, 12000),
('C9C5', 'Exérèse de kyste hydatique par thoracotomie', 52000, 40000, 12000),
('C9C6', 'Exérèse des malformations congénitales', 52000, 40000, 12000),
('C9D1', 'Décortication pleurale', 39000, 30000, 9000),
('C9D2', 'Drainage pleural', 39000, 30000, 9000),
('C9D3', 'Pleurectomie, pleurotomie ou pleurostomie', 39000, 30000, 9000),
('C9D4', 'Pleuroscopie diagnostic ou thérapeutique', 39000, 30000, 9000),
('C9D5', 'Biopsie pleurale par thoracotomie ou thoracoscopie', 39000, 30000, 9000),
('C9E1', 'Thermocoagulation trachéobronchique', 39000, 30000, 9000),
('C9E2', 'Cryothérapie tranchéobronchique', 39000, 30000, 9000),
('C9E3', 'Réfection, résection, plastie ou greffe de la trachée ou des bronches', 39000, 30000, 9000),
('C9F1', 'Médiastinoscopie diagnostique ou thérapeutique', 52000, 40000, 12000),
('C9F2', 'Résection de l’innervation pulmonaire, cardiaque ou périvasculaire', 39000, 30000, 9000),
('C9F3', 'Traitement chirurgicale des lésions médiatisnales', 52000, 40000, 12000),
('C9F4', 'Chirurgie du thymus', 39000, 30000, 9000),
('C9G1', 'Traitement chirurgical des hernies diaphragmatiques non traumatique', 52000, 40000, 12000),
('C9G2', 'Traitement chirurgical des éventrations diaphragmatiques non traumatique', 52000, 40000, 12000),
('C9G3', 'Traitement chirurgicale des plaies et rupture du diaphragme', 39000, 30000, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `actes`
--

CREATE TABLE `actes` (
  `ida` int(11) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `prix_struct` double NOT NULL,
  `rem_cnss` double NOT NULL,
  `prix_ticket` double NOT NULL,
  `date_acte` varchar(20) NOT NULL,
  `idh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `andoc`
--

CREATE TABLE `andoc` (
  `idexam` int(11) NOT NULL,
  `idan` int(11) NOT NULL,
  `identexam` int(11) NOT NULL,
  `heurdexam` varchar(30) NOT NULL,
  `datexam` varchar(30) NOT NULL,
  `motif` varchar(40) NOT NULL,
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
  `pandoc` float NOT NULL,
  `chk` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `andocs`
--

CREATE TABLE `andocs` (
  `idexam` int(11) NOT NULL,
  `idan` int(11) NOT NULL,
  `identexam` int(11) NOT NULL,
  `heurdexam` varchar(30) NOT NULL,
  `datexam` varchar(30) NOT NULL,
  `motif` varchar(40) NOT NULL,
  `fg` float NOT NULL,
  `rg` float NOT NULL,
  `hgpo` float NOT NULL,
  `chol` float NOT NULL,
  `tc` float NOT NULL,
  `sgot` float NOT NULL,
  `ldh` float NOT NULL,
  `sgptalt` float NOT NULL,
  `urea` float NOT NULL,
  `crea` float NOT NULL,
  `ua` float NOT NULL,
  `alb` float NOT NULL,
  `br` float NOT NULL,
  `brdi` float NOT NULL,
  `alkphos` float NOT NULL,
  `calc` float NOT NULL,
  `magn` float NOT NULL,
  `ptp` float NOT NULL,
  `gtt` float NOT NULL,
  `ioskna` float NOT NULL,
  `ioskk` float NOT NULL,
  `ioskcl` float NOT NULL,
  `cbc` float NOT NULL,
  `abog` float NOT NULL,
  `ptaptt` float NOT NULL,
  `tpinr` float NOT NULL,
  `rbcm` float NOT NULL,
  `testemel` float NOT NULL,
  `tauret` float NOT NULL,
  `esr` float NOT NULL,
  `urin` float NOT NULL,
  `stol` float NOT NULL,
  `urinbs` float NOT NULL,
  `sob` float NOT NULL,
  `pus` float NOT NULL,
  `csfre` float NOT NULL,
  `pore` float NOT NULL,
  `pgorg` float NOT NULL,
  `pvatb` float NOT NULL,
  `pvatbrs` float NOT NULL,
  `burin` float NOT NULL,
  `psa` float NOT NULL,
  `tsh` float NOT NULL,
  `t3` float NOT NULL,
  `t4` float NOT NULL,
  `betahcg` float NOT NULL,
  `acahbc` float NOT NULL,
  `ca125` float NOT NULL,
  `ca19` float NOT NULL,
  `testo` float NOT NULL,
  `tropo` float NOT NULL,
  `dimeres` float NOT NULL,
  `prl` float NOT NULL,
  `fsh` float NOT NULL,
  `lh` float NOT NULL,
  `hbsag` float NOT NULL,
  `hcvab` float NOT NULL,
  `hivab` float NOT NULL,
  `hbc` float NOT NULL,
  `crp` float NOT NULL,
  `facrhu` float NOT NULL,
  `aslo` float NOT NULL,
  `vdrl` float NOT NULL,
  `hbpylo` float NOT NULL,
  `toxo` float NOT NULL,
  `rub` float NOT NULL,
  `pandoc` float NOT NULL,
  `pcandoc` float NOT NULL,
  `chk` varchar(3) NOT NULL,
  `c_hdl` float NOT NULL,
  `c_ldl` float NOT NULL,
  `proteinurie` float NOT NULL,
  `fer_serique` float NOT NULL,
  `ferritine` float NOT NULL,
  `proteinurie_24h` float NOT NULL,
  `ck_mb` float NOT NULL,
  `lipasemie` float NOT NULL,
  `ge_fm` float NOT NULL,
  `coproculture` float NOT NULL,
  `cytobacterio_expectorations` float NOT NULL,
  `liquide_ponction` float NOT NULL,
  `recherche_rotadeno_selles` float NOT NULL,
  `recherche_ag_h_pylori_selles` float NOT NULL,
  `recherche_hav_selles` float NOT NULL,
  `psa_free` float NOT NULL,
  `progestérone` float NOT NULL,
  `ac_anti_hbs` float NOT NULL,
  `oestradiol` float NOT NULL,
  `ag_hbe` float NOT NULL,
  `ac_anti_hbe` float NOT NULL,
  `nt_proBNP` float NOT NULL,
  `hav` float NOT NULL,
  `serologie_typhoide` float NOT NULL,
  `serologie_brucellose` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `andocs`
--

INSERT INTO `andocs` (`idexam`, `idan`, `identexam`, `heurdexam`, `datexam`, `motif`, `fg`, `rg`, `hgpo`, `chol`, `tc`, `sgot`, `ldh`, `sgptalt`, `urea`, `crea`, `ua`, `alb`, `br`, `brdi`, `alkphos`, `calc`, `magn`, `ptp`, `gtt`, `ioskna`, `ioskk`, `ioskcl`, `cbc`, `abog`, `ptaptt`, `tpinr`, `rbcm`, `testemel`, `tauret`, `esr`, `urin`, `stol`, `urinbs`, `sob`, `pus`, `csfre`, `pore`, `pgorg`, `pvatb`, `pvatbrs`, `burin`, `psa`, `tsh`, `t3`, `t4`, `betahcg`, `acahbc`, `ca125`, `ca19`, `testo`, `tropo`, `dimeres`, `prl`, `fsh`, `lh`, `hbsag`, `hcvab`, `hivab`, `hbc`, `crp`, `facrhu`, `aslo`, `vdrl`, `hbpylo`, `toxo`, `rub`, `pandoc`, `pcandoc`, `chk`, `c_hdl`, `c_ldl`, `proteinurie`, `fer_serique`, `ferritine`, `proteinurie_24h`, `ck_mb`, `lipasemie`, `ge_fm`, `coproculture`, `cytobacterio_expectorations`, `liquide_ponction`, `recherche_rotadeno_selles`, `recherche_ag_h_pylori_selles`, `recherche_hav_selles`, `psa_free`, `progestérone`, `ac_anti_hbs`, `oestradiol`, `ag_hbe`, `ac_anti_hbe`, `nt_proBNP`, `hav`, `serologie_typhoide`, `serologie_brucellose`) VALUES
(1, 8, 6, '15:07:37', '03/07/2024', 'Fièvre', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 500, 500, 'OUI', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 9, 7, '22:07:24', '03/07/2024', 'Fièvre', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 500, 500, 'OUI', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 7, 8, '09:07:06', '09/07/2024', 'Fièvre', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8000, 2500, 'OUI', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 4, 0, '15:07:13', '10/07/2024', 'Fièvre', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1500, 1500, 'NON', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 10, 0, '15:07:38', '10/07/2024', 'Fièvre', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1500, 1500, 'NON', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 11, 9, '14:07:22', '14/07/2024', 'Fièvre', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1500, 1500, 'OUI', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 20, 14, '20:07:37', '19/07/2024', '', 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5500, 2000, 'NON', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 22, 16, '21:07:03', '19/07/2024', '', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5500, 3000, 'NON', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(9, 23, 17, '21:07:01', '19/07/2024', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 500, 500, 'NON', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 29, 0, '20:07:57', '31/07/2024', 'PROBLEME', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4500, 1000, 'NON', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `caisse`
--

CREATE TABLE `caisse` (
  `idc` int(11) NOT NULL,
  `desig` varchar(200) NOT NULL,
  `montant` float NOT NULL,
  `cnss` float NOT NULL,
  `etat` varchar(3) NOT NULL,
  `dateact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE `connection` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `action` varchar(250) NOT NULL,
  `datedc` varchar(30) NOT NULL,
  `datefc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `consult`
--

CREATE TABLE `consult` (
  `idcons` int(11) NOT NULL,
  `idpa` int(10) NOT NULL,
  `numed` int(11) NOT NULL,
  `ante` varchar(100) NOT NULL,
  `motif` varchar(100) NOT NULL,
  `examc` text NOT NULL,
  `diagnostic` varchar(100) NOT NULL,
  `traitement` varchar(100) NOT NULL,
  `examdem` varchar(100) NOT NULL,
  `hist` varchar(100) NOT NULL,
  `para` text NOT NULL,
  `exampc` text NOT NULL,
  `note` varchar(100) NOT NULL,
  `heurdc` varchar(20) NOT NULL,
  `heurfc` varchar(20) NOT NULL,
  `statcons` varchar(1) NOT NULL,
  `datcons` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consult`
--

INSERT INTO `consult` (`idcons`, `idpa`, `numed`, `ante`, `motif`, `examc`, `diagnostic`, `traitement`, `examdem`, `hist`, `para`, `exampc`, `note`, `heurdc`, `heurfc`, `statcons`, `datcons`) VALUES
(1, 8, 35, '', 'Fièvre', 'NFS,', 'Interrogatoire détaillé :\r\nMode de vie : Habitudes alimentaires, consommation de tabac, alcool, acti', 'Antibiotiques pour les infections bactériennes.\r\nAntihypertenseurs pour la pression artérielle élevé', '', 'diabète, hypertension, asthme', '37,2°C\r\nEnviron 120/80 mmHg', 'augmentation de la taille des organes', 'RAS', '15:14', '15:15', 'F', '03/07/2024'),
(2, 9, 35, '', 'Fièvre', 'NFS,', 'FDGFGFDGDF', 'DFGFDGDFGFDG', '', 'FSDFSDFSD', 'DSFSDFDSF', 'FGHFGHFGH', 'FGHGFHGFHGFH', '22:14', '22:14', 'F', '03/07/2024'),
(3, 7, 36, '', 'Fièvre', 'Glycémie à jeun, \r\nNFS, \r\nECBU+Culture,\r\nTSH', 'sdfgsdfg', 'dfgdfgfdg', '', 'sdfgdsfgfdsg', 'dfsgdsfgdfsg', 'dfgdfgfdsg', 'dsfgsdfgsdfg', '9:13', '9:27', 'F', '09/07/2024'),
(4, 11, 34, '', 'Fièvre', 'Cholestérol Total ,', 'MOKINFO', 'MOKINFO', '', 'MOKINFO', 'MOKINFO', 'MOKINFO', 'MOKINFO', '14:20', '14:20', 'F', '14/07/2024'),
(5, 20, 36, '', 'LKFJDL', 'Glycémie à jeun,Cholestérol Total ,NFS,ECBU+Culture ,', 'LKJ', 'LKJKLJLKJ', '', 'LKJ', 'LKJ', 'LKJ', 'LKJ', '20:53', '20:54', 'F', '19/07/2024'),
(6, 22, 36, '', 'LJKLKJLK', 'Urée,Calcium,Test d’Emmel,FT3 ,GE/FM,', 'KLJLKJKLjklJLK', 'KLJLKJLKjkl', '', 'KLKJLKJ', 'KLJ', 'LKJL', 'KJLKJ', '21:00', '21:00', 'F', '19/07/2024'),
(7, 22, 36, '', 'dekfjleml', 'Urée,Calcium,Test d’Emmel,FT3 ,GE/FM,', 'ljkjlkjkl', 'klj', '', 'lkjlkjklj', 'klj', 'klj', 'lkj', '21:12', '21:12', 'F', '19/07/2024'),
(8, 23, 36, '', 'skdjfhkj', 'NFS,', 'hkjh', 'kjhkjhkj', '', 'hkjhkjh', 'kjhkjh', 'kjhjkhkj', 'hkjh', '21:13', '21:13', 'F', '19/07/2024'),
(9, 19, 36, '', 'dsfkjslkfj', '', 'ljelkfjslfkj', 'lkjlkfjlksfjl', 'Echographie ,', 'ekjaelkfjslekj', 'lkdjfslkefgjl', 'jedlqkefgjqlekfj', 'klsejflskdfj', '21:15', '21:15', 'F', '19/07/2024'),
(10, 21, 36, '', 'elskfjelkfjlk', '', 'lkjflksdjfglkj', 'lkjflkdsjfllsd', '', 'dsfkjsmdklfjsd', 'sd:;fjdslkfj', 'dlsfksmdfgkdlgf', 'sd:fkljsdmlfk', '21:15', '21:15', 'F', '19/07/2024'),
(11, 27, 36, '', 'jkhkj', '', 'jkhkjhkj', 'hkjhkjh', '', 'kjhjkh', 'jkhjkhk', 'jhkjhjk', 'hjkhkjh', '14:53', '15:05', 'F', '28/07/2024');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `iddoc` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `codepatient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`iddoc`, `nom`, `libelle`, `date`, `codepatient`) VALUES
(1, '19_1.doc', 'DJAMA-CV-13072024.doc', '2024-07-19 19:59:37', 19),
(2, '19_2.doc', 'DJAMA-CV-11072024.doc', '2024-07-19 19:59:37', 19),
(3, '19_3.jpg', 'Yacin.jpg', '2024-07-19 19:59:37', 19),
(4, '19_4.docx', 'Bonjour Djama.docx', '2024-07-19 19:59:37', 19),
(5, '19_5.png', 'mokinfo.png', '2024-07-19 19:59:37', 19),
(6, '19_6.png', 'MOKINFO_PICs.png', '2024-07-19 19:59:37', 19);

-- --------------------------------------------------------

--
-- Table structure for table `entre`
--

CREATE TABLE `entre` (
  `ident` int(11) NOT NULL,
  `codepatient` int(10) NOT NULL,
  `motif` varchar(100) NOT NULL,
  `num_medecin` varchar(3) NOT NULL,
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
(1, 1, 'fievre', 'ORL', '', 1, '12:48', '12:48', 'B', '23/06/2024'),
(2, 2, 'fièvre dingue', 'URO', '', 1, '13:09', '13:09', 'B', '23/06/2024'),
(3, 4, 'desor', 'DEN', '', 1, '13:22', '13:22', 'B', '23/06/2024'),
(4, 5, 'Fièvre', 'CTC', '', 1, '13:00', '13:00', 'C', '24/06/2024'),
(5, 6, 'Fièvre', 'CAR', '', 1, '11:04', '11:26', 'C', '02/07/2024'),
(6, 8, 'Fièvre', 'CTC', '', 1, '10:19', '15:15', 'C', '03/07/2024'),
(7, 9, 'Fièvre', 'CTC', '', 2, '22:11', '22:14', 'C', '03/07/2024'),
(8, 7, 'Fièvre', 'DEN', '', 1, '21:55', '9:27', 'F', '09/07/2024'),
(9, 11, 'Fièvre', 'CAR', '', 1, '14:16', '14:20', 'F', '14/07/2024'),
(10, 2, 'jgjhg', 'CAN', '', 1, '19:03', '19:03', '', '14/07/2024'),
(11, 12, 'DSFDSF', 'ORL', '', 1, '19:08', '19:08', 'C', '14/07/2024'),
(12, 17, '', 'DEN', '', 1, '10:47', '10:47', 'C', '17/07/2024'),
(13, 19, '', 'DEN', '', 1, '14:02', '21:15', 'F', '19/07/2024'),
(14, 20, '', 'DEN', '', 2, '20:16', '20:54', 'F', '19/07/2024'),
(15, 21, '', 'DEN', '', 3, '20:17', '21:15', 'C', '19/07/2024'),
(16, 22, '', 'DEN', '', 4, '20:26', '21:12', 'B', '19/07/2024'),
(17, 23, '', 'DEN', '', 5, '20:26', '21:13', 'B', '19/07/2024'),
(18, 24, '', 'DEN', '', 1, '9:57', '9:57', 'P', '20/07/2024'),
(19, 25, '', 'DEN', '', 2, '9:57', '9:57', 'B', '20/07/2024'),
(20, 26, '', 'DEN', '', 3, '10:00', '10:00', 'B', '20/07/2024'),
(21, 27, '', 'DEN', '', 1, '14:24', '15:05', 'F', '28/07/2024');

-- --------------------------------------------------------

--
-- Table structure for table `entrelab`
--

CREATE TABLE `entrelab` (
  `identlab` int(11) NOT NULL,
  `idp` int(10) NOT NULL,
  `motif` varchar(100) NOT NULL,
  `num` int(11) NOT NULL,
  `heura` varchar(20) NOT NULL,
  `heurf` varchar(20) NOT NULL,
  `statut` varchar(1) NOT NULL,
  `datentlab` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `examen`
--

CREATE TABLE `examen` (
  `ide` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `age` int(3) NOT NULL,
  `sex` int(1) NOT NULL,
  `numcard` int(2) NOT NULL,
  `price` float NOT NULL,
  `heurfexam` varchar(30) NOT NULL,
  `datej` text NOT NULL,
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
  `res` int(11) NOT NULL,
  `pandoc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `examens`
--

CREATE TABLE `examens` (
  `ide` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `age` int(3) NOT NULL,
  `sex` int(1) NOT NULL,
  `numcard` int(2) NOT NULL,
  `price` float NOT NULL,
  `heurfexam` varchar(30) NOT NULL,
  `datej` text NOT NULL,
  `fg` float NOT NULL,
  `rg` float NOT NULL,
  `hgpo` float NOT NULL,
  `chol` float NOT NULL,
  `c_hdl` float NOT NULL,
  `c_ldl` float NOT NULL,
  `tc` float NOT NULL,
  `sgot` float NOT NULL,
  `ldh` float NOT NULL,
  `sgptalt` float NOT NULL,
  `urea` float NOT NULL,
  `crea` float NOT NULL,
  `ua` float NOT NULL,
  `alb` float NOT NULL,
  `br` float NOT NULL,
  `brdi` float NOT NULL,
  `alkphos` float NOT NULL,
  `calc` float NOT NULL,
  `magn` float NOT NULL,
  `ptp` float NOT NULL,
  `gtt` float NOT NULL,
  `ioskna` float NOT NULL,
  `ioskk` float NOT NULL,
  `ioskcl` float NOT NULL,
  `proteinurie` float NOT NULL,
  `fer_serique` float NOT NULL,
  `ferritine` float NOT NULL,
  `proteinurie_24h` float NOT NULL,
  `ck_mb` float NOT NULL,
  `lipasemie` float NOT NULL,
  `cbc` float NOT NULL,
  `cbc2` float NOT NULL,
  `cbc3` float NOT NULL,
  `cbc4` float NOT NULL,
  `cbc5` float NOT NULL,
  `cbc6` float NOT NULL,
  `cbc7` float NOT NULL,
  `cbc8` float NOT NULL,
  `cbc9` float NOT NULL,
  `cbc10` float NOT NULL,
  `cbc11` float NOT NULL,
  `abog` varchar(20) NOT NULL,
  `ptaptt` float NOT NULL,
  `tpinr` float NOT NULL,
  `rbcm` float NOT NULL,
  `testemel` float NOT NULL,
  `tauret` float NOT NULL,
  `esr` float NOT NULL,
  `ge_fm` float NOT NULL,
  `urin` float NOT NULL,
  `u_asp` varchar(20) NOT NULL,
  `u_leu` varchar(20) NOT NULL,
  `u_hema` varchar(20) NOT NULL,
  `u_bac` varchar(20) NOT NULL,
  `u_lev` varchar(20) NOT NULL,
  `u_e_par` varchar(20) NOT NULL,
  `u_cris` varchar(20) NOT NULL,
  `u_cyl` varchar(20) NOT NULL,
  `u_c_epi` varchar(20) NOT NULL,
  `stol` float NOT NULL,
  `s_asp` varchar(20) NOT NULL,
  `s_leu` varchar(50) NOT NULL,
  `s_lev` varchar(20) NOT NULL,
  `s_hema` varchar(20) NOT NULL,
  `s_para` varchar(20) NOT NULL,
  `s_cul` varchar(20) NOT NULL,
  `s_es_id` varchar(50) NOT NULL,
  `s_sen` varchar(50) NOT NULL,
  `s_resis` varchar(50) NOT NULL,
  `s_con` varchar(100) NOT NULL,
  `urinbs` float NOT NULL,
  `c_asp` varchar(20) NOT NULL,
  `c_leu` varchar(20) NOT NULL,
  `c_hema` varchar(20) NOT NULL,
  `c_bac` varchar(20) NOT NULL,
  `c_cris` varchar(20) NOT NULL,
  `c_cyl` varchar(20) NOT NULL,
  `c_c_epi` varchar(20) NOT NULL,
  `c_cul` varchar(20) NOT NULL,
  `c_con` varchar(100) NOT NULL,
  `sob` float NOT NULL,
  `bs_asp` varchar(20) NOT NULL,
  `bs_leu` varchar(50) NOT NULL,
  `bs_lev` varchar(20) NOT NULL,
  `bs_hema` varchar(20) NOT NULL,
  `bs_para` varchar(50) NOT NULL,
  `bs_cul` varchar(20) NOT NULL,
  `bs_con` varchar(100) NOT NULL,
  `pus` float NOT NULL,
  `csfre` float NOT NULL,
  `coproculture` float NOT NULL,
  `cytobacterio_expectorations` float NOT NULL,
  `liquide_ponction` float NOT NULL,
  `recherche_rotadeno_selles` float NOT NULL,
  `recherche_ag_h_pylori_selles` float NOT NULL,
  `recherche_hav_selles` float NOT NULL,
  `pore` float NOT NULL,
  `pgorg` float NOT NULL,
  `pvatb` float NOT NULL,
  `bv_asp` varchar(50) NOT NULL,
  `bv_ode` varchar(50) NOT NULL,
  `bv_leu` varchar(20) NOT NULL,
  `bv_hema` varchar(20) NOT NULL,
  `bv_c_epi` varchar(50) NOT NULL,
  `bv_f_sl` varchar(20) NOT NULL,
  `bv_t_vag` varchar(20) NOT NULL,
  `bv_cul` varchar(20) NOT NULL,
  `bv_con` varchar(100) NOT NULL,
  `pvatbrs` float NOT NULL,
  `rs_rch` varchar(20) NOT NULL,
  `rs_rm_uu` varchar(20) NOT NULL,
  `rs_rm_mh` varchar(20) NOT NULL,
  `rs_ant_sen` varchar(20) NOT NULL,
  `rs_resis` varchar(20) NOT NULL,
  `burin` float NOT NULL,
  `psa` float NOT NULL,
  `tsh` float NOT NULL,
  `t3` float NOT NULL,
  `t4` float NOT NULL,
  `betahcg` float NOT NULL,
  `psa_free` float NOT NULL,
  `progestérone` float NOT NULL,
  `acahbc` float NOT NULL,
  `ca125` float NOT NULL,
  `ca19` float NOT NULL,
  `testo` float NOT NULL,
  `tropo` float NOT NULL,
  `ac_anti_hbs` float NOT NULL,
  `oestradiol` float NOT NULL,
  `dimeres` float NOT NULL,
  `prl` float NOT NULL,
  `fsh` float NOT NULL,
  `lh` float NOT NULL,
  `ag_hbe` float NOT NULL,
  `ac_anti_hbe` float NOT NULL,
  `nt_proBNP` float NOT NULL,
  `hbsag` float NOT NULL,
  `hcvab` float NOT NULL,
  `hivab` float NOT NULL,
  `hbc` float NOT NULL,
  `crp` float NOT NULL,
  `facrhu` float NOT NULL,
  `aslo` float NOT NULL,
  `vdrl` float NOT NULL,
  `hav` float NOT NULL,
  `serologie_typhoide` float NOT NULL,
  `hbpylo` float NOT NULL,
  `toxo` float NOT NULL,
  `rub` float NOT NULL,
  `serologie_brucellose` float NOT NULL,
  `pandoc` float NOT NULL,
  `pcandoc` float NOT NULL,
  `chk` varchar(3) NOT NULL,
  `res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examens`
--

INSERT INTO `examens` (`ide`, `idp`, `name`, `phone`, `address`, `age`, `sex`, `numcard`, `price`, `heurfexam`, `datej`, `fg`, `rg`, `hgpo`, `chol`, `c_hdl`, `c_ldl`, `tc`, `sgot`, `ldh`, `sgptalt`, `urea`, `crea`, `ua`, `alb`, `br`, `brdi`, `alkphos`, `calc`, `magn`, `ptp`, `gtt`, `ioskna`, `ioskk`, `ioskcl`, `proteinurie`, `fer_serique`, `ferritine`, `proteinurie_24h`, `ck_mb`, `lipasemie`, `cbc`, `cbc2`, `cbc3`, `cbc4`, `cbc5`, `cbc6`, `cbc7`, `cbc8`, `cbc9`, `cbc10`, `cbc11`, `abog`, `ptaptt`, `tpinr`, `rbcm`, `testemel`, `tauret`, `esr`, `ge_fm`, `urin`, `u_asp`, `u_leu`, `u_hema`, `u_bac`, `u_lev`, `u_e_par`, `u_cris`, `u_cyl`, `u_c_epi`, `stol`, `s_asp`, `s_leu`, `s_lev`, `s_hema`, `s_para`, `s_cul`, `s_es_id`, `s_sen`, `s_resis`, `s_con`, `urinbs`, `c_asp`, `c_leu`, `c_hema`, `c_bac`, `c_cris`, `c_cyl`, `c_c_epi`, `c_cul`, `c_con`, `sob`, `bs_asp`, `bs_leu`, `bs_lev`, `bs_hema`, `bs_para`, `bs_cul`, `bs_con`, `pus`, `csfre`, `coproculture`, `cytobacterio_expectorations`, `liquide_ponction`, `recherche_rotadeno_selles`, `recherche_ag_h_pylori_selles`, `recherche_hav_selles`, `pore`, `pgorg`, `pvatb`, `bv_asp`, `bv_ode`, `bv_leu`, `bv_hema`, `bv_c_epi`, `bv_f_sl`, `bv_t_vag`, `bv_cul`, `bv_con`, `pvatbrs`, `rs_rch`, `rs_rm_uu`, `rs_rm_mh`, `rs_ant_sen`, `rs_resis`, `burin`, `psa`, `tsh`, `t3`, `t4`, `betahcg`, `psa_free`, `progestérone`, `acahbc`, `ca125`, `ca19`, `testo`, `tropo`, `ac_anti_hbs`, `oestradiol`, `dimeres`, `prl`, `fsh`, `lh`, `ag_hbe`, `ac_anti_hbe`, `nt_proBNP`, `hbsag`, `hcvab`, `hivab`, `hbc`, `crp`, `facrhu`, `aslo`, `vdrl`, `hav`, `serologie_typhoide`, `hbpylo`, `toxo`, `rub`, `serologie_brucellose`, `pandoc`, `pcandoc`, `chk`, `res`) VALUES
(1, 8, 'HAMZA MOHAMED', '77878789', '', 33, 0, 0, 500, '14:29', '09/07/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, '0', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 500, 500, '0', 2),
(2, 9, 'MOHAMED ADEN ALI', '77876756', '', 23, 0, 0, 500, '22:19', '03/07/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 13, 40, 90, 35, 37, 2000, 3000, 2000, 500, 200000, '0', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 500, 500, '0', 2),
(3, 7, 'MOUSSA ISSACK FARAH', '77675646', '', 33, 0, 0, 8000, '11:38', '09/07/2024', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 14, 50, 90, 30, 30, 2000, 3000, 2000, 90, 100000, '0', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8000, 2500, '0', 2),
(6, 11, 'MOHAMED HASSAN WABERI', '77656453', '', 24, 0, 0, 1500, '18:28', '14/07/2024', 0, 0, 0, 12, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1500, 1500, '0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `facture`
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
  `service` varchar(50) NOT NULL,
  `codf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`idf`, `desg`, `idp`, `datef`, `type_paix`, `mt`, `mt_cnss`, `etat`, `etat_cnss`, `date_paix`, `service`, `codf`) VALUES
(1, 'Frais de consultation ORL', 1, '2024-06-23 12:48', 'ESP', 5000, 0, 'OK', '', '2024-07-08 21:51', 'consultation', 11),
(2, 'Frais de consultation Urologie', 2, '2024-06-23 13:09', 'ESP', 5000, 0, 'OK', '', '2024-07-17 14:37', 'consultation', 18),
(3, 'Frais de consultation Dentiste', 4, '2024-06-23 13:22', 'ESP', 5000, 0, 'OK', '', '2024-07-08 21:51', 'consultation', 12),
(4, 'Frais de consultation Chirurgie thoracique cardiovasculaire', 5, '2024-06-24 13:01', 'ESP', 5000, 0, 'OK', '', '2024-07-08 14:47', 'consultation', 10),
(5, 'Frais de consultation Cardiologie', 6, '2024-07-02 11:05', 'ESP', 5000, 0, 'OK', '', '2024-07-02 11:12', 'consultation', 7),
(6, 'Frais de consultation Chirurgie thoracique cardiovasculaire', 8, '2024-07-03 10:20', 'ESP', 5000, 0, 'OK', '', '2024-07-03 10:20', 'consultation', 8),
(7, 'NFS', 8, '2024-07-03 10:24', 'ESP', 500, 500, 'OK', '', '2024-07-14 19:02', 'Laboratoire', 15),
(8, 'NFS', 8, '2024-07-03 15:14', 'ESP', 500, 500, 'OK', '', '2024-07-14 19:02', 'Laboratoire', 15),
(9, 'Frais de consultation Chirurgie thoracique cardiovasculaire', 9, '2024-07-03 22:11', 'ESP', 5000, 0, 'OK', '', '2024-07-03 22:12', 'consultation', 9),
(10, 'NFS', 9, '2024-07-03 22:14', 'ESP', 500, 500, 'OK', '', '2024-07-14 19:02', 'Laboratoire', 15),
(11, 'Frais de consultation Dentiste', 7, '2024-07-08 21:55', 'ESP', 5000, 0, 'OK', '', '2024-07-17 15:32', 'consultation', 19),
(12, 'Glycémie à jeun', 7, '2024-07-09 9:13', 'ESP', 500, 500, 'OK', '', '2024-07-17 15:32', 'Laboratoire', 19),
(13, 'NFS', 7, '2024-07-09 9:13', 'ESP', 500, 500, 'OK', '', '2024-07-17 15:32', 'Laboratoire', 19),
(14, 'ECBU+Culture', 7, '2024-07-09 9:13', 'ESP', 4000, 500, 'OK', '', '2024-07-17 15:32', 'Laboratoire', 19),
(15, 'TSH', 7, '2024-07-09 9:13', 'ESP', 2500, 500, 'OK', '', '2024-07-17 15:32', 'Laboratoire', 19),
(16, 'Hospitalisation Normal', 7, '2024-07-10 10:31', '', 6000, 0, 'OK', '', '2024-07-17 15:32', '', 19),
(17, 'Frais de chambre', 7, '2024-07-10 10:31', '', 12000, 3000, 'OK', '', '2024-07-17 15:32', '', 19),
(18, 'Glycémie à jeun', 4, '2024-07-10 15:42', 'ESP', 500, 500, 'OK', '', '2024-07-14 19:02', '', 15),
(19, 'C-HDL', 4, '2024-07-10 15:42', 'ESP', 500, 500, 'OK', '', '2024-07-14 19:02', '', 15),
(20, 'C-LDL', 4, '2024-07-10 15:42', 'ESP', 500, 500, 'OK', '', '2024-07-14 19:02', '', 15),
(21, 'Glycémie à jeun', 10, '2024-07-10 15:43', 'ESP', 500, 500, 'OK', '', '2024-07-14 19:02', '', 15),
(22, 'C-HDL', 10, '2024-07-10 15:43', 'ESP', 500, 500, 'OK', '', '2024-07-14 19:02', '', 15),
(23, 'C-LDL', 10, '2024-07-10 15:43', 'ESP', 500, 500, 'OK', '', '2024-07-14 19:02', '', 15),
(24, 'Frais de consultation Cardiologie', 11, '2024-07-14 14:17', 'ESP', 5000, 0, 'OK', '', '2024-07-14 14:17', 'consultation', 14),
(25, 'Cholestérol Total', 11, '2024-07-14 14:20', 'ESP', 500, 500, 'OK', '', '2024-07-14 19:02', 'Laboratoire', 15),
(26, 'Frais de consultation Cancérologie', 2, '2024-07-14 19:04', 'ESP', 5000, 0, 'OK', '', '2024-07-17 14:37', 'consultation', 18),
(27, 'Frais de consultation ORL', 12, '2024-07-14 19:08', 'ESP', 5000, 0, 'OK', '', '2024-07-15 10:27', 'consultation', 16),
(28, 'Hospitalisation Normal', 12, '2024-07-15 10:26', '', 6000, 0, 'OK', '', '2024-07-15 10:27', '', 16),
(29, 'Frais de chambre', 12, '2024-07-15 10:26', '', 12000, 3000, 'OK', '', '2024-07-15 10:27', '', 16),
(30, 'Frais de consultation Dentiste', 17, '2024-07-17 10:48', 'ESP', 5000, 0, 'OK', '', '2024-07-17 10:55', 'consultation', 17),
(34, 'Frais de consultation Dentiste', 19, '2024-07-19 14:03', 'CAS', 0, 3000, 'IMPAYER', '', '0', 'consultation', 0),
(35, 'Hospitalisation Normal', 19, '2024-07-19 20:14', '', 0, 0, 'IMPAYER', '', '', '', 0),
(36, 'Frais de chambre', 19, '2024-07-19 20:14', '', 12000, 3000, 'IMPAYER', '', '', '', 0),
(37, 'Frais de consultation Dentiste', 20, '2024-07-19 20:17', 'PSC', 2000, 3000, 'IMPAYER', '', '0', 'consultation', 0),
(38, 'Frais de consultation Dentiste', 21, '2024-07-19 20:17', 'PSC', 2000, 3000, 'IMPAYER', '', '0', 'consultation', 0),
(39, 'Frais de consultation Dentiste', 22, '2024-07-19 20:26', 'ESP', 2000, 3000, 'OK', '', '2024-07-24 9:14', 'consultation', 27),
(40, 'Frais de consultation Dentiste', 23, '2024-07-19 20:26', 'ESP', 5000, 0, 'OK', '', '2024-07-19 21:16', 'consultation', 23),
(41, 'Glycémie à jeun', 20, '2024-07-19 20:53', 'ESP', 500, 500, 'IMPAYER', '', '', 'Laboratoire', 0),
(42, 'Cholestérol Total', 20, '2024-07-19 20:53', 'ESP', 500, 500, 'IMPAYER', '', '', 'Laboratoire', 0),
(43, 'NFS', 20, '2024-07-19 20:53', 'ESP', 500, 500, 'IMPAYER', '', '', 'Laboratoire', 0),
(44, 'ECBU+Culture', 20, '2024-07-19 20:53', 'ESP', 4000, 500, 'IMPAYER', '', '', 'Laboratoire', 0),
(45, 'Urée', 22, '2024-07-19 21:00', 'ESP', 500, 500, 'OK', '', '2024-07-24 9:14', 'Laboratoire', 27),
(46, 'Calcium', 22, '2024-07-19 21:00', 'ESP', 500, 500, 'OK', '', '2024-07-24 9:14', 'Laboratoire', 27),
(47, 'Test d’Emmel', 22, '2024-07-19 21:00', 'ESP', 1000, 500, 'OK', '', '2024-07-24 9:14', 'Laboratoire', 27),
(48, 'FT3', 22, '2024-07-19 21:00', 'ESP', 2500, 500, 'OK', '', '2024-07-24 9:14', 'Laboratoire', 27),
(49, 'NFS', 23, '2024-07-19 21:13', 'ESP', 500, 500, 'OK', '', '2024-07-19 21:16', 'Laboratoire', 23),
(50, 'Echographie ', 19, '2024-07-19 21:15', 'ESP', 1000, 4000, 'IMPAYER', '', '', '', 0),
(51, 'Hospitalisation Normal', 20, '2024-07-19 21:22', '', 0, 0, 'IMPAYER', '', '', '', 0),
(52, 'Frais de chambre', 20, '2024-07-19 21:22', '', 12000, 3000, 'IMPAYER', '', '', '', 0),
(53, 'Hospitalisation Normal', 20, '2024-07-19 21:43', '', 0, 0, 'OK', '', '', '', 0),
(54, 'Frais de chambre', 20, '2024-07-19 21:43', '', 0, 3000, 'OK', '', '', '', 0),
(55, 'Hospitalisation Normal', 21, '2024-07-19 21:44', '', 0, 0, 'OK', '', '', '', 0),
(56, 'Frais de chambre', 21, '2024-07-19 21:44', '', 0, 3000, 'OK', '', '', '', 0),
(57, 'Hospitalisation Normal', 23, '2024-07-19 21:45', '', 0, 0, 'IMPAYER', '', '', '', 0),
(58, 'Frais de chambre', 23, '2024-07-19 21:45', '', 30000, 3000, 'IMPAYER', '', '', '', 0),
(59, 'Hospitalisation Normal', 22, '2024-07-19 21:46', '', 0, 0, 'OK', '', '2024-07-24 9:14', '', 27),
(60, 'Frais de chambre', 22, '2024-07-19 21:46', '', 120000, 3000, 'OK', '', '2024-07-24 9:14', '', 27),
(61, 'Hospitalisation Normal', 22, '2024-07-20 7:53', '', 0, 0, 'OK', '', '2024-07-24 9:14', '', 27),
(62, 'Frais de chambre', 22, '2024-07-20 7:53', '', 12000, 3000, 'OK', '', '2024-07-24 9:14', '', 27),
(63, 'Frais de consultation Dentiste', 24, '2024-07-20 9:57', 'PSC', 2000, 3000, 'IMPAYER', '', '0', 'consultation', 0),
(64, 'Frais de consultation Dentiste', 25, '2024-07-20 9:58', 'ESP', 5000, 0, 'OK', '', '2024-07-20 10:02', 'consultation', 26),
(65, 'Frais de consultation Dentiste', 26, '2024-07-20 10:00', 'PSC', 2000, 3000, 'OK', '', '2024-07-20 10:01', 'consultation', 25),
(66, 'Hospitalisation Normal', 24, '2024-07-20 10:09', '', 0, 0, 'OK', '', '', '', 0),
(67, 'Frais de chambre', 24, '2024-07-20 10:09', '', 0, 3000, 'OK', '', '', '', 0),
(68, 'Hospitalisation Normal', 25, '2024-07-20 10:11', '', 0, 0, 'IMPAYER', '', '', '', 0),
(69, 'Frais de chambre', 25, '2024-07-20 10:11', '', 12000, 3000, 'IMPAYER', '', '', '', 0),
(70, 'Frais de consultation Dentiste', 27, '2024-07-28 14:25', 'PSC', 2000, 3000, 'IMPAYER', '', '0', 'consultation', 0),
(71, 'Hospitalisation Normal', 28, '2024-07-28 15:41', '', 0, 0, 'OK', '', '2024-07-28 15:42', '', 28),
(72, 'Frais de chambre', 28, '2024-07-28 15:41', '', 21000, 3000, 'OK', '', '2024-07-28 15:42', '', 28),
(73, 'Amygdalectomie associé adénoïdectomie', 28, '2024-07-28 15:56', 'ESP', 12000, 40000, 'IMPAYER', '', '', '', 0),
(74, 'AG (anesthésie générale avec intubation)', 28, '2024-07-28 15:56', 'ESP', 1500, 10000, 'IMPAYER', '', '', '', 0),
(75, 'ECBU', 29, '2024-07-31 20:51', 'ESP', 500, 500, 'IMPAYER', '', '', '', 0),
(76, 'PV+ATB', 29, '2024-07-31 20:51', 'ESP', 4000, 500, 'IMPAYER', '', '', '', 0),
(77, 'Hospitalisation Normal', 29, '2024-08-01 9:06', '', 0, 0, 'IMPAYER', '', '', '', 0),
(78, 'Frais de chambre', 29, '2024-08-01 9:06', '', 0, 0, 'IMPAYER', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `factures`
--

CREATE TABLE `factures` (
  `codf` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `datef` varchar(20) NOT NULL,
  `type_paix` varchar(20) NOT NULL,
  `mtt` double NOT NULL,
  `nature` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factures`
--

INSERT INTO `factures` (`codf`, `idp`, `datef`, `type_paix`, `mtt`, `nature`) VALUES
(1, 2, '23-06-2024 13:14', '', 5000, ''),
(2, 4, '23-06-2024 13:22', '', 5000, ''),
(3, 1, '23-06-2024 13:26', '', 5000, ''),
(4, 2, '23-06-2024 13:27', '', 5000, ''),
(5, 4, '23-06-2024 13:36', '', 5000, ''),
(6, 2, '23-06-2024 13:39', '', 5000, ''),
(7, 6, '02-07-2024 11:12', '', 5000, ''),
(8, 8, '03-07-2024 10:20', '', 5000, ''),
(9, 9, '03-07-2024 22:12', '', 5000, ''),
(10, 5, '08-07-2024 14:47', '', 5000, ''),
(11, 1, '08-07-2024 21:51', '', 5000, ''),
(12, 4, '08-07-2024 21:51', '', 5000, ''),
(13, 7, '08-07-2024 21:55', '', 5000, ''),
(14, 11, '14-07-2024 14:17', '', 5000, ''),
(15, 0, '14-07-2024 19:01', '', 10000, ''),
(16, 12, '15-07-2024 10:27', '', 23000, ''),
(17, 17, '17-07-2024 10:55', '', 5000, ''),
(18, 2, '17-07-2024 14:37', '', 5000, ''),
(19, 7, '17-07-2024 15:32', '', 6000, ''),
(20, 22, '19-07-2024 20:50', '', 2000, ''),
(21, 23, '19-07-2024 20:51', '', 5000, ''),
(22, 22, '19-07-2024 21:00', '', 4500, ''),
(23, 23, '19-07-2024 21:16', '', 500, ''),
(24, 22, '19-07-2024 22:43', '', 120000, ''),
(25, 26, '20-07-2024 10:01', '', 2000, ''),
(26, 25, '20-07-2024 10:01', '', 5000, ''),
(27, 22, '24-07-2024 9:14', '', 12000, ''),
(28, 28, '28-07-2024 15:41', '', 21000, '');

-- --------------------------------------------------------

--
-- Table structure for table `hospitalisation`
--

CREATE TABLE `hospitalisation` (
  `idh` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `hospar` varchar(3) NOT NULL,
  `med_trai` varchar(3) NOT NULL,
  `date_hos` varchar(20) NOT NULL,
  `type_hos` varchar(20) NOT NULL,
  `motif_hos` text NOT NULL,
  `service` varchar(3) NOT NULL,
  `chambre` varchar(30) NOT NULL,
  `lit` varchar(20) NOT NULL,
  `tuteur` varchar(70) NOT NULL,
  `date_nai_garde` varchar(20) NOT NULL,
  `cdi` varchar(20) NOT NULL,
  `date_cdi` varchar(20) NOT NULL,
  `etat` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitalisation`
--

INSERT INTO `hospitalisation` (`idh`, `idp`, `hospar`, `med_trai`, `date_hos`, `type_hos`, `motif_hos`, `service`, `chambre`, `lit`, `tuteur`, `date_nai_garde`, `cdi`, `date_cdi`, `etat`) VALUES
(1, 7, '35', '35', '2024-07-08', 'Normal', 'Douleur Abdominal', 'OP', '5', '', 'Djama Said', '1985-12-23', '101', '2024-07-08', 'SOR'),
(2, 12, '35', '34', '2024-07-15', 'Normal', 'slkdjskld', 'PD', '5', '', 'sldfkmdslkf', '2000-12-12', '101', '2024-07-12', 'SOR'),
(3, 20, '34', '34', '2024-07-19', 'Normal', 'dfgsfdgdfg', 'MI', '5', '', 'zqdqsfdsdfs', '2000-12-12', '212', '2024-07-19', 'HOS'),
(4, 21, '34', '34', '2024-07-19', 'Normal', 'DFGSDFGSFD', 'OP', '5', '', 'ZDQDSFQDSF', '2024-07-18', '324', '2024-07-19', 'HOS'),
(5, 23, '34', '34', '2024-07-19', 'Normal', 'DQEFDFQFDS', 'GO', '2', '', 'DQqdfsqf', '2024-07-19', 'qdfqdfqdf', '2024-07-19', 'ENT'),
(6, 22, '34', '34', '2024-07-19', 'Normal', 'sdqfdfqsdf', 'GO', '4', '', 'qsdfqsdf', '2024-07-19', '2122', '2024-07-19', 'ENT'),
(7, 22, '36', '36', '2024-07-20', 'Normal', 'slkdjskldfj', 'OP', '5', '', 'qlsdkjqdlkfj', '2024-07-19', '342', '2024-07-20', 'ENT'),
(8, 24, '35', '35', '2024-07-20', 'Normal', 'MQDLFKQSML', 'MI', '5', '', 'DLFJKSDLFKJ', '1990-12-12', '102', '2024-07-20', 'ENT'),
(9, 25, '36', '36', '2024-07-20', 'Normal', 'LQDKFSLDKL', 'OP', '5', '', 'QKLDFJDLSKFJ', '1992-07-07', '102', '2024-07-20', 'ENT'),
(10, 28, '34', '34', '2024-07-28', 'Normal', 'DOULEUR ', 'MI', '6', '', 'OMAR DAOUD', '2001-12-12', '101', '2024-07-28', 'HOS'),
(11, 29, '34', '34', '2024-08-01', 'Normal', 'VPA + ASPAIKAJS', 'GO', '1', '', 'XXXXXXXXXX', '2024-08-01', '1', '2024-08-01', 'ENT');

-- --------------------------------------------------------

--
-- Table structure for table `imagerie`
--

CREATE TABLE `imagerie` (
  `idim` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `dateim` varchar(30) NOT NULL,
  `radiox` varchar(60) NOT NULL,
  `echo` varchar(50) NOT NULL,
  `ecg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `action` varchar(250) NOT NULL,
  `datedc` varchar(30) NOT NULL,
  `datefc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`id`, `user`, `action`, `datedc`, `datefc`) VALUES
(1, 'Mokinfo', 'Connexion', 'Sun 23/06/2024 14:43:03', ''),
(2, 'Mokinfo', 'Ajout de patient numero : 1', 'Sun 23/06/2024  14:44:23', ''),
(3, 'Mokinfo', 'Ajout de patient numero : 2', 'Sun 23/06/2024  15:09:10', ''),
(4, 'Mokinfo', 'Ajout de patient numero : 3', 'Sun 23/06/2024  15:10:41', ''),
(5, 'Mokinfo', 'Ajout de patient numero : 4', 'Sun 23/06/2024  15:22:21', ''),
(6, 'Mokinfo', 'Connexion', 'Mon 24/06/2024 11:35:37', ''),
(7, 'Mokinfo', 'Ajout de patient numero : 5', 'Mon 24/06/2024  15:00:31', ''),
(8, 'Mokinfo', 'Connexion', 'Tue 02/07/2024 12:54:09', ''),
(9, 'Mokinfo', 'Ajout de patient numero : 6', 'Tue 02/07/2024  13:04:10', ''),
(10, 'Mokinfo', 'Deconnexion', '', 'Tue 02/07/2024 11:10:39'),
(11, 'Liban', 'Connexion', 'Tue 02/07/2024 13:11:22', ''),
(12, 'Liban', 'Deconnexion', '', 'Tue 02/07/2024 11:12:12'),
(13, 'Mokinfo', 'Connexion', 'Tue 02/07/2024 13:12:17', ''),
(14, 'Mokinfo', 'Deconnexion', '', 'Tue 02/07/2024 11:12:43'),
(15, 'Liban', 'Connexion', 'Tue 02/07/2024 13:12:50', ''),
(16, 'Liban', 'Deconnexion', '', 'Tue 02/07/2024 11:31:45'),
(17, 'Mokinfo', 'Connexion', 'Tue 02/07/2024 13:32:03', ''),
(18, 'Mokinfo', 'Ajout de patient numero : 7', 'Wed 03/07/2024 11:04:27', ''),
(19, 'Mokinfo', 'Ajout de patient numero : 8', 'Wed 03/07/2024 11:37:14', ''),
(20, 'Mokinfo', 'Deconnexion', '', 'Wed 03/07/2024 10:17:15'),
(21, 'Mahyoub', 'Connexion', 'Wed 03/07/2024 12:17:29', ''),
(22, 'Mokinfo', 'Connexion', 'Wed 03/07/2024 12:19:41', ''),
(23, 'Mahyoub', 'Deconnexion', '', 'Wed 03/07/2024 15:02:03'),
(24, 'Mahyoub', 'Connexion', 'Wed 03/07/2024 17:02:34', ''),
(25, 'Mahyoub', 'Deconnexion', '', 'Wed 03/07/2024 15:45:57'),
(26, 'Mahyoub', 'Connexion', 'Thu 04/07/2024 00:08:28', ''),
(27, 'Mokinfo', 'Ajout de patient numero : 9', 'Thu 04/07/2024 00:11:32', ''),
(28, 'Mokinfo', 'Connexion', 'Mon 08/07/2024 12:11:02', ''),
(29, 'Mokinfo', 'Connexion', 'Mon 08/07/2024 23:34:07', ''),
(30, 'Mokinfo', 'Deconnexion', '', 'Mon 08/07/2024 21:54:03'),
(31, 'Ali', 'Connexion', 'Mon 08/07/2024 23:54:07', ''),
(32, 'Ali', 'Deconnexion', '', 'Mon 08/07/2024 21:54:42'),
(33, 'Mokinfo', 'Connexion', 'Mon 08/07/2024 23:54:47', ''),
(34, 'Mokinfo', 'Deconnexion', '', 'Mon 08/07/2024 21:55:54'),
(35, 'Ali', 'Connexion', 'Mon 08/07/2024 23:55:58', ''),
(36, 'Ali', 'Deconnexion', '', 'Tue 09/07/2024 10:25:31'),
(37, 'Mokinfo', 'Connexion', 'Tue 09/07/2024 12:25:36', ''),
(38, 'Mokinfo', 'Deconnexion', '', 'Tue 09/07/2024 11:08:37'),
(39, 'Rahma', 'Connexion', 'Tue 09/07/2024 13:08:46', ''),
(40, 'Rahma', 'Deconnexion', '', 'Tue 09/07/2024 11:15:48'),
(41, 'Mokinfo', 'Connexion', 'Tue 09/07/2024 13:15:54', ''),
(42, 'Mokinfo', 'Connexion', 'Tue 09/07/2024 16:29:03', ''),
(43, 'Mokinfo', 'Connexion', 'Wed 10/07/2024 17:40:40', ''),
(44, 'Mokinfo', 'Ajout de patient numero : 10', 'Wed 10/07/2024 17:43:22', ''),
(45, 'Mokinfo', 'Connexion', 'Thu 11/07/2024 11:11:14', ''),
(46, 'Mokinfo', 'Deconnexion', '', 'Thu 11/07/2024 13:21:11'),
(47, 'moussa', 'Connexion', 'Thu 11/07/2024 15:21:16', ''),
(48, 'moussa', 'Deconnexion', '', 'Sun 14/07/2024 10:01:38'),
(49, 'Mokinfo', 'Connexion', 'Sun 14/07/2024 12:01:44', ''),
(50, 'Mokinfo', 'Ajout de patient numero : 11', 'Sun 14/07/2024 12:02:19', ''),
(51, 'Liban', 'Connexion', 'Sun 14/07/2024 16:18:47', ''),
(52, 'Liban', 'Deconnexion', '', 'Sun 14/07/2024 14:38:05'),
(53, 'Mokinfo', 'Connexion', 'Sun 14/07/2024 16:38:09', ''),
(54, 'Mokinfo', 'Ajout de patient numero : 12', 'Sun 14/07/2024 21:08:35', ''),
(55, 'Mokinfo', 'Deconnexion', '', 'Sun 14/07/2024 19:31:10'),
(56, 'moussa', 'Connexion', 'Sun 14/07/2024 21:31:14', ''),
(57, 'Mokinfo', 'Connexion', 'Mon 15/07/2024 12:25:59', ''),
(58, 'Mokinfo', 'Nouvelle suivie : DSKLFJLDKFJ', '2024-07-15 10:31', '2024-07-15 10:31'),
(59, 'Mokinfo', 'Ajout de patient numero : 13', 'Mon 15/07/2024 17:07:39', ''),
(60, 'Mokinfo', 'Connexion', 'Tue 16/07/2024 11:13:35', ''),
(61, 'Mokinfo', 'Ajout de patient numero : 14', 'Tue 16/07/2024 12:45:18', ''),
(62, 'Mokinfo', 'Ajout de patient numero : 15', 'Tue 16/07/2024 12:57:06', ''),
(63, 'Mokinfo', 'Ajout de patient numero : 16', 'Wed 17/07/2024 12:09:17', ''),
(64, 'Mokinfo', 'Ajout de patient numero : 17', 'Wed 17/07/2024 12:41:25', ''),
(65, 'moussa', 'Connexion', 'Wed 17/07/2024 12:42:00', ''),
(66, 'Ali', 'Connexion', 'Wed 17/07/2024 12:58:56', ''),
(67, 'moussa', 'Ajout de patient numero : 18', 'Wed 17/07/2024 17:31:51', ''),
(68, 'Mokinfo', 'Ajout de patient numero : 19', 'Fri 19/07/2024 14:35:29', ''),
(69, 'Mokinfo', 'Ajout de patient numero : 20', 'Fri 19/07/2024 22:15:41', ''),
(70, 'Mokinfo', 'Ajout de patient numero : 21', 'Fri 19/07/2024 22:16:23', ''),
(71, 'Mokinfo', 'Ajout de patient numero : 22', 'Fri 19/07/2024 22:25:33', ''),
(72, 'Mokinfo', 'Ajout de patient numero : 23', 'Fri 19/07/2024 22:25:57', ''),
(73, 'moussa', 'Connexion', 'Sat 20/07/2024 00:44:04', ''),
(74, 'Mokinfo', 'Connexion', 'Sat 20/07/2024 07:23:39', ''),
(75, 'moussa', 'Connexion', 'Sat 20/07/2024 07:36:32', ''),
(76, 'Ali', 'Connexion', 'Sat 20/07/2024 08:23:45', ''),
(77, 'Mokinfo', 'Deconnexion', '', 'Sat 20/07/2024 07:59:28'),
(78, 'Mokinfo', 'Connexion', 'Sat 20/07/2024 10:49:32', ''),
(79, 'Mokinfo', 'Ajout de patient numero : 24', 'Sat 20/07/2024 11:56:07', ''),
(80, 'Mokinfo', 'Ajout de patient numero : 25', 'Sat 20/07/2024 11:57:11', ''),
(81, 'Mokinfo', 'Ajout de patient numero : 26', 'Sat 20/07/2024 12:00:09', ''),
(82, 'moussa', 'Ajout de patient numero : 27', 'Sat 20/07/2024 13:37:32', ''),
(83, 'Mokinfo', 'Connexion', 'Wed 24/07/2024 10:42:08', ''),
(84, 'Ali', 'Connexion', 'Sun 28/07/2024 16:26:17', ''),
(85, 'Mokinfo', 'Ajout de patient numero : 28', 'Sun 28/07/2024 17:38:52', ''),
(86, 'Mokinfo', 'Nouvelle suivie : Douleur thoraxique ', '2024-07-28 15:47', '2024-07-28 15:47'),
(87, 'Mokinfo', 'Connexion', 'Tue 30/07/2024 10:09:26', ''),
(88, 'Mokinfo', 'Connexion', 'Wed 31/07/2024 12:02:32', ''),
(89, 'Mokinfo', 'Ajout de patient numero : 29', 'Wed 31/07/2024 22:50:57', '');

-- --------------------------------------------------------

--
-- Table structure for table `medecin`
--

CREATE TABLE `medecin` (
  `idmed` int(11) NOT NULL,
  `idutilisateur` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `specialite` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medecin`
--

INSERT INTO `medecin` (`idmed`, `idutilisateur`, `nom`, `specialite`, `email`, `tel`) VALUES
(34, 18, 'Dr Liban Ibrahim Mohamed', 'CAR', 'liban.ibrahim@sspn.me', '77082412'),
(35, 19, 'Dr. Mahyoub Abdallah Mahyoub', 'CTC', 'buoyham@yahoo.fr', '77507389'),
(36, 20, 'Dr. Ali Abdi Ahmed', 'DEN', 'aliabdi@sspn.me', '77878290');

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `ido` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `too` varchar(10) NOT NULL,
  `opp` varchar(50) NOT NULL,
  `assist` varchar(100) NOT NULL,
  `anes` varchar(20) NOT NULL,
  `mode_anes` varchar(100) NOT NULL,
  `indic` text NOT NULL,
  `datenrop` varchar(20) NOT NULL,
  `datedop` varchar(20) NOT NULL,
  `heurdop` varchar(20) NOT NULL,
  `heurfop` varchar(20) NOT NULL,
  `datef` varchar(20) NOT NULL,
  `statu` varchar(100) NOT NULL,
  `mode_ann` varchar(100) NOT NULL,
  `trans_sang` text NOT NULL,
  `posi_pat` text NOT NULL,
  `loo` text NOT NULL,
  `goo` text NOT NULL,
  `eff` text NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`ido`, `idp`, `too`, `opp`, `assist`, `anes`, `mode_anes`, `indic`, `datenrop`, `datedop`, `heurdop`, `heurfop`, `datef`, `statu`, `mode_ann`, `trans_sang`, `posi_pat`, `loo`, `goo`, `eff`, `note`) VALUES
(1, 28, 'C7G11', '34', '', 'Dr Kamil Ahmed Kamil', 'AG (anesthésie générale avec intubation)', '', '28/07/2024', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ordonnance`
--

CREATE TABLE `ordonnance` (
  `ido` int(11) NOT NULL,
  `medic` varchar(100) NOT NULL,
  `poso` varchar(100) NOT NULL,
  `nbrjr` varchar(100) NOT NULL,
  `idp` int(11) NOT NULL,
  `idpc` int(11) NOT NULL,
  `idord` int(11) NOT NULL,
  `datord` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordonnance`
--

INSERT INTO `ordonnance` (`ido`, `medic`, `poso`, `nbrjr`, `idp`, `idpc`, `idord`, `datord`) VALUES
(1, 'DOLIPRANE', '1 COMPRIME 3 FOIS PAR JOUR', '5 JOURS', 6, 1, 1, '02/07/2024'),
(2, 'DOLIPRANE', '3 x 1', '2 Semaines', 8, 1, 2, '03/07/2024'),
(3, 'Augmentin', '2 x 1', '15 jours', 8, 1, 2, '03/07/2024'),
(4, 'Doliprane', '2 x 1', '15 jours', 9, 2, 3, '03/07/2024'),
(5, 'Augmentin', '2 x 1', '1 semaine', 9, 2, 3, '03/07/2024'),
(6, 'Omeprozole', '3 x 1', '2 semaines', 9, 2, 3, '03/07/2024'),
(7, 'Doliprane', '2 x 1', '15 jours', 7, 3, 4, '09/07/2024'),
(8, 'Augmentin', '1 x 1 ', '2 Semaines', 7, 3, 4, '09/07/2024');

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
  `dateinsp` varchar(30) NOT NULL,
  `catp` varchar(6) NOT NULL,
  `matricule` varchar(15) NOT NULL,
  `cnss` varchar(3) NOT NULL,
  `numcnss` varchar(30) NOT NULL,
  `affect` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`idp`, `nom`, `civi`, `daten`, `age`, `sex`, `sitfam`, `address`, `tel`, `email`, `dateinsp`, `catp`, `matricule`, `cnss`, `numcnss`, `affect`) VALUES
(1, 'ALI IDRISS', 'M.', '2000-12-12', 23, 'Masculin', 'Marié', '', '77878787', 'moktarsaid@gmail.com', '23/06/2024', 'CIV', 'NON', 'NON', '', 'lab'),
(2, 'Halimo omar', 'Mlle', '2001-12-13', 22, 'Féminin', 'Marié', '', '77878798', 'moktar', '23/06/2024', 'CCC', '', 'NON', '', '0'),
(3, 'Abdi Omar Adaweh', 'M.', '2000-12-14', 23, 'Masculin', 'Marié', '', '77878790', 'moktarsaid@gmail.com', '23/06/2024', 'CIV', 'NON', 'NON', '', 'med'),
(4, 'Janaleh Yacin', 'M.', '1988-12-12', 35, 'Masculin', 'Marié', '', '77878789', 'moktarsaid@gmail.com', '23/06/2024', 'CIV', 'NON', 'NON', '', 'med'),
(5, 'ALI FARAH', 'M.', '1990-10-14', 33, 'Masculin', 'Marié', '', '77676765', 'koiyt@gmail.com', '24/06/2024', 'CIV', 'NON', 'NON', '', 'med'),
(6, 'Ali farah', 'M.', '1985-12-23', 38, 'Masculin', 'Marié', '', '77878789', 'moktarsaid@gmail.com', '02/07/2024', 'CIV', 'NON', 'NON', '', 'med'),
(7, 'MOUSSA ISSACK FARAH', 'M.', '1990-12-12', 33, 'Masculin', 'Marié', '', '77675646', 'moktarsaid@gmail.com', '03/07/2024', 'CIV', 'NON', 'NON', '', 'med'),
(8, 'HAMZA MOHAMED', 'M.', '1990-12-12', 33, 'Masculin', 'Marié', '', '77878789', 'moktarsaid@gmail.com', '03/07/2024', 'CIV', 'NON', 'NON', '', 'med'),
(9, 'MOHAMED ADEN ALI', 'M.', '2000-12-12', 23, 'Masculin', 'Célibataire', '', '77876756', '', '03/07/2024', 'CIV', 'NON', 'NON', '', 'med'),
(10, 'MOHAMED ABDALLAH AIMAR', 'M.', '1991-12-12', 32, 'Masculin', 'Marié', '', '77676755', '', '10/07/2024', 'CIV', 'NON', 'NON', '', 'lab'),
(11, 'MOHAMED HASSAN WABERI', 'M.', '1999-12-12', 24, 'Masculin', 'Marié', '', '77656453', 'moktarsaid@gmail.com', '14/07/2024', 'CIV', 'NON', 'NON', '', 'med'),
(12, 'QBDI ADEN', 'M.', '1990-12-12', 33, 'Masculin', 'Marié', '', '77564534', '', '14/07/2024', 'CIV', 'NON', 'NON', '', 'med'),
(13, 'Mahamoud Ahmed', 'M.', '1985-12-12', 38, 'Masculin', 'Marié', '', '77283728', '', '15/07/2024', 'CIV', 'NON', 'OUI', '', 'med'),
(14, 'qsdsdsqd', 'M.', '1995-12-12', 28, 'Masculin', 'Marié', '', '77676766', '', '16/07/2024', 'POR', '', 'NON', '', '0'),
(15, 'ffsdfsdf', 'M.', '2024-07-16', 0, 'Masculin', 'Marié', '', '77676765', '', '16/07/2024', 'POA', '3465656456456', 'NON', '', '0'),
(16, 'SDFSFSF', 'M.', '1990-12-12', 33, 'Masculin', 'SF', '', '0', '', '17/07/2024', 'POA', '2131', 'OUI', '123134342', 'med'),
(17, 'ALI FARAH OMAR', 'M.', '1990-12-12', 33, 'Masculin', 'Marié', '', '77878787', '', '17/07/2024', 'CIV', 'NON', 'NON', '', 'med'),
(18, 'MAHAMOUD ALI ROBLEH', 'M.', '1985-12-12', 38, 'Masculin', 'Marié', '', '77878780', '', '17/07/2024', 'CIV', 'NON', 'NON', '', 'med'),
(19, 'SAHAL ADEN', 'M.', '1989-12-12', 34, 'Masculin', 'Marié', '', '77878789', '', '19/07/2024', 'AGE', 'NON', 'OUI', '276453742', 'med'),
(20, 'XXXXXXXXXX', 'M.', '1999-12-12', 24, 'Masculin', 'Célibataire', '', '77676767', '', '19/07/2024', 'POA', '1243', 'OUI', '124324315', 'med'),
(21, 'YYYYYYYYYYYYY', 'Mlle', '2000-12-12', 23, 'Féminin', 'Célibataire', '', '7767676', '', '19/07/2024', 'FPA', '2354', 'OUI', '312314234', 'med'),
(22, 'ZZZZZZZZZZZZZZ', 'M.', '1998-12-13', 25, 'Masculin', 'Célibataire', '', '77676765', '', '19/07/2024', 'CIV', 'NON', 'OUI', '412342343', 'med'),
(23, 'EEEEEEEEEEEEEE', 'M.', '1990-12-14', 33, 'Masculin', 'Célibataire', '', '77676564', '', '19/07/2024', 'CIV', 'NON', 'NON', '', 'med'),
(24, 'Abdoulkader', 'M.', '1990-12-12', 33, 'Masculin', 'Célibataire', '', '77878789', '', '20/07/2024', 'POA', '7364', 'OUI', '347863248', 'med'),
(25, 'Mahamoud Ahmed Daher', 'M.', '1992-12-13', 31, 'Masculin', 'Célibataire', '', '77878675', '', '20/07/2024', 'CIV', 'NON', 'NON', '', 'med'),
(26, 'DJIBRIL OMAR', 'M.', '2001-12-12', 22, 'Masculin', 'Marié', '', '77872392', '', '20/07/2024', 'CIV', 'NON', 'OUI', '573486534', 'med'),
(27, 'ABDILLAHI OMAR ELMI', 'M.', '1980-01-01', 44, 'Masculin', 'Célibataire', 'BALBALA', '77823454', '', '20/07/2024', 'POA', '5467', 'OUI', '190345567', 'med'),
(28, 'IBRAHIM DAOUD ALI', 'M.', '2000-12-12', 23, 'Masculin', 'Célibataire', 'HERON', '77637364', '', '28/07/2024', 'CIV', 'NON', 'OUI', '827439247', 'hos'),
(29, 'ASMA', 'Mme', '1997-12-11', 26, 'Féminin', 'Marié', '', '77677676', '', '31/07/2024', 'CIV', 'NON', 'NON', '', 'lab');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `idpc` int(11) NOT NULL,
  `datord` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `idp`, `idpc`, `datord`) VALUES
(1, 6, 1, '02/07/2024'),
(2, 8, 1, '03/07/2024'),
(3, 9, 2, '03/07/2024'),
(4, 7, 3, '09/07/2024');

-- --------------------------------------------------------

--
-- Table structure for table `radiolo`
--

CREATE TABLE `radiolo` (
  `idexam` int(11) NOT NULL,
  `idan` int(11) NOT NULL,
  `identexam` int(11) NOT NULL,
  `heurdexam` varchar(30) NOT NULL,
  `datexam` varchar(30) NOT NULL,
  `motif` varchar(40) NOT NULL,
  `radiox` float NOT NULL,
  `echo` float NOT NULL,
  `ecg` float NOT NULL,
  `pandoc` float NOT NULL,
  `pcandoc` float NOT NULL,
  `chk` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radiolo`
--

INSERT INTO `radiolo` (`idexam`, `idan`, `identexam`, `heurdexam`, `datexam`, `motif`, `radiox`, `echo`, `ecg`, `pandoc`, `pcandoc`, `chk`) VALUES
(1, 19, 13, '23:15:18', '2024-07-19 21:15', '', 0, 1, 0, 5000, 4000, 'NON');

-- --------------------------------------------------------

--
-- Table structure for table `sortie_hos`
--

CREATE TABLE `sortie_hos` (
  `ids` int(11) NOT NULL,
  `date_sor_hos` varchar(20) NOT NULL,
  `pardr` int(11) NOT NULL,
  `revoir` varchar(70) NOT NULL,
  `cni` varchar(20) NOT NULL,
  `date_deliv` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sortie_hos`
--

INSERT INTO `sortie_hos` (`ids`, `date_sor_hos`, `pardr`, `revoir`, `cni`, `date_deliv`) VALUES
(1, '10/07/2024 10:52', 0, 'sdfsdf', '123232', '2024-07-10'),
(2, '15/07/2024 10:31', 35, 'DFGDFG', '121', '2024-07-15'),
(3, '20/07/2024 5:57', 34, 'Dans 2 Semaines', '0', '2024-07-20'),
(4, '20/07/2024 6:53', 35, 'Dans 1 Semaine', '0', '2024-07-20'),
(10, '29/07/2024 8:36', 34, 'Dans 1 Semaine', '0', '2024-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `suivie`
--

CREATE TABLE `suivie` (
  `ids` int(11) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `date_suivie` varchar(20) NOT NULL,
  `idh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suivie`
--

INSERT INTO `suivie` (`ids`, `intitule`, `date_suivie`, `idh`) VALUES
(1, 'DSKLFJLDKFJ', '2024-07-15', 2),
(2, 'Douleur thoraxique ', '2024-07-28', 10);

-- --------------------------------------------------------

--
-- Table structure for table `userse`
--

CREATE TABLE `userse` (
  `id` int(11) NOT NULL,
  `firstname` varchar(191) NOT NULL,
  `lastname` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `utilisateur` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `motspasse` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(2) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `utilisateur`, `motspasse`, `role`, `file_name`, `uploaded_on`, `status`) VALUES
(3, 'Dr. Mokinfo Said Beile', 'Mokinfo', '123', 8, 'mokinfo.jpg', 'Sun 09/06/2024  11:38:43', '1'),
(18, 'Dr Liban Ibrahim Mohamed', 'Liban', '123', 3, '18.png', '2024-07-02 11:10:18', '1'),
(19, 'Dr. Mahyoub Abdallah Mahyoub', 'Mahyoub', '123', 3, '19.jpg', '2024-07-03 10:16:59', '1'),
(20, 'Dr. Ali Abdi Ahmed', 'Ali', '123', 3, '20.jpg', '2024-07-08 21:53:38', '1'),
(23, 'MOUSSA ISSACK FARAH', 'moussa', '123', 1, '23.jpg', '2024-07-11 13:01:57', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acte`
--
ALTER TABLE `acte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actes`
--
ALTER TABLE `actes`
  ADD PRIMARY KEY (`ida`);

--
-- Indexes for table `andoc`
--
ALTER TABLE `andoc`
  ADD PRIMARY KEY (`idexam`);

--
-- Indexes for table `andocs`
--
ALTER TABLE `andocs`
  ADD PRIMARY KEY (`idexam`),
  ADD KEY `idan` (`idan`),
  ADD KEY `idan_2` (`idan`),
  ADD KEY `idan_3` (`idan`),
  ADD KEY `idan_4` (`idan`);

--
-- Indexes for table `caisse`
--
ALTER TABLE `caisse`
  ADD PRIMARY KEY (`idc`);

--
-- Indexes for table `connection`
--
ALTER TABLE `connection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consult`
--
ALTER TABLE `consult`
  ADD PRIMARY KEY (`idcons`),
  ADD KEY `consult_ibfk_1` (`idpa`),
  ADD KEY `fk_idmed_consult` (`numed`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`iddoc`);

--
-- Indexes for table `entre`
--
ALTER TABLE `entre`
  ADD PRIMARY KEY (`ident`);

--
-- Indexes for table `entrelab`
--
ALTER TABLE `entrelab`
  ADD PRIMARY KEY (`identlab`);

--
-- Indexes for table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`ide`);

--
-- Indexes for table `examens`
--
ALTER TABLE `examens`
  ADD PRIMARY KEY (`ide`),
  ADD KEY `idp` (`idp`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`idf`);

--
-- Indexes for table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`codf`);

--
-- Indexes for table `hospitalisation`
--
ALTER TABLE `hospitalisation`
  ADD PRIMARY KEY (`idh`),
  ADD KEY `idp` (`idp`);

--
-- Indexes for table `imagerie`
--
ALTER TABLE `imagerie`
  ADD PRIMARY KEY (`idim`),
  ADD KEY `fk_patient` (`idp`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`idmed`),
  ADD KEY `fk_idutilisateur_medecin` (`idutilisateur`);

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`ido`);

--
-- Indexes for table `ordonnance`
--
ALTER TABLE `ordonnance`
  ADD PRIMARY KEY (`ido`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idp`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radiolo`
--
ALTER TABLE `radiolo`
  ADD PRIMARY KEY (`idexam`);

--
-- Indexes for table `sortie_hos`
--
ALTER TABLE `sortie_hos`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `suivie`
--
ALTER TABLE `suivie`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actes`
--
ALTER TABLE `actes`
  MODIFY `ida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `caisse`
--
ALTER TABLE `caisse`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `connection`
--
ALTER TABLE `connection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consult`
--
ALTER TABLE `consult`
  MODIFY `idcons` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `iddoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `idf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `hospitalisation`
--
ALTER TABLE `hospitalisation`
  MODIFY `idh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `idmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `ido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordonnance`
--
ALTER TABLE `ordonnance`
  MODIFY `ido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `radiolo`
--
ALTER TABLE `radiolo`
  MODIFY `idexam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sortie_hos`
--
ALTER TABLE `sortie_hos`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consult`
--
ALTER TABLE `consult`
  ADD CONSTRAINT `consult_ibfk_1` FOREIGN KEY (`idpa`) REFERENCES `patient` (`idp`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_idmed_consult` FOREIGN KEY (`numed`) REFERENCES `medecin` (`idmed`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examens`
--
ALTER TABLE `examens`
  ADD CONSTRAINT `fk_patient_examens` FOREIGN KEY (`idp`) REFERENCES `patient` (`idp`) ON DELETE CASCADE;

--
-- Constraints for table `hospitalisation`
--
ALTER TABLE `hospitalisation`
  ADD CONSTRAINT `fk_patient_hospitalisation` FOREIGN KEY (`idp`) REFERENCES `patient` (`idp`) ON DELETE CASCADE,
  ADD CONSTRAINT `hospitalisation_ibfk_1` FOREIGN KEY (`idp`) REFERENCES `patient` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imagerie`
--
ALTER TABLE `imagerie`
  ADD CONSTRAINT `fk_patient` FOREIGN KEY (`idp`) REFERENCES `patient` (`idp`) ON DELETE CASCADE;

--
-- Constraints for table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `fk_idutilisateur_medecin` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
