<?php

/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 11/12/2015
 * Time: 16:39
 */
class CtrlUser
{
    public function __construct()
    {
        session_start();

        global $views,$twig;
        $tMessages = array();
        try
        {
            $action = $_REQUEST['action'];
            switch($action)
            {
                case null :
                    $this->lister();
                    break;

                case 'pageConnection':
                    require('View/ConnectScreen.php');
                    break;

                case 'connection' :
                    $this->connecter();
                    break;

                case 'registerView' :
                    echo $twig->render($views['register'],array('session' => $_SESSION,'role' => MdlMember::role(),
                                                                'login' => MdlMember::login()));
                    break;

                case 'registration' :
                    $this->register();
                    break;

                case 'surLaSerie' :
                    $this->surLaSerie();
                    break;

                case 'pageContact':
                    echo $twig->render($views['contact'],array('session' => $_SESSION,'role' => MdlMember::role(),
                        'login' => MdlMember::login()));
                    break;

                case 'contacter':
                    $this->contacter();
                    break;
            }
            exit();
        }
        catch (Exception $e)
        {

            $tMessages[] = $e->getMessage();
            echo $twig->render($views['error'],array('errors'=>$tMessages, 'session' => $_SESSION,
                                                    'role' => MdlMember::role(), 'login' => MdlMember::login()));
        }
    }

    /**
     * Méthode appelée en premier lieux, elle permet d'instancier la liste des articles et des commentaires pour les passer
     * à la vue
     */
    public function lister()
    {
        global $views, $twig;
        if (isset($_REQUEST['current']))
        {
            $current = Validate::_verifEntierPos($_REQUEST['current']);
        }
        else
        {
            $current = 1;
        }
        $listArticle = MdlArticle::listerArticle($current);
        $nbPages = ceil(MdlArticle::getTotal() / 2) ;
        $listComm  = MdlComment::listerComments();
        echo $twig->render($views['home'], array('articles' => $listArticle, 'current' => $current,'nbTotal' => $nbPages,'comments' => $listComm, 'session' => $_SESSION,
                                                    'role' => MdlMember::role(), 'login' => MdlMember::login()));

    }

    /**
     * Fait appel au modèle du membre pour tester si les informations entrées permettent la connexion
     * @throws Exception
     */
    public function connecter()
    {
        $member = MdlMember::connexion();
        if ($member)
        {
            $this->lister();
        }
        else throw new Exception("Login ou mot de passe invalide");

    }

    /**
     * Fait appel au modèle du membre pour l'inscrire à la liste des membres
     * @throws Exception
     */
    public function register()
    {
        MdlMember::creerRegistered();
        $_REQUEST['action'] = NULL;
        $this->lister();
    }


    /**
     *Renvoie la liste des personnages et affiche la vue des biographies
     */
    public function surLaSerie()
    {
        global $views, $twig;
        $listPersonnages = MdlPersonnage::listerPersonnage();
        echo $twig->render($views['personnages'], array('personnages' => $listPersonnages, 'session' => $_SESSION,
                                                        'role' => MdlMember::role(), 'login' => MdlMember::login()));
    }


    /**
     * Récupère les valeurs entrées dans le formulaire de contact et créé une nouvelle erreur dans la base de donnée
     * @throws Exception
     */




    public function contacter()
    {

        $sujet = Validate::_sanitString($_POST['sujet']);
        $nom = Validate::_sanitString($_POST['nom']);
        $description= Validate::_sanitString($_POST['description']);
        $email= Validate::_verifEmail($_POST['email']);
        $email = Validate::_sanitString($_POST['email']);
        $date=date('Y-m-d');
        $heure=date("H:i");
        MdlErreur::ajouterErreur($sujet,$nom,$date,$heure,$description,$email);
        $_REQUEST['action']= NULL;
        new Front();
    }
}