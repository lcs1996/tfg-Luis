<!DOCTYPE html>
<html lang="es">
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
	
	if (isset($_POST['entrar'])) {
		$email=$_POST['email'];
		$clave=$_POST['clave'];
		$Id = new mysqli('localhost', 'root', '', 'tfg'); // Abre una conexión
		if ( $Id->connect_errno) { // Comprueba conexión
			echo "Fallo al conectar".''. $Id->connect_errno;
		}
		$result=$Id->query("SELECT * FROM usuarios WHERE email = \"".$email."\" AND contrasena = \"".$clave."\"");

		if ($result->num_rows!==1) {
				$error[]="Error usuario no encontrado";
		}
	}
	if (isset($_POST['entrar']) && empty($error)) {
        require_once('layouts/gallery.php');
	}else{
	?>
		<div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="row g-3">
                        <h4>Bienvenido</h4>
                        <div class="col-12">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
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
		<?php  
		}
		if (isset($error)) {
					foreach ($error as $errores) {
						echo "<li> $errores </li>";
					}
				}
		
	?>
</form>	
<footer>
<?php require_once('layouts/footer.php') ?>
</footer>
</body>
</html>
