<?php

/**
 * Created by PhpStorm.
 * User: berseck
 * Date: 20-11-2017
 * Time: 10:51
 */
include_once '../Connections/db_connections.php';

class usuario
{

    private $table = array(
        'name' =>'usuario',
        'id'=>'idusuario',
        'fileds'=> array('email','pass')
    );


    private $db_conncetions;
    private $connections;
    /**
     * usuario constructor.
     */
    public function __construct()
    {

    }

    function getUser($loginUsername = null, $loginPassword = null)
    {

        $db_conncetions = new db_connections();
        $this->connections = $db_conncetions->connect();
        if($loginUsername && $loginPassword){

            $query = 'SELECT * FROM '.$this->table['name'].' WHERE email=\''.$loginUsername.'\' AND pass= \''.$loginPassword.'\'';
            $LoginRS = mysqli_query($this->connections,$query) or die(mysql_error());
            $loginFoundUser = mysqli_num_rows($LoginRS);
            //mysqli_stmt_close($stmt);

            return $loginFoundUser;
        }
        return null;

    }
}