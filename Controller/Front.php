<?php

/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 15/12/2015
 * Time: 18:00
 */
class Front
{
    function __construct()
    {
        session_start();
        global $views, $twig;
        require_once 'Twig/lib/Twig/Autoloader.php';
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem(array('View/templates'));
        $twig = new Twig_Environment($loader, array('cache' => false));
        $tMessage = array();
        $listActionAdmin = array('supprCom','pageAjouterArticle','ajouterArticle', 'supprimerArticle','ajouterPersonnageScreen',
                                    'ajouterPerso','listerErreur','modifierPersoScreen','modifierPerso','suprimmerPerso','suprimerErreur','ajouterImg','suppImg','viewAddImage');
        $listActionRegistrated = array('deconnect','comment','modifComm','modifierCommViews');
        $action = $_REQUEST['action'];
        $role = MdlMember::role();
        try
        {
            //teste si l'action fait parties des actions réservées à l'admin
            if (in_array($action,$listActionAdmin))
            {
                //teste si le role de la session est admin
                if ($role == 'admin')
                {
                    new CtrlAdmin();
                }
                else
                {
                    throw new Exception("Vous n'avez pas les droits");
                }
            }
            //le traitement est le même que pour l'admin
            if (in_array($action,$listActionRegistrated))
            {
                if($role == 'registered' || $role == 'admin')
                {
                    new CtrlRegistrated();
                }
                else
                {
                    throw new Exception("Vous devez vous connecter pour faire ceci");
                }
            }
            //si l'action n'est ni admin ni membre enregistré, on renvoie sur le controleur utilisateur
            else
            {
                new CtrlUser();
            }
        }
        catch (Exception $e)
        {
            $tMessage[] = $e->getMessage();
            echo $twig->render($views['error'],array('errors' => $tMessage,'session' => $_SESSION));
        }
    }
}