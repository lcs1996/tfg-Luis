<?php
require '../logica/conexion.php';
$usuario = $_SESSION['username'];

if (isset($_POST['enviar'])) {
    $u = $_POST['usuario'];
    $sql = "SELECT *
    FROM usuarios 
    where usuario LIKE '%" . $u . "%' and usuario!='". $usuario."'";
    $resultado = $conexion->query($sql);
    while ($row = mysqli_fetch_array($resultado)) {
?>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <?php
                            echo $row['usuario'];
                            ?>
                                    <a href="../layouts/perfil.php?usuario=<?php echo $row['usuario']; ?>&privada=<?php echo $row['privada']; ?>" class="boton">Ver perfil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
                        }
                    } else {
                        $usuario = $_SESSION['username'];
                        
                        $query = "SELECT *
                        FROM usuarios 
                        where usuario!='". $usuario."'";
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
                        <a href="../layouts/perfil.php?usuario=<?php echo $row['usuario']; ?>&privada=<?php echo $row['privada']; ?>" class="boton">Ver perfil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
                        }
                    }
?>