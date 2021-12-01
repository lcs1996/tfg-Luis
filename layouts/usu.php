<?php
      require '../logica/conexion.php';
      session_start();
      $usuario = $_SESSION['username'];
      $usu = $_REQUEST['usuario'];
          $query=("INSERT INTO amigos (de,para,fecha,estado) values ('".$usuario."','".$usu."',now(),'0')");
          $resultado = $conexion->query($query);          
      ?>
