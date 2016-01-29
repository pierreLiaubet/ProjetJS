<?php

/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 15/12/2015
 * Time: 18:01
 */
class CtrlAdmin
{
    public function __construct()
    {
        session_start();

        global $views,$twig;
        $tMessages = array();
        try
        {
            $action = Validate::_verifAction($_REQUEST['action']);
            switch($action)
            {
                case 'supprCom' :
                    $this->supprimerCommentaire();
                    break;

                case 'pageAjouterArticle' :
                    echo $twig->render($views['addArticle'],array('session' => $_SESSION,
                                                            'role' => MdlMember::role(), 'login' => MdlMember::login()));
                    break;

                case 'ajouterArticle' :
                    $this->ajouterArticle();
                    break;

                case 'supprimerArticle' :
                    $this->supprimerArticle();
                    break;

                case 'ajouterPersonnageScreen' :
                    echo $twig->render($views['nouveauPerso'],array('session' => $_SESSION,
                                                                    'role' => MdlMember::role(), 'login' => MdlMember::login()));
                    break;

                case 'ajouterPerso' :
                    $this->ajouterPerso();
                    break;

                case 'suprimmerPerso':
                    $this->supprimerPersonnage();
                    break;

                case 'modifierPersoScreen':
                    $this->eModifierPersonnage();
                    break;

                case 'modifierPerso':
                    $this->modifierPersonnage();
                    break;

                case 'listerErreur':
                    $this->listerErreur();
                    break;
                case 'suprimerErreur':
                    $this->suppErreur();
                    break;
                case 'ajouterImg':
                    $this->ajouterImage();
                    break;
                case'suppImg':
                    $this->supprimerImage();
                    break;
                case'viewAddImage':
                    $this->viewsAddArticle();
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
     * fait appel au modele du commentaire pour le spprimer dans la base de donnée
     */
    public function supprimerCommentaire()
    {
        $pseudo = Validate::_sanitString($_POST['pseudo']);
        $content = Validate::_sanitString($_POST['content']);
        MdlComment::supprimerComment($pseudo,$content);
        $_REQUEST['action'] = null;
        new CtrlUser();
    }


    /**
     * récupère les données entrées par l'admin et instancie un Article qui sera ajouté à la BD
     * @throws Exception
     */
    public function ajouterArticle()
    {
        $titre = Validate::_sanitString($_POST['titre']);
        $image = Validate::_verifImage($_POST['image']);
        $image = "Images/".Validate::_sanitString($_POST['image']);
        $content = Validate::_sanitString($_POST['content']);
        $article = new Article($titre,$image,$content);
        MdlArticle::ajouterArticle($article);
        $_REQUEST['action'] = null;
        new Front();
    }

    /**
     * Fait appel au modèle de l'article pour le supprimer dans la BD
     */
    public function supprimerArticle()
    {
        $titre = Validate::_sanitString($_POST['titreArticle']);
        MdlArticle::supprimerArticle($titre);
        $_REQUEST['action'] = null;
        new Front();
    }


    /**
     * Récupère les valeurs enrées par l'admin pour ajouter un personnage à la base de donnée
     * @throws Exception
     */
    public function ajouterPerso()
    {
        $nom = Validate::_sanitString($_POST['nom']);
        $image = Validate::_verifImage($_POST['image']);
        $image = "Images/".Validate::_sanitString($_POST['image']);
        $description = Validate::_sanitString($_POST['description']);
        $perso = new Personnage($nom,$image,$description);
        MdlPersonnage::ajouterPersonnage($perso);
        $_REQUEST['action'] = null;
        new Front();
    }


    /**
     *Récupere le nom du personnage a supprimer et le supprime dans la base de donnée
     */
    public function supprimerPersonnage()
    {
        $nom = Validate::_sanitString($_POST['nom']);
        MdlPersonnage::supprimerPerso($nom);
        $_REQUEST['action']=NULL;
        new CtrlUser();
    }


    /**
     * Récupère les données sur le personnage et rend la vue pour le modifier
     * @throws Exception
     */
    public function eModifierPersonnage()
    {
        global $views,$twig;
        $nom=Validate::_sanitString($_POST['nom']);
        $image=Validate::_verifImage($_POST['img']);
        $image=Validate::_sanitString($_POST['img']);
        $contenu=Validate::_sanitString($_POST['description']);
        $perso = new Personnage($nom,$image,$contenu);
        echo $twig->render($views['modif'],array('perso' => $perso,'session' => $_SESSION,
            'role' => MdlMember::role(), 'login' => MdlMember::login()));
    }


    /**
     * modifie les informations sur le personnage dans la base de donnée
     */
    public function modifierPersonnage()
    {
        $nom=Validate::_sanitString($_POST['nom']);
        $description = Validate::_sanitString($_POST['description']);
        MdlPersonnage::modifierPersonnage($nom,$description);
        $_REQUEST['action']= NULL;
        new Front();
    }

    /**
     *Fait appel au modèle erreur pour renvoyer et afficher la liste des erreurs signalées
     */
    public function listerErreur()
    {
        global $twig,$views;
        $listeErreurs = MdlErreur::listerErreur();
        echo $twig->render($views['raport'],array('erreurs'=>$listeErreurs, 'session' => $_SESSION,
            'role' => MdlMember::role(), 'login' => MdlMember::login()));
    }

    public function suppErreur()
    {

        $id=Validate::_verifEntierPos($_POST['id']);
        var_dump($id);
        MdlErreur::suppErreur($id);
        $_REQUEST['action']= NULL;
        $this->listerErreur();

    }

    public function ajouterImage()
    {

        $titre=Validate::_sanitString($_POST['titreArticle']);
        $image = Validate::_verifImage($_POST['image']);
        $image = "Images/".Validate::_sanitString($_POST['image']);
        MdlArticle::ajouterImage($image,$titre);
        $_REQUEST['action']= NULL;
        new Front();
    }
    public function supprimerImage()
    {
        $titre=Validate::_sanitString($_POST['titreArticle']);
        MdlArticle::supprimerImage($titre);
        $_REQUEST['action']= NULL;
        new Front();

    }
    public function viewsAddArticle()
    {

        global $twig,$views;
        $titre=Validate::_sanitString($_POST['titreArticle']);
        $article = new Article($titre,"","");
        echo $twig->render($views['AddImage'],array('article'=>$article,'session' => $_SESSION,
            'role' => MdlMember::role(), 'login' => MdlMember::login()));

    }
}