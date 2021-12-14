-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 15 déc. 2021 à 00:26
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cv`
--

-- --------------------------------------------------------

--
-- Structure de la table `cr`
--

CREATE TABLE `cr` (
  `id_cr` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `fnpdf` varchar(255) NOT NULL,
  `forigrn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cr`
--

INSERT INTO `cr` (`id_cr`, `img`, `fname`, `lname`, `email`, `job`, `fnpdf`, `forigrn`) VALUES
(122, '1280px-Mount_Stuart_House_2018-08-25.jpg', 'taha', 'echchoual', 'techchoual@gmail.com', 'XC?/N K/CSN', 'pdf1', 84),
(123, '1280px-Mount_Stuart_House_2018-08-25.jpg', 'taha', 'echchoual', 'techchoual@gmail.com', 'XC?/N K/CSN', 'pdf1', 84),
(124, '1280px-Mount_Stuart_House_2018-08-25.jpg', 'taha', 'echchoual', 'techchoual@gmail.com', 'HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH', 'pdf1', 84),
(126, 'Annotation 2020-08-31 182139.png', 'taha', 'echchoual', 'techchoual9@gmail.com', 'xc,; n;kxcnkl nsclj nlshn vlSDNioSDJN', 'pdfw,lk', 84),
(127, 'Annotation 2020-09-01 155951.png', 'taha', 'echchoual', 'techchoual7@gmail.com', ',,,,,,,,,,xcncnnnnnnnnnnnnnnnnnnnnnnnn', 'taha echchoual', 84),
(128, 'Annotation 2020-06-21 215818.png', 'taha', 'echchoual', 'techchoual@gmail.com', 'nnnnnnnnnnnnnnnnnnnnnnnnnn', 'pdf1', 84),
(129, 'Annotation 2020-06-21 215818.png', 'taha', 'echchoual', 'AMINA@GMAIL.COM', 'sdjpvosdpovjsdkcmosdj', 'now', 84),
(130, 'Annotation 2020-06-21 215818.png', 'taha', 'echchoual', 'AMINA@GMAIL.COM', 'sdjpvosdpovjsdkcmosdj', 'now', 84),
(131, 'Annotation 2020-08-31 182139.png', 'taha', 'echchoual', 'techchoual@gmail.com', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnn', 'pdf1', 84),
(132, 'Annotation 2020-08-31 182139.png', 'taha', 'echchoual', 'techchoual@gmail.com', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnn', 'pdf1', 84),
(133, 'Annotation 2020-08-31 182139.png', 'taha', 'echchoual', 'techchoual@gmail.com', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnn', 'pdf1', 84),
(134, 'Annotation 2020-08-31 182139.png', 'taha', 'echchoual', 'techchoual@gmail.com', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnn', 'pdf1', 84),
(136, '1280px-Mount_Stuart_House_2018-08-25.jpg', 'taha', 'echchoual', 'techchoual7@gmail.com', 'full stack web developer', 'pdf1', 85);

-- --------------------------------------------------------

--
-- Structure de la table `img`
--

CREATE TABLE `img` (
  `id_img` int(11) NOT NULL,
  `src` varchar(255) NOT NULL,
  `forimg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `img`
--

INSERT INTO `img` (`id_img`, `src`, `forimg`) VALUES
(8, '1280px-Mount_Stuart_House_2018-08-25.jpg', 84),
(9, 'tax.jpg', 85);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `fname`, `lname`, `email`, `password`) VALUES
(84, 'taha', 'echchoual', 'mmdrasa552@gmail.com', '9S+ahbrqDDxXWedMJDvW6A=='),
(85, 'tahax', 'echchoualx', 'techchoual7@gmail.com', '9S+ahbrqDDxXWedMJDvW6A==');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cr`
--
ALTER TABLE `cr`
  ADD PRIMARY KEY (`id_cr`),
  ADD KEY `forigrn` (`forigrn`);

--
-- Index pour la table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `forimg` (`forimg`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cr`
--
ALTER TABLE `cr`
  MODIFY `id_cr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT pour la table `img`
--
ALTER TABLE `img`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cr`
--
ALTER TABLE `cr`
  ADD CONSTRAINT `cr_ibfk_1` FOREIGN KEY (`forigrn`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `img_ibfk_1` FOREIGN KEY (`forimg`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
