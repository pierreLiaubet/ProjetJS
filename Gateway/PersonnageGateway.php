<?php

/**
 * Created by PhpStorm.
 * User: FonF
 * Date: 06/01/2016
 * Time: 15:59
 */
class PersonnageGateway
{
    public function __construct()
    {
        global $dsn, $login, $password;
        $this->conn = new Connection($dsn,$login,$password);
    }


    /**
     * renvoie la liste des personnages présents dans la base de donnée
     * @return array
     * @throws Exception
     */
    public function listerPersonnage()
    {
        try
        {
            $req="SELECT * FROM Personnage";
            $param=array();
            $this->conn->executeQuery($req,$param);
            $result=$this->conn->getResult();
            foreach($result as $r)
            {
                $personnages[]=new Personnage($r['nom'],$r['image'],$r['description']);
            }
            return $personnages;
        }catch (Exception $e)
        {
            throw $e;
        }

    }


    /**
     * supprime le personnage passé en paramètre dans la base de donnée
     * @param $nom
     * @throws Exception
     */
    public function supprimerPerso($nom)
    {
        try
        {
            $req="DELETE FROM Personnage WHERE nom=:nom";
            $param=array('nom'=>array($nom,PDO::PARAM_STR));
            $this->conn->executeQuery($req,$param);
        }
        catch(Exception $e)
        {
            throw $e;
        }
    }


    /**
     * ajoute le personnage passé en paramètre dans la base de donnée
     * @param $perso
     * @throws Exception
     */
    public function ajouterPersonnage($perso)
    {
        try
        {
            $req = "INSERT INTO Personnage VALUES(:nom,:image,:description)";
            $param = array('nom' => array($perso->getNom(), PDO::PARAM_STR),
                'image' => array($perso->getImage(), PDO::PARAM_STR),
                'description' => array($perso->getDescription(), PDO::PARAM_STR)
            );
            $this->conn->executeQuery($req,$param);
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }

    /**
     * modifie le personnage en fonction des paramètres passés
     * @param $nom
     * @param $description
     * @throws Exception
     */
    public function modifierPersonnage($nom, $description)
    {
        try
        {
            $req = "UPDATE Personnage SET description = :des WHERE nom = :nom";
            $param = array('des' => array($description, PDO::PARAM_STR),
                'nom' => array($nom, PDO::PARAM_STR));
            $this->conn->executeQuery($req, $param);
        }
        catch(Exception $e)
        {
            throw $e;
        }
    }

}