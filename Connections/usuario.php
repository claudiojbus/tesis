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
        'id'=>'idusr',
        'fileds'=> array('usuario','email','contrasena','telefono')
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

            $query = 'SELECT us.idusr as userId, us.usuario as usuario, us.email as email, pf.idperf as profileId, 
            pf.tipo as profileType, pf.defaultView as defaultView
            FROM '.$this->table['name'].' us 
            JOIN usr_perf up on up.idusr = us.idusr
            JOIN perfil pf on pf.idperf = up.idperf
            WHERE email=\''.$loginUsername.'\' AND contrasena= \''.$loginPassword.'\'';
            $LoginRS = mysqli_query($this->connections,$query) or die(mysqli_error($this->connections));
            $dataUser = mysqli_fetch_row($LoginRS);
            $loginFoundUser = mysqli_num_rows($LoginRS);
            //mysqli_stmt_close($stmt);

            $return = json_encode(array(
                'total' => $loginFoundUser,
                'data' => $dataUser
            ));
            return $return;
        }
        return null;

    }
}