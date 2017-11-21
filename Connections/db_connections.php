<?php
/**
 * Created by PhpStorm.
 * User: berseck
 * Date: 20-11-2017
 * Time: 11:43
 */



class db_connections
{

    private $hostname_conexion = "localhost";
    private $database_conexion = "proyecto";
    private $username_conexion = "root";
    private $password_conexion = "";
    private $conections = null;
    /**
     * db_connections constructor.
     */
    public function __construct()
    {

    }

    public function connect(){
       return new mysqli($this->hostname_conexion, $this->username_conexion, $this->password_conexion, $this->database_conexion);
    }
}