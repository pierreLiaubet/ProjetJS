<?php

/**
 * Created by PhpStorm.
 * User: FonF
 * Date: 06/01/2016
 * Time: 15:57
 */
class MdlPersonnage
{

    public static function listerPersonnage()
    {
        $gw=new PersonnageGateway();
        return $gw->listerPersonnage();
    }
    public static function supprimerPerso($nom)
    {
        $gw=new PersonnageGateway();
        $gw->supprimerPerso($nom);

    }

    public static function ajouterPersonnage($perso)
    {
        $gw=new PersonnageGateway();
        $gw->ajouterPersonnage($perso);
    }

    public static function modifierPersonnage($nom,$description)
    {
        $gw=new PersonnageGateway();
        $gw->modifierPersonnage($nom,$description);

    }
    public static function supprimerImage($nom,$image)
    {
        $gw=new PersonnageGateway();
        $gw->supprimerImage($nom,$image);
    }
}