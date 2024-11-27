-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 14 déc. 2023 à 22:06
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `F_NAME` varchar(50) NOT NULL,
  `L_NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`F_NAME`, `L_NAME`, `EMAIL`, `LOGIN`, `PASSWORD`) VALUES
('', 'no', '', '', ''),
('nour', 'nour', 'nourelhodaelkaouti@gmail.com', 'admin', 'estsb');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`name`, `email`, `message`) VALUES
('nour', 'nourelhodaelkaouti@gmail.com', 'nour'),
('BabyStyle', 'nourelhodaelkaouti@gmail.com', 'nourtest');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `image_url`, `name`, `rating`, `price`) VALUES
(33, 'https://m.media-amazon.com/images/I/81AHVJ1SX4L._AC_SY741_.jpg', 'Simple Joys by Carter\'s Combinaisons Bébé Fille', 4, 33.00),
(36, 'https://m.media-amazon.com/images/I/61g76uZg6zL._AC_SX385_.jpg', 'Manches Longues Grenouillères en Coton', 5, 8.00);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `rating` int(11) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `categorie` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `rating`, `image_url`, `categorie`) VALUES
(9, 'Bébé Combinaison avec Capuche', 34.99, 5, 'https://m.media-amazon.com/images/I/61dFT2Y-LsL._AC_SX522_.jpg', 'combinaison garçon'),
(10, 'Chemise Blouse Haut Pull Sweat t-Shirt + Pantalons', 11.23, 5, 'https://m.media-amazon.com/images/I/61+99ktgE4L._AC_SX385_.jpg', 'tenue'),
(12, 'T-Shirt + Pantalon ou Shorts Taille Elastique avec', 78.00, 5, 'https://m.media-amazon.com/images/I/61wrwRny2aL._AC_SX385_.jpg', 'tenue'),
(13, 'Dessin Animé Manteau+Sac ', 19.89, 5, 'https://m.media-amazon.com/images/I/71bz+ArzkbL._AC_SX385_.jpg', 'tenue'),
(14, 'Veste en Cape à Capuchon Chaude', 7.99, 5, 'https://m.media-amazon.com/images/I/61FwKwwnywL._AC_SX385_.jpg', 'tenue'),
(16, 'Chaussettes Mixte', 6.99, 5, 'https://m.media-amazon.com/images/I/713-ADcd4SL._AC_SX385_.jpg', 'chaussette'),
(17, 'Manches Longues Grenouillères en Coton', 8.99, 5, 'https://m.media-amazon.com/images/I/61g76uZg6zL._AC_SX385_.jpg', 'combinaison garçon'),
(18, 'Manche Longue Pyjamas Grenouillères Vêtement 0-18 ', 38.97, 5, 'https://m.media-amazon.com/images/I/61J4ibkwrnL._AC_SX679_.jpg', 'combinaison garçon'),
(20, 'Épaisse Combinaison Barboteuse', 10.48, 5, 'https://m.media-amazon.com/images/I/51i6ZEV3v1L._AC_SX522_.jpg', 'combinaison garçon'),
(21, 'Combinaisons Bébé Barboteuse Fermeture Boutons Gre', 18.99, 5, 'https://m.media-amazon.com/images/I/61lx8tDHdJL._AC_SX522_.jpg', 'combinaison garçon'),
(23, 'Combinaison de Neige Épais Pied Barboteuse', 31.92, 5, 'https://m.media-amazon.com/images/I/81LY7uiWwtL._AC_SX522_.jpg', 'combinaison garçon'),
(24, 'Tee Shirt Manche Courte + Salopette Jeans Garcon', 13.87, 5, 'https://m.media-amazon.com/images/I/61M9RwMopdL._AC_SX522_.jpg', 'tenue'),
(25, 'Barboteuse à Boutons Pression Mixte', 21.24, 5, 'https://m.media-amazon.com/images/I/71M7g-gZedL._AC_SX679_.jpg', 'bouton'),
(26, 'Tenue 2 Pièces pour Bébé Garçon 0-3 Ans T-Shirt à ', 10.99, 5, 'https://m.media-amazon.com/images/I/71QyYIozCkL._AC_SX522_.jpg', 'tenue'),
(27, 'Body Dessin Animé Jarretelles Jupe Bandeaux', 12.49, 5, 'https://m.media-amazon.com/images/I/711jGJleq5L._AC_SX522_.jpg', 'robe'),
(28, 'Tenue pour Garçon 3-24 Mois Ensemble Été T-Shirt +', 10.99, 5, 'https://m.media-amazon.com/images/I/71yfZszZfDL._AC_SX522_.jpg', 'tenue'),
(29, 'Lhn Body Chapeau et chausson', 18.00, 5, 'https://m.media-amazon.com/images/I/71B8P0A9rEL._AC_SX569_.jpg', 'bouton'),
(30, 'chemise à manches courtes + jarretelle jupe avec b', 21.59, 5, 'https://m.media-amazon.com/images/I/610NKenncOL._AC_SX522_.jpg', 'robe'),
(31, 'Robe de Princesse à Pois sans Manches + Chapeau', 5.50, 5, 'https://m.media-amazon.com/images/I/610ciNXWUTL._AC_SX385_.jpg', 'robe'),
(35, 'Ours Oreille À Capuche', 21.00, 5, 'https://m.media-amazon.com/images/I/61bVaym9+NL._AC_SX679_.jpg', 'combinaison garçon'),
(36, 'Combinaison Vêtements Capuche Ensembles Mignon Man', 18.00, 4, 'https://m.media-amazon.com/images/I/61rE75A01zL._AC_SX569_.jpg', 'combinaison garçon'),
(39, 'Simple Joys by Carter\'s Combinaisons Bébé Fille', 33.00, 4, 'https://m.media-amazon.com/images/I/81AHVJ1SX4L._AC_SY741_.jpg', 'combinaison fille'),
(40, 'Ensemble Combinaison en Chenille avec Pied', 34.00, 4, 'https://m.media-amazon.com/images/I/611AW-VZlyL._AC_SY741_.jpg', 'combinaison fille'),
(41, 'bébé combinaison bébé fille', 29.00, 4, 'https://m.media-amazon.com/images/I/61mewq+EgTL._AC_SX679_.jpg', 'combinaison fille'),
(42, 'grenouillères pour bébé', 25.00, 4, 'https://m.media-amazon.com/images/I/61TiUvi9qbL._AC_SX679_.jpg', 'combinaison fille'),
(43, 'Combinaison en chenille avec pied', 15.00, 4, 'https://m.media-amazon.com/images/I/51JE+2k6PIL._AC_SX569_.jpg', 'combinaison fille'),
(44, 'Grenouillère en Molleton Bébé Fille', 24.00, 4, 'https://m.media-amazon.com/images/I/91W4ZnkFEyL._AC_SY741_.jpg', 'combinaison fille'),
(45, 'JiAmy Bébé Pyjama Filles Combinaison Coton Barbote', 16.00, 4, 'https://m.media-amazon.com/images/I/51mw9H3udIL._AC_SL1500_.jpg', 'combinaison fille'),
(46, 'Pyjama pour Bébé Combinaison en Coton', 32.00, 4, 'https://m.media-amazon.com/images/I/61lXKEM704L._AC_SX679_.jpg', 'combinaison fille'),
(48, 'Ensemble Hoodies à Manches Longues + Pantalon Long', 28.00, 4, 'https://m.media-amazon.com/images/I/61siMTl1dwL._AC_SX679_.jpg', 'survette garçon'),
(49, 'Automne Jogging Survetement Enfant Garcon', 18.00, 3, 'https://m.media-amazon.com/images/I/51ywEEle7BL._AC_SX679_.jpg', 'survette garçon'),
(50, 'Ensemble Vêtement Bébé Garçon de 2 Pcs, T-Shirt + ', 10.00, 4, 'https://m.media-amazon.com/images/I/61LYoAmrXiL._AC_SX679_.jpg', 'survette garçon'),
(51, 'Ensemble de Survêtement Dinosaure Imprimé Sweatshi', 24.00, 4, 'https://m.media-amazon.com/images/I/71ZTyaPyyCL._AC_SX679_.jpg', 'survette garçon'),
(52, 'Ensemble de vêtements pour bébé garçon Sweatshirt ', 20.00, 4, 'https://m.media-amazon.com/images/I/71ONb8NsopL._AC_SX679_.jpg', 'survette garçon'),
(53, 'Survêtement Vêtement Bébé Garçon Naissance Pas Che', 12.00, 4, 'https://m.media-amazon.com/images/I/61LcZbdEmqL._AC_SX522_.jpg', 'survette garçon'),
(54, 'Ensemble Bébé Garçon Hiver Sweat à Capuche Sweatsh', 13.00, 5, 'https://m.media-amazon.com/images/I/51uDF-LVNzL._AC_SX522_.jpg', 'survette garçon'),
(55, 'Survêtement à capuche et pantalon à manches longue', 28.00, 5, 'https://m.media-amazon.com/images/I/71U5QeZaHOL._AC_SX522_.jpg', 'survette garçon'),
(56, 'Robe Bambin Princesse Tulle Sequins sans Manches', 34.00, 5, 'https://m.media-amazon.com/images/I/71maBeo7TLL._AC_SX679_.jpg', 'robe fille'),
(57, 'Automne Hiver Velours Manches Longues Genou A-Line', 17.00, 3, 'https://m.media-amazon.com/images/I/81MQEPBDC2L._AC_SX522_.jpg', 'robe fille'),
(58, 'Dentelle Barboteuse Robe Princesse Fly Manches Dos', 16.00, 4, 'https://m.media-amazon.com/images/I/61YoOdhlCiL._AC_SX679_.jpg', 'robe fille'),
(59, 'Robe De Bébé Fille Bowknot Mariage Tutu Princesse ', 28.00, 4, 'https://m.media-amazon.com/images/I/61YWXG+bRpL._AC_SX679_.jpg', 'robe fille'),
(60, 'Robe en tulle sans manches pour bébé fille', 17.00, 4, 'https://m.media-amazon.com/images/I/51gHqqWSk4L._AC_SX522_.jpg', 'robe fille'),
(61, 'Robe Princesse Bebe Fille Hiver Robe Ceremonie', 14.00, 5, 'https://m.media-amazon.com/images/I/61yWN6ELyTL._AC_SX679_.jpg', 'robe fille'),
(62, 'Robe tutu pour bébé fille avec broderie en dentell', 30.00, 4, 'https://m.media-amazon.com/images/I/81kahlNlaqL._AC_SX522_.jpg', 'robe fille'),
(63, 'Robe de Fête pour Bébé Princesse Robe de Baptême P', 34.00, 3, 'https://m.media-amazon.com/images/I/6176t1ZEjTL._AC_SX679_.jpg', 'robe fille'),
(64, 'Impression de Dessin animé bébé Garçons Coton Pyja', 26.00, 4, 'https://m.media-amazon.com/images/I/61ywG3aJ9PL._AC_SX679_.jpg', 'pyjama 2 pièces'),
(65, 'nouveau-né pyjama garçon fille manches longues mig', 40.00, 4, 'https://m.media-amazon.com/images/I/718107xTO5L._AC_SX522_.jpg', 'pyjama 2 pièces'),
(66, 'pyjama ensemble 2 pièces pyjama', 20.00, 4, 'https://m.media-amazon.com/images/I/71NPpE65FoL._AC_SX522_.jpg', 'pyjama 2 pièces'),
(67, 'Hauts Pantalons 2 pièces Enfants vêtements de Nuit', 28.00, 4, 'https://m.media-amazon.com/images/I/714A3XvDutL._AC_SX522_.jpg', 'pyjama 2 pièces'),
(68, 'Pyjamas Garçon Requin Pyjama', 20.00, 5, 'https://m.media-amazon.com/images/I/616CCrTnT4L._AC_SX522_.jpg', 'pyjama 2 pièces'),
(69, 'T Shirt Manche Longue Renne de noël Imprimé + Pant', 22.00, 4, 'https://m.media-amazon.com/images/I/61hpSIXYKqL._AC_SX679_.jpg', 'pyjama 2 pièces'),
(70, 'manches longues dessin animé hauts PJ pantalon vêt', 50.00, 4, 'https://m.media-amazon.com/images/I/61lNaPQoY3L._AC_SX522_.jpg', 'pyjama 2 pièces'),
(71, 'pyjama de Noël pour enfants - Chemise à manches lo', 30.00, 4, 'https://m.media-amazon.com/images/I/71yDFNW8YGL._AC_SX679_.jpg', 'pyjama 2 pièces'),
(72, 'Ensemble de Pyjama 4 Pièces (Haut en Coton et Bas ', 27.00, 4, 'https://m.media-amazon.com/images/I/81myuN4Me2L._AC_SY741_.jpg', 'pyjama 2 pièces fille'),
(73, 'Chaud Polaire à Capuche Ours Oreille Sweat Hauts e', 13.00, 5, 'https://m.media-amazon.com/images/I/81fjgfjszDL._AC_SX679_.jpg', 'pyjama 2 pièces fille'),
(74, 'pyjamas à manches longues pour bébé fille', 60.00, 5, 'https://m.media-amazon.com/images/I/61I738J4cOL._AC_SX522_.jpg', 'pyjama 2 pièces fille'),
(75, 'Manche Longue Tee Shirt + Pantalon | Vetement Noël', 70.00, 5, 'https://m.media-amazon.com/images/I/61XzdMcLkwL._AC_SX522_.jpg', 'pyjama 2 pièces fille'),
(76, 'PJ\'s Filles Manches Longues Dessin Animé Tops Pant', 40.00, 5, 'https://m.media-amazon.com/images/I/71J7KJyX5sL._AC_SX522_.jpg', 'pyjama 2 pièces fille'),
(77, 'Pyjama Ensemble À Manches Longues Polka Dot Sweat ', 22.00, 1, 'https://m.media-amazon.com/images/I/61gjdWPx51L._AC_SX679_.jpg', 'pyjama 2 pièces fille'),
(78, 'Warm Kid PJ\'s pour Toddler Sleepwear Filles Costum', 15.00, 4, 'https://m.media-amazon.com/images/I/51j6CmS1KqL._AC_SX679_.jpg', 'pyjama 2 pièces fille'),
(79, 'Cartoon Patchwork Tops PJ\'s Fleece Pantalons', 17.00, 4, 'https://m.media-amazon.com/images/I/71rfsUK0WfL._AC_SX522_.jpg', 'pyjama 2 pièces fille'),
(80, 'Body à Manches Longues Bébé Fille, Lot de 5', 26.90, 4, 'https://m.media-amazon.com/images/I/91Ua53sAhnL._AC_SY741_.jpg', 'boutton fille'),
(81, 'Body à Manches Courtes en Coton Corps Mixte Bébé (', 24.99, 4, 'https://m.media-amazon.com/images/I/612xGnFiEML._AC_SX679_.jpg', 'boutton fille'),
(82, '5 bodies à manches courtes en coton pour nouveau-n', 41.97, 4, 'https://m.media-amazon.com/images/I/51-6vuYxYEL._AC_SX679_.jpg', 'boutton fille'),
(83, 'Princess Body à Manches Longues Bébé Fille, Lot de', 21.74, 4, 'https://m.media-amazon.com/images/I/81pWPXNytTL._AC_SX679_.jpg', 'boutton fille'),
(84, 'Body à Manches Courtes Bébé Garçon', 17.20, 4, 'https://m.media-amazon.com/images/I/81J0daiF1vL._AC_SY741_.jpg', 'body garçon'),
(85, 'Body à Manches Courtes Bébé Garçon', 27.40, 4, 'https://m.media-amazon.com/images/I/91U4UktkVaL._AC_SY741_.jpg', 'body garçon'),
(86, 'Body à Manches Longues Mixte Bébé, Lot de 5', 29.90, 4, 'https://m.media-amazon.com/images/I/81CuVRSC6gL._AC_SX679_.jpg', 'body garçon'),
(87, ' Body (Lot de 3) Mixte bébé', 10.95, 4, 'https://m.media-amazon.com/images/I/81o7Lvd8YPL._AC_SY550_.jpg', 'body garçon'),
(88, 'Chaussettes Mixte bébé', 6.99, 4, 'https://m.media-amazon.com/images/I/713-ADcd4SL._AC_SX522_.jpg', 'chaussette'),
(89, 'Bébé fille Calzini Per Neonato 3er-pack Chaussette', 6.86, 4, 'https://m.media-amazon.com/images/I/81DTNpJDnUL._AC_SX679_.jpg', 'chaussette'),
(90, 'Chaussette première éléphant, Gris Clair chiné, 0 ', 5.76, 5, 'https://m.media-amazon.com/images/I/81K5ityu-NL._AC_SY741_.jpg', 'chaussette'),
(92, 'Bonnet Bébé Naissance - Fille - 1/3 Mois - Rose', 14.36, 4, 'https://m.media-amazon.com/images/I/61MvqLS1IZL.__AC_SY445_SX342_QL70_ML2_.jpg', 'bonnet'),
(93, 'vêtements Enfant Unisex Bonnet Dani', 7.99, 4, 'https://m.media-amazon.com/images/I/81PQTNvajoL._AC_SX679_.jpg', 'bonnet'),
(94, 'Ensemble Moufles et Bonnet', 17.99, 4, 'https://m.media-amazon.com/images/I/81OnHX0MLkL._AC_SY741_.jpg', 'bonnet'),
(95, 'Bonnet Bébé Naissance, Bonnet Bebe 0-6 Mois Garcon', 23.98, 4, 'https://m.media-amazon.com/images/I/712LtfudIAL._AC_SX679_.jpg', 'bonnet'),
(96, 'Philips Avent Écoute-bébé DECT Mode Smart ECO, Con', 540.99, 4, 'https://m.media-amazon.com/images/I/61xYVpySYUL._AC_SL1500_.jpg', 'produits bébé'),
(97, '1 Gel Lavant 750ml + 1 Lait de toilette 750ml + 1 ', 200.03, 4, 'https://m.media-amazon.com/images/I/71y62x72seL._AC_SL1500_.jpg', 'produits bébé'),
(98, 'Lingettes nettoyantes H2O à l\'eau pour Peaux sensi', 100.98, 4, 'https://m.media-amazon.com/images/I/61p1fn-3gOL.__AC_SX300_SY300_QL70_ML2_.jpg', 'produits bébé'),
(99, 'Lansinoh I Douche intime périnée', 90.00, 5, 'https://m.media-amazon.com/images/I/71dSTOlwV+L._AC_SY300_SX300_.jpg', 'produits bébé'),
(100, 'Ceinture Avec Noyaux De Cerises Bleus, Idéale Pour', 110.99, 4, 'https://m.media-amazon.com/images/I/7187KiwLJJL.__AC_SX300_SY300_QL70_ML2_.jpg', 'produits bébé'),
(101, 'Tigex Kits de Toilettes 2 Éponges Végétales Boule ', 40.90, 4, 'https://m.media-amazon.com/images/I/41OFQAYSF6L._SY445_SX342_QL70_ML2_.jpg', 'produits bébé'),
(102, 'Pampers Lingettes Bébé Fresh Clean, 624 Lingettes ', 60.50, 4, 'https://m.media-amazon.com/images/I/61FD6Ot0E9L.__AC_SX300_SY300_QL70_ML2_.jpg', 'produits bébé'),
(103, 'Babymoov Trousse de Soin Bébé Compact 9 Accessoire', 320.90, 5, 'https://m.media-amazon.com/images/I/813MQ5cFEkL.__AC_SY300_SX300_QL70_ML2_.jpg', 'produits bébé');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `F_NAME` varchar(50) NOT NULL,
  `L_NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`F_NAME`, `L_NAME`, `EMAIL`, `LOGIN`, `PASSWORD`) VALUES
('arab', 'nabila', 'nabila@llgmail.com', 'bila', 'ssss'),
('arab', 'nabila', 'nabila@llgmail.com', 'bila', 'ssss'),
('arab', 'nabila', 'nabila@llgmail.com', 'bila', 'ssss'),
('bilaa', 'nabila', 'bilaa@hotmail.fr', 'bila', 'abcd'),
('arab', 'nabila', 'bilaa1@hotmail.fr', 'nabila', '1111'),
('bilaa', 'nabila', 'bilaa@hotmail.fr', 'bila', 'sooo'),
('hoda', 'nour', 'nourelhodaelkaouti@gmail.com', 'nour', 'estsb'),
('', '', '', '', ''),
('lamchachti', 'fatima', 'fatimalamchachti@gmail.com', 'fatima', 'fatima'),
('Nour El Hoda', 'El Kaouti', 'nourelhodaelkaouti@gmail.com', 'nour', 'estsb');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
