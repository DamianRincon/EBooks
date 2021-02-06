<?php require_once('../../config/sys.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
    <title><?php echo app_name ?> | Login</title>
</head>
<body>
    <div class="section"></div>
    <main>
        <center>
            <h1><?php echo app_name ?></h1>
            <h4 style="color: <?php echo primary_color ?>;">Bienvenido de nuevo</h4>
            <div class="section"></div>
            <div class="container">
                <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                    <form class="col s12" method="post">
                        <div class='row'>
                            <div class='col s12'><h5>Ingrese su correo y contraseña</h5></div>
                        </div>
                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='email' name='email' id='email' />
                                <label for='email'>Correo</label>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='input-field col s12'>
                            <input class='validate' type='password' name='password' id='password' />
                            <label for='password'>Contraseña</label>
                        </div>
                </div>

                <br />
                <center>
                <div class='row'>
                    <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect' style="background-color: <?php echo primary_color ?>;">ACCEDER</button>
                </div>
                </center>
                </form>
                </div>
            </div>
        </center>
        <div class="section"></div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>