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
    $login  = $usuario->getUser($params['loginUsername'],$params['loginPassword']);
    print_r(
        json_encode(
            array('success'=>($login == 0)?false:true)
        )
    );
}
?>