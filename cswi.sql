-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 23 Août 2017 à 23:25
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cswi`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_user` (IN `Login` VARCHAR(50), IN `Birth_Date` DATE, IN `Email` VARCHAR(100), IN `Pass_word` VARCHAR(50), IN `Security_Level` INT(2))  NO SQL
INSERT INTO `users` VALUES (Login, Birth_Date, Email, Pass_word, Security_Level)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_user` (IN `log` VARCHAR(50))  NO SQL
DELETE FROM users WHERE `login` = log$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_user` (IN `Log` VARCHAR(50), IN `BirthDate` DATE, IN `Mail` VARCHAR(100), IN `Pass_Word` VARCHAR(100), IN `Sec_Level` INT(2))  NO SQL
UPDATE users SET birth_date=BirthDate, e_mail=Mail, pass_word=Pass_Word,security_level = Sec_Level WHERE login=Log$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `login` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `e_mail` varchar(100) NOT NULL,
  `pass_word` varchar(60) NOT NULL,
  `security_level` int(2) NOT NULL DEFAULT '5'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`login`, `birth_date`, `e_mail`, `pass_word`, `security_level`) VALUES
('admin', '2017-08-01', 'admin@mail.adm', 'f0b4b965436ccd584d5d971b764bae0d41ff672f', 10),
('user1', '1993-06-21', 'user1@mail.com', 'f0b4b965436ccd584d5d971b764bae0d41ff672f', 10),
('user2', '2017-08-11', 'user2@mail.be', 'f0b4b965436ccd584d5d971b764bae0d41ff672f', 5);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
