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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>LogIn!</title>

    <script language="javascript" type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
</head>

<body>
    <div class="container">
        <div class="login-card"><img class="img-responsive profile-img-card" src="assets/img/avatar_2x.png">
            <p class="profile-name-card"> </p>
            <form method="POST" class="form-signin" name="formlogin" id="formlogin"><span class="reauth-email"> </span>
                <input class="form-control" type="email" required placeholder="Email" autofocus id="inputEmail">
                <input class="form-control" type="password" required placeholder="Contraseña" id="inputPassword">
                
                <input class="btn btn-primary btn-block btn-lg btn-signin" type="submit" name="Iniciar">Iniciar </input>
            </form>

            <a href="#" class="forgot-password"> </a><a href="registrousuario.php" style="color:#333">No tienes cuenta? Registrate Aquí!</a></div>
        <div class="hidden error" style="color:#333">Error</div>
    </div>
    
</body>

</html>
<script type='text/javascript'>
    /* attach a submit handler to the form */
    $("#formlogin").submit(function(event) {
        event.preventDefault();
        var URL = '_calls/login.php';
        var $form = $( this );
        var posting = $.post( URL, { loginUsername: $('#inputEmail').val(), loginPassword: $('#inputPassword').val() } );
        /* Alerts the results */
        posting.done(function( data ) {
            var obj = JSON.parse(data);
            if (obj.success){
                location.href="index.html";
                $('.error').removeClass('hidden');
            }
            else
            {
                $('.error').addClass('hidden');
            }
        });
    });
</script>