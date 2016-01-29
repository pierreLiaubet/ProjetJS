-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 11 Janvier 2016 à 15:30
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `southpark`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `titre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `image` varchar(30) NOT NULL,
  `content` mediumtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`titre`, `image`, `content`) VALUES
('Premier article : Juste pour essayer', 'Images/eric.jpg', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pretium nisl quis gravida ultrices. Cras a augue a elit imperdiet euismod. Proin efficitur rhoncus urna, eget varius nisi consequat eget. Maecenas ut mauris ligula. Cras in eleifend nisi. Ut vel dapibus metus. Suspendisse aliquet tempor urna sed sagittis. Donec cursus mi faucibus est tempus tristique. Etiam facilisis vehicula est, sed mattis mauris sollicitudin at. Nulla aliquet blandit massa. Aenean imperdiet ante in vulputate ultrices. Donec ac dui mi. Vestibulum convallis nisi eu pretium auctor. Nunc finibus ornare dui, ac eleifend dui imperdiet ut. Fusce blandit odio nulla, quis facilisis nisi tincidunt quis. Vestibulum ultricies luctus lacus, vel ullamcorper quam dictum blandit.\r\n\r\nNam elit sapien, sollicitudin id malesuada ornare, semper vel mi. Etiam egestas gravida nunc non posuere. Phasellus nulla enim, semper ut mi vitae, fermentum accumsan felis. Aliquam pretium felis massa, vehicula rhoncus dolor venenatis non. Aenean vel iaculis ex. Sed tristique congue magna suscipit consequat. Nunc ut placerat dui, id interdum nibh. Fusce tincidunt erat et libero luctus auctor. Ut posuere, justo sit amet auctor gravida, velit ante vestibulum quam, vitae fringilla nisi velit eget ligula. Proin facilisis lectus arcu, ac rhoncus lectus mattis dapibus. In eu risus eu ante ultricies condimentum. Pellentesque eleifend nisl ex, eu gravida orci dapibus auctor. Fusce commodo rutrum nisi eu tincidunt. '),
('Deuxieme article : apres essayer, on confirme', 'Images/respecteMonAutorite.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pretium nisl quis gravida ultrices. Cras a augue a elit imperdiet euismod. Proin efficitur rhoncus urna, eget varius nisi consequat eget. Maecenas ut mauris ligula. Cras in eleifend nisi. Ut vel dapibus metus. Suspendisse aliquet tempor urna sed sagittis. Donec cursus mi faucibus est tempus tristique. Etiam facilisis vehicula est, sed mattis mauris sollicitudin at. Nulla aliquet blandit massa. Aenean imperdiet ante in vulputate ultrices. Donec ac dui mi. Vestibulum convallis nisi eu pretium auctor. Nunc finibus ornare dui, ac eleifend dui imperdiet ut. Fusce blandit odio nulla, quis facilisis nisi tincidunt quis. Vestibulum ultricies luctus lacus, vel ullamcorper quam dictum blandit. Nam elit sapien, sollicitudin id malesuada ornare, semper vel mi. Etiam egestas gravida nunc non posuere. Phasellus nulla enim, semper ut mi vitae, fermentum accumsan felis. Aliquam pretium felis massa, vehicula rhoncus dolor venenatis non. Aenean vel iaculis ex. Sed tristique congue magna suscipit consequat. Nunc ut placerat dui, id interdum nibh. Fusce tincidunt erat et libero luctus auctor. Ut posuere, justo sit amet auctor gravida, velit ante vestibulum quam, vitae fringilla nisi velit eget ligula. Proin facilisis lectus arcu, ac rhoncus lectus mattis dapibus. In eu risus eu ante ultricies condimentum. Pellentesque eleifend nisl ex, eu gravida orci dapibus auctor. Fusce commodo rutrum nisi eu tincidunt. '),
('Encore un', 'Images/head.jpg', 'Encore un juste parce que c est classe d avoir une page 2.');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `titreArticle` varchar(60) CHARACTER SET utf8 NOT NULL,
  `pseudo` varchar(20) CHARACTER SET utf8 NOT NULL,
  `content` varchar(1024) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`titreArticle`, `pseudo`, `content`) VALUES
('Deuxieme article : apres essayer, on confirme', 'pierre', '  pareil PAAAAAAAAAARRRRREEEEEEEEEEIIIIIIILLLLLLLLLLLLLLL !!'),
('Premier article : Juste pour essayer', 'Fonf', '  j aime trop ton boule j aime trop ton boule de mec !!!!'),
('Deuxieme article : apres essayer, on confirme', 'Fonf', '  j aime trop ton boule j aime trop ton boule de mec !!!!'),
('Premier article : Juste pour essayer', 'KaapSlap', 'Article de merde je comprend pas le latin !!'),
('South Park : Le BÃ¢ton de la VÃ©ritÃ©', 'Fonf', '  j aime trop ton boule j aime trop ton boule de mec !!!!');

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `login` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL,
  `role` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `member`
--

INSERT INTO `member` (`login`, `password`, `role`, `email`) VALUES
('pierre', 'azerty123', 'admin', 'unEmail@gmail.com'),
('Fonf', 'azerty123', 'registered', 'Fonf@fonfmail.com'),
('KaapSlap', 'Mabitebite38', 'registered', 'tasoeur@estbonne.com'),
('Momo', 'azerty', 'registered', 'momoDuGame@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

CREATE TABLE IF NOT EXISTS `personnage` (
  `nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `image` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` varchar(1024) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personnage`
--

INSERT INTO `personnage` (`nom`, `image`, `description`) VALUES
('Cartman', 'Images/eric.jpg', 'Cartman est un Ã©lÃ¨ve de l Ã©cole primaire de South Park, dans la classe de M. Garrison. Durant les 58 premiers Ã©pisodes, Cartman et ses camarades Ã©taient en CE2, ils passent alors dans une classe de CM1, oÃ¹ ils sont restÃ©s depuis. Il est le fils unique de Liane Cartman, une mÃ¨re cÃ©libataire prÃ©tendant Ãªtre hermaphrodite et avoir conÃ§u Eric elle-mÃªme. On apprend finalement dans l Ã©pisode 201 (saison 14, 2010) que son vÃ©ritable pÃ¨re biologique est Jack Tenorman, un joueur de football amÃ©ricain factice des Broncos de Denver que Cartman a tuÃ©, faisant de Scott Tenorman son demi-frÃ¨re.Cartman est considÃ©rÃ© comme le petit gros de la bande et son obÃ©sitÃ© est souvent sujet de moqueries Il est souvent prÃ©sentÃ© comme un antagoniste ou un antihÃ©ros dont les actions agissent sur l intrigue principale d un Ã©pisode. Les autres enfants sont irritÃ©s par le comportement insensible, raciste, homophobe, antisÃ©mite, misogyne, fainÃ©ant et hypocrite de Cartman.');

-- --------------------------------------------------------

--
-- Structure de la table `terreur`
--

CREATE TABLE IF NOT EXISTS `terreur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `sujet` varchar(20) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `terreur`
--

INSERT INTO `terreur` (`id`, `nom`, `sujet`, `email`, `dates`, `heure`, `description`) VALUES
(8, 'jeremy', 'test', 'kronenbourg19@gmail.com', '2016-01-10', '00:03:00', 'test'),
(9, 'jeremy', 'test', 'et@test.com', '2016-01-10', '21:16:00', 'test'),
(17, 'jeremy', 'test', 'test@gmail.com', '2016-01-10', '21:50:00', 'test'),
(18, 'test46000000', 'test', 'kronenbourg19@gmail.com', '2016-01-11', '09:02:00', 'tester la ... de gocene');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
