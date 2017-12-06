<?php
/**
 * Created by PhpStorm.
 * User: berseck
 * Date: 20-11-2017
 * Time: 11:08
 */

require_once '../Connections/usuario.php';
$params = $_POST;

if ($params != null){
    $usuario = new usuario();
    $login  = json_decode($usuario->getUser($params['loginUsername'],$params['loginPassword']));

    $success = ($login->total == 0 )?false:true;
    print_r(
        json_encode(
            array(
                'success'=>$success,
                'data'=>$login->data
            )
        )
    );
}
?>