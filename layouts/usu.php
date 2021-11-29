
      <?php
      require '../logica/conexion.php';
      session_start();
      $usuario = $_SESSION['username'];
      $id = $_REQUEST['id'];
      $cons = "SELECT id,usuario FROM usuarios where id= '" . $id . "'";
      $res = $conexion->query($cons);
      while ($c = mysqli_fetch_assoc($res)) {
        $cons = "SELECT id FROM usuarios where usuario= '" . $usuario . "'";
        $res = $conexion->query($cons);
        while($a= mysqli_fetch_assoc($res)){
          $query=("INSERT INTO amigos (de,para,fecha,estado) values ('".$a['id']."','".$c['id']."',now(),'0')");
          $resultado = $conexion->query($query);
          header("Location: ../layouts/menu_usuarios.php");
        }
        
      }
      ?>
