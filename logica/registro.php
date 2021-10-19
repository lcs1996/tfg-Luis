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
	if (isset($_POST['registrar'])) {

		$email = $_POST['email'];
		$clave = $_POST['clave'];
		$clave2 = $_POST['clave2'];
		$nombre = $_POST['nombre'];
		$Id = new mysqli('localhost', 'root', '', 'tfg'); // Abre una conexión
		if ($Id->connect_errno) { // Comprueba conexión
			echo "Fallo al conectar" . '' . $Id->connect_errno;
		}

		$result = $Id->query("INSERT into usuarios (nombre,email,contrasena) values (\"" . $nombre . "\", \"" . $email . "\",\"" . $clave . "\")");

		if ($clave !== $clave2) {
			$error[] = "Las contraseñas tienen que ser iguales";
		}
	}
	if (isset($_POST['registrar']) && empty($error)) {
		require_once('../index.php');
		
	} else {
	?>
		<div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="row g-3">
                        <h4>Registrate</h4>
                        <div class="col-12">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-12">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="col-12">
                            <label>Contraseña</label>
                            <input type="password" name="clave" class="form-control" placeholder="Contraseña">
                        </div>
                        <div class="col-12">
                            <label>Repite contraseña</label>
                            <input type="password" name="clave2" class="form-control" placeholder="Repite contraseña">
                        </div>
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
		<?php  
		}
		if (isset($error)) {
					foreach ($error as $errores) {
						echo "<li> $errores </li>";
					}
				}
		
	?>
</form>	
</body>
</html>
