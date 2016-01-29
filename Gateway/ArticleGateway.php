<?php

/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 15/12/2015
 * Time: 18:04
 */
class ArticleGateway
{
    private $conn;

    public function __construct()
    {
        global $dsn, $login, $password;
        $this->conn = new Connection($dsn,$login,$password);
    }

    /**
     * renvoie la liste d'articles correspondant à la page sélectionnée
     * @param $page
     * @return array
     */
    public function listerArticles($page)
    {
        try
        {
            $req = "SELECT * FROM Articles LIMIT :page,2";
            $position = ($page - 1) * 2;
            $parameters = array('page' => array($position,PDO::PARAM_INT));
            $this->conn->executeQuery($req,$parameters);
            $result = $this->conn->getResult();
            $articles = array();
            foreach($result as $a) {
                $articles[] = new Article($a['titre'], $a['image'], $a['content']);
            }
            return $articles;
        }
        catch (PDOException $e)
        {
            throw $e;
        }
    }
    public function ajouterImage($image,$titre)
    {
        try {
            $req = "UPDATE Articles SET image=:image WHERE titre=:titre";
            $param = array('image' => array($image, PDO::PARAM_STR),
                            'titre'=>array($titre,PDO::PARAM_STR));
            $this->conn->executeQuery($req, $param);
        }catch (Exception $e)
        {
            throw $e;
        }
    }
    public function supprimerImage($titre)
    {
        try {
            $req = "UPDATE Articles SET image=NULL WHERE titre=:titre";
            $param = array('titre'=>array($titre,PDO::PARAM_STR));
            $this->conn->executeQuery($req, $param);
        }catch (Exception $e)
        {
            throw $e;
        }
    }


    /**
     * renvoie le nombre total d'articles
     * @return int
     */
    public function getTotal()
    {
        try
        {
            $req = "SELECT COUNT(*) FROM Articles";
            $parameters = array();
            $this->conn->executeQuery($req,$parameters);
            $result = $this->conn->getResult();
            return (int)$result['0']['0'];
        }
        catch (PDOException $e)
        {
            throw $e;
        }
    }


    /**
     * ajoute un article dans la base de donnée
     * @param $article
     * @throws Exception
     */
    public function ajouterArticle($article)
    {
        try
        {
            $req = "INSERT INTO Articles VALUES (:titre,:image,:content)";
            $parameters = array('titre' => array($article->getTitre(),PDO::PARAM_STR),
                            'image' => array($article->getImage(),PDO::PARAM_STR),
                            'content' => array($article->getContent(),PDO::PARAM_STR));
            $this->conn->executeQuery($req,$parameters);
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }


    /**
     * supprime l'article passé en paramètre dans la base de donnée
     * @param $titre
     * @throws Exception
     */
    public function supprimerArticle($titre)
    {
        try
        {
            $req = "DELETE FROM Articles WHERE titre = :titre";
            $parameters = array('titre' => array($titre,PDO::PARAM_STR));
            $this->conn->executeQuery($req,$parameters);
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }
}