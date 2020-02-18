-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql.helpinghost.net:3306
-- Généré le :  lun. 17 fév. 2020 à 15:50
-- Version du serveur :  10.3.22-MariaDB-cll-lve
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `magameca_complete-blog-php`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comments` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `postId` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `comments`, `postId`, `date`, `image`) VALUES
(10, 'bonjour premier commentaire', 4, '2020-02-17 13:03:53', 'uploads/magame.png'),
(11, 'second commentaire', 4, '2020-02-17 13:05:26', 'uploads/'),
(12, 'asdf', 4, '2020-02-17 13:07:44', 'uploads/'),
(13, 'commentaire de second post avec image', 5, '2020-02-17 13:14:42', 'uploads/action-bike-bike-rider-biker-217872.jpg'),
(14, 'Hey les amis ', 4, '2020-02-17 16:19:46', 'uploads/DBA9E376-8712-46E8-AFE3-EA52E2CDF906.png'),
(15, 'Salut', 4, '2020-02-17 16:24:08', 'uploads/918D7DED-0C96-48D5-8892-9E571757D31D.png');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id`, `title`, `description`, `date`, `image`) VALUES
(4, 'premier post', 'asfasfsdapremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier postpremier post', '2020-02-17 13:03:24', 'uploads/backWallpaper.jpg'),
(5, 'second post', 'second postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond postsecond post', '2020-02-17 13:14:15', 'uploads/ball.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
