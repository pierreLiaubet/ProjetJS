<?php

/**
 * Created by PhpStorm.
 * User: FonF
 * Date: 06/01/2016
 * Time: 15:46
 */
class Personnage
{
    private $nom;
    private $image;
    private $description;

    public function getNom(){return $this->nom;}
    public function getImage(){return $this->image;}
    public function getDescription(){return $this->description;}

    public function __construct($nom,$img,$description)
    {
        $this->nom=$nom;
        $this->image=$img;
        $this->description=$description;
    }
}