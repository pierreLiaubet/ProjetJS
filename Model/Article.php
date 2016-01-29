<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Article
 *
 * @author pierreliaubet
 */
class Article {
    private $titre;
    private $image;
    private $content;

    
    public function getTitre(){return $this->titre;}
    public function getImage(){return $this->image;}
    public function getContent(){return $this->content;}
    
    public function __construct($title, $img, $content)
    {
        $this->titre = $title;
        $this->image = $img;
        $this->content = $content;
    }
}
