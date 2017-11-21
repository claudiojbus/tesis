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
    var_dump($login);
}
?>