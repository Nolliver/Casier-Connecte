-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 24 nov. 2020 à 11:41
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
-- Base de données :  `stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `categorie` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `categorie`) VALUES
(1, 'Vollaile'),
(2, 'Boeuf'),
(3, 'Porc'),
(4, 'Veau'),
(5, 'Pain'),
(6, 'Poisson'),
(7, 'Produit laitier'),
(8, 'Legume'),
(9, 'Fruit'),
(10, 'Feculent'),
(11, 'Gateau'),
(12, 'Boissons'),
(0, 'Plat prepare'),
(13, 'Oeufs'),
(14, 'Glace');

-- --------------------------------------------------------

--
-- Structure de la table `detail_emplacement`
--

CREATE TABLE `detail_emplacement` (
  `barcode` varchar(50) NOT NULL,
  `id_emplacement` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `emplacement`
--

CREATE TABLE `emplacement` (
  `id_emplacement` int(11) NOT NULL,
  `nom_emplacement` varchar(50) NOT NULL,
  `piece` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `emplacement`
--

INSERT INTO `emplacement` (`id_emplacement`, `nom_emplacement`, `piece`) VALUES
(1, 'Congelateur frigo', 'Cuisine'),
(2, 'Congelateur', 'Cellier'),
(3, 'Etagere conserve', 'Cellier'),
(4, 'Tiroir feculent', 'Cuisine'),
(5, 'Tiroir patisserie', 'Cuisine'),
(6, 'Tiroir gateau', 'Cuisine'),
(7, 'Tiroir condiment/conserve', 'Cuisine'),
(8, 'Etagere boisson', 'Cellier'),
(9, 'Etagere gateau', 'Cellier'),
(10, 'Tiroir etagere', 'Cellier'),
(11, 'Frigo', 'Cuisine');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `barcode` varchar(50) NOT NULL,
  `produit` varchar(50) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `conditionnement` varchar(50) NOT NULL,
  `quantite` int(11) NOT NULL,
  `limite` int(11) NOT NULL DEFAULT '0',
  `id_categorie` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `detail_emplacement`
--
ALTER TABLE `detail_emplacement`
  ADD PRIMARY KEY (`barcode`,`id_emplacement`),
  ADD KEY `id_emplacement` (`id_emplacement`),
  ADD KEY `barcode` (`barcode`) USING BTREE;

--
-- Index pour la table `emplacement`
--
ALTER TABLE `emplacement`
  ADD PRIMARY KEY (`id_emplacement`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`barcode`),
  ADD KEY `id_categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
