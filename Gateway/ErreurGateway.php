<?php

/**
 * Created by PhpStorm.
 * User: FonF
 * Date: 07/01/2016
 * Time: 18:09
 */
class ErreurGateway
{
    private $conn ;

    public function __construct()
    {
        $this->conn = new Connection();
    }


    /**
     * ajoute l'erreur passée en paramètre dans la base de donnée
     * @param $erreur
     */
    public function ajouterErreur($sujet,$nom,$date,$heure,$description,$email)
    {
        try {
            $req = "INSERT INTO Terreur VALUES (:id,:nom,:sujet,:email,:dates,:heure,:description)";
            $param = array('id'=> array('',PDO::PARAM_INT),
                'nom'=> array($nom,PDO::PARAM_STR),
                'sujet' => array($sujet, PDO::PARAM_STR),
                'email' => array($email, PDO::PARAM_STR),
                'dates' => array($date, PDO::PARAM_STR),
                'heure' => array($heure, PDO::PARAM_STR),
                'description' => array($description, PDO::PARAM_STR));
            $this->conn->executeQuery($req,$param);
        }catch (Exception $e)
        {
            throw $e;
        }


    }

    public function suppErreur($id)
    {
        try{
            $req="DELETE FROM Terreur where id = :id";
            $param = array('id'=> array($id,PDO::PARAM_INT));
            $this->conn->executeQuery($req,$param);
        }catch (Exception $e)
        {
            throw $e;
        }
    }


    /**
     * retourne la liste des erreurs de la base de donnée
     * @return array
     */
    public function listerErreur()
    {
        try
        {
            $req = "SELECT * FROM Terreur ORDER BY id DESC";
            $param = array();
            $this->conn->executeQuery($req, $param);
            $result = $this->conn->getResult();
            $erreurs = array();
            foreach ( $result as $r)
            {
                $erreurs[] = new Erreur($r['id'],$r['sujet'], $r['nom'], $r['dates'],$r['heure'],$r['description'],$r['email']);
            }

            return $erreurs;
        }
        catch (PDOException $e)
        {
            throw $e;
        }
    }

}