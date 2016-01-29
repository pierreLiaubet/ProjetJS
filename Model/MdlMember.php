<?php

/**
 * Created by PhpStorm.
 * User: pierreliaubet
 * Date: 16/12/2015
 * Time: 13:45
 */
class MdlMember
{

    /**
     * connecte l'utilisateur s'il existe en fonctions des informations transmises par le formulaire de connexion
     * @return bool
     * @throws Exception
     */
    public static function connexion()
    {
        $gw = new MemberGateway();
        $login = Validate::_sanitString($_POST['inputLogin']);
        $password = Validate::_sanitString($_POST['inputPassword']);
        $member = $gw->connection($login,$password);
        if ($member != null)
        {
            $_SESSION['role'] = $member->getRole();
            $_SESSION['login'] = $login;
            return true;
        }
        else
        {
            return false;
        }
    }


    /**
     * renvoie le role contenu dans la session
     * @return mixed|null
     */
    public static function role()
    {
        if (isset($_SESSION['role']))
        {
            $role = Validate::_sanitString($_SESSION['role']);
            return $role;
        }
        else
            return null;
    }


    /**
     * renvoie le login contenu dans la session
     * @return mixed|null
     */
    public static function login()
    {
        if (isset($_SESSION['login']))
        {
            $login = Validate::_sanitString($_SESSION['login']);
            return $login;
        }
        else
            return null;
    }


    /**
     *déconnecte l'utilisateur actuel
     */
    public static function deconnection()
    {
        $_SESSION['role'] = null;
        $_SESSION['login'] = null;
    }


    /**
     * incrit un membre dans la base de donnée en tant que "registered"
     * @throws Exception
     */
    public static function creerRegistered()
    {
        $gw = new MemberGateway();
        $login = Validate::_sanitString($_POST['pseudo']);
        //$pass = Validate::_verifPass($_POST['pass']);
        $pass = Validate::_sanitString($_POST['pass']);
        $confpass = Validate::_sanitString($_POST['confpass']);
        $email = Validate::_verifEmail($_POST['email']);
        $email = Validate::_sanitString($_POST['email']);
        if ($gw->exist($login))
        {
            throw new Exception("Login déjà existant");
        }
        else
        {
            if ($pass == $confpass)
            {
                $member = new Member($login,$pass,'registered',$email);
                $gw->register($member);
            }
            else
            {
                throw new Exception("Les mots de passes ne sont pas identiques");
            }
        }
    }
}