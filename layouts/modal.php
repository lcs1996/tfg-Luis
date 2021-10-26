<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
$usuario = $_SESSION['username'];
?>
       <h1>Galería de imágenes</h1>
     <hr/>
     <div style='display:flex;flex-wrap: wrap;'>
         <?php
         $conex = mysqli_connect("localhost", "root", "", "tfg");
         $consulta = "SELECT * FROM imagenes where email='" . $usuario . "';";
         $result = mysqli_query($conex, $consulta);
         $fil = mysqli_fetch_assoc($result);
         for ($i = 0; $i < count($fil); $i++) {
             ?>
             <div class="card" style="width:200px" >
             <img data-toggle="modal" data-target="#modal1" class="img-fluid z-depth-1" 
             src="data:<?php echo $fil['tipo']; ?>;base64,<?php echo  base64_encode($fil['imagen']); ?>" data-target="#indicators" data-slide-to="0" alt="" />
                 <div class="card-body">
                     <h4 class="card-title"></h4>
                     <a href="" class="btn btn-danger">Borrar imagen</a>
                 </div>
             </div>
             <?php
         }
         ?>
     </div>     
    </body>
</html>