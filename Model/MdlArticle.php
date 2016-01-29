<?php

/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 15/12/2015
 * Time: 18:01
 */
class MdlArticle
{
    public static function listerArticle($page)
    {
        $gw = new ArticleGateway();
        return $gw->listerArticles($page);
    }

    public static function getTotal()
    {
        $gw = new ArticleGateway();
        return $gw->getTotal();
    }

    public static function ajouterArticle($article)
    {
        $gw = new ArticleGateway();
        $gw->ajouterArticle($article);
    }

    public static function supprimerArticle($titre)
    {
        $gw = new ArticleGateway();
        $gw->supprimerArticle($titre);
    }
    public static function ajouterImage($image,$titre)
    {
        $gw= new ArticleGateway();
        $gw->ajouterImage($image,$titre);
    }
    public static function supprimerImage($titre)
    {
        $gw=new ArticleGateway();
        $gw->supprimerImage($titre);
    }
}