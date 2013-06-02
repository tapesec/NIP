-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 31 Mai 2013 à 15:25
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
  `art_use_id` int(11) NOT NULL,
  `art_dateC` datetime DEFAULT NULL,
  `art_dateM` datetime DEFAULT NULL,
  `art_online` tinyint(1) NOT NULL,
  `art_slot` varchar(100) NOT NULL,
  PRIMARY KEY (`art_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`art_id`, `art_title`, `art_content`, `art_cat_id`, `art_use_id`, `art_dateC`, `art_dateM`, `art_online`, `art_slot`) VALUES
(1, 'Voici mon premier titre', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud  ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 22, '2013-04-26 10:05:00', '2013-05-28 16:04:00', 1, 'blog'),
(2, 'troisieme titre', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint st laborum.', 1, 23, '2013-04-30 00:00:00', '2013-05-28 13:35:00', 1, 'blog'),
(3, 'il etait une fois', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 22, '2013-04-02 00:00:00', NULL, 1, 'blog'),
(4, 'titre5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 22, '2013-05-24 00:00:00', '2013-05-20 10:05:00', 1, 'blog'),
(5, 'titre6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 23, '2013-05-30 00:00:00', '2013-05-16 20:31:00', 1, 'blog'),
(6, 'titre7', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 22, '2013-05-24 00:00:00', NULL, 1, 'blog'),
(7, 'titre8', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 22, '2013-05-31 00:00:00', NULL, 1, 'blog'),
(9, 'titre10', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 22, '2013-05-30 00:00:00', '2013-05-18 16:37:00', 1, 'accueil'),
(10, 'titre11', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 23, '2013-06-12 00:00:00', '2013-05-28 13:38:00', 1, 'blog'),
(11, 'titre12', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 22, '2013-05-09 00:00:00', NULL, 1, 'blog'),
(12, 'Ecrivez moi 100 fois ..', '<p>Bonjour ch&egrave;re visiteurs de Arts &amp; m&eacute;tiers,</p>\r\n<p>Pour inaugurer cette rubrique "testez vous sur .." voici un premier &eacute;xercice.<br />Vous devez &eacute;crire le plus proprement possible 100 fois "Je dois bien commenter mon code".<br />En PhP et le plus &eacute;l&eacute;gament possible c''est &agrave; vous la correction est pour demain !</p>\r\n<p>Good luck !</p>', 4, 0, '2013-05-31 16:02:00', '2013-05-31 17:24:00', 1, 'blog');

-- --------------------------------------------------------

--
-- Structure de la table `avatars`
--

CREATE TABLE IF NOT EXISTS `avatars` (
  `ava_id` int(11) NOT NULL AUTO_INCREMENT,
  `ava_url` longtext NOT NULL,
  `ava_id_user` int(11) NOT NULL,
  PRIMARY KEY (`ava_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `avatars`
--

INSERT INTO `avatars` (`ava_id`, `ava_url`, `ava_id_user`) VALUES
(1, 'avatar/tapesec.jpg', 22),
(2, 'avatar/elodie.jpg', 23),
(3, 'avatar/default.png', 25),
(4, 'avatar/default.png', 26);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'PHP'),
(2, 'CNAM'),
(3, 'HTML5 / CSS3'),
(4, 'EXERCICE');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_content` longtext NOT NULL,
  `com_dateC` datetime NOT NULL,
  `com_dateM` datetime NOT NULL,
  `com_id_user` int(11) NOT NULL,
  `com_id_article` int(11) NOT NULL,
  `com_name_editor` varchar(100) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`com_id`, `com_content`, `com_dateC`, `com_dateM`, `com_id_user`, `com_id_article`, `com_name_editor`) VALUES
(2, 'Un nouveau commentaire de test avec un format beaucoup plus long. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin commodo arcu ac purus interdum et auctor quam dictum. Pellentesque a elit eget diam feugiat vestibulum. Praesent ut lectus ac erat faucibus interdum. Mauris porta venenatis tellus, et consequat lorem commodo vel. Sed ac erat eu metus pharetra viverra. Suspendisse euismod erat a dolor pharetra ut tempor turpis fringilla. Etiam in est non erat interdum posuere sodales a est. Sed vestibulum lorem quis risus scelerisque tincidunt. Nulla imperdiet leo vel diam accumsan in luctus lectus commodo. .', '2013-05-30 00:00:00', '2013-05-29 14:19:00', 22, 11, 'tapesec'),
(8, 'Un nouveau commentaire.', '2013-05-29 14:22:00', '2013-05-29 14:27:00', 23, 11, 'elodie'),
(15, '[code]<?php \r\n$hello = ''hello world !'';\r\necho ''<p>''.$hello.''</pre>''; ?>[/code]', '2013-05-30 14:02:00', '0000-00-00 00:00:00', 22, 11, ''),
(25, '[code]<?php echo ''hello world''; ?>[/code]', '2013-05-30 15:24:00', '0000-00-00 00:00:00', 22, 11, ''),
(26, '[code]\r\n<?php for($i=0;$i<100;$i++): ?>\r\n   echo ''Je dois bien commenter mon code'';\r\n<?php endfor; ?>\r\n[/code]', '2013-05-31 16:18:00', '0000-00-00 00:00:00', 22, 12, '');

-- --------------------------------------------------------

--
-- Structure de la table `diplomes`
--

CREATE TABLE IF NOT EXISTS `diplomes` (
  `dip_id` int(11) NOT NULL AUTO_INCREMENT,
  `dip_name` varchar(255) NOT NULL,
  `dip_code` varchar(10) NOT NULL,
  `dip_img_url` longtext NOT NULL,
  PRIMARY KEY (`dip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`pag_id`, `pag_name`, `pag_url`, `pag_type`) VALUES
(1, 'Blog', '/blog/index', 'front'),
(2, 'Carte de visite', '/parcours/index', 'front'),
(4, 'Forum', '/forum/index', 'front'),
(5, 'Interface administration', '/backoff/index', 'back'),
(6, 'Ecrire un article', '/backoff/addArticle', 'back'),
(7, 'Liste des articles', '/backoff/listArticle', 'back'),
(8, 'Configuration du forum', '/backoff/forum', 'back'),
(9, 'Configuration des membres', '/backoff/listUsers', 'back'),
(10, 'Thèmes du blog', '/backoff/listCat', 'back'),
(11, 'Accueil', '/accueil/index', 'front');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `replies`
--

INSERT INTO `replies` (`rep_id`, `rep_id_subjects`, `rep_id_author`, `rep_id_editor`, `rep_title`, `rep_content`, `rep_dateC`, `rep_dateM`) VALUES
(1, 1, 22, 22, 'Ma premiere réponse', 'Il était une fois un marchand de foie voyons si je rajoute un max de texte ce qu''il arrive. Tiens note pour plus tard, il faut que je mettre en place la solution markitup comme éditeur de texte ca sera plus sympa qu''un textearéa bourrin', '2013-05-29 00:00:00', '2013-05-27 15:33:00'),
(14, 2, 22, 0, 'it works !', 'qzdiozjdiojqzd', '2013-05-23 16:17:00', NULL),
(15, 1, 22, 22, 'nouveau sujet', 'C''est là ou on voit si tout a foutu le camp pour le moment non', '2013-05-24 17:09:00', '2013-05-24 17:09:00'),
(18, 3, 23, 23, 'Une réponse venant de elodie', 'Et du texte venant de Elodie répondant au sujet :  "Un sujet sous bootstrap" posté par tapesec', '2013-05-27 16:13:00', '2013-05-27 16:14:00'),
(19, 4, 23, 0, 'Une première réponse de Elodie', 'Voilà la réponse rien de anormal pour le moment', '2013-05-27 16:16:00', NULL),
(20, 4, 22, 0, 'Et une réponse de Tapesec', 'Une réponse de tapesec pour verifier si ca colle mais je doute.', '2013-05-27 16:16:00', NULL),
(21, 1, 23, 0, 'Une réponse de Elodie', 'Cela commence à sentir bon n''est il pas ?', '2013-05-27 16:37:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `sec_id` int(11) NOT NULL AUTO_INCREMENT,
  `sec_name` varchar(100) DEFAULT NULL,
  `sec_online` tinyint(1) NOT NULL,
  PRIMARY KEY (`sec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `sections`
--

INSERT INTO `sections` (`sec_id`, `sec_name`, `sec_online`) VALUES
(1, 'Développement Web', 1),
(7, 'Réseau et Web', 1),
(8, 'Base de données', 1),
(9, 'Développement Java introduction', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `sub_content`, `sub_id_sections`, `sub_id_author`, `sub_title`, `sub_dateC`, `sub_dateM`, `sub_online`) VALUES
(1, 'Voici un sujet que l''on nommera bienvenue sur la section x', 1, 22, 'Le titre de mon premier sujet', '2013-05-22 00:00:00', NULL, 1),
(2, ' <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros magna, mattis id aliquam ut, luctus id velit. Phasellus turpis eros, fringilla faucibus porttitor id, volutpat nec risus. Suspendisse eu mauris neque, eu condimentum tellus. Etiam nunc magna, adipiscing et cursus lacinia, fringilla in ipsum. Nam lectus lacus, suscipit eu egestas vitae, cursus eget orci. In a placerat urna. Sed sed felis urna, vitae vulputate turpis. In fermentum lorem eu lorem semper blandit. In pulvinar suscipit risus id aliquam. Maecenas mattis, nulla eget vulputate mollis, massa orci dapibus metus, feugiat faucibus elit augue eget nisi. Nullam posuere suscipit commodo.</p>\r\n\r\n<p>Ut non aliquet urna. Quisque et nulla et elit semper scelerisque. Nullam sodales mattis urna eu porttitor. Phasellus erat lorem, pellentesque a congue sit amet, blandit vitae diam. Vivamus vel felis neque. Morbi posuere sagittis placerat. Sed congue, sem et placerat pulvinar, odio felis dapibus massa, eget sagittis neque neque facilisis felis. In hac habitasse platea dictumst. Suspendisse id tortor quis purus mattis vehicula sed nec risus. </p>', 1, 22, 'Le titre de mon second sujet', '2013-05-29 00:00:00', '2013-05-31 00:00:00', 1),
(3, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros magna, mattis id aliquam ut, luctus id velit. Phasellus turpis eros, fringilla faucibus porttitor id, volutpat nec risus. Suspendisse eu mauris neque, eu condimentum tellus. Etiam nunc magna, adipiscing et cursus lacinia, fringilla in ipsum. Nam lectus lacus, suscipit eu egestas vitae, cursus eget orci. In a placerat urna. Sed sed felis urna, vitae vulputate turpis. In fermentum lorem eu lorem semper blandit. In pulvinar suscipit risus id aliquam. Maecenas mattis, nulla eget vulputate mollis, massa orci dapibus metus, feugiat faucibus elit augue eget nisi. Nullam posuere suscipit commodo.\r\n\r\nUt non aliquet urna. Quisque et nulla et elit semper scelerisque. Nullam sodales mattis urna eu porttitor. Phasellus erat lorem, pellentesque a congue sit amet, blandit vitae diam. Vivamus vel felis neque. Morbi posuere sagittis placerat. Sed congue, sem et placerat pulvinar, odio felis dapibus massa, eget sagittis neque neque facilisis felis. In hac habitasse platea dictumst. Suspendisse id tortor quis purus mattis vehicula sed nec risus. ', 1, 22, 'Un sujet sous bootstrap', '2013-05-27 15:39:00', NULL, 1),
(4, ' <p>Morbi ipsum enim, varius at tempor sit amet, fermentum a ipsum. Vivamus et eros et purus scelerisque blandit eget id urna. Ut volutpat turpis lacus. Proin fermentum sagittis tempor. Vivamus et est turpis. Quisque dapibus ante at dui vestibulum non dictum metus tempor. Donec semper lectus eleifend neque rutrum tempor. In a leo ligula, non congue nisl. Ut adipiscing tristique commodo. Proin et sem quis mi viverra placerat vitae consequat enim. In faucibus adipiscing venenatis. Maecenas elementum malesuada sem nec dignissim. In eu diam nunc. Proin id nunc ac ipsum viverra dapibus. Morbi quis quam eget risus tempor pretium eget quis urna. Phasellus mattis tincidunt erat.</p>\r\n\r\n<p>Aenean pellentesque mi non lacus tristique ac pulvinar massa venenatis. Mauris fermentum sem non nulla blandit eu hendrerit purus semper. Curabitur in orci ac risus dignissim ullamcorper. Vivamus volutpat quam vitae ligula ornare sollicitudin. Nulla dolor velit, vulputate et imperdiet at, tincidunt ac erat. Ut dictum lorem justo. Suspendisse potenti. Integer molestie lorem et lectus iaculis venenatis. Vivamus at elit a velit porttitor luctus eget quis purus. Curabitur justo lacus, rutrum vel blandit vel, ultricies rutrum sapien. Duis cursus vehicula diam quis egestas. Nulla et arcu quis dolor consequat fringilla. In id ipsum id tellus egestas dignissim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p>', 1, 23, 'Un nouveau sujet de Elodie', '2013-05-27 16:15:00', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `udiplomes`
--

CREATE TABLE IF NOT EXISTS `udiplomes` (
  `udp_id` int(11) NOT NULL AUTO_INCREMENT,
  `udp_use_id` int(11) NOT NULL,
  `udp_dip_id` int(11) NOT NULL,
  PRIMARY KEY (`udp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`use_id`, `use_login`, `use_mail`, `use_prenom`, `use_profession`, `use_residence`, `use_etudes`, `use_password1`, `use_password2`, `use_dateI`, `use_dateC`, `use_statut`, `use_checked`) VALUES
(22, 'tapesec', 'lionel.dupouy@gmail.com', 'Lionnel', 'Developpeur', 'Paris', 'CNAM', 'wolf', 'wolf', '0000-00-00 00:00:00', '2013-05-31 10:45:00', 10, 1),
(23, 'elodie', 'elodie@gmail.com', '', '', '', '', 'wolf', 'wolf', '0000-00-00 00:00:00', '2013-05-30 17:37:00', 1, 1),
(24, 'louise', 'louise@gmail.com', '', '', '', '', 'wolf', 'wolf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(25, 'chatouille', 'chat@gmail.com', '', '', '', '', 'wolf', 'wolf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(26, 'Gaelle', 'gaelle@gmail.com', '', '', '', '', 'wolf', 'wolf', '2013-05-28 14:15:00', '0000-00-00 00:00:00', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
