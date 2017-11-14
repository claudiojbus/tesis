<?php require_once('Connections/conexion.php'); ?>
<?php

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}
 echo 'PASO HASTA AQUI 0';

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
 echo 'PASO HASTA AQUI 1';

if (isset($_POST['inputEmail'])) {
  $loginUsername=$_POST['inputEmail'];
  $password=$_POST['inputPassword'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "untitled.html";
  $MM_redirectLoginFailed = "http://www.google.cl";
  $MM_redirecttoReferrer = true;
  echo 'PASO HASTA AQUI 2';
  exit;
  mysql_select_db($database_conexion, $conexion);
  
  $LoginRS__query=sprintf("SELECT email, pass FROM usuario WHERE email=%s AND pass=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $conexion) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
 else {
   echo 'no entro con datos de Mail';
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <!com>esta linea no iba</!com>
    <title>Index</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
</head>

<body>
    <div class="container">
        <div class="login-card"><img class="img-responsive profile-img-card" src="assets/img/avatar_2x.png">
            <p class="profile-name-card"> </p>
            <form METHOD="POST" class="form-signin" action="<?php echo $loginFormAction; ?>" name="formlogin"><span class="reauth-email"> </span>
                <input class="form-control" type="email" required placeholder="Email" autofocus id="inputEmail">
                <input class="form-control" type="password" required placeholder="Contraseña" id="inputPassword">
                
                <input class="btn btn-primary btn-block btn-lg btn-signin" type="submit" name="Iniciar">Iniciar </input>
            </form>
            <a href="#" class="forgot-password"> </a><a href="registrousuario.php" style="color:#333">No tienes cuenta? Registrate Aquí!</a></div>
    </div>
    
    
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
</body>

</html>