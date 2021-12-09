<?php 
require 'logica/conexion.php';
session_start();
if (isset($_SESSION['username'])) {
  header("location: layouts/paginaprincipal.php");
}else {
  ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="layouts/estilo.css">
  <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>

  <title>Armario</title>
</head>

<body>
  <header>
  <?php require('layouts/header.php') ?>
  </header>
<section class="fondo">
    <?php
  require('logica/login.php');
  ?>
</section>

  </body>

</html>
  <?php
}
?>
  
