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
</head>

<body>
    <header>

    </header>
    <?php
    require 'logica/conexion.php';
    if (isset($_POST['entrar'])) {
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];

        $q = "SELECT COUNT(*) as contar from usuarios where email='$usuario' and contrasena='$clave'";
        $consulta = mysqli_query($conexion, $q);
        $array = mysqli_fetch_array($consulta);

        if (empty($_POST['usuario'])) {
            $error[] = "Necesitas nombre";
        }

        if (empty($_POST['clave'])) {
            $error[] = "Necesitas contraseña";
        }

        if (empty($_POST['usuario'])) {
            $error[] = "Necesitas email";
        }
        
        if (strlen($clave) < 6) {
            $error[] = "La longitud de la contraseña tiene que ser mayor que 6";
        }

        if (substr_count($usuario, "@") == 0) {
            $error[] = "El email tiene que contener @";
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
                    <div class="login-form bg-light mt-4 p-4">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="row g-3">
                            <h4>Bienvenido</h4>
                            <div class="col-12">
                                <label>Email</label>
                                <input type="text" name="usuario" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-12">
                                <label>Contraseña</label>
                                <input type="password" name="clave" class="form-control" placeholder="Contraseña">
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