<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comment
 *
 * @author pierreliaubet
 */
class Comment
{
    private $titreArticle;
    private $pseudo;
    private $content;

    public function getTitreArticle() {return $this->titreArticle ;}
    public function setTitreArticle($titreArticle){$this->titreArticle = $titreArticle;}
    public function getPseudo() {return $this->pseudo ;}
    public function setPseudo($pseudo){$this->pseudo = $pseudo;}
    public function getContent() {return $this->content ;}
    public function setContent($content){$this->content = $content;}
    
    public function __construct($titreArticle, $pseud, $content)
    {
        $this->titreArticle = $titreArticle;
        $this->pseudo = $pseud;
        $this->content = $content;
    }
}
