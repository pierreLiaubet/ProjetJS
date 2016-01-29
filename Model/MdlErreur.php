<?php

/**
 * Created by PhpStorm.
 * User: FonF
 * Date: 07/01/2016
 * Time: 18:05
 */
class MdlErreur
{
    public static function ajouterErreur($sujet,$nom,$date,$heure,$description,$email)
    {
        $gw=new ErreurGateway();
        $gw->ajouterErreur($sujet,$nom,$date,$heure,$description,$email);
    }

    public static function listerErreur()
    {
        $gw=new ErreurGateway();
        return $gw->listerErreur();

    }

    public static function suppErreur($id)
    {
        $gw=new ErreurGateway();
        $gw->suppErreur($id);
    }
}