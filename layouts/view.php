<!doctype html>
<html lang="en">

<head>
    <title>Lee Imagen</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../funciones/estilo.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    .close {
        font-size: 1.5rem;
    }

    .col-12 img {
        opacity: 0.7;
        cursor: pointer;
        margin: 2rem;
        width: 100%;
    }

    .col-12 img:hover {
        opacity: 1;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

    }
</style>

<?php
$usuario = $_SESSION['username'];
?>

<body>
    <label>
        <h6>Buscar articulos por categoria:</h6>
    </label>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <select name="ropa" class="custom-select">
                <option value="camiseta">Camiseta</option>
                <option value="pantalones">Pantalones</option>
                <option value="sudadera">Sudadera</option>
                <option value="zapatillas">Zapatillas</option>
                <option value="accesorio">Accesorio</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="buscar">Búsqueda</button>
        </div>
    </form>
    <hr>
    <div class="container">
        <div class="row d-flex flex-wrap align-items-center" data-target="#lightbox">

            <?php
            if (isset($_POST['buscar'])) {
                $con = mysqli_connect("localhost", "root", "", "tfg");
                $ropa = $_POST['ropa'];
                $query = "SELECT * FROM imagenes where email='" . $usuario . "' and categoria='" . $ropa . "'";
                $res = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($res)) {
            ?>

                    <div style='display:flex;flex-wrap: wrap;'>
                        <div class="card" style="width:320px">
                            <img data-toggle="modal" data-target="#modal1" class="img-fluid z-depth-1" src="data:<?php echo $row['tipo']; ?>;base64,<?php echo  base64_encode($row['imagen']); ?>" data-target="#indicators" data-slide-to="0" alt="" />
                            <div class="modal-footer justify-content-center">
                                <form action="../ropa/add_calendario.php?id=<?php echo $fil['id']; ?>" method="POST">
                                    <label for="cal">Fecha: </label>
                                    <input type="date" id="cal" name="fecha">
                                    <button type="submit" class="btn btn-primary" name="anadir"> Añadir</button>
                                </form>

                                <a type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" href="../ropa/eliminar_img.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                                <a type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" href="../ropa/add_fav.php?id=<?php echo $row['id']; ?>">Añadir favorito</a>

                            </div>
                        </div>
                    <?php
                }
                    ?>
                    </div>

                    <?php

                } else {
                    $con = mysqli_connect("localhost", "root", "", "tfg");
                    $query = "SELECT * FROM imagenes where email='" . $usuario . "';";
                    $res = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($res)) {
                    ?>

                        <div style='display:flex;flex-wrap: wrap;'>
                            <div class="card" style="width:320px">
                                <img data-toggle="modal" data-target="#modal1" class="img-fluid z-depth-1" src="data:<?php echo $row['tipo']; ?>;base64,<?php echo  base64_encode($row['imagen']); ?>" data-target="#indicators" data-slide-to="0" alt="" />
                                <div class="modal-footer justify-content-center">
                                    <form action="../ropa/add_calendario.php?id=<?php echo $fil['id']; ?>" method="POST">
                                        <label for="cal">Fecha: </label>
                                        <input type="date" id="cal" name="fecha">
                                        <button type="submit" class="btn btn-primary" name="anadir"> Añadir</button>
                                    </form>

                                    <a type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" href="../ropa/eliminar_img.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                                    <a type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" href="../ropa/add_fav.php?id=<?php echo $row['id']; ?>">Añadir favorito</a>

                                </div>
                            </div>
                        <?php
                    }
                        ?>
                        </div>

                    <?php
                }
                    ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>