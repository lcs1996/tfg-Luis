<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="../funciones/estilo.css">
<style>
    body {
	background: linear-gradient(-45deg, #FFC39E, #e73c7e, #EA233C, #EF8D9C);
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

.color {
	background: linear-gradient(-45deg, #FFC39E, #e73c7e, #EA233C, #EF8D9C);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;

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

</style>
<head>
    <title>Armario</title>
    <meta charset="utf-8">
    <meta name="description" content="Mi primera pagina">
    <meta name="author" content="Luis">
</head>

<body>
    
         <?php
    require 'logica/conexion.php';
    if (isset($_POST['entrar'])) {
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];

        $q = "SELECT COUNT(*) as contar from usuarios where usuario='$usuario' and contrasena='$clave'";
        $consulta = mysqli_query($conexion, $q);
        $array = mysqli_fetch_array($consulta);

        if (empty($_POST['clave'])) {
            $error[] = "Necesitas contraseña";
        }

        if (empty($_POST['usuario'])) {
            $error[] = "Necesitas usuario";
        }
    }
    if (isset($_POST['entrar']) && empty($error) && $array['contar'] > 0) {
        $_SESSION['username'] = $usuario;
        header("location: layouts/paginaprincipal.php");
    } else {
    ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="login-form color mt-4 p-4 rounded">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="row g-3">
                            <h4>Bienvenido</h4>
                            <div class="col-12">
                                <label>Usuario</label>
                                <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
                            </div>
                            <div class="col-12">
                                <label>Contraseña</label>
                                <input type="password" name="clave" class="form-control" placeholder="Contraseña" required>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe"> Recuérdame</label>
                                </div>
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
                            <button type="submit" class="btn btn-dark float-end" name="entrar">Entrar</button>
                        </div>
                        </form>
                        <hr class="mt-4">
                        <div class="col-12">
                            <p class="text-center mb-0">¿No tienes cuenta? <a href="register.php">Registrate</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </form>
               
   
</body>

</html>