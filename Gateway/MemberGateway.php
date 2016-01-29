<?php

/**
 * Created by PhpStorm.
 * User: pierreliaubet
 * Date: 16/12/2015
 * Time: 14:12
 */
class MemberGateway
{
    private $conn;

    public function __construct()
    {
        global $dsn, $login, $password;
        $this->conn = new Connection($dsn,$login,$password);
    }


    /**
     *retourne un membre si le login et le mot de passe passé en paramètre est connu de la base de donnée
     * @param $login
     * @param $pass
     * @return Member
     * @throws Exception
     */
    public function connection($login, $pass)
    {
        try
        {
            $req = "SELECT * FROM Member WHERE login = :login AND password = :pass ";
            $parameters = array('login' => array($login, PDO::PARAM_STR),
                                'pass' => array($pass, PDO::PARAM_STR));
            $this->conn->executeQuery($req,$parameters);
            $result = $this->conn->getResult();
            $member = new Member(null,null,null,null);
            if ($result != null)
            {
                foreach($result as $r)
                {
                    $member->setLogin($r['login']);
                    $member->setPass($r['password']);
                    $member->setRole($r['role']);
                    $member->setEmail($r['email']);
                }
                return $member;
            }
            else
            {
                throw new Exception("Vous n'etes pas inscrit");
            }
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }


    /**
     * vérifie la présence d'un login dans la base de donnée
     * @param $login
     * @return bool
     */
    public function exist($login)
    {
        try
        {
            $req = "SELECT * FROM Member WHERE login = :login ";
            $parameters = array('login' => array($login, PDO::PARAM_STR));
            $this->conn->executeQuery($req,$parameters);
            $result = $this->conn->getResult();
            if ($result != null)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }


    /**
     * ajoute le membre passé en paramètre dans la base de donnée
     * @param $member
     */
    public function register($member)
    {
        try
        {
            $req = "INSERT INTO Member VALUES(:login,:pass,:role,:email)";
            $parameters = array('login' => array($member->getLogin(),PDO::PARAM_STR),
                                'pass' => array($member->getPass(),PDO::PARAM_STR),
                                'role' => array($member->getRole(),PDO::PARAM_STR),
                                'email' => array($member->getEmail(),PDO::PARAM_STR));
            $result = $this->conn->executeQuery($req,$parameters);
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
}