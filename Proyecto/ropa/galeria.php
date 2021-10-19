<!DOCTYPE html>
<html lang="es">
<head>
	<title>Armario</title>
	<meta charset="utf-8">
	<meta name="description" content="Mi primera pagina">
	<meta name="author" content="Luis">
    <link rel="stylesheet" href="../css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/bootstrap-theme.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="estilo.css">
  <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
    Añadir imagen: <input name="archivo" id="archivo" type="file" /><br>
    <label>Categoria: </label><input type="text" name="categoria"><br>
    <input type="submit" name="subir" value="Subir imagen" />
  </form>
  <?php
  error_reporting(0);
  ?>
  <?php
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['subir'])) {
    $categoria=$_POST["categoria"];
    $filename = $_FILES["archivo"]["name"];
    $tempname = $_FILES["archivo"]["tmp_name"];
    $folder = "image/" . $filename;

    $db = mysqli_connect("localhost", "root", "", "tfg");

    // Get all the submitted data from the form
    $sql = "INSERT INTO ropa (categoria,foto) VALUES ('$categoria','$filename')";

    // Execute query
    mysqli_query($db, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
      $msg = "Image uploaded successfully";
    } else {
      $msg = "Failed to upload image";
    }
  }
  $result = mysqli_query($db, "SELECT * FROM ropa");
  while ($data = mysqli_fetch_array($result)) {
  ?>
<div class="row">
 
    <div class="col-lg-4 mb-4 mb-lg-0">
    <img src="image/Captura-de-pantalla-2019-07-30-a-las-12.21.25.png" alt="Galeria imagen" class="w-100 shadow-1-strong rounded mb-4">
    </div>
  <?php
  }
  ?>
  </div>
</body>
</html>