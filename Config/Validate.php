<?php

/**
 * Created by PhpStorm.
 * User: pierreliaubet
 * Date: 02/12/2015
 * Time: 16:09
 */
class Validate
{
    /**
     * Vérifie si value est initialisé et n'est pas vide
     * @param $value
     * @throws Exception
     */
    public static function _checkExistance($value)
    {
        if (!isset($value)|| empty($value))
        {
            throw new Exception($value." doesn't exist");
        }
    }

    public static function _verifString($string)
    {
        self::_checkExistance($string);
        if(!filter_var($string,FILTER_VALIDATE_STRING))
        {
            throw new Exception("Invalidated string");
        }
    }

    public static function _verifEmail($email)
    {
        self::_checkExistance($email);
        if (!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            throw new Exception("Invalidated Email");
        }
    }

    public static function _sanitEmail($email)
    {
        self::_checkExistance($email);
        return filter_var($email,FILTER_SANITIZE_EMAIL);
    }


    public static function _verifImage($image)
    {
        $extension = array('jpg','jpeg','gif','png');
        if ($image['error']>0)
        {
            throw new Exception("Upload Failed");
        }
        $extensionUpload = strtolower(substr(strrchr($_FILES['icone']['name'],'.'),1));
        if (!array($extensionUpload,$extension))
        {
            new Exception("Invalidated image");
        }
    }

    public static function _verifBool($bool)
    {
        self::_checkExistance($bool);
        if(!filter_var($bool,FILTER_VALIDATE_BOOLEAN))
        {
            throw new Exception("Invalidated boolean");
        }
        else return $bool;
    }

    public static function _verifAction($action)
    {
        self::_checkExistance($action);
        $listAction = array('deconnect', 'supprCom', 'pageAjouterArticle', 'ajouterArticle', 'NULL', 'pageConnection', 'connection',
            'comment','supprimerArticle', 'registration','registerView','ajouterPersonnageScreen','ajouterPerso',
            'suprimmerPerso','eSuprimmerPerso','modifierPersoScreen','modifierPerso',
            'listerErreur','pageContact','contacter','suprimerErreur','ajouterImg','suppImg','viewAddImage','modifComm','modifierCommViews');
        if (in_array($action,$listAction))
        {
            return $action;
        }
        else throw new Exception("Invalidated action");
    }

    public static function _verifEntierPos($entier)
    {
        self::_checkExistance($entier);
        if(!(filter_var($entier,FILTER_VALIDATE_INT)) && $entier>0 )
        {
            throw new Exception("Invalidated integer");
        }
        return $entier;
    }

    public static function _sanitString($string)
    {
        self::_checkExistance($string);
        return filter_var($string,FILTER_SANITIZE_STRING);
    }

}