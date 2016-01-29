<?php

/**
 * Created by PhpStorm.
 * User: FonF
 * Date: 07/01/2016
 * Time: 17:20
 */
class Erreur
{
    private $id;
    private $nom;
    private $sujet;
    private $email;
    private $date;
    private $heure;
    private $description;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }
    /**
     * @return mixed
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }


    public function __construct($id,$sujet,$nom,$date,$heure,$description,$email)
    {

        $this->id=$id;
        $this->nom=$nom;
        $this->sujet=$sujet;
        $this->email=$email;
        $this->date=$date;
        $this->heure=$heure;
        $this->description=$description;
    }



}