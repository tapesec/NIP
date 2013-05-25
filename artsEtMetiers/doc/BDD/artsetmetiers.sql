-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 24 Mai 2013 à 15:27
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `artsetmetiers`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(255) DEFAULT NULL,
  `art_content` text,
  `art_cat_id` int(11) DEFAULT NULL,
  `art_dateC` datetime DEFAULT NULL,
  `art_dateM` datetime DEFAULT NULL,
  `art_online` tinyint(1) NOT NULL,
  `art_slot` varchar(100) NOT NULL,
  PRIMARY KEY (`art_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`art_id`, `art_title`, `art_content`, `art_cat_id`, `art_dateC`, `art_dateM`, `art_online`, `art_slot`) VALUES
(1, 'Voici mon premier titre', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud  ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-04-26 10:05:00', NULL, 1, 'blog'),
(2, 'troisieme titre', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint st laborum.', 1, '2013-04-30 00:00:00', NULL, 1, 'blog'),
(3, 'il etait une fois', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-04-02 00:00:00', NULL, 1, 'blog'),
(4, 'titre5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-05-24 00:00:00', '2013-05-20 10:05:00', 1, 'blog'),
(5, 'titre6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2013-05-30 00:00:00', '2013-05-16 20:31:00', 1, 'blog'),
(6, 'titre7', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-05-24 00:00:00', NULL, 1, 'blog'),
(7, 'titre8', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-05-31 00:00:00', NULL, 1, 'blog'),
(9, 'titre10', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2013-05-30 00:00:00', '2013-05-18 16:37:00', 1, 'accueil'),
(10, 'titre11', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-06-12 00:00:00', NULL, 1, 'blog'),
(11, 'titre12', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-05-09 00:00:00', NULL, 1, 'blog');

-- --------------------------------------------------------

--
-- Structure de la table `avatars`
--

CREATE TABLE IF NOT EXISTS `avatars` (
  `ava_id` int(11) NOT NULL AUTO_INCREMENT,
  `ava_url` longtext NOT NULL,
  `ava_id_user` int(11) NOT NULL,
  PRIMARY KEY (`ava_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `avatars`
--

INSERT INTO `avatars` (`ava_id`, `ava_url`, `ava_id_user`) VALUES
(1, 'avatar/tapesec.png', 22);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'PHP'),
(2, 'CNAM');

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE IF NOT EXISTS `matieres` (
  `mat_id` int(11) NOT NULL AUTO_INCREMENT,
  `mat_name` varchar(100) DEFAULT NULL,
  `mat_url` longtext,
  `mat_statut` tinyint(1) DEFAULT NULL,
  `mat_start` datetime DEFAULT NULL,
  `mat_end` datetime DEFAULT NULL,
  `mat_succes` tinyint(1) DEFAULT NULL,
  `mat_obtention` datetime DEFAULT NULL,
  PRIMARY KEY (`mat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `matieres`
--

INSERT INTO `matieres` (`mat_id`, `mat_name`, `mat_url`, `mat_statut`, `mat_start`, `mat_end`, `mat_succes`, `mat_obtention`) VALUES
(1, 'Développement web niveau 1 (NFA016)', '/img/parcours/nfa016off.jpg', 0, '2013-09-15 00:00:00', '2014-01-01 00:00:00', NULL, NULL),
(2, 'Base de données (NFA 008)', '/img/parcours/nfa008off.jpg', NULL, '2013-09-11 00:00:00', '2014-01-15 00:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `pag_id` int(11) NOT NULL AUTO_INCREMENT,
  `pag_name` varchar(100) NOT NULL,
  `pag_url` longtext NOT NULL,
  `pag_type` varchar(100) NOT NULL,
  PRIMARY KEY (`pag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`pag_id`, `pag_name`, `pag_url`, `pag_type`) VALUES
(1, 'Blog', '/blog/index', 'front'),
(2, 'Parcours', '/parcours/index', 'front'),
(3, 'Portofolio', '/portofolio/index', 'front'),
(4, 'Forum', '/forum/index', 'front'),
(5, 'Accueil backoffice', '/backoff/index', 'back'),
(6, 'Ecrire un article', '/backoff/addArticle', 'back'),
(7, 'Liste des articles', '/backoff/listArticle', 'back'),
(8, 'Configuration du forum', '/backoff/forum', 'back'),
(9, 'Configuration des membres', '/backoff/listUsers', 'back');

-- --------------------------------------------------------

--
-- Structure de la table `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_id_subjects` int(45) DEFAULT NULL,
  `rep_id_author` int(45) DEFAULT NULL,
  `rep_id_editor` int(11) NOT NULL,
  `rep_title` varchar(45) DEFAULT NULL,
  `rep_content` longtext,
  `rep_dateC` datetime DEFAULT NULL,
  `rep_dateM` datetime DEFAULT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `replies`
--

INSERT INTO `replies` (`rep_id`, `rep_id_subjects`, `rep_id_author`, `rep_id_editor`, `rep_title`, `rep_content`, `rep_dateC`, `rep_dateM`) VALUES
(1, 1, 22, 0, 'Ma premiere réponse', 'Il était une fois un marchand de foie', '2013-05-29 00:00:00', '2013-05-23 14:18:00'),
(10, 1, 22, 22, 'une nouvelle réponse', 'lorem ipsum', '2013-05-23 15:57:00', '2013-05-24 17:21:00'),
(14, 2, 22, 0, 'it works !', 'qzdiozjdiojqzd', '2013-05-23 16:17:00', NULL),
(15, 1, 22, 22, 'nouveau sujet', 'C''est là ou on voit si tout a foutu le camp pour le moment non', '2013-05-24 17:09:00', '2013-05-24 17:09:00'),
(17, 1, 22, 0, 'test', 'qzdqzdqzqz', '2013-05-24 17:20:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `sec_id` int(11) NOT NULL AUTO_INCREMENT,
  `sec_name` varchar(100) DEFAULT NULL,
  `sec_online` tinyint(1) NOT NULL,
  PRIMARY KEY (`sec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `sections`
--

INSERT INTO `sections` (`sec_id`, `sec_name`, `sec_online`) VALUES
(1, 'test de section', 1),
(2, 'Une nouvelle sec', 0),
(3, 'troisieme section', 1),
(4, 'quatrieme section', 0),
(5, 'test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_content` longtext,
  `sub_id_sections` int(11) DEFAULT NULL,
  `sub_id_author` int(11) DEFAULT NULL,
  `sub_title` varchar(100) DEFAULT NULL,
  `sub_dateC` datetime DEFAULT NULL,
  `sub_dateM` datetime DEFAULT NULL,
  `sub_online` tinyint(1) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `sub_content`, `sub_id_sections`, `sub_id_author`, `sub_title`, `sub_dateC`, `sub_dateM`, `sub_online`) VALUES
(1, 'Voici un sujet que l''on nommera bienvenue sur la section x', 1, 22, 'Le titre de mon premier sujet', '2013-05-22 00:00:00', NULL, 1),
(2, 'blablabla', 1, 22, 'Le titre de mon second sujet', '2013-05-29 00:00:00', '2013-05-31 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `use_id` int(11) NOT NULL AUTO_INCREMENT,
  `use_login` varchar(255) NOT NULL,
  `use_mail` varchar(255) NOT NULL,
  `use_prenom` varchar(150) NOT NULL,
  `use_profession` varchar(250) NOT NULL,
  `use_residence` varchar(100) NOT NULL,
  `use_etudes` varchar(255) NOT NULL,
  `use_password1` varchar(255) NOT NULL,
  `use_password2` varchar(255) NOT NULL,
  `use_dateI` datetime NOT NULL,
  `use_dateC` datetime NOT NULL,
  `use_statut` int(1) NOT NULL,
  `use_checked` tinyint(1) NOT NULL,
  PRIMARY KEY (`use_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`use_id`, `use_login`, `use_mail`, `use_prenom`, `use_profession`, `use_residence`, `use_etudes`, `use_password1`, `use_password2`, `use_dateI`, `use_dateC`, `use_statut`, `use_checked`) VALUES
(22, 'tapesec', 'lionel.dupouy@gmail.com', 'Lionnel', 'Developpeur', 'Paris', 'CNAM', 'wolf', 'wolf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1),
(23, 'elodie', 'elodie@gmail.com', '', '', '', '', 'wolf', 'wolf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(24, 'louise', 'louise@gmail.com', '', '', '', '', 'wolf', 'wolf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
