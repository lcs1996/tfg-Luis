<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="../funciones/estilo.css">

<head>
    <title>Armario</title>
    <meta charset="utf-8">
    <meta name="description" content="Mi primera pagina">
    <meta name="author" content="Luis">
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
    <style>
    body {
	background: linear-gradient(-45deg, #EF8D9C, #FFC39E);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
	height: 100vh;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}

.color{
    background-color: #EF8D9C;
}

</style>
</head>

<body>
    <?php
    require 'logica/conexion.php';
    if (isset($_POST['registrar'])) {
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $usuario2=$_POST['usuario'];
        $contra=$_POST['clave'];
        $clave2=$_POST['clave2'];
        
        if ($contra !== $clave2) {
            $error[] = "Las contraseñas tienen que ser iguales";
        }

        if (empty($_POST['nombre'])) {
            $error[] = "Necesitas nombre";
        }

        if (empty($_POST['clave']) || empty($_POST['clave2'])) {
            $error[] = "Necesitas contraseña";
        }

        if (empty($_POST['email'])) {
            $error[] = "Necesitas email";
        }
        
        if (strlen($contra) < 6) {
            $error[] = "La longitud de la contraseña tiene que ser mayor que 6";
        }

        if (substr_count($email, "@") == 0) {
            $error[] = "El email tiene que contener @";
        }
    }
    if (isset($_POST['registrar']) && empty($error)) {
        
        $result = $conexion->query("INSERT into usuarios (nombre,email,usuario,contrasena,privada) values (\"" . $nombre . "\", \"" . $email . "\",\"" . $usuario2 . "\",\"" . $contra . "\",0)");
        header("location: index.php");
    } else {
    ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="login-form color mt-4 p-4 rounded">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="row g-3">
                            <h4>Registrate</h4>
                            <div class="col-12">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-12">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="col-12">
                                <label>Nombre usuario</label>
                                <input type="text" name="usuario" class="form-control" placeholder="Usuario">
                            </div>
                            <div class="col-12">
                                <label>Contraseña</label>
                                <input type="password" name="clave" class="form-control" placeholder="Contraseña">
                            </div>
                            <div class="col-12">
                                <label>Repite contraseña</label>
                                <input type="password" name="clave2" class="form-control" placeholder="Repite contraseña">
                            </div>
                        <?php
                    }
                    if (isset($error)) {
                        foreach ($error as $errores) {
                            echo "<li class='list-group-items'> $errores </li>";
                        }
                    }

                        ?>
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark float-end" name="registrar">Registrar</button>
                        </div>

                        </form>
                        <hr class="mt-4">
                        <div class="col-12">
                            <p class="text-center mb-0">Inicio Sesion <br><a href="index.php">Volver</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </form>
</body>

</html>