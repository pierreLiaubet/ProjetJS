<?php

/**
 * Created by PhpStorm.
 * User: pierreliaubet
 * Date: 06/01/2016
 * Time: 08:13
 */
class CtrlRegistrated
{
    public function __construct()
    {
        session_start();

        global $views, $twig;
        $tMessages = array();
        try
        {
            $action = Validate::_verifAction($_REQUEST['action']);
            switch ($action)
            {
                case 'deconnect' :
                    $this->deconnection();
                    break;

                case 'comment' :
                    $this->commenter();
                    break;
                case 'modifComm':
                    $this->modifierCommmentaire();
                    break;
                case 'modifierCommViews':
                    $this->viewsModifierCommentaire();
                    break;
            }
            exit();
        } catch (Exception $e)
        {

            $tMessages[] = $e->getMessage();
            echo $twig->render($views['error'], array('errors' => $tMessages, 'session' => $_SESSION,
                                                        'role' => MdlMember::role(), 'login' => MdlMember::login()));
        }
    }

    /**
     * Déconnecte l'utilisateur courrant
     */
    public function deconnection()
    {
        MdlMember::deconnection();
        $_REQUEST['action'] = null;
        new Front();
    }

    /**
     * Instancie un commentaire et fait appel au modèle du commentaire pour l'ajouter à la BD
     */
    public function commenter()
    {
        $comment = new Comment();
        $pseudo = Validate::_sanitString($_POST['pseudo']);
        $content = Validate::_sanitString($_POST['commentaire']);
        $titre = Validate::_sanitString($_POST['titreArticle']);
        $comment->setPseudo($pseudo);
        $comment->setContent($content);
        $comment->setTitreArticle($titre);
        MdlComment::addComment($comment);
        $_REQUEST['action'] = null;
        new Front();
    }
    public function modifierCommmentaire()
    {
        $pseudo = Validate::_sanitString($_POST['pseudo']);
        $content = Validate::_sanitString($_POST['content']);
        MdlComment::modifierCommmentaire($pseudo,$content);
        $_REQUEST['action'] = null;
        new Front();

    }
    public function viewsModifierCommentaire()
    {

        global $twig,$views;
        $pseudo = Validate::_sanitString($_POST['pseudo']);
        $content = Validate::_sanitString($_POST['content']);
        $com=new Comment("",$pseudo,$content);
        echo $twig->render($views['modifierCommViews'],array('comment'=>$com,'session' => $_SESSION,
            'role' => MdlMember::role(), 'login' => MdlMember::login()));


    }
}