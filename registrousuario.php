<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegistroUsuario</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
</head>

<body>
    <div class="container">
        <div class="row register-form">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-horizontal custom-form">
                    <h1> Formulario de Registro</h1>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="name-input-field">Nombre </label>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="text" name="nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="email-input-field">Email </label>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="pawssword-input-field">Contraseña </label>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="password" name="pass1">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="repeat-pawssword-input-field">Repetir Contraseña</label>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="password" name="pass2">
                        </div>
                    </div><a class="btn btn-default submit-button" role="button" href="index.php">Cancelar </a>
                    <button class="btn btn-default submit-button" type="submit">Registrar </button>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>