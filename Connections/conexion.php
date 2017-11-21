<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conexion = "localhost";
$database_conexion = "proyecto";
$username_conexion = "root";
$password_conexion = "";
$conexion = mysqli_connect($hostname_conexion, $username_conexion, $password_conexion)
or trigger_error(mysqli_error(),E_USER_ERROR);