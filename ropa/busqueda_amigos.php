<?php
require '../logica/conexion.php';
$usuario = $_SESSION['username'];

if (isset($_POST['enviar'])) {
    $u = $_POST['usuario'];
    $query = "SELECT id,usuario FROM usuarios where usuario LIKE '%" . $u . "%' EXCEPT 
    SELECT id,usuario FROM usuarios WHERE usuario='". $usuario."'";
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
                            $amigos = ("SELECT * FROM amigos");
                            $r=$conexion->query($amigos);
                            //while ($fila = mysqli_fetch_assoc($r)) {
                              //  if ($fila['estado'] == 1) {
                            ?>
                                    <!-- <a href="../layouts/usu.php?id=<?php echo $row['id']; ?>" class="boton">Dejar de seguir</a> -->
                                <?php
                                //} elseif($fila['estado'] == 0) {
                                ?>
                                    <!-- <a href="../layouts/usu.php?id=<?php echo $row['id']; ?>" class="boton">Esperando respuesta</a> -->
                                <?php
                               // }else {
                                    ?>
                                    <a href="../layouts/usu.php?id=<?php echo $row['id']; ?>" class="boton">Solicitud de amistad</a>
                                <?php
                                //}

                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
                           // }
                        }
                    } else {
                        $query = "SELECT id,usuario FROM usuarios";
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
                        <a href="../layouts/usu.php?id=<?php echo $row['id']; ?>" class="boton">Solicitud de amistad</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
                        }
                    }
?>