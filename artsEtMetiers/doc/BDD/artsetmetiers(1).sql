-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 15 Mai 2013 à 14:31
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`art_id`, `art_title`, `art_content`, `art_cat_id`, `art_dateC`, `art_dateM`, `art_online`, `art_slot`) VALUES
(1, 'Voici mon premier titre', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud  ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-04-26 10:05:00', NULL, 1, 'blog'),
(2, 'troisieme titre', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint st laborum.', 1, '2013-04-30 00:00:00', NULL, 1, 'blog'),
(3, 'il etait une fois', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-04-02 00:00:00', NULL, 1, 'blog'),
(4, 'titre5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-05-24 00:00:00', NULL, 1, 'blog'),
(5, 'titre6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-05-30 00:00:00', NULL, 1, 'blog'),
(6, 'titre7', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-05-24 00:00:00', NULL, 1, 'blog'),
(7, 'titre8', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-05-31 00:00:00', NULL, 1, 'blog'),
(8, 'titre9', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-05-30 00:00:00', NULL, 1, 'blog'),
(9, 'titre10', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-05-30 00:00:00', NULL, 1, 'blog'),
(10, 'titre11', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-06-12 00:00:00', NULL, 1, 'blog'),
(11, 'titre12', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-05-09 00:00:00', NULL, 1, 'blog'),
(12, 'titre13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-05-29 00:00:00', NULL, 1, 'blog'),
(13, 'titre14', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-05-28 00:00:00', NULL, 1, 'blog');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

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
(7, 'Liste des articles', '/backoff/listArticle', 'back');

-- --------------------------------------------------------

--
-- Structure de la table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_id_subjects` varchar(45) DEFAULT NULL,
  `rep_id_author` varchar(45) DEFAULT NULL,
  `rep_title` varchar(45) DEFAULT NULL,
  `rep_content` varchar(45) DEFAULT NULL,
  `rep_dateC` varchar(45) DEFAULT NULL,
  `rep_dateM` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `sec_id` int(11) NOT NULL AUTO_INCREMENT,
  `sec_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `use_statut` int(1) NOT NULL,
  `use_checked` tinyint(1) NOT NULL,
  PRIMARY KEY (`use_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`use_id`, `use_login`, `use_mail`, `use_prenom`, `use_profession`, `use_residence`, `use_etudes`, `use_password1`, `use_password2`, `use_statut`, `use_checked`) VALUES
(22, 'tapesec', 'lionel.dupouy@gmail.com', 'Lionnel', 'Developpeur', 'Paris', 'HEC', 'wolf', 'wolf', 10, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
