<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 11/12/2015
 * Time: 16:50
 */

$rep = __DIR__.'/../';

$needed['validate'] = 'Config/Validate.php';

$dsn = "mysql:host=localhost;dbname=SouthPark";
$login = "pierre";
$password = "azerty";

$views['error'] = 'Error.twig';
$views['home'] = 'Acceuil.twig';
$views['connection'] = 'ConnectScreen.php';
$views['addArticle'] = 'AddArticle.twig';
$views['register'] = 'Register.twig';
$views['personnages'] = 'Personnages.twig';
$views['nouveauPerso'] = 'nouveauPerso.twig';
$views['modif'] = 'ModifierPersonnage.twig';
$views['swithPages'] = 'SwitchPages.twig';
$views['contact'] = 'Contact.twig';
$views['raport'] = 'RapportErreur.twig';
$views['AddImage']= 'AddImage.twig';
$views['modifierCommViews'] = 'ModifierCommentaireViews.twig';