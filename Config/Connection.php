<?php

/**
 * Created by PhpStorm.
 * User: pierreliaubet
 * Date: 02/12/2015
 * Time: 16:08
 */


class Connection extends PDO
{
    private $stmt;

    public function __construct()
    {
        global $dsn, $login, $password;
        parent::__construct($dsn, $login, $password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    public function executeQuery($query,array $parameters = [])
    {
        $this->stmt = parent::prepare($query);
        foreach ($parameters as $name => $value) {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }
        return $this->stmt->execute();
    }

    public function getResult()
    {
        return $this->stmt->fetchall();
    }
}