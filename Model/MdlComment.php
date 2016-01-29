<?php

/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 15/12/2015
 * Time: 18:02
 */
class MdlComment
{
    public static function listerComments()
    {
        $gw = new CommentGateway();
        return $gw->listerComments();
    }

    public static function addComment($comment)
    {
        $gw = new CommentGateway();
        $gw->addComment($comment);
    }

    public static function supprimerComment($pseudo,$content)
    {
        $gw = new CommentGateway();
        $gw->supprimerComment($pseudo,$content);
    }
    public static function modifierCommmentaire($pseudo,$content)
    {
        $gw = new CommentGateway();
        $gw->modifierCommmentaire($pseudo,$content);
    }
}