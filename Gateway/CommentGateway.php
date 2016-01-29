<?php

/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 15/12/2015
 * Time: 18:04
 */
class CommentGateway
{

    private $conn ;

    public function __construct()
    {
        $this->conn = new Connection();
    }

    /**
     * renvoie la liste des commentaires
     * @return array
     * @throws Exception
     */
    public function listerComments()
    {
        try
        {
            $req = "SELECT * FROM Comments";
            $parameters = array();
            $this->conn->executeQuery($req,$parameters);
            $result = $this->conn->getResult();
            foreach($result as $c)
            {
                $comments[] = new Comment($c['titreArticle'], $c['pseudo'], $c['content']);
            }
            return $comments;
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }


    /**
     * ajoute le commentaire passé en paramètre dans la base de donnée
     * @param $comment
     * @throws Exception
     */
    public function addComment($comment)
    {
        try
        {
            $req = "INSERT INTO Comments VALUES(:titreArticle,:pseudo,:content)";
            $parameters = array('titreArticle' => array($comment->getTitreArticle(),PDO::PARAM_STR),
                                'pseudo' => array($comment->getPseudo(),PDO::PARAM_STR),
                                'content' => array($comment->getContent(),PDO::PARAM_STR));
            $this->conn->executeQuery($req,$parameters);
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }


    /**
     * supprime le commentaire passé en paramètre
     * @param $pseudo
     * @param $content
     * @throws Exception
     */
    public function supprimerComment($pseudo, $content)
    {
        try
        {
            $req = "DELETE FROM Comments WHERE pseudo = :pseudo AND content = :content";
            $parameters = array('pseudo' => array($pseudo,PDO::PARAM_STR),
                                'content' => array($content,PDO::PARAM_STR));
            $this->conn->executeQuery($req,$parameters);
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }

    public function modifierCommmentaire($pseudo,$content)
    {
        try
        {
            $req="UPDATE Comments SET content = :content WHERE pseudo=:pseudo";
            $parameters = array('pseudo' => array($pseudo,PDO::PARAM_STR),
                'content' => array($content,PDO::PARAM_STR));
            $this->conn->executeQuery($req,$parameters);
       }catch (Exception $e)
        {
            throw $e;
        }
    }
}