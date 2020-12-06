-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 06 déc. 2020 à 16:40
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Déchargement des données de la table `casier`
--

INSERT INTO `casier` (`id_casier`, `Couleur`, `description`, `adresse_ip`) VALUES
('A', 'Rouge', 'test', 'test'),
('B', 'Bleu', 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `composants_electroniques`
--

CREATE TABLE `composants_electroniques` (
  `id_produit` int(11) NOT NULL,
  `utilite` varchar(50) DEFAULT NULL,
  `pas` int(11) DEFAULT NULL,
  `nb_position` int(11) DEFAULT NULL,
  `diametre` decimal(15,2) DEFAULT NULL,
  `amperage` decimal(15,2) DEFAULT NULL,
  `tension` decimal(15,2) DEFAULT NULL,
  `couleur` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `nb_col` int(11) DEFAULT NULL,
  `nb_ligne` int(11) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `diam_cable_min` decimal(15,2) DEFAULT NULL,
  `diam_cable_max` decimal(15,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `elements_mecaniques`
--

CREATE TABLE `elements_mecaniques` (
  `id_produit` int(11) NOT NULL,
  `diametre_int` decimal(15,2) DEFAULT NULL,
  `diametre_ext` decimal(15,2) DEFAULT NULL,
  `epaisseur` int(11) DEFAULT NULL,
  `ref_comm` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `filetage` varchar(50) DEFAULT NULL,
  `pas` varchar(50) DEFAULT NULL,
  `diametre` decimal(15,2) DEFAULT NULL,
  `nom_photo` varchar(50) NOT NULL DEFAULT 'sans_photo.png',
  `diametre_1` float NOT NULL,
  `diametre_2` float NOT NULL,
  `empreinte` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `emplacement`
--

CREATE TABLE `emplacement` (
  `id_produit` int(11) NOT NULL,
  `id_casier` varchar(1) NOT NULL,
  `num` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `outils`
--

CREATE TABLE `outils` (
  `id_produit` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `usage` varchar(50) DEFAULT NULL,
  `diametre` decimal(15,2) DEFAULT NULL,
  `connecteur_pince` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `photo_prod` varchar(50) DEFAULT NULL,
  `id_sous_categ` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `quincaillerie`
--

CREATE TABLE `quincaillerie` (
  `id_produit` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `longueur` int(11) DEFAULT NULL,
  `utilite` varchar(50) DEFAULT NULL,
  `pas` int(11) DEFAULT NULL,
  `matiere` varchar(50) DEFAULT NULL,
  `epaisseur` int(11) DEFAULT NULL,
  `diametre` varchar(5) DEFAULT NULL,
  `diametre_etrier` decimal(15,2) DEFAULT NULL,
  `diametre_tube` decimal(15,2) DEFAULT NULL,
  `diametre_int` decimal(15,2) DEFAULT NULL,
  `diametre_ext` decimal(15,2) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `empreinte` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

CREATE TABLE `sous_categorie` (
  `id_sous_categ` int(11) NOT NULL,
  `lib_sous_categ` varchar(50) DEFAULT NULL,
  `nom_photo` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tiroir`
--

CREATE TABLE `tiroir` (
  `num` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tiroir`
--

INSERT INTO `tiroir` (`num`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(50);

--
-- Index pour les tables déchargées
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
