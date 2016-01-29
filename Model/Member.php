<?php

/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 24/12/2015
 * Time: 13:46
 */
class Member
{
    private $login;
    private $pass;
    private $role;
    private $email;

    public function getLogin(){return $this->login;}
    public function setLogin($login){$this->login = $login;}
    public function getPass(){return $this->pass;}
    public function setPass($pass){$this->pass = $pass;}
    public function getRole(){return $this->role;}
    public function setRole($role){$this->role = $role;}
    public function getEmail(){return $this->email;}
    public function setEmail($email){$this->email = $email;}

    public function __construct($login, $pass, $role,$email)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->role = $role;
        $this->email = $email;
    }
}