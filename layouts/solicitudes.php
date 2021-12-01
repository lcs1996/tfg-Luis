<!doctype html>
<html lang="en">

<head>
    <title>Images</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../funciones/estilo.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <?php  
                $conexion = mysqli_connect("localhost", "root", "", "tfg");
                $cons = "SELECT * FROM usuarios where usuario= '" . $usuario . "'";
                $res = $conexion->query($cons);
                while ($a = mysqli_fetch_assoc($res)) {
                    $query = "SELECT * FROM amigos WHERE para='" . $a['usuario'] . "'";
                    $result = $conexion->query($query);
                    while ($b = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="form-popup" id="myForm2">   
                            <div class="form-group">
                                <?php
                                echo $b['de'];
                                ?>
                            </div>
                            <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <a type="button" class="boton" name="aceptar" href="../layouts/aceptar_amistad.php?para=<?php echo $b['para']; ?>">Aceptar</a>
                                <a type="button" class="boton" name="rechazar" href="../layouts/rechazar_amistad.php?para=<?php echo $b['para']; ?>">Rechazar</a>
                                <button type="button" class="btn cancel" onclick="closeForm2()">Cerrar</button>
                            </div>
                        </form>
                    </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>