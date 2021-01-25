-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 24 Janvier 2021 à 20:07
-- Version du serveur :  10.3.25-MariaDB-0+deb10u1
-- Version de PHP :  7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `casier_connecte`
--

-- --------------------------------------------------------

--
-- Structure de la table `casier`
--

CREATE TABLE `casier` (
  `id_casier` varchar(1) NOT NULL,
  `Couleur` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `adresse_ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `casier`
--

INSERT INTO `casier` (`id_casier`, `Couleur`, `description`, `adresse_ip`) VALUES
('A', 'Rouge', 'test', 'test'),
('B', 'Bleu', 'test', '192.168.1.44');

-- --------------------------------------------------------

--
-- Structure de la table `composants_electroniques`
--

CREATE TABLE `composants_electroniques` (
  `id_produit` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `utilite` varchar(50) DEFAULT NULL,
  `pas` varchar(50) DEFAULT NULL,
  `couleur` varchar(50) DEFAULT NULL,
  `amperage` varchar(50) DEFAULT NULL,
  `tension` varchar(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `nb_position` varchar(50) DEFAULT NULL,
  `nb_col` varchar(50) DEFAULT NULL,
  `nb_ligne` varchar(50) DEFAULT 'NULL',
  `diametre` varchar(50) DEFAULT NULL,
  `diam_cable_min` varchar(50) DEFAULT NULL,
  `diam_cable_max` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `composants_electroniques`
--

INSERT INTO `composants_electroniques` (`id_produit`, `type`, `utilite`, `pas`, `couleur`, `amperage`, `tension`, `genre`, `nb_position`, `nb_col`, `nb_ligne`, `diametre`, `diam_cable_min`, `diam_cable_max`) VALUES
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Vrac', 'Vrac'),
(64, 'Jack 1.3', NULL, NULL, NULL, '1', '12', 'Femelle', NULL, NULL, 'NULL', NULL, NULL, NULL),
(65, 'Rond', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NULL', '9', NULL, '7'),
(86, 'Vrac', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NULL', NULL, NULL, NULL),
(87, 'Cartouche', NULL, NULL, NULL, 'Vrac', 'Vrac', NULL, NULL, NULL, 'NULL', '5', NULL, NULL),
(88, 'Classique', NULL, NULL, 'Vrac', NULL, NULL, NULL, NULL, NULL, 'NULL', 'Vrac', NULL, NULL),
(89, 'Incandescente', NULL, NULL, NULL, 'Vrac', 'Vrac', NULL, NULL, NULL, 'NULL', 'Vrac', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `elements_mecaniques`
--

CREATE TABLE `elements_mecaniques` (
  `id_produit` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `ref_comm` varchar(50) DEFAULT NULL,
  `epaisseur` varchar(50) DEFAULT NULL,
  `filetage` varchar(50) DEFAULT NULL,
  `pas` varchar(50) DEFAULT NULL,
  `diametre` varchar(50) DEFAULT NULL,
  `diametre_int` varchar(50) DEFAULT NULL,
  `diametre_ext` varchar(50) DEFAULT NULL,
  `diametre_1` varchar(50) DEFAULT NULL,
  `diametre_2` varchar(50) DEFAULT NULL,
  `genre` varchar(10) DEFAULT NULL,
  `nb_dent` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `elements_mecaniques`
--

INSERT INTO `elements_mecaniques` (`id_produit`, `type`, `ref_comm`, `epaisseur`, `filetage`, `pas`, `diametre`, `diametre_int`, `diametre_ext`, `diametre_1`, `diametre_2`, `genre`, `nb_dent`) VALUES
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '8', NULL, NULL),
(24, NULL, 'F8-19G', '7', NULL, NULL, NULL, '8', '19', NULL, NULL, NULL, NULL),
(36, NULL, NULL, NULL, NULL, NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Linéaire', 'LM8UU', '24', NULL, NULL, NULL, '8', '15', NULL, NULL, NULL, NULL),
(46, 'Linéaire', 'TK10UU-SK', '29', NULL, NULL, NULL, '10', '19', NULL, NULL, NULL, NULL),
(51, NULL, NULL, '9', NULL, NULL, 'M6', '6', NULL, NULL, NULL, 'Male', NULL),
(75, 'Classique', 'Vrac', 'Vrac', NULL, NULL, NULL, 'Vrac', 'Vrac', NULL, NULL, NULL, NULL),
(76, 'Verre', NULL, NULL, NULL, NULL, '16.8', NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'Classique', '608-ZZ', '7', NULL, NULL, NULL, '8', '22', NULL, NULL, NULL, NULL),
(96, 'Acier', NULL, NULL, NULL, NULL, '16', NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'Nema 17', NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'GT2', NULL, '16', NULL, '2', NULL, '8', '16', NULL, NULL, NULL, '20'),
(123, 'GT2', NULL, '16', NULL, '2', NULL, '5', '16', NULL, NULL, NULL, '20'),
(124, 'Vrac', NULL, 'Vrac', NULL, 'Vrac', NULL, 'Vrac', 'Vrac', NULL, NULL, NULL, 'Vrac');

-- --------------------------------------------------------

--
-- Structure de la table `emplacement`
--

CREATE TABLE `emplacement` (
  `id_produit` int(11) NOT NULL,
  `id_casier` varchar(1) NOT NULL,
  `num` varchar(2) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `emplacement`
--

INSERT INTO `emplacement` (`id_produit`, `id_casier`, `num`, `quantite`) VALUES
(1, 'B', '01', 1),
(2, 'B', '01', 1),
(3, 'B', '01', 1),
(4, 'B', '02', 1),
(5, 'B', '02', 1),
(6, 'B', '03', 1),
(7, 'B', '04', 1),
(8, 'B', '04', 1),
(9, 'B', '04', 1),
(10, 'B', '05', 1),
(11, 'B', '06', 1),
(12, 'B', '06', 1),
(13, 'B', '07', 1),
(14, 'B', '08', 1),
(15, 'B', '09', 1),
(16, 'B', '10', 1),
(17, 'B', '10', 1),
(18, 'B', '11', 1),
(19, 'B', '11', 1),
(20, 'B', '11', 1),
(21, 'B', '09', 1),
(22, 'B', '13', 1),
(23, 'B', '13', 1),
(24, 'B', '13', 1),
(25, 'B', '14', 1),
(26, 'B', '15', 1),
(27, 'B', '16', 1),
(28, 'B', '16', 1),
(29, 'B', '17', 1),
(30, 'B', '17', 1),
(31, 'B', '18', 1),
(32, 'B', '18', 1),
(33, 'B', '19', 1),
(34, 'B', '19', 1),
(35, 'B', '20', 1),
(36, 'B', '20', 1),
(37, 'B', '21', 1),
(38, 'B', '21', 1),
(39, 'B', '22', 1),
(40, 'B', '22', 1),
(41, 'B', '22', 1),
(42, 'B', '23', 1),
(43, 'B', '24', 1),
(44, 'B', '25', 1),
(45, 'B', '24', 1),
(46, 'B', '26', 1),
(47, 'B', '27', 1),
(48, 'B', '27', 1),
(49, 'B', '27', 1),
(50, 'B', '28', 1),
(51, 'B', '28', 1),
(52, 'B', '32', 1),
(53, 'B', '33', 1),
(54, 'B', '33', 1),
(55, 'B', '34', 1),
(56, 'B', '34', 1),
(57, 'B', '34', 1),
(58, 'B', '35', 1),
(59, 'B', '35', 1),
(60, 'B', '37', 1),
(61, 'B', '37', 1),
(62, 'B', '41', 1),
(63, 'B', '41', 1),
(64, 'B', '42', 1),
(65, 'B', '42', 1),
(66, 'B', '44', 1),
(67, 'B', '46', 1),
(68, 'B', '46', 1),
(69, 'B', '46', 1),
(70, 'B', '47', 1),
(71, 'B', '47', 1),
(72, 'B', '48', 1),
(73, 'B', '49', 1),
(74, 'B', '50', 1),
(75, 'A', '01', 1),
(76, 'A', '02', 1),
(77, 'A', '02', 1),
(78, 'A', '04', 1),
(79, 'A', '05', 1),
(80, 'A', '06', 1),
(81, 'A', '06', 1),
(82, 'A', '07', 1),
(83, 'A', '07', 1),
(84, 'A', '08', 1),
(85, 'A', '09', 1),
(86, 'A', '09', 1),
(87, 'A', '09', 1),
(88, 'A', '10', 1),
(89, 'A', '10', 1),
(90, 'A', '11', 1),
(91, 'A', '11', 1),
(92, 'A', '12', 1),
(93, 'A', '12', 1),
(94, 'A', '12', 1),
(95, 'A', '13', 1),
(96, 'A', '14', 1),
(97, 'A', '15', 1),
(98, 'A', '15', 1),
(99, 'A', '16', 1),
(100, 'A', '17', 1),
(101, 'A', '17', 1),
(102, 'A', '18', 1),
(103, 'A', '18', 1),
(104, 'A', '19', 1),
(105, 'A', '19', 1),
(106, 'A', '19', 1),
(107, 'A', '20', 1),
(108, 'A', '20', 1),
(109, 'A', '21', 1),
(110, 'A', '22', 1),
(111, 'A', '23', 1),
(112, 'A', '23', 1),
(113, 'A', '24', 1),
(114, 'A', '25', 1),
(115, 'A', '25', 1),
(116, 'A', '25', 1),
(117, 'A', '26', 1),
(118, 'A', '27', 1),
(119, 'A', '27', 1),
(120, 'A', '28', 1),
(121, 'A', '28', 1),
(122, 'A', '29', 1),
(123, 'A', '29', 1),
(124, 'A', '29', 1),
(125, 'A', '30', 1),
(126, 'A', '30', 1),
(127, 'A', '31', 1),
(128, 'A', '31', 1),
(129, 'A', '32', 1),
(130, 'A', '33', 1),
(131, 'A', '34', 1),
(132, 'A', '34', 1),
(133, 'A', '34', 1),
(134, 'A', '35', 1),
(135, 'A', '36', 1),
(136, 'A', '36', 1),
(137, 'A', '37', 1),
(138, 'A', '37', 1),
(139, 'A', '38', 1),
(140, 'A', '39', 1),
(141, 'A', '39', 1),
(142, 'A', '40', 1),
(143, 'A', '41', 1),
(144, 'A', '41', 1),
(145, 'A', '42', 1),
(146, 'A', '42', 1),
(147, 'A', '42', 1),
(148, 'A', '43', 1),
(149, 'A', '44', 1),
(150, 'A', '44', 1),
(151, 'A', '45', 1),
(152, 'A', '45', 1),
(153, 'A', '46', 1),
(154, 'A', '46', 1),
(155, 'A', '47', 1),
(156, 'A', '48', 1),
(157, 'A', '49', 1),
(158, 'A', '49', 1),
(159, 'A', '49', 1),
(160, 'A', '50', 1),
(161, 'A', '50', 1),
(162, 'A', '50', 1);

-- --------------------------------------------------------

--
-- Structure de la table `outils`
--

CREATE TABLE `outils` (
  `id_produit` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `utilite` varchar(50) DEFAULT NULL,
  `diametre` varchar(50) DEFAULT NULL,
  `connecteur_pince` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `outils`
--

INSERT INTO `outils` (`id_produit`, `type`, `utilite`, `diametre`, `connecteur_pince`) VALUES
(25, NULL, NULL, 'M6', NULL),
(71, 'Crocodile', NULL, NULL, 'fiche banane'),
(74, 'Banane', NULL, '4', NULL),
(102, 'Vrac', 'Vrac', 'Vrac', NULL),
(103, 'Vrac', 'Vrac', 'Vrac', NULL),
(148, 'Vrac', 'Vrac', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `photo_prod` varchar(50) DEFAULT NULL,
  `id_sous_categ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `photo_prod`, `id_sous_categ`) VALUES
(1, 'Vis métrique-tete fraisée.jpg', 1),
(2, 'Vis métrique-tete fraisée.jpg', 1),
(3, 'Vis métrique-tete fraisée.jpg', 1),
(4, 'Vis métrique-tete cylindrique.jpg', 1),
(5, 'Vis métrique-tete fraisée.jpg', 1),
(6, 'Vis métrique-tete bombée.jpg', 1),
(7, 'Rondelle-Grower.jpg', 2),
(8, 'Rondelle-Grower.jpg', 2),
(9, 'Rondelle-Plate.jpg', 2),
(10, 'Vis à bois-tete fraisée.jpg', 3),
(11, 'Vis métrique-tete fendue.jpg', 1),
(12, 'Vis métrique-tete cylindrique.jpg', 1),
(13, 'Vis métrique-tete cylindrique.jpg', 1),
(14, 'Attache cable-Pontet rond.jpg', 4),
(15, 'Vis métrique-Vrac.jpg', 1),
(16, 'Ecrou-Classique.jpg', 5),
(17, 'Ecrou-Nylstop.jpg', 5),
(18, 'Entretoise-.jpg', 6),
(19, 'Entretoise-.jpg', 6),
(20, 'Entretoise-.jpg', 6),
(21, 'Entretoise-.jpg', 6),
(22, 'Accouplement élastique-.jpg', 7),
(23, 'Vis pression-.jpg', 8),
(24, 'Buté à billes-.jpg', 9),
(25, 'Fillets rapportés-.jpg', 10),
(26, 'Domino-.jpg', 11),
(27, 'Rondelle-Plate.jpg', 2),
(28, 'Rondelle-Plate.jpg', 2),
(29, 'Vis métrique-tete cylindrique.jpg', 1),
(30, 'Vis métrique-tete fraisée.jpg', 1),
(31, 'Vis métrique-tete hexagonale.jpg', 1),
(32, 'Vis métrique-tete bombée.jpg', 1),
(33, 'Vis métrique-tete bombée.jpg', 1),
(34, 'Vis métrique-tete bombée.jpg', 1),
(35, 'Vis métrique-tete hexagonale.jpg', 1),
(36, 'Ventouse-.jpg', 12),
(37, 'Vis métrique-tete hexagonale.jpg', 1),
(38, 'Vis métrique-tete hexagonale.jpg', 1),
(39, 'Vis métrique-tete bombée.jpg', 1),
(40, 'Rondelle-Plate.jpg', 2),
(41, 'Ecrou-Frein.jpg', 5),
(42, 'Vis métrique-tete hexagonale.jpg', 1),
(43, 'Vis à bois-tete fraisée.jpg', 3),
(44, 'Vis à bois-tete fraisée.jpg', 3),
(45, 'Roulement-Linéaire.jpg', 13),
(46, 'Roulement-Linéaire.jpg', 13),
(47, 'Rivet-tête fraisée.jpg', 14),
(48, 'Rivet-tête large.jpg', 14),
(49, 'Rivet-tête bombée.jpg', 14),
(50, 'Vis métrique-tête bombée.jpg', 1),
(51, 'Rotule-.jpg', 15),
(52, 'Attache cable-Pontet.jpg', 4),
(53, 'Vis à bois-tête fraisée.jpg', 3),
(54, 'Cheville-à expension.jpg', 16),
(55, 'Vis métrique-Poelier.jpg', 1),
(56, 'Insert-fileté.jpg', 17),
(57, 'Vis métrique-tete cylindrique.jpg', 1),
(58, 'Vis métrique-tete fraisée.jpg', 1),
(59, 'Vis métrique-tete fraisée.jpg', 1),
(60, 'Tourillon-Rayé.jpg', 18),
(61, 'Cheville-à frapper.jpg', 16),
(62, 'Vis métrique-tete fendue.jpg', 1),
(63, 'Etrier-Cylindrique.jpg', 19),
(64, 'Prise-Jack 1.3.jpg', 20),
(65, 'Passe cable-Rond.jpg', 21),
(66, 'Vis métrique-tete hexagonale.jpg', 1),
(67, 'Vis métrique-tete fraisée.jpg', 1),
(68, 'Vis métrique-tete hexagonale.jpg', 1),
(69, 'Vis métrique-tete fendue.jpg', 1),
(70, 'Vis métrique-tete fendue.jpg', 1),
(71, 'Pince-Crocodile.jpg', 22),
(72, 'Cache Bosch-Bout.jpg', 23),
(73, 'Cache Bosch-Equerre.jpg', 23),
(74, 'Connecteur-Banane.jpg', 24),
(75, 'Roulement-Classique.jpg', 13),
(76, 'Bille-Verre.jpg', 25),
(77, 'Vis métrique-tete fendue.jpg', 1),
(78, 'Vis à bois-tete fraisée.jpg', 3),
(79, 'Vis à bois-Vrac.jpg', 3),
(80, 'Vis métrique-Tête ronde.jpg', 1),
(81, 'Cheville-à expension.jpg', 16),
(82, 'Vis métrique-tete cylindrique.jpg', 1),
(83, 'Vis métrique-tete cylindrique.jpg', 1),
(84, 'Roulement-Classique.jpg', 13),
(85, 'Vis impériale-tete cylindrique.jpg', 26),
(86, 'Photorésistance-Vrac.jpg', 27),
(87, 'Fusible-Cartouche.jpg', 28),
(88, 'LED-Classique.jpg', 29),
(89, 'Ampoule-Incandescente.jpg', 30),
(90, 'Insert-fileté.jpg', 17),
(91, 'Vis métrique-tete bombée.jpg', 1),
(92, 'Rondelle-Plate.jpg', 2),
(93, 'Ecrou-A griffe.jpg', 5),
(94, 'Ecrou-Papillon.jpg', 5),
(95, 'Vis métrique-tete cylindrique.jpg', 1),
(96, 'Bille-Acier.jpg', 25),
(97, 'Vis métrique-tete cylindrique.jpg', 1),
(98, 'Vis métrique-tete hexagonale.jpg', 1),
(99, 'Joint-Vrac.jpg', 31),
(100, 'Vis métrique-tete fraisée.jpg', 1),
(101, 'Vis métrique-tete fraisée.jpg', 1),
(102, 'Foret-Vrac.jpg', 32),
(103, 'Tarod-Vrac.jpg', 33),
(104, 'Vis métrique-tete cylindrique.jpg', 1),
(105, 'Entretoise-.jpg', 6),
(106, 'Entretoise-.jpg', 6),
(107, 'Vis métrique-tete cylindrique.jpg', 1),
(108, 'Vis métrique-tete cylindrique.jpg', 1),
(109, 'Vis métrique-tete fraisée.jpg', 1),
(110, 'Silent bloc-Nema 17.jpg', 34),
(111, 'Entretoise-.jpg', 6),
(112, 'Vis métrique-tete bombée.jpg', 1),
(113, 'Vis métrique-Vrac.jpg', 1),
(114, 'Rondelle-Plate.jpg', 2),
(115, 'Vis métrique-tete cylindrique.jpg', 1),
(116, 'Vis métrique-tete cylindrique.jpg', 1),
(117, 'Ecrou Bosch-1/4 de tour.jpg', 35),
(118, 'Ecrou Bosch-A ressort.jpg', 35),
(119, 'Vis métrique-tete bombée.jpg', 1),
(120, 'Entretoise-.jpg', 6),
(121, 'Entretoise-.jpg', 6),
(122, 'Poulie-GT2.jpg', 36),
(123, 'Poulie-GT2.jpg', 36),
(124, 'Poulie-Vrac.jpg', 36),
(125, 'Vis métrique-tete cylindrique.jpg', 1),
(126, 'Vis métrique-tete cylindrique.jpg', 1),
(127, 'Vis métrique-tete cylindrique basse.jpg', 1),
(128, 'Ecrou Bosch-Classique.jpg', 35),
(129, 'Vis métrique-tete bombée.jpg', 1),
(130, 'Vis métrique-tete bombée.jpg', 1),
(131, 'Rondelle-Plate.jpg', 2),
(132, 'Rondelle-Plate.jpg', 2),
(133, 'Rondelle-Plate.jpg', 2),
(134, 'Vis métrique-tete fendue.jpg', 1),
(135, 'Ecrou Bosch-Classique.jpg', 35),
(136, 'Ecrou Bosch-Plat.jpg', 35),
(137, 'Vis métrique-tete fraisée.jpg', 1),
(138, 'Vis métrique-Vrac.jpg', 1),
(139, 'Rondelle-Vrac.jpg', 2),
(140, 'Vis métrique-tete bombée.jpg', 1),
(141, 'Vis métrique-tete bombée.jpg', 1),
(142, 'Vis métrique-Vrac.jpg', 1),
(143, 'Vis métrique-tete hexagonale.jpg', 1),
(144, 'Ecrou-Rond.jpg', 5),
(145, 'Vis métrique-tete hexagonale.jpg', 1),
(146, 'Vis métrique-tete hexagonale.jpg', 1),
(147, 'Vis métrique-tete hexagonale.jpg', 1),
(148, 'Lames-Vrac.jpg', 37),
(149, 'Vis métrique-Vrac.jpg', 1),
(150, 'Vis métrique-tete hexagonale.jpg', 1),
(151, 'Ecrou-Nylstop.jpg', 5),
(152, 'Vis métrique-tete fendue.jpg', 1),
(153, 'Ecrou-Borgne.jpg', 5),
(154, 'Vis métrique-tete hexagonale.jpg', 1),
(155, 'Ecrou-Classique.jpg', 5),
(156, 'Ecrou-Classique.jpg', 5),
(157, 'Ecrou-Classique.jpg', 5),
(158, 'Ecrou-Nylstop.jpg', 5),
(159, 'Ecrou-Classique.jpg', 5),
(160, 'Ecrou-Classique.jpg', 5),
(161, 'Ecrou-Papillon.jpg', 5),
(162, 'Ecrou-Nylstop.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `quincaillerie`
--

CREATE TABLE `quincaillerie` (
  `id_produit` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `empreinte` varchar(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `longueur` varchar(11) DEFAULT NULL,
  `utilite` varchar(50) DEFAULT NULL,
  `matiere` varchar(50) DEFAULT NULL,
  `epaisseur` varchar(11) DEFAULT NULL,
  `diametre` varchar(5) DEFAULT NULL,
  `diametre_etrier` varchar(50) DEFAULT NULL,
  `diametre_tube` varchar(50) DEFAULT NULL,
  `diametre_int` varchar(50) DEFAULT NULL,
  `diametre_ext` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `quincaillerie`
--

INSERT INTO `quincaillerie` (`id_produit`, `type`, `empreinte`, `genre`, `longueur`, `utilite`, `matiere`, `epaisseur`, `diametre`, `diametre_etrier`, `diametre_tube`, `diametre_int`, `diametre_ext`) VALUES
(1, 'tete fraisée', 'Hexagonal creux', NULL, '20', 'Métal', 'Acier 10.9', NULL, 'M5', NULL, NULL, NULL, NULL),
(2, 'tete fraisée', 'Hexagonal creux', NULL, '20', 'Métal', 'Acier 10.9', NULL, 'M4', NULL, NULL, NULL, NULL),
(3, 'tete fraisée', 'Hexagonal creux', NULL, '16', 'Métal', 'Acier', NULL, 'M3', NULL, NULL, NULL, NULL),
(4, 'tete cylindrique', 'Hexagonal creux', NULL, '80', 'Métal', 'Acier 8.8', NULL, 'M6', NULL, NULL, NULL, NULL),
(5, 'tete fraisée', 'Cruciforme', NULL, '22', 'Métal', 'Acier', NULL, 'M5', NULL, NULL, NULL, NULL),
(6, 'tete bombée', 'Hexagonal creux', NULL, '30', 'Métal', 'Acier 10.9', NULL, 'M12', NULL, NULL, NULL, NULL),
(7, 'Grower', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, 'M8', '14.5'),
(8, 'Grower', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, 'M8', '12'),
(9, 'Plate', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, 'M6', '14'),
(10, 'tete fraisée', 'Cruciforme', NULL, '80', 'Bois', 'Acier ', NULL, '6', NULL, NULL, NULL, NULL),
(11, 'tete fendue', 'Plat', NULL, '70', 'Métal', 'Acier', NULL, 'M4', NULL, NULL, NULL, NULL),
(12, 'tete cylindrique', 'Hexagonal creux', NULL, '30', 'Métal', 'Acier 8.8', NULL, 'M4', NULL, NULL, NULL, NULL),
(13, 'tete cylindrique', 'Hexagonal creux', NULL, '50', 'Métal', 'Acier 8.8', NULL, 'M8', NULL, NULL, NULL, NULL),
(14, 'Pontet rond', NULL, NULL, NULL, NULL, 'Plastique', NULL, '9', NULL, NULL, NULL, NULL),
(15, 'Vrac', 'Vrac', NULL, 'Vrac', 'Métal', 'Acier', NULL, 'M3', NULL, NULL, NULL, NULL),
(16, 'Classique', 'Hexagonal', NULL, NULL, NULL, 'Acier', NULL, 'M6', NULL, NULL, NULL, NULL),
(17, 'Nylstop', 'Hexagonal', NULL, NULL, NULL, 'Acier', NULL, 'M10', NULL, NULL, NULL, NULL),
(18, NULL, 'Hexagonal', 'Femelle-Femelle', '30', NULL, 'Acier', NULL, NULL, NULL, NULL, 'M6', '10'),
(19, NULL, 'Hexagonal', 'Femelle-Femelle', '20', NULL, 'Acier', NULL, NULL, NULL, NULL, 'M4', '7'),
(20, NULL, 'Hexagonal', 'Femelle-Femelle', '20', NULL, 'Acier', NULL, NULL, NULL, NULL, 'M5', '8'),
(21, NULL, 'Hexagonal', 'Femelle-Femelle', '20', NULL, 'Acier', NULL, NULL, NULL, NULL, 'M4', '8'),
(23, NULL, 'Vrac', NULL, 'Vrac', 'Métal', 'Acier', NULL, 'Vrac', NULL, NULL, NULL, NULL),
(27, 'Plate', NULL, NULL, NULL, NULL, NULL, '2.3', NULL, NULL, NULL, 'M12', '24'),
(28, 'Plate', NULL, NULL, NULL, NULL, NULL, '1.5', NULL, NULL, NULL, 'M8', '20'),
(29, 'tete cylindrique', 'Hexagonal creux', NULL, '12', 'Métal', 'Acier', NULL, 'M4', NULL, NULL, NULL, NULL),
(30, 'tete fraisée', 'Hexagonal creux', NULL, '20', 'Métal', 'Acier', NULL, 'M5', NULL, NULL, NULL, NULL),
(31, 'tete hexagonale', NULL, NULL, '30', 'Métal', 'Acier 8.8', NULL, 'M12', NULL, NULL, NULL, NULL),
(32, 'tete bombée', 'Plat', NULL, '30', 'Métal', 'Acier', NULL, 'M4', NULL, NULL, NULL, NULL),
(33, 'tete bombée', 'Cruciforme', NULL, '16', 'Métal', 'Acier', NULL, 'M5', NULL, NULL, NULL, NULL),
(34, 'tete bombée', 'Cruciforme', NULL, '16', 'Métal', 'Acier', NULL, 'M4', NULL, NULL, NULL, NULL),
(35, 'tete hexagonale', NULL, NULL, '40', 'Métal', 'Acier 6.8', NULL, 'M6', NULL, NULL, NULL, NULL),
(37, 'tete hexagonale', NULL, NULL, '50', 'Métal', 'Acier 6.8', NULL, 'M6', NULL, NULL, NULL, NULL),
(38, 'tete hexagonale', NULL, NULL, '60', 'Métal', 'Acier 6.8', NULL, 'M6', NULL, NULL, NULL, NULL),
(39, 'tete bombée', 'Cruciforme', NULL, '12', 'Métal', 'Acier', NULL, 'M3', NULL, NULL, NULL, NULL),
(40, 'Plate', NULL, NULL, NULL, NULL, NULL, '0.8', NULL, NULL, NULL, 'M3', '10'),
(41, 'Frein', 'Hexagonal', NULL, NULL, NULL, 'Acier', NULL, 'M5', NULL, NULL, NULL, NULL),
(42, 'tete hexagonale', NULL, NULL, '30', 'Métal', 'Acier 6.8', NULL, 'M8', NULL, NULL, NULL, NULL),
(43, 'tete fraisée', 'Torx', NULL, '30', 'Bois', 'Acier ', NULL, '4', NULL, NULL, NULL, NULL),
(44, 'tete fraisée', 'Cruciforme', NULL, '50', 'Bois', 'Acier ', NULL, '4', NULL, NULL, NULL, NULL),
(47, 'tête fraisée', NULL, NULL, '8', NULL, 'Acier', NULL, '3.2', NULL, NULL, NULL, NULL),
(48, 'tête large', NULL, NULL, '10', NULL, 'Acier', NULL, '4', NULL, NULL, NULL, NULL),
(49, 'tête bombée', NULL, NULL, '10', NULL, 'Acier', NULL, '4', NULL, NULL, NULL, NULL),
(50, 'tête bombée', 'Hexagonal creux', NULL, '60', 'Métal', 'Acier 10.9', NULL, 'M8', NULL, NULL, NULL, NULL),
(52, 'Pontet', NULL, NULL, NULL, NULL, 'Plastique', NULL, '7', NULL, NULL, NULL, NULL),
(53, 'tête fraisée', 'Torx', NULL, '60', 'Bois', 'Acier ', NULL, '4', NULL, NULL, NULL, NULL),
(54, 'à expension', NULL, NULL, '40', 'Béton', 'Plastique', NULL, '6', NULL, NULL, NULL, NULL),
(55, 'Poelier', 'Cruciforme', NULL, '30', 'Métal', 'Acier', NULL, 'M8', NULL, NULL, NULL, NULL),
(56, 'fileté', NULL, NULL, '13', 'Métal', 'Acier', NULL, NULL, NULL, NULL, 'M5', '7'),
(57, 'tete cylindrique', 'Hexagonal creux', NULL, '16', 'Métal', 'Acier', NULL, 'M3', NULL, NULL, NULL, NULL),
(58, 'tete fraisée', 'Plat', NULL, '15', 'Métal', 'Acier', NULL, 'M6', NULL, NULL, NULL, NULL),
(59, 'tete fraisée', 'Plat', NULL, '20', 'Métal', 'Acier', NULL, 'M6', NULL, NULL, NULL, NULL),
(60, 'Rayé', NULL, NULL, '35', 'Bois', 'Bois', NULL, '8', NULL, NULL, NULL, NULL),
(61, 'à frapper', NULL, NULL, '46', 'Béton', 'Acier', NULL, 'M6', NULL, NULL, NULL, NULL),
(62, 'tete fendue', 'Plat', NULL, '20', 'Métal', 'Acier', NULL, 'M3', NULL, NULL, NULL, NULL),
(63, 'Cylindrique', NULL, NULL, NULL, 'Métal', 'Acier', NULL, NULL, '6', '21', NULL, NULL),
(66, 'tete hexagonale', NULL, NULL, '16', 'Métal', 'Acier', NULL, 'M6', NULL, NULL, NULL, NULL),
(67, 'tete fraisée', 'Plat', NULL, '30', 'Métal', 'Acier', NULL, 'M6', NULL, NULL, NULL, NULL),
(68, 'tete hexagonale', NULL, NULL, '20', 'Métal', 'Acier 6.8', NULL, 'M6', NULL, NULL, NULL, NULL),
(69, 'tete fendue', 'Plat', NULL, '20', 'Métal', 'Acier', NULL, 'M3', NULL, NULL, NULL, NULL),
(70, 'tete fendue', 'Plat', NULL, '30', 'Métal', 'Acier', NULL, 'M3', NULL, NULL, NULL, NULL),
(72, 'Bout', NULL, NULL, NULL, '30x30-8', 'Plastique', NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'Equerre', NULL, NULL, NULL, '30x30-8', 'Plastique', NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'tete fendue', 'Plat', NULL, '12', 'Métal', 'Acier', NULL, 'M3', NULL, NULL, NULL, NULL),
(78, 'tete fraisée', 'Torx', NULL, '25', 'Bois', 'Acier', NULL, '4', NULL, NULL, NULL, NULL),
(79, 'Vrac', 'Vrac', NULL, 'Vrac', 'Bois', 'Acier', NULL, 'Vrac', NULL, NULL, NULL, NULL),
(80, 'Tête ronde', 'Collet carré', NULL, '60', 'Métal', 'Acier', NULL, 'M6', NULL, NULL, NULL, NULL),
(81, 'à expension', NULL, NULL, '24', 'Béton', 'Plastique', NULL, '6', NULL, NULL, NULL, NULL),
(82, 'tete cylindrique', 'Hexagonal creux', NULL, '30', 'Métal', 'Acier', NULL, 'M6', NULL, NULL, NULL, NULL),
(83, 'tete cylindrique', 'Hexagonal creux', NULL, '80', 'Métal', 'Acier', NULL, 'M6', NULL, NULL, NULL, NULL),
(85, 'tete cylindrique', 'Hexagonal creux', NULL, 'Vrac', NULL, 'Acier', NULL, 'Vrac', NULL, NULL, NULL, NULL),
(90, 'fileté', NULL, NULL, '14', 'Métal', 'Acier', NULL, NULL, NULL, NULL, 'M6', '9'),
(91, 'tete bombée', 'Hexagonal creux', NULL, '16', 'Métal', 'Acier 10.9', NULL, 'M6', NULL, NULL, NULL, NULL),
(92, 'Plate', NULL, NULL, NULL, NULL, NULL, '0.8', NULL, NULL, NULL, '4', '10'),
(93, 'A griffe', NULL, NULL, NULL, NULL, 'Acier', NULL, 'M8', NULL, NULL, NULL, NULL),
(94, 'Papillon', NULL, NULL, NULL, NULL, 'Nylon', NULL, 'M8', NULL, NULL, NULL, NULL),
(95, 'tete cylindrique', 'Hexagonal creux', NULL, '120', 'Métal', 'Acier 8.8', NULL, 'M6', NULL, NULL, NULL, NULL),
(97, 'tete cylindrique', 'Hexagonal creux', NULL, '60', 'Métal', 'Acier 8.8', NULL, 'M6', NULL, NULL, NULL, NULL),
(98, 'tete hexagonale', NULL, NULL, '30', 'Métal', 'Acier 6.8', NULL, 'M6', NULL, NULL, NULL, NULL),
(99, 'Vrac', NULL, NULL, NULL, NULL, 'Vrac', 'Vrac', NULL, NULL, NULL, 'Vrac', 'Vrac'),
(100, 'tete fraisée', 'Hexagonal creux', NULL, '30', 'Métal', 'Acier 8.8', NULL, 'M6', NULL, NULL, NULL, NULL),
(101, 'tete fraisée', 'Hexagonal creux', NULL, '35', 'Métal', 'Acier 8.8', NULL, 'M8', NULL, NULL, NULL, NULL),
(104, 'tete cylindrique', 'Hexagonal creux', NULL, '12', 'Métal', 'Acier', NULL, 'M4', NULL, NULL, NULL, NULL),
(105, NULL, 'Hexagonal', 'Femelle-Femelle', '50', NULL, 'Acier', NULL, NULL, NULL, NULL, 'M4', '7'),
(106, NULL, 'Hexagonal', 'Vrac', 'Vrac', NULL, 'Vrac', NULL, NULL, NULL, NULL, 'M3', 'Vrac'),
(107, 'tete cylindrique', 'Hexagonal creux', NULL, '40', 'Métal', 'Acier 12.9', NULL, 'M4', NULL, NULL, NULL, NULL),
(108, 'tete cylindrique', 'Hexagonal creux', NULL, '16', 'Métal', 'Acier', NULL, 'M4', NULL, NULL, NULL, NULL),
(109, 'tete fraisée', 'Hexagonal creux', NULL, '8', 'Métal', 'Acier', NULL, 'M3', NULL, NULL, NULL, NULL),
(111, NULL, 'Hexagonal', 'Femelle-Femelle', '10', NULL, 'Plastique', NULL, NULL, NULL, NULL, 'M3', '6'),
(112, 'tete bombée', 'Cruciforme', NULL, '12', 'Métal', 'Acier', NULL, 'M3', NULL, NULL, NULL, NULL),
(113, 'Vrac', 'Vrac', NULL, 'Vrac', 'Métal', 'Acier', NULL, 'M8', NULL, NULL, NULL, NULL),
(114, 'Plate', NULL, NULL, NULL, NULL, NULL, '2.5', NULL, NULL, NULL, '10', '30'),
(115, 'tete cylindrique', 'Hexagonal creux', NULL, '20', 'Métal', 'Acier 8.8', NULL, 'M6', NULL, NULL, NULL, NULL),
(116, 'tete cylindrique', 'Hexagonal creux', NULL, '16', 'Métal', 'Acier 8.8', NULL, 'M6', NULL, NULL, NULL, NULL),
(117, '1/4 de tour', NULL, NULL, NULL, NULL, 'Acier', NULL, 'M6', NULL, NULL, NULL, NULL),
(118, 'A ressort', NULL, NULL, NULL, NULL, 'Acier', NULL, 'M6', NULL, NULL, NULL, NULL),
(119, 'tete bombée', 'Hexagonal creux', NULL, '12', 'Métal', 'Acier', NULL, 'M8', NULL, NULL, NULL, NULL),
(120, NULL, 'Hexagonal', 'Femelle-Femelle', '15', NULL, 'Acier', NULL, NULL, NULL, NULL, 'M3', '6'),
(121, NULL, 'Hexagonal', 'Vrac', 'Vrac', NULL, 'Vrac', NULL, NULL, NULL, NULL, 'M8', 'Vrac'),
(125, 'tete cylindrique', 'Hexagonal creux', NULL, '25', 'Métal', 'Acier 8.8', NULL, 'M5', NULL, NULL, NULL, NULL),
(126, 'tete cylindrique', 'Hexagonal creux', NULL, '45', 'Métal', 'Acier 8.8', NULL, 'M5', NULL, NULL, NULL, NULL),
(127, 'tete cylindrique basse', 'Hexagonal creux', NULL, '14', 'Métal', 'Acier 8.8', NULL, 'M6', NULL, NULL, NULL, NULL),
(128, 'Classique', NULL, NULL, NULL, NULL, 'Acier', NULL, 'M8', NULL, NULL, NULL, NULL),
(129, 'tete bombée', 'Hexagonal creux', NULL, '10', 'Métal', 'Acier 10.9', NULL, 'M6', NULL, NULL, NULL, NULL),
(130, 'tete bombée', 'Hexagonal creux', NULL, '12', 'Métal', 'Acier 10.9', NULL, 'M6', NULL, NULL, NULL, NULL),
(131, 'Plate', NULL, NULL, NULL, NULL, NULL, '1.2', NULL, NULL, NULL, '5', '12'),
(132, 'Plate', NULL, NULL, NULL, NULL, NULL, '0.8', NULL, NULL, NULL, '3', '8'),
(133, 'Plate', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '5', '10'),
(134, 'tete fendue', 'Plat', NULL, '40', 'Métal', 'Acier', NULL, 'M3', NULL, NULL, NULL, NULL),
(135, 'Classique', NULL, NULL, NULL, NULL, 'Acier', NULL, 'M6', NULL, NULL, NULL, NULL),
(136, 'Plat', NULL, NULL, NULL, NULL, 'Acier', NULL, 'M6', NULL, NULL, NULL, NULL),
(137, 'tete fraisée', 'Plat', NULL, '50', 'Métal', 'Acier', NULL, 'M6', NULL, NULL, NULL, NULL),
(138, 'Vrac', 'Vrac', NULL, 'Vrac', 'Métal', 'Acier', NULL, 'M6', NULL, NULL, NULL, NULL),
(139, 'Vrac', NULL, NULL, NULL, NULL, NULL, 'Vrac', NULL, NULL, NULL, 'Vrac', 'Vrac'),
(140, 'tete bombée', 'Hexagonal creux', NULL, '16', 'Métal', 'Acier 10.9', NULL, 'M8', NULL, NULL, NULL, NULL),
(141, 'tete bombée', 'Hexagonal creux', NULL, '25', 'Métal', 'Acier', NULL, 'M8', NULL, NULL, NULL, NULL),
(142, 'Vrac', 'Vrac', NULL, 'Vrac', 'Métal', 'Acier', NULL, 'M4', NULL, NULL, NULL, NULL),
(143, 'tete hexagonale', NULL, NULL, '25', 'Métal', 'Acier 4.6', NULL, 'M8', NULL, NULL, NULL, NULL),
(144, 'Rond', 'Plat', NULL, NULL, NULL, 'Inox', NULL, 'M8', NULL, NULL, NULL, NULL),
(145, 'tete hexagonale', NULL, NULL, '35', 'Métal', 'Acier 6.8', NULL, 'M5', NULL, NULL, NULL, NULL),
(146, 'tete hexagonale', NULL, NULL, '16', 'Métal', 'Acier', NULL, 'M5', NULL, NULL, NULL, NULL),
(147, 'tete hexagonale', NULL, NULL, '20', 'Métal', 'Acier 6.8', NULL, 'M5', NULL, NULL, NULL, NULL),
(149, 'Vrac', 'Vrac', NULL, 'Vrac', 'Métal', 'Acier', NULL, 'M8', NULL, NULL, NULL, NULL),
(150, 'tete hexagonale', NULL, NULL, '50', 'Métal', 'Acier 6.8', NULL, 'M8', NULL, NULL, NULL, NULL),
(151, 'Nylstop', 'Hexagonal', NULL, NULL, NULL, 'Acier', NULL, 'M8', NULL, NULL, NULL, NULL),
(152, 'tete fendue', 'Cruciforme', NULL, '10', 'Métal', 'Acier', NULL, 'M5', NULL, NULL, NULL, NULL),
(153, 'Borgne', 'Hexagonal', NULL, NULL, NULL, 'Acier', NULL, 'M8', NULL, NULL, NULL, NULL),
(154, 'tete hexagonale', NULL, NULL, '20', 'Métal', 'Acier 6.8', NULL, 'M8', NULL, NULL, NULL, NULL),
(155, 'Classique', 'Hexagonal', NULL, NULL, NULL, 'Acier', NULL, 'M8', NULL, NULL, NULL, NULL),
(156, 'Classique', 'Hexagonal', NULL, NULL, NULL, 'Acier', NULL, 'M10', NULL, NULL, NULL, NULL),
(157, 'Classique', 'Hexagonal', NULL, NULL, NULL, 'Acier', NULL, 'M5', NULL, NULL, NULL, NULL),
(158, 'Nylstop', 'Hexagonal', NULL, NULL, NULL, 'Acier', NULL, 'M5', NULL, NULL, NULL, NULL),
(159, 'Classique', 'Hexagonal', NULL, NULL, NULL, 'Acier', NULL, 'M4', NULL, NULL, NULL, NULL),
(160, 'Classique', 'Hexagonal', NULL, NULL, NULL, 'Acier', NULL, 'M3', NULL, NULL, NULL, NULL),
(161, 'Papillon', 'Hexagonal', NULL, NULL, NULL, 'Acier', NULL, 'M4', NULL, NULL, NULL, NULL),
(162, 'Nylstop', 'Hexagonal', NULL, NULL, NULL, 'Acier', NULL, 'M6', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

CREATE TABLE `sous_categorie` (
  `id_sous_categ` int(11) NOT NULL,
  `lib_sous_categ` varchar(50) DEFAULT NULL,
  `nom_photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `sous_categorie`
--

INSERT INTO `sous_categorie` (`id_sous_categ`, `lib_sous_categ`, `nom_photo`) VALUES
(1, 'Vis métrique', 'sous categ-Vis métrique.jpg'),
(2, 'Rondelle', 'sous categ-Rondelle.jpg'),
(3, 'Vis à bois', 'sous categ-Vis à bois.jpg'),
(4, 'Attache cable', 'sous categ-Attache cable.jpg'),
(5, 'Ecrou', 'sous categ-Ecrou.jpg'),
(6, 'Entretoise', 'sous categ-Entretoise.jpg'),
(7, 'Accouplement élastique', 'sous categ-Accouplement élastique.jpg'),
(8, 'Vis pression', 'sous categ-Vis pression.jpg'),
(9, 'Buté à billes', 'sous categ-Buté à billes.jpg'),
(10, 'Fillets rapportés', 'sous categ-Fillets rapportés.jpg'),
(11, 'Domino', 'sous categ-Domino.jpg'),
(12, 'Ventouse', 'sous categ-Ventouse.jpg'),
(13, 'Roulement', 'sous categ-Roulement.jpg'),
(14, 'Rivet', 'sous categ-Rivet.jpg'),
(15, 'Rotule', 'sous categ-Rotule.jpg'),
(16, 'Cheville', 'sous categ-Cheville.jpg'),
(17, 'Insert', 'sous categ-Insert.jpg'),
(18, 'Tourillon', 'sous categ-Tourillon.jpg'),
(19, 'Etrier', 'sous categ-Etrier.jpg'),
(20, 'Prise', 'sous categ-Prise.jpg'),
(21, 'Passe cable', 'sous categ-Passe cable.jpg'),
(22, 'Pince', 'sous categ-Pince.jpg'),
(23, 'Cache Bosch', 'sous categ-Cache Bosch.jpg'),
(24, 'Connecteur', 'sous categ-Connecteur.jpg'),
(25, 'Bille', 'sous categ-Bille.jpg'),
(26, 'Vis impériale', 'sous categ-Vis impériale.jpg'),
(27, 'Photorésistance', 'sous categ-Photorésistance.jpg'),
(28, 'Fusible', 'sous categ-Fusible.jpg'),
(29, 'LED', 'sous categ-LED.jpg'),
(30, 'Ampoule', 'sous categ-Ampoule.jpg'),
(31, 'Joint', 'sous categ-Joint.jpg'),
(32, 'Foret', 'sous categ-Foret.jpg'),
(33, 'Tarod', 'sous categ-Tarod.jpg'),
(34, 'Silent bloc', 'sous categ-Silent bloc.jpg'),
(35, 'Ecrou Bosch', 'sous categ-Ecrou Bosch.jpg'),
(36, 'Poulie', 'sous categ-Poulie.jpg'),
(37, 'Lames', 'sous categ-Lames.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `tiroir`
--

CREATE TABLE `tiroir` (
  `num` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `tiroir`
--

INSERT INTO `tiroir` (`num`) VALUES
('01'),
('02'),
('03'),
('04'),
('05'),
('06'),
('07'),
('08'),
('09'),
('10'),
('11'),
('12'),
('13'),
('14'),
('15'),
('16'),
('17'),
('18'),
('19'),
('20'),
('21'),
('22'),
('23'),
('24'),
('25'),
('26'),
('27'),
('28'),
('29'),
('30'),
('31'),
('32'),
('33'),
('34'),
('35'),
('36'),
('37'),
('38'),
('39'),
('40'),
('41'),
('42'),
('43'),
('44'),
('45'),
('46'),
('47'),
('48'),
('49'),
('50');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `casier`
--
ALTER TABLE `casier`
  ADD PRIMARY KEY (`id_casier`);

--
-- Index pour la table `composants_electroniques`
--
ALTER TABLE `composants_electroniques`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `elements_mecaniques`
--
ALTER TABLE `elements_mecaniques`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `emplacement`
--
ALTER TABLE `emplacement`
  ADD PRIMARY KEY (`id_produit`,`id_casier`,`num`),
  ADD KEY `id_casier` (`id_casier`),
  ADD KEY `num` (`num`);

--
-- Index pour la table `outils`
--
ALTER TABLE `outils`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_sous_categ` (`id_sous_categ`);

--
-- Index pour la table `quincaillerie`
--
ALTER TABLE `quincaillerie`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD PRIMARY KEY (`id_sous_categ`);

--
-- Index pour la table `tiroir`
--
ALTER TABLE `tiroir`
  ADD PRIMARY KEY (`num`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `composants_electroniques`
--
ALTER TABLE `composants_electroniques`
  ADD CONSTRAINT `composants_electroniques_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `elements_mecaniques`
--
ALTER TABLE `elements_mecaniques`
  ADD CONSTRAINT `elements_mecaniques_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `emplacement`
--
ALTER TABLE `emplacement`
  ADD CONSTRAINT `emplacement_ibfk_1` FOREIGN KEY (`id_casier`) REFERENCES `casier` (`id_casier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emplacement_ibfk_2` FOREIGN KEY (`num`) REFERENCES `tiroir` (`num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emplacement_ibfk_3` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emplacement_ibfk_4` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`);

--
-- Contraintes pour la table `outils`
--
ALTER TABLE `outils`
  ADD CONSTRAINT `outils_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_sous_categ`) REFERENCES `sous_categorie` (`id_sous_categ`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `quincaillerie`
--
ALTER TABLE `quincaillerie`
  ADD CONSTRAINT `quincaillerie_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
