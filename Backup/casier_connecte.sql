-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 06 Décembre 2020 à 19:17
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
  `type` varchar(50) DEFAULT 'NULL',
  `utilite` varchar(50) DEFAULT NULL,
  `pas` varchar(50) DEFAULT NULL,
  `couleur` varchar(50) DEFAULT 'NULL',
  `amperage` varchar(50) DEFAULT 'NULL',
  `tension` varchar(50) DEFAULT 'NULL',
  `genre` varchar(50) DEFAULT 'NULL',
  `nb_position` varchar(50) DEFAULT NULL,
  `nb_col` varchar(50) DEFAULT 'NULL',
  `nb_ligne` varchar(50) DEFAULT 'NULL',
  `diametre` varchar(50) DEFAULT NULL,
  `diam_cable_min` varchar(50) DEFAULT NULL,
  `diam_cable_max` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `composants_electroniques`
--

INSERT INTO `composants_electroniques` (`id_produit`, `type`, `utilite`, `pas`, `couleur`, `amperage`, `tension`, `genre`, `nb_position`, `nb_col`, `nb_ligne`, `diametre`, `diam_cable_min`, `diam_cable_max`) VALUES
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Vrac', 'Vrac');

-- --------------------------------------------------------

--
-- Structure de la table `elements_mecaniques`
--

CREATE TABLE `elements_mecaniques` (
  `id_produit` int(11) NOT NULL,
  `type` varchar(50) DEFAULT 'NULL',
  `ref_comm` varchar(50) DEFAULT 'NULL',
  `epaisseur` varchar(50) DEFAULT 'NULL',
  `filetage` varchar(50) DEFAULT 'NULL',
  `pas` varchar(50) DEFAULT 'NULL',
  `diametre` varchar(50) DEFAULT 'NULL',
  `diametre_int` varchar(50) DEFAULT NULL,
  `diametre_ext` varchar(50) DEFAULT NULL,
  `diametre_1` varchar(50) DEFAULT NULL,
  `diametre_2` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `elements_mecaniques`
--

INSERT INTO `elements_mecaniques` (`id_produit`, `type`, `ref_comm`, `epaisseur`, `filetage`, `pas`, `diametre`, `diametre_int`, `diametre_ext`, `diametre_1`, `diametre_2`) VALUES
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '8'),
(24, NULL, 'F8-19G', '7', NULL, NULL, NULL, '8', '19', NULL, NULL),
(36, 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '25', NULL, NULL, NULL, NULL),
(45, 'Linéaire', 'LM8UU', '24', 'NULL', 'NULL', 'NULL', '8', '15', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `emplacement`
--

CREATE TABLE `emplacement` (
  `id_produit` int(11) NOT NULL,
  `id_casier` varchar(1) NOT NULL,
  `num` varchar(2) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `emplacement`
--

INSERT INTO `emplacement` (`id_produit`, `id_casier`, `num`, `quantite`) VALUES
(3, 'B', '01', 1),
(2, 'B', '01', 1),
(1, 'B', '01', 1),
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
(45, 'B', '24', 1);

-- --------------------------------------------------------

--
-- Structure de la table `outils`
--

CREATE TABLE `outils` (
  `id_produit` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `usage` varchar(50) DEFAULT NULL,
  `diametre` varchar(50) DEFAULT NULL,
  `connecteur_pince` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `outils`
--

INSERT INTO `outils` (`id_produit`, `type`, `usage`, `diametre`, `connecteur_pince`) VALUES
(25, NULL, NULL, 'M6', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `photo_prod` varchar(50) DEFAULT NULL,
  `id_sous_categ` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `photo_prod`, `id_sous_categ`) VALUES
(2, 'Vis métrique-tete fraisée.jpg', 1),
(1, 'Vis métrique-tete fraisée.jpg', 1),
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
(45, 'Roulement-Linéaire.jpg', 13);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
(44, 'tete fraisée', 'Cruciforme', NULL, '50', 'Bois', 'Acier ', NULL, '4', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

CREATE TABLE `sous_categorie` (
  `id_sous_categ` int(11) NOT NULL,
  `lib_sous_categ` varchar(50) DEFAULT NULL,
  `nom_photo` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `sous_categorie`
--

INSERT INTO `sous_categorie` (`id_sous_categ`, `lib_sous_categ`, `nom_photo`) VALUES
(2, 'Rondelle', 'sous categ-Rondelle.jpg'),
(1, 'Vis métrique', 'sous categ-Vis métrique.jpg'),
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
(13, 'Roulement', 'sous categ-Roulement.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `tiroir`
--

CREATE TABLE `tiroir` (
  `num` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
