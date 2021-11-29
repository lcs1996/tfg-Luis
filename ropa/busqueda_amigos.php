<?php
require '../logica/conexion.php';

$query = "SELECT usuario FROM usuarios where usuario LIKE '%" . $_POST['usuario'] . "%' AND usuario!='" . $_SESSION['username'] . "'";
$resultado = $conexion->query($query);

while ($row = mysqli_fetch_assoc($resultado)) {
?>
    <div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="card">
					<div class="card-body d-flex justify-content-between align-items-center">
        <?php
        echo $row['usuario'];
        ?>
       <a href="../layouts/usu.php" class="boton">Ver perfil</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
    if (isset($_POST['ver'])) {
        //$query=("INSERT INTO amigos (de,para,fecha,estado) values ('".$usuario."','".$row['usuario']."',now(),'0')");
        //$resultado = $conexion->query($query);
        header("Location: ../layouts/usu.php");
    }
}
?>